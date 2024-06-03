-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 03:19 PM
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
-- Database: `blts`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `topic` longtext NOT NULL,
  `message` longtext NOT NULL,
  `date_added` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic`, `message`, `date_added`) VALUES
(3, 5, 'Mollitia molestiae s', 'Pariatur Et recusan', '2024-05-28 19:43:48.126449'),
(4, 5, 'Voluptas aute molest', 'Consectetur quam nos', '2024-05-28 19:51:07.296005'),
(5, 5, 'Provident dignissim', 'Veritatis ut laudant', '2024-05-28 19:51:14.945918'),
(6, 6, 'Id nisi laboriosam ', 'Blanditiis facere se', '2024-05-28 21:23:12.302401'),
(7, 6, 'Eiusmod accusantium ', 'Nisi doloribus quo l', '2024-05-28 21:23:17.102569'),
(8, 6, 'Dolores dolor quidem', 'Velit hic qui et qui', '2024-05-28 21:44:15.764784'),
(9, 6, 'Cum in ipsam tempori', 'Ipsam dolores conseq', '2024-05-28 21:44:18.766810'),
(10, 6, 'Mollit a sit exceptu', 'Cumque quia voluptas', '2024-05-28 21:44:21.446784'),
(11, 6, 'Temporibus veniam a', 'Excepteur autem dese', '2024-05-28 21:44:24.298344'),
(12, 6, 'Cum molestiae suscip', 'Fugiat aliqua Simil', '2024-05-28 21:44:32.931344'),
(13, 6, 'Exercitationem ducim', 'Nostrud neque conseq', '2024-05-28 21:44:35.732554'),
(14, 6, 'Enim reprehenderit ', 'Nam et eius tenetur ', '2024-05-28 21:44:50.899885');

-- --------------------------------------------------------

--
-- Table structure for table `resolutions`
--

CREATE TABLE `resolutions` (
  `resolution_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `tag_id` int(255) NOT NULL,
  `title` longtext NOT NULL,
  `resolutionNo` varchar(255) NOT NULL,
  `whereasClauses` longtext NOT NULL,
  `resolvingClauses` longtext NOT NULL,
  `optionalClauses` longtext NOT NULL,
  `approvalDetails` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resolutions`
--

INSERT INTO `resolutions` (`resolution_id`, `user_id`, `tag_id`, `title`, `resolutionNo`, `whereasClauses`, `resolvingClauses`, `optionalClauses`, `approvalDetails`, `file`, `date_added`, `status`) VALUES
(9, 1, 5, 'A RESOLUTION AUTHORIZING MUNICIPAL MAYOR JOHN LLOYD M. PACETE AS\r\na SIGNATORY TO A MEMORANDUM OF AGREEMENT WITH THE DEPARTMENT OF\r\n7 HEALTH-WESTERN VISAYAS CENTER FOR HEALTH DEVELOPMENT FOR THE\r\nGRANTING OF HEALTH EMERGENCY ALLOWANCE TO HEALTH CARE AND NON-\r\nHEALTH CARE WORKERS', 'Resolution No. 248 — 2024', 'WHEREAS, RA 11712 known as the Public Health Emergency Benefits and\r\nAllowances for Health Care Workers provides for the payment of health emergency\r\nallowance, sickness and death compensation and other benefits for public and private health\r\ncare workers and non-health care workers during COVID-19 pandemic;\r\n\r\nWHEREAS, the Department of Health shall transfer funds to LGU for the grant of\r\nhealth emergency allowance to eligible health care workers and non-health care workers;\r\n\r\nWHEREFORE, upon motion by Hon. Jennifer Rose Tatoy and duly seconded en Pa\r\n\r\nmasse, be it i\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to grant authority to Municipal Mayor John\r\nLloyd M. Pacete as signatory to a Memorandum of Agreement with the Lange =.\r\nHealth-Western Visayas Center for Health Development for the granting Health mt\r\nEmergency Allowance to health care and non-health workers.\r\ni ed to undertake the above |\r\nRESOLVED FURTHER, that both parties agre\r\nbased on the terms and conditions as stipulated in the Memorandum of Agreement. “7\r\nRESOLVED FINALLY, to furnish a copy: hereof to the oe the Municipal\r\nand the Rural Health Physician, Bugasong, Antique and the ppb Visayas |\r\nfor Health Development, Iloilo City for information and guidance k\r\n\r\nUNANIMOUSLY', '', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of\r\n\r\nthe foregoing resolution.', '../uploads/442650283_1280175949612730_5370110906241116354_n.jpg', '2024-06-02 12:57:21', 1),
(10, 1, 4, 'test 1', 'Resolution No. 251 — 2024', 'WHEREAS, the Sangguniang Kabataan (SK) operates in consonance with its\r\nfunctions and responsibilities as stipulated in Republic Act No. 10742 otherwise known as\r\nSangguniang Kabataan Reform Act of 2015, as amended by Republic Act No. 11768;\r\n\r\n\' WHEREAS, the Municipality of Bugasong acknowledges the vital role of the youth in\r\nnation building and its mandate in providing opportunities for their voices to be amplified in\r\nany programs in the locality;\r\n\r\nWHEREAS, to fully enable them to facilitate meetings, planning and mobilization of\r\nresources in the service delivery of youth centered programs, there is a need to have their\r\nown Sangguniang Kabataan building;\r\n\r\nWHEREAS, the Hon. Congressman Antonio Agapito “AA” B. Legarda, Jr is very\r\nsupportive of the advocacies and programs of the SK as manifested on the funded projects\r\npertaining to youth education, leadership and empowerment;\r\n\r\nWHEREFORE upon motion by SKMF John Alrich Vincent Magaro and duly seconded\r\nby Hon. Silfredo Maghari, Jr., be it\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to respectfully request Congressman\r\nAntonio Agapito “AA” Legarda for fund allocation in the amount of TEN MILLION Pesos for\r\nthe construction of Sangguniang Kabataan Building in the Municipality of Bugasong, Antique.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of Congressman Antonio\r\nAgapito B. Legarda, San Jose, Antique for information and guidance of action, \"\r\n\r\nUNANIMOUSLY', '', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.', '../uploads/442669547_370288385500501_7669609671883454448_n.jpg', '2024-06-02 15:33:34', 0),
(11, 1, 2, 'A RESOLUTION AUTHORIZING MUNICIPAL MAYOR JOHN LLOYD M. PACETE AS\r\na SIGNATORY TO A MEMORANDUM OF AGREEMENT WITH THE DEPARTMENT OF\r\n7 HEALTH-WESTERN VISAYAS CENTER FOR HEALTH DEVELOPMENT FOR THE\r\nGRANTING OF HEALTH EMERGENCY ALLOWANCE TO HEALTH CARE AND NON-\r\nHEALTH CARE WORKERS', 'Resolution No. 248 — 2024', 'WHEREAS, RA 11712 known as the Public Health Emergency Benefits and\r\nAllowances for Health Care Workers provides for the payment of health emergency\r\nallowance, sickness and death compensation and other benefits for public and private health\r\ncare workers and non-health care workers during COVID-19 pandemic;\r\n\r\nWHEREAS, the Department of Health shall transfer funds to LGU for the grant of\r\nhealth emergency allowance to eligible health care workers and non-health care workers;\r\n\r\nWHEREFORE, upon motion by Hon. Jennifer Rose Tatoy and duly seconded en Pa\r\n\r\nmasse, be it i\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to grant authority to Municipal Mayor John\r\nLloyd M. Pacete as signatory to a Memorandum of Agreement with the Lange =.\r\nHealth-Western Visayas Center for Health Development for the granting Health mt\r\nEmergency Allowance to health care and non-health workers.\r\ni ed to undertake the above |\r\nRESOLVED FURTHER, that both parties agre\r\nbased on the terms and conditions as stipulated in the Memorandum of Agreement. “7\r\nRESOLVED FINALLY, to furnish a copy: hereof to the oe the Municipal\r\nand the Rural Health Physician, Bugasong, Antique and the ppb Visayas |\r\nfor Health Development, Iloilo City for information and guidance k\r\n\r\nUNANIMOUSLY', '', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of\r\n\r\nthe foregoing resolution.', '../uploads/442650283_1280175949612730_5370110906241116354_n.jpg', '2024-06-02 16:31:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(255) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `date_added`) VALUES
(2, 'Test 2', '2024-06-03 18:51:20'),
(3, 'Test 3', '2024-06-03 18:51:32'),
(4, 'Test 4', '2024-06-03 18:51:36'),
(5, 'Test 5', '2024-06-03 19:38:34');

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
  `user_type` varchar(255) NOT NULL DEFAULT 'citizen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `password`, `status`, `user_type`) VALUES
(1, 'BLTS Admin', 'bltsadmin@blts.com', 'admin', '$2y$10$RR/O6CpKiL8O29XXOq1gpu.ChW9cNHU/JbVQkHO93HwDLkYiHuvZ2', 0, 'admin'),
(5, 'test member', 'testmember1@gmail.com', 'testmember1', '$2y$10$TgHtplHst90abiQdVVSWA.crlvr.2zw89Efh/y/6Guno.p8rJEp7i', 0, 'citizen'),
(6, 'test member 2', 'testmember2@gmail.com', 'testmember2', '$2y$10$4jC4V10ZYgzfm8RN/nMnbui.7XkOH7S39zaeK5ArpAhLMMi/6WsR6', 0, 'citizen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `resolutions`
--
ALTER TABLE `resolutions`
  ADD PRIMARY KEY (`resolution_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `resolutions`
--
ALTER TABLE `resolutions`
  MODIFY `resolution_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
