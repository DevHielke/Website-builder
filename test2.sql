-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 okt 2017 om 14:18
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`, `role`) VALUES
(3, 'admin', 'admin@admin.nl', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'test', 'test@test.nl', 'test', '098f6bcd4621d373cade4e832627b4f6', ''),
(5, 'demo', 'demo@demo.nl', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `templates`
--

CREATE TABLE `templates` (
  `templateid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `templates`
--

INSERT INTO `templates` (`templateid`, `name`) VALUES
(1, 'blue'),
(2, 'green'),
(3, 'red');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `websites`
--

CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `url` text NOT NULL,
  `template` text NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `websites`
--

INSERT INTO `websites` (`id`, `name`, `content`, `url`, `template`, `login_id`) VALUES
(13, 'Mijn eerste site ', '                    Mijn naam is Patrick Wessels, ik werk als zelfstandig SEO tekstschrijver en ConsumentenPsycholoog. Van jongs af aan speelt de caombinatie van letters tot woorden een belangrijke rol in mijn leven. Een misplaatste zin in een advertentie of fouten met betrekking tot de spelling binnen een professionele organisatie deden mijn figuurlijke voelsprieten ongewenst trillen en een taaltic bleek daarmee aangeboren. Waar het tekstschrijven tijdens mijn universitaire studie begon als alternatief voor de bekende bijbaantjes werk ik inmiddels sinds 2011 fulltime aan de vindbaarheid van websites voor het MKB en grotere organisaties.', 'data:image/jpeg;base64,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', 'red', 3),
(14, 'Civic', 'A car designed for the real world.\r\n\r\nRethought and redesigned inside and out, the Honda Civic is built to be driven, but it can be much more than that. It can be flexible and change to suit your needs and easily adapt to be what you want it to be.', 'http://www.honda.co.uk/content/dam/central/cars/rvtd/civic/Civic_f34.png/_jcr_content/renditions/c3.png', 'blue', 5),
(15, 'WELKOM OP RIENKVANDERGOOT.NL', '                 Mijn naam is Rienk van der Goot en ik volg momenteel de opleiding applicatieontwikkelaar aan het Friesland College.\r\n\r\nWEBSITE ONTWIKKELING\r\nWebsites maken met behulp van een CMS (Wordpress) of Framework (Symfony).\r\n\r\nAPP ONTWIKKELING\r\nAndroid apps maken in Android Studio.\r\n\r\nSOFTWARE ONTWIKKELING\r\nEen Windows applicatie schrijven in Visual Studio.\r\n\r\n', 'https://rienkvandergoot.nl/img/slider/slider-image-1.jpg', 'blue', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexen voor tabel `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`templateid`);

--
-- Indexen voor tabel `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_1` (`login_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `templates`
--
ALTER TABLE `templates`
  MODIFY `templateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `websites`
--
ALTER TABLE `websites`
  ADD CONSTRAINT `FK_products_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
