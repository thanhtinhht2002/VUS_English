<?php
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
define( 'DB_NAME', 'tienganh.edu.vn' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'VZ}g6gDBlS~NIMCaB32SQKA1>x[=eMzD)&0oN)&EUZyr710n(<]Hl3*9:32*-CO%' );
define( 'SECURE_AUTH_KEY',  '|N(`GHR2Ygb%p[+g`@-yr$`chT9c/K2PUQNO$[r-M$aq`_s<+t$*lXxCd?yq)Zx1' );
define( 'LOGGED_IN_KEY',    'BR+FjL!;f,p^Fk5q+jF4s3|)BJ)6Gk$Hzl5|lx7+:nMmcdrc.2_fD+buwlLkIg)8' );
define( 'NONCE_KEY',        '-.;uyD2ir2y-k:Nx6,ik$QG<]/P4~q:zwbdp}F`]7Af:0Y(P,<|M9d1,2<]w*(?Y' );
define( 'AUTH_SALT',        'wnw>3E`Wo4D8sLa#EB9xXJ->k(Iwe%9vY(08ToAirJg{kF:<dzf!K^D]-<CI(qDJ' );
define( 'SECURE_AUTH_SALT', 'H4z:c`n4x8YInhR?,_~iw=F &gxLVz%X;!bzxOM2_T~Q8g@s^bIp;+9]()FIGqD9' );
define( 'LOGGED_IN_SALT',   ']=`H)Q!>3q(PnV-v*W>te:VMFu*=xc1s#sSq>Sa&Kb-/mMDpFbNk-XW/b %CqkYb' );
define( 'NONCE_SALT',       'T=irw Ij#;1,a*8tPK*&AL&E*z:3`Ty%[M0o0yR6V/V5q[z3RY&K=#.XC$(ejZZZ' );

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
