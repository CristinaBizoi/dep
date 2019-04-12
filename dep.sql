-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 12, 2019 la 08:51 AM
-- Versiune server: 10.1.35-MariaDB
-- Versiune PHP: 7.2.9

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

--
-- Eliminarea datelor din tabel `diagnostice`
--

INSERT INTO `diagnostice` (`id`, `cod`, `denumire`, `data_adaugare`, `id_fisa`) VALUES
(1, 'd1', 'diagnostic1', '2019-04-12 05:33:48', 13),
(2, 'd2', 'diagnostic2', '2019-04-12 05:33:48', 13),
(3, 'd1', 'diagnostic1', '2019-04-12 05:33:48', 14),
(4, 'd2', 'diagnostic2', '2019-04-12 05:33:48', 14);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `fise_medicale`
--

CREATE TABLE `fise_medicale` (
  `id` int(255) NOT NULL,
  `data_adaugare` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observatii` text NOT NULL,
  `tip_fisa` int(10) NOT NULL,
  `id_pacient` int(255) NOT NULL,
  `trimisa` tinyint(1) NOT NULL DEFAULT '0',
  `id_spital` int(255) DEFAULT NULL,
  `id_utilizator` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `fise_medicale`
--

INSERT INTO `fise_medicale` (`id`, `data_adaugare`, `observatii`, `tip_fisa`, `id_pacient`, `trimisa`, `id_spital`, `id_utilizator`) VALUES
(3, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(4, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(5, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(6, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(7, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(8, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(9, '2019-04-12 05:33:48', 'TEST', 2, 1, 0, 1, 1),
(10, '2019-04-12 05:33:48', 'TEST externare', 2, 1, 0, 1, 1),
(11, '2019-04-12 05:33:48', 'TEST externare', 2, 1, 0, 1, 1),
(12, '2019-04-12 05:33:48', 'TEST externare', 2, 1, 0, 1, 1),
(13, '2019-04-12 05:33:48', 'TEST fisa adaugare', 1, 1, 0, 1, 1),
(14, '2019-04-12 05:33:48', 'TEST fisa adaugare', 1, 1, 0, 1, 1);

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
-- Structură tabel pentru tabel `spitale`
--

CREATE TABLE `spitale` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) DEFAULT NULL,
  `oras` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `spitale`
--

INSERT INTO `spitale` (`id`, `nume`, `oras`, `telefon`) VALUES
(1, 'Spitalul Judetean Constanta', 'Constanta', '0722332333'),
(2, 'Institutul National de Boli Prof. Matei Bals', 'Bucuresti', '0722332333'),
(3, 'Spitalul Universitar de Urgență București', 'Bucuresti', '021 318 0523'),
(4, 'Spitalul Clinic Județean de Urgență Cluj-Napoca', 'Cluj-Napoca', '0264 597 852'),
(5, 'Spitalul Clinic Judeţean de Urgenţă Sibiu', 'Sibiu', '0269 215 050'),
(6, 'Spitalul Clinic Județean de Urgență Brasov', 'Brasov', '0268 320 022');

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

--
-- Eliminarea datelor din tabel `tratamente`
--

INSERT INTO `tratamente` (`id`, `cod`, `denumire`, `data_adaugare`, `id_fisa`) VALUES
(6, '1111', 'test tratament', '2019-04-12 05:33:48', 12),
(7, '2222', 'test tratament2', '2019-04-12 05:33:48', 12),
(8, 't1', 'tratament1', '2019-04-12 05:33:48', 13),
(9, 't2', 'tratament2', '2019-04-12 05:33:48', 13),
(10, 't1', 'tratament1', '2019-04-12 05:33:48', 14),
(11, 't2', 'tratament2', '2019-04-12 05:33:48', 14);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id` int(255) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `rol` int(3) NOT NULL,
  `specializare` varchar(100) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_spital` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `nume`, `prenume`, `rol`, `specializare`, `telefon`, `parola`, `email`, `id_spital`) VALUES
(1, 'test2', 'test2', 2, 'medic', '232', '', 'nedelcu.stefandaniel@gmail.com', 2),
(2, 'Ionescu', 'Vasile', 1, 'Pediatrie', '0723524257', '68eacb97d86f0c4621fa2b0e17cabd8c', 'stefan.nedelcu@gmail.ro', 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilizator` (`id_utilizator`),
  ADD KEY `id_utilizator_2` (`id_utilizator`);

--
-- Indexuri pentru tabele `pacienti`
--
ALTER TABLE `pacienti`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `spitale`
--
ALTER TABLE `spitale`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `diagnostice`
--
ALTER TABLE `diagnostice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `fise_medicale`
--
ALTER TABLE `fise_medicale`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pentru tabele `pacienti`
--
ALTER TABLE `pacienti`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `spitale`
--
ALTER TABLE `spitale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `tratamente`
--
ALTER TABLE `tratamente`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `diagnostice`
--
ALTER TABLE `diagnostice`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`id_fisa`) REFERENCES `fise_medicale` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `fise_medicale`
--
ALTER TABLE `fise_medicale`
  ADD CONSTRAINT `medic` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `tratamente`
--
ALTER TABLE `tratamente`
  ADD CONSTRAINT `foreign_key_tratamente` FOREIGN KEY (`id_fisa`) REFERENCES `fise_medicale` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
