-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 14-Fev-2022 às 18:55
-- Versão do servidor: 10.1.21-MariaDB
-- versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_luigi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

CREATE TABLE `bebida` (
  `id_bebida` int(11) NOT NULL,
  `nome_bebida` varchar(50) NOT NULL,
  `preco_bebida` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`id_bebida`, `nome_bebida`, `preco_bebida`) VALUES
(4, 'FANTA UVA 2L', '6.00'),
(5, 'COCA COLA 600ml', '4.50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `endereco_cliente` varchar(50) NOT NULL,
  `data_cadastro_cliente` date NOT NULL,
  `email_cliente` varchar(233) DEFAULT NULL,
  `senha_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `endereco_cliente`, `data_cadastro_cliente`, `email_cliente`, `senha_cliente`) VALUES
(1, 'ronaldo nazario de lima', 'rua dos bobos', '2003-06-27', 'ronaldo', 2002),
(2, 'edson arantes do nascimento', 'vila belmiro', '2021-12-23', 'reipele', 586270),
(7, 'alex silva', 'rua besta', '2021-12-25', 'alexsilva@outlook.com', 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(50) NOT NULL,
  `idade_funcionario` int(11) NOT NULL,
  `cargo_funcionario` varchar(30) NOT NULL,
  `salario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `idade_funcionario`, `cargo_funcionario`, `salario`) VALUES
