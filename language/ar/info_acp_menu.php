<?php
/**
*
* @package phpBB Extension - Button Menu
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'MENU_TITLE'					=> 'قائمة الأزرار',
	'MENU_CONFIG'					=> 'الإعدادات',
	'MENU_BUTTONS'					=> 'الأزرار',
	'MENU_COLORS'					=> 'الألوان',
	'ACP_MENU_COLORS_TITLE'	 		=> 'إدارة الألوان',
	'ACP_MENU_ADD_COLOR_TITLE'		=> 'إضافة لون',
	'ACP_MENU_BUTTONS_TITLE'		=> 'إدارة الأزرار',
	'ACP_MENU_ADD_BUTTON_TITLE'		=> 'إنشاء زر جديد',
	'ACP_MENU_ADD_COLOR_TITLE'		=> 'إنشاء لون جديد',
	'ACP_MENU_ADD_SUBBUTTON_TITLE'	=> 'إنشاء زرار فرعي جديد لـ ',
	'ACP_MENU_EDIT_BUTTON'	 		=> 'تعديل الزرار',
	'ACP_MENU_EDIT_COLOR'			=> 'تعديل اللون',

	'CREATE_BUTTON_EXPLAIN'		=> 'هنا تستطيع إنشاء أو إدارة الأزرار. هناك طريقتين لإنشاء الأزرار : ( الأزرار الأب / الرئيسية ) أو ( الأزرار الفرعية ). يجب عليك النقر على الزرار الأب لكي تستطيع إدارة الزرار الفرعي له.',
	'CREATE_COLOR_EXPLAIN'	 	=> 'هنا تستطيع إنشاء أو إدارة الألوان وتخصيص كل لون إلى الإستايل الذي تريده.',

	'MENU_STYLE'				=> 'تخصيص للإستايل المُثبت ',
	'MENU_STYLE_EXPLAIN'		=> 'هذا اللون للقائمة سوف يظهر في الإستايل الذي حددته فقط.',

	'MENU_ENABLED'				=> 'تفعيل ',
	'MENU_COLOR'				=> 'لون القائمة ',
	'MENU_ALIGN'				=> 'إتجاه الأزرار ',
	'MENU_SEARCH'				=> 'عرض شريط البحث في القائمة ',
	'MENU_EXTERNAL'				=> 'فتح الرابط في نافذة جديدة ',
	'MENU_FONT_COLOR'			=> 'لون النص ( تنسيق ست عشري hex )',
	'MENU_FONT_COLOR_HOVER'		=> 'اللون عند الإشارة بالماوس ( تنسيق ست عشري hex )',
	'MENU_DECORATION'			=> 'التشكيل عند الإشارة بالماوس ',
	'MENU_TEXT_TRANSFORM'			=> 'حالة النص ',
	'MENU_WEIGHT'				=> 'عرض الخط ',

	'MENU_BUTTON'				=> 'زرار',
	'MENU_BUTTON_NAME'			=> 'إسم الزرار ',
	'MENU_BUTTON_NAME_EXPLAIN' 	=> 'تستطيع استخدام النص العادي أو متغيرات اللغة كـ {L_PRIVATE_MESSAGES}',
	'MENU_BUTTON_URL'			=> 'الرابط ',
	'MENU_BUTTON_URL_EXPLAIN'	=> 'تستطيع استخدام عنوان الرابط بإضافة http:// أو استخدام متغيرات القالب مثل : {U_PRIVATEMSGS}. تستطيع العثور على المزيد من المتغيرات في الملف includes/functions.php تقريباً السطر 5110',
	'MENU_DISPLAY'				=> 'عرض الزرار ',
	'ADD_BUTTON'				=> 'إنشاء زرار جديد ',
	'MENU_ONLY_REGISTERED'	 	=> 'الظهور للأعضاء المسجلين فقط ',
	'MENU_ONLY_GUEST'			=> 'الظهور للزائرين فقط ',
	'MENU_BUTTON_PARENT'		=> 'الزرار الأب ',
	'MENU_BUTTON_PARENT_EXPLAIN'=> 'حدد الزرار الأب لو تريد قائمة مُنسدلة',
	'MOVE_BUTTON_WITH_SUBS'		=> 'لا تستطيع تغيير هذا الزرار إلى زرار فرعي لأنه يحتوي على أزرار فرعية.',
	'MENU_NAV'		 			=> 'القائمة',

	'DELETE_BUTTON_CONFIRM'		=> 'متأكد أنك تريد حذف هذا الزرار ؟',
	'DELETE_SUBBUTTONS_CONFIRM'	=> 'متأكد أنك تريد حذف هذا الزرار  وجميع الأزرار الفرعية لها ؟',
	'NO_BUTTONS'				=> 'لا يوجد زرار لإدارته',
	'NO_SUBBUTTONS'				=> 'لا يوجد زرار فرعي لإدارته',

	'MENU_COLOR_NAME'			=> 'إسم اللون ',
	'NO_COLORS'					=> 'لا توجد أي قائمة ألوان. يجب عليك إنشاء قائمة لون لكي تستطيع استخدام هذه الإضافة',
	'DELETE_COLOR_CONFIRM'	 	=> 'متأكد أنك تريد حذف هذا اللون ؟',
	'COLOR_UPDATED'				=> 'تم تحديث اللون بنجاح',
	'NO_COLOR_NAME'				=> 'يجب عليك كتابة إسم اللون',
	'ADD_COLOR_EXPLAIN'			=> 'يجب عليك أولاً جمع الصور في مجلد ورفعه إلى المسار ext/dmzx/buttonmenu/styles/prosilver/theme/images/menu/. ثم إضافة اللون بإسم "your_color".',

	'MENU_BLUE'					=> 'أزرق',
	'MENU_GRAY'					=> 'رمادي',
	'MENU_BLACK'				=> 'أسود',
	'MENU_ORANGE'				=> 'برتقالي',
	'MENU_BROWN'				=> 'بني',
	'MENU_NORMAL'				=> 'عادي',
	'MENU_BOLD'					=> 'سميك',
	'MENU_NONE'					=> 'بدون',
	'MENU_LOWERCASE'			=> 'حرف صغير',
	'MENU_UPPERCASE'			=> 'حرف كبير',
	'MENU_LEFT'					=> 'يسار',
	'MENU_RIGHT'				=> 'يمين',
	'MENU_UNDERLINE'			=> 'خط أسفل الكلمة',

	'BUTTON_UPDATED'			=> 'تم تحديث الزرار بنجاح',
	'BUTTON_ADDED'			 	=> 'تم إضافة زرار جديد بنجاح',
	'COLOR_ADDED'				=> 'تم إضافة لون جديد بنجاح',
	'COLOR_ANOTHER_STYLE'		=> 'لا تستطيع تخصيص هذا اللون إلى الإستايل "%1$s" لأنه يوجد نفس اللون "%2$s" مُخصص مُسبقاً إلى ذلك الإستايل.',
));
