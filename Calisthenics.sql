-- Progettazione Web 
DROP DATABASE if exists Calisthenics; 
CREATE DATABASE Calisthenics; 
USE Calisthenics; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: Calisthenics
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
-- Table structure for table `argomento`
--

DROP TABLE IF EXISTS `argomento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `argomento` (
  `Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `IdCategoria` int(8) NOT NULL,
  `Argomento` text NOT NULL,
  `Data` datetime NOT NULL,
  `User` int(8) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `argomento`
--

LOCK TABLES `argomento` WRITE;
/*!40000 ALTER TABLE `argomento` DISABLE KEYS */;
INSERT INTO `argomento` VALUES (3,2,'quali sono i migliori esercizi per aumentare il volume muscolare?','2018-12-05 19:36:17',1),(4,3,'Esercizi per fare definizione','2018-12-09 10:37:27',1),(6,1,'Dimagrire','2019-09-20 09:22:50',1),(7,1,'Dieta Salutare','2019-09-20 09:23:01',1),(8,4,'Consigli per non andare in sovrallenamento?','2019-09-20 09:41:41',1),(9,5,'consigli per aquisto del trx','2019-09-20 09:45:04',1),(10,6,'Esercizi di stretching','2019-09-20 09:48:05',1);
/*!40000 ALTER TABLE `argomento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `Id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `Descrizione` varchar(250) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Nome` (`Nome`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Alimentazione','Consigli alimentari'),(2,'Massa','Ingrossare'),(3,'Definizione','Scolpirsi'),(4,'Riposo','Riposare'),(5,'Trx','Disciplina del trx, come allenarsi al meglio                        '),(6,'Stretching','Come migliorare la propria flessibilitÃ ');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corsi`
--

DROP TABLE IF EXISTS `corsi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corsi` (
  `Id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` text NOT NULL,
  `PostiDisponibili` int(11) NOT NULL DEFAULT '30',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corsi`
--

LOCK TABLES `corsi` WRITE;
/*!40000 ALTER TABLE `corsi` DISABLE KEYS */;
INSERT INTO `corsi` VALUES (1,'Calisthenics',1),(2,'Stretching',30),(3,'Trx',30);
/*!40000 ALTER TABLE `corsi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `Contenuto` text NOT NULL,
  `Data` datetime NOT NULL,
  `IdArgomento` int(5) unsigned NOT NULL,
  `User` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (15,'Sapreste darmi qualche consiglio su alcuni esercizi per aumentare la massa muscolare?','2018-12-05 19:37:02',3,'Geghi'),(16,'Non esiste un esercizio migliore di un altro, per aumentare la massa muscolare devi effettuare le ripetizioni dei vari esercizi in un range da 8 a 12 ma ancora piÃ¹ importante devi andare in surplus calorico, ovvero, assumere piÃ¹ kcalorie di quelle richieste dal tuo fabbisogno giornaliero','2018-12-05 19:39:15',3,'geghina'),(24,'Di quanto devo aumentare le calorie piÃ¹ o meno?','2019-09-02 11:53:43',3,'geghina'),(26,'Come faccio a dimagrire?','2019-09-20 09:24:17',6,'Geghi'),(27,'io sconsiglio di contare le calorie assunte giornalmente, piuttosto cerca di mangiare cibi sani, non saltare i pasti e mangia tanta frutta e verdura. il tutto ovviamente accompagnato da un\'attivitÃ  fisica almeno 2-3 volte a settimana','2019-09-20 09:26:07',6,'Geghi'),(28,'perfetto grazie mille per il consiglio, proverÃ²!','2019-09-20 09:26:26',6,'Geghi'),(29,'Salve, da poco ho iniziato a seguire una dieta sana e mi trovo bene per quanto riguarda pranzi e cene, il mio problema Ã¨ la colazione, ho sempre mangiato biscotti fin da bambino e non saprei con cosa sostituirli, qualche consiglio?','2019-09-20 09:28:27',7,'Geghi'),(30,'Molti atleti a colazione mangiano 2-3 uova ( dipende se sono nel periodo di massa o definizione ) io personalmente le consiglio ma riconosco che molti si lamentano delle uova per l\'elevato contenuto di colesterolo. comunque recenti studi hanno confermato che non aumentano la quantitÃ  di colesterolo nel sangue e la maggior parte dei medici le consigliano. altrimenti una tazza di latte con cereali va piu che bene ( a patto che abbiano una quantitÃ  limitata di zuccheri ) \r\nspero di esserti stato di aiuto ! \r\n','2019-09-20 09:30:54',7,'Geghi'),(31,'Grazie mille, proverÃ² con latte e cereali ma nel frattempo mi informo anche sulle uova ','2019-09-20 09:31:50',7,'Geghi'),(32,'Se non riesci a riempirti con una tazza di latte e cereali puoi sempre aggiungere della frutta, quella non fa mai male ','2019-09-20 09:32:39',7,'Geghi'),(33,'sisi certo, di frutta ne mangio in abbondanza!\r\ngrazie ancora a tutti','2019-09-20 09:33:00',7,'Geghi'),(34,'Io direi 300-500 calorie ','2019-09-20 09:34:09',3,'Geghi'),(35,'non esagerare altrimenti i muscoli non riuscirebbero a sfruttare il surplus calorico e di conseguenza andrebbe a finire nei grassi. Una parte ci andrÃ  comunque ma in quantitÃ  limitata, per questo dopo il periodo di massa segue un periodo di definizione ','2019-09-20 09:35:37',3,'Geghi'),(36,'Qualche esercizio per fare definizione muscolare?','2019-09-20 09:36:23',4,'Geghi'),(37,'Come sempre non c\'Ã¨ un esercizio preciso, comunque in generale qualsiasi esercizio di cardio va benissimo ( es. corsa, burpees, mountain climber ecc. ) nel caso tu voglia allenarti con i pesi basta diminuire il peso ed aumentare le ripetizioni. ad esempio se di solito fai curl con manubri 15kg x 5 ripetizioni puoi diminuire a 8kg il peso e fare dalle 15 alle 20 ripetizioni, cerca di stare sopra le 12 ripetizioni comunque!','2019-09-20 09:38:40',4,'Geghi'),(38,'altrimenti fai esercizi a tempo, metti un peso che riesci a mantenere per circa 30-60 secondi e ripeti piu volte l\'esercizio ( dalle 3 alle 5 ) con 30-60 secondi di recupero','2019-09-20 09:40:10',4,'Geghi'),(39,'Ho sentito parlare molto ultimamente di questo argomento e volevo sapere se c\'Ã¨ qualche precauzione particolare da prendere per evitarlo\r\n','2019-09-20 09:42:16',8,'geghina'),(40,'si ultimamente se ne parla molto ma secondo me la cosa Ã¨ ingigantita, ovvero, si esiste il sovrallenamento ma una persona che si allena 3-4 volte a settimana per 1 ora e 30 a seduta Ã¨ difficile se non impossibile arrivare al sovrallenamento. Ã¨ un problema che fa riferimento agli atleti professionisti che si allenano 4-6 ore al giorno 6 giorni su 7. quindi vai tranquillo e continua ad allenarti senza problemi ;) ','2019-09-20 09:44:33',8,'geghina'),(41,'Salve, da poco mi sono interessato all\'utilizzo del trx, ma quale dovrei comprare? ce ne sono svariati tipi su internet e non so le differenze','2019-09-20 09:45:48',9,'geghina'),(42,'Soprattutto per gli inizi ti consiglio di comprarne uno da decathlon , Ã¨ il piÃ¹ economico e per il suo utilizzo Ã¨ perfetto, non ti serve nulla di piÃ¹ e nulla di meno. visto che sei agli inizi se poi non dovesse piacerti almeno hai sprecato pochi soldi. io uso quello da anni e lo consiglio vivamente, mai avuto problemi','2019-09-20 09:47:08',9,'geghina'),(43,'Confermo! anche io utilizzo lo stesso e mi trovo benissimo, lo stesso vale per molti miei amici','2019-09-20 09:47:29',9,'geghina'),(44,'Non riesco a toccarmi le punte dei piedi con le gambe tese, qualche consiglio ?','2019-09-20 09:48:36',10,'geghina'),(45,'continua a cercare di toccare le punte, se non ci arrivi non c\'Ã¨ problema , mantieni la posizione per 30-60 secondi e man mano che vai avanti migliorerai. abbi pazienza perche lo stretching Ã¨ un percorso lungo , i risultati si vedono dopo mesi , non settimane !','2019-09-20 09:50:02',10,'geghina');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utente`
--

DROP TABLE IF EXISTS `utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utente` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Peso` float DEFAULT NULL,
  `Altezza` int(3) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utente`
--

LOCK TABLES `utente` WRITE;
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
INSERT INTO `utente` VALUES ('Geghi','$2y$10$c1hboJ6u2i70JcrnnHm4Z.LOTHl9qfxB8pZK3EU6gYWSR.lEERt16','Giacomo','Mantovani','gia.mantovani@live.it','Maschio.png',78,181,1),('geghina','$2y$10$H948I8zbBaerXJsVDwShlO3W/jjYbVhNxnxDmVF1EvkNXjWcgX.nS','Martina ','Giambelluca','martinagiambelluca@live.it','female.jpg',45,156,0);
/*!40000 ALTER TABLE `utente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utentecorso`
--

DROP TABLE IF EXISTS `utentecorso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utentecorso` (
  `User` varchar(30) NOT NULL,
  `IdCorso` int(5) unsigned NOT NULL,
  PRIMARY KEY (`User`,`IdCorso`),
  KEY `IdCorso` (`IdCorso`),
  CONSTRAINT `utentecorso_ibfk_1` FOREIGN KEY (`User`) REFERENCES `utente` (`Username`),
  CONSTRAINT `utentecorso_ibfk_2` FOREIGN KEY (`IdCorso`) REFERENCES `corsi` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utentecorso`
--

LOCK TABLES `utentecorso` WRITE;
/*!40000 ALTER TABLE `utentecorso` DISABLE KEYS */;
INSERT INTO `utentecorso` VALUES ('Geghi',1),('Geghi',2),('geghina',2),('Geghi',3),('geghina',3);
/*!40000 ALTER TABLE `utentecorso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utentepost`
--

DROP TABLE IF EXISTS `utentepost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utentepost` (
  `User` varchar(30) NOT NULL,
  `IdPost` int(8) unsigned NOT NULL,
  `MiPiace` int(1) unsigned DEFAULT NULL,
  `NonMiPiace` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`User`,`IdPost`),
  KEY `IdPost` (`IdPost`),
  CONSTRAINT `utentepost_ibfk_1` FOREIGN KEY (`User`) REFERENCES `utente` (`Username`),
  CONSTRAINT `utentepost_ibfk_2` FOREIGN KEY (`IdPost`) REFERENCES `post` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utentepost`
--

LOCK TABLES `utentepost` WRITE;
/*!40000 ALTER TABLE `utentepost` DISABLE KEYS */;
INSERT INTO `utentepost` VALUES ('Geghi',15,0,0),('Geghi',16,1,0),('Geghi',26,1,0),('Geghi',27,1,0),('Geghi',34,1,0),('Geghi',35,1,0),('Geghi',37,1,0),('Geghi',38,1,0),('geghina',16,1,0),('geghina',30,1,0),('geghina',32,1,0),('geghina',34,0,1),('geghina',35,1,0),('geghina',37,1,0),('geghina',38,0,1),('geghina',40,1,0),('geghina',42,1,0),('geghina',45,1,0);
/*!40000 ALTER TABLE `utentepost` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-20  9:55:46
