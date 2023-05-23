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
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Citadine',60),(2,'Berline',120),(3,'Coupé',175),(4,'Break',210),(5,'SUV',230),(6,'Sportive',300),(7,'Collection',350),(8,'Luxe',500);
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
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Admin','Admin','21 Rue du Bignon','admin@admin.fr','adminadmin','0606060606',1);
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
INSERT INTO `garage` VALUES (1,'Angers'),(2,'Lille'),(3,'Monaco'),(4,'Paris'),(5,'Rennes'),(6,'Strasbourg');
/*!40000 ALTER TABLE `garage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `compteur_debut` int(11) NOT NULL,
  `compteur_fin` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `immatriculation` varchar(50) NOT NULL,
  `id_garage_lieuArrivee` varchar(100) NOT NULL,
  PRIMARY KEY (`id_location`),
  KEY `Location_Client_FK` (`id_client`),
  KEY `Location_Voiture0_FK` (`immatriculation`),
  CONSTRAINT `Location_Client_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  CONSTRAINT `location_FK` FOREIGN KEY (`immatriculation`) REFERENCES `voiture` (`immatriculation`)
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
  `id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marque`
--

LOCK TABLES `marque` WRITE;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` VALUES (1,'Alpa Romeo'),(2,'Alpine'),(3,'Aston Martin'),(4,'Audi'),(5,'Austin'),(6,'Bentley'),(7,'BMW'),(8,'Cadillac'),(9,'Chevrolet'),(10,'Chrysler'),(11,'Citroën'),(12,'Cupra'),(13,'Dacia'),(14,'Dodge'),(15,'Ferrari'),(16,'Fiat'),(17,'Ford'),(18,'Honda'),(19,'Hyundai'),(20,'Infiniti'),(21,'Jaguar'),(22,'Jeep'),(23,'Kia'),(24,'Land Rover'),(25,'Lamborghini'),(26,'Lotus'),(27,'Maserati'),(28,'Mazda'),(29,'Mercedes'),(30,'MG'),(31,'Mini'),(32,'Nissan'),(33,'Opel'),(34,'Peugeot'),(35,'Porsche'),(36,'Renault'),(37,'Seat'),(38,'Smart'),(39,'Tesla'),(40,'Toyota'),(41,'Volkswagen'),(42,'Volvo');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modele`
--

DROP TABLE IF EXISTS `modele`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modele` (
  `id_modele` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `puissance` int(11) NOT NULL,
  `hors_service` tinyint(1) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_marque` int(11) NOT NULL,
  PRIMARY KEY (`id_modele`),
  KEY `Modele_Categorie_FK` (`id_categorie`),
  KEY `Modele_Marque0_FK` (`id_marque`),
  CONSTRAINT `Modele_Categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `Modele_Marque0_FK` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modele`
--

LOCK TABLES `modele` WRITE;
/*!40000 ALTER TABLE `modele` DISABLE KEYS */;
INSERT INTO `modele` VALUES (1,'1300','alpha-romeo-1300.png',87,0,7,1),(2,'1600','alpha-romeo-1600.png',102,0,7,1),(3,'Crosswagon','alpha-romeo-crosswagon.png',150,0,4,1),(4,'Giulia','alpha-romeo-giulia.png',280,0,6,1),(5,'Giulietta','alpha-romeo-giulietta.png',120,0,1,1),(6,'Mito','alpha-romeo-mito.png',90,0,1,1),(7,'RZ','alpha-romeo-rz.png',208,0,7,1),(8,'Spider','alpha-romeo-spider.png',185,0,6,1),(9,'A110','alpine-a110.png',170,0,7,2),(10,'A110 II','alpine-a110-II.png',300,0,6,2),(11,'A310','alpine-a310.png',150,0,7,2),(12,'A610','alpine-a610.png',250,0,7,2),(13,'V6','alpine-v6.png',163,0,7,2),(14,'DB5','aston-martin-db5.png',286,0,7,3),(15,'DB7','aston-martin-db11.png',639,0,6,3),(16,'A1','audi-a1.png',90,0,1,4),(17,'S1','audi-s1.png',231,0,6,4),(18,'A2','audi-a2.png',75,0,1,4),(19,'Q2','audi-q2.png',150,0,5,4),(20,'A3','audi-a3.png',160,0,1,4),(21,'S3','audi-s3.png',304,0,6,4),(22,'RS3','audi-rs3.png',400,0,6,4),(23,'Q3','audi-q3.png',150,0,3,4),(24,'RS Q3','audi-rsq3.png',310,0,5,4),(25,'A4','audi-a4.png',150,0,2,4),(26,'A4 avant','audi-a4-avant.png',154,0,4,4),(27,'S4','audi-s4.png',347,0,6,4),(28,'RS4','audi-rs4.png',450,0,6,4),(29,'Q4','audi-q4.png',170,0,5,4),(30,'A5','audi-a5.png',163,0,1,4),(31,'S5','audi-s5.png',354,0,6,4),(32,'RS5','audi-rs5.png',444,0,6,4),(33,'Q5','audi-q5.png',261,0,5,4),(34,'A6','audi-a6.png',265,0,2,4),(35,'A6 avant','audi-a6-avant.png',265,0,4,4),(36,'S6','audi-s6.png',450,0,6,4),(37,'RS6','audi-rs6.png',800,0,6,4),(38,'A7','audi-a7.png',252,0,2,4),(39,'RS7','audi-rs7.png',740,0,6,4),(40,'Q7','audi-q7.png',340,0,5,4),(41,'A8','audi-a7.png',204,0,2,4),(42,'Q8','audi-q8.png',381,0,5,4),(43,'RSQ8','audi-rsq8.png',592,0,5,4),(44,'R8','audi-r8.png',620,0,6,4),(45,'E-TRON GT','audi-etron-gt.png',598,0,6,4),(46,'TT RS','audi-tt-rs.png',400,0,6,4),(47,'V8','audi-v8.png',280,0,6,4),(48,'850','austin-850.png',34,0,7,5),(49,'Continental flying spur','bentley-continental-flying-spur.png',565,0,8,6),(50,'Continental GT','bentley-continental-gt.png',558,0,8,6),(51,'Mulsanne','bentley-mulsanne.png',537,0,7,6),(52,'Série 1','bmw-serie1.png',109,0,1,7),(53,'Série 2 active tourer','bmw-serie2-active-tourer.png',102,0,5,7),(54,'Série 4','bmw-serie4.png',184,0,3,7),(55,'Série 6 cabriolet','bmw-serie6-cab.png',313,0,3,7),(56,'Série 8','bmw-serie8.png',530,0,2,7),(57,'x1','bmw-x1.png',170,0,5,7),(58,'x5 M','bmw-x5-m.png',625,0,5,7),(59,'M2','bmw-m2.png',365,0,6,7),(60,'M3','bmw-m3.png',460,0,6,7),(61,'M3 CS','bmw-m3-cs.png',650,0,6,7),(62,'M4','bmw-m4.png',480,0,6,7),(63,'M4 GTS','bmw-m4-gts.png',852,0,6,7),(64,'M5','bmw-m5.png',625,0,6,7),(65,'M8','bmw-m8.png',741,0,6,7),(66,'z2','bmw-z2.png',230,0,6,7),(67,'z4','bmw-z4.png',251,0,6,7),(68,'z8','bmw-z8.png',400,0,7,7),(69,'M3 e36','bmw-m3-e36.png',321,0,7,7),(70,'e30','bmw-e30.png',200,0,7,7),(71,'El dorado','cadillac-eldorado.png',210,0,7,8),(72,'Escalade','cadillac-escalade.png',682,0,5,8),(73,'Seville','cadillac-seville.png',305,0,7,8),(74,'Aveo','chervolet-aveo.png',70,0,1,9),(75,'Blazer','chervolet-blazer.png',308,0,5,9),(76,'Camaro 1969','chervolet-camaro-1969.png',253,0,7,9),(77,'Corvette','chervolet-corvette.png',455,0,8,9),(78,'300c','chyrsler-300c.png',218,0,7,10),(79,'Crossfire','chyrsler-crossfire.png',335,0,8,10),(80,'2cv','citroen-2cv.png',32,0,7,11),(81,'Ami','citroen-ami.png',12,0,1,11),(82,'Bx','citroen-bx.png',61,0,7,11),(83,'c1','citroen-c1.png',68,0,1,11),(84,'c15','citroen-c15.png',60,0,7,11),(85,'c3','citroen-c3.png',110,0,1,11),(86,'c4 Spacetourer','citroen-c4-spacetourer.png',134,0,4,11),(87,'c5 Aircross','citroen-c5-aircross.png',125,0,5,11),(88,'DS4','citroen-ds4.png',160,0,3,11),(89,'DS7','citroen-ds7.png',180,0,2,11),(90,'Mehari','citroen-mehari.png',33,0,7,11),(91,'Ateca','cupra-ateca.png',300,0,6,12),(92,'Born','cupra-born.png',231,0,6,12),(93,'Formentor','cupra-formentor.png',390,0,5,12),(94,'Léon','cupra-leon.png',245,0,6,12),(95,'Dokker','dacia-dokker.png',95,0,4,13),(96,'Duster','dacia-duster.png',100,0,5,13),(97,'Jogger','dacia-jogger.png',90,0,4,13),(98,'Challenger','dodge-challenger.png',797,0,6,14),(99,'Charger','dodge-Charger.png',707,0,6,14),(100,'RAM','dodge-ram.png',510,0,5,14),(101,'812','ferrari-812.png',830,0,8,15),(102,'F40','ferrari-f40.png',478,0,8,15),(103,'500e','fiat-500e.png',118,0,1,16),(104,'500x','fiat-500x.png',120,0,5,16),(105,'1280tipla','fiat-1294tipla.png',1294,0,7,16),(106,'Fiesta','ford-fiesta.png',75,0,1,17),(107,'Focus ST','ford-focus-st.png',280,0,6,17),(108,'Galaxy','ford-galaxy.png',190,0,4,17),(109,'Ka','ford-ka.png',69,0,1,17),(110,'Shelby GT500','ford-shelby-gt500.png',700,0,6,17),(111,'Mustang Eleanor 1967','ford-mustang-eleanor-1967.png',325,0,7,17),(112,'Mustang Mach-E','ford-mustang-mach-e.png',269,0,5,17),(113,'Civic Type R','honda-civic-type-r.png',320,0,6,18),(114,'E','honda-e.png',154,0,1,18),(115,'HR-V','honda-hr-v.png',131,0,5,18),(116,'NSX','honda-nsx.png',581,0,6,18),(117,'Ioniq-5','hyundai-ioniq-5.png',218,0,3,19),(118,'Veloster N','hyundai-veloster-n.png',147,0,6,19),(119,'QX70','infiniti-qx70.png',390,0,5,20),(120,'420','jaguar-420.png',265,0,7,21),(121,'F-Type','jaguar-f-type.png',300,0,6,21),(122,'I-Pace','jaguar-i-pace.png',320,0,6,21),(123,'Grand Cherokee','jeep-grand-cherokee.png',272,0,5,22),(124,'E-Soul','kia-esoul.png',204,0,5,23),(125,'EV6 GT','kia-ev6-gt.png',585,0,6,23),(126,'Defender','land-rover-defender.png',249,0,5,24),(127,'Discovery','land-rover-discovery.png',302,0,5,24),(128,'Evoque','land-rover-evoque.png',220,0,5,24),(129,'SVR','land-rover-SVR.png',575,0,5,24),(130,'Velar','land-rover-velar.png',550,0,5,24),(131,'Aventador SVJ','lamborghini-aventador-svj.png',770,0,6,25),(132,'Urus Mansory','lamborghini-urus.png',650,0,5,25),(133,'Elise','lotus-elise.png',240,0,6,26),(134,'Europa','lotus-europa.png',203,0,7,26),(135,'Exige','lotus-Exige.png',410,0,6,26),(136,'Granturismo','maserati-grandturismo.png',761,0,6,27),(137,'Grancabrio','maserati-grandcabrio.png',460,0,6,27),(138,'MX5','mazda-mx5.png',304,0,6,28),(139,'RX2','mazda-rx2.png',120,0,7,28),(140,'RX8','mazda-rx8.png',231,0,6,28),(141,'A 200','mercedes-a200.png',136,0,2,29),(142,'A 45 AMG','mercedes-a45-amg.png',381,0,6,29),(143,'C63 AMG','mercedes-c63-amg.png',510,0,6,29),(144,'CLA','mercedes-cla.png',163,0,3,29),(145,'CLS','mercedes-cls.png',224,0,2,29),(146,'Classe E','mercedes-classe-e.png',306,0,2,29),(147,'EQ-A','mercedes-eq-a.png',190,0,5,29),(148,'EQ-E','mercedes-eq-e.png',292,0,3,29),(149,'G63 AMG','mercedes-g63-amg.png',577,0,5,29),(150,'GLC AMG','mercedes-glc-amg.png',367,0,5,29),(151,'GLE AMG','mercedes-gle-amg.png',610,0,5,29),(152,'SLS','mercedes-sls.png',751,0,7,29),(153,'AMG GT','mercedes-amg-gt.png',530,0,6,29),(154,'ZS','mg-zs.png',143,0,5,30),(155,'Countryman','mini-countryman.png',136,0,5,31),(156,'Cooper GT','mini-cooper-gt.png',306,0,6,31),(157,'Clubman','mini-clubman.png',184,0,4,31),(158,'350Z','nissan-350z.png',280,0,6,32),(159,'370Z','nissan-370z.png',331,0,6,32),(160,'GT-R','nissan-gt-r.png',485,0,6,32),(161,'Skyline R-34','nissan-skyline-r-34.png',280,0,7,32),(162,'leaf','nissan-leaf.png',150,0,1,32),(163,'S15','nissan-s15.png',250,0,6,32),(164,'Corsa OPC','opel-corsa-opc.png',207,0,6,33),(165,'Grandland','opel-grandland.png',180,0,5,33),(166,'106 GTI','peugeot-106-gti.png',118,0,7,34),(167,'108','peugeot-108.png',82,0,1,34),(168,'205 GTI','peugeot-205-gti.png',130,0,7,34),(169,'206','peugeot-206.png',68,0,1,34),(170,'208','peugeot-208.png',94,0,1,34),(171,'3008','peugeot-3008.png',130,0,5,34),(172,'308','peugeot-308.png',130,0,2,34),(173,'408','peugeot-408.png',408,0,5,34),(174,'508','peugeot-508.png',181,0,4,34),(175,'RCZ','peugeot-rcz.png',270,0,6,34),(176,'718 Boxster','porsche-718-boxster.png',299,0,8,35),(177,'911 GT3 RS','porsche-911-gt3-rs.png',525,0,8,35),(178,'911','porsche-911.png',550,0,7,35),(179,'Cayenne','porsche-cayenne.png',474,0,5,35),(180,'Taycan','porsche-taycan.png',625,0,6,35),(181,'Clio','renault-clio.png',100,0,1,36),(182,'Clio V6','renault-clio-v6.png',255,0,7,36),(183,'Espace','renault-espace.png',170,0,4,36),(184,'Kangoo','renault-kangoo.png',75,0,1,36),(185,'Twingo','renault-twingo.png',79,0,1,36),(186,'Ibiza','seat-ibiza.png',95,0,1,37),(187,'Leon FR','seat-leon-fr.png',110,0,6,37),(188,'Fortwo','smart-fortwo.png',82,0,1,38),(189,'Roadster Brabus','renault-roadster-brabus.png',101,0,6,38),(190,'Model S','tesla-model-s.png',1100,0,6,39),(191,'Model 3','tesla-model-3.png',487,0,2,39),(192,'Model X','tesla-model-x.png',1020,0,5,39),(193,'Model Y','tesla-model-Y.png',462,0,5,39),(194,'Auris','toyota-auris.png',99,0,1,40),(195,'Aygo','toyota-aygo.png',72,0,1,40),(196,'GR86','toyota-gr86.png',200,0,6,40),(197,'Highlander','toyota-highlander.png',248,0,5,40),(198,'RAV4','toyota-rav4.png',177,0,3,40),(199,'Supra MK4','toyota-supra-mk4.png',2370,0,7,40),(200,'Supra GR ','toyota-supra-gr.png',744,0,6,40),(201,'Coccinelle','volkswagen-coccinelle.png',46,0,7,41),(202,'Golf IV R32','volkswagen-golf-iv-r32.png',1196,0,7,41),(203,'Golf 6','volkswagen-golf-6.png',105,0,1,41),(204,'Golf 7 GTI','volkswagen-golf-7-gti.png',286,0,6,41),(205,'Golf 8 R','volkswagen-golf-8-r.png',320,0,6,41),(206,'ID-3','volkswagen-id-3.png',140,0,1,41),(207,'Sirocco','volkswagen-sirocco.png',280,0,6,41),(208,'T-Roc','volkswagen-t-roc.png',150,0,5,41),(209,'Up GTI','volkswagen-up-gti.png',115,0,1,41),(210,'XC90','volvo-xc90.png',407,0,5,42);
/*!40000 ALTER TABLE `modele` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `option` (
  `id_option` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_option`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option`
--

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;
INSERT INTO `option` VALUES (1,'Complément carburant',30),(2,'Assurance complémentaire',50),(3,'Nettoyage',75),(4,'Tout propre',100),(5,'Retour autre ville',250);
/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_de_client`
--

DROP TABLE IF EXISTS `type_de_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_de_client` (
  `id_type_de_client` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id_type_de_client`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `immatriculation` varchar(50) NOT NULL,
  `compteur` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL,
  `id_garage` int(11) NOT NULL,
  PRIMARY KEY (`immatriculation`),
  KEY `Voiture_Modele_FK` (`id_modele`),
  KEY `Voiture_GARAGE0_FK` (`id_garage`),
  CONSTRAINT `Voiture_GARAGE0_FK` FOREIGN KEY (`id_garage`) REFERENCES `garage` (`id_garage`),
  CONSTRAINT `Voiture_Modele_FK` FOREIGN KEY (`id_modele`) REFERENCES `modele` (`id_modele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voiture`
--

LOCK TABLES `voiture` WRITE;
/*!40000 ALTER TABLE `voiture` DISABLE KEYS */;
INSERT INTO `voiture` VALUES ('A01DB108',40162,87,6),('A03CU275',8252,167,4),('A04MN538',8335,105,3),('A06ER865',12551,67,2),('A10GV016',3122,129,3),('A12DP618',1568,204,1),('A12JW770',33616,66,4),('A13SM473',29383,34,5),('A18VU892',21380,117,5),('A19DY439',46038,108,4),('A22MA055',10437,195,3),('A24MN658',46152,90,3),('A24NV954',22451,116,3),('A26LE229',20312,145,5),('A27CE486',6105,77,2),('A27LD669',9076,167,3),('A27ZG446',41015,175,1),('A34SR377',4081,85,5),('A35GD503',44784,75,4),('A38AV551',35696,151,3),('A40EJ638',38605,142,3),('A40HY266',9935,137,5),('A42RY894',1718,21,3),('A47WP188',6367,204,4),('A49WX204',8869,75,1),('A55NP340',16687,57,1),('A58DZ103',33061,162,3),('A60DP334',16875,29,2),('A61DP344',37324,116,5),('A62HG591',37581,142,3),('A63KR777',20734,137,5),('A63RC238',39324,12,1),('A66TD467',36976,17,4),('A70HD980',38069,21,4),('A72PK014',28499,206,1),('A73JC300',18512,146,6),('A73NC804',44216,86,3),('A73XE827',2101,45,5),('A75PD831',33330,126,5),('A82FV246',34989,28,3),('A84DX670',32017,2,5),('A85DM328',25142,170,2),('A87JG169',21780,17,5),('A88CF172',1337,173,4),('A90UD856',45837,42,1),('A90XK198',39534,37,5),('A96LF070',39936,198,2),('A96UP359',2989,48,5),('A97BB334',24169,60,2),('A99UY563',47703,141,5),('B01EJ730',25334,101,6),('B01GF061',43079,92,5),('B01GY620',6597,73,6),('B01JG556',26347,51,4),('B01WC522',30651,169,6),('B06JZ630',43962,13,4),('B14ST178',32800,61,2),('B15RB711',25724,46,5),('B16TN368',12989,118,3),('B17GH260',35735,55,2),('B22VK254',39738,22,4),('B22XE013',18247,139,1),('B24ME248',36250,120,1),('B24RE969',1714,116,3),('B27UW445',2609,181,4),('B30GC009',37435,209,2),('B32KJ716',40338,1,2),('B32UA718',26633,13,4),('B34AB987',5198,117,4),('B35KR038',14269,107,4),('B39HE414',19174,89,6),('B43EP821',47076,70,2),('B43FH100',21378,157,1),('B43KS210',47696,70,5),('B44NE617',29006,19,1),('B45HN602',41978,46,1),('B47RM872',7095,10,1),('B48KP304',15667,190,5),('B50VT614',28275,161,2),('B59BY025',48903,5,5),('B61FX362',15743,142,4),('B64BJ909',12301,164,6),('B65UA083',5338,200,4),('B66GM487',6286,53,1),('B66JU811',35787,103,1),('B66NF390',46751,94,1),('B67BX447',27737,44,6),('B67UB884',45561,99,3),('B68SF264',20120,32,6),('B72UF980',48530,16,5),('B74LT336',44563,19,3),('B74YL566',13296,66,1),('B75YA714',24410,192,3),('B79SH142',42483,67,4),('B80KH827',26610,194,6),('B81JV352',16507,207,5),('B86DS961',36137,143,2),('B88BE482',3545,10,5),('B89AR219',48566,44,3),('B89KB856',6589,128,1),('B93JF636',5677,95,4),('B99EL194',8401,144,1),('B99XR298',25002,195,6),('C02RP260',12576,182,2),('C05DE089',41762,153,3),('C09ZT646',13351,7,5),('C12GU137',40611,207,1),('C12VS452',40834,20,1),('C13ED667',3527,130,2),('C13EX772',21642,37,6),('C14AE892',13354,146,6),('C15ZM006',21318,194,6),('C16DC481',10610,112,1),('C21KX753',2788,60,3),('C24SU257',42574,19,3),('C26KS105',9368,23,1),('C33GT614',34921,92,5),('C33XS860',16787,70,6),('C35NW041',11014,182,4),('C36JH630',23575,43,6),('C36PZ810',3757,106,6),('C39NZ015',20555,202,6),('C40ME876',19258,100,5),('C43WL448',32197,178,2),('C45HG259',34605,54,2),('C46BU032',41868,80,5),('C46YM240',43811,167,5),('C47LM653',33229,190,3),('C50CR909',32326,111,1),('C51XG218',4044,17,1),('C59NP106',9535,106,4),('C61EU782',10132,6,5),('C62BU213',31735,210,5),('C62XS478',41548,51,4),('C65PY750',5885,15,2),('C66PF345',22913,188,5),('C66TS774',15855,13,2),('C71PW018',17236,57,4),('C73JT358',18775,179,1),('C75JY572',25586,95,4),('C76JA300',31838,18,1),('C77TA326',6566,60,4),('C79YE386',5858,86,6),('C83CF080',47690,177,3),('C85AU415',42921,63,2),('C87FS272',49726,52,2),('C87ZX569',23868,131,3),('C91FM528',19744,185,6),('C95LN801',30855,50,6),('C95LS539',13230,46,6),('C98YX906',19579,109,3),('C99FD254',39367,193,5),('D03LK056',26003,126,4),('D04FX676',9868,209,4),('D06NY955',22958,55,1),('D07AP793',21432,81,1),('D08YP642',21011,173,4),('D09TR417',41622,158,1),('D09YA138',15272,207,3),('D11RS447',15973,20,2),('D13VC268',4666,125,3),('D14ZD485',3196,84,1),('D17VZ721',15605,122,5),('D21RD168',43258,180,2),('D21TE390',15576,95,5),('D27JN879',41587,55,5),('D28WX981',46682,97,2),('D29ED693',13814,87,6),('D30HV296',5162,37,6),('D32SL621',46708,186,6),('D32YD448',42340,128,6),('D34WM119',40034,79,3),('D35WK285',37797,65,6),('D37EM518',1665,126,6),('D39EN562',15994,127,5),('D43PU042',32494,193,2),('D43RB982',21681,94,5),('D43YK822',2305,46,5),('D44RL913',3148,88,1),('D45RA123',31507,111,5),('D48WJ621',28144,84,2),('D53TK376',4169,3,3),('D54WB823',28284,188,4),('D55MY993',38560,187,2),('D56PL570',31601,119,4),('D56TD611',17680,116,5),('D58PK896',28219,75,1),('D59BZ579',7502,168,1),('D59HM872',9893,74,6),('D60PW636',40350,207,5),('D61NY272',28734,116,6),('D65WP441',49557,205,2),('D67PC337',21261,187,2),('D69RD281',88,93,6),('D71XF291',4136,111,1),('D73YP675',7308,163,6),('D75PP969',46721,29,5),('D83AM050',36778,55,5),('D85YL161',44323,1,3),('D88JL154',3545,17,1),('D88ZU320',10556,67,1),('D92KT371',47145,119,6),('D93YT160',5036,55,4),('D94TB499',2455,106,4),('D96JC131',19771,186,3),('D99AK586',18679,162,4),('D99DN191',23072,122,3),('E01LD558',39929,144,6),('E03TP095',29309,69,1),('E06GJ590',15226,161,6),('E07PU281',36537,115,4),('E08PW080',31167,17,2),('E08WR413',30048,174,4),('E10JX542',44375,111,1),('E12BF218',24783,44,1),('E12DX422',47368,53,4),('E16YU183',1014,199,4),('E17ZD591',7725,110,2),('E18EU683',47830,62,2),('E18LM003',38943,42,2),('E21MC719',1780,3,5),('E24FT127',48115,72,2),('E26BF486',28462,119,5),('E26KB911',34877,37,6),('E30MY988',41227,175,4),('E32VU010',30791,166,4),('E34LZ826',33007,199,4),('E39ND145',39669,17,5),('E40GY882',9406,53,1),('E46NE384',17274,78,3),('E47GS095',22848,11,4),('E50JX944',37780,197,6),('E51TH138',21039,33,5),('E54AM123',19776,52,3),('E56XM671',729,198,2),('E57XS305',31442,118,3),('E59TL091',17886,21,4),('E60HB570',24169,142,3),('E61NB400',27566,23,4),('E64TS178',6032,9,1),('E68BS809',28729,14,5),('E71WL313',18145,37,3),('E73BN259',17900,199,6),('E74EH561',25560,147,3),('E75FU733',15639,37,3),('E76KZ530',5154,17,2),('E76TL948',41171,41,5),('E77ZR543',41099,158,2),('E79YR619',12034,6,2),('E84JT792',3112,108,3),('E86CA861',6330,202,2),('E87ZY801',24291,49,6),('E89ZS252',20937,112,1),('E90HR088',13395,7,6),('E91ZE029',15645,105,5),('E92RH883',13332,95,1),('E93EM706',44375,175,1),('E95DY735',26204,41,2),('E97KU687',45742,169,5),('E99NL569',34730,117,2),('E99PH762',34809,60,6),('F02CB183',35758,65,4),('F04WW740',29292,102,3),('F09CC888',3243,51,4),('F10DR766',38728,107,2),('F11YN157',34030,42,2),('F16AY811',15364,195,6),('F21YT862',10948,34,1),('F22MR719',31305,179,6),('F27SK270',14486,60,3),('F28HZ874',3178,60,1),('F34JF444',43909,94,6),('F34XC963',47553,196,3),('F39TR988',36724,22,4),('F40LT861',31020,106,1),('F46XR755',41431,90,1),('F47WR497',45355,106,2),('F49EH923',38700,198,2),('F50YY717',22378,138,1),('F51AC066',22579,204,4),('F51VY857',7775,133,6),('F58GH210',49938,177,4),('F59VP241',37475,4,6),('F61PS367',3248,172,1),('F62DR907',26927,159,2),('F64CR396',28986,74,5),('F65CW934',24113,203,4),('F65EU009',45940,185,4),('F65SJ467',28907,59,5),('F65VH861',27517,140,1),('F70ZC055',29085,182,6),('F71LN846',42155,14,1),('F71NZ578',20014,37,1),('F72ZM724',9566,136,4),('F73EC002',22295,161,4),('F79FE012',23843,58,6),('F80DG013',35132,16,4),('F80TT982',28136,96,6),('F86HB333',16902,98,1),('F91HF403',19936,132,3),('F93TR885',3790,6,5),('G03PT167',35449,201,5),('G03SB355',44112,51,1),('G06YW285',17316,4,3),('G11CY037',17104,203,3),('G11FN042',45551,71,2),('G11NJ590',25921,74,4),('G15MK168',3626,200,6),('G15ZE298',48695,196,1),('G18XA265',18288,25,1),('G21EU510',7421,66,2),('G21XP588',32892,149,3),('G22MA989',31451,51,1),('G27XV352',48939,148,1),('G28BU025',38789,69,6),('G31RR984',9665,49,3),('G32WE781',16246,93,4),('G35TX076',7742,102,3),('G36CU030',14877,198,2),('G37YA826',48881,52,6),('G41TZ322',25045,73,2),('G43MK425',47352,2,5),('G43UU541',31245,72,2),('G45TW554',31242,201,4),('G48NZ870',13047,61,1),('G51MS750',44106,155,2),('G51TD190',7109,4,6),('G54GP927',12470,85,5),('G58HF747',34775,70,5),('G60AY697',2783,86,5),('G61EU540',5663,106,6),('G62UX597',16174,151,3),('G63HC747',8649,64,6),('G65RY554',49310,15,2),('G69EJ387',29319,47,6),('G74SK962',21189,143,6),('G77XS102',47979,46,2),('G79FH559',4946,62,4),('G81DC134',12914,8,5),('G81MA610',13749,112,4),('G81RL813',24311,185,5),('G88BV814',517,27,3),('G91ZM473',45295,86,5),('G94SF276',4954,54,4),('G95EL286',29090,63,1),('G95RJ976',48402,12,6),('G97JB895',25608,108,4),('G97VV978',40841,129,1),('G98FW034',44968,20,6),('H01AK055',41389,13,1),('H02XF971',14765,30,1),('H03LG326',6589,143,5),('H03UK043',23750,134,5),('H05GM617',41807,67,6),('H07KE541',33009,183,6),('H10BC285',46146,139,3),('H12KX119',32860,86,1),('H13JZ131',41166,17,6),('H21CY407',30537,208,5),('H21WH843',541,172,6),('H22EU792',47450,159,6),('H22PN162',22106,38,3),('H29AP371',29404,49,4),('H30CJ126',4251,5,2),('H32XS513',36549,195,3),('H37DN693',12326,162,1),('H38PG980',37379,82,6),('H40GS240',2904,109,2),('H40WP090',37741,33,5),('H43DB013',27739,184,6),('H43XP008',33076,99,1),('H44ML074',36989,107,2),('H45RL434',30345,152,2),('H47EH009',17354,193,5),('H51JB983',32865,176,6),('H53TK171',11716,5,3),('H53UD069',35866,6,1),('H61XR839',49220,140,2),('H65FU663',22706,77,6),('H68CV462',9402,6,6),('H75ZJ772',27739,209,6),('H78JZ644',23317,137,1),('H80HK153',20077,61,3),('H81SN106',16641,141,3),('H84KT870',49659,44,4),('H86HS995',30960,57,2),('H88HT036',39463,126,5),('H90KZ395',48112,98,5),('H93MN047',18158,109,5),('H95DK638',17999,102,1),('H97BZ972',16478,167,4),('H98KK458',46491,75,3),('H99NA392',5989,23,6),('H99PS629',21022,141,3),('J02RW358',35214,209,4),('J02UN652',5876,21,3),('J03UL720',32800,97,1),('J07KB932',35298,123,2),('J10TN991',49227,115,6),('J11AK629',6113,23,5),('J13NJ318',24965,26,3),('J14AH597',27420,119,6),('J16UL670',37468,109,6),('J17PB525',32894,3,3),('J19ED008',4083,2,3),('J20LF182',37527,146,2),('J22MZ917',12376,78,5),('J23GH930',32624,110,2),('J23VG859',28570,149,6),('J23ZM023',33460,60,4),('J26YW088',34107,154,4),('J28TP099',21979,206,3),('J29LW238',41309,168,2),('J30RE675',25235,64,5),('J31JN546',36441,17,5),('J33EH812',17614,56,6),('J33FU282',12977,109,4),('J38TA222',39143,34,2),('J38ZR149',7337,164,1),('J47NG769',14035,70,6),('J50JL715',37838,155,2),('J52WK255',3631,182,3),('J53MZ092',9588,95,4),('J53RD082',36539,59,2),('J54ZR765',29269,134,1),('J56EZ940',46214,114,1),('J56ZF608',27351,144,1),('J57KD754',19744,208,4),('J58NK696',9879,113,5),('J63JY197',38382,202,2),('J68YB895',24822,40,1),('J69PZ830',35943,176,5),('J71CK347',37141,12,1),('J77WA865',45927,47,1),('J80US193',8390,51,1),('J80VY056',19293,167,1),('J83EZ815',39479,18,2),('J84NF624',43929,126,5),('J84ZA123',42066,22,2),('J86VP840',21223,69,6),('J87WZ152',59,45,2),('J90SE554',23622,184,3),('J90TF726',1564,155,1),('J91PC074',25196,30,6),('J91SB661',30466,100,1),('J92XK692',8999,180,2),('J96ZS193',14541,113,6),('J99TG221',37925,10,4),('K05RD663',15239,127,6),('K05TJ005',32932,174,2),('K06SL584',9879,106,2),('K07GT328',44782,94,3),('K07JP987',2613,29,6),('K08PT914',13674,194,6),('K12AB602',28975,85,1),('K13CV802',2951,17,5),('K13TZ204',25574,46,3),('K14XC545',44109,119,3),('K15NV774',13118,49,2),('K20EV050',580,13,3),('K24JK833',44782,23,5),('K25GT860',12754,127,2),('K25WR943',36803,81,3),('K27EL343',12029,78,1),('K30WP961',16300,172,4),('K32SH161',16675,134,5),('K32US536',1774,45,2),('K36HW601',5071,194,1),('K37LN571',13770,34,1),('K37ZH429',10411,25,3),('K38MW637',15745,64,5),('K38RY373',7006,138,1),('K40XD279',12406,5,1),('K42TV249',49006,86,5),('K43JR762',4019,146,3),('K44VT990',46888,123,5),('K45JV433',46778,67,1),('K48TC198',33232,112,2),('K49MV706',32237,67,3),('K50WJ858',30047,73,6),('K51BD293',22328,192,6),('K51BR652',21010,63,3),('K51CZ490',46484,193,5),('K56UK238',39480,48,3),('K58FK804',48335,171,5),('K59RN233',10825,6,5),('K63JC777',46377,141,6),('K65DJ138',15075,56,2),('K69AK708',20409,134,2),('K69UU327',11702,84,6),('K69WC238',5474,118,1),('K70UC588',19395,177,5),('K70XD068',41625,66,6),('K71GP193',19759,23,5),('K77PZ895',14327,143,5),('K78SL452',20724,34,5),('K82TW286',12841,139,6),('K83UB032',3517,46,5),('K87JT813',10241,200,1),('K87UR318',37832,54,6),('K90GY744',32507,203,6),('K91AW607',2446,20,2),('K99PR039',3615,195,2),('L02DU107',1528,10,4),('L02YC317',42938,64,6),('L03MF816',46674,205,6),('L03TM646',16680,112,3),('L03UA753',15578,119,2),('L04VL162',395,165,4),('L06JK764',25152,25,5),('L06UE304',26529,117,3),('L07CA542',2141,23,1),('L07LG987',32564,63,1),('L07LZ391',46228,73,4),('L09ZB301',5088,74,6),('L10EU330',16443,94,2),('L11MH360',162,59,1),('L11ZA571',33220,76,3),('L18EK960',23410,77,5),('L18MD436',17341,106,3),('L19MD021',1328,32,5),('L19RH661',41032,200,6),('L22LF207',23788,175,6),('L24DY712',20141,80,5),('L25WS611',35722,23,2),('L28RS917',30920,77,3),('L28WU635',4155,72,4),('L33DU952',43171,106,5),('L35VR042',6272,81,3),('L35XS230',22932,120,5),('L36XZ875',27177,169,6),('L38ES671',25,62,6),('L40LR505',13010,95,6),('L42TG350',40408,184,1),('L43ZL088',40831,132,4),('L45DG945',45555,163,5),('L49DG258',39113,61,4),('L49RA972',42891,134,5),('L49VW674',33506,153,6),('L56BX689',34117,72,6),('L57YN350',20531,118,2),('L62SN325',31871,168,3),('L63KM764',20317,185,4),('L71UC594',15231,16,5),('L71ZC831',1763,174,3),('L73ZM593',34987,197,3),('L74XV006',20039,187,6),('L74ZC228',43905,143,6),('L77ET977',689,22,2),('L77PL368',10446,91,2),('L78EX060',344,7,2),('L80HX291',38569,15,5),('L81PJ991',1217,156,4),('L90AP988',42623,18,4),('L90EN152',23849,186,2),('L92RT584',28608,98,3),('L93DK208',34186,37,3),('L95CH394',23717,160,6),('L95MA927',45316,89,4),('L95PT174',25460,186,1),('L95PT350',40361,184,1),('L97FU553',13961,19,6),('L97TP372',5198,20,2),('L99WF411',12305,7,3),('M03DA972',35421,107,3),('M04JY372',24164,98,1),('M06XB329',44812,186,5),('M08KZ453',49710,140,4),('M10BU179',31628,3,1),('M10EE459',13107,16,2),('M13EJ253',32528,21,3),('M13SH241',17463,150,3),('M14YL571',35455,17,2),('M22HX641',3628,64,5),('M24CU761',19695,9,2),('M29DT759',44885,198,3),('M30RB767',17037,179,2),('M32WC247',5262,50,3),('M35TJ963',17310,96,3),('M36KT462',38029,14,1),('M39RW637',27403,34,3),('M40XL038',2252,161,2),('M44KC877',49947,151,3),('M47VV150',44585,12,5),('M48AB726',7643,155,5),('M50HG028',49451,83,2),('M54NU087',17947,149,2),('M55WY435',38177,40,6),('M58GS918',10902,31,1),('M59FN855',23965,194,5),('M59ZL335',22045,46,4),('M65LA355',34982,161,1),('M66DR379',31045,140,2),('M67GG180',31946,61,2),('M68PW966',13837,183,1),('M69WJ298',7417,135,5),('M71JJ403',47364,82,2),('M74EH268',46241,25,5),('M76ZF786',10350,23,5),('M79YW302',37540,86,4),('M82LP524',22309,101,3),('M84NR544',417,57,3),('M84XF367',19564,206,2),('M85CB823',34212,138,6),('M87CF736',32134,145,5),('M91FL871',69,69,2),('M92SC489',43578,69,6),('M93CK185',27774,125,3),('M95TA360',1283,127,3),('M98EX174',43699,165,1),('M98WL677',39463,177,2),('M99TT298',41258,33,6),('N01BA373',14432,142,6),('N01CV542',15452,191,2),('N02GN711',43800,110,5),('N02PH420',31555,109,1),('N03KT916',24229,15,4),('N05TX392',48262,33,3),('N15TV530',8688,181,4),('N15YV672',9172,114,2),('N21ME707',7233,7,2),('N22DC413',49543,46,4),('N22UC626',19549,85,3),('N24ML002',5447,188,1),('N29HK534',27015,155,2),('N29JT100',46423,122,4),('N29WK688',14995,163,4),('N29ZL577',47626,50,5),('N30KJ241',18208,166,3),('N30RF381',29466,194,4),('N31YA515',13176,40,1),('N32TF855',1796,137,1),('N33PH036',17691,79,5),('N37NC820',4194,85,1),('N41UA565',11613,23,2),('N41XT007',44641,189,4),('N42FR079',21956,128,5),('N43TM468',34625,174,1),('N44NW003',32596,70,1),('N45CE278',38618,18,2),('N45GH084',18857,120,2),('N47UA721',7005,167,5),('N47XX960',6187,152,6),('N48WH481',19107,75,2),('N51PS444',5622,74,2),('N52NG143',7841,110,6),('N53PN183',41560,92,6),('N53ZV359',27665,25,6),('N54XD984',48866,78,4),('N58XC391',37720,50,4),('N60ED628',35062,114,3),('N61WD346',9424,109,6),('N68WW254',2843,36,3),('N70XG886',13190,51,2),('N72EM410',37307,4,4),('N75KR208',30064,204,2),('N76MU272',6503,129,2),('N77PU676',25703,82,4),('N83VM131',6510,188,6),('N87NF035',32543,74,3),('N88GT895',5347,70,4),('N88WW240',11715,196,3),('N89JN856',5168,174,3),('N92BT577',47110,168,1),('N93NC235',17725,113,2),('N95GZ149',7331,203,2),('N98LB766',38747,141,6),('P02UM165',30221,161,4),('P03KZ448',3147,70,6),('P04NV253',14662,148,3),('P05BE558',36198,141,1),('P05CW895',32161,82,3),('P05MR065',49966,32,3),('P05RF969',15718,19,3),('P05VD458',38276,178,3),('P06WH231',367,189,6),('P07MT478',16117,77,4),('P08EE228',34727,2,3),('P09TS888',27867,136,6),('P11ME608',15916,25,1),('P11RR316',42857,100,3),('P12AT709',1028,88,3),('P14UN963',39690,26,6),('P14YV547',6683,173,1),('P18RU097',12812,132,1),('P19XP079',30962,165,4),('P22ZL695',44322,176,3),('P23NT438',22018,122,2),('P24NV316',39409,198,6),('P25VZ076',39991,118,4),('P27MH608',12680,107,1),('P27RT716',39508,138,2),('P27YK863',48860,152,6),('P28GA410',4557,115,6),('P29YT379',38557,86,6),('P32FW565',28360,187,5),('P33JF333',24874,10,3),('P34VG746',24137,84,4),('P39SM684',47661,78,4),('P41AA446',46105,48,1),('P42ZW282',4057,202,3),('P43BW901',12815,52,6),('P45ZT388',8048,105,4),('P47JN454',26752,141,3),('P48TB249',24198,65,5),('P50VJ582',5223,105,5),('P53MA736',45476,191,4),('P53ST229',4085,58,5),('P55AF894',39265,138,2),('P55HW812',32775,201,6),('P57ED120',40547,68,4),('P58HK693',20369,63,3),('P59GR254',27226,116,5),('P59XT911',9845,48,2),('P62NF891',48477,40,4),('P64HW470',35395,84,5),('P66JJ568',30617,166,3),('P75FF301',35960,147,6),('P81CU932',16859,169,2),('P82AC684',36685,162,2),('P83AE576',22447,96,6),('P83BE463',24331,2,6),('P86CV660',3842,135,6),('P90MA012',1150,143,5),('P94HM281',8896,102,1),('P96ZR594',278,41,4),('P98PJ920',8612,62,1),('R01HZ421',1790,146,5),('R02LV305',15958,207,4),('R03JM686',47492,100,5),('R05DG268',40712,186,1),('R05VK986',29633,147,6),('R05XR486',48596,210,5),('R07KS859',27242,194,1),('R09YS593',92,166,3),('R10SM194',3296,184,1),('R12VN498',25008,204,2),('R12ZJ941',32207,13,4),('R13NB587',9895,201,1),('R13YP791',7382,8,4),('R15AK413',29646,15,1),('R16SL091',3531,194,2),('R17JE818',43425,84,2),('R18VH239',28485,187,1),('R20JV536',9175,6,6),('R24CT274',17265,75,4),('R24TL557',49185,4,2),('R28NE743',11479,23,1),('R28XU933',2500,15,1),('R29AL155',39943,117,4),('R30XB624',12924,62,5),('R31VP768',37967,70,5),('R32NY872',15959,197,1),('R34ZV988',30573,178,5),('R36KU984',41559,4,1),('R41RE991',32275,74,4),('R45DH700',40498,154,2),('R45YW934',12318,99,3),('R50ZM881',19823,129,6),('R51EP586',12074,42,4),('R51UJ953',11480,55,1),('R54DW161',23847,198,1),('R55UV195',24819,28,4),('R56GD645',4638,174,4),('R58HG594',24202,23,4),('R59SG286',8060,13,4),('R60TN478',19739,123,2),('R63YD438',5418,23,6),('R65RC877',46180,138,2),('R67AW035',41256,41,5),('R67FG948',8123,102,4),('R71XW509',15183,161,1),('R74KM509',12967,203,6),('R74ZB832',37536,149,6),('R75XE951',4846,103,4),('R76BB369',13243,130,1),('R83WX819',32315,137,6),('R86DV964',6048,172,5),('R88LZ209',46873,73,6),('R88ZZ443',14259,180,2),('R92KF875',11880,121,5),('R92XF531',41567,10,4),('R94BP823',9140,17,1),('R96KU524',34755,126,2),('R97SW301',40669,117,6),('R99LZ052',11502,188,3),('R99PN516',39276,170,5),('S01VE253',37444,197,6),('S03LU975',22507,73,5),('S04PS185',13994,114,2),('S04SV203',18873,52,2),('S04WL804',6192,151,2),('S05WF629',8073,136,3),('S05YK661',6060,48,4),('S06KP922',15963,61,1),('S07TT103',26048,66,5),('S08LM152',36504,24,6),('S08NB038',21427,161,2),('S09MV719',10490,155,2),('S12FM607',43544,70,2),('S13TS002',48580,171,4),('S14LX392',49908,58,4),('S15MW748',3244,71,6),('S24EX344',36375,136,5),('S24NN693',33550,62,5),('S25PW104',42535,21,1),('S33FK808',13055,189,6),('S34AN241',16978,174,4),('S34HX044',29072,70,1),('S34XM318',19534,202,6),('S36TZ144',36808,28,5),('S40SA697',46983,185,2),('S40XM288',5529,111,4),('S43EA233',7599,126,2),('S43MC056',20020,161,4),('S45LV674',42256,184,3),('S49YW771',12605,67,1),('S50EH850',35314,144,3),('S50JC382',6637,17,6),('S50KH290',28031,176,1),('S52BD747',30852,183,3),('S52MD096',3572,40,2),('S53UR384',19467,166,6),('S56MC109',3564,105,6),('S57YC363',41986,78,6),('S60PA045',41377,141,4),('S60WK687',46528,132,4),('S65JT735',9983,10,5),('S66CY950',9379,81,5),('S68GH984',48541,73,2),('S68XG143',2555,141,3),('S69RA274',14060,206,2),('S71ZW307',27741,13,6),('S72HX354',26041,19,3),('S72NW326',13250,32,3),('S76DL140',7954,200,5),('S78KZ211',37471,124,4),('S79BB029',11127,9,6),('S79TD942',47223,86,6),('S79ZX020',25405,185,1),('S81EK835',46838,7,3),('S83NW554',43145,189,4),('S83RY181',22060,41,5),('S84MA462',3736,94,5),('S86HB671',40913,168,1),('S86JK010',33945,158,2),('S89BT319',9928,153,1),('S91WG292',37810,149,2),('S92HB782',18903,72,5),('S93AA655',37128,172,6),('S94CJ585',28543,35,5),('S95LM758',37322,193,4),('S97GG141',4902,36,2),('S98DF996',10589,143,4),('S99LJ455',27889,49,5),('S99LX870',27878,130,4),('T02NL867',49335,31,5),('T03PZ766',46374,15,2),('T08YN756',34694,71,6),('T13VL715',22414,101,4),('T20DY774',22416,100,2),('T22NX269',40935,179,5),('T23EG220',41590,38,2),('T23PM251',12580,153,1),('T25ZL055',33781,186,1),('T28DD138',16181,161,2),('T30ZD904',11402,196,4),('T34SW882',21191,168,5),('T38AL909',26617,144,5),('T38FE774',47679,200,6),('T38TE347',29307,209,3),('T39HW845',19943,44,1),('T41XS866',18065,203,5),('T42HF151',12011,151,6),('T45EU826',8625,19,3),('T45HX123',34761,95,6),('T45MC845',37127,167,4),('T45TG803',12087,174,2),('T45VT652',20103,95,6),('T45WG549',14913,196,5),('T46AY806',30336,160,4),('T46HV740',9579,175,5),('T46JH255',39567,70,1),('T48LM015',14776,6,1),('T50AH803',3556,20,2),('T50DE492',36831,117,4),('T52BD258',17425,207,2),('T52UA340',49928,128,6),('T54GL217',38126,193,4),('T56YA589',26845,44,6),('T56YS259',17004,60,6),('T57MR963',18881,122,4),('T58UY242',38784,61,3),('T59CB633',40532,38,3),('T60AX504',15610,207,3),('T60JS991',23259,101,5),('T61VU879',11718,206,3),('T63KX052',47776,107,3),('T64LW274',19175,37,3),('T67CG481',45365,123,4),('T68VF027',32059,196,3),('T73WU481',7015,129,3),('T74EZ308',18471,81,2),('T75LW082',130,75,5),('T76KV350',12464,34,5),('T78CS582',41807,87,4),('T78UG355',6231,42,1),('T79LP700',12961,208,5),('T80GH290',34586,5,4),('T82GJ993',9144,100,4),('T85FV137',24271,209,5),('T86HL022',4121,5,4),('T87VT170',1169,205,6),('T88HS654',14382,196,5),('T88PE021',46210,89,5),('T89WU807',454,151,4),('T90EJ986',11393,64,2),('T91AX750',9777,146,2),('T92DF176',5977,170,2),('T93RR543',48129,71,2),('T95KF811',19318,92,1),('T99UY132',26860,187,3),('U06KN787',11776,103,3),('U07AF883',45911,64,4),('U08VL136',37034,209,1),('U08YA313',24862,71,4),('U09AU204',48236,13,5),('U16AC750',15393,52,4),('U16TG397',48297,152,6),('U18NM295',18181,168,6),('U19XE171',11682,66,4),('U20TU779',2567,208,2),('U21RZ459',2363,9,2),('U21YY787',16008,51,1),('U22MX933',7592,100,6),('U23US052',44322,58,2),('U25YS525',44988,170,4),('U28GZ910',32147,63,3),('U29NS200',18551,84,4),('U30JU445',46548,59,6),('U32FD378',773,184,4),('U34CH998',26940,16,6),('U34XZ429',10185,138,3),('U38XP178',17038,69,3),('U45PD004',2091,25,2),('U47FM799',49815,71,6),('U49BA674',25917,183,4),('U50RZ038',16776,105,2),('U51TD524',6058,103,5),('U53XG249',30088,190,4),('U55PM278',12247,109,5),('U57AB398',40383,48,4),('U57VY287',40917,173,2),('U59NC470',14297,31,2),('U62ZL750',31980,117,5),('U65RV767',35087,186,1),('U70LF634',49540,74,2),('U72WY109',36090,54,5),('U72YE347',41986,158,4),('U73KM927',43180,40,2),('U75HH705',28681,210,3),('U76CF066',21426,19,5),('U78ZF185',9310,175,2),('U81KD719',13382,159,4),('U81WX602',1642,63,5),('U81YD619',10277,16,2),('U83ZX351',39506,7,4),('U84RH421',113,169,2),('U84WD967',12760,154,3),('U89VP076',8093,171,2),('U90VS585',24385,49,1),('U93BU606',30688,18,1),('U95EH786',2105,209,5),('U97KB617',9850,139,2),('U98PT030',20673,53,6),('U99TK527',2114,139,1),('V02ZY757',39049,145,2),('V04FV032',21833,140,5),('V04TA149',20878,86,1),('V11KR543',10076,173,3),('V12MR999',31254,88,6),('V14AG538',15277,149,2),('V16FS203',49401,122,4),('V28MD745',27044,55,1),('V29KY142',36235,98,5),('V30FD296',29821,88,5),('V32LN953',31529,85,3),('V33MX209',2622,113,2),('V34WC195',27702,86,3),('V35RA327',43233,186,1),('V38NU892',38937,163,2),('V45GB661',32579,92,4),('V47TM241',42764,201,2),('V53GP352',12137,91,2),('V53SA438',47247,197,3),('V54RV433',11908,25,6),('V54VA947',10131,206,2),('V55SC862',7894,20,2),('V58CK742',31744,12,2),('V62KW727',28506,109,4),('V63XT392',302,82,4),('V63YT917',13884,189,3),('V66CG694',3119,128,6),('V69EV724',40124,23,1),('V69GL356',22118,99,6),('V69WM169',11202,14,6),('V77GK081',4494,210,2),('V78LX510',29730,182,6),('V79AF858',18481,175,4),('V79EW372',16779,34,6),('V81JX150',42071,206,4),('V81YX752',23990,69,3),('V83AZ059',43338,42,5),('V83NW339',40815,130,3),('V88LX476',22105,75,2),('V91BV908',42184,93,1),('V94ZR177',23783,189,1),('V95ZD862',41878,126,3),('V96FR039',7064,148,2),('V96PV465',49367,144,1),('V97DD677',34539,188,5),('V99SH654',9002,94,2),('W02BN791',40702,192,5),('W08GY337',27014,78,6),('W12YD266',43200,77,6),('W14NH165',10534,81,2),('W14WP175',22316,192,5),('W17XD688',10908,148,4),('W22DD075',12821,38,4),('W25TU787',2642,79,5),('W25ZR561',2381,26,4),('W26FE526',26664,135,6),('W32EA531',46965,32,2),('W32GT186',36081,77,5),('W34BW316',22500,1,1),('W34UT204',32016,75,5),('W34ZU551',14810,189,5),('W35CZ417',13828,110,3),('W38LZ387',38210,40,2),('W38RH210',15629,47,6),('W39DH724',35440,168,6),('W39FH968',45056,99,2),('W41RV100',2915,41,5),('W42HP317',18852,66,3),('W43XM556',18482,5,2),('W44SW703',45430,125,4),('W46AV985',33605,133,2),('W52SD526',29884,32,2),('W52SN233',698,39,6),('W52YX397',20842,17,3),('W54DG635',1061,46,5),('W54NG822',30345,76,3),('W54XV210',44343,142,3),('W57KG035',4875,58,5),('W57PG001',34864,200,2),('W58AU040',21277,149,3),('W61NH711',27869,33,2),('W61UR013',34527,210,5),('W62HN856',17354,85,5),('W64UN345',21353,120,2),('W66DD679',1104,155,3),('W67JF327',15013,56,6),('W67NG997',36690,11,4),('W68KL068',32170,107,4),('W69YB176',46010,105,2),('W72DJ021',43898,148,3),('W73WF755',15191,124,2),('W75MP199',3534,49,2),('W75XC804',19354,149,6),('W76MF520',17992,156,6),('W76SD103',7779,24,4),('W78LV013',17562,202,2),('W78UK312',5022,199,5),('W80UC760',48491,77,4),('W82XG016',6783,20,3),('W83EY962',41026,208,1),('W84BA471',34599,81,3),('W84TZ917',5308,130,1),('W84UE200',22359,159,1),('W86ZM876',48635,122,1),('W89LX758',7368,64,5),('W91GZ286',23854,144,5),('W91XJ546',17231,58,6),('W92AG931',14473,142,5),('W92SC733',35222,171,1),('W96CZ953',45255,69,5),('X03YY600',22276,104,2),('X04BZ822',30123,193,2),('X06YJ924',6481,65,6),('X08BJ121',41595,190,6),('X09GK313',15166,197,3),('X10UM343',22576,131,4),('X15RU369',2873,206,3),('X22TB788',26701,34,1),('X23FC012',33910,177,1),('X23GX383',28558,164,6),('X26KC773',3886,21,4),('X28MR794',17875,50,1),('X30UC828',34673,157,2),('X32AG782',6392,107,1),('X35CA200',27344,56,3),('X35YZ020',31897,7,2),('X37MX311',23362,155,3),('X44VR245',14821,39,3),('X47VY063',39489,190,6),('X48CR237',32,139,1),('X49PR815',38166,167,1),('X49TG935',25604,49,5),('X50EK807',32627,32,4),('X50XS906',15748,64,1),('X52BE426',28948,173,6),('X56FN945',31456,64,5),('X58RF632',40915,120,4),('X62AK954',41484,176,2),('X63AF979',44292,5,3),('X66GY645',46481,159,6),('X66UF542',23425,122,2),('X67BM138',44683,203,4),('X67PJ926',9295,85,6),('X68RR994',9346,158,6),('X68VB383',39010,202,1),('X69NR466',49808,171,4),('X69UC985',43854,182,2),('X73LV004',32278,23,2),('X73NX311',38682,130,5),('X76BT495',28083,51,6),('X79CN491',48471,159,2),('X81SE950',21629,72,3),('X85JU332',40329,43,6),('X89BE635',42296,157,5),('X92MV267',32666,69,4),('X94VW557',8535,24,4),('X99WL258',22892,132,5),('Y01ZP875',32623,182,4),('Y04ZA793',45592,84,4),('Y06KL508',27323,49,1),('Y06LK879',41739,200,3),('Y07YE851',24620,199,2),('Y08GU331',35610,131,2),('Y08GW036',42991,102,1),('Y08RM093',32251,165,3),('Y09RF776',9169,12,2),('Y10DY730',22514,195,1),('Y11EA959',13067,45,6),('Y11FA294',9800,4,6),('Y20JB815',37857,5,3),('Y23PJ139',41440,165,2),('Y25HM290',9808,48,4),('Y25ZX830',4952,176,5),('Y26CN143',13914,4,2),('Y27SN773',9717,194,4),('Y32UC888',27595,163,5),('Y34TF468',10449,110,3),('Y39FY236',13954,85,1),('Y42JE809',29028,111,4),('Y42LC209',1784,3,1),('Y46XC455',36172,8,4),('Y51AU080',36618,55,5),('Y54AH938',17910,50,6),('Y57DA502',2277,108,1),('Y57NS347',41024,36,5),('Y58HP616',738,99,3),('Y59GJ260',31738,38,5),('Y59JZ985',5259,165,2),('Y64VJ854',23969,202,3),('Y65CM458',1844,26,2),('Y67SB362',38183,106,3),('Y69DX796',20256,208,1),('Y72PV243',21247,64,4),('Y73MB139',1935,99,4),('Y79YH098',40371,97,1),('Y81BM694',2796,51,6),('Y82AM152',28412,196,4),('Y84NJ799',46012,166,3),('Y88LL854',40446,58,3),('Y88WP370',11369,21,5),('Y97DR238',42227,2,2),('Z01JV619',6591,128,3),('Z01WC124',15285,64,6),('Z02NU742',29227,149,2),('Z04RC466',38719,138,4),('Z04US582',27067,77,3),('Z05BY834',916,195,5),('Z09KC647',27889,158,5),('Z11DL523',3721,91,5),('Z15YM816',11355,87,2),('Z21VR761',17910,59,6),('Z24PL750',31224,95,1),('Z26DP979',11774,15,5),('Z30ND036',12839,178,2),('Z31XU719',20411,15,3),('Z32HE582',21741,126,5),('Z34TG332',25607,195,5),('Z35EP934',18566,116,3),('Z35WM570',17260,166,4),('Z38FP319',16462,102,4),('Z38RF956',16100,84,2),('Z43PN920',35942,111,2),('Z44EN273',17379,203,4),('Z46FN387',14818,129,6),('Z47CT739',47853,67,6),('Z48LH202',7007,120,1),('Z48WM629',39933,55,5),('Z50FC755',17370,88,3),('Z50FU833',23812,174,6),('Z51XT925',29361,96,2),('Z55GD985',25453,163,2),('Z55VJ860',35054,133,6),('Z56RV205',151,113,2),('Z57AD779',20859,14,1),('Z60GH902',39120,45,1),('Z60NF337',33325,100,3),('Z62DL129',7925,27,3),('Z62XC428',32612,14,1),('Z63AS274',34474,147,2),('Z64RV128',22841,16,2),('Z65ED160',30707,48,3),('Z69KT200',23853,137,1),('Z75HK872',16919,145,6),('Z76NS914',29630,70,5),('Z79RT512',6914,159,3),('Z80AC785',30038,91,3),('Z80YV956',13225,103,6),('Z88JR846',36270,118,3),('Z89SF977',45992,83,1),('Z90YK498',26411,60,2),('Z91DF927',28957,101,2),('Z96DU869',19892,143,5);
/*!40000 ALTER TABLE `voiture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'loc'auto'
--
