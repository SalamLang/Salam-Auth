-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 02:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salam`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` bigint(20) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `code` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `slug`, `user_id`, `code`, `title`, `created_at`, `updated_at`) VALUES
(5, 'dstgsghdgh', 152, 'fghdfghdfgh', 'ghdfhdfghghdfgh', '2024-09-09 11:26:29', '2024-09-09 11:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `codes_visits`
--

CREATE TABLE `codes_visits` (
  `id` bigint(20) NOT NULL,
  `code_id` bigint(20) NOT NULL,
  `user_ip` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_tokens`
--

CREATE TABLE `forgot_tokens` (
  `id` bigint(20) NOT NULL,
  `token` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forgot_tokens`
--

INSERT INTO `forgot_tokens` (`id`, `token`, `email`, `created_at`, `updated_at`) VALUES
(3, '943d5902-428e-4251-8137-cd4185b5de54', 'mohamadreza1388.org@gmail.com', '2024-09-08 11:14:33', '2024-09-08 11:14:33'),
(4, 'a3df8808-e2b5-4169-bed5-dcbc280f551d', 'mohamadreza1388.org@gmail.com', '2024-09-08 11:49:45', '2024-09-08 11:49:45'),
(5, '67f41b98-cdc6-496c-843d-95db53bc5a3c', 'mohamadreza1388.org@gmail.com', '2024-09-08 12:10:45', '2024-09-08 12:10:45'),
(6, 'e481808a-ec62-4791-96a7-f460c8351e32', 'mohamadreza1388.org@gmail.com', '2024-09-08 12:10:48', '2024-09-08 12:10:48'),
(7, '5a90c758-1527-4161-88b6-ead6c80a0754', 'mohamadreza1388.org@gmail.com', '2024-09-08 12:21:12', '2024-09-08 12:21:12'),
(8, 'abd27c1c-0302-44bc-b441-5e5e84ff07b1', 'mohamadreza1388.org@gmail.com', '2024-09-08 12:43:32', '2024-09-08 12:43:32'),
(9, '0172b746-e7a4-4cd2-911d-a81c1e5607c7', 'mohamadreza1388.org@gmail.com', '2024-09-08 12:44:15', '2024-09-08 12:44:15'),
(10, 'e97def74-878d-484c-ac09-3e81e92a42e2', 'mohamadreza1388.org@gmail.com', '2024-09-08 13:35:25', '2024-09-08 13:35:25'),
(11, '427fab00-a4ec-4ef3-803a-63a2e29203b2', 'mohamadreza1388.org@gmail.com', '2024-09-08 13:46:27', '2024-09-08 13:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE `numbers` (
  `id` bigint(20) NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`key`, `value`) VALUES
('tokens_key', 'salam_lang');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) NOT NULL,
  `token` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created_at`, `updated_at`) VALUES
(176, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiLCJhdWQiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXV0aCIsImlhdCI6MTcyNTgxMjYzMCwiZXhwIjoxNzI4NDA0NjMwLCJkYXRhIjp7ImlkIjoxNDksIm5hbWUiOiJcdTA2NDVcdTA2MmRcdTA2NDVcdTA2MmYgXHUwNjMxXHUwNjM2XHUwNjI3IFx1MDY0Nlx1MDYzNVx1MDYzMVx1MDYyN1x1MDY0NFx1MDY0NyBcdTA2MzJcdTA2MjdcdTA2MmZcdTA2NDciLCJlbWFpbCI6ImFkbWluQGdtYWlsLmNvbSJ9fQ.o-IPMHG9QvUdyXAhPu4-G6TDnu9Wjq_BPzAA-CZeNXg', 149, '2024-09-08 16:23:50', '2024-09-08 16:23:50'),
(177, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiLCJhdWQiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXV0aCIsImlhdCI6MTcyNTgxMzU4MSwiZXhwIjoxNzI4NDA1NTgxLCJkYXRhIjp7ImlkIjoxNTIsIm5hbWUiOiJcdTA2NDVcdTA2MmRcdTA2NDVcdTA2MmYgXHUwNjMxXHUwNjM2XHUwNjI3IiwiZW1haWwiOiJtb2hhbWFkcmV6YTEzODgub3JnQGdtYWlsLmNvbSJ9fQ.clgIH9417cpA2-ZohUp_nVieUQvwDNySJeEzaUlvyDs', 152, '2024-09-08 16:39:41', '2024-09-08 16:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(149, 'محمد رضا نصراله زاده', 1, 'admin@gmail.com', '$2y$10$OtnpFWIeSo2Znp9vNgMYEOJjzpGjKcua3IqQRP2Qt9.cMJutEv9Dq', '2024-09-07 08:58:11', '2024-09-07 08:58:11'),
(152, 'محمد رضا', 2, 'mohamadreza1388.org@gmail.com', '$2y$10$VNIcNE1jnnbGawt1YEYZKOfv/AYwuDUVW56Rif/sCAzztjXtBeefG', '2024-09-08 16:39:41', '2024-09-08 16:39:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Indexes for table `codes_visits`
--
ALTER TABLE `codes_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_code_id` (`code_id`);

--
-- Indexes for table `forgot_tokens`
--
ALTER TABLE `forgot_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numbers`
--
ALTER TABLE `numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD KEY `idx_role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `codes_visits`
--
ALTER TABLE `codes_visits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forgot_tokens`
--
ALTER TABLE `forgot_tokens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `numbers`
--
ALTER TABLE `numbers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `codes_visits`
--
ALTER TABLE `codes_visits`
  ADD CONSTRAINT `codes_visits_ibfk_1` FOREIGN KEY (`code_id`) REFERENCES `codes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
