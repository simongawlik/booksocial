-- MySQL dump 10.14  Distrib 5.5.32-MariaDB, for Linux (i686)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	5.5.32-MariaDB

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `isbn` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagepath` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('9780006540304','The Dancing Wu Li Masters: An Overview of the New Physics','Gary Zukav','/img/bookcovers/default.jpg'),('9780007411771','Hello Kitty Guide to Parties (Hello Kitty)','no author found','http://bks6.books.google.com/books?id=lVnVAAAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780060531041','One Hundred Years of Solitude','Gabriel Garcia Marquez','http://bks9.books.google.com/books?id=pgPWOaOctq8C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780060597184','The Unbearable Lightness of Being: Twentieth Anniversary Edition','Milan Kundera','http://bks8.books.google.com/books?id=7QpErH6s8hcC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780061122415','The Alchemist','Paulo Coelho','http://bks8.books.google.com/books?id=pTr44Sx6oWQC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780061673733','Zen and the Art of Motorcycle Maintenance: An Inquiry into Values','Robert M. Pirsig','http://bks6.books.google.com/books?id=TChSKJ4jufUC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780091929787','Rework: Change the Way You Work Forever','Jason Fried, David Heinemeier Hansson','http://bks9.books.google.com/books?id=ClszWsFKluoC&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780141025711','Whatever You Think Think the Opposite','Paul Arden','http://bks0.books.google.com/books?id=aV7qngEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780141439822','Robinson Crusoe','Daniel Defoe','http://bks6.books.google.com/books?id=0Xhfyz152GgC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780141976969','Collapse: How Societies Choose to Fail or Survive','Jared Diamond','http://bks2.books.google.com/books?id=jNQd9RpuJ-4C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780143116387','Food Rules: An Eater\'s Manual','Michael Pollan','http://bks9.books.google.com/books?id=RTVnNQEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780156913218','Travels in Hyper Reality: Essays','Umberto Eco','http://bks3.books.google.com/books?id=MFoYngEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780192853615','Mathematics: A Very Short Introduction','Timothy Gowers','http://bks7.books.google.com/books?id=DBxSM7TIq48C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780307599803','Our Mathematical Universe: My Quest for the Ultimate Nature of Reality','Max Tegmark','http://bks3.books.google.com/books?id=y6kRmwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780307824066','The Value of Science: Essential Writings of Henri Poincare','Henri Poincare','http://bks8.books.google.com/books?id=1Xm-Uv0-JvsC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780307962126','Americanah','Chimamanda Ngozi Adichie','http://bks6.books.google.com/books?id=_wZ1Rf1QQ_EC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780312427900','The World Without Us','Alan Weisman','http://bks9.books.google.com/books?id=UEt_xWoju_MC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780316005043','Blink: The Power of Thinking Without Thinking','Malcolm Gladwell','http://bks1.books.google.com/books?id=VKGbb1hg8JAC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780316076203','What the Dog Saw: And Other Adventures','Malcolm Gladwell','http://bks5.books.google.com/books?id=4ANscgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780345350688','The Autobiography of Malcolm X','Malcolm X, Alex Haley','http://bks9.books.google.com/books?id=NlkifTXux_cC&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780345545374','A Leaf on the Wind of All Hallows: An Outlander Novella','Diana Gabaldon','http://bks8.books.google.com/books?id=P8krhRCz-PMC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780393069228','Guns, Germs, and Steel: The Fates of Human Societies','Jared Diamond','http://bks7.books.google.com/books?id=PWnWRFEGoeUC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780393310726','How to Lie with Statistics','Darrell Huff','http://bks9.books.google.com/books?id=SICioQIKhiwC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780395080689','Parkinson\'s Law, and Other Studies in Administration','Cyril Northcote Parkinson','/img/bookcovers/default.jpg'),('9780415285940','Conjectures and Refutations: The Growth of Scientific Knowledge','Karl Raimund Popper','http://bks0.books.google.com/books?id=IENmxiVBaSoC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780471799412','Logic For Dummies','Mark Zegarelli','http://bks2.books.google.com/books?id=PcG9NAEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780525952664','An Economist Gets Lunch: New Rules for Everyday Foodies','Tyler Cowen','http://bks5.books.google.com/books?id=LDqPZwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780553176988','A Brief History of Time: From the Big Bang to Black Holes','no author found','http://bks8.books.google.com/books?id=u5daSQAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780553278323','If You Meet the Buddha on the Road, Kill Him: The Pilgrimage of Psychotherapy Patients','Sheldon Kopp','http://bks6.books.google.com/books?id=Tng5uEDHsmgC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780672305108','Absolute beginner\'s guide to C','Greg M. Perry','http://bks3.books.google.com/books?id=dFSrq0PJGCUC&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780679604181','The Black Swan: Second Edition: The Impact of the Highly Improbable Fragility\"','Nassim Nicholas Taleb','http://bks4.books.google.com/books?id=GSBcQVd3MqYC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780691118802','The Princeton Companion to Mathematics','Timothy Gowers, June Barrow-Green, Imre Leader','http://bks0.books.google.com/books?id=ZfXgngEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780691155647','Alan Turing: The Enigma','Andrew Hodges','http://bks7.books.google.com/books?id=HyMcH_9eTtoC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780806519609','Wizard: The Life and Times of Nikola Tesla : Biography of a Genius','Marc J. Seifer','http://bks4.books.google.com/books?id=h2DTNDFcC14C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9780812973815','The Black Swan: The Impact of the Highly Improbable','Nassim Nicholas Taleb','http://bks3.books.google.com/books?id=FuExmQEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9780812975215','Fooled By Randomness: The Hidden Role Of Chance In Life And In The Markets','Nassim Taleb','http://bks3.books.google.com/books?id=4eLKm33WneEC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9781118061633','Wine for Dummies, Mini Edition','Mary Ewing-Mulligan','http://bks6.books.google.com/books?id=mXZFnwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9781400047635','The Wizard of Menlo Park: How Thomas Alva Edison Invented the Modern World','Randall E. Stross','http://bks6.books.google.com/books?id=80DOJad-0RYC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9781400067824','Antifragile: Things That Gain from Disorder','Nassim Nicholas Taleb','http://bks2.books.google.com/books?id=5E5o3_y5TpAC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9781400077427','Stumbling on happiness','Daniel Todd Gilbert','http://bks2.books.google.com/books?id=MEjuAAAAMAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9781451648539','Steve Jobs','Walter Isaacson','http://bks9.books.google.com/books?id=6e4cDvhrKhgC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9781588365835','The Black Swan: The Impact of the Highly Improbable','Nassim Nicholas Taleb','http://bks2.books.google.com/books?id=gWW4SkJjM08C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9781594201455','In Defense of Food: An Eater\'s Manifesto','Michael Pollan','http://bks7.books.google.com/books?id=0qBYDphA1CoC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),('9781877394058','Human Progress - and Collapse?: A Review of Jared Diamond\'s Collapse: How Societies Choose to Fail Or Succeed','Wolfgang Kasper, Jared Diamond, New Zealand Business Roundtable','/img/bookcovers/default.jpg'),('9782070306022','L\'Étranger','Albert Camus','http://bks1.books.google.com/books?id=QITvQwAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9783423342520','Candide oder Der Optimismus','Voltaire','http://bks7.books.google.com/books?id=jb6IngEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9783423344562','Betrachtungen über Leben, Kunst und Glauben','Franz Kafka','http://bks0.books.google.com/books?id=n6k0nwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9783442311439','Wer bin ich - und wenn ja, wie viele?: eine philosophische Reise','Richard David Precht','http://bks2.books.google.com/books?id=GYlQnwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9783492203388','Sämtliche Erzählungen','Fedor M. Dostoevskij','http://bks2.books.google.com/books?id=huXynQEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),('9783765415449','Hessisch auf deutsch: Herkunft und Bedeutung hessischer Wörter','Herbert Heckmann','/img/bookcovers/default.jpg'),('9783836528320','The Copy Book: How Some of the Best Advertising Writers in the World Write Their Advertising','no author found','http://bks1.books.google.com/books?id=iBRKYgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `id` int(10) NOT NULL,
  `id2` int(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (14,13,'2014-05-06 01:28:33','accepted'),(13,8,'2014-05-09 05:03:14','sent'),(13,15,'2014-05-10 19:20:29','accepted'),(13,9,'2014-05-14 11:16:09','sent'),(16,13,'2014-05-14 11:17:12','sent');
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holdings`
--

