-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sistema
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `compra_servicio`
--

DROP TABLE IF EXISTS `compra_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra_servicio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_compra` datetime NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `servicio_id` int(10) unsigned NOT NULL,
  `reporte_ruta` varchar(50) NOT NULL,
  `observaciones` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_servicio`
--

LOCK TABLES `compra_servicio` WRITE;
/*!40000 ALTER TABLE `compra_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observacion_servicio`
--

DROP TABLE IF EXISTS `observacion_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `observacion_servicio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `observaciones` longtext NOT NULL,
  `archivo` varchar(500) NOT NULL,
  `servicio_id` int(10) unsigned NOT NULL,
  `creador_id` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `checado` enum('NO','SI') NOT NULL,
  `id_administrador_checador` int(11) NOT NULL,
  `fecha_verificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observacion_servicio`
--

LOCK TABLES `observacion_servicio` WRITE;
/*!40000 ALTER TABLE `observacion_servicio` DISABLE KEYS */;
INSERT INTO `observacion_servicio` VALUES (1,'Primer comentario','',1,3,'2024-04-02 00:06:30','SI',1,'2024-04-02 22:57:30'),(2,'segundo comentario','',1,3,'2024-04-02 00:07:33','SI',1,'2024-04-02 22:54:16'),(3,'trabajar rapido','',3,1,'2024-04-02 23:22:38','SI',1,'2024-04-02 23:23:16'),(4,'estabamos trabajandp y juan se cayo','',3,7,'2024-04-02 23:24:18','SI',1,'2024-04-02 23:25:04'),(5,'tercer comentario\r\n','',3,3,'2024-04-03 10:03:52','NO',0,'0000-00-00 00:00:00'),(6,'secayo zacala ','',1,3,'2024-04-07 13:56:16','SI',1,'2024-04-07 13:57:44'),(7,'hghjghjghjgjh','',1,1,'2024-04-07 13:58:09','SI',1,'2024-04-07 13:58:17');
/*!40000 ALTER TABLE `observacion_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `obra` varchar(50) NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `cliente` longtext NOT NULL,
  `sucursal_id` int(10) unsigned NOT NULL,
  `creador_registro` varchar(500) NOT NULL,
  `presupuesto` double(8,2) NOT NULL DEFAULT 0.00,
  `fecha_respaldo` date DEFAULT NULL,
  `autorizacion` enum('autorizado','negado') NOT NULL DEFAULT 'autorizado',
  `oc_fecha` varchar(50) NOT NULL,
  `factura` varchar(50) NOT NULL,
  `fecha_factura` date DEFAULT NULL,
  `subtotal` double(8,2) NOT NULL DEFAULT 0.00,
  `iva` double(8,2) NOT NULL DEFAULT 0.00,
  `total` double(8,2) NOT NULL DEFAULT 0.00,
  `comentario` longtext NOT NULL,
  `prioridad` enum('alto','medio','bajo') NOT NULL DEFAULT 'bajo',
  `hoja_servicio` varchar(50) NOT NULL,
  `reporte_fotografico` varchar(255) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `activo` int(11) NOT NULL,
  `actualizo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'DT-101x','DT-101x','Deportenis Moreliax',2,'Administrador COVE',1.00,'2024-04-30','negado','AC-15-02-24x','A-101x','2024-04-30',1.00,1.00,1.00,'levantar las bardas perimetrales xxxx','bajo','','','2024-03-30 00:18:47',NULL,1,'Administrador COVE'),(2,'Obra1','Obra1','Cesar Candy',2,'Administrador COVE',1000.00,'2024-03-30','autorizado','gfhgfg','hjk221','2024-03-28',111.00,222.00,3333.00,'reacomodo','alto','','','2024-03-30 09:03:27',NULL,1,'Administrador COVE'),(3,'cesar1','m123','cesar',3,'Administrador COVE',10000.00,'2024-04-02','autorizado','0112','1512','2024-04-02',1111.00,11111.00,1111.00,'checar basrdas','alto','','','2024-04-02 23:21:15',NULL,1,'Administrador COVE');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cio` varchar(50) NOT NULL,
  `inmueble` longtext NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `realizo` varchar(500) NOT NULL,
  `actualizo` varchar(500) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursales`
--

LOCK TABLES `sucursales` WRITE;
/*!40000 ALTER TABLE `sucursales` DISABLE KEYS */;
INSERT INTO `sucursales` VALUES (1,'MOR-115','Deportenis Camelinas','Morelia','2024-03-26 14:30:23','2024-03-30 00:15:53','Administrador COVE','Administrador COVE',1),(2,'MOR1','Dulceria','Morelia','2024-03-30 09:00:46','2024-03-30 09:00:46','Administrador COVE','Administrador COVE',1),(3,'MOR-01','CasaCESAR','Morelia','2024-04-02 23:19:07','2024-04-02 23:19:07','Administrador COVE','Administrador COVE',1);
/*!40000 ALTER TABLE `sucursales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisores_mantenimientos`
--

DROP TABLE IF EXISTS `supervisores_mantenimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supervisores_mantenimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_id` int(11) NOT NULL,
  `mantenimiento_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisores_mantenimientos`
--

LOCK TABLES `supervisores_mantenimientos` WRITE;
/*!40000 ALTER TABLE `supervisores_mantenimientos` DISABLE KEYS */;
INSERT INTO `supervisores_mantenimientos` VALUES (1,1,1,1),(2,3,1,1),(3,3,1,0),(4,3,2,0),(5,6,2,1),(6,3,2,1),(7,7,3,1),(8,3,3,1),(9,6,3,1);
/*!40000 ALTER TABLE `supervisores_mantenimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `rol` int(11) NOT NULL,
  `realizo` varchar(500) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Administrador COVE','Conocida','admin','admin',1,1,'Administrador COVE','2024-03-27 23:12:34'),(2,'cesar','cesar','ceas','cesar',0,1,'Administrador COVE','2024-03-26 00:28:48'),(3,'cesar1','cesar1','cesar1','cesar1',1,2,'Administrador COVE','2024-03-25 19:45:18'),(4,'cesar','cesar','cesar','cesa',0,2,'Administrador COVE','2024-03-25 23:49:56'),(5,'cesar','cea','fdgf','gfdg',0,2,'Administrador COVE','2024-03-25 17:52:16'),(6,'Angel Zavala111','conocida','angel','angel',1,2,'Administrador COVE','2024-03-30 09:00:15'),(7,'Magda','conocida','magda','magda',1,2,'Administrador COVE','2024-04-02 23:16:06');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-10  9:30:46
