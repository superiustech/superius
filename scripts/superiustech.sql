-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Ago-2023 às 00:04
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

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
(70, 'nogueira', 'Nogueira', 'zgladwtf@gmail.com', '3123123', 'fisico', '312.312.312-31', ''),
(72, '132', '123', '123', '123', 'fisico', '123', '');

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
(1, '1', 6, '1', 5, 5, 1, 5),
(2, '1', 1, '1', 5, 5, 1, 5),
(3, 'lucas', 12, 'lucas', 5, 5, 1, 5),
(4, 'lucas', 1, 'lucas', 5, 5, 1, 5),
(5, '423', 237, '342', 5, 5, 234, 5),
(6, '423', 234, '342', 5, 5, 234, 5),
(7, 'teste', 200, 'teste', 5, 5, 12, 5),
(8, 'teste', 12, 'teste', 5, 5, 12, 5),
(9, '211', 21, '21', 5, 5, 21, 5),
(10, '211', 21, '21', 5, 5, 21, 5);

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
(8, 15, '64dce4e012acc.png'),
(9, 17, '64dce51b94982.png'),
(10, 17, '64dce51b94c02.png'),
(11, 19, '64dcee3c4bcca.png'),
(12, 22, '64dceea08d12a.png'),
(13, 24, '64dceecc5a253.png'),
(14, 25, '64dcf13bb0409.png'),
(15, 26, '64dcf1a6352c4.png'),
(16, 28, '64dcf27f124fe.png'),
(17, 30, '64dcf2da5249c.png'),
(18, 1, '64dcf9ec5ff46.png'),
(19, 3, '64dd025014c8d.png'),
(20, 5, '64dd0c4410c9e.png'),
(21, 7, '64dd429aca023.png'),
(22, 9, '64dd43416e449.png'),
(23, 9, '64dd43416e9e2.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_financeiro`
--

CREATE TABLE `controle_financeiro` (
  `nCdControleFinanceiro` int(11) NOT NULL,
  `nCdCliente` int(11) DEFAULT NULL,
  `sDsValor` varchar(255) DEFAULT NULL,
  `tDtVencimento` date DEFAULT NULL,
  `sNmControle` varchar(255) DEFAULT NULL,
  `bFlStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `controle_financeiro`
--

INSERT INTO `controle_financeiro` (`nCdControleFinanceiro`, `nCdCliente`, `sDsValor`, `tDtVencimento`, `sNmControle`, `bFlStatus`) VALUES
(1, 66, '0,12', '2023-08-15', '12', 1),
(2, 66, '0,12', '2023-08-27', '12', 1),
(3, 66, '0,12', '2023-09-08', '12', 1),
(4, 66, '0,12', '2023-09-20', '12', 1),
(5, 66, '0,12', '2023-10-02', '12', 1),
(6, 66, '0,12', '2023-10-14', '12', 1),
(7, 66, '0,12', '2023-10-26', '12', 1),
(8, 66, '0,12', '2023-11-07', '12', 1),
(9, 66, '0,12', '2023-11-19', '12', 1),
(10, 66, '0,12', '2023-12-01', '12', 1),
(11, 66, '0,12', '2023-12-13', '12', 1),
(12, 66, '0,12', '2023-12-25', '12', 1),
(13, 68, '8,00', '2023-08-23', 'Almoco', 1),
(14, 68, '8,00', '2023-09-07', 'Almoco', 1),
(15, 68, '8,00', '2023-09-22', 'Almoco', 0),
(16, 68, '8,00', '2023-08-23', 'Almoco', 0),
(17, 68, '8,00', '2023-09-07', 'Almoco', 0),
(18, 68, '8,00', '2023-09-22', 'Almoco', 1),
(19, 68, '8,00', '2023-08-23', 'Almoco', 1),
(20, 68, '8,00', '2023-09-07', 'Almoco', 1),
(21, 68, '8,00', '2023-09-22', 'Almoco', 1),
(22, 67, '0,01', '2023-08-23', '1', 0),
(23, 67, '0,01', '2023-09-23', '1', 1),
(24, 67, '0,01', '2023-10-24', '1', 1),
(25, 67, '0,01', '2023-11-24', '1', 1),
(26, 67, '0,01', '2023-12-25', '1', 1),
(27, 67, '0,01', '2024-01-25', '1', 1),
(28, 67, '0,01', '2024-02-25', '1', 0),
(29, 67, '0,01', '2024-03-27', '1', 0),
(30, 67, '0,01', '2024-04-27', '1', 0),
(31, 67, '0,01', '2024-05-28', '1', 0),
(32, 67, '0,01', '2024-06-28', '1', 0),
(33, 67, '0,01', '2024-07-29', '1', 0),
(34, 70, '1.000,00', '2023-08-16', 'Almoco', 0),
(35, 70, '1.000,00', '2023-09-16', 'Almoco', 0),
(36, 70, '1.000,00', '2023-10-17', 'Almoco', 1),
(37, 70, '1.000,00', '2023-11-17', 'Almoco', 1),
(38, 70, '1.000,00', '2023-12-18', 'Almoco', 1),
(39, 70, '1.000,00', '2024-01-18', 'Almoco', 1),
(40, 70, '1.000,00', '2024-02-18', 'Almoco', 1),
(41, 70, '1.000,00', '2024-03-20', 'Almoco', 1),
(42, 70, '1.000,00', '2024-04-20', 'Almoco', 1),
(43, 70, '1.000,00', '2024-05-21', 'Almoco', 1),
(44, 70, '1.000,00', '2024-06-21', 'Almoco', 1),
(45, 70, '1.000,00', '2024-07-22', 'Almoco', 0),
(46, 71, '0,02', '2023-08-22', '2', 0),
(47, 71, '0,02', '2023-08-24', '2', 1),
(48, 71, '0,02', '2023-08-26', '2', 1),
(49, 71, '0,02', '2023-08-28', '2', 0),
(50, 71, '0,02', '2023-08-30', '2', 1),
(51, 71, '0,02', '2023-09-01', '2', 0),
(52, 71, '0,02', '2023-09-03', '2', 0),
(53, 71, '0,02', '2023-09-05', '2', 1),
(54, 71, '0,02', '2023-09-07', '2', 1),
(55, 71, '0,02', '2023-09-09', '2', 0),
(56, 71, '0,02', '2023-09-11', '2', 0),
(57, 71, '0,02', '2023-09-13', '2', 0),
(58, 72, '0,12', '2023-08-16', '12', 0),
(59, 72, '0,12', '2023-08-28', '12', 0),
(60, 72, '0,12', '2023-09-09', '12', 1),
(61, 72, '0,12', '2023-09-21', '12', 0),
(62, 72, '0,12', '2023-10-03', '12', 1),
(63, 72, '0,12', '2023-10-15', '12', 0),
(64, 72, '0,12', '2023-10-27', '12', 1),
(65, 72, '0,12', '2023-11-08', '12', 1),
(66, 72, '0,12', '2023-11-20', '12', 1),
(67, 72, '0,12', '2023-12-02', '12', 0),
(68, 72, '0,12', '2023-12-14', '12', 0),
(69, 72, '0,12', '2023-12-26', '12', 1);

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
(11, 'nogueira', 'admin', 'imagens\\background\\bgnovo.png', '1', 'Lucas Nogueira'),
(12, 'laranja', 'admin', 'imagens\\background\\bgnovo.png', '2', 'Gabriel Laranja'),
(26, 'Thiago', 'admin´', 'imagens\\background\\bgnovo.png', '2', 'Thiago'),
(27, '1', '1', '', '1', '1');

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

--
-- Extraindo dados da tabela `usuarios_online`
--

INSERT INTO `usuarios_online` (`nCdUsuario`, `sNmIpUsuario`, `sDsToken`, `tDtUltimaAcao`) VALUES
(101, '::1', '64dd40d6912b5', '2023-08-16 19:03:08');

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
(17, '::1', '2023-08-08'),
(18, '::1', '2023-08-14'),
(19, '::1', '2023-08-14');

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
  ADD PRIMARY KEY (`nCdControleFinanceiro`);

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
  MODIFY `nCdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `controle_estoque`
--
ALTER TABLE `controle_estoque`
  MODIFY `nCdProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `controle_estoque_imagem`
--
ALTER TABLE `controle_estoque_imagem`
  MODIFY `nCdImagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `controle_financeiro`
--
ALTER TABLE `controle_financeiro`
  MODIFY `nCdControleFinanceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `usuarios_admim`
--
ALTER TABLE `usuarios_admim`
  MODIFY `nCdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuarios_online`
--
ALTER TABLE `usuarios_online`
  MODIFY `nCdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de tabela `usuarios_visitas`
--
ALTER TABLE `usuarios_visitas`
  MODIFY `nCdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
