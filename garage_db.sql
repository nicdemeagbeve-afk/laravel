-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 jan. 2026 à 15:50
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_24_090648_create_techniciens_table', 1),
(5, '2026_01_24_090648_create_vehicules_table', 1),
(6, '2026_01_24_090650_create_reparations_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reparations`
--

CREATE TABLE `reparations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicule_id` bigint(20) UNSIGNED NOT NULL,
  `technicien_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `duree_main_oeuvre` int(11) DEFAULT NULL,
  `objet_reparation` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reparations`
--

INSERT INTO `reparations` (`id`, `vehicule_id`, `technicien_id`, `date`, `duree_main_oeuvre`, `objet_reparation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-01-27', 120, 'gsddddws', '2026-01-24 09:45:04', '2026-01-24 09:45:04'),
(2, 3, 2, '2026-01-24', 45, 'Vidange et changement filtres', '2026-01-24 14:32:37', '2026-01-24 14:32:37');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3PdJZXWfAXoevvOsIczOI70gWDJEaSrcChaglGRw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnQzUXVwVjlrSGxWSG4ycUNBanc0VWJ0VGE3SkZmOTd6WURmQkRaSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769265199);

-- --------------------------------------------------------

--
-- Structure de la table `techniciens`
--

CREATE TABLE `techniciens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `specialite` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `techniciens`
--

INSERT INTO `techniciens` (`id`, `nom`, `prenom`, `specialite`, `created_at`, `updated_at`) VALUES
(1, 'ALOKPA', 'Adzo Juliette', NULL, '2026-01-24 09:43:50', '2026-01-24 09:43:50'),
(2, 'DUPONT', 'Jean', 'Climatisation', '2026-01-24 14:31:01', '2026-01-24 14:31:01');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `immatriculation` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `annee` smallint(6) DEFAULT NULL,
  `kilometrage` int(11) DEFAULT NULL,
  `carrosserie` varchar(255) DEFAULT NULL,
  `energie` varchar(255) DEFAULT NULL,
  `boite` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `immatriculation`, `marque`, `modele`, `couleur`, `annee`, `kilometrage`, `carrosserie`, `energie`, `boite`, `image`, `created_at`, `updated_at`) VALUES
(1, 'AB-123-CD', 'Peugeot', 'Clio V', 'Or Pur (Toit Noir)', 2024, 44440, 'Coupé', 'Diesel', 'Automatique', 'vehicules/3rPAcPRznVoTDbgnfCUFPy9ePkJf2S09z4mZoPEJ.jpg', '2026-01-24 09:38:15', '2026-01-24 14:23:18'),
(2, 'CD-654-XW', 'Renault', 'Yaris Cross', 'Blanc Nacré', 2022, 2345, 'Break', 'Hybride', 'Automatique', 'vehicules/15YI4Su2oTpIIcl0BI1AFAnd6OZBT1jn0iizxZrl.jpg', '2026-01-24 10:00:37', '2026-01-24 10:00:37'),
(3, 'TG-4582-AV', 'Toyota', 'Corolla', 'Gris', 2022, 12500, 'Berline', 'Hybride', 'Automatique', 'vehicules/KQFSVVkduGDcZQj0SR8OBD1qmbRECJqSLNkEjbnW.jpg', '2026-01-24 13:45:45', '2026-01-24 13:45:45'),
(5, 'EV-001-EL', 'Tesla', 'Model 3', 'orange', 2023, 8200, 'Berline', 'Électrique', 'Automatique', 'vehicules/T9YZlF8Fwqm70lk6YmZLsAfO6xNsizik2OG559M0.jpg', '2026-01-24 13:55:48', '2026-01-24 13:55:48'),
(6, 'DE-774-MC', 'Mercedes', 'Classe C', 'Noir Obsidienne', 2019, 88000, 'Berline', 'Diesel', 'Automatique', 'vehicules/bk9MNxUg6H3OwCLyxTOl77newWP1eGgYUMXE1tDs.jpg', '2026-01-24 14:00:08', '2026-01-24 14:00:08'),
(7, 'NI-990-QA', 'Nissan', 'Qashqai', 'Orange Valencia', 2019, 74000, 'SUV', 'Essence', 'Manuelle', 'vehicules/46psjgnj3byzBGTkhg42Sf6jVHi1WIRyMjrkwWmZ.jpg', '2026-01-24 14:03:05', '2026-01-24 14:03:05'),
(8, 'CI-332-TR', 'Citroën', 'C3', 'blue', 2020, 41000, 'Berline', 'Essence', 'Manuelle', 'vehicules/1aw7w0zsllj5yfT4PxwkiCiwGPzn2vMDjrFSUweT.jpg', '2026-01-24 14:08:36', '2026-01-24 14:08:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `reparations`
--
ALTER TABLE `reparations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparations_vehicule_id_foreign` (`vehicule_id`),
  ADD KEY `reparations_technicien_id_foreign` (`technicien_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicules_immatriculation_unique` (`immatriculation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reparations`
--
ALTER TABLE `reparations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reparations`
--
ALTER TABLE `reparations`
  ADD CONSTRAINT `reparations_technicien_id_foreign` FOREIGN KEY (`technicien_id`) REFERENCES `techniciens` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `reparations_vehicule_id_foreign` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
