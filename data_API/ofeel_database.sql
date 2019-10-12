-- BDD & : ofeelariane



-- CREATE DATABASE IF NOT EXISTS `ofeel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- USE `DIETS`;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
CREATE TABLE `user` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(42) NOT NULL UNIQUE,
  `email` VARCHAR(42) NOT NULL UNIQUE,
  `password` VARCHAR(42) NOT NULL,
  `age` TINYINT(3) UNSIGNED NULL,
  `weight` TINYINT(3) UNSIGNED NULL,
  `height` TINYINT(3) UNSIGNED NULL,
  `gender` VARCHAR(5) NULL,
  `basal_metabolic_rate` SMALLINT(4) UNSIGNED NULL,
  `energy_expenditure` SMALLINT(4) UNSIGNED NULL,
  `daily_calories` SMALLINT(4) UNSIGNED NULL,
  `breakfast_dinner_calories` SMALLINT(4) UNSIGNED NULL,
  `lunch_calories` SMALLINT(4) UNSIGNED NULL,
  `breakfast_dinner_carbo_quantity` SMALLINT(3) UNSIGNED NULL,
  `lunch_carbo_quantity` SMALLINT(3) UNSIGNED NULL,
  `breakfast_dinner_prot_quantity` SMALLINT(3) UNSIGNED NULL,
  `lunch_prot_quantity` SMALLINT(3) UNSIGNED NULL,
  `breakfast_dinner_fat_quantity` SMALLINT(3) UNSIGNED NULL,
  `lunch_fat_quantity` SMALLINT(3) UNSIGNED NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL,
  `activity_id` TINYINT(1) UNSIGNED NULL,
  `goal_id` TINYINT(1) UNSIGNED NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
('1', 'user1', 'user1@local.io', 'user1'),
('2', 'user2', 'user2@local.io', 'user2');

-- --------------------------------------------------------

--
-- Structure de la table `user_choose_diet`
--

CREATE TABLE `user_choose_diet` (
  `user_id` INT(10) UNSIGNED NOT NULL,
  `diet_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `diet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user_choose_diet`
