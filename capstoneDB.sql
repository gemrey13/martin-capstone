-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 01:40 PM
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
-- Database: `capstonedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisers`
--

CREATE TABLE `advisers` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `family_name` varchar(255) DEFAULT NULL,
  `given_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `barangay_name`) VALUES
(1, 'Barangay 1'),
(2, 'Barangay 2'),
(3, 'Barangay 3'),
(4, 'Barangay 4'),
(5, 'Barangay 5'),
(6, 'Barangay 6'),
(7, 'Barangay 7'),
(8, 'Barangay 8'),
(9, 'Barangay 9'),
(10, 'Barangay 10'),
(11, 'Barra'),
(12, 'Bocohan'),
(13, 'Cotta'),
(14, 'Dalahican'),
(15, 'Domoit'),
(16, 'Gulang-gulang'),
(17, 'Ibabang Dupay'),
(18, 'Ibabang Iyam'),
(19, 'Ibabang Talim'),
(20, 'Ilayang Dupay'),
(21, 'Ilayang Iyam'),
(22, 'Isabang'),
(23, 'Market View'),
(24, 'Mayao Castillo'),
(25, 'Mayao Crossing'),
(26, 'Mayao Kanluran'),
(27, 'Mayao Parada'),
(28, 'Mayao Silangan'),
(29, 'Ransohan'),
(30, 'Salinas'),
(31, 'Talao-Talao');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `registration_form` varchar(255) NOT NULL,
  `list_of_officers` varchar(255) NOT NULL,
  `list_of_members` varchar(255) NOT NULL,
  `constitution_bylaws` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `org_id`, `registration_form`, `list_of_officers`, `list_of_members`, `constitution_bylaws`) VALUES
(1, 1, 'C:\\xampp\\htdocs\\capstone/uploads/asd/dadsadasd.jpg', 'C:\\xampp\\htdocs\\capstone/uploads/asd/dalton.png', 'C:\\xampp\\htdocs\\capstone/uploads/asd/aaaaaaaaaaaaaaaaa.png', 'C:\\xampp\\htdocs\\capstone/uploads/asd/agdangan2 map.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `cellphone` varchar(50) NOT NULL,
  `number_of_members` int(11) NOT NULL,
  `date_established` date NOT NULL,
  `municipality` varchar(255) NOT NULL DEFAULT 'Lucena City',
  `barangay_id` int(11) NOT NULL,
  `major_classification` varchar(255) NOT NULL,
  `sub_classification` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('approved','declined','on review') NOT NULL DEFAULT 'on review',
  `approved_at` timestamp NULL DEFAULT NULL,
  `declined_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `address`, `telephone`, `cellphone`, `number_of_members`, `date_established`, `municipality`, `barangay_id`, `major_classification`, `sub_classification`, `description`, `created_at`, `status`, `approved_at`, `declined_at`, `user_id`) VALUES
(1, 'asd`', 'b', 'hb', 'hjv', 123, '2024-12-08', 'Lucena City', 16, 'Youth Organization', 'Faith Based', 'asda', '2024-12-08 09:21:32', 'approved', '2024-12-08 11:35:57', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization_heads`
--

CREATE TABLE `organization_heads` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `given_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization_heads`
--

INSERT INTO `organization_heads` (`id`, `org_id`, `family_name`, `given_name`, `middle_name`, `contact_number`, `email`) VALUES
(1, 1, 'asdasd', 'asdasd', 'asdasdas', 'dasdasd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `text`, `image`, `created_at`) VALUES
(1, 1, 'asdasd', 'asdasd', 'C:\\xampp\\htdocs\\capstone\\admin/posts//675589d0b5875-dadsadasd.jpg', '2024-12-08 11:58:08'),
(2, 1, 'asdasd', 'asdasd', 'C:\\xampp\\htdocs\\capstone\\admin/posts//675589fd82d58-dadsadasd.jpg', '2024-12-08 11:58:53'),
(3, 1, 'asd', 'asd', 'C:\\xampp\\htdocs\\capstone\\admin/posts//67558a0803a58-dasdadadadada.jpg', '2024-12-08 11:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','youth','organization') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin', 'admin@example.com', '$2y$10$Rn/YIXQsSrRKkT4BJ8FjV.8FoYo2qQOeNphyKC90BkUb6TP5tEu7O', 'organization', '2024-12-08 05:36:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisers`
--
ALTER TABLE `advisers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_id` (`barangay_id`);

--
-- Indexes for table `organization_heads`
--
ALTER TABLE `organization_heads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisers`
--
ALTER TABLE `advisers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_heads`
--
ALTER TABLE `organization_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisers`
--
ALTER TABLE `advisers`
  ADD CONSTRAINT `advisers_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`);

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_ibfk_1` FOREIGN KEY (`barangay_id`) REFERENCES `barangays` (`id`);

--
-- Constraints for table `organization_heads`
--
ALTER TABLE `organization_heads`
  ADD CONSTRAINT `organization_heads_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
