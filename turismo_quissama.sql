-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Dez-2017 às 17:36
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turismo_quissama`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `local` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `circuito`
--

CREATE TABLE `circuito` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `funcionamento_inicio` date NOT NULL,
  `funcionamento_fim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comercio_categoria`
--

CREATE TABLE `comercio_categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `imagem_id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id`, `categoria`, `imagem_id`, `url`) VALUES
(16, 1, 26, 'http://localhost:9000/uploads/lugares/imagens/26-af8b6.jpg'),
(17, 1, 28, 'http://localhost:9000/uploads/lugares/imagens/28-aff80.jpg'),
(18, 1, 28, 'http://localhost:9000/uploads/lugares/imagens/28-9d6d9.jpg'),
(19, 1, 28, 'http://localhost:9000/uploads/lugares/imagens/28-6314d.jpg'),
(20, 1, 28, 'http://localhost:9000/uploads/lugares/imagens/28-6b46b.jpg'),
(21, 1, 28, 'http://localhost:9000/uploads/lugares/imagens/28-5e0d.jpg'),
(22, 1, 28, 'http://localhost:9000/uploads/lugares/imagens/28-2f006.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lugar`
--

CREATE TABLE `lugar` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descricao` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `espaco` varchar(20) CHARACTER SET latin1 NOT NULL,
  `endereco` varchar(1000) NOT NULL,
  `simbolo_id` int(11) NOT NULL,
  `latitude` varchar(20) CHARACTER SET latin1 NOT NULL,
  `longitude` varchar(20) CHARACTER SET latin1 NOT NULL,
  `circuito_id` int(11) NOT NULL,
  `funcionamento_inicio` time NOT NULL,
  `funcionamento_fim` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `lugar`
--

INSERT INTO `lugar` (`id`, `nome`, `descricao`, `espaco`, `endereco`, `simbolo_id`, `latitude`, `longitude`, `circuito_id`, `funcionamento_inicio`, `funcionamento_fim`) VALUES
(26, 'Praia do Visgueiro', 'Localizada no Parque Nacional da Restinga de Jurubatiba, a Visgueiro é uma praia de restinga com areias brancas em seus dois quilômetros de extensão. Nela, a fauna diversificada é composta por lagartos, mariscos e caranguejos. Os moradores do local são, em sua maioria, pescadores que tiram seu sustento da pesca feita com rede e linha.', '2000', 'Praia do Visgueiro, Quissamã', 2, '-22.2', '-41.44999999999999', 3, '00:01:00', '23:59:00'),
(28, 'Parque Nacional da Restinga de Jurubatiba', 'Única área de preservação dedicada à vegetação de restinga, o Parque Nacional de Jurubatiba é um dos maiores tesouros ambientais do país. Criado por Decreto Federal em 24 de abril de 1998, Jurubatiba é uma Unidade de Conservação Federal que tem como objetivo preservar o patrimônio natural. O parque possui 44 km de praias, 14.860 hectares de restinga, com 18 lagoas costeiras de rara beleza e de grande interesse ecológico. Ele abrange os municípios de Carapebus, Macaé e Quissamã. Telefone: (22) 2765-6024 Email: parnajurubatiba@icmbio.gov.br', '14680', 'jurubatiba, Quissamã', 3, '-22.2044949', '-41.500341100000014', 3, '00:01:00', '23:59:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `simbolos_turisticos`
--

CREATE TABLE `simbolos_turisticos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `tutorial` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circuito`
--
ALTER TABLE `circuito`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comercio_categoria`
--
ALTER TABLE `comercio_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simbolos_turisticos`
--
ALTER TABLE `simbolos_turisticos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `circuito`
--
ALTER TABLE `circuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comercio_categoria`
--
ALTER TABLE `comercio_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `simbolos_turisticos`
--
ALTER TABLE `simbolos_turisticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
