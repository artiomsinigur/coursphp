-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Lun 26 Mai 2014 Ã  18:50
-- Généré le: Lun 26 Mai 2014 Ã  18:50
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `sigle` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `idProfesseur` int(11) NOT NULL,
  PRIMARY KEY (`sigle`),
  KEY `idProfesseur` (`idProfesseur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`sigle`, `titre`, `idProfesseur`) VALUES
(11, 'Programmation Web Dynamique 1', 2),
(21, 'Programmation Web Dynamique 2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `code` varchar(12) NOT NULL DEFAULT '',
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`code`, `prenom`, `nom`, `age`, `sexe`, `status`) VALUES
('BOUB10038801', 'Benoit', 'Bouchard', 26, 'M', 'Actif'),
('TREV19018302', 'Valérie', 'Tremblay', 31, 'F', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `sigleCours` int(11) NOT NULL,
  `idEtudiant` varchar(12) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY(sigleCours, idEtudiant),
  KEY `sigleCours` (`sigleCours`),
  KEY `idEtudiant` (`idEtudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`sigleCours`, `idEtudiant`, `note`) VALUES
(11, 'BOUB10038801', 69),
(21, 'BOUB10038801', 82),
(11, 'TREV19018302', 72),
(21, 'TREV19018302', 75);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`id`, `nom`, `prenom`) VALUES
(1, 'Harvey', 'Guillaume'),
(2, 'Martel', 'Jonathan');

--
-- Contraintes pour les tables exportÃ©es
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`idProfesseur`) REFERENCES `professeur` (`id`);

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`code`),
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`sigleCours`) REFERENCES `cours` (`sigle`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

