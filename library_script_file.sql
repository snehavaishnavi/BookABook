-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: library
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `bookstatus` int(11) DEFAULT NULL,
  `depid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (111,1,1,1,'DB 2014'),(112,1,1,1,'DB 2014'),(113,0,1,1,'DB 2015'),(114,0,1,1,'DB 2016'),(115,0,1,1,'DB 2016'),(116,0,1,2,'ALGOS 2011'),(117,0,1,2,'ALGOS 2012'),(118,0,1,2,'ALGOS 2014'),(119,0,1,2,'ALGOS 2015'),(120,0,1,2,'ALGOS 2016'),(121,0,1,4,'SSDI 2010'),(122,0,1,4,'SSDI 2011'),(123,0,1,4,'SSDI 2012'),(124,0,1,4,'SSDI 2013'),(125,0,1,4,'SSDI 2014'),(126,0,1,4,'SSDI 2015'),(127,0,1,4,'SSDI 2016'),(128,1,2,5,'NBAD 2011'),(129,1,2,5,'NBAD 2012'),(130,1,2,5,'NBAD 2014'),(131,1,2,5,'NBAD 2015'),(132,1,2,5,'NBAD 2016'),(133,0,3,6,'DSP 2011'),(134,0,3,6,'DSP 2012'),(135,0,3,6,'DSP 2013'),(136,0,3,6,'DSP 2014'),(137,0,3,6,'DSP 2015'),(138,0,3,6,'DSP 2016'),(139,0,2,3,'PISP 2011'),(140,0,2,3,'PISP 2012'),(141,0,2,3,'PISP 2013'),(142,0,2,3,'PISP 2014'),(143,1,2,3,'PISP 2015'),(144,1,2,3,'PISP 2016'),(145,0,3,7,'Power Systems 2010'),(146,0,3,7,'Power Systems 2011'),(147,0,3,7,'Power Systems 2012'),(148,0,3,7,'Power Systems 2013'),(149,1,3,7,'Power Systems 2014'),(150,0,3,7,'Power Systems 2015'),(151,0,3,7,'Power Systems 2016');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_data`
--

