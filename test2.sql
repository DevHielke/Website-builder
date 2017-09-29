-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 sep 2017 om 09:39
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
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`, `role`) VALUES
(1, 'Hielke3', 'info@hielkeannema.nl', 'hielke', '', 'admin'),
(3, 'admin', 'admin@admin.nl', 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
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
(2, 'green');

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
(6, 'Whats app site', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempus justo at augue porta, sit amet luctus dolor dictum. Etiam at velit mi. Cras fringilla vestibulum metus, non viverra risus faucibus finibus. Donec nec elit rutrum, facilisis ex a, congue ante. Vestibulum eu urna ac mi laoreet malesuada. Aliquam lacinia turpis in fermentum pulvinar. In hac habitasse platea dictumst. Donec sed nibh et ex pretium efficitur at et dolor. Aenean sit amet libero vel sem hendrerit aliquam eu facilisis mauris. Cras dapibus tortor quis venenatis rutrum. Mauris vel nulla varius, cursus ipsum id, placerat libero.\r\n\r\nAliquam vel mattis lacus. Sed quis augue ultrices, ornare enim a, faucibus lectus. Integer eleifend odio non odio venenatis venenatis. Nulla vel velit facilisis, aliquam ligula quis, efficitur est. Aliquam vulputate hendrerit felis at facilisis. Aenean sodales viverra mauris, nec tincidunt quam vulputate non. Integer in dolor at nunc porttitor porta sed sit amet nisi. Donec volutpat non nisl vel eleifend. Donec fermentum, leo eu volutpat congue, dolor magna porta neque, eu sollicitudin arcu odio nec lacus.\r\n\r\nDonec vestibulum felis nec metus semper semper. Duis consectetur auctor facilisis. Integer aliquam sapien sit amet ex vehicula venenatis. Donec quis ultrices dolor. Integer id viverra nisi. Integer venenatis ipsum id luctus sodales. Integer pellentesque dolor quis libero porta, vel condimentum tellus viverra. Aenean consequat non nibh nec congue. Phasellus id leo eget dolor mollis blandit. Integer fringilla pulvinar egestas. Donec nec commodo nulla, sit amet euismod enim. Vestibulum vel pellentesque tortor, ut venenatis magna.', 'https://image.freepik.com/iconen-gratis/whatsapp-logo-variant_318-54566.jpg', 'blue', 1),
(7, 'Coca cola site', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempus justo at augue porta, sit amet luctus dolor dictum. Etiam at velit mi. Cras fringilla vestibulum metus, non viverra risus faucibus finibus. Donec nec elit rutrum, facilisis ex a, congue ante. Vestibulum eu urna ac mi laoreet malesuada. Aliquam lacinia turpis in fermentum pulvinar. In hac habitasse platea dictumst. Donec sed nibh et ex pretium efficitur at et dolor. Aenean sit amet libero vel sem hendrerit aliquam eu facilisis mauris. Cras dapibus tortor quis venenatis rutrum. Mauris vel nulla varius, cursus ipsum id, placerat libero.\r\n\r\nAliquam vel mattis lacus. Sed quis augue ultrices, ornare enim a, faucibus lectus. Integer eleifend odio non odio venenatis venenatis. Nulla vel velit facilisis, aliquam ligula quis, efficitur est. Aliquam vulputate hendrerit felis at facilisis. Aenean sodales viverra mauris, nec tincidunt quam vulputate non. Integer in dolor at nunc porttitor porta sed sit amet nisi. Donec volutpat non nisl vel eleifend. Donec fermentum, leo eu volutpat congue, dolor magna porta neque, eu sollicitudin arcu odio nec lacus.\r\n\r\nDonec vestibulum felis nec metus semper semper. Duis consectetur auctor facilisis. Integer aliquam sapien sit amet ex vehicula venenatis. Donec quis ultrices dolor. Integer id viverra nisi. Integer venenatis ipsum id luctus sodales. Integer pellentesque dolor quis libero porta, vel condimentum tellus viverra. Aenean consequat non nibh nec congue. Phasellus id leo eget dolor mollis blandit. Integer fringilla pulvinar egestas. Donec nec commodo nulla, sit amet euismod enim. Vestibulum vel pellentesque tortor, ut venenatis magna.', 'http://www.cocacolanederland.nl/content/dam/journey/nl/nl/private/stories/2016/NL-0052-Het-verhaal-van-het-logo.jpg', 'green', 1),
(13, 'Mijn eerste site', '        1Mijn naam is Patrick Wessels, ik werk als zelfstandig SEO tekstschrijver en ConsumentenPsycholoog. Van jongs af aan speelt de caombinatie van letters tot woorden een belangrijke rol in mijn leven. Een misplaatste zin in een advertentie of fouten met betrekking tot de spelling binnen een professionele organisatie deden mijn figuurlijke voelsprieten ongewenst trillen en een taaltic bleek daarmee aangeboren. Waar het tekstschrijven tijdens mijn universitaire studie begon als alternatief voor de bekende bijbaantjes werk ik inmiddels sinds 2011 fulltime aan de vindbaarheid van websites voor het MKB en grotere organisaties.', 'https://i.pinimg.com/736x/33/b8/69/33b869f90619e81763dbf1fccc896d8d--lion-logo-modern-logo.jpg', 'blue', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `templates`
--
ALTER TABLE `templates`
  MODIFY `templateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
