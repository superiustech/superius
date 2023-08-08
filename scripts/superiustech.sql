-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Ago-2023 às 23:45
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `superiustech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `nCdCargo` int(11) NOT NULL,
  `sNmCargo` varchar(255) NOT NULL,
  `sDsCargo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`nCdCargo`, `sNmCargo`, `sDsCargo`) VALUES
(1, 'CEO', 'Dono Da empresa'),
(2, 'Administrador', 'Administrador Geral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `nCdCliente` int(11) NOT NULL,
  `sNmCliente` varchar(255) DEFAULT NULL,
  `sDsApelido` varchar(255) DEFAULT NULL,
  `sDsEmail` varchar(255) DEFAULT NULL,
  `sDsSenha` varchar(255) DEFAULT NULL,
  `sDsTipoDocumento` varchar(255) DEFAULT NULL,
  `sNrCpfCnpj` varchar(255) DEFAULT NULL,
  `sDsImagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`nCdCliente`, `sNmCliente`, `sDsApelido`, `sDsEmail`, `sDsSenha`, `sDsTipoDocumento`, `sNrCpfCnpj`, `sDsImagem`) VALUES
(56, 'luca', 'Nogueira Brabo', 'nogueiralu@gmail.com', '123456', 'fisico', '131.312.312-31', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_estoque`
--

CREATE TABLE `controle_estoque` (
  `nCdProduto` int(11) NOT NULL,
  `sNmProduto` varchar(255) DEFAULT NULL,
  `dQtItem` int(11) DEFAULT NULL,
  `sDsProduto` text DEFAULT NULL,
  `sDsLargura` int(11) DEFAULT NULL,
  `sDsAltura` int(11) DEFAULT NULL,
  `sDsPeso` int(11) DEFAULT NULL,
  `sDsComprimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `controle_estoque`
--

INSERT INTO `controle_estoque` (`nCdProduto`, `sNmProduto`, `dQtItem`, `sDsProduto`, `sDsLargura`, `sDsAltura`, `sDsPeso`, `sDsComprimento`) VALUES
(1, 'Lucas', 12, 'tttt', 5, 15, 12, 10),
(2, 'Lucas', 12, 'tttt', 5, 15, 12, 10),
(3, 'TESTE 1', 12, 'DSAD', 25, 15, 12, 10),
(4, 'TESTE 1', 12, 'DSAD', 25, 15, 12, 10),
(5, 'TESTE 1', 12, 'DSAD', 25, 15, 12, 10),
(6, 'TESTE 1', 12, 'DSAD', 25, 15, 12, 10),
(7, 'CAMISETA', 12, 'DESCRIÇÃO', 10, 20, 21, 30),
(8, 'CAMISETA', 12, 'DESCRIÇÃO', 10, 20, 21, 30),
(9, '', 0, '', 0, 0, 0, 0),
(10, '', 0, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_estoque_imagem`
--

CREATE TABLE `controle_estoque_imagem` (
  `nCdImagem` int(11) NOT NULL,
  `nCdProduto` int(11) DEFAULT NULL,
  `sDsImagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `controle_estoque_imagem`
--

INSERT INTO `controle_estoque_imagem` (`nCdImagem`, `nCdProduto`, `sDsImagem`) VALUES
(1, 5, '64c7fb2d5a0fd.png'),
(2, 5, '64c7fb2d5a57a.png'),
(3, 7, '64c7fbc79ab18.png'),
(4, 7, '64c7fbc79ae64.png'),
(5, 9, '64d11e3b109bb.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_financeiro`
--

CREATE TABLE `controle_financeiro` (
  `nCdControleFinaneiro` int(11) NOT NULL,
  `nCdCliente` int(11) DEFAULT NULL,
  `sDsValor` varchar(255) DEFAULT NULL,
  `tDtVencimento` date DEFAULT NULL,
  `sNmControle` varchar(255) DEFAULT NULL,
  `bFlStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_admim`
--

CREATE TABLE `usuarios_admim` (
  `nCdUsuario` int(11) NOT NULL,
  `sNmUsuario` varchar(255) NOT NULL,
  `sDsSenha` varchar(255) NOT NULL,
  `sDsImagem` varchar(255) DEFAULT NULL,
  `nCdCargo` varchar(255) DEFAULT NULL,
  `nNmPessoal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios_admim`
--

INSERT INTO `usuarios_admim` (`nCdUsuario`, `sNmUsuario`, `sDsSenha`, `sDsImagem`, `nCdCargo`, `nNmPessoal`) VALUES
(2, 'Admin', 'admin', NULL, '2', 'Patrick Luiz'),
(11, 'nogueira', '32320022', 'imagens\\background\\bgnovo.png', '1', 'Lucas Nogueira'),
(12, 'laranja', 'admin', 'imagens\\background\\bgnovo.png', '2', 'Gabriel Laranja'),
(26, 'Thiago', '123456', 'imagens\\background\\bgnovo.png', '2', 'Thiago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_online`
--

CREATE TABLE `usuarios_online` (
  `nCdUsuario` int(11) NOT NULL,
  `sNmIpUsuario` varchar(255) DEFAULT NULL,
  `sDsToken` varchar(255) DEFAULT NULL,
  `tDtUltimaAcao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_visitas`
--

CREATE TABLE `usuarios_visitas` (
  `nCdUsuario` int(11) NOT NULL,
  `sNmIpUsuario` varchar(255) DEFAULT NULL,
  `tDtLogin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios_visitas`
--

INSERT INTO `usuarios_visitas` (`nCdUsuario`, `sNmIpUsuario`, `tDtLogin`) VALUES
(1, '::1', '2023-06-29'),
(2, '::1', '2023-06-29'),
(3, '::1', '2023-06-29'),
(4, '::1', '2023-06-29'),
(5, '::1', '2023-06-29'),
(6, '::1', '2023-07-10'),
(7, '::1', '2023-07-10'),
(8, '::1', '2023-07-18'),
(9, '::1', '2023-07-28'),
(10, '::1', '2023-08-04'),
(11, '::1', '2023-08-05'),
(12, '::1', '2023-08-06'),
(13, '::1', '2023-08-07'),
(14, '::1', '2023-08-07'),
(15, '::1', '2023-08-08'),
(16, '::1', '2023-08-08'),
(17, '::1', '2023-08-08');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`nCdCargo`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`nCdCliente`);

--
-- Índices para tabela `controle_estoque`
--
ALTER TABLE `controle_estoque`
  ADD PRIMARY KEY (`nCdProduto`);

--
-- Índices para tabela `controle_estoque_imagem`
--
ALTER TABLE `controle_estoque_imagem`
  ADD PRIMARY KEY (`nCdImagem`);

--
-- Índices para tabela `controle_financeiro`
--
ALTER TABLE `controle_financeiro`
  ADD PRIMARY KEY (`nCdControleFinaneiro`);

--
-- Índices para tabela `usuarios_admim`
--
ALTER TABLE `usuarios_admim`
  ADD PRIMARY KEY (`nCdUsuario`);

--
-- Índices para tabela `usuarios_online`
--
ALTER TABLE `usuarios_online`
  ADD PRIMARY KEY (`nCdUsuario`);

--
-- Índices para tabela `usuarios_visitas`
--
ALTER TABLE `usuarios_visitas`
  ADD PRIMARY KEY (`nCdUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `nCdCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `nCdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `controle_estoque`
--
ALTER TABLE `controle_estoque`
  MODIFY `nCdProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `controle_estoque_imagem`
--
ALTER TABLE `controle_estoque_imagem`
  MODIFY `nCdImagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `controle_financeiro`
--
ALTER TABLE `controle_financeiro`
  MODIFY `nCdControleFinaneiro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios_admim`
--
ALTER TABLE `usuarios_admim`
  MODIFY `nCdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `usuarios_online`
--
ALTER TABLE `usuarios_online`
  MODIFY `nCdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `usuarios_visitas`
--
ALTER TABLE `usuarios_visitas`
  MODIFY `nCdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
