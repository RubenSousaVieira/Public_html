-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Fev-2024 às 13:13
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `supplys-package`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `telemovel` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reparacoes`
--

CREATE TABLE `reparacoes` (
  `idReparacao` int(11) NOT NULL,
  `CodigoReparacao` varchar(255) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `Equipamento` varchar(255) NOT NULL,
  `IMEI` int(11) NOT NULL,
  `Obs` varchar(255) NOT NULL,
  `EstadoReparacao` int(11) NOT NULL,
  `DescricaoEstado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `idTarefa` int(11) NOT NULL,
  `designacaoTarefa` varchar(5000) NOT NULL,
  `descricaoTarefa` text NOT NULL,
  `prazoTarefa` date NOT NULL,
  `prioridadeTarefa` varchar(5000) NOT NULL,
  `concluidaTarefa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`idTarefa`, `designacaoTarefa`, `descricaoTarefa`, `prazoTarefa`, `prioridadeTarefa`, `concluidaTarefa`) VALUES
(0, 'TESTE', 't', '2004-01-21', '2', '1'),
(0, 'TESTE 02', 'teste 02', '1111-02-21', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(180) NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `username`, `password`, `email`, `data_criacao`) VALUES
(1, 'psb212318', '$2y$10$vAiT6pzqg1O1CGSljqYnLOeROSkT.QO/uLlJMwbEw4aOKS0156eEe', 'po2318@alunos.epbjc.pt', '2023-09-28 12:18:22'),
(3, 'admin', '$2y$10$dpjHpnWjhsPonkSUNXmu4OdS8ChtOk268bF./tH86JJuBiYd79sW.', '', '2024-02-09 19:37:01'),
(4, 'teste02', '$2y$15$73B0F.sf8XUd/qfq765GY.7vgsrGlAOidsAOIbpztUR3f5EPUCAVq', '', '2024-02-10 12:03:23');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `reparacoes`
--
ALTER TABLE `reparacoes`
  ADD PRIMARY KEY (`idReparacao`),
  ADD KEY `INDEX` (`idCliente`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
