<?php
/**
 *
 * Button Menu extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015-2023 dmzx - https://www.dmzx-web.net
 * @license GNU General Public License, version 2 (GPL-2.0)
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
	$lang = [];
}

//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, [
	'MENU_TITLE'					=> 'Buttons menu',
	'MENU_CONFIG'					=> 'Settings',
	'MENU_BUTTONS'					=> 'Buttons',
	'MENU_STYLES'					=> 'Styles',
	'ACP_MENU_STYLES_TITLE'	 		=> 'Styles management',
	'ACP_MENU_ADD_COLOR_TITLE'		=> 'Add color',
	'ACP_MENU_BUTTONS_TITLE'		=> 'Buttons management',
	'ACP_MENU_ADD_BUTTON_TITLE'		=> 'Create a new button',
	'ACP_MENU_ADD_COLOR_TITLE'		=> 'Create a new color',
	'ACP_MENU_ADD_SUBBUTTON_TITLE'	=> 'Create a new subbutton for',
	'ACP_MENU_BUTTON_ICON'			=> 'Link icon',
	'ACP_MENU_BUTTON_ICON_EXPLAIN'	=> 'Click in the field to select an icon or delete the current one.',
	'ACP_MENU_EDIT_BUTTON'	 		=> 'Edit button » ',
	'ACP_MENU_EDIT_COLOR'			=> 'Edit color',
	'ACP_MENU_ICON_CLOSE'			=> 'Close',
	'ACP_MENU_ICON_DELETE'			=> 'Delete',
	'ACP_MENU_ICON_SEARCH'			=> 'Search (eg. google)',

	'CREATE_BUTTON_EXPLAIN'		=> 'Here you can create or manage buttons. There are 2 types of buttons: parent buttons and subbuttons. To manage subbutton you have to click on its parent button.',
	'CREATE_COLOR_EXPLAIN'	 	=> 'Here you can create or manage colors and assign them to the styles.',

	'MENU_STYLE'				=> 'Assign to installed style',
	'MENU_STYLE_EXPLAIN'		=> 'This color of menu will be displayed only on style you choose.',

	'MENU_ENABLED'				=> 'Enable Buttons menu',
	'MENU_COLOR'				=> 'Color of the menu',
	'MENU_ALIGN'				=> 'Align of buttons',
	'MENU_SEARCH'				=> 'Display the search bar in the menu',
	'MENU_EXTERNAL'				=> 'The link will be opened in a new window',
	'MENU_FONT_COLOR'			=> 'Color of text',
	'MENU_FONT_COLOR_HOVER'		=> 'Color of hover text',
	'MENU_DECORATION'			=> 'Decoration of hover button',
	'MENU_TEXT_TRANSFORM'		=> 'Transform text',
	'MENU_WEIGHT'				=> 'Font weight',
	'MENU_BACKGROUND'			=> 'Menu background',
	'MENU_BACKGROUND_EXPLAIN'	=> 'Enter the value “transparent” to use the same background colour as the topics list.',
	'MENU_BGCOLOR_HOVER'		=> 'Background color on hover',
	'SUBMENU_BACKGROUND'		=> 'Sub menu background',

	'MENU_BUTTON'				=> 'Button',
	'MENU_BUTTON_NAME'			=> 'Button name',
	'MENU_BUTTON_NAME_EXPLAIN' 	=> 'You can use plain text or language variable such as {L_PRIVATE_MESSAGES}',
	'MENU_BUTTON_URL'			=> 'Link',
	'MENU_BUTTON_URL_EXPLAIN'	=> 'You can use URL adress including http:// protocol or template variable such as {U_PRIVATEMSGS}. You can find template variables in includes/functions.php file around line 5110',
	'ACP_BUTTON_ENABLE'					=> 'Enable the link',
	'ADD_BUTTON'				=> 'Create a new button',
	'ACP_PERMISSION'				=> 'Link display',
	'ACP_PERMISSION_EVERYBODY'		=> 'Everybody',
	'ACP_PERMISSION_GUEST'			=> 'Guests only',
	'ACP_PERMISSION_REGISTERED'	 	=> 'Registered users only',
	'MENU_BUTTON_PARENT'		=> 'Parent button',
	'MENU_BUTTON_PARENT_EXPLAIN' => 'Select the parent button if you want to have dropdown menu',
	'MENU_BUTTON_PARENT_NONE'	=> 'None',
	'MOVE_BUTTON_WITH_SUBS'		=> 'This button can’t became a subbutton because it has subbuttons.',
	'MENU_NAV'		 			=> 'Menu',

	'DELETE_BUTTON_CONFIRM'		=> 'Are you sure you want to delete this button?',
	'DELETE_SUBBUTTONS_CONFIRM'	=> 'Are you sure you want to delete this button and all its subbutons?',
	'NO_BUTTONS'				=> 'There is no button to manage',
	'NO_SUBBUTTONS'				=> 'There is no subbutton to manage',

	'MENU_COLOR_NAME'			=> 'Color name',
	'NO_COLORS'					=> 'There is no menu color. You should add one if you want to use Buttons menu MOD',
	'DELETE_COLOR_CONFIRM'	 	=> 'Are you sure you want to delete this color?',
	'COLOR_UPDATED'				=> 'Color has been updated succesfully',
	'NO_COLOR_NAME'				=> 'You haven’t filled in color name',
	'ADD_COLOR_EXPLAIN'			=> 'First of all you have to upload images to the ext/dmzx/buttonmenu/styles/prosilver/theme/images/menu/your_color folder. Then add the color with the "your_color" name.',

	'MENU_NORMAL'				=> 'Normal',
	'MENU_BOLD'					=> 'Bold',
	'MENU_NONE'					=> 'none',
	'MENU_LOWERCASE'			=> 'lowercase',
	'MENU_UPPERCASE'			=> 'uppercase',
	'MENU_ALIGN_START'			=> 'left',
	'MENU_ALIGN_END'			=> 'right',
	'MENU_UNDERLINE'			=> 'underline',

	'BUTTON_UPDATED'			=> 'Button has been updated succesfully',
	'BUTTON_ADDED'			 	=> 'A new button has been added succesfully',
	'COLOR_ADDED'				=> 'A new color has been added succesfully',
	'COLOR_ANOTHER_STYLE'		=> 'You can not assign this color to "%1$s" style because there is "%2$s" color assigned to that style.',
]);
