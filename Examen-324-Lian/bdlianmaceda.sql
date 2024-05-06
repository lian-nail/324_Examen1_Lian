-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdlianmaceda
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `cuentabancaria`
--

DROP TABLE IF EXISTS `cuentabancaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentabancaria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idPersona` int DEFAULT NULL,
  `numeroCuenta` varchar(50) DEFAULT NULL,
  `tipoCuenta` int DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT '0.00',
  `altaBaja` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_cuenta` (`numeroCuenta`),
  KEY `cuentabancaria_ibfk_1` (`idPersona`),
  KEY `cuentabancaria_ibfk_2_idx` (`tipoCuenta`),
  CONSTRAINT `cuentabancaria_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cuentabancaria_ibfk_2` FOREIGN KEY (`tipoCuenta`) REFERENCES `tipocuenta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentabancaria`
--

LOCK TABLES `cuentabancaria` WRITE;
/*!40000 ALTER TABLE `cuentabancaria` DISABLE KEYS */;
INSERT INTO `cuentabancaria` VALUES (1,1,'001-1234566',1,1500.50,'alta'),(2,2,'001-9876543',2,3000.75,'alta'),(3,3,'001-1111111',3,50000.00,'alta'),(4,4,'001-2345678',1,2000.00,'alta'),(5,4,'001-23456789',2,3500.00,'alta'),(6,5,'001-3456789',1,1000.00,'alta'),(7,6,'001-4567890',3,75000.00,'alta'),(8,6,'001-45678901',1,5000.00,'alta'),(9,1,'002-12345677',3,1000.00,'baja'),(10,1,'003-12345678',2,1000.00,'alta'),(11,7,'007-00700712',1,200.00,'alta'),(12,7,'007-00700713',1,200.00,'alta'),(13,8,'008-00800812',1,100.00,'alta'),(14,8,'008-00800813',1,200.00,'alta'),(15,9,'009-00900912',1,50.00,'alta'),(16,9,'009-00900913',1,100.00,'alta'),(17,10,'010-01001012',1,250.00,'alta'),(18,10,'010-01001013',1,100.00,'alta'),(19,1,'004-0040041',1,100.00,'alta'),(20,2,'002-0020021',1,2500.00,'alta');
/*!40000 ALTER TABLE `cuentabancaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `departamento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'La Paz'),(2,'Tarija'),(3,'Pando'),(4,'Cochabamba'),(5,'Santa Cruz'),(6,'Chuquisaca'),(7,'Oruro'),(8,'Beni'),(9,'Potosi');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `rol` int DEFAULT '2',
  `departamento` int DEFAULT NULL,
  `nick` varchar(45) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`),
  KEY `id_rol_idx` (`rol`),
  KEY `id_dep_idx` (`departamento`),
  CONSTRAINT `id_dep` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`),
  CONSTRAINT `id_rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Lian','Maceda','12345678',1,1,'lianmocoloco','$2y$10$u0lteDHmZvSMOeETmykkrOB2D2T8kOCTxRs984cSiMgV6u689gfuK'),(2,'Sebastian','Guarachi','11122233',2,2,'sebas123','$2y$10$XIsCkP3waWGy40CIwT.4XOb2tBoILLCeIAmFcLz9QN.ziWA39QWGK'),(3,'Adrian','Garfias','11111111',3,3,'adrian123','$2y$10$qxrE1bBOArZzrImZvkaOFeaFztZTR6MGQD.kBHFR67tq62hKMD6OS'),(4,'Ana','De Armas','000111222',1,4,'ana123','$2y$10$RmAUaTzNHurWQkualyfwbuLBl9kBivXgs1r1t.OqsN/54cn1p.246'),(5,'Maria','Blanco','007007007',1,5,'maria123','$2y$10$V4.wKJH5Mu2AOdLcP9N/MOEb5Elwt8n0K4g.blnw33Dlu4JIO.kdy'),(6,'Karen','Karen','85858585',3,6,'karen123','$2y$10$FIU7GslQrQGMzAoTFlpCyO1VEE7V9PI8AFyvAioDRlzqnEyMfS3qe'),(7,'Nicol','Albertina','123456789',2,9,'nicol123','$2y$10$HXAogpE03rW3wzCpVeixduT1Wth7E1zDtcnm7URups4Yq6c5Z/yMm'),(8,'Gustavo','Guzman','1112223330',1,8,'gustavo123','$2y$10$3XVl2dGN6xcGTbTAVlxDzOdSE3xoI5dwF6u97eaQsZ16Hngs.yXkO'),(9,'Camila','Vega','999888777',1,7,'camila123','$2y$10$vPyLF0EmK7RQQcDCdWPS0e7anAa7609HgO0iUN7lirB7/V.dE0m0O'),(10,'Liannail','Maceda','13244964',1,1,'lian123456','$2y$10$7rj6sXxM/yUCJYGG4RvbdOOLKDnv4kXEeFIh281u4t/lfsq.jrpc.');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Cliente'),(2,'Personal del Banco'),(3,'Director Bancario');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocuenta`
--

DROP TABLE IF EXISTS `tipocuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipocuenta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipocuenta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocuenta`
--

LOCK TABLES `tipocuenta` WRITE;
/*!40000 ALTER TABLE `tipocuenta` DISABLE KEYS */;
INSERT INTO `tipocuenta` VALUES (1,'Ahorro'),(2,'Corriente'),(3,'Empresarial');
/*!40000 ALTER TABLE `tipocuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccionbancaria`
--

DROP TABLE IF EXISTS `transaccionbancaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaccionbancaria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idCuentaPrincipal` int DEFAULT NULL,
  `idCuentaDestino` int DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `transaccionbancaria_ibfk_1` (`idCuentaPrincipal`),
  KEY `transaccionbancaria_ibfk_2` (`idCuentaDestino`),
  CONSTRAINT `transaccionbancaria_ibfk_1` FOREIGN KEY (`idCuentaPrincipal`) REFERENCES `cuentabancaria` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `transaccionbancaria_ibfk_2` FOREIGN KEY (`idCuentaDestino`) REFERENCES `cuentabancaria` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccionbancaria`
--

LOCK TABLES `transaccionbancaria` WRITE;
/*!40000 ALTER TABLE `transaccionbancaria` DISABLE KEYS */;
INSERT INTO `transaccionbancaria` VALUES (1,1,2,500.50,'2024-04-17 03:01:03'),(2,2,3,1000.00,'2024-04-17 03:01:03'),(3,3,1,20000.00,'2024-04-17 03:01:03'),(4,4,5,300.00,'2024-04-17 03:01:03'),(5,5,6,200.00,'2024-04-17 03:01:03'),(6,6,4,10000.00,'2024-04-17 03:01:03');
/*!40000 ALTER TABLE `transaccionbancaria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-05 21:25:43
