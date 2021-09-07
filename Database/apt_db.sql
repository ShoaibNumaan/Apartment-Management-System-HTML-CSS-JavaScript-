-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 04:31 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apt_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `apt_on_sale` ()  NO SQL
SELECT * FROM apartment WHERE Apt_for = 'Sale'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getLogDetails` ()  NO SQL
SELECT * FROM apt_logs$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `Apt_ID` varchar(10) NOT NULL,
  `Build_ID` varchar(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `No_of_Rooms` int(1) NOT NULL,
  `Apt_For` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`Apt_ID`, `Build_ID`, `Price`, `No_of_Rooms`, `Apt_For`) VALUES
('N1001', 'B101', 3000000, 3, 'Sale'),
('N1002', 'B101', 4000000, 4, 'Rent'),
('N1003', 'B101', 2500000, 2, 'Lease'),
('P1001', 'B103', 5000000, 2, 'Sale'),
('P1002', 'B103', 6500000, 3, 'Rent'),
('P1003', 'B103', 7000000, 4, 'Lease'),
('P1004', 'B103', 10000000, 4, 'Sale'),
('S1001', 'B102', 5000000, 4, 'Sale'),
('S1002', 'B102', 3000000, 3, 'Rent'),
('S1003', 'B102', 2000000, 2, 'Lease');

--
-- Triggers `apartment`
--
DELIMITER $$
CREATE TRIGGER `del_trigger` BEFORE DELETE ON `apartment` FOR EACH ROW INSERT INTO apt_logs VALUES (null, OLD.Apt_ID, OLD.Build_ID, OLD.No_of_Rooms, OLD.Price, OLD.Apt_For, NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `apt_logs`
--

CREATE TABLE `apt_logs` (
  `SL_No` int(11) NOT NULL,
  `Apt_ID` varchar(10) NOT NULL,
  `Build_ID` varchar(10) NOT NULL,
  `No_of_Rooms` int(11) NOT NULL,
  `Price` int(10) NOT NULL,
  `Apt_For` varchar(10) NOT NULL,
  `CDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apt_logs`
--

INSERT INTO `apt_logs` (`SL_No`, `Apt_ID`, `Build_ID`, `No_of_Rooms`, `Price`, `Apt_For`, `CDT`) VALUES
(4, 'A1001', 'B100', 3, 3000000, 'Sale', '2019-11-29 12:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `Build_Name` varchar(20) NOT NULL,
  `Build_ID` varchar(10) NOT NULL,
  `No_of_Apts` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`Build_Name`, `Build_ID`, `No_of_Apts`) VALUES
('Noble Apartment', 'B101', 10),
('Shakuntala Nilaya', 'B102', 5),
('Prestige', 'B103', 10);

-- --------------------------------------------------------

--
-- Table structure for table `lease`
--

CREATE TABLE `lease` (
  `Lease_ID` varchar(10) NOT NULL,
  `Apt_ID` varchar(10) NOT NULL,
  `Deposit` int(10) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lease`
--

INSERT INTO `lease` (`Lease_ID`, `Apt_ID`, `Deposit`, `Start_Date`, `End_Date`) VALUES
('L1001', 'N1003', 1000000, '2017-11-30', '2020-11-30'),
('L1002', 'P1003', 1500000, '2015-09-01', '2019-09-01'),
('L1003', 'S1003', 1200000, '2019-06-05', '2021-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UserName`, `Password`) VALUES
('shoaib121', 'num');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `O_ID` varchar(10) NOT NULL,
  `Apt_ID` varchar(10) NOT NULL,
  `O_Name` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(5) NOT NULL,
  `Occupation` varchar(20) NOT NULL,
  `Phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`O_ID`, `Apt_ID`, `O_Name`, `DOB`, `Gender`, `Occupation`, `Phone`) VALUES
('1001', 'N1001', 'Imaad', '1999-10-20', 'Male', 'CSE Engg', '1231231234'),
('1002', 'N1002', 'Avinash', '1999-11-06', 'Male', 'CSE Engg', '1451451456'),
('1003', 'N1003', 'Vaishnavi', '1998-08-29', 'Femal', 'CSE Engg', '1789178914'),
('1004', 'S1001', 'Hansie', '1999-12-09', 'Male', 'Chef', '4455445544'),
('1005', 'S1002', 'Saicharan', '1999-05-05', 'Male', 'Petroleum Engg', '1785178514'),
('1006', 'S1003', 'Shubham', '1999-12-13', 'Male', 'EE Engg', '1456145614'),
('1007', 'P1001', 'Mamatha', '1988-02-18', 'Femal', 'Bussiness', '3213213214'),
('1008', 'P1002', 'Aamina', '1981-06-12', 'Femal', 'Civil Engg', '6546546541'),
('1009', 'P1003', 'Charls', '1989-06-14', 'Male', 'CSE Engg', '9876532145'),
('1010', 'P1004', 'Numaan', '1997-06-11', 'Male', 'Bussiness', '9008560282');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `Rent_ID` varchar(10) NOT NULL,
  `Apt_ID` varchar(10) NOT NULL,
  `Rent_Fee` int(6) NOT NULL,
  `Late_Fee` int(5) NOT NULL,
  `Due_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`Rent_ID`, `Apt_ID`, `Rent_Fee`, `Late_Fee`, `Due_Date`) VALUES
('R1001', 'N1002', 240000, 1000, '2021-06-16'),
('R1002', 'S1002', 200000, 1000, '2020-06-17'),
('R1003', 'P1002', 500000, 50000, '2019-12-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`Apt_ID`),
  ADD KEY `Build_ID` (`Build_ID`);

--
-- Indexes for table `apt_logs`
--
ALTER TABLE `apt_logs`
  ADD PRIMARY KEY (`SL_No`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`Build_ID`);

--
-- Indexes for table `lease`
--
ALTER TABLE `lease`
  ADD PRIMARY KEY (`Lease_ID`),
  ADD KEY `Apt_ID` (`Apt_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`O_ID`),
  ADD KEY `Apt_ID` (`Apt_ID`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`Rent_ID`),
  ADD KEY `Apt_ID` (`Apt_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apt_logs`
--
ALTER TABLE `apt_logs`
  MODIFY `SL_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `building_FK` FOREIGN KEY (`Build_ID`) REFERENCES `building` (`Build_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lease`
--
ALTER TABLE `lease`
  ADD CONSTRAINT `apartment_FK` FOREIGN KEY (`Apt_ID`) REFERENCES `apartment` (`Apt_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`Apt_ID`) REFERENCES `apartment` (`Apt_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `apmt_FK` FOREIGN KEY (`Apt_ID`) REFERENCES `apartment` (`Apt_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
