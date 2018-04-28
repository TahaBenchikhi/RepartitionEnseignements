-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 04 Avril 2017 à 15:06
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires_enseignant`
--

CREATE TABLE `commentaires_enseignant` (
  `id` int(10) UNSIGNED NOT NULL,
  `idenseignant` int(11) NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires_ue`
--

CREATE TABLE `commentaires_ue` (
  `id` int(10) UNSIGNED NOT NULL,
  `idue` int(11) NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires_voeu`
--

CREATE TABLE `commentaires_voeu` (
  `id` int(10) UNSIGNED NOT NULL,
  `idvoeu` int(11) NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conversions`
--

CREATE TABLE `conversions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coef` double(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

CREATE TABLE `enseignants` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HTDstat` double(15,8) NOT NULL,
  `HTDdues` double(15,8) NOT NULL,
  `HTDattrib` double(15,8) NOT NULL,
  `delta` double(15,8) NOT NULL,
  `PRP` double(15,8) NOT NULL,
  `departement` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'informatique',
  `composante` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `corps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `enseignants`
--

INSERT INTO `enseignants` (`id`, `nom`, `HTDstat`, `HTDdues`, `HTDattrib`, `delta`, `PRP`, `departement`, `composante`, `corps`, `type`) VALUES
(1, 'Luca Graham', 100.00000000, 100.00000000, 100.00000000, 100.00000000, 100.00000000, 'informatique', 'informatique', 'informatique', 'Repartieur');

-- --------------------------------------------------------

--
-- Structure de la table `historiques`
--

CREATE TABLE `historiques` (
  `id` int(10) UNSIGNED NOT NULL,
  `idenseignant` int(11) NOT NULL,
  `idue` int(11) NOT NULL,
  `idsession` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `destinataire` int(11) NOT NULL,
  `expediteur` int(11) NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `supprimer` tinyint(1) NOT NULL DEFAULT '0',
  `vu` tinyint(1) NOT NULL DEFAULT '0',
  `valid` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_01_29_120909_create_messages_table', 1),
(3, '2017_02_07_134952_create_enseignants_table', 1),
(4, '2017_02_07_135002_create_ues_table', 1),
(5, '2017_02_08_110858_create_sessions_table', 1),
(6, '2017_02_11_120453_create_repartitions_table', 1),
(7, '2017_02_11_121624_create_commentaires_voeu_table', 1),
(8, '2017_02_11_151202_create_historiques_table', 1),
(9, '2017_03_18_110432_create_commentaire_ue_table', 1),
(10, '2017_03_18_110442_create_commentaire_enseignant_table', 1),
(11, '2017_03_18_132055_create_conversion_table', 1),
(12, '2017_28_03_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `repartitions`
--

CREATE TABLE `repartitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `idenseignant` int(11) NOT NULL,
  `idue` int(11) NOT NULL,
  `idsession` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `decision` enum('Normal','Accepted','Rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Normal'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `annee_universitaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ues`
--

CREATE TABLE `ues` (
  `id` int(10) UNSIGNED NOT NULL,
  `semestre` int(11) NOT NULL,
  `codeue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbheuresTD` double(8,2) NOT NULL DEFAULT '0.00',
  `nbheuresCour` double(8,2) NOT NULL DEFAULT '0.00',
  `nbheuresTP` double(8,2) NOT NULL DEFAULT '0.00',
  `nbheuresCM` double(8,2) NOT NULL DEFAULT '0.00',
  `nbheuresEStage` double(8,2) NOT NULL DEFAULT '0.00',
  `nbheuresAFormation` double(8,2) NOT NULL DEFAULT '0.00',
  `libellelong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `libellecourt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `composante` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupes` int(11) NOT NULL,
  `departement` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'informatique'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `idenseignant` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('repartiteur','enseignant') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'enseignant',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `idenseignant`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'repartiteur@gmail.com', '$2y$10$pJkWMwuoQrqDKovg2jq5k..55ccGl6H/JL.kFpS3uTrbaf4l8XU1e', 'repartiteur', 'QVY2iIeQ4FzLQyru57xMePiQcrc93QXACIjI1ybkCKYPmteJrVGAWTFhzKIr', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires_enseignant`
--
ALTER TABLE `commentaires_enseignant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `commentaires_enseignant_idenseignant_unique` (`idenseignant`);

--
-- Index pour la table `commentaires_ue`
--
ALTER TABLE `commentaires_ue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `commentaires_ue_idue_unique` (`idue`);

--
-- Index pour la table `commentaires_voeu`
--
ALTER TABLE `commentaires_voeu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `commentaires_voeu_idvoeu_unique` (`idvoeu`);

--
-- Index pour la table `conversions`
--
ALTER TABLE `conversions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `conversions_type_unique` (`type`);

--
-- Index pour la table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enseignants_id_unique` (`id`);

--
-- Index pour la table `historiques`
--
ALTER TABLE `historiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `messages_id_unique` (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Index pour la table `repartitions`
--
ALTER TABLE `repartitions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessions_id_unique` (`id`),
  ADD UNIQUE KEY `sessions_annee_universitaire_unique` (`annee_universitaire`);

--
-- Index pour la table `ues`
--
ALTER TABLE `ues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ues_id_unique` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires_enseignant`
--
ALTER TABLE `commentaires_enseignant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaires_ue`
--
ALTER TABLE `commentaires_ue`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaires_voeu`
--
ALTER TABLE `commentaires_voeu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `conversions`
--
ALTER TABLE `conversions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `historiques`
--
ALTER TABLE `historiques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `repartitions`
--
ALTER TABLE `repartitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ues`
--
ALTER TABLE `ues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
