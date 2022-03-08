-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 10:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tclmpesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `mpesa_transaction_id` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `transaction_date` varchar(100) NOT NULL,
  `transaction_time` varchar(100) NOT NULL,
  `reason` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `phone_number`, `amount`, `mpesa_transaction_id`, `balance`, `transaction_date`, `transaction_time`, `reason`) VALUES
(79, '254716721025', '1', 'QBC02YIMQ8', '', '2022-02-12', '19:35', ''),
(80, '254716721025', '1', 'QBC831DJCA', '', '2022-02-12', '20:04', ''),
(81, '254716721025', '1', 'QBC831DJCA', '', '2022-02-12', '20:04', ''),
(82, '254716721025', '1', 'QBM7KQBWMV', '', '2022-02-22', '18:15', ''),
(83, '254716721025', '1', 'QBM7KQBWMV', '', '2022-02-22', '18:15', ''),
(84, '254716721025', '1', 'QBM1KRXJAH', '', '2022-02-22', '18:33', ''),
(85, '254716721025', '1', 'QBM1KRXJAH', '', '2022-02-22', '18:33', ''),
(86, '254716721025', '1', 'QBM1KRXJAH', '', '2022-02-22', '18:33', ''),
(87, '254716721025', '1', 'QBM1KRXJAH', '', '2022-02-22', '18:33', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
