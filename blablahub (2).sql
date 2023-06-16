-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 16 juin 2023 à 18:59
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
-- Base de données : `blablahub`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `user` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `contenu`, `tag`, `user`, `date`) VALUES
(19, 'bonsoir', 'Actualités', '', '2023-06-06 21:26:58'),
(20, 'ee', 'Cuisine', '', '2023-06-06 21:27:53'),
(22, 'fgf', 'Sport', '', '2023-06-07 10:40:32'),
(23, 'j\'aime les frites', 'Cuisine', '', '2023-06-07 16:39:46'),
(24, 'bonsoir', 'Humour', '', '2023-06-09 11:06:05'),
(25, 'bonjour a vous', 'Santé', '', '2023-06-09 16:15:52'),
(26, 'Bonjour tout le monde', 'Santé', '', '2023-06-10 14:08:14'),
(39, 'Bonjour tout le monde', 'Santé', '', '2023-06-10 15:54:26'),
(43, 'Bonjour tout le monde', 'Santé', '', '2023-06-10 23:29:05'),
(79, 'bonsoir', 'Actualités', 'Elwiny', '2023-06-16 20:58:19'),
(80, 'Coupe du Monde', 'Sport', 'Elwiny', '2023-06-16 20:58:33'),
(81, 'bonsoir', 'Actualités', 'Juli1', '2023-06-16 20:58:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `pseudo` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `motdepasse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`pseudo`, `email`, `motdepasse`) VALUES
('Elwiny', 'emilie.luk@gmail.com', 'motdepasse'),
('Juli1', 'petit.h@gmail.com', 'n1bus2mille'),
('pseudal', 'email@gmail.com', 'password');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
