-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 04:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayuda`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areas` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areas`, `zipcode`) VALUES
('Amparo Subdivision', 1425),
('Bagong Silang', 1428),
('Bagumbong/Pag-asa', 1421),
('Bankers Village', 1426),
('Capitol Parkland Subdivision', 1424),
('Kaybiga/Deparo', 1420),
('Lilles Ville Subdivision', 1423),
('Novaliches North', 1422),
('Tala Leprosarium', 1427),
('Victory Heights', 1427),
('1st to 7th Avenue West', 1405),
('Baesa', 1401),
('Fish Market', 1411),
('Grace Park East', 1403),
('Grace Park West', 1406),
('Isla de Cocomo', 1412),
('Kalookan City CPO', 1400),
('Kapitbahayan East', 1413),
('Kanluran Village', 1409),
('Maypajo', 1410),
('San Jose', 1404),
('Sangandaan', 1408),
('Sta. Quiteria', 1402),
('University Hills', 1407);

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `user_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `full_name` text NOT NULL,
  `age` int(11) NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `pbirth` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `emp_status` varchar(20) NOT NULL,
  `classification` varchar(20) NOT NULL,
  `month_pen` varchar(100) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`user_id`, `status`, `full_name`, `age`, `gender`, `dob`, `pbirth`, `address`, `contact`, `civil_status`, `emp_status`, `classification`, `month_pen`, `Latitude`, `Longitude`) VALUES
(44, 'Senior Citizen', 'Angelo Buenaventura', 22, 'Male', '2002-02-28', '', 'Dao Street, Zone 16, Caloocan, 1427 Metro Manila, Philippines', '09218621982', 'Married', 'Self-Employed', 'Pensioner', '3500', 14.6445, 120.969),
(46, '4Ps', 'Kelvin Malabanan Jr', 23, 'Male', '2000-04-27', '', 'Upper Little Baguio Miramonte Heights Caloocan Cit', '09763320009', 'Single', 'Self-Employed', 'Indigent', '3500', 14.6506, 120.966),
(47, 'Solo Parent', 'Sofia Mangibin', 25, 'Female', '2000-11-01', '', 'Rimas Street Amparo Subdivision Caloocan City', '09126172916', 'Married', 'Self-Employed', 'Pensioner', '2500', 0, 0),
(723047, 'Solo Parent', 'Willson Nillson', 42, 'Male', '2024-01-16', '', '7-Eleven, Taksay, Dagat-Dagatan, Caloocan, 1409 Metro Manila, Philippines', '09875412221', 'Divorced', 'Unemployed', 'Indigent', '900', 0, 0),
(183797, 'Solo Parent', 'Park Jihyo', 26, 'Female', '2024-02-01', '', 'Kiko Camarin Caloocan City', '09878812451', 'Single', 'Employed', 'Indigent', '4500', 0, 0),
(426248, '4Ps', 'Im Nayeon', 42, 'Female', '2007-02-22', '', 'Sanana Road Camarin Caloocan City', '09712817818', 'Married', 'SelfEmployed', 'Pensioner', '900', 0, 0),
(599975, '4Ps', 'Lebron James', 23, 'Male', '2024-03-17', '', 'New Abbey Road, Grace Park West, Caloocan, 1406 Metro Manila, Philippines', '09751234621', 'Married', 'SelfEmployed', 'Supported', '5000', 14.6569, 120.977),
(603152, 'Senior Citizen', 'Steph Curry', 45, 'Male', '2024-03-09', '', 'Tugatog National High School, Doctor Lazcano Street, Malabon, 1470 Metro Manila, Philippines', '09127391727', 'Single', 'Employed', 'Indigent', '2300', 14.6604, 120.966);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `user_id` int(11) NOT NULL,
  `username` varchar(17) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `emp_role` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `tele` varchar(11) NOT NULL,
  `password` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`user_id`, `username`, `full_name`, `emp_role`, `email`, `tele`, `password`) VALUES
