<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es
 * auf der {@link http://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt,
 * wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von
 * wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

/**  MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. */
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define('DB_NAME', 'dep5t3gjbze');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'dep5t3gjbze');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', 'W1JFmE7Qo2lb');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'mysqlsdb.co8hm2var4k9.eu-west-1.rds.amazonaws.com');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern,
 * alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @seit 2.6.0
 */
define('AUTH_KEY',         '7g51i?:)h5UMU0MRz!.b`b>-}a0V_wL]FhI*nf)N2-,`GxYbe#D7>siA4XT|2cqT');
define('SECURE_AUTH_KEY',  '^s-/7/fq&C=>8,a^[m2v0HnT5^Gg^s+N [D*7F3/pW6cm4VbV._MS?0u>h*O{^N,');
define('LOGGED_IN_KEY',    '*@Te%|)py,xz+{cJg=zy[Hv/TeEP?-{uJ%8d&UtX8GVcaB6YLp4/c-Nu/8CAqLjG');
define('NONCE_KEY',        'q-Q-WRuVp2SG$1iqJ49j6gDFq4Wx3@G vVV-aKV<)kZ_(|t!Nxw3v=!2bhZjN=&b');
define('AUTH_SALT',        '>@N!E+9 cG.Gbc+jtXHS$c^F}XQw}MqOn9(+ I]P|GUH#:_Y.o%AfY2)lu=1g+>z');
define('SECURE_AUTH_SALT', 'BQ<{Q;enH_px @Tjqdu8jA^1SG2#Ss#W}2?H=PhM39O5IUWwlWET-rfYbgV3wXWc');
define('LOGGED_IN_SALT',   '5F:na|3s+9u=t>1]mk%:I-,:Ml^o?-K.Ty+k.(%vFfF#ex5dFny,-|W!#}-)ag}J');
define('NONCE_SALT',       'S](@-)}`I1-])I./G,<=[&:bY7ja8bh$`uV`D5H(/@RhR=^YD=DLUFhY+EW.ksBp');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 *  Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 *  verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
