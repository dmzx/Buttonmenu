<?php
/**
 *
 * Button Menu extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015-2023 dmzx - https://www.dmzx-web.net
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\buttonmenu\event;

use phpbb\config\config;
use phpbb\template\template;
use phpbb\user;
use phpbb\db\driver\driver_interface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use phpbb\language\language;

/**
 * Class listener
 *
 * @package dmzx\buttonmenu\event
 */
class listener implements EventSubscriberInterface
{
	/** @var ContainerBuilder */
	protected $phpbb_container;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string */
	protected $menu_buttons;

	/** @var string */
	protected $menu_styles;

	/**
	 * listener constructor.
	 *
	 * @param \phpbb\config\config              $config
	 * @param \phpbb\language\language          $language
	 * @param \phpbb\template\template          $template
	 * @param \phpbb\user                       $user
	 * @param \phpbb\db\driver\driver_interface $db
	 */
	public function __construct($phpbb_container, config $config, language $language, template $template, user $user, driver_interface $db, $menu_buttons, $menu_styles)
	{
		$this->phpbb_container = $phpbb_container;
		$this->config = $config;
		$this->language = $language;
		$this->template = $template;
		$this->user = $user;
		$this->db = $db;
		$this->menu_buttons = $menu_buttons;
		$this->menu_styles = $menu_styles;
	}

	static public function getSubscribedEvents()
	{
		return [
			'core.page_header_after'	=> 'page_header_after',
		];
	}

	public function page_header_after($event)
	{

		$context = $this->phpbb_container->get('template_context');
		$rootref = &$context->get_root_ref();

		if ( isset($this->config['menu_enabled']) && $this->config['menu_enabled'] )
		{
			$sql = 'SELECT * FROM ' . $this->menu_styles;
			$result = $this->db->sql_query($sql);
			$row = $this->db->sql_fetchrow($result);

			if ($this->db->sql_affectedrows())
			{
				$this->template->assign_vars([
					'S_MENU_COLOR_ID'			=> $row['color_id'],
					'S_MENU_COLOR'				=> $row['color_name'],
					'S_MENU_FONT_COLOR'			=> $row['color_text'],
					'S_MENU_FONT_COLOR_HOVER'	=> $row['color_text_hover'],
					'S_MENU_DECORATION'			=> $row['color_text_hover_decor'],
					'S_MENU_WEIGHT'				=> $row['color_text_weight'],
					'S_MENU_SEARCH'				=> $row['color_display_search'],
					'S_MENU_TEXT_TRANSFORM'		=> $row['color_text_transform'],
					'S_MENU_ALIGN'				=> $row['color_align'],
					'S_MENU_COLOR_STYLE_ID'		=> $row['color_style_id'],
					'S_MENU_BGCOLOR_HOVER'		=> $row['color_bg_hover'],
					'S_MENU_BACKGROUND'			=> $row['menu_background'],
					'S_DROPDOWN_BACKGROUND'		=> $row['dropdown_background'],
				]);

				$sql = 'SELECT * FROM ' . $this->menu_buttons . ' WHERE button_display = 1 AND parent_id = 0 ORDER BY left_id';
				$result = $this->db->sql_query($sql);

				while ($row = $this->db->sql_fetchrow($result))
				{

					if (preg_match("/\{(.*)\}/", $row['button_url']))
					{
						$brackets = ["{", "}"];
						$var_name = strtoupper(str_replace($brackets, '', $row['button_url']));
						$row['button_url'] = $rootref[$var_name];
					}

					if (preg_match("/\{(.*)\}/", $row['button_name']))
					{
						$brackets = ["{L_", "}"];
						$var_name = strtoupper(str_replace($brackets, '', $row['button_name']));
						$row['button_name'] = $this->language->lang($var_name);
					}

					$this->template->assign_block_vars('buttons', [
						'ID'				=> $row['button_id'],
						'URL'				=> $row['button_url'],
						'NAME'				=> $row['button_name'],
						'ICON'				=> $row['button_icon'],
						'EXTERNAL'			=> $row['button_external'],
						'PERMISSION'		=> $row['button_permission'],
					]);

					$sub_sql = 'SELECT * FROM ' . $this->menu_buttons . ' WHERE button_display = 1 AND parent_id = ' . $row['button_id'] . ' ORDER BY left_id';
					$sub_result = $this->db->sql_query($sub_sql);

					while ($sub_row = $this->db->sql_fetchrow($sub_result))
					{

						if (preg_match("/\{(.*)\}/", $sub_row['button_url']))
						{
							$brackets = ["{", "}"];
							$var_name = strtoupper(str_replace($brackets, '', $sub_row['button_url']));
							$sub_row['button_url'] = $rootref[$var_name];
						}

						if (preg_match("/\{(.*)\}/", $sub_row['button_name']))
						{
							$brackets = ["{L_", "}"];
							$var_name = strtoupper(str_replace($brackets, '', $sub_row['button_name']));
							$sub_row['button_name'] = $this->language->lang($var_name);
						}

						$this->template->assign_block_vars('buttons.sub', [
							'ID'				=> $sub_row['button_id'],
							'URL'				=> $sub_row['button_url'],
							'NAME'				=> $sub_row['button_name'],
							'ICON'				=> $sub_row['button_icon'],
							'EXTERNAL'			=> $sub_row['button_external'],
							'PERMISSION'		=> $sub_row['button_permission'],
						]);
					}
					$this->db->sql_freeresult($sub_result);
				}
				$this->db->sql_freeresult($result);
			}
			
			$this->language->add_lang('button_menu', 'dmzx/buttonmenu');
			
			$this->template->assign_vars([
				'SKIP_TO_NAVBAR'		=> $this->language->lang('SKIP_TO_NAVBAR'),
				'SKIP_TO_CONTENT'		=> $this->language->lang('SKIP_TO_CONTENT'),
				'MENU'					=> $this->language->lang('MENU'),
				'MENU_CLOSE'			=> $this->language->lang('MENU_CLOSE'),
				'MENU_OPEN'				=> $this->language->lang('MENU_OPEN'),
				'SHOW_HIDE_MENU'		=> $this->language->lang('SHOW_HIDE_MENU'),
				'SHOW_HIDE_SUBMENU'		=> $this->language->lang('SHOW_HIDE_SUBMENU'),
				'SUBMENU_CLOSE'			=> $this->language->lang('SUBMENU_CLOSE'),
				'SUBMENU_OPEN'			=> $this->language->lang('SUBMENU_OPEN'),
				'S_USER_STYLE_ID'		=> $this->user->style['style_id'],
			]);		
		}
	}
}
