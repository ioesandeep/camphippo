-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2016 at 06:35 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdy_hippo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `last_login`) VALUES
(1, 'Test', 'cms@ajnewmedia.co.uk', '65d43300f15b651391a04a61808916e0', '2016-02-29 04:18:47'),
(2, 'Sumit', 'sumit@cms.co.uk', '5e7fc29af67e0019b586747b64e3ac5b', '2014-08-26 15:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `type` enum('LEFT','MIDDLE','RIGHT') NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camps`
--

CREATE TABLE IF NOT EXISTS `camps` (
  `id` int(11) NOT NULL,
  `type` enum('1','2','3','4') DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `start_date` varchar(16) DEFAULT NULL,
  `start_time` varchar(16) DEFAULT NULL,
  `end_date` varchar(16) DEFAULT NULL,
  `end_time` varchar(16) DEFAULT NULL,
  `venue` varchar(16) DEFAULT NULL,
  `signup_url` varchar(1024) DEFAULT NULL,
  `video_url` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camps`
--

INSERT INTO `camps` (`id`, `type`, `title`, `description`, `start_date`, `start_time`, `end_date`, `end_time`, `venue`, `signup_url`, `video_url`) VALUES
(1, '1', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>', '2016-3-2', '5:10:00 PM', '2016-3-24', '5:10:00 PM', 'Lorem ipsum dolo', '', ''),
(2, '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>', '2016-2-26', '10:32:00 PM', '2016-2-28', '10:40:15 PM', 'Lorem ipsum dolo', 'http://facebook.com', 'http://facebook.com'),
(3, '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>', '2016-2-16', '10:38:45 PM', '2016-2-26', '10:38:45 PM', 'Lorem ipsum dolo', 'http://facebook.com', ''),
(4, '2', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>', '2016-2-18', '5:10:00 PM', '2016-2-20', '5:10:00 PM', 'Lorem ipsum dolo', '', ''),
(5, '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>', '2016-2-26', '10:32:00 PM', '2016-2-28', '10:40:15 PM', 'Lorem ipsum dolo', 'http://facebook.com', 'http://facebook.com'),
(6, '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>', '2016-2-16', '10:38:45 PM', '2016-2-26', '10:38:45 PM', 'Lorem ipsum dolo', 'http://facebook.com', ''),
(7, '3', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>', '2016-02-18', '5:10:00 PM', '2016-02-20', '5:10:00 PM', 'Lorem ipsum dolo', '', ''),
(8, '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>', '2016-2-26', '10:32:00 PM', '2016-2-28', '10:40:15 PM', 'Lorem ipsum dolo', 'http://facebook.com', 'http://facebook.com'),
(9, '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>', '2016-2-16', '10:38:45 PM', '2016-2-26', '10:38:45 PM', 'Lorem ipsum dolo', 'http://facebook.com', ''),
(10, '4', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<p>Lorem ipsum dolor sit amet</p>', '2016-2-18', '5:10:00 PM', '2016-2-20', '5:10:00 PM', 'Lorem ipsum dolo', '', ''),
(11, '4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>', '2016-2-26', '10:32:00 PM', '2016-2-28', '10:40:15 PM', 'Lorem ipsum dolo', 'http://facebook.com', 'http://facebook.com'),
(12, '4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>', '2016-2-16', '10:38:45 PM', '2016-2-26', '10:38:45 PM', 'Lorem ipsum dolo', 'http://facebook.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `start_date` varchar(16) DEFAULT NULL,
  `start_time` varchar(16) DEFAULT NULL,
  `end_date` varchar(16) DEFAULT NULL,
  `end_time` varchar(16) DEFAULT NULL,
  `venue` varchar(16) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `start_time`, `end_date`, `end_time`, `venue`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>\r\n<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>\r\n<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>', '2016-3-1', '10:32:00 PM', '2016-3-9', '10:40:15 PM', 'Lorem ipsum dolo'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>\r\n<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>', '2016-2-16', '5:10:00 PM', '2016-3-3', '5:10:00 PM', 'Lorem ipsum dolo'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>\r\n<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>', '2016-2-16', '5:10:00 PM', '2016-3-3', '5:10:00 PM', 'Lorem ipsum dolo'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>\r\n<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>', '2016-2-16', '5:10:00 PM', '2016-3-3', '5:10:00 PM', 'Lorem ipsum dolo'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>\r\n<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>', '2016-2-16', '5:10:00 PM', '2016-3-3', '5:10:00 PM', 'Lorem ipsum dolo'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>\r\n<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit  lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui  leo.</p>', '2016-2-16', '5:10:00 PM', '2016-3-3', '5:10:00 PM', 'Lorem ipsum dolo');

-- --------------------------------------------------------

--
-- Table structure for table `module_images`
--

CREATE TABLE IF NOT EXISTS `module_images` (
  `id` int(11) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `table_id` int(11) NOT NULL,
  `link` varchar(250) NOT NULL,
  `type` enum('FULL','THUMB') NOT NULL,
  `groupings` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL,
  `type` enum('AUCTION','HOUSING') NOT NULL,
  `page_title` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `content` text,
  `meta_keywords` text,
  `meta_description` text,
  `news_date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `type`, `page_title`, `title`, `content`, `meta_keywords`, `meta_description`, `news_date`, `status`, `views`) VALUES
(1, 'AUCTION', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>', '', '', '2016-02-24', 1, 0),
(2, 'AUCTION', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>', '', '', '2016-02-22', 1, 0),
(3, 'AUCTION', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>', '', '', '2016-02-29', 1, 0),
(4, 'AUCTION', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>', '', '', '2016-02-15', 1, 0),
(5, 'AUCTION', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>', '', '', '2016-02-15', 1, 0),
(6, 'AUCTION', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus  error sit voluptatem accusantium doloremque laudantium, totam rem  aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto  beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia  voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni  dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam  est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,  sed quia non numquam eius modi tempora incidunt ut labore et dolore  magnam aliquam quaerat voluptatem.</p>', '', '', '2016-02-16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) unsigned NOT NULL,
  `blocks` varchar(250) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '-1',
  `menu_title` varchar(250) DEFAULT NULL,
  `page_title` varchar(250) DEFAULT NULL,
  `h1_title` varchar(250) DEFAULT NULL,
  `content` text,
  `meta_keywords` text,
  `meta_description` text,
  `target` enum('_SELF','_BLANK') DEFAULT '_SELF',
  `status` tinyint(4) DEFAULT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '99',
  `top_nav` tinyint(4) NOT NULL,
  `footer_nav` tinyint(4) NOT NULL,
  `theme_color` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `blocks`, `parent_id`, `menu_title`, `page_title`, `h1_title`, `content`, `meta_keywords`, `meta_description`, `target`, `status`, `position`, `top_nav`, `footer_nav`, `theme_color`) VALUES
(1, '', -1, 'Home', 'Welcome to Camp Hippo', 'Home', '', '', '', '', 1, 0, 0, 0, ''),
(2, '', -1, 'Lifeguarding', 'Lifeguarding', 'Lifeguarding', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed  dolor mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt.</p>', '', '', '', 1, 5, 1, 0, ''),
(3, '', -1, 'Kids Camps', 'Kids Camps', 'Kids Camps', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed  dolor mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt.</p>', '', '', '', 1, 6, 1, 0, ''),
(4, '', -1, 'Triathlons', 'Triathlons', 'Triathlons', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed  dolor mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt.</p>', '', '', '', 1, 7, 1, 0, ''),
(5, '', -1, 'Trampolining', 'Trampolining', 'Trampolining', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor  mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt. Integer hendrerit lectus  sapien, ut consectetur sem condimentum quis. Mauris vitae dui leo.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed  dolor mauris, ultricies sit amet rhoncus consectetur, volutpat eu eros.  Pellentesque fermentum ex id laoreet tincidunt.</p>', '', '', '', 1, 8, 1, 0, ''),
(6, '', -1, 'About us', 'About us', 'About us', '<p>Camp Hippo is owned and run by husband and wife team Jan &amp; Gary  Kilsby. Our Aim is to provide Healthy, Interesting, Practical, Physical  and Organised acitivites and camps for children and adults alike. We are  the leading provider in the area.</p>\r\n<p class="red-text">Jan and Gary&rsquo;s Background</p>\r\n<div class="owner-background-info">\r\n<ol>\r\n    <li>Both have been teaching at Pocklington School for 15 years.</li>\r\n    <li>Both are involved in the delivery of Games, P.E.,  Cadets, D of E, School trips, Holiday camps, Trampolining, Lifeguarding,  Swimming, Cheerleading, Gymnastics &amp; Dance.</li>\r\n    <li>Prior to teaching at the school both served 22 years with the British Army as members of the Royal Army Physical Training Corps.</li>\r\n    <li>Both represented Great Britain at the World Age Group  triathlon championships in Perth Australia. Jan also represented the  Army at the European Triathlon Championships.</li>\r\n    <li>Jan coached the girls Under 11 Novice trampolining team  to success at the National Schools&rsquo; Trampolining Championships. The team  was nominated as BBC Yorkshire Team of the Year. Which they duly won.</li>\r\n    <li>Both have been running Childrens&rsquo; holiday camps at the  school for the past 13 years. This also involves trips to the South of  France each summer.</li>\r\n    <li>Both have taken cadets to Annual camps (which are one week long) and weekend competitions for the past 15 years.</li>\r\n    <li>Both as RLSS Lifeguard Trainer Assessors have delivered  Lifeguard courses at the school pool for the past 4 years. The School  training centre was awarded &ldquo;Best Training Provider&rdquo; 2015 by the  Humberside &amp; East Yorkshire branch of the RLSS.</li>\r\n    <li>Jan has been the senior coach and has created a  Trampolining club which has been running for the past 9 years. The club  is based at the School''s Sports Hall.</li>\r\n    <li>Jan has created the (Pearls) Cheerleading group in the school which has been operating for the past 12 years.</li>\r\n    <li>Both created and now Jan runs the school&rsquo;s swimming teams.</li>\r\n</ol>\r\n</div>\r\n<p class="red-text">Qualifications</p>\r\n<div class="owner-background-info">\r\n<ol>\r\n    <li>Jan has a degree in Psychology (BSc).</li>\r\n    <li>Jan has a BTEC National diploma in Childhood studies.</li>\r\n    <li>Gary has a Certificate in Education (CertEd).</li>\r\n    <li>Both have current DBS certificates.</li>\r\n    <li>Both are National Trampoline Coaches (Jan level 4 &amp; Gary level 2).</li>\r\n    <li>Both are ASA swimming teachers (Level 2).</li>\r\n    <li>Both are RLSS Qualified Lifeguards.</li>\r\n    <li>Both are RLSS qualified Lifeguard Trainers &amp; Assessors.</li>\r\n    <li>Both are qualified to teach the National, Rescue Award for Swimming Teachers &amp; Coaches (NRASTC).</li>\r\n    <li>Both are First Aid at Work (FAW) qualified.</li>\r\n    <li>Both are qualified FAW, AED &amp; Paediatric First Aid trainers &amp; assessors.</li>\r\n    <li>Both have full driving licences which allow them to drive minibuses.</li>\r\n    <li>Jan is a National BCA Cheerleading coach.</li>\r\n    <li>Jan is a British Gymnastics Coach.</li>\r\n    <li>Gary is a Gold Expedition Assessor for Duke of Edinburgh Award (DofE).</li>\r\n    <li>Gary has a Mountain Leader Training award.</li>\r\n</ol>\r\n</div>', '', '', '', 1, 9, 1, 0, ''),
(7, '', -1, 'Events', 'Events', 'Events', '<p>Lorem  ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor mauris,  ultricies sit amet rhoncus consectetur, volutpat eu eros. Pellentesque  fermentum ex id laoreet tincidunt. Integer hendrerit lectus sapien, ut  consectetur sem condimentum quis. Mauris vitae dui leo.</p>', '', '', '', 1, 12, 1, 0, ''),
(8, '', -1, 'Contact', 'Contact', 'Get in touch with us', '<p>If you need to get in touch with us, please either email us contact  us by phone. We will be more than happy to answer any of your questions.  We will contact you within 24hrs of your enquiry.</p>', '', '', '', 1, 13, 1, 0, ''),
(9, '', 1, 'Lifeguarding', 'Lifeguarding', 'Lifeguarding', '<p>Lifeguarding (NPLQ) courses staged at the Top Training Centre in the East Riding of Yorkshire and Humberside.</p>', '', '', '', 1, 1, 0, 0, ''),
(10, '', 1, 'Kids Camps', 'Kids Camps', 'Kids Camps', '<p>\r\nKids Camps for school years 5 and 6. One or two week camps in the Summer, with great facilitiesand set in a lovely environment</p>', '', '', '', 1, 2, 0, 0, ''),
(11, '', 1, 'Triathlons', 'Triathlons', 'Triathlons', '<p>Both adult and children&rsquo;s triathlons staged in and around Pocklington. A pool swim with excellent changing and marshalling facilities.</p>', '', '', '', 1, 3, 0, 0, ''),
(12, '', 1, 'Trampolining', 'Trampolining', 'Trampolining', '<p>A thriving trampolining club that excepts children of all abilities, between 5-18. Excellent coaching in a relaxed and friendly group. Tuesdays and fridays</p>', '', '', '', 1, 4, 0, 0, ''),
(13, '', 6, 'Jan & Kayleigh', 'Jan & Kayleigh', 'Jan & Kayleigh', '', '', '', '', 1, 10, 0, 0, ''),
(14, '', 6, 'Gary', 'Gary', 'Gary', '', '', '', '', 1, 11, 0, 0, ''),
(15, '', -1, 'news', 'news', 'News', '', '', '', '', 1, 14, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `label` text,
  `value` text,
  `control` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `table` varchar(25) DEFAULT NULL,
  `column` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `label`, `value`, `control`, `type`, `class`, `size`, `table`, `column`) VALUES
(1, 'contact_email', 'Contact Email', 'rob@websitedesignersyorkshire.co.uk', 'input', 'text', 'required', 40, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_data`
--

CREATE TABLE IF NOT EXISTS `site_data` (
  `name` varchar(32) NOT NULL,
  `value` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_data`
--

INSERT INTO `site_data` (`name`, `value`) VALUES
('application', 'Camp Hippo'),
('facebook', 'http://facebook.com'),
('twitter', 'https://twitter.com'),
('jan_phone', '07815 681 979'),
('gary_phone', '07718 202 510'),
('jan_email', 'jan@camphippo.co.uk'),
('gary_email', 'gary@camphippo.co.uk'),
('address', 'Fenwick-Smith House, Pocklington School, West Green, Pocklington, YO42 2NJ'),
('email', 'info@camphippo.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `description` varchar(512) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `description`, `status`) VALUES
(2, 'Healthy, Interesting, Practical, Physical, Organised', 1),
(3, 'Healthy, Interesting, Practical, Physical, Organised', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `name`, `email`, `date_added`) VALUES
(1, 'Lorem ipsum', 'wdydev@gmail.com', '2016-02-29 00:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `url_rewrite`
--

CREATE TABLE IF NOT EXISTS `url_rewrite` (
  `id` int(11) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `table_id` int(11) NOT NULL,
  `module` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url_rewrite`
--

INSERT INTO `url_rewrite` (`id`, `table_name`, `table_id`, `module`, `url`) VALUES
(1, 'page', 1, '', '/home.html'),
(2, 'page', 2, '', '/lifeguarding.html'),
(3, 'page', 3, '', '/kids-camps.html'),
(4, 'page', 4, '', '/triathlons.html'),
(5, 'page', 5, '', '/trampolining.html'),
(6, 'page', 6, '', '/about-us.html'),
(7, 'page', 7, '', '/events.html'),
(8, 'page', 8, '', '/contact.html'),
(9, 'page', 9, '', '/home-lifeguarding.html'),
(10, 'page', 10, '', '/home-kids-camps.html'),
(11, 'page', 11, '', '/home-triathlons.html'),
(12, 'page', 12, '', '/home-trampolining.html'),
(13, 'page', 13, '', '/jan-kayleigh.html'),
(14, 'page', 14, '', '/gary.html'),
(15, 'news', 1, '', '/news-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit.html'),
(16, 'news', 2, '', '/news-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-4.html'),
(17, 'news', 3, '', '/news-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-5.html'),
(18, 'news', 4, '', '/news-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-1.html'),
(19, 'news', 5, '', '/news-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-2.html'),
(20, 'news', 6, '', '/news-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-3.html'),
(21, 'page', 15, '', '/news.html'),
(22, 'camps', 2, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-7.html'),
(23, 'camps', 3, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-6.html'),
(24, 'events', 1, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit.html'),
(25, 'events', 2, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-1.html'),
(26, 'events', 3, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-2.html'),
(27, 'events', 4, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-3.html'),
(28, 'events', 5, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-4.html'),
(29, 'events', 6, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-5.html'),
(30, 'camps', 1, '', '/camp-lorem-ipsum-dolor-sit-amet.html'),
(31, 'camps', 4, '', '/camp-lorem-ipsum-dolor-sit-amet-1.html'),
(32, 'camps', 5, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-8.html'),
(33, 'camps', 6, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-9.html'),
(34, 'camps', 8, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-10.html'),
(35, 'camps', 9, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-11.html'),
(36, 'camps', 10, '', '/camp-lorem-ipsum-dolor-sit-amet-2.html'),
(37, 'camps', 11, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-12.html'),
(38, 'camps', 12, '', '/camp-lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-13.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camps`
--
ALTER TABLE `camps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_images`
--
ALTER TABLE `module_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url_rewrite`
--
ALTER TABLE `url_rewrite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `camps`
--
ALTER TABLE `camps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `module_images`
--
ALTER TABLE `module_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `url_rewrite`
--
ALTER TABLE `url_rewrite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