--
INSERT INTO `user_choose_diet` (`user_id`, `diet_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `diet`
--

CREATE TABLE `diet` (
  `id` TINYINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `diet_type` VARCHAR(15) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `diet`
--

INSERT INTO `diet` (`id`, `diet_type`, `created_at`, `updated_at`) VALUES
('1', 'Sans gluten', CURRENT_TIMESTAMP, NULL),
('2', 'Sans lactose', CURRENT_TIMESTAMP, NULL),
('3', 'Vegan', CURRENT_TIMESTAMP, NULL);


-- --------------------------------------------------------

--
-- Structure de la table `goal`
--

CREATE TABLE `goal` (
  `id` TINYINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `goal_type` VARCHAR(32),
  `carbohydrate_proportion` FLOAT(4,3) UNSIGNED NOT NULL,
  `protein_proportion` FLOAT(4,3) UNSIGNED NOT NULL,
  `fat_proportion` FLOAT(4,3) UNSIGNED NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `goal`
--
INSERT INTO `goal` (`id`, `goal_type`, `carbohydrate_proportion`, `protein_proportion`, `fat_proportion`, `created_at`, `updated_at`) VALUES
('1', 'Perte de poids', 0.330, 0.340, 0.330, CURRENT_TIMESTAMP, NULL),
('2', 'Prise de masse', 0.488, 0.292, 0.220, CURRENT_TIMESTAMP, NULL),
('3', 'Equilibre', 0.488, 0.224, 0.288, CURRENT_TIMESTAMP, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `id` TINYINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `activity_type` VARCHAR(32) NOT NULL,
  `factor` FLOAT(4,3),
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`id`, `activity_type`, `factor`, `created_at`, `updated_at`) VALUES
('1', 'Sédentaire', 1.200, CURRENT_TIMESTAMP, NULL),
('2', 'Légèrement actif', 1.375, CURRENT_TIMESTAMP, NULL),
('3', 'Actif', 1.550, CURRENT_TIMESTAMP, NULL),
('4', 'Très actif', 1.725, CURRENT_TIMESTAMP, NULL),
('5', 'Extrêmement actif', 1.900, CURRENT_TIMESTAMP, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food_name` VARCHAR(42) NOT NULL,
  `food_energy` SMALLINT(3) UNSIGNED NOT NULL,
  `food_carbo` FLOAT(4,2) UNSIGNED NOT NULL,
  `food_fat` FLOAT(4,2) UNSIGNED NOT NULL,
  `food_prot` FLOAT(4,2) UNSIGNED NOT NULL,
  `food_category` VARCHAR(8) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_energy`, `food_carbo`, `food_fat`,  `food_prot`, `food_category`, `created_at`, `updated_at`) VALUES
('1', 'muesli chocolat', 442, 59, 17.4, 8.7, 'glucide', CURRENT_TIMESTAMP, NULL),
('2', 'pomme de terre', 86, 19, 0, 1.5, 'glucide', CURRENT_TIMESTAMP, NULL),
('3', 'oeuf', 145, 0.98, 10, 11.8, 'proteine', CURRENT_TIMESTAMP, NULL),
('4', 'patate douce', 77, 17.72, 0.14, 1.37, 'glucide', CURRENT_TIMESTAMP, NULL),
('5', 'pain complet', 233, 46.7, 0.8, 9.7, 'glucide', CURRENT_TIMESTAMP, NULL),
('6', 'whey', 380, 8.4, 3.7, 78, 'proteine', CURRENT_TIMESTAMP, NULL),
('7', 'tofu nature', 129, 0, 7.09, 13.73, 'proteine', CURRENT_TIMESTAMP, NULL),
('8', 'thon conserve', 127, 0, 2.5, 26, 'proteine', CURRENT_TIMESTAMP, NULL),
('9', 'steak haché 5% MG', 127, 0, 5, 20.5, 'proteine', CURRENT_TIMESTAMP, NULL),
('10', 'saumon frais', 217, 0, 14, 22.7, 'proteine', CURRENT_TIMESTAMP, NULL),
('11', 'poisson blanc', 172, 0, 8, 24, 'proteine', CURRENT_TIMESTAMP, NULL),
('12', 'petit suisse 0% MG', 55, 4.2, 0, 9.3, 'proteine', CURRENT_TIMESTAMP, NULL),
('13', 'jambon blanc', 105, 0.5, 2.5, 20, 'proteine', CURRENT_TIMESTAMP, NULL),
('14', 'fromage blanc 0% MG', 49, 4.7, 0, 7.5, 'proteine', CURRENT_TIMESTAMP, NULL),
('15', 'crevettes', 93.7, 0, 0.9, 21.4, 'proteine', CURRENT_TIMESTAMP, NULL),
('16', 'blanc de poulet', 103, 1.2, 1.8, 20.6, 'proteine', CURRENT_TIMESTAMP, NULL),
('17', 'noix', 663, 3.5, 65, 12.8, 'lipide', CURRENT_TIMESTAMP, NULL),
('18', 'noisettes', 646, 17.6, 62.4, 15.03, 'lipide', CURRENT_TIMESTAMP, NULL),
('19', 'lait de coco', 186, 3.5, 18, 1.5, 'lipide', CURRENT_TIMESTAMP, NULL),
('20', 'huile d\'olive', 755, 0, 84, 0, 'lipide', CURRENT_TIMESTAMP, NULL),
('21', 'noix de cajou', 574, 32.69, 46.35, 15.31, 'lipide', CURRENT_TIMESTAMP, NULL),
('22', 'beurre de cacahuète', 645, 18.8, 51.6, 25.3, 'lipide', CURRENT_TIMESTAMP, NULL),
('23', 'avocat', 160, 8.53, 14.66, 2, 'lipide', CURRENT_TIMESTAMP, NULL),
('24', 'amandes', 576, 21.67, 49.42, 21.22, 'lipide', CURRENT_TIMESTAMP, NULL),
('25', 'riz complet', 354, 70.6, 3.5, 8, 'glucide', CURRENT_TIMESTAMP, NULL),
('26', 'quinoa', 379, 67.5, 5.1, 12.8, 'glucide', CURRENT_TIMESTAMP, NULL),
('27', 'pâtes complètes', 343, 63.5, 2.8, 12, 'glucide', CURRENT_TIMESTAMP, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `food_match_diet`
--

CREATE TABLE `food_match_diet` (
  `food_id` INT(10) UNSIGNED NOT NULL,
  `diet_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`food_id`, `diet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `food_match_diet`
--

INSERT INTO `food_match_diet` (`food_id`, `diet_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 3),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 2),
(21, 3),
(22, 1),
(22, 2),
(22, 3),
(23, 1),
(23, 2),
(23, 3),
(24, 1),
(24, 2),
(24, 3),
(25, 1),
(25, 2),
(25, 3),
(26, 1),
(26, 2),
(26, 3),
(27, 2),
(27, 3);

-- --------------------------------------------------------

ALTER TABLE `user_choose_diet`
  ADD FOREIGN KEY (`diet_id`) REFERENCES `diet` (`id`);

ALTER TABLE `user_choose_diet`
  ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `user`
  ADD FOREIGN KEY (`goal_id`) REFERENCES `goal` (`id`);

ALTER TABLE `user`
  ADD FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`);

ALTER TABLE `food_match_diet`
  ADD FOREIGN KEY (`diet_id`) REFERENCES `diet` (`id`);

ALTER TABLE `food_match_diet`
  ADD FOREIGN KEY (`food_id`) REFERENCES `food` (`id`);
  