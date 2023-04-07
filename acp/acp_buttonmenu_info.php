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

class acp_buttonmenu_info
{
	function module()
	{
		return [
			'filename'	=> '\dmzx\buttonmenu\acp\acp_buttons_menu',
			'title'		=> 'MENU_TITLE',
			'version'	=> '1.0.1',
			'modes'		=> [
				'config_menu'		=> [
					'title' => 'MENU_CONFIG',
					'auth' => 'ext_dmzx/buttonmenu && acl_a_board',
					'cat' => ['MENU_TITLE']],
				'buttons_menu'		=> [
					'title' => 'MENU_BUTTONS',
					'auth' => 'ext_dmzx/buttonmenu && acl_a_board',
					'cat' => ['MENU_TITLE']],
				'styles_menu'		=> [
					'title' => 'MENU_STYLES',
					'auth' => 'ext_dmzx/buttonmenu && acl_a_board',
					'cat' => ['MENU_TITLE']],
			],
		];
	}
}
