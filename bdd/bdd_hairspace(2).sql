-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 08 juin 2023 à 10:28
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_hairspace`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `avs_commentaire` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `avs_date` datetime DEFAULT NULL,
  `avs_utl_num_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F91ABF0DE9C0CE1` (`avs_utl_num_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `avs_commentaire`, `avs_date`, `avs_utl_num_id`) VALUES
(32, 'CV', '2022-10-11 09:23:46', 4),
(34, 'J\'adore ce que vous faites, vous\r\npourriez même couper les cheveux du shogun tellement vous êtes talentueux', '2022-10-11 11:01:05', 4),
(36, 'trop bien', '2022-10-11 11:11:00', 4);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ctc_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctc_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctc_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctc_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctc_numero` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `ctc_nom`, `ctc_prenom`, `ctc_email`, `ctc_message`, `ctc_numero`) VALUES
(1, 'PÖP', 'aul', 'dd@f.COM', 's', '1');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221006185641', '2022-10-07 09:18:03', 203),
('DoctrineMigrations\\Version20221007124402', '2022-10-07 14:44:10', 168),
('DoctrineMigrations\\Version20221007134626', '2022-10-07 15:46:35', 302),
('DoctrineMigrations\\Version20221007135042', '2022-10-07 15:50:51', 173),
('DoctrineMigrations\\Version20221011091855', '2022-10-11 11:19:01', 434),
('DoctrineMigrations\\Version20221129085438', '2022-11-29 09:54:46', 108),
('DoctrineMigrations\\Version20230410094153', '2023-04-10 11:42:03', 200),
('DoctrineMigrations\\Version20230410094512', '2023-04-10 11:45:22', 168),
('DoctrineMigrations\\Version20230411133233', '2023-04-11 15:32:40', 181),
('DoctrineMigrations\\Version20230604080408', '2023-06-04 10:04:20', 205),
('DoctrineMigrations\\Version20230607074612', '2023-06-07 09:46:17', 166);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_evenement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offre_prevu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_place` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `nom_evenement`, `description`, `lien_image`, `offre_prevu`, `nb_place`) VALUES
(1, 'fff', 'fff', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Jack-o%27-Lantern_2003-10-31.jpg/800px-Jack-o%27-Lantern_2003-10-31.jpg', 'fff', 3),
(4, 'DZDD', 'FFFF', 'ZDZ', 'DZD', 4);

-- --------------------------------------------------------

--
-- Structure de la table `identite`
--

DROP TABLE IF EXISTS `identite`;
CREATE TABLE IF NOT EXISTS `identite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_identite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proprietaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concepteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `animateur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hebergeur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `identite`
--

INSERT INTO `identite` (`id`, `nom_identite`, `adresse`, `proprietaire`, `responsable`, `concepteur`, `animateur`, `hebergeur`) VALUES
(1, 'nom', 'http://nomdusite.domaine', 'proprio', 'responsable', 'concepteur', 'animAteur', 'hebergeur');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle_niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `libelle_niveau`) VALUES
(1, 'Oui'),
(2, 'Non\r\n'),
(3, 'Peut etre');

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pst_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pst_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `presentation`
--

INSERT INTO `presentation` (`id`, `pst_image`, `pst_text`) VALUES
(1, 'presentation.jpg', 'aeuaeu');

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

DROP TABLE IF EXISTS `prestations`;
CREATE TABLE IF NOT EXISTS `prestations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prs_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prs_prix` double NOT NULL,
  `prs_duree` time NOT NULL,
  `prs_libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prestations`
--

INSERT INTO `prestations` (`id`, `prs_image`, `prs_prix`, `prs_duree`, `prs_libelle`) VALUES
(2, 'Z', 20, '01:05:00', 'Coupage de cheveux'),
(3, 'ff', 100, '04:00:00', 'Teinture');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plage_horaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_rdv` datetime NOT NULL,
  `prestation_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_10C31F869E45C554` (`prestation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `nom_client`, `prenom_client`, `plage_horaire`, `date_rdv`, `prestation_id`) VALUES
(1, 'Joestar', 'Joseph', '3:30', '2023-06-07 07:49:19', 3),
(3, 'Patrice', 'Durant', '12h - 14h', '1970-01-01 17:18:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle_test` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `libelle_test`) VALUES
(1, 'xccvdccxcv'),
(2, 'xccv');

-- --------------------------------------------------------

--
-- Structure de la table `test2`
--

DROP TABLE IF EXISTS `test2`;
CREATE TABLE IF NOT EXISTS `test2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle_test2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_13BB8D58B3E9C81` (`niveau_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `test2`
--

INSERT INTO `test2` (`id`, `libelle_test2`, `niveau_id`) VALUES
(1, 'ou', 1),
(2, 'O', 2),
(3, 'ccc', 3),
(5, 'ff', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utl_identifiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utl_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utl_mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `droits` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `utl_identifiant`, `utl_email`, `utl_mdp`, `droits`) VALUES
(4, 'Zabesu28', 'romain.zabesu@gmail.com', '$2y$12$OknXbjZ96KOJe1GRiQljq.bePehC9g2LIDQe8LAv4SJtGvcvIP3dm', 0),
(8, 'User@123', 'admin@gmail.com', '$2y$12$9OcGu0WvlUuk04sFP/vMde9LmIsicAMFG1mrrVsSMIBuv6bv0lX9C', 1),
(9, 'User123@', 'User123@gmail.com', '$2y$12$oTPb.YaWfMRqYa.ax0TNO.K2ozlARNvvE6N3CxmtN5L3cFnql0o/S', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `FK_8F91ABF0DE9C0CE1` FOREIGN KEY (`avs_utl_num_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `FK_10C31F869E45C554` FOREIGN KEY (`prestation_id`) REFERENCES `prestations` (`id`);

--
-- Contraintes pour la table `test2`
--
ALTER TABLE `test2`
  ADD CONSTRAINT `FK_13BB8D58B3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
