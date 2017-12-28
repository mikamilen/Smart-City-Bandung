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
define('DB_NAME', 'db_smartcity');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '3TCaAYtQv[;Ys%*<k!V4@SGdhwo2Nc13@3P{elY.?DB1r.Ose`$~4M7TO#+$3&1D');
define('SECURE_AUTH_KEY',  '82Bo/Ap!Ikd?r)q?@0(pR/NYw9Hr c-$I|zWN0WqD2VqyT}9MRSG;7.q3Wp5Gp}C');
define('LOGGED_IN_KEY',    'Cw>q=$4efiF>xz{`_k`)XlT%  /:>hqdY:o0J_XX{50fwA=[?N-=qCq&-D9YuLe@');
define('NONCE_KEY',        '^VUyLjtUF[ae>=F5t3H( r=AXFX#AizYUjT|UPJ5-d`-@7wI5Hx5xD({v;v!Cjx.');
define('AUTH_SALT',        '3>3W3Bl%GsvSJxN+Cwl0`wUMspoR]5u+U{Hgtyf[laOZw23Y1TVo{tQ}O :*-x3|');
define('SECURE_AUTH_SALT', '?aF.)@`v!u)a=tb_vf(Q@3C2O,:FbAiCCb!E-.Az}[%Ucj>dBN{)N|7Pvw+3Bv98');
define('LOGGED_IN_SALT',   '6j5`^C$y8^>!^KAKlJ->Z?PR)>F@}L|N=g@}AZk#d+zyZgZEl7vz_`n12X+Xx_!#');
define('NONCE_SALT',       '~!B`*IYbvu86A>dsf`^*w;tjE}=T-$dJ8KG|F7c}N}-hqM.B{TIo}m{@$:1,#fxY');

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
