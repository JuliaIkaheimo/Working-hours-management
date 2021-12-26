-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2020 at 08:39 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trtkp19a3`
--

-- --------------------------------------------------------

--
-- Table structure for table `aaryhma4_henkilot`
--

CREATE TABLE `aaryhma4_henkilot` (
  `henkilo_id` int(11) NOT NULL,
  `tunnus` varchar(15) NOT NULL,
  `salasana` varchar(32) NOT NULL,
  `etunimi` varchar(15) NOT NULL,
  `sukunimi` varchar(15) NOT NULL,
  `sahkoposti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aaryhma4_henkilot`
--

INSERT INTO `aaryhma4_henkilot` (`henkilo_id`, `tunnus`, `salasana`, `etunimi`, `sukunimi`, `sahkoposti`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin', 'admin', 'admin'),
(2, 'anssi', 'c0a32234c36903bee041664f0ad9107d', 'Anssi', 'Kela', 'anssiii@gmail.com'),
(3, 'pekka', 'cc1293e923f51b01eeb6b39aebc77ceb', 'Pekka', 'Pouta', 'poudanpekka@luukku.fi'),
(4, 'joonas', '2c093c717b0c2443e387d94ed318fef8', 'joonas', 'nummela', 'joonashaha@gmail.com'),
(32, 'adalmiina', 'b07d0efab54baee7600ec7274a210b42', 'Adalmiina', 'Apina', 'apinahahaha@gmail.com'),
(33, 'Roni', 'cb2dd8f2be7d4373d33ea5d441abebd3', 'Roni', 'Back', 'ronsku@luukku.fi'),
(34, 'joona', 'ad49df875f868c13ed1f44a5c8ce61f6', 'Joona', 'Viitanen', 'joona33@google.fi'),
(35, 'alma', '2423b1c8171f028ddb8e59570ff8f7ae', 'Alma', 'Hehehe', 'almaww@gmail.com'),
(36, 'tomi', '450e93f5a4bed5f35174a85b923981be', 'Tomi', 'Mestari', 'mestari@outlook.com'),
(37, 'jorma', '9da2f05766d76cf17ab92bd08e5e97ce', 'Jorma', 'Uotinen', 'jormahh@luukku.fi'),
(38, 'kalle', '9b45f696f421f9c982beb5b7ee725592', 'Kalle', 'Kivinen', 'kalleonparas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `aaryhma4_projekti`
--

CREATE TABLE `aaryhma4_projekti` (
  `id` int(11) NOT NULL,
  `nimi` varchar(15) NOT NULL,
  `kuvaus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aaryhma4_projekti`
--

INSERT INTO `aaryhma4_projekti` (`id`, `nimi`, `kuvaus`) VALUES
(1, 'HTML', 'Html sivujen teko projekti'),
(2, 'PHP', 'PHP sivujen teko projekti'),
(3, 'C#', 'C# koodaus projekti'),
(4, 'CSS', 'Making CSS files'),
(12, 'Java', 'Coding with java'),
(13, 'Javascript', 'Coding with javascript'),
(14, 'Python', 'Making bot');

-- --------------------------------------------------------

--
-- Table structure for table `aaryhma4_tyoaika`
--

CREATE TABLE `aaryhma4_tyoaika` (
  `id` int(11) NOT NULL,
  `projekti` varchar(15) NOT NULL,
  `tehtava` varchar(15) NOT NULL,
  `tehdyt_tunnit` double NOT NULL,
  `henkilo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aaryhma4_tyoaika`
--

INSERT INTO `aaryhma4_tyoaika` (`id`, `projekti`, `tehtava`, `tehdyt_tunnit`, `henkilo_id`) VALUES
(1, 'HTML', 'Suunnittelu', 7.5, 5),
(2, 'HTML', 'Suunnittelu', 5.5, 2),
(3, 'PHP', 'Suunnittelu', 4.5, 3),
(4, 'PHP', 'Suunnittelu', 8.5, 2),
(5, 'PHP', 'Ohjelmointi', 8.5, 2),
(6, 'PHP', 'Ohjelmointi', 6.5, 2),
(7, 'PHP', 'Ohjelmointi', 10.5, 3),
(24, 'PHP', ' Maisteri', 3, 4),
(25, 'HTML', ' Suunnittelu', 2, 3),
(26, 'PHP', ' Suunnittelu', 200, 5),
(27, 'PHP', ' Suunnittelu', 20, 2),
(28, 'PHP', ' Suunnittelu', 20, 4),
(29, 'HTML', ' Suunnittelu', 2, 2),
(30, 'PHP', ' Suunnittelu', 20, 3),
(35, 'PHP', ' Suunnittelu', 22, 2),
(36, 'PHP', ' Suunnittelu', 20, 4),
(37, 'PHP', ' Maisteri', 200, 2),
(38, 'PHP', ' Suunnittelu', 2, 2),
(39, 'PHP', ' Suunnittelu', 200, 2),
(40, 'HTML', ' Suunnittelu', 300, 2),
(41, 'PHP', ' joo', 2, 2),
(42, 'PHP', ' joo', 20, 3),
(43, 'HTML', ' Maisteri', 20, 2),
(44, 'CSS', ' Suunnittelu', 66, 3),
(45, 'C#', ' Suunnittelu', 23.5, 3),
(46, 'CSS', ' Suunnittelu', 3.5, 3),
(47, 'PHP', ' Maisteri', 3, 3),
(48, 'CSS', ' Suunnittelu', 4, 3),
(49, 'HTML', ' Palautus', 10, 3),
(50, 'HTML', ' Maisteri', 40, 3),
(51, 'PHP', ' HienosÃ¤Ã¤tÃ¶', 1.5, 3),
(52, 'HTML', ' Suunnittelu', 2, 3),
(53, 'Java', ' Hommien hoitoo', 200, 2),
(54, 'Python', ' Suunnittelu', 10, 36),
(55, 'Javascript', ' HienosÃ¤Ã¤tÃ¶', 3, 36),
(56, 'Java', ' Suunnittelu', 2, 4),
(57, 'Java', 'Dokumentointi', 2, 36),
(58, 'PHP', ' Kahvin keitto', 3, 32),
(59, 'Python', ' Leikkiminen', 2, 32),
(60, 'PHP', ' Tubetushommia', 6, 33),
(61, 'Javascript', ' Joo', 2, 33),
(62, 'HTML', ' MÃ¤ koodaan :)', 1, 34),
(63, 'HTML', ' uwu', 100, 35),
(64, 'PHP', ' Maisteri', 30, 36),
(65, 'C#', ' Tanssi', 4, 37),
(66, 'C#', ' Hommien hoitoo', 2, 4),
(67, 'HTML', ' Suunnittelu', 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aaryhma4_henkilot`
--
ALTER TABLE `aaryhma4_henkilot`
  ADD PRIMARY KEY (`henkilo_id`);

--
-- Indexes for table `aaryhma4_projekti`
--
ALTER TABLE `aaryhma4_projekti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaryhma4_tyoaika`
--
ALTER TABLE `aaryhma4_tyoaika`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aaryhma4_henkilot`
--
ALTER TABLE `aaryhma4_henkilot`
  MODIFY `henkilo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `aaryhma4_projekti`
--
ALTER TABLE `aaryhma4_projekti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `aaryhma4_tyoaika`
--
ALTER TABLE `aaryhma4_tyoaika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
