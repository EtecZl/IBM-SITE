-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2023 às 20:17
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
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(0, 'Lala', '$2y$10$rWp2sChX1Q8VqOsMPCkgzu5LbVH10vYaKFT3/ALB9c3ki.J8wN7I2', '2023-11-03 18:56:54', '12433546', 'SamueleSofia@gmail.com', '22121443'),
(1, 'gabriel', '$2y$10$mB4/VHgQ9GY5EFlPpUZEMuxbbBSYe7lhzz./bAq1TqoDbN1A0GGgi', '2023-10-28 14:52:33', '', '', ''),
(2, 'samuelesofia', '$2y$10$VqKGnka.pMx/TE6TYsKxou5iqsOYRA0FMyR9n8ncYRzG63FZdEnYG', '2023-10-29 01:17:58', '12433546', 'SamueleSofia@gmail.com', '22121443');

-- --------------------------------------------------------

--
-- Estrutura para tabela `marceneiros`
--

CREATE TABLE `marceneiros` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marceneiros`
--

INSERT INTO `marceneiros` (`id`, `username`, `password`) VALUES
(1, 'gabriel', '$2y$10$WAb9yZhhTXepLeqcDgLCNOiwoj2okgME2M.5GVlRvzp7WzN8LUgse'),
(2, 'gabriel', '$2y$10$TmyAki/47PJSZtg82n6oqOn7/Yhv1uSKbLZ7kIexhcJj0EHnoHrz6');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `tipoTrabalho` varchar(255) DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `budget` varchar(5) DEFAULT NULL,
  `ownership` varchar(5) DEFAULT NULL,
  `startDate` varchar(20) DEFAULT NULL,
  `additionalDetails` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `privacyPolicy` tinyint(1) DEFAULT NULL,
  `receivePromotions` tinyint(1) DEFAULT NULL,
  `status` enum('Pendente','Aprovado','Rejeitado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `tipoTrabalho`, `cep`, `budget`, `ownership`, `startDate`, `additionalDetails`, `name`, `email`, `phone`, `privacyPolicy`, `receivePromotions`, `status`) VALUES
(1, 'marceneriro', NULL, 'Sim', 'Sim', 'Mais de 3 meses', 'eqwwq', 'gabripe asdsaf', 'gabrielestudante420@gmail.com', '(99) 9999-9999 ', 1, 1, 'Pendente'),
(2, 'marceneriro', NULL, 'Sim', 'Sim', 'Mais de 3 meses', 'eqwwq', 'gabripe asdsaf', 'gabrielestudante420@gmail.com', '(99) 9999-9999 ', 1, 1, 'Pendente'),
(3, 'marceneriro', NULL, 'Sim', 'Sim', 'Mais de 3 meses', 'eqwwq', 'gabripe asdsaf', 'gabrielestudante420@gmail.com', '(99) 9999-9999 ', 1, 1, 'Pendente'),
(4, 'marceneriro', NULL, 'Sim', 'Sim', 'Mais de 3 meses', 'eqwwq', 'gabripe asdsaf', 'gabrielestudante420@gmail.com', '(99) 9999-9999 ', 1, 1, 'Pendente'),
(5, 'marceneriro', NULL, 'Sim', 'Sim', 'Mais de 3 meses', 'eqwwq', 'gabripe asdsaf', 'gabrielestudante420@gmail.com', '(99) 9999-9999 ', 1, 1, 'Pendente'),
(6, 'marceneriro', NULL, 'Sim', 'Sim', 'Mais de 3 meses', 'eqwwq', 'gabripe asdsaf', 'gabrielestudante420@gmail.com', '(99) 9999-9999 ', 1, 1, 'Pendente'),
(7, 'marceneriro', NULL, 'Sim', 'Sim', 'Mais de 3 meses', 'eqwwq', 'gabripe asdsaf', 'gabrielestudante420@gmail.com', '(99) 9999-9999 ', 1, 1, 'Pendente'),
(8, 'marceneriro', '12433-336', 'Sim', 'Sim', 'Mais de 3 meses', '12qwew', 'gabripe asdsaf', 'gabrielestudante420@gmail.com', '(99) 9999-9999 ', 1, 1, 'Pendente'),
(9, 'marceneriro', '12433-336', 'Sim', 'Sim', 'Mais de 3 meses', '12qwew', 'gabripe asdsaf', 'gabrielestudante420@gmail.com', '(99) 9999-9999 ', 1, 1, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `nome_cliente`, `email`, `endereco`, `total`) VALUES
(1, 'Lala', NULL, NULL, NULL);

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
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `marceneiros`
--
ALTER TABLE `marceneiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`IdProduto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marceneiros`
--
ALTER TABLE `marceneiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
