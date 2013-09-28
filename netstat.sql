-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2013 at 07:46 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `netstat`
--
CREATE DATABASE IF NOT EXISTS `netstat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `netstat`;

-- --------------------------------------------------------

--
-- Table structure for table `cron_downloads`
--

CREATE TABLE IF NOT EXISTS `cron_downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `url` varchar(255) NOT NULL,
  `size` float NOT NULL,
  `time` float NOT NULL,
  `speed` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cron_downloads`
--

INSERT INTO `cron_downloads` (`id`, `date`, `url`, `size`, `time`, `speed`) VALUES
(8, '2013-09-28 19:46:07', 'http://ftp.sunet.se/pub/os/Linux/distributions/debian-cd/current-live/i386/iso-hybrid/debian-live-7.0.0-i386-xfce-desktop.iso.zsync', 4141310, 64.9037, 0.49);

-- --------------------------------------------------------

--
-- Table structure for table `cron_pings`
--

CREATE TABLE IF NOT EXISTS `cron_pings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `response_time` float NOT NULL,
  `packet_loss` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
