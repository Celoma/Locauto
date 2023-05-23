-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: loc'auto
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id_categorie` varchar(1) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES ('A','Citadine',60),('B','Berline',120),('C','SUV',230),('D','Coupe',175),('E','Break',210),('F','Sportive',300),('G','Luxe',500),('H','Collection',350);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `choixoption`
--

DROP TABLE IF EXISTS `choixoption`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `choixoption` (
  `id_option` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  PRIMARY KEY (`id_option`,`id_location`),
  KEY `choixOption_Location0_FK` (`id_location`),
  CONSTRAINT `choixOption_Location0_FK` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`),
  CONSTRAINT `choixOption_Option_FK` FOREIGN KEY (`id_option`) REFERENCES `option` (`id_option`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choixoption`
--

LOCK TABLES `choixoption` WRITE;
/*!40000 ALTER TABLE `choixoption` DISABLE KEYS */;
/*!40000 ALTER TABLE `choixoption` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mots_de_passe` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `id_type_de_client` int(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  KEY `Client_Type_de_client_FK` (`id_type_de_client`),
  CONSTRAINT `Client_Type_de_client_FK` FOREIGN KEY (`id_type_de_client`) REFERENCES `type_de_client` (`id_type_de_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (0,'DUPUIS','Florian','efqztvec','florian.thiel@supdevinci-edu.fr','aaaaaa2626','0664220209',2),(1,'Admin','Admin','21 rue du Bignon','admin@admin.fr','adminadmin','0606060606',1);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `garage`
--

DROP TABLE IF EXISTS `garage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `garage` (
  `id_garage` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(50) NOT NULL,
  PRIMARY KEY (`id_garage`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garage`
--

LOCK TABLES `garage` WRITE;
/*!40000 ALTER TABLE `garage` DISABLE KEYS */;
INSERT INTO `garage` VALUES (1,'Rennes'),(2,'Paris'),(3,'Monaco'),(4,'Strasbourg'),(5,'Angers'),(6,'Lille');
/*!40000 ALTER TABLE `garage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `compteur_debut` int(11) NOT NULL,
  `compteur_fin` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL,
  PRIMARY KEY (`id_location`),
  KEY `Location_Client_FK` (`id_client`),
  KEY `Location_Voiture0_FK` (`id_voiture`),
  CONSTRAINT `Location_Client_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  CONSTRAINT `Location_Voiture0_FK` FOREIGN KEY (`id_voiture`) REFERENCES `voiture` (`id_voiture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marque` (
  `id_marque` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marque`
--

LOCK TABLES `marque` WRITE;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` VALUES (1,'Alpa Romeo'),(2,'Alpine'),(3,'Aston Martin'),(4,'Audi'),(5,'Bentley'),(6,'BMW'),(7,'Cadillac'),(8,'Chevrolet'),(9,'Chrysler'),(10,'Citroën'),(11,'Cupra'),(12,'Dacia'),(13,'Dodge'),(14,'Ferrari'),(15,'Fiat'),(16,'Ford'),(17,'Honda'),(18,'Hyundai'),(19,'Infiniti'),(20,'Jaguar'),(21,'Jeep'),(22,'Kia'),(23,'Land Rover'),(24,'Lamborghini'),(25,'Lotus'),(26,'Maserati'),(27,'Mazda'),(28,'Mercedes'),(29,'MG'),(30,'Mini'),(31,'Nissan'),(32,'Opel'),(33,'Peugeot'),(34,'Porsche'),(35,'Renault'),(36,'Seat'),(37,'Smart'),(38,'Tesla'),(39,'Toyota'),(40,'Volkswagen'),(41,'Volvo');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modele`
--

DROP TABLE IF EXISTS `modele`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modele` (
  `id_modele` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `puissance` int(11) NOT NULL,
  `hors_service` tinyint(1) NOT NULL,
  `id_categorie` varchar(1) NOT NULL,
  `id_marque` int(11) NOT NULL,
  PRIMARY KEY (`id_modele`),
  KEY `Modele_Categorie_FK` (`id_categorie`),
  KEY `Modele_Marque0_FK` (`id_marque`),
  CONSTRAINT `Modele_Categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `Modele_Marque0_FK` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modele`
--

LOCK TABLES `modele` WRITE;
/*!40000 ALTER TABLE `modele` DISABLE KEYS */;
INSERT INTO `modele` VALUES (1,'1300','alpha-romeo-1300.png',0,0,'A',1),(2,'1600','alpha-romeo-1600.png',0,0,'A',1),(3,'Crosswagon','alpha-romeo-crosswagon.png',0,0,'A',1),(4,'Giulia','alpha-romeo-giulia.png',0,0,'A',1),(5,'Giulietta','alpha-romeo-giulietta.png',0,0,'A',1),(6,'Mito','alpha-romeo-mito.png',0,0,'A',1),(7,'RZ','alpha-romeo-rz.png',0,0,'A',1),(8,'Spider','alpha-romeo-spider.png',0,0,'A',1),(9,'A110','alpine-a110.png',0,0,'a',2),(10,'A110 II','alpine-a110-II.png',0,0,'a',2),(11,'A310','alpine-a310.png',0,0,'a',2),(12,'A610','alpine-a610.png',0,0,'a',2),(13,'V6','alpine-v6.png',0,0,'a',2),(14,'DB5','aston-martin-db5.png',0,0,'a',3),(15,'DB7','aston-martin-db11.png',0,0,'a',3),(16,'A1','audi-a1.png',0,0,'a',4),(17,'S1','audi-s1.png',0,0,'a',4),(18,'A2','audi-a2.png',0,0,'a',4),(19,'Q2','audi-q2.png',0,0,'a',4),(20,'A3','audi-a3.png',0,0,'a',4),(21,'S3','audi-s3.png',0,0,'a',4),(22,'RS3','audi-rs3.png',0,0,'a',4),(23,'Q3','audi-q3.png',0,0,'a',4),(24,'RS Q3','audi-rsq3.png',0,0,'a',4),(25,'A4','audi-a4.png',0,0,'a',4),(26,'A4 avant','audi-a4-avant.png',0,0,'a',4),(27,'S4','audi-s4.png',0,0,'a',4),(28,'RS4','audi-rs4.png',0,0,'a',4),(29,'Q4','audi-q4.png',0,0,'a',4),(30,'A5','audi-a5.png',0,0,'a',4),(31,'S5','audi-s5.png',0,0,'a',4),(32,'RS5','audi-rs5.png',0,0,'a',4),(33,'Q5','audi-q5.png',0,0,'a',4),(34,'A6','audi-a6.png',0,0,'a',4),(35,'A6 avant','audi-a6-avant.png',0,0,'a',4),(36,'S6','audi-s6.png',0,0,'a',4),(37,'RS6','audi-rs6.png',0,0,'a',4),(38,'A7','audi-a7.png',0,0,'a',4),(39,'RS7','audi-rs7.png',0,0,'a',4),(40,'Q7','audi-q7.png',0,0,'a',4),(41,'A8','audi-a7.png',0,0,'a',4),(42,'Q8','audi-q8.png',0,0,'a',4),(43,'RSQ8','audi-rsq8.png',0,0,'a',4),(44,'R8','audi-r8.png',0,0,'a',4),(45,'E-TRON GT','audi-etron-gt.png',0,0,'a',4),(46,'TT RS','audi-tt-rs.png',0,0,'a',4),(47,'V8','audi-v8.png',0,0,'a',4),(48,'850','austin-850.png',0,0,'a',5);
/*!40000 ALTER TABLE `modele` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `option` (
  `id_option` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_option`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option`
--

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;
INSERT INTO `option` VALUES (1,'Assurance complémentaire',50),(2,'Nettoyage',75),(3,'Complément carburant',30),(4,'Retour autre ville',250),(5,'Rabais dimanche',-40),(6,'tout propre',100);
/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_de_client`
--

DROP TABLE IF EXISTS `type_de_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_de_client` (
  `id_type_de_client` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id_type_de_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_de_client`
--

LOCK TABLES `type_de_client` WRITE;
/*!40000 ALTER TABLE `type_de_client` DISABLE KEYS */;
INSERT INTO `type_de_client` VALUES (1,'Admin'),(2,'Particulier'),(3,'Entreprise'),(4,'Association');
/*!40000 ALTER TABLE `type_de_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `voiture` (
  `id_voiture` int(11) NOT NULL,
  `immatriculation` varchar(50) NOT NULL,
  `compteur` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL,
  `id_garage` int(11) NOT NULL,
  `id_garage_lieuArrivee` int(11) NOT NULL,
  PRIMARY KEY (`id_voiture`),
  KEY `Voiture_Modele_FK` (`id_modele`),
  KEY `Voiture_GARAGE0_FK` (`id_garage`),
  KEY `Voiture_GARAGE1_FK` (`id_garage_lieuArrivee`),
  CONSTRAINT `Voiture_GARAGE0_FK` FOREIGN KEY (`id_garage`) REFERENCES `garage` (`id_garage`),
  CONSTRAINT `Voiture_GARAGE1_FK` FOREIGN KEY (`id_garage_lieuArrivee`) REFERENCES `garage` (`id_garage`),
  CONSTRAINT `Voiture_Modele_FK` FOREIGN KEY (`id_modele`) REFERENCES `modele` (`id_modele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voiture`
--

LOCK TABLES `voiture` WRITE;
/*!40000 ALTER TABLE `voiture` DISABLE KEYS */;
/*!40000 ALTER TABLE `voiture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'loc'auto'
--
