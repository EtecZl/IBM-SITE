-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/11/2023 às 20:32
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `completlar`
--
CREATE DATABASE  `completlar`;
use  `completlar`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `IdCliente` int(11) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Email` varchar(90) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CEP` varchar(15) NOT NULL,
  `Senha` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL,
  `Nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `RG` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DataNascimento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `Nome`, `Email`, `RG`, `DataNascimento`) VALUES
(1, 'Joao pedro', 'aaa@gmail.com', '111.111.111-11', '2023-10-10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `loginadm`
--

CREATE TABLE `loginadm` (
  `Id` int(11) NOT NULL,
  `Email` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Senha` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `loginadm`
--

INSERT INTO `loginadm` (`Id`, `Email`, `Senha`) VALUES
(1, 'henrique001@gmail.com', 'H123'),
(2, 'gabriel002@gmail.com', 'G456'),
(3, 'joao003@gmail.com', 'J789'),
(4, 'gabriela004@gmail.com', 'G112'),
(5, 'diogo005@gmail.com', 'D445');

-- --------------------------------------------------------

--
-- Estrutura para tabela `loginclientes`
--

CREATE TABLE `loginclientes` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `cep` varchar(70) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `loginclientes`
--

INSERT INTO `loginclientes` (`id`, `username`, `password`, `created_at`, `cep`, `email`, `telefone`) VALUES
(1, 'gabriel', '$2y$10$mB4/VHgQ9GY5EFlPpUZEMuxbbBSYe7lhzz./bAq1TqoDbN1A0GGgi', '2023-10-28 14:52:33', '', '', ''),
(2, 'samuelesofia', '$2y$10$VqKGnka.pMx/TE6TYsKxou5iqsOYRA0FMyR9n8ncYRzG63FZdEnYG', '2023-10-29 01:17:58', '12433546', 'SamueleSofia@gmail.com', '22121443');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `IdProduto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `caminho_imagem` varchar(255) NOT NULL,
  `descricao_imagem` varchar(70) NOT NULL,
  `preco` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`IdProduto`, `nome`, `caminho_imagem`, `descricao_imagem`, `preco`) VALUES
(1, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(2, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(3, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(4, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(5, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(6, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(7, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(8, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(9, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(10, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(11, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(12, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99'),
(13, 'Armario', 'assets/Imagens/Produtos/Armario-Escritorio.jpg', 'Armario confortável para sua sala de estar', '999.99');

--
-- Índices para tabelas despejadas
--


CREATE TABLE carrinho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantidade INT,
    FOREIGN KEY (user_id) REFERENCES cadastro(IdCliente),
    FOREIGN KEY (product_id) REFERENCES produtos(IdProduto)
);

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Índices de tabela `loginadm`
--
ALTER TABLE `loginadm`
  ADD PRIMARY KEY (`Id`);

--
-- Índices de tabela `loginclientes`
--
ALTER TABLE `loginclientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`IdProduto`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `IdProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
