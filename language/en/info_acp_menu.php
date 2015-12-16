<?php
/**
*
* @package phpBB Extension - Button Menu
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'MENU_TITLE'					=> 'Buttons menu',
	'MENU_CONFIG'					=> 'Settings',
	'MENU_BUTTONS'					=> 'Buttons',
	'MENU_COLORS'					=> 'Colors',
	'ACP_MENU_COLORS_TITLE'	 		=> 'Colors management',
	'ACP_MENU_ADD_COLOR_TITLE'		=> 'Add color',
	'ACP_MENU_BUTTONS_TITLE'		=> 'Buttons management',
	'ACP_MENU_ADD_BUTTON_TITLE'		=> 'Create a new button',
	'ACP_MENU_ADD_COLOR_TITLE'		=> 'Create a new color',
	'ACP_MENU_ADD_SUBBUTTON_TITLE'	=> 'Create a new subbutton for',
	'ACP_MENU_EDIT_BUTTON'	 		=> 'Edit button',
	'ACP_MENU_EDIT_COLOR'			=> 'Edit color',

	'CREATE_BUTTON_EXPLAIN'		=> 'Here you can create or manage buttons. There are 2 types of buttons: parent buttons and subbuttons. To manage subbutton you have to click on its parent button.',
	'CREATE_COLOR_EXPLAIN'	 	=> 'Here you can create or manage colors and assign them to the styles.',

	'MENU_STYLE'				=> 'Assign to installed style',
	'MENU_STYLE_EXPLAIN'		=> 'This color of menu will be displayed only on style you choose.',

	'MENU_ENABLED'				=> 'Enable Buttons menu',
	'MENU_COLOR'				=> 'Color of the menu',
	'MENU_ALIGN'				=> 'Align of buttons',
	'MENU_SEARCH'				=> 'Display the search bar in the menu',
	'MENU_EXTERNAL'				=> 'The link will be opened in a new window',
	'MENU_FONT_COLOR'			=> 'Color of text (hex format)',
	'MENU_FONT_COLOR_HOVER'		=> 'Color of hover text (hex format)',
	'MENU_DECORATION'			=> 'Decoration of hover button',
	'MENU_TEXT_TRANSFORM'			=> 'Transform text',
	'MENU_WEIGHT'				=> 'Font weight',

	'MENU_BUTTON'				=> 'Button',
	'MENU_BUTTON_NAME'			=> 'Button name',
	'MENU_BUTTON_NAME_EXPLAIN' 	=> 'You can use plain text or language variable such as {L_PRIVATE_MESSAGES}',
	'MENU_BUTTON_URL'			=> 'Link',
	'MENU_BUTTON_URL_EXPLAIN'	=> 'You can use URL adress including http:// protocol or template variable such as {U_PRIVATEMSGS}. You can find template variables in includes/functions.php file around line 5110',
	'MENU_DISPLAY'				=> 'Display the button',
	'ADD_BUTTON'				=> 'Create a new button',
	'MENU_ONLY_REGISTERED'	 	=> 'Display only to registered users',
	'MENU_ONLY_GUEST'			=> 'Display only to guests',
	'MENU_BUTTON_PARENT'		=> 'Parent button',
	'MENU_BUTTON_PARENT_EXPLAIN'=> 'Select the parent button if you want to have dropdown menu',
	'MOVE_BUTTON_WITH_SUBS'		=> 'This button can\'t became a subbutton because it has subbuttons.',
	'MENU_NAV'		 			=> 'Menu',

	'DELETE_BUTTON_CONFIRM'		=> 'Are you sure you want to delete this button?',
	'DELETE_SUBBUTTONS_CONFIRM'	=> 'Are you sure you want to delete this button and all its subbutons?',
	'NO_BUTTONS'				=> 'There is no button to manage',
	'NO_SUBBUTTONS'				=> 'There is no subbutton to manage',

	'MENU_COLOR_NAME'			=> 'Color name',
	'NO_COLORS'					=> 'There is no menu color. You should add one if you want to use Buttons menu MOD',
	'DELETE_COLOR_CONFIRM'	 	=> 'Are you sure you want to delete this color?',
	'COLOR_UPDATED'				=> 'Color has been updated succesfully',
	'NO_COLOR_NAME'				=> 'You haven\'t filled in color name',
	'ADD_COLOR_EXPLAIN'			=> 'First of all you have to upload images to the ext/dmzx/buttonmenu/styles/prosilver/theme/images/menu/your_color folder. Then add the color with the "your_color" name.',

	'MENU_BLUE'					=> 'Blue',
	'MENU_GRAY'					=> 'Gray',
	'MENU_BLACK'				=> 'Black',
	'MENU_ORANGE'				=> 'Orange',
	'MENU_BROWN'				=> 'Brown',
	'MENU_NORMAL'				=> 'Normal',
	'MENU_BOLD'					=> 'Bold',
	'MENU_NONE'					=> 'none',
	'MENU_LOWERCASE'			=> 'lowercase',
	'MENU_UPPERCASE'			=> 'uppercase',
	'MENU_LEFT'					=> 'left',
	'MENU_RIGHT'				=> 'right',
	'MENU_UNDERLINE'			=> 'underline',

	'BUTTON_UPDATED'			=> 'Button has been updated succesfully',
	'BUTTON_ADDED'			 	=> 'A new button has been added succesfully',
	'COLOR_ADDED'				=> 'A new color has been added succesfully',
	'COLOR_ANOTHER_STYLE'		=> 'You can not assign this color to "%1$s" style because there is "%2$s" color assigned to that style.',
));
