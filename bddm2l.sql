-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Mai 2019 à 12:36
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bddm2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE IF NOT EXISTS `adherents` (
  `NUMERO_LICENCE` varchar(255) NOT NULL,
  `NUM_ADH` bigint(4) DEFAULT NULL,
  `SEXE_ADH` varchar(255) DEFAULT NULL,
  `NOM_ADH` varchar(50) DEFAULT NULL,
  `PRENOM_ADH` varchar(50) DEFAULT NULL,
  `DATENAIS_ADH` varchar(255) DEFAULT NULL,
  `ADRESSE1_ADH` varchar(255) DEFAULT NULL,
  `CP_ADH` bigint(4) DEFAULT NULL,
  `VILLE_ADH` varchar(255) DEFAULT NULL,
  `ID_CLUB` int(4) NOT NULL,
  PRIMARY KEY (`NUMERO_LICENCE`),
  KEY `I_FK_ADHERENTS_CLUBS` (`NUM_ADH`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adherents`
--

INSERT INTO `adherents` (`NUMERO_LICENCE`, `NUM_ADH`, `SEXE_ADH`, `NOM_ADH`, `PRENOM_ADH`, `DATENAIS_ADH`, `ADRESSE1_ADH`, `CP_ADH`, `VILLE_ADH`, `ID_CLUB`) VALUES
('17 05 40 010 443', 0, 'M', 'BANDILELLA', 'CLEMENT', '26/07/1998', '30, rue Widric 1er', 54600, 'Villers lès Nancy', 0),
('17 05 40 010 340', 1, 'F', 'BERBIER', 'LUCILLE', '24/03/1998', '12, rue de Marron', 54600, 'Villers lès Nancy', 0),
(' 17 05 40 010 338', 1, 'M', 'BERBIER', 'THEO', '24/03/1998', '12, rue de Marron', 54600, 'Villers lès Nancy', 0),
(' 17 05 40 010 309', NULL, 'M', 'BECKER', 'ROMAIN', '28/03/1998', '1, rue des Mésanges', 54600, 'Villers lès Nancy', 0),
('17 05 40 010 334', NULL, 'F', 'BIACQUEL', 'VERONIQUE', '09/12/1962', '27, rue de Santifontaine', 54000, 'Nancy', 0),
(' 17 05 40 010 399', NULL, 'F', 'BIDELOT', 'BRIGITTE', '20/09/1958', '5, rue des trois épis', 54600, 'Villers lès Nancy', 0),
('17 05 40 010 442', NULL, 'F', 'BIDELOT', 'JULIE', '30/11/1991', '5, rue des trois épis', 54600, 'Villers lès Nancy', 0),
('17 05 40 010 308', NULL, 'M', 'BILLOT', 'DIDIER', '24/09/1962', '6, rue de la Sapinière', 54600, 'Villers lès Nancy', 0),
('17 05 40 010 329', NULL, 'F', 'BILLOT', 'CLAIRE', '07/06/1963', '6, rue de la Sapinière', 54600, 'Villers lès Nancy', 0),
('17 05 40 010 254', NULL, 'F', 'BILLOT', 'MARIANNE', '28/09/1986', '6, rue de la Sapinière', 54600, 'Villers lès Nancy', 0);

-- --------------------------------------------------------

--
-- Structure de la table `archives_frais`
--

CREATE TABLE IF NOT EXISTS `archives_frais` (
  `ID_ARCHIVE` bigint(4) NOT NULL AUTO_INCREMENT,
  `ADRESSE_MAIL` varchar(50) NOT NULL,
  `DATEFRAIS` date NOT NULL,
  `TYPEMOTIF` int(2) NOT NULL,
  `TRAJET` varchar(50) NOT NULL,
  `KM_VALIDE` bigint(4) NOT NULL,
  `PEAGE_VALIDE` bigint(4) NOT NULL,
  `REPAS_VALIDE` bigint(4) NOT NULL,
  `HEBERGEMENT_VALIDE` bigint(4) NOT NULL,
  PRIMARY KEY (`ID_ARCHIVE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `NUM_CLUB` bigint(4) NOT NULL AUTO_INCREMENT,
  `NUMERO_TRESORIER` bigint(4) DEFAULT NULL,
  `NUMERO_LIGUE` bigint(4) DEFAULT '0',
  `NOM_CLUB` varchar(255) DEFAULT NULL,
  `VILLE_CLUB` varchar(255) DEFAULT NULL,
  `CP_CLUB` bigint(4) DEFAULT NULL,
  `ADRESSE_CLUB` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NUM_CLUB`),
  KEY `I_FK_CLUBS_TRESORIERS` (`NUMERO_TRESORIER`),
  KEY `I_FK_CLUBS_LIGUES` (`NUMERO_LIGUE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`NUM_CLUB`, `NUMERO_TRESORIER`, `NUMERO_LIGUE`, `NOM_CLUB`, `VILLE_CLUB`, `CP_CLUB`, `ADRESSE_CLUB`) VALUES
(1, 1, 1, 'EscrimeClub', 'Toulouse', 31000, '8 rue Arthur');

-- --------------------------------------------------------

--
-- Structure de la table `demandeurs`
--

CREATE TABLE IF NOT EXISTS `demandeurs` (
  `MAIL_DEM` varchar(50) NOT NULL,
  `NOM_DEM` varchar(50) DEFAULT NULL,
  `PRENOM_DEM` varchar(50) DEFAULT NULL,
  `RUE_DEM` varchar(50) DEFAULT NULL,
  `CP_DEM` varchar(50) DEFAULT NULL,
  `VILLE_DEM` varchar(50) DEFAULT NULL,
  `NUM_DEM` bigint(4) DEFAULT '0',
  `MDP_DEM` int(11) NOT NULL,
  PRIMARY KEY (`MAIL_DEM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demandeurs`
--

INSERT INTO `demandeurs` (`MAIL_DEM`, `NOM_DEM`, `PRENOM_DEM`, `RUE_DEM`, `CP_DEM`, `VILLE_DEM`, `NUM_DEM`, `MDP_DEM`) VALUES
('Jean-Christophe.Berber@gmail.com', 'BERBER', 'JEAN-CHRISTOPHE', '12, rue de Marron', '54600', 'Villers lès Nancy', 1, 123),
('Robert@gmail.com', 'Robert', 'Robert', 'Robert,31 Robert', '31200', 'Toulouse', 0, 123);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE IF NOT EXISTS `lien` (
  `NUMERO_LICENCE` varchar(255) NOT NULL,
  `MAIL_DEM` varchar(50) NOT NULL,
  PRIMARY KEY (`NUMERO_LICENCE`,`MAIL_DEM`),
  KEY `I_FK_LIEN_ADHERENTS` (`NUMERO_LICENCE`),
  KEY `I_FK_LIEN_DEMANDEURS` (`MAIL_DEM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lien`
--

INSERT INTO `lien` (`NUMERO_LICENCE`, `MAIL_DEM`) VALUES
(' 17 05 40 010 338', 'Jean-Christophe.Berber@gmail.com'),
('17 05 40 010 309', 'Robert@gmail.com'),
('17 05 40 010 340', 'Jean-Christophe.Berber@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `lignes_frais`
--

CREATE TABLE IF NOT EXISTS `lignes_frais` (
  `ID_LIGNE` bigint(4) NOT NULL AUTO_INCREMENT,
  `ADRESSE_MAIL` varchar(50) NOT NULL,
  `DATEFRAIS` date NOT NULL,
  `TYPE_MOTIF` int(2) NOT NULL,
  `TRAJET` varchar(50) NOT NULL,
  `KM` bigint(4) NOT NULL,
  `COUT_PEAGE` bigint(4) NOT NULL,
  `COUT_REPAS` bigint(4) NOT NULL,
  `COUT_HEBERGEMENT` bigint(4) NOT NULL,
  `KM_VALIDE` bigint(4) NOT NULL,
  `PEAGE_VALIDE` bigint(4) NOT NULL,
  `REPAS_VALIDE` bigint(4) NOT NULL,
  `HEBERGEMENT_VALIDE` bigint(4) NOT NULL,
  `VALIDE` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_LIGNE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `lignes_frais`
--

INSERT INTO `lignes_frais` (`ID_LIGNE`, `ADRESSE_MAIL`, `DATEFRAIS`, `TYPE_MOTIF`, `TRAJET`, `KM`, `COUT_PEAGE`, `COUT_REPAS`, `COUT_HEBERGEMENT`, `KM_VALIDE`, `PEAGE_VALIDE`, `REPAS_VALIDE`, `HEBERGEMENT_VALIDE`, `VALIDE`) VALUES
(1, 'JEAN-CHRISTOPHE.BERBER@GMAIL.COM', '2019-03-13', 1, 'Perpignan-Toulouse', 12, 12, 12, 12, 0, 0, 0, 0, 0),
(14, 'JEAN-CHRISTOPHE.BERBER@GMAIL.COM', '2019-05-17', 1, 'Perpignan-Toulouse', 1, 1, 1, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

CREATE TABLE IF NOT EXISTS `ligues` (
  `NUMERO_LIG` bigint(4) NOT NULL DEFAULT '0',
  `NOM_LIG` varchar(50) DEFAULT NULL,
  `SIGLE_LIG` varchar(50) DEFAULT NULL,
  `PRESIDENT_LIG` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NUMERO_LIG`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ligues`
--

INSERT INTO `ligues` (`NUMERO_LIG`, `NOM_LIG`, `SIGLE_LIG`, `PRESIDENT_LIG`) VALUES
(1, 'Ligue Des Bretteurs Anonymes', 'LBA', 'Michel Sardou');

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

CREATE TABLE IF NOT EXISTS `motifs` (
  `TYPE_MOTIF` int(2) NOT NULL,
  `LIBELLE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TYPE_MOTIF`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `motifs`
--

INSERT INTO `motifs` (`TYPE_MOTIF`, `LIBELLE`) VALUES
(1, 'Réunion'),
(2, 'Compétition régionale'),
(3, 'Compétition nationale'),
(4, 'Compétition internationnale'),
(5, 'Stage');

-- --------------------------------------------------------

--
-- Structure de la table `tresoriers`
--

CREATE TABLE IF NOT EXISTS `tresoriers` (
  `NUMERO_TRE` bigint(4) NOT NULL AUTO_INCREMENT,
  `NOM_TRE` varchar(255) DEFAULT NULL,
  `PRENOM_TRE` varchar(255) DEFAULT NULL,
  `LOGIN_TRE` varchar(255) DEFAULT NULL,
  `MDP_TRE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NUMERO_TRE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tresoriers`
--

INSERT INTO `tresoriers` (`NUMERO_TRE`, `NOM_TRE`, `PRENOM_TRE`, `LOGIN_TRE`, `MDP_TRE`) VALUES
(1, 'Sabre', 'Pascal', 'SabrePascal', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
