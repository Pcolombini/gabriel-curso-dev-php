-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Set-2021 às 19:28
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL COMMENT 'ID',
  `nome_cliente` varchar(255) NOT NULL COMMENT 'Nome',
  `telefone_cliente` varchar(255) NOT NULL COMMENT 'Telefone',
  `email_cliente` varchar(255) NOT NULL COMMENT 'E-mail',
  `exc_clliente` char(2) NOT NULL DEFAULT 'F' COMMENT 'Exclusão Lógica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `telefone_cliente`, `email_cliente`, `exc_clliente`) VALUES
(1, 'Gabriel', '(31) 4020-1512', 'gabrielhenriquesp@gmail.com', 'F'),
(2, 'Gabriel', '(31) 4020-1512', 'gabrielhenriquesp@gmail.com', 'V'),
(3, 'Izabella', '(31) 4020-1512', 'izabella@gmail.com', 'F'),
(4, 'Pedro', '(31) 4020-1512', 'pedro@gmail.com', 'V'),
(5, 'Davi', '(31) 4020-1512', 'pedro@gmail.com', 'F'),
(6, 'João', '(31) 4020-1512', 'joao@gmail.com', 'F'),
(7, 'Leandro', '(31) 4020-1512', 'leandro@gmail.com', 'F'),
(8, 'Leonardo', '(31) 4020-1512', 'leonardo@gmail.com', 'F'),
(9, 'Jeremias', '(31) 4020-1512', 'jeremias@gmail.com', 'F'),
(10, 'Claudio', '(31) 4020-1512', 'claudio@gmail.com', 'F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id_filme` int(11) NOT NULL COMMENT 'ID',
  `nome_filme` varchar(255) NOT NULL COMMENT 'Nome',
  `duracao_filme` varchar(255) NOT NULL COMMENT 'Duração',
  `fk_id_genero_generos` int(11) NOT NULL COMMENT 'Gênero',
  `qtd_estrelas` int(11) NOT NULL COMMENT 'Quantidade de Estrelas',
  `ordem_filme` int(11) DEFAULT NULL COMMENT 'Ordem'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id_filme`, `nome_filme`, `duracao_filme`, `fk_id_genero_generos`, `qtd_estrelas`, `ordem_filme`) VALUES
(1, 'Um Lugar silencioso ', '144', 1, 4, 0),
(2, 'Um Lugar silencioso 2', '141', 1, 3, 0),
(3, 'Rogai por nós', '144', 1, 4, 0),
(4, 'Jogos Mortais', '94.80000000000001', 1, 2, 0),
(5, 'A hora da sua morte', '93', 1, 2, 0),
(6, 'Doutor Sono', '135.6', 1, 4, 0),
(7, 'Invocação do Mal ', '93', 1, 3, 0),
(8, 'O Grito', '72', 1, 4, 0),
(9, 'Venom', '144', 9, 1, 0),
(10, 'Jurassic World', '141', 2, 1, 0),
(11, 'Mortal Kombat', '144', 9, 4, 0),
(12, 'Viúva Negra', '94.80000000000001', 9, 4, 0),
(13, 'O Esquadrão Suicida', '93', 9, 4, 0),
(14, 'A Guerra do Amanhã', '135.6', 1, 2, 0),
(15, 'Aquaman', '93', 9, 2, 0),
(16, 'O Predador', '72', 9, 4, 0),
(17, 'Bad Boys', '144', 3, 2, 0),
(18, 'Zumbilândia', '141', 3, 3, 0),
(19, 'Central de Inteligência', '144', 3, 4, 0),
(20, 'Sonic', '94.80000000000001', 3, 2, 0),
(21, 'Deadpool', '93', 3, 1, 0),
(22, 'Projeto X', '135.6', 3, 3, 0),
(23, 'Se beber, não case!', '93', 3, 5, 0),
(24, 'O Segredo da Cabana', '72', 3, 4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nome_genero` varchar(120) NOT NULL COMMENT 'Gênero',
  `ordem_genero` int(11) DEFAULT NULL COMMENT '11'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id_genero`, `nome_genero`, `ordem_genero`) VALUES
(1, 'Terror', 0),
(2, 'Aventura', 0),
(3, 'Comédia', 0),
(4, 'Suspense', 0),
(9, 'Ação', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacoes`
--

CREATE TABLE `locacoes` (
  `id_locacao` int(11) NOT NULL,
  `fk_id_cliente_clientes` int(11) NOT NULL COMMENT 'Cliente',
  `fk_id_filme_filmes` int(11) NOT NULL COMMENT 'Filme',
  `data_locacao` datetime DEFAULT current_timestamp() COMMENT 'Data da Locação',
  `date_devolucao_locacao` datetime DEFAULT NULL COMMENT 'Data da Devolução',
  `devolucao_realizada_locacao` char(2) NOT NULL DEFAULT 'F' COMMENT 'Devolução Realizada?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `locacoes`
--

INSERT INTO `locacoes` (`id_locacao`, `fk_id_cliente_clientes`, `fk_id_filme_filmes`, `data_locacao`, `date_devolucao_locacao`, `devolucao_realizada_locacao`) VALUES
(1, 10, 15, '2021-09-13 20:31:42', '2021-09-20 20:31:42', 'V'),
(2, 7, 6, '2021-09-01 20:32:00', '2021-09-06 20:32:00', 'V'),
(3, 3, 17, '2021-08-08 20:32:13', '2021-09-16 20:32:13', 'V'),
(4, 4, 1, '2021-09-05 20:32:29', '2021-09-19 20:32:29', 'V'),
(5, 2, 15, '2021-09-20 20:32:51', NULL, 'F'),
(6, 4, 17, '2021-09-20 20:33:05', NULL, 'F'),
(7, 9, 7, '2021-09-01 20:33:07', '2021-09-04 20:33:07', 'V'),
(8, 2, 14, '2021-09-01 20:33:25', '2021-09-05 20:33:25', 'V'),
(9, 7, 8, '2021-08-01 20:33:41', '2021-08-15 20:33:41', 'V'),
(10, 9, 4, '2021-09-01 20:34:01', '2021-09-07 20:34:01', 'V'),
(11, 4, 11, '2021-09-01 20:34:15', '2021-09-14 20:34:15', 'F'),
(34, 10, 15, '2021-09-13 20:31:42', '2021-09-20 20:31:42', 'V'),
(35, 7, 6, '2021-09-01 20:32:00', '2021-09-06 20:32:00', 'V'),
(36, 3, 16, '2021-08-08 20:32:13', '2021-09-16 20:32:13', 'V'),
(37, 4, 1, '2021-09-05 20:32:29', '2021-09-19 20:32:29', 'V'),
(38, 9, 0, '2021-09-20 20:32:51', NULL, 'F'),
(39, 1, 2, '2021-09-20 20:33:05', NULL, 'F'),
(40, 3, 12, '2021-09-01 20:33:07', '2021-09-04 20:33:07', 'V'),
(41, 2, 1, '2021-09-01 20:33:25', '2021-09-05 20:33:25', 'V'),
(42, 7, 1, '2021-08-01 20:33:41', '2021-08-15 20:33:41', 'V'),
(43, 9, 18, '2021-09-01 20:34:01', '2021-09-07 20:34:01', 'V'),
(44, 4, 2, '2021-09-01 20:34:15', '2021-09-14 20:34:15', 'F');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id_filme`),
  ADD KEY `fk_id_genero_generos` (`fk_id_genero_generos`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Índices para tabela `locacoes`
--
ALTER TABLE `locacoes`
  ADD PRIMARY KEY (`id_locacao`),
  ADD KEY `fk_id_cliente_clientes` (`fk_id_cliente_clientes`),
  ADD KEY `fk_id_filme_filmes` (`fk_id_filme_filmes`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id_filme` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `locacoes`
--
ALTER TABLE `locacoes`
  MODIFY `id_locacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `filmes`
--
ALTER TABLE `filmes`
  ADD CONSTRAINT `fk_id_genero_generos` FOREIGN KEY (`fk_id_genero_generos`) REFERENCES `generos` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `locacoes`
--
ALTER TABLE `locacoes`
  ADD CONSTRAINT `fk_id_cliente_clientes` FOREIGN KEY (`fk_id_cliente_clientes`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_filme_filmes` FOREIGN KEY (`fk_id_filme_filmes`) REFERENCES `filmes` (`id_filme`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
