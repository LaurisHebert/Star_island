-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 29 juin 2023 à 15:53
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `star_island`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `content`
--

INSERT INTO `content` (`id`, `title`, `description`, `page_id`) VALUES
(1, 'Star_Island', 'Ceci est un test', 2),
(2, 'Countdown', 'Bienvenue sur notre serveur RP GTA 5 exclusivement réservé aux joueurs français de 18 ans et plus ! Plongez dans un monde virtuel immersif où vous pouvez incarner le personnage de vos rêves. Explorez une ville dynamique, vivez des aventures palpitantes et forgez votre destinée. Rejoignez une communauté passionnée de joueurs, prête à partager des moments inoubliables dans une ambiance conviviale. Préparez-vous à vivre une expérience de jeu de rôle unique, où vos choix et actions auront un impact sur l\'univers du jeu. Rejoignez-nous dès maintenant et embarquez pour une aventure sans limites sur notre serveur RP GTA 5.', 4),
(3, 'Galerie', 'Galerie d\'images', 6),
(4, 'La plage', 'lorem sur la plage', 7),
(5, 'la montagne', 'lorem sur la montagne', 7),
(6, 'Vip', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci distinctio inventore maxime\r\n                officia quae unde veritatis. Accusantium ad autem debitis est explicabo id incidunt iste labore\r\n                laudantium mollitia, voluptas voluptatibus?\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium debitis dolor doloremque esse\r\n                maxime necessitatibus nemo quis voluptatem. Deserunt dolorum in mollitia odit officia quisquam\r\n                repellendus sit! Minus, soluta, voluptatem.', 8),
(7, 'Vip+', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci distinctio inventore maxime\r\n                officia quae unde veritatis. Accusantium ad autem debitis est explicabo id incidunt iste labore\r\n                laudantium mollitia, voluptas voluptatibus?\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium debitis dolor doloremque esse\r\n                maxime necessitatibus nemo quis voluptatem. Deserunt dolorum in mollitia odit officia quisquam\r\n                repellendus sit! Minus, soluta, voluptatem.', 8);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `start_date`, `end_date`) VALUES
(4, '2023-06-01 15:05:15', '2023-06-30 23:59:59'),
(6, '2023-06-19 14:37:58', '2023-06-30 14:37:58'),
(7, '2023-06-18 14:37:58', '2023-06-30 14:37:58');

-- --------------------------------------------------------

--
-- Structure de la table `event_content`
--

CREATE TABLE `event_content` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `event_content`
--

INSERT INTO `event_content` (`id`, `event_id`, `content_id`) VALUES
(1, 4, 2),
(2, 6, 4),
(3, 7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `event_media`
--

CREATE TABLE `event_media` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `event_media`
--

INSERT INTO `event_media` (`id`, `event_id`, `media_id`) VALUES
(1, 4, 7),
(2, 4, 8);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `pages_id` int(11) DEFAULT NULL,
  `media_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `name`, `path`, `pages_id`, `media_type_id`) VALUES
(1, 'discord', 'Imgs/discord.png', 3, 2),
(2, 'youtube', 'Imgs/youtube.png', 3, 2),
(3, 'twitch', 'Imgs/twitch.png', 3, 2),
(4, 'YouTube', 'https://www.youtube.com/watch?v=wIHyoWgurc4', 3, 1),
(5, 'twitch', 'https://www.twitch.tv', 3, 1),
(6, 'discord', 'https://discord.gg/sjKhBN', 3, 1),
(7, 'stormy night', 'Imgs/background_event.jpg', 4, 5),
(8, 'Iceland', 'Fonts/Iceland-Regular.ttf', 4, 6),
(9, 'starisland', 'Imgs/starisland.png', 3, 7),
(10, 'ville', 'Imgs/ville.jpg', 2, 5),
(11, 'garage', 'Imgs/garage.jpg', 2, 5),
(12, 'PEGI18', 'Imgs/PEGI18.png', 3, 2),
(13, 'contact', 'Imgs/Contact.png', 3, 2),
(14, 'Vip', 'Imgs/Perso1-removebg-preview.png', 8, 2),
(15, 'Vip+', 'Imgs/Perso2-removebg-preview.png', 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `media_type`
--

CREATE TABLE `media_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `media_type`
--

INSERT INTO `media_type` (`id`, `type`) VALUES
(1, 'link'),
(2, 'logo'),
(3, 'video'),
(4, 'musique'),
(5, 'background'),
(6, 'font'),
(7, 'mainLogo');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `meta_title` varchar(20) NOT NULL,
  `meta_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `meta_title`, `meta_description`) VALUES
(2, 'Accueil', 'Page de présentation du site'),
(3, 'All', 'Toute les pages du site'),
(4, 'BigEvent', 'Un gros événement est en cours, mais ou rouvrirons bientôt nos portes'),
(6, 'Galerie', 'Galerie d\'images'),
(7, 'Event', 'event'),
(8, 'Vip', 'Exposition des avantages vip et vip+'),
(9, 'Team', 'lalala');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `role`, `nickname`) VALUES
(1, 'serveur', 'starisland'),
(2, 'Admin', 'Pierre'),
(3, 'Admin', 'Paul'),
(4, 'Admin', 'Jack'),
(5, 'Admin', 'Marie'),
(6, 'Moderateur', 'Michelle'),
(7, 'Moderateur', 'Patrique'),
(8, 'Moderateur', 'Mireille'),
(9, 'Moderateur', 'Jane'),
(10, 'Staff', 'Romain'),
(11, 'Staff', 'Vincent'),
(12, 'Staff', 'Julie'),
(13, 'Dev', 'Julien'),
(14, 'Dev', 'Mathieu'),
(15, 'Dev', 'Anthony'),
(16, 'Mapper', 'Quentin'),
(17, 'Mapper', 'Lauris'),
(18, 'Mapper', 'Arthur'),
(19, 'Mapper', 'sleepy'),
(20, 'Helper', 'Shagaï'),
(21, 'Helper', 'Lilith'),
(22, 'Helper', 'Plume'),
(23, 'test', 'Perle');

-- --------------------------------------------------------

--
-- Structure de la table `team_media`
--

CREATE TABLE `team_media` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `team_media`
--

INSERT INTO `team_media` (`id`, `team_id`, `media_id`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 1, 3),
(4, 1, 5),
(5, 1, 2),
(6, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'oui@gmail.com', 'oui');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_id` (`media_id`);

--
-- Index pour la table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event_content`
--
ALTER TABLE `event_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `content_id` (`content_id`);

--
-- Index pour la table `event_media`
--
ALTER TABLE `event_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_id` (`pages_id`),
  ADD KEY `media_type_id` (`media_type_id`);

--
-- Index pour la table `media_type`
--
ALTER TABLE `media_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team_media`
--
ALTER TABLE `team_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `event_content`
--
ALTER TABLE `event_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `event_media`
--
ALTER TABLE `event_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `media_type`
--
ALTER TABLE `media_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `team_media`
--
ALTER TABLE `team_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `event_content`
--
ALTER TABLE `event_content`
  ADD CONSTRAINT `event_content_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `event_content_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `event_media`
--
ALTER TABLE `event_media`
  ADD CONSTRAINT `event_media_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `event_media_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`pages_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`media_type_id`) REFERENCES `media_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `team_media`
--
ALTER TABLE `team_media`
  ADD CONSTRAINT `team_media_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `team_media_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
