-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 17 Octobre 2019 à 16:50
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.2.19-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--test
-- Base de données :  `ofeelariane`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `activity_type` varchar(32) NOT NULL,
  `factor` float(4,3) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`id`, `activity_type`, `factor`, `created_at`, `updated_at`) VALUES
(1, 'Sédentaire', 1.200, '2019-10-11 10:49:12', NULL),
(2, 'Légèrement actif', 1.375, '2019-10-11 10:49:12', NULL),
(3, 'Actif', 1.550, '2019-10-11 10:49:12', NULL),
(4, 'Très actif', 1.725, '2019-10-11 10:49:12', NULL),
(5, 'Extrêmement actif', 1.900, '2019-10-11 10:49:12', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `diet`
--

CREATE TABLE `diet` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `diet_type` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `diet`
--

INSERT INTO `diet` (`id`, `diet_type`, `created_at`, `updated_at`) VALUES
(1, 'Sans gluten', '2019-10-11 10:49:12', NULL),
(2, 'Sans lactose', '2019-10-11 10:49:12', NULL),
(3, 'Vegan', '2019-10-11 10:49:12', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_name` varchar(42) NOT NULL,
  `food_energy` smallint(3) UNSIGNED NOT NULL,
  `food_carbo` float(4,2) UNSIGNED NOT NULL,
  `food_fat` float(4,2) UNSIGNED NOT NULL,
  `food_prot` float(4,2) UNSIGNED NOT NULL,
  `food_category` varchar(8) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_energy`, `food_carbo`, `food_fat`, `food_prot`, `food_category`, `created_at`, `updated_at`) VALUES
(1, 'muesli chocolat', 442, 59.00, 17.40, 8.70, 'glucide', '2019-10-11 10:49:12', NULL),
(2, 'pomme de terre', 86, 19.00, 0.00, 1.50, 'glucide', '2019-10-11 10:49:12', NULL),
(3, 'oeuf', 145, 0.98, 10.00, 11.80, 'proteine', '2019-10-11 10:49:12', NULL),
(4, 'patate douce', 77, 17.72, 0.14, 1.37, 'glucide', '2019-10-11 10:49:12', NULL),
(5, 'pain complet', 233, 46.70, 0.80, 9.70, 'glucide', '2019-10-11 10:49:12', NULL),
(6, 'whey', 380, 8.40, 3.70, 78.00, 'proteine', '2019-10-11 10:49:12', NULL),
(7, 'tofu nature', 129, 0.00, 7.09, 13.73, 'proteine', '2019-10-11 10:49:12', NULL),
(8, 'thon conserve', 127, 0.00, 2.50, 26.00, 'proteine', '2019-10-11 10:49:12', NULL),
(9, 'steak haché 5% MG', 127, 0.00, 5.00, 20.50, 'proteine', '2019-10-11 10:49:12', NULL),
(10, 'saumon frais', 217, 0.00, 14.00, 22.70, 'proteine', '2019-10-11 10:49:12', NULL),
(11, 'poisson blanc', 172, 0.00, 8.00, 24.00, 'proteine', '2019-10-11 10:49:12', NULL),
(12, 'petit suisse 0% MG', 55, 4.20, 0.00, 9.30, 'proteine', '2019-10-11 10:49:12', NULL),
(13, 'jambon blanc', 105, 0.50, 2.50, 20.00, 'proteine', '2019-10-11 10:49:12', NULL),
(14, 'fromage blanc 0% MG', 49, 4.70, 0.00, 7.50, 'proteine', '2019-10-11 10:49:12', NULL),
(15, 'crevettes', 94, 0.00, 0.90, 21.40, 'proteine', '2019-10-11 10:49:12', NULL),
(16, 'blanc de poulet', 103, 1.20, 1.80, 20.60, 'proteine', '2019-10-11 10:49:12', NULL),
(17, 'noix', 663, 3.50, 65.00, 12.80, 'lipide', '2019-10-11 10:49:12', NULL),
(18, 'noisettes', 646, 17.60, 62.40, 15.03, 'lipide', '2019-10-11 10:49:12', NULL),
(19, 'lait de coco', 186, 3.50, 18.00, 1.50, 'lipide', '2019-10-11 10:49:12', NULL),
(20, 'huile d\'olive', 755, 0.00, 84.00, 0.00, 'lipide', '2019-10-11 10:49:12', NULL),
(21, 'noix de cajou', 574, 32.69, 46.35, 15.31, 'lipide', '2019-10-11 10:49:12', NULL),
(22, 'beurre de cacahuète', 645, 18.80, 51.60, 25.30, 'lipide', '2019-10-11 10:49:12', NULL),
(23, 'avocat', 160, 8.53, 14.66, 2.00, 'lipide', '2019-10-11 10:49:12', NULL),
(24, 'amandes', 576, 21.67, 49.42, 21.22, 'lipide', '2019-10-11 10:49:12', NULL),
(25, 'riz complet', 354, 70.60, 3.50, 8.00, 'glucide', '2019-10-11 10:49:12', NULL),
(26, 'quinoa', 379, 67.50, 5.10, 12.80, 'glucide', '2019-10-11 10:49:12', NULL),
(27, 'pâtes complètes', 343, 63.50, 2.80, 12.00, 'glucide', '2019-10-11 10:49:12', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `food_match_diet`
--

CREATE TABLE `food_match_diet` (
  `food_id` int(10) UNSIGNED NOT NULL,
  `diet_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `food_match_diet`
--

INSERT INTO `food_match_diet` (`food_id`, `diet_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(13, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(1, 3),
(2, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3);

-- --------------------------------------------------------

--
-- Structure de la table `goal`
--

CREATE TABLE `goal` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `goal_type` varchar(32) DEFAULT NULL,
  `carbohydrate_proportion` float(4,3) UNSIGNED NOT NULL,
  `protein_proportion` float(4,3) UNSIGNED NOT NULL,
  `fat_proportion` float(4,3) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `goal`
--

INSERT INTO `goal` (`id`, `goal_type`, `carbohydrate_proportion`, `protein_proportion`, `fat_proportion`, `created_at`, `updated_at`) VALUES
(1, 'Perte de poids', 0.330, 0.340, 0.330, '2019-10-11 10:49:12', NULL),
(2, 'Prise de masse', 0.488, 0.292, 0.220, '2019-10-11 10:49:12', NULL),
(3, 'Equilibre', 0.488, 0.224, 0.288, '2019-10-11 10:49:12', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(42) NOT NULL,
  `email` varchar(42) NOT NULL,
  `password` varchar(42) NOT NULL,
  `age` tinyint(3) UNSIGNED DEFAULT NULL,
  `weight` tinyint(3) UNSIGNED DEFAULT NULL,
  `height` tinyint(3) UNSIGNED DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `basal_metabolic_rate` smallint(4) UNSIGNED DEFAULT NULL,
  `energy_expenditure` smallint(4) UNSIGNED DEFAULT NULL,
  `daily_calories` smallint(4) UNSIGNED DEFAULT NULL,
  `breakfast_dinner_calories` smallint(4) UNSIGNED DEFAULT NULL,
  `lunch_calories` smallint(4) UNSIGNED DEFAULT NULL,
  `breakfast_dinner_carb_quantity` smallint(3) UNSIGNED DEFAULT NULL,
  `lunch_carb_quantity` smallint(3) UNSIGNED DEFAULT NULL,
  `breakfast_dinner_prot_quantity` smallint(3) UNSIGNED DEFAULT NULL,
  `lunch_prot_quantity` smallint(3) UNSIGNED DEFAULT NULL,
  `breakfast_dinner_fat_quantity` smallint(3) UNSIGNED DEFAULT NULL,
  `lunch_fat_quantity` smallint(3) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `activity_id` tinyint(1) UNSIGNED DEFAULT NULL,
  `goal_id` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `age`, `weight`, `height`, `gender`, `basal_metabolic_rate`, `energy_expenditure`, `daily_calories`, `breakfast_dinner_calories`, `lunch_calories`, `breakfast_dinner_carb_quantity`, `lunch_carb_quantity`, `breakfast_dinner_prot_quantity`, `lunch_prot_quantity`, `breakfast_dinner_fat_quantity`, `lunch_fat_quantity`, `created_at`, `updated_at`, `activity_id`, `goal_id`) VALUES
(1, 'user1', 'user1@local.io', 'user1', 21, 67, 167, 'femme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-11 10:49:12', '2019-10-17 16:46:34', 1, 1),
(2, 'user2', 'user2@local.io', 'user2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-11 10:49:12', '2019-10-14 14:29:39', 1, 2),
(9, 'user3', 'user3@totofou.tofu', 'user3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-14 11:21:29', '2019-10-14 11:27:17', NULL, 3),
(10, 'user4', 'user4@totofou.tofu', 'user4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-14 11:28:08', '2019-10-14 11:30:36', NULL, 2),
(11, 'test', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-15 17:27:27', NULL, NULL, NULL),
(12, 'Toto', 'Toto', 'toto@toto.io', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-15 20:58:21', NULL, NULL, NULL),
(13, 'usersuperfort', 'trop@fort.local', 'leplusbo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-15 21:17:21', NULL, NULL, NULL),
(21, '142', '142', '142', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-16 13:54:24', NULL, NULL, NULL),
(25, '123', '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-16 14:12:16', NULL, NULL, NULL),
(31, '1234', '1234', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-16 14:18:14', NULL, NULL, NULL),
(34, '125', '125', '125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-16 14:23:28', NULL, NULL, NULL),
(37, '126', '126', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-16 14:25:06', NULL, NULL, NULL),
(41, '127', '127', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-16 14:26:24', NULL, NULL, NULL),
(43, '128', '128', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-16 14:27:30', NULL, NULL, NULL),
(46, '129', '129', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-16 14:28:19', NULL, NULL, NULL),
(47, '129=7', '129=7', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-16 14:28:35', NULL, NULL, NULL),
(48, 'backPHPmajWP', 'accountcreate@local.io', 'surprise', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-17 15:36:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_choose_diet`
--

CREATE TABLE `user_choose_diet` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `diet_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user_choose_diet`
--

INSERT INTO `user_choose_diet` (`user_id`, `diet_id`) VALUES
(1, 1),
(1, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `food_match_diet`
--
ALTER TABLE `food_match_diet`
  ADD PRIMARY KEY (`food_id`,`diet_id`),
  ADD KEY `diet_id` (`diet_id`);

--
-- Index pour la table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `goal_id` (`goal_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Index pour la table `user_choose_diet`
--
ALTER TABLE `user_choose_diet`
  ADD PRIMARY KEY (`user_id`,`diet_id`),
  ADD KEY `diet_id` (`diet_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `diet`
--
ALTER TABLE `diet`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `goal`
--
ALTER TABLE `goal`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `food_match_diet`
--
ALTER TABLE `food_match_diet`
  ADD CONSTRAINT `food_match_diet_ibfk_1` FOREIGN KEY (`diet_id`) REFERENCES `diet` (`id`),
  ADD CONSTRAINT `food_match_diet_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`),
  ADD CONSTRAINT `food_match_diet_ibfk_3` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`goal_id`) REFERENCES `goal` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`);

--
-- Contraintes pour la table `user_choose_diet`
--
ALTER TABLE `user_choose_diet`
  ADD CONSTRAINT `user_choose_diet_ibfk_1` FOREIGN KEY (`diet_id`) REFERENCES `diet` (`id`),
  ADD CONSTRAINT `user_choose_diet_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
