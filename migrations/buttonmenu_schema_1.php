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

class buttonmenu_schema_1 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\dmzx\buttonmenu\migrations\buttonmenu_schema',
		];
	}

	public function update_data()
	{
		return [
			['custom', [[$this, 'insert_sample_data']]],
		];
	}

	public function insert_sample_data()
	{
		global $user;

		$sample_data = [
			[
				'button_id'					=> '1',
				'button_url'				=> 'https://www.google.com',
				'button_name'				=> 'Google',
				'button_icon'				=> 'fa-comments-o',
				'button_external'			=> '1',
				'button_display'			=> '1',
				'button_permission'			=> '0',
				'left_id'					=> '3',
				'right_id'					=> '4',
				'parent_id'					=> '0',
			],
		];

		// Insert sample PM data
		$this->db->sql_multi_insert($this->table_prefix . 'menu_buttons', $sample_data);
	}
}
