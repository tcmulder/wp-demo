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
define('DB_NAME', 'demo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '`L71~{>V5@< v(OhF*l>@u/VO$.-@yyc62o]wdA_mpR[h!{cf&9eH*OO]M&mDcxP');
define('SECURE_AUTH_KEY',  'e^n.d_KdT|jzmw&yQw]7swv@G$w=|!C1RJ19=IINe*azPfdXw{V:!:S)1uuB4|4)');
define('LOGGED_IN_KEY',    '^95PcE93uOgxB})v(qg4Q-jLxnS>Fo*K&Ox}.anKVI+]#H9!EE+@y@d?h[F|OxUZ');
define('NONCE_KEY',        'sQGSK},V#NIl0BmW]{UR7BZ[F`Yp2)&@w% iQ@C8+4!H16wWd%8.fY+OBDEX>r(L');
define('AUTH_SALT',        'SHPhsjv:y2!rax,.!%n:GJ!X8;hJiPc.)drwW`Gc# 8CbjRF<rFDib|mx%mE0vf<');
define('SECURE_AUTH_SALT', '4NOZ>>]cv&t*rG9KR3A>7:[}t1piP+!$6rzpHy}zCf>!uEhK(9>3&jVlLt./qnXM');
define('LOGGED_IN_SALT',   ',_A;D|i//g2H-bnS X!26C*TtM3t&zA:nnhE;WN:Zm]O82$I`:%3X`P*5[]G&Y=@');
define('NONCE_SALT',       '>Dh#5d@S*gIq~4Z+P ${YtPV3>D?|/MW>WO6<yZhw<o#_S_}*?8F<8aBFPW^Nm~E');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'd503h1e7s1_';

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
