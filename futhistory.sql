-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Jun-2018 às 21:22
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futhistory`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_id` int(11) NOT NULL,
  `nome_categoria` text NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `nome_categoria`) VALUES
(1, 'CAMISAS'),
(2, 'BOLAS'),
(3, 'TAÇAS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `cpf` int(11) NOT NULL,
  `nomeCliente` text NOT NULL,
  `dataNasc` date DEFAULT NULL,
  `email` tinytext,
  `senha` varchar(30) DEFAULT NULL,
  `endereco` text,
  `cidade` text,
  `estado` text,
  `telefone` int(10) DEFAULT NULL,
  `sexo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `codPedido` int(11) NOT NULL,
  `quantProduto` int(11) DEFAULT NULL,
  `valorProduto` varchar(30) DEFAULT NULL,
  `dataPedido` date NOT NULL,
  `codProduto` int(11) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  PRIMARY KEY (`codPedido`),
  KEY `fk_pedidos_codProduto` (`codProduto`),
  KEY `fk_pedidos_cpf` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `codProduto` int(11) NOT NULL,
  `nomeProduto` text NOT NULL,
  `descricao` text,
  `quantidade` int(11) DEFAULT NULL,
  `preco` varchar(50) DEFAULT NULL,
  `tamanho` text,
  `cor` text,
  `img` text NOT NULL,
  `produto_cat` int(11) NOT NULL,
  `precoPag` int(11) NOT NULL,
  PRIMARY KEY (`codProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codProduto`, `nomeProduto`, `descricao`, `quantidade`, `preco`, `tamanho`, `cor`, `img`, `produto_cat`, `precoPag`) VALUES
(1, 'alemanha 1954', 'Camisa Alemanha', 1, '100', NULL, NULL, 'img/produtos/alemanha1954.jpg', 1, 10000),
(2, 'alemanha 1974', NULL, NULL, '100', NULL, NULL, 'img/produtos/alemanha1974.png', 1, 10000),
(3, 'argentina 1978', NULL, NULL, '100', NULL, NULL, 'img/produtos/argentina1978.png', 1, 10000),
(4, 'Brasil 1858', NULL, NULL, '100', NULL, NULL, 'img/produtos/brasil1958.png', 1, 10000),
(5, 'brasil 1962', NULL, NULL, '100', NULL, NULL, 'img/produtos/brasil1962.png', 1, 10000),
(6, 'brasil 1970', NULL, NULL, '100', NULL, NULL, 'img/produtos/brasil1970.png', 1, 10000),
(7, 'Italia 1934', NULL, NULL, '100', NULL, NULL, 'img/produtos/italia1934.jpg', 1, 10000),
(8, 'inglaterra 1966', NULL, NULL, '100', NULL, NULL, 'img/produtos/inglaterra1966.png', 1, 10000);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_codProduto` FOREIGN KEY (`codProduto`) REFERENCES `produtos` (`codProduto`),
  ADD CONSTRAINT `fk_pedidos_cpf` FOREIGN KEY (`cpf`) REFERENCES `clientes` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