(1, 'gabriel sena saraiva', 22, 'dono', '1000.00'),
(2, 'jeferson', 30, 'faxineiro', '950.00'),
(3, 'dhyego', 22, 'Pizzaolo', '1100.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `garcom`
--

CREATE TABLE `garcom` (
  `id_garcom` int(11) NOT NULL,
  `nome_garcom` varchar(233) NOT NULL,
  `usuario_garcom` varchar(233) NOT NULL,
  `senha_garcom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `garcom`
--

INSERT INTO `garcom` (`id_garcom`, `nome_garcom`, `usuario_garcom`, `senha_garcom`) VALUES
(1, 'alex peres', 'alex_peres', 2010);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(11) NOT NULL,
  `estado_mesa` int(11) NOT NULL,
  `nome_cliente` varchar(233) DEFAULT NULL,
  `id_garcom` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `estado_mesa`, `nome_cliente`, `id_garcom`) VALUES
(1, 1, NULL, NULL),
(2, 1, NULL, NULL),
(3, 1, NULL, NULL),
(4, 1, NULL, NULL),
(5, 1, NULL, NULL),
(6, 1, NULL, NULL),
(7, 1, NULL, NULL),
(8, 1, NULL, NULL),
(9, 1, NULL, NULL),
(10, 1, NULL, NULL),
(11, 1, NULL, NULL),
(12, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_pizza` int(11) DEFAULT NULL,
  `pedido_pizza_tam` int(11) DEFAULT NULL,
  `id_sobremesa` int(11) DEFAULT NULL,
  `id_bebida` int(11) DEFAULT NULL,
  `horario_pedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_mesa` int(11) NOT NULL,
  `garcom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_mesa_cesta`
--

CREATE TABLE `pedido_mesa_cesta` (
  `id_pom` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `id_pizza` int(11) DEFAULT NULL,
  `pizza_tam` int(11) DEFAULT NULL,
  `id_bebida` int(11) DEFAULT NULL,
  `id_sobremesa` int(11) DEFAULT NULL,
  `id_garcom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_online`
--

CREATE TABLE `pedido_online` (
  `id_pedido_online` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `conjunto` int(11) NOT NULL,
  `id_pizza` int(11) DEFAULT NULL,
  `pizza_tam` int(11) DEFAULT NULL,
  `id_bebida` int(11) DEFAULT NULL,
  `id_sobremesa` int(11) DEFAULT NULL,
  `horario_pedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `metodo_pagamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_online_cesta`
--

CREATE TABLE `pedido_online_cesta` (
  `id_poc` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_pizza` int(11) DEFAULT NULL,
  `pizza_tam` int(11) DEFAULT NULL,
  `id_bebida` int(11) DEFAULT NULL,
  `id_sobremesa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza`
--

CREATE TABLE `pizza` (
  `id_pizza` int(11) NOT NULL,
  `nome_pizza` varchar(30) NOT NULL,
  `preco_P` decimal(10,2) NOT NULL,
  `preco_M` decimal(10,2) NOT NULL,
  `preco_G` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pizza`
--

INSERT INTO `pizza` (`id_pizza`, `nome_pizza`, `preco_P`, `preco_M`, `preco_G`) VALUES
(1, 'mussarela', '15.79', '24.85', '45.00'),
(2, 'presunto', '19.90', '26.70', '40.59'),
(6, 'Pizza camarao', '12.90', '29.90', '40.54'),
(7, 'Pizza bacalhau', '18.99', '27.90', '39.90'),
(8, 'Pizza chocolate', '20.90', '29.90', '40.00'),
(9, 'Pizza frango c/ catupiry', '20.40', '35.00', '55.90'),
(10, 'Pizza 4 queijos', '12.50', '14.59', '32.90'),
(11, 'Pizza portuguesa', '16.80', '29.90', '40.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recibo`
--

CREATE TABLE `recibo` (
  `id_recibo` int(11) NOT NULL,
  `mesa_recibo` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `metodo_pagamento` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `data_recibo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recibo`
--

INSERT INTO `recibo` (`id_recibo`, `mesa_recibo`, `total`, `metodo_pagamento`, `data_recibo`) VALUES
(12, 1, '29.90', 'cartao_debito', '2021-12-14 18:57:53'),
(13, 1, '65.19', 'PIX', '2021-12-15 18:13:10'),
(14, 1, '94.15', 'DINHEIRO', '2021-12-20 17:37:44'),
(15, 1, '22.29', 'cartao credito', '2021-12-25 04:20:57'),
(16, 2, '32.90', 'DINHEIRO', '2021-12-25 04:21:02'),
(17, 3, '36.64', 'PIX', '2021-12-25 04:21:07'),
(18, 8, '46.50', 'DINHEIRO', '2021-12-25 22:29:39'),
(19, 1, '29.90', 'cartao credito', '2021-12-25 22:30:09'),
(20, 2, '124.34', 'cartao credito', '2021-12-25 22:58:05'),
(21, 1, '40.00', 'cartao dedito', '2021-12-25 23:31:03'),
(22, 1, '102.40', 'cartao dedito', '2021-12-27 17:53:34'),
(23, 3, '47.50', 'DINHEIRO', '2022-01-06 05:41:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recibo_online`
--

CREATE TABLE `recibo_online` (
  `id_recibo_online` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `metodo_pagamento` varchar(30) NOT NULL,
  `horario_entrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `horario_saida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recibo_online`
--

INSERT INTO `recibo_online` (`id_recibo_online`, `id_cliente`, `total`, `metodo_pagamento`, `horario_entrada`, `horario_saida`) VALUES
(4, 1, '47.09', 'DINHEIRO', '2021-12-24 22:21:16', '2021-12-25 05:11:52'),
(5, 1, '47.09', 'DINHEIRO', '2021-12-24 22:21:16', '2021-12-25 17:26:49'),
(6, 1, '62.40', 'DINHEIRO', '2021-12-25 03:42:12', '2021-12-25 17:26:52'),
(7, 2, '59.30', 'CREDITO', '2021-12-25 18:28:42', '2021-12-25 18:28:57'),
(8, 2, '47.09', 'DEBITO', '2021-12-25 18:28:21', '2021-12-25 18:29:01'),
(9, 2, '40.00', 'DINHEIRO', '2021-12-25 18:33:54', '2021-12-25 18:34:16'),
(10, 2, '20.90', 'PIX', '2021-12-25 18:32:23', '2021-12-25 18:34:19'),
(11, 2, '20.90', 'DEBITO', '2021-12-25 18:33:05', '2021-12-25 18:34:23'),
(12, 1, '36.40', 'DINHEIRO', '2021-12-25 20:22:39', '2021-12-25 21:18:59'),
(13, 1, '18.99', 'CREDITO', '2021-12-25 21:37:28', '2021-12-25 22:08:10'),
(14, 1, '46.40', 'PIX', '2021-12-25 23:31:19', '2021-12-27 17:38:16'),
(15, 1, '40.54', 'CREDITO', '2022-01-06 05:44:36', '2022-01-06 05:45:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobremesa`
--

CREATE TABLE `sobremesa` (
  `id_sobremesa` int(11) NOT NULL,
  `nome_sobremesa` varchar(30) NOT NULL,
  `preco_sobremesa` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sobremesa`
--

INSERT INTO `sobremesa` (`id_sobremesa`, `nome_sobremesa`, `preco_sobremesa`) VALUES
(1, 'doce de coco', '6.50'),
(2, 'Mousse maracujÃ¡', '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `login_usuario` varchar(233) NOT NULL,
  `senha_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `login_usuario`, `senha_usuario`) VALUES
(1, 'gabriel_sena', 199),
(2, 'carlos_dhyego', 171);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id_bebida`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `garcom`
--
ALTER TABLE `garcom`
  ADD PRIMARY KEY (`id_garcom`);

--
-- Indexes for table `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `pizza` (`id_pizza`),
  ADD KEY `sobremesa` (`id_sobremesa`),
  ADD KEY `bebida` (`id_bebida`),
  ADD KEY `mesa` (`id_mesa`),
  ADD KEY `garcom` (`garcom`);

--
-- Indexes for table `pedido_mesa_cesta`
--
ALTER TABLE `pedido_mesa_cesta`
  ADD PRIMARY KEY (`id_pom`);

--
-- Indexes for table `pedido_online`
--
ALTER TABLE `pedido_online`
  ADD PRIMARY KEY (`id_pedido_online`),
  ADD KEY `ppp` (`id_pizza`),
  ADD KEY `kkk` (`id_bebida`),
  ADD KEY `xxx` (`id_sobremesa`),
  ADD KEY `cll` (`id_cliente`);

--
-- Indexes for table `pedido_online_cesta`
--
ALTER TABLE `pedido_online_cesta`
  ADD PRIMARY KEY (`id_poc`),
  ADD KEY `cliente` (`id_cliente`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id_pizza`);

--
-- Indexes for table `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`id_recibo`);

--
-- Indexes for table `recibo_online`
--
ALTER TABLE `recibo_online`
  ADD PRIMARY KEY (`id_recibo_online`),
  ADD KEY `ggg` (`id_cliente`);

--
-- Indexes for table `sobremesa`
--
ALTER TABLE `sobremesa`
  ADD PRIMARY KEY (`id_sobremesa`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id_bebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `garcom`
--
ALTER TABLE `garcom`
  MODIFY `id_garcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedido_mesa_cesta`
--
ALTER TABLE `pedido_mesa_cesta`
  MODIFY `id_pom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedido_online`
--
ALTER TABLE `pedido_online`
  MODIFY `id_pedido_online` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedido_online_cesta`
--
ALTER TABLE `pedido_online_cesta`
  MODIFY `id_poc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `recibo`
--
ALTER TABLE `recibo`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `recibo_online`
--
ALTER TABLE `recibo_online`
  MODIFY `id_recibo_online` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sobremesa`
--
ALTER TABLE `sobremesa`
  MODIFY `id_sobremesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `bebida` FOREIGN KEY (`id_bebida`) REFERENCES `bebida` (`id_bebida`),
  ADD CONSTRAINT `garcom` FOREIGN KEY (`garcom`) REFERENCES `garcom` (`id_garcom`),
  ADD CONSTRAINT `mesa` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id_mesa`),
  ADD CONSTRAINT `pizza` FOREIGN KEY (`id_pizza`) REFERENCES `pizza` (`id_pizza`),
  ADD CONSTRAINT `sobremesa` FOREIGN KEY (`id_sobremesa`) REFERENCES `sobremesa` (`id_sobremesa`);

--
-- Limitadores para a tabela `pedido_online`
--
ALTER TABLE `pedido_online`
  ADD CONSTRAINT `cll` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `kkk` FOREIGN KEY (`id_bebida`) REFERENCES `bebida` (`id_bebida`),
  ADD CONSTRAINT `ppp` FOREIGN KEY (`id_pizza`) REFERENCES `pizza` (`id_pizza`),
  ADD CONSTRAINT `xxx` FOREIGN KEY (`id_sobremesa`) REFERENCES `sobremesa` (`id_sobremesa`);

--
-- Limitadores para a tabela `pedido_online_cesta`
--
ALTER TABLE `pedido_online_cesta`
  ADD CONSTRAINT `cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `recibo_online`
--
ALTER TABLE `recibo_online`
  ADD CONSTRAINT `ggg` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
