-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2026 at 09:32 AM
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
-- Database: `discuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`) VALUES
(1, 'PHP stands for PHP: Hypertext Preprocessor', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'mobile'),
(2, 'laptop'),
(3, 'food'),
(4, 'coding'),
(5, 'general');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `category_id`, `user_id`) VALUES
(2, 'Which Android phone is best in 2026?', 'I need a budget-friendly Android phone recommendation.', 1, 1),
(3, 'How can I improve my mobile battery life?', 'My battery drains very quickly. Any tips?', 1, 1),
(4, 'Why is my phone heating up?', 'My mobile becomes hot while using apps.', 1, 1),
(5, 'How do I free up storage on Android?', 'Storage is almost full. What should I do?', 1, 1),
(6, 'Which mobile brand offers the best camera?', 'Looking for a phone with an excellent camera.', 1, 1),
(7, 'Which laptop is best for programming?', 'I need a laptop for web development and coding.', 2, 1),
(8, 'How much RAM is enough for coding?', 'Is 8GB enough or should I get 16GB?', 2, 1),
(9, 'Why is my laptop running slow?', 'Performance has become very slow recently.', 2, 1),
(10, 'Should I buy an SSD or HDD?', 'Which storage option is better?', 2, 1),
(11, 'How can I increase laptop battery life?', 'Battery backup is getting worse.', 2, 1),
(12, 'What is a healthy breakfast?', 'Suggest a healthy breakfast for students.', 3, 1),
(13, 'How much water should I drink daily?', 'What is the recommended daily intake?', 3, 1),
(14, 'Are dry fruits good for health?', 'Can I eat them every day?', 3, 1),
(15, 'Which foods help in weight gain?', 'I want to gain healthy weight.', 3, 1),
(16, 'Is fast food harmful?', 'What are the long-term effects?', 3, 1),
(17, 'How can I become a Full Stack Developer?', 'What roadmap should I follow?', 4, 1),
(18, 'Should I learn React before Node.js?', 'Which should I learn first?', 4, 1),
(19, 'What is the difference between PHP and Node.js?', 'Which backend technology is better?', 4, 1),
(20, 'How do I improve JavaScript skills?', 'Suggest the best way to practice JavaScript.', 4, 1),
(21, 'Why should I use Git and GitHub?', 'What are their benefits for developers?', 4, 1),
(22, 'How can I improve my communication skills?', 'I want to speak confidently.', 5, 1),
(23, 'What are the benefits of reading books?', 'How does reading help in daily life?', 5, 1),
(24, 'How can I manage my time effectively?', 'I often waste time and miss deadlines.', 5, 1),
(25, 'Why is exercise important?', 'How does daily exercise improve health?', 5, 1),
(26, 'What are the best habits for students?', 'Suggest productive daily habits.', 5, 1),
(27, 'Which mobile processor is best for gaming?', 'I want to buy a smartphone mainly for gaming. Which processor should I choose?', 1, 3),
(28, 'Is 5G worth buying in 2026?', 'Should I buy a 5G phone now, or is 4G still enough?', 1, 3),
(30, 'Which laptop is best for web development?', 'I need a laptop for HTML, CSS, JavaScript, PHP, and MySQL.', 2, 3),
(31, 'Which foods help improve brain performance?', 'I want foods that help me study and concentrate better.', 3, 3),
(32, 'How do I become a successful Full Stack Developer?', 'What roadmap should I follow to become job-ready?', 4, 3),
(33, 'What are the best habits for university students?', 'I want to improve my daily routine.', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) VALUES
(3, 'Sulman', 'sulman@gmail.com', '$2y$10$FEI9O7VGv8XYGYiVOzNYded.GkdfjDmACrBkZaddaeZf4jVh6p26O', 'Sargodha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
