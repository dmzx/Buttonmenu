<?php
/**
*
* @package phpBB Extension - Button Menu
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\buttonmenu\migrations;

class buttonmenu_schema extends \phpbb\db\migration\migration
{

	public function update_data()
	{
		return array(
			// Add config
			array('config.add', array('menu_enabled', '1')),
		);
	}

	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
				$this->table_prefix . 'menu_buttons' => array(
				'COLUMNS'	=> array(
					'button_id'				 => array('UINT', NULL, 'auto_increment'),
					'button_url'			 => array('TEXT', ''),
					'button_name'			 => array('VCHAR', ''),
					'button_external'		 => array('BOOL', 0),
					'button_display'		 => array('BOOL', 1),
					'button_only_registered' => array('BOOL', 0),
					'button_only_guest'		 => array('BOOL', 0),
					'left_id'				 => array('UINT', 0),
					'right_id'				 => array('UINT', 0),
					'parent_id'				 => array('UINT', 0),
					),
					'PRIMARY_KEY' => array('button_id'),
				),
				$this->table_prefix . 'menu_colors'	=> array(
				'COLUMNS'	=> array(
					'color_id'				 => array('UINT', NULL, 'auto_increment'),
					'color_name'			 => array('VCHAR', ''),
					'color_text'			 => array('VCHAR', 'FFFFFF'),
					'color_text_hover'		 => array('VCHAR', 'FFFFFF'),
					'color_text_hover_decor' => array('VCHAR', 'none'),
					'color_text_weight'		 => array('VCHAR', 'bold'),
					'color_display_search'	 => array('BOOL', 1),
					'color_text_transform'	 => array('VCHAR', 'none'),
					'color_align'			 => array('VCHAR', 'left'),
					'color_style_id'		 => array('UINT', 0),
				),
					'PRIMARY_KEY' => array('color_id'),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array(
				$this->table_prefix . 'menu_buttons',
				$this->table_prefix . 'menu_colors',
			),
		);
	}

}