-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2016 at 09:07 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sizzlingfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `dinnermenu`
--

CREATE TABLE IF NOT EXISTS `dinnermenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `dayrate` int(11) NOT NULL,
  `monthrate` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dinnermenu`
--

INSERT INTO `dinnermenu` (`id`, `name`, `menu`, `dayrate`, `monthrate`, `description`) VALUES
(1, 'mini meal pack', '5Roti /dal /Rice /veg /Accessory', 60, 50, 'for those having low diet'),
(2, 'Regular meal pack', '7Roti /dal /Rice /veg /Accessory', 65, 60, 'for those having average diet');

-- --------------------------------------------------------

--
-- Table structure for table `lunchmenu`
--

CREATE TABLE IF NOT EXISTS `lunchmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `dayrate` int(11) NOT NULL,
  `monthrate` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lunchmenu`
--

INSERT INTO `lunchmenu` (`id`, `name`, `menu`, `dayrate`, `monthrate`, `description`) VALUES
(1, 'mini meal pack', '5Roti /dal /Rice /veg /Accessory', 60, 50, 'for those having low diet'),
(2, 'Regular meal pack', '7Roti /dal /Rice /veg /Accessory', 65, 60, 'for those having average diet'),
(3, 'max meal pack', '8Roti /dal /Rice /2veg /Accessory', 80, 70, 'for those having heavy diet'),
(4, 'Special meal pack', '5Roti /dal /Rice /2veg /dahi/sweet/salad', 90, 85, 'for those having special diet');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `type` varchar(250) NOT NULL,
  `pack` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `confirm` varchar(250) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `start date` varchar(20) NOT NULL,
  `end date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `phone`, `address`, `type`, `pack`, `amount`, `confirm`, `duration`, `email`, `start date`, `end date`) VALUES
(1, 'arti', '9292929292', 'bikaner', 'lunch', 'Regular meal pack', '65', 'mail not send', 'one day', 'aarti@gmail.com', '06/09/2016', '06/09/2016'),
(2, 'aarti', '9292929292', 'jaipur', 'lunch', 'Regular meal pack', '1800', 'mail not send', 'monthly', 'aarti@gmail.com', '06/09/2016', '07-09-2016');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `copyright_text` varchar(250) NOT NULL,
  `mailid` varchar(255) NOT NULL,
  `contect` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo`, `copyright_text`, `mailid`, `contect`) VALUES
(1, 'sizzling foods', 'logo.jpg', 'copyright@2010 All right reserved.', 'kamlbharia@gmail.com', '9166572729');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `userrollid` int(5) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `pic` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `fullname`, `password`, `userrollid`, `address`, `mobile`, `pic`) VALUES
(1, 'kamlbharia', 'kamlbharia@gmail.com', 'kamlesh', 'kamlkaml', 2, 'vpo-sonasar', '9166572729', '1459846842Desert.jpg'),
(2, 'priya', 'priyankadehru83@gmail.com', 'priyanka', 'priyanka', 2, 'bikaner', '9024775873', '1459847614Penguins.jpg'),
(3, 'abhishek', 'abhi4204u@gmail.com', 'abhi', 'abhishek', 2, 'bhilwara', '9999999999', '1459850651Chrysanthemum.jpg'),
(10, 'ankit', 'ankit@gmail.com', 'ankit', 'ankitkumar', 2, 'kota', '9199887744', '1459928158Lighthouse.jpg'),
(11, 'kamalbharia', 'kamlbharia@gmail.com', 'kamlesh', '83bc1d8e68db73beeaf2003ec9dcf1a9', 1, 'vpo-sonasar', '9166572729', '1460449784Desert.jpg'),
(12, 'kkamlbharia', 'kamlbharia@gmail.com', 'kaml', '5faa6098b3adaf34db61c15163eff574', 1, 'sonasar', '9166572729', '1465585386Chrysanthemum.jpg'),
(13, 'sharha', 'shardha@gmail.com', 'shardha', 'f4c07ae394b0b841166cc3b829cbb3c5', 1, 'bikaner', '9191919191', '1460450787Hydrangeas.jpg'),
(14, 'aarti', 'aarti@gmail.com', 'aarti', 'c26cf19cab23bced196bfbc88dd3c2e3', 1, 'jaipur', '9292929292', '1465411288Tulips.jpg'),
(17, 'kamlkumar', 'kamlbharia@yahoomail.com', 'kamlesh', '62684428dcd52156fa5239ec7f2f50d9', 1, 'nmlsdkl', '9772132045', '1463503003IMG-20150824-WA0002.jpg'),
(18, 'kamlesh', 'kamlkaml@jsks.com', 'kamlesh', 'a61a527defc01f8452a382f7f7697c7f', 2, 'sonasar', '8875770564', '1464889301IMG-20150824-WA0003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_contactus`
--

CREATE TABLE IF NOT EXISTS `user_contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `mailid` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_contactus`
--

INSERT INTO `user_contactus` (`id`, `name`, `mailid`, `contact`, `message`, `address`) VALUES
(1, 'abhishek', 'abhi4204u@gmail.com', '9414977683', 'hi', 'bhilwara'),
(2, 'abhi', 'abhi@gml.com', '9414977683', 'hellow', 'bhl'),
(4, 'vishal', 'vishu@gmail.com', '9414977683', 'you have a good servise', 'bhl'),
(5, 'shradha', 'vishu@gmail.com', '9414977683', 'hiiiiiiiiiii', 'jpr'),
(6, 'kamlesh', 'kamlbharia@gmail.com', '9414977683', 'hellow', 'jpr'),
(7, 'abhishek', 'abhi4204u@gmail.com', '9414977683', 'hellow sizzling food', 'bhilwara'),
(9, 'abhishek', 'abhi4204u@gmail.com', '9414977683', 'hfsjkdlsghfjknghfjksdghushfcjkd', 'bhl'),
(10, 'dilip singh', 'dilip2010singh@gmail.com', '9509773002', '\r\n\r\nhiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'bhl'),
(11, 'dillu', 'dilip2010singh@gmail.com', '9509773002', 'hi abhi I want some food', 'bhilwara');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
