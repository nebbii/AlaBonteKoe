-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 10:36 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

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

-- --------------------------------------------------------

--
-- Table structure for table `menukaart_soort_id_course`
--

CREATE TABLE `menukaart_soort_id_course` (
  `id` int(6) NOT NULL,
  `coursenaam` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `menukaart_soort_id`
--
ALTER TABLE `menukaart_soort_id`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menukaart_soort_id_course`
--
ALTER TABLE `menukaart_soort_id_course`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `zalen`
--
ALTER TABLE `zalen`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
