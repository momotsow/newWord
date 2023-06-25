<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('AUTH_KEY',         'nxD6uTtFq1jk9LsRJ7YNdv1J2s3NVFTj0/eHtmPwagFPo1aKYXAPLInWHQGy7X8dJKY4kQHIHn6IfFSdxZcAlA==');
define('SECURE_AUTH_KEY',  'SZlBdQNwYJ4kW6pMgvNuVC81KLFiTv2tpXmPhUsmEjJPU2+7WWgABbWGKtNohnzZayTW+HtHau+pbH3sSao2Qw==');
define('LOGGED_IN_KEY',    'ke/dD5fBbV6XVPA9MoMV7me3fo0/vNSuFB8xsjyXFqV2PCBDXOTuoYJjfJZQvOK4u/HRs+6bjeW8lIFNVFC3Ug==');
define('NONCE_KEY',        'l8ePJlHA3HzztmpCaQLLJUfW/3l0Q81q5w0rSwRgPs3KumvQNSI5Yc2eZ0Jyr/HWjCECFVlnkeQSIETAzNS5sw==');
define('AUTH_SALT',        'NMNCdpPVWOnXIvFI0ebGnKIsj2rYsvWEdogscqck2KY6dcNc2/3MkuWUZPgH+C+okYJ+AKTQG5D5O+1ktQ8Asw==');
define('SECURE_AUTH_SALT', 'kc7uYyWzMgsuGn1OnYjiwbLsSoDhcvunMMIRiQR7Q12eTukkAddS+6Aj0XHbtOHUw2N8J+gV7t0wcgz6anf2aA==');
define('LOGGED_IN_SALT',   'D4fyaWrfcgwRjfO0sY4x0ITQHJUNN518mIGhdErQHq8jacKg8LCEInbCP3ZN5FTjmQBTV/YAHE1WiNsDwZE7QA==');
define('NONCE_SALT',       'zsfJGY7Dk8tebO1kA4O/7ZMyr66bXGx1KcGJWsQE5Hehf4CeLafajVtWVO/lsh9WI3+RH8zrp9+5zJFPrugrmA==');