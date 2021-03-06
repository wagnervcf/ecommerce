-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Maio-2022 às 22:44
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_arquivos`
--

CREATE TABLE `tb_arquivos` (
  `idarquivo` int(11) NOT NULL,
  `nome_arquivo` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `id_produtos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_arquivos`
--

INSERT INTO `tb_arquivos` (`idarquivo`, `nome_arquivo`, `path`, `data_upload`, `id_produtos`) VALUES
(1, 'camisetaadidas.png', 'assets/imagens/6286a29292d62.png', '2022-05-19 17:03:30', 15),
(2, 'tenis.png', 'assets/imagens/6286a6876d243.png', '2022-05-19 17:20:23', 16),
(3, 'tenispreto.png', 'assets/imagens/6286a6f6eb43e.png', '2022-05-19 17:22:14', 17),
(4, 'blusaadidas.png', 'assets/imagens/6286a7e4c65f1.png', '2022-05-19 17:26:12', 18),
(5, 'camisetarosa.png', 'assets/imagens/628a92f337a4d.png', '2022-05-22 16:45:55', 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carrinho`
--

CREATE TABLE `tb_carrinho` (
  `idcarrinho` int(11) NOT NULL,
  `sessao` varchar(45) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idendereco` int(11) DEFAULT NULL,
  `vl_frete` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carrinho_produtos`
--

CREATE TABLE `tb_carrinho_produtos` (
  `idcarrinho_produtos` int(11) NOT NULL,
  `idcarrinho` int(11) NOT NULL,
  `idprodutos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `idcategoria` int(11) NOT NULL,
  `categoria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `idendereco` int(11) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `tb_pessoas_idpessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagamentos`
--

CREATE TABLE `tb_pagamentos` (
  `idpagamentos` int(11) NOT NULL,
  `vl_total` decimal(10,2) DEFAULT NULL,
  `idstatus` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcarrinho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pessoas`
--

CREATE TABLE `tb_pessoas` (
  `idpessoa` int(11) NOT NULL,
  `nome` varchar(65) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pessoas`
--

INSERT INTO `tb_pessoas` (`idpessoa`, `nome`, `data_nascimento`, `telefone`) VALUES
(1, 'admin', '1994-05-24', '44997327877'),
(2, 'usuario', '1992-03-05', '4499739955'),
(3, 'marcos', '2006-02-16', '44-9999999'),
(4, 'Natan', '1994-05-05', '44-999999999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `idprodutos` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`idprodutos`, `nome`, `descricao`, `quantidade`, `valor`) VALUES
(4, 'pao de queijo', 'tenis branco ', 12, '400'),
(5, 'pao de queijo', 'tenis branco ', 2, '400'),
(6, 'pao de queijo', 'tenis branco ', 2, '400'),
(7, 'pao de queijo', 'tenis branco ', 2, '400'),
(8, 'pao de queijo', 'tenis branco ', 2, '400'),
(10, 'pao de queijo', 'tenis branco ', 2, '400'),
(11, 'pao de queijo', 'tenis branco ', 2, '400'),
(12, 'camiseta', 'camiseta azul adidas', 0, '2'),
(13, 'camiseta', 'camiseta azul adidas', 0, '2'),
(14, 'pao de queijo', 'tenis branco ', 0, '12'),
(15, 'Camiseta Adidas Run', 'Camiseta Azul adidas Corrida', 2, '89,90'),
(16, 'Tenis Adidas Superstar', 'tenis branco adidas', 6, '400'),
(17, 'Tenis Adidas Run', 'Tenis adidas preto Corrida', 10, '400'),
(18, 'Blusa Moletom Adidas', 'Blusa Preta Adidas ', 5, '199,90'),
(19, 'Camiseta Rosa Adidas', 'Camise Rosa da Adidas', 5, '89,90');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos_has_tb_categoria`
--

CREATE TABLE `tb_produtos_has_tb_categoria` (
  `tb_produtos_idprodutos` int(11) NOT NULL,
  `tb_categoria_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `idstatus` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `idusuario` int(11) NOT NULL,
  `login` varchar(65) DEFAULT NULL,
  `senha` varchar(256) DEFAULT NULL,
  `inadmin` tinyint(4) DEFAULT NULL,
  `tb_pessoas_idpessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`idusuario`, `login`, `senha`, `inadmin`, `tb_pessoas_idpessoa`) VALUES
(2, 'admin', '1234', 1, 1),
(3, 'usuario', '1234', 0, 2),
(5, '', 'MTIzNA==', 0, 3),
(6, 'natan', 'MTIzNA==', 0, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_arquivos`
--
ALTER TABLE `tb_arquivos`
  ADD PRIMARY KEY (`idarquivo`);

--
-- Índices para tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  ADD PRIMARY KEY (`idcarrinho`);

--
-- Índices para tabela `tb_carrinho_produtos`
--
ALTER TABLE `tb_carrinho_produtos`
  ADD PRIMARY KEY (`idcarrinho_produtos`),
  ADD KEY `fk_tb_carrinho_produtos_tb_carrinho1` (`idcarrinho`),
  ADD KEY `fk_tb_carrinho_produtos_tb_produtos1` (`idprodutos`);

--
-- Índices para tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Índices para tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`idendereco`),
  ADD KEY `fk_tb_endereco_tb_pessoas1` (`tb_pessoas_idpessoa`);

--
-- Índices para tabela `tb_pagamentos`
--
ALTER TABLE `tb_pagamentos`
  ADD PRIMARY KEY (`idpagamentos`),
  ADD KEY `fk_tb_pagamentos_tb_status1` (`idstatus`),
  ADD KEY `fk_tb_pagamentos_tb_usuarios1` (`idusuario`),
  ADD KEY `fk_tb_pagamentos_tb_carrinho1` (`idcarrinho`);

--
-- Índices para tabela `tb_pessoas`
--
ALTER TABLE `tb_pessoas`
  ADD PRIMARY KEY (`idpessoa`);

--
-- Índices para tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`idprodutos`);

--
-- Índices para tabela `tb_produtos_has_tb_categoria`
--
ALTER TABLE `tb_produtos_has_tb_categoria`
  ADD PRIMARY KEY (`tb_produtos_idprodutos`,`tb_categoria_idcategoria`),
  ADD KEY `fk_tb_produtos_has_tb_categoria_tb_categoria1` (`tb_categoria_idcategoria`);

--
-- Índices para tabela `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_tb_usuarios_tb_pessoas1` (`tb_pessoas_idpessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_arquivos`
--
ALTER TABLE `tb_arquivos`
  MODIFY `idarquivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  MODIFY `idcarrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_carrinho_produtos`
--
ALTER TABLE `tb_carrinho_produtos`
  MODIFY `idcarrinho_produtos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_pagamentos`
--
ALTER TABLE `tb_pagamentos`
  MODIFY `idpagamentos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_pessoas`
--
ALTER TABLE `tb_pessoas`
  MODIFY `idpessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `idprodutos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_carrinho_produtos`
--
ALTER TABLE `tb_carrinho_produtos`
  ADD CONSTRAINT `fk_tb_carrinho_produtos_tb_carrinho1` FOREIGN KEY (`idcarrinho`) REFERENCES `tb_carrinho` (`idcarrinho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_carrinho_produtos_tb_produtos1` FOREIGN KEY (`idprodutos`) REFERENCES `tb_produtos` (`idprodutos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `fk_tb_endereco_tb_pessoas1` FOREIGN KEY (`tb_pessoas_idpessoa`) REFERENCES `tb_pessoas` (`idpessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_pagamentos`
--
ALTER TABLE `tb_pagamentos`
  ADD CONSTRAINT `fk_tb_pagamentos_tb_carrinho1` FOREIGN KEY (`idcarrinho`) REFERENCES `tb_carrinho` (`idcarrinho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_pagamentos_tb_status1` FOREIGN KEY (`idstatus`) REFERENCES `tb_status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_pagamentos_tb_usuarios1` FOREIGN KEY (`idusuario`) REFERENCES `tb_usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_produtos_has_tb_categoria`
--
ALTER TABLE `tb_produtos_has_tb_categoria`
  ADD CONSTRAINT `fk_tb_produtos_has_tb_categoria_tb_categoria1` FOREIGN KEY (`tb_categoria_idcategoria`) REFERENCES `tb_categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_produtos_has_tb_categoria_tb_produtos1` FOREIGN KEY (`tb_produtos_idprodutos`) REFERENCES `tb_produtos` (`idprodutos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `fk_tb_usuarios_tb_pessoas1` FOREIGN KEY (`tb_pessoas_idpessoa`) REFERENCES `tb_pessoas` (`idpessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
