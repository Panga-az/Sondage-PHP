-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 26 avr. 2024 à 17:00
-- Version du serveur : 8.0.36-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sondage`
--
CREATE DATABASE IF NOT EXISTS `sondage` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `sondage`;

-- --------------------------------------------------------

--
-- Structure de la table `sondage_reponses`
--
-- Création : lun. 22 avr. 2024 à 22:11
-- Dernière modification : ven. 26 avr. 2024 à 09:39
--

CREATE TABLE `sondage_reponses` (
  `id` int NOT NULL,
  `id_sondage` int DEFAULT NULL,
  `reponse` varchar(100) DEFAULT NULL,
  `nb_reponses` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sondage_reponses`
--

INSERT INTO `sondage_reponses` (`id`, `id_sondage`, `reponse`, `nb_reponses`) VALUES
(177, 11, 'Un Langage de programmation', 2),
(178, 11, 'Un Serpent', 1),
(179, 10, 'non', 5),
(180, 10, 'très cool', 11),
(181, 10, 'oui', 5),
(184, 12, 'Laravel', 7),
(185, 12, 'Symfony', 4),
(186, 13, 'oo', 1),
(187, 13, 'op', 0),
(188, 13, 'ip', 0),
(189, 13, 'ml', 0);

-- --------------------------------------------------------

--
-- Structure de la table `table_sondage_questions`
--
-- Création : lun. 22 avr. 2024 à 22:08
--

CREATE TABLE `table_sondage_questions` (
  `id` int NOT NULL,
  `question` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `table_sondage_questions`
--

INSERT INTO `table_sondage_questions` (`id`, `question`) VALUES
(10, 'Le Mali est-il cool ?'),
(11, 'Python c\'est quoi ?'),
(12, 'Quel Framework PHP est le plus cool ?'),
(13, 'ui');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--
-- Création : ven. 26 avr. 2024 à 15:53
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `pswd`) VALUES
(1, 'Panga', 'kamatep37@gmail.com', 'azertyuiop'),
(2, 'Panga', 'yazokim7@gmail.com', 'panga');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sondage_reponses`
--
ALTER TABLE `sondage_reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sondage` (`id_sondage`);

--
-- Index pour la table `table_sondage_questions`
--
ALTER TABLE `table_sondage_questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sondage_reponses`
--
ALTER TABLE `sondage_reponses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT pour la table `table_sondage_questions`
--
ALTER TABLE `table_sondage_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sondage_reponses`
--
ALTER TABLE `sondage_reponses`
  ADD CONSTRAINT `sondage_reponses_ibfk_1` FOREIGN KEY (`id_sondage`) REFERENCES `table_sondage_questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
