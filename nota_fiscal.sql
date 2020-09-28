-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Set-2020 às 22:53
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nota_fiscal`
--
CREATE DATABASE IF NOT EXISTS `nota_fiscal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nota_fiscal`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCli` int(11) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `sobrenome` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCli`, `nome`, `sobrenome`, `email`, `senha`) VALUES
(1, 'Jonas', 'Silva', 'jonassilva@hotmail.com', 'ABC123'),
(2, 'Matheus', 'Moselli', 'mamamoselli@hotmail.com', '123'),
(3, 'João', 'Vitor', 'joavito@fio.com', '159'),
(4, 'Cléber', 'Damacena', 'clebaodamassa@hotmail.com', '123456'),
(5, 'Marcelo', 'Moselliu', 'marcelo.moselli@hotmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_nf`
--

CREATE TABLE `itens_nf` (
  `qtde` int(11) DEFAULT NULL,
  `subtotal` decimal(7,2) DEFAULT NULL,
  `Idnf` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens_nf`
--

INSERT INTO `itens_nf` (`qtde`, `subtotal`, `Idnf`, `id`) VALUES
(5, '50.00', 3, 1),
(2, '11.98', 3, 2),
(3, '17.97', 4, 2),
(4, '40.00', 4, 1),
(2, '11.98', 5, 2),
(3, '36.00', 5, 3),
(4, '23.96', 5, 2),
(3, '17.97', 6, 2),
(1, '12.00', 6, 3),
(3, '17.97', 7, 2),
(2, '20.00', 7, 1),
(4, '18.36', 8, 4),
(1, '10.00', 8, 1),
(1, '4.59', 9, 4),
(4, '48.00', 9, 3),
(4, '23.96', 9, 2),
(5, '50.00', 9, 1),
(3, '30.00', 10, 1),
(4, '23.96', 10, 2),
(1, '12.00', 10, 3),
(3, '13.77', 10, 4),
(1, '16.00', 10, 5),
(1, '10.00', 10, 6),
(1, '7.99', 10, 7),
(1, '32.00', 10, 8),
(2, '64.00', 14, 8),
(4, '40.00', 14, 1),
(3, '30.00', 15, 6),
(1, '7.99', 15, 9),
(5, '22.95', 15, 4),
(4, '64.00', 16, 5),
(3, '23.97', 16, 9),
(4, '48.00', 17, 3),
(1, '4.59', 17, 4),
(5, '22.95', 18, 4),
(10, '59.90', 18, 2),
(3, '30.00', 19, 1),
(3, '48.00', 19, 5),
(2, '15.98', 20, 7),
(2, '20.00', 21, 6),
(3, '48.00', 21, 5),
(2, '64.00', 24, 8),
(2, '15.98', 24, 7),
(3, '23.97', 24, 7),
(4, '31.96', 25, 11),
(4, '18.36', 25, 4),
(4, '23.96', 25, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota_fiscal`
--

CREATE TABLE `nota_fiscal` (
  `Idnf` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nota_fiscal`
--

INSERT INTO `nota_fiscal` (`Idnf`, `data`, `valor_total`) VALUES
(3, '2020-09-17', '61.98'),
(4, '2020-09-17', '57.97'),
(5, '2020-09-03', '71.94'),
(6, '2020-09-08', '29.97'),
(7, '2020-09-14', '37.97'),
(8, '2020-09-04', '28.36'),
(9, '2020-09-06', '126.55'),
(10, '2020-09-09', '145.72'),
(14, '2020-09-13', '104.00'),
(15, '2020-09-02', '60.94'),
(16, '2020-09-15', '87.97'),
(17, '2020-09-02', '52.59'),
(18, '2020-09-15', '82.85'),
(19, '2020-09-02', '78.00'),
(20, '2020-09-08', '15.98'),
(21, '2020-09-01', '68.00'),
(24, '2020-09-29', '103.95'),
(25, '2020-09-03', '74.28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`) VALUES
(1, 'Leite', '10.00'),
(2, 'Laranja', '5.99'),
(3, 'Arroz', '12.00'),
(4, 'Maça', '4.59'),
(5, 'Chocolate', '16.00'),
(6, 'Ovo', '10.00'),
(7, 'Alface', '7.99'),
(8, 'Contra filé', '32.00'),
(9, 'Danoninho', '7.99'),
(10, 'Pera', '4.59'),
(11, 'Melancia', '7.99');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCli`);

--
-- Índices para tabela `itens_nf`
--
ALTER TABLE `itens_nf`
  ADD KEY `Idnf` (`Idnf`),
  ADD KEY `id` (`id`);

--
-- Índices para tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  ADD PRIMARY KEY (`Idnf`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  MODIFY `Idnf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itens_nf`
--
ALTER TABLE `itens_nf`
  ADD CONSTRAINT `itens_nf_ibfk_1` FOREIGN KEY (`Idnf`) REFERENCES `nota_fiscal` (`Idnf`),
  ADD CONSTRAINT `itens_nf_ibfk_2` FOREIGN KEY (`id`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
