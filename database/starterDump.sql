-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 06 jan. 2022 à 17:03
-- Version du serveur : 10.6.4-MariaDB-1:10.6.4+maria~focal
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cacofony`
--

USE `cacofony`;

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `encodedPassword` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `roles` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Post`
--

INSERT INTO `User` (`id`, `email`, `encodedPassword`, `firstName`, `lastName`, `roles`) VALUES
(1, 'admin@admin.fr', '$2y$10$uyF9.qSTn8R58xQHXVl4.e1lluMIpaJkA4Wq7fKT0LLhy4602g5BO', 'admin', 'admin', 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(2, 'francishuster@gmail.com', '$2y$10$FblEHqz.oiATmgGGCmoSguy7XRRSs67iOmhCfy5xrHrjWSfc8fxui', 'Francis', 'Huster', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Post`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Post`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
