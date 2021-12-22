-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 22 déc. 2021 à 08:48
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(1, 'Sam squinted against the sun at the distant dust trail raked up by the car on its way up to the Big House. ', 1, 1, '2021-12-14 13:33:25'),
(5, 'Carter came by later while Sam was chopping wood. Carter lifted his hat as if he were waiting for an appointment with the town priest, and then removed it completely as if he were talking to his mother. He pulled out a pile of paper from his back pocket and held it out.  \'Don\'t pick up your mail often, do you?\'  Sam took it without a glance and dropped the envelopes onto the bench.', 3, 2, '2021-12-14 13:33:28'),
(6, '\'Never,\' he replied and waited for Carter to say why he was here. The fact it was Carter\'s house was no explanation and they both knew it. Carter twisted his hat round and round, licking his lips and clearing his throat.\r\n\r\n\'Nice work fixing those fences,\' he said finally.\r\n\r\n\'I\'ll be back to the beginning soon,\' Sam said. It wasn\'t a complaint. A fence that took a year to repair meant another year\'s work to the man who did it well.\r\n\r\n\'Don\'t you ever want to take a holiday?\'\r\n\r\n\'And go where?\' A holiday meant being back out in the real world, a place even people like Carter travelled to escape from. Sam\'s escape was his reality and he wasn\'t going back.\r\n\r\nMr Carter wiped the sweat from the back of his neck. The damp patches on his shirt drew together like shapes in an atlas. His skin was already turning ruddy in the June sun. Otherwise he had the indoor tan of a man that made money while other people did the work.', 3, 3, '2021-12-14 13:33:32'),
(7, 'Sam squinted against the sun at the distant dust trail raked up by the car on its way up to the Big House. The horses kicked and flicked their tails at flies, not caring about their owner\'s first visit in ten months. Sam waited. Mr Carter didn\'t come out here unless he had to, which was just fine by Sam. The more he kept out of his boss\'s way, the longer he\'d have a job.', 3, 1, '2021-12-14 13:36:08'),
(13, '\'I\'ve brought my son with me on this trip. He\'s had some trouble at school.\' Mr Carter\'s eyes flicked up, blinked rapidly and then shifted back to the hat occupying his hands. \'Not much trouble out here for a young boy.\' He attempted a laugh but it came out like a dog\'s bark.', 3, 3, '2021-12-14 13:33:32'),
(14, '\'I\'ve brought my son with me on this trip. He\'s had some trouble at school.\' Mr Carter\'s eyes flicked up, blinked rapidly and then shifted back to the hat occupying his hands. \'Not much trouble out here for a young boy.\' He attempted a laugh but it came out like a dog\'s bark.', 3, 3, '2021-12-14 13:33:32'),
(15, '\'I\'ve brought my son with me on this trip. He\'s had some trouble at school.\' Mr Carter\'s eyes flicked up, blinked rapidly and then shifted back to the hat occupying his hands. \'Not much trouble out here for a young boy.\' He attempted a laugh but it came out like a dog\'s bark.', 3, 3, '2021-12-14 13:33:32'),
(8, 'The two men looked towards the northern end of the property. It stretched as far as the eye could see. Even the fences were barely visible from where they stood. However bored and rebellious a teenage boy might get, it wasn\'t possible to escape on foot. Sam looked at the biggest of the horses, kicking at the ground with its heavy hooves. Could the boy ride? he wondered. There was a whole load of trouble a good rider could get into out here, miles away from anyone. But maybe there was even more trouble for someone who knew nothing about horses and wanted to get away from his father.', 3, 2, '2021-12-14 13:50:20'),
(9, '\'I\'ve brought my son with me on this trip. He\'s had some trouble at school.\' Mr Carter\'s eyes flicked up, blinked rapidly and then shifted back to the hat occupying his hands. \'Not much trouble out here for a young boy.\' He attempted a laugh but it came out like a dog\'s bark.', 3, 3, '2021-12-14 13:33:32'),
(10, 'The two men looked towards the northern end of the property. It stretched as far as the eye could see. Even the fences were barely visible from where they stood. However bored and rebellious a teenage boy might get, it wasn\'t possible to escape on foot. Sam looked at the biggest of the horses, kicking at the ground with its heavy hooves. Could the boy ride? he wondered. There was a whole load of trouble a good rider could get into out here, miles away from anyone. But maybe there was even more trouble for someone who knew nothing about horses and wanted to get away from his father.', 3, 2, '2021-12-14 13:50:20'),
(11, 'Sam squinted against the sun at the distant dust trail raked up by the car on its way up to the Big House. The horses kicked and flicked their tails at flies, not caring about their owner\'s first visit in ten months. Sam waited. Mr Carter didn\'t come out here unless he had to, which was just fine by Sam. The more he kept out of his boss\'s way, the longer he\'d have a job.', 3, 1, '2021-12-14 13:36:08'),
(12, 'The two men looked towards the northern end of the property. It stretched as far as the eye could see. Even the fences were barely visible from where they stood. However bored and rebellious a teenage boy might get, it wasn\'t possible to escape on foot. Sam looked at the biggest of the horses, kicking at the ground with its heavy hooves. Could the boy ride? he wondered. There was a whole load of trouble a good rider could get into out here, miles away from anyone. But maybe there was even more trouble for someone who knew nothing about horses and wanted to get away from his father.', 3, 2, '2021-12-14 13:50:20'),
(16, '\'I\'ve brought my son with me on this trip. He\'s had some trouble at school.\' Mr Carter\'s eyes flicked up, blinked rapidly and then shifted back to the hat occupying his hands. \'Not much trouble out here for a young boy.\' He attempted a laugh but it came out like a dog\'s bark.', 3, 3, '2021-12-14 13:33:32'),
(17, 'The two men looked towards the northern end of the property. It stretched as far as the eye could see. Even the fences were barely visible from where they stood. However bored and rebellious a teenage boy might get, it wasn\'t possible to escape on foot. Sam looked at the biggest of the horses, kicking at the ground with its heavy hooves. Could the boy ride? he wondered. There was a whole load of trouble a good rider could get into out here, miles away from anyone. But maybe there was even more trouble for someone who knew nothing about horses and wanted to get away from his father.', 3, 2, '2021-12-14 13:50:20'),
(18, 'The two men looked towards the northern end of the property. It stretched as far as the eye could see. Even the fences were barely visible from where they stood. However bored and rebellious a teenage boy might get, it wasn\'t possible to escape on foot. Sam looked at the biggest of the horses, kicking at the ground with its heavy hooves. Could the boy ride? he wondered. There was a whole load of trouble a good rider could get into out here, miles away from anyone. But maybe there was even more trouble for someone who knew nothing about horses and wanted to get away from his father.', 3, 2, '2021-12-14 13:50:20');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Projets'),
(2, 'Veille'),
(3, 'Design');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'Hey', 7, 1, '2021-12-16 10:09:46'),
(22, 'Pas mal !', 12, 2, '2021-12-17 09:48:19'),
(23, 'Pas top', 12, 1, '2021-12-13 23:00:00'),
(33, 'Coucou', 18, 1, '2021-12-20 09:43:00'),
(31, 'Oulala..', 16, 1, '2021-12-17 08:52:00'),
(29, 'Yes !', 10, 1, '2021-12-17 08:40:00'),
(32, 'Top !', 16, 1, '2021-12-17 08:53:00');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'Jul', 'c', 'a@a.fr', 1),
(6, 'Janee', 'c', 'j@j.fr', 1),
(2, 'Jade', 'c', 'b@b.fr', 1),
(3, 'Joae', 'd', '', 1),
(8, 'a', '$2y$10$HOU6BaFHddL0VK1cA3fwhuGMU3hvWp8/kYaCYS1AFXskfzT9I82By', '', 1),
(5, 'James', 'c', 'd@d.fr', 42),
(7, 'x', '$2y$10$xaO6Ykth3dKqeRS8Vx8/6O3b6MwJIP.s3xb2pHqR7JvQ5MYbxxmFW', 'x@gm.x', 1337),
(9, 'u', '$2y$10$1a3eLVvHG0A/.l/u3FFChey4o/OC0dNl.Q1/NFhiAZNLkCPWIe8uW', '', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1338;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1338;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
