-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 04 oct. 2023 à 01:21
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `flocolis`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Flost', 'jojobizare');

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `id_agence` int NOT NULL,
  `NomAg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NomPDG` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Descrption` varchar(255) NOT NULL,
  `SiegeP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Passord` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id_agence`, `NomAg`, `NomPDG`, `Descrption`, `SiegeP`, `Passord`, `site`, `create_at`) VALUES
(5, 'Finex voyage', 'M. ABELA', 'Agence de voyage', 'Yaoundé', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'www.finex.com', '2023-09-26'),
(6, 'Buca voyage', 'M. KAMONTE', 'agence de voyage', 'Yaoundé', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'www.buca.com', '2023-09-27');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int NOT NULL,
  `Nom_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `Nom_cat`) VALUES
(1, 'Produits alimentaires'),
(2, 'Produits élèctroniques'),
(3, 'Produits mobiliers'),
(4, 'Produits sensibles'),
(5, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_clent` int NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` bigint NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_clent`, `Nom`, `Prenom`, `Email`, `Password`, `Phone`, `Adresse`, `create_at`) VALUES
(11, 'Daze', 'Azert', 'azert@gmail.com', '000000', 75765765, 'Garoua', '2023-09-08'),
(12, 'KOMO', 'ali', 'ali@gmail.com', '000000', 76675765876, 'Douala', '2023-09-08'),
(13, 'TIANI', 'Ange', 'tiani@gmail.com', '000000', 12345678, 'Douala', '2023-09-12'),
(14, 'Poiu', 'tyu', 'tyu@gmail.com', '000000', 689087446, 'Yaoundé', '2023-09-13'),
(15, 'DJABO', 'Ange', 'djaboa@gmail.com', '000000', 4767657657, 'Ndokoti DOUALA', '2023-09-16');

-- --------------------------------------------------------

--
-- Structure de la table `colis`
--

CREATE TABLE `colis` (
  `id_colis` int NOT NULL,
  `id_clent` int NOT NULL,
  `id_cat` int NOT NULL,
  `id_livreur` int DEFAULT NULL,
  `id_agence` int DEFAULT NULL,
  `Descrition` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `delai_livraison` date NOT NULL,
  `NomDes` varchar(255) NOT NULL,
  `EmailDes` varchar(255) NOT NULL,
  `PhoneDes` int NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `status_colis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'save'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `colis`
--

INSERT INTO `colis` (`id_colis`, `id_clent`, `id_cat`, `id_livreur`, `id_agence`, `Descrition`, `date_creation`, `delai_livraison`, `NomDes`, `EmailDes`, `PhoneDes`, `Destination`, `status_colis`) VALUES
(38, 13, 1, 11, 5, 'Sac de riz de50kg', '2023-10-04', '2023-10-04', 'BELLA', 'bella@gmail.com', 67798989, 'Yaoundé', 'take'),
(39, 11, 1, NULL, 6, 'Bidon de 20 d\'huile', '2023-10-04', '2023-10-04', 'Dominique', 'do@gmail.com', 67798898, 'Douala', 'save'),
(40, 11, 5, NULL, 5, 'Carton de 100 livres', '2023-10-04', '2023-10-04', 'EMBOLO', 'em@gmail.com', 678098999, 'Edéa', 'save'),
(41, 12, 4, NULL, 6, 'Miroir', '2023-10-04', '2023-10-04', 'GATU', 'ga@gmail.com', 65656578, 'Ebolowa', 'save'),
(42, 14, 4, NULL, 5, 'Plaque à gaz', '2023-10-04', '2023-10-04', 'ABEN', 'ben@gmail.com', 656543444, 'Ebolowa', 'save');

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE `livreur` (
  `id_livreur` int NOT NULL,
  `id_agence` int DEFAULT NULL,
  `NomL` varchar(255) NOT NULL,
  `PrenomL` varchar(255) NOT NULL,
  `EmailL` varchar(255) NOT NULL,
  `PhoneL` int NOT NULL,
  `PasswordL` varchar(100) NOT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`id_livreur`, `id_agence`, `NomL`, `PrenomL`, `EmailL`, `PhoneL`, `PasswordL`, `ville`, `create_at`) VALUES
(10, 5, 'BEKE', 'Hans', 'hans@gmail.com', 12345678, 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Douala', '2023-09-27'),
(11, 6, 'CHONTCHA', 'Landry', 'chont@gmail.com', 6878789, 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Yaoundé', '2023-09-27'),
(12, 6, 'KEGOUM', 'Fabrice', 'fabrice@gmail.com', 68989890, 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Yaoundé', '2023-09-28'),
(13, 6, 'gomba', 'hkj', 'hkjhjk@gmail.com', 6879997, 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Douala', '2023-09-28'),
(14, 5, 'MBELLA', 'Hilary', 'hila@gmail.com', 6908978, 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Yaoundé', '2023-10-03'),
(15, 6, 'MBELLA', 'Dominique', 'do@gmail.com', 6789989, 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Ebolowa', '2023-10-04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id_agence`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_clent`);

--
-- Index pour la table `colis`
--
ALTER TABLE `colis`
  ADD PRIMARY KEY (`id_colis`),
  ADD KEY `fk_client` (`id_clent`),
  ADD KEY `fk_cat` (`id_cat`),
  ADD KEY `fk_livreur` (`id_livreur`),
  ADD KEY `fk_agence` (`id_agence`);

--
-- Index pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`id_livreur`),
  ADD KEY `fk_part` (`id_agence`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `id_agence` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_clent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `colis`
--
ALTER TABLE `colis`
  MODIFY `id_colis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `id_livreur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `colis`
--
ALTER TABLE `colis`
  ADD CONSTRAINT `fk_agence` FOREIGN KEY (`id_agence`) REFERENCES `agence` (`id_agence`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`id_clent`) REFERENCES `client` (`id_clent`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_livreur` FOREIGN KEY (`id_livreur`) REFERENCES `livreur` (`id_livreur`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD CONSTRAINT `fk_part` FOREIGN KEY (`id_agence`) REFERENCES `agence` (`id_agence`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
