<?php
/**
*
* @package phpBB Extension - Button Menu
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\buttonmenu\acp;

class acp_buttonmenu_info
 {
	function module()
	{
		 return array(
			'filename'	=> 'acp_buttons_menu',
			'title'		=> 'MENU_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'config_menu'		=> array('title' => 'MENU_CONFIG', 'auth' => 'acl_a_board', 'cat' => array('ACP_CAT_DOT_MODS')),
				'colors_menu'		=> array('title' => 'MENU_COLORS', 'auth' => 'acl_a_board', 'cat' => array('ACP_CAT_DOT_MODS')),
				'buttons_menu'		=> array('title' => 'MENU_BUTTONS', 'auth' => 'acl_a_board', 'cat' => array('ACP_CAT_DOT_MODS')),
			),
		);
	}
}