-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Maio-2022 às 23:18
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
  `nome` varchar(90) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `cidade` varchar(85) NOT NULL,
  `data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pessoas`
--

INSERT INTO `tb_pessoas` (`idpessoa`, `nome`, `email`, `celular`, `cidade`, `data_nascimento`) VALUES
(1, 'Wagner', 'wagner@pr.gov.br', '449889567', 'Maringá', '2021-10-05'),
(2, 'Alisson', 'alisson@pr.gov.br', '449884325', 'Maringá', '2021-05-10');


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `idprodutos` int(11) NOT NULL,
  `produto` varchar(45) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, 'usuario', '1234', 0, 2);

--
-- Índices para tabelas despejadas
--

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
  MODIFY `idpessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `idprodutos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
