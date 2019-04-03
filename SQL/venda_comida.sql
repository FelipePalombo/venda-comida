-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Abr-2019 às 02:39
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venda_comida`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cpf` int(11) UNSIGNED NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `endereco`, `telefone`) VALUES
(1, 'Felipe', 4294967295, 'Rua feliz', '93319729');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id_ingrediente` int(10) UNSIGNED NOT NULL,
  `nome` varchar(110) NOT NULL,
  `valor` float UNSIGNED NOT NULL,
  `data_compra` datetime NOT NULL,
  `data_validade` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ingrediente`
--

INSERT INTO `ingrediente` (`id_ingrediente`, `nome`, `valor`, `data_compra`, `data_validade`) VALUES
(1, 'Tomate', 24, '2019-04-02 00:00:00', '2022-04-02 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes_produto`
--

CREATE TABLE `ingredientes_produto` (
  `id_ingredientes_produto` int(10) UNSIGNED NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_ingrediente` int(10) UNSIGNED NOT NULL,
  `quantidade` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id_itens_venda` int(10) UNSIGNED NOT NULL,
  `id_venda` int(10) UNSIGNED NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `quantidade` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(110) NOT NULL,
  `data_feito` datetime NOT NULL,
  `data_validade` datetime NOT NULL,
  `valor` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `data_venda` datetime NOT NULL,
  `valor` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_cliente`, `data_venda`, `valor`) VALUES
(1, 0, '2019-04-16 00:00:00', 1),
(2, 0, '2019-04-16 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Indexes for table `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Indexes for table `ingredientes_produto`
--
ALTER TABLE `ingredientes_produto`
  ADD PRIMARY KEY (`id_ingredientes_produto`);

--
-- Indexes for table `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id_itens_venda`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id_ingrediente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ingredientes_produto`
--
ALTER TABLE `ingredientes_produto`
  MODIFY `id_ingredientes_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id_itens_venda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
