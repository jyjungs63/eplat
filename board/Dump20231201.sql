CREATE DATABASE  IF NOT EXISTS `eplat` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `eplat`;
-- MariaDB dump 10.17  Distrib 10.5.0-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: eplat
-- ------------------------------------------------------
-- Server version	10.5.0-MariaDB

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
-- Table structure for table `repository`
--

DROP TABLE IF EXISTS `repository`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repository` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `id` varchar(20) NOT NULL,
  `contents` varchar(5000) NOT NULL,
  `rdate` datetime NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repository`
--
-- ORDER BY:  `num`

LOCK TABLES `repository` WRITE;
/*!40000 ALTER TABLE `repository` DISABLE KEYS */;
INSERT INTO `repository` VALUES (1,'TEST','admin','[{\"name\":\"1.PNG\",\"fakename\":\"5NrvldU4K1ccXhD\",\"size\":163720},{\"name\":\"2.PNG\",\"fakename\":\"OFUcI5vHAVbTbTQ\",\"size\":206509},{\"name\":\"3.PNG\",\"fakename\":\"Z5CwcniNIGdXUP5\",\"size\":149320},{\"name\":\"4.PNG\",\"fakename\":\"QY0wDUiBEqSPc1C\",\"size\":220388}]','2023-11-27 12:07:28'),(2,'TEXT File','admin','[{\"name\":\"POW result.pptx\",\"fakename\":\"ajipOEF66qfUogV\",\"size\":2017857},{\"name\":\"uc0c8 Microsoft Excel uc6ccud06cuc2dcud2b8.xlsx\",\"fakename\":\"diNjJEkV0RuraOC\",\"size\":6552}]','2023-11-27 14:11:37'),(3,'확장자 포함한 자료','admin','[{\"name\":\"autolink.xlsx\",\"fakename\":\"vvImwTpPW3D7yHk.application/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"size\":80049},{\"name\":\"Figure_1.png\",\"fakename\":\"PmlEMddRdVTjF3T.image/png\",\"size\":4633},{\"name\":\"LeadsShipTemplate.html\",\"fakename\":\"TVEXv0D5xDr24N5.text/html\",\"size\":11879}]','2023-11-27 14:30:43'),(4,'확장자 포함한 자료 2','admin','[{\"name\":\"autolink.xlsx\",\"fakename\":\"QYgrsnsziZId3co.application/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"size\":80049},{\"name\":\"cyberStudy.txt\",\"fakename\":\"SzMvZvdNsMXcGxM.text/plain\",\"size\":968},{\"name\":\"HPC_monitoring.PNG\",\"fakename\":\"kh83LGS2hNS4zNO.image/png\",\"size\":125803},{\"name\":\"LeadsShipTemplate.html\",\"fakename\":\"EpKWZo2pClZ0oUq.text/html\",\"size\":11879}]','2023-11-27 14:34:19'),(5,'확장자 포함한 자료 3','admin','[{\"name\":\"autolink.xlsx\",\"fakename\":\"dGXBTRZT4v9docrautolink.xlsx\",\"size\":80049},{\"name\":\"B_Spline_1.exe\",\"fakename\":\"GVmffxlsVYlOQqwB_Spline_1.exe\",\"size\":127312},{\"name\":\"compartment3.PNG\",\"fakename\":\"SZf6H9tEhzyWxCMcompartment3.PNG\",\"size\":65644},{\"name\":\"LeadsShipTemplate.html\",\"fakename\":\"8ceDBu6mCyxHB0mLeadsShipTemplate.html\",\"size\":11879}]','2023-11-27 14:39:55');
/*!40000 ALTER TABLE `repository` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'eplat'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-01 13:13:05
