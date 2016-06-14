-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2016 at 02:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

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
-- Table structure for table `menukaart`
--

CREATE TABLE `menukaart` (
  `id` int(6) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `prijs` double NOT NULL,
  `soort_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menukaart`
--

INSERT INTO `menukaart` (`id`, `naam`, `prijs`, `soort_id`) VALUES
(11, 'Haringtartaar met tomaat en lente-ui', 3.5, 6),
(12, 'Stokbrood met kruidenboter', 2.5, 6),
(13, 'Garnalen Cocktail', 3.5, 6),
(14, 'Gemarineerde champignons met geitenkaas', 3, 6),
(15, 'Verse tomatensoep', 4, 7),
(16, 'Soep van de dag', 5, 7),
(17, 'Gefrituurde inktvis ringen', 6.5, 7),
(18, 'Mini Hamburgers', 9.5, 7),
(19, 'Groene Salade', 4, 8),
(20, 'Salade met gerookte zalm', 5.5, 8),
(21, 'Salade met walnoten', 5, 8),
(22, 'Salade met walnoten', 5.5, 8),
(23, 'Ossenhaas met champignonensaus', 11, 9),
(24, 'Wienerschnitzel', 12.5, 9),
(25, 'Biefstuk', 12, 9),
(26, 'Spareribs (4 stuks)', 13, 9),
(27, 'De bonte koe hamburger met patat', 12.5, 9),
(28, 'Kipfilet', 9.5, 9),
(29, 'Margarita', 8, 10),
(30, 'Pepperoni Pizza', 9.5, 10),
(31, 'Tonijn', 10, 10),
(32, 'Pizza van de Chef', 12, 10),
(33, 'Chocomel', 4, 13),
(34, 'Koffie', 4, 14),
(35, 'Alcohol van de Chef', 139.99, 15);

-- --------------------------------------------------------

--
-- Table structure for table `menukaart_soort_id`
--

CREATE TABLE `menukaart_soort_id` (
  `id` int(6) NOT NULL,
  `course` int(11) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `opmerking` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menukaart_soort_id`
--

INSERT INTO `menukaart_soort_id` (`id`, `course`, `naam`, `opmerking`) VALUES
(6, 5, 'Koude Voorgerechten', NULL),
(7, 5, 'Warme voorgerechten', NULL),
(8, 6, 'Salades', NULL),
(9, 6, 'Vlees', NULL),
(10, 6, 'Pizza''s', NULL),
(11, 6, 'Vis', NULL),
(12, 7, 'Ijs', NULL),
(13, 8, 'Koude Dranken', NULL),
(14, 8, 'Warme Dranken', NULL),
(15, 8, 'Alcohol', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menukaart_soort_id_course`
--

CREATE TABLE `menukaart_soort_id_course` (
  `id` int(6) NOT NULL,
  `coursenaam` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menukaart_soort_id_course`
--

INSERT INTO `menukaart_soort_id_course` (`id`, `coursenaam`) VALUES
(5, 'Voorgerecht'),
(6, 'Hoofdgerecht'),
(7, 'Nagerecht'),
(8, 'Drinken');

-- --------------------------------------------------------

--
-- Table structure for table `reserveringen`
--

CREATE TABLE `reserveringen` (
  `id` int(6) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `aantalpers` int(6) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `opmerking` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `ww` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `naam`, `ww`) VALUES
(2, 'admin', 'maakhetbont');

-- --------------------------------------------------------

--
-- Table structure for table `zalen`
--

CREATE TABLE `zalen` (
  `id` int(6) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `tekst` text,
  `foto` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menukaart`
--
ALTER TABLE `menukaart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soort_id` (`soort_id`);

--
-- Indexes for table `menukaart_soort_id`
--
ALTER TABLE `menukaart_soort_id`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `menukaart_soort_id_course`
--
ALTER TABLE `menukaart_soort_id_course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zalen`
--
ALTER TABLE `zalen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menukaart`
--
ALTER TABLE `menukaart`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `menukaart_soort_id`
--
ALTER TABLE `menukaart_soort_id`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `menukaart_soort_id_course`
--
ALTER TABLE `menukaart_soort_id_course`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `zalen`
--
ALTER TABLE `zalen`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menukaart_soort_id`
--
ALTER TABLE `menukaart_soort_id`
  ADD CONSTRAINT `menukaart_soort_id_ibfk_1` FOREIGN KEY (`course`) REFERENCES `menukaart_soort_id_course` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
