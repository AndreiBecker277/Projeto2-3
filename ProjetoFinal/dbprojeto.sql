-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/12/2023 às 22:05
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
-- Banco de dados: `dbprojeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtarefa`
--

CREATE TABLE `tbtarefa` (
  `id` int(11) NOT NULL,
  `tarefa` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `fkidusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbtarefa`
--

INSERT INTO `tbtarefa` (`id`, `tarefa`, `descricao`, `fkidusuario`) VALUES
(5, 'comer ', 'arroz e uma boa', 2),
(8, 'assar', 'corne ou frango', 1),
(9, 'faxina', 'limpar o patioi', 4),
(11, 'assar', 'rappido ', 4),
(12, 'comer ', 'rapido ', 2),
(13, 'faxina', 'rapido ', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` int(200) NOT NULL,
  `papel` enum('usuario','administrador') NOT NULL DEFAULT 'usuario',
  `cep` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `nome`, `email`, `senha`, `papel`, `cep`) VALUES
(1, 'roger', 'roger@gmail.com', 123456, 'usuario', 69063516),
(2, 'andrei', 'andrei@gmail.com', 123456, 'usuario', 69063516),
(3, 'fodao', 'foda@gmail.com', 123456, 'administrador', 69063516),
(4, 'felipinho', 'feloipinho@gmai.com', 123456, 'usuario', 59139250);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbtarefa`
--
ALTER TABLE `tbtarefa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidusuario` (`fkidusuario`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbtarefa`
--
ALTER TABLE `tbtarefa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbtarefa`
--
ALTER TABLE `tbtarefa`
  ADD CONSTRAINT `tbtarefa_ibfk_1` FOREIGN KEY (`fkidusuario`) REFERENCES `tbusuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
