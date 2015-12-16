<?php
/**
*
* @package phpBB Extension - Button Menu
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\buttonmenu\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	protected $menu_buttons;

	protected $menu_colors;

	/** @var ContainerBuilder */
	protected $phpbb_container;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	public function __construct($phpbb_container, \phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user, \phpbb\db\driver\driver_interface $db, $menu_buttons, $menu_colors)
	{
		$this->phpbb_container = $phpbb_container;
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
		$this->db = $db;
		$this->menu_buttons = $menu_buttons;
		$this->menu_colors = $menu_colors;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'	=> 'page_header_after',
		);
	}

	public function page_header_after($event)
	{

		$context = $this->phpbb_container->get('template_context');
		$rootref = &$context->get_root_ref();

		if ( isset($this->config['menu_enabled']) && $this->config['menu_enabled'] )
		{
			$sql = 'SELECT *
				FROM ' . $this->menu_colors;
				$result = $this->db->sql_query($sql);
			$row = $this->db->sql_fetchrow($result);

			if ($this->db->sql_affectedrows())
			{
				$this->template->assign_vars(array(
					'S_MENU_COLOR'				=> $row['color_name'],
					'S_MENU_FONT_COLOR'		 => $row['color_text'],
					'S_MENU_FONT_COLOR_HOVER'	=> $row['color_text_hover'],
					'S_MENU_DECORATION'		 => $row['color_text_hover_decor'],
					'S_MENU_WEIGHT'			 => $row['color_text_weight'],
					'S_MENU_SEARCH'			 => $row['color_display_search'],
					'S_MENU_TEXT_TRANSFORM'	 => $row['color_text_transform'],
					'S_MENU_ALIGN'				=> $row['color_align'],
				));

				$sql = 'SELECT *
					FROM ' . $this->menu_buttons . '
					WHERE button_display = 1
						AND parent_id = 0
					ORDER BY left_id';
				$result = $this->db->sql_query($sql);

				while ($row = $this->db->sql_fetchrow($result))
				{
					if ( ($row['button_only_registered'] && $this->user->data['user_id'] == ANONYMOUS) || ($row['button_only_guest'] && $this->user->data['user_id'] != ANONYMOUS) )
					{
						continue;
					}

					if (preg_match("/\{(.*)\}/", $row['button_url']))
					{
						$brackets = array("{", "}");
						$var_name = strtoupper(str_replace($brackets, '', $row['button_url']));
						$row['button_url'] = $rootref[$var_name];
					}

					if (preg_match("/\{(.*)\}/", $row['button_name']))
					{
						$brackets = array("{L_", "}");
						$var_name = strtoupper(str_replace($brackets, '', $row['button_name']));
						$row['button_name'] = $this->user->lang[$var_name];
					}

					$this->template->assign_block_vars('buttons', array(
						'ID'				=> $row['button_id'],
						'URL'				=> $row['button_url'],
						'NAME'				=> $row['button_name'],
						'EXTERNAL'			=> $row['button_external'],
					));

					$sub_sql = 'SELECT *
						FROM ' . $this->menu_buttons . '
						WHERE button_display = 1
							AND parent_id = ' . $row['button_id'] . '
						ORDER BY left_id';
					$sub_result = $this->db->sql_query($sub_sql);

					while ($sub_row = $this->db->sql_fetchrow($sub_result))
					{
						if ( ($sub_row['button_only_registered'] && $this->user->data['user_id'] == ANONYMOUS) || ($sub_row['button_only_guest'] && $this->user->data['user_id'] != ANONYMOUS) )
						{
							continue;
						}

						if (preg_match("/\{(.*)\}/", $sub_row['button_url']))
						{
							$brackets = array("{", "}");
							$var_name = strtoupper(str_replace($brackets, '', $sub_row['button_url']));
							$sub_row['button_url'] = $rootref[$var_name];
						}

						if (preg_match("/\{(.*)\}/", $sub_row['button_name']))
						{
							$brackets = array("{L_", "}");
							$var_name = strtoupper(str_replace($brackets, '', $sub_row['button_name']));
							$sub_row['button_name'] = $this->user->lang[$var_name];
						}

						$this->template->assign_block_vars('buttons.sub', array(
							'ID'				=> $sub_row['button_id'],
							'URL'				=> $sub_row['button_url'],
							'NAME'				=> $sub_row['button_name'],
							'EXTERNAL'			=> $sub_row['button_external'],
						));
					}
					$this->db->sql_freeresult($sub_result);
				}
				$this->db->sql_freeresult($result);
			}
		}
	}
}
