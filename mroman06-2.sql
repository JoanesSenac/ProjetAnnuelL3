-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 12 nov. 2023 à 22:12
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
-- Structure de la table `Pistes`
--

CREATE TABLE `Pistes` (
  `Id_Pistes` int NOT NULL,
  `NomPistes` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `CouleursP` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Id_Station` int DEFAULT NULL,
  `NomVillage` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Pistes`
--

INSERT INTO `Pistes` (`Id_Pistes`, `NomPistes`, `CouleursP`, `Id_Station`, `NomVillage`) VALUES
(1, 'Rochebrune', 'Rouge', 1, 'Megeve'),
(2, 'Écureuils', 'Vert', 1, 'Megeve'),
(5, 'Les Bois des ours', 'Rouge', 2, 'Arcs'),
(6, 'La piste doree', 'Noir', 2, 'Arcs'),
(7, 'Camino Blanco', 'Vert', 7, 'Baños de Panticosa'),
(8, 'Nordvinden', 'Noir', 9, 'Junsele'),
(9, 'Etoile du nord', 'Bleu', 13, 'Banff'),
(10, 'Ride', 'Noir', 12, 'Aspen Village');

-- --------------------------------------------------------

--
-- Structure de la table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `Id_Restaurant` int NOT NULL,
  `NomRestaurant` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `LieuR` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `AnneeR` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Restaurant`
--

INSERT INTO `Restaurant` (`Id_Restaurant`, `NomRestaurant`, `LieuR`, `AnneeR`) VALUES
(1, 'LaFondue', 'Alpes', 2008),
(2, 'LaPisteGourmande', 'Pyrenees', 1993),
(3, 'LAuberge', 'Alpes', 2001),
(4, 'OursBlanc', 'Frontiere Norvegiennes ', 1963),
(5, 'LaTaniere', 'Alpes', 1965),
(6, 'SommetSavoureux', 'Nord de Suede', 2004),
(7, 'Montagnard', 'Pyrenees', 2004),
(8, 'LeRepaireDesSkieurs', 'Alpes', 2007),
(9, 'LaBonneFourchette', 'Alpes', 1977),
(10, 'RestoRaclette', 'Alberta', 1950),
(11, 'Hemsedal fika', 'Scandinavie', 1999),
(12, 'Mountain View Grill', 'Colorado', 1949),
(13, 'Refugio', 'Russie', 2003),
(14, 'Megeve', 'Alpes', 2010);

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

-- --------------------------------------------------------

--
-- Structure de la table `Station`
--

CREATE TABLE `Station` (
  `Id_Station` int NOT NULL,
  `NomStation` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `AnneeOuverture` int DEFAULT NULL,
  `Pays` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Id_Restaurant` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Station`
--

INSERT INTO `Station` (`Id_Station`, `NomStation`, `AnneeOuverture`, `Pays`, `Id_Restaurant`) VALUES
(1, 'Megeve', 2001, 'France', 14),
(2, 'Arcs', 1965, 'France', 9),
(3, 'Valloire', 2001, 'France', 3),
(5, 'Verbier', 1965, 'Suisse', 5),
(6, 'Davos', 2004, 'Suisse', 8),
(7, 'Panticosa', 1977, 'Espagne', 2),
(8, 'Baqueira', 2002, 'Espagne', 7),
(9, 'Ares', 2002, 'Suede', 6),
(10, 'Trysil', 1963, 'Norvege', 4),
(11, 'Hemsedal', 1999, 'Norvege', 11),
(12, 'Aspen', 1947, 'USA', 12),
(13, 'Banff', 1950, 'Canada', 10),
(14, 'Cheregech', 2002, 'Russie', 13),
(15, 'Courchevel', 2008, 'France', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Tenues`
--

CREATE TABLE `Tenues` (
  `Id_Tenues` int NOT NULL,
  `Couleur` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Chaussures` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Accessoires` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Hauts` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Taille` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Tenues`
--

INSERT INTO `Tenues` (`Id_Tenues`, `Couleur`, `Chaussures`, `Accessoires`, `Hauts`, `Taille`) VALUES
(1, 'Rouge', 'UGG', 'Casque', 'Pull', 'S'),
(2, 'Bleu', 'ApresSki', 'Casque', 'Pull', 'XS'),
(3, 'Rouge', 'ApresSki', 'Collier', 'Chemise', 'M'),
(4, 'Rouge', 'UGG', 'Collier', 'Pull', 'L'),
(5, 'Rose', 'Bottes', 'Lunettes', 'Polaire', 'M'),
(6, 'Vert', 'Chaussons', 'Bracelet', 'Debardeur', 'L'),
(7, 'Violet', 'Baskets', 'Gants', 'Polaire', 'S'),
(8, 'Orange', 'ApresSKi', 'Mouffle', 'Manteau', 'XXL'),
(9, 'Noir', 'UGG', 'Chaussettes', 'TeeShirt', 'M'),
(10, 'Bleu', 'Bottes', 'Chaussettes', 'TeeShirt', 'M');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Pistes`
--
ALTER TABLE `Pistes`
  ADD PRIMARY KEY (`Id_Pistes`),
  ADD KEY `Id_Station` (`Id_Station`);

--
-- Index pour la table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`Id_Restaurant`);

--
-- Index pour la table `Skieur`
--
ALTER TABLE `Skieur`
  ADD PRIMARY KEY (`Id_Skieur`),
  ADD KEY `Id_Station` (`Id_Station`),
  ADD KEY `Id_Tenues` (`Id_Tenues`);

--
-- Index pour la table `Station`
--
ALTER TABLE `Station`
  ADD PRIMARY KEY (`Id_Station`),
  ADD KEY `Id_Restaurant` (`Id_Restaurant`);

--
-- Index pour la table `Tenues`
--
ALTER TABLE `Tenues`
  ADD PRIMARY KEY (`Id_Tenues`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Pistes`
--
ALTER TABLE `Pistes`
  MODIFY `Id_Pistes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `Id_Restaurant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `Skieur`
--
ALTER TABLE `Skieur`
  MODIFY `Id_Skieur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Station`
--
ALTER TABLE `Station`
  MODIFY `Id_Station` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `Tenues`
--
ALTER TABLE `Tenues`
  MODIFY `Id_Tenues` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Pistes`
--
ALTER TABLE `Pistes`
  ADD CONSTRAINT `Pistes_ibfk_1` FOREIGN KEY (`Id_Station`) REFERENCES `Station` (`Id_Station`);

--
-- Contraintes pour la table `Skieur`
--
ALTER TABLE `Skieur`
  ADD CONSTRAINT `Skieur_ibfk_1` FOREIGN KEY (`Id_Station`) REFERENCES `Station` (`Id_Station`),
  ADD CONSTRAINT `Skieur_ibfk_2` FOREIGN KEY (`Id_Tenues`) REFERENCES `Tenues` (`Id_Tenues`);

--
-- Contraintes pour la table `Station`
--
ALTER TABLE `Station`
  ADD CONSTRAINT `Station_ibfk_2` FOREIGN KEY (`Id_Restaurant`) REFERENCES `Restaurant` (`Id_Restaurant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
