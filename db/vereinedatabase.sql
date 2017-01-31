-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Jan 2017 um 09:48
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `vereinedatabase`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vereine_articles`
--

CREATE TABLE `vereine_articles` (
  `articleID` int(11) NOT NULL,
  `articleTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `articleDate` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `articleText` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `vereine_articles`
--

INSERT INTO `vereine_articles` (`articleID`, `articleTitle`, `articleDate`, `articleText`) VALUES
(15, 'neue veranstaltung', '04.08.2017', 'und wieder ein test, mal sehen was passiert'),
(17, 'Mega Event', '31.05.2017', 'Das wird großartig!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vereine_uploads`
--

CREATE TABLE `vereine_uploads` (
  `uploadID` int(11) NOT NULL,
  `uploadName` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `vereine_uploads`
--

INSERT INTO `vereine_uploads` (`uploadID`, `uploadName`) VALUES
(58, 'Anhang.pdf'),
(59, 'Web_Infos zur Abschlussprüfung.pdf'),
(61, 'Sitemap.pdf'),
(62, 'Zeitplan.pdf'),
(63, 'Wireframes.pdf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vereine_users`
--

CREATE TABLE `vereine_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userLastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userEmail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userUsername` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `vereine_users`
--

INSERT INTO `vereine_users` (`userID`, `userName`, `userLastname`, `userEmail`, `userUsername`, `userPassword`) VALUES
(1, 'test', 'test', 'test@test.de', 'test', 'test');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `vereine_articles`
--
ALTER TABLE `vereine_articles`
  ADD PRIMARY KEY (`articleID`);

--
-- Indizes für die Tabelle `vereine_uploads`
--
ALTER TABLE `vereine_uploads`
  ADD PRIMARY KEY (`uploadID`);

--
-- Indizes für die Tabelle `vereine_users`
--
ALTER TABLE `vereine_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `vereine_articles`
--
ALTER TABLE `vereine_articles`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT für Tabelle `vereine_uploads`
--
ALTER TABLE `vereine_uploads`
  MODIFY `uploadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT für Tabelle `vereine_users`
--
ALTER TABLE `vereine_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
