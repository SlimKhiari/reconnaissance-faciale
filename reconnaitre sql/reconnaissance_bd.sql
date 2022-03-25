-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 07 mars 2022 à 20:02
-- Version du serveur : 8.0.25
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pif`
--

-- --------------------------------------------------------

--
-- Structure de la table `accueil`
--

DROP TABLE IF EXISTS `accueil`;
CREATE TABLE IF NOT EXISTS `accueil` (
  `Id_acc` int NOT NULL,
  KEY `Id_acc` (`Id_acc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `accueil`
--

INSERT INTO `accueil` (`Id_acc`) VALUES
(2),
(3);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id_admin` int NOT NULL,
  KEY `Id_admin` (`Id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Id_admin`) VALUES
(0);

-- --------------------------------------------------------

--
-- Structure de la table `employeur`
--

DROP TABLE IF EXISTS `employeur`;
CREATE TABLE IF NOT EXISTS `employeur` (
  `Id_emp` int NOT NULL,
  KEY `Id_emp` (`Id_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employeur`
--

INSERT INTO `employeur` (`Id_emp`) VALUES
(1),
(4);

-- --------------------------------------------------------

--
-- Structure de la table `personnesinternes`
--

DROP TABLE IF EXISTS `personnesinternes`;
CREATE TABLE IF NOT EXISTS `personnesinternes` (
  `idpersonnesInternes` int NOT NULL,
  `Nom` varchar(95) NOT NULL,
  `Prenom` varchar(95) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `mot_de_passe` varchar(45) NOT NULL,
  `nom_du_fichier` varchar(200) NOT NULL,
  `Sex` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idpersonnesInternes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personnesinternes`
--

INSERT INTO `personnesinternes` (`idpersonnesInternes`, `Nom`, `Prenom`, `Date_de_naissance`, `email`, `mot_de_passe`, `nom_du_fichier`, `Sex`, `Description`, `phone`) VALUES
(0, 'Khiari', 'Slim', '1999-03-02', 'slim.khiari.03@gmail.com', 'pass', '/faces/slim-khj.jpg', 'H', 'ADM', '0600000000'),
(1, 'Benslama', 'Chahed', '1998-05-06', 'chahed@gmail.com', 'pass', '/faces/chahed.jpg ', 'H', 'EMP', '0611111111'),
(2, 'Talha', 'Elhassane', '1998-04-25', 'elhassane@gmail.com', 'pass', '/faces/elhassan.jpg', 'H', 'ACC', '0700000000'),
(3, 'Elbaroudi', 'Marwan', '1999-01-23', 'elbaroudi@gmail.com', 'pass', '/faces/elbaroudi.jpg', 'H', 'ACC', '0711111111'),
(4, 'Laraiba', 'Wassim', '1999-05-15', 'wassim@gmail.com', 'pass', '/faces/wassim.jpg', 'H', 'EMP', '0712345678');

-- --------------------------------------------------------

--
-- Structure de la table `presencepersonnesinternes`
--

DROP TABLE IF EXISTS `presencepersonnesinternes`;
CREATE TABLE IF NOT EXISTS `presencepersonnesinternes` (
  `idpresencePersonnesInternes` int NOT NULL AUTO_INCREMENT,
  `idpersonnesInterne` int DEFAULT NULL,
  `date_presence` varchar(50) NOT NULL,
  `present_e` tinyint NOT NULL,
  PRIMARY KEY (`idpresencePersonnesInternes`),
  KEY `idpersonnesInterne_idx` (`idpersonnesInterne`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `presencepersonnesinternes`
--

INSERT INTO `presencepersonnesinternes` (`idpresencePersonnesInternes`, `idpersonnesInterne`, `date_presence`, `present_e`) VALUES
(86, 0, '2022-01-24', 1),
(87, 1, '2022-01-24', 0),
(88, 2, '2022-01-24', 0),
(89, 3, '2022-01-24', 0),
(90, 4, '2022-01-24', 0);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `ID_v` int NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prénom` varchar(50) NOT NULL,
  `Téléphone` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pièce_identité` varchar(255) NOT NULL,
  `Motif` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_v`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `visiteur_accepter`
--

DROP TABLE IF EXISTS `visiteur_accepter`;
CREATE TABLE IF NOT EXISTS `visiteur_accepter` (
  `ID_Va` int DEFAULT NULL,
  `motif` varchar(255) DEFAULT NULL,
  KEY `ID_Va` (`ID_Va`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `visiteur_rejeter`
--

DROP TABLE IF EXISTS `visiteur_rejeter`;
CREATE TABLE IF NOT EXISTS `visiteur_rejeter` (
  `ID_Vr` int DEFAULT NULL,
  `motif` varchar(255) DEFAULT NULL,
  KEY `ID_Vr` (`ID_Vr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accueil`
--
ALTER TABLE `accueil`
  ADD CONSTRAINT `accueil_ibfk_1` FOREIGN KEY (`Id_acc`) REFERENCES `personnesinternes` (`idpersonnesInternes`);

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Id_admin`) REFERENCES `personnesinternes` (`idpersonnesInternes`);

--
-- Contraintes pour la table `employeur`
--
ALTER TABLE `employeur`
  ADD CONSTRAINT `employeur_ibfk_1` FOREIGN KEY (`Id_emp`) REFERENCES `personnesinternes` (`idpersonnesInternes`);

--
-- Contraintes pour la table `presencepersonnesinternes`
--
ALTER TABLE `presencepersonnesinternes`
  ADD CONSTRAINT `idpersonnesInterne` FOREIGN KEY (`idpersonnesInterne`) REFERENCES `personnesinternes` (`idpersonnesInternes`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `visiteur_accepter`
--
ALTER TABLE `visiteur_accepter`
  ADD CONSTRAINT `visiteur_accepter_ibfk_1` FOREIGN KEY (`ID_Va`) REFERENCES `visiteur` (`ID_v`);

--
-- Contraintes pour la table `visiteur_rejeter`
--
ALTER TABLE `visiteur_rejeter`
  ADD CONSTRAINT `visiteur_rejeter_ibfk_1` FOREIGN KEY (`ID_Vr`) REFERENCES `visiteur` (`ID_v`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;