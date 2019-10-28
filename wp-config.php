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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u0588082_lucky_house' );

/** MySQL database username */
define( 'DB_USER', 'u0588082_lh' );

/** MySQL database password */
define( 'DB_PASSWORD', '3I9y8S4k' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>Ww_}-&C-3JZv*kJexs9+cKXYzLA{7i)J }nms!?Y+&/?nh`)9+8@#9r3{Du8cha');
define('SECURE_AUTH_KEY',  '(U48R_|OUl|hd|cG(4bUUB|g@{ZEz%dE+-pXb;X?~ys[#eQ2u_[~v1C4~N23r*#a');
define('LOGGED_IN_KEY',    'V;ZUjJ_^^>:B^_f;&*D4tuBY_L:Tc1af.yL8!:D>NLlH$]f,4=+:)iQ5+lU,#1Oz');
define('NONCE_KEY',        ':AoNS48(uPrxJIXb|A2pVQ$SC-Z|&qg9sP;i0XYMf6lMdya_[#T#A }g3U3qdP+>');
define('AUTH_SALT',        'ac9A>Awe?EmN:D8/yoU[V{_Tk5|2yubgA/rbozsU-og,Km*9<#^<4daa|{b>gC:M');
define('SECURE_AUTH_SALT', 'RUhs|)ng~|vOY[nl@4~kEY#0V1ovzWOXyhjlXK=BkTr#nV8_V$!lm`{>AT[v(YV!');
define('LOGGED_IN_SALT',   ')N|]B3,+B0+EUg%es9o#{:r^R-xLNc.j|_Ee,e_d?*hr;Zp|?Y|-#h)A&xo*E<Ew');
define('NONCE_SALT',       'daO&ZI54701PU&Ku9M*fqSX:kfUctm9MGMKKE2Fx(gLncI=3/i~XaXMJ#`^k|9*m');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
