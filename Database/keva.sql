-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2023 at 06:54 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keva`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sponsor_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `left_member_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `right_member_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`cid`, `id`, `sponsor_id`, `left_member_id`, `right_member_id`) VALUES
(1, '1', '0', '2', '3'),
(2, '2', '1', '4', '5'),
(3, '3', '1', '6', '7'),
(4, '4', '2', '8', '9'),
(5, '5', '2', '10', '11'),
(6, '6', '3', '12', '13'),
(7, '7', '3', '14', '15'),
(8, '8', '4', '16', '17'),
(9, '9', '4', '18', '19'),
(10, '10', '5', '20', '21'),
(11, '11', '5', '22', '23'),
(12, '12', '6', '24', '25'),
(13, '13', '6', '26', '27'),
(14, '14', '7', '0', '0'),
(15, '15', '7', '0', '0'),
(16, '16', '8', '0', '0'),
(17, '17', '8', '0', '0'),
(18, '18', '9', '0', '0'),
(19, '19', '9', '0', '0'),
(20, '20', '10', '0', '0'),
(21, '21', '10', '28', '29'),
(22, '22', '11', '0', '0'),
(23, '23', '11', '0', '0'),
(24, '24', '12', '0', '0'),
(25, '25', '12', '0', '0'),
(26, '26', '13', '0', '0'),
(27, '27', '13', '0', '0'),
(28, '28', '21', '0', '0'),
(29, '29', '21', '0', '0'),
(30, '30', '', '0', '0'),
(31, '31', '', '0', '0'),
(32, '32', '', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `usermain`
--

DROP TABLE IF EXISTS `usermain`;
CREATE TABLE IF NOT EXISTS `usermain` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `kevaid` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pic` varchar(15) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `spn_id` varchar(5) NOT NULL,
  `spn_id_kevaid` varchar(10) NOT NULL,
  `spn_id_name` varchar(30) NOT NULL,
  `left_member_id` varchar(10) NOT NULL,
  `right_member_id` varchar(10) NOT NULL,
  `left_member_keva_id` varchar(10) NOT NULL,
  `right_member_keva_id` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(1) NOT NULL,
  `l_name` int NOT NULL,
  `r_name` int NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usermain`
--

INSERT INTO `usermain` (`cid`, `kevaid`, `name`, `username`, `pic`, `mob`, `spn_id`, `spn_id_kevaid`, `spn_id_name`, `left_member_id`, `right_member_id`, `left_member_keva_id`, `right_member_keva_id`, `password`, `role`, `l_name`, `r_name`, `status`) VALUES
(1000, 'keva001', 'Pritam Kundu', 'pritam1000', '', '8436548535', '0', '0', '0', '', '', '', '', '$2y$10$.r6MdrTV.pjpNa1oWpepuOVoRFkrQTKXvMLWrtxXOtWiZzQpx4Oae', '1', 0, 0, '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
