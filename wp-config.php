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
define('DB_NAME', 'test.wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1111');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
 define('AUTH_KEY',         ':vbQoHO)Eo1C+%f[Y+{|,CD6-A4;L-=xyj=Qsk. Jrv$gImkh}.}$,lB5v+{&OmW');
 define('SECURE_AUTH_KEY',  'nd2+auB[In]C}H[Vt%^,qqO|helKnT[|U?lQG143=q-7*CLV_.4|&ptk5t-As#n`');
 define('LOGGED_IN_KEY',    '2?-Y+Rr9d--PlHPQ%+5@~X79xH?3>WN+0xI-YtL@fB6be|&?qTjLGN4`*lpi^KPd');
 define('NONCE_KEY',        'C;%b>G}A({{yKRxq]_?DH!Rs5dmJ;vp]A#,gZ7:#CGE=C,a]`C~s-h|5k7iskt|w');
 define('AUTH_SALT',        'vK`)f?ks* b7X#+F_EjW^t{G|^RqsivvY#77m~.Sze?btjnl:0:*bud@e$U <>VH');
 define('SECURE_AUTH_SALT', '^jcKHz7B8mjDl9wVAz@nPTlq2^pwZm+QbxU0w)&ym8[Je:XR pA%`1Wp?G$4,Kc6');
 define('LOGGED_IN_SALT',   'qdt&S&hCyyDWX0WCBP,N@}H,gT{[UJ!<$+xMIyZb/%LMR$+#+[oC+x<F|PZk*-zn');
 define('NONCE_SALT',       's49;Ui^:.R: -&&sF$1R7L^uQD>i*,E.@sY[B{O1{03yXl>6kN*q.z-#4{kL-Q $');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
