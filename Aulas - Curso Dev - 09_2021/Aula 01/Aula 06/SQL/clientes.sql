-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Set 20, 2021 alle 16:38
-- Versione del server: 8.0.26-0ubuntu0.20.04.2
-- Versione PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdevs`
--

--
-- Dump dei dati per la tabella `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `email_cliente`, `cpf_cliente`, `data_cadastro_cliente`, `ativo_cliente`) VALUES
(1, 'Corrumpitur politicis', 'corrumpitur@politicis.co.jp', '01234567890', '2021-09-20', 'V'),
(2, 'Quid igitur est solutio', 'igitur.est@solutio.gov.co', '12345678909', '2021-09-18', 'F'),
(3, 'Corrumpitur politicis', 'corrumpitur@politicis.co.jp', '01234567890', '2021-09-14', NULL),
(4, 'Quid igitur est solutio', 'igitur.est@solutio.gov.co', '12345678909', '2021-09-20', 'F'),
(5, 'Quid igitur est solutio', 'igitur.est@solutio.gov.jp', '12345678909', '2021-09-20', 'V'),
(6, 'Corrumpitur politicis', 'corrumpitur@politicis.co.fr', '01234567890', '2021-09-14', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
