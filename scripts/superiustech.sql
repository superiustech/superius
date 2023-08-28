-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Ago-2023 às 14:34
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
-- Estrutura da tabela `chat_admin`
--

CREATE TABLE `chat_admin` (
  `nCdChat` int(11) NOT NULL,
  `nCdUsuario` int(11) NOT NULL,
  `sDsMensagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `chat_admin`
--

INSERT INTO `chat_admin` (`nCdChat`, `nCdUsuario`, `sDsMensagem`) VALUES
(1, 2, 'dasd'),
(2, 2, 'dasd'),
(3, 11, 'dasd'),
(4, 11, 'dasd'),
(5, 11, 'nada'),
(6, 11, 'nada'),
(7, 11, 'paizao'),
(8, 11, 'paizao'),
(9, 11, 'aaa'),
(10, 11, 'aaa'),
(11, 11, 'PARA MANO'),
(12, 11, 'PARA MANO'),
(13, 11, 'meu deus'),
(14, 11, 'meu deus'),
(15, 2, '231'),
(16, 2, '231'),
(17, 2, '231'),
(18, 2, '231'),
(19, 2, '231'),
(20, 2, '231'),
(21, 2, '231'),
(22, 2, '231'),
(23, 2, '231'),
(24, 2, '231'),
(25, 2, '231'),
(26, 2, '231'),
(27, 11, 'dsads'),
(28, 11, 'dsads'),
(29, 11, '123123123'),
(30, 11, '123123123'),
(31, 11, '123123'),
(32, 11, '123123'),
(33, 11, '12313'),
(34, 11, '12313'),
(35, 11, ''),
(36, 11, ''),
(37, 11, ''),
(38, 11, ''),
(39, 11, ''),
(40, 11, ''),
(41, 11, ''),
(42, 11, ''),
(43, 11, ''),
(44, 11, ''),
(45, 11, ''),
(46, 11, ''),
(47, 11, ''),
(48, 11, ''),
(49, 11, 'asd'),
(50, 11, 'asd'),
(51, 11, 'a'),
(52, 11, 'a'),
(53, 11, ''),
(54, 11, ''),
(55, 11, 'eae'),
(56, 11, 'eae');

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
(70, 'nogueira', 'luxas', 'zgladwtf@gmail.com', '123456', 'fisico', '312.312.312-31', ''),
(73, '123123123123123', 'Tiago', '123', '123', 'fisico', '123.231.312-21', ''),
(74, 'vigier', 'professor', 'vigier@gmail.com', 'admin', 'fisico', '312.321.312-31', '');

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
  `sDsComprimento` int(11) DEFAULT NULL,
  `dVlPreco` decimal(10,2) NOT NULL,
  `dVlPrecoDesconto` decimal(10,2) NOT NULL,
  `dVlDesconto` int(11) NOT NULL,
  `sDsProdutoDetalhada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `controle_estoque`
--

INSERT INTO `controle_estoque` (`nCdProduto`, `sNmProduto`, `dQtItem`, `sDsProduto`, `sDsLargura`, `sDsAltura`, `sDsPeso`, `sDsComprimento`, `dVlPreco`, `dVlPrecoDesconto`, `dVlDesconto`, `sDsProdutoDetalhada`) VALUES
(24, 'PRODUTO 01', 0, 'Pc Gamer Feuripe V2 / Intel I3 8100 / Radeon RX 550 4GB / 8GB DDR4 / SSD 240GB', 11, 6, 0, 16, 999.99, 0.00, 100, ''),
(25, 'PRODUTO 02', 123, 'Pc Gamer Feuripe V2 / Intel I3 8100 / Radeon RX 550 4GB / 8GB DDR4 / SSD 240GB', 5, 5, 5, 5, 60099.00, 570.94, 5, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(26, 'dsadas', 11, 'Pc Gamer Feuripe V2 / Intel I3 8100 / Radeon RX 550 4GB / 8GB DDR4 / SSD 240GB', 0, 0, 0, 0, 1200.00, 1056.00, 12, ''),
(28, 'PRODUTO 03', 12, 'Pc Gamer Feuripe V2 / Intel I3 8100 / Radeon RX 550 4GB / 8GB DDR4 / SSD 240GB\r\n\r\n', 11, 6, 0, 16, 698.99, 594.14, 15, 'Pc Gamer Feuripe V2 / Intel I3 8100 / Radeon RX 550 4GB / 8GB DDR4 / SSD 240GB\r\n\r\n');

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
(37, 0, '64e3dee2bcc7e.png'),
(38, 0, '64e3dee2bd303.png'),
(39, 0, '64e3dee5d57e9.png'),
(40, 0, '64e3dee5d5fd5.png'),
(41, 0, '64e3df283daba.png'),
(42, 0, '64e3dfa9ced8c.png'),
(44, 0, ''),
(45, 0, ''),
(46, 0, ''),
(47, 0, ''),
(48, 0, ''),
(49, 0, ''),
(50, 0, ''),
(51, 0, ''),
(52, 0, '64e4ca156d8a1.png'),
(53, 0, '64e4ca156dc29.png'),
(54, 0, '64e4ca156de09.png'),
(55, 0, '64e4ca156dfe0.png'),
(74, NULL, ''),
(109, 0, ''),
(110, 0, ''),
(111, 0, ''),
(112, 0, ''),
(113, 0, ''),
(114, 0, '64e4d50930e87.png'),
(115, 0, '64e4d50a42356.png'),
(121, 0, '64e4d8573f5a0.png'),
(122, 0, '64e4d85873c91.png'),
(123, 0, '64e4d8596c0e2.png'),
(124, 0, '64e4d87b1cd3d.png'),
(125, 0, '64e4d87b1cfb5.png'),
(126, 0, '64e4d87b1d244.png'),
(127, 0, '64e4d87b1d4db.png'),
(136, NULL, '64e652242f041.png'),
(137, NULL, '64e6526211068.png'),
(138, 14, '64e6528417301.png'),
(139, 14, '64e652e6d7d4f.png'),
(158, 24, '64e740c9180ee.png'),
(159, 25, '64e7989317090.png'),
(162, 24, '64e893031586e.png'),
(163, 24, '64e89303161b2.png'),
(164, 24, '64e8930316415.png'),
(165, 24, '64e8930316674.png'),
(166, 25, '64e8932a6f410.png'),
(167, 25, '64e8932a6f7db.png'),
(168, 25, '64e8932a6f9f4.png'),
(169, 25, '64e8932a6fd2f.png'),
(171, 28, '64e9207eb5a93.png'),
(172, 26, '64e9308d18ba8.png');

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
(34, 70, '1.000,00', '2023-08-16', 'Almoco', 1),
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
(45, 70, '1.000,00', '2024-07-22', 'Almoco', 1),
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
(69, 72, '0,12', '2023-12-26', '12', 1),
(70, 70, '90,00', '2023-08-20', 'Almoco', 1),
(71, 70, '90,00', '2023-09-03', 'Almoco', 0),
(72, 73, '1.999,99', '2023-08-25', 'Fone', 1),
(73, 73, '1.999,99', '2023-09-24', 'Fone', 0),
(74, 73, '1.999,99', '2023-10-24', 'Fone', 0),
(75, 73, '1.999,99', '2023-11-23', 'Fone', 0),
(76, 73, '1.999,99', '2023-12-23', 'Fone', 0),
(77, 73, '1.999,99', '2024-01-22', 'Fone', 0);

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
(211, '::1', '64ec7f595d718', '2023-08-28 08:04:57'),
(212, '::1', '64ec8dfea75e0', '2023-08-28 09:30:56');

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
(19, '::1', '2023-08-14'),
(20, '::1', '2023-08-21'),
(21, '::1', '2023-08-21'),
(22, '::1', '2023-08-22'),
(23, '::1', '2023-08-22'),
(24, '::1', '2023-08-22'),
(25, '::1', '2023-08-22'),
(26, '::1', '2023-08-24'),
(27, '::1', '2023-08-24'),
(28, '::1', '2023-08-24'),
(29, '::1', '2023-08-24'),
(30, NULL, '2023-08-24'),
(31, '::1', '2023-08-24'),
(32, '::1', '2023-08-24'),
(33, '::1', '2023-08-24'),
(34, '::1', '2023-08-24'),
(35, '::1', '2023-08-24'),
(36, '::1', '2023-08-24'),
(37, '::1', '2023-08-24'),
(38, '::1', '2023-08-24'),
(39, '::1', '2023-08-25'),
(40, '::1', '2023-08-25'),
(41, '::1', '2023-08-25'),
(42, '::1', '2023-08-25'),
(43, '::1', '2023-08-25'),
(44, '::1', '2023-08-25'),
(45, '::1', '2023-08-25'),
(46, '::1', '2023-08-25'),
(47, '::1', '2023-08-25'),
(48, '::1', '2023-08-25'),
(49, '::1', '2023-08-25'),
(50, '::1', '2023-08-27'),
(51, '::1', '2023-08-27'),
(52, '::1', '2023-08-27'),
(53, '::1', '2023-08-27'),
(54, '::1', '2023-08-27');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`nCdCargo`);

--
-- Índices para tabela `chat_admin`
--
ALTER TABLE `chat_admin`
  ADD PRIMARY KEY (`nCdChat`);

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
-- AUTO_INCREMENT de tabela `chat_admin`
--
ALTER TABLE `chat_admin`
  MODIFY `nCdChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `nCdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `controle_estoque`
--
ALTER TABLE `controle_estoque`
  MODIFY `nCdProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `controle_estoque_imagem`
--
ALTER TABLE `controle_estoque_imagem`
  MODIFY `nCdImagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT de tabela `controle_financeiro`
--
ALTER TABLE `controle_financeiro`
  MODIFY `nCdControleFinanceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `usuarios_admim`
--
ALTER TABLE `usuarios_admim`
  MODIFY `nCdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuarios_online`
--
ALTER TABLE `usuarios_online`
  MODIFY `nCdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT de tabela `usuarios_visitas`
--
ALTER TABLE `usuarios_visitas`
  MODIFY `nCdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
