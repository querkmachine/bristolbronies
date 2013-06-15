<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bristolbronies-wp2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'database');

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
define('AUTH_KEY',         'iBLsf0{#`c**tv+yhOcz^6w9]Q%-lX^ h R~gubiaI+WwA}{M:&kE*5F~]R3|i+8');
define('SECURE_AUTH_KEY',  '`}C^k}ZY-5aMjnc0{bQB$Tq!<G?l%WqgnF|P[2XGQ/Ub3Bow038rq3TUk>j1E[,2');
define('LOGGED_IN_KEY',    '~UKME)-H1kJr3>G%2dlE.{{bz9FC_Tv(lhB)PV]P|aQ8L/jY_0!+b.aYB=!v||eP');
define('NONCE_KEY',        'qr{=; A(Rc_yEg|,1cL;P-u+Mma}=?1cq;zUmhzv]g$8jth_R]z*6bVYK9>J*~o3');
define('AUTH_SALT',        '?3~ Onr]W*0. fE}2L*UbsLn0U7V]eM1q;NGQjeO8RUe[te)8|/!i-hp1aR@&HTM');
define('SECURE_AUTH_SALT', 'Cz$/JgiIM4|HWdMxt}qF_Wfaj%Mi>}K-j2CNM|$CAS([_8mE#Q,T%]*@~-fZ.Wnt');
define('LOGGED_IN_SALT',   'M8~|xJh=mH5zG<C*inXm}j3%yTGQ=]-vSwse<RFTWX.ELB2A{jQ3g@>K2R=.C(g-');
define('NONCE_SALT',       'mL-PyH+c4>;^^YLkv5VLO.vQ(6tE:`.vP@pts=n6H [|F!J. -BoVe3Yi9&&q }1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
