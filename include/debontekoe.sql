-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 feb 2016 om 11:49
-- Serverversie: 5.6.25
-- PHP-versie: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `debontekoe`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cinemas`
--

CREATE TABLE IF NOT EXISTS `cinemas` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `rows` int(11) NOT NULL,
  `row_seats` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `cinemas`
--

INSERT INTO `cinemas` (`id`, `number`, `rows`, `row_seats`) VALUES
(1, 1, 10, 10),
(2, 2, 20, 20);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `firstname`, `lastname`, `address`, `zipcode`, `city`) VALUES
(1, 'mvolwater', 'mvolwater', 'mvolwater@idcollege.nl', 'mvolwater@idcollege.nl', 1, 'o6et7pk6u9co0gsos0k04w4c8gc0sg4', '$2y$13$o6et7pk6u9co0gsos0k04uRcABiKIh.dSPwKwD1O5tjAAxrzolk/u', '2015-10-30 06:43:20', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:18:"ROLE_CONTENTEDITOR";}', 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menukaart`
--

CREATE TABLE IF NOT EXISTS `menukaart` (
  `id` int(6) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `prijs` double NOT NULL,
  `soort_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menukaart_soort_id`
--

CREATE TABLE IF NOT EXISTS `menukaart_soort_id` (
  `id` int(6) NOT NULL,
  `course` int(11) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `opmerking` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menukaart_soort_id_course`
--

CREATE TABLE IF NOT EXISTS `menukaart_soort_id_course` (
  `id` int(6) NOT NULL,
  `coursenaam` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publication_date` date NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `runtime` int(11) NOT NULL,
  `productioncompany` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `movies`
--

INSERT INTO `movies` (`id`, `title`, `publication_date`, `genre`, `runtime`, `productioncompany`, `description`) VALUES
(1, 'Spectre', '2015-10-09', 'Action', 148, 'Columbia Pictures', 'Door een mysterieus bericht wordt Bond geconfronteerd met zijn verleden en moet hij een duistere organisatie ontmaskeren.'),
(2, 'The Last Witch Hunter', '2015-10-22', 'Action', 106, 'Atmosphere Entertainment MM', 'De sterkste heksen ooit verzamelen hun krachten en doen een poging de mensheid omver te gooien. Met Vin Diesel en Rose Leslie in de hoofdrollen.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `row_seat` int(11) NOT NULL,
  `paid` smallint(6) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `showschema_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`id`, `row`, `row_seat`, `paid`, `type`, `showschema_id`, `user_id`) VALUES
(1, 4, 8, 1, 'Adult', 1, 1),
(2, 5, 8, 1, 'Child', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen_restaurant`
--

CREATE TABLE IF NOT EXISTS `reserveringen_restaurant` (
  `id` int(4) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `aantalpers` int(6) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `opmerking` text
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen_restaurant`
--

INSERT INTO `reserveringen_restaurant` (`id`, `naam`, `aantalpers`, `email`, `date`, `opmerking`) VALUES
(1, 'ddd', 1, NULL, '2016-02-23 11:41:00', ''),
(2, 'ddd', 1, NULL, '2016-02-23 11:41:00', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `showschema`
--

CREATE TABLE IF NOT EXISTS `showschema` (
  `id` int(11) NOT NULL,
  `cinema_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `showschema`
--

INSERT INTO `showschema` (`id`, `cinema_id`, `movie_id`, `datetime`) VALUES
(1, 1, 1, '2015-10-29 20:00:00'),
(2, 2, 1, '2015-10-29 23:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `ww` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `naam`, `ww`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `zalen`
--

CREATE TABLE IF NOT EXISTS `zalen` (
  `id` int(6) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `tekst` text,
  `foto` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- Indexen voor tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4DA239A76ED395` (`user_id`),
  ADD KEY `IDX_4DA239FDBF4BBA` (`showschema_id`);

--
-- Indexen voor tabel `reserveringen_restaurant`
--
ALTER TABLE `reserveringen_restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `showschema`
--
ALTER TABLE `showschema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3007C912B4CB84B6` (`cinema_id`),
  ADD KEY `IDX_3007C9128F93B6FC` (`movie_id`);

--
-- Indexen voor tabel `zalen`
--
ALTER TABLE `zalen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `reserveringen_restaurant`
--
ALTER TABLE `reserveringen_restaurant`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `showschema`
--
ALTER TABLE `showschema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `zalen`
--
ALTER TABLE `zalen`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_4DA239A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_4DA239FDBF4BBA` FOREIGN KEY (`showschema_id`) REFERENCES `showschema` (`id`);

--
-- Beperkingen voor tabel `showschema`
--
ALTER TABLE `showschema`
  ADD CONSTRAINT `FK_3007C9128F93B6FC` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `FK_3007C912B4CB84B6` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
