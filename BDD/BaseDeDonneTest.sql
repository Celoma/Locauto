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
  `id_voiture` int(11) NOT NULL AUTO_INCREMENT,
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
