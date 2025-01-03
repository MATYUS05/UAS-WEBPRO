-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 02:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gereja_276`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Present','Absent') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `class` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `user_id`, `full_name`, `gender`, `dob`, `class`, `created_at`, `updated_at`) VALUES
(1, 2, 'John Doe', 'Male', '2015-03-12', 1, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(2, 2, 'Jane Doe', 'Female', '2018-07-25', 2, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(3, 2, 'Emily Smith', 'Female', '2017-11-10', 1, '2024-12-18 18:39:22', '2024-12-18 18:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `class_categories`
--

CREATE TABLE `class_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_categories`
--

INSERT INTO `class_categories` (`id`, `class_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Preschool', '3-5', '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(2, 'Kindergarten', '5-6', '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(3, 'Elementary School', '7-12', '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(4, 'Teens', '13-18', '2024-12-18 18:39:22', '2024-12-18 18:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_end` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `kaka_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `date`, `time`, `time_end`, `location`, `class_id`, `kaka_id`, `created_at`, `updated_at`) VALUES
(1, 'Class Orientation', 'An introduction to the new semester and guidelines.', '2024-12-19', '08:30:00', '10:00:00', 'Auditorium', 2, 5, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(2, 'Class Orientation', 'An introduction to the new semester and guidelines.', '2024-12-19', '10:30:00', '12:30:00', 'Auditorium', 3, 5, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(3, 'Class Orientation', 'An introduction to the new semester and guidelines.', '2024-12-19', '13:00:00', '15:00:00', 'Auditorium', 4, 4, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(4, 'Class Orientation', 'An introduction to the new semester and guidelines.', '2024-12-19', '16:00:00', '18:00:00', 'Auditorium', 1, 4, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(5, 'Sports Day', 'Annual sports day event for all classes.', '2024-12-19', '08:30:00', '10:00:00', 'School Ground', 3, 4, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(6, 'Sports Day', 'Annual sports day event for all classes.', '2024-12-19', '10:30:00', '12:30:00', 'School Ground', 1, 4, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(7, 'Sports Day', 'Annual sports day event for all classes.', '2024-12-19', '13:00:00', '15:00:00', 'School Ground', 3, 5, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(8, 'Sports Day', 'Annual sports day event for all classes.', '2024-12-19', '16:00:00', '18:00:00', 'School Ground', 3, 4, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(9, 'Science Fair', 'Showcase of student projects in science and technology.', '2024-12-19', '08:30:00', '10:00:00', 'Lab Building', 4, 5, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(10, 'Science Fair', 'Showcase of student projects in science and technology.', '2024-12-19', '10:30:00', '12:30:00', 'Lab Building', 3, 4, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(11, 'Science Fair', 'Showcase of student projects in science and technology.', '2024-12-19', '13:00:00', '15:00:00', 'Lab Building', 3, 5, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(12, 'Science Fair', 'Showcase of student projects in science and technology.', '2024-12-19', '16:00:00', '18:00:00', 'Lab Building', 3, 4, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(13, 'Art Exhibition', 'Display of student artworks and performances.', '2024-12-19', '08:30:00', '10:00:00', 'Art Studio', 3, 5, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(14, 'Art Exhibition', 'Display of student artworks and performances.', '2024-12-19', '10:30:00', '12:30:00', 'Art Studio', 3, 4, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(15, 'Art Exhibition', 'Display of student artworks and performances.', '2024-12-19', '13:00:00', '15:00:00', 'Art Studio', 3, 5, '2024-12-18 18:39:22', '2024-12-18 18:39:22'),
(16, 'Art Exhibition', 'Display of student artworks and performances.', '2024-12-19', '16:00:00', '18:00:00', 'Art Studio', 3, 4, '2024-12-18 18:39:22', '2024-12-18 18:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `join_event`
--

CREATE TABLE `join_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `child_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_09_190150_create_class_categories_table', 1),
(5, '2024_12_09_192203_create_children_table', 1),
(6, '2024_12_09_194716_create_events_table', 1),
(7, '2024_12_09_202650_create_notes_table', 1),
(8, '2024_12_09_203404_create_attendances_table', 1),
(9, '2024_12_09_205133_create_join_event_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_id` bigint(20) UNSIGNED NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `child_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'Deserunt accusantium fuga aliquid quia aut enim et.', '2024-12-18 18:39:23', '2024-12-18 18:39:23'),
(2, 1, 'Nisi doloremque rerum iste nihil reiciendis temporibus ut distinctio.', '2024-12-18 18:39:23', '2024-12-18 18:39:23'),
(3, 1, 'Eum nemo deleniti in libero neque doloribus voluptatem cumque dolor mollitia corporis.', '2024-12-18 18:39:23', '2024-12-18 18:39:23'),
(4, 2, 'Sed sint magnam iste ut quia consectetur quaerat.', '2024-12-18 18:39:23', '2024-12-18 18:39:23'),
(5, 2, 'Molestias optio reiciendis quos molestiae magnam qui autem consequatur velit dolores sint distinctio.', '2024-12-18 18:39:23', '2024-12-18 18:39:23'),
(6, 2, 'Officia voluptatum consequatur dolore necessitatibus laudantium et corporis aut est sapiente sit voluptatem.', '2024-12-18 18:39:23', '2024-12-18 18:39:23'),
(7, 3, 'Aut alias dolorum sint doloribus quia optio placeat error in corrupti ducimus dolor rerum.', '2024-12-18 18:39:23', '2024-12-18 18:39:23'),
(8, 3, 'Porro voluptate quo aut dolorem quo aut earum.', '2024-12-18 18:39:23', '2024-12-18 18:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HhvDxgGOUT0mBdVUwJPMzWM3cGYpedApCA2DDFO4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRUlBVENBZGRvZDFMdDkyeTdrTDN3ZE9KUTBEUVkyRlBLWmowTnoydiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXR0ZW5kYW5jZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1734572524);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$0BJQYPZzE8aHnCMBlmnNjuT9qYjIbHcskR8ne94.ADF/ltGu/pnSq', 'Admin', NULL, '2024-12-18 18:39:21', '2024-12-18 18:39:21'),
(2, 'Parent A', 'parenta@gmail.com', NULL, '$2y$12$Pg.nqk5KPmIG794uBwQJdOutqSymON8iMISTi5AU4MJoFMoWjzGmG', 'Parent', NULL, '2024-12-18 18:39:21', '2024-12-18 18:39:21'),
(3, 'Parent B', 'Parentb@gmail.com', NULL, '$2y$12$IKjclayzQLLCi7O1vX4KBeB.rHBFqY45BCyAGKl6Wj2V6QVK/cvTy', 'Parent', NULL, '2024-12-18 18:39:21', '2024-12-18 18:39:21'),
(4, 'Kaka A', 'kakaa@gmail.com', NULL, '$2y$12$Ln.wr6ANnDeO5RB.zR3Gc.VCmst/NIbYUJvSyp.yXuc5s2k81Ma5y', 'Kaka', NULL, '2024-12-18 18:39:21', '2024-12-18 18:39:21'),
(5, 'Kaka B', 'kakab@gmail.com', NULL, '$2y$12$GjPnyRkDwopcE3KdKlrafOC8M/N1c/xBiJcOdXyRDHm7PNjvhwqYK', 'Kaka', NULL, '2024-12-18 18:39:22', '2024-12-18 18:39:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_child_id_foreign` (`child_id`),
  ADD KEY `attendances_event_id_foreign` (`event_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `children_user_id_foreign` (`user_id`),
  ADD KEY `children_class_foreign` (`class`);

--
-- Indexes for table `class_categories`
--
ALTER TABLE `class_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_class_id_foreign` (`class_id`),
  ADD KEY `events_kaka_id_foreign` (`kaka_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_event`
--
ALTER TABLE `join_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `join_event_event_id_foreign` (`event_id`),
  ADD KEY `join_event_child_id_foreign` (`child_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_child_id_foreign` (`child_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_categories`
--
ALTER TABLE `class_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_event`
--
ALTER TABLE `join_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_class_foreign` FOREIGN KEY (`class`) REFERENCES `class_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `children_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_kaka_id_foreign` FOREIGN KEY (`kaka_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `join_event`
--
ALTER TABLE `join_event`
  ADD CONSTRAINT `join_event_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `join_event_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
