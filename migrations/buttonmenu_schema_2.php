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

class buttonmenu_schema_2 extends \phpbb\db\migration\migration
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
		//global $user;

		$sample_data = [
			[
				'color_id'					=> '1',
				'color_name'				=> 'blue',
				'color_text'				=> '#ffffff',
				'color_text_hover'			=> '#ffffff',
				'color_text_hover_decor'	=> 'none',
				'color_text_weight'			=> 'bold',
				'color_display_search'		=> '0',
				'color_text_transform'		=> 'none',
				'color_align'				=> 'start',
				'color_bg_hover'			=> '#0f9be1',
				'menu_background'			=> 'transparent',
				'dropdown_background'		=> '#0686c5',
			],
		];

		// Insert sample button styles data
		$this->db->sql_multi_insert($this->table_prefix . 'menu_styles', $sample_data);
	}
}
