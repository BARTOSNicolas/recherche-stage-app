-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2021 at 02:19 PM
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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ent_name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ent_city` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ent_contact_name` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ent_mail` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ent_phone` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ent_web` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ent_description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entreprises`
--

INSERT INTO `entreprises` (`id`, `user_id`, `ent_name`, `ent_city`, `ent_contact_name`, `ent_mail`, `ent_phone`, `ent_web`, `ent_description`) VALUES
(1, 1, 'ECEDI', 'Grenoble', 'Audrey Buffière', 'abuffieres@ecedi.fr', NULL, 'www.ecedi.fr', 'Leurs valeurs ethiques et environnementales, leurs super projets et la fierté de travailler pour des associations à but non-lucratives'),
(2, 1, 'Graaly', 'InoVallée', 'Eric Mathieu', 'eric.mathieu@graaly.com', '06 62 15 82 32', 'www.graaly.com', 'Application Escape Game.\r\nVoir mail du 09/02/21 -> répondu'),
(3, 1, 'VISEO', 'Grenoble', 'Roberto CALVEZ', NULL, 'Linked In Roberto', 'www.viseo.com', 'Projets et clients sympa, groupe internationnal, nouveau challenges, talents aux services des clients, carrière dynamique, interdisciplinaire, formations, certifications, etc.\r\nContact avec Roberto'),
(4, 1, 'CAP Gemini', 'InoVallée', 'Anne Hyvert', 'julia.pardessus@capgemini.com', NULL, 'www.capgemini.com', 'anne.hyvert@capgemini.com\r\nRenommée Internationale, innovation, accès formation interne, évolution rapide, adaptabilité'),
(5, 1, 'ARTURIA', 'InoVallée', 'Via formulaire site', NULL, '04 38 02 05 55', 'www.arturia.com', 'Passionné par la musique, j\'ai connu au début de Arturia en 2000, renommée Internationale'),
(6, 1, 'APPARENCE.IO', 'InoVallée', 'David', 'david@apparence.io', '06 24 55 55 46', 'fr.apparence.io', 'Création d\'application mobile UX, Ui, Dev et maintenance expertise sous node angular Firebase ionic python, Spring Swift en gros tous ce que j\'aime.'),
(7, 1, 'EASY MOUNTAIN MHIKES', 'InoVallée', 'Remi ou/et Marc', 'remi@easy-mountain.com', NULL, 'www.mhikes.com', 'marc@easy-mountain.com\r\nApplication de randonnée connectée 1300 parcours'),
(8, 1, 'Collibris', 'InoVallée', 'Nicolas Saubin', 'nicolas.saubin@collibris-app.com', '04 76 04 14 59', 'www.collibris-app.com', 'Application sociale Mobile et Web pour les passionnés de lecture'),
(9, 1, 'HALIAS', 'InoVallée', NULL, NULL, '09 81 90 70 24', 'www.halias.fr', 'Entreprise spécialisée dans les logiciels de gestion de données scientifiques energies et environnement'),
(10, 1, 'NEOXIAS', 'InoVallée', NULL, NULL, NULL, 'www.neoxias.com', 'imaginer, développer les services numériques de demain, dev plateforme numérique'),
(11, 1, 'RWIGO', 'InoVallée', NULL, NULL, '06 21 18 32 65', 'www.rwigo.com', 'Startup spécialisée dans le développement d\'app web basées sur des API et des webservices'),
(12, 1, 'UNITY', 'InoVallée', NULL, NULL, NULL, 'www.unity3d.com', 'Base des jeux videos multiplateforme, à Montbonnot la spécialité c\'est la recherche sur la partie image de synthèse'),
(13, 1, 'VISIOGLOBE', 'InoVallée', NULL, NULL, '04 76 13 40 76', 'www.visioglobe.com', 'Solution logicielle pour le déplacement et visualisation 3D en intérieur, Internationale'),
(14, 1, 'AUVITRAN', 'InoVallée', NULL, NULL, '04 76 04 70 69', 'www.auvitran.com', 'Produits et services pour l\'interconnection et l\'interface audio pour évènementiel spectacle audio pro'),
(15, 2, 'École Nationale Supérieure d\'Architecture de Grenoble', 'Grenoble', NULL, 'drh@grenoble.archi.fr', NULL, NULL, NULL),
(16, 1, 'Function support', 'Grenoble7', 'Justine Anxionnat Raoux', 'LinkedIn', NULL, 'https://www.fonction-support.fr/', 'Entretien avec le Campus'),
(17, 1, 'Open', 'Grenoble', 'Fanny Molinari', 'fanny.molinari@open-groupe.com', NULL, 'https://www.open.global/fr', 'Entretien avec le Campus\r\n\r\ntheo.silvente@open-groupe.com;'),
(18, 1, 'ACTOLL', 'Meylan', 'Camille Simiana', 'camille.simiana@actoll.com', NULL, 'https://www.actoll.com/', 'Entretien avec le Campus'),
(19, 1, 'Bee Buzziness', 'Grenoble', 'Pauline Crimeni', 'p.crimeni@bee-buzziness.com', NULL, 'https://go.ub.stream/', 'Job Dating avec le Campus'),
(20, 1, 'WiZBII', 'Grenoble', NULL, NULL, NULL, NULL, NULL),
(21, 1, 'WiZBII', 'Grenoble', NULL, NULL, NULL, NULL, 'Via le site internet');

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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
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
(1, 1, 1, '2021-01-19', '2021-02-02', 'on', 'off', 'negatif', NULL, '2021-02-09 19:29:14', '2021-02-18 18:58:00'),
(2, 1, 2, '2021-02-01', NULL, 'off', 'on', 'positif', NULL, '2021-02-09 19:35:35', '2021-02-13 10:31:51'),
(3, 1, 3, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 19:37:08', '2021-02-09 19:45:18'),
(4, 1, 4, '2021-02-19', NULL, 'off', 'off', 'encours', NULL, '2021-02-09 19:38:33', '2021-02-19 09:27:10'),
(5, 1, 5, '2021-02-01', '2021-02-19', 'on', 'off', 'encours', NULL, '2021-02-09 19:39:45', '2021-02-19 12:46:05'),
(6, 1, 6, '2021-02-19', NULL, 'on', 'off', 'negatif', NULL, '2021-02-09 19:40:24', '2021-02-19 09:51:17'),
(7, 1, 7, '2021-02-01', '2021-02-19', 'on', 'off', 'encours', NULL, '2021-02-09 19:42:00', '2021-02-19 08:38:23'),
(8, 1, 8, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 19:52:22', '2021-02-09 19:52:22'),
(9, 1, 9, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 20:05:43', '2021-02-09 20:05:43'),
(10, 1, 10, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 20:06:18', '2021-02-09 20:06:18'),
(11, 1, 11, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 20:07:03', '2021-02-09 20:07:03'),
(12, 1, 12, NULL, NULL, 'off', 'off', 'negatif', NULL, '2021-02-09 20:07:37', '2021-02-16 19:31:29'),
(13, 1, 13, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 20:08:23', '2021-02-09 20:08:23'),
(14, 1, 14, NULL, NULL, 'off', 'off', 'afaire', NULL, '2021-02-09 20:09:21', '2021-02-09 20:09:21'),
(15, 2, 15, '2021-02-13', NULL, 'off', 'off', 'encours', NULL, '2021-02-13 09:42:27', '2021-02-13 09:42:27'),
(16, 1, 16, '2021-02-02', '2021-02-11', 'on', 'on', 'negatif', '2021-02-02', '2021-02-13 10:34:14', '2021-02-18 18:57:55'),
(17, 1, 17, '2021-02-02', '2021-02-11', 'on', 'off', 'encours', '2021-02-02', '2021-02-13 10:34:55', '2021-02-13 10:34:55'),
(18, 1, 18, '2021-02-11', '2021-02-19', 'on', 'off', 'encours', '2021-02-11', '2021-02-13 10:35:47', '2021-02-19 08:23:20'),
(19, 1, 19, '2021-02-02', '2021-02-19', 'on', 'off', 'encours', '2021-02-02', '2021-02-13 10:36:26', '2021-02-19 08:29:00'),
(20, 1, 21, '2021-02-19', NULL, 'off', 'off', 'encours', NULL, '2021-02-19 12:09:08', '2021-02-19 12:34:08');

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
(1, 'Nico', 'nicotos@me.com', NULL, '$2y$10$f.Ob8Ld705UgWot7D58P7OPWzF2Kd2QMKmdDj3V5rRu2qTZzvF22S', NULL, NULL, NULL, NULL),
(2, 'Taban', 'taban_d@yahoo.com', NULL, '$2y$10$NJI6C3z6CVxo7pwMZHlhj.W/.mS.oWmd/WUPCt794xevjq6b8a.BC', 'yes', NULL, NULL, NULL),
(3, 'faf', 'farouk.sakher@le-campus-numerique.fr', NULL, '$2y$10$w0bYOvbVFLbP4Qa3MoEuQeBpK.ZDhspcv72.Y1n1QXecHcpoSspYu', 'yes', NULL, NULL, NULL),
(4, 'Nidhal', 'nidhal.hamila@gmail.com', NULL, '$2y$10$8b.KTSHqIV1pywkPCqBKSOb5wwwbcOhYboM46reM8wssvDPUchO.m', 'on', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entreprises_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `suivis_entreprise_id_foreign` (`entreprise_id`),
  ADD KEY `suivis_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entreprises`
--
ALTER TABLE `entreprises`
  ADD CONSTRAINT `entreprises_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suivis`
--
ALTER TABLE `suivis`
  ADD CONSTRAINT `suivis_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suivis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
