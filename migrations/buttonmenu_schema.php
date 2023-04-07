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

class buttonmenu_schema extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return [
			// Add config
			['config.add', ['menu_enabled', '1']],
		];
	}

	public function update_schema()
	{
		return [
			'add_tables'	=> [
				$this->table_prefix . 'menu_buttons' => [
				'COLUMNS'	=> [
					'button_id'				 	=> ['UINT', null, 'auto_increment'],
					'button_url'			 	=> ['TEXT', ''],
					'button_name'			 	=> ['VCHAR', ''],
					'button_icon'		 		=> ['VCHAR', ''],
					'button_external'		 	=> ['BOOL', 0],
					'button_display'		 	=> ['BOOL', 1],
					'button_permission'		 	=> ['VCHAR', 0],
					'left_id'				 	=> ['UINT', 0],
					'right_id'				 	=> ['UINT', 0],
					'parent_id'				 	=> ['UINT', 0],
					],
					'PRIMARY_KEY' => ['button_id'],
				],
				$this->table_prefix . 'menu_styles'	=> [
				'COLUMNS'	=> [
					'color_id'				 	=> ['UINT', null, 'auto_increment'],
					'color_name'			 	=> ['VCHAR', ''],
					'color_text'			 	=> ['VCHAR', '#ffffff'],
					'color_text_hover'		 	=> ['VCHAR', '#ffffff'],
					'color_text_hover_decor'	=> ['VCHAR', 'none'],
					'color_text_weight'		 	=> ['VCHAR', 'bold'],
					'color_display_search'	 	=> ['BOOL', 0],
					'color_text_transform'	 	=> ['VCHAR', 'none'],
					'color_align'			 	=> ['VCHAR', 'start'],
					'color_bg_hover'		 	=> ['VCHAR', 'transparent'],
					'color_style_id'		 	=> ['UINT', 0],
					'menu_background'		 	=> ['VCHAR', 'transparent'],
					'dropdown_background'		=> ['VCHAR', '#0686c5'],
				],
					'PRIMARY_KEY' => ['color_id'],
				],
			],
			'add_columns'	=> [
				$this->table_prefix . 'styles'	=> [
					'buttonmenu_id'    => ['UINT', 0],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_tables'	=> [
				$this->table_prefix . 'menu_buttons',
				$this->table_prefix . 'menu_styles',
			],
			'drop_columns'	 => [
				$this->table_prefix . 'styles'	=> [
					'buttonmenu_id',
				],
			],
		];
	}
}
