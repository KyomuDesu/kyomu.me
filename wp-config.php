<?php
define( 'WPCACHEHOME', '/home2/kyom27242379/public_html/wp-content/plugins/wp-super-cache/' );
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kyom27242379_cgbb1' );

/** Database username */
define( 'DB_USER', 'kyom27242379_cgbb1' );

/** Database password */
define( 'DB_PASSWORD', 'R.UZ94S2U11CFqDEixN59' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'iIxMhFOZvxbasa6slqAhpGqO25oGvJCgf1tRy46TGg4eLWucAdeRsDG2vyKsBIfG');
define('SECURE_AUTH_KEY',  'GkjJusnldL37ZD8k7tHz7FO8L3dYNoZTvYCdwSyx7sF5Z185VcI8qkqpYVfWP66J');
define('LOGGED_IN_KEY',    'QMoinY7eJeOwiSs6X745WcM31YqQflXEJB6SJqQccfsLNaPqUkLClanxY91tM76B');
define('NONCE_KEY',        'eojJjdjrM7dffDeCOMJv7sNEAIvALedOufLEZTNTDMQFOVcV4UFzGSGh03At5FRO');
define('AUTH_SALT',        's4uvp34U6hEGTGRZ472PqK6zhv5Jf0YUNg7aioF4WxyrQ7yRhDepLAI4ELy1TASH');
define('SECURE_AUTH_SALT', 'PsAm6jlvl1E0HF8dRE7GnjZ3FjXQSxkZuDKaMfpkfUNVvULkSpr3oT4953BsLoJP');
define('LOGGED_IN_SALT',   '1h27rB7NYU7zLyQnT58R8r4XaLu3LHhc2WdnAdwy0tnMb4IiR6YpgCeHvE7gablQ');
define('NONCE_SALT',       'eg2bkDhBZBqAg9cebDkZjyl8oiRUPUjNWd16n6JU0IuQZELKuJyzyu13nayaVwuQ');

/**
 * Other customizations.
 */
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pmf8_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('ALLOW_UNFILTERED_UPLOADS', true);
