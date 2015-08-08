<?php
/**
*
* @package phpBB Extension - Button Menu
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\buttonmenu\migrations;

class buttonmenu_schema_2 extends \phpbb\db\migration\migration
{

	static public function depends_on()
	{
		return array(
			'\dmzx\buttonmenu\migrations\buttonmenu_schema',
		);
	}

	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'insert_sample_data'))),
		);
	}

	public function insert_sample_data()
	{
		global $user;

		$sample_data = array(
				array(
					'color_id'	=> '1', 'color_name'	=> 'blue', 'color_text'	=> 'FFFFFF', 'color_text_hover'	=> 'FFFFFF', 'color_text_hover_decor'	=> 'none', 'color_text_weight'	=> 'bold', 'color_display_search'	=> '1', 'color_text_transform'	=> 'none', 'color_align'	=> 'left',
				),
				array(
					'color_id'	=> '2', 'color_name'	=> 'black', 'color_text'	=> 'FFFFFF', 'color_text_hover'	=> 'FFFFFF', 'color_text_hover_decor'	=> 'none', 'color_text_weight'	=> 'bold', 'color_display_search'	=> '1', 'color_text_transform'	=> 'none', 'color_align'	=> 'left',
				),
				array(
					'color_id'	=> '3', 'color_name'	=> 'brown', 'color_text'	=> 'FFFFFF', 'color_text_hover'	=> 'FFFFFF', 'color_text_hover_decor'	=> 'none', 'color_text_weight'	=> 'bold', 'color_display_search'	=> '1', 'color_text_transform'	=> 'none', 'color_align'	=> 'left',
				),
				array(
					'color_id'	=> '4', 'color_name'	=> 'gray', 'color_text'	=> 'FFFFFF', 'color_text_hover'	=> 'FFFFFF', 'color_text_hover_decor'	=> 'none', 'color_text_weight'	=> 'bold', 'color_display_search'	=> '1', 'color_text_transform'	=> 'none', 'color_align'	=> 'left',
				),
				array(
					'color_id'	=> '5', 'color_name'	=> 'orange', 'color_text'	=> 'FFFFFF', 'color_text_hover'	=> 'FFFFFF', 'color_text_hover_decor'	=> 'none', 'color_text_weight'	=> 'bold', 'color_display_search'	=> '1', 'color_text_transform'	=> 'none', 'color_align'	=> 'left',
				),

		);

		// Insert sample PM data
		$this->db->sql_multi_insert($this->table_prefix . 'menu_colors', $sample_data);
	}
}