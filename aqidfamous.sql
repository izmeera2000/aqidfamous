-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 01, 2025 at 12:57 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aqidfamous`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `content`, `time_add`, `time_edit`) VALUES
(1, 'title', 'Graphic Designer', '2025-01-01 19:24:17', '2025-01-01 19:24:17'),
(2, 'subtitle', 'Graphic Designer', '2025-01-01 19:24:17', '2025-01-01 19:24:17'),
(3, 'birthday', '2000-01-31', '2025-01-01 19:24:17', '2025-01-01 19:24:17'),
(4, 'website', 'www.aqidfamous.com', '2025-01-01 20:28:20', '2025-01-01 20:28:20'),
(5, 'phone', '+6017-9620188', '2025-01-01 20:29:06', '2025-01-01 20:29:06'),
(6, 'address', 'Rawang, Selangor', '2025-01-01 20:29:53', '2025-01-01 20:29:53'),
(7, 'education', 'Bachelor', '2025-01-01 20:30:12', '2025-01-01 20:30:12'),
(8, 'email', 'aqiddanial00@gmail.com', '2025-01-01 20:30:26', '2025-01-01 20:30:26'),
(9, 'status_freelance', 'available', '2025-01-01 20:30:36', '2025-01-01 20:30:36'),
(10, 'description', 'Recent Bachelor of Digital Graphic Design (Hons.) graduate from the University of Selangor (UNISEL), having a solid\r\nbackground in visual communication, digital media, and design concepts. I am passionate in creating compelling visual\r\nnarratives and experimenting with new methods to UI/UX design. Eager to offer creative and technical talents to a\r\ndynamic team, with a focus on producing meaningful design solutions in the digital context.\r\n', '2025-01-01 20:32:26', '2025-01-01 20:32:26'),
(11, 'clients', '90', '2025-01-01 20:32:53', '2025-01-01 20:32:53'),
(12, 'projects', '90', '2025-01-01 20:32:58', '2025-01-01 20:32:58'),
(13, 'hours', '90', '2025-01-01 20:33:03', '2025-01-01 20:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8mb4_general_ci NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `type`, `name`, `date_start`, `date_end`, `address`, `description`, `time_add`, `time_edit`) VALUES
(1, 'education', 'Foundation in Teaching English as Second Language', '2018-09-01', '2019-07-01', 'Bestari Jaya\n', 'Centre for Foundation & General Studies,\nUniversity of Selangor\n', '2025-01-01 18:56:28', '2025-01-01 19:03:06'),
(2, 'working', 'Ensu Lifesciences\r\n', '2022-08-01', '2022-10-01', '', 'Graphic Designer | Intern\r\n', '2025-01-01 19:05:33', '2025-01-01 19:05:33'),
(3, 'education', 'Bachelor (Hons) in Digital Graphic Design', '2019-11-01', '2022-08-01', 'Bestari Jaya\r\n', 'University of Selangor', '2025-01-01 18:56:28', '2025-01-01 19:03:06'),
(4, 'working', 'Employee Provident Fund (EPF/KWSP)', '2023-05-01', '2023-11-01', '', 'Creative Design | Protégé\n', '2025-01-01 19:05:33', '2025-01-01 19:18:34'),
(5, 'working', 'Employee Provident Fund (EPF/KWSP)', '2023-05-01', '2023-11-01', '', 'Ui/Ux Designer | Protégé\r\n', '2025-01-01 19:05:33', '2025-01-01 19:18:34'),
(6, 'working', 'WORQ Coworking Space', '2024-04-01', '2024-08-01', '', 'Creative Designer | Junior', '2025-01-01 19:05:33', '2025-01-01 19:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `experience_points`
--

DROP TABLE IF EXISTS `experience_points`;
CREATE TABLE IF NOT EXISTS `experience_points` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exp_id` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `point_order` int NOT NULL,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience_points`
--

INSERT INTO `experience_points` (`id`, `exp_id`, `content`, `point_order`, `time_add`, `time_edit`) VALUES
(1, 2, 'Created Social media content for Instagram, articles, and the company website about company’s products.\n', 1, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(2, 2, 'Assisting the operation team when urgent production\r\n', 2, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(3, 4, 'Collaborated with marketing and copywriting team to discuss on the content requirements, target audience and design changes.\r\n', 1, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(4, 4, 'Providing visuals for website articles and mobile app push notification on weekly basis.\r\n', 2, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(5, 4, 'Designed an Interface for the UAT (beta testing) team to monitor mobile app beta tester.\r\n', 3, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(6, 4, 'Created visuals EPF\'s website regarding financial advisory and financial literacy.\r\n', 4, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(7, 4, 'Collaborated with content team for EPF\'s Chatbot infographic visuals (Ask ELYA).\r\n', 5, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(8, 5, 'Designed a platform inside EPF’s back office for the UAT team for monitoring and granting access to the beta testers when\r\nKWSP I-Akaun mobile app was in alpha and beta stages.\r\n', 1, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(9, 5, 'Assist the creative designer on KWSP I-Akaun mobile app UI designing\r\n', 2, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(10, 6, 'Assist in providing creative direction, collaborating closely with the design team to create marketing collateral.\r\n', 1, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(11, 6, 'Support in creating clear and engaging graphic communications for print and digital mediums, encompassing brochures, website\r\ngraphics, social media visuals, posters, flyers, and other marketing materials across various departments.\r\n', 2, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(12, 6, 'Aid in the development of advertising and communications campaigns, including those on social media, TV, and other platforms,\r\nas well as exhibitions and event promotions.\r\n', 3, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(13, 6, 'Collaborate with the creative team to brainstorm and develop effective design strategies, contributing to the final artworks to\r\nensure visual appeal and brand consistency.', 4, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(14, 6, 'Assist in ensuring adherence to company brand guidelines among employees and contribute to improving or revising these\r\nguidelines as necessary.', 5, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(15, 6, 'Assist in all stages of photography and video production, from brainstorming and planning to shooting and editing.\r\n', 6, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(16, 6, 'Undertake any additional marketing-related tasks assigned by supervisors.\r\n', 7, '2025-01-01 19:09:18', '2025-01-01 19:20:51'),
(17, 6, 'Handle any other ad hoc tasks as assigned by management.\r\n', 8, '2025-01-01 19:09:18', '2025-01-01 19:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8mb4_general_ci NOT NULL,
  `nama` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` text COLLATE utf8mb4_general_ci NOT NULL,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
