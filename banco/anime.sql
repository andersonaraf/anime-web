-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Maio-2019 às 20:49
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anime`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anime`
--

CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anime`
--

INSERT INTO `anime` (`id`, `nome`, `descricao`) VALUES
(31, 'Shingeki No Kyojin - Episodio 1', 'Episodio 1'),
(32, 'Shingeki No Kyojin - Episodio 2', 'Episodio 2'),
(33, 'Shingeki No Kyojin - Episodio 3', 'Episodio 3'),
(37, ' Shingeki No Kyojin - Episodio 4', 'Episodio 4'),
(38, 'Shingeki No Kyojin - Episodio 5', 'Episodio 5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `idAnime` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nick` varchar(60) NOT NULL,
  `login` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `nivelAcesso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `login`, `senha`, `descricao`, `dataNascimento`, `nivelAcesso`) VALUES
(1, 'Anderson', 'mrJocker', '123', NULL, NULL, 1),
(2, 'teste', 'teste', 'teste', 'teste', NULL, 0),
(6, 'Anderson', 'mrJocker2', '123', NULL, NULL, 0),
(7, 'teste2', 'teste2', '123', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videoanime`
--

CREATE TABLE `videoanime` (
  `id` int(11) NOT NULL,
  `URL` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videoanime`
--

INSERT INTO `videoanime` (`id`, `URL`) VALUES
(31, 'https://drive.google.com/uc?export=download&id=1vZepZENjNCCQfw4bVlQj0EVF8wJtb1qn'),
(32, 'https://drive.google.com/uc?export=download&id=1zS0Xf58HqqtzmfqUlTIVD5jukmaVIQxp'),
(33, 'https://drive.google.com/uc?export=download&id=1_LLHh9bZC_115NcLGPeXrfEZe6MceQTe'),
(37, 'https://drive.google.com/uc?export=download&id=1yVqkYJDSQ-1prlkeRCJwly3g6IEVb457'),
(38, 'https://dl.dropboxusercontent.com/s/6jlb9edmqf5vnty/shingeki-no-kyojin-episodio-5.mp4?dl=0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_ibfk_2` (`idUsuario`),
  ADD KEY `idAnime` (`idAnime`) USING BTREE;

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videoanime`
--
ALTER TABLE `videoanime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`idAnime`) REFERENCES `anime` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `videoanime`
--
ALTER TABLE `videoanime`
  ADD CONSTRAINT `videoanime_ibfk_1` FOREIGN KEY (`id`) REFERENCES `anime` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
