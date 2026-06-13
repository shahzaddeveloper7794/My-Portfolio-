-- Database Schema for Portfolio CMS

CREATE DATABASE IF NOT EXISTS `portfolio` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `portfolio`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
-- (Default admin user, password: password)
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `hero_title` varchar(255) NOT NULL,
  `hero_subtitle` varchar(255) NOT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `hero_image` varchar(255) NOT NULL,
  `about_text` text NOT NULL,
  `footer_text` varchar(255) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_address` text NOT NULL,
  `whatsapp_number` varchar(50) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `github_link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `meta_title`, `meta_description`, `meta_keywords`, `site_logo`, `site_favicon`, `hero_title`, `hero_subtitle`, `slogan`, `hero_image`, `about_text`, `footer_text`, `contact_email`, `contact_phone`, `contact_address`, `whatsapp_number`, `facebook_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `github_link`) VALUES
(1, 'Shahzad Portfolio', 'M Shahzad | Full-Stack Developer Portfolio', 'Professional portfolio of M Shahzad, a Full-Stack Developer specializing in PHP, MySQL, and modern web technologies.', 'PHP Developer, Full-Stack, Web Development, Multan, Shahzad', 'logo.png', 'favicon.png', 'M Shahzad', 'Full-Stack Developer', 'Building the future of web, one line at a time.', 'hero.jpg', 'Passionate Full-Stack Developer with expertise in building scalable web applications. BS IT student at MNS University of Agriculture Multan.', 'Confidentially Developed By Shahzad', 'contact@example.com', '+92 320 682 2027', 'Multan, Pakistan', '+923206822027', '#', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Web Development', 'web-development'),
(2, 'Mobile App', 'mobile-app'),
(3, 'UI/UX Design', 'ui-ux-design');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `client` varchar(100) NOT NULL,
  `completion_date` date NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `title`, `slug`, `description`, `image`, `client`, `completion_date`, `link`, `created_at`) VALUES
(1, 1, 'E-Commerce Platform', 'e-commerce-platform', 'A fully functional e-commerce platform built with PHP and MySQL.', 'project1.jpg', 'Client A', '2023-05-15', '#', '2023-05-15 10:00:00'),
(2, 2, 'Fitness Tracker App', 'fitness-tracker-app', 'A mobile application for tracking fitness activities.', 'project2.jpg', 'Client B', '2023-06-20', '#', '2023-06-20 12:00:00'),
(3, 1, 'Corporate Website', 'corporate-website', 'A professional corporate website for a leading tech firm.', 'project3.jpg', 'Client C', '2023-07-10', '#', '2023-07-10 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `percentage`) VALUES
(1, 'PHP', 90),
(2, 'MySQL', 85),
(3, 'JavaScript', 80),
(4, 'HTML5/CSS3', 95),
(5, 'Tailwind CSS', 85);

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL,
  `type` enum('education','experience') NOT NULL DEFAULT 'education',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `title`, `institute`, `year`, `type`) VALUES
(1, 'BS Information Technology', 'MNS University of Agriculture Multan', '2021–2025', 'education'),
(2, 'ICS', 'Government Degree College Alipur', '2020–2021', 'education');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
