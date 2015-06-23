<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'zetta496_blog');

/** MySQL database username */
define('DB_USER', 'zetta496_blog');

/** MySQL database password */
define('DB_PASSWORD', 'd@t@pr0t3ct');

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
define('AUTH_KEY',         'ci%+,bga2:T^cn#b~LzkQn6;RZe %g-S{9JVJ_2L-2_Ii+%txNXJD0V$te@E8`<O');
define('SECURE_AUTH_KEY',  '-oxT2$3YkliJmD*:<UFI; mE>}Ob;2]=$L4`%K^c9]VMY2SM2mOb,a:@.^{$w4pm');
define('LOGGED_IN_KEY',    'AEi8)$lXvH|?^`{)kYJYG|33wjY&,Q#lZH_]#*p*(@o|hXm%6=-@;(Fi>PU!x9M`');
define('NONCE_KEY',        'to+2#L&q!I}BjM|8b669M+mVgc][yMa3m45IT5(o9^78z3{j9f7DbE-7|zx0=bUW');
define('AUTH_SALT',        'c#pD=UwbW(}ou *4:- .zYM-Dwv@lc3bIb#3^ct%--Ez>yO{Yz{43k4.7Sb36re+');
define('SECURE_AUTH_SALT', '5BpzS{:aw@FY|Zw.Z-w;c*y1fSWu&M~Uo^&3M$Bp8J:o/p|[=[ySaKK6)VBMM.&B');
define('LOGGED_IN_SALT',   '+SWH,t-V:cI=1WzBPZUeB!P/s]bO1P0yz{l6#4plxUPYD;PMOR[/amkk5Dd+QTU9');
define('NONCE_SALT',       '!-HQj1kYywfOen5e+hfX_mYOS/|4Y+w 1<<+NWoecu(,<d&W.m7Gwp?%3WjoZP]4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
