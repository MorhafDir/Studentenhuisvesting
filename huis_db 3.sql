-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 mrt 2024 om 14:55
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `huis_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `huisvestingen`
--

CREATE TABLE `huisvestingen` (
  `huisvesting_id` int(11) NOT NULL,
  `aanbieder` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `stad` varchar(100) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `beschikbaarheid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `huisvestingen`
--

INSERT INTO `huisvestingen` (`huisvesting_id`, `aanbieder`, `adres`, `stad`, `postcode`, `beschikbaarheid`) VALUES
(8, '', 'J H 21', 'Edam', '1135GV', 0),
(9, '', 'amsterdam noord', 'adam', '1234XD', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerkers`
--

CREATE TABLE `medewerkers` (
  `medewerker_id` int(11) NOT NULL,
  `gebruikersnaam` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoonnummer` varchar(15) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `rol` enum('medewerker','admin') NOT NULL DEFAULT 'medewerker'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `medewerkers`
--

INSERT INTO `medewerkers` (`medewerker_id`, `gebruikersnaam`, `email`, `telefoonnummer`, `wachtwoord`, `rol`) VALUES
(9, 'hamood', 'hamoodhabib@gmail.com', '123124124', '$2y$10$XaTKKxyVvO0o6Ivj63veBeJLRvxbkTagnSQYcsZBPVBKTRe3h3AxS', 'admin'),
(16, 'testing1', '12@gmail.com', '0612345678', '$2y$10$JLbM4UuYVlhD94eTcwBH5eQDPwMi/XRY2Ef.toBhTtcx0hSMIeUE2', 'medewerker'),
(60, 'niiiiiiiiiiiiii', 'gmail@gmail.com', '123123123', '$2y$10$3K7z18EKqaI1eVdCXGYpU.7D9j2epHD5Zs8DnN/1AjsbsoixlZU8e', 'medewerker'),
(61, 'moon', 'moon@moon.nl', '123123123', '$2y$10$h1L4v86nN4MxpWyzwvHWdeMQCzvKeeT6tPRsUTHzqcjlP2CCqfm3G', 'medewerker'),
(62, 'testingtesting', 'testtttt@gmail.com', '123456789', '$2y$10$yvQqVpZxVeOK2nWVwNt.g.YQvrWiwO84dI2ggP4bDJ4rApZAKSMb6', 'medewerker');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `studenten`
--

CREATE TABLE `studenten` (
  `student_id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `leeftijd` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `studenten`
--

INSERT INTO `studenten` (`student_id`, `naam`, `leeftijd`) VALUES
(6, 'nutszzz1', 123),
(9, 'benji', 12),
(11, 'bbbbbb', 12);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student_huisvesting`
--

CREATE TABLE `student_huisvesting` (
  `student_id` int(11) NOT NULL,
  `huisvesting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `huisvestingen`
--
ALTER TABLE `huisvestingen`
  ADD PRIMARY KEY (`huisvesting_id`);

--
-- Indexen voor tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`medewerker_id`),
  ADD UNIQUE KEY `gebruikersnaam` (`gebruikersnaam`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `studenten`
--
ALTER TABLE `studenten`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexen voor tabel `student_huisvesting`
--
ALTER TABLE `student_huisvesting`
  ADD PRIMARY KEY (`student_id`,`huisvesting_id`),
  ADD KEY `huisvesting_id` (`huisvesting_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `huisvestingen`
--
ALTER TABLE `huisvestingen`
  MODIFY `huisvesting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `medewerker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT voor een tabel `studenten`
--
ALTER TABLE `studenten`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `student_huisvesting`
--
ALTER TABLE `student_huisvesting`
  ADD CONSTRAINT `student_huisvesting_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studenten` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_huisvesting_ibfk_2` FOREIGN KEY (`huisvesting_id`) REFERENCES `huisvestingen` (`huisvesting_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
