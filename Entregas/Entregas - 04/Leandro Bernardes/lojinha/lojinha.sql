-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 28-Set-2021 às 20:53
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojinha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `cpf_cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`id_cliente`, `nome_cliente`, `cpf_cliente`) VALUES
(1, 'Leandro', '98799967854');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_compras`
--

CREATE TABLE `tbl_compras` (
  `id_compra` int(11) NOT NULL,
  `fk_id_cliente_clientes` int(11) NOT NULL,
  `fk_id_produto_produtos` int(11) NOT NULL,
  `fk_id_frete_fretes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fretes`
--

CREATE TABLE `tbl_fretes` (
  `id_frete` int(11) NOT NULL,
  `nome_frete` varchar(255) NOT NULL,
  `valor_frete` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_fretes`
--

INSERT INTO `tbl_fretes` (`id_frete`, `nome_frete`, `valor_frete`) VALUES
(1, 'Correios', '0.00'),
(2, 'Jadlog', '0.00'),
(3, 'TNT', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produtos`
--

CREATE TABLE `tbl_produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `valor_produto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_produtos`
--

INSERT INTO `tbl_produtos` (`id_produto`, `nome_produto`, `valor_produto`) VALUES
(1, 'PS4', '2400.00'),
(2, 'SWITCH', '1200.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `tbl_compras`
--
ALTER TABLE `tbl_compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_id_cliente_clientes` (`fk_id_cliente_clientes`),
  ADD KEY `fk_id_produto_produtos` (`fk_id_produto_produtos`),
  ADD KEY `fk_id_frete_fretes` (`fk_id_frete_fretes`);

--
-- Índices para tabela `tbl_fretes`
--
ALTER TABLE `tbl_fretes`
  ADD PRIMARY KEY (`id_frete`);

--
-- Índices para tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_compras`
--
ALTER TABLE `tbl_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_fretes`
--
ALTER TABLE `tbl_fretes`
  MODIFY `id_frete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_compras`
--
ALTER TABLE `tbl_compras`
  ADD CONSTRAINT `fk_id_cliente_clientes` FOREIGN KEY (`fk_id_cliente_clientes`) REFERENCES `tbl_clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_frete_fretes` FOREIGN KEY (`fk_id_frete_fretes`) REFERENCES `tbl_fretes` (`id_frete`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_produto_produtos` FOREIGN KEY (`fk_id_produto_produtos`) REFERENCES `tbl_produtos` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
