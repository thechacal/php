-- MySQL dump 10.11
--
-- Host: localhost    Database: sisadm
-- ------------------------------------------------------
-- Server version	5.0.45

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
-- Table structure for table `arquivodigital`
--

DROP TABLE IF EXISTS `arquivodigital`;
CREATE TABLE `arquivodigital` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idcaixa` varchar(100) collate latin1_spanish_ci NOT NULL,
  `setores` varchar(100) collate latin1_spanish_ci NOT NULL,
  `tipodoc` varchar(100) collate latin1_spanish_ci NOT NULL,
  `conteudo` varchar(100) collate latin1_spanish_ci NOT NULL,
  `periodo` varchar(100) collate latin1_spanish_ci NOT NULL,
  `exercicio` varchar(100) collate latin1_spanish_ci NOT NULL,
  `usuario` varchar(100) character set latin1 NOT NULL,
  `status` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `arquivodigital`
--

LOCK TABLES `arquivodigital` WRITE;
/*!40000 ALTER TABLE `arquivodigital` DISABLE KEYS */;
INSERT INTO `arquivodigital` VALUES (28,'2.3.17.332','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/11/2003','2003','marcos.amorim',1),(29,'2.3.17.332','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/12/2003','2003','marcos.amorim',1),(30,'2.3.17.333','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/01/2004','2004','marcos.amorim',1),(32,'2.3.17.333','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/02/2004','2004','marcos.amorim',1),(35,'2.3.17.334','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/04/2004','2004','marcos.amorim',1),(36,'2.3.17.334','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/05/2004','2004','marcos.amorim',1),(37,'2.3.17.334','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/06/2004','2004','marcos.amorim',1),(38,'2.3.17.335','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/07/2004','2004','marcos.amorim',1),(39,'2.3.17.335','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/08/2004','2004','marcos.amorim',1),(40,'2.3.17.335','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/09/2004','2004','marcos.amorim',1),(41,'2.3.17.336','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/10/2004','2004','marcos.amorim',1),(42,'2.3.17.336','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/11/2004','2004','marcos.amorim',1),(43,'2.3.17.336','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/12/2004','2004','marcos.amorim',1),(47,'2.3.16.337','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/01/2005','2005','marcos.amorim',1),(48,'2.3.16.337','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/02/2005','2005','marcos.amorim',1),(49,'2.3.16.337','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/03/2005','2005','marcos.amorim',1),(50,'2.3.16.338','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/04/2005','2005','marcos.amorim',1),(51,'2.3.16.338','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/05/2005','2005','marcos.amorim',1),(52,'2.3.16.338','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/06/2005','2005','marcos.amorim',1),(53,'2.3.16.339','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/07/2005','2005','marcos.amorim',1),(54,'2.3.16.339','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/08/2005','2005','marcos.amorim',1),(55,'2.3.16.339','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/09/2005','2005','marcos.amorim',1),(56,'2.3.16.340','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/10/2005','2005','marcos.amorim',1),(57,'2.3.16.340','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/11/2005','2005','marcos.amorim',1),(58,'2.3.16.340','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/12/2005','2005','marcos.amorim',1),(59,'2.3.16.341','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/01/2006','2006','marcos.amorim',1),(60,'2.3.16.341','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/02/2006','2006','marcos.amorim',1),(61,'2.3.16.341','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/03/2006','2006','marcos.amorim',1),(62,'2.3.16.342','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/04/2006','2006','marcos.amorim',1),(63,'2.3.16.342','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/05/2006','2006','marcos.amorim',1),(64,'2.3.16.342','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/06/2006','2006','marcos.amorim',1),(65,'2.3.15.343','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/07/2006','2006','marcos.amorim',1),(66,'2.3.15.343','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/08/2006','2006','marcos.amorim',1),(67,'2.3.15.343','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/09/2006','2006','marcos.amorim',1),(68,'2.3.15.344','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/10/2006','2006','marcos.amorim',1),(69,'2.3.15.344','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/11/2006','2006','marcos.amorim',1),(70,'2.3.15.344','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/12/2006','2006','marcos.amorim',1),(71,'2.3.17.332','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/10/2003','2003','marcos.amorim',1),(72,'2.3.15.345','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/01/2007','2007','marcos.amorim',1),(73,'2.3.15.345','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/02/2007','2007','marcos.amorim',1),(74,'2.3.15.345','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/03/2007','2007','marcos.amorim',1),(75,'2.3.15.346','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/04/2007','2007','marcos.amorim',1),(76,'2.3.15.346','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/05/2007','2007','marcos.amorim',1),(77,'2.3.15.346','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/06/2007','2007','marcos.amorim',1),(78,'2.3.15.347','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/07/2007','2007','marcos.amorim',1),(79,'2.3.15.347','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/08/2007','2007','marcos.amorim',1),(80,'2.3.15.347','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/09/2007','2007','marcos.amorim',1),(81,'2.3.15.348','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/10/2007','2007','marcos.amorim',1),(82,'2.3.15.348','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/11/2007','2007','marcos.amorim',1),(83,'2.3.15.348','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/12/2007','2007','marcos.amorim',1),(84,'2.3.14.349','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/01/2008','2008','marcos.amorim',1),(85,'2.3.14.349','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/02/2008','2008','marcos.amorim',1),(86,'2.3.14.349','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/03/2008','2008','marcos.amorim',1),(87,'2.3.14.350','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/04/2008','2008','marcos.amorim',1),(88,'2.3.14.350','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/05/2008','2008','marcos.amorim',1),(89,'2.3.14.350','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/06/2008','2008','marcos.amorim',1),(90,'2.3.14.351','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/07/2008','2008','marcos.amorim',1),(91,'2.3.14.351','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/08/2008','2008','marcos.amorim',1),(92,'2.3.14.351','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/09/2008','2008','marcos.amorim',1),(93,'2.3.14.352','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/10/2008','2008','marcos.amorim',1),(94,'2.3.14.352','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/11/2008','2008','marcos.amorim',1),(95,'2.3.14.352','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/12/2008','2008','marcos.amorim',1),(96,'2.3.14.353','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/01/2009','2009','marcos.amorim',1),(97,'2.3.14.353','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/02/2009','2009','marcos.amorim',1),(98,'2.3.14.353','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA','00/03/2009','2009','marcos.amorim',1),(101,'2.3.14.354','Administrativo','FLUXO DE CAIXA','FLUXO DE CAIXA ','00/04/2009','2009','marcos.amorim',1),(102,'2.3.14.354','Administrativo','FLUXO DE CAIXA ','FLUXO DE CAIXA ','00/05/2009','2009','marcos.amorim',1);
/*!40000 ALTER TABLE `arquivodigital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ban`
--

DROP TABLE IF EXISTS `ban`;
CREATE TABLE `ban` (
  `ip` varchar(15) NOT NULL,
  `attempts` int(11) NOT NULL,
  `account` varchar(13) NOT NULL,
  `changes` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `state` enum('auto','disable','persistent') NOT NULL default 'auto',
  KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ban`
