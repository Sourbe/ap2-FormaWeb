-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 08 déc. 2022 à 09:54
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_forma`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `LOGINA` char(32) NOT NULL,
  `MDPA` char(20) DEFAULT NULL,
  `NOMA` char(32) DEFAULT NULL,
  `PRENOMA` char(32) DEFAULT NULL,
  `FONCTIONA` char(32) DEFAULT NULL,
  PRIMARY KEY (`LOGINA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`LOGINA`, `MDPA`, `NOMA`, `PRENOMA`, `FONCTIONA`) VALUES
('girouxm', 'test', 'Giroux', 'Mathilde', 'Assistante formation'),
('xaneth', 'test', 'Xaneth', 'Hugo', 'Directeur');

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `IDAS` int(3) NOT NULL,
  `NOMAS` char(50) DEFAULT NULL,
  `NUMICOM` int(8) DEFAULT NULL,
  `NOMGERANT` char(32) DEFAULT NULL,
  `PRENOMGERANT` char(32) DEFAULT NULL,
  `COURRIEL` char(32) DEFAULT NULL,
  `TEL` char(10) DEFAULT NULL,
  PRIMARY KEY (`IDAS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `association`
--

INSERT INTO `association` (`IDAS`, `NOMAS`, `NUMICOM`, `NOMGERANT`, `PRENOMGERANT`, `COURRIEL`, `TEL`) VALUES
(1, 'C.E Laxovien', 79346589, 'Silberschmidt', 'Gilles', 'contact@escrime-laxou.net', '0383467722'),
(2, 'C.E de Luneville', 79346589, 'Charroy', 'Carole', 'escrime.luneville@gmail.com', '0699020096'),
(3, 'C.E de Richardmenil', 79346589, 'Metrich', 'Régine', 'escrime.richardmenil@laposte.net', '0383256594'),
(4, 'C.E de Vandoeuvre', 79346589, 'Issatier', 'Patrice', 'escrime.issartier@sfr.fr', '0611725732'),
(5, 'Salle d\'arme de Nancy', 79346589, 'Gehin', 'Christiane', 'christianegehin@clubinternet.fr', '0383901715'),
(6, 'C.E de PT à Mousson', 79346589, 'Grosse', 'Hervé', 'gaecdelahaye.grosse@wanadoo.fr', '0687033321'),
(7, 'Escrime Seichamps St-Max Essy', 79346589, 'Kujawa', 'Patrick', 'patrick.escrime54@orange.fr', '0666156001'),
(8, 'C.E de Toul Escrime', 79346589, 'Baudino', 'Georges', 'louescrime@yahoo.fr', '0383627101'),
(9, 'C.E du Pays Haut', 79346589, 'Buchert', 'Jean-Marie', 'jmariebucher@hotmail.com', '0382892851'),
(10, 'Omnisports Frouart/Pompey', 79346589, 'Gaillet', 'Gérard', 'gaillet.mangenot@yahoo.fr', '0383246762');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `IDFORM` int(2) NOT NULL,
  `CODETYPE` char(3) NOT NULL,
  `NOMF` char(50) DEFAULT NULL,
  `PUBLICF` char(200) DEFAULT NULL,
  `OBJECTIFF` char(255) DEFAULT NULL,
  `CONTENUF` char(255) DEFAULT NULL,
  `COUTF` int(3) DEFAULT NULL,
  `LIEUF` char(150) DEFAULT NULL,
  PRIMARY KEY (`IDFORM`),
  KEY `I_FK_FORMATION_TYPE_FORMATION` (`CODETYPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`IDFORM`, `CODETYPE`, `NOMF`, `PUBLICF`, `OBJECTIFF`, `CONTENUF`, `COUTF`, `LIEUF`) VALUES
(1, 'INF', 'Formation Power point Niveau 2 - 1 journée', 'Bénévoles, et salariés du mouvement sportif', 'Parfaire ses connaissances sur PowerPoint', 'Amélioration d’une présentation, L’affichage, Personnalisation des diapositives, Les modèles, Les animations, Enregistrer une présentation, Ajouter du son, PowerPoint et Internet', 55, 'Salle2 informatique Maison Régionale des Sports de Lorraine 13 Rue Jean Moulin 54 510 Tomblaine'),
(2, 'INF', 'Formation Photoshop –Niveau 1- 1 journée', 'Bénévoles, et salariés du mouvement sportif désirant s’ouvrir\r\naux techniques de traitement informatique de l’image ainsi qu’à la\r\npratique de la photographie numérique', 'Découvrir le traitement des images numériques couleur ainsi que leur séparation quadrichromique. Répondre aux besoins des photographes, photograveurs, des créatifs et des inventeurs d’images. Acquérir une méthode de travail professionnelle', 'Rappels sur les images numériques, Les modes colorimétriques, Présentation et personnalisation, Traitement numérique et retouche partielle, Travaux photographiques, Principes de base d’impression, Mises en pratique et capacités', 110, 'Salle Rodier 15 Rue Graphigro 54510 Tomblaine');

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