CREATE TABLE IF NOT EXISTS `interest` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` int NOT NULL,
  `color` int NOT NULL,
  `logo` int NOT NULL,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

DROP TABLE IF EXISTS `reference`;
CREATE TABLE IF NOT EXISTS `reference` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ref_order` int DEFAULT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `place` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone_num` text COLLATE utf8mb4_general_ci NOT NULL,
  `title` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `ref_order`, `name`, `place`, `phone_num`, `title`, `email`, `time_add`, `time_edit`) VALUES
(1, 1, 'Ameerul Afeeq Dato\' Ishammuddin', 'WORQ Coworking Space', '+60 17-534 8864', 'Senior Branding Executive\r\n', 'ameerulafeeq@gmail.com', '2025-01-01 20:02:20', '2025-01-01 20:02:20'),
(2, 2, 'Muhammad Naim Bin Azman', 'Employee Provident Fund (EPF/KWSP)', '+60 12-973 3150\r\n', 'Digital Channel Creative Designer\r\n', 'naimazman88@gmail.com', '2025-01-01 20:02:20', '2025-01-01 20:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `percentage` int DEFAULT NULL,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `color` text COLLATE utf8mb4_general_ci,
  `logo` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `percentage`, `time_add`, `time_edit`, `color`, `logo`) VALUES
(1, 'Adobe Illustrator', NULL, '2025-01-01 19:53:11', '2025-01-01 19:58:25', '#ffbb2c', 'bi bi-eye'),
(2, 'Adobe Premier Pro\r\n', 70, '2025-01-01 19:53:28', '2025-01-01 19:58:26', '#ffbb2c', 'bi bi-eye'),
(3, 'Adobe Photoshop\r\n', NULL, '2025-01-01 19:53:34', '2025-01-01 19:58:28', '#ffbb2c', 'bi bi-eye'),
(4, 'Figma\r\n', NULL, '2025-01-01 19:53:40', '2025-01-01 19:58:29', '#ffbb2c', 'bi bi-eye'),
(5, 'Wondershare Filmora\r\n', 30, '2025-01-01 19:53:47', '2025-01-01 19:58:31', '#ffbb2c', 'bi bi-eye');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `logo` text COLLATE utf8mb4_general_ci NOT NULL,
  `link` text COLLATE utf8mb4_general_ci NOT NULL,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `name`, `logo`, `link`, `time_add`, `time_edit`) VALUES
(1, 'facebook', 'bi bi-facebook', 'https://www.facebook.com/aqid.danial.9', '2025-01-01 20:22:47', '2025-01-01 20:22:47'),
(2, 'linkedin', 'bi bi-linkedin', 'https://www.linkedin.com/in/\r\naqid-danial-809880266/', '2025-01-01 20:22:47', '2025-01-01 20:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

DROP TABLE IF EXISTS `web_settings`;
CREATE TABLE IF NOT EXISTS `web_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_general_ci,
  `content` text COLLATE utf8mb4_general_ci,
  `time_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `name`, `content`, `time_add`, `time_edit`) VALUES
(1, 'title', 'aqidfamous', '2025-01-01 20:47:06', '2025-01-01 20:47:06'),
(2, 'description', 'Just as simple introduction', '2025-01-01 20:47:18', '2025-01-01 20:47:18'),
(3, 'image_url', 'assets/user/img/mraqid3.jpg', '2025-01-01 20:48:19', '2025-01-01 20:48:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
