-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22.12.2022 klo 09:02
-- Palvelimen versio: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diegomerch`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `asiakas`
--

CREATE TABLE `asiakas` (
  `asiakasID` int(11) NOT NULL,
  `etunimi` varchar(32) NOT NULL,
  `sukunimi` varchar(64) NOT NULL,
  `sahkoposti` varchar(128) NOT NULL,
  `henkilotunnus` varchar(11) NOT NULL,
  `lahiosoite` varchar(64) NOT NULL,
  `postinumero` varchar(5) NOT NULL,
  `postitoimipaikka` varchar(64) NOT NULL,
  `puhelin` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Rakenne taululle `hallitsija`
--

CREATE TABLE `hallitsija` (
  `hallitsijaID` int(11) NOT NULL,
  `etunimi` varchar(32) NOT NULL,
  `sukunimi` varchar(64) NOT NULL,
  `sahkoposti` varchar(128) NOT NULL,
  `kayttajatunnus` varchar(32) NOT NULL,
  `salasana` varchar(516) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `hallitsija`
--

INSERT INTO `hallitsija` (`hallitsijaID`, `etunimi`, `sukunimi`, `sahkoposti`, `kayttajatunnus`, `salasana`) VALUES
(1, 'Pekka', 'Pekkanen', 'pekka.pekkanen@gmail.com', 'adminlol', '$2y$10$uV8wf2L8GXTnH/cCEHFW1ehwA2Ac2N8Ii5O7XOmEljbO8kqJThCWq'),
(2, 'matti', 'mattinen', 'matti.mattinen@gmail.com', 'admin', '$2y$10$BpeznGe1a3g341aETRMb1.6bkyNwMA.ucCkfYb2A.puANPPs4E7CC'),
(3, 'bob', 'bober', 'bob.bober@gmail.com', 'admin', '$2y$10$BocFhSHBa0lir0FBrHzKxejIfdYBkdkKfFQjEZGe9IT/T92D8jQr2');

-- --------------------------------------------------------

--
-- Rakenne taululle `tavara`
--

CREATE TABLE `tavara` (
  `tavaraID` int(11) NOT NULL,
  `nimi` varchar(64) NOT NULL,
  `kategoria` varchar(32) NOT NULL,
  `luotu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kuva` varchar(128) NOT NULL,
  `hinta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `tavara`
--

INSERT INTO `tavara` (`tavaraID`, `nimi`, `kategoria`, `luotu`, `kuva`, `hinta`) VALUES
(1, 'Diego Bucket Hat', 'apparel', '2022-12-21 23:21:02', 'https://cdn.discordapp.com/attachments/1050411938594689024/1054317206487437342/DiegoBuckethat.png', '19.99€'),
(2, 'Diego Coffee Mug', 'misc', '2022-12-21 23:21:19', 'https://cdn.discordapp.com/attachments/1050411938594689024/1054348459840385024/DiegoMug.png', '29.99€'),
(3, 'Diego Enamel Pins', 'accessories', '2022-12-21 23:26:35', 'https://cdn.discordapp.com/attachments/1050411938594689024/1054321081953030144/DiegoEnameledPins.png', '9.99€'),
(4, 'Diego Keychain', 'accessories', '2022-12-21 23:39:40', 'https://cdn.discordapp.com/attachments/1050411938594689024/1054312769501016144/DiegoKeychain.png', '4.99€'),
(5, 'Diego Keychain Special', 'accessories', '2022-12-22 00:02:50', 'https://cdn.discordapp.com/attachments/1050411938594689024/1054312769882693652/DiegoChrismassKeychain.png', '4.99€'),
(6, 'Diego Revengers Movie', '', '2022-12-21 23:48:14', 'https://cdn.discordapp.com/attachments/1050411938594689024/1054302616970072144/diego_revengers.png', '4.99€'),
(7, 'Fullmetal Diego Movie', '', '2022-12-21 23:56:04', 'https://cdn.discordapp.com/attachments/1050411938594689024/1054302617280454666/fullmetal_diego.png', '4.99€'),
(10, 'Diegobooth Movie', '', '2022-12-22 00:00:48', 'https://cdn.discordapp.com/attachments/1050411938594689024/1054344645435465808/Diegobooth.png', '4.99€'),
(11, 'Diegopastor Movie', '', '2022-12-22 00:02:04', 'https://cdn.discordapp.com/attachments/1050411938594689024/1054348748773396540/diegopastor.jpg', '4.99€'),
(12, 'Diego Xmas Sweater', '', '2022-12-22 07:58:07', 'https://cdn.discordapp.com/attachments/1050411938594689024/1055391942395039765/DiegoSweater.png', '59.99€'),
(13, 'Diego Sweatshirt', '', '2022-12-22 07:59:10', 'https://cdn.discordapp.com/attachments/1050411938594689024/1055392261212491806/DiegoShit.png', '59.99€');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asiakas`
--
ALTER TABLE `asiakas`
  ADD PRIMARY KEY (`asiakasID`);

--
-- Indexes for table `hallitsija`
--
ALTER TABLE `hallitsija`
  ADD PRIMARY KEY (`hallitsijaID`);

--
-- Indexes for table `tavara`
--
ALTER TABLE `tavara`
  ADD PRIMARY KEY (`tavaraID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asiakas`
--
ALTER TABLE `asiakas`
  MODIFY `asiakasID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hallitsija`
--
ALTER TABLE `hallitsija`
  MODIFY `hallitsijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tavara`
--
ALTER TABLE `tavara`
  MODIFY `tavaraID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
