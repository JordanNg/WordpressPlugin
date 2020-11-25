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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'JordanOPI_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1:8889' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ';5Z%+(gNrEjs+WBnS@Z>PCtRwY,$HDG_S&bnIe?l.B@x**HDj73$`6`GP{)ch]xj' );
define( 'SECURE_AUTH_KEY',  ' F^eb<`%fjHG+ j4;t6KiEM/x(wXO<?HLh%Fjpa~ov+nY$4zZBXyOy9a!W[Sr,qi' );
define( 'LOGGED_IN_KEY',    ')se]3Bqgn7a,Z&9)O2o|,D89vSR7AYDIXUEHjWB%:<K=:*~s6vtFe&$jutNxUu%+' );
define( 'NONCE_KEY',        '`dU(}|{YjP5C-ArrJ_(grdq7X$wk)e2-n@;H@Yd!i+UEo[V/E2lIjJEi6v-6Cbun' );
define( 'AUTH_SALT',        'WL>]X:<YBH2;%pM?*$btEDj@.5iYO<[P#d6c0**/h+cQ>D$X%vSRe5Gv8OW&Ao{%' );
define( 'SECURE_AUTH_SALT', '_!;gE93{gv{iv[h [=6U~s>6/e^7}f^O%WTbBe`x ByBC`t%t!zlfDh,tEfy;i`w' );
define( 'LOGGED_IN_SALT',   '<xYu~{(,w$vi-|lyC=C3>J_|pF^81}WiO/x_^DDYrre(Q:48>ir6!c*7P>x nYby' );
define( 'NONCE_SALT',       '&#SgI<`eP+MNb7hw^X,XDi;R8Hp7x~sxF{&;b.uBoOK0Fj*}<}=4,fr.3i0bT 82' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
