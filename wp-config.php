<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
define( 'FORCE_SSL_ADMIN', true ); // Redirect All HTTP Page Requests to HTTPS - Security > Settings > Secure Socket Layers (SSL) > SSL for Dashboard
// END iThemes Security - Do not modify or remove this line

define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

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
define( 'DB_NAME', 'paulwagn_live' );

/** MySQL database username */
define( 'DB_USER', 'paulwagn_ksoft' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Ksoft@123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'FY24#in.F Ryh(=q`?#ycq]8cPP*Wo3@,EqjaZ0tx,OG#};tMA o3CeJ~.-}{<_B' );
define( 'SECURE_AUTH_KEY',  'tl5Zh9%12}L>Dwkh~4,fZ_(i2)1y`,q2`xG>@5Yd x4VI4mx1P?L f*gg2Y@f.j!' );
define( 'LOGGED_IN_KEY',    'HPWw|2hP}g ~=:)fR]XabT36Pn]T;fk}_ES2?glne~q@aDny0@gg)2PxN>b5pyBq' );
define( 'NONCE_KEY',        ')zZ@RCQ^SglxDgqwH4qHHL&N1Xu)0WbG%sP$B+;&$S)s@dSfkRd2lH~DI[Sw/W~Y' );
define( 'AUTH_SALT',        'c&Mde;3jZ(MbOgZ#X#7:SH M46? d1(<#G>8}~*wmAV_w2yuy%8`/vCRP!]6_}gn' );
define( 'SECURE_AUTH_SALT', 'p(I+!A<ZR&] GA^j3.;ADp47uP<D^*-rVi2eJ)}1=t9)-#G}h1X]yNXQw&Yu{?w/' );
define( 'LOGGED_IN_SALT',   'D]ny?NIH~8I9U[~<%UA7hmod}s!mgJ?>N]{n hSsZnMw@5WgG8%EXM4dQ;.c1ETR' );
define( 'NONCE_SALT',       '5mi <tS9d%oaJ)^oEwhK1{~SE&F$ho5hdt-+p~3SsoLJbbq4dD0KCJ&tLlRR`|Q_' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pw_';

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
define('WP_MEMORY_LIMIT', '254M');
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );