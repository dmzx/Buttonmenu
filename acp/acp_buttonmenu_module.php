<?php
/**
 *
 * Button Menu extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015-2023 dmzx - https://www.dmzx-web.net
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\buttonmenu\acp;

class acp_buttonmenu_module
{
	public $u_action;

	function main($id, $mode)
	{
		global $db, $phpbb_container, $user, $template, $config, $phpEx, $request, $language;

		// Get table
		$table_menu_buttons = $phpbb_container->getParameter('dmzx.buttonmenu.table.menu_buttons');
		$table_menu_styles = $phpbb_container->getParameter('dmzx.buttonmenu.table.menu_styles');

		$this->tpl_name = 'acp_buttons_menu';

		switch($mode)
		{
		case 'config_menu':

			$this->page_title = $language->lang('MENU_TITLE') . ' - ' . $language->lang('MENU_CONFIG');

			$submit = (isset($_POST['submit'])) ? true : false;

			if ($submit)
			{
				$config->set('menu_enabled', $request->variable('menu_enabled', 0));

				trigger_error($language->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
			}

			$template->assign_vars([
				'S_MENU_ENABLED'	=> $config['menu_enabled'],
				'S_MENU_CONFIG'		=> true,
			]);

			break;

		case 'styles_menu':

			$this->page_title = $language->lang('MENU_TITLE') . ' - ' . $language->lang('MENU_STYLES');

			$action	= $request->variable('action', '');

			$color_id	= $request->variable('color_id', 0);

			switch ($action)
			{
			case "delete":

				if (confirm_box(true))
				{
					$sql = 'DELETE FROM ' . $table_menu_styles . '
						WHERE color_id = ' . $color_id;
					$db->sql_query($sql);

					redirect($this->u_action);
				}
				else
				{
					confirm_box(false, $language->lang('DELETE_COLOR_CONFIRM'));

					redirect($this->u_action);
				}

				break;

			case "add_color":

				$sql = 'SELECT style_id, style_name
					FROM ' . STYLES_TABLE . '
					WHERE style_active = 1
					ORDER BY style_name';
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$template->assign_block_vars('styles', [
						'ID'	=> $row['style_id'],
						'NAME'	=> $row['style_name'],
					]);
				}
				$db->sql_freeresult($result);

				$color_name = $request->variable('color_name', '', true);

				$template->assign_vars([
					'S_MENU_ADD_COLOR'			=> true,
					'S_NAME'					=> $color_name,
					'S_TEXT'					=> '#ffffff',
					'S_TEXT_HOVER'				=> '#ffffff',
					'S_BGCOLOR_HOVER'			=> 'transparent',
					'S_MENU_BACKGROUND'			=> 'transparent',
					'S_DROPDOWN_BACKGROUND'		=> '#0686c5',
				]);

				$submit = (isset($_POST['submit'])) ? true : false;

				if ($submit)
				{
					$color_name					= $request->variable('color_name', '', true);
					$color_style_id				= $request->variable('color_style_id', 0);
					$color_display_search		= $request->variable('color_display_search', 0);
					$color_text_weight			= $request->variable('color_text_weight', 'bold');
					$color_text_transform		= $request->variable('color_text_transform', 'none');
					$color_text_hover_decor		= $request->variable('color_text_hover_decor', 'none');
					$color_text					= $request->variable('color_text', '#ffffff');
					$color_text_hover			= $request->variable('color_text_hover', '#ffffff');
					$color_align				= $request->variable('color_align', 'start');
					$color_bg_hover				= $request->variable('color_bg_hover', 'transparent');
					$menu_background			= $request->variable('menu_background', 'transparent');
					$dropdown_background		= $request->variable('dropdown_background', '#0686c5');

					if ($color_name == '')
					{
						trigger_error($language->lang('NO_COLOR_NAME') . adm_back_link($this->u_action), E_USER_WARNING);
					}

					if ($color_style_id != '0')
					{
						$sql = 'SELECT color_name
							FROM ' . $table_menu_styles . '
							WHERE color_style_id = ' . $color_style_id;
						$db->sql_query($sql);
						$color_name = $db->sql_fetchfield('color_name');

						if ( $db->sql_affectedrows() )
						{
							$sql = 'SELECT style_name
								FROM ' . STYLES_TABLE . '
								WHERE style_id = ' . $color_style_id;
							$db->sql_query($sql);
							$style_name = $db->sql_fetchfield('style_name');

							trigger_error(sprintf($language->lang('COLOR_ANOTHER_STYLE'), $style_name, $color_name) . adm_back_link($this->u_action), E_USER_WARNING);
						}
					}

					$sql = 'INSERT INTO ' . $table_menu_styles . ' (color_name, color_style_id, color_text, color_text_hover, color_text_hover_decor, color_text_weight, color_display_search, color_text_transform, color_align, color_bg_hover, menu_background, dropdown_background)
						VALUES ("' . $color_name . '", "' . $color_style_id . '", "' . $color_text . '", "' . $color_text_hover . '", "' . $color_text_hover_decor . '", "' . $color_text_weight . '", "' . $color_display_search . '", "' . $color_text_transform . '", "' . $color_align . '", "' . $color_bg_hover . '", "' . $menu_background . '", "' . $dropdown_background . '")';
					$db->sql_query($sql);

					trigger_error($language->lang('COLOR_ADDED') . adm_back_link($this->u_action));
				}

				break;

			case "edit_color":

				$sql = 'SELECT *
					FROM ' . $table_menu_styles . '
					WHERE color_id = ' . $color_id;
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);

				$template->assign_vars([
					'S_NAME'				=> $row['color_name'],
					'S_TEXT'				=> $row['color_text'],
					'S_TEXT_HOVER'			=> $row['color_text_hover'],
					'S_TEXT_HOVER_DECOR'	=> $row['color_text_hover_decor'],
					'S_TEXT_WEIGHT'		 	=> $row['color_text_weight'],
					'S_DISPLAY_SEARCH'		=> $row['color_display_search'],
					'S_TEXT_TRANSFORM'		=> $row['color_text_transform'],
					'S_ALIGN'				=> $row['color_align'],
					'S_BGCOLOR_HOVER'		=> $row['color_bg_hover'],
					'S_MENU_BACKGROUND'		=> $row['menu_background'],
					'S_DROPDOWN_BACKGROUND'	=> $row['dropdown_background'],
					'S_CHOSEN_STYLE'		=> $row['color_style_id'],
				]);
				$db->sql_freeresult($result);

				$sql = 'SELECT style_id, style_name
					FROM ' . STYLES_TABLE . '
					WHERE style_active = 1
					ORDER BY style_name';
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$template->assign_block_vars('styles', [
						'ID'		=> $row['style_id'],
						'NAME'		=> $row['style_name'],
					]);
				}
				$db->sql_freeresult($result);

				$submit = (isset($_POST['submit'])) ? true : false;

				if ($submit)
				{
					$color_name				= $request->variable('color_name', '', true);
					$color_style_id			= $request->variable('color_style_id', 0);
					$color_display_search	= $request->variable('color_display_search', 0);
					$color_text_weight		= $request->variable('color_text_weight', 'bold');
					$color_text_transform	= $request->variable('color_text_transform', 'none');
					$color_text_hover_decor	= $request->variable('color_text_hover_decor', 'none');
					$color_text				= $request->variable('color_text', '#ffffff');
					$color_text_hover		= $request->variable('color_text_hover', '#ffffff');
					$color_align			= $request->variable('color_align', 'start');
					$color_bg_hover			= $request->variable('color_bg_hover', 'transparent');
					$menu_background		= $request->variable('menu_background', 'transparent');
					$dropdown_background	= $request->variable('dropdown_background', '#0686c5');

					if ($color_name == '')
					{
						trigger_error($language->lang('NO_COLOR_NAME') . adm_back_link($this->u_action), E_USER_WARNING);
					}

					if ($color_style_id != '0')
					{
						$sql = 'SELECT color_name, color_id
							FROM ' . $table_menu_styles . '
							WHERE color_style_id = ' . $color_style_id;
						$result = $db->sql_query($sql);
						$color_row = $db->sql_fetchrow($result );

						if ( $db->sql_affectedrows() && $color_row['color_id'] != $color_id )
						{
							$sql = 'SELECT style_name
								FROM ' . STYLES_TABLE . '
								WHERE style_id = ' . $color_style_id;
							$db->sql_query($sql);
							$style_name = $db->sql_fetchfield('style_name');

							trigger_error(sprintf($language->lang('COLOR_ANOTHER_STYLE'), $style_name, $color_row['color_name']) . adm_back_link($this->u_action), E_USER_WARNING);
						}
					}

					$sql = 'UPDATE ' . $table_menu_styles . '
						SET color_name = "' . $color_name . '", color_style_id = "' . $color_style_id . '", color_text = "' . $color_text . '", color_text_hover = "' . $color_text_hover . '",
						color_text_hover_decor = "' . $color_text_hover_decor . '", color_text_weight = "' . $color_text_weight . '",
						color_display_search = "' . $color_display_search . '", color_text_transform = "' . $color_text_transform . '", color_align = "' . $color_align . '", color_bg_hover = "' . $color_bg_hover . '", menu_background = "' . $menu_background . '", dropdown_background = "' . $dropdown_background . '"
						WHERE color_id = ' . $color_id;
					$db->sql_query($sql);

					trigger_error($language->lang('COLOR_UPDATED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'S_MENU_EDIT_COLOR'	 => true,
				]);

				break;

			default:

				$sql = 'SELECT color_name, color_id, color_style_id
					FROM ' . $table_menu_styles . '
					ORDER BY color_id';
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$sql = 'SELECT style_name
						FROM ' . STYLES_TABLE . '
						WHERE style_id = ' . $row['color_style_id'];
					$db->sql_query($sql);
					$style_name = $db->sql_fetchfield('style_name');

					$template->assign_block_vars('manage_styles', [
						'ID'			=> $row['color_id'],
						'NAME'			=> $row['color_name'],
						'TRUC'			=> $row['color_style_id'],
						'STYLE_NAME'	=> $style_name,
						'U_DELETE'		=> $this->u_action . '&amp;action=delete&amp;color_id= ' . $row['color_id'],
						'U_EDIT'		=> $this->u_action . '&amp;action=edit_color&amp;color_id=' . $row['color_id'],
					]);

					$style_name = '';
				}
				$db->sql_freeresult($result);

				$submit = (isset($_POST['submit'])) ? true : false;

				if ($submit)
				{
					$color_name = $request->variable('color_name', '', true);
					redirect($this->u_action . '&amp;action=add_color&amp;color_name='.$color_name);
				}

				$template->assign_vars([
					'S_MENU_STYLES_LIST'	=> true,
				]);
			}

			$template->assign_vars([
				'S_MENU_STYLES'	 => true,
			]);

			break;

		case 'buttons_menu':

			$this->page_title	= $language->lang('MENU_TITLE') . ' - ' . $language->lang('MENU_BUTTONS');

			$action				= $request->variable('action', '');
			$parent_id			= $request->variable('parent_id', 0);
			$button_id			= $request->variable('button_id', 0);

			$template->assign_vars([
				'S_MENU_BUTTONS'	=> true,
				'S_PARENT_ID'		=> $parent_id,
			]);

			switch ($action)
			{
			case "delete":

				if (confirm_box(true))
				{
					$sql = 'SELECT button_id
						FROM ' . $table_menu_buttons . '
						WHERE parent_id = ' . $button_id;
					$result = $db->sql_query($sql);

					while ($row = $db->sql_fetchrow($result))
					{
						$sql = 'DELETE FROM ' . $table_menu_buttons . '
							WHERE button_id = ' . $row['button_id'];
						$db->sql_query($sql);
					}
					$db->sql_freeresult($result);

					$sql = 'DELETE FROM ' . $table_menu_buttons . '
						WHERE button_id = ' . $button_id;
					$db->sql_query($sql);

					redirect($this->u_action.'&amp;parent_id='.$parent_id);
				}
				else
				{
					$sql = 'SELECT button_id
						FROM ' . $table_menu_buttons . '
						WHERE parent_id = ' . $button_id;
					$result = $db->sql_query($sql);

					( $db->sql_affectedrows() ) ? confirm_box(false, $language->lang('DELETE_SUBBUTTONS_CONFIRM')) : confirm_box(false, $language->lang('DELETE_BUTTON_CONFIRM')) ;

					redirect($this->u_action.'&amp;parent_id='.$parent_id);
				}

				break;

			case "add_button":

				$button_name = $request->variable('button_name', '', true);

				$template->assign_vars([
					'S_NAME'				=> $button_name,
					'S_MENU_CREATE_BUTTON'	=> true,
				]);

				// Load buttons for select
				$sql = 'SELECT button_name, button_id
					FROM ' . $table_menu_buttons . '
					WHERE parent_id = 0
					ORDER BY left_id';
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$template->assign_block_vars('parents', [
						'ID'		=> $row['button_id'],
						'NAME'		=> $row['button_name'],
					]);
				}
				$db->sql_freeresult($result);

				$submit = (isset($_POST['submit'])) ? true : false;

				if ($submit)
				{
					$button_url					= $request->variable('button_url', '', true);
					$button_name				= $request->variable('button_name', '', true);
					$button_parent				= $request->variable('button_parent', 0);
					$button_icon				= $request->variable('button_icon', '');
					$button_external			= $request->variable('button_external', 0);
					$button_display				= $request->variable('button_display', 1);
					$button_permission			= $request->variable('button_permission', 0);

					$sql = 'SELECT MAX(right_id) AS right_id
						FROM ' . $table_menu_buttons;
					$result = $db->sql_query($sql);
					$row = $db->sql_fetchrow($result);
					$db->sql_freeresult($result);

					$left_id = $row['right_id'] + 1;
					$right_id = $row['right_id'] + 2;

					$sql = 'INSERT INTO ' . $table_menu_buttons . ' (button_url, button_name, button_external, button_icon, button_display, button_permission, left_id, right_id, parent_id)
						VALUES ("' . $button_url . '", "' . $button_name . '", "' . $button_icon . '", ' . $button_external . ', ' . $button_display . ', ' . $button_permission . ', ' . $left_id . ', ' . $right_id . ', ' . $button_parent . ')';
					$db->sql_query($sql);

					trigger_error($language->lang('BUTTON_ADDED') . adm_back_link($this->u_action.'&amp;parent_id='.$button_parent));
				}

				break;

			case "edit_button":

				// Load buttons for select
				$sql = 'SELECT button_name, button_id
					FROM ' . $table_menu_buttons . '
					WHERE parent_id = 0
					AND button_id <> ' . $button_id . '
					ORDER BY left_id';
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$template->assign_block_vars('parents', [
						'ID'			=> $row['button_id'],
						'NAME'			=> $row['button_name'],
					]);
				}
				$db->sql_freeresult($result);

				$sql = 'SELECT *
					FROM ' . $table_menu_buttons . '
					WHERE button_id = ' . $button_id;
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);

				$template->assign_vars([
					'L_ACP_MENU_EDIT_BUTTON'	=> $language->lang('ACP_MENU_EDIT_BUTTON') . $row['button_name'],
					'S_URL'						=> $row['button_url'],
					'S_NAME'					=> $row['button_name'],
					'S_ICON'					=> $row['button_icon'],
					'S_EXTERNAL'				=> $row['button_external'],
					'S_DISPLAY'					=> $row['button_display'],
					'S_PARENT'					=> $row['parent_id'],
					'S_PERMISSION'				=> $row['button_permission'],
					'S_MENU_EDIT_BUTTON'		=> true,
				]);
				$db->sql_freeresult($result);

				$submit = (isset($_POST['submit'])) ? true : false;

				if ($submit)
				{
					$button_url					= $request->variable('button_url', '', true);
					$button_name				= $request->variable('button_name', '', true);
					$button_icon				= $request->variable('button_icon', '');
					$button_external			= $request->variable('button_external', 0);
					$button_display				= $request->variable('button_display', 1);
					$button_parent				= $request->variable('button_parent', 0);
					$button_permission			= $request->variable('button_permission', 0);

					if ($button_parent && !$row['parent_id'])
					{
						$sql = 'SELECT button_id
							FROM ' . $table_menu_buttons . '
							WHERE parent_id = ' . $button_id;
						$result = $db->sql_query($sql);

						if ( $db->sql_affectedrows() )
						{
							trigger_error($language->lang('MOVE_BUTTON_WITH_SUBS') . adm_back_link($this->u_action.'&amp;parent_id='.$parent_id), E_USER_WARNING);
						}
					}

					$sql = 'UPDATE ' . $table_menu_buttons . '
						SET button_url = "' . $button_url . '", button_name = "' . $button_name . '", button_icon = "' . $button_icon . '", button_external = ' . $button_external . ', button_display = ' . $button_display . ', button_permission = ' . $button_permission . ', parent_id = ' . $button_parent . '
						WHERE button_id = ' . $button_id;
					$db->sql_query($sql);

					trigger_error($language->lang('BUTTON_UPDATED') . adm_back_link($this->u_action.'&amp;parent_id='.$button_parent));
				}

				break;

			case 'move_up':
			case 'move_down':

				$sql = 'SELECT left_id, right_id
					FROM ' . $table_menu_buttons . '
					WHERE button_id = ' . $button_id;
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);

				$this->acp_move_button($row, $action);

				redirect($this->u_action.'&amp;parent_id='.$parent_id);

				break;

			default:

				$sql = 'SELECT *
					FROM ' . $table_menu_buttons . '
					WHERE parent_id = ' . $parent_id . '
					ORDER BY left_id';
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$template->assign_block_vars('buttons', [
						'ID'				=> $row['button_id'],
						'NAME'				=> $row['button_name'],
						'URL'			 	=> $row['button_url'],
						'U_OPEN'			=> ($row['parent_id'] == 0) ? $this->u_action . '&amp;action=&amp;parent_id='.$row['button_id'] : $this->u_action . '&amp;action=&amp;parent_id='.$row['parent_id'].'&amp;button_id=' . $row['button_id'],
						'U_DELETE'			=> ($row['parent_id'] == 0) ? $this->u_action . '&amp;action=delete&amp;parent_id=0&amp;button_id=' . $row['button_id'] : $this->u_action . '&amp;action=delete&amp;parent_id='.$row['parent_id'].'&amp;button_id=' . $row['button_id'],
						'U_EDIT'			=> ($row['parent_id'] == 0) ? $this->u_action . '&amp;action=edit_button&amp;parent_id=0&amp;button_id=' . $row['button_id'] : $this->u_action . '&amp;action=edit_button&amp;parent_id='.$row['parent_id'].'&amp;button_id=' . $row['button_id'],
						'U_MOVE_UP'			=> ($row['parent_id'] == 0) ? $this->u_action . '&amp;action=move_up&amp;parent_id=0&amp;button_id=' . $row['button_id'] : $this->u_action . '&amp;action=move_up&amp;parent_id='.$row['parent_id'].'&amp;button_id=' . $row['button_id'],
						'U_MOVE_DOWN'		 => ($row['parent_id'] == 0) ? $this->u_action . '&amp;action=move_down&amp;parent_id=0&amp;button_id=' . $row['button_id'] : $this->u_action . '&amp;action=move_down&amp;parent_id='.$row['parent_id'].'&amp;button_id=' . $row['button_id'],
					]);
				}
				$db->sql_freeresult($result);

				$submit = (isset($_POST['submit'])) ? true : false;

				if ($submit)
				{
					$button_name = $request->variable('button_name', '', true);
					redirect($this->u_action . '&amp;action=add_button&amp;parent_id='.$parent_id.'&amp;button_name='.$button_name);
				}

				$button_nav = $language->lang('MENU_NAV');

				if ($parent_id)
				{
					$sql = 'SELECT button_name
						FROM ' . $table_menu_buttons . '
						WHERE button_id = ' . $parent_id;
					$result = $db->sql_query($sql);

					$button_nav .= ' » ' .$db->sql_fetchfield('button_name');
				}

				$template->assign_vars([
					'S_MENU_BUTTONS_LIST'	=> true,
					'S_BUTTONS_NAV'			=> $button_nav,
				]);
			}

			break;
		}

	}

	function acp_move_button($button_row, $action = 'move_up')
	{
		global $db, $phpbb_container;
		// Get table
		$table_menu_buttons = $phpbb_container->getParameter('dmzx.buttonmenu.table.menu_buttons');
		$table_menu_styles	= $phpbb_container->getParameter('dmzx.buttonmenu.table.menu_styles');

		$sql_extend			= ( $action == 'move_up' ) ? "right_id < {$button_row['right_id']} ORDER BY right_id DESC" : "left_id > {$button_row['left_id']} ORDER BY left_id ASC";

		$sql = 'SELECT *
			FROM ' . $table_menu_buttons . '
			WHERE ' . $sql_extend;
		$result = $db->sql_query_limit($sql, 1);

		$target = [];
		while ($row = $db->sql_fetchrow($result))
		{
			$target = $row;
		}
		$db->sql_freeresult($result);

		if (!sizeof($target))
		{
			// The button is already on top or bottom
			return false;
		}

		/**
		* $left_id and $right_id define the scope of the nodes that are affected by the move.
		* $diff_up and $diff_down are the values to substract or add to each node's left_id
		* and right_id in order to move them up or down.
		* $move_up_left and $move_up_right define the scope of the nodes that are moving
		* up. Other nodes in the scope of ($left_id, $right_id) are considered to move down.
		*/
		if ($action == 'move_up')
		{
			$left_id		= $target['left_id'];
			$right_id		= $button_row['right_id'];

			$diff_up		= $button_row['left_id'] - $target['left_id'];
			$diff_down		= $button_row['right_id'] + 1 - $button_row['left_id'];

			$move_up_left	= $button_row['left_id'];
			$move_up_right	= $button_row['right_id'];
		}
		else
		{
			$left_id		= $button_row['left_id'];
			$right_id		= $target['right_id'];

			$diff_up		= $button_row['right_id'] + 1 - $button_row['left_id'];
			$diff_down		= $target['right_id'] - $button_row['right_id'];

			$move_up_left	= $button_row['right_id'] + 1;
			$move_up_right	= $target['right_id'];
		}

		$sql = 'UPDATE ' . $table_menu_buttons . "
			SET left_id = left_id + CASE
			WHEN left_id BETWEEN {$move_up_left} AND {$move_up_right} THEN -{$diff_up}
			ELSE {$diff_down}
			END,
			right_id = right_id + CASE
			WHEN right_id BETWEEN {$move_up_left} AND {$move_up_right} THEN -{$diff_up}
			ELSE {$diff_down}
			END
			WHERE
			left_id BETWEEN {$left_id} AND {$right_id}
			AND right_id BETWEEN {$left_id} AND {$right_id}";
		$db->sql_query($sql);
	}
}
