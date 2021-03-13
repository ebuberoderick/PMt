-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 05:23 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peacemass`
--

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE `directions` (
  `id` int(255) NOT NULL,
  `Dfrom` varchar(99) NOT NULL,
  `pAddress` varchar(99) NOT NULL,
  `pContact` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`id`, `Dfrom`, `pAddress`, `pContact`) VALUES
(1, 'fdsgg', 'sfgfgs', 'sfffdfdf'),
(2, 'uuhijkj', 'okjlkn.,k', 'lkmlkj'),
(3, 'efd', 'dfgrtrt', '36534567346'),
(4, 'eafsd', 'dsfvdfv', '4534536564646'),
(5, '345534', 'asdfaesfsdaewea', '3435456565');

-- --------------------------------------------------------

--
-- Table structure for table `logistics`
--

CREATE TABLE `logistics` (
  `ency` varchar(199) NOT NULL,
  `logFrom` varchar(99) NOT NULL,
  `logTo` varchar(99) NOT NULL,
  `price` varchar(99) NOT NULL,
  `qrCode` varchar(199) NOT NULL,
  `bookTime` datetime NOT NULL DEFAULT current_timestamp(),
  `receiver` varchar(99) NOT NULL,
  `receiverT` varchar(99) NOT NULL,
  `stut` int(9) NOT NULL DEFAULT 1,
  `userId` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logistics`
--

INSERT INTO `logistics` (`ency`, `logFrom`, `logTo`, `price`, `qrCode`, `bookTime`, `receiver`, `receiverT`, `stut`, `userId`) VALUES
('73b1070bd96876d2fa2c74962a75e324', '', '', '45765', 'user_611610604a79ca82a12.png', '2021-03-11 21:12:58', '45645645', '', 1, 'user_611610'),
('c89f2f78463f3827314a06c3b335222f', 'fdsgg', '', '34634', 'user_611610604a7c683b311.png', '2021-03-11 21:24:08', '324556345', '345645', 1, 'user_611610');

-- --------------------------------------------------------

--
-- Table structure for table `recipts`
--

CREATE TABLE `recipts` (
  `bustype` varchar(99) NOT NULL,
  `departure` varchar(99) NOT NULL,
  `ency` varchar(199) NOT NULL,
  `price` varchar(99) NOT NULL,
  `Qrcode` varchar(199) NOT NULL,
  `seats` varchar(99) NOT NULL,
  `timeBook` datetime NOT NULL DEFAULT current_timestamp(),
  `transitId` varchar(99) NOT NULL,
  `Ufrom` varchar(99) NOT NULL,
  `userId` varchar(99) NOT NULL,
  `uto` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipts`
--

INSERT INTO `recipts` (`bustype`, `departure`, `ency`, `price`, `Qrcode`, `seats`, `timeBook`, `transitId`, `Ufrom`, `userId`, `uto`) VALUES
('ded', '', '6a05edcabbfee9febea75de0dabc6347', '448', 'user_611610604a5b4a21673.png', '8', '2021-03-11 19:02:48', '1', 'fdsgg', 'user_611610', '');

-- --------------------------------------------------------

--
-- Table structure for table `transportflow`
--

CREATE TABLE `transportflow` (
  `busType` varchar(99) NOT NULL,
  `departure` varchar(99) NOT NULL,
  `depdate` varchar(99) NOT NULL,
  `Id` int(11) NOT NULL,
  `nubSeats` varchar(199) NOT NULL,
  `price` varchar(99) NOT NULL,
  `status` int(9) NOT NULL DEFAULT 1,
  `transFrom` varchar(99) NOT NULL,
  `transTo` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportflow`
--

INSERT INTO `transportflow` (`busType`, `departure`, `depdate`, `Id`, `nubSeats`, `price`, `status`, `transFrom`, `transTo`) VALUES
('ded', '06:06:00', '2021-03-23', 1, '78', '56', 1, 'fdsgg', ''),
('ded', '06:06:00', '2021-03-23', 2, '78', '56', 1, 'fdsgg', ''),
('ded', '06:06:00', '2021-03-23', 3, '78', '56', 1, 'fdsgg', ''),
('rtrd', '04:41:00', '2021-03-26', 4, '66', '45764', 1, 'fdsgg', ''),
('sddf', '12:12:00', '2021-03-30', 5, '45', '343453', 1, 'uuhijkj', ''),
('wfad', '12:12:00', '2021-03-31', 6, '345', '34564', 1, 'fdsgg', '');

-- --------------------------------------------------------

--
-- Table structure for table `usersinfo`
--

CREATE TABLE `usersinfo` (
  `acctType` varchar(99) NOT NULL DEFAULT '0',
  `emailAd` varchar(99) NOT NULL,
  `firstname` varchar(99) NOT NULL,
  `imgs` varchar(99) NOT NULL DEFAULT '4.png',
  `othername` varchar(99) NOT NULL,
  `passoword` varchar(99) NOT NULL,
  `phone` varchar(99) NOT NULL,
  `sn` int(255) NOT NULL,
  `surname` varchar(99) NOT NULL,
  `userId` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersinfo`
--

INSERT INTO `usersinfo` (`acctType`, `emailAd`, `firstname`, `imgs`, `othername`, `passoword`, `phone`, `sn`, `surname`, `userId`) VALUES
('1', '', 'dfveiruiu', '4.png', 'sdjnsdi', '1234', '54676364', 1, 'sdfdhkh', 'user_611610'),
('0', '', 'sdfgrfq', '4.png', 'sfvdfv', 'rrrrr', '3456455', 2, 'sefdf', 'user_399234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportflow`
--
ALTER TABLE `transportflow`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `directions`
--
ALTER TABLE `directions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transportflow`
--
ALTER TABLE `transportflow`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usersinfo`
--
ALTER TABLE `usersinfo`
  MODIFY `sn` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
