-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: 30-Nov-2019 às 20:34
-- Versão do servidor: 5.7.24
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controledeespaco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `blocos`
--

DROP TABLE IF EXISTS `blocos`;
CREATE TABLE IF NOT EXISTS `blocos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `blocos`
--

INSERT INTO `blocos` (`id`, `nome`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Primeiro Bloco', NULL, '2019-11-30 20:20:43'),
(2, 'B', 'Segundo Bloco', NULL, NULL),
(3, 'C', 'Terceiro Bloco', NULL, NULL),
(4, 'D', 'Quarto Bloco', NULL, NULL),
(5, 'E', 'Quinto Bloco', NULL, NULL),
(6, 'F', 'Sexto Bloco', NULL, NULL),
(7, 'G', 'Setimo Bloco', NULL, NULL),
(8, 'H', 'Oitavo Bloco', NULL, NULL),
(9, 'I', 'Nono Bloco', NULL, NULL),
(10, 'J', 'Decimo Bloco', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenadores`
--

DROP TABLE IF EXISTS `coordenadores`;
CREATE TABLE IF NOT EXISTS `coordenadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servidorId` int(11) NOT NULL,
  `dataInicial` date DEFAULT NULL,
  `cargo` varchar(150) DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `coordenadores`
--

INSERT INTO `coordenadores` (`id`, `servidorId`, `dataInicial`, `cargo`, `dataFinal`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-15', 'professor', '2017-06-15', NULL, NULL),
(2, 6, '2017-06-15', 'Auxiliar', '2017-06-15', NULL, NULL),
(3, 10, '2017-06-15', 'Tecnico em Informatica', '2017-06-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `datas`
--

DROP TABLE IF EXISTS `datas`;
CREATE TABLE IF NOT EXISTS `datas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dataHoraInicial` datetime DEFAULT NULL,
  `dataHoraFinal` datetime DEFAULT NULL,
  `datahoraSolicitacao` datetime DEFAULT NULL,
  `reservaId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `datas`
--

INSERT INTO `datas` (`id`, `dataHoraInicial`, `dataHoraFinal`, `datahoraSolicitacao`, `reservaId`, `created_at`, `updated_at`) VALUES
(1, '2019-07-22 21:42:08', '2019-07-22 22:42:08', '2019-07-22 22:07:34', 1, NULL, NULL),
(2, '2019-08-22 21:42:08', '2019-08-22 22:42:08', '2019-07-22 22:07:34', 1, NULL, NULL),
(3, '2019-09-22 21:42:08', '2019-09-22 22:42:08', '2019-07-22 22:07:34', 1, NULL, NULL),
(4, '2019-07-22 21:42:08', '2019-07-22 22:42:08', '2019-07-22 22:07:38', 5, NULL, NULL),
(5, '2019-08-22 21:42:08', '2019-08-22 22:42:08', '2019-07-22 22:07:38', 5, NULL, NULL),
(6, '2019-09-22 21:42:08', '2019-09-22 22:42:08', '2019-07-22 22:07:38', 5, NULL, NULL),
(7, '2019-07-22 21:42:08', '2019-07-22 22:42:08', '2019-07-22 22:07:42', 9, NULL, NULL),
(8, '2019-08-22 21:42:08', '2019-08-22 22:42:08', '2019-07-22 22:07:42', 9, NULL, NULL),
(9, '2019-09-22 21:42:08', '2019-09-22 22:42:08', '2019-07-22 22:07:42', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

DROP TABLE IF EXISTS `equipamentos`;
CREATE TABLE IF NOT EXISTS `equipamentos` (
  `id` int(11) NOT NULL,
  `tombo` int(10) UNSIGNED NOT NULL,
  `status` enum('DISPONIVEL','INDISPONIVEL') DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `decricao` varchar(250) DEFAULT NULL,
  `localId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_equipamento_2` (`localId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `equipamentos`
--

INSERT INTO `equipamentos` (`id`, `tombo`, `status`, `nome`, `decricao`, `localId`, `created_at`, `updated_at`) VALUES
(1, 1, 'DISPONIVEL', 'mesa de som', 'quatro canais', 1, NULL, NULL),
(2, 2, 'DISPONIVEL', 'caixa de som', '', 1, NULL, NULL),
(3, 3, 'DISPONIVEL', 'projetor', '', 1, NULL, NULL),
(4, 4, 'DISPONIVEL', 'microfone', 'com fio', 6, NULL, NULL),
(5, 5, 'DISPONIVEL', 'passador de slides', '', 6, NULL, NULL),
(6, 6, 'DISPONIVEL', 'notebook', 'com hdmi', 6, NULL, NULL),
(7, 7, 'DISPONIVEL', 'cabo de audio', 'p2', 9, NULL, NULL),
(8, 8, 'DISPONIVEL', 'computador', 'cori5', 9, NULL, NULL),
(9, 9, 'DISPONIVEL', 'pendrive', '4 gigas', 9, NULL, NULL),
(10, 10, 'INDISPONIVEL', 'monitor', '17 polegadas', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

DROP TABLE IF EXISTS `locais`;
CREATE TABLE IF NOT EXISTS `locais` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `status` enum('DISPONIVEL','INDISPONIVEL') DEFAULT NULL,
  `numeroChave` int(10) UNSIGNED DEFAULT NULL,
  `capacidade` int(10) UNSIGNED DEFAULT NULL,
  `blocoId` int(10) UNSIGNED DEFAULT NULL,
  `coordenadorId` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_local_2` (`blocoId`),
  KEY `FK_local_3` (`coordenadorId`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id`, `nome`, `status`, `numeroChave`, `capacidade`, `blocoId`, `coordenadorId`, `created_at`, `updated_at`) VALUES
(1, 'Sala 1', 'DISPONIVEL', 1234567801, 30, 1, 1, NULL, NULL),
(2, 'Sala 2', 'DISPONIVEL', 1234567802, 31, 1, 1, NULL, NULL),
(3, 'Sala 3', 'DISPONIVEL', 1234567803, 32, 1, 1, NULL, NULL),
(4, 'Sala 4', 'DISPONIVEL', 1234567804, 33, 2, 2, NULL, NULL),
(5, 'Sala 5', 'DISPONIVEL', 1234567805, 34, 2, 2, NULL, NULL),
(6, 'Sala 6', 'DISPONIVEL', 1234567806, 35, 2, 2, NULL, NULL),
(7, 'Sala 7', 'DISPONIVEL', 1234567807, 36, 3, 3, NULL, NULL),
(8, 'Sala 8', 'DISPONIVEL', 1234567808, 37, 3, 3, NULL, NULL),
(9, 'Sala 9', 'DISPONIVEL', 1234567809, 38, 3, 3, NULL, NULL),
(10, 'Sala 10', 'INDISPONIVEL', 1234567810, 39, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL,
  `datahoraSolicitacao` datetime NOT NULL,
  `servidorId` int(11) NOT NULL,
  `localId` int(10) UNSIGNED NOT NULL,
  `dataHoraAtualizacao` datetime DEFAULT NULL,
  `status` enum('SOLICITADO','RESERVADO','CANCELADO') DEFAULT NULL,
  `tipo` enum('DIARIO','MENSAL','SEMESTRAL') DEFAULT NULL,
  `responsavel` varchar(150) DEFAULT NULL,
  `coordenadorId` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `datahoraSolicitacao`, `servidorId`, `localId`, `dataHoraAtualizacao`, `status`, `tipo`, `responsavel`, `coordenadorId`, `created_at`, `updated_at`) VALUES
(1, '2019-07-22 22:07:34', 2, 1, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Ronielli', 1, NULL, NULL),
(2, '2019-07-22 22:07:35', 2, 2, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Lucas', 1, NULL, NULL),
(3, '2019-07-22 22:07:36', 2, 3, '2019-07-22 21:42:08', 'RESERVADO', 'SEMESTRAL', 'Mateus', 1, NULL, NULL),
(4, '2019-07-22 22:07:37', 5, 4, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Marceline', 6, NULL, NULL),
(5, '2019-07-22 22:07:38', 5, 5, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Carlos', 6, NULL, NULL),
(6, '2019-07-22 22:07:39', 5, 6, '2019-07-22 21:42:08', 'RESERVADO', 'MENSAL', 'Julio', 6, NULL, NULL),
(7, '2019-07-22 22:07:40', 9, 7, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Maria', 10, NULL, NULL),
(8, '2019-07-22 22:07:41', 9, 8, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Ana', 10, NULL, NULL),
(9, '2019-07-22 22:07:42', 9, 9, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Diego', 10, NULL, NULL),
(10, '2019-07-22 22:07:43', 2, 10, '2019-07-22 21:42:08', 'CANCELADO', 'SEMESTRAL', 'Leandro', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidores`
--

DROP TABLE IF EXISTS `servidores`;
CREATE TABLE IF NOT EXISTS `servidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siape` varchar(10) NOT NULL,
  `usuarioId` int(11) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `tipo` enum('DOCENTE','TECNICO ADMINISTRATIVO') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `servidores`
--

INSERT INTO `servidores` (`id`, `siape`, `usuarioId`, `nome`, `CPF`, `telefone`, `tipo`, `created_at`, `updated_at`) VALUES
(1, '000000001', 123456, 'Jose Mario', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(2, '000000002', 123456, 'Lucas de Jesus', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(3, '000000003', 123456, 'Maria de Araujo', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(4, '000000004', 123456, 'Lia Lima', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(5, '000000005', 123456, 'Louro jose', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(6, '000000006', 123456, 'Ana Paula', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, NULL),
(7, '000000007', 123456, 'Ana Costa', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, NULL),
(8, '000000008', 123456, 'Carlos de Jesus', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, NULL),
(9, '000000009', 123456, 'Ronielli Oliveira', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, NULL),
(10, '000000010', 123456, 'Pablo Matos', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
