-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2022 at 08:06 AM
-- Server version: 10.6.8-MariaDB-1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cims`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_table`
--

CREATE TABLE `case_table` (
  `cId` int(11) NOT NULL,
  `refNo` varchar(20) DEFAULT NULL,
  `cName` varchar(200) DEFAULT NULL,
  `cAge` int(5) DEFAULT NULL,
  `cOccupation` varchar(200) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `cAddress` varchar(100) DEFAULT NULL,
  `cContact` varchar(13) DEFAULT NULL,
  `cDesc` text DEFAULT NULL,
  `cDate` date DEFAULT NULL,
  `dOId` int(11) DEFAULT NULL,
  `pId` int(11) DEFAULT NULL,
  `pFindings` text DEFAULT NULL,
  `iDate` date DEFAULT NULL,
  `iComment` varchar(100) DEFAULT NULL,
  `iOId` int(11) DEFAULT NULL,
  `cRBNo` varchar(100) DEFAULT NULL,
  `feedback` varchar(250) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_table`
--

INSERT INTO `case_table` (`cId`, `refNo`, `cName`, `cAge`, `cOccupation`, `gender`, `cAddress`, `cContact`, `cDesc`, `cDate`, `dOId`, `pId`, `pFindings`, `iDate`, `iComment`, `iOId`, `cRBNo`, `feedback`, `status`) VALUES
(1, '#REF382209060692', 'Namuju Sarah', 19, 'Student', 'female', 'Mengo ', NULL, 'was robbed while heading back home, thieves are alleged to have weapons. it was at night and they were masked . they were around 3 of them one tall and two short.......', '2022-09-06', NULL, 3, 'hdfg', '2022-09-08', 'qwer', 202, 'w', NULL, 'investigatedCase'),
(2, '#REF382209080970', 'asdf', 57, 'dff', 'male', 'rtyfu', '578', 'xcgv', '2022-09-08', NULL, 3, 'yu', '2022-09-08', 'tyu', 202, NULL, 'asfdghjkl', 'rsaFeedback'),
(4, '#REF382209080262', 'rty8', 57, 'sdxcf', 'male', 'retyu', 'fdxhcg', 'esrdtruy', '2022-09-08', NULL, 3, 'drytfuygi', '2022-09-08', 'ertrdyt', 202, NULL, NULL, 'rsaSent'),
(5, '#REF382209080363', 'Mike Matia', 50, 'Businessman', 'male', 'kisugu', '0740987900', 'phone was stolen while moving from town back to home', '2022-09-08', NULL, 3, '.nkj,hg', '2022-09-08', 'kjhgfds', 202, NULL, NULL, 'investigatedCase'),
(6, '#REF382209080596', 'Nakalu Angella', 45, 'Tailoress', 'female', 'Mutungo', '075-5223366', 'was raped on the eve of Christmas by gang of men while she was left at workplace alone', '2022-09-08', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'complaint'),
(7, '#REF382209080555', 'Kimuli Agre', 17, 'Student', 'male', 'Kibuye', '078326789', 'was attacked by a group of people requesting him to give them his property, they beat him and took the shoes, phone, wallet and some money', '2022-09-08', NULL, 3, 'dtfyguhijo', '2022-09-08', 'tyuhij', 202, NULL, NULL, 'discardedComplaint'),
(8, '#REF382209080550', 'Magret Joyce', 54, 'Teacher', 'female', 'Bwaise- Nabukalu', '0754 900600', 'missing son who is recalled having been seen around the Sewage line which is being constructed', '2022-09-08', NULL, 3, 'it is found that the child was taken by certain individuals who were driving a black Noah.. ', '2022-09-08', 'criminals should be taken to court', 202, NULL, NULL, 'investigatedCase');

-- --------------------------------------------------------

--
-- Table structure for table `policeStation`
--

CREATE TABLE `policeStation` (
  `pId` int(11) NOT NULL,
  `pName` varchar(200) DEFAULT NULL,
  `pAddress` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policeStation`
--

INSERT INTO `policeStation` (`pId`, `pName`, `pAddress`) VALUES
(1, 'Nakulabye Police station1', 'Nankulabye'),
(2, 'Nansana Kibuloka stationA', 'Nansana '),
(3, 'Wandegeya Police Station', 'Wandegeya '),
(4, 'Kabalagala Police Station', 'Ggaba Road'),
(5, 'Nafubambi Police Station', 'Kikoni-Makerere');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `userCode` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `offId` varchar(10) DEFAULT NULL,
  `courtName` varchar(200) DEFAULT NULL,
  `pId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `userCode`, `password`, `type`, `offId`, `courtName`, `pId`) VALUES
(1, 'officer256', 'Admin02', '$2y$10$wQkvZsLrvXchoDOnM75WjOAMs4Ve.g5WDlyThO10r2U/K.p3aExN6', 'admin', '204', NULL, NULL),
(8, 'Okello', 'do03', '$2y$10$nGf4dNAmwBOMkkc7Z21pauRcNPRIP.K/rZQo80ICB0MyTIdoGNU1a', 'do', '88', '', 3),
(9, 'Mathew', 'io55', '$2y$10$8YWgMALkr/7pzQeBXwbopeeDSZXDnnN/0FwOZAkB99lEuzcjGrHLu', 'io', '202', '', 3),
(17, 'ssegawa', 'oc02', '$2y$10$2Ww.H5PujhYB8SImocBuJe.ILm1q/vwoSgC2jVXXd/lpVfYcl.XdS', 'oc', '155', '', 3),
(18, 'kakiga', 'rsa02', '$2y$10$IUyaus5qtcFsyaCb3ihXqO.nK7ogAEZBoeGU9ABlMrNzaUBq4YJeu', 'rsa', '', 'Wandegeya court', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_table`
--
ALTER TABLE `case_table`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `policeStation`
--
ALTER TABLE `policeStation`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_table`
--
ALTER TABLE `case_table`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `policeStation`
--
ALTER TABLE `policeStation`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
