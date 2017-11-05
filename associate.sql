-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2017 at 05:43 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `associate`
--

CREATE TABLE IF NOT EXISTS `associate` (
  `qno` int(3) NOT NULL,
  `first` varchar(99) NOT NULL,
  `ansa` varchar(99) NOT NULL,
  `second` varchar(99) NOT NULL,
  `ansb` varchar(99) NOT NULL,
  `third` varchar(99) NOT NULL,
  `ansc` varchar(99) NOT NULL,
  `fourth` varchar(99) NOT NULL,
  `ansd` varchar(99) NOT NULL,
  `fifth` varchar(99) NOT NULL,
  `anse` varchar(99) NOT NULL,
  PRIMARY KEY (`qno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `associate`
--

INSERT INTO `associate` (`qno`, `first`, `ansa`, `second`, `ansb`, `third`, `ansc`, `fourth`, `ansd`, `fifth`, `anse`) VALUES
(1, 'do people around you seek your help ?', 'strongly agree', 'would you categorise yourself as a leader ?', 'neutral', 'Do you like to help others ?', 'somewhat agree', 'Do you retrospect your actions ?', 'somewhat disagree', 'Do you consider yourself a good advisor ?', 'strongly disagree'),
(2, 'do you let your emotions cloud your actions ?', 'somewhat agree', 'what is the mother of invention ?', 'necessity', 'what is the name of jon"s direwolf ?', 'ghost', 'what killed the cat ?', 'curiosity', 'What comes before a storm ?', 'calmness');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
