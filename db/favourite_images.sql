-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2013 at 06:33 AM
-- Server version: 5.0.96-community
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `websoftt_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite_images`
--

CREATE TABLE IF NOT EXISTS `favourite_images` (
  `id` int(20) NOT NULL auto_increment,
  `image_url` text collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `favourite` bit(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `favourite_images`
--

INSERT INTO `favourite_images` (`id`, `image_url`, `description`, `favourite`) VALUES
(14, 'http://www.nytimes.com/images/2012/12/02/us/NUN-2/NUN-2-thumbStandard.jpg', '', ''),
(11, 'http://www.nytimes.com/images/2012/08/29/business/MUSIC/MUSIC-thumbStandard.jpg', 'dsadasdsa', ''),
(12, 'http://farm3.staticflickr.com/2802/4110210173_93e24b4039_z.jpg', 'ewrwrwer', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
