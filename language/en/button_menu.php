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

$lang = array_merge($lang, [
	'SKIP_TO_CONTENT'			=> 'Skip to content',
	'SKIP_TO_NAVBAR'			=> 'Skip to the features menu',
	'INFO_EXTERNAL'			=> 'Opens in new tab',
	'MENU'					=> 'Menu',
	'MENU_CLOSE'			=> 'Close menu',
	'MENU_OPEN'				=> 'Open menu',
	'SHOW_HIDE_MENU'		=> 'Show or hide the menu',
	'SHOW_HIDE_SUBMENU'		=> 'Show or hide the submenu',
	'SUBMENU_CLOSE'			=> 'Close sub-menu',
	'SUBMENU_OPEN'			=> 'Open sub-menu',
]);
