-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: Gruppe4DB
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

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
-- Table structure for table `antworten`
--

DROP TABLE IF EXISTS `antworten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `antworten` (
  `id` int NOT NULL AUTO_INCREMENT,
  `antworttext` varchar(255) NOT NULL,
  `wahrheit` tinyint(1) NOT NULL,
  `frage_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `frage_id` (`frage_id`),
  CONSTRAINT `antworten_ibfk_1` FOREIGN KEY (`frage_id`) REFERENCES `fragen` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antworten`
--

LOCK TABLES `antworten` WRITE;
/*!40000 ALTER TABLE `antworten` DISABLE KEYS */;
INSERT INTO `antworten` VALUES (1,'01.01.1995',0,1),(2,'17.09.1991',1,1),(3,'23.07.2004',0,1),(4,'12.01.1985',0,1),(5,'Portable Document File',0,2),(6,'Printable Data Format',0,2),(7,'Portable Document Format',1,2),(8,'Printable Document File',0,2),(9,'HaJo Krüger',0,3),(10,'RJ-45',1,3),(11,'PJ Harvey',0,3),(12,'RJ-11',0,3),(13,'GNU General Public License',1,4),(14,'GNU Grams Per Liter',0,4),(15,'GNU Gas Petroleum Liquids',0,4),(16,'GNU Glycerophospholipid',0,4),(17,'Autor von Windows 3.11',0,5),(18,'Mitglied der Band O-Zone',0,5),(19,'Begründer der GNU GPL',1,5),(20,'Designer des ersten iPhones',0,5),(21,'Public Private Partnership Project',0,6),(22,'Polska Partia Przyjaciól Piwa',0,6),(23,'Prison Pet Partnership Program',0,6),(24,'Product Price Place Promotion',1,6),(25,'...verschlüsselt gespeicherte Inhalte auf dem Opfer-System und setzt dem Benutzer ein Ultimatum, zur Zahlung eines Lösesgeldes.',1,7),(26,'...ist der empfohlene Kleidungsstil bei Lösegeldforderungen.',0,7),(27,'...bezeichnet den zufälligen Zugriff auf Hardware-Komponenten, um Arbeit vorzutäuschen',0,7),(28,'...bezeichnet ein Programm, das als nützliche Anwendung getarnt ist, im Hintergrund aber ohne Wissen des Anwenders eine andere Funktion erfüllt.',0,7),(29,'Analysepunkte: Absatz, Beziehung, Controlling',0,8),(30,'Analyse der Alphabetisierungsrate in der Kundschaft',0,8),(31,'Prüfung des Automatic Binary Computers',0,8),(32,'Priorisierung der Kunden (A - sehr wichtig, B - wichtig, C - weniger wichtig)',1,8),(33,'Sammlung von Computerprogrammen, mit denen die Aufgaben der Softwareentwicklung möglichst ohne Medienbrüche bearbeitet werden können.',1,9),(34,'Programme auf Servern, die dem Administrator die Möglichkeit geben, schnell und zuverlässig neue Services anzulegen oder bestehende zu bearbeiten',0,9),(35,'Iterated Development Environment',0,9),(36,'Interdependent Data Exchange',0,9),(37,'Java Simple Object Notation',0,10),(38,'John\'s Self-Organized Network',0,10),(39,'Java Script Object Notation',1,10),(40,'Java Service Oriented Network',0,10),(41,'Eine Datenbank besteht aus Kommunikationsschnittstelle, Datenbankverwaltungssystem und Datenbanksystem.',0,11),(42,'Ein Datenbanksystem besteht aus Datenbank, Datenbankverwaltungssystem und Kommunikationsschnitstelle.',1,11),(43,'Ein Datenbankverwaltungssystem besteht aus Datenbank, Datenbanksystem und Kommunikationsschnittstelle.',0,11),(44,'Keine der Antworten ist korrekt',0,11),(45,'Evil users like apples',0,12),(46,'Erroneous user Interface agreement',0,12),(47,'End-user license agreement',1,12),(48,'End user legal agreement',0,12),(49,'pdf',0,13),(50,'json',1,13),(51,'csv',0,13),(52,'txt',0,13),(53,'eXtensible Markup Language',1,14),(54,'X-Markup Language',0,14),(55,'eXample Markup Language',0,14),(56,'eXtension Markup Language',0,14),(57,'Beschreibungsknoten',0,15),(58,'DDT',0,15),(59,'DTD',1,15),(60,'XMLD',0,15),(61,'es muss genau ein Wurzelelement vorhanden sein',0,16),(62,'alle Elemente besitzen eine Beginn- und Endkennung (tag) (<a>…</a> oder <a …/>)',0,16),(63,'ein Element darf mehrere Attribute gleichen Namens beinhalten',1,16),(64,'alle Elemente sind ebenentreu paarig verschachtelt (<a><b></b></a> ↔ <a><b></a></b>)',0,16),(65,'Comma Structured Values',0,17),(66,'Common String Values',0,17),(67,'Common Structured Values',0,17),(68,'Comma Separated Values',1,17),(69,'Eine Division durch Null (x = y / 0;) ',0,18),(70,'Speichern einer Datei auf eine Partition, die zu 100% belegt ist',0,18),(71,'Zugriffe auf Elemente innerhalb der Arraygrenzen',1,18),(72,'Zugriffe auf Elemente außerhalb der Arraygrenzen',0,18),(73,'Es müssen immer Attribute vorhanden sein',0,19),(74,'Keine der anderen Aussagen ist richtig',1,19),(75,'Attribute müssen in einer definierten Reihenfolge erfolgen',0,19),(76,'Es gibt keine Alternative zu XML',0,19),(77,'Employee Relationship Management',0,20),(78,'Electronic Records Management',0,20),(79,'Entity Relationship Model',1,20),(80,'Exchange Rate Mechanism',0,20),(85,'short',0,22),(86,'byte',1,22),(87,'long',0,22),(88,'int',0,22),(89,'String',0,23),(90,'short',0,23),(91,'boolean',0,23),(92,'char',1,23),(93,'Diese Aussage ist korrekt.',1,24),(94,'Diese Aussage ist falsch.',0,24),(95,'Diese Aussage ist in bestimmten Kontexten teilweise korrekt.',0,24),(96,'Die objektorientierte Programmierung ist klassenlos.',0,24),(97,'Den Umfang des Programmcodes zu minimieren.',0,25),(98,'Datenverarbeitung in möglichst kurzer Zeit.',0,25),(99,'Reale Zusammenhänge nachvollziehbar in Programmen abzubilden.',1,25),(100,'Daten und Prozesse voneinander zu trennen.',0,25),(101,'Es ist nicht möglich, interne Datenstrukturen zu verbergen.',0,26),(102,'Das stimmt nicht.',0,26),(103,'Objekte sind unabhängig und haben weder Schnittmengen noch Schnittstellen.',0,26),(104,'Korrekt!',1,26),(105,'Der Client sendet ein SYN-Paket an den Server. Nach Erhalt sendet der Server ein SYN-ACK-Paket an den Client, welcher wiederum mit ein ACK-Paket dessen Erhalt bestätigt.',1,27),(106,'Der Server sendet ein SYN-ACK-Paket an den Client und erhält ein ACK-Paket dafür.',0,27),(107,'Zuerst müssen Client und Server sich gegenseitig TCP-RST-Pakete schicken, dann werden nach einander SYN-, SYN-ACK- und ACK-Pakete ausgetauscht.',0,27),(108,'Beide Seiten senden jeweils erst ein SYN-Paket. Sollten diese ankommen, schicken sich beide Geräte ACK-Pakete und die Verbidnung kann aufgebaut werden.',0,27),(109,'Easy! 2 MB entsprechen 2048 kB und 768 kbit pro Sekunde entsprechen 96 kB pro Sekunde. Etwas über 21 Sekunden also!',1,28),(110,'Was für eine Frage! 768 kbit pro Sekunde entsprechen 0,96 MB pro Sekunde. Es dauert knapp über zwei Sekunden.',0,28),(111,'Die Frage liefert nicht genug Informationen, um diese eindeutig zu beantworten. Sind MiB oder MB gemeint??',0,28),(112,'Haha! 2 MB sind 16000 kbit geteilt durch 768 ergibt eine Übertragungsdauer von unter 21 Sekunden.',0,28),(117,'Einzelne Buchstaben',0,30),(118,'Zeichenketten',1,30),(119,'Zahlen ohne Nachkommastellen',0,30),(120,'Zahlen mit Nachkommastellen',0,30),(124,'Von-Neumann-Architektur ist der Baustil für die auf der Nordhalbkugel der Mondrückseite geplante Mondkolonie in dem nach John von Neumann benannten Einschlagkrater.',0,32),(125,'Unter der Von-Neumann-Architektur versteht man ein Modell eines einfachen Computers. Auf diesem Prinzip basieren die meisten modernen Computer. Die Von-Neumann-Architektur eines Computers wurde von John von Neumann entwickelt.',1,32),(126,'Die Von-Neumann-Architektur hat sich vor allem bei dem modernen Design von Apple-Geräten durchgesetzt - form follows function.',0,32),(127,'Unter der Van-Neumann-Architektur versteht man ein Bus-System, wie verschiedene Funktionseinheiten eines Rechners miteinander verbunden werden.',0,32),(128,'Gibt an, wie oft pro Sekunde ein Bild aufgebaut wird.',0,33),(129,'Gibt an, wie viele Bildpunkte ein Monitorbild enthält.',1,33),(130,'Ist ein Code in bit, der die Anzahl der möglichen Farben codiert.',0,33),(131,'Ist die Zeit, die ein Pixel benötigt um seinen Zustand zu wechseln.',0,33),(132,'Geschäftsleitung',0,34),(133,'Geschäftsführer, Filialleiter',0,34),(134,'Auszubildenden',0,34),(135,'Einkäufer, Verkäufer, Kassierer',1,34),(136,'im Büro A ihren Arbeitsplatz haben.',0,35),(137,'im Auftrag handeln, also eine Einzelvollmacht besitzen.',1,35),(138,'im Außendienst tätig sind.',0,35),(139,'einen depressiven Esel als spirit animal haben.',0,35),(140,'Eine SQL Injection ist die Einschleusung von schadhaften SQL-Statements. Dies betrifft lediglich MySQL-Datenbanken.',0,36),(141,'Eine SQL Injection ist die Bezeichnung für kombinierte INSERTs, um mehrere Tabellen gleichzeitig zu füllen.',0,36),(142,'Eine SQL Injection ist das Absetzen von schadhaftem Code in Form von SQL-Statements über das Inputfeld einer Webpage.',1,36),(143,'SQL ist eine neuartige Variante des Coronaviruses und die SQL Injection das Gegenmittel.',0,36),(144,'Eine Möglichkeit, seinen Unmut gegenüber der ausbildenden Person auszudrücken ohne rauszufliegen.',0,37),(145,'Dokument, die während der regulären Arbeitszeit ausgedruckt werden. Außerhalb der Arbeitszeit ausgedruckte Dokumente hingegen werden als irreguläre Ausdrucke bezeichnet.',0,37),(146,'Gemeint ist hier das Gegenteil von einem vulgären Ausdruck. Diese haben in der Informatik weite Verbreitung gefunden.',0,37),(147,'Zeichenketten, die der Beschreibung von Mengen von Zeichenketten mit Hilfe bestimmter syntaktischer Regeln dienen.',1,37),(148,'Der Vorgang der auf die Nichteinhaltung der Netiquette in Foren folgt.',0,38),(149,'People Against Networks: ein Zusammenschluss von Individuen, die Netzwerke im Allgemeinen ablehnen.',0,38),(150,'Die Erhöhung der Sendeleistung von Netzwerken mit Kochgerät.',0,38),(151,'Personal Area Network',1,38),(152,'Der Prokurist kann auch Eintragungen im Handelsregister vornehmen bzw. veranlassen.',1,39),(153,'Die Einzel- bzw. Spezialvollmacht gilt nur für ein einzelnes Rechtsgeschäft',0,39),(154,'Prokura stellt die weitreichenste Vollmacht im Unternehmen dar.',0,39),(155,'Die Allgemeine Handlungsvollmacht umfasst alle gewöhnlichen Rechtsgeschäfte.',0,39),(156,'Alle Vollmachten können schriftlich, mündlich oder stillschweigend durch Duldung erteilt werden.',0,40),(157,'Gerichtliche und außergerichtliche Geschäfte darf ein Prokurist nicht vornehmen.',0,40),(158,'Mit einer Einzel- bzw. Spezialvollmacht kann der Bevollmächtigte alle Rechtsgeschäfte einer bestimmten Art vornehmen. ',0,40),(159,'Der Prokurist kann das Unternehmen auch bei Gerichtsverhandlungen vertreten.',1,40),(160,'Die Wirtschaftlichkeit sollte nicht unter dem Wert 1 liegen.',0,41),(161,'Eine Umsatzrentabilität von 1,19% bedeutet, dass von 100 Euro Umsatz 19 Euro Gewinn übrigbleiben.',1,41),(162,'Der Cashflow ist eine Kennzahl zur Beurteilung des Kapitalzuflusses.',0,41),(163,'Ein Cashflow von 27.000 Euro bedeutet, dass dem Unternehmen 27.000 Euro für Investitionen, Tilgung und Gewinnausschüttung zur Verfügung steht.',0,41),(164,'center post unit',0,42),(165,'central programm user',0,42),(166,'central processing unit',1,42),(167,'central processing utility',0,42),(168,'Remote Access Member',0,43),(169,'Remote Memory Authentification',0,43),(170,'Random Access Memory',1,43),(171,'Remote Access Memory',0,43),(172,'Volt',0,44),(173,'Hertz',1,44),(174,'Byte pro Sekunde',0,44),(175,'bit',0,44),(176,'ECC',0,45),(177,'QVL',1,45),(178,'MMX',0,45),(179,'DDR',0,45),(180,'NIC',0,46),(181,'BIA',0,46),(182,'OUI',1,46),(183,'VAI',0,46),(184,'2001:0DB8:0000:130F:0000:0000:08GC:140B',0,47),(185,'2031::130F::9C0:876A:130B',0,47),(186,'2031::130F:9C0:876A:130B',1,47),(187,'2001:0DB8:0:130H::87C:140B',0,47);
/*!40000 ALTER TABLE `antworten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frage_kategorie`
--

DROP TABLE IF EXISTS `frage_kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `frage_kategorie` (
  `frage_id` int NOT NULL,
  `kategorie_id` int NOT NULL,
  KEY `frage_id` (`frage_id`),
  KEY `kategorie_id` (`kategorie_id`),
  CONSTRAINT `frage_kategorie_ibfk_1` FOREIGN KEY (`frage_id`) REFERENCES `fragen` (`id`),
  CONSTRAINT `frage_kategorie_ibfk_2` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorien` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frage_kategorie`
--

LOCK TABLES `frage_kategorie` WRITE;
/*!40000 ALTER TABLE `frage_kategorie` DISABLE KEYS */;
INSERT INTO `frage_kategorie` VALUES (1,5),(1,4),(2,5),(3,2),(4,6),(5,5),(6,7),(7,8),(8,7),(10,1),(9,1),(9,5),(13,1),(14,1),(12,6),(15,1),(17,1),(18,1),(20,1),(22,1),(23,1),(26,1),(27,2),(16,1),(19,1),(28,2),(30,1),(24,1),(33,9),(34,6),(35,6),(36,1),(36,5),(36,8),(25,1),(32,5),(38,2),(37,1),(39,6),(40,6),(42,5),(42,9),(43,5),(43,9),(44,5),(44,9),(45,5),(45,9),(46,2),(46,5),(47,2),(11,1),(41,6);
/*!40000 ALTER TABLE `frage_kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fragen`
--

DROP TABLE IF EXISTS `fragen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fragen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fragetext` text NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fragen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fragen`
--

LOCK TABLES `fragen` WRITE;
/*!40000 ALTER TABLE `fragen` DISABLE KEYS */;
INSERT INTO `fragen` VALUES (1,'Wann stellte Linus Torvalds die erste Version seines Kernels online?',1),(2,'Wofür steht die Abkürzung \".pdf\"?',1),(3,'Wie heißt der Ethernet-Steckverbinder?',1),(4,'Wofür steht GNU GPL?',1),(5,'Wer ist Richard Stallman?',1),(6,'Wofür stehen die 4 Ps des Marketings?',1),(7,'Was ist Ransomware? Ransomware...',1),(8,'Wofür steht ABC-Analyse in der Marktforschung?',1),(9,'Was ist eine IDE?',1),(10,'Wofür steht die Abkürzung JSON?',1),(11,'Welche Antwort zum Thema Datenbanken ist richtig?',1),(12,'Wofür steht EULA?',1),(13,'Kompliziertere, beispielsweise geschachtelte Datenstrukturen, werden am besten in folgendem Format gespeichert:',1),(14,'Wofür steht die Abkuerzung XML?',1),(15,'Was wird benötigt, um Struktur und Daten in einem XML-Dokument verifizieren zu können?',1),(16,'Welche ist keine Regel für wohlgeformte XML-Dokumente?',1),(17,'Wofür steht CSV?',1),(18,'Was löst keine Exception aus?',1),(19,'Welche Aussage über XML ist korrekt?',1),(20,'Wofür steht die Abkürzung ERM im Zusammenhang mit Datenbanken?',1),(22,'Welcher dieser Datentypen hat den geringsten Speicherbedarf?',1),(23,'Der erste Buchstabe eines Nachnamens soll in einer Variable gespeichert werden. Wählen Sie einen geeigneten Datentyp für die Variable aus.',1),(24,'Von einer Klasse können beliebig viele Objekte erzeugt werden.',1),(25,'Die objektorientierte Programmierung verfolgt eines der folgenden Ziele: ',1),(26,'Durch das Verbergen der internen Datenstruktur eines Objekts steigt die Übersichtlichkeit, da die Außenwelt nur die Schnittstelle des Objekts kennen muss.',1),(27,'Welche der Antworten beschreibt einen TCP-Handshake?',1),(28,'Wie lange dauert die Übertragung von 2 MB bei einer Bandbreite von 768 kbit pro Sekunde?',1),(30,'Wählen Sie aus, welche der folgenden Daten lässt sich nicht in einem elementaren bzw. primitiven Datentyp speichern.',1),(32,'Was versteht man unter der Von-Neumann-Architektur?',1),(33,'Wählen Sie aus, was die Auflösung aussagt:',1),(34,'Die Artvollmacht wird üblicherweise wem übertragen?',1),(35,'Die Abkürzung i.A, wird im Schriftverkehr von Personen verwendet die...',1),(36,'Was ist eine SQL Injection?',1),(37,'Was sind reguläre Ausdrücke?',1),(38,'Was ist unter PAN zu verstehen?',1),(39,'Welche Aussage zu den verschiedenen Vollmachten ist falsch?',1),(40,'Welche Aussage zu den verschiedenen Vollmachten ist richtig?',1),(41,'Welche der folgenden Aussagen zum Thema wirtschaftliche Kennziffern ist falsch?',1),(42,'Wofür steht CPU in Worten?',1),(43,'RAM steht für',1),(44,'In welcher Einheit wird die Prozessorfrequenz angegeben?',1),(45,'Wo könnten Sie nachschauen, wenn Sie ein passendes RAM für ein Mainboard suchen?',1),(46,'Wie werden die ersten 24-Bits einer MAC-Adresse abgekürzt?',1),(47,'Welche IPv6 Adresse ist gültig?',1);
/*!40000 ALTER TABLE `fragen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategorien`
--

DROP TABLE IF EXISTS `kategorien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategorien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorien`
--

LOCK TABLES `kategorien` WRITE;
/*!40000 ALTER TABLE `kategorien` DISABLE KEYS */;
INSERT INTO `kategorien` VALUES (1,'Programmierung'),(2,'Netzwerk'),(4,'Betriebssysteme'),(5,'Allgemeinwissen der IT'),(6,'Lizenzen und Verträge'),(7,'Marketing und Marktforschung'),(8,'Datenschutz und Datensicherheit'),(9,'Hardware');
/*!40000 ALTER TABLE `kategorien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rollen`
--

DROP TABLE IF EXISTS `rollen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rollen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rollen`
--

LOCK TABLES `rollen` WRITE;
/*!40000 ALTER TABLE `rollen` DISABLE KEYS */;
INSERT INTO `rollen` VALUES (1,'Administrator'),(2,'Frageersteller'),(3,'Spieler');
/*!40000 ALTER TABLE `rollen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `passwort` varchar(32) NOT NULL,
  `role_id` int NOT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rollen` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','saxPWqsMENTI.',1,1),(2,'testadmin','salvuD/70c3L2',1,0),(3,'testfrageersteller','saWCAXKLp5XV.',2,0),(4,'testspieler','saW3TIV1j5yHw',3,0),(5,'','saFLGt/QKS6yw',1,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-09  6:25:34
