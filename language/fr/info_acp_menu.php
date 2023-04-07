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
	'MENU_TITLE'					=> 'Menu',
	'MENU_CONFIG'					=> 'Paramètres',
	'MENU_BUTTONS'					=> 'Liens',
	'MENU_STYLES'					=> 'Styles',
	'ACP_MENU_STYLES_TITLE'	 		=> 'Gestion des styles',
	'ACP_MENU_ADD_COLOR_TITLE'		=> 'Ajouter une couleur',
	'ACP_MENU_BUTTONS_TITLE'		=> 'Gestion des liens',
	'ACP_MENU_ADD_BUTTON_TITLE'		=> 'Créer un nouveau lien',
	'ACP_MENU_ADD_COLOR_TITLE'		=> 'Créer une nouvelle couleur',
	'ACP_MENU_ADD_SUBBUTTON_TITLE'	=> 'Créez un nouveau sous-lien enfant de',
	'ACP_MENU_BUTTON_ICON'			=> 'Icône du lien',
	'ACP_MENU_BUTTON_ICON_EXPLAIN'	=> 'Cliquez dans le champ pour sélectionner une icône ou supprimer l’actuelle.',
	'ACP_MENU_EDIT_BUTTON'	 		=> 'Modifier le lien » ',
	'ACP_MENU_EDIT_COLOR'			=> 'Modifier le style',
	'ACP_MENU_ICON_CLOSE'			=> 'Fermer',
	'ACP_MENU_ICON_DELETE'			=> 'Supprimer',
	'ACP_MENU_ICON_SEARCH'			=> 'Rechercher (ex. google)',

	'CREATE_BUTTON_EXPLAIN'		=> 'Vous pouvez ici créer ou gérer des liens. Il existe deux types de liens : les liens parents et les sous-liens. Pour gérer un sous-lien, vous devez cliquer sur son lien parent.',
	'CREATE_COLOR_EXPLAIN'	 	=> 'Vous pouvez ici créer ou gérer des couleurs et les affecter aux styles. (Fonctionnalité foireuse...)',

	'MENU_STYLE'				=> 'Assigner au style',
	'MENU_STYLE_EXPLAIN'		=> 'Cette couleur de menu sera affichée uniquement sur le style que vous avez sélectionné.',

	'MENU_ENABLED'				=> 'Activer le menu',
	'MENU_COLOR'				=> 'Couleur du menu',
	'MENU_ALIGN'				=> 'Alignement des liens',
	'MENU_SEARCH'				=> 'Afficher la barre de recherche dans le menu',
	'MENU_EXTERNAL'				=> 'Ouvrir le lien dans une nouvelle fenêtre',
	'MENU_FONT_COLOR'			=> 'Couleur du texte',
	'MENU_FONT_COLOR_HOVER'		=> 'Couleur du texte au survol',
	'MENU_DECORATION'			=> 'Décoration au survol au survol du lien',
	'MENU_TEXT_TRANSFORM'		=> 'Transformation du texte',
	'MENU_WEIGHT'				=> 'Graisse de la police',
	'MENU_BACKGROUND'			=> 'Couleur de fond du menu',
	'MENU_BACKGROUND_EXPLAIN'	=> 'Saisissez la valeur « transparent » pour utiliser la même couleur de fond que la liste des sujets.',
	'MENU_BGCOLOR_HOVER'		=> 'Couleur de fond au survol',
	'SUBMENU_BACKGROUND'		=> 'Couleur de fond du sous-menu',

	'MENU_BUTTON'				=> 'Lien',
	'MENU_BUTTON_NAME'			=> 'Nom du lien',
	'MENU_BUTTON_NAME_EXPLAIN' 	=> 'Vous pouvez utiliser du texte brut ou une variable de langue telle que <code>{L_PRIVATE_MESSAGES}</code>.',
	'MENU_BUTTON_URL'			=> 'URL',
	'MENU_BUTTON_URL_EXPLAIN'	=> 'Vous pouvez utiliser une adresse URL incluant le protocole <code>https://</code> ou une variable de template telle que <code>{U_PRIVATEMSGS}</code>. Vous pouvez trouver les variables de template dans le fichier includes/functions.php vers la ligne 5110.',
	'ACP_BUTTON_ENABLE'				=> 'Activer le lien',
	'ADD_BUTTON'					=> 'Créer un nouveau lien',
	'ACP_PERMISSION'				=> 'Affichage du lien',
	'ACP_PERMISSION_EVERYBODY'		=> 'Tout le monde',
	'ACP_PERMISSION_GUEST'			=> 'Invités uniquement',
	'ACP_PERMISSION_REGISTERED'	 	=> 'Utilisateurs enregistrés uniquement',
	'MENU_BUTTON_PARENT'			=> 'Lien parent',
	'MENU_BUTTON_PARENT_EXPLAIN'	=> 'Sélectionnez le lien parent pour créer un sous-menu.',
	'MENU_BUTTON_PARENT_NONE'		=> 'Aucun',
	'MOVE_BUTTON_WITH_SUBS'			=> 'Ce lien ne peut pas devenir un sous-lien car il a un sous-menu.',
	'MENU_NAV'		 				=> 'Menu',

	'DELETE_BUTTON_CONFIRM'		=> 'Êtes-vous sûr de vouloir supprimer ce lien ?',
	'DELETE_SUBBUTTONS_CONFIRM'	=> 'Êtes-vous sûr de vouloir supprimer ce lien et tous ses sous-liens ?',
	'NO_BUTTONS'				=> 'Il n’y a aucun lien à gérer',
	'NO_SUBBUTTONS'				=> 'Il n’y a aucun sous-lien à gérer',

	'MENU_COLOR_NAME'			=> 'Nom de la couleur',
	'NO_COLORS'					=> 'Il n’y a pas de couleur de menu. Vous devez en ajouter une si vous souhaitez utiliser l’extension.',
	'DELETE_COLOR_CONFIRM'	 	=> 'Êtes-vous sûr de vouloir supprimer cette couleur ?',
	'COLOR_UPDATED'				=> 'La couleur a été actualisée avec succès',
	'NO_COLOR_NAME'				=> 'Vous n’avez pas saisi le nom de la couleur',
	'ADD_COLOR_EXPLAIN'			=> 'Vous devez tout d’abord télécharger des images dans le dossier ext/dmzx/buttonmenu/styles/prosilver/theme/images/menu/your_color. Ensuite, ajoutez la couleur avec le nom "votre_couleur".',

	'MENU_NORMAL'				=> 'Normal',
	'MENU_BOLD'					=> 'Gras',
	'MENU_NONE'					=> 'Aucune',
	'MENU_LOWERCASE'			=> 'Minuscule',
	'MENU_UPPERCASE'			=> 'Majuscule',
	'MENU_ALIGN_START'			=> 'Gauche',
	'MENU_ALIGN_END'			=> 'Droite',
	'MENU_UNDERLINE'			=> 'Souligné',

	'BUTTON_UPDATED'			=> 'Le lien a été actualisé avec succès',
	'BUTTON_ADDED'			 	=> 'Le nouveau lien a été ajouté avec succès',
	'COLOR_ADDED'				=> 'Une nouvelle couleur a été ajoutée avec succès',
	'COLOR_ANOTHER_STYLE'		=> 'Vous ne pouvez pas attribuer cette couleur au style "%1$s" car la couleur "%2$s" lui est déjà assignée.',
]);
