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
define('DB_NAME', 'tanthien');

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
define('AUTH_KEY',         'BC?9w?]hRK)d4}yAzcC5!^J|N6j=j6R+[j=YWJwSc*Fwrd,-Ou!Kj!Q?49{/~4z,');
define('SECURE_AUTH_KEY',  'z1ENhRw+<W=_9b@!jhs|9sDldguxLuccC++y5d+)=a+`*]<}IZ`-S,8APUfNchK[');
define('LOGGED_IN_KEY',    'q4_&3|*&?id0!:s*{YUVmc+^Z]Bxz3XrdbdxP^-h0 4x<Dnq<ufT5j_S^Mg -_b4');
define('NONCE_KEY',        '&u`)GYcHsO_P#F.Y0d1H%xrTwnayUa*+R/L3-K(;_h!+)hZ_h{09kB+GT_ujvD-#');
define('AUTH_SALT',        'F#o]UqQ_8<6oiWsx=Wdd+/ 9=K3BHgAKG8OJJ<1IeNR~doxlBzYs22~kqEu_}-b4');
define('SECURE_AUTH_SALT', '8>+b|co@AX/0qh:&3uU>3%H^|BkWzL}up=@M}r{`]+>PW5!O#@1([ynQhY)A%mSu');
define('LOGGED_IN_SALT',   '<);s S|s{e#X(2oi|~oDSd-cr2RyZ5qZjF_/3(h1B1ZeJ F[NT~}NEiN.amI:McA');
define('NONCE_SALT',       'ji=%ve~fOSyTCV&UNy---y}lBO^joVT|bU+E_6yjWoosO[fTWyPgf|3pqM2`#i.j');

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
