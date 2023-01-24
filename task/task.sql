-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 02:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `taches`
--

CREATE TABLE `taches` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `archive` varchar(255) DEFAULT NULL,
  `final_time` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taches`
--

INSERT INTO `taches` (`id`, `userid`, `title`, `description`, `categorie`, `archive`, `final_time`, `created_at`) VALUES
(2, 1, 'tasky1', 'wa zwina', 'done', '', '1978-11-30 23:28:00', '2023-01-16 19:23:40'),
(5, 1, 'exemple', 'good task', 'done', '', '2023-01-17 14:15:00', '2023-01-17 14:15:46'),
(7, 1, 'finishe', 'done', 'done', '', '2023-01-17 14:16:00', '2023-01-17 14:16:35'),
(10, 1, 'add task 1', 'good', 'todo', '', '2023-01-17 18:23:00', '2023-01-17 14:20:33'),
(11, 1, 'add task 2', 'important', 'todo', '', '2023-01-17 19:24:00', '2023-01-17 14:20:33'),
(12, 1, 'hello', 'very good ', 'archived', 'todo', '2023-01-17 12:49:00', '2023-01-17 20:49:08'),
(13, 1, 'filteur', 'good guy', 'todo', '', '2023-01-17 23:54:00', '2023-01-17 20:54:46'),
(16, 1, '3afak khdem', 'good khedma', 'doing', '', '2023-01-25 20:57:00', '2023-01-17 20:58:02'),
(19, 1, 'fff', 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'doing', '', '2023-01-26 21:01:00', '2023-01-17 21:01:11'),
(20, 1, 'good boy', 'ghire likan', 'archived', 'todo', '2023-01-15 13:04:00', '2023-01-17 21:04:44'),
(21, 1, 'hada', 'good one', 'doing', '', '2023-01-31 22:40:00', '2023-01-17 22:40:38'),
(24, 1, 'good one', 'ghire chouf ta tchouf', 'done', '', '2023-03-11 10:00:00', '2023-01-23 10:01:05'),
(26, 1, 'HERA ', 'ZWIN', 'todo', NULL, '2023-01-17 20:36:00', '2023-01-23 10:10:43'),
(27, 1, 'HERA HERA', 'NICE', 'doing', NULL, '2023-01-24 18:11:00', '2023-01-23 10:10:43'),
(29, 1, 'good test', 'dfsdf', 'todo', NULL, '2023-01-13 12:03:00', '2023-01-23 15:19:40'),
(30, 10, 'test', 'just for test', 'todo', NULL, '2023-01-29 10:30:00', '2023-01-24 10:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Mister_You', 'ycode@gmail.com', '$2y$10$OjGgVyY4be4dElHmlvddLuf4S8rtSZfuQLYbOgrf59S7t7ALeprdu', '2023-01-16 11:40:21'),
(2, 'test', 'test@test.com', '$2y$10$ap6IVsCg2Qg6bXfVZDLXg.d270DKPLHcWo7xJfzRfWVHQQvH9r/Aq', '2023-01-16 18:45:08'),
(3, 'hello', 'hello@hello.com', '$2y$10$dEoPI1rV3KainaVa7tvRUuWK453dnYP4Vq1wJN7o8uMjIIEigHiSe', '2023-01-17 21:35:52'),
(7, 'test2', 'test2@gmail.com', '$2y$10$kO49RWHZM1LYm3MpYlBQ1u2CJVbt9rhzPLENHWs/wxzP0Q3fWUVua', '2023-01-18 14:30:53'),
(9, 'yutubee', 'hamza@gmail.com', '$2y$10$FNfuolC9laB4D0Qf6VLZxes6BSZRP/wliIMjqcZNhr.6LKrN0qhHS', '2023-01-23 17:01:51'),
(10, 'Moustamed', 'mousta@gmail.com', '$2y$10$LusjYr04Gc2cHkF4KoIJEOWGfOaGZNvsAMgXNeCK00gZiLV82CYcO', '2023-01-24 10:29:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taches`
--
ALTER TABLE `taches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
