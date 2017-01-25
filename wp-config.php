<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 't');

/** Имя пользователя MySQL */
define('DB_USER', 'tr');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 't');

/** Имя сервера MySQL */
define('DB_HOST', '192.16');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Srx$>l(D3gZ]YR6WF4*MC(@L7v-Qeko,#2ccDe-.lIo_qjU}KevRv`C2MOxEU~s6');
define('SECURE_AUTH_KEY',  'imdL`y-(MKvW/K=M0!4N6_)MKW]L>r,#6w$By{fZ.C}M@gBg,&BN@n.eUQC a+lD');
define('LOGGED_IN_KEY',    '^!%gC.C6m6}pv[yI+qwQ#[Vh|:^. ;2Z~E5}V!!e^@W`,A3e#:[%JKoE? t%G>%[');
define('NONCE_KEY',        '&?lZ)|uXD})PS$+Us.pVc]3(=K~5y#IUheUdFIss}EPe$-0dbBHT^5#%UykF[~Sg');
define('AUTH_SALT',        'U<&.Mm|RTNdDID}=+mI7{$ OE9&0/X&#%kbl.2bH gZ<!C$(/Lw9F3>m![En7=3R');
define('SECURE_AUTH_SALT', 'QggO90~o+wO=5N7ignk5U|H&_8}G9+;912arx~#vqy/{t{ y;m#A>mdrh UQitw}');
define('LOGGED_IN_SALT',   '%^zM:~B5`Lu~JLrmM?DCW?XnrgN[K5(}l.pSyD)ZIN;n]4o]{1cMs6?O(7}Mh~?y');
define('NONCE_SALT',       'hvCjKK]O&gURgM+_Lyi+;bWh;5<5]C~eq{RPVE.C3`{]>ih&8sxtXwyfwJ$(xXWH');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
