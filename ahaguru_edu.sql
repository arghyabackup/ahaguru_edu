-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 04:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahaguru_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '''0''=>''Inactive'', ''1''=>''Active''',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''0'' => ''Not Deleted'', ''1'' => ''Deleted''',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `mobile`, `class`, `status`, `is_deleted`, `created`, `modified`) VALUES
(1, 'Arghya', 'arghya@gmail.com', '1234567890', 'Class 2', '1', '0', '2021-12-13 14:36:30', '2021-12-13 14:36:30'),
(2, 'Arghya 2', 'arghya2@gmail.com', '1223442231', 'Class 42', '1', '0', '2021-12-13 14:37:05', '2021-12-13 14:39:58'),
(3, 'Arghya 3', 'arghya3@gmail.com', '1223442231', 'Class 42', '1', '0', '2021-12-13 14:37:05', '2021-12-13 14:39:58'),
(4, 'Arghya 4', 'arghya4@gmail.com', '1223442231', 'Class 42', '1', '0', '2021-12-13 14:37:05', '2021-12-13 14:39:58'),
(5, 'Arghya 5', 'arghya5@gmail.com', '1223442231', 'Class 42', '1', '0', '2021-12-13 14:37:05', '2021-12-13 14:39:58'),
(6, 'Arghya 6', 'arghya6@gmail.com', '1223442231', 'Class 42', '1', '0', '2021-12-13 14:37:05', '2021-12-13 14:39:58'),
(7, 'Arghya 7', 'arghya7@gmail.com', '1223442231', 'Class 42', '1', '0', '2021-12-13 14:37:05', '2021-12-13 14:39:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
