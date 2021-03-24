<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'espot' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'espot' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'FtTVAqzRaTAMTN2Y' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6R!B7n`>kz5l-Jr1CcXfFx2Y^u Ky^i&XD>Q#Y9 _*eb4%OU14cUp2Mb.}WuzJ1z' );
define( 'SECURE_AUTH_KEY',  'QdVF]XyH=d&,{F5akjt5@.1>L8j(?}Ju(Qm ,Y%Au9Ch&4^Nk?9Y*]aRT/]8~SpY' );
define( 'LOGGED_IN_KEY',    'UeNJqYt_Cv~U|#!#1zb]%gW7)cL*}(rh4WrzUf1jrjPzU3-#]lIqK64}6M7PFp/v' );
define( 'NONCE_KEY',        '%1ad3`EgYf+p*@CDZ}O wP>o.j[F+K~VRLBAz]eN(b?jkp)I]RjVw`-lB3j9K Bi' );
define( 'AUTH_SALT',        '0m;cGHYhbPh]ve+z@&<P0=!EY!fxYT?^M]6eV=YWbYsWm+K<h+{a~$rQ5(ET4zuf' );
define( 'SECURE_AUTH_SALT', '`7I0oi2PmPJ~7~{-Q}RcOL<Az0g6.l4@Ag8)<D?E7.}E IWckRe:Vk_I056`3|%!' );
define( 'LOGGED_IN_SALT',   'Y9AuRB=N[kAct+[%sR3<?Q4P;]Iom *s8^vmm#vvP9TNS=tXIX >h~2>==m#)01z' );
define( 'NONCE_SALT',       '6H.GD*N8^rL!Z;(-E2{&Xvb)qo&tUb.C^*5W{9OAY^OkLL7pI[J1R 9u%.}myaeL' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
