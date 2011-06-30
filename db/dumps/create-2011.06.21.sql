CREATE DATABASE  IF NOT EXISTS `isetimeline` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `isetimeline`;
-- MySQL dump 10.13  Distrib 5.1.40, for Win32 (ia32)
--
-- Host: localhost    Database: isetimeline
-- ------------------------------------------------------
-- Server version	5.1.41

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
-- Table structure for table `entities`
--

DROP TABLE IF EXISTS `entities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entities` (
  `id` int(11) NOT NULL,
  `type` enum('person','institution') NOT NULL DEFAULT 'institution',
  `name` tinytext NOT NULL,
  `description` text,
  `location` text,
  `email` tinytext,
  `phone` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `funding_sources`
--

DROP TABLE IF EXISTS `funding_sources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funding_sources` (
  `id` int(11) NOT NULL,
  `acronym` varchar(45) DEFAULT NULL,
  `name` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `short_title` varchar(255) NOT NULL COMMENT '\n',
  `icon` tinytext,
  `resource_title` text NOT NULL,
  `description` text,
  `contributor_id` int(11) NOT NULL COMMENT 'foreign key to entity.id',
  `creator_id` int(11) DEFAULT NULL COMMENT 'foreign key to entity.id',
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `nsf_award_number` varchar(45) DEFAULT NULL,
  `pi_id` int(11) DEFAULT NULL COMMENT 'foreign key to entity.id',
  `funding_source_id` int(11) DEFAULT NULL COMMENT 'foreign key to funding_source.id',
  `uri` varchar(255) DEFAULT NULL,
  `image` tinytext NOT NULL COMMENT 'location of main image',
  `geo_coords` varchar(255) DEFAULT NULL,
  `access_inclusion` varchar(255) DEFAULT NULL COMMENT 'not sure?',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='max sizes: \ntiny text -> 256 char\ntext -> 65k char (15 pages';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `relationships_events`
--

DROP TABLE IF EXISTS `relationships_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relationships_events` (
  `relationship_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`relationship_id`,`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-06-21 11:58:08
