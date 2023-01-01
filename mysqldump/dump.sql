-- MariaDB dump 10.19  Distrib 10.8.4-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: connect_with_us
-- ------------------------------------------------------
-- Server version	10.8.4-MariaDB

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
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_link` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_news` enum('no','yes') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES
(1,'Optimus','Prime','OPrime@gmail.com','m','q','It will be easier to leave the site and use the services of competitors.','img/1.jpg','no'),
(2,'Ethan','Hunt','Hunter73@mail.ru','m','c','It is, undoubtedly, the most famous website for studying programming.','img/2.jpg','yes'),
(3,'Katniss','Everdeen','district9@gmail.com','f','o','Теперь необязательно заходить на официальный сайт.','img/3.jpg','no'),
(4,'Ellen','Ripley','aliensDie@yandex.ru','f','o','Этот сайт имеет репутацию лучшего интернет источника медицинской информации.','img/4.jpg','no'),
(5,'Tony','Montana','onelove@gmail.com','m','q','Рекомендую данный сайт для юридической помощи.','img/5.jpg','yes'),
(6,'Harry','Potter','expelliarmus@mail.ru','m','c','Во-первых, хочу поблагодарить за очень информативный сайт.','img/6.jpg','no'),
(7,'Sarah','Connor','allbeback@gmail.com','f','s','After all, an absolutely normal form of an online dialogue was suggested.','img/7.jpg','yes'),
(8,'Han','Solo','SoloHan@mail.ru','m','s','Это очень красивый сайт, радующий глаз и слух.','img/pic7.jpg','no'),
(9,'James','Bond','mynumber007@gmail.com','m','o','Having a pretty website isnt everything.','img/pic17.jpg','yes'),
(10,'Indiana','Jones','Jones2023@gmail.com','m','s','Static and boring sites belong to the past, advanced users want interactivity.','img/pic27.jpg','yes'),
(11,'Ezio','Auditore','Auditore23@yandex.ru','m','c','Я хочу, чтобы мой сайт отличался от их скучных сайтов','img/pic37.jpg','yes'),
(12,'Nathan','Drake','DrakeUnch@gmail.com','m','q','Вам не надоели скучные сайты и стандартные лендинги?','img/pic47.jpg','no'),
(13,'Gordon','Freeman','stemvalve@gmail.com','m','o','Помните, что вы не обязаны предоставлять личные данные посредством контактной формы сайта.','img/pic57.jpg','yes'),
(14,'Sarah','Kerrigan','KerriganS@mail.ru','f','s','The registration button on will redirect you to the registration form on the site','img/pic67.jpg','no');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES
(1,'Optimus','Prime','OPrime@gmail.com','m','$2y$10$TZrUk6xyMSdzH45wfP1Cz.O/ziwC1QpBXxQeEj7obo6rOpl.8CHKO'),
(2,'Ethan','Hunt','Hunter73@mail.ru','m','$2y$10$xw2Doxpu0IVwxsyjxsskQeLVNFifI09DL0y/OsEDOH5Gr/KGeUunm'),
(3,'Katniss','Everdeen','district9@gmail.com','f','$2y$10$u2e6mc6h3qMIZcJSbWVKFeTKmncE274aWafYwAmAhxsU5YjsqnIAm'),
(4,'Ellen','Ripley','aliensDie@yandex.ru','f','$2y$10$4HTBZMk5YloHSAuvnkLBGOcsxGsmbaQOUWCDujTGfqOVNz6bq2Rfu'),
(5,'Tony','Montana','onelove@gmail.com','m','$2y$10$cwZDVbmxTdYOZ8PRvy7PZuNB6dfkJNEN95TgnODOAnGanzM7F1J66'),
(6,'Harry','Potter','expelliarmus@mail.ru','m','$2y$10$FHSxhWu2AeaeE9Wo4qBrd.vnuAyMvNK91wv1eVKdGDTdmKdoM46G6'),
(7,'Sarah','Connor','allbeback@gmail.com','f','$2y$10$D5I7HytE/ST5Kns2LlhQ9u7JziVNL6ali2MFxHYFpElgUqCxvL4A2');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `gender_id` enum('m','f') COLLATE utf8mb4_unicode_ci DEFAULT 'm',
  `gen` enum('Мужской','Женский') COLLATE utf8mb4_unicode_ci DEFAULT 'Мужской'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES
('m','Мужской'),
('f','Женский');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_apply`
--

DROP TABLE IF EXISTS `type_apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_apply` (
  `apply_id` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_apply`
--

LOCK TABLES `type_apply` WRITE;
/*!40000 ALTER TABLE `type_apply` DISABLE KEYS */;
INSERT INTO `type_apply` VALUES
('q','Вопрос'),
('c','Жалоба'),
('s','Предложение'),
('o','Другое');
/*!40000 ALTER TABLE `type_apply` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-11 17:28:23
