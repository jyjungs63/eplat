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
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `eplat_desaddrlist`
--
-- ORDER BY:  `id`

LOCK TABLES `eplat_desaddrlist` WRITE;
/*!40000 ALTER TABLE `eplat_desaddrlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `eplat_desaddrlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `eplat_porlist`
--
-- ORDER BY:  `por_id`

LOCK TABLES `eplat_porlist` WRITE;
/*!40000 ALTER TABLE `eplat_porlist` DISABLE KEYS */;
INSERT INTO `eplat_porlist` VALUES ('P-2023-12-14-EDWF8LEJ','manager','branch1','ulsan','010-3386-1510','[{\"uid\":401,\"grade\":\"4세\",\"title\":\"Basic1-1 2.0\",\"price\":3500,\"count\":\"2\",\"total\":7000},{\"uid\":402,\"grade\":\"4세\",\"title\":\"Basic1-2 2.0\",\"price\":3500,\"count\":\"2\",\"total\":7000},{\"uid\":403,\"grade\":\"4세\",\"title\":\"Basic1-3 2.0\",\"price\":3500,\"count\":\"2\",\"total\":7000},{\"uid\":404,\"grade\":\"4세\",\"title\":\"Basic1-4 2.0\",\"price\":3500,\"count\":\"2\",\"total\":7000},{\"uid\":405,\"grade\":\"4세\",\"title\":\"Basic1-5 2.0\",\"price\":6500,\"count\":\"2\",\"total\":13000},{\"uid\":406,\"grade\":\"4세\",\"title\":\"Basic1-6 2.0\",\"price\":3500,\"count\":\"2\",\"total\":7000},{\"uid\":407,\"grade\":\"4세\",\"title\":\"Basic1-7 2.0\",\"price\":3500,\"count\":\"2\",\"total\":7000},{\"uid\":408,\"grade\":\"4세\",\"title\":\"Basic1-8 2.0\",\"price\":3500,\"count\":\"2\",\"total\":7000},{\"uid\":409,\"grade\":\"4세\",\"title\":\"Basic1-9 2.0\",\"price\":3500,\"count\":\"2\",\"total\":7000},{\"uid\":410,\"grade\":\"4세\",\"title\":\"  Basic1-10 2.0 \",\"price\":3500,\"count\":\"2\",\"total\":7000}]','2023-12-14 15:28:21',0);
/*!40000 ALTER TABLE `eplat_porlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `eplat_purchase`
--
-- ORDER BY:  `pid`,`id`

LOCK TABLES `eplat_purchase` WRITE;
/*!40000 ALTER TABLE `eplat_purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `eplat_purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `eplat_study`
--
-- ORDER BY:  `Volumn`,`step`,`week`

LOCK TABLES `eplat_study` WRITE;
/*!40000 ALTER TABLE `eplat_study` DISABLE KEYS */;
INSERT INTO `eplat_study` VALUES ('v3','step3',1,'83-step3_02_Song City Mouse And Country Mouse.mp4','82-step3_01_Story City Mouse And Country Mouse.mp4','v3-7-ss01.mp4','90-Step3_06 Word Family Song-et.mp4','86-Step3_05_Phonics_short e.mp4','v3-7-ps01.mp4','84-step3_03_ants go marching.mp4','v3-ut01'),('v3','step3',2,'75-Step2_02_Song_Whose Hat Is This.mp4','74-Step2_01_Story Whose Hat Is This.mp4','v3-ss02','89-Step3_06_Word Family Song-est.mp4','73-Step1_11_Phonics_Li chant.mp4','v3-ps02','76-step2_03_Song_pat a cake.mp4','v3-ut02'),('v3','step3',3,'67-Step1_02_song_who help me.mp4','66-Step1_01_story_who help me.mp4','v3-ss03','88-Step3_06_Word Family Song-en.mp4','72-Step1_09_phonics K K Chant.mp4','v3-ps03','68-Step1_03_Song_willowbe.mp4','v3-ut03'),('v3','step3',4,'61-basic_02_Song_Town colors.mp4','60-basic_01_Story_Town colors.mp4','v3-ss04','87-Step3_06_Word Family Song.mp4','65-Basic_06_phonics_f_3_153726.mp4','v3-ps04','62-basic_03 Walking walking.mp4','v3-ut04');
/*!40000 ALTER TABLE `eplat_study` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `eplat_user`
--
-- ORDER BY:  `id`

LOCK TABLES `eplat_user` WRITE;
/*!40000 ALTER TABLE `eplat_user` DISABLE KEYS */;
INSERT INTO `eplat_user` VALUES ('admin','이상규',NULL,'manager','',NULL,'울산 남구 ','1234',9,1,'2023-08-15',NULL,NULL),('admin1','정진영',NULL,'william','010-3386-1510',NULL,'','',9,1,'2023-08-16',NULL,NULL),('agecy@naver.com','정진영',NULL,'william','010-3386-1510',NULL,'울산 중구',NULL,1,0,'2023-08-16',NULL,NULL),('Angus Cummerata','',NULL,'Ludie Abernathy',' ',NULL,'','',2,0,'2023-12-13',NULL,'manager'),('Chris Schaden','',NULL,'Leonel Ondricka1234',' ',NULL,'','',2,0,'2023-12-13',NULL,'manager'),('Gilda','',NULL,'RoeJu6UoCw','543.653.5185 x9493 ',NULL,'Peru Bedfordshire','65400',2,0,'2023-12-13',NULL,'manager'),('manager','울산지사',NULL,'manager1234','010-888-8945 ',NULL,'울산 중구 학성로 1','44534',1,0,'2023-12-07',NULL,NULL),('teacher1','울산유치원',NULL,'teacher1','010-1234-1234',NULL,'울산 삼산 12345','12345',2,1,'2023-12-11',NULL,'manager'),('william','william garden',NULL,'william','010-3386-1510 ',NULL,'울산 중구 학성로 1 103동 3281','44534',2,1,'2023-12-12',NULL,NULL);
/*!40000 ALTER TABLE `eplat_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `json_data`
--
-- ORDER BY:  `id`

LOCK TABLES `json_data` WRITE;
/*!40000 ALTER TABLE `json_data` DISABLE KEYS */;
INSERT INTO `json_data` VALUES (1,'{\"name\": \"John\", \"age\": 30, \"city\": \"New York\"}'),(2,'{\"name\": \"John\", \"age\": 30, \"city\": \"New York\"}'),(3,'[{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":2,\"cont1\":\"75-Step2_02_Song_Whose Hat Is This.mp4\",\"cont2\":\"74-Step2_01_Story Whose Hat Is This.mp4\",\"cont3\":\"v3-ss02\",\"cont4\":\"89-Step3_06_Word Family Song-est.mp4\",\"cont5\":\"73-Step1_11_Phonics_Li chant.mp4\",\"cont6\":\"v3-ps02\",\"cont7\":\"76-step2_03_Song_pat a cake.mp4\",\"cont8\":\"v3-ut02\"},{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":1,\"cont1\":\"83-step3_02_Song City Mouse And Country Mouse.mp4\",\"cont2\":\"82-step3_01_Story City Mouse And Country Mouse.mp4\",\"cont3\":\"v3-7-ss01.mp4\",\"cont4\":\"90-Step3_06 Word Family Song-et.mp4\",\"cont5\":\"86-Step3_05_Phonics_short e.mp4\",\"cont6\":\"v3-7-ps01.mp4\",\"cont7\":\"84-step3_03_ants go marching.mp4\",\"cont8\":\"v3-ut01\"},{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":3,\"cont1\":\"67-Step1_02_song_who help me.mp4\",\"cont2\":\"66-Step1_01_story_who help me.mp4\",\"cont3\":\"v3-ss03\",\"cont4\":\"88-Step3_06_Word Family Song-en.mp4\",\"cont5\":\"72-Step1_09_phonics K K Chant.mp4\",\"cont6\":\"v3-ps03\",\"cont7\":\"68-Step1_03_Song_willowbe.mp4\",\"cont8\":\"v3-ut03\"},{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":4,\"cont1\":\"61-basic_02_Song_Town colors.mp4\",\"cont2\":\"60-basic_01_Story_Town colors.mp4\",\"cont3\":\"v3-ss04\",\"cont4\":\"87-Step3_06_Word Family Song.mp4\",\"cont5\":\"65-Basic_06_phonics_f_3_153726.mp4\",\"cont6\":\"v3-ps04\",\"cont7\":\"62-basic_03 Walking walking.mp4\",\"cont8\":\"v3-ut04\"}]'),(4,'[{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":2,\"cont1\":\"75-Step2_02_Song_Whose Hat Is This.mp4\",\"cont2\":\"74-Step2_01_Story Whose Hat Is This.mp4\",\"cont3\":\"v3-ss02\",\"cont4\":\"89-Step3_06_Word Family Song-est.mp4\",\"cont5\":\"73-Step1_11_Phonics_Li chant.mp4\",\"cont6\":\"v3-ps02\",\"cont7\":\"76-step2_03_Song_pat a cake.mp4\",\"cont8\":\"v3-ut02\"},{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":1,\"cont1\":\"83-step3_02_Song City Mouse And Country Mouse.mp4\",\"cont2\":\"82-step3_01_Story City Mouse And Country Mouse.mp4\",\"cont3\":\"v3-7-ss01.mp4\",\"cont4\":\"90-Step3_06 Word Family Song-et.mp4\",\"cont5\":\"86-Step3_05_Phonics_short e.mp4\",\"cont6\":\"v3-7-ps01.mp4\",\"cont7\":\"84-step3_03_ants go marching.mp4\",\"cont8\":\"v3-ut01\"},{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":3,\"cont1\":\"67-Step1_02_song_who help me.mp4\",\"cont2\":\"66-Step1_01_story_who help me.mp4\",\"cont3\":\"v3-ss03\",\"cont4\":\"88-Step3_06_Word Family Song-en.mp4\",\"cont5\":\"72-Step1_09_phonics K K Chant.mp4\",\"cont6\":\"v3-ps03\",\"cont7\":\"68-Step1_03_Song_willowbe.mp4\",\"cont8\":\"v3-ut03\"},{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":4,\"cont1\":\"61-basic_02_Song_Town colors.mp4\",\"cont2\":\"60-basic_01_Story_Town colors.mp4\",\"cont3\":\"v3-ss04\",\"cont4\":\"87-Step3_06_Word Family Song.mp4\",\"cont5\":\"65-Basic_06_phonics_f_3_153726.mp4\",\"cont6\":\"v3-ps04\",\"cont7\":\"62-basic_03 Walking walking.mp4\",\"cont8\":\"v3-ut04\"}]'),(5,'[{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":2,\"cont1\":\"75-Step2_02_Song_Whose Hat Is This.mp4\",\"cont2\":\"74-Step2_01_Story Whose Hat Is This.mp4\",\"cont3\":\"v3-ss02\",\"cont4\":\"89-Step3_06_Word Family Song-est.mp4\",\"cont5\":\"73-Step1_11_Phonics_Li chant.mp4\",\"cont6\":\"v3-ps02\",\"cont7\":\"76-step2_03_Song_pat a cake.mp4\",\"cont8\":\"v3-ut02\"},{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":1,\"cont1\":\"83-step3_02_Song City Mouse And Country Mouse.mp4\",\"cont2\":\"82-step3_01_Story City Mouse And Country Mouse.mp4\",\"cont3\":\"v3-7-ss01.mp4\",\"cont4\":\"90-Step3_06 Word Family Song-et.mp4\",\"cont5\":\"86-Step3_05_Phonics_short e.mp4\",\"cont6\":\"v3-7-ps01.mp4\",\"cont7\":\"84-step3_03_ants go marching.mp4\",\"cont8\":\"v3-ut01\"},{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":3,\"cont1\":\"67-Step1_02_song_who help me.mp4\",\"cont2\":\"66-Step1_01_story_who help me.mp4\",\"cont3\":\"v3-ss03\",\"cont4\":\"88-Step3_06_Word Family Song-en.mp4\",\"cont5\":\"72-Step1_09_phonics K K Chant.mp4\",\"cont6\":\"v3-ps03\",\"cont7\":\"68-Step1_03_Song_willowbe.mp4\",\"cont8\":\"v3-ut03\"},{\"Volumn\":\"v3\",\"step\":\"step3\",\"week\":4,\"cont1\":\"61-basic_02_Song_Town colors.mp4\",\"cont2\":\"60-basic_01_Story_Town colors.mp4\",\"cont3\":\"v3-ss04\",\"cont4\":\"87-Step3_06_Word Family Song.mp4\",\"cont5\":\"65-Basic_06_phonics_f_3_153726.mp4\",\"cont6\":\"v3-ps04\",\"cont7\":\"62-basic_03 Walking walking.mp4\",\"cont8\":\"v3-ut04\"}]');
/*!40000 ALTER TABLE `json_data` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `study_json`
--
-- ORDER BY:  `id`

LOCK TABLES `study_json` WRITE;
/*!40000 ALTER TABLE `study_json` DISABLE KEYS */;
/*!40000 ALTER TABLE `study_json` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `study_record`
--

LOCK TABLES `study_record` WRITE;
/*!40000 ALTER TABLE `study_record` DISABLE KEYS */;
INSERT INTO `study_record` VALUES ('admin','step3','v3','#w1_2','2023-11-10 09:18:45'),('admin','step3','v3','#w1_2','2023-11-10 09:18:45'),('admin','step3','v3','#w1_1','2023-11-10 09:18:45'),('admin','step3','v3','#w1_1','2023-11-10 09:18:51'),('admin','step3','v3','#w2_1','2023-11-10 09:18:56'),('admin','basic','v1','#w1_1','2023-11-10 09:19:18'),('admin','step3','v3','#w1_5','2023-11-10 09:19:24'),('admin','step3','v3','#w2_2','2023-11-10 09:19:28'),('admin','step1','v1','#w2_1','2023-11-10 09:19:56'),('admin','step3','v3','#w1_1','2023-11-10 11:59:36'),('admin','step3','v3','#w1_1','2023-11-10 11:59:55'),('admin','step3','v3','#w1_1','2023-11-10 12:00:09'),('admin','step3','v3','#w1_1','2023-11-10 12:00:47'),('admin','step3','v3','#w1_2','2023-11-10 12:02:22'),('','','','','2023-11-20 14:45:23'),('','','','','2023-11-20 14:47:34'),('','','','','2023-11-20 14:48:00'),('admin','step3','v3','w2_2','2023-11-20 14:51:06'),('admin','step3','v3','w1_2','2023-11-20 15:00:24'),('admin','step3','v3','w2_2','2023-11-20 15:00:46'),('admin','step3','v3','w2_2','2023-11-20 16:30:30'),('admin','basic','v1','w1_1','2023-12-12 15:41:38');
/*!40000 ALTER TABLE `study_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'eplat'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-14 17:18:50
