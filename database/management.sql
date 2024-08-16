-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 11:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `adminname` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `loginid`, `password`, `status`, `usertype`) VALUES
(1, 'Taimoor', 'admin', 'admin123', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentid` int(10) NOT NULL,
  `appointmenttype` varchar(25) NOT NULL,
  `childid` int(10) NOT NULL,
  `vaccineid` int(10) NOT NULL,
  `appointmentdate` date NOT NULL,
  `appointmenttime` time NOT NULL,
  `hospitalid` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentid`, `appointmenttype`, `childid`, `vaccineid`, `appointmentdate`, `appointmenttime`, `hospitalid`, `status`) VALUES
(1, '', 1, 13, '2023-07-20', '15:00:00', 13, 'Approved'),
(2, 'ONLINE', 2, 7, '2023-07-15', '15:00:00', 7, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `childid` int(10) NOT NULL,
  `childname` varchar(50) NOT NULL,
  `admissiondate` date NOT NULL,
  `admissiontime` time NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`childid`, `childname`, `admissiondate`, `admissiontime`, `address`, `mobileno`, `city`, `pincode`, `loginid`, `password`, `bloodgroup`, `gender`, `dob`, `status`) VALUES
(1, 'basit', '2023-07-14', '16:07:55', 'shah faisal colony', '99894619', 'karachi', '', 'basit', 'basit123', '', 'Male', '2000-05-05', 'Active'),
(2, 'taimoor', '2023-07-14', '19:56:38', 'shah faisal colony', '03324444798', 'karachi', '', 'taimoor', 'taimoor123', '', 'Male', '2002-03-05', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospitalid` int(10) NOT NULL,
  `hospitalname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `vaccineid` int(10) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `address` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospitalid`, `hospitalname`, `mobileno`, `vaccineid`, `loginid`, `password`, `status`, `address`) VALUES
(1, 'Patel Hospital', '7002225650', 1, 'patel', 'patel123', 'Active', 'Gulshan-e-Iqbal'),
(2, 'Agha Khan Hospital', '7023695696', 2, 'agakhan', 'agakhan12', 'Active', 'Gulistan-e-Johar'),
(3, 'Liaquat National Hospital', '7014545470', 3, 'liaquat', 'liaquat12', 'Inactive', 'Safoora'),
(4, 'NIBD Hospital', '7025558690', 4, 'nibdhos', 'nibdhos12', 'Active', 'Hassan Square'),
(5, 'Jinnah Hospital', '7854025410', 5, 'jinnah', 'jinnah12', 'Active', 'Saddar'),
(6, 'Mumtaz Hospital', '7410002540', 6, 'mumtaz', 'mumtaz12', 'Inactive', 'Kala Board'),
(7, 'Nehal Hospital', '7012569990', 7, 'nehal', 'nehal123', 'Active', 'Dhoraji'),
(8, 'Cardio Hospital', '7012569990', 8, 'cardio', 'cardio12', 'Active', 'Jamshed Road'),
(9, 'SIUT Hospital', '7012569990', 9, 'siuthos', 'siuthos12', 'Active', 'Gulzar-e-Hijri'),
(10, 'Civil Hospital', '7012225470', 10, 'civil', 'civil123', 'Active', 'Gulshan-e-Hadeed'),
(11, 'Indus Hospital', '7012225470', 11, 'indus', 'indus123', 'Inactive', 'Chowrangi'),
(12, 'DOW University Hospital', '7012225470', 12, 'university', 'university12', 'Active', 'I.I Chundrigar'),
(13, 'Tabba Heart Hospital', '7012225470', 13, 'tabba', 'tabba123', 'Active', 'Nazimabad'),
(14, 'Fauji Foundation Hospital', '7012225470', 14, 'fauji', 'fauji123', 'Active', 'Orangi');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `vaccineid` int(10) NOT NULL,
  `vaccinename` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vaccineid`, `vaccinename`, `description`, `status`) VALUES
(1, 'Tetannus Vaccine', 'used to prevent tetanus', 'Active'),
(2, 'Polio Vaccine', 'used to prevent poliomyelitis', 'Active'),
(3, 'Inactivated vaccine', 'killed version of the germ that causes a disease', 'Inactive'),
(4, 'Hepatitis B  Vaccine', 'used to prevent infection by the hepatitis B virus', 'Active'),
(5, 'Pertusssis Vaccine', 'protects against whooping cough', 'Active'),
(6, 'Influenza Vaccine', 'used to prevent infection by the influenza viruses', 'Inactive'),
(7, 'Zifivax (ZF2001) Vaccine', 'protein subunit vaccine using a dimeric form of the receptor-binding domain', 'Active'),
(8, 'Measles,Mumps,and Rubel(MMR) Vaccine', 'protects against three potentially serious illnesses', 'Active'),
(9, 'Rotavirus Vaccine', 'used to protect against rotavirus infections', 'Active'),
(10, 'Bacille Calmette-Guerin Vaccine', 'used against tuberculosis', 'Active'),
(11, 'Vaxzevria Vaccine', 'preventing coronavirus disease 2019', 'Inactive'),
(12, 'Pneumococcal Vaccine', 'used against the bacterium Streptococcus pneumoniae', 'Active'),
(13, 'Sinovac Vaccine', 'utilises unreactive coronavirus particles that have been killed to stimulate our bodies to produce antibodies as an immune response', 'Active'),
(14, 'Human Papillomavirus Vaccine', 'helps protect the body against infection', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentid`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`childid`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospitalid`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`vaccineid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `childid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospitalid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `vaccineid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
