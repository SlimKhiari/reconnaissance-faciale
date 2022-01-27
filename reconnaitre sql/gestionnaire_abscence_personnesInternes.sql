-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: gestionnaire_abscence
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `personnesInternes`
--

DROP TABLE IF EXISTS `personnesInternes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personnesInternes` (
  `idpersonnesInternes` int NOT NULL,
  `Nom` varchar(95) NOT NULL,
  `Prenom` varchar(95) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `mot_de_passe` varchar(45) NOT NULL,
  `nom_du_fichier` varchar(200) NOT NULL,
  PRIMARY KEY (`idpersonnesInternes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personnesInternes`
--

LOCK TABLES `personnesInternes` WRITE;
/*!40000 ALTER TABLE `personnesInternes` DISABLE KEYS */;
INSERT INTO `personnesInternes` VALUES (0,'Khiari','Slim','1999-03-02','slim.khiari.03@gmail.com','pass','/faces/slim-khj.jpg'),(1,'Benslama','Chahed','1998-05-06','chahed@gmail.com','pass','/faces/chahed.jpg '),(2,'Talha','Elhassane','1998-04-25','elhassane@gmail.com','pass','/faces/elhassan.jpg'),(3,'Elbaroudi','Marwan','1999-01-23','elbaroudi@gmail.com','pass','/faces/elbaroudi.jpg'),(4,'Laraiba','Wassim','1999-05-15','wassim@gmail.com','pass','/faces/wassim.jpg');
/*!40000 ALTER TABLE `personnesInternes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-27  9:26:35
