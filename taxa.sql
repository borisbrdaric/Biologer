LOCK TABLES `taxa` WRITE;
/*!40000 ALTER TABLE `taxa` DISABLE KEYS */;
INSERT INTO `taxa` VALUES (1,NULL,'Animalia',NULL,70,NULL,NULL,0,'2017-11-12 12:04:11','2017-11-12 12:04:11'),(2,1,'Chordata','1',60,NULL,NULL,0,'2017-11-12 12:06:04','2017-11-12 12:06:04'),(3,1,'Arthropoda','1',60,NULL,NULL,0,'2017-11-12 12:06:24','2017-11-12 12:06:24'),(4,2,'Reptilia','1/2',50,NULL,NULL,0,'2017-11-12 12:07:36','2017-11-12 12:07:36'),(5,2,'Amphibia','1/2',50,NULL,NULL,0,'2017-11-12 12:08:28','2017-11-12 12:08:28'),(6,4,'Squamata','1/2/4',40,NULL,NULL,0,'2017-11-12 12:10:02','2017-11-12 12:10:02'),(7,4,'Testudines','1/2/4',40,NULL,NULL,0,'2017-11-12 12:15:03','2017-11-12 12:15:03'),(8,5,'Anura','1/2/5',40,NULL,NULL,0,'2017-11-12 12:15:36','2017-11-12 12:15:36'),(9,5,'Caudata','1/2/5',40,NULL,NULL,0,'2017-11-12 12:15:58','2017-11-12 12:15:58'),(10,6,'Anguidae','1/2/4/6',30,NULL,NULL,0,'2017-11-12 12:20:09','2017-11-12 12:20:09'),(11,6,'Colubridae','1/2/4/6',30,NULL,NULL,0,'2017-11-12 12:20:46','2017-11-12 12:20:46'),(12,6,'Gekkonidae','1/2/4/6',30,NULL,NULL,0,'2017-11-12 12:21:30','2017-11-12 12:21:30'),(13,6,'Lacertidae','1/2/4/6',30,NULL,NULL,0,'2017-11-12 12:21:59','2017-11-12 12:21:59'),(14,6,'Scincidae','1/2/4/6',30,NULL,NULL,0,'2017-11-12 12:23:16','2017-11-12 12:23:16'),(15,8,'Bombinatoridae','1/2/5/8',30,NULL,NULL,0,'2017-11-12 12:24:03','2017-11-12 12:24:03'),(16,8,'Bufonidae','1/2/5/8',30,NULL,NULL,0,'2017-11-12 12:24:22','2017-11-12 12:24:22'),(17,8,'Hylidae','1/2/5/8',30,NULL,NULL,0,'2017-11-12 12:24:50','2017-11-12 12:24:50'),(18,7,'Emydidae','1/2/4/7',30,NULL,NULL,0,'2017-11-12 12:25:06','2017-11-12 12:25:06'),(19,7,'Testudinidae','1/2/4/7',30,NULL,NULL,0,'2017-11-12 12:25:34','2017-11-12 12:25:34'),(20,6,'Viperidae','1/2/4/6',30,NULL,NULL,0,'2017-11-12 12:25:53','2017-11-12 12:25:53'),(21,8,'Pelobatidae','1/2/5/8',30,NULL,NULL,0,'2017-11-12 12:26:18','2017-11-12 12:26:18'),(22,8,'Ranidae','1/2/5/8',30,NULL,NULL,0,'2017-11-12 12:26:44','2017-11-12 12:26:44'),(23,9,'Salamandridae','1/2/5/9',30,NULL,NULL,0,'2017-11-12 12:27:08','2017-11-12 12:27:08'),(24,10,'Anguis','1/2/4/6/10',20,NULL,NULL,0,'2017-11-12 12:27:30','2017-11-12 12:27:30'),(25,15,'Bombina','1/2/5/8/15',20,NULL,NULL,0,'2017-11-12 12:27:48','2017-11-12 12:27:48'),(26,16,'Bufo','1/2/5/8/16',20,NULL,NULL,0,'2017-11-12 12:28:02','2017-11-12 12:28:02'),(27,16,'Pseudepidalea','1/2/5/8/16',20,NULL,NULL,0,'2017-11-12 12:28:29','2017-11-12 12:28:29'),(28,11,'Coronella','1/2/4/6/11',20,NULL,NULL,0,'2017-11-12 12:28:51','2017-11-12 12:28:51'),(29,11,'Dolichophis','1/2/4/6/11',20,NULL,NULL,0,'2017-11-12 12:29:20','2017-11-12 12:29:20'),(30,11,'Elaphe','1/2/4/6/11',20,NULL,NULL,0,'2017-11-12 12:29:39','2017-11-12 12:29:39'),(31,11,'Natrix','1/2/4/6/11',20,NULL,NULL,0,'2017-11-12 12:29:53','2017-11-12 12:29:53'),(32,11,'Platyceps','1/2/4/6/11',20,NULL,NULL,0,'2017-11-12 12:30:06','2017-11-12 12:30:06'),(33,11,'Zamenis','1/2/4/6/11',20,NULL,NULL,0,'2017-11-12 12:30:20','2017-11-12 12:30:20'),(34,18,'Emys','1/2/4/7/18',20,NULL,NULL,0,'2017-11-12 12:30:38','2017-11-12 12:30:38'),(35,18,'Trachemys','1/2/4/7/18',20,NULL,NULL,0,'2017-11-12 12:30:56','2017-11-12 12:30:56'),(36,12,'Cyrtopodion','1/2/4/6/12',20,NULL,NULL,0,'2017-11-12 12:31:14','2017-11-12 12:31:14'),(37,17,'Hyla','1/2/5/8/17',20,NULL,NULL,0,'2017-11-12 12:31:39','2017-11-12 12:31:39'),(38,13,'Algyroides','1/2/4/6/13',20,NULL,NULL,0,'2017-11-12 12:31:52','2017-11-12 12:31:52'),(39,13,'Darevskia','1/2/4/6/13',20,NULL,NULL,0,'2017-11-12 12:32:10','2017-11-12 12:32:10'),(40,13,'Lacerta','1/2/4/6/13',20,NULL,NULL,0,'2017-11-12 12:32:27','2017-11-12 12:32:27'),(41,13,'Podarcis','1/2/4/6/13',20,NULL,NULL,0,'2017-11-12 12:32:41','2017-11-12 12:32:41'),(42,13,'Zootoca','1/2/4/6/13',20,NULL,NULL,0,'2017-11-12 12:32:55','2017-11-12 12:32:55'),(43,21,'Pelobates','1/2/5/8/21',20,NULL,NULL,0,'2017-11-12 12:33:13','2017-11-12 12:33:13'),(44,22,'Pelophylax','1/2/5/8/22',20,NULL,NULL,0,'2017-11-12 12:33:40','2017-11-12 12:33:40'),(45,22,'Rana','1/2/5/8/22',20,NULL,NULL,0,'2017-11-12 12:33:56','2017-11-12 12:33:56'),(46,23,'Lissotriton','1/2/5/9/23',20,NULL,NULL,0,'2017-11-12 12:34:15','2017-11-12 12:34:15'),(47,23,'Mesotriton','1/2/5/9/23',20,NULL,NULL,0,'2017-11-12 12:34:38','2017-11-12 12:34:38'),(48,23,'Salamandra','1/2/5/9/23',20,NULL,NULL,0,'2017-11-12 12:34:52','2017-11-12 12:34:52'),(49,23,'Triturus','1/2/5/9/23',20,NULL,NULL,0,'2017-11-12 12:35:45','2017-11-12 12:35:45'),(50,14,'Ablepharus','1/2/4/6/14',20,NULL,NULL,0,'2017-11-12 12:35:58','2017-11-12 12:35:58'),(51,19,'Testudo','1/2/4/7/19',20,NULL,NULL,0,'2017-11-12 12:36:15','2017-11-12 12:36:15'),(52,20,'Vipera','1/2/4/6/20',20,NULL,NULL,0,'2017-11-12 12:36:31','2017-11-12 12:36:31'),(53,24,'Anguis fragilis','1/2/4/6/10/24',10,NULL,NULL,0,'2017-11-12 12:36:53','2017-11-12 12:37:10'),(54,25,'Bombina bombina','1/2/5/8/15/25',10,NULL,NULL,0,'2017-11-12 12:37:35','2017-11-12 12:37:35'),(55,25,'Bombina variegata','1/2/5/8/15/25',10,NULL,NULL,0,'2017-11-12 12:37:50','2017-11-12 12:37:50'),(56,26,'Bufo bufo','1/2/5/8/16/26',10,NULL,NULL,0,'2017-11-12 12:38:08','2017-11-12 12:38:08'),(57,27,'Pseudepidalea viridis','1/2/5/8/16/27',10,NULL,NULL,0,'2017-11-12 12:38:46','2017-11-12 12:38:46'),(58,28,'Coronella austriaca','1/2/4/6/11/28',10,NULL,NULL,0,'2017-11-12 12:39:03','2017-11-12 12:39:03'),(59,29,'Dolichophis caspius','1/2/4/6/11/29',10,NULL,NULL,0,'2017-11-12 12:55:02','2017-11-12 12:55:02'),(60,30,'Elaphe quatuorlineata','1/2/4/6/11/30',10,NULL,NULL,0,'2017-11-12 12:55:18','2017-11-12 12:55:18'),(61,31,'Natrix natrix','1/2/4/6/11/31',10,NULL,NULL,0,'2017-11-12 12:55:33','2017-11-12 12:55:33'),(62,31,'Natrix tessellata','1/2/4/6/11/31',10,NULL,NULL,0,'2017-11-12 12:56:26','2017-11-12 12:56:26'),(63,32,'Platyceps najadum','1/2/4/6/11/32',10,NULL,NULL,0,'2017-11-12 12:56:57','2017-11-12 12:56:57'),(64,33,'Zamenis longissimus','1/2/4/6/11/33',10,NULL,NULL,0,'2017-11-12 12:57:29','2017-11-12 12:57:29'),(65,34,'Emys orbicularis','1/2/4/7/18/34',10,NULL,NULL,0,'2017-11-12 12:57:44','2017-11-12 12:57:44'),(66,35,'Trachemys scripta','1/2/4/7/18/35',10,NULL,NULL,0,'2017-11-12 12:57:58','2017-11-12 12:57:58'),(67,66,'Trachemys scripta elegans','1/2/4/7/18/35/66',5,NULL,NULL,0,'2017-11-12 12:58:23','2017-11-12 12:58:23'),(68,36,'Cyrtopodion kotschyi','1/2/4/6/12/36',10,NULL,NULL,0,'2017-11-12 12:58:54','2017-11-12 12:58:54'),(69,37,'Hyla arborea','1/2/5/8/17/37',10,NULL,NULL,0,'2017-11-12 12:59:06','2017-11-12 12:59:06'),(70,38,'Algyroides nigropunctatus','1/2/4/6/13/38',10,NULL,NULL,0,'2017-11-12 12:59:21','2017-11-12 12:59:21'),(71,39,'Darevskia praticola','1/2/4/6/13/39',10,NULL,NULL,0,'2017-11-12 12:59:36','2017-11-12 12:59:36'),(72,40,'Lacerta agilis','1/2/4/6/13/40',10,NULL,NULL,0,'2017-11-12 12:59:46','2017-11-12 12:59:46'),(73,40,'Lacerta trilineata','1/2/4/6/13/40',10,NULL,NULL,0,'2017-11-12 12:59:58','2017-11-12 12:59:58'),(74,40,'Lacerta viridis','1/2/4/6/13/40',10,NULL,NULL,0,'2017-11-12 13:00:14','2017-11-12 13:00:14'),(75,41,'Podarcis erhardii','1/2/4/6/13/41',10,NULL,NULL,0,'2017-11-12 13:00:35','2017-11-12 13:00:35'),(76,41,'Podarcis muralis','1/2/4/6/13/41',10,NULL,NULL,0,'2017-11-12 13:00:47','2017-11-12 13:00:47'),(77,41,'Podarcis tauricus','1/2/4/6/13/41',10,NULL,NULL,0,'2017-11-12 13:01:00','2017-11-12 13:01:00'),(78,42,'Zootoca vivipara','1/2/4/6/13/42',10,NULL,NULL,0,'2017-11-12 13:01:15','2017-11-12 13:01:15'),(79,43,'Pelobates fuscus','1/2/5/8/21/43',10,NULL,NULL,0,'2017-11-12 13:01:28','2017-11-12 13:01:28'),(80,43,'Pelobates syriacus','1/2/5/8/21/43',10,NULL,NULL,0,'2017-11-12 13:01:45','2017-11-12 13:01:45'),(81,44,'Pelophylax esculentus','1/2/5/8/22/44',10,NULL,NULL,0,'2017-11-12 13:02:01','2017-11-12 13:02:01'),(82,44,'Pelophylax lessonae','1/2/5/8/22/44',10,NULL,NULL,0,'2017-11-12 13:02:15','2017-11-12 13:02:15'),(83,44,'Pelophylax ridibundus','1/2/5/8/22/44',10,NULL,NULL,0,'2017-11-12 13:02:36','2017-11-12 13:02:36'),(84,45,'Rana dalmatina','1/2/5/8/22/45',10,NULL,NULL,0,'2017-11-12 13:02:54','2017-11-12 13:02:54'),(85,45,'Rana graeca','1/2/5/8/22/45',10,NULL,NULL,0,'2017-11-12 13:03:05','2017-11-12 13:03:05'),(86,45,'Rana temporaria','1/2/5/8/22/45',10,NULL,NULL,0,'2017-11-12 13:03:18','2017-11-12 13:03:18'),(87,46,'Lissotriton vulgaris','1/2/5/9/23/46',10,NULL,NULL,0,'2017-11-12 13:04:04','2017-11-12 13:04:04'),(88,47,'Mesotriton alpestris','1/2/5/9/23/47',10,NULL,NULL,0,'2017-11-12 13:04:16','2017-11-12 13:04:16'),(89,48,'Salamandra atra','1/2/5/9/23/48',10,NULL,NULL,0,'2017-11-12 13:04:29','2017-11-12 13:04:29'),(90,48,'Salamandra salamandra','1/2/5/9/23/48',10,NULL,NULL,0,'2017-11-12 13:04:40','2017-11-12 13:04:40'),(91,49,'Triturus carnifex','1/2/5/9/23/49',10,NULL,NULL,0,'2017-11-12 13:04:52','2017-11-12 13:04:52'),(92,49,'Triturus cristatus','1/2/5/9/23/49',10,NULL,NULL,0,'2017-11-12 13:05:05','2017-11-12 13:05:05'),(93,49,'Triturus dobrogicus','1/2/5/9/23/49',10,NULL,NULL,0,'2017-11-12 13:05:18','2017-11-12 13:05:18'),(94,49,'Triturus karelinii','1/2/5/9/23/49',10,NULL,NULL,0,'2017-11-12 13:05:29','2017-11-12 13:05:29'),(95,50,'Ablepharus kitaibelii','1/2/4/6/14/50',10,NULL,NULL,0,'2017-11-12 13:05:45','2017-11-12 13:05:45'),(96,51,'Testudo graeca','1/2/4/7/19/51',10,NULL,NULL,0,'2017-11-12 13:05:57','2017-11-12 13:05:57'),(97,51,'Testudo hermanni','1/2/4/7/19/51',10,NULL,NULL,0,'2017-11-12 13:06:09','2017-11-12 13:06:09'),(98,52,'Vipera ammodytes','1/2/4/6/20/52',10,NULL,NULL,0,'2017-11-12 13:06:21','2017-11-12 13:06:21'),(99,52,'Vipera berus','1/2/4/6/20/52',10,NULL,NULL,0,'2017-11-12 13:06:35','2017-11-12 13:06:35'),(100,52,'Vipera ursinii','1/2/4/6/20/52',10,NULL,NULL,0,'2017-11-12 13:06:49','2017-11-12 13:06:49');
/*!40000 ALTER TABLE `taxa` ENABLE KEYS */;
UNLOCK TABLES;
