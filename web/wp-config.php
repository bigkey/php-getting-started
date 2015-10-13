<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'resungro_test');

/** MySQL database username */
define('DB_USER', 'resungro_test');

/** MySQL database password */
define('DB_PASSWORD', 'RwtPe3L{0N3r');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?A*mcy+c?1[~k|X?G^sX;z~.>v(Xmf8yi=>,Hr[cz~!FGoB-*+YX-xW;,pqB^jHH');
define('SECURE_AUTH_KEY',  'T+!^A;y +n:x`3 3Hi^4J||w+tmu${|19;rwnJ^c_-_n[S68p?B^$}{ABJIs?@,V');
define('LOGGED_IN_KEY',    '>2:0n]y 5^`AIauU$X?p-Jqdv+-T_ mj}T^z49c~|*7d+h%,+8`*[=Z3/F#XVC-Q');
define('NONCE_KEY',        'wa,~j@BAtm6`&4C]Amu,6M,G#E?C-qct2UW? Cw%=klBHR6zo7ly/N&KyJ-#2-0q');
define('AUTH_SALT',        'D/_-caJEQ>L(YDIBx/V/zOHeRC,qNO^dCBwP6|ebw^#K}m{NkNsX[(tr:=0elOa`');
define('SECURE_AUTH_SALT', 'U,e).Rn#Z,1^M%1L.rO[{w|-r;AkMyENRy*BJ[CzF-F,Y+Y8ijz$~Os8-4ueR[f;');
define('LOGGED_IN_SALT',   'i,-<ACwQ2JamIK0N<#.w1oxw-c5YxGji=H$~1>#ao#qd-d#D`N/D((};~.!M^ZD;');
define('NONCE_SALT',       'hr9V(Mgpf)mw9V-v/8T5QWUW[C=Lun*JjL|Y4.B%M>CajYd&1kAC((dfmmSy*xy0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'resun-group.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_ALLOW_MULTISITE', true);
