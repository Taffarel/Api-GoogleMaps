-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Ago 08, 2011 as 03:04 AM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `ideia-1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `restaurantes`
--

CREATE TABLE IF NOT EXISTS `restaurantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `horarioAbertura` time NOT NULL,
  `horarioFechamento` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `name`, `address`, `lat`, `lng`, `tipo`, `horarioAbertura`, `horarioFechamento`, `status`, `created`, `modified`) VALUES
(1, 'Akaza Sushi', 'Av. Goiás, 953  Santo Antônio - São Caetano do Sul- SP', -23.616230, -46.567081, 'Japonesa', '19:00:00', '23:00:00', 1, '2011-08-07 21:36:54', '2011-08-07 21:36:56'),
(2, 'Nakato', 'Rua Martim Francisco, 135 Santa Paula São Caetano do Sul - SP', -23.617517, -46.561508, 'Japonesa', '19:00:00', '23:00:00', 1, '2011-08-07 21:38:02', '2011-08-07 21:38:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Japonesa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Mexicana', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
