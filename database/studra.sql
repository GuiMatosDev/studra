-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/06/2026 às 00:32
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
-- Banco de dados: `studra`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anotacoes`
--

CREATE TABLE `anotacoes` (
  `id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `arquivada` tinyint(1) DEFAULT 0,
  `criado_em` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `anotacoes`
--

INSERT INTO `anotacoes` (`id`, `materia_id`, `titulo`, `conteudo`, `arquivada`, `criado_em`) VALUES
(1, 2, 'Formulas', 'x é igual a algum valo ', 1, '2026-06-07 20:38:08'),
(2, 2, 'Teste', 'desenhos insanos', 0, '2026-06-07 20:38:53'),
(3, 3, 'Aula01', 'hoje aprendi sobre a outra coisa', 1, '2026-06-07 21:39:38'),
(4, 5, 'Aula01', 'Log e log', 0, '2026-06-09 22:22:23'),
(5, 5, 'Aula002', 'gpto', 0, '2026-06-09 22:26:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `icone` varchar(50) NOT NULL,
  `pontuacao` int(11) DEFAULT 0,
  `arquivada` tinyint(1) DEFAULT 0,
  `criado_em` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `materias`
--

INSERT INTO `materias` (`id`, `usuario_id`, `nome`, `descricao`, `icone`, `pontuacao`, `arquivada`, `criado_em`) VALUES
(1, 3, 'programacao', 'essa materia é um teste', 'computador', 0, 0, '2026-06-07 19:27:55'),
(2, 3, 'Artes', 'desenho balas', 'arte', 0, 0, '2026-06-07 20:06:21'),
(3, 4, 'portugues', 'aulas de portugues', 'livro', 10, 0, '2026-06-07 21:39:13'),
(5, 5, 'Curso de Desenho Complementar', 'curso de desenho', 'arte', 10, 0, '2026-06-09 20:08:06'),
(6, 5, 'Curso de Quimica', 'quimica', 'ciencia', 0, 1, '2026-06-09 20:09:27'),
(7, 5, 'regressão Linear', 'logs', 'matematica', 0, 1, '2026-06-09 20:10:47'),
(9, 5, 'frances', 'aprendendo frances t', 'idioma', 0, 1, '2026-06-09 20:13:05'),
(10, 5, 'Programação em pascal', 'sql', 'computador', 10, 1, '2026-06-09 22:46:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `status_` enum('em_andamento','concluida','pendente') DEFAULT 'em_andamento',
  `data_termino` date NOT NULL,
  `pontuacao` int(11) DEFAULT 10,
  `recorrente` tinyint(1) DEFAULT 0,
  `frequencia` enum('nenhuma','diaria','semanal','mensal') DEFAULT 'nenhuma',
  `arquivada` tinyint(1) DEFAULT 0,
  `criaddo_em` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `materia_id`, `nome`, `descricao`, `status_`, `data_termino`, `pontuacao`, `recorrente`, `frequencia`, `arquivada`, `criaddo_em`) VALUES
(1, 3, 'Atv xpto', 'atividade', 'concluida', '2026-06-30', 10, 0, 'nenhuma', 0, '2026-06-07 21:40:35'),
(3, 5, 'Atividade xpto', 'prova', 'em_andamento', '2026-06-25', 10, 0, NULL, 0, '2026-06-09 21:17:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `pontuacao_total` int(11) DEFAULT 0,
  `criado_em` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `pontuacao_total`, `criado_em`) VALUES
(1, 'Alex', 'alex@gmail.com', '$2y$10$3G0V0U5dgOmXOWplBVHeH.UstFxkl2D7FRo5yMsXxYMeJcJNX7siu', 0, '2026-05-20 21:04:53'),
(2, 'gui', 'gui@gmail.com', '$2y$10$O70PYgYRDA3siiUnqm7J5O.Kypvlc0Az9yW3d6x.F/YJ0Ioc.O9v.', 0, '2026-05-20 21:13:37'),
(3, 'guilherme', 'guilhermematos.ofc@gmail.com', '$2y$10$GF.vohy/AeUSIdpUMuu1OufkeCvnvI8CFn4Vl3lF0026pYuHwoVpG', 0, '2026-06-07 19:19:48'),
(4, 'guilherme', 'guig@gmail', '$2y$10$ipv3p47lo0kDCQTvJJ4BGuvdHH22iFyYSnmO6B0xlmBlodJhyYa/e', 10, '2026-06-07 21:37:43'),
(5, 'teste', 'teste@teste.com', '$2y$10$3f6uUAcFbx9ITZJpq1IKmOpADdoCilLIA67L7/zoQuH0lcZIGP29.', 20, '2026-06-08 20:20:35');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anotacoes`
--
ALTER TABLE `anotacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Índices de tabela `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anotacoes`
--
ALTER TABLE `anotacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `anotacoes`
--
ALTER TABLE `anotacoes`
  ADD CONSTRAINT `anotacoes_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
