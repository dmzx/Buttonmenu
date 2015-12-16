<?php
/**
*
* @package phpBB Extension - Button Menu
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\buttonmenu\migrations;

class buttonmenu_schema_1 extends \phpbb\db\migration\migration
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
					'button_id'	=> '1', 'button_url'	=> 'http://www.google.com', 'button_name'	=> 'Example', 'button_external'	=> '1', 'button_display'	=> '1', 'button_only_registered'	=> '0',
					'button_only_guest'	=> '0', 'left_id' => '3', 'right_id' => '4', 'parent_id' => '0',
				),
				array(
					'button_id'	=> '2', 'button_url'	=> 'http://www.dmzx-web.net', 'button_name'	=> 'dmzx-web', 'button_external'	=> '1', 'button_display'	=> '1', 'button_only_registered'	=> '0', 'button_only_guest'	=> '0', 'left_id' => '4', 'right_id' => '5', 'parent_id' => '0',
				),

		);

		// Insert sample PM data
		$this->db->sql_multi_insert($this->table_prefix . 'menu_buttons', $sample_data);
	}
}
