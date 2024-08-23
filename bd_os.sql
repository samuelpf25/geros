-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3341
-- Tempo de geração: 21/08/2024 às 13:14
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_os`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `area`
--

CREATE TABLE `area` (
  `id_area` int(100) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(100) NOT NULL,
  `fk_Area_id_area` int(100) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `peso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `os_gestao`
--

CREATE TABLE `os_gestao` (
  `id` int(100) NOT NULL,
  `fk_Os_ufes_id_ufes` varchar(255) DEFAULT NULL,
  `fk_Status_id_status` int(100) DEFAULT NULL,
  `fk_Usuario_id_usuario` int(100) DEFAULT NULL,
  `fk_Categoria_id_categoria` int(100) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `os_ufes`
--

CREATE TABLE `os_ufes` (
  `id_ufes` varchar(255) NOT NULL,
  `breve_descricao` varchar(255) DEFAULT NULL,
  `entidade` varchar(255) DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `status_ufes` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_abertura` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `atribuido_fornecedor` varchar(255) DEFAULT NULL,
  `solucao` varchar(255) DEFAULT NULL,
  `tecnico` varchar(255) DEFAULT NULL,
  `prioridade` varchar(255) DEFAULT NULL,
  `requerente` varchar(255) DEFAULT NULL,
  `ult_atualizacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(100) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(100) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `FK_Categoria_2` (`fk_Area_id_area`);

--
-- Índices de tabela `os_gestao`
--
ALTER TABLE `os_gestao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Os_gestao_2` (`fk_Os_ufes_id_ufes`),
  ADD KEY `FK_Os_gestao_3` (`fk_Status_id_status`),
  ADD KEY `FK_Os_gestao_4` (`fk_Usuario_id_usuario`),
  ADD KEY `FK_Os_gestao_5` (`fk_Categoria_id_categoria`);

--
-- Índices de tabela `os_ufes`
--
ALTER TABLE `os_ufes`
  ADD PRIMARY KEY (`id_ufes`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `FK_Categoria_2` FOREIGN KEY (`fk_Area_id_area`) REFERENCES `area` (`id_area`);

--
-- Restrições para tabelas `os_gestao`
--
ALTER TABLE `os_gestao`
  ADD CONSTRAINT `FK_Os_gestao_2` FOREIGN KEY (`fk_Os_ufes_id_ufes`) REFERENCES `os_ufes` (`id_ufes`),
  ADD CONSTRAINT `FK_Os_gestao_3` FOREIGN KEY (`fk_Status_id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `FK_Os_gestao_4` FOREIGN KEY (`fk_Usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `FK_Os_gestao_5` FOREIGN KEY (`fk_Categoria_id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
