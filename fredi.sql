-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 17 Mai 2017 à 22:52
-- Version du serveur :  5.7.18-0ubuntu0.16.04.1
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fredi`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE `adherents` (
  `NUMERO_LICENCE` varchar(20) NOT NULL,
  `SEXE` char(1) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `DATENAIS` date NOT NULL,
  `ADRESSE` varchar(60) NOT NULL,
  `CP` int(5) NOT NULL,
  `VILLE` varchar(60) NOT NULL,
  `ID_CLUB` bigint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adherents`
--

INSERT INTO `adherents` (`NUMERO_LICENCE`, `SEXE`, `NOM`, `PRENOM`, `DATENAIS`, `ADRESSE`, `CP`, `VILLE`, `ID_CLUB`) VALUES
(' 17 05 40 010 338', 'M', 'BERBIER', 'THEO', '0000-00-00', '12, rue de Marron', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 340', 'F', 'BERBIER', 'LUCILLE', '0000-00-00', '12, rue de Marron', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 443', 'M', 'BANDILELLA', 'CLEMENT', '0000-00-00', '30, rue Widric 1er', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 309', 'M', 'BECKER', 'ROMAIN', '0000-00-00', '1, rue des M?sanges', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 334', 'F', 'BIACQUEL', 'VERONIQUE', '0000-00-00', '27, rue de Santifontaine', 54000, 'Nancy', 0),
(' 17 05 40 010 399', 'F', 'BIDELOT', 'BRIGITTE', '0000-00-00', '5, rue des trois ?pis', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 442', 'F', 'BIDELOT', 'JULIE', '0000-00-00', '5, rue des trois ?pis', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 308', 'M', 'BILLOT', 'DIDIER', '0000-00-00', '6, rue de la Sapini?re', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 329', 'F', 'BILLOT', 'CLAIRE', '0000-00-00', '6, rue de la Sapini?re', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 254', 'F', 'BILLOT', 'MARIANNE', '0000-00-00', '6, rue de la Sapini?re', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 407', 'M', 'BINNET', 'MARIUS', '0000-00-00', '12, rue Edouard Grosjean', 54520, 'Laxou', 0),
(' 17 05 40 010 444', 'M', 'CALDI', 'THOMAS', '0000-00-00', '12, rue de Malz?ville', 54000, 'Nancy', 0),
(' 17 05 40 010 431', 'M', 'CASTEL', 'TIMOTHE', '0000-00-00', '26, rue de l\'abb? Didelot', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 428', 'M', 'CHEOLLE', 'NICOLAS', '0000-00-00', '46, rue de l\'abb? Didelot', 54520, 'Laxou', 0),
(' 17 05 40 010 414', 'M', 'CHERPION', 'UGO', '0000-00-00', '63, rue Fran?ais', 54000, 'Nancy', 0),
(' 17 05 40 010 441', 'M', 'CHEVOITINE', 'LOUIS', '0000-00-00', '40, rue de la r?publique', 54320, 'Max?ville', 0),
(' 17 05 40 010 440', 'M', 'CHOUARNO', 'TOM', '0000-00-00', '168, avenue de Boufflers', 54000, 'Nancy', 0),
(' 17 05 40 010 402', 'M', 'COTIN', 'FLORIAN', '0000-00-00', '14 route de Toul', 54113, 'Blenod les toul', 0),
(' 17 05 40 010 351', 'M', 'DEPERRIN', 'ARNAUD', '0000-00-00', '40 rue Paul Bert', 54600, 'Villers l?s Nancy', 0),
(' 17 05 40 010 409', 'F', 'DEPRETRE', 'BEATRICE', '0000-00-00', '26, rue du petit ?tang', 54110, 'Buissoncourt', 0),
(' 17 05 40 010 446', 'M', 'DUCRICK', 'AUGUSTIN', '0000-00-00', '31, rue du chanoine Pierron', 54600, 'Villers l?s nancy', 0),
(' 17 05 40 010 395', 'M', 'GARBILLON', 'GILLES', '0000-00-00', '31, avenue de Marron', 54600, 'Villers l?s nancy', 0);

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `ID_CLUB` bigint(4) NOT NULL,
  `NUMERO_LIGUE` bigint(4) NOT NULL,
  `NOM_CLUB` char(32) DEFAULT NULL,
  `TRESORIER` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demandeurs`
--

CREATE TABLE `demandeurs` (
  `ADRESSE_MAIL` char(80) NOT NULL,
  `NOM_DEMANDEUR` char(32) DEFAULT NULL,
  `PRENOM_DEMANDEUR` char(32) DEFAULT NULL,
  `RUE` char(32) DEFAULT NULL,
  `CP` bigint(5) DEFAULT NULL,
  `VILLE` char(32) DEFAULT NULL,
  `DATE_DE_NAISSANCE` date DEFAULT NULL,
  `NUM_RECU` int(7) DEFAULT NULL,
  `MDP` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demandeurs`
--

INSERT INTO `demandeurs` (`ADRESSE_MAIL`, `NOM_DEMANDEUR`, `PRENOM_DEMANDEUR`, `RUE`, `CP`, `VILLE`, `DATE_DE_NAISSANCE`, `NUM_RECU`, `MDP`) VALUES
('hertel.ar@gmail.com', 'hertel', 'arnaud', '545', 53543, NULL, NULL, NULL, '1234'),
('yoann@gmail.com', 'Yoann', 'RAZA', 'fort', 31150, 'Longeville', '2016-11-29', 0, '1234');

-- --------------------------------------------------------

--
-- Structure de la table `kilometres`
--

CREATE TABLE `kilometres` (
  `KM` decimal(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `kilometres`
--

INSERT INTO `kilometres` (`KM`) VALUES
('3.00'),
('3.00'),
('3.00');

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE `lien` (
  `NUMERO_LICENCE` bigint(12) NOT NULL,
  `ADRESSE_MAIL` char(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lien`
--

INSERT INTO `lien` (`NUMERO_LICENCE`, `ADRESSE_MAIL`) VALUES
(0, '17 05 40 010 1'),
(0, '17 05 40 010 3'),
(0, '17 05 40 010 4'),
(17, 'yoann');

-- --------------------------------------------------------

--
-- Structure de la table `lignes_frais`
--

CREATE TABLE `lignes_frais` (
  `ADRESSE_MAIL` char(80) NOT NULL,
  `IDFRAIS` bigint(4) NOT NULL,
  `NUM_MOTIF` int(2) NOT NULL,
  `DATEFRAIS` date NOT NULL,
  `TRAJET` char(128) DEFAULT NULL,
  `KM` bigint(4) DEFAULT NULL,
  `COUT_PEAGE` bigint(4) DEFAULT NULL,
  `COUT_REPAS` bigint(4) DEFAULT NULL,
  `COUT_HEBERGEMENT` bigint(4) DEFAULT NULL,
  `KM_VALIDE` tinyint(1) DEFAULT NULL,
  `PEAGE_VALIDE` tinyint(1) DEFAULT NULL,
  `REPAS_VALIDE` tinyint(1) DEFAULT NULL,
  `HEBERGEMENT_VALIDE` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignes_frais`
--

INSERT INTO `lignes_frais` (`ADRESSE_MAIL`, `IDFRAIS`, `NUM_MOTIF`, `DATEFRAIS`, `TRAJET`, `KM`, `COUT_PEAGE`, `COUT_REPAS`, `COUT_HEBERGEMENT`, `KM_VALIDE`, `PEAGE_VALIDE`, `REPAS_VALIDE`, `HEBERGEMENT_VALIDE`) VALUES
('hertel.ar@gmail.com', 1, 1, '2016-11-28', 'nh', 520, 41, 41, 15, NULL, NULL, NULL, NULL),
('hertel.ar@gmail.com', 2, 1, '2016-11-22', 'toulouse-paname', 2550, 525, 22, 250, NULL, NULL, NULL, NULL),
('hertel.ar@gmail.com', 3, 3, '2017-01-12', 'Cahors - Cahors', 52, 424, 42, 10, NULL, NULL, NULL, NULL);

--
-- Déclencheurs `lignes_frais`
--
DELIMITER $$
CREATE TRIGGER `upd_lignes` BEFORE UPDATE ON `lignes_frais` FOR EACH ROW BEGIN
IF(NEW.DATEFRAIS IS NULL)
THEN
	INSERT INTO lignes_frais(IDFRAIS, DATEFRAIS) VALUES(IDFRAIS,OLD.DATEFRAIS);
    END IF;
    IF (NEW.KM IS NULL) 
    THEN
        INSERT INTO lignes_frais (IDFRAIS, KM) VALUES (IDFRAIS, OLD.KM);  
     END IF;
    IF (NEW.TRAJET IS NULL) 
    THEN
        INSERT INTO lignes_frais (IDFRAIS, TRAJET) VALUES (IDFRAIS, OLD.TRAJET);  
        END IF;
    IF (NEW.DATEFRAIS IS NULL) 
    THEN
        INSERT INTO lignes_frais (IDFRAIS, DATEFRAIS) VALUES (IDFRAIS, OLD.DATEFRAIS);  
    END IF; 
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

CREATE TABLE `ligues` (
  `NUMERO_LIGUE` bigint(4) NOT NULL,
  `NOM_LIGUE` char(32) DEFAULT NULL,
  `SIGLE` char(32) DEFAULT NULL,
  `PRESIDENT` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

CREATE TABLE `motifs` (
  `NUM_MOTIF` int(2) NOT NULL,
  `LIBELLE` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `motifs`
--

INSERT INTO `motifs` (`NUM_MOTIF`, `LIBELLE`) VALUES
(1, 'Réunion'),
(2, 'Compétition régionale'),
(3, 'Compétition nationale'),
(4, 'Compétition internationnale'),
(5, 'Stage');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD PRIMARY KEY (`NUMERO_LICENCE`),
  ADD KEY `FK_ADHERENTS_CLUBS` (`ID_CLUB`);

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`ID_CLUB`),
  ADD KEY `FK_CLUBS_LIGUES` (`NUMERO_LIGUE`);

--
-- Index pour la table `demandeurs`
--
ALTER TABLE `demandeurs`
  ADD PRIMARY KEY (`ADRESSE_MAIL`);

--
-- Index pour la table `lien`
--
ALTER TABLE `lien`
  ADD PRIMARY KEY (`NUMERO_LICENCE`,`ADRESSE_MAIL`),
  ADD KEY `FK_LIEN_DEMANDEURS` (`ADRESSE_MAIL`);

--
-- Index pour la table `lignes_frais`
--
ALTER TABLE `lignes_frais`
  ADD PRIMARY KEY (`ADRESSE_MAIL`,`IDFRAIS`),
  ADD KEY `FK_LIGNES_FRAIS_MOTIFS` (`NUM_MOTIF`);

--
-- Index pour la table `ligues`
--
ALTER TABLE `ligues`
  ADD PRIMARY KEY (`NUMERO_LIGUE`);

--
-- Index pour la table `motifs`
--
ALTER TABLE `motifs`
  ADD PRIMARY KEY (`NUM_MOTIF`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `lignes_frais`
--
ALTER TABLE `lignes_frais`
  MODIFY `IDFRAIS` bigint(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
