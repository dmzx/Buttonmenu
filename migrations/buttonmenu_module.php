<?php
/**
*
* @package phpBB Extension - Button Menu
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\buttonmenu\migrations;

class buttonmenu_module extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'MENU_TITLE')),
			array('module.add', array(
			'acp', 'MENU_TITLE', array(
					'module_basename' => '\dmzx\buttonmenu\acp\acp_buttonmenu_module',
					'modes'				=> array('config_menu', 'buttons_menu', 'colors_menu'),
					'module_auth'		=> 'acl_a_',
				),
			)),
		);
	}
}
