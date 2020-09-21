-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 07:29 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questions`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classid` int(11) NOT NULL,
  `classname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classid`, `classname`) VALUES
(1, 'senior one'),
(2, 'senior2'),
(3, 'senior3');

-- --------------------------------------------------------

--
-- Table structure for table `main_questions`
--

CREATE TABLE `main_questions` (
  `question_id` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `complexity` varchar(30) NOT NULL,
  `question_text` text NOT NULL,
  `answer` int(11) NOT NULL,
  `optionstext` text NOT NULL,
  `hint_statement` text NOT NULL,
  `feedback` text NOT NULL,
  `comment` text NOT NULL,
  `subject` text NOT NULL,
  `chapter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_questions`
--

INSERT INTO `main_questions` (`question_id`, `teacherid`, `class`, `complexity`, `question_text`, `answer`, `optionstext`, `hint_statement`, `feedback`, `comment`, `subject`, `chapter`) VALUES
(1, 9, 'senior one', '2', 'OWE', 0, 'OPS', 'NEITH', 'EITH', 'COM', 'Physics', 'MAH'),
(2, 9, 'senior2', '2', 'How is Manchester the best team', 0, 'good', 'Hint me', '', 'WOE', 'Biology', 'JOD'),
(3, 13, 'senior2', '2', 'how old are you', 0, 'HINT ME', 'hyy', 'good', 'good', 'Chemistry', 'poty'),
(4, 13, 'senior2', '2', 'good', 2, 'hooo', 'gwee', 'feed', 'doom', 'Biology', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subjectname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectname`) VALUES
(1, 'Mathmatics'),
(2, 'Physics'),
(3, 'Science'),
(4, 'Biology'),
(5, 'English'),
(6, 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `civility` int(11) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `email` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `civility`, `fullname`, `email`, `created_at`, `updated_at`) VALUES
(9, 2, 'oguti vic', 'vic@gmail.com', '2020-09-02 00:29:34', '2020-09-02 00:29:34'),
(10, 2, 'oguti', 'victoriaocon111@gmail.com', '2020-09-02 00:30:35', '2020-09-02 00:30:35'),
(11, 1, 'juma', 'viuu@gmail.com', '2020-09-02 00:31:11', '2020-09-02 00:31:11'),
(12, 3, 'oguti', 'victoriaocon111@gmail.com', '2020-09-02 02:11:41', '2020-09-02 02:11:41'),
(13, 1, 'Mukoova jumagits', 'mukoovajuma183@gmail.com', '2020-09-05 04:46:43', '2020-09-05 04:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `temp_questions`
--

CREATE TABLE `temp_questions` (
  `qtnid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `complexity` varchar(30) NOT NULL,
  `question_text` text NOT NULL,
  `answer` int(11) NOT NULL,
  `optionstext` text NOT NULL,
  `hint_statement` text NOT NULL,
  `feedback` text NOT NULL,
  `comment` text NOT NULL,
  `subject` text NOT NULL,
  `chapter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `accountType` int(11) DEFAULT NULL,
  `account_status` int(11) NOT NULL DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `sname`, `fname`, `username`, `gender`, `email`, `mobile`, `password`, `role`, `accountType`, `account_status`, `created_on`, `updated_on`) VALUES
(1, NULL, NULL, 'vic', 'f', 'vic@gmail.com', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, 0, '2020-09-05 05:04:28', '2020-09-05 05:04:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `main_questions`
--
ALTER TABLE `main_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_questions`
--
ALTER TABLE `temp_questions`
  ADD PRIMARY KEY (`qtnid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_questions`
--
ALTER TABLE `main_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `temp_questions`
--
ALTER TABLE `temp_questions`
  MODIFY `qtnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
