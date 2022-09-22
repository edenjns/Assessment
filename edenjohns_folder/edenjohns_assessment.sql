-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: edenjohns_assessment
-- ------------------------------------------------------
-- Server version 	8.0.30-0ubuntu0.20.04.2
-- Date: Thu, 22 Sep 2022 21:28:31 +0000

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `drinks`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drinks` (
  `drink_id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `drink` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `calories` smallint unsigned NOT NULL,
  `sweet_other` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cost` float unsigned NOT NULL,
  PRIMARY KEY (`drink_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drinks`
--

LOCK TABLES `drinks` WRITE;
/*!40000 ALTER TABLE `drinks` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `drinks` VALUES (1,'Up & Go - Energize',160,'Sweet',3.2),(2,'Up & Go - Chocolate',150,'Sweet',3.2),(3,'Up & Go - Vanilla',150,'Sweet',3.2),(4,'Up & Go - Strawberry',150,'Sweet',3.2),(5,'Pump Water',0,'Other',3.5),(6,'Iced Tea',50,'Other',4),(7,'E2',150,'Other',2.8),(8,'Keri Juice',150,'Sweet',3.3),(9,'Sugar Free Powerade',200,'Other',4.3),(10,'Hot Chocolate',200,'Sweet',3.5),(11,'Espresso Coffee',200,'Other',4),(12,'Long Black',180,'Other',4),(13,'Short Black',180,'Other',4),(14,'Herbal Tea',25,'Other',3),(15,'English Breakfast Tea',50,'Other',3.5),(16,'Smoothie - Berry',140,'Sweet',5),(17,'Smoothie - Banana',140,'Sweet',5),(18,'Milkshake - Vanilla',160,'Sweet',4),(19,'Milkshake - Lime',160,'Sweet',4),(20,'Milkshake - Chocolate',160,'Sweet',4),(21,'Milkshake - Strawberry',160,'Sweet',4);
/*!40000 ALTER TABLE `drinks` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `drinks` with 21 row(s)
--

--
-- Table structure for table `foods`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foods` (
  `food_id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `food` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `calories` smallint unsigned NOT NULL,
  `sweet_sav` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cost` float unsigned NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foods`
--

LOCK TABLES `foods` WRITE;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `foods` VALUES (1,'Beef Nachos',306,'Savoury',5.5),(2,'Bean Nachos',300,'Savoury',5.5),(3,'Vegetarian Sausage Roll',150,'Savoury',3),(4,'Bacon and Egg Slice',150,'Savoury',5),(6,'Soup',130,'Savoury',4),(7,'Gourmet Sandwich',135,'Savoury',5.5),(8,'Teriyaki Chicken on Rice',250,'Savoury',6),(9,'Filled Croissant',148,'Savoury',5),(10,'Muffin',200,'Sweet',3.5),(11,'Slice',200,'Sweet',3.5),(12,'Chocolate Chip Cookie',150,'Sweet',2),(13,'Afghan Biscuit',150,'Sweet',3),(14,'Jelly',150,'Sweet',1.8),(15,'Greek Salad',130,'Savoury',4.5),(16,'Quinoa Salad',130,'Savoury',4.5),(17,'Fruit Salad',145,'Sweet',4.5),(18,'Panini - Ham and Cheese',150,'Savoury',5),(19,'Panini - Chicken and Cranberry',150,'Savoury',5),(20,'Toasted Sandwich - Ham and Cheese',155,'Savoury',3),(21,'Toasted Sandwich - Cheese',148,'Savoury',2.5),(22,'Berry Muesli',169,'Sweet',4),(23,'Sushi - 4pk',124,'Savoury',5),(24,'Scone - Blueberry',162,'Sweet',3.5),(25,'Scone - Cheese',175,'Savoury',3.5),(26,'Brownie',175,'Sweet',3.5),(27,'Cake - Chocolate',180,'Sweet',4),(28,'Cake - Carrot',159,'Sweet',4);
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `foods` with 27 row(s)
--

--
-- Table structure for table `specials`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specials` (
  `special_id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `food_id` smallint unsigned NOT NULL,
  `drink_id` smallint NOT NULL,
  `cost` float NOT NULL,
  PRIMARY KEY (`special_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specials`
--

LOCK TABLES `specials` WRITE;
/*!40000 ALTER TABLE `specials` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `specials` VALUES (1,1,10,5),(2,7,9,6),(3,8,10,5),(4,20,14,6),(5,6,11,6);
/*!40000 ALTER TABLE `specials` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `specials` with 5 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Thu, 22 Sep 2022 21:28:31 +0000
