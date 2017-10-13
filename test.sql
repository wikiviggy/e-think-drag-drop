-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2017 at 02:06 AM
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
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `client_name` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`client_name`, `password`) VALUES
('Vignesh', '.'),
('Vignesh', '.balor123'),
('abc', '.'),
('romero', '.'),
('abhilash', '.'),
('abhilash', ''),
('abhilash', 'abhi123'),
('abhilash', ''),
('jon snow', 'ghost'),
('jon snow', ''),
('arya', ''),
('arya', 'nymeria'),
('finn balor', 'koodigrah'),
('', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(3) NOT NULL,
  `url` varchar(100) NOT NULL,
  `across1` varchar(20) DEFAULT NULL,
  `down1` varchar(20) DEFAULT NULL,
  `across2` varchar(20) DEFAULT NULL,
  `down2` varchar(20) DEFAULT NULL,
  `across3` varchar(20) DEFAULT NULL,
  `down3` varchar(20) DEFAULT NULL,
  `across4` varchar(20) DEFAULT NULL,
  `down4` varchar(20) DEFAULT NULL,
  `across5` varchar(20) DEFAULT NULL,
  `down5` varchar(20) DEFAULT NULL,
  `across6` varchar(20) DEFAULT NULL,
  `down6` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `across1`, `down1`, `across2`, `down2`, `across3`, `down3`, `across4`, `down4`, `across5`, `down5`, `across6`, `down6`) VALUES
(1, 'image/ab.png', 'option1', 'option2', 'option3', 'option4', 'option5', 'option6', 'option7', 'option8', 'option9', 'option10', 'option11', 'option12'),
(2, 'image/ex3.png', 'ans1', 'ans2', 'ans3', 'ans4', 'ans5', 'ans6', 'ans7', 'ans8', 'ans9', 'ans10', 'ans11', 'ans12'),
(3, 'image/ex4.png', 'opt1', 'opt2', 'opt3', 'opt4', 'opt5', 'opt6', 'opt7', 'opt8', 'opt9', 'opt10', 'opt11', 'opt12');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qno` int(3) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `response` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`qno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qno`, `name`, `response`) VALUES
(1, 'do people around you seek your help ?', 'strongly agree'),
(2, 'would you categorize yourself as a leader ?', 'neutral'),
(3, 'Do you like to help others ?', 'somewhat agree'),
(4, 'Do you retrospect your actions', 'somewhat disagree'),
(5, 'Do you consider yourself a good advisor ', 'strongly agree');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE IF NOT EXISTS `response` (
  `answer` varchar(30) DEFAULT NULL,
  `qno` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`qno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`answer`, `qno`) VALUES
('\n       Somewhat agree\n       ', 1),
('\n       Strongly disagree\n    ', 2),
('\n       Somewhat disagree\n    ', 3),
('\n        neutral\n       ', 4),
('\n           Strongly agree\n   ', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
