-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for osx10.6 (i386)
--
-- Host: localhost    Database: farer
-- ------------------------------------------------------
-- Server version	10.1.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tp_case`
--

DROP TABLE IF EXISTS `tp_case`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_case` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_case`
--

LOCK TABLES `tp_case` WRITE;
/*!40000 ALTER TABLE `tp_case` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_case` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_comment`
--

DROP TABLE IF EXISTS `tp_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_comment` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_comment`
--

LOCK TABLES `tp_comment` WRITE;
/*!40000 ALTER TABLE `tp_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_destination`
--

DROP TABLE IF EXISTS `tp_destination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(10) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_destination`
--

LOCK TABLES `tp_destination` WRITE;
/*!40000 ALTER TABLE `tp_destination` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_destination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_hotel`
--

DROP TABLE IF EXISTS `tp_hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_hotel` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_hotel`
--

LOCK TABLES `tp_hotel` WRITE;
/*!40000 ALTER TABLE `tp_hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_hotel_order`
--

DROP TABLE IF EXISTS `tp_hotel_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_hotel_order` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_hotel_order`
--

LOCK TABLES `tp_hotel_order` WRITE;
/*!40000 ALTER TABLE `tp_hotel_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_hotel_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_notes`
--

DROP TABLE IF EXISTS `tp_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_notes` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_notes`
--

LOCK TABLES `tp_notes` WRITE;
/*!40000 ALTER TABLE `tp_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_order`
--

DROP TABLE IF EXISTS `tp_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_order` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_order`
--

LOCK TABLES `tp_order` WRITE;
/*!40000 ALTER TABLE `tp_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_place`
--

DROP TABLE IF EXISTS `tp_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_place` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_place`
--

LOCK TABLES `tp_place` WRITE;
/*!40000 ALTER TABLE `tp_place` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_purchase`
--

DROP TABLE IF EXISTS `tp_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `product_desc` varchar(500) DEFAULT NULL,
  `price_desc` varchar(500) DEFAULT NULL,
  `use_desc` varchar(500) DEFAULT NULL,
  `is_hot` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_purchase`
--

LOCK TABLES `tp_purchase` WRITE;
/*!40000 ALTER TABLE `tp_purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_room`
--

DROP TABLE IF EXISTS `tp_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `header_image` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `is_cancle` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_room`
--

LOCK TABLES `tp_room` WRITE;
/*!40000 ALTER TABLE `tp_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_users`
--

DROP TABLE IF EXISTS `tp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_users` (
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
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_users`
--

LOCK TABLES `tp_users` WRITE;
/*!40000 ALTER TABLE `tp_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-19 13:14:39