(110524, 'adie69', 'Adie Paraluman', 'CSWD', 'adie@gmail.com', '09382134123', '123'),
(214571, 'shisha2', 'shishabol dagol', 'CSWD', 'dagolbol@gmail.com', '09213976034', '11qq11qq'),
(302312, 'user21', 'user user', 'OSCA', 'user@gmail.com', '09075291904', '123'),
(332798, 'admin122', 'nice edi pogsme', 'OSCA', 'malabanankai@gmail.com', '0921838121', '123'),
(350702, 'user4', 'user number four', 'CSWD', 'user4@gmail.com', '09217213982', '123'),
(542430, 'user5', 'user number 5', 'CSWD', 'user5@gmail.com', '09232198109', '123'),
(636391, 'hopsie02', 'Teasoy dagol', 'OSCA', 'teasoy@gmail.com', '09438965098', '123'),
(769219, 'user2', 'user numbertwo', 'CWSD', 'user_num2@gmail.com', '09686861211', '123');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pbirth` varchar(25) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `Latitude` float DEFAULT NULL,
  `Longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`user_id`, `full_name`, `status`, `gender`, `dob`, `pbirth`, `address`, `Latitude`, `Longitude`) VALUES
(7, 'fdsf', 'SeniorCitizen', 'Male', '2023-12-27', NULL, 'dsafsd', NULL, NULL),
(17, 'dsaff14213', 'SeniorCitizen', 'Male', '2023-12-18', NULL, 'Caloocan Station, NLEX Harbor Link Segment 10, Grace Park West, Caloocan, 1408 Metro Manila, Philippines', 14.6556, 120.975),
(18, 'NEW DATA', '4ps', 'Male', '2023-12-20', NULL, '', 14.6537, 120.977);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user _id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `full_name` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user _id`, `username`, `full_name`, `password`, `role`) VALUES
(1, 'russel21', 'Russel Villacastinss', 'karaoke21', 'employee'),
(2, 'admin', 'ADMIN', 'admin123', 'admin'),
(3, 'samp', 'sample sample', 'sample123', 'employee'),
(4, '', 'sample samples', '', 'employee'),
(5, '', 'russelsssssss', '', 'employee'),
(6, 'russ22', 'rsadasadsadsasssssss', 'karaoke21', ''),
(7, 'ayuda21', 'ayudamap gis', 'ayuda21', 'employee'),
(10, 'emplo', 'employee1', '123', 'employee'),
(11, NULL, 'sels', NULL, 'beneficiary'),
(12, 'russel1', 'russel ayuda', '123', 'employee'),
(13, 'user21', 'user user', '123', 'employee'),
(14, 'user3', 'user number 3', '123', 'employee'),
(15, 'admin123', 'nice edi wow', '123', 'employee'),
(16, 'admin122', 'nice edi pogsme', '123', 'employee'),
(17, 'adie69', 'Adie Paraluman', '123', 'employee'),
(18, 'shisha2', 'shishabol dagol', '11qq11qq', 'employee'),
(19, 'user4', 'user number four', '123', 'employee'),
(20, 'user5', 'user number 5', '123', 'employee'),
(21, 'hopsie02', 'Teasoy dagol', '123', 'employee'),
(22, NULL, 'Teasoy dagol', NULL, 'beneficiary'),
(23, NULL, 'Angelo Buenaventura', NULL, 'beneficiary'),
(24, NULL, 'Justin Buenaventura', NULL, 'beneficiary'),
(25, NULL, 'Kelvin Malabanan', NULL, 'beneficiary'),
(26, NULL, 'Sofia Mangibin', NULL, 'beneficiary'),
(27, NULL, 'Juan Dela Cruz', NULL, 'beneficiary'),
(28, NULL, 'Pedro Penduko', NULL, 'beneficiary'),
(29, NULL, 'Iris Cosme', NULL, 'beneficiary'),
(30, NULL, 'Willson Nillson', NULL, 'beneficiary'),
(31, NULL, 'Park Jihyo', NULL, 'beneficiary'),
(32, NULL, 'Im Nayeon', NULL, 'beneficiary'),
(33, NULL, 'Lebron James', NULL, 'beneficiary'),
(34, NULL, 'Steph Curry', NULL, 'beneficiary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user _id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user _id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
