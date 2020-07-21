-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2019 at 08:50 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `buyyer` varchar(50) NOT NULL,
  `itemid` bigint(10) NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exchangeables`
--

DROP TABLE IF EXISTS `exchangeables`;
CREATE TABLE IF NOT EXISTS `exchangeables` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `pid` varchar(50) NOT NULL,
  `category` varchar(6) NOT NULL,
  `img` varchar(80) NOT NULL,
  `name` varchar(500) NOT NULL,
  `year` int(4) NOT NULL,
  `price` double NOT NULL,
  `country` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchangeables`
--

INSERT INTO `exchangeables` (`id`, `pid`, `category`, `img`, `name`, `year`, `price`, `country`) VALUES
(50, 'shwetha.shyam.bhandary@gmail.com', 'coin', 'img/c5.jpg', 'queen coin', 1897, 1000, 'India'),
(47, 'shwetha.shyam.bhandary@gmail.com', 'stamp', 'img/s1.jpg', 'set of 50 stamps', 1972, 600, 'India'),
(41, 'shreemasimran@gmail.com', 'coin', 'img/c8.jpg', 'Golden jublee Indian Coin', 1968, 195, 'India'),
(40, 'shreemasimran@gmail.com', 'coin', 'img/c7.jpg', 'Ru. Komagata Maru incident Coin', 1914, 75, 'India'),
(52, 'shwetha.shyam.bhandary@gmail.com', 'coin', 'img/P1.jpg', 'yoga day coin', 2018, 30, ''),
(36, 'shwetha.shyam.bhandary@gmail.com', 'note', 'img/n2.jpg', 'one rupee indian note', 1968, 10, 'India'),
(48, 'shwetha.shyam.bhandary@gmail.com', 'note', 'img/n1.jpg', '10 rupees note', 1978, 98, 'India'),
(33, 'shwetha.shyam.bhandary@gmail.com', 'stamp', 'img/s3.jpg', 'Mahapilla stamps', 1954, 600, 'India'),
(51, 'shwetha.shyam.bhandary@gmail.com', 'coin', 'img/c6.jpg', 'set of ancient indian coin', 1927, 1500, 'India'),
(49, 'shwetha.shyam.bhandary@gmail.com', 'note', 'img/n5.jpg', '2 rupees note', 1988, 20, 'India'),
(46, 'shreemasimran@gmail.com', 'coin', 'img/s7.jpg', 'Vivekananda birth anniversary stamp', 1998, 140, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `gender`, `email`, `password`) VALUES
('Shwetha Shyam', 'Bhandary', 'female', 'shwetha.shyam.bhandary@gmail.com', 'Bhandary@123'),
('Shreema', 'Simran', 'female', 'shreemasimran@gmail.com', 'Shreema@123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
