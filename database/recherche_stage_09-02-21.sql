-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2021 at 10:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recherche_stage`
--

-- --------------------------------------------------------

--
-- Table structure for table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ent_name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ent_city` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ent_contact_name` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ent_mail` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ent_phone` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ent_web` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ent_description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entreprises`
--

INSERT INTO `entreprises` (`id`, `ent_name`, `ent_city`, `ent_contact_name`, `ent_mail`, `ent_phone`, `ent_web`, `ent_description`) VALUES
(1, 'ECEDI', 'Grenoble', 'Audrey Buffière', 'abuffieres@ecedi.fr', NULL, 'www.ecedi.fr', 'Leurs valeurs ethiques et environnementales, leurs super projets et la fierté de travailler pour des associations à but non-lucratives'),
(2, 'Graaly', 'InoVallée', 'Eric Mathieu', 'eric.mathieu@graaly.com', '06 62 15 82 32', 'www.graaly.com', 'Application Escape Game.\r\nVoir mail du 09/02/21'),
(3, 'VISEO', 'Grenoble', 'Roberto CALVEZ', NULL, 'Linked In', 'www.viseo.com', 'Projets et clients sympa, groupe internationnal, nouveau challenges, talents aux services des clients, carrière dynamique, interdisciplinaire, formations, certifications, etc.'),
(4, 'CAP Gemini', 'InoVallée', 'Anne Hyvert', 'anne.hyvert@capgemini.com', NULL, 'www.capgemini.com', 'julia.pardessus@capgemini.com\r\nRenommée Internationale, innovation, accès formation interne, évolution rapide, adaptabilité'),
(5, 'ARTURIA', 'InoVallée', 'Via formulaire site', NULL, '04 38 02 05 55', 'www.arturia.com', 'Passionné par la musique, j\'ai connu au début de Arturia en 2000, renommée Internationale'),
(6, 'APPARENCE.IO', 'InoVallée', NULL, NULL, '06 24 55 55 46', 'fr.apparence.io', 'Création d\'application mobile UX, Ui, Dev et maintenance expertise sous node angular Firebase ionic python, Spring Swift en gros tous ce que j\'aime.'),
(7, 'EASY MOUNTAIN MHIKES', 'InoVallée', 'Remi ou/et Marc', 'remi@easy-mountain.com', NULL, 'www.mhikes.com', 'marc@easy-mountain.com\r\nApplication de randonnée connectée 1300 parcours'),
(8, 'Collibris', 'InoVallée', 'Nicolas Saubin', 'nicolas.saubin@collibris-app.com', '04 76 04 14 59', 'www.collibris-app.com', 'Application sociale Mobile et Web pour les passionnés de lecture'),
(9, 'HALIAS', 'InoVallée', NULL, NULL, '09 81 90 70 24', 'www.halias.fr', 'Entreprise spécialisée dans les logiciels de gestion de données scientifiques energies et environnement'),
(10, 'NEOXIAS', 'InoVallée', NULL, NULL, NULL, 'www.neoxias.com', 'imaginer, développer les services numériques de demain, dev plateforme numérique'),
(11, 'RWIGO', 'InoVallée', NULL, NULL, '06 21 18 32 65', 'www.rwigo.com', 'Startup spécialisée dans le développement d\'app web basées sur des API et des webservices'),
(12, 'UNITY', 'InoVallée', NULL, NULL, NULL, 'www.unity3d.com', 'Base des jeux videos multiplateforme, à Montbonnot la spécialité c\'est la recherche sur la partie image de synthèse'),
(13, 'VISIOGLOBE', 'InoVallée', NULL, NULL, '04 76 13 40 76', 'www.visioglobe.com', 'Solution logicielle pour le déplacement et visualisation 3D en intérieur, Internationale'),
(14, 'AUVITRAN', 'InoVallée', NULL, NULL, '04 76 04 70 69', 'www.auvitran.com', 'Produits et services pour l\'interconnection et l\'interface audio pour évènementiel spectacle audio pro');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_09_075006_create_entreprises_table', 1),
(5, '2021_02_09_075035_create_suivis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suivis`
--

CREATE TABLE `suivis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `first_date` date DEFAULT NULL,
  `relaunch` date DEFAULT NULL,
  `relaunched` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interview_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suivis`
--

INSERT INTO `suivis` (`id`, `user_id`, `entreprise_id`, `first_date`, `relaunch`, `relaunched`, `response`, `status`, `interview_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-01-19', '2021-02-02', 'on', 'off', 'encours', NULL, '2021-02-09 20:29:14', '2021-02-09 20:29:14'),
(2, 1, 2, '2021-02-01', NULL, 'off', 'off', 'positif', NULL, '2021-02-09 20:35:35', '2021-02-09 20:35:35'),
(3, 1, 3, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 20:37:08', '2021-02-09 20:45:18'),
(4, 1, 4, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 20:38:33', '2021-02-09 20:45:52'),
(5, 1, 5, '2021-02-01', NULL, 'off', 'off', 'encours', NULL, '2021-02-09 20:39:45', '2021-02-09 20:39:45'),
(6, 1, 6, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 20:40:24', '2021-02-09 20:45:58'),
(7, 1, 7, '2021-02-01', NULL, 'off', 'off', 'encours', NULL, '2021-02-09 20:42:00', '2021-02-09 20:42:00'),
(8, 1, 8, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 20:52:22', '2021-02-09 20:52:22'),
(9, 1, 9, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 21:05:43', '2021-02-09 21:05:43'),
(10, 1, 10, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 21:06:18', '2021-02-09 21:06:18'),
(11, 1, 11, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 21:07:03', '2021-02-09 21:07:03'),
(12, 1, 12, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 21:07:37', '2021-02-09 21:07:37'),
(13, 1, 13, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 21:08:23', '2021-02-09 21:08:23'),
(14, 1, 14, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 21:09:21', '2021-02-09 21:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rgpd` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rgpd`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nico', 'nico@mail.com', NULL, '$2y$10$M/T1eqq22XPMsh.Z5ut7pu2PY3CSFV8/w6OxWjbc8EH0KxNTpmQEK', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `suivis`
--
ALTER TABLE `suivis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suivis`
--
ALTER TABLE `suivis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