DROP TABLE IF EXISTS `holdings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holdings` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holdings`
--

LOCK TABLES `holdings` WRITE;
/*!40000 ALTER TABLE `holdings` DISABLE KEYS */;
/*!40000 ALTER TABLE `holdings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ownership`
--

DROP TABLE IF EXISTS `ownership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ownership` (
  `id` int(10) NOT NULL,
  `isbn` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `borrower` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loanedon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ownership`
--

LOCK TABLES `ownership` WRITE;
/*!40000 ALTER TABLE `ownership` DISABLE KEYS */;
INSERT INTO `ownership` VALUES (13,'9781400067824','owned','2014-05-04 02:09:15','Paige','2014-05-10'),(13,'9780307824066','wishlist','2014-05-04 12:49:11','','0000-00-00'),(14,'9780393069228','owned','2014-05-05 00:52:31','','0000-00-00'),(14,'9780141976969','owned','2014-05-05 00:58:43','','0000-00-00'),(14,'9780060531041','owned','2014-05-05 00:59:43','','0000-00-00'),(14,'9780812973815','owned','2014-05-05 01:00:35','','0000-00-00'),(14,'9781118061633','owned','2014-05-05 01:01:24','','0000-00-00'),(13,'9780060597184','wishlist','2014-05-09 11:20:15','','0000-00-00'),(13,'9780307599803','owned','2014-05-09 11:21:28','','0000-00-00'),(13,'9780672305108','wishlist','2014-05-09 11:22:35','','0000-00-00'),(13,'9780141025711','owned','2014-05-09 11:24:27','','0000-00-00'),(13,'9780812975215','owned','2014-05-09 11:25:24','','0000-00-00'),(13,'9783765415449','owned','2014-05-09 11:26:18','','0000-00-00'),(13,'9780192853615','owned','2014-05-09 11:26:56','','0000-00-00'),(13,'9783423342520','owned','2014-05-09 11:28:07','','0000-00-00'),(13,'9783423344562','owned','2014-05-09 11:28:50','','0000-00-00'),(13,'9780061122415','owned','2014-05-09 11:29:37','','0000-00-00'),(13,'9780553278323','owned','2014-05-09 11:30:07','','0000-00-00'),(13,'9780316076203','owned','2014-05-09 11:30:57','','0000-00-00'),(13,'9781400077427','owned','2014-05-09 11:31:39','','0000-00-00'),(13,'9780395080689','owned','2014-05-09 11:33:16','','0000-00-00'),(13,'9783442311439','owned','2014-05-09 11:33:56','','0000-00-00'),(13,'9780345350688','owned','2014-05-09 11:35:11','','0000-00-00'),(13,'9780691155647','owned','2014-05-09 11:35:56','','0000-00-00'),(13,'9781400047635','loaned','2014-05-09 11:36:30','Nikola','2014-05-14'),(13,'9780553176988','wishlist','2014-05-09 11:37:28','','0000-00-00'),(13,'9780312427900','owned','2014-05-09 11:38:17','','0000-00-00'),(13,'9781594201455','owned','2014-05-09 11:40:39','','0000-00-00'),(13,'9780143116387','owned','2014-05-09 11:41:14','','0000-00-00'),(13,'9780525952664','owned','2014-05-09 11:42:03','','0000-00-00'),(13,'9780393310726','owned','2014-05-09 11:42:42','','0000-00-00'),(13,'9783492203388','owned','2014-05-09 11:43:43','','0000-00-00'),(13,'9782070306022','owned','2014-05-09 11:46:10','','0000-00-00'),(13,'9781451648539','owned','2014-05-09 11:46:59','','0000-00-00'),(13,'9780091929787','owned','2014-05-09 11:48:09','','0000-00-00'),(13,'9783836528320','owned','2014-05-09 11:48:47','','0000-00-00'),(13,'9780415285940','owned','2014-05-09 11:52:50','','0000-00-00'),(13,'9780806519609','owned','2014-05-09 11:53:43','','0000-00-00'),(13,'9780691118802','owned','2014-05-09 11:54:46','','0000-00-00'),(13,'9780471799412','owned','2014-05-09 11:56:06','','0000-00-00'),(15,'9780006540304','owned','2014-05-10 19:19:24','','0000-00-00'),(13,'9780316005043','wishlist','2014-05-13 15:54:13','','0000-00-00'),(14,'9780307962126','wishlist','2014-05-15 02:24:47','','0000-00-00'),(14,'9780141439822','owned','2014-05-15 10:05:29','','0000-00-00'),(15,'9780141439822','owned','2014-05-15 10:06:13','','0000-00-00'),(13,'9780061673733','owned','2014-05-15 10:22:17','','0000-00-00');
/*!40000 ALTER TABLE `ownership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(10) unsigned NOT NULL,
  `price` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'caesar','$1$50$GHABNWBNE/o4VL7QjmQ6x0',10000.0000,'test@gmail.com'),(2,'hirschhorn','$1$50$lJS9HiGK6sphej8c4bnbX.',10000.0000,'test@gmail.com'),(3,'jharvard','$1$50$RX3wnAMNrGIbgzbRYrxM1/',10000.0000,'jharvard@fas.harvard.edu'),(4,'malan','$1$HA$azTGIMVlmPi9W9Y12cYSj/',10000.0000,'malan@fas.harvard.edu'),(5,'milo','$1$HA$6DHumQaK4GhpX8QE23C8V1',10000.0000,'milob@college.harvard.edu'),(6,'skroob','$1$50$euBi4ugiJmbpIbvTTfmfI.',9815.0360,'skroob@gmail.com'),(7,'zamyla','$1$50$uwfqB45ANW.9.6qaQ.DcF.',10000.0000,'zchen@test.com'),(8,'test1','$1$qoENbPqI$Li1Mkazor3oAFXF4dAtNQ.',10003.8800,'sgawlik@gmail.co'),(9,'test2','$1$ubmakokH$LvB0jme3civefH4QzDHsg1',10000.0000,'test2@gmail.com'),(10,'test3','$1$eF3F8jtc$j00pcColApwheTJNH7Oza0',10000.0000,'test3@gmail.com'),(11,'test4','$1$UC0EQgL2$Bp6ze2SnJcfxxA/dVQ25H0',10000.0000,'sgawlik@exeter.com'),(12,'test6','$1$RieF7xX.$z6bezG8wscY6jmsTn6TBk1',7768.2000,'sgawlik@exeter.com'),(13,'simon','$1$RKBH8Q5.$6u6ryEOhN8s2IaqUTHc7W1',8856.1200,'sgawlik@gmail.com'),(14,'Paige','$1$98a/uyIA$q5TYzuFq.wMNuiPjsEfle/',10000.0000,'paige.hoffman@gmail.com'),(15,'josef','$1$FLrAMlp3$wa0Kt2iMM66CKbWNS9Xbw1',10000.0000,'josef.gawlik@googlemail.com'),(16,'anneliese','$1$htLVCI5N$wfDzvsyjiuzxarT4ptmcK0',10000.0000,'anneli47@aol.com'),(17,'lucas_thisone','$1$JcC0PKpC$a.rkUcczJvJbB5RxPvhn6/',10000.0000,'lucas@test.com'),(18,'lucas_notthisone','$1$UHX4VpYB$M1J3eD6.3jkk7BRC0dFpi1',10000.0000,'lucas2@test.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-16  1:06:48
