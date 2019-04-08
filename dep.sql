-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 08, 2019 la 08:00 PM
-- Versiune server: 8.0.13
-- Versiune PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `dep`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `diagnostice`
--

CREATE TABLE `diagnostice` (
  `id` int(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `denumire` varchar(255) NOT NULL,
  `data_adaugare` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_fisa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `fise_medicale`
--

CREATE TABLE `fise_medicale` (
  `id` int(255) NOT NULL,
  `data_adaugare` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observatii` text NOT NULL,
  `tip_fisa` int(10) NOT NULL,
  `trimisa` tinyint(1) NOT NULL,
  `id_spital` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pacienti`
--

CREATE TABLE `pacienti` (
  `id` int(255) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `cnp` varchar(10) NOT NULL,
  `data_nastere` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `pacienti`
--

INSERT INTO `pacienti` (`id`, `nume`, `prenume`, `cnp`, `data_nastere`, `sex`, `telefon`, `email`) VALUES
(1, 'Nedelcu', 'ion', 'sadsdasd', '2005-01-12', 1, '0723524257', 'nedelcu.stefandaniel@gmail.com');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tratamente`
--

CREATE TABLE `tratamente` (
  `id` int(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `denumire` varchar(255) NOT NULL,
  `data_adaugare` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_fisa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id` int(255) NOT NULL,
  `nuime` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `rol` int(3) NOT NULL,
  `specializare` varchar(100) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_spital` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `diagnostice`
--
ALTER TABLE `diagnostice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`id_fisa`);

--
-- Indexuri pentru tabele `fise_medicale`
--
ALTER TABLE `fise_medicale`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `pacienti`
--
ALTER TABLE `pacienti`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tratamente`
--
ALTER TABLE `tratamente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_tratamente` (`id_fisa`);

--
-- Indexuri pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `diagnostice`
--
ALTER TABLE `diagnostice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `fise_medicale`
--
ALTER TABLE `fise_medicale`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `pacienti`
--
ALTER TABLE `pacienti`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `tratamente`
--
ALTER TABLE `tratamente`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `diagnostice`
--
ALTER TABLE `diagnostice`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`id_fisa`) REFERENCES `fise_medicale` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `tratamente`
--
ALTER TABLE `tratamente`
  ADD CONSTRAINT `foreign_key_tratamente` FOREIGN KEY (`id_fisa`) REFERENCES `fise_medicale` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
