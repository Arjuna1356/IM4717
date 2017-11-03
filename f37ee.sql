-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2017 at 04:28 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f37ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movieID` int(10) unsigned NOT NULL,
  `movieName` char(50) NOT NULL,
  `movieDate` date NOT NULL,
  `movieTime` time NOT NULL,
  PRIMARY KEY (`movieID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieID`, `movieName`, `movieDate`, `movieTime`) VALUES
(111, 'Kingsman: The Golden Circle', '2017-11-10', '21:00:00'),
(112, 'Kingsman: The Golden Circle', '2017-11-10', '22:00:00'),
(113, 'Kingsman: The Golden Circle', '2017-11-11', '15:00:00'),
(114, 'Kingsman: The Golden Circle', '2017-11-11', '17:00:00'),
(221, 'It', '2017-11-10', '16:30:00'),
(222, 'It', '2017-11-10', '21:30:00'),
(223, 'It', '2017-11-11', '13:30:00'),
(224, 'It', '2017-11-11', '23:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movieID` int(11) NOT NULL,
  `customerEmail` char(50) NOT NULL,
  `bookingDate` char(10) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `movieID`, `customerEmail`, `bookingDate`, `amount`) VALUES
(1, 221, 'sda@dasdsa', '', 0),
(2, 221, 'sda@dasdsa', '', 0),
(3, 221, 'sda@dasdsa', '', 0),
(4, 221, 'sda@dasdsa', '', 0),
(5, 221, 'sda@dasdsa', '', 0),
(6, 221, 'sda@dasdsa', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `orderID` int(10) unsigned NOT NULL,
  `movieID` int(11) NOT NULL,
  `seatID` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `seatID` char(2) NOT NULL,
  `seatRow` int(11) NOT NULL,
  `seatCol` char(1) NOT NULL,
  PRIMARY KEY (`seatID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seatID`, `seatRow`, `seatCol`) VALUES
('1A', 1, 'A'),
('1B', 1, 'B'),
('1C', 1, 'C'),
('1D', 1, 'D'),
('1E', 1, 'F'),
('2A', 2, 'A'),
('2B', 2, 'B'),
('2C', 2, 'C'),
('2D', 2, 'D'),
('2E', 2, 'F'),
('3A', 3, 'A'),
('3B', 3, 'B'),
('3C', 3, 'C'),
('3D', 3, 'D'),
('3E', 3, 'F'),
('4A', 4, 'A'),
('4B', 4, 'B'),
('4C', 4, 'C'),
('4D', 4, 'D'),
('4E', 4, 'F'),
('5A', 5, 'A'),
('5B', 5, 'B'),
('5C', 5, 'C'),
('5D', 5, 'D'),
('5E', 5, 'F');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