--

LOCK TABLES `ban` WRITE;
/*!40000 ALTER TABLE `ban` DISABLE KEYS */;
INSERT INTO `ban` VALUES ('192.168.1.230',0,'jessyka','2009-11-03 11:03:16','auto'),('192.168.1.116',0,'felipe.gomes','2009-11-03 11:03:16','auto'),('192.168.1.153',0,'hedwing.silva','2009-11-03 11:03:16','auto'),('192.168.1.72',0,'raphael.silva','2009-11-03 11:03:16','auto'),('192.168.1.101',0,'breno.padilha','2009-11-03 11:03:16','auto'),('192.168.1.186',0,'lecimary.arau','2009-11-03 11:03:16','auto'),('192.168.1.212',0,'Andressa Port','2009-11-03 11:03:16','auto'),('192.168.1.122',0,'henrique.sant','2009-11-03 11:03:16','auto'),('192.168.1.94',0,'juliana.patri','2009-11-03 11:03:16','auto'),('192.168.1.187',0,'rabbony.silva','2009-11-03 11:03:16','auto'),('192.168.1.58',0,'layane.silva','2009-11-03 11:03:16','auto'),('192.168.1.204',0,'luciana.abreu','2009-11-03 11:03:16','auto'),('192.168.1.173',0,'irani.maria','2009-11-03 11:03:16','auto'),('192.168.1.182',0,'ricardo.holan','2009-11-03 11:03:16','auto'),('192.168.1.134',0,'joab.aquino','2009-11-03 11:03:16','auto'),('192.168.1.106',3,'ricardo','2009-11-03 15:59:50','auto'),('192.168.1.80',0,'juliana.patri','2009-11-03 11:03:16','auto'),('192.168.1.103',0,'irani.maria','2009-11-03 11:03:16','auto'),('192.168.1.46',0,'ricardo.holan','2009-11-03 11:03:16','auto'),('192.168.1.118',2,'david.nascime','2009-11-04 02:10:25','auto'),('192.168.1.120',1,'irani.maria','2009-11-06 16:55:52','auto'),('192.168.1.113',1,'adriano.vasco','2009-11-05 17:06:11','auto'),('192.168.1.130',2,'le','2009-11-06 20:20:49','auto'),('192.168.1.110',1,'larissa.santo','2009-11-04 13:19:27','auto'),('192.168.1.109',0,'adriano.cacho','2009-11-03 11:03:16','auto'),('192.168.1.57',0,'henrique.sant','2009-11-03 11:03:16','auto'),('192.168.1.51',1,'dyego.lima','2009-11-03 20:01:14','auto'),('192.168.1.56',0,'ygo','2009-11-03 11:03:16','auto'),('192.168.1.123',4,'rafaela.saboi','2009-11-03 15:57:35','auto'),('192.168.1.124',5,'julio.arrais','2009-11-03 23:22:32','auto'),('192.168.1.115',1,'elisangela.fr','2009-11-04 21:13:36','auto'),('192.168.1.107',1,'pablo.silva','2009-11-04 10:53:50','auto'),('192.168.1.78',1,'jessyka','2009-11-05 11:52:05','auto'),('192.168.1.104',5,'gislane.pauli','2009-11-06 20:42:38','auto');
/*!40000 ALTER TABLE `ban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perms`
--

DROP TABLE IF EXISTS `perms`;
CREATE TABLE `perms` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perms`
--

LOCK TABLES `perms` WRITE;
/*!40000 ALTER TABLE `perms` DISABLE KEYS */;
INSERT INTO `perms` VALUES (1,'admin'),(2,'arquivodigital');
/*!40000 ALTER TABLE `perms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reenvio_faturas`
--

DROP TABLE IF EXISTS `reenvio_faturas`;
CREATE TABLE `reenvio_faturas` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idcabo` varchar(10) character set latin1 collate latin1_spanish_ci NOT NULL,
  `nomecliente` varchar(50) character set latin1 collate latin1_spanish_ci NOT NULL,
  `notafiscal` varchar(10) character set latin1 collate latin1_spanish_ci NOT NULL,
  `telefone` varchar(20) character set latin1 collate latin1_spanish_ci NOT NULL,
  `motivo` varchar(30) character set latin1 collate latin1_spanish_ci NOT NULL,
  `mes` varchar(20) character set latin1 collate latin1_spanish_ci NOT NULL,
  `vencimento` varchar(20) character set latin1 collate latin1_spanish_ci NOT NULL,
  `operador` varchar(20) character set latin1 collate latin1_spanish_ci NOT NULL,
  `data` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reenvio_faturas`
--

LOCK TABLES `reenvio_faturas` WRITE;
/*!40000 ALTER TABLE `reenvio_faturas` DISABLE KEYS */;
INSERT INTO `reenvio_faturas` VALUES (1118,'45885','Cristalino Fernandes de Q Neto','4843','32225311','NAO RECEBEU A FATURA','NOVEMBRO','VENCIMENTO DIA 6','Rayran Rodrigues','2009-11-06'),(1117,'80295','Sueli Rodrigues de Araujo CABRAL','s/n&#186;','3234-0102','OUTROS','NOVEMBRO','VENCIMENTO DIA 15','lecimary de Araujo c','2009-11-06'),(1116,'225856',' Flavio Cesar da Costa PEREIRA','2731','32112740','NAO RECEBEU A FATURA','NOVEMBRO','VENCIMENTO DIA 6','Layane Batista da Si','2009-11-06'),(1115,'785683','Alan Ranier da Silva Calafange','37405','9114-9129','OUTROS','NOVEMBRO','VENCIMENTO DIA 17','semirames.simpson','2009-11-06'),(1114,'787472','Sra Themis Duarte  ROLIM','4644','88520317','NAO RECEBEU A FATURA','NOVEMBRO','VENCIMENTO DIA 6','Daniel Rodrigues','2009-11-05'),(1113,'743676','Deyse Patricia  GOMES','s/n&#186;','4009-4000','OUTROS','NOVEMBRO','VENCIMENTO DIA 17','lecimary de Araujo c','2009-11-05'),(1112,'784891','Laura Maria SILVA ','5052','32013581','NAO RECEBEU A FATURA','NOVEMBRO','VENCIMENTO DIA 6','Wendell Pabllo','2009-11-05'),(1111,'653083','Sr Geziel Da Silveira BARRETO','37537','32073613','OUTROS','NOVEMBRO','VENCIMENTO DIA 12','Rafael Cortez Firmin','2009-11-04'),(1110,'42455','Maria fatima da Costa','15955','30814454','OUTROS','NOVEMBRO','VENCIMENTO DIA 6','Marcos César Saldanh','2009-11-04'),(1109,'603994','Samuel Rubens Amado De Oliveira  REIS','26325','88257538','OUTROS','NOVEMBRO','VENCIMENTO DIA 15','lecimary de Araujo c','2009-11-04'),(1108,'699785',' Arlindo Matias Da SILVA','7924','3223-3649','OUTROS','NOVEMBRO','VENCIMENTO DIA 9','Larissa Santos','2009-11-04'),(1107,'673674','Angela Cristina Melo  LIBERATO','33884','32064930','OUTROS','OUTUBRO','VENCIMENTO DIA 17','David França','2009-11-03'),(1106,'78295',' Roberto de Azevedo PACHECO','16309','36423108','OUTROS','NOVEMBRO','VENCIMENTO DIA 9','Rafael Cortez Firmin','2009-11-03'),(1105,'232708','Elias Januario dos Santos','1099','36110778','NAO RECEBEU A FATURA','NOVEMBRO','VENCIMENTO DIA 6','Dyego Pinheiro Lima ','2009-11-03'),(1104,'778811','Adna Guedes  TAVARES','10480','94182600','NAO RECEBEU A FATURA','NOVEMBRO','VENCIMENTO DIA 6','Adriano Vasconcellos','2009-11-03'),(1103,'221625',' Patricia Leao de Franca Moura','41993','36161209','OUTROS','NOVEMBRO','VENCIMENTO DIA 17','Edileide Marinho','2009-11-03'),(1102,'120459','Airton Camara de Carvalho','1995','32010216','NAO RECEBEU A FATURA','OUTUBRO','VENCIMENTO DIA 9','breno/padilha','2009-11-03'),(1100,'97745','Vescia Suassuna Lopes Pereira','10282','32183305','NAO RECEBEU A FATURA','OUTUBRO','VENCIMENTO DIA 6','Nelson Gomes dos San','2009-10-30'),(1101,'773727','Wobben Winopower Industria E Comercio LTDA','31407','32183825','NAO RECEBEU A FATURA','OUTUBRO','VENCIMENTO DIA 12','Rafael Cortez Firmin','2009-10-30'),(1119,'785978',' Juliano De  AGUIAR','24853','32354705','OUTROS','NOVEMBRO','VENCIMENTO DIA 12','nayanne andressa bar','2009-11-06');
/*!40000 ALTER TABLE `reenvio_faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `perms` int(10) unsigned NOT NULL,
  KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('edluise','6cdd459f7e4f8ff5b46173de85267dca350687cd','Edluise Costa','edluise.costa@cabonatal.com.br',3),('ivan.brandao','e61aaf2953f3b12ea3b4e27322a727a2473879aa','Ivan Brand&#227;o','ivan.brandao@cabonatal.com.br',1),('Kaline','1b5c8b92229daa6ddb92ab8efa9f7abee545ef51','Kaline Santos','kaline.santos@cabonatal.com.br',0),('fabiana.macedo','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','Ana Fabiana de Macedo','fabiana.macedo@cabonatal.com.br',0),('erikaline.tertuliano','d3574eae255d8ed10635e4f1d35b8e89bca19009','Erikaline Tertuliano Silveira','erikaline.tertuliano@cabonatal.com.br',0),('cirlley','ce7a0c0b9582c099dca96c607d778bfd28a1dfb6','cirlley nascimento de oliveira','cirlley.nascimento@cabonatal.com.br',0),('ricardo.peixoto','edc9c3c74ec57036fdce3aa973e4e69889762d3a','Ricardo Peixoto','ricardo.peixoto@cabonatal.com.br',0),('magali','bdcb21d47e0669c3acd376c3584531a7d8509443','magali cristina freire cardozo','magali.cristina@cabonatal.com.br',0),('lecimary','e392056847a840156a4beaa69c9e06341f088d28','lecimary de Araujo cavalcanti','lecimary.araujo@cabonatal.com.br',0),('breno.padilha','8cbd593b7d347b81682dcb2a4bf4125bf6aa7bad','Breno Padilha de Lima','breno.padilha@cabonatal.com.br',0),('anderson.dantas','0c0c68e569cc2e1731afc08c0ecb1fac6b28c907','Anderson Dantas','anderson.dantas@cabonatal.com.br',0),('wendell','3c1be9860490562c941703f9b5f1b69e01e1a6ea','Wendell Pabllo','wendell.campelo@cabonatal.com.br',0),('layane.silva','9e7acb76969894aa885d214a795b574e35d00379','Layane Batista da Silva','layane.silva@cabonatal.com.br',0),('simone.fernandes','1b10eb68da07d9c90536dc06623e0556edab08fa','Simone Fernandes','simone.fernandes@cabonatal.com.br',0),('nelson.santos','cbf545b4f020bc1d50956e83a1c81c33d20e9215','Nelson Gomes dos Santos','nelson.santos@cabonatal.com.br',0),('joao.alves','d000da95832bb7b1864f8a134bb718d047ad34e1','Jo&#227;o Maurício','joao.alves@cabonatal.com.br',0),('semirames.simpson','25ce0f4ffe261cf492570051e5a2c7ec95745057','semirames.simpson','semirames.simpson@cabonatal.com.br',0),('vitoria pereira','4a7cb19757955de1baacc103e0666b873bc95ae8','Maria das Vitoria Pereira de Araujo','vitoria.pereira@cabonatal.com.br',0),('juliana.patricio','6868e3ab6c1cd0f3bf58b8924ce9a8c32e66e863','Juliana Patricio Ferreira','juliana.patricio@cabonatal.com.br',0),('antonio.melo','7741ccbe96354da52f5d886ff9c140683cb94bd9','Antonio Melo','antonio.melo@cabonatal.com.br',0),('pedro.henrique','0bfc0de7f0c968129b76778d06c7aad3618c491f','Pedro peixoto','pedro.henrique@cabonatal.com.br',0),('aldeiza.carvalho','a172efc072ed45df8ed49225281a0499698ba69b','Aldeiza Carvalho de Melo','aldeiza.carvalho@cabonatal.com.br',0),('madson.gomes','fc31429da4064527ce4f3cd5563e5a97e4e2530c','madson alberto viana gomes','madson.gomes@cabonatal.com.br',0),('hedwing.silva','3955c819a9c3d9ad87259e6256d037d7a1204bfb','hedwing Bruno dos Santos Silva','hedwing.silva@cabonatal.com.br',0),('victor.vasconcelos','edc9c3c74ec57036fdce3aa973e4e69889762d3a','Victor Cavalcante Lira de Vasconcelos','victor.vasconcelos@cabotelecom.com.br',0),('cristianne.marcelle','6ed5fa35a13df4f57b212c0a51f42ba913518013','Cristianne Marcelle Mediros dos Santos','cristianne.marcelle@cabonatal.com.br',0),('vanessa.moura','e205888b17f2f470c1ef12d55acef94e5b52289d','vanessa ferreira de moura','vanessa.moura@cabonatal.com.br',0),('Rafael Cortez','65cc0c35e2925ad0c06b36b9f5b7b27292c33a3c','Rafael Cortez Firmino','rafael.cortez@cabonatal.com.br',0),('rayran.rodrigues','caff67c96b1de9b81cf61dc5f38a60acd2b8c375','Rayran Rodrigues','rayran.rodrigues@cabonatal.com.br',0),('irani.maria','f3c892b76a5ed3f5ee879988018fb8df65bd07c7','irani maria de lira','irani.maria@cabonatal.com.br',0),('felipe.gomes','9ac20922b054316be23842a5bca7d69f29f69d77','Felipe André Chagas Gomes','felipe.gomes@cabonatal.com.br',0),('juliana.amorim','334c3cef322b0f27f5c21319264eb167da5e6c04','Juliana Costa Amorim','juliana.amorim@cabonatal.com.br',0),('Ubiratan','3980b95b6c992f68619b5e32da71328c17e0ed49','Ubiratan Gonzaga de Almeida ','ubiratan.almeida@cabonatal.com.br',0),('mirliani.andrade','440502a21c17adb7e220b057e5cfcbc4e539346b','mirliani silva de andrade','mirliani.andrade@cabonatal.com. br',0),('Conceicao.saraiva','b344683807bf997df0485b4dd9288907be45db7f','Maria da Conceicao Oliveira Saraiva','conceicao.saraiva@cabonatal.com.br',0),('gislane.paulino','1d279a65847b7bcf9ab4134175a684715030aebc','gislane paulino borges','gislane.paulino@cabonatal.com.br',0),('adriano.vasconcellos','e3ac2e6a4142ae30d30fe1a70aeb286f7cc4e11a','Adriano Vasconcellos','adriano.vasconcellos@cabonatal.com.br',0),('marcos.cesar','381fcc2beb53a392d6cab856b27093a4dc5f8feb','Marcos César Saldanha Dantas','marcos.cesar@cabonatal.com.br',0),('clebson','f8a7a155f393a83b512e009fa6c9b0cfc865523e','Clebson Rodrigo Silva de Gois','clebson.gois@cabonatal.com.br',0),('nayanne','993ec4d585755f25967c1e313daa48f833d07ea8','nayanne andressa barreto de araujo','nayanne.andressa@cabonatal.com.br',0),('macqueen','2d7e8aa96e8e6a7dca01070f85c6080b3d912d66','Marcelo M. D. de Araújo','marcelo.macqueen@cabonatal.com.br',0),('rabbony.silva','11b2ad17ce9016c9a5e894edf2f70e31a6c722e6','Rabbony Santos Barros da Silva','rabbony.silva@cabonatal.com.br',0),('tathiane.rodrigues','1eaf53ecde913f50c781de846d6777a1880f74d0','tathiane rodrigues de lima','tathiane.rodrigues@cabonatal.com.br',0),('pablo','c1008c1c23d3a8cc615a529de8c570afde42aafc','Pablo rubens santos silva','pablo.silva@cabonatal.com.br',0),('ygo','cff5713264a23ccefef24b6cefee6f1d9e448c40','ygo leandro medeiros da silva','ygo.silva@cabonatal.com.br',0),('luciana','c70a701236eba96033bb647a3206e806be0c27de','luciana barbosa abreu de araujo','luciana.abreu@cabonatal.com.br',0),('andressa porto','282f2bbcd0a3ca036a9ba5c7da9cebbef75f4cff','Andressa Porto Cavalcanti','andressa.porto@cabonatal.com.br',0),('simara araujo','feef89a02050066677ed2ee14187de0464766082','Simara Araujo','simara.araujo@cabonatal.com.br',0),('jessyka','8d5004c9c74259ab775f63f7131da077814a7636','Jessyka santos','jessyka.mayara@cabonatal.com.br',0),('dyego','33c61ede4cb6e2e2a4a8c5bb3b383ce12a49bffd','Dyego Pinheiro Lima de Gois Siqueira','dyego.lima@cabonatal.com.br',0),('henrique.santos','cedec3c6b99afe84b831bd9cc2b04382f1fd67dc','Henrique Santos Ferreira da Silva','henrique.santos@cabonatal.com.br',0),('jose.nunes','6e65fe463ff0689ecb5fdfeddd5c3f2e76e763d1','José Roberto Gomes Nunes','jose.nunes@cabonatal.com.br',0),('fabio.borges','7c4a8d09ca3762af61e59520943dc26494f8941b','Fabio Borges da Silva','fabio.borges@cabonatal.com.br',0),('sideri.georgios','87f4bc3d6f0d2a2a95d84645f264ca863ba2cd25','sideri georgios papakyroudis','sideri.georgios@cabonatal.com.br',0),('adriano','2b46fa218dbe8989026e6bb13404d49cfbfa04c4','adriano da silva pereira','adriano.pereira@cabonatal.com.br',0),('simone','39257e03d854a74a914e315ac0467ffefb88a0e6','simone fernandes','simone.fernandes@cabonatal.com.br',0),('julio.arrais','c06ab37dd962ceeff4104a1a20fbfbbb6911ebe3','Júlio César Arrais Pinto','julio.arrais@cabonatal.com.br',0),('jacqueline.barros','a43f9fc96f67c191be1a430b30da0129bf1c98af','jacqueline barros','jacqueline@cabonatal.com.br',0),('ricardo.holanda','cf2e3fbd8dd3dd7bd31af4b3b68e7ade609812ba','Ricardo Medeiros de Holanda','ricardo.holanda@cabonatal.com.br',0),('lorena','7dc378e275cb6c3e1565f722a8d63a441fe5f138','Lorena Cordula','lorena.pinheiro@cabonatal.com.br',0),('edileide.marinho','0a1d454b1f5fcef861901c91d45b2967965575c2','Edileide Marinho','edileide.marinho@cabonatal.com.br',0),('augusto','f96000f54011e724a270a9cb78b729f06dc52dd2','Augusto Andrade','augusto.andrade@cabonatal.com.br',0),('brenolimap','d7f1df750f5f1090762bb9d59f05faacf285273e','breno/padilha','breno.padilha@cabonatal.com.br',0),('marcos','f56c1bb09f9d16627ca93f0658cf444c28a2ca68','Marcos Amorim','marcos.amorim@cabonatal.com.br',2),('gledson','b54cae5399cf9b1111d2621f3c80e8f68edf7276','luiz','gledson.luiz@cabonatal.com.br',0),('Andressa Porto','282f2bbcd0a3ca036a9ba5c7da9cebbef75f4cff','Andressa Porto','andressa.porto@cabonatal.com.br',0),('simara','feef89a02050066677ed2ee14187de0464766082','Simara Araújo','simara.araujo@cabonatal.com.br',0),('larissa.santos','98a9e62c481527f71dd942f7abc076e0346d13f1','Larissa Santos','larissa.santos@cabonatal.com.br',0),('daniel','6345bc777ef5abc658dafd5fb3bd5d793d7af087','Daniel Rodrigues','daniel.rodrigues@cabonatal.com.br',0),('Elizangela Lisboa','757a7617e117c267137ebe743afe10373f579612','elizangela lisboa','elizangela.lisboa@cabonatal.com.br',0),('adriano.cacho','b01afc2b077956acc69f99e0b7df1cb70cb01331','adriano.cacho','adriano.cacho@cabonatal.com.br',0),('eric oliveira','707e708958fd94fd934fbc38d44d67c62da2a286','Eric Jorge Vieira de Oliveira','eric.oliveira@cabonatal.com.br',0),('elisangela.frutuoso','91f357187405926a4020a4f532c193b2110334b3','Elisangela Frutuoso','elisangela.frutuoso@cabonatal.com.br',0),('raphael.silva','322d98465b755d18f233b187b893b4147d69e3ff','Raphael Vinicius','raphael.silva@cabonatal.com.br',0),('isabelle','3b95f3ea18b4244748c60908ba7e674516e71961','Isabelle Mariano','isabelle.mariano@cabonatal.com.br',0),('conceicao.saraiva','b5e1ed40f9f1e29bf5e9e09135d027830c9c7b28','Maria Saraiva','conceicao.saraiva@cabonatal.com.br',0),('conceicao','b5e1ed40f9f1e29bf5e9e09135d027830c9c7b28','Maria Saraiva','conceicao.saraiva@cabonatal.com.br',0),('ranniery.oliveira','2b5eed7c96c2d4daf9e7b8059c781a3c6dbfe48f','Igor Ranniery','ranniery.oliveira@cabonatal.com.br',0),('julio.arrais','cc8f4f6c8eb2f4d3b09ec029b31bafdf4bb2ad35','juliio arrais','jcapcla@hotmail.com',0),('david.nascimento','b32406377e4c6a40ad77de2d7ccf86c86e504f9e','David França','david.nascimento@cabonatal.com.br',0),('larissa.santos','f8bb994e1e5ec1ba7389d2938b57124d78856bc8','larissa Santos','larissa.santos@cabonatal.com.br',0),('larissa.santos','f8bb994e1e5ec1ba7389d2938b57124d78856bc8','larissa Santos','larissa.santos@cabonatal.com.br',0);
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

-- Dump completed on 2009-11-07  0:25:34
