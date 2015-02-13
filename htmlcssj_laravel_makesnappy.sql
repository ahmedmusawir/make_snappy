-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2015 at 08:53 PM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `htmlcssj_laravel_makesnappy`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 13, 5, 'cosmos is a tv show', '2014-05-08 13:59:06', '2014-05-08 13:59:06'),
(2, 6, 12, 'it''s a piece of shit', '2014-05-08 14:01:18', '2014-05-08 14:01:18'),
(3, 6, 11, 'Laravel is love', '2014-05-09 00:05:28', '2014-05-09 00:05:28'),
(4, 12, 2, 'This is bullshit maan ,,,', '2014-05-17 06:48:40', '2014-05-17 06:48:40'),
(5, 12, 4, 'whazzp nigga', '2014-05-20 20:59:14', '2014-05-20 20:59:14'),
(6, 12, 6, 'Laravel is da best yo', '2014-05-20 21:03:36', '2014-05-20 21:03:36'),
(7, 14, 16, 'Malaysia is in Asia', '2014-05-21 08:25:47', '2014-05-21 08:25:47'),
(8, 14, 17, 'Heck Ya ...', '2014-05-21 08:26:15', '2014-05-21 08:26:15'),
(9, 14, 17, 'Hong Kong is nothing but a city ... it''s not even a country ...', '2014-05-21 08:27:01', '2014-05-21 08:27:01'),
(10, 12, 17, 'aaaaaaa', '2014-05-30 13:53:12', '2014-05-30 13:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_04_114144_create_users_table', 1),
('2014_05_04_133940_create_questions_table', 2),
('2014_05_04_134129_create_answers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solved` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `subject`, `solved`, `created_at`, `updated_at`) VALUES
(2, 12, 'what the the internet?', 'Microsoft ', 1, '2014-05-06 13:18:38', '2014-05-26 23:47:32'),
(4, 12, 'what is android', 'Mobile', 1, '2014-05-06 13:24:38', '2014-05-26 23:54:06'),
(5, 12, 'what is cosmos', 'Others', 1, '2014-05-06 13:24:51', '2014-05-30 13:55:05'),
(6, 12, 'what is laravel', 'PHP', 1, '2014-05-07 06:36:59', '2014-05-20 21:04:27'),
(7, 12, 'what is debugging', 'Js/jQ', 0, '2014-05-07 06:43:48', '2014-05-07 06:43:48'),
(8, 12, 'Who smokes the weed', 'PHP', 1, '2014-05-08 13:56:03', '2014-05-21 08:29:04'),
(9, 13, 'Why the sky is blue', 'Microsoft', 1, '2014-05-08 13:57:42', '2014-05-08 13:59:55'),
(10, 13, 'What is SASS', 'CSS', 0, '2014-05-08 13:57:57', '2014-05-08 13:57:57'),
(11, 13, 'Where can I download laravel from', 'PHP', 0, '2014-05-08 13:58:17', '2014-05-08 13:58:17'),
(12, 13, 'What is MS Dos', 'Microsoft', 0, '2014-05-08 13:58:35', '2014-05-08 13:58:35'),
(13, 6, 'What is Maverick', 'Mac OSX', 0, '2014-05-09 00:05:53', '2014-05-09 00:05:53'),
(14, 6, 'What is LESS', 'CSS', 1, '2014-05-09 00:06:17', '2014-05-09 00:08:38'),
(15, 6, 'Where is jQuery', 'Js/jQ', 0, '2014-05-09 00:06:28', '2014-05-09 00:06:28'),
(16, 14, 'Where is Malaysia', 'Mac OSX', 0, '2014-05-21 08:24:19', '2014-05-21 08:24:19'),
(17, 14, 'Is Malaysia Better Than HongKong', 'Mobile', 0, '2014-05-21 08:24:50', '2014-05-21 08:24:50'),
(18, 14, 'How About IT Jobs in Kuala Lampur', 'Js/jQ', 1, '2014-05-21 08:25:23', '2014-05-21 08:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'juju', '$2y$10$/48kMhTRc10VlvuKOR7zAOq689giZo6dWJw6/FDgibDjmUP.fsHP6', '', '2014-05-05 03:41:44', '2014-05-05 03:41:44'),
(4, 'damoose', '$2y$10$J3ZVNpk8owuiNZvHaMVe3.ReZJaaZ.S8T5tBVWTCxgGCAUXQwCn2O', '', '2014-05-05 03:43:30', '2014-05-05 03:43:30'),
(5, 'nasass', '$2y$10$3HfRQXL1iWbk6FrTgSQElubWgAovqTK916sMcGBbAN.ZVwNrklGTK', '', '2014-05-05 03:46:17', '2014-05-05 03:46:17'),
(6, 'shourav', '$2y$10$gPj/dxqX1OLpHeOSP/VBoubP2eCEuZfofM5kgO.osxCSY27bPj2y.', 'elI1QFG1lQ2V4J3IJ2MrlKvxDrTCvMa4JIVRiV6SRSlTLScTOz2TtDGSZfx7', '2014-05-05 04:35:19', '2014-05-06 01:21:43'),
(7, 'keya', '$2y$10$WZQcOe3ghUCMqUUP3LT4JOLrikEBWgfqZIAQ0tIcG.w9O3OQldNiC', '', '2014-05-05 04:48:26', '2014-05-05 04:48:26'),
(8, 'chang', '$2y$10$uf8QwBEnjn5kbeNqYZgzG.JZIo7Du.tk6p8M6b16PgPvdZ5mANK/W', '', '2014-05-05 09:59:14', '2014-05-05 09:59:14'),
(9, 'lpass', '$2y$10$wwtSbD9kYH3AU4TnCwHTveZRARvW3NrSiIqweG9rMMZHt.mduLfbC', '', '2014-05-05 10:40:57', '2014-05-05 10:40:57'),
(10, 'hpass', '$2y$10$.cCrqlaKi4AZCZUvzbWpauFdQy2BFhtAIBI3bAlwmVR6HIDC6RrCG', '', '2014-05-05 10:52:13', '2014-05-05 10:52:13'),
(11, 'fuckface', '$2y$10$ilhK0yyE3lmtSh0uH3ZMhOjXfdPQAHCq1OjZewRNqQGwoc8INIseS', '', '2014-05-05 11:29:50', '2014-05-05 11:29:50'),
(12, 'root', '$2y$10$2m.E9Hp7Co3zq7IovRgXLeWWbij6MY7aY0tWApdQLG2Rk4fhvHtce', 'EaUifhum2SmfxAXLe1ncdw9ZjSitzDzdfek8aStZ1b5IfH1vxAD59f52gF4a', '2014-05-06 01:29:29', '2014-05-26 23:54:44'),
(13, 'rami', '$2y$10$dS8hgXqaI9byzTgUYFQBXeP3LXp3sukd/lz9pfGXfgB4apwQSeR.6', 'l4bAkN5M8Gtdz6LcSfCUA6Dc79dhvJq9F2nmnsHc4pu7Wlgg5t3WJLimTEeZ', '2014-05-08 13:57:25', '2014-05-08 14:00:22'),
(14, 'user', '$2y$10$DM25j7.yUCfFISBBlcjENunQyLCch4XEGNJCNSU83ezmYLa9C4cKa', '4fHubKnjJ8onQbisVSfTiuWPrT9bRY3Fz6rbsJFu1UJE5tL98rLeQEQsoi5s', '2014-05-21 08:23:45', '2014-05-21 08:28:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
