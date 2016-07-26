-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: casestudy
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrument` (
  `id` int(11) NOT NULL,
  `isin` char(12) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `value` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrument`
--

LOCK TABLES `instrument` WRITE;
/*!40000 ALTER TABLE `instrument` DISABLE KEYS */;
INSERT INTO `instrument` VALUES (1,'Bm4344864618','Dabjam','cfd',98),(2,'hu9202435895','Meedoo','cfd',32),(3,'zr9764666928','Realpoint','aktie',25),(4,'BY6430998993','Zava','cfd',89.6467),(6,'IP9020906098','Roomm','cfd',38.1443),(8,'xo0460899029','Kamba','cfd',99.5261),(9,'hS2144818953','Twitterlist','aktie',84.6883),(10,'hQ9595862510','Thoughtbeat','cfd',97.6127),(11,'AC3020298383','Mydeo','fonds',64.6592),(12,'Cu5998577867','Cogidoo','cfd',65),(13,'bE4656262499','Jatri','aktie',17.8265),(14,'Wi8202305702','Janyx','fonds',59.4219),(15,'YS0569707660','Muxo','cfd',19.8097),(16,'qA4086410972','Oodoo','cfd',70.5059),(17,'ZW0397057597','Devcast','aktie',25.7701),(18,'Hd6437373938','Jaxspan','aktie',37.1424),(19,'vX5404242270','Kazio','fonds',86.5904),(20,'FG5187253114','Wordware','aktie',80.6405),(21,'Ch6455110564','Jaxnation','aktie',78.8537),(22,'Qc6693793054','Dynazzy','fonds',56.4328),(23,'yN6175786348','Wikizz','aktie',16.9599),(24,'WG3525721992','Photobean','cfd',18.3592),(26,'ey1785770601','Thoughtblab','fonds',36.2652),(27,'wS2436692174','Oozz','cfd',70.2589),(28,'yg8374302099','Meetz','cfd',96.7466),(29,'cO9638457067','Tagcat','fonds',92.5163),(30,'Jt0434823755','Dabjam','fonds',68.914),(32,'tY1725893341','Zoomdog','cfd',69.5644),(34,'nS1985834719','Zoomzone','aktie',8.32742),(35,'ul5456904753','Cogilith','cfd',57.2359),(36,'ge1127235167','Yacero','cfd',17.5937),(37,'Qf3381466089','Photofeed','cfd',62.77),(38,'sw8518404637','Skyble','fonds',52.0632),(39,'iu5948868924','Zava','cfd',19.3685),(40,'Dr6413242081','Gevee','aktie',28.2123),(41,'aK7621323150','Skinix','aktie',1.71277),(42,'DI7348939108','Quamba','cfd',27.9832),(43,'qf0922935166','Skipfire','aktie',95.026),(44,'AG8023547886','Cogibox','aktie',100),(45,'gy4800403977','Zooxo','cfd',70.7011),(46,'On3990494297','Youspan','cfd',50.4609),(47,'it1079967983','Devshare','cfd',18.083),(48,'kL3414584183','Centizu','aktie',43.6072),(49,'Tc3469786089','InnoZ','cfd',31.7561),(50,'ZD6439489560','Fliptune','fonds',15.6777),(51,'WM1589564994','Kwimbee','cfd',91.0423),(52,'Im9792295271','Tekfly','fonds',1.88852),(53,'LO5290682677','Devshare','cfd',78.0136),(54,'Zy8930004908','Jatri','cfd',19.9928),(55,'ue2568074391','Linklinks','cfd',49.7945),(56,'gN7545267369','Zoombeat','cfd',86.9294),(57,'gM3515075447','Tekfly','cfd',67.4451),(58,'el8318587368','Trunyx','cfd',93.4523),(59,'ib8915378566','Yozio','aktie',28.4672),(60,'Et3323319747','Bluezoom','cfd',46.3554),(61,'vX3747955776','Meezzy','aktie',44.194),(62,'gJ2202637578','Voonder','fonds',7.0142),(63,'rQ6291242660','Jetpulse','cfd',80.4646),(64,'iq6978059709','Mydo','aktie',8.06709),(65,'FI7528087205','Yacero','cfd',75.3852),(66,'Km2440379244','Thoughtsphere','fonds',66.2039),(67,'vT9094074865','Kwinu','aktie',59.9133),(68,'Um5544475317','LiveZ','cfd',23.5693),(69,'JU9384844383','Zoomlounge','aktie',45.6622),(70,'Ip7634487683','Mydo','cfd',49.2054),(71,'Vr6384675033','Wikibox','cfd',6.9674),(73,'Cq8789886006','Realfire','fonds',59.9813),(74,'zG5864366518','Trilith','aktie',42.7732),(75,'BH4023931441','Topdrive','cfd',7.042),(76,'St2575607084','Kare','fonds',97.6236),(77,'cp1973493318','Jabbertype','aktie',67.5915),(78,'Kv2164211880','Jabbertype','fonds',63.8894),(79,'NF2292658156','Yozio','cfd',56.1058),(80,'Se8009311764','Mita','aktie',8.83665),(81,'hv4684705455','Oodoo','fonds',45.9244),(82,'qO6417793380','Layo','aktie',61.945),(83,'Mw9890354645','Dabjam','fonds',43.4635),(84,'Gl1133251147','Meeveo','cfd',30.4044),(85,'vQ8586126584','Eire','cfd',76.3282),(86,'PR0698650113','Twiyo','fonds',82.0138),(87,'oQ8463517691','Bluezoom','cfd',30.6606),(88,'iY8291679211','Quatz','cfd',29.1829),(90,'gr3268587522','Meevee','fonds',15.648),(91,'py6783810203','Skinte','cfd',98.6284),(92,'SD6431711790','Aimbo','aktie',22),(93,'Bo8567463135','Devbug','aktie',35.1455),(94,'lO7221404838','Avamba','aktie',7.03042),(95,'uA4269457383','Zoonder','fonds',94.6593),(96,'Vx7449930650','Zoonder','fonds',73.2099),(97,'xe5537549956','Skippad','aktie',62.0749),(98,'sF0883458919','Zooxo','cfd',50.2021),(99,'UW3500835199','Demizz','cfd',21.8307);
/*!40000 ALTER TABLE `instrument` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_user_id` int(11) DEFAULT NULL,
  `slug` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1,'Home Page','-- here goes the page description --','This is not a full-featured php framework like Zend or Laravel, but a case study to show how a simple mvc framework could be set up. It is more a skeleton application than a framework and may be useful for rapid prototyping or setting up example applications.\r\n\r\nIt is not intended to be used in production environments but for studying and experimenting purposes only. Even though there remains a lot to do. Since I am working on this project alone up to now, there won’t be any support of any kind. Anyone who knows php-oop basics will quickly find his or her way through and find out if this could be of any use for him or her.\r\n\r\nFor quick prototyping and setting up demo applications you may want to have a look at the projects of panique: TINY, MINI and HUGE. Especially the latter is more grown-up than my project, but may be over the top for some use cases.','Introduction to LBM MVC','PHP Applications, MVC DesignPattern, Demo, Skeleton','2016-07-25 21:02:48',2,'Home/index');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Admin'),(2,'User'),(3,'Locked');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fk_role_id` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`fk_role_id`),
  KEY `fk_User_Role_idx` (`fk_role_id`),
  CONSTRAINT `fk_User_Role` FOREIGN KEY (`fk_role_id`) REFERENCES `role` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Käptn','Blaubär','admin','$2y$10$szW/K6/zECHbpyQKbnriW.Wka5yrZkzAtntxz5n9chxP6bRB1.R0G','test@bla.com','2016-07-08 08:29:51',1,NULL),(2,'Hein','Blöd','user','$2y$10$2bwXhflwjKgMmTB0KSJFz.RS/8Zjlo5F/1ESm92GagQY/R2tI7zsi','user@bla.com','2016-07-10 10:07:56',2,NULL),(5,'test','test','tester1','$2y$10$MUknOvfadbowcVvEU8J.G./crbaDXkCkpAx4afkLI./Hq3Ajh4aV2','test@test.hu','2016-07-13 14:43:28',2,NULL),(21,'test','test','test','$2y$10$hNp.tM738QrTDoKbTGCOo.RiyXGeXQAvzcCBGEB7OQmjhcmYsIiR.','test@test.hu',NULL,2,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_depot`
--

DROP TABLE IF EXISTS `user_depot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_depot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`fk_user_id`),
  KEY `fk_User_Depot_User1_idx` (`fk_user_id`),
  CONSTRAINT `fk_User_Depot_User1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_depot`
--

LOCK TABLES `user_depot` WRITE;
/*!40000 ALTER TABLE `user_depot` DISABLE KEYS */;
INSERT INTO `user_depot` VALUES (1,2,NULL,'2016-07-24 21:43:10'),(2,21,NULL,'2016-07-24 21:43:10');
/*!40000 ALTER TABLE `user_depot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_depot_position`
--

DROP TABLE IF EXISTS `user_depot_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_depot_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_Instrument_id` int(11) NOT NULL,
  `fk_user_depot_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_depot_position`
--

LOCK TABLES `user_depot_position` WRITE;
/*!40000 ALTER TABLE `user_depot_position` DISABLE KEYS */;
INSERT INTO `user_depot_position` VALUES (1,5,NULL,NULL,4,1),(2,11,NULL,NULL,60,1),(3,23,NULL,NULL,94,1),(4,12,NULL,NULL,68,1),(5,11,NULL,NULL,48,1),(6,5,NULL,NULL,92,1),(7,55,NULL,NULL,44,1),(8,11,NULL,NULL,92,2),(9,22,NULL,NULL,48,2),(10,123,NULL,'2016-07-25 21:09:17',12,1);
/*!40000 ALTER TABLE `user_depot_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_user_depot_position`
--

DROP TABLE IF EXISTS `v_user_depot_position`;
/*!50001 DROP VIEW IF EXISTS `v_user_depot_position`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_user_depot_position` (
  `id` tinyint NOT NULL,
  `anzahl` tinyint NOT NULL,
  `fk_Instrument_id` tinyint NOT NULL,
  `user_depot_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `isin` tinyint NOT NULL,
  `type` tinyint NOT NULL,
  `value` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_user_depot_position`
--

/*!50001 DROP TABLE IF EXISTS `v_user_depot_position`*/;
/*!50001 DROP VIEW IF EXISTS `v_user_depot_position`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_user_depot_position` AS select `dp`.`id` AS `id`,`dp`.`count` AS `anzahl`,`dp`.`fk_Instrument_id` AS `fk_Instrument_id`,`dp`.`fk_user_depot_id` AS `user_depot_id`,`i`.`name` AS `name`,`i`.`isin` AS `isin`,`i`.`type` AS `type`,`i`.`value` AS `value` from (`user_depot_position` `dp` left join `instrument` `i` on((`dp`.`fk_Instrument_id` = `i`.`id`))) order by `dp`.`fk_user_depot_id`,`i`.`name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-25 23:20:54