DROP TABLE IF EXISTS `book_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_data` (
  `Book_ID` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author` varchar(50) DEFAULT NULL,
  `MRP` int(11) DEFAULT NULL,
  `Number_of_copies` int(11) DEFAULT NULL,
  PRIMARY KEY (`Book_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_data`
--

LOCK TABLES `book_data` WRITE;
/*!40000 ALTER TABLE `book_data` DISABLE KEYS */;
INSERT INTO `book_data` VALUES (1,'In Search of Lost Time','Marcel Proust',249,2),(2,'Ulysses','James Joyce',149,4),(3,'Don Quixote','Miguel de Cervantes',167,3),(4,'Moby Dick','Herman Melville',227,5),(5,'Hamlet','William Shakespeare',284,3),(6,'War and Peace','Leo Tolstoy',199,4),(7,'Database Systems','Pamela Thompson',336,3),(8,'The Great Gatsby','F. Scott Fitzgerald',300,1),(9,'The Divine Comedy','Dante Alighieri',299,6),(10,'Madame Bovary','Gustave Flaubert',99,3);
/*!40000 ALTER TABLE `book_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `name` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES ('cs',1),('it',2),('ee',3);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `desktops`
--

DROP TABLE IF EXISTS `desktops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `desktops` (
  `desktop_id` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`desktop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desktops`
--

LOCK TABLES `desktops` WRITE;
/*!40000 ALTER TABLE `desktops` DISABLE KEYS */;
INSERT INTO `desktops` VALUES (1,'Dell','Windows 10'),(2,'lenovo','Windows 10'),(3,'Apple','Mac OS 9.0.0'),(4,'HP','Windows 8'),(5,'Dell','Windows 7'),(6,'ASUS','linux'),(7,'Apple','Windows 8');
/*!40000 ALTER TABLE `desktops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fine_history`
--

DROP TABLE IF EXISTS `fine_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fine_history` (
  `Fine_ID` int(11) NOT NULL,
  `Loan_ID` int(11) NOT NULL,
  `Fine_Amount` int(11) NOT NULL,
  PRIMARY KEY (`Fine_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fine_history`
--

LOCK TABLES `fine_history` WRITE;
/*!40000 ALTER TABLE `fine_history` DISABLE KEYS */;
INSERT INTO `fine_history` VALUES (1,3,20),(2,8,10),(3,2,3),(4,8,10),(5,2,3),(6,4,7);
/*!40000 ALTER TABLE `fine_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loan` (
  `Loan_ID` int(11) NOT NULL,
  `UNCC_ID` int(11) NOT NULL,
  `Book_ID` int(11) NOT NULL,
  `Date_Of_Issue` varchar(255) DEFAULT NULL,
  `Date_Of_Return` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Loan_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loan`
--

LOCK TABLES `loan` WRITE;
/*!40000 ALTER TABLE `loan` DISABLE KEYS */;
INSERT INTO `loan` VALUES (1,111,3,'02-01-2016','03-01-2016'),(2,111,4,'02-25-2016','03-25-2016'),(3,115,6,'02-11-2016','03-11-2016'),(4,116,7,'01-28-2016','02-28-2016'),(5,115,8,'01-20-2016','02-20-2016'),(6,115,10,'02-12-2016','03-12-2016'),(7,115,9,'03-03-2016','04-03-2016'),(8,117,7,'02-14-2016','03-14-2016'),(9,120,5,'02-17-2016','03-17-2016'),(10,119,1,'03-01-2016','04-01-2016');
/*!40000 ALTER TABLE `loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_booking`
--

DROP TABLE IF EXISTS `room_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_booking` (
  `Booking_Id` int(11) NOT NULL,
  `Room_id` int(11) NOT NULL,
  `Uncc_id` int(11) NOT NULL,
  `Start_time` varchar(255) DEFAULT NULL,
  `End_time` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Booking_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_booking`
--

LOCK TABLES `room_booking` WRITE;
/*!40000 ALTER TABLE `room_booking` DISABLE KEYS */;
INSERT INTO `room_booking` VALUES (1,1,111,'06:00:00','09:00:00','04-12-2016'),(2,4,115,'13:10:00','16:10:00','04-12-2016'),(3,2,116,'11:30:00','13:20:00','04-12-2016'),(4,8,111,'17:00:00','19:00:00','04-13-2016'),(5,6,117,'09:30:45','11:45:00','04-13-2016'),(6,6,119,'14:30:45','16:45:00','04-13-2016'),(7,3,120,'22:10:00','23:59:59','04-13-2016'),(8,5,116,'00:00:00','03:00:00','04-14-2016'),(9,7,116,'09:30:45','11:45:00','04-14-2016'),(10,10,115,'17:30:00','20:30:00','04-14-2016');
/*!40000 ALTER TABLE `room_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_list`
--

DROP TABLE IF EXISTS `room_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_list` (
  `Room_Id` int(11) NOT NULL,
  `floor` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `desktop_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Room_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_list`
--

LOCK TABLES `room_list` WRITE;
/*!40000 ALTER TABLE `room_list` DISABLE KEYS */;
INSERT INTO `room_list` VALUES (1,1,6,2),(2,1,5,1),(3,2,2,7),(4,2,15,3),(5,2,9,2),(6,3,4,5),(7,3,12,4),(8,3,8,6),(9,1,10,1),(10,2,8,3);
/*!40000 ALTER TABLE `room_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `name` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `depid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES ('Db',1,1),('Algos',2,1),('PISP',3,2),('SSDI',4,1),('NBAD',5,2),('DSP',6,3),('Power systems',7,3);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_data` (
  `UNCC_ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Role_ID` int(11) NOT NULL,
  PRIMARY KEY (`UNCC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_data`
--

LOCK TABLES `user_data` WRITE;
/*!40000 ALTER TABLE `user_data` DISABLE KEYS */;
INSERT INTO `user_data` VALUES (111,'Ravi','ravi123',2),(112,'Manohar','manohar123',1),(113,'Dheeraj','dheeraj999',1),(114,'Shashi','sasipasi69',3),(115,'Rohit','rohit1',2),(116,'Uday','uncc1234',2),(117,'Harish','hari007',2),(118,'Amrutha','amruta1',3),(119,'Sneha','sneha2',2),(120,'Sravani','hie',2),(134,'Meher','meher1',2),(135,'tejaswi','tejaswi1',2),(136,'meka','meka1',2),(150,'Mythri','mythri123',2);
/*!40000 ALTER TABLE `user_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `Role_ID` int(11) NOT NULL,
  `Role` varchar(255) NOT NULL,
  PRIMARY KEY (`Role_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'admin'),(2,'student'),(3,'staff');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-04 22:41:13
