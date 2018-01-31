-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: exerciseLog
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `exercise_log`
--

DROP TABLE IF EXISTS `exercise_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `time_in_minutes` int(11) DEFAULT NULL,
  `heartrate` int(11) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_log`
--

LOCK TABLES `exercise_log` WRITE;
/*!40000 ALTER TABLE `exercise_log` DISABLE KEYS */;
INSERT INTO `exercise_log` VALUES (9,4,'2017-10-10','Running',30,200,632),(12,6,'2017-10-25','Swimming',360,200,6116),(13,8,'2017-10-25','Yoga',13,69,23),(14,8,'2017-10-25','Swimming',47,83,180);
/*!40000 ALTER TABLE `exercise_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_user`
--

DROP TABLE IF EXISTS `exercise_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_user`
--

LOCK TABLES `exercise_user` WRITE;
/*!40000 ALTER TABLE `exercise_user` DISABLE KEYS */;
INSERT INTO `exercise_user` VALUES (4,'dhansen','f2847b1bd9624f927e979c1846d9fe17dd65f518','Dylan','Hansen','M','1997-04-18',145),(5,'nhansen','81d0c6f63bbf0694d43013b3a464a17abf278302','Nikki','Hansen','F','1999-01-01',123),(6,'shayzee25','feb56ee0ddda4c3d529b20369d6b64f84911a18d','Shaylie','Ashland','F','1997-03-25',173),(7,'Crunchyopposum','b1c1d8736f20db3fb6c1c66bb1455ed43909f0d8',NULL,NULL,NULL,NULL,NULL),(8,'yoda','90b2d2ecbf0ec430e713d58e67220f2ddb384aa4','Joe','Baumann','M','1997-01-09',165);
/*!40000 ALTER TABLE `exercise_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 17:32:20
