-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: mysql10.uni5.net
-- Tempo de Geração: Mar 11, 2011 as 07:09 PM
-- Versão do Servidor: 5.1.56
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `multclick04`
--
CREATE DATABASE `multclick04` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `multclick04`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` enum('Admin') NOT NULL DEFAULT 'Admin',
  `login` varchar(25) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `tipo_usuario`, `login`, `senha`, `ip`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(15) DEFAULT NULL,
  `id_oferta` int(20) NOT NULL,
  `nota` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_usuario_oferta_UNIQUE` (`id_usuario`,`id_oferta`),
  KEY `fk_avaliacao_usuario` (`id_usuario`),
  KEY `fk_avaliacao_oferta` (`id_oferta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `avaliacao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `ban`
--

CREATE TABLE IF NOT EXISTS `ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) DEFAULT NULL,
  `id_usuario` int(15) DEFAULT NULL,
  `texto` text,
  `data_ban` int(10) DEFAULT NULL,
  `data_fim` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ban_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `ban`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`) VALUES
(171, 'Cataratas do Niágara'),
(133, 'Mossoró'),
(109, 'Natal'),
(169, 'Nova York'),
(170, 'Pernambuco'),
(140, 'Rio de Janeiro'),
(139, 'SÃ£o Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(20) NOT NULL,
  `id_usuario` int(15) NOT NULL,
  `id_oferta` int(20) NOT NULL,
  `texto` text NOT NULL,
  `data` int(10) NOT NULL,
  `aprovado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_comentario_usuario` (`id_usuario`),
  KEY `fk_comentario_oferta` (`id_oferta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentario`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `convite`
--

CREATE TABLE IF NOT EXISTS `convite` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(15) NOT NULL,
  `id_pedido` int(15) DEFAULT NULL,
  `id_usuario_convidado` varchar(25) NOT NULL,
  `data_cadastro` int(10) NOT NULL,
  `status` enum('Aguardando compra','Aguardando aprovação da compra','Sucesso','Compra cancelada') NOT NULL,
  `data_compra` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_usuario_convidado` (`id_usuario_convidado`),
  KEY `fk_convite_usuario` (`id_usuario`),
  KEY `fk_convite_oferta` (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `convite`
--

INSERT INTO `convite` (`id`, `id_usuario`, `id_pedido`, `id_usuario_convidado`, `data_cadastro`, `status`, `data_compra`) VALUES
(1, 8, NULL, '11', 1297385523, 'Aguardando compra', NULL),
(2, 12, NULL, '12', 1297385701, 'Aguardando compra', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE IF NOT EXISTS `cupom` (
  `id` varchar(20) NOT NULL,
  `id_pedido` int(15) NOT NULL,
  `data` int(10) NOT NULL,
  `usado` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('Disponível','Indisponível') NOT NULL DEFAULT 'Indisponível',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_pedido` (`id_pedido`),
  KEY `fk_cupom_pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cupom`
--

INSERT INTO `cupom` (`id`, `id_pedido`, `data`, `usado`, `status`) VALUES
('59L8YWNH', 49, 1297996985, 0, 'Disponível');

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `data` int(10) NOT NULL,
  `confirmado` tinyint(1) NOT NULL DEFAULT '0',
  `inscricao_cancelada` tinyint(1) NOT NULL DEFAULT '0',
  `telefone` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_cidade_UNIQUE` (`email`,`id_cidade`),
  KEY `fk_newsletter_cidade` (`id_cidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `id_cidade`, `data`, `confirmado`, `inscricao_cancelada`, `telefone`, `nome`) VALUES
(23, 'asdasd@asdasdasd.com', 133, 1297971028, 0, 0, NULL, NULL),
(24, 'rafbgarcia@gmail.com', 133, 1297971051, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_parceiro` int(10) DEFAULT NULL,
  `id_cidade` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `destaques` text,
  `regras` text NOT NULL,
  `bonus` tinyint(1) NOT NULL DEFAULT '0',
  `M_preco_normal` decimal(10,2) NOT NULL,
  `M_preco_oferta` decimal(10,2) NOT NULL,
  `cupons_por_pessoa` tinyint(3) NOT NULL,
  `D_data_inicio` int(10) NOT NULL,
  `D_data_fim` int(10) NOT NULL,
  `D_cupom_expira` int(10) NOT NULL,
  `minimo_compradores` int(5) NOT NULL,
  `maximo_compradores` int(10) NOT NULL,
  `numero_atual_compradores` int(10) NOT NULL DEFAULT '0',
  `status` enum('Ativo','Encerrada','Mínimo não atingido','Máximo Atingido','Inativo','Recomeçar','Cancelada') NOT NULL,
  `pessoas_espera` int(10) DEFAULT '0',
  `imagens` text,
  `informacoes` text,
  `descricao` text NOT NULL,
  `imagem_cupom` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_oferta_parceiro` (`id_parceiro`),
  KEY `fk_oferta_cidade` (`id_cidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `oferta`
--

INSERT INTO `oferta` (`id`, `id_parceiro`, `id_cidade`, `titulo`, `destaques`, `regras`, `bonus`, `M_preco_normal`, `M_preco_oferta`, `cupons_por_pessoa`, `D_data_inicio`, `D_data_fim`, `D_cupom_expira`, `minimo_compradores`, `maximo_compradores`, `numero_atual_compradores`, `status`, `pessoas_espera`, `imagens`, `informacoes`, `descricao`, `imagem_cupom`) VALUES
(17, 17, 109, 'Coleção 4 cervejas Weihenstephen 500ml, de R$63,40 por R$30,20 ', '1 Tratamento Capilar Completo com Bulbo Raiz (10 Sessões) + 1 Higienização do Couro Cabeludo + 1 Hidratação + 1 Massagem com Tônico para Fortalecimento do Bulbo + 1 Massagem Finalizadora + 1 Avaliação Inicial, + 1 Avaliação Final, de R$600 por R$210, no Tok´s e Retok´s Cabeleireiro\r\n \r\nVálido de terça a sábado das 9h às 16h\r\n\r\nA oferta dá direito a avaliação inicial e final\r\n\r\nMáximo de 400 groupons para venda\r\n\r\nExcelente localização, fica no bairro de Capim Macio', '2 groupons por pessoa, válido por 8 meses\r\n \r\nÉ preciso fazer agendamento prévio pelo tel.: (84)3217-0917', 0, '60.40', '30.20', 2, 1297998000, 1298343600, 1305860400, 10, 100, 5, 'Encerrada', 1, 'sample_vitrine.png,sample_vitrine.png,', '', 'subway Ã© massa', 'sample_img.jpg,'),
(18, 11, 109, 'Pizzaria Reis Magos ', 'sadf', 'valido atÃ© tantantantan', 1, '15000.00', '15.00', 1, 1296874800, 1298689200, 1306033200, 101, 2001, 0, 'Encerrada', 0, 'hannah.jpg,', 'sadfsadf', 'Rodizio 90% off de R$ 15,00 por 1,50', 'eu_pequeno2.jpg,'),
(19, 11, 109, 'ddsf', '', '', 0, '123.00', '0.00', 1, 1296700500, 1297046102, 1304305200, 10, 200, 0, 'Encerrada', 0, '', '', '', NULL),
(21, 11, 171, 'ASDd', 'asd', 'asd', 0, '1.23', '1.23', 1, 1296701375, 1297046977, 1304305200, 10, 200, 0, 'Encerrada', 0, 'eu_pequeno.jpg,eu_pequeno2.jpg,hannah.jpg,eu_pequeno2.jpg,', 'asd', 'asd', NULL),
(22, 11, 133, 'ASDd', 'asd', 'asd', 0, '1.23', '1.23', 1, 1296701375, 1297046977, 1304305200, 10, 200, 0, 'Encerrada', 0, 'eu_pequeno.jpg,eu_pequeno2.jpg,hannah.jpg,eu_pequeno2.jpg,', 'asd', 'asd', 'eu_pequeno.jpg,eu_pequeno2.jpg,hannah.jpg,eu_pequeno2.jpg,'),
(23, 11, 140, 'asd', '', 'asdasd', 0, '1231.23', '1.23', 1, 1296704107, 1297049710, 1304391600, 10, 200, 0, 'Encerrada', 0, 'hannah.jpg,eu_pequeno2.jpg,', '', 'asd', NULL),
(24, 11, 109, 'asd', '', 'asdasd', 0, '1231.23', '1.23', 1, 1296704107, 1297049710, 1304391600, 10, 200, 0, 'Encerrada', 0, 'hannah.jpg,eu_pequeno2.jpg,', '', 'asd', 'eu_pequeno.jpg,'),
(26, 11, 139, 'asd', '', 'asdsad', 0, '33.00', '0.00', 1, 1296788400, 1297134000, 1304478000, 10, 200, 0, 'Encerrada', 0, NULL, '', 'asd', NULL),
(27, 11, 109, 'Macarena por 100% off', 'blÃ©', 'bla ', 1, '44.00', '0.00', 1, 1296874800, 1298084400, 1304564400, 10, 200, 0, 'Encerrada', 0, 'hannah.jpg,', '', 'asd', 'niver_rani_6.jpg,'),
(28, 11, 170, 'rafa123', '', 'asd', 0, '1.00', '0.00', 1, 0, 0, 0, 10, 200, 0, 'Encerrada', 0, 'niver_rani_4.jpg,', '', 'asd', 'niver_rani_4.jpg,');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE IF NOT EXISTS `parceiro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_cidade` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `empresa` varchar(150) NOT NULL,
  `sobre` text NOT NULL,
  `cnpj` varchar(50) DEFAULT NULL,
  `razao_social` varchar(150) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` int(7) DEFAULT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `site` varchar(150) DEFAULT NULL,
  `mapa` varchar(150) NOT NULL,
  `imagens` text,
  `logo` varchar(150) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipo_usuario` enum('Parceiro') DEFAULT 'Parceiro',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_parceiro_cidade` (`id_cidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id`, `id_cidade`, `nome`, `email`, `empresa`, `sobre`, `cnpj`, `razao_social`, `rua`, `numero`, `complemento`, `cep`, `bairro`, `celular`, `telefone`, `site`, `mapa`, `imagens`, `logo`, `login`, `senha`, `tipo_usuario`) VALUES
(11, 169, 'Subway\r\n', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'asdasd', NULL, 'Parceiro'),
(16, 133, 'aosjd', 'macdonalds@macdonalds.com', 'aods', 'asid', '1209', 'aisd', 'oia', 19, 'sad', '12312-312', 'sadk', '(12) 3123-1231', '(12) 3123-1231', 'asisd', '', 'niver_rani_4.jpg,hannah.jpg,', NULL, NULL, NULL, 'Parceiro'),
(17, 109, 'Multclick', 'multclick@multclick.com.br', 'Multclick', 'Sobre a Multclick', '0000000000000', 'Razão Social', 'Av. Salgado Filho', 3003, 'Em frente ao midway', '59068-100', 'Petrópolis', '(84) 8855-8888', '(84) 3214-9000', 'www.multclick.com.br', 'mapa.jpg,', NULL, 'logo.png,', NULL, NULL, 'Parceiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_oferta` int(20) NOT NULL,
  `id_usuario` int(15) NOT NULL,
  `data_pedido` int(10) NOT NULL,
  `nome_utilizador` varchar(200) NOT NULL,
  `servico_pagamento` enum('MoIP','PagSeguro','Credito') NOT NULL,
  `forma_pagamento` varchar(200) DEFAULT NULL,
  `presente` tinyint(1) NOT NULL,
  `status` enum('Estornado','Aprovado','Em análise','Cancelado') NOT NULL,
  `pago` tinyint(1) NOT NULL DEFAULT '0',
  `data_pagamento` int(10) DEFAULT NULL,
  `id_transacao` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_oferta` (`id_oferta`),
  KEY `fk_pedido_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `id_oferta`, `id_usuario`, `data_pedido`, `nome_utilizador`, `servico_pagamento`, `forma_pagamento`, `presente`, `status`, `pago`, `data_pagamento`, `id_transacao`) VALUES
(47, 17, 14, 1297996363, 'Edluise Costa', 'MoIP', NULL, 0, 'Em análise', 0, NULL, '70NRDDLJU9SZ'),
(48, 17, 14, 1297996363, '', 'MoIP', NULL, 0, 'Em análise', 0, NULL, '70NRDDLJU9SZ'),
(49, 17, 14, 1297996885, 'Edluise Costa', 'MoIP', 'CartaoDeCredito', 0, 'Aprovado', 1, 1297996985, 'JOO5H6I2OAAE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(300) NOT NULL,
  `resposta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `perguntas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `nome_site` varchar(150) NOT NULL,
  `servidor_smtp` varchar(200) DEFAULT NULL,
  `termos_uso` text,
  `como_funciona` text,
  `texto_empresa` text,
  `texto_imprensa` text,
  PRIMARY KEY (`nome_site`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`nome_site`, `servidor_smtp`, `termos_uso`, `como_funciona`, `texto_empresa`, `texto_imprensa`) VALUES
('Compra na Cidade', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_cidade` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `senha` varchar(120) NOT NULL,
  `tipo_usuario` enum('Cliente') NOT NULL DEFAULT 'Cliente',
  `credito` int(10) NOT NULL DEFAULT '0',
  `ip` varchar(30) NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '1',
  `cpf` varchar(14) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `data_nascimento` varchar(10) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `link_unico` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  KEY `fk_usuario_cidade` (`id_cidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `id_cidade`, `email`, `login`, `senha`, `tipo_usuario`, `credito`, `ip`, `newsletter`, `cpf`, `nome`, `data_nascimento`, `telefone`, `celular`, `link_unico`) VALUES
(8, 133, 'rafbgarcia@gmail.com', NULL, '2d8d596a0b97569f9226a8c33ed9c6dbc8d88120', 'Cliente', 0, '127.0.0.1', 0, '051.977.684-44', 'Rafael Barbosa Garcia', '17/10/1990', '(84) 8141-4140', NULL, 'JDA9Z2'),
(11, 133, 'renatxinha_fbm@hotmail.com', NULL, '2d8d596a0b97569f9226a8c33ed9c6dbc8d88120', 'Cliente', 0, '127.0.0.1', 0, '083.207.084-00', 'Renata Faria Bandeira de Melo', '26/04/1989', '(84) 8141-4140', NULL, 'NMGS38'),
(12, 109, 'rafbgarcia@hotmail.com', NULL, 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'Cliente', 0, '127.0.0.1', 1, '051.977.644-57', 'pocahontas', '18/28/3123', '(84) 8141-4140', NULL, 'PDAU20'),
(14, 171, 'edluisecosta@gmail.com', NULL, '4b153095abfc01546ed7a3396a24a0ca700137aa', 'Cliente', 0, '189.124.170.100', 1, '836.937.774-20', 'Edluise Costa', '29/10/1978', '(84) 9933-1856', NULL, 'XIPEU7'),
(15, 109, 'johny21@gmail.com', NULL, 'c3b7abdf7db63d5cefa6502e6cbab508a1a18fa9', 'Cliente', 0, '189.124.149.31', 1, '064.954.644-01', 'Jônata Marcelino', '30/08/1983', '(84) 9642-6692', NULL, '9SV1YO');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliacao_oferta` FOREIGN KEY (`id_oferta`) REFERENCES `oferta` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avaliacao_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Restrições para a tabela `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `fk_ban_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_oferta` FOREIGN KEY (`id_oferta`) REFERENCES `oferta` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `convite`
--
ALTER TABLE `convite`
  ADD CONSTRAINT `fk_convite_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `fk_convite_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `cupom`
--
ALTER TABLE `cupom`
  ADD CONSTRAINT `fk_cupom_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `fk_newsletter_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `fk_oferta_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `fk_oferta_parceiro` FOREIGN KEY (`id_parceiro`) REFERENCES `parceiro` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Restrições para a tabela `parceiro`
--
ALTER TABLE `parceiro`
  ADD CONSTRAINT `fk_parceiro_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_oferta` FOREIGN KEY (`id_oferta`) REFERENCES `oferta` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
