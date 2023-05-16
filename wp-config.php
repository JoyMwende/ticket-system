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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ticket-system' );

/** Database username */
define( 'DB_USER', 'admin8' );

/** Database password */
define( 'DB_PASSWORD', 'ticketadmin' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ';WVmcgF^?{qJ3N 7@MnUeg,P0rghke8gD<K[V.4E..? j(i1L(W onir>]v4=+?}' );
define( 'SECURE_AUTH_KEY',  'LS,(d~QHSM;kX}h`+p>vH{s [U@0;MKQ2e-IFh1*~{($Nk}`+JHRwyXP]=L& %Uw' );
define( 'LOGGED_IN_KEY',    ' Jl$<Ept 3GA5g:u#d72fwbk$UOkDENg)*apH<Vw0tR/B0+lrs*,;qo^wW0BN~J[' );
define( 'NONCE_KEY',        '`5v=R{Q^EVK0:6?O>deVU+iv1gn}y`z-Y7aMZ+B|=.}+8/Ie0GkG&xm>+YbL=p:[' );
define( 'AUTH_SALT',        'bMQzt7+nJ&RB$q|NC7PBQN2p5?gT8m0G9/F[t.c76nhP_7p;JLFC4LMt>Ac[r[`q' );
define( 'SECURE_AUTH_SALT', '{3`>HyvEu;CN})NaQm)UWn3^tz=sh`P8Ms/Y.2)5$N]yY/7o%|Px%v1zIQvc2J T' );
define( 'LOGGED_IN_SALT',   'BmuV(7/hPn)QUJMDMFDZax*.j`V5)mq5kaW<Yq%A-DKjM?qto6sya#4=-CX%}c!%' );
define( 'NONCE_SALT',       'U]&+)1<*Ui*dPD]Y!?Er}?Xs;Grh72P+K((sZTx`-2z(.qFH[}WwZ[-K}%EbUm>:' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
