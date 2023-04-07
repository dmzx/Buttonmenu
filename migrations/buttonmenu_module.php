<?php
/**
 *
 * Button Menu extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015-2023 dmzx - https://www.dmzx-web.net
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\buttonmenu\migrations;

class buttonmenu_module extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return [
			['module.add', ['acp', 'ACP_CAT_DOT_MODS', 'MENU_TITLE']],
			['module.add', [
			'acp', 'MENU_TITLE', [
					'module_basename' 	=> '\dmzx\buttonmenu\acp\acp_buttonmenu_module',
					'modes'				=> ['config_menu', 'buttons_menu', 'styles_menu'],
				],
			]],
		];
	}
}
