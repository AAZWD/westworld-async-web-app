-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 07:48 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brl`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAccountInfo` (IN `user` VARCHAR(25))  NO SQL
SELECT *
FROM reservations
LEFT JOIN user_account ON user_account.Username = reservations.Username
LEFT JOIN cabins ON cabins.ID=reservations.CID
LEFT JOIN departures ON departures.Main = reservations.Dep_Date
WHERE reservations.Username = user
ORDER by reservations.Res_ID ASC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cabins`
--

CREATE TABLE `cabins` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Vacant` varchar(1) NOT NULL DEFAULT 'Y',
  `Type` varchar(10) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Amenities` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabins`
--

INSERT INTO `cabins` (`ID`, `Name`, `Vacant`, `Type`, `Description`, `Amenities`) VALUES
(1, 'Abernathy', 'Y', 'Twin', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Immersive'),
(2, 'Armistice', 'N', 'Double', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Modern'),
(3, 'Black', 'Y', 'Single', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Immersive'),
(4, 'Escaton', 'Y', 'Double', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Modern'),
(5, 'Flood', 'Y', 'Double', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Immersive'),
(6, 'Ford', 'Y', 'Single', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Immersive'),
(7, 'Hughes', 'Y', 'Single', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Immersive'),
(8, 'Millay', 'Y', 'Twin', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Modern'),
(9, 'PennyFeather', 'Y', 'Twin', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Modern'),
(10, 'Stubbs', 'Y', 'Single', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'Modern');

-- --------------------------------------------------------

--
-- Table structure for table `departures`
--

CREATE TABLE `departures` (
  `ID` int(11) NOT NULL,
  `Main` date NOT NULL,
  `Escalante` date NOT NULL,
  `Pariah` date NOT NULL,
  `LasMudas` date NOT NULL,
  `Sweetwater` date NOT NULL,
  `1` varchar(1) NOT NULL DEFAULT 'Y',
  `2` varchar(1) NOT NULL DEFAULT 'Y',
  `3` varchar(1) NOT NULL DEFAULT 'Y',
  `4` varchar(1) NOT NULL DEFAULT 'Y',
  `5` varchar(1) NOT NULL DEFAULT 'Y',
  `6` varchar(1) NOT NULL DEFAULT 'Y',
  `7` varchar(1) NOT NULL DEFAULT 'Y',
  `8` varchar(1) NOT NULL DEFAULT 'Y',
  `9` varchar(1) NOT NULL DEFAULT 'Y',
  `10` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departures`
--

INSERT INTO `departures` (`ID`, `Main`, `Escalante`, `Pariah`, `LasMudas`, `Sweetwater`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`) VALUES
(1, '2025-01-01', '2025-01-03', '2025-01-04', '2025-01-05', '2025-01-06', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(2, '2025-02-01', '2025-02-03', '2025-02-04', '2025-02-05', '2025-02-06', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(3, '2025-03-01', '2025-03-03', '2025-03-04', '2025-03-05', '2025-03-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(4, '2025-04-01', '2025-04-03', '2025-04-04', '2025-04-05', '2025-04-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(5, '2025-05-01', '2025-05-03', '2025-05-04', '2025-05-05', '2025-05-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(6, '2025-06-01', '2025-06-03', '2025-06-04', '2025-06-05', '2025-06-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(7, '2025-07-01', '2025-07-03', '2025-07-04', '2025-07-05', '2025-07-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(8, '2025-08-01', '2025-08-03', '2025-08-04', '2025-08-05', '2025-08-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(9, '2025-09-01', '2025-09-03', '2025-09-04', '2025-09-05', '2025-09-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(10, '2025-10-01', '2025-10-03', '2025-10-04', '2025-10-05', '2025-10-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(11, '2025-11-01', '2025-11-03', '2025-11-04', '2025-11-05', '2025-11-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(12, '2025-12-01', '2025-12-03', '2025-12-04', '2025-12-05', '2025-12-06', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `Res_ID` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Dep_Date` date NOT NULL,
  `Destination` varchar(20) NOT NULL,
  `CID` int(11) NOT NULL,
  `Dietary` varchar(500) NOT NULL,
  `Special` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`Res_ID`, `Username`, `Dep_Date`, `Destination`, `CID`, `Dietary`, `Special`) VALUES
(1, 'test2', '2025-02-01', 'Sweetwater', 2, 'none', 'none'),
(2, 'test2', '2025-01-01', 'Sweetwater', 2, 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`Username`, `Password`, `Email`) VALUES
('test', 'test', 'test@test.com'),
('test2', 'test2', 'test2@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabins`
--
ALTER TABLE `cabins`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `departures`
--
ALTER TABLE `departures`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Res_ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabins`
--
ALTER TABLE `cabins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departures`
--
ALTER TABLE `departures`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
