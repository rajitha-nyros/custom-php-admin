-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2012 at 10:39 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";# MySQL returned an empty result set (i.e. zero rows).



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;# MySQL returned an empty result set (i.e. zero rows).

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;# MySQL returned an empty result set (i.e. zero rows).

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;# MySQL returned an empty result set (i.e. zero rows).

/*!40101 SET NAMES utf8 */;# MySQL returned an empty result set (i.e. zero rows).


--
-- Database: `databasename`
--

-- --------------------------------------------------------

--
-- 

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_name` varchar(30) NOT NULL,
  `users_password` varchar(30) NOT NULL,
  `users_email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;# MySQL returned an empty result set (i.e. zero rows).


--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`users_id`, `users_name`, `users_password`, `users_email`) VALUES
(9, 'admin', 'admin', 'admin@admin.com');# 1 row(s) affected.


-- --------------------------------------------------------

--
-- Table structure for table `zrow`
--

CREATE TABLE IF NOT EXISTS `zrow` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `updated_id` int(11) NOT NULL,
  `deleted_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `tablename` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=308 ;# MySQL returned an empty result set (i.e. zero rows).
