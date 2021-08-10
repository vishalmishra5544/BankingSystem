-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 05:25 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `srno` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `pincode` int(7) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`srno`, `name`, `email`, `balance`, `phoneno`, `pincode`, `state`) VALUES
(1, 'vishal', 'vishalmishra5544@gmail.com', '104000.00', '9082300330', 400006, 'Maharashtra'),
(2, 'Nikita', 'nikita2324@gmail.com', '99722.00', '9082301110', 400010, 'Maharashtra'),
(3, 'Ramesh', 'ramesh111@gmail.com', '51999.00', '8823456721', 2331, 'Bihar'),
(4, 'Suresh', 'suresh23@hotmail.com', '65001.00', '8238461723', 3213, 'Assam'),
(5, 'Kalpesh', 'kalpesh11@gmail.com', '85679.00', '9238457218', 400760, 'Maharashtra'),
(6, 'Nishank', 'nishank53@gmail.com', '80599.00', '9823712738', 20901, 'kerala'),
(7, 'Chetan', 'chetan22@hotmail.com', '1223.00', '8239482721', 823921, 'punjab'),
(8, 'Ashwin', 'ashwin12@gmail.com', '15000.00', '9283726163', 40281, 'kerala'),
(9, 'Aniket', 'aniket72@gmail.com', '58000.00', '9283729100', 31827, 'Gujarat'),
(10, 'Rituja', 'rituja21@gmail.com', '101777.00', '9827152788', 62010, 'Rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `transactionrecords`
--

CREATE TABLE `transactionrecords` (
  `id` int(3) NOT NULL,
  `sendername` varchar(50) NOT NULL,
  `receivername` varchar(50) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionrecords`
--

INSERT INTO `transactionrecords` (`id`, `sendername`, `receivername`, `amount`, `datetime`) VALUES
(1, 'vishal', 'Nikita', '1000.00', '2021-08-08 07:39:43'),
(2, 'Kalpesh', 'Ashwin', '5000.00', '2021-08-09 15:15:39'),
(3, 'Ramesh', 'Aniket', '8000.00', '2021-08-09 15:16:10'),
(4, 'Rituja', 'vishal', '5000.00', '2021-08-09 15:17:02'),
(5, 'Suresh', 'Ramesh', '9999.00', '2021-08-09 15:17:26'),
(6, 'Chetan', 'Rituja', '8777.00', '2021-08-09 15:17:49'),
(7, 'Kalpesh', 'Nishank', '4321.00', '2021-08-09 15:18:12'),
(8, 'Nishank', 'Nikita', '8722.00', '2021-08-09 15:18:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `transactionrecords`
--
ALTER TABLE `transactionrecords`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `srno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactionrecords`
--
ALTER TABLE `transactionrecords`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
