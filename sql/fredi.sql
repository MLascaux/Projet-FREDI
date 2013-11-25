-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 25 Novembre 2013 à 20:07
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `fredi`
--
CREATE DATABASE IF NOT EXISTS `fredi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fredi`;

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE IF NOT EXISTS `adherents` (
  `numero-licence` int(11) NOT NULL DEFAULT '0',
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `num-ligue` int(11) DEFAULT '0',
  PRIMARY KEY (`numero-licence`),
  KEY `num-ligue` (`num-ligue`),
  KEY `numero-licence` (`numero-licence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `demandeurs`
--

CREATE TABLE IF NOT EXISTS `demandeurs` (
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `num-recu` int(11) DEFAULT '0',
  `password` varchar(120) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `num-recu` (`num-recu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `demandeurs`
--

INSERT INTO `demandeurs` (`email`, `nom`, `prenom`, `rue`, `cp`, `ville`, `num-recu`, `password`) VALUES
('guilbert.paul@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, '81dc9bdb52d04dc20036dbd8313ed055'),
('paul.guilbert@epsi.fr', NULL, NULL, NULL, NULL, NULL, 0, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE IF NOT EXISTS `lien` (
  `num-licence` int(11) NOT NULL DEFAULT '0',
  `adresse-mail` varchar(50) NOT NULL,
  PRIMARY KEY (`num-licence`,`adresse-mail`),
  KEY `adresse-mail` (`adresse-mail`),
  KEY `num-licence` (`num-licence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lignes-frais`
--

CREATE TABLE IF NOT EXISTS `lignes-frais` (
  `adresse-mail` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `motif` varchar(50) DEFAULT NULL,
  `trajet` varchar(50) DEFAULT NULL,
  `km` int(11) DEFAULT '0',
  `cout-peage` int(11) DEFAULT '0',
  `cout-repas` int(11) DEFAULT '0',
  `cout-hebergement` int(11) DEFAULT '0',
  `km-validé` int(11) DEFAULT '0',
  `peage-validé` int(11) DEFAULT '0',
  `repas-validé` int(11) DEFAULT '0',
  `hebergement-validé` int(11) DEFAULT '0',
  PRIMARY KEY (`adresse-mail`,`date`),
  KEY `adresse-mail` (`adresse-mail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

CREATE TABLE IF NOT EXISTS `ligues` (
  `n°` int(11) NOT NULL DEFAULT '0',
  `Nom` varchar(50) DEFAULT NULL,
  `sigle` varchar(50) DEFAULT NULL,
  `président` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`n°`),
  KEY `n°` (`n°`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

CREATE TABLE IF NOT EXISTS `motifs` (
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`libelle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
