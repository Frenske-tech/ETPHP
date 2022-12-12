-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 mei 2020 om 14:43
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etaste`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `BestellingID` int(11) NOT NULL,
  `Aantal` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Tijd` time NOT NULL,
  `Totaalprijs` decimal(5,2) NOT NULL,
  `Tafel` varchar(3) NOT NULL,
  `Contant` decimal(5,2) DEFAULT NULL,
  `Menuitemcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`BestellingID`, `Aantal`, `Datum`, `Tijd`, `Totaalprijs`, `Tafel`, `Contant`, `Menuitemcode`) VALUES
(1, 5, '2019-04-15', '20:00:00', '33.75', '1', '35.00', 1),
(2, 5, '2019-04-16', '21:00:00', '11.00', '2', NULL, 2),
(3, 4, '2019-04-16', '17:00:00', '50.00', '2', '55.00', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bon`
--

CREATE TABLE `bon` (
  `BestellingID` int(11) NOT NULL,
  `ReserveringID` int(11) NOT NULL,
  `Tafel` varchar(3) NOT NULL,
  `Datum` int(11) NOT NULL,
  `Tijd` int(11) NOT NULL,
  `Wijze van betaling` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerecht`
--

CREATE TABLE `gerecht` (
  `Gerechtcode` varchar(3) NOT NULL,
  `Gerecht` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gerecht`
--

INSERT INTO `gerecht` (`Gerechtcode`, `Gerecht`) VALUES
('drn', 'Drank'),
('veg', 'Vegetarisch'),
('vis', 'Vis'),
('vls', 'Vlees');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `Klantid` int(5) NOT NULL,
  `Klantnaam` varchar(30) NOT NULL,
  `Telefoon` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`Klantid`, `Klantnaam`, `Telefoon`) VALUES
(1, 'Janse', '06123456798'),
(2, 'Janssen', '06234567891'),
(3, 'Test', '06121212121'),
(4, 'Pietersen', '0366543987'),
(5, 'Boodaart', '0698769876'),
(6, 'Van den Ouden', '0678901234');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitem`
--

CREATE TABLE `menuitem` (
  `Menuitemcode` int(11) NOT NULL,
  `Gerechtcode` varchar(3) NOT NULL,
  `Menuitem` varchar(30) NOT NULL,
  `Prijs` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `menuitem`
--

INSERT INTO `menuitem` (`Menuitemcode`, `Gerechtcode`, `Menuitem`, `Prijs`) VALUES
(1, 'vls', ' Kipfilet', '7.50'),
(2, 'veg', 'Spruiten', '5.50'),
(3, 'vls', 'Spareribs', '12.50'),
(4, 'vls', 'Gehaktballetjes', '7.50'),
(5, 'vls', 'Steak', '12.50'),
(6, 'drn', 'Mountain Ew', '2.50'),
(7, 'vis', 'Sardientjes', '5.50');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservering`
--

CREATE TABLE `reservering` (
  `ReserveringID` int(11) NOT NULL,
  `Tafel` varchar(3) NOT NULL,
  `Datum` date NOT NULL,
  `Tijd` time NOT NULL,
  `Klantid` int(5) NOT NULL,
  `Personen` int(11) NOT NULL,
  `Reservatie` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reservering`
--

INSERT INTO `reservering` (`ReserveringID`, `Tafel`, `Datum`, `Tijd`, `Klantid`, `Personen`, `Reservatie`) VALUES
(1, '4', '2019-04-15', '20:00:00', 1, 5, 'Nee'),
(2, '1', '2019-04-16', '19:00:00', 2, 6, 'Nee');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subgerecht`
--

CREATE TABLE `subgerecht` (
  `Gerechtcode` varchar(3) NOT NULL,
  `Subgerechtcode` varchar(4) NOT NULL,
  `Subgerecht` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `subgerecht`
--

INSERT INTO `subgerecht` (`Gerechtcode`, `Subgerechtcode`, `Subgerecht`) VALUES
('veg', 'sprt', 'Spruiten'),
('vls', 'srib', 'Spareribs');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `class` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `class`, `username`, `password`, `created_at`) VALUES
(1, '', 'test', '$2y$10$2Zq10/4l.TlKzmJZRjOjN.B3Vh9OCZ4HcTf.tEuCZKEYcxNG5pZcW', '0000-00-00 00:00:00'),
(2, '', 'Ghoolian', '$2y$10$fhllRMa2uYP2QIKbRaQAhe6VBjfyVBgSlRaYrZDGltiryrgYADvo6', '0000-00-00 00:00:00'),
(3, '', 'Ghoolian2', '$2y$10$ZyDBqQpFbtm9PLCClqKqxO7tx.4T1kgWDldgxvIYlg0omCt0UD7Pa', '0000-00-00 00:00:00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`BestellingID`),
  ADD UNIQUE KEY `Menuitemcode` (`Menuitemcode`),
  ADD UNIQUE KEY `Menuitemcode_2` (`Menuitemcode`);

--
-- Indexen voor tabel `bon`
--
ALTER TABLE `bon`
  ADD PRIMARY KEY (`BestellingID`),
  ADD UNIQUE KEY `ReserveringID` (`ReserveringID`);

--
-- Indexen voor tabel `gerecht`
--
ALTER TABLE `gerecht`
  ADD PRIMARY KEY (`Gerechtcode`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`Klantid`),
  ADD UNIQUE KEY `Klantid` (`Klantid`);

--
-- Indexen voor tabel `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`Menuitemcode`);

--
-- Indexen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`ReserveringID`,`Datum`,`Tijd`),
  ADD UNIQUE KEY `Klantid` (`Klantid`);

--
-- Indexen voor tabel `subgerecht`
--
ALTER TABLE `subgerecht`
  ADD PRIMARY KEY (`Subgerechtcode`),
  ADD UNIQUE KEY `Gerechtcode` (`Gerechtcode`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `BestellingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `Klantid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `Menuitemcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `reservering`
--
ALTER TABLE `reservering`
  MODIFY `ReserveringID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`Menuitemcode`) REFERENCES `menuitem` (`Menuitemcode`);

--
-- Beperkingen voor tabel `bon`
--
ALTER TABLE `bon`
  ADD CONSTRAINT `bon_ibfk_2` FOREIGN KEY (`BestellingID`) REFERENCES `bestelling` (`BestellingID`),
  ADD CONSTRAINT `bon_ibfk_3` FOREIGN KEY (`ReserveringID`) REFERENCES `reservering` (`ReserveringID`);

--
-- Beperkingen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD CONSTRAINT `reservering_ibfk_1` FOREIGN KEY (`Klantid`) REFERENCES `klant` (`Klantid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
