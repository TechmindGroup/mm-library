CREATE DATABASE  IF NOT EXISTS `devel_yii` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `devel_yii`;
-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: devel_yii
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.12.04.1

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
-- Table structure for table `department_materials`
--

DROP TABLE IF EXISTS `department_materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` bigint(20) unsigned NOT NULL,
  `quantity` decimal(6,2) unsigned NOT NULL,
  `planned_quantity` decimal(6,2) unsigned NOT NULL DEFAULT '0.00',
  `quantity_unit` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `create_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index2` (`material_id`),
  KEY `index3` (`quantity_unit`),
  KEY `index4` (`department_id`),
  CONSTRAINT `fk_department_materials_1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_department_materials_2` FOREIGN KEY (`quantity_unit`) REFERENCES `material_qunits` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_department_materials_3` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_materials`
--

LOCK TABLES `department_materials` WRITE;
/*!40000 ALTER TABLE `department_materials` DISABLE KEYS */;
/*!40000 ALTER TABLE `department_materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_materials_unsorted`
--

DROP TABLE IF EXISTS `department_materials_unsorted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_materials_unsorted` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` bigint(20) unsigned NOT NULL,
  `quantity` decimal(6,2) unsigned NOT NULL,
  `quantity_unit` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `create_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index2` (`material_id`),
  KEY `index3` (`quantity_unit`),
  KEY `index4` (`department_id`),
  CONSTRAINT `fk_department_materials_unsorted_1` FOREIGN KEY (`material_id`) REFERENCES `materials_unsorted` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_department_materials_unsorted_2` FOREIGN KEY (`quantity_unit`) REFERENCES `material_qunits` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_department_materials_unsorted_3` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_materials_unsorted`
--

LOCK TABLES `department_materials_unsorted` WRITE;
/*!40000 ALTER TABLE `department_materials_unsorted` DISABLE KEYS */;
/*!40000 ALTER TABLE `department_materials_unsorted` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_categories`
--

DROP TABLE IF EXISTS `material_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'category name',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `fk_material_categories_1_idx` (`parent_id`),
  CONSTRAINT `fk_material_categories_1` FOREIGN KEY (`parent_id`) REFERENCES `material_categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_categories`
--

LOCK TABLES `material_categories` WRITE;
/*!40000 ALTER TABLE `material_categories` DISABLE KEYS */;
INSERT INTO `material_categories` VALUES (0,'-',0),(1,'κατηγορία 1',0),(2,'κατηγορία 2',0),(3,'κατηγορία 3',0),(5,'sub1',1),(6,'s1-1',1),(7,'sub2',2),(8,'sub3',3),(9,'new',0);
/*!40000 ALTER TABLE `material_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_components`
--

DROP TABLE IF EXISTS `material_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_components` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `composition_id` bigint(20) unsigned NOT NULL COMMENT 'composition id',
  `sequence` smallint(5) unsigned NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `nominal_number` varchar(255) NOT NULL COMMENT 'αριθμός ονομαστικού υλικού που προσθέτω στην σύνθεση',
  `unit` int(10) unsigned NOT NULL,
  `planned_string` varchar(255) DEFAULT NULL COMMENT 'προβλεπόμενη ποσοτητα ολογράφος',
  `planned_number` int(10) unsigned NOT NULL COMMENT 'προβλεπόμενη ποσοτητα αριθμητικά',
  `unallocated_string` varchar(255) DEFAULT NULL COMMENT 'μη χορηγηθεισα ποσοτητα ολογράφος',
  `unallocated_number` int(10) unsigned NOT NULL COMMENT 'μη χορηγηθεισα ποσοτητα αριθμητικά',
  PRIMARY KEY (`id`),
  KEY `index2` (`composition_id`),
  KEY `index3` (`unit`),
  CONSTRAINT `fk_material_componets_1` FOREIGN KEY (`unit`) REFERENCES `material_qunits` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_material_componets_2` FOREIGN KEY (`composition_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_components`
--

LOCK TABLES `material_components` WRITE;
/*!40000 ALTER TABLE `material_components` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_composition_items`
--

DROP TABLE IF EXISTS `material_composition_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_composition_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nominal_number` varchar(255) NOT NULL,
  `charged_number` varchar(255) DEFAULT NULL,
  `credit_number` varchar(255) DEFAULT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `delivery_department` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`department_id`),
  CONSTRAINT `fk_material_composition_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_composition_items`
--

LOCK TABLES `material_composition_items` WRITE;
/*!40000 ALTER TABLE `material_composition_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_composition_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_compositions`
--

DROP TABLE IF EXISTS `material_compositions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_compositions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` bigint(20) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `documentary_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`material_id`),
  KEY `index3` (`department_id`),
  CONSTRAINT `fk_material_compositions_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_material_compositions_1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_compositions`
--

LOCK TABLES `material_compositions` WRITE;
/*!40000 ALTER TABLE `material_compositions` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_compositions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_qunits`
--

DROP TABLE IF EXISTS `material_qunits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_qunits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'unit name',
  `code` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_qunits`
--

LOCK TABLES `material_qunits` WRITE;
/*!40000 ALTER TABLE `material_qunits` DISABLE KEYS */;
INSERT INTO `material_qunits` VALUES (1,'1,555 ΓΡΑΜΜ','DW'),(3,'1/16ΤΗΣ ΣΥΓΓΡ=1,771 ΓΡΑΜΜ','DM'),(4,'1/4 ΑΥΤΟΚΡΑΤΟΡΙΚΟΥ ΓΑΛΛΟΝ','QI'),(18,'1/4 ΓΑΛΟΝΙΟΥ','QT'),(20,'1/4 ΠΙΝΤΑΣη118291 ΧΙΛ ΛΙΤ','GI'),(21,'100 ΛΙΒΡΕΣ','HY'),(22,'1000ΑΔΑ','MX'),(23,'10ΑΔΑ','XX'),(24,'15ΑΔΑ','XV'),(25,'2 ΓΑΛΟΝΙΑ (ΜΟΝ ΟΓΚΟΥ ΣΤΕΡ','PE'),(26,'2,240 ΛΙΒΡΕΣ (ΝΑΤΟ)','LM'),(27,'2000 ΛΙΒΡΕΣ','TS'),(28,'20ΑΔΑ','AX'),(29,'250ΑΔΑ','AA'),(30,'25ΑΔΑ','AV'),(31,'2ΑΔΑ','II'),(32,'480 ΣΤΡΕΜΑΤΑ ΓΗΣ','HI'),(33,'4ΑΔΑ','IV'),(34,'5000ΑΔΑ','VM'),(35,'500ΑΔΑ','VC'),(36,'50ΑΔΑ','LL'),(37,'5ΑΔΑ','VX'),(38,'6ΑΔΑ','DH'),(39,'7,92 ΙΝΤΣΕΣ','LK'),(40,'DISPENSER','DI'),(41,'ΑΓΩΓΟΣ ΣΩΛΗΝΑΣ','TU'),(42,'ΑΛΥΣΙΔΑ ΣΕΙΡΑ 66 ΠΟΔΙΑ','KK'),(43,'ΑΠΟΘΕΜΑ ΚΟΠΑΔΙ','SZ'),(44,'ΑΥΤΟΚΡΑΤΟΤΙΚΟ ΓΑΛΛΟΝΙ','GB'),(45,'ΒΑΡΕΛΙ ΒΥΤΙΟ','BL'),(46,'ΒΑΡΕΛΙ ΔΟΧΕΙΟ','KE'),(47,'ΒΑΡΕΛΙ ΚΥΛΙΝ/ΚΟ ΔΟΧ ΤΥΜΠ','DR'),(48,'ΒΑΡΕΛΙ ΤΩΝ 63 ΓΑΛΛΟΝΙΩΝ','HH'),(49,'ΒΙΒΛΙΟ','BK'),(50,'ΒΟΛΙΔΑ ΣΦΑΙΡΑ','SO'),(51,'ΒΥΤΙΟ ΒΑΡΕΛΙ ΚΑΔΟΣ','KS'),(52,'ΓΑΛΛΟΝΙ','GL'),(53,'ΓΑΛΛΟΝΙ ΚΡΑΣΙΟΥ','WG'),(54,'ΓΡΑΜΜΑΡΙΟ','GM'),(55,'ΓΡΑΜΜΙΚΟ ΠΟΔΙ','LF'),(56,'ΓΡΟΣΣΑ (114 ΤΕΜ)','GR'),(57,'ΓΥΑΛΙ','GS'),(58,'ΓΥΑΛΙΝΟ ΔΟΧΕΙΟ','JG'),(59,'ΓΥΑΛΙΝΟ ΔΟΧΕΙΟ (ΜΕΓ ΣΤΟΜ)','JR'),(60,'ΓΥΑΡΔΑ','YD'),(61,'ΔΕΚΑΓΡΑΜΜΟ','DC'),(62,'ΔΕΚΑΤΟ ΤΟΥ ΓΡΑΜΜ','DG'),(63,'ΔΕΚΑΤΟ ΤΟΥ ΛΙΤΡΟΥ','DL'),(64,'ΔΕΚΑΤΟ ΤΟΥ ΜΕΤΡΟΥ','DF'),(65,'ΔΕΜΑ ΚΟΥΤΙ','PZ'),(66,'ΔΕΣΜΙΔΑ ΚΑΡΤΩΝ','DK'),(67,'ΔΕΣΜΙΔΑ ΧΑΡΤΙΟΥ 500 ΦΥΛΛΑ','RM'),(68,'ΔΙΣΚΙΟ ΠΙΝΑΚΙΔΑ','TT'),(69,'ΔΙΣΚΟΣ','TR'),(70,'ΔΙΣΚΟΣ ΠΛΑΚΑ ΦΕΤΑ','SB'),(71,'ΔΟΝΗΤΗΣ','SR'),(72,'ΔΟΧΕΙΟ','CO'),(73,'ΔΟΧΕΙΟ (ΤΕΝΕΚΕΣ)','TL'),(74,'ΔΟΧΕΙΟ ΚΑΔΟΣ','PL'),(75,'ΔΩΔΕΚΑ ΓΡΟΣΙΑ','GG'),(76,'ΔΩΔΕΚΑΔΑ','DZ'),(77,'ΕΚΑΤΟ ΛΙΒΡΕΣ','HP'),(78,'ΕΚΑΤΟ ΠΟΔΙΑ','HF'),(79,'ΕΚΑΤΟ ΤΕΤΡΑΓΩΝΙΚΑ ΠΟΔΙΑ','HS'),(80,'ΕΚΑΤΟ ΥΑΡΔΕΣ','HW'),(81,'ΕΚΑΤΟΣΤΟ ΓΡΑΜΜΑΡΙΟΥ','CG'),(82,'ΕΚΑΤΟΣΤΟ ΜΕΤΡΟΥ','CM'),(83,'ΕΝΑ ΧΙΛΙΟΣΤΟ ΓΡΑΜΜ','MG'),(84,'ΕΝΑ ΧΙΛΙΟΣΤΟ ΜΕΤΡΟΥ','ML'),(85,'ΕΞΟΠΛΙΣΜΟΣ ΕΦΟΔΙΑ ΣΥΝΕΡΓΑ','OT'),(86,'ΕΞΩΤΕΡΙΚΟ ΠΑΚΕΤΟ η ΚΟΥΤΙ','PK'),(87,'ΖΕΥΓΗ','PR'),(88,'ΘΗΚΗ ΠΕΡΙΒΛΗΜΑ','CS'),(89,'ΘΗΚΗ ΦΥΣΙΓΓ (ΓΕΜΙΣΤΗΡΑΣ)','MA'),(90,'ΙΝΤΣΑ','IN'),(91,'ΚΑΔΟΣ','TB'),(92,'ΚΑΘΑΡΟ ΒΑΡΟΣ ΕΝΟΣ ΤΟΝΝΟΥ','MT'),(93,'ΚΑΝΙΣΤΡΟ','CX'),(94,'ΚΑΡΑΤΙΟ','KR'),(95,'ΚΑΡΟΥΛΙ','RL'),(96,'ΚΑΡΟΥΛΙΑ','SL'),(97,'ΚΑΤΟΣΤΑΔΑ','HD'),(98,'ΚΑΨΟΥΛΑ','CP'),(99,'ΚΕΦΑΛΙ','HE'),(100,'ΚΙΒΩΤΙΟ','BX'),(101,'ΚΙΒΩΤΙΟ ΚΟΥΤΙ','CH'),(102,'ΚΙΛΑ','KG'),(103,'ΚΟΙΛΟ ΔΟΧΕΙΟ','FO'),(104,'ΚΟΚΚΟΣ (0,0646 ΓΡΑΜ)','GN'),(105,'ΚΟΝΙΣ','ME'),(106,'ΚΟΥΒΑΡΙ ΚΟΥΚΛΑ ΝΗΜΑΤΟΣ','SK'),(107,'ΚΟΥΚΛΑ ΜΑΛΙΟΥ ΚΟΥΒΑΡΙ','HK'),(108,'ΚΟΧΛΙΑΣ ΜΠΟΥΛΟΝΙ','BO'),(109,'ΚΥΒΙΚΗ ΙΝΤΣΑ','CI'),(110,'ΚΥΒΙΚΗ ΥΑΡΔΑ','CU'),(111,'ΚΥΒΙΚΗ ΥΑΡΔΑ ΚΑΡΤΑ ΝΑΤΟ','CD'),(112,'ΚΥΒΙΚΟ ΕΚΑΤΟΣΤΟ','CC'),(113,'ΚΥΒΙΚΟ ΜΕΤΡΟ','CZ'),(114,'ΚΥΒΙΚΟ ΠΟΔΙ','CF'),(115,'ΚΥΛΙΝΔΡΟΣ','CY'),(116,'ΚΩΝΟΣ','CE'),(117,'ΛΕΠΤΟ ΠΑΡΕΜΒΑΣΜΑ ΓΚΟΦΡΕΤΑ','WF'),(118,'ΛΙΒΡΕΣ','LB'),(119,'ΛΙΤΡΑ ΓΑΛΙΚΗ (ΝΑΤΟ)','LR'),(120,'ΛΙΤΡΟ','LI'),(121,'ΜΑΤΣΟ ΔΕΣΜΗ','BD'),(122,'ΜΕΓΑΛΟ ΔΕΜΑ','BE'),(123,'ΜΕΡΙΔΑ','LO'),(124,'ΜΕΡΙΔΑ (ΝΑΤΟ)','LT'),(125,'ΜΕΡΙΔΑ ΨΩΜΙΟΥ ΖΩΟΤΡΟΦΗ','RΑ'),(126,'ΜΕΤΑΛΛΙΚΟ ΔΟΧΕΙΟ','CN'),(127,'ΜΕΤΡΑ','MR'),(128,'ΜΗΚΟΣ','LG'),(129,'ΜΙΚΡΟΣ ΣΑΚΚΟΣ ΣΑΚΚΙΔΙΟ','PO'),(130,'ΜΙΛΙ','MI'),(131,'ΜΙΣΑ ΓΡΟΣΣΑ (72 ΤΕΜΑΧΙΑ)','HG'),(132,'ΜΙΣΗ ΛΙΒΡΑ','PH'),(133,'ΜΟΝ ΞΥΛΟΥ 12Χ12Χ1 ΙΝ','BF'),(134,'ΜΟΝΑΔΑ','UN'),(135,'ΜΠΟΓΟΣ','BN'),(136,'ΜΠΟΥΚΑΛΑ','FL'),(137,'ΜΠΟΥΣΕΛ ΜΟΝ ΟΓΚΟΥ ΣΤ','BU'),(138,'ΝΤΑΜΙΤΖΑΝΑ ΟΞΕΩΝ','CB'),(139,'ΟΓΚΩΔΕΣ ΤΕΜΑΧΙΟ','BC'),(140,'ΟΜΑΔΑ ΟΜΟΕΙΔΩΝ ΑΝΤ/ΜΕΝΩΝ','BH'),(141,'ΟΥΓΓΙΑ','OZ'),(142,'ΟΥΓΓΙΑ ΤΡΟΥ=31 1 ΓΡΑΜΜΑΡ','TO'),(143,'ΠΑΚΕΤΟ','PG'),(144,'ΠΕΡΙΒΛΗΜΑ','EN'),(145,'ΠΙΝΤΑ 1/8 ΓΑΛ η16 ΥΓΡ ΟΥΓ','PT'),(146,'ΠΛΑΙΣΙΟ ΤΑΜΠΛΩ','PN'),(147,'ΠΛΑΚΑ ΛΑΜΑ ΦΥΛΛΟ','PM'),(148,'ΠΛΑΚΑ ΤΕΜΑΧΙΟ','CK'),(149,'ΠΛΗΡΕΣ ΣΥΓΚΡΟΤΗΜΑ','AY'),(150,'ΠΛΗΡΕΣ ΦΥΣΙΓΓI','RD'),(151,'ΠΛΗΡΕΣ ΦΥΣΙΓΓΙ','CA'),(152,'ΠΛΙΝΘΟΣ ΜΠΡΙΚΕΤΑ','BI'),(153,'ΠΟΔΙΑ','FT'),(154,'ΠΥΡΑΜΙΔΑ','PY'),(155,'ΡΑΒΔΙ','SX'),(156,'ΡΑΒΔΟΣ','BR'),(157,'ΡΟΛΛΟΣ','RO'),(158,'ΣΑΚΚΟΣ','BG'),(159,'ΣΑΚΟΣ','SA'),(160,'ΣΕΙΡΑ','SE'),(161,'ΣΕΙΡΑ ΧΙΤΩΝ ΚΥΛ/ΟΣ ΣΩΛΗΝΑ','SU'),(162,'ΣΠΕΙΡΑ','CL'),(163,'ΣΤΟΙΒΑΔΑ ΣΩΡΟΣ','SS'),(164,'ΣΥΓΚΡΟΤΗΜΑ ΟΜΑΔΑ','GP'),(165,'ΣΥΛΛΟΓΗ','KT'),(166,'ΣΥΛΛΟΓΗ ΣΕΙΡΑ','AT'),(167,'ΣΥΡΙΓΓΑ','SG'),(168,'ΣΦΗΝΑ ΤΑΚΟΣ','SD'),(169,'ΣΧΟΙΝΙ ΣΠΑΓΚΟΣ ΠΥΡΗΝΑΣ','KD'),(170,'ΤΑΙΝΙΑ','TP'),(171,'ΤΑΙΝΙΑ ΛΩΡΙΔΑ','SP'),(172,'ΤΑΙΝΙΑ ΛΩΡΙΔΑ ΚΟΡΔΕΛΑ','RN'),(173,'ΤΕΜΑΧΙΑ','EA'),(174,'ΤΕΜΑΧΙΟ (PIECE)','PC'),(175,'ΤΕΤΡΑΓΩΝΙΚΗ ΙΝΤΣΑ','SI'),(176,'ΤΕΤΡΑΓΩΝΙΚΗ ΥΑΡΔΑ','SY'),(177,'ΤΕΤΡΑΓΩΝΙΚΟ ΜΕΤΡΟ','SM'),(178,'ΤΕΤΡΑΓΩΝΙΚΟ ΠΟΔΙ','SF'),(179,'ΤΕΤΡΑΓΩΝΟΣ ΓΝΩΜΩΝΑΣ','SQ'),(180,'ΤΜΗΜΑ','SC'),(181,'ΤΟΜΟΣ','VO'),(182,'ΤΟΝΝΟΣ 2000 LB','ST'),(183,'ΤΟΝΟΣ','TN'),(184,'ΤΟΠΙ ΜΠΑΛΑ','BA'),(185,'ΤΡΕΧΟΥΣΑ ΥΑΡΔΑ','LY'),(186,'ΦΙΑΛΗ','BT'),(187,'ΦΙΑΛΙΔΙΟ ΑΕΡΟΣΤΑΘΜΗ','VI'),(188,'ΦΛΑΝΤΖΑ ΠΑΡΕΜ ΤΑΜΠΟΝ ΚΟΦ','PD'),(189,'ΦΟΡΙΑΜΟΣ ΥΛΙΚΩΝ','CR'),(190,'ΦΥΛΛΑ','SH'),(191,'ΦΥΛΛΟ','QR'),(192,'ΦΥΣΙΓΓΙ ΑΜΠΟΥΛΑ','AM'),(193,'ΧΑΡΤΙ','PA'),(194,'ΧΑΡΤΟΚΙΒΩΤΙΟ','CT'),(195,'ΧΕΛΩΝΑ ΡΑΒΔΙ (ΜΕΤΑΛΟΥ)','IG'),(196,'ΧΙΛΙΑ ΒΑΡΕΛΙΑ','MD'),(197,'ΧΙΛΙΑ ΚΥΒΙΚΑ ΠΟΔΙΑ','MC'),(198,'ΧΙΛΙΑ ΠΟΔΙΑ','MF'),(199,'ΧΙΛΙΟΜΕΤΡΟ','KM'),(200,'ΧΙΛΙΟΣΤΟ','MM'),(201,'ΧΙΤΩΝΙΟ ΚΥΛ/ΟΥ ΣΩΛ ΣΥΝ/ΩΣ','SV');
/*!40000 ALTER TABLE `material_qunits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `am` bigint(20) unsigned NOT NULL COMMENT 'Αριθμός μερίδας',
  `portion_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0 => material without portion, ',
  `description` varchar(255) NOT NULL,
  `comment` text,
  `nominal_number` varchar(255) NOT NULL COMMENT 'αριθμός ονομαστικού',
  `code` varchar(20) NOT NULL COMMENT 'αριθμος κώδικα',
  `category` int(10) unsigned NOT NULL,
  `quantity_unit` int(10) unsigned NOT NULL COMMENT 'μονάδα μέτρησης',
  `quantity` decimal(6,0) unsigned NOT NULL DEFAULT '0' COMMENT 'current quantity',
  `quantity_last_year` decimal(6,0) unsigned NOT NULL DEFAULT '0' COMMENT 'ποσότητα κατα την τελευταία απογραφή',
  `quantity_prov` decimal(6,0) unsigned NOT NULL DEFAULT '0' COMMENT 'quantity that we must have (provlepomeni)',
  `charged` decimal(6,0) unsigned NOT NULL DEFAULT '0' COMMENT 'χρεωμένα',
  `quantity_diff` decimal(6,0) NOT NULL DEFAULT '0' COMMENT 'diff = quantity - xreomena. => (+ πλεόνασμα, - έλειμα)',
  `major` text COMMENT 'μείζον',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `collection` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'σύνθεση ή μεμονομένο υλικό',
  `controlled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'ελεγχόμενο',
  `attractive` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'ελκυστικό',
  `ammunition_baseload` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'πυρομαχικά βασικών φόρτων',
  `ammunition_ekp` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'πυρομαχικά εκπ',
  `task_completion` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'αποστολή συμπληρώσεως',
  `weapon` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 => material without portion,',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  UNIQUE KEY `am_UNIQUE` (`am`),
  KEY `status_index` (`status`),
  KEY `category_index` (`category`),
  KEY `unit_index` (`quantity_unit`),
  KEY `portion_type_INDEX` (`portion_type`),
  CONSTRAINT `fk_materials_1` FOREIGN KEY (`category`) REFERENCES `material_categories` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_materials_2` FOREIGN KEY (`quantity_unit`) REFERENCES `material_qunits` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (1,111,1,'111','','111','111',1,1,2,0,2,1,0,'111',0.00,1,1,0,0,0,0,0,'0'),(3,2222,1,'2222','','2222','2222',3,1,1,1,1,1,0,'2222',1.00,0,0,0,0,0,0,0,'0'),(4,1111111,1,'portion-1','','portion-1','0',1,1,1,0,1,0,1,'',0.00,0,0,0,0,0,0,0,'0'),(6,12345,1,'no.portion-1','','no.portion-1','no.portion-1',5,18,1,0,1,0,1,'',0.00,0,0,0,0,0,0,0,'0'),(7,12125,1,'aaaa','','aaa','',1,1,0,0,0,0,0,'',0.00,0,0,0,0,0,0,0,'0'),(8,0,1,'bbb','','bbb','bbb',9,24,0,0,0,0,0,'',0.00,0,0,0,0,0,0,0,'0');
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials_unsorted`
--

DROP TABLE IF EXISTS `materials_unsorted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materials_unsorted` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `comment` text,
  `nominal_number` varchar(255) NOT NULL COMMENT 'αριθμός ονομαστικού',
  `code` bigint(20) NOT NULL COMMENT 'αριθμος κώδικα',
  `category` int(10) unsigned NOT NULL,
  `quantity_unit` int(10) unsigned NOT NULL COMMENT 'μονάδα μέτρησης',
  `quantity` decimal(6,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'current quantity',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `category_index` (`category`),
  KEY `unit_index` (`quantity_unit`),
  CONSTRAINT `fk_materials_unsorted_1` FOREIGN KEY (`category`) REFERENCES `material_categories` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_materials_unsorted_2` FOREIGN KEY (`quantity_unit`) REFERENCES `material_qunits` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials_unsorted`
--

LOCK TABLES `materials_unsorted` WRITE;
/*!40000 ALTER TABLE `materials_unsorted` DISABLE KEYS */;
/*!40000 ALTER TABLE `materials_unsorted` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_department`
--

DROP TABLE IF EXISTS `my_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `abbreviation` varchar(255) DEFAULT NULL COMMENT 'συντόμογραφία',
  `administration` varchar(255) DEFAULT NULL COMMENT 'διαχείρηση',
  `administration_abbreviation` varchar(255) DEFAULT NULL COMMENT 'συντομογραφία διαχείρησης',
  `formation` varchar(255) DEFAULT NULL COMMENT 'σχηματισμός',
  `code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `code_completion` varchar(255) DEFAULT NULL COMMENT 'κωδικός αποστολή συμπληρώσεως',
  `ea` varchar(255) DEFAULT NULL COMMENT 'επιστρατευούσα άρχη',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_department`
--

LOCK TABLES `my_department` WRITE;
/*!40000 ALTER TABLE `my_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(64) NOT NULL,
  `type` enum('officer','admin') NOT NULL,
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'devel_yii'
--

--
-- Dumping routines for database 'devel_yii'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-30 13:27:22
