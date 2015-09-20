-- MySQL dump 10.13  Distrib 5.1.30, for portbld-freebsd7.1 (amd64)
--
-- Host: localhost    Database: suportelocal
-- ------------------------------------------------------
-- Server version	5.1.30

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
-- Table structure for table `chamados`
--

DROP TABLE IF EXISTS `chamados`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `chamados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `depto` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `ramal` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `gravidade` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `resumo` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descricao` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `data` date DEFAULT NULL,
  `ip` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `chamados`
--

LOCK TABLES `chamados` WRITE;
/*!40000 ALTER TABLE `chamados` DISABLE KEYS */;
INSERT INTO `chamados` VALUES (18,'Edluise Costa','AdmRedes','318','Pouca','Anti-vírus','Glêdson, colocar o avira como anti-vírus nos computadores da empresa na medida do possível.','2009-01-14','192.168.0.249','15:59:08'),(46,'Edluise Costa','AdmRedes','318','Razóavel','Senha Administrador','Mudar remotamente a senha de administrador das máquinas do SAC/Suporte glêdson, mandei pro seu email o caminho pra se fazer isso.','2009-01-29','192.168.0.249','17:44:51'),(65,'Andressa Porto','Relacionamento','224','Razóavel','Usar o meu login','Como não tinha computador, usava o login do outros colaboradores, agora qur já estou com um pc preciso que os documentos e arquivos do computador e login que estou usando sejam importados para o meu login que não tem nada. ','2009-03-04','192.168.0.188','09:21:01');
/*!40000 ALTER TABLE `chamados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chamadosfechados`
--

DROP TABLE IF EXISTS `chamadosfechados`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `chamadosfechados` (
  `nome` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `depto` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `ramal` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `gravidade` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `resumo` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descricao` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `data` date DEFAULT NULL,
  `ip` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `hora` time DEFAULT NULL,
  `solucao` varchar(500) NOT NULL,
  `tecnico` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `chamadosfechados`
--

LOCK TABLES `chamadosfechados` WRITE;
/*!40000 ALTER TABLE `chamadosfechados` DISABLE KEYS */;
INSERT INTO `chamadosfechados` VALUES ('Fabiana','Relacionamento','285','Razóavel','Não consegue enviar e-mails pelo outlook','Já foi feito varias verificações más o problema volta a persistir com relação ao enviu dos e-mails.','2009-01-13','192.168.0.187','08:55:38','A ameba estava colocando o e-mail de destino errado pela segunda vez.','Edluise'),('Adenilson','Administrativo','209','Razóavel','O windows precisa de suas credenciais atuais','O windows precisa de suas credenciais atuais','2009-01-14','192.168.0.203','15:55:44','Adenilson estava usando o login da rede errado, feito a correção.','Edluise'),('Fabiano','Engenharia','229','Razóavel','Acesso a pasta de Back up','Estou sem ter o acesso à pasta de backup localizado na rede local. Nesta pasta estão os arquivos da Anatel. \r\n\r\nCaminho : \\\\Backup\\fmelo','2009-01-14','192.168.0.251','15:56:25','Feito a restauração dos arquivos para a máquina pessoal de fabiano melo.','Edluise'),('vitoria pereira','Administrativo','212','Razóavel','msn não esta abrindo, da erro ','necessito fazer alguns contatos ainda hj a tarde, no qual faço atraves do msn. \r\n\r\nDesde ja agradeço a atenção.','2009-01-14','192.168.0.175','16:24:08','Problema nos servidores da MS.','Edluise'),('Elza Dantas','Administrativo','240','Razóavel','SPARK','Spark sem funcionar a 04 dias. Por favor, enviar um técnico.\r\n\r\nObrigada.','2009-01-15','192.168.0.194','09:24:29','Feito configurações com o novo login elza.dantas','Edluise'),('Kathiane Lima','Relacionamento','296','Pouca','gostaria de ter acesso ao rapadura','Boa tarde!\r\nAcredito que a minha máquina não está tendo acesso ao rapadura. ','2009-01-15','192.168.0.164','17:21:10','Resolvido dando o endereço correto do rapadura.','Edluise'),('Patricia Barbosa','Administrativo','263','Muito Grave','Acesso á máquina','Problemas na senha. ','2009-01-16','192.168.0.194','12:25:21','Resolvido informado a nova conta patricia.barbosa','Edluise'),('Edluise Costa','AdmRedes','318','Muito Grave','Máquina da Recepção','Glêdson, jaqueline continua usando o login \"sac\" e \"visitante\" na máquina que ela usa e a máquina que gera os chamados para as cabines do show room, preciso que você clone os perfis dessas duas máquinas e faça o login com a senha pessoal dela, fazendo a importação dos perfis logo em seguida, qualquer coisa fale comigo.','2009-01-20','192.168.0.249','08:12:33','Feito!','Edluise'),('MAGALI (ZONA NORTE)','Relacionamento','6101','Razóavel','NAO RECEBENDO EMAIL PELO OUTLOOK ',' ESTAMOS TENDO PROBLEMA DE RECEBIMENTO E ENVIO DE EMAIL PELO OUTLOOK. POIS O MESMO  ESTA APARECENDO A JANELA DO  LOGON DO OUTLOOK (PEDINDO O USURARIO E A SENHA), OU SEJA , ESTA DANO ERRO .SE FOR DE AJUDA , SERVIDOR DELE PADRAO É 192.168.0.3 \r\n\r\nPOR FAVOR ! RESOLVER O MAIS RAPIDO POSSIVEL ..\r\n\r\nGRATO   ','2009-01-20','192.168.0.168','11:00:54','informado o login correto magali.cristina','Edluise'),('Giovanni Santos','Engenharia','235','Razóavel','Senha do E-mail(Thunderbird) Inválida','Ao abrir o e-mail, pede-se para fornecer a nova senha do usuário giovanni.santos@cabonatal.com.br em mx.cabonatal.com.br. Ao inserir a senha , não é aceita...\r\n','2009-01-20','192.168.0.147','11:01:07','Reiniciado a máquina!','Edluise'),('Fabiana','Relacionamento','244','Razóavel','Recebimento de e-mails','Desde dia 16/01/09 que não está sendo possível o recebimento de e-mails da máquina da recepção. Gostaria de uma análise in-loco. \r\nP.S - Favor verificar também o acesso ao Spark.','2009-01-22','192.168.0.199','14:49:22','Resolvido com a nova conta de email','Edluise'),('Fabiana','Relacionamento','244','Muito Grave','Impressora de fichas','A impressão de fichas da recepção está imprimindo sem a tinta. \r\nModelo Impressora: BEMATECH \r\nObs.: Foi feita troca da fita impressora menos de 15 dias.','2009-01-23','192.168.0.199','14:32:35','Problema do usuário!','Edluise'),('Ubiratan','RH','220','Muito Grave','Outlook não abre.','Desde ontem estamos sem e-mail.','2009-01-23','192.168.0.151','16:06:14','Troca da nomeclatura do servidor de \'emails\' ','Gledson'),('Kaline Santos','Comercial','327','Razóavel','Impressora desconfigurada','Necessito que a impressora do setor administrativo seja configurada ao meu PC.','2009-01-27','192.168.0.126','10:05:28','Configurando a impressora.','Gledson'),('Edite','RH','232','Razóavel','E-mail ','configuração do e-mail.','2009-01-27','192.168.0.151','10:20:42','Configurando-o.','Edluise'),('Rose','Relacionamento','276','Pouca','maquina nao funciona','Minha maquina nao sai da tela preta!!! Apos colocar senha do windos fica pedindo enter. ','2009-01-28','192.168.0.182','13:42:57','Foi adicionado um cabo flat, pois só havia um para o HD e o driva de CD/DVD.','Gledson'),('Cynthia Diniz ','Comercial','279','Muito Grave','Lentidão na maquina.','Esta com muita lentidão em seu PC.','2009-01-28','192.168.0.126','13:48:25','Limpeza de arquivos temporários e registros. Também foi processado desfragmentador.','Edluise'),('Eid Victor','Suporte','-','Pouca','Recuperação da inbox','Após a mudança do servidor de e-mail, minha inbox foi regravada, fazendo com que várias subpastas dentro desta sumissem. Já foi visto por Caio que esta estrutura antiga está no backup deste servidor, basta migrar para a nova estrutura.','2009-01-28','192.168.0.146','14:38:45','Feito','Edluise'),('Kaline Santos','Comercial','327','Muito Grave','Intalar o PDF Creator','Necessito da instalação deste programa em minha maquina para que eu possa salvar e enviar via e-mail resumo de faturas para os assinantes.','2009-01-29','192.168.0.126','08:52:35','Instalando e configurando o executável do PDF Creator, posteriormente, configurando a impressora PDF Creator como padrão. ','Gledson'),('Edluise Costa','AdmRedes','318','Muito Grave','Máquina de Cássia','Formatar a máquina de cássia, não têm como trabalhar com a máquina no estado atual. Lembrar de fazer backup dos arquivos.','2009-02-02','192.168.0.249','10:01:33','O Backup dos arquivos e dos emails foram feitos, a maquina já foi formatada e, em seguida, reinstalado o sistema operacional.','Gledson'),('Edluise Costa','AdmRedes','318','Razóavel','Backup','Configurar o cliente de backup ( rsyncd.conf ) na máquina de geovanni, por algum motivo o backup não está sendo feito. Error connecting to module bupgiovanni at giovanni:873: Unknown module \'bupgiovanni\'\r\n','2009-02-03','192.168.0.249','08:17:33','Configurado o cliente de rsync','Edluise'),('Ubiratan','RH','220','Muito Grave','site','Solicito o acesso ao site https://www.caged.gov.br/index.html\r\nhaja visto necessitar atualizar o arquivo caged.','2009-02-03','192.168.0.151','08:17:40','Resolvido','Edluise'),('Viviane','SAC','252','Pouca','lentidao','para todos os programas abertos fica lento e hoje apresentou conflito de IP.','2009-02-03','192.168.0.107','13:58:03','A maquina foi substituida por outra que havia, lá mesmo, no sac. ','Gledson'),('Ricardo Peixoto','SAC','252','Muito Grave','Máquinas sem logar na rede','Possuímos dois (02) PCs sem acessar ao domínio da rede. Mensagem do sistema: Log cheio','2009-02-04','192.168.0.166','09:06:42','Resolvido','Edluise'),('jacqueline','Comercial','244','Muito Grave','Computador nao realiza boot.','Windows não carrega, informa que possui arquivo corrompido do System 32.','2009-02-04','192.168.0.199','10:27:57','Reparou-se o S.O. com o cd de reintalação. ','Gledson'),('Cynthia Diniz','Administrativo','279','Razóavel','Impressora','Máquina não responde ao pedir impressão.','2009-02-04','192.168.0.194','12:51:54','Ocorreu algum tipo de problema lógico entre a máquina e a impressora, mas após pedir para imprimir uma página de teste ele funcionou normalmente.\r\n','Gledson'),('Eid Victor','Engenharia','0','Pouca','IP','Recadastrar o MAC da minha máquina em meu nome (se for necessário)\r\n\r\n00:15:C5:1B:C7:4B','2009-02-09','192.168.0.146','08:39:45','Feito','Edluise'),('Fabiana','Relacionamento','268','Muito Grave','Log de segurança.','Bom dia,\r\n\r\nFavor verificar a mesa 03 - ShowRoom, pois o LOG de Segurança está informando que está cheio.','2009-02-09','192.168.0.187','08:41:55','Limpado','Edluise'),('Ricardo Peixoto','SAC','252','Muito Grave','Máquinas sem logar na rede','Possuímos dois (02) PCs sem acessar ao domínio da rede. Mensagem do sistema: Log cheio','2009-02-09','192.168.0.166','09:21:17','Resolvido em uma das maquinas, a outra maquina ficou na bancada de testes, pois não entrava nem no win.','Edluise'),('Fabiano Melo','Engenharia','229','Muito Grave','E-MAIL DE ALERTAS, SIIC INDISPONÍVEL','Senhores, além dos problemas de acesso à maquina do sistema de inserção de comercias SIIC, relato outros problemas ocorridos, com as alterações de direcionamento (não perguntem quais alterações). Ontem o acesso foi restablecido, porém a comunicação da máquina com as planificações está fora, ou seja, os comerciais pautados via web, não estão disponíveis para associar os comerciais editados. Sendo assim nada será veiculado. Sempre que isso ocorre, possivelmente há  uma falha na comunicação entre o','2009-02-10','192.168.0.251','15:58:19','resolvido','Edluise'),('Kaline Santos','Comercial','327','Muito Grave','Lentidão na maquina.','Lentidão no pc para qualquer tarefa, travando e tendo que reiniciado o tempo todo.','2009-02-11','192.168.0.126','08:20:08','Apenas lentidão com o Aleator.','Gledson'),('Kaline Santos','Comercial','327','Muito Grave','IMPRESSORA','Verificar impressora.','2009-02-11','192.168.0.126','08:22:34','Problema com o Aleator, mas já foi solucionado por Clebson.','Gledson'),('kligw fernandes','Engenharia','235','Razóavel','Sm enviar email e barulho na CPU','\r\n1- Estou sem enviar email;\r\n2- A CPU de Rodolfo está fazendo um barulho insuportável durante todo o expediente.\r\n\r\nFavor verificar, \r\n\r\nAtenciosamente,\r\n\r\nKligw Fernandes','2009-02-11','192.168.0.161','14:13:12','Colocado o mx no lugar do 0.3','Edluise'),('Kligw Fernandes','Engenharia','235','Razóavel','Modificação no Sistema On Line','  Necessito da criação de dois novos tópicos no sistema on line, seriam eles: \r\n\r\nSETOR DE CONDOMÍNIOS / Solicitações de Auditorias\r\n\r\nSETOR DE CONDOMÍNIOS / Auditorias Finalizadas\r\n\r\nGrato pela atenção','2009-02-13','192.168.0.161','10:46:39','Isso é com Marcelo Barbosa!','Edluise'),('Fabiano','Engenharia','229','Razóavel','Acesso ao PC Insertor','Mais uma vez estou sem acesso à partição D do Insertor. Os caminhos antes configurados para acessar e salvar os VTs na pasta  sumiram novamente: \r\npath: \\\\Insertor\\d\\SIIC_ENCODER\r\nObs: mesmo problema do ticket anterior','2009-03-03','192.168.0.251','09:07:05','Passado para a Gerência Técnica','Edluise'),('UBIRATAN','RH','220','Razóavel','ACESSO AO SITE CAGED.GOV.BR','Necessito mensalmente enviar o caged, e sempre está bloqueado quando há necessidade de atualização. ','2009-03-03','192.168.0.151','09:07:18','Liberado temporariamente','Edluise'),('Kaline Santos','Comercial','327','Muito Grave','Impressão','Configurar impressão com urgência.','2009-03-04','192.168.1.248','09:15:00','A impressora de nome leci.cabonatal.com.br foi adicionada à maquina.','Gledson');
/*!40000 ALTER TABLE `chamadosfechados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-03-04 14:31:57
