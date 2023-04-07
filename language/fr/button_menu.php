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
	'SKIP_TO_CONTENT'		=> 'Aller au contenu',
	'SKIP_TO_NAVBAR'		=> 'Aller au menu des fonctionnalités',
	'INFO_EXTERNAL'			=> 'S’ouvre dans un nouvel onglet',
	'MENU'					=> 'Menu',
	'MENU_CLOSE'			=> 'Fermer le menu',
	'MENU_OPEN'				=> 'Ouvrir le menu',
	'SHOW_HIDE_MENU'		=> 'Afficher ou masquer le menu',
	'SHOW_HIDE_SUBMENU'		=> 'Afficher ou masquer le sous-menu',
	'SUBMENU_CLOSE'			=> 'Fermer le sous-menu',
	'SUBMENU_OPEN'			=> 'Ouvrir le sous-menu',
]);
