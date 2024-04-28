-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2024 at 02:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workopia`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `salary` varchar(45) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `requirements` longtext,
  `benefits` longtext,
  `created_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `user_id`, `title`, `description`, `salary`, `tags`, `company`, `address`, `city`, `state`, `phone`, `email`, `requirements`, `benefits`, `created_at`) VALUES
(1, 1, 'Software Engineer', 'We are seeking a skilled software engineer to develop high-quality software solutions', '90000', 'development', 'Tech Solutions Inc.', '123 Main St', 'Albany', 'NY', '348-334-3949', 'info@techsolutions.com', 'Bachelors degree in Computer Science or related field, 3+ years of software development experience', NULL, 'now()'),
(2, 2, 'Marketing Specialist', 'We are looking for a Marketing Specialist to create and manage marketing campaigns', '70000', 'marketing, advertising', 'Marketing Pros', '456 Market St', 'San Francisco', 'CA', '454-344-3344', 'info@marketingpros.com', 'Bachelors degree in Marketing or related field, experience in digital marketing', NULL, 'now()'),
(3, 3, 'Web Developer', 'Join our team as a Web Developer and create amazing web applications', '85000', 'web development, programming', 'WebTech Solutions', '789 Web Ave', 'Chicago', 'IL', '456-876-5432', 'info@webtechsolutions.com', 'Bachelors degree in Computer Science or related field, proficiency in HTML, CSS, JavaScript', NULL, 'now()'),
(4, 1, 'Data Analyst', 'We are hiring a Data Analyst to analyze and interpret data for insights', '75000', 'data analysis, statistics', 'Data Insights LLC', '101 Data St', 'Chicago', 'IL', '444-555-5555', 'info@datainsights.com', 'Bachelors degree in Data Science or related field, strong analytical skills', NULL, 'now()'),
(5, 2, 'Graphic Designer', 'Join our creative team as a Graphic Designer and bring ideas to life', '70000', 'graphic design, creative', 'CreativeWorks Inc.', '234 Design Blvd', 'Albany', 'NY', '499-321-9876', 'info@creativeworks.com', 'Bachelors degree in Graphic Design or related field, proficiency in Adobe Creative Suite', NULL, 'now()'),
(6, 1, 'Data Scientist', 'We\'re looking for a Data Scientist to analyze complex data and generate insights', '100000', 'data science, machine learning', 'DataGenius Corp', '567 Data Drive', 'Boston', 'MA', '684-789-1234', 'info@datagenius.com', 'Masters or Ph.D. in Data Science or related field, experience with machine learning algorithms', NULL, 'now()'),
(13, 1, 'Some great remote job', 'Some great remote job', '3000', NULL, 'Dunlap and Calhoun Inc', 'Animi alias consequ', 'Dolor asperiores ver', 'Fuga Voluptates ut', '+1 (979) 783-9779', 'tanehyd@mailinator.com', 'PHP, Laravel, Javascript, Nodejs', 'Health Insurance', 'now()'),
(16, 4, 'Better title', 'Great description for the app', '6000', NULL, 'Hayes Olsen Plc', 'Sed occaecat consequ', 'Officia ut doloribus', 'Enim ex lorem eos pr', '+1 (971) 436-9958', 'nuqovimax@mailinator.com', 'Omnis et quibusdam n', 'Ipsam velit amet qu', 'now()');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `address` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `city`, `state`, `address`, `created_at`) VALUES
(1, 'John Doe', 'test@workopia.com', '123456', 'warri', 'Delta state', 'My address', '2024-04-01 07:54:12'),
(2, 'Steve Smith', 'test2@workopia.com', '123456', 'Ebo', 'Delta', 'Some where', '2024-04-01 07:56:11'),
(3, 'Anita Anni', 'test2@workopia.com', '123456', 'Ebo', 'Delta', 'Some where', '2024-04-01 07:56:11'),
(4, 'Chinedu Chaz', 'test5@workopia.com', '$2y$10$7npHl5JO3fVXwEcSizMR/eNAPDxUN7750nPZw5rE7TzZQdqzzGT5S', 'Excepteur fuga Volu', 'Aut porro exercitati', NULL, '2024-04-28 08:39:56'),
(5, 'Chinedu Chaz', 'test@test.com', '$2y$10$GoAmYcJnBazmRQLntV8Rn.z.y2KkCTiLU/Ch0oSXjyP.QkaxRbDH2', 'Asperiores natus vol', 'Facilis sit fuga Es', NULL, '2024-04-28 09:23:23'),
(6, 'Chinedu Chaz', 'admin@admin.com', '$2y$10$DXtWJbI6iHiYcNHRTqU1Y.gD3L6Yy4EIMT7YclF2Pd6S/r5gc7Uo.', 'Excepteur fuga Volu', 'Facilis sit fuga Es', NULL, '2024-04-28 09:32:13'),
(7, 'Chinedu Chaz', 'test7@test.com', '$2y$10$kxAWdjOCeZH4W5WCUJr3J.jQMAOqax/ogJnCr8msbnozj0Ax6kFCy', 'asfd', 'Warri', NULL, '2024-04-28 09:33:45'),
(8, 'Chinedu Chaz', 'tesmmt@test.com', '$2y$10$aqQXx6EMl9y6MTQaj5epJ.xlIIaSq.D/RWxoYfApQsku.hp1.rE/u', 'Voluptatem alias con', 'Iure fugit cumque s', NULL, '2024-04-28 09:37:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_listings_users_idx` (`user_id`);
ALTER TABLE `listings` ADD FULLTEXT KEY `idx_search` (`title`,`description`,`state`,`city`,`company`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `fk_listings_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
