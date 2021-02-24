-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 13 Mai 2019 à 23:00
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `trotinette`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `num_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_c` varchar(20) DEFAULT NULL,
  `prenom_c` varchar(20) DEFAULT NULL,
  `adresse_c` varchar(50) DEFAULT NULL,
  `mot_de_passe_c` varchar(20) NOT NULL,
  PRIMARY KEY (`num_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`num_client`, `nom_c`, `prenom_c`, `adresse_c`, `mot_de_passe_c`) VALUES
(1, 'lougani', 'fouzi', 'perpignan', '123'),
(2, 'tafat', 'aghiles', 'perpignan66', '1234'),
(3, 'messi', 'lion', 'barca ', '10');

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE IF NOT EXISTS `contient` (
  `num_station` int(11) NOT NULL,
  `num_trot` int(11) NOT NULL,
  `date_c` date DEFAULT NULL,
  PRIMARY KEY (`num_station`,`num_trot`),
  KEY `num_trot` (`num_trot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contient`
--

INSERT INTO `contient` (`num_station`, `num_trot`, `date_c`) VALUES
(1, 1, '2019-05-01'),
(1, 2, '2019-05-01'),
(1, 5, '2019-05-01'),
(1, 7, '2019-05-01'),
(2, 4, '2019-05-01'),
(2, 7, '2019-05-01'),
(4, 6, '2019-05-01');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `num_employe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_e` varchar(20) DEFAULT NULL,
  `prenom_e` varchar(20) DEFAULT NULL,
  `adresse_e` varchar(50) DEFAULT NULL,
  `mot_de_passe_e` varchar(20) NOT NULL,
  PRIMARY KEY (`num_employe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`num_employe`, `nom_e`, `prenom_e`, `adresse_e`, `mot_de_passe_e`) VALUES
(2, 'gerrard', 'pique', 'Paris', '3211'),
(3, 'richau', 'joseph', 'montpellier 34000', '0000'),
(22, 'hamouche', 'hamza', 'perpignan', '111');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `num_client` int(11) NOT NULL,
  `num_trot` int(11) NOT NULL,
  `date_loc` date DEFAULT NULL,
  `duree_loc` int(11) NOT NULL,
  PRIMARY KEY (`num_client`,`num_trot`),
  KEY `num_trot` (`num_trot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`num_client`, `num_trot`, `date_loc`, `duree_loc`) VALUES
(1, 1, '2019-05-01', 45),
(1, 4, '2019-05-01', 158),
(2, 2, '2019-05-01', 1313),
(3, 7, '2019-05-01', 500);

-- --------------------------------------------------------

--
-- Structure de la table `probleme`
--

CREATE TABLE IF NOT EXISTS `probleme` (
  `num_prob` int(11) NOT NULL,
  `etat_prob` varchar(15) NOT NULL,
  `date_prob` date DEFAULT NULL,
  `num_station` int(11) NOT NULL,
  `num_trot` int(11) NOT NULL,
  PRIMARY KEY (`num_prob`),
  KEY `num_station` (`num_station`),
  KEY `num_trot` (`num_trot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `probleme`
--

INSERT INTO `probleme` (`num_prob`, `etat_prob`, `date_prob`, `num_station`, `num_trot`) VALUES
(1, 'regle', '2019-05-01', 1, 3),
(2, 'nonregle', '2019-05-01', 4, 1);

--
-- Déclencheurs `probleme`
--
DROP TRIGGER IF EXISTS `tr3`;
DELIMITER //
CREATE TRIGGER `tr3` AFTER INSERT ON `probleme`
 FOR EACH ROW BEGIN 
if NOT(new.etat_prob="regle" or new.etat_prob="nonregle" ) then
 INSERT INTO probleme(num_prob,etat_prob,date_prob,num_station,num_trot) VALUES (new.num_prob,new.etat_prob,new.date_prob,new.num_station,new.num_trot); end IF; END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `num_station` int(11) NOT NULL AUTO_INCREMENT,
  `nom_s` varchar(20) DEFAULT NULL,
  `adresse_s` varchar(50) DEFAULT NULL,
  `max_trot` int(11) NOT NULL,
  `num_employe` int(11) NOT NULL,
  PRIMARY KEY (`num_station`),
  KEY `num_employe` (`num_employe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `station`
--

INSERT INTO `station` (`num_station`, `nom_s`, `adresse_s`, `max_trot`, `num_employe`) VALUES
(1, 'a', 'perpignan', 2, 22),
(2, 'b', 'argeles', 5, 22),
(3, 'c', 'canet', 2, 3),
(4, 'd', 'marseille', 3, 22);

-- --------------------------------------------------------

--
-- Structure de la table `trotinette`
--

CREATE TABLE IF NOT EXISTS `trotinette` (
  `num_trot` int(11) NOT NULL AUTO_INCREMENT,
  `disponibilite` char(15) NOT NULL,
  `etat_marche` char(15) NOT NULL,
  `num_employe` int(11) NOT NULL,
  PRIMARY KEY (`num_trot`),
  KEY `num_employe` (`num_employe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `trotinette`
--

INSERT INTO `trotinette` (`num_trot`, `disponibilite`, `etat_marche`, `num_employe`) VALUES
(1, 'loue', 'fonction', 22),
(2, 'loue', 'fonction', 22),
(3, 'quai', 'enpanne', 2),
(4, 'loue', 'fonction', 3),
(5, 'quai', 'fonction', 2),
(6, 'loue', 'fonction', 22),
(7, 'loue', 'fonction', 2);

--
-- Déclencheurs `trotinette`
--
DROP TRIGGER IF EXISTS `tr1`;
DELIMITER //
CREATE TRIGGER `tr1` AFTER INSERT ON `trotinette`
 FOR EACH ROW BEGIN 
if NOT(new.disponibilite="quai" or new.disponibilite="loue" ) then 
INSERT into trotinette(num_trot,disponibilite,etat_marche,num_employe)
values (new.num_trot,new.disponibilite,new.etat_marche,new.num_employe); 
end IF; END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr2`;
DELIMITER //
CREATE TRIGGER `tr2` BEFORE INSERT ON `trotinette`
 FOR EACH ROW BEGIN 
if NOT(new.etat_marche="fonction" or new.etat_marche="enpanne" ) then 
INSERT into trotinette(num_trot,disponibilite,etat_marche,num_employe)
values (new.num_trot,new.disponibilite,new.etat_marche,new.num_employe); 
end IF; 
END
//
DELIMITER ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`num_station`) REFERENCES `station` (`num_station`),
  ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`num_trot`) REFERENCES `trotinette` (`num_trot`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`num_client`) REFERENCES `client` (`num_client`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`num_trot`) REFERENCES `trotinette` (`num_trot`);

--
-- Contraintes pour la table `probleme`
--
ALTER TABLE `probleme`
  ADD CONSTRAINT `probleme_ibfk_1` FOREIGN KEY (`num_station`) REFERENCES `station` (`num_station`),
  ADD CONSTRAINT `probleme_ibfk_2` FOREIGN KEY (`num_trot`) REFERENCES `trotinette` (`num_trot`);

--
-- Contraintes pour la table `station`
--
ALTER TABLE `station`
  ADD CONSTRAINT `station_ibfk_1` FOREIGN KEY (`num_employe`) REFERENCES `employe` (`num_employe`);

--
-- Contraintes pour la table `trotinette`
--
ALTER TABLE `trotinette`
  ADD CONSTRAINT `trotinette_ibfk_1` FOREIGN KEY (`num_employe`) REFERENCES `employe` (`num_employe`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
