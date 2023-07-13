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
-- Dump dei dati per la tabella `enderecos`
--

INSERT INTO `enderecos` (`id_endereco`, `fk_id_cliente_clientes`, `logradouro_endereco`, `numero_endereco`, `complemento_endereco`, `bairro_endereco`, `cidade_endereco`, `estado_endereco`) VALUES
(1, 1, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(2, 3, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(3, 1, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(4, 5, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(5, 6, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(6, 6, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(7, 3, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(8, 4, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(9, 2, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(10, 1, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT'),
(11, 6, 'Demum vero facta intervenientibus conflict', '21', NULL, 'varia vitae saeculis', 'Demum', 'VT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
