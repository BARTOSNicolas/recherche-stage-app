-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2021 at 08:36 PM
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
  `id` int(11) NOT NULL,
  `ent_name` varchar(255) NOT NULL,
  `ent_city` varchar(255) NOT NULL,
  `ent_contact_name` varchar(255) DEFAULT NULL,
  `ent_mail` varchar(255) DEFAULT NULL,
  `ent_phone` varchar(255) DEFAULT NULL,
  `ent_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entreprises`
--

INSERT INTO `entreprises` (`id`, `ent_name`, `ent_city`, `ent_contact_name`, `ent_mail`, `ent_phone`, `ent_description`) VALUES
(1, 'ECEDI', 'Grenoble', 'Audrey Buffière', 'abuffieres@ecedi.fr', NULL, 'Leurs valeurs ethiques et environnementales, leurs super projets et la fierté de travailler pour des associations à but non-lucratives'),
(2, 'CAP GEMINI', 'Montbonnot-Saint-Martin', 'Anne Hyvert', 'anne.hyvert@capgemini.com', NULL, 'Renommée internationnale, innovation, accés formation interne, évolution rapide, adpatabilité'),
(6, 'VISEO', 'Grenoble', NULL, NULL, NULL, NULL),
(7, 'VISEO', 'Grenoble', NULL, NULL, NULL, 'blabla,nn,nbv,nbv,nvb'),
(8, 'TEST', 'essai', NULL, NULL, NULL, NULL),
(9, 'VISEO', 'Grenoble', 'jhgfjf', NULL, NULL, 'jhgfjhgfj'),
(10, 'VISEO', 'Grenoble', 'Moi', 'nico@gromail.com', '0654788741', 'blablablab'),
(11, 'VISEO', 'Grenoble', 'Moi', 'nico@gromail.com', '0654788741', 'blablablab'),
(12, 'VISEO2', 'Grenoble7', 'Moi', 'nico@gromail.com', '0654788741', 'blablablab');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suivis`
--

CREATE TABLE `suivis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `first_date` varchar(255) DEFAULT NULL,
  `relaunch` varchar(255) DEFAULT NULL,
  `relaunched` varchar(3) DEFAULT NULL,
  `response` varchar(3) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `interview_date` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suivis`
--

INSERT INTO `suivis` (`id`, `user_id`, `entreprise_id`, `first_date`, `relaunch`, `relaunched`, `response`, `status`, `interview_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 'off', 'off', 'encours', NULL, '', '2021-02-08 20:25:44'),
(2, 1, 2, NULL, NULL, 'off', 'off', 'negatif', NULL, '', '2021-02-08 20:18:39'),
(7, 1, 12, '2021-02-13', '2021-02-18', 'off', 'off', 'encours', '2021-02-06', '2021-02-08 18:59:46', '2021-02-08 20:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pwd`) VALUES
(1, 'Nico', 'nicolas.bartos@le-campus-numerique.fr', 'plouf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suivis`
--
ALTER TABLE `suivis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suivis`
--
ALTER TABLE `suivis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `suivis`
--
ALTER TABLE `suivis`
  ADD CONSTRAINT `suivis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `suivis_ibfk_2` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
