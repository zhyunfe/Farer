-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-03-19 13:35:45
-- 服务器版本： 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farer`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_case`
--

DROP TABLE IF EXISTS `tp_case`;
CREATE TABLE IF NOT EXISTS `tp_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `delete_time` int(11) DEFAULT NULL,
  `seecount` int(30) DEFAULT NULL,
  `user_star` int(30) DEFAULT NULL,
  `header_image` varchar(100) DEFAULT NULL,
  `day` int(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `href` varchar(250) DEFAULT NULL,
  `traffic` varchar(250) DEFAULT NULL,
  `hotel` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_comment`
--

DROP TABLE IF EXISTS `tp_comment`;
CREATE TABLE IF NOT EXISTS `tp_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_destination`
--

DROP TABLE IF EXISTS `tp_destination`;
CREATE TABLE IF NOT EXISTS `tp_destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(10) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_hotel`
--

DROP TABLE IF EXISTS `tp_hotel`;
CREATE TABLE IF NOT EXISTS `tp_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `header_image` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `style` int(10) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `room_type` tinyint(4) DEFAULT NULL,
  `introduce` varchar(500) DEFAULT NULL,
  `gl` varchar(1000) DEFAULT NULL,
  `service` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_hotel_order`
--

DROP TABLE IF EXISTS `tp_hotel_order`;
CREATE TABLE IF NOT EXISTS `tp_hotel_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `hotel_id` int(10) DEFAULT NULL,
  `day` int(10) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `detail` text,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_notes`
--

DROP TABLE IF EXISTS `tp_notes`;
CREATE TABLE IF NOT EXISTS `tp_notes` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `seecount` int(30) DEFAULT NULL,
  `user_star` int(30) DEFAULT NULL,
  `header_image` varchar(100) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `permoney` varchar(100) DEFAULT NULL,
  `person` varchar(10) DEFAULT NULL,
  `day` int(20) DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_order`
--

DROP TABLE IF EXISTS `tp_order`;
CREATE TABLE IF NOT EXISTS `tp_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `good_id` int(10) DEFAULT NULL,
  `good_num` int(10) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `detail` text,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `valid_time` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_place`
--

DROP TABLE IF EXISTS `tp_place`;
CREATE TABLE IF NOT EXISTS `tp_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `descrition` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `addr` varchar(200) DEFAULT NULL,
  `open_time` varchar(100) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `is_hot` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_purchase`
--

DROP TABLE IF EXISTS `tp_purchase`;
CREATE TABLE IF NOT EXISTS `tp_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `product_desc` varchar(500) DEFAULT NULL,
  `price_desc` varchar(500) DEFAULT NULL,
  `use_desc` varchar(500) DEFAULT NULL,
  `is_hot` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_room`
--

DROP TABLE IF EXISTS `tp_room`;
CREATE TABLE IF NOT EXISTS `tp_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `header_image` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `is_cancle` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_users`
--

DROP TABLE IF EXISTS `tp_users`;
CREATE TABLE IF NOT EXISTS `tp_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(10) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT '1',
  `addr` varchar(200) DEFAULT NULL,
  `birthday` char(10) DEFAULT NULL,
  `tag` varchar(500) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `create_ip` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  `fans` varchar(100) DEFAULT NULL,
  `follow` varchar(100) DEFAULT NULL,
  `favor` varchar(100) DEFAULT NULL,
  `msg` tinyint(4) DEFAULT '0',
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
