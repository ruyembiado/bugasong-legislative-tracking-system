-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 03:31 PM
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
-- Database: `blts`
--

-- --------------------------------------------------------

--
-- Table structure for table `document_views`
--

CREATE TABLE `document_views` (
  `document_view_id` int(255) NOT NULL,
  `document_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `date_added` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_views`
--

INSERT INTO `document_views` (`document_view_id`, `document_id`, `user_id`, `document_type`, `date_added`) VALUES
(1, 6, 5, 'ordinance', '2024-06-23 08:56:31.381949'),
(2, 5, 5, 'ordinance', '2024-06-23 09:31:43.753480'),
(3, 11, 5, 'resolution', '2024-06-23 09:35:29.498307'),
(4, 6, 5, 'ordinance', '2024-06-23 09:48:53.256009'),
(5, 5, 5, 'ordinance', '2024-06-23 09:48:58.010531'),
(6, 6, 5, 'ordinance', '2024-06-23 09:50:19.803806'),
(7, 6, 5, 'ordinance', '2024-06-23 09:50:29.309634'),
(8, 11, 5, 'resolution', '2024-06-23 09:50:32.303315'),
(9, 11, 5, 'resolution', '2024-06-23 09:50:52.127293'),
(10, 11, 5, 'resolution', '2024-06-23 09:51:12.421781'),
(11, 9, 5, 'resolution', '2024-06-23 09:51:23.732683'),
(12, 9, 5, 'resolution', '2024-06-23 09:52:05.731180'),
(13, 9, 5, 'resolution', '2024-06-23 09:52:46.220038'),
(14, 9, 5, 'resolution', '2024-06-23 10:00:25.807816'),
(15, 9, 5, 'resolution', '2024-06-23 10:01:38.358129'),
(16, 11, 5, 'resolution', '2024-06-23 10:02:19.199218'),
(17, 6, 5, 'ordinance', '2024-06-23 10:03:14.392030'),
(18, 6, 5, 'ordinance', '2024-06-23 10:04:30.965212'),
(19, 9, 5, 'resolution', '2024-06-23 10:09:43.941050'),
(20, 2, 5, 'ordinance', '2024-06-23 10:14:02.481054'),
(21, 6, 5, 'ordinance', '2024-06-23 12:40:28.829637'),
(22, 5, 5, 'ordinance', '2024-06-29 17:40:21.985057'),
(23, 7, 15, 'ordinance', '2024-11-01 13:30:33.055546'),
(24, 14, 12, 'resolution', '2025-01-03 00:18:34.237298'),
(25, 11, 12, 'ordinance', '2025-01-05 20:50:25.818448'),
(26, 25, 12, 'resolution', '2025-01-05 20:51:40.138868'),
(27, 24, 12, 'resolution', '2025-01-05 20:51:44.110467'),
(28, 29, 12, 'resolution', '2025-01-05 20:51:53.402452'),
(29, 28, 12, 'resolution', '2025-01-05 20:52:01.849144'),
(30, 30, 12, 'resolution', '2025-01-05 20:52:08.364420'),
(31, 26, 12, 'resolution', '2025-01-05 20:52:11.685084'),
(32, 27, 12, 'resolution', '2025-01-05 20:52:14.920829'),
(33, 23, 12, 'resolution', '2025-01-05 20:52:18.597679'),
(34, 11, 12, 'ordinance', '2025-01-05 20:52:23.068715'),
(35, 15, 12, 'ordinance', '2025-01-05 20:52:28.786840'),
(36, 11, 12, 'ordinance', '2025-01-05 20:53:35.963434'),
(37, 14, 12, 'ordinance', '2025-01-05 20:53:42.123637'),
(38, 11, 12, 'ordinance', '2025-01-05 20:53:46.355967'),
(39, 12, 12, 'ordinance', '2025-01-05 20:53:56.704886'),
(40, 13, 12, 'ordinance', '2025-01-05 20:54:13.370293'),
(41, 11, 12, 'ordinance', '2025-01-05 20:54:25.903216'),
(42, 11, 12, 'ordinance', '2025-01-05 20:54:34.624850'),
(43, 11, 12, 'ordinance', '2025-01-05 20:56:39.188482'),
(44, 28, 12, 'resolution', '2025-01-05 21:01:30.634604'),
(45, 15, 12, 'ordinance', '2025-01-05 21:01:39.937799'),
(46, 25, 12, 'resolution', '2025-01-05 21:07:10.731250'),
(47, 15, 12, 'ordinance', '2025-01-05 21:10:58.185167'),
(48, 24, 12, 'resolution', '2025-01-05 21:14:04.466392'),
(49, 29, 12, 'resolution', '2025-01-05 21:14:09.089025'),
(50, 26, 12, 'resolution', '2025-01-05 21:14:13.981383'),
(51, 11, 12, 'ordinance', '2025-01-05 21:29:15.111411');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `log_history_id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `log_type` varchar(255) NOT NULL,
  `log_description` longtext NOT NULL,
  `device` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`log_history_id`, `user`, `log_type`, `log_description`, `device`, `date_added`) VALUES
(162, 'admin', 'Login', 'BLTS Admin logged to the system.', 'Desktop (Windows)', '2025-01-03 00:17:59'),
(163, 'citizen', 'Login', 'Jerolette Domingo logged to the system.', 'Desktop (Windows)', '2025-01-03 00:18:17'),
(164, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-03 00:19:08'),
(165, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-03 00:19:14'),
(166, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-03 00:19:18'),
(167, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-03 00:19:23'),
(168, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-03 00:19:28'),
(169, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-03 00:19:32'),
(170, 'admin', 'Login', 'BLTS Admin logged to the system.', 'Desktop (Windows)', '2025-01-04 21:11:06'),
(171, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-04 21:11:20'),
(172, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-04 21:11:24'),
(173, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-04 21:11:30'),
(174, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-04 21:11:34'),
(175, 'admin', 'Delete Resolution', 'BLTS Admin deleted the resolution with .', 'Desktop (Windows)', '2025-01-04 21:11:38'),
(176, 'admin', 'Delete Ordinance', 'BLTS Admin deleted the ordinance with .', 'Desktop (Windows)', '2025-01-04 21:11:52'),
(177, 'admin', 'Delete Ordinance', 'BLTS Admin deleted the ordinance with .', 'Desktop (Windows)', '2025-01-04 21:11:58'),
(178, 'admin', 'Delete Ordinance', 'BLTS Admin deleted the ordinance with .', 'Desktop (Windows)', '2025-01-04 21:12:02'),
(179, 'admin', 'Delete Ordinance', 'BLTS Admin deleted the ordinance with .', 'Desktop (Windows)', '2025-01-04 21:12:06'),
(180, 'admin', 'Delete Ordinance', 'BLTS Admin deleted the ordinance with .', 'Desktop (Windows)', '2025-01-04 21:12:11'),
(181, 'admin', 'Update Category', 'BLTS Admin updated the category name Endorsing R to Endorsing .', 'Desktop (Windows)', '2025-01-04 21:12:32'),
(182, 'admin', 'Delete Category', 'BLTS Admin deleted the category Tourism R.', 'Desktop (Windows)', '2025-01-04 21:12:39'),
(183, 'admin', 'Update Category', 'BLTS Admin updated the category name Memorandum of Agreement R to Memorandum of Agreement .', 'Desktop (Windows)', '2025-01-04 21:12:46'),
(184, 'admin', 'Update Category', 'BLTS Admin updated the category name Naming and Renaming R to Naming and Renaming .', 'Desktop (Windows)', '2025-01-04 21:12:54'),
(185, 'admin', 'Delete Category', 'BLTS Admin deleted the category Business R.', 'Desktop (Windows)', '2025-01-04 21:12:59'),
(186, 'admin', 'Delete Category', 'BLTS Admin deleted the category Budget R.', 'Desktop (Windows)', '2025-01-04 21:13:04'),
(187, 'admin', 'Delete Category', 'BLTS Admin deleted the category Local Youth Development Council R.', 'Desktop (Windows)', '2025-01-04 21:13:10'),
(188, 'admin', 'Delete Category', 'BLTS Admin deleted the category Health R.', 'Desktop (Windows)', '2025-01-04 21:13:16'),
(189, 'admin', 'Update Category', 'BLTS Admin updated the category name Granting Authority R to Granting Authority .', 'Desktop (Windows)', '2025-01-04 21:13:22'),
(190, 'admin', 'Delete Category', 'BLTS Admin deleted the category Financial Program R.', 'Desktop (Windows)', '2025-01-04 21:13:29'),
(191, 'admin', 'Update Category', 'BLTS Admin updated the category name Funds R to Funds .', 'Desktop (Windows)', '2025-01-04 21:13:38'),
(192, 'admin', 'Delete Category', 'BLTS Admin deleted the category Financial assistance R.', 'Desktop (Windows)', '2025-01-04 21:13:43'),
(193, 'admin', 'Update Category', 'BLTS Admin updated the category name Annual Budget R to Annual Budget .', 'Desktop (Windows)', '2025-01-04 21:13:51'),
(194, 'admin', 'Delete Category', 'BLTS Admin deleted the category Animals Welfare R.', 'Desktop (Windows)', '2025-01-04 21:13:59'),
(195, 'admin', 'Delete Category', 'BLTS Admin deleted the category Agriculture R.', 'Desktop (Windows)', '2025-01-04 21:14:04'),
(196, 'admin', 'Delete Category', 'BLTS Admin deleted the category Security or Prevention R.', 'Desktop (Windows)', '2025-01-04 21:14:11'),
(197, 'admin', 'Update Category', 'BLTS Admin updated the category name Supplemental Budget R to Supplemental Budget .', 'Desktop (Windows)', '2025-01-04 21:14:17'),
(198, 'admin', 'Update Category', 'BLTS Admin updated the category name SK Annual Budget R to SK Annual Budget .', 'Desktop (Windows)', '2025-01-04 21:14:25'),
(199, 'admin', 'Update Category', 'BLTS Admin updated the category name Senior Citizens R to Senior Citizens .', 'Desktop (Windows)', '2025-01-04 21:14:33'),
(200, 'admin', 'Delete Category', 'BLTS Admin deleted the category Endorsing.', 'Desktop (Windows)', '2025-01-04 21:14:41'),
(201, 'admin', 'Delete Category', 'BLTS Admin deleted the category Memorandum of Agreement.', 'Desktop (Windows)', '2025-01-04 21:14:46'),
(202, 'admin', 'Delete Category', 'BLTS Admin deleted the category Senior Citizens.', 'Desktop (Windows)', '2025-01-04 21:15:00'),
(203, 'admin', 'Delete Category', 'BLTS Admin deleted the category Financial assistance.', 'Desktop (Windows)', '2025-01-04 21:15:05'),
(204, 'admin', 'Delete Category', 'BLTS Admin deleted the category Annual Budget.', 'Desktop (Windows)', '2025-01-04 21:15:12'),
(205, 'admin', 'Delete Category', 'BLTS Admin deleted the category SK Annual Budget.', 'Desktop (Windows)', '2025-01-04 21:15:23'),
(206, 'admin', 'Delete Category', 'BLTS Admin deleted the category Supplemental Budget.', 'Desktop (Windows)', '2025-01-04 21:15:33'),
(207, 'admin', 'Delete Category', 'BLTS Admin deleted the category Financial Program.', 'Desktop (Windows)', '2025-01-04 21:15:43'),
(208, 'admin', 'Delete Category', 'BLTS Admin deleted the category Budget.', 'Desktop (Windows)', '2025-01-04 21:15:50'),
(209, 'citizen', 'Login', 'Jerolette Domingo logged to the system.', 'Desktop (Windows)', '2025-01-04 21:16:47'),
(210, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 276 — 2024.', 'Desktop (Windows)', '2025-01-04 21:21:12'),
(211, 'citizen', 'Logout', 'Jerolette Domingo logged out to the system.', 'Desktop (Windows)', '2025-01-04 21:22:47'),
(212, 'admin', 'Login', 'BLTS Admin logged to the system.', 'Desktop (Windows)', '2025-01-04 21:22:55'),
(213, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 277 — 2024.', 'Desktop (Windows)', '2025-01-04 21:23:19'),
(214, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 278 — 2024.', 'Desktop (Windows)', '2025-01-04 21:26:56'),
(215, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION DECLARING AS OPERATIVE THE SUPPLEMENTAL BUDGET FOR FY 2024 OF BARANGAYS IGBALANGAO AND TALISAY, ALL OF BUGASONG, ANTIQUE.', 'Desktop (Windows)', '2025-01-04 21:27:29'),
(216, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 279 — 2024.', 'Desktop (Windows)', '2025-01-04 21:31:05'),
(217, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 280 — 2024.', 'Desktop (Windows)', '2025-01-04 21:32:42'),
(218, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 281 — 2024.', 'Desktop (Windows)', '2025-01-04 21:35:09'),
(219, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 282 — 2024.', 'Desktop (Windows)', '2025-01-04 21:37:29'),
(220, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 283 — 2024.', 'Desktop (Windows)', '2025-01-04 21:39:45'),
(221, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 276 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 21:40:11'),
(222, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 277 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 21:40:15'),
(223, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 278 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 21:40:18'),
(224, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 279 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 21:40:22'),
(225, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 280 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 21:40:25'),
(226, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 281 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 21:40:27'),
(227, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 282 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 21:40:29'),
(228, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 283 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 21:40:31'),
(229, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 276 — 2024`s status to Unpublished.', 'Desktop (Windows)', '2025-01-04 21:48:07'),
(230, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 276 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 21:48:15'),
(231, 'admin', 'Logout', 'BLTS Admin logged out to the system.', 'Desktop (Windows)', '2025-01-04 21:48:51'),
(232, 'citizen', 'Login', 'Jerolette Domingo logged to the system.', 'Desktop (Windows)', '2025-01-04 21:49:56'),
(233, 'admin', 'Login', 'BLTS Admin logged to the system.', 'Desktop (Windows)', '2025-01-04 22:01:06'),
(234, 'admin', 'Create Category', 'BLTS Admin added new category Senior Citizens Incintives.', 'Desktop (Windows)', '2025-01-04 22:01:26'),
(235, 'admin', 'Create Ordinance', 'BLTS Admin added new ordinance with Municipal Ordinance No. 36 - 2023.', 'Desktop (Windows)', '2025-01-04 22:20:51'),
(236, 'admin', 'Update Category', 'BLTS Admin updated the category name Senior Citizens Incintives to Senior Citizens Incentives.', 'Desktop (Windows)', '2025-01-04 22:21:05'),
(237, 'admin', 'Update Ordinance', 'BLTS Admin updated the Municipal Ordinance No. 36 - 2023`s status to Published.', 'Desktop (Windows)', '2025-01-04 22:21:15'),
(238, 'admin', 'Create Ordinance', 'BLTS Admin added new ordinance with Municipal Ordinance No. 38 — 2024.', 'Desktop (Windows)', '2025-01-04 22:27:38'),
(239, 'admin', 'Update Ordinance', 'BLTS Admin updated the Municipal Ordinance No. 38 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-04 22:27:52'),
(240, 'admin', 'Login', 'BLTS Admin logged to the system.', 'Desktop (Windows)', '2025-01-05 17:51:01'),
(241, 'admin', 'Login', 'BLTS Admin logged to the system.', 'Desktop (Windows)', '2025-01-05 18:11:51'),
(242, 'admin', 'Create Ordinance', 'BLTS Admin added new ordinance with Appropriation Ordinance No. 06- 2021 .', 'Desktop (Windows)', '2025-01-05 18:13:20'),
(243, 'admin', 'Update Category', 'BLTS Admin updated the category name Business to Annual Budget.', 'Desktop (Windows)', '2025-01-05 18:13:39'),
(244, 'admin', 'Update Ordinance', 'BLTS Admin updated the Appropriation Ordinance No. 06- 2021 `s status to Published.', 'Desktop (Windows)', '2025-01-05 18:14:13'),
(245, 'admin', 'Create Ordinance', 'BLTS Admin added new ordinance with Municipal Ordinance No. 40 — 2024.', 'Desktop (Windows)', '2025-01-05 18:32:37'),
(246, 'admin', 'Update Ordinance', 'BLTS Admin updated the Municipal Ordinance No. 40 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-05 18:32:43'),
(247, 'admin', 'Create Ordinance', 'BLTS Admin added new ordinance with Ordinance No, 42 — 2024.', 'Desktop (Windows)', '2025-01-05 19:00:28'),
(248, 'admin', 'Update Ordinance', 'BLTS Admin updated the Ordinance No, 42 — 2024.', 'Desktop (Windows)', '2025-01-05 20:12:47'),
(249, 'admin', 'Update Ordinance', 'BLTS Admin updated the Ordinance No, 42 — 2024.', 'Desktop (Windows)', '2025-01-05 20:33:26'),
(250, 'admin', 'Update Ordinance', 'BLTS Admin updated the Ordinance No, 42 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-05 20:33:45'),
(251, 'admin', 'Update Ordinance', 'BLTS Admin updated the Municipal Ordinance No. 40 — 2024.', 'Desktop (Windows)', '2025-01-05 20:36:27'),
(252, 'admin', 'Update Ordinance', 'BLTS Admin updated the Appropriation Ordinance No. 06- 2021 .', 'Desktop (Windows)', '2025-01-05 20:37:26'),
(253, 'admin', 'Update Ordinance', 'BLTS Admin updated the Municipal Ordinance No. 38 — 2024.', 'Desktop (Windows)', '2025-01-05 20:38:21'),
(254, 'admin', 'Update Ordinance', 'BLTS Admin updated the Municipal Ordinance No. 36 - 2023.', 'Desktop (Windows)', '2025-01-05 20:39:23'),
(255, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION DECLARING AS OPERATIVE THE ANNUAL BARANGAY BUDGET FOR FY 2024 OF BARANGAYS LACAYON AND PANGALCAGAN, BUGASONG, ANTIQUE.', 'Desktop (Windows)', '2025-01-05 20:40:10'),
(256, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION DECLARING AS OPERATIVE THE SK ANNUAL BUDGET FOR FY 2024.', 'Desktop (Windows)', '2025-01-05 20:40:53'),
(257, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION DECLARING AS OPERATIVE THE SUPPLEMENTAL BUDGET FOR FY 2024 OF BARANGAYS IGBALANGAO AND TALISAY, ALL OF BUGASONG, ANTIQUE.', 'Desktop (Windows)', '2025-01-05 20:41:25'),
(258, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION ENDORSING THE APPLICATION FOR COMMERCIAL SAND AND GRAVEL (CSAG) QUARRY PERMIT OF EMILE ARSAGA WITHIN A SPECIFIED AREA ALONG PALIWAN RIVER, BARANGAY IGSORO, BUGASONG, ANTIQUE.', 'Desktop (Windows)', '2025-01-05 20:41:55'),
(259, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION FAVORABLE ENDORSING DRA. IRMA J. ADAYON AS AN ADDITIONAL MEMBER OF THE PROVINCIAL HEALTH BOARD.', 'Desktop (Windows)', '2025-01-05 20:42:17'),
(260, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION GRANTING AUTHORITY TO MUNICIPAL MAYOR JOHN LLOYD M. PACETE AND ACTING MUNICIPAL TREASURER JEANNE G. VARONA AS SIGNATORIES TO THE OPENING OF TRUST FUND — CURRENT ACCOUNT WITH THE DEVELOPMENT BANK OF THE PHILIPPINES TO BE USED AS DEPOSITORY ACCOUNT FOR ALL FUNDS TRANSFER AND RELEASES FROM OTHER LGUS, NATIONAL AGENCIES AND OTHER GOVERNMENT OWNED AND CONTROLLED CORPORATIONS OR FUNDS WITH SPECIFIC PURPOSE.', 'Desktop (Windows)', '2025-01-05 20:42:44'),
(261, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION RENAMING THE BUGASONG RURAL HEALTH UNIT AS BUGASONG PRIMARY CARE FACILITY.', 'Desktop (Windows)', '2025-01-05 20:43:03'),
(262, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION RESPECTFULLY REQUESTING HON. GOVERNOR RHODORA J. CADIAO TO ALLOCATE FUNDS IN THE AMOUNT OF FIVE MILLION PESOS (Php 5,000.000.00) FOR THE CONSTRUCTION OF MULTI-PURPOSE COVERED COURT/GYM WITH COMFORT ROOMS AT ANTIQUE VOCATIONAL SCHOOL, BUGASONG, ANTIQUE.', 'Desktop (Windows)', '2025-01-05 20:43:24'),
(263, 'citizen', 'Login', 'Jerolette Domingo logged to the system.', 'Desktop (Windows)', '2025-01-05 20:49:56'),
(264, 'citizen', 'Logout', 'Jerolette Domingo logged out to the system.', 'Desktop (Windows)', '2025-01-05 20:52:40'),
(265, 'admin', 'Login', 'BLTS Admin logged to the system.', 'Desktop (Windows)', '2025-01-05 20:52:48'),
(266, 'citizen', 'Login', 'Jerolette Domingo logged to the system.', 'Desktop (Windows)', '2025-01-05 20:53:33'),
(267, 'citizen', 'Logout', 'Jerolette Domingo logged out to the system.', 'Desktop (Windows)', '2025-01-05 21:16:16'),
(268, 'admin', 'Login', 'BLTS Admin logged to the system.', 'Desktop (Windows)', '2025-01-05 21:16:24'),
(269, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 272 — 2024.', 'Desktop (Windows)', '2025-01-05 21:17:16'),
(270, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION AUTHORIZING MUNICIPAL MAYOR HON. JOHN LLOYD M. PACETE TO ENTER INTO A MEMORANDUM OF AGREEMENT WITH THE BUGASONG MUNICIPAL POLICE STATION FOR THE IMPLEMENTATION OF PNP PROGRAMS, PROJECTS AND ACTIVITIES.', 'Desktop (Windows)', '2025-01-05 21:23:05'),
(271, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 273 — 2024.', 'Desktop (Windows)', '2025-01-05 21:25:01'),
(272, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION AUTHORIZING MUNICIPAL MAYOR JOHN LLOYD M. PACETE AS SIGNATORY TO A MEMORANDUM OF AGREEMENT WITH THE DEPARTMENT OF SOCIAL WELFARE AND DEVELOPMENT FOR THE IMPLEMENTATION OF SOCIAL PENSION PROGRAM TO INDIGENT\r\nSENIOR CITIZENS IN BUGASONG, ANTIQUE.', 'Desktop (Windows)', '2025-01-05 21:25:47'),
(273, 'admin', 'Create Resolution', 'BLTS Admin added new resolution with Resolution No. 275 - 2024.', 'Desktop (Windows)', '2025-01-05 21:27:40'),
(274, 'admin', 'Update Resolution', 'BLTS Admin updated the A RESOLUTION DECLARING AS OPERATIVE THE SK ANNUAL BUDGET FOR FY 2024 OF BARANGAYS ARANGOTE AND LACAYON, ALL OF BUGASONG, ANTIQUE.', 'Desktop (Windows)', '2025-01-05 21:28:23'),
(275, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 272 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-05 21:28:28'),
(276, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 273 — 2024`s status to Published.', 'Desktop (Windows)', '2025-01-05 21:28:30'),
(277, 'admin', 'Update Resolution', 'BLTS Admin updated the Resolution No. 275 - 2024`s status to Published.', 'Desktop (Windows)', '2025-01-05 21:28:31'),
(278, 'citizen', 'Login', 'Jerolette Domingo logged to the system.', 'Desktop (Windows)', '2025-01-05 21:29:11'),
(279, 'admin', 'Update Ordinance', 'BLTS Admin updated the Municipal Ordinance No, 42 — 2024.', 'Desktop (Windows)', '2025-01-05 21:30:20'),
(280, 'admin', 'Update Ordinance', 'BLTS Admin updated the Municipal Ordinance No. 42 — 2024.', 'Desktop (Windows)', '2025-01-05 21:30:45'),
(281, 'admin', 'Delete Category', 'BLTS Admin deleted the category Agriculture.', 'Desktop (Windows)', '2025-01-05 21:31:12'),
(282, 'admin', 'Delete Category', 'BLTS Admin deleted the category Animals Welfare.', 'Desktop (Windows)', '2025-01-05 21:31:19'),
(283, 'admin', 'Delete Category', 'BLTS Admin deleted the category Health.', 'Desktop (Windows)', '2025-01-05 21:31:40'),
(284, 'admin', 'Delete Category', 'BLTS Admin deleted the category Funds.', 'Desktop (Windows)', '2025-01-05 21:31:45'),
(285, 'citizen', 'Create Post', 'Jerolette Domingo added new post with the topic Scholarship.', 'Desktop (Windows)', '2025-01-05 21:34:27'),
(286, 'admin', 'Update Post', 'BLTS Admin updated the post on the topic Scholarship status to Published.', 'Desktop (Windows)', '2025-01-05 21:34:54'),
(287, 'admin', 'Update Post', 'BLTS Admin updated the post on the topic Scholarship status to Unpublished.', 'Desktop (Windows)', '2025-01-05 21:35:02'),
(288, 'admin', 'Delete Post', 'BLTS Admin deleted the post on the topic Scholarship.', 'Desktop (Windows)', '2025-01-05 21:35:41'),
(289, 'citizen', 'Create Post', 'Jerolette Domingo added new post with the topic Scholarship.', 'Desktop (Windows)', '2025-01-05 21:36:03'),
(290, 'citizen', 'Create Post', 'Jerolette Domingo added new post with the topic Leash Laws.', 'Desktop (Windows)', '2025-01-05 21:40:06'),
(291, 'citizen', 'Create Post', 'Jerolette Domingo added new post with the topic Leash Laws.', 'Desktop (Windows)', '2025-01-05 22:20:21'),
(292, 'citizen', 'Create Post', 'Jerolette Domingo added new post with the topic Scholarship.', 'Desktop (Windows)', '2025-01-05 22:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `notification_content` longtext NOT NULL,
  `is_read` int(255) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `post_id`, `user_id`, `notification_content`, `is_read`, `date_added`) VALUES
(28, 74, 15, 'Your comment has been deleted because: This comment \"Gagu\" contains inappropriate language and can be considered offensive as it is a derogatory term in some contexts', 1, '2024-11-21 20:37:38'),
(29, 44, 15, 'Your comment has been deleted because: This comment, \"GAGU,\" should not be published as it contains offensive language', 1, '2024-11-21 20:38:27'),
(30, 44, 15, 'Your comment has been deleted because: The comment \"Gagu\" appears to contain offensive language', 1, '2024-11-21 20:45:13'),
(31, 74, 15, 'Your comment has been deleted because: This comment contains offensive language and is not suitable for publication', 1, '2024-11-21 20:47:59'),
(32, 74, 15, 'Your comment has been deleted because: This comment is not suitable for publication as it contains offensive language', 1, '2024-11-21 20:48:10'),
(33, 75, 12, 'Your post has been published on the forum site because the content is appropriate and non-offensive.', 1, '2025-01-05 21:34:27'),
(34, 75, 12, 'Your post has been published to the forum site.', 0, '2025-01-05 21:34:54'),
(35, 75, 12, 'Your post has been unpublished from the forum site.', 0, '2025-01-05 21:35:02'),
(36, 76, 12, 'Your post has been set to pending status because: Feedback: The post contains inappropriate language (\"bwisit\")', 1, '2025-01-05 21:36:03'),
(37, 77, 12, 'Your post has been set to pending status because: This post is not suitable for publication due to the use of offensive language (\"bitchy asshole\")', 1, '2025-01-05 21:40:06'),
(38, 78, 12, 'Your post has been set to pending status because: This post is highly inappropriate and contains threatening language', 0, '2025-01-05 22:20:21'),
(39, 79, 12, 'Your post has been set to pending status because: This post is not suitable for publication as it contains offensive language (\"UGLY\")', 1, '2025-01-05 22:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `ordinances`
--

CREATE TABLE `ordinances` (
  `ordinance_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `ordinance_cat_id` int(255) NOT NULL,
  `title` longtext NOT NULL,
  `ordinanceNo` varchar(255) NOT NULL,
  `preamble` longtext NOT NULL,
  `enactingClause` longtext NOT NULL,
  `body` longtext NOT NULL,
  `repealingClause` longtext NOT NULL,
  `effectivityClause` longtext NOT NULL,
  `enactmentDetails` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_publish` datetime(6) DEFAULT NULL,
  `status` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordinances`
--

INSERT INTO `ordinances` (`ordinance_id`, `user_id`, `ordinance_cat_id`, `title`, `ordinanceNo`, `preamble`, `enactingClause`, `body`, `repealingClause`, `effectivityClause`, `enactmentDetails`, `file`, `date_added`, `date_publish`, `status`) VALUES
(11, 1, 21, 'AN ORDINANCE GRANTING ONE TIME GRATUITY INCENTIVES IN THE AMOUNT OF FIVE THOUSAND PESOS (P5,000.00) TO ANY SENIOR CITIZEN IN BUGASONG, ANTIQUE WHO ARE EIGHTY (80) YEARS OLD AND ABOVE AND PROVIDING FUNDS THEREOF\r\nAuthored by: Hon. Rosario Y. Pesayco\r\nCo-Authored by: Hon. Jennifer Rose A. Tatoy', 'Municipal Ordinance No. 36 - 2023', 'WHEREAS, pursuant to Republic Act No. 9994 also known as \"Expanded Senior Citizens Act of 2010\", values the dignity of every human person and guarantees full respect for human rights as well as to give full support to the improvement of the total well- being of the elderly and their full participation in society, considering that the senior citizens are integral part of the Philippine society;\r\n\r\nWHEREAS, the Municipality of Bugasong recognizes the contribution of Senior Citizens in building society and guiding the youths to be productive members of community through valuable insights and advices;\r\n\r\nWHEREAS, almost all senior citizens are basically financially dependent upon their children and relatives for their daily needs and health expenses;\r\n\r\nWHEREAS, in appreciation of the vital role and contributions of senior citizens in the development and progress of the municipality, it is appropriate to grant a one-time gratuity incentive in the amount of P 5,000.00 to any senior citizen who are 80 years old and above;\r\n', 'NOW, THEREFORE, BE IT ORDAINED by the Sangguniang Bayan, in session duly assembled, that:', 'Section 1. Title. This Ordinance shall be known as the “Senior Citizen’s Gratuity Incentives Award”.\r\n\r\nSection 2. Scope and Coverage. This Ordinance shall cover any Senior Citizens who are 80 years old and above upon the approval of this ordinance.\r\n\r\nSection 3. Definition of Terms.\r\n\r\na) Gratuity — gesture of appreciation or as a reward for long and faithful service.\r\n\r\nb) Incentive —a thing that motivates or encourages one to do something.\r\n\r\nSection 4. Requisites.\r\n\r\na) Must be a Filipino citizen aged 80 years old and above upon the approval of the ordinance\r\n\r\nb) A bonafide resident of Bugasong, Antique.\r\n\r\nc) Must be a duly registered member of the Office of the Senior Citizens Affairs (OSCA)\r\n\r\nd) The list of beneficiaries will be the responsibility of the OSCA Barangay President to inform the OSCA officers of any additional members who turns Eighty (80) years old by submitting a copy of the member\'s OSCA Identification Card or Birt Certificate\r\n\r\nIn addition, the grantee shall submit any two (2) of the following documents:\r\n\r\ne) Certified copy of Birth Certificate\r\n\r\nf) Certified copy of Marriage Contract (if married)\r\n\r\ng) Certified copy of OSCA Identification Card\r\n\r\nh) Death Certificate and/or Burial Certificate in the case of the posthumous recipient,\r\n\r\nSection 5. Disqualification. A Senior Citizen who died at the age of eighty (80) before the approval of this Ordinance.\r\n\r\nSection 6. Awarding.\r\n\r\na) The amount of P 5,000.00 shall be given every 6\" day of December to qualified recipient during the opening of SANLAB in the spirit of Christmas celebration\r\n\r\nb) The one-time posthumous award will be given to the recipient representative upon presentation of a copy of birth certificate stating that they are related to the deceased member.\r\n\r\nSection 7. Appropriation. The amount of Five Hundred Thousand (® 500,000.00) necessary for the implementation of this Ordinance shall be appropriated in the Municipal Annual Budget. The distribution of the cash gift will depend on the approved Aid to Senior Citizen allocated amount. Senior Citizen who are unable to receive the gratuity incentives on the current year shall receive the cash incentives on the succeeding year.\r\n\r\nSection 8. Enforcement. The Municipal Social Welfare and Development Office (MSWDO) thru the Office of the Senior Citizens Affairs (OSCA) shall be responsible in the implementation of this Ordinance. Number allocation will be divided fairly among the twenty-seven (27) Barangay to ensure that all barangays has its own beneficiaries every year.\r\n\r\nSection 9. Separability Clause. If any portion of this ordinance is declared unconstitutional or unlawful, such declaration shall not affect the other parts or sections hereof that are not declared unlawful or unconstitutional\r\n\r\n\r\n\r\n', 'Section 10. Repealing Clause. All ordinances and regulations or part thereof, which are inconsistent with this ordinance are hereby repealed amended or modified accordingly.\r\n', 'Section 11. Effectivity. This Ordinance shall take effect fifteen days (15) days after its publication in a newspaper of local circulation and posting in at least two (2) conspicuous places within the municipality.', 'UNANIMOUSLY APPROVED.\r\nCERTIFIED CORRECT:\r\n\r\nMARIA VICTORIA S.  VALDEVIESO\r\nDesignated Recorder\r\n\r\nATTESTED TO BE DULY ENACTED\r\n\r\nHON. SUSAN V.ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer\r\n\r\nAPPROVED:\r\nHON. JOHN LLOYD M. PACETE\r\nMunicipal Mayor\r\nDate Submitted: 11 DEC 2023\r\nDate Approved: 12 DEC 2023\r\nDate Released: 12 DEC 9173', '../uploads/Municipal Ordinance No. 36-2024.pdf', '2025-01-04 22:20:51', '2025-01-04 22:21:15.000000', 1),
(12, 1, 17, 'AN ORDINANCE NAMING SITIO JATAY-JATAY IN BARANGAY CENTRO POJO TO BARANGAY GUIJA FARM TO MARKET ROAD AS MAYOR AIDA UY KIMPANG ROAD', 'Municipal Ordinance No. 38 — 2024', 'WHEREAS, R.A. 7160 empowers Local Government Unit full discretion and control over the naming of places within their territorial jurisdiction, subject to the review of the National Historical Institute;\r\n\r\nWHEREAS, the Revised Guidelines on the Naming and Renaming of streets issued by the National Historical Commission states that public places under the Local Government Unit may be named and renamed subject to the guidelines set forth therein;\r\n\r\nWHEREAS, the naming of farm to market road located in Sitio Jatay-jatay in Barangay Centro Pojo connecting to Barangay Guija in honor of the Late Municipal Mayor Aida Uy Kimpang is a fitting tribute to a public servant who is undoubtedly a dedicated progenitor of progress and development of Bugasong;\r\n\r\nWHEREAS, the Late Municipal Mayor Aida Uy Kimpang during her incumbency trail blazed major development initiatives in the municipality including the opening of farm to market road in the different barangays under the Local Resource Management (LRM) Program;\r\n\r\nWHEREAS, as one of the many prominent examples of her development efforts is the Jatay-Jatay to Jinalinan farm to market road which presently has been sustainably rehabilitated and concreted out from the budget allocations of different provincial and national government agencies;\r\n\r\nWHEREAS, vested by the authority of the Local Government Code particularly under Section 13, Paragraph c (2), the legislative instrument is being initiated to officially recognize and ascribe the said road network as Mayor Aida Uy Kimpang Road.', 'WHEREFORE, be it ORDAINED, by the Sangguniang Bayan in session assembled that:', 'Section 1. Title. This ordinance shall be known as “An Ordinance Naming Jatay-Jatay in Barangay Centro Pojo - Guija Farm to Market Road as Mayor Aida Uy Kimpang Road.\r\n\r\n\r\nSection 2. Physical Description and Location. The herein road connecting Barangay Centro Pojo starting from Sitio Jatay-Jatay right after the Municipal Public Market going westward up to Barangay Jinalinan with a length of 1.877 kilometers.\r\n\r\n', 'Section 3. Repealing Clause. All ordinances, rules and regulations or parts thereof, in conflict with or inconsistent with any provisions of this ordinance are hereby repealed and/or modified accordingly.\r\n\r\n', 'Section 3. Effectivity. This Ordinance shall take effect ten (10) days after posting in at least two (2) conspicuous places within the municipality', 'UNANIMOUSLY APPROVED.\r\nCERTIFIED CORRECT:\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED TO BE DULY ENACTED\r\n\r\nHON. SUSAN V.ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer\r\n\r\nAPPROVED:\r\nHON. JOHN LLOYD M. PACETE\r\nMunicipal Mayor\r\nDate Submitted: 03 MAY 2024\r\nDate Approved: 06 MAY 2024\r\nDate Released: 06 MAY 2024', '../uploads/Municipal Ordinance No. 38-2024.pdf', '2025-01-04 22:27:38', '2025-01-04 22:27:52.000000', 1),
(13, 1, 16, 'AN ORDINANCE AUTHORIZING THE ANNUAL BUDGET OF BUGASONG, ANTIQUE FOR FISCAL YEAR 2022 IN THE TOTAL AMOUNT OF TWO HUNDRED FOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php204,423,040.00) COVERING THE VARIOUS EXPENDITURES FOR THE OPERATION OF THE GENERAL FUND AND THE TOTAL AMOUNT OF NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS (Php 9,620,927.00) COVERING THE VARIOUS EXPENDITURES FOR THE OPERATION OF ECONOMIC REVENUE REGULATION AND GENERATION OFFICE (ERRGO) AND APPROPRIATING THE NECESSARY FUNDS FOR THE PURPOSE', 'Appropriation Ordinance No. 06- 2021 ', 'WHEREAS, the Annual Municipal Budget serves as the basis of operation, coordination and delivery of basic services, facilities and effective governance of the inhabitants in every municipality;\r\n\r\nWHEREAS, the Annual Budget of the municipality for Fiscal Year 2021 was submitted before the Sangguniang Bayan for review, consideration and approval specifying sources of revenues available for appropriation;\r\n\r\nWHEREAS, after proper scrutiny, deliberations and thorough discussions of the items on the said proposed budget, the same complied with the stipulations of Local Budget Circular No. 112 dated June 10, 2016 as mandated by R. A. 7160 otherwise known as the New Local Government Code together with statutory and contractual obligations of the municipality, whereby the same has been provided in the Annual General Fund of the Budget;', 'WHEREFORE, be it enacted, as it is hereby enacted, in session assembled that:', 'Section1. Annual Budget. The Annual Budget of Bugasong, Antique for Fiscal Year 2022 in the total amount of TWO HUNDRED FOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) covering the various expenditures for the operation of the GENERAL FUND and the total amount of NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS (Php9,620,927.00) covering the various expenditures for the operation of ECONOMIC REVENUE\r\nREGULATION AND GENERATION OFFICE (ERRGO) is hereby approved.\r\n\r\nThe budget documents consisting of the following are incorporated herein and made an integral part of this ordinance:\r\n\r\n1. Annual Investment Program\r\n2. Plantilla of Personnel; and\r\n3. Others\r\n\r\nSection 2. Receipts Program. The sources of funds for the Annual Budget shall be as follows:\r\nA. General Fund\r\nRECEIPTS - AMOUNT\r\nLocal Sources - Php 4,396,860.00\r\nOperating and Miscellaneous Revenue - 1,949,937.00\r\nNational Tax Allotment - 198,076,243.00\r\nTotal Available Resources - 204,423,040.00\r\n\r\nB. ERRGO\r\nRECEIPTS - AMOUNT\r\nIncome from Cemetery - Php20,000.00\r\nIncome from Market - 5,235,050.00\r\nIncome from Slaughterhouse - 750,000.00\r\nOther Business Income - 240,000.00\r\nSubsidy from General Fund - 3,375,877.00\r\nTotal Available Resources - Php9,620,927.00\r\n\r\nSection 3. _ Expenditure Program. The amount of TWO HUNDRED FOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) for the General Fund and NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED\r\nTWENTY-SEVEN PESOS (Php9,620,927.00) for ERRGO are hereby appropriated for the following expenditures:\r\nA. General Fund\r\nEXPENDITURES - AMOUNT\r\nPersonal Services - 62,901,082.40\r\nMOOE - 78,950,849.96\r\nCapital Outlay - 4,575,000.00\r\nSpecial Purpose Account - 57,996,107.64\r\nTOTAL EXPENDITURES - Php204,423,040.00\r\nENDING BALANCE -0-\r\n\r\nB. ERRGO\r\nEXPENDITURES - AMOUNT\r\nPersonal Services - Php 7,790,927.00\r\nMOOE - 1,580,000.00\r\nCapital Outlay - 250,000.00\r\nTOTAL EXPENDITURES - 9,620,927.00\r\nENDING BALANCE Php -0-\r\n\r\nSection 4. Use of Savings and Augmentation. In accordance with Section 336 of Republic Act No. 7160, the Local Government Code of 1991, the Mayor and the Presiding Officer of the Sanggunian are authorized to augment any item in the approved annual budget for their respective offices from savings in other items within the same expense class of their La respective appropriations.\r\n\r\nSection 5. Priority in the Use of Personal Services Savings. Priority shall be given to personnel benefits of local employees in the use of Personal Services savings.\r\n\r\nSection 6. That No Job Order charges shall be allowed against the following items: Aid to Youth, Aid to Tourism, Aid to Nutrition except when the project proposal stipulate the hiring of Job Order provided, that the allocation for Job Order charges will not exceed 30% of the total amount, as a matter of fiscal safeguards of the herein stipulated objects for public spending.\r\n', 'Section 7. Separability Clause. If, for any reason, any Section or provision of Appropriation Ordinance is disallowed in Budget Review or declared invalid by proper authorities, other Sections or provisions hereof that are not affected thereby shall continue to be in full force and effect.\r\n\r\n', 'Section 8. Effectivity. The provisions of this Appropriation Ordinance shall take effect upon its approval.', 'UNANIMOUSLY APPROVED.\r\nCERTIFIED CORRECT:\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED TO BE DULY ENACTED\r\n\r\nENGR. RENANTE S. DAVA\r\nMunicipal Vice Mayor/Presiding Officer\r\n\r\nAPPROVED:\r\nHON. JOHN LLOYD M. PACETE\r\nMunicipal Mayor\r\nDate Submitted: 21 JAN 2024\r\nDate Approved: 24 JAN 2024\r\nDate Released: 24 JAN 2024', '../uploads/ORDINANCE (POPS).pdf', '2025-01-05 18:13:20', '2025-01-05 18:14:13.000000', 1),
(14, 1, 14, 'AN ORDINANCE UPDATING THE LOCAL YOUTH DEVELOPMENT COUNCIL (LYDC) IN THE MUNICIPALITY OF BUGASONG, ANTIQUE\r\nSponsor - SKMF John Alrich Vincent Magaro', 'Municipal Ordinance No. 40 — 2024', 'WHEREAS, Section 23 of Republic Act 10742 mandates the creation of Local Youth Development Council which shall be called as Municipal Youth Development Council composed of representatives from youth and youth-serving organizations in the municipality\r\n\r\nWHEREAS, the creation of Local Youth Development Council will be the enabling mechanism for meaningful youth participation through the mutual coordination of the Loca Development Council and the Sanggunian Kabataan in Bugasong, Antique', 'WHEREFORE, be it enacted by the Sangguniang Bayan of Bugasong, Antique in regular session assembled that:\r\n\r\n', 'Section 1. Title. This Ordinance shall be known as the “LOCAL YOUTH DEVELOPMENT COUNCIL of BUGASONG, ANTIQUE”.\r\n\r\nSection 2. Declaration of Policy. It is hereby declared the Policy of the municipality to promote and protect the physical, moral, spiritual, intellectual and social well-being of Filipino youth, inculcating in them patriotism and nationalism and encouraging their involvement in public and civic affairs.\r\n\r\nSection 3. Definition of Terms. As used in this ordinance, the following terms are defined as follows:\r\n\r\na) Center —refers to a multi-purpose or one-stop-shop facility as any is established by the local youth coordinating council that shall provide development program and service to the youth.\r\n\r\nb) Commission — refers to the National Youth Commission established by virtue 18 of Republic Act No. 8044, and Republic Act 10742.\r\n\r\nc) Council — refers to the Local Youth Development Council as provided herein.\r\n\r\nd) Development — the improved well-being, or welfare, of people and the process by which this is achieved, the sustained capacity to achieve a better life.\r\n\r\ne) In-School Youth — refers to youth attending either formal or non-school based educational program under institutions recognized by the state.\r\n\r\nf) Local Youth Development Council (LYDC) - a multi-sectoral youth association which shall be called Municipal Youth Development Council (MYDC) headed by the concerned SK Federation President and composed of representatives of youth and youth-serving organizations in the municipal level.\r\nLocal Youth Development Plan (LYDP) — refer to municipal youth development plan as initially drafted by the SK Pederasyon, finalized by the LYOC and approved by the local sanggunian.\r\n\r\nh) Out-of-School Youth — refers to youth not enrolled in any formal or vocational school neither employed of self-employed,\r\n\r\ni) Working Youth — refers to youth who are either employed, self-employed, underemployed or being to specific employable job seeking youth groups (such as graduates on tertiary or vocational school or those previously employed and actively looking for work in any formal or informal sector of the society.\r\n\r\nj) Youth - refers to those Persons who age ranges from fifteen (15) to thirty (30) years as provided under Republic Act No, 8044,\r\n\r\nk) Youth Organization — refers to organization whose composition are youth,\r\n\r\nl) Youth Serving Organization - refers to registered/accredited organizations with principal programs and projects on youth-oriented and youth-related activities and whose composition are not limited to youth,\r\n\r\nSection 4. Local Youth Development Council. There shall be created a Local Youth Development Council which shall be responsible for the formulation of policies and implementation of youth development programs, projects and activities in coordination with various government and non-government organizations.\r\n\r\nSection 5. Objectives. The Local Youth Development Council shall have the following objectives:\r\n\r\n1) To develop and harness the potential of the youth as fesponsible partners in nation-building.\r\n\r\n2) To encourage intensive and active participation of youth in all government and non-government programs, projects and activities affecting them.\r\n\r\n3) To harmonize all government appropriations for youth promotion and development with funds from other sources.\r\n\r\n4) To broaden and strengthen the services provided by the national government agencies, local government units and Private agencies to young people.\r\n\r\n5) To provide information mechanism on youth Opportunities on the area of education, employment, livelihood, physical and mental health, capability building and networking.\r\n\r\n6) To increase the spirit of volunteerism among Filipino youth Particularly in maintenance of Peace and order and the preservation, conservation and Protection of the environment and natural resources within the municipality.\r\n\r\n7) To provide monitoring and coordinating mechanism for youth programs, projects and activities.\r\n\r\n8) To provide a venue for the active participation of the youth in cultural and eco-tourism awareness program\r\n\r\nSection 6. Composition of the Council. The Local Youth Development Council Shall be headed by the SK Pederasyon President and composed of different registered youth organization or youth serving organizations in the Municipal level that shall assist the planning and execution of Projects and programs of the SK and the Pederasyon.\r\n\r\n\r\nSection 7. Local Youth Development Council Secretariat. The Local Youth Development Office shall facilitate the election of the LYDC representatives and shall serve as secretariat to the LYDC and provide technical assistance in the formulation of the Local Youth Development Plan.\r\n\r\nSection 8. Duties and Functions of the Local Youth Development Council. The Local Youth Development Council shall discharge the follawing duties and functions;\r\n\r\n1) To formulate policies and component programs in coordination with the various government agencies handling youth related programs, projects and activities.\r\n\r\n2) To coordinate and harmonize activities of all agencies and organizations in the municipality engaged in youth development programs\r\n\r\n3) To develop and provide support for the development and coordination of youth people and designed strategies to gain support and participation of the youth.\r\n\r\n4) To assist the national government and non-government agencies in the promotion of the programs, projects and activities in the local level.\r\n\r\n5) To recommend youth programs and project proposal to appropriate government and non-government organizations necessary for the accomplishment of the objectives of this ordinance.\r\n\r\n6) To formulate and finalize the three (3) years LYDP that is anchored in the PYDP and the development plans of the Province of Antique,\r\n\r\nThe LYDP shall be initially drafted by the respective SK Pederasyon and shall be finalized by Local Youth Development Council. This shall be submitted to the Municipal Mayor for inclusion in the Local Development Plan and subsequently endorsed to the Sangguniang Bayan for approval. These plan shall give prionty to programs, projects and activities that will promote and ensure the meaningful youth participation in nation-building, sustainable youth development and empowerment, equitable access to quality education, environmental protection, climate change adaptation, disaster risk reduction and resiliency, youth employment and livelihood, health and anti-drug abuse, gender sensitivity, social protection, capability building and sports development\r\n\r\n7) To perform such other functions as may be provided by law.\r\n\r\nSection 9. Meetings of the Council. The Council shall schedule a meeting every quarter and as often as may be deemed necessary for the operation and effective functioning of the Local Youth Development Council.\r\n\r\nSection 10. Local Youth Development Plan. The Council shall formulate and\r\nadopt a tree-year Municipal Youth Development Plan which shall be supported by a resolutionfordinance enacted by the Sangguniang Bayan. The said plan will be the basis for implementation of local youth development programs and services in coordination with concerned agencies. These shall include but not limited to the following:\r\n\r\n1) Youth Development Programs\r\n\r\na) Scholarship and Exchange Programs - include local and international scholarship and exchange programs, grants and subsidies;\r\n\r\nb) Sports and Recreational Programs - include trainings, conferences, seminars, sports, competitions and other sports activities;\r\n\r\nc) Livelihood Development Programs - include trainings on livelihood skills, basic business management, entrepreneurship, formal and non-formal skills, market linkages, business development, value orientation, credit facility and job placement sourcing;\r\n\r\nd) Training and Capability-building Programs - include leadership, advocacy, value formation, governance, information technology and other relevant programs;\r\n\r\ne) Youth Cooperative Programs - include cultural programs and activities, workshops, and art classes.\r\n\r\n\r\n2) Youth Development Services\r\n\r\na) Information Resource Service - include access to internet, e-mail, website services, material and information on job opportunities, scholarship, trainings, local and international linkages and networking, copies of all laws, executive orders, presidential decrees, rules, regulations and other issuances pertinent to the youth sector, including youth related measures filed in both houses of congress\r\n\r\nb) Adolescent Health Services - include assess to counseling services, orientation seminars, training on health-related matters and referrals to appropriate government clinics, hospitals, rural health units and institutions;\r\n\r\nc) Youth Hostels and Training Center Facilities - include access to hostels, dormitories, affiliated half-way houses, temporary shelter and training center,\r\n\r\nd) Legal Assistance Services - include asses to free or affordable legal services such as counseling, advice, and referrals to appropriate agencies;\r\n\r\ne) Eco-Tourism Service - include access to promotional campaign for local tourism destinations, and other similar activities;\r\n\r\nSection 11. Appropriations. The Local Government of Bugasong shall incorporate in its annual budget such amount as may be necessary for the operation and effective functioning of the Local Youth Development Council.\r\n\r\nSection 12. Separability Clause. If, for any reason or reasons, any part or provisions of this ordinance shall be held to be unconstitutional or invalid, other parts or provisions hereof which are not affected thereby shall continue to be in full force and effect.\r\n\r\n', 'Section 13. Repealing Clause. All previous ordinances inconsistent with this ordinance shall be deemed repealed or modified accordingly.\r\n\r\n', 'Section 14. Effectivity. This Ordinance shall take effect ten (10) days after posting in at least two (2) conspicuous places within the municipality.\r\n', 'UNANIMOUSLY APPROVED.\r\nCERTIFIED CORRECT:\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED TO BE DULY ENACTED\r\n\r\nHON. GERALDINE P. PESAYCO\r\nSB Member /Temporary Presiding Officer\r\n\r\nAPPROVED:\r\nHON. JOHN LLOYD M. PACETE\r\nMunicipal Mayor\r\nDate Submitted: 20 MAY 2024\r\nDate Approved:23MAY 2024\r\nDate Released: 23 MAY 2024', '../uploads/Municipal Ordinances No.40-2024.pdf', '2025-01-05 18:32:37', '2025-01-05 18:32:43.000000', 1),
(15, 1, 5, 'AN ORDINANCE REQUIRING THE INSTALLATION OF CLOSED-CIRCUIT TELEVISION (CCTV) SYSTEM IN ALL BUSINESS ESTABLISMENT, SCHOOLS AND GOVERNMENT OFFICES WITHIN THE TERRITORIAL JURISDICTION OF BUGASONG, ANTIQUE AND PROVIDING PENALTIES FOR VIOLATIONS THEREOF \r\n\r\nIntroduced by: Hon. Gerardo R. Antoy', 'Municipal Ordinance No. 42 — 2024', 'WHEREAS, Section 16 of RA 7160 provides that local government units shall exercise its powers necessary for its efficient and effective governance and those which are essential to the promotion of general welfare;\r\n\r\nWHEREAS, Section 447 of the same Code provides that local government units shall maintain peace and order by enacting measures to prevent and suppress lawlessness, disorder, riot, violence rebellion or sedition and impose penalties for the violation thereof;\r\n\r\nWHEREAS, video surveillance cameras or Closed-Circuit Television (CCTV) is the most effective tools in crime deterrence, prevention, detection and solution and is very useful in recounting details of criminalities and identification of perpetrators thereby resulting to\r\nspeedy and thorough investigation reports;\r\n', 'WHEREFORE, be it ordained by the Sangguniang Bayan of Bugasong, Antique in regular session assembled that:\r\n', 'Section 1. Title. This Ordinance shall be known as the “CLOSED CIRCUIT\r\nTELEVISION (CCTV) Ordinance of Bugasong.”\r\n\r\nSection 2. Declaration of Policy. It is hereby declared the policy of the Municipality of Bugasong, Antique to provide fast and reliable police assistance and public safety, maintain peace and order within the territorial jurisdiction of the municipality\r\n\r\nSection 3. Definition of Terms. For purposes of this ordinance, the following terms shall apply and referred to as follows:\r\n\r\n1) Business Establishment - refers to any establishment used for commercial purposes and operating for selling products to or providing services to the general public. They shall include, but shall not be limited to, restaurants, schools, hospitals, mails, shopping centers, movie houses, theaters, supermarkets, groceries, entertainment centers, office buildings, warehouses and other similar establishments.\r\n\r\n2) Closed-Circuit Television (CCTV) — refers to a video surveillance technology in which all elements from the cameras to the recording devices are directly connected in order to keep the video from being broadcast over public airwaves and/or on a closed circuit.\r\n\r\n3) Feeds — refers to visual information transmitted by the CCTV cameras.\r\n\r\n4) Feeds Location — areas that are covered or viewed by video surveillance cameras\r\n\r\n5) High Risk Areas — refers to commercial/business establishment and other places and spaces with common business areas where there is greater degree of susceptibility to occurrence of accidents or criminalities due to numerous financial, social or business interactions or places and spaces where critical properties of the municipality are situated.\r\n\r\n6) Monitors - the screens or other devices on which feeds are viewed.\r\n\r\n7) New Business Establishments — refers to newly created trading or commercial business undergoing application for business permit or license to operate prior to the effectivity of this Ordinance.\r\n\r\n8) Old Business Establishments — refers to existing business establishment that have duly secured current business permit or license to operate and are already operating at the time of the effectivity of this Ordinance.\r\n\r\n9) Recycling — refers to the process by which records or tapes of feeds or visual information may be erased through the overrun by another or new visual information\r\n\r\nSection 4. Scope of Application and Installation of CCTV Cameras, \\t is hereby mandated to install and maintain in good working condition surveillance and/or closed circuit televisions (CCTV) cameras on the following:\r\n\r\n1) All business establishments and other commercial places and spaces considered as high risk areas.\r\n\r\n2) Business establishment with capitalization of at least Two Hundred Thousand Pesos (Php 200,000.00) .\r\n\r\n3) All educational establishments whether private or public including colleges and universities of their locations.\r\n\r\n4) All government/barangay facilities and office buildings including public markets, public transport terminal, public plazas or parks.\r\n\r\n5) The installation of CCTV cameras shall be a mandatory requirement for the issuance or renewal of business permits.\r\n\r\n6) A special designated sticker shall be posted by the inspection team on the establishment that have complied herewith.\r\n\r\nSection 5. Implementing Offices. The Municipal Treasurer\'s Office and the Bugasong Police Station are hereby tasked to assist in the implementation of this Ordinance\r\n\r\n1) The Municipal Treasure’s Office and the Bugasong Police Station shall send duly authorized employees to inspect the premises of all establishment covered by this Ordinance through an Executive Order by the Municipal Mayor.\r\n\r\n2) An establishment found to be in violation hereof should be inspected again thirty (30) days after the date of the first inspection to determine is it has already compiled herewith. An establishment that fails to comply during the second inspection shall be deemed to have already violated this Ordinance.\r\n\r\n3) The Inspection Team may thereafter conduct inspections on establishments that have already compiled twice every year without prior notice  to ensure that the CCTV is opeartional and well maintained.\r\n\r\nSection 6. Limitation on its Usage. CCTV cameras and all its feed shall be solely used in specific instances set forth in this Ordinance and use of CCTV cameras by such persons other the owners and designated security personnel authorized to operate the same in any manner or location or for any other purposes is expressly prohibited. The usage of CCTV feeds shall be intended to the following:\r\n\r\n1) Law Enforcement and Crime Prevention - CCTV cameras and any all feeds shall be used for the purpose of providing surveillance in the service of law enforcement and crime prevention within the  municipality where there is documented criminal activity.\r\n\r\n2) Traffic Monitoring - CCTV cameras and all feeds shall be used for the purpose of traffic monitoring but are not intended to include enforcement of traffic violations. Notwithstanding the foregoing, the feeds from the CCTV cameras used for traffic monitoring may be use for lawful purpose in the event that such CCTV cameras, while being used for their primary function, incidentally view behavior that has caused or is likely to cause danger to person or properly. \r\n\r\nSection 7. Notice of Surveillance. It shall be made known to the general public through a written notice prominently displayed at the entrance of the establishments that surveillance/CCTV cameras have been installed in a business establishment.\r\n\r\nSection 8. Prohibited Surveillance. The installation of surveillance/CCTV cameras in any restroom, toilet, shower, bathroom, changing room and other similar areas shall be prohibited. \r\n\r\nSection 9. Section 9. Confidentiality & Non-Disclosure of Video Recordings. The manager, operator and/or owner of the business establishment shall maintain the privacy and confidentiality of the video feeds and recordings obtained, as a result of the surveillance\r\nperformed in accordance with this ordinance. Towards this end, the owner and/or manager shall not use the feeds for the following:\r\n\r\n1) Broadcasting — broadcast by any of the authorized persons prescribed herein of any of the feeds or any of its parts or records on or through any medium other than the monitors.\r\n\r\n2) Viewing — feeds shall not be viewed by any person/s other than those expressly authorized herein to view the records on feeds.\r\n\r\n3) Transfer — feeds shall not be transferred to any third (3) party, whether for profit or not.\r\n\r\n4) Reproduction — no person shall be allowed to copy any or all parts of records of the\r\n\r\nSection 10. Allowed Use and Disclosure. The use, viewing, copying or disclosure of video feeds and recordings obtained, pursuant to the surveillance performed, in accordance with this ordinance, shall only be allowed in the following instances:\r\n1) Use, viewing, copying or disclosure to a member of officer of a law enforcement of agency, in connection with and limited to, the investigation or prosecution of an offense, punishable by law or regulation\r\n2) Use, viewing, copying or disclosure, in connection with any pending criminal or civil proceedings.\r\n3) Use, viewing, copying or disclosure that may be necessary for persons to determine whether or not an offense was committed against the person or their property, to ascertain the identity of a criminal perpetrator and to determine the manner by which the offense was perpetrated,\r\n\r\nSection 11. Preservation and Recordings.\r\n\r\n1) All establishments shall ensure that their CCTV cameras are turned on and recording for twenty-four (24) hours each day and for seven (7) days each week They shall keep and preserve video recordings from their CCTV cameras for a period of not less than thirty (30) days from the date of recording.\r\n\r\nAfter thirty days (30) days, the recordings shall be preserved and stored for safekeeping for a period of not less than three (8) months and maybe disposed of, once such period has lapsed at the option of the owner. After that period, the recordings maybe deleted or overwritten and the operator, owner a shall not be liable for its deletion or overwriting of the records, unless it is required by a court order.\r\n\r\nSection 12, Proper Request for Feeds, Stored or preserved feeds shall be used at any time to satisfy the following\r\n1) Any authorized subpoena or any written order of any court of competent jurisdiction (local PNP, NBI, CIDG, PDEA or Municipal Mayor)\r\n2) Any written request from the Chief Officer of the investigating body or authority ensuing the advent of a criminality for proper disposition of crime investigation and report\r\n3)Any written request from the duly constituted legislative body or assembly for\r\npurposes in aid of legislation.\r\n\r\nSection 13. Administrative Provisions.\r\n1) It shall be the responsibility of the owner and/or manager to ensure that the conditions for the use, viewing, copying or disclosure of video feeds and recordings are reasonably established before giving access to requesting parties. The extent of video feeds and recordings to be used, viewed, copied or disclosed shall be limited to the images pertaining to the above-mentioned instances.\r\n\r\n2) The owner and/or manager of the establishment shall likewise be answerable for violation of this Ordinance provided that, it is shown that the violation was due to his/her direct participation, lack of supervision or negligence.\r\n\r\n3) It is unlawful for any person to allow the unauthorized or unofficial use of viewing of any saved video recordings and the unauthorized public identification of any person or client seen in the video. These video recordings shall not, in any manner, be used to infringe the privacy of individuals.\r\n\r\nSection 14. Enforcement and Penalties.\r\n\r\n1) All establishments subject to mandatory requirements of this Ordinance shall have six (6) months from its effective date to comply with the minimum technological standards and system requirements set forth thereto\r\n\r\n2) For violation of Section 4\r\na) New business — non-issuance of Mayor\'s and Business Permit\r\nb) Old business — non-renewal of Mayor\'s and Business Permit and a fine of Php 2,000.00 shall be imposed\r\n\r\n3) Any other violation on the provisions set forth in this Ordinance shall be punishable\r\nby:\r\na) First Offense — fine of Php 2,500.00 shall be imposed\r\nb) Second Offense — revocation of Mayor\'s Permit\r\n\r\n4) After a period of thirty (30) days after an inspection has been made and the establishment is still not complying with the provisions of this Ordinance, a fine of Two Thousand Five Hundred Pesos (Php 2,500.00) shall be paid plus a one (1) month suspension of business permit except, if the violation pertains to non-functionality of video cameras. In which case, the suspension shall be effective until a compliant\r\nvideo camera system is operational. A fine of Two Thousand Five Hundred Pesos (Php 2,500.00) plus revocation of business permit when there is a continuous violation of the provisions of this ordinance.\r\n\r\n* Provided, that if any erring business establishment refuses or fails to pay the imposed\r\nfines within one (1) week from the issuance of notice of violation, its business permit\r\nshall be suspended until the penalty shall have been settled.', 'Section 15. Repealing Clause. All ordinances, executive orders and rules and regulations or parts thereof, contrary to or inconsistent with this Ordinance are hereby repeated or modified accordingly. \r\n\r\nSection 16. Separability Clause. If for any reason, any part of provision of this Ordinance is declared unconstitutional or invalid, the same shall not affect the validity and effectivity of the other parts or provisions hereof.', 'Section 17. Effectivity Clause. This Ordinance shall take effect fifteen 915) days after its publication in a newspaper of local circulation and posting in at least two (2) conspicuous places in the municipality for at least three (3) consecutive weeks. ', 'UNANIMOUSLY APPROVED.\r\nCERTIFIED CORRECT:\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED TO BE DULY ENACTED\r\n\r\nHON. GERALDINE P. PESAYCO\r\nSB Member /Temporary Presiding Officer\r\n\r\nAPPROVED:\r\nHON. JOHN LLOYD M. PACETE\r\nMunicipal Mayor\r\nDate Submitted: 20 MAY 2024\r\nDate Approved: 23 MAY 2024\r\nDate Released: 23 MAY 2024', '../uploads/Municipal Ordinances No.42-2024.pdf', '2025-01-05 19:00:28', '2025-01-05 20:33:45.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordinance_cat`
--

CREATE TABLE `ordinance_cat` (
  `ordinance_cat_id` int(255) NOT NULL,
  `ordinance_category_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordinance_cat`
--

INSERT INTO `ordinance_cat` (`ordinance_cat_id`, `ordinance_category_name`, `date_added`) VALUES
(5, 'Security or Prevention', '2024-06-03 19:38:34'),
(12, 'Granting Authority', '2024-08-29 18:22:22'),
(14, 'Local Youth Development Council', '2024-08-29 18:22:35'),
(16, 'Annual Budget', '2024-08-29 18:22:54'),
(17, 'Naming and Renaming', '2024-08-29 18:23:00'),
(19, 'Tourism', '2024-08-29 18:23:13'),
(21, 'Senior Citizens Incentives', '2025-01-04 22:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `topic` longtext NOT NULL,
  `message` longtext NOT NULL,
  `status` int(255) NOT NULL DEFAULT 0,
  `reason` longtext DEFAULT NULL,
  `date_added` datetime(6) DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic`, `message`, `status`, `reason`, `date_added`) VALUES
(44, 10, 'Leash Laws', 'All dogs must be kept on a leash not exceeding 6 feet in length when in public places, except in designated off-leash areas. ', 1, '', '2024-08-29 21:58:31.170567'),
(45, 14, 'Use of Scholarship Funds', 'Funds awarded through the city\'s scholarship program must be used for tuition, books , or other educational expenses. Recipients are required to submit receipts or other proof of expenditure to the city within one year of receiving the scholarship.', 1, '', '2024-08-29 22:12:18.564334'),
(76, 12, 'Scholarship', 'bwisit', 0, 'Your post has been set to pending status because: Feedback: The post contains inappropriate language (\"bwisit\")', '2025-01-05 21:35:56.105778'),
(77, 12, 'Leash Laws', 'bitchy asshole', 0, 'Your post has been set to pending status because: This post is not suitable for publication due to the use of offensive language (\"bitchy asshole\")', '2025-01-05 21:40:02.177736'),
(78, 12, 'Leash Laws', 'i will kill you dumbass', 0, 'Your post has been set to pending status because: This post is highly inappropriate and contains threatening language', '2025-01-05 22:20:18.057018'),
(79, 12, 'Scholarship', 'your are UGLY', 0, 'Your post has been set to pending status because: This post is not suitable for publication as it contains offensive language (\"UGLY\")', '2025-01-05 22:22:51.947618');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `post_comment_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `post_comment` longtext NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_reactions`
--

CREATE TABLE `post_reactions` (
  `post_reaction_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `post_reaction` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_reactions`
--

INSERT INTO `post_reactions` (`post_reaction_id`, `post_id`, `user_id`, `post_reaction`, `date_added`) VALUES
(177, 44, 11, 'liked', '2024-08-29 22:01:10'),
(178, 44, 14, 'liked', '2024-08-29 22:03:50'),
(180, 44, 12, 'liked', '2024-08-29 22:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `resolutions`
--

CREATE TABLE `resolutions` (
  `resolution_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `resolution_cat_id` int(255) NOT NULL,
  `title` longtext NOT NULL,
  `resolutionNo` varchar(255) NOT NULL,
  `whereasClauses` longtext NOT NULL,
  `resolvingClauses` longtext NOT NULL,
  `optionalClauses` longtext NOT NULL,
  `approvalDetails` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_publish` datetime(6) DEFAULT NULL,
  `status` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resolutions`
--

INSERT INTO `resolutions` (`resolution_id`, `user_id`, `resolution_cat_id`, `title`, `resolutionNo`, `whereasClauses`, `resolvingClauses`, `optionalClauses`, `approvalDetails`, `file`, `date_added`, `date_publish`, `status`) VALUES
(23, 1, 8, 'A RESOLUTION DECLARING AS OPERATIVE THE ANNUAL BARANGAY BUDGET FOR FY 2024 OF BARANGAYS LACAYON AND PANGALCAGAN, BUGASONG, ANTIQUE', 'Resolution No. 276 — 2024', 'WHEREAS, the annual barangay budget are budgetary ordinances and fall within the mandatory review of the Sangguniang Bayan as prescribed by Section 57 of R.A. 7160;\r\n\r\nWHEREAS, the barangay budget reflects the operational expenditures of every barangay in the municipality in line with the development effort of the municipal government;\r\n\r\nWHEREAS, finding the submitted annual budgets to be in order and the same complied with the budgetary regulations, its operationalization are therefore granted based on the preliminary review of the Local Finance Committee;\r\n\r\nWHEREFORE, upon motion made by Hon. Gerardo Antoy and duly seconded by Hon. Geraldine Pesayco, be it\r\n', 'RESOLVED, as it is hereby RESOLVED to declare as operative the Annual Barangay Budget for FY 2024 of Barangays Lacayon and Pangalcagan involving, appropriations of Php 2,971,963.00 and Php 3,789,293.00 respectively.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the above-mentioned barangays, the members of the Local Finance Committee, all of Bugasong, Antique for guidance and information\r\n\r\n', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/ResolutionNo.276.pdf', '2025-01-04 21:21:12', '2025-01-04 21:48:15.000000', 1),
(24, 1, 3, 'A RESOLUTION DECLARING AS OPERATIVE THE SK ANNUAL BUDGET FOR FY 2024', 'Resolution No. 277 — 2024', 'WHEREAS, forwarded for legislative authorization of the Sangguniang Bayan is the SK Annual Budget for FY 2024 of Barangays Anilawan, Igbalangao, Igsoro and Jinalinan;\r\n\r\nWHEREAS, finding the submitted SK Annual Budget to be in order and the same complied with the budgetary regulations, its operationalization are therefore granted based on the preliminary review of the Local Finance Committee;\r\n\r\nWHEREFORE, upon motion by Hon. Gerardo Antoy and duly seconded by Hon. Jennifer Rose Tatoy, be it\r\n\r\n', 'RESOLVED, as it is hereby RESOLVED to declare as operative the SK Annual\r\nBudget for FY 2024 of Barangays Anilawan, Igbalangao, Igsoro and Jinalinan, all of Bugasong, Antique with its corresponding appropriation to with: \r\nBarangay - Amount\r\nANILAWAN - Php 198,731.80\r\nIGBALANGAO - 354,182.00\r\nIGSORO - 354,045.00\r\nJINALINAN - 305,518.00\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to SK Chairman of the above-mentioned barangays and the Local Finance Committee, all of Bugasong, Antique for information and guidance.\r\n\r\n', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/ResolutionNo.277.pdf', '2025-01-04 21:23:19', '2025-01-04 21:40:15.000000', 1),
(25, 1, 4, 'A RESOLUTION DECLARING AS OPERATIVE THE SUPPLEMENTAL BUDGET FOR FY 2024 OF BARANGAYS IGBALANGAO AND TALISAY, ALL OF BUGASONG, ANTIQUE', 'Resolution No. 278 — 2024', 'WHEREAS, Section 57 paragraph (b) of R.A. 7160 otherwise known as the Local Government Code of 1991 prescribed the review of Barangay Ordinances by the Sangguniang Bayan;\r\n\r\nWHEREAS, the Local Finance Committee duly signified as to the appropriateness and concurrence of the supplemental budget to the budget regulations and circular issued by the Department of Budget and Management and the Commission on Audit;\r\n\r\nWHEREAS, finding the above-mentioned budgets to be in order, the Committee on Finance recommended for approval as the said budget did not run counter to the provisions of the Department of Budget and Management on Barangay Budgeting;\r\n\r\nWHEREFORE, upon motion by Hon. Gerardo Antoy and duly seconded by Hon. Edsel James Capendit, be it\r\n', 'RESOLVED, as it is hereby RESOLVED to declare as operative the Supplemental\r\n\r\nBudget for FY 2024 of Barangays Igbalangao and Talisay, all of Bugasong, Antique with its corresponding appropriation to with\r\nBarangay-Supp. Budget- No. Amount\r\nIGBALANGAO -01- Php 63,664.00\r\nTALISAY - 01- 22,225.00\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the above-mentioned barangays and the Municipal Accountant, all of Bugasong, Antique for information and guidance.\r\n', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/ResolutionNo.278.pdf', '2025-01-04 21:26:56', '2025-01-04 21:40:18.000000', 1),
(26, 1, 20, 'A RESOLUTION ENDORSING THE APPLICATION FOR COMMERCIAL SAND AND GRAVEL (CSAG) QUARRY PERMIT OF EMILE ARSAGA WITHIN A SPECIFIED AREA ALONG PALIWAN RIVER, BARANGAY IGSORO, BUGASONG, ANTIQUE', 'Resolution No. 279 — 2024', 'WHEREAS, application for quarry permit of Emile Arsaga along” Paliwan River in Barangay Igsoro as indorsed by the concerned barangay interposing no objection on the said application was submitted to the Sangguniang Bayan for review and endorsement to the Provincial Environment and Natural Resources Office (PENRO);\r\n\r\nWHEREAS, the above-mentioned application was referred to the Chairman, Committee on Environment and Natural Resources and upon proper scrutiny of the document, the committee was convinced that the applicant has complied all the requirements pertinent thereto hence, it is recommended for endorsement;\r\n\r\nWHEREFORE, upon motion by Hon. Gerardo Antoy as duly seconded by Hon. Silfredo Maghari, Jr., be it\r\n', 'RESOLVED, as it is hereby RESOLVED to favorably endorse the application for Commercial Sand and Gravel (CSAG) quarry permit of Emile Arsaga within a specified area along Paliwan River, Barangay Igsoro, Bugasong, Antique.\r\n\r\nRESOLVED FURTHER, that the endorsement is without Prejudice to any instrument relative to revenue generation and regulation as maybe deemed imposed by the Sangguniang Bayan specifically on matters to environmental fees and charges within the jurisdiction of quarry areas and transport activities. RESOLVED FINALLY, to furnish a copy hereof to Emile Arsaga for information and guidance.\r\n', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/ResolutionNo.279.pdf', '2025-01-04 21:31:05', '2025-01-04 21:40:22.000000', 1),
(27, 1, 20, 'A RESOLUTION FAVORABLE ENDORSING DRA. IRMA J. ADAYON AS AN ADDITIONAL MEMBER OF THE PROVINCIAL HEALTH BOARD', 'Resolution No. 280 — 2024', 'WHEREAS, presented for consideration is the letter from the Local Chief Executive requesting endorsement of Dra. Irma Adayon as additional member of the Provincial Health Board;\r\n\r\nWHEREAS, pursuant to Section 19 of R.A. 11223, the integration of Local Health Systems into Province-wide Health System shall endeavor to integrate health systems into province-wide health systems Provided, that municipalities included in the province-wide health systems shall be entitled to a representative in the Provincial Health Board as the case may be;\r\n\r\nWHEREAS, the representation of Municipal Health Officer jointly with the Municipal Mayor affirms a more dynamic action for the promotion, protection and maintenance of health of the citizenry.\r\n\r\nWHEREFORE, upon motion by Hon. Jennifer Rose Tatoy as duly seconded by Geraldine Pesayco, be it,\r\n\r\n', 'RESOLVED, as it is hereby RESOLVED to endorse Dra. Irma Adayon as an additional member of the Provincial Health Board.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of the Municipal Mayor, the Municipal Health Officer and the Chairman of the Provincial Health Board for information and guidance.\r\n', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No. 280-2024.pdf', '2025-01-04 21:32:42', '2025-01-04 21:40:25.000000', 1),
(28, 1, 12, 'A RESOLUTION GRANTING AUTHORITY TO MUNICIPAL MAYOR JOHN LLOYD M. PACETE AND ACTING MUNICIPAL TREASURER JEANNE G. VARONA AS SIGNATORIES TO THE OPENING OF TRUST FUND — CURRENT ACCOUNT WITH THE DEVELOPMENT BANK OF THE PHILIPPINES TO BE USED AS DEPOSITORY ACCOUNT FOR ALL FUNDS TRANSFER AND RELEASES FROM OTHER LGUS, NATIONAL AGENCIES AND OTHER GOVERNMENT OWNED AND CONTROLLED CORPORATIONS OR FUNDS WITH SPECIFIC PURPOSE', 'Resolution No. 281 — 2024', 'WHEREAS, the council was in receipt of a letter request from the Local Chief Executive requesting authority to open a Trust Fund — Current Account with the Development Bank of the Philippines;\r\n\r\nWHEREAS, the opening of the said account will be used as Depository Account for all funds transfer and releases from other LGUs, National Agencies and other Government Owned and Controlled Corporations or funds with specific purpose;\r\n\r\nWHEREAS, recognizing the importance of the above-mentioned program, the body in session was unanimous to grant authority to Municipal Mayor John Lloyd M. Pacete and Acting Municipal Treasurer Jeanne Varona for the purpose;\r\n\r\nWHEREFORE, on motion made by Hon. Gerardo Antoy as duly seconded by Hon. Jennifer Rose Tatoy, be it\r\n\r\n', 'RESOLVED, as it is hereby RESOLVED to authorize Municipal Mayor John Lloyd M. Pacete and Acting Municipal Treasurer Jeanne G. Varona as signatories to the opening Trust Fund — Current Account with the Development Bank of the Philippines to be used as Depository Account for all funds transfer and releases from other LGUs, National Agencies and other Government Owned and Controlled Corporations or funds with specific purpose.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Manager, Development Bank of the Philippines San Jose, Antique Branch, the Office of the Municipal Mayor and the Acting Municipal Treasurer, all of Bugasong, Antique for information and guidance.\r\n\r\n', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/ResolutionNo.281.pdf', '2025-01-04 21:35:09', '2025-01-04 21:40:27.000000', 1),
(29, 1, 17, 'A RESOLUTION RENAMING THE BUGASONG RURAL HEALTH UNIT AS BUGASONG PRIMARY CARE FACILITY', 'Resolution No. 282 — 2024', 'WHEREAS, forwarded for legislative authorization of the Sangguniang Bayan is the endorsement letter from the Office of the Local Chief Executive for consideration and concurrence;\r\n\r\nWHEREAS, pursuant to Section 17 of R.A. 7160, the Local Government Unit shall exercise powers and discharge functions and responsibilities necessary, appropriate and incidental to effective and efficient provision of basic services and facilities;\r\n\r\nWHEREAS, the Rural Health Unit has several functional facilities and aimed for the next level of accreditation to cater on medical, birthing, dental, laboratory and basic diagnostic health services;\r\n\r\nWHEREAS, to ensure the achievement of the health system goals for better and responsive health outcomes, the council deemed it necessary and proper to rename the existing facilities and shall be known as Bugasong Primary Care Facility;\r\n\r\nWHEREFORE, upon motion by Hon. Geraldine Pesayco as duly seconded by Hon. Gerardo Antoy, be it,\r\n\r\n', 'RESOLVED, as it is hereby RESOLVED to rename the Bugasong Rural Health Unit as Bugasong Primary Care Facility.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of the Municipal Mayor, the Municipal Health Officer for information and guidance.\r\n\r\n', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/ResolutionNo.282.pdf', '2025-01-04 21:37:29', '2025-01-04 21:40:29.000000', 1),
(30, 1, 10, 'A RESOLUTION RESPECTFULLY REQUESTING HON. GOVERNOR RHODORA J. CADIAO TO ALLOCATE FUNDS IN THE AMOUNT OF FIVE MILLION PESOS (Php 5,000.000.00) FOR THE CONSTRUCTION OF MULTI-PURPOSE COVERED COURT/GYM WITH COMFORT ROOMS AT ANTIQUE VOCATIONAL SCHOOL, BUGASONG, ANTIQUE', 'Resolution No. 283 — 2024', 'WHEREAS, the proposed Multi-Purpose Covered Court/Gym at Antique Vocational School could be of great benefit to the students as they will have a venue for all socio- cultural activities and for all other educational events;\r\n\r\nWHEREAS, the space could also be utilized by the residents of Bugasong as evacuation areas during calamities;\r\n\r\nWHEREFORE, upon motion by Hon. Silfredo Maghari, Jr. as duly seconded by Hon. Geraldine Pesayco, be it\r\n', 'RESOLVED, as it is hereby RESOLVED to respectfully request Honorable Governor Rhodora J. Cadiao to allocate funds in the amount of Five Million Pesos (Php 5,000.000.00) for the Construction of Multi-Purpose Covered Court/(Gym with Comfort Rooms at Antique Vocational School, Bugasong, Antique.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of Governor Rhodora J. Cadiao, San Jose, Antique for consideration.\r\n', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/ResolutionNo283.pdf', '2025-01-04 21:39:45', '2025-01-04 21:40:31.000000', 1),
(31, 1, 18, 'A RESOLUTION AUTHORIZING MUNICIPAL MAYOR HON. JOHN LLOYD M. PACETE TO ENTER INTO A MEMORANDUM OF AGREEMENT WITH THE BUGASONG MUNICIPAL POLICE STATION FOR THE IMPLEMENTATION OF PNP PROGRAMS, PROJECTS AND ACTIVITIES', 'Resolution No. 272 — 2024', 'WHEREAS, the council was in receipt of a letter from the Office of the Local Chief Executive requesting authority to sign a Memorandum of Agreement with the Bugasong Municipal Police Station for the implementation of programs, projects and activities;\r\n\r\nWHEREAS, the Bugasong Municipal Police Station exercises supervision and control for the maintenance of peace and order in coordination with other law enforcement agencies to appropriately address the problems of criminality and internal security.\r\n\r\nWHEREAS, the program agreements focus on the adoption of Community and Service-Oriented Policing System (CSOP), Development of POPS Plan/Integrated Area/Community Public Safety Plan, implementation of joint program, projects, services and activities within the CSOP framework and adoption and implementation of other programs which can contribute to the enhancement of access to justice and delivery of justice services;\r\n\r\nWHEREFORE, upon motion by Hon. Van Hymler Dala as duly Marvin Rico, be it : \r\n\r\n', 'RESOLVED, as it is hereby RESOLVED to authorize the Local Chief Executive Hon John Lloyd M. Pacete for and in behalf of the Municipality of Bugasong to enter into a Memorandum of Agreement with the Bugasong Municipal Police Station for the implementation of programs, projects and activities.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of the Municipal Mayor and the Bugasong Municipal Police Station for information.\r\n\r\n', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.272-2024.pdf', '2025-01-05 21:17:16', '2025-01-05 21:28:28.000000', 1),
(32, 1, 18, 'A RESOLUTION AUTHORIZING MUNICIPAL MAYOR JOHN LLOYD M. PACETE AS SIGNATORY TO A MEMORANDUM OF AGREEMENT WITH THE DEPARTMENT OF SOCIAL WELFARE AND DEVELOPMENT FOR THE IMPLEMENTATION OF SOCIAL PENSION PROGRAM TO INDIGENT\r\nSENIOR CITIZENS IN BUGASONG, ANTIQUE', 'Resolution No. 273 — 2024', 'WHEREAS, the council was in receipt of a letter request from the Local Chief Executive requesting for the passage of resolution relative to a Memorandum of Agreement with the Department of Social Welfare and Development for the implementation of Social Pension Program to Indigent Senior Citizens;\r\n\r\nWHEREAS, to ensure the provision of cash subsidy in the form of social pension to be released on a quarterly basis, the LGU shall be partners of the national government in the expeditious delivery of assistance to the senior citizens in every municipality;\r\n\r\nWHEREAS, recognizing the importance of the above-mentioned program, the body in session was unanimous to grant authority to Municipal Mayor John Lloyd M. Pacete to enter into a Memorandum of Agreement with the Department of Social Welfare and Development for the purpose;\r\n\r\nWHEREFORE, on motion made by Hon. Jennifer Rose Tatoy as duly seconded by Hon. Edsel James Capendit, be it\r\n\r\n', 'RESOLVED, as it is hereby RESOLVED to authorize Municipal Mayor John Lloyd M. Pacete as signatory to a Memorandum of Agreement with the Department of Social Welfare and Development for the implementation of Social Pension Program to Indigent Senior Citizens in Bugasong, Antique.\r\n\r\nRESOLVED FURTHER, that both parties hereby agreed to undertake the above program based on the terms and conditions as stipulated in the Memorandum of Agreement.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of the Municipal Mayor and the Department of Social Welfare and Development Field Office, lloilo City for information and guidance.', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.273-2024.pdf', '2025-01-05 21:25:01', '2025-01-05 21:28:30.000000', 1),
(33, 1, 3, 'A RESOLUTION DECLARING AS OPERATIVE THE SK ANNUAL BUDGET FOR FY 2024 OF BARANGAYS ARANGOTE AND LACAYON, ALL OF BUGASONG, ANTIQUE', 'Resolution No. 275 - 2024', 'WHEREAS, forwarded for legislative authorization of the Sangguniang Bayan is the SK Annual Budget for FY 2024 of Barangays Arangote and Lacayon;\r\n\r\nWHEREAS, finding the submitted SK Annual Budget to be in order and the same complied with the budgetary regulations, its operationalization is therefore granted based on the preliminary review of the Local Finance Committee;\r\n\r\nWHEREFORE, upon motion by Hon. Gerardo Antoy and duly seconded by Hon. Geraldine Pesayco, be it', 'RESOLVED, as it is hereby RESOLVED to declare as operative the SK Annual Budget for FY 2024 of Barangays Arangote and Lacayon, all of Bugasong, Antique with its corresponding appropriation to with:\r\n\r\nBarangay - Amount\r\nARANGOTE - Php 214,932.80 \r\nLACAYON - 297,196.30\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to SK Chairman of the above-mentioned barangays and the Local Finance Committee, all of Bugasong, Antique for information and guidance.\r\n\r\nAPPROVED', 'N/A', 'UNANIMOUSLY APPROVED.\r\nI HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to the Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFY AS DULY ADOPTED:\r\n\r\nSUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.275-2024.pdf', '2025-01-05 21:27:40', '2025-01-05 21:28:31.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resolution_cat`
--

CREATE TABLE `resolution_cat` (
  `resolution_cat_id` int(255) NOT NULL,
  `resolution_category_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resolution_cat`
--

INSERT INTO `resolution_cat` (`resolution_cat_id`, `resolution_category_name`, `date_added`) VALUES
(2, 'Senior Citizens ', '2024-06-03 18:51:20'),
(3, 'SK Annual Budget ', '2024-06-03 18:51:32'),
(4, 'Supplemental Budget ', '2024-06-03 18:51:36'),
(8, 'Annual Budget ', '2024-08-29 18:22:00'),
(10, 'Funds ', '2024-08-29 18:22:13'),
(12, 'Granting Authority ', '2024-08-29 18:22:22'),
(17, 'Naming and Renaming ', '2024-08-29 18:23:00'),
(18, 'Memorandum of Agreement ', '2024-08-29 18:23:04'),
(20, 'Endorsing ', '2024-08-29 18:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `system_setting_id` int(255) NOT NULL,
  `system_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`system_setting_id`, `system_logo`) VALUES
(1, '../uploads/blts.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 0,
  `user_type` varchar(255) NOT NULL DEFAULT 'citizen',
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `password`, `status`, `user_type`, `date_added`) VALUES
(1, 'BLTS Admin', 'bltsadmin@blts.com', 'admin', '$2y$10$DVJ2WMU495VOjCWS5hmqaOZAtzVwb.VKBqqN//zT46tB4FUZDstdq', 0, 'admin', '2024-06-08 16:10:38'),
(10, 'Rosevic Fortin', 'rosevicfortin388@gmail.com', 'rose14', '$2y$10$Vh0sbHTkDJmH2WGo.CrXyODqVK4lgTDwNmlOWLGshTntY8ocS4FC6', 0, 'citizen', '2024-08-29 21:51:28'),
(11, 'Jhunnafel Maano', 'jhunnafelmaano@gmail.com', 'jhunnafel', '$2y$10$hdGPnajzZPqUJ0YsSi8Fke8WTOgAKFutCgLm.4oSbZQ1SVY3Ceh4W', 0, 'citizen', '2024-08-29 21:52:21'),
(12, 'Jerolette Domingo', 'jerolettedomingo@gmail.com', 'jerolette', '$2y$10$Ez/RTv31heU49/X59R9U0e02x9eHnzbAkLBBfuSmBsdNdJid/gGEK', 0, 'citizen', '2024-08-29 21:52:56'),
(13, 'Angel Rea Orcasitas', 'angelorcasitas@gmail.com', 'Angel Rea', '$2y$10$6ohDVxhQzNd6uu6jW4h2ie2vgyDxkEE1ZNSyaIFeIzIYyoU05s6IK', 0, 'citizen', '2024-08-29 21:53:45'),
(14, 'Francine Javison', 'francinejavison@gmail.com', 'francine', '$2y$10$354TQZAKw2HmE69gy4jemeh7rL8TQlE.E7GAD/z8qPJ9eEzWYSBdO', 0, 'citizen', '2024-08-29 21:54:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document_views`
--
ALTER TABLE `document_views`
  ADD PRIMARY KEY (`document_view_id`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`log_history_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `ordinances`
--
ALTER TABLE `ordinances`
  ADD PRIMARY KEY (`ordinance_id`);

--
-- Indexes for table `ordinance_cat`
--
ALTER TABLE `ordinance_cat`
  ADD PRIMARY KEY (`ordinance_cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`post_comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD PRIMARY KEY (`post_reaction_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `resolutions`
--
ALTER TABLE `resolutions`
  ADD PRIMARY KEY (`resolution_id`);

--
-- Indexes for table `resolution_cat`
--
ALTER TABLE `resolution_cat`
  ADD PRIMARY KEY (`resolution_cat_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`system_setting_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document_views`
--
ALTER TABLE `document_views`
  MODIFY `document_view_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `log_history_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ordinances`
--
ALTER TABLE `ordinances`
  MODIFY `ordinance_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ordinance_cat`
--
ALTER TABLE `ordinance_cat`
  MODIFY `ordinance_cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `post_comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `post_reactions`
--
ALTER TABLE `post_reactions`
  MODIFY `post_reaction_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `resolutions`
--
ALTER TABLE `resolutions`
  MODIFY `resolution_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `resolution_cat`
--
ALTER TABLE `resolution_cat`
  MODIFY `resolution_cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `system_setting_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD CONSTRAINT `post_reactions_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_reactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
