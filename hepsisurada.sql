CREATE DATABASE  IF NOT EXISTS `CS306-HEPSISURADA` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `CS306-HEPSISURADA`;


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
-- Table structure for table `Categories`
--
DROP TABLE IF EXISTS `Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categories` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--
LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
INSERT INTO `Categories` VALUES 
(001,'Phones'),
(002,'Computers'),
(003,'Smart Watches'),
(004,'Headphones');
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `Products`
--
DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Products` (
  `pid` int(5) NOT NULL AUTO_INCREMENT,
  `pName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pStock` int(5) NOT NULL,
  `pAvgRating` double(2,1) NOT NULL,
  `pPrice` double(10,1) NOT NULL,
  `pDescription` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products`
--

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` VALUES
(001,"iPhone17",150,9.6,3000,"iPhone is a good product with high price (:"),
(002,"Samsung S79",500,7.3,1750,"Samsung S79 is a good product with low price (:"),
(003,"Macbook Pro 17inch",100,9.3,5000,"Macbook Pro is really good computer to study CS306"),
(004,"Asus Matebook38",475,8.9,3550,"Asus Matebook 38 is not really good computer to study CS306"),
(005,"Apple Watch 7",1000,9.4,750,"You don't really need Apple watch"),
(006,"Samsung Watch",2000,9.7,650,"You really need Samsung watch"),
(007,"Airpods MAX",50,8.9,9999,"Airpods Max is really expensive! Buy Airpods Pro instead."),
(008,"JBL HP10",960,9.9,100,"JBL HP10 is really good product if you need a f/p headphone");
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `belongs_to`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `belongs_to` (
  `pid` int(5) NOT NULL,
  `cid` int(5) NOT NULL,
  PRIMARY KEY (`cid`,`pid`),
  FOREIGN KEY (`cid`) REFERENCES `Categories` (`cid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`pid`) REFERENCES `Products` (`pid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--
LOCK TABLES `belongs_to` WRITE;
/*!40000 ALTER TABLE `belongs_to` DISABLE KEYS */;
INSERT INTO `belongs_to` VALUES 
(001,001),
(002,001),
(003,002),
(004,002),
(005,003),
(006,003),
(007,004),
(008,004);
/*!40000 ALTER TABLE `belongs_to` ENABLE KEYS */;
UNLOCK TABLES;




--
-- Table structure for table `add_to_ShoppingCart`
--
DROP TABLE IF EXISTS `add_to_ShoppingCart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `add_to_ShoppingCart` (
  `uid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `amount` int(5) NOT NULL,
  PRIMARY KEY (`uid`,`pid`),
  FOREIGN KEY (`uid`) REFERENCES `Users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`pid`) REFERENCES `Products` (`pid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_to_ShoppingCart`
--

LOCK TABLES `add_to_ShoppingCart` WRITE;
/*!40000 ALTER TABLE `add_to_ShoppingCart` DISABLE KEYS */;
INSERT INTO `add_to_ShoppingCart` VALUES
(001, 005,7),
(001, 004,2),
(002, 003,4),
(002, 002,3),
(002, 005,2),
(003, 003,1),
(004, 006,9),
(004, 001,2);
/*!40000 ALTER TABLE `add_to_ShoppingCart` ENABLE KEYS */;
UNLOCK TABLES;





--
-- Table structure for table `Users`
--
DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `uid` int(5) NOT NULL AUTO_INCREMENT,
  `uName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uSurname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uAge` int(10) NOT NULL,
  `uEmail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uPhoneNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uSex` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;





--
-- Dumping data for table `Users`
--
LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES
(001,'Elif','Koc',18,'elifkoc@sabanciuniv.edu','+905353060306',"Female"),
(002,'Aydin','Aydemir',47,'aydinaydemir@sabanciuniv.edu','+905519070020',"Male"),
(003,'Ayca','Ataer',21,'aycaataer@sabanciuniv.edu','+905333371650',"Female"),
(004,'Halil Ibrahim','Deniz',27,'halilibrahim@sabanciuniv.edu','+905426976617',"Male"),
(005,'Ahmet','Yilmaz',67,'ayilmaz@sabanciuniv.edu','+903063083101',"Male"),
(006,'Rick','Morty',44,'rickandmorty@sabanciuniv.edu','+905381119995',"Male"),
(007,'James','Bond',60,'jamesbond@sabanciuniv.edu','+900070070070',"Male");
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;











--
-- Table structure for table `make_Reviews`
--
DROP TABLE IF EXISTS `make_Reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `make_Reviews` (
  `rRating` double(2,1) NOT NULL,
  `rComment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rDate` DATE NOT NULL,
  `uid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  PRIMARY KEY (`uid`,`pid`),
  FOREIGN KEY (`uid`) REFERENCES `Users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`pid`) REFERENCES `Products` (`pid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `make_Reviews`
--

LOCK TABLES `make_Reviews` WRITE;
/*!40000 ALTER TABLE `make_Reviews` DISABLE KEYS */;
INSERT INTO `make_Reviews` VALUES
(9.6,"I love it!",'2022-12-15',007,006),
(1.6,"Cok kotu",'2022-12-16',003,001),
(5.4,"Fena degil",'2022-12-17',004,004),
(7.6,"Idare eder",'2022-12-18',001,004),
(3.4,"I won't buy this kind of product again!",'2022-12-19',002,003),
(0.0,"I don't love it!",'2022-12-20',003,006);
/*!40000 ALTER TABLE `make_Reviews` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `Addresses`
--
DROP TABLE IF EXISTS `Addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Addresses` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `aCity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aCountry` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aZipCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aStreet` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Addresses`
--

LOCK TABLES `Addresses` WRITE;
/*!40000 ALTER TABLE `Addresses` DISABLE KEYS */;
INSERT INTO `Addresses` VALUES
(001,"Izmir","Turkey","35956","Manavkuyu"),
(002,"Istanbul","Turkey","34956","Bostanci"),
(003,"Istanbul","Turkey","34956","Bayrampasa"),
(004,"Istanbul","Turkey","34956","Yenisehir"),
(005,"Ankara","Turkey","06956","Kizilay"),
(006,"Izmir","Turkey","34956","Manavkuyu JR"),
(007,"Istanbul","Turkey","34956","Orta");
/*!40000 ALTER TABLE `Addresses` ENABLE KEYS */;
UNLOCK TABLES;






--
-- Table structure for table `Has`
--
DROP TABLE IF EXISTS `Has`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Has` (
  `aid` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  PRIMARY KEY (`aid`,`uid`),
  FOREIGN KEY (`uid`) REFERENCES `Users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`aid`) REFERENCES `Addresses` (`aid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Has`
--
LOCK TABLES `Has` WRITE;
/*!40000 ALTER TABLE `Has` DISABLE KEYS */;
INSERT INTO `Has` VALUES 
(001,007),
(002,006),
(003,005),
(004,004),
(005,003),
(006,002),
(007,001);
/*!40000 ALTER TABLE `Has` ENABLE KEYS */;
UNLOCK TABLES;








--
-- Table structure for table `Orders`
--
DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Orders` (
  `oid` int(5) NOT NULL AUTO_INCREMENT,
  `oStatus` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccid` int(5) NOT NULL,
  PRIMARY KEY (`oid`),
  FOREIGN KEY (`ccid`) REFERENCES `CargoCompany` (`ccid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` VALUES
(001,"Ordered",1),
(002,"In Transit",3),
(003,"Packed",3),
(004,"Ordered",2),
(005,"In Transit",1),
(006,"Packed",3),
(007, "In Transit",2);
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;





--
-- Table structure for table `consists_of`
--
DROP TABLE IF EXISTS `consists_of`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consists_of` (
  `oid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `amount` int(5) NOT NULL,
  PRIMARY KEY (`oid`,`pid`),
  FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`pid`) REFERENCES `Products` (`pid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consists_of`
--

LOCK TABLES `consists_of` WRITE;
/*!40000 ALTER TABLE `consists_of` DISABLE KEYS */;
INSERT INTO `consists_of` VALUES
(001, 004,7),
(002, 007,2),
(003, 001,4),
(004, 002,3),
(005, 003,5),
(006, 005,1),
(007, 006,2),
(007, 003,2),
(007, 008,2),
(007, 005,2);
/*!40000 ALTER TABLE `consists_of` ENABLE KEYS */;
UNLOCK TABLES;




--
-- Table structure for table `Give`
--
DROP TABLE IF EXISTS `Give`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Give` (
  `oid` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  PRIMARY KEY (`oid`,`uid`),
  FOREIGN KEY (`uid`) REFERENCES `Users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`oid`) REFERENCES `Orders` (`oid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--
LOCK TABLES `Give` WRITE;
/*!40000 ALTER TABLE `Give` DISABLE KEYS */;
INSERT INTO `Give` VALUES 
(001,002),
(002,003),
(003,004),
(004,005),
(005,001),
(006,001),
(007,001);
/*!40000 ALTER TABLE `Give` ENABLE KEYS */;
UNLOCK TABLES;





--
-- Table structure for table `Ships_to`
--
DROP TABLE IF EXISTS `Ships_to`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ships_to` (
  `aid` int(5) NOT NULL,
  `oid` int(5) NOT NULL,
  PRIMARY KEY (`aid`,`oid`),
  FOREIGN KEY (`aid`) REFERENCES `Addresses` (`aid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`oid`) REFERENCES `Orders` (`oid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ships_to`
--
LOCK TABLES `Ships_to` WRITE;
/*!40000 ALTER TABLE `Ships_to` DISABLE KEYS */;
INSERT INTO `Ships_to` VALUES 
(001,001),
(002,002),
(003,003),
(004,004);
/*!40000 ALTER TABLE `Ships_to` ENABLE KEYS */;
UNLOCK TABLES;










--
-- Table structure for table `ProductCompany`
--
DROP TABLE IF EXISTS `ProductCompany`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductCompany` (
  `pcid` int(5) NOT NULL AUTO_INCREMENT,
  `pcName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcNation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pcid`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductCompany`
--
LOCK TABLES `ProductCompany` WRITE;
/*!40000 ALTER TABLE `ProductCompany` DISABLE KEYS */;
INSERT INTO `ProductCompany` VALUES 
(001,'Apple',"USA"),
(002,'Samsung',"KOREA"),
(003,'Asus',"TURKEY"),
(004,'JBL',"Azerbeycan");
/*!40000 ALTER TABLE `ProductCompany` ENABLE KEYS */;
UNLOCK TABLES;





--
-- Table structure for table `imported_from`
--
DROP TABLE IF EXISTS `imported_from`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imported_from` (
  `pid` int(5) NOT NULL,
  `pcid` int(5) NOT NULL,
  PRIMARY KEY (`pid`,`pcid`),
  FOREIGN KEY (`pid`) REFERENCES `Products` (`pid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`pcid`) REFERENCES `ProductCompany` (`pcid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imported_from`
--
LOCK TABLES `imported_from` WRITE;
/*!40000 ALTER TABLE `imported_from` DISABLE KEYS */;
INSERT INTO `imported_from` VALUES 
(001,001),
(002,002),
(003,001),
(004,003),
(005,001),
(006,002),
(007,001),
(008,004);
/*!40000 ALTER TABLE `imported_from` ENABLE KEYS */;
UNLOCK TABLES;





--
-- Table structure for table `CargoCompany`
--
DROP TABLE IF EXISTS `CargoCompany`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CargoCompany` (
  `ccid` int(5) NOT NULL AUTO_INCREMENT,
  `ccName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccCost` double(10,1) NOT NULL,
  PRIMARY KEY (`ccid`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CargoCompany`
--
LOCK TABLES `CargoCompany` WRITE;
/*!40000 ALTER TABLE `CargoCompany` DISABLE KEYS */;
INSERT INTO `CargoCompany` VALUES 
(001,'FedEX',10.0),
(002,'DHL', 15.5),
(003,'UPS',12.3);
/*!40000 ALTER TABLE `CargoCompany` ENABLE KEYS */;
UNLOCK TABLES;











/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER update_rating

DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `sailors`
--


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-21 23:34:56
