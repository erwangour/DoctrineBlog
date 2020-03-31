-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 31 mars 2020 à 14:44
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proprietaire_id` int(11) NOT NULL,
  `texte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4FCF9B6876C50E4A` (`proprietaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `proprietaire_id`, `texte`, `titre`) VALUES
(21, 1, 'Voici une brÃ¨ve description du 1er billet', 'Ceci est le 1er billet'),
(23, 1, 'Voici une brÃ¨ve description du 2Ã¨me billet', 'Ceci est le 2Ã¨me billet ');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proprietaire_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billet_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5F9E962A76C50E4A` (`proprietaire_id`),
  KEY `IDX_5F9E962A44973C78` (`billet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `proprietaire_id`, `content`, `billet_id`) VALUES
(36, 16, 'Voici un commentaire relatif au 2Ã¨me billet\r\n', 23),
(37, 16, 'Voici un commentaire relatif au 1er billet', 21),
(38, 17, 'Voici un autre commentaire relatif au 1er billet\r\n', 21),
(39, 17, 'Voici un autre commentaire relatif au 2Ã¨me billet\r\n', 23);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `passwd`) VALUES
(1, 'admin', '$2y$10$z2IN8YdHM99Pd5pYtYJxyeytLJkbnQ1czZqG3KeyO3DaGrDYifmkG'),
(16, 'booba', '$2y$10$D7l37p0/LeqXXbmEc0WC0.83XaelX6QTghDy3qmXulkp42teJF502'),
(17, 'tupac ', '$2y$10$cYd2rLsueP7EF5OiWSHxxehoXCr5/4SU7/KdFVlgtA9gSZDTigid.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billets`
--
ALTER TABLE `billets`
  ADD CONSTRAINT `FK_4FCF9B6876C50E4A` FOREIGN KEY (`proprietaire_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962A44973C78` FOREIGN KEY (`billet_id`) REFERENCES `billets` (`id`),
  ADD CONSTRAINT `FK_5F9E962A76C50E4A` FOREIGN KEY (`proprietaire_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
