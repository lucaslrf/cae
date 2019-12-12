-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: 08-Dez-2019 às 02:49
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

CREATE DATABASE controledeespaco;

USE controledeespaco;

DROP TABLE IF EXISTS `blocos`;
CREATE TABLE IF NOT EXISTS `blocos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=big5;

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
(10, 'J', 'Decimo Bloco', NULL, NULL),
(14, 'Bloco L', 'Bloco L1', '2019-12-07 18:36:06', '2019-12-07 18:36:06'),
(15, 'M', 'Bloco M', '2019-12-07 19:52:39', '2019-12-07 19:52:39');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `coordenadores`
--

INSERT INTO `coordenadores` (`id`, `servidorId`, `dataInicial`, `cargo`, `dataFinal`, `created_at`, `updated_at`) VALUES
(1, 2, '2017-06-15', 'professor', '2017-06-15', NULL, NULL),
(2, 6, '2017-06-15', 'Auxiliar', '2017-06-15', NULL, NULL),
(3, 9, '2017-06-15', 'Tecnico em Informatica', '2017-06-15', NULL, NULL),
(4, 11, '2019-12-01', 'PROFESSOR', '2019-12-04', '2019-12-07 19:37:36', '2019-12-07 19:40:02'),
(6, 12, '2019-12-08', 'diretor', '2019-12-08', '2019-12-07 23:53:25', '2019-12-07 23:53:25');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=big5;

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
(9, '2019-09-22 21:42:08', '2019-09-22 22:42:08', '2019-07-22 22:07:42', 9, NULL, NULL),
(12, '2019-12-06 18:00:00', '2019-12-07 20:00:00', '2019-12-07 20:04:57', 16, '2019-12-07 20:04:57', '2019-12-07 20:04:57'),
(11, '2019-12-01 00:00:00', '2019-12-07 00:00:00', NULL, 11, '2019-12-07 12:07:21', '2019-12-07 12:07:21'),
(13, '2019-12-01 03:00:00', '2019-12-17 12:00:00', '2019-12-07 20:06:56', 16, '2019-12-07 20:06:56', '2019-12-07 20:06:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

DROP TABLE IF EXISTS `equipamentos`;
CREATE TABLE IF NOT EXISTS `equipamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tombo` int(10) UNSIGNED NOT NULL,
  `status` enum('DISPONIVEL','INDISPONIVEL') DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `decricao` varchar(250) DEFAULT NULL,
  `localId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_equipamento_2` (`localId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=big5;

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
(10, 10, 'INDISPONIVEL', 'monitor', '17 polegadas', 1, NULL, NULL),
(11, 12213121, 'DISPONIVEL', 'Computador 45', 'Teste', 11, '2019-12-07 18:45:29', '2019-12-07 18:45:29');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=big5;

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
(10, 'Sala 10', 'INDISPONIVEL', 1234567810, 39, 4, 1, NULL, NULL),
(11, 'Sala 20', 'DISPONIVEL', 20, 25, 14, 2, '2019-12-07 18:39:58', '2019-12-07 18:40:44'),
(12, 'Laboratorio B12', 'DISPONIVEL', 12, 12, 15, 4, '2019-12-07 19:54:45', '2019-12-07 19:54:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_02_202129_create_permissions_table', 1),
(5, '2019_12_02_202240_create_roles_table', 1),
(6, '2019_12_02_202608_create_users_permissions_table', 1),
(7, '2019_12_02_202750_create_users_roles_table', 1),
(8, '2019_12_02_202928_create_roles_permissions_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'usuario', 'usuario', NULL, NULL),
(2, 'servidor', 'servidor', NULL, NULL),
(3, 'coordenador', 'coordenador', NULL, NULL),
(4, 'bloco', 'bloco', NULL, NULL),
(5, 'local', 'local', NULL, NULL),
(6, 'equipamento', 'equipamento', NULL, NULL),
(7, 'data', 'data', NULL, NULL),
(8, 'cadastrar-reserva', 'cadastrar-reserva', NULL, NULL),
(9, 'editar-reserva', 'editar-reserva', NULL, NULL),
(10, 'autorizar-reserva', 'autorizar-reserva', NULL, NULL),
(11, 'listar-reservas', 'listar-reservas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datahoraSolicitacao` datetime NOT NULL,
  `servidorId` int(11) NOT NULL,
  `localId` int(10) UNSIGNED NOT NULL,
  `dataHoraAtualizacao` datetime DEFAULT NULL,
  `status` enum('SOLICITADO','RESERVADO','CANCELADO') DEFAULT NULL,
  `tipo` enum('DIARIO','MENSAL','SEMESTRAL') DEFAULT NULL,
  `responsavel` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `coordenadorId` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `datahoraSolicitacao`, `servidorId`, `localId`, `dataHoraAtualizacao`, `status`, `tipo`, `responsavel`, `coordenadorId`, `created_at`, `updated_at`) VALUES
(1, '2019-07-22 22:07:34', 2, 1, '2019-12-07 13:53:11', 'RESERVADO', 'DIARIO', 'Ronielli', 1, NULL, NULL),
(2, '2019-07-22 22:07:35', 2, 2, '2019-12-07 13:53:32', 'RESERVADO', 'DIARIO', 'Lucas', 1, NULL, NULL),
(3, '2019-07-22 22:07:36', 2, 3, '2019-07-22 21:42:08', 'RESERVADO', 'SEMESTRAL', 'Mateus', 1, NULL, NULL),
(4, '2019-07-22 22:07:37', 5, 4, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Marceline', 2, NULL, NULL),
(5, '2019-07-22 22:07:38', 5, 5, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Carlos', 2, NULL, NULL),
(6, '2019-07-22 22:07:39', 5, 6, '2019-07-22 21:42:08', 'RESERVADO', 'MENSAL', 'Julio', 2, NULL, NULL),
(7, '2019-07-22 22:07:40', 9, 7, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Maria', 3, NULL, NULL),
(8, '2019-07-22 22:07:41', 9, 8, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Ana', 3, NULL, NULL),
(9, '2019-07-22 22:07:42', 9, 9, '2019-07-22 21:42:08', 'SOLICITADO', 'DIARIO', 'Diego', 3, NULL, NULL),
(10, '2019-07-22 22:07:43', 2, 10, '2019-07-22 21:42:08', 'CANCELADO', 'SEMESTRAL', 'Leandro', 1, NULL, NULL),
(11, '2019-12-06 23:20:49', 10, 2, '2019-12-07 13:53:46', 'CANCELADO', 'SEMESTRAL', 'Letícia', 1, NULL, NULL),
(13, '2019-12-06 23:27:28', 10, 9, '2019-12-07 13:08:17', 'SOLICITADO', 'DIARIO', 'Letícia', 1, NULL, NULL),
(15, '2019-12-07 13:12:24', 6, 5, '2019-12-07 13:12:24', 'SOLICITADO', 'DIARIO', 'Lucas', 2, NULL, NULL),
(16, '2019-12-07 20:02:03', 12, 12, '2019-12-08 00:40:15', 'RESERVADO', 'DIARIO', 'Letícia', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', NULL, NULL),
(2, 'coordenador', 'Coordenador', NULL, NULL),
(3, 'servidor', 'Servidor', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles_permissions`
--

DROP TABLE IF EXISTS `roles_permissions`;
CREATE TABLE IF NOT EXISTS `roles_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `roles_permissions_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(3, 7),
(3, 8),
(3, 9),
(3, 11);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=big5;

--
-- Extraindo dados da tabela `servidores`
--

INSERT INTO `servidores` (`id`, `siape`, `usuarioId`, `nome`, `CPF`, `telefone`, `tipo`, `created_at`, `updated_at`) VALUES
(1, '000000001', 1, 'admin', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(2, '000000002', 2, 'Lucas de Jesus', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(3, '000000003', 5, 'Maria de Araujo', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(4, '000000004', 9, 'Lia Lima', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(5, '000000005', 10, 'Louro jose', '12345678911', '123456789113', 'DOCENTE', NULL, NULL),
(6, '000000006', 11, 'Ana Paula', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, NULL),
(7, '000000007', 12, 'Ana Costa', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, NULL),
(8, '000000008', 13, 'Carlos de Jesus', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, NULL),
(9, '000000009', 14, 'Ronielli Oliveira', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, NULL),
(10, '000000010', 3, 'Jorge jesus', '12345678911', '123456789113', 'TECNICO ADMINISTRATIVO', NULL, '2019-12-06 22:22:11'),
(11, '323456', 16, 'Jacqueline de Jesus de j', '04818374504', '77988371641', 'DOCENTE', '2019-12-07 19:36:49', '2019-12-07 19:36:49'),
(12, '323456', 17, 'Lucas Porto', '04818374504', '77988371641', 'TECNICO ADMINISTRATIVO', '2019-12-07 19:57:17', '2019-12-07 19:57:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$2ZSm5BmNQWnzTvFdBu8eyudsYlkBLuljB3wUzvYoxL1CQCszI67Fq', 'wxeDXtriIfb1q73pTmw5rz5c24iUwW9Zqw0aiatWrdHiJ6VHYnIrfrFgtJqi', '2019-12-03 00:14:02', '2019-12-03 00:14:02'),
(2, 'Lucas de Jesus', 'lucasdejesus@mail.com', NULL, '$2y$10$2ZSm5BmNQWnzTvFdBu8eyudsYlkBLuljB3wUzvYoxL1CQCszI67Fq', 'skvkWDr0zNoYtnPqzJkcRmcFfXJcbstnPivsyxlzvjPEUZMRPcn5HmdTh61v', '2019-12-03 00:20:29', '2019-12-03 00:20:29'),
(3, 'Jorge jesus', 'jorgejesus@mail.com', NULL, '$2y$10$2ZSm5BmNQWnzTvFdBu8eyudsYlkBLuljB3wUzvYoxL1CQCszI67Fq', 'sQHZq8kwEC5Bxy9K9DzTizF6VGaikcBzhbZkKyPxBvpu74IBs4MWiEva8nzx', '2019-12-03 00:23:28', '2019-12-03 00:23:28'),
(5, 'Maria de Araujo', 'mariaaraujo@gmail.com', NULL, '$2y$10$nospoBxh7.xDdG7P4Q2.aOsV0lgESLcKXWcGBpBwx7gu5psqHlHJm', 'JkKnHCw37ljlY7Nrhlw9MzU6FNyhaLEhREiUMiMdkW8tywENFAee5jWnxAbj', '2019-12-03 17:01:58', '2019-12-03 17:14:06'),
(10, 'Lia Lima', 'lialima@yahoo.com.br', NULL, '$2y$10$CSB06/HnAfKP0Dta.b5qyuOXxHRCmkcEK1Jw/11QIWvxE0bbeFs7e', NULL, '2019-12-03 18:19:35', '2019-12-03 18:19:35'),
(9, 'Louro jose', 'lourojose@outlook.com', NULL, '$2y$10$UsNUdJcFQ8DUDY8elUbvZesA64VFSM.KgS3WfxzGuPAbo7.rH8lZ2', '5JsCXchEm11gDhyQEJhahkV0DSbqzuRUXkPdd16wFCDlMFYhme7MTwFNwMRK', '2019-12-03 18:17:40', '2019-12-03 18:17:40'),
(11, 'Ana Paula', 'anapaula@mail.com', NULL, '$2y$10$2ZSm5BmNQWnzTvFdBu8eyudsYlkBLuljB3wUzvYoxL1CQCszI67Fq', 'rzRcZSgk4XqozU80AxcRzqGpteb3l1yVoAknE5ahKWFPBJJ671dtQQEt5JR0', '2019-12-03 00:23:28', '2019-12-03 00:23:28'),
(12, 'Ana Costa', 'anacosta@gmail.com', NULL, '$2y$10$nospoBxh7.xDdG7P4Q2.aOsV0lgESLcKXWcGBpBwx7gu5psqHlHJm', 'JkKnHCw37ljlY7Nrhlw9MzU6FNyhaLEhREiUMiMdkW8tywENFAee5jWnxAbj', '2019-12-03 17:01:58', '2019-12-03 17:14:06'),
(13, 'Carlos de Jesus', 'carlosdejesus@yahoo.com.br', NULL, '$2y$10$CSB06/HnAfKP0Dta.b5qyuOXxHRCmkcEK1Jw/11QIWvxE0bbeFs7e', NULL, '2019-12-03 18:19:35', '2019-12-03 18:19:35'),
(14, 'Ronielli Oliveira', 'roniellioliveira@outlook.com', NULL, '$2y$10$UsNUdJcFQ8DUDY8elUbvZesA64VFSM.KgS3WfxzGuPAbo7.rH8lZ2', '5JsCXchEm11gDhyQEJhahkV0DSbqzuRUXkPdd16wFCDlMFYhme7MTwFNwMRK', '2019-12-03 18:17:40', '2019-12-03 18:17:40'),
(15, 'Edileuza Aparecida', 'edileuza@gmail.com', NULL, '$2y$10$0iT.KOxMGwXznjhLuW6JTOl1F1MH2KR7fRCVIm8G3.yc2rdPKQN2a', NULL, '2019-12-07 22:46:04', '2019-12-07 22:46:04'),
(16, 'Jacqueline de Jesus de j', 'jac@gmail.com', NULL, '$2y$10$0iT.KOxMGwXznjhLuW6JTOl1F1MH2KR7fRCVIm8G3.yc2rdPKQN2a', NULL, '2019-12-07 22:47:20', '2019-12-07 22:33:07'),
(17, 'Lucas Porto', 'lucasporto@gmail.com', NULL, '$2y$10$0iT.KOxMGwXznjhLuW6JTOl1F1MH2KR7fRCVIm8G3.yc2rdPKQN2a', NULL, '2019-12-07 22:56:54', '2019-12-07 22:58:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE IF NOT EXISTS `users_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `users_roles_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`, `updated_at`, `created_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(11, 2, NULL, NULL),
(14, 2, '2019-12-03 15:17:40', '2019-12-03 15:17:40'),
(3, 3, '2019-12-03 15:19:35', '2019-12-03 15:19:35'),
(5, 3, NULL, NULL),
(9, 3, NULL, NULL),
(10, 3, NULL, NULL),
(12, 3, NULL, NULL),
(13, 3, NULL, NULL),
(15, 3, '2019-12-07 19:46:04', '2019-12-07 19:46:04'),
(16, 2, '2019-12-07 19:33:07', '2019-12-07 19:33:07'),
(17, 2, '2019-12-07 23:52:44', '2019-12-07 23:52:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