DROP TABLE IF EXISTS `intervenant`;
CREATE TABLE IF NOT EXISTS `intervenant` (
  `IDI` int(3) NOT NULL,
  `NOMI` char(32) DEFAULT NULL,
  `PRENOMI` char(32) DEFAULT NULL,
  `ENTREPRISEI` char(32) DEFAULT NULL,
  PRIMARY KEY (`IDI`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `intervenant` (`IDI`, `NOMI`, `PRENOMI`, `ENTREPRISEI`) VALUES
(1, 'Poe', 'Jérôme', 'RMI Informatique'),
(2, 'Dufour', 'Fabienne', 'RMI Informatique'),
(3, 'Herro', 'Daniel', 'Graphiste');

-- --------------------------------------------------------

--
-- Structure de la table `intervenir`
--

DROP TABLE IF EXISTS `intervenir`;
CREATE TABLE IF NOT EXISTS `intervenir` (
  `IDI` int(3) NOT NULL,
  `IDFORM` int(2) NOT NULL,
  PRIMARY KEY (`IDI`,`IDFORM`),
  KEY `I_FK_INTERVENIR_INTERVENANT` (`IDI`),
  KEY `I_FK_INTERVENIR_FORMATION` (`IDFORM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `IDFORM` int(2) NOT NULL,
  `NUMS` int(2) NOT NULL,
  `LOGINS` char(32) NOT NULL,
  PRIMARY KEY (`IDFORM`,`LOGINS`),
  KEY `I_FK_PARTICIPER_SESSION` (`IDFORM`,`NUMS`),
  KEY `I_FK_PARTICIPER_STAGIAIRE` (`LOGINS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `IDFORM` int(2) NOT NULL,
  `NUMS` int(2) NOT NULL,
  `HEUREDEBUTS` time DEFAULT NULL,
  `HEUREFINS` time DEFAULT NULL,
  `DATES` date DEFAULT NULL,
  `DATELIMITEINSCR` date DEFAULT NULL,
  `NBPLACES` int(3) DEFAULT NULL,
  PRIMARY KEY (`IDFORM`,`NUMS`),
  KEY `I_FK_SESSION_FORMATION` (`IDFORM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`IDFORM`, `NUMS`, `HEUREDEBUTS`, `HEUREFINS`, `DATES`, `DATELIMITEINSCR`, `NBPLACES`) VALUES
(1, 1, '09:00:00', '18:00:00', '2022-11-21', '2022-10-30', 30),
(2, 1, '09:00:00', '17:00:00', '2022-12-07', '2022-11-21', 30),
(2, 2, '09:00:00', '17:00:00', '2022-12-14', '2022-11-21', 30);

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE IF NOT EXISTS `stagiaire` (
  `LOGINS` char(32) NOT NULL,
  `IDAS` int(3) NOT NULL,
  `MDPS` char(20) DEFAULT NULL,
  `NOMS` char(32) DEFAULT NULL,
  `PRENOMS` char(32) DEFAULT NULL,
  `ADRESSES` char(50) DEFAULT NULL,
  `CPS` int(5) DEFAULT NULL,
  `VILLES` char(32) DEFAULT NULL,
  `EMAILS` char(32) DEFAULT NULL,
  `STATUTS` char(32) DEFAULT NULL,
  `FONCTIONS` char(32) DEFAULT NULL,
  PRIMARY KEY (`LOGINS`),
  KEY `I_FK_STAGIAIRE_ASSOCIATION` (`IDAS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`LOGINS`, `IDAS`, `MDPS`, `NOMS`, `PRENOMS`, `ADRESSES`, `CPS`, `VILLES`, `EMAILS`, `STATUTS`, `FONCTIONS`) VALUES
('test', 1, 'test', 'test', 'test', 'test', 1, 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

DROP TABLE IF EXISTS `type_formation`;
CREATE TABLE IF NOT EXISTS `type_formation` (
  `CODETYPE` char(3) NOT NULL,
  `LIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODETYPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_formation`
--

INSERT INTO `type_formation` (`CODETYPE`, `LIBELLE`) VALUES
('GES', 'Gestion'),
('INF', 'Informatique'),
('DUR', 'Développement durable'),
('SEC', 'Secourisme'),
('COM', 'Communication');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
