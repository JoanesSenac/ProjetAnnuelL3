-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 12 nov. 2023 à 21:13
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mroman06`
--

-- --------------------------------------------------------

--
-- Structure de la table `Skieur`
--

CREATE TABLE `Skieur` (
  `Id_Skieur` int NOT NULL,
  `PrenomS` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `AgeS` int DEFAULT NULL,
  `AnneeS` int DEFAULT NULL,
  `NiveauS` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Id_Station` int DEFAULT NULL,
  `Id_Tenues` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Skieur`
--

INSERT INTO `Skieur` (`Id_Skieur`, `PrenomS`, `AgeS`, `AnneeS`, `NiveauS`, `Id_Station`, `Id_Tenues`) VALUES
(1, 'popeye', 22, 2001, 'etoileOr', 3, 1),
(2, 'gigi', 30, 1993, 'ourson', 2, 5),
(3, 'esphie', 23, 2000, 'ourson', 5, 2),
(4, 'zoe', 22, 2001, 'troisiemeEtoile', 14, 7),
(5, 'louis', 22, 2001, 'flocon', 11, 9),
(6, 'gael', 23, 2000, 'pioupiou', 7, 6),
(7, 'charlie', 23, 2000, 'flocon', 12, 10),
(8, 'jose', 65, 1958, 'etoileOr', 1, 4),
(9, 'Annie', 60, 1963, 'etoileBronze', 8, 5),
(10, 'Salomee', 15, 2008, 'premiereEtoile', 13, 9);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Skieur`
--
ALTER TABLE `Skieur`
  ADD PRIMARY KEY (`Id_Skieur`),
  ADD KEY `Id_Station` (`Id_Station`),
  ADD KEY `Id_Tenues` (`Id_Tenues`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Skieur`
--
ALTER TABLE `Skieur`
  MODIFY `Id_Skieur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Skieur`
--
ALTER TABLE `Skieur`
  ADD CONSTRAINT `Skieur_ibfk_1` FOREIGN KEY (`Id_Station`) REFERENCES `Station` (`Id_Station`),
  ADD CONSTRAINT `Skieur_ibfk_2` FOREIGN KEY (`Id_Tenues`) REFERENCES `Tenues` (`Id_Tenues`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
