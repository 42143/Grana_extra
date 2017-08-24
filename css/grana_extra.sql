-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Mar-2017 às 08:54
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grana_extra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `senha` char(40) NOT NULL,
  `flag_admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `usuario`, `senha`, `flag_admin`) VALUES
(1, 'admin', '7c222fb2927d828af22f592134e8932480637c0d', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `id_banco` int(11) NOT NULL AUTO_INCREMENT,
  `banco` varchar(50) NOT NULL,
  PRIMARY KEY (`id_banco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `banco`
--

INSERT INTO `banco` (`id_banco`, `banco`) VALUES
(1, 'Banco do Brasil'),
(2, 'Banco da Amazonia'),
(3, 'Banco do Nordeste do Brasil'),
(4, 'Banestes S/A - Banco do Estado do Espirito Santo'),
(5, 'Banco Santander'),
(6, 'Banco do Estado do Para'),
(7, 'Banco do Estado do Rio Grande do Sul'),
(8, 'Banco do Estado de Sergipe'),
(9, 'Banco BRB de Brasilia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `boleto`
--

CREATE TABLE IF NOT EXISTS `boleto` (
  `id_boleto` int(11) NOT NULL AUTO_INCREMENT,
  `data_boleto` date NOT NULL,
  `vencimento` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `flag_status` int(11) NOT NULL DEFAULT '0',
  `id_orcamento` int(11) NOT NULL,
  PRIMARY KEY (`id_boleto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `boleto_upgrade`
--

CREATE TABLE IF NOT EXISTS `boleto_upgrade` (
  `id_boleto` int(11) NOT NULL AUTO_INCREMENT,
  `data_boleto` date NOT NULL,
  `vencimento` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `flag_status` int(11) NOT NULL,
  `id_upgrade` int(11) NOT NULL,
  PRIMARY KEY (`id_boleto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE IF NOT EXISTS `cadastro` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` char(40) NOT NULL,
  `email_marketing` int(11) DEFAULT NULL,
  `tipo_freelancer` int(11) NOT NULL DEFAULT '1',
  `foto` varchar(46) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`),
  KEY `id_foto` (`foto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
  `id_chats` int(11) NOT NULL AUTO_INCREMENT,
  `chats` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuario_recebe` int(11) NOT NULL,
  `tempo_msg` int(11) NOT NULL,
  PRIMARY KEY (`id_chats`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_bancaria`
--

CREATE TABLE IF NOT EXISTS `conta_bancaria` (
  `id_conta_bancaria` int(11) NOT NULL AUTO_INCREMENT,
  `titula_conta` varchar(50) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `banco` char(2) NOT NULL,
  `tipo_conta` char(1) NOT NULL,
  `agencia` varchar(10) NOT NULL,
  `conta` varchar(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_conta_bancaria`),
  UNIQUE KEY `cpf_cnpj` (`cpf_cnpj`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cria_projeto`
--

CREATE TABLE IF NOT EXISTS `cria_projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_projeto` varchar(40) NOT NULL,
  `servico` int(11) NOT NULL,
  `resumo_projeto` text NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `imagens` varchar(55) NOT NULL,
  `descreva` text NOT NULL,
  `tipo_freelancer` char(1) NOT NULL,
  `tempo` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_projeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(11) NOT NULL AUTO_INCREMENT,
  `id_projeto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `arquivo` char(45) NOT NULL,
  `flag_concluir` int(11) NOT NULL DEFAULT '0',
  `data_down` date NOT NULL,
  `vencimento_down` date NOT NULL,
  `flag_reputacao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_download`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `download_alert`
--

CREATE TABLE IF NOT EXISTS `download_alert` (
  `id_download_alert` int(11) NOT NULL AUTO_INCREMENT,
  `id_projeto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `arquivo` char(45) NOT NULL,
  PRIMARY KEY (`id_download_alert`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editar_perfil`
--

CREATE TABLE IF NOT EXISTS `editar_perfil` (
  `id_editar_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `habilidade` varchar(53) NOT NULL,
  `conte_sobre` text NOT NULL,
  `conte_experiencia` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_editar_perfil`),
  UNIQUE KEY `habilidade` (`habilidade`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilidade`
--

CREATE TABLE IF NOT EXISTS `habilidade` (
  `id_habilidade` int(11) NOT NULL AUTO_INCREMENT,
  `habilidade` varchar(50) NOT NULL,
  PRIMARY KEY (`id_habilidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `habilidade`
--

INSERT INTO `habilidade` (`id_habilidade`, `habilidade`) VALUES
(1, '.NET Compact Framework	'),
(2, '.NET Framework'),
(3, '.NET para Web'),
(4, '.NET Remoting'),
(5, '1ShoppingCart'),
(6, '3DS Max'),
(7, '3GSM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `justificao`
--

CREATE TABLE IF NOT EXISTS `justificao` (
  `id_justificao` int(11) NOT NULL AUTO_INCREMENT,
  `justificao` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  PRIMARY KEY (`id_justificao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE IF NOT EXISTS `orcamento` (
  `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_orcamento_ind` int(11) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `prazo` varchar(10) NOT NULL,
  `comentarios` text NOT NULL,
  `tempo` date NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `flag_proposta` int(11) NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_orcamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_alert`
--

CREATE TABLE IF NOT EXISTS `orcamento_alert` (
  `id_orcamento_alert` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(10) NOT NULL,
  `prazo` varchar(10) NOT NULL,
  `comentarios` text NOT NULL,
  `tempo` date NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `flag_proposta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_orcamento_alert`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reputacao`
--

CREATE TABLE IF NOT EXISTS `reputacao` (
  `id_reputacao` int(11) NOT NULL AUTO_INCREMENT,
  `bom` int(11) NOT NULL,
  `regula` int(11) NOT NULL,
  `ruim` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_reputacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saldo_ge`
--

CREATE TABLE IF NOT EXISTS `saldo_ge` (
  `id_saldo` int(11) NOT NULL AUTO_INCREMENT,
  `saldo` varchar(9) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `flag_liberacao` int(11) NOT NULL,
  PRIMARY KEY (`id_saldo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `servicos` varchar(50) NOT NULL,
  PRIMARY KEY (`id_servico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `servicos`) VALUES
(2, 'Web site '),
(3, 'phone gap'),
(4, 'web develop'),
(5, 'Design grafico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `valor_upgrade`
--

CREATE TABLE IF NOT EXISTS `valor_upgrade` (
  `id_upgrade` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(10) NOT NULL,
  `tipo_upgrade` int(11) NOT NULL,
  PRIMARY KEY (`id_upgrade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `valor_upgrade`
--

INSERT INTO `valor_upgrade` (`id_upgrade`, `valor`, `tipo_upgrade`) VALUES
(1, '25,90', 1),
(2, '39,90', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
