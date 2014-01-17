<?php	 	
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'heroku_e66bd5256395125');

/** Имя пользователя MySQL */
define('DB_USER', 'bf7a295cb38d68');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '8cae0c19');

/** Имя сервера MySQL */
define('DB_HOST', 's-cdbr-east-04.cleardb.com');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'X_//G}DrqpTVCI/hQ;?,Tkp7PH@:Q#(^u9+h7z00VlYr+)}=kz_JYC`;v%z$e=bI');
define('SECURE_AUTH_KEY',  'E;`ZHg;_[-jx1)pr/zt~-w){:B}Udm,S?2z[.nMjVI9szET8g;]u3&)Mw9YD04D/');
define('LOGGED_IN_KEY',    '}:!@Z.}ZPgNw`,z8&t8[{H[=TQ;7!aZ9VrHL52eKu[2KFXza [$q=&5&v2lE>wXX');
define('NONCE_KEY',        '4xB):;GJ(q>A3.3hNq9mP|{#M -:&[;s70;FhL&|X^:iqtU&e-{UPGO+YOM9Sqem');
define('AUTH_SALT',        '*tW13::GB65zL)kC(fwD|6;zM@$ck_T&fU,L6kf_}}S|sejt%|ow9M.,J^_r+c75');
define('SECURE_AUTH_SALT', 'j%6A/%6;2$x5;d? [IXFK>C{Z)Zdj$aQFD8/!v^tJEFb0-EpdoM]0+R]ti!E)(Ts');
define('LOGGED_IN_SALT',   'R@JC7wGQLS29DIi:^~V81*iZ8d}C1(z}-RFiA)+,Ndgt3|)u[Us:F:].FuAWH)bC');
define('NONCE_SALT',       '{j-5tWy}?,Jhx3AFT2G:R~1{25V@|m]$>r9@L+vTi(.i(&&|w4V2.4:}@|-&+K|J');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
