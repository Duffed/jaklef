CREATE TABLE `login_profi` (
  `id` mediumint(7) unsigned NOT NULL auto_increment,
  `benutzername` varchar(100) NOT NULL,
  `passwort` varchar(32) NOT NULL,
  `passwort_zusatz` varchar(10) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `benutzerinfo` varchar(255) NOT NULL,
  `anmeldung` varchar(32) NOT NULL,
  `zuletzt_aktiv` datetime NOT NULL,
  `fehlversuche` tinyint(2) unsigned NOT NULL,
  `aktiviert` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `benutzername` (`benutzername`)
) ENGINE=MyISAM ;

CREATE TABLE `soundcloud` (
	`ID` varchar(5) NOT NULL,
	`link` varchar(100) NOT NULL,
	`text` varchar(100) NOT NULL,
	`neu` BOOLEAN NOT NULL DEFAULT FALSE
)

CREATE TABLE `youtube` (
	`ID` varchar(5) NOT NULL,
	`link` varchar(100) NOT NULL
)

--Soundcloud füllen
INSERT INTO `soundcloud` (`ID`, `link`, `text`) VALUES ('1', 'https://soundcloud.com/jaklef-waelepoel/jaklef-zeitmaschine-feat', 'Jaklef - Zeitmaschine'), ('2', 'https://soundcloud.com/jaklef-waelepoel/jaklef-frei', 'Jaklef - Frei'), ('3', 'https://soundcloud.com/jaklef-waelepoel/jaklef-erste-grosse-liebe', 'Jaklef - Erste gro&szlig;e Liebe'), ('4', 'https://soundcloud.com/jaklef-waelepoel/jaklef-blocktv-9-rap-ist', 'Jaklef - BlockTV #9 Rap ist'), ('5', 'https://soundcloud.com/jaklef-waelepoel/jaklef-bald-hast-du-es', 'Jaklef - Bald hast du es geschafft');

--Youtube füllen
INSERT INTO `youtube` (`link`) VALUES ('1w723mZxXR0');

--
-- Passwort fuer Benutzer Otto ist: geheim
--
INSERT INTO `login_profi` VALUES('1', 'jaklef@live.de', '3933a3875cdb6169ac04686c65d2f1e0', '0ebcf97232', '', '', '5122c805dc43a10843fc2c1b082ea500', '0000-00-00 00:00:00', 0, 1)
