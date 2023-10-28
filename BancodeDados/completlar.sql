-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Out-2023 às 20:25
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE DATABASE completlar;
use completlar;
--
-- Banco de dados: `completlar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `IdCliente` int(11) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Email` varchar(90) CHARACTER SET latin1 NOT NULL,
  `CEP` varchar(15) NOT NULL,
  `Senha` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL,
  `Nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `RG` varchar(30) CHARACTER SET latin1 NOT NULL,
  `DataNascimento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `Nome`, `Email`, `RG`, `DataNascimento`) VALUES
(1, 'Joao pedro', 'aaa@gmail.com', '111.111.111-11', '2023-10-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginadm`
--

CREATE TABLE `loginadm` (
  `Id` int(11) NOT NULL,
  `Email` varchar(60) CHARACTER SET latin1 NOT NULL,
  `Senha` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `loginadm`
--

INSERT INTO `loginadm` (`Id`, `Email`, `Senha`) VALUES
(1, 'henrique001@gmail.com', 'H123'),
(2, 'gabriel002@gmail.com', 'G456'),
(3, 'joao003@gmail.com', 'J789'),
(4, 'gabriela004@gmail.com', 'G112'),
(5, 'diogo005@gmail.com', 'D445');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginclientes`
--

CREATE TABLE `loginclientes` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `IdProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `caminho_imagem` varchar(255) NOT NULL,
  `descricao_imagem` varchar(70) NOT NULL,
  `preco` varchar(70) NOT NULL,
  PRIMARY KEY (`IdProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');
INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');INSERT INTO `produtos` (`nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES ('Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Índices para tabela `loginadm`
--
ALTER TABLE `loginadm`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `loginclientes`
--
ALTER TABLE `loginclientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);



--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `loginadm`
--
ALTER TABLE `loginadm`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `loginclientes`
--
ALTER TABLE `loginclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
