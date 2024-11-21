-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 01:56 PM
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
-- Table structure for table `document_views`
--

CREATE TABLE `document_views` (
  `document_view_id` int(255) NOT NULL,
  `document_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `date_added` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(23, 7, 15, 'ordinance', '2024-11-01 13:30:33.055546');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `post_id`, `user_id`, `notification_content`, `is_read`, `date_added`) VALUES
(28, 74, 15, 'Your comment has been deleted because: This comment \"Gagu\" contains inappropriate language and can be considered offensive as it is a derogatory term in some contexts', 1, '2024-11-21 20:37:38'),
(29, 44, 15, 'Your comment has been deleted because: This comment, \"GAGU,\" should not be published as it contains offensive language', 1, '2024-11-21 20:38:27'),
(30, 44, 15, 'Your comment has been deleted because: The comment \"Gagu\" appears to contain offensive language', 1, '2024-11-21 20:45:13'),
(31, 74, 15, 'Your comment has been deleted because: This comment contains offensive language and is not suitable for publication', 1, '2024-11-21 20:47:59'),
(32, 74, 15, 'Your comment has been deleted because: This comment is not suitable for publication as it contains offensive language', 1, '2024-11-21 20:48:10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordinances`
--

INSERT INTO `ordinances` (`ordinance_id`, `user_id`, `ordinance_cat_id`, `title`, `ordinanceNo`, `preamble`, `enactingClause`, `body`, `repealingClause`, `effectivityClause`, `enactmentDetails`, `file`, `date_added`, `date_publish`, `status`) VALUES
(6, 1, 5, 'AN ORDINANCE AUTHORIZING THE ANNUAL BUDGET OF BUGASONG,\r\nANTIQUE FOR FISCAL YEAR 2022 IN THE TOTAL AMOUNT OF TWO HUNDRED\r\nFOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS\r\n(Php _204,423,040.00) COVERING THE VARIOUS EXPENDITURES FOR THE\r\nOPERATION OF THE GENERAL FUND AND THE TOTAL AMOUNT OF NINE\r\nMILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN', 'Ordinance No. 09- 2021 Pagel of 3', 'WHEREAS, the Annual Municipal Budget serves as the basis of operation, coordination\r\nand delivery of basic services, facilities and effective governance of the inhabitants in every\r\nmunicipality;\r\n\r\nWHEREAS, the Annual Budget of the municipality for Fiscal Year 2021 was submitted\r\nbefore the Sangguniang Bayan for review, consideration and approval specifying sources of\r\nrevenues available for appropriation;\r\n\r\nWHEREAS, after proper scrutiny, deliberations and thorough discussions of the items on\r\nthe said proposed budget, the same complied with the stipulations of Local Budget Circular No.\r\n112 dated June 10, 2016 as mandated by R. A. 7160 otherwise known as the New Local\r\nGovernment Code together with statutory and contractual obligations of the municipality,\r\nwhereby the same has been provided in the Annual General Fund of the Budget;', 'WHEREFORE, be it enacted, as it is hereby enacted, in session assembled that:', 'Section1. Annual Budget. The Annual Budget of Bugasong, Antique for Fiscal\r\n\r\nYear 2022 in the total amount of TWO HUNDRED FOUR MILLION FOUR HUNDRED\r\n\r\nENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) covering the various\r\n\r\nexpenditures for the operation of the GENERAL FUND and the total amount of NINE MILLION\r\n\r\nSIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS (Php\r\n\r\n9,620,927.00) covering the various expenditures for the operation of ECONOMIC REVENUE\r\nREGULATION AND GENERATION OFFICE (ERRGO) is hereby approved.\r\n\r\nAppropriation Ordinance No. 06- 2021 Pagel of 3\r\nAnnual Municipal Budget for FY 2022\r\nRepublic of the Philippines\r\n\r\nProvince of Antique\r\n\r\nOFFICE OF THE SANGGUNIANG BAYAN\r\nBugasong, Antique\r\n\r\nThe budget documents consisting of the following are incorporated herein and made an\r\nintegral part of this ordinance:\r\n\r\n1. Annual Investment Program\r\n2. Plantilla of Personnel; and\r\n\r\n3. Others\r\nSection 2. Receipts Program. The sources of funds for the Annual Budget shall be\r\nas follows:\r\n7 A. General Fund\r\nRECEIPTS AMOUNT\r\nLocal Sources Php 4,396,860.00\r\nOperating and Miscellaneous Revenue 1,949,937.00\r\nNational Tax Allotment 198,076,243.00\r\nTotal Available Resources 204,423,040.00\r\nB. ERRGO\r\nRECEIPTS AMOUNT\r\nIncome from Cemetery Php 20,000.00\r\n_ | Income from Market 5,235,050.00\r\nIncome from Slaughterhouse 750,000.00\r\nOther Business Income - 240,000.00\r\n— Subsidy from General Fund 3,375,877.00\r\nTotal Available Resources Php —_9,620,927.00\r\nSection 3. _ Expenditure Program. The amount of TWO HUNDRED FOUR MILLION\r\n~ FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) for\r\nthe General Fund and NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED\r\nTWENTY-SEVEN PESOS (Php 9,620,927.00) for ERRGO are hereby appropriated for the\r\n~ following expenditures:\r\nA. General Fund\r\n= EXPENDITURES AMOUNT\r\nPersonal Services 62,901,082.40\r\n| MOOE 78,950,849.96\r\n7 Capital Outlay 4,575,000.00\r\nSpecial Purpose Account 57,996,107.64\r\nTOTAL EXPENDITURES Php 204,423,040.00\r\nENDING BALANCE -0-\r\nB. ERRGO\r\n- EXPENDITURES AMOUNT\r\nPersonal Services Php 7,790,927.00\r\n_ MOOE 1,580,000.00\r\nCapital Outlay 250,000.00\r\nTOTAL EXPENDITURES 9,620,927.00\r\nENDING BALANCE Php -0-\r\n\r\nSection 4. Use of Savings and Augmentation. In accordance with Section 336 of\r\nRepublic Act No. 7160, the Local Government Code of 1991, the Mayor and the Presiding\r\n\r\nOfficer of the Sanggunian are authorized to augment any item in the approved annual budget\r\n\r\nfor their respective offices from savings in other items within the same expense class of their\r\nLa respective appropriations.\r\n\r\nAppropriation Ordinance No: 06- 2021\r\n_ Annu Municipal Budget for FY 2022\r\nRepublic of the Philippines\r\n\r\nProvince of Antique\r\n\r\nOFFICE OF THE SANGGUNIANG BAYAN\r\nBugasong, Antique\r\n\r\nSection 5. Priority in the Use of Personal Services Savings. Priority shall be given to\r\n\r\npersonnel benefits of local employees in the use of Personal Services savings.\r\n\r\nSection 6. That No Job Order charges shall be allowed against the following items: Aid\r\nto Youth, Aid to Tourism, Aid to Nutrition except when the project proposal stipulate the hiring of\r\n\r\nJob Order provided, that the allocation for Job Order charges will not exceed 30% of the total\r\namount, as a matter of fiscal safeguards of the herein stipulated objects for public spending.\r\n\r\nSection 7. Separability Clause. [f, for any reason, any Section or provision of\r\nAppropriation Ordinance is disallowed in Budget Review or declared invalid by proper\r\nauthorities, other Sections or provisions hereof that are not affected thereby shall continue to be\r\nin full force and effect.\r\n\r\nSection 8. Effectivity. The provisions of this Appropriation Ordinance shall take effect\r\nupon its approval.', 'TEST', 'TEST', 'TEST', '../uploads/ORDINANCE (POPS).pdf', '2024-06-08 15:40:37', '2024-11-17 11:28:50.000000', 0),
(7, 1, 2, 'AN ORDINANCE GRANTING ONE TIME GRATUITY INCENTIVES IN THE AMOUNT OF\r\nFIVE THOUSAND PESOS (P 5,000.00) TO ANY SENIOR CITIZEN IN BUGASONG,\r\nANTIQUE WHO ARE EIGHTY (80) YEARS OLD AND ABOVE AND PROVIDING FUNDS\r\nTHEREOF\r\nAuthored by: Hon. Rosario Y. Pesayco\r\nCo-Authored by: Hon. Jennifer Rose A. Tatoy', 'Ordinance No: 36-2023', 'WHEREAS, pursuant to Republic Act No. 9994 also known as &quot;Expanded Senior\r\nCitizens Act of 2010&quot;, values the dignity of every human person and guarantees full respect\r\nfor human rights as well as to give full support to the improvement of the total well- being of\r\nthe elderly and their full participation in society, considering that the senior citizens are\r\nintegral part of the Philippine society;\r\n\r\nWHEREAS, the Municipality of Bugasong recognizes the contribution of Senior\r\nCitizens in building society and guiding the youths to be productive members of community\r\n\r\nthrough valuable insights and advices;\r\n\r\nWHEREAS, almost all senior citizens are basically financially dependent upon their\r\nchildren and relatives for their daily needs and health expenses;\r\n\r\nWHEREAS, in appreciation of the vital role and contributions of senior citizens in the\r\ndevelopment and progress of the municipality, it is appropriate to grant a one-time gratuity\r\nincentive in the amount of P 5,000.00 to any senior citizen who are 80 years old and above;\r\n\r\nNOW, THEREFORE, BE IT ORDAINED by the Sangguniang Bayan, in session duly\r\nassembled, that:\r\n\r\nSection 1. Title. This Ordinance shall be known as the “Senior Citizen’s Gratuity\r\nIncentives Award”.\r\n\r\nSection 2. Scope and Coverage. This Ordinance shall cover any Senior Citizens\r\nwho are 80 years old and above upon the approval of this ordinance.\r\n\r\nSection 3. Definition of Terms.\r\n\r\na) Gratuity — gesture of appreciation or as a reward for long and faithful service.\r\n\r\nb) Incentive —a thing that motivates or encourages one to do something.\r\n\r\nMunicipal Ordinance No: 36 Seriey of 2023 Pagel of 3\r\nRepublic of the Philippines\r\nProvince of Antique\r\n\r\nOFFICE OF THE SANGGUNIANG BAYAN\r\nBugasong, Antique\r\n\r\nSection 11. Effectivity. This Ordinance shall take effect fifteen days (15) days after\r\n\r\nits publication in a newspaper of local circulation and posting in at least two (2) conspicuous\r\nPlaces within the municipality\r\n\r\nUNANIMOUSLY APPROVED.\r\nCERTIFIED CORRECT:\r\n\r\nMARIA joke VALDEVIESO\r\nDesignated Recorder\r\n\r\nATTESTED TOBE DULY ENACTED\r\n\r\n| ESCOTE\r\npatViGe Maydr/Presiding Officer\r\n\r\nAPPROVED:\r\n. PACETE\r\n@\r\n4 nee, 2023\r\nDate Submitted: 11 DEC ¢\r\nDate Approved: Ail DEC 7023\r\n\r\nDate Released: 12 DEC 9171\r\n\r\ncc; The Sangguniang Panlalawigan\r\nAll Concerned\r\nFile\r\n\r\nMunicipal Ordinance No; 36 Serley of 2023 Page 3 of 3', 'NOW, THEREFORE, BE IT ORDAINED by the Sangguniang Bayan, in session duly\r\nassembled, that:\r\n\r\n', 'Section 1. Title. This Ordinance shall be known as the “Senior Citizen’s Gratuity\r\nIncentives Award”.\r\n\r\nSection 2. Scope and Coverage. This Ordinance shall cover any Senior Citizens\r\nwho are 80 years old and above upon the approval of this ordinance.\r\n\r\nSection 3. Definition of Terms.\r\n\r\na) Gratuity — gesture of appreciation or as a reward for long and faithful service.\r\n\r\nb) Incentive —a thing that motivates or encourages one to do something.\r\n\r\nSection 4. Requisites.\r\n\r\na) Must be a Filipino citizen aged 80 years old and above upon the approval of the\r\nordinance\r\n\r\nb) Abonafide resident of Bugasong, Antique.\r\n\r\nc) Must be a duly registered member of the Office of the Senior Citizens Affairs\r\n(OSCA)\r\n\r\nd) The list of beneficiaries will be the responsibility of the OSCA Barangay President\r\nto inform the OSCA officers of any additional members who turns Eighty (80)\r\nyears old by submitting a copy of the member&#039;s OSCA Identification Card or Birth\r\nCertificate\r\n\r\nIn addition, the grantee shall submit any two (2) of the following documents:\r\n\r\ne) Certified copy of Birth Certificate\r\n\r\nf) Certified copy of Marriage Contract (if married)\r\n\r\ng) Certified copy of OSCA Identification Card\r\n\r\nh) Death Certificate and/or Burial Certificate in the case of the posthumous recipient,\r\n\r\nSection 5. Disqualification. A Senior Citizen who died at the age of eighty (80)\r\nbefore the approval of this Ordinance.\r\n\r\nSection 6. Awarding.\r\n\r\na) The amount of P 5,000.00 shall be given every 6&quot; day of December to qualified\r\nrecipient during the opening of SANLAB in the spirit of Christmas celebration\r\n\r\nb) The one-time posthumous award will be given to the recipient representative upon\r\npresentation of a copy of birth certificate stating that they are related to the\r\ndeceased member.\r\n\r\nSection 7. Appropriation. The amount of Five Hundred Thousand (® 500,000.00)\r\nnecessary for the implementation of this Ordinance shall be appropriated in the Municipal\r\nAnnual Budget. The distribution of the cash gift will depend on the approved Aid to Senior\r\nCitizen allocated amount. Senior Citizen who are unable to receive the gratuity incentives on\r\nthe current year shall receive the cash incentives on the succeeding year.\r\n\r\nSection 8. Enforcement. The Municipal Social Welfare and Development Office\r\n(MSWDO) thru the Office of the Senior Citizens Affairs (OSCA) shall be responsible in the\r\nimplementation of this Ordinance. Number allocation will be divided fairly among the\r\ntwenty-seven (27) Barangay to ensure that all barangays has its own beneficiaries\r\n\r\nevery year.\r\n\r\nSection 9. Separability Clause. If any portion of this ordinance is declared\r\nunconstitutional or unlawful, such declaration shall not affect the other parts or sections\r\nhereof that are not declared unlawful or unconstitutional\r\n\r\n', 'Section 10. Repealing Clause. All ordinances and regulations or part thereof, which are inconsistent with this ordinance are hereby repealed amended or modified accordingly\r\n\r\n', 'Section 11. Effectivity. This Ordinance shall take effect fifteen days (15) days after its publication in a newspaper of local circulation and posting in at least two (2) conspicuous\r\nPlaces within the municipality.', 'UNANIMOUSLY APPROVED.\r\nCERTIFIED CORRECT:\r\n\r\nMARIA VICTORIA VALDEVIESO\r\nDesignated Recorder\r\n\r\nATTESTED TO BE DULY ENACTED\r\n\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer\r\n\r\nAPPROVED:\r\nHON. JOHN LLOYD M. PACETE\r\nMunicipal Mayor\r\n\r\nDate Submitted: 11 DEC 2023\r\nDate Approved: 12 DEC 2023\r\n\r\nDate Released: 12 DEC 2023', '../uploads/Municipal Ordinance No. 36-2024.pdf', '2024-08-29 18:52:32', '2024-11-17 11:40:09.000000', 1),
(8, 1, 17, 'AN ORDINANCE NAMING SITIO JATAY-JATAY IN BARANGAY CENTRO POJO TO\r\nBARANGAY GUIJA FARM TO MARKET ROAD AS MAYOR AIDA UY KIMPANG ROAD', 'Ordinance No. 38 — 2024', 'WHEREAS, R.A. 7160 empowers Local Government Unit full discretion and control\r\nover the naming of places within their territorial jurisdiction, subject to the review of the\r\nNational Historical Institute;\r\n\r\nWHEREAS, the Revised Guidelines on the Naming and Renaming of streets issued\r\nby the National Historical Commission states that public places under the Local Government\r\nUnit may be named and renamed subject to the guidelines set forth therein;\r\n\r\nWHEREAS, the naming of farm to market road located in Sitio Jatay-jatay in\r\nBarangay Centro Pojo connecting to Barangay Guija in honor of the Late Municipal Mayor\r\nAida Uy Kimpang is a fitting tribute to a public servant who is undoubtedly a dedicated\r\nprogenitor of progress and development of Bugasong;\r\n\r\nWHEREAS, the Late Municipal Mayor Aida Uy Kimpang during her incumbency trail\r\nblazed major development initiatives in the municipality including the opening of farm to\r\nmarket road in the different barangays under the Local Resource Management (LRM)\r\nProgram;\r\n\r\nWHEREAS, as one of the many prominent examples of her development efforts is\r\nthe Jatay-Jatay to Jinalinan farm to market road which presently has been sustainably\r\ntehabilitated and concreted out from the budget allocations of different provincial and\r\nnational government agencies;\r\n\r\nWHEREAS, vested by the authority of the Local Government Code particularly under\r\nSection 13, Paragraph c (2), the legislative instrument is being initiated to officially recognize\r\nand ascribe the said road network as Mayor Aida Uy Kimpang Road.', 'WHEREFORE, be it ORDAINED, by the Sangguniang Bayan in session assembled\r\nthat:', '\r\nSection 1. Title. This ordinance shall be known as “An Ordinance Naming Jatay-Jatay in Barangay Centro Pojo - Guija Farm to Market Road as Mayor Aida Uy Kimpang\r\nRoad.\r\n\r\nSection 2. Physical Description and Location. The herein road connecting\r\nBarangay Centro Pojo starting from Sitio Jatay-Jatay right after the Municipal Public Market\r\ngoing westward up to Barangay Jinalinan with a length of 1.877 kilometers.\r\n\r\n', 'Section 3. Repealing Clause. All ordinances, rules and regulations or parts\r\nthereof, in conflict with or inconsistent with any provisions of this ordinance are hereby\r\ntepealed and/or modified accordingly.\r\n\r\n', 'Section 3. Effectivity. This Ordinance shall take effect ten (10) days after posting in\r\nat least two (2) conspicuous places within the municipality.', 'UNANIMOUSLY APPROVED.\r\nCERTIFIED CORRECT:\r\n\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED TO BE DULY ENACTED\r\n\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer\r\n\r\nAPPROVED:\r\nHON. JOHN LLOYD M. PACETE\r\nMunicipal Mayor\r\n\r\nDate Submitted: 03 MAY 2024\r\nDate Approved: 06 MAY 2024\r\n\r\nDate Released: 06 MAY 2024', '../uploads/Municipal Ordinance No. 38-2024.pdf', '2024-08-29 18:55:37', '2024-08-29 20:15:09.000000', 1),
(9, 1, 14, 'AN ORDINANCE UPDATING THE LOCAL YOUTH DEVELOPMENT COUNCIL\r\n(LYDC) IN THE MUNICIPALITY OF BUGASONG, ANTIQUE', 'Ordinance No. 40 — 2024', 'WHEREAS, Section 23 of Republic Act 10742 mandates the creation of Local Youth\r\nDevelopment Council which shall be called as Municipal Youth Development Council\r\n\r\ncomposed of representatives from youth and youth-serving organizations in the municipality\r\n\r\n8\r\n=\r\nie)\r\n2\r\n=\r\n2\r\no\r\n‘s\r\na\r\n\r\nPESAYCO\r\n\r\nWHEREAS, the creation of Local Youth Development Council will be the enabi Ng\r\n\r\nrate echanism for meaningful youth participation through the mutual coordination of the Loca’\r\nvelopment Council and the Sanggunian Kabataan in Bugasong, Antique', 'WHEREFORE, be it enacted by the Sangguniang Bayan of Bugasong, Antique in\r\nregular session assembled that:\r\n', 'Section 1. Title. This Ordinance shall be known as the “LOCAL YOUTH\r\nDEVELOPMENT COUNCIL of BUGASONG, ANTIQUE”.\r\n\r\nSection 2. Declaration of Policy. It is hereby declared the Policy of the municipality\r\nto promote and protect the physical, moral, spiritual, intellectual and social well-being of\r\n\r\nFilipino youth, inculcating in them patriotism and nationalism and encouraging their\r\ninvolvement in public and civic affairs.\r\n\r\nSection 3. Definition of Terms. As used in this ordinance, the following terms\r\nare defined as follows:\r\n\r\na) Center —refers to a multi-purpose or one-stop-shop facility as any is established by the local youth coordinating council that shall provide development program and\r\nservice to the youth.\r\n\r\nb) Commission — refers to the National Youth Commission established by virtue 18 of\r\nRepublic Act No. 8044, and Republic Act 10742.\r\n\r\nc) Council — refers to the Local Youth Development Council as provided herein.\r\n\r\nd) Development — the improved well-being, or welfare, of people and the process by\r\nwhich this is achieved, the sustained capacity to achieve a better life.\r\n\r\ne) In-School Youth — refers to youth attending either formal or non-schoo! based\r\neducational program under institutions recognized by the state.\r\n\r\nf) Local Youth Development Council (LYDC) - a multi-sectoral youth association which shall be called Municipal Youth Development Council (MYDC) headed by the\r\nconcerned SK Federation President and composed of representatives of youth and youth- serving organizations in the municipal level.\r\nLocal Youth Development Plan (LYDP) — refer to municipal youth development plan\r\nas initially drafted by the SK Pederasyon, finalized by the LYOC and approved by\r\nthe local sanggunian.\r\n\r\nh) Out-of-School Youth — refers to youth not enrolled in any formal or vocational\r\nschool neither employed of self-employed,\r\n\r\ni) Working Youth — refers to youth who are either employed, self-employed,\r\nunderemployed or being to specific employable job seeking youth groups (such\r\nas graduates on tertiary or vocational school or those previously employed and\r\nactively looking for work in any formal or informal sector of the society.\r\n\r\nj) Youth - refers to those Persons who age ranges from fifteen (15) to thirty (30)\r\nyears as provided under Republic Act No, 8044,\r\n\r\nk) Youth Organization — refers to organization whose composition are youth,\r\n\r\nl) Youth Serving Organization - refers to registered/accredited organizations with\r\nprincipal programs and projects on youth-oriented and youth-related activities and\r\nwhose composition are not limited to youth,\r\n\r\nSection 4. Local Youth Development Council. There shall be created a LocalYouth Development Council which shall be responsible for the f \r\nimplementation of youth development programs, projects and activities in coordination with\r\nvarious government and non-government organizations.\r\n\r\nSection 5. Objectives. The Local Youth Development Council shall have the\r\nfollowing objectives:\r\n\r\n1) To develop and harness the potential of the youth as fesponsible partners in\r\nnation-building.\r\n\r\n2) To encourage intensive and active participation of youth in all government and\r\nnon-government programs, projects and activities affecting them.\r\n\r\n3) To harmonize all government appropriations for youth promotion and\r\ndevelopment with funds from other sources.\r\n\r\n4) To broaden and strengthen the services provided by the national government\r\nagencies, local government units and Private agencies to young people.\r\n\r\n5) To provide information mechanism on youth Opportunities on the area of education, employment, livelihood, physical and mental health, capability\r\nbuilding and networking.\r\n\r\n6) To increase the spirit of volunteerism among Filipino youth Particularly in\r\nmaintenance of Peace and order and the preservation, conservation and Protection\r\nOf the environment and natural resources within the municipality.\r\n\r\n7) To provide monitoring and coordinating mechanism for youth programs,\r\nProjects and activities.\r\n\r\n8) To provide a venue for the active participation of the youth in cultural and\r\neco-tourism awareness program\r\n\r\nSection 6. Composition of the Council. The Local Youth Development Council\r\nShall be headed by the SK Pederasyon President and composed of different registered\r\nyouth organization or youth serving organizations in the Municipal level that shall assist the\r\nplanning and execution of Projects and programs of the SK and the Pederasyon.\r\n\r\n\r\nSection 7. Local Youth Development Council Secretariat. The Local Youth\r\nDevelopment Office shalll facilitate the election of the LYDC representatives and shall serve\r\nas secretariat to the LYDC and provide technical assistance in the formulation of the Local\r\nYouth Development Plan.\r\n\r\nSection 8. Duties and Functions of the Local Youth Development Council. The\r\nLocal Youth Development Council shall discharge the follawing duties and functions;\r\n\r\n4) To formulate policies and component programs in coordination with the various\r\ngovernment agencies handling youth related programs, projects and activities.\r\n\r\n2) To coordinate and harmonize activities of all agencies and organizations in the\r\nmunicipality engaged in youth development programs\r\n\r\n3) To develop and provide support for the development and coordination of youth\r\npeople and designed strategies to gain support and participation of the youth.\r\n\r\n4) To assist the national government and non-government agencies in the promotion of\r\nthe programs, projects and activities in the local level.\r\n\r\n5) To recommend youth programs and project proposal to appropriate government and\r\nnon-government organizations necessary for the accomplishment of the objectives of\r\nthis ordinance.\r\n\r\n6) To formulate and finalize the three (3) years LYDP that is anchored in the PYDP and\r\nthe development plans of the Province of Antique,\r\n\r\nThe LYDP shall be initially drafted by the respective SK Pederasyon and shall be\r\nfinalized by Local Youth Development Council. This shall be submitted to the Municipal\r\nMayor for inclusion in the Local Development Plan and subsequently endorsed to the\r\nSangguniang Bayan for approval. These plan shall give prionty to programs, projects and\r\nactivities that will promote and ensure the meaningful youth participation in nation-building,\r\nsustainable youth development and empowerment, equitable access to quality education,\r\nenvironmental protection, climate change adaptation, disaster risk reduction and resiliency,\r\nyouth employment and livelihood, health and anti-drug abuse, gender sensitivity, social\r\nprotection, capability building and sports development\r\n\r\n7) To perform such other functions as may be provided by law.\r\n\r\n\r\nSection 9. Meetings of the Council. The Council shall schedule a meeting every\r\nquarter and as often as may be deemed necessary for the operation and effective functioning\r\nof the Local Youth Development Council.\r\n\r\nSection 10. Local Youth Development Plan. The Council shall formulate and\r\nadopt a tree-year Municipal Youth Development Plan which shall be supported by a\r\nresolution ordinance enacted by the Sangguniang Bayan. The said plan will be the basis for\r\nimplementation of local youth development programs and services in coordination with\r\nconcerned agencies. These shall include but not limited to the following:\r\n\r\n4) Youth Development Programs\r\n\r\na) Scholarship and Exchange Programs - include local and international\r\nscholarship and exchange programs, grants and subsidies;\r\n\r\nb) Sports and Recreational Programs - include trainings, conferences, seminars,\r\nsports, competitions and other sports activities;\r\n\r\nc) Livelihood Development Programs - include trainings on livelihood skills, basic\r\nbusiness management, entrepreneurship, formal and non-formal skills, market\r\nlinkages, business development, value orientation, credit facility and job\r\nplacement sourcing;\r\n\r\nd) Training and Capability-building Programs - include leadership, advocacy,\r\nvalue formation, governance, information technology and other relevant\r\nprograms;\r\n\r\ne) Youth Cooperative Programs - include cultural programs and activities,\r\nworkshops, and art classes.\r\n\r\n2) Youth Development Services\r\n\r\na) Information Resource Service - include access to internet, e-mail, website\r\nservices, material and information on job opportunities, scholarship, trainings,\r\nlocal and international linkages and networking, copies of all laws, executive\r\norders, presidential decrees, rules, regulations and other issuances pertinent\r\nto the youth sector, including youth related measures filed in both houses of\r\ncongress}\r\n\r\nb) Adolescent Health Services - include assess to counseling services,\r\n\r\norientation seminars, training on health-related matters and referrals to\r\nappropriate government clinics, hospitals, rural health units and institutions;\r\n\r\nc) Youth Hostels and Training Center Facilities - include access to hostels,\r\ndormitories, affiliated half-way houses, temporary shelter and training center,\r\n\r\nd) Legal Assistance Services - include asses to free or affordable legal services\r\nsuch as counseling, advice, and referrals to appropriate agencies;\r\n\r\ne) Eco-Tourism Service - include access to promotional campaign for local tourism\r\ndestinations, and other similar activities;\r\n\r\nSection 11. Appropriations. The Local Government of Bugasong shall incorporate\r\nin its annual budget such amount as may be necessary for the operation and effective\r\nfunctioning of the Local Youth Development Council.\r\n\r\nSection 12. Separability Clause. If, for any reason or reasons, any part or\r\nprovisions of this ordinance shall be held to be unconstitutional or invalid, other parts or\r\nprovisions hereof which are not affected thereby shall continue to be in full force and effect.\r\n\r\n', 'Section 13. Repealing Clause. All previous ordinances inconsistent with this\r\nordinance shall be deemed repealed or modified accordingly.\r\n\r\n', 'Section 14. Effectivity. This Ordinance shall take effect ten (10) days after posting\r\nin at least two (2) conspicuous places within the municipality.\r\n', 'CERTIFIED CORRECT:\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED TO BE DULY ENACTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer\r\n\r\nAPPROVED:\r\nHON. JOHN LLOYD M. PACETE\r\nMunicipal Mayor\r\n\r\nDate Submitted: 20 MAY 2024\r\nDate Approved: 23 MAY 2024\r\nDate Released: 23 MAY 2024', '../uploads/Municipal Ordinances No.40-2024.pdf', '2024-08-29 19:05:03', '2024-08-29 20:15:12.000000', 1),
(10, 1, 5, 'AN ORDINANCE REQUIRING THE INSTALLATION OF CLOSED-CIRCUIT TELEVISION\r\n(CCTV) SYSTEM IN ALL BUSINESS ESTABLISMENT, SCHOOLS AND GOVERNMENT\r\nOFFICES WITHIN THE TERRITORIAL JURISDICTION OF BUGASONG, ANTIQUE AND\r\nPROVIDING PENALTIES FOR VIOLATIONS THEREOF', 'Ordinance No: 42 — 2024', 'WHEREAS, Section 16 of RA 7160 provides that local government units shall\r\nexercise its powers necessary for its efficient and effective governance and those which are\r\nessential to the promotion of general welfare;\r\n\r\nWHEREAS, Section 447 of the same Code provides that local government units shall\r\nmaintain peace and order by enacting measures to prevent and suppress lawlessness\r\n3 disorder, riot, violence rebellion or sedition and impose penalties for the violation thereof;\r\n\r\nWHEREAS, video surveillance cameras or Closed-Circuit Television (CCTV) is the\r\nmost effective tools in crime deterrence, prevention, detection and solution and is very useful\r\nin recounting details of criminalities and identification of perpetrators thereby resulting to\r\nspeedy and thorough investigation reports;\r\n', 'WHEREFORE, be it ordained by the Sangguniang Bayan of Bugasong, Antique in regular session assembled that:\r\n', 'Section 1. Title. This Ordinance shall be known as the “CLOSED CIRCUIT\r\n TELEVISION (CCTV) Ordinance of Bugasong.”\r\n\r\nSection 2. Declaration of Policy. It is hereby declared the policy of the\r\n2 Municipality of Bugasong, Antique to provide fast and reliable police assistance and public\r\n<\r\n\r\nsafety, maintain peace and order within the territorial jurisdiction of the municipality\r\n\r\nSection 3. Definition of Terms. For purposes of this ordinance, the following terms\r\nshall apply and referred to as follows:\r\n\r\n1) Business Establishment - refers to any establishment used for commercial purposes\r\nand operating for selling products to or providing services to the general public. They\r\nshall include, but shall not be limited to, restaurants, schools, hospitals, _mails,\r\nshopping centers, movie houses, theaters, supermarkets, groceries, entertainment\r\ncenters, office buildings, warehouses and other similar establishments.\r\n\r\n2) Closed-Circuit Television (CCTV) — refers to a video surveillance technology in which\r\nall elements from the cameras to the recording devices are directly connected in\r\norder to keep the video from being broadcast over public airwaves and/or on a closed\r\ncircuit.\r\n\r\n3) Feeds — refers to visual information transmitted by the CCTV cameras.\r\n4) Feeds Location — areas that are covered or viewed by video surveillance cameras\r\n\r\n5) High Risk Areas — refers to commercial/business establishment and other places and\r\nspaces with common business areas where there is greater degree of susceptibility to\r\noccurrence of accidents or criminalities due to numerous financial, social or business\r\ninteractions or places and spaces where critical properties of the municipality are\r\nsituated.\r\n\r\n6) Monitors - the screens or other devices on which feeds are viewed.\r\n\r\n7) New Business Establishments — refers to newly created trading or commercial\r\nbusiness undergoing application for business permit or license to operate prior to the\r\neffectivity of this Ordinance.\r\n\r\n8) Old Business Establishments — refers to existing business establishment that have\r\nduly secured current business permit or license to operate and are already operating\r\nat the time of the effectivity of this Ordinance.\r\n\r\n9) Recycling — refers to the process by which records or tapes of feeds or visual\r\ninformation may be erased through the overrun by another or new visual information\r\n\r\nSection 4. Scope of Application and Installation of CCTV Cameras, \\t is hereby\r\nmandated to install and maintain in good working condition surveillance and/or closed circuit\r\ntelevisions (CCTV) cameras on the following:\r\n\r\n1) All business establishments and other commercial places and spaces considered as\r\nhigh risk areas.\r\n\r\n2) Business establishment with capitalization of at least Two Hundred Thousand Pesos\r\n(Php 200,000.00) .\r\n\r\n3) All educational establishments whether private or public including colleges and universities of their locations.\r\n\r\n4) All government/barangay facilities and office buildings including public markets, public\r\ntransport terminal, public plazas or parks.\r\n\r\n5) The installation of CCTV cameras shall be a mandatory requirement for the issuance\r\nor renewal of business permits.\r\n\r\n6) A special designated sticker shall be posted by the inspection team on the\r\nestablishment that have complied herewith.\r\n\r\nSection 5. Implementing Offices. The Municipal Treasurer\'s Office and the\r\nBugasong Police Station are hereby tasked to assist in the implementation of this Ordinance\r\n\r\n1) The Municipal Treasure’s Office and the Bugasong Police Station shall send duly\r\nauthorized employees to inspect the premises of all establishment covered by this\r\nOrdinance through an Executive Order by the Municipal Mayor.\r\n\r\n2) An establishment found to be in violation hereof should be inspected again thirty (30) days after the date of the first inspection to determine is it has already complied herewith. An establishment that fails to comply during the second inspection shall be deemed to have already violated this Ordinance.\r\n\r\n3) The Inspection Team may thereafter conduct inspections on establishment that have already complied twice every year without prior notice to ensure that the CCTV is operational and well maintained.\r\n\r\nSection 6. Limitations on its Usage. CCTV cameras and all its feed shall be solely used in specific instances set forth in this Ordinance and use of CCTV cameras by such persons other than the owners and designated security personnel authorized to operate the same in any manner or location or for any other purposes is expressly prohibited. The usage of CCTV feeds shall be intended to the following:\r\n\r\n1) Law Enforcement and Crime Prevention - CCTV cameras and any all feeds shall be used for the purpose of providing surveillance in the service of law enforcement and crime prevention within the municipality where there is documented criminal activity.\r\n\r\n2) Traffic Monitoring - CCTV cameras and all feeds shall be used for the purpose of traffic monitoring but are not intended to include enforcement of traffic violations. Notwithstanding the foregoing, the feeds from the CCTV cameras used for traffic monitoring may be use for lawful purpose in the event that such CCTV cameras, while being used for their primary function, incidentally view behavior that has caused or is likely to cause danger to person or property.\r\n\r\nSection 7. Notice of Surveillance. It shall be made known to the general public through a written notice prominently displayed at the entrance of the establishments that surveillance/CCTV cameras have been installed in a business establishment.\r\n\r\nSection 9. Confidentiality & Non-Disclosure of Video Recordings. The manager, operator, and/or owner of the business establishment shall maintain the privacy and confidentiality of the video feeds and recordings obtained, as a result of the surveillance shall be not use the feeds for the following:\r\n1) Broadcasting - broadcast by any of the authorized persons prescribed herein of any of the feeds or any of its parts or records on or through any medium other than the monitors.\r\n2) Viewing - feeds shall not be viewed by any person/s other than those expressly authorized herein to view the records on feeds.\r\n3) Transfer - feeds shall not be transferred to any third (3rd) party, whether for profit or not.\r\n4) Reproduction - no person shall be allowed to copy any or all parts of records of the feeds.\r\n\r\nSection 10. Allowed Use and Disclosure. The use, viewing, copying or disclosure of video feeds and recordings obtained, pursuant to the surveillance performed, in accordance with this ordinance/shall only be allowed in the following instances:\r\n1) Use, viewing, copying or disclosure to a member of officer of a law enforcement agency, in connection with and limited to, the investigation or prosecution of an offense, punishable by law or regulation.\r\n2) Use, viewing, copying or disclosure, in connection with any pending criminal or civil proceedings.\r\n3) Use, viewing, copying or disclosure that may be neccesary for persons to determine whether or not an offense was committed against the person or their property, to ascertain the identity of a criminal perpetrator and to determine the manner by which the offense was perpetrated. \r\n\r\nSection 11. Preservation and Recordings.\r\n1) All establishments shall ensure that their CCTV cameras are turned on and recording for twenty-four (24) hours each day and for seven (7) days each week. They shall keep and preserve video recordings from their CCTV cameras for a period of not less than thirty (30) days from the date of recording.\r\n2) After thirty (30) days, the recordings shall be preserved and stored for safekeeping for a period of not less than three (3) months and maybe disposed of, once such period has lapsed at the option of the owner. After that period , the recordings maybe deleted or overwritten an the operator, owner and/or may shall not be liable for its deletion or overwriting of the records, unless its presence is required by a count order.\r\n\r\nSection 12. Proper Request for Feeds. Stored or preserved feeds shall be used at any time to satisfy the following:\r\n1) Any authorized subpoena or any written order of any court of competent jurisdiction (local PNP, NBI, CIDG, PDEA or Municipal Mayor).\r\n2) Any written request from the Chief Officer of the investigating body or authority ensuring the advent of a criminality for proper disposition of crime investigation and report.\r\n3) Any written request from the duly constituted legislative body or assembly for purposes in aid of legislation.\r\n\r\nSection 13. Administrative Provisions.\r\n10 It shall be the responsibbility of the owner and/or manager to ensure that the conditions for the use, viewing, copying or disclosre of video feeds and recordings are reasonably established before giving access to requesting parties. The extent of video feeds and recordings to be used , viewed copied or disclosed shall be limited to the images pertaining to the above-mentioned instances.\r\n2) The owner and/or manger of the establishment shall likewise be answerable for violation of this Ordinance provided that, it is shown that the violation was due to his/her direct participation, lack of supervision or negligence.\r\n3) It is unlawful for any person to allow the unauthorized or unofficial use of viewing of any saved video recordings and the unauthorized public identification of any person or client seen in the video. These video recordings shall not, in any manner, be used to infringe the privacy or individuals. \r\n\r\nSection 14. Enforcement and Penalties\r\n1) All establishements subject to mandatory requirements of this Ordinance shall have six (6) months from its effective date to comply with the minimum technological standards and system requirements set forth thereto.\r\n2) For violation of Section 4\r\na) New business - non-issuance of Mayor\'s and Business Permit \r\nb) Old business - non- renewal of Mayor\'s and Business Permit and a fine of Php 2,000.00 shall be imposed.\r\n3) Any other violation on the provision set forth in this Ordinance shall be punishable by:\r\na) First Offense - fine of Php 2,500.00 shall be imposed\r\nb) Second Offense - revocation of Mayor\'s Permit\r\n4) After a period of thirty (30) days after an inspection has been made and the establishment is still not complying with the provision of this Ordinance, a fine of Two Thousand Five Hundred Pesos (Php 2,500.00) shall be paid plus a one (1) month suspension of business permit except, if the violation pertains to non-functionality of video cameras. In whish case, the suspension shall be effective until a compliant video camera system is operational.\r\n5) a fine of Two Thousand Five Hundred Pesos (Php 2,500.00) plus revocation of business permit when there is a continuous violation of the provisions of this ordinance.\r\n* Provided, that if any erring business establishment refuses or fails to pay the imposed fines within one (1) week from the issuance of notice of violation, its business permit shall be suspended until the penalty shall have been settled.  ', 'Section 15. Repealing Clause. All ordinances, executive orders and rules and regulations or parts thereof, contrary to or inconsistent with this Ordinance are hereby repealed or modified accordingly.\r\n\r\nSection 16. Separability Clause. If for any reason, any part or provision of this Ordinance is declared unconstitutional or invalid, the same shall not affect the validity and effectively of the other parts or provisions hereof.', 'Section 17. Effectivity Clause. This ordinance shall take effect fifteen (15) days after its publication in a newspaper of local circulation and posting in at east two (2) conspicuous places in the municipality for at least three (3) consecutive weeks.', 'CERTIFIED CORRECT:\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED TO BE DULY ENACTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer\r\n\r\nAPPROVED:\r\nHON. JOHN LLOYD M. PACETE\r\nMunicipal Mayor\r\n\r\nDate Submitted: 20 MAY 2024\r\nDate Approved: 23 MAY 2024\r\nDate Released: 23 MAY 2024', '../uploads/Municipal Ordinance No. 42-2024.pdf', '2024-08-29 20:14:23', '2024-08-29 20:15:15.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordinance_cat`
--

CREATE TABLE `ordinance_cat` (
  `ordinance_cat_id` int(255) NOT NULL,
  `ordinance_category_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordinance_cat`
--

INSERT INTO `ordinance_cat` (`ordinance_cat_id`, `ordinance_category_name`, `date_added`) VALUES
(2, 'Senior Citizens', '2024-06-03 18:51:20'),
(3, 'SK Annual Budget', '2024-06-03 18:51:32'),
(4, 'Supplemental Budget', '2024-06-03 18:51:36'),
(5, 'Security or Prevention', '2024-06-03 19:38:34'),
(6, 'Agriculture', '2024-08-29 18:21:50'),
(7, 'Animals Welfare', '2024-08-29 18:21:56'),
(8, 'Annual Budget', '2024-08-29 18:22:00'),
(9, 'Financial assistance', '2024-08-29 18:22:08'),
(10, 'Funds', '2024-08-29 18:22:13'),
(11, 'Financial Program', '2024-08-29 18:22:17'),
(12, 'Granting Authority', '2024-08-29 18:22:22'),
(13, 'Health', '2024-08-29 18:22:26'),
(14, 'Local Youth Development Council', '2024-08-29 18:22:35'),
(15, 'Budget', '2024-08-29 18:22:50'),
(16, 'Business', '2024-08-29 18:22:54'),
(17, 'Naming and Renaming', '2024-08-29 18:23:00'),
(18, 'Memorandum of Agreement', '2024-08-29 18:23:04'),
(19, 'Tourism', '2024-08-29 18:23:13'),
(20, 'Endorsing', '2024-08-29 18:37:47');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic`, `message`, `status`, `reason`, `date_added`) VALUES
(44, 10, 'Leash Laws', 'All dogs must be kept on a leash not exceeding 6 feet in length when in public places, except in designated off-leash areas. ', 1, '', '2024-08-29 21:58:31.170567'),
(45, 14, 'Use of Scholarship Funds', 'Funds awarded through the city\'s scholarship program must be used for tuition, books , or other educational expenses. Recipients are required to submit receipts or other proof of expenditure to the city within one year of receiving the scholarship.', 1, '', '2024-08-29 22:12:18.564334');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resolutions`
--

INSERT INTO `resolutions` (`resolution_id`, `user_id`, `resolution_cat_id`, `title`, `resolutionNo`, `whereasClauses`, `resolvingClauses`, `optionalClauses`, `approvalDetails`, `file`, `date_added`, `date_publish`, `status`) VALUES
(12, 1, 18, 'A RESOLUTION AUTHORIZING MUNICIPAL MAYOR HON. JOHN LLOYD M. PACETE\r\nTO ENTER INTO A MEMORANDUM OF AGREEMENT WITH THE BUGASONG\r\nMUNICIPAL POLICE STATION FOR THE IMPLEMENTATION OF PNP PROGRAMS,\r\nPROJECTS AND ACTIVITIES', 'Resolution No. 272 — 2024', 'WHEREAS, the council was in receipt of a letter from the Office of the Local Chief\r\nExecutive requesting authority to sign a Memorandum of Agreement with the Bugasong\r\nMunicipal Police Station for the implementation of programs, projects and activities;\r\n\r\nWHEREAS, the Bugasong Municipal Police Station exercises supervision and control\r\nfor the maintenance of peace and order in coordination with other law enforcement agencies\r\nto appropriately address the problems of criminality and internal security.\r\n\r\nWHEREAS, the program agreements focus on the adoption of Community and\r\nService-Oriented Policing System (CSOP), Development of POPS Plan/Integrated\r\nArea/Community Public Safety Plan, implementation of joint program, projects, services and\r\nactivities within the CSOP framework and adoption and implementation of other programs\r\nwhich can contribute to the enhancement of access to justice and delivery of justice services;\r\n\r\nWHEREFORE, upon motion by Hon. Van Hymler Dala as dul\r\nMarvin Rico, be it : i\r\n\r\nRESOLVED', 'WHEREFORE, upon motion by Hon. Van Hymler Dala as dul\r\nMarvin Rico, be it : i\r\n\r\nRESOLVED, as it is hereby RESOLVED to authorize the Local Chief Executive Hon\r\nJohn Lloyd M. Pacete for and in behalf of the Municipality of Bugasong to enter into a\r\nMemorandum of Agreement with the Bugasong Municipal Police Station for the\r\nimplementation of programs, projects and activities.\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of the Municipal Mayor and the Bugasong Municipal Police Station for information.\r\n', 'N/A', ' ARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFIED AS DULY ADOPTED:\r\n\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.272-2024.pdf', '2024-08-29 18:30:10', '2024-08-29 18:41:21.000000', 1),
(13, 1, 2, 'A RESOLUTION AUTHORIZING MUNICIPAL MAYOR JOHN LLOYD M. PACETE AS SIGNATORY\r\nTO A MEMORANDUM OF AGREEMENT WITH THE DEPARTMENT OF SOCIAL WELFARE AND\r\nDEVELOPMENT FOR THE IMPLEMENTATION OF SOCIAL PENSION PROGRAM TO INDIGENT\r\nSENIOR CITIZENS IN BUGASONG, ANTIQUE', 'Resolution No. 273 — 2024', 'WHEREAS, the council was in receipt of a letter request from the Local Chief Executive\r\nrequesting for the passage of resolution relative to a Memorandum of Agreement with the Department\r\nof Social Welfare and Development for the implementation of Social Pension Program to Indigent\r\nSenior Citizens;\r\n\r\nWHEREAS, to ensure the provision of cash subsidy in the form of social pension to be\r\nreleased on a quarterly basis, the LGU shall be partners of the national government in the expeditious\r\ndelivery of assistance to the senior citizens in every municipality;\r\n\r\nWHEREAS, recognizing the importance of the above-mentioned program, the body in session\r\nwas unanimous to grant authority to Municipal Mayor John Lloyd M. Pacete to enter into a\r\nMemorandum of Agreement with the Department of Social Welfare and Development for the purpose;\r\n\r\nWHEREFORE, on motion made by Hon. Jennifer Rose Tatoy as duly seconded by Hon. Edsel\r\nJames Capendit, ', 'be it\r\n\r\nRESOLVED, as it is hereby RESOLVED to authorize Municipal Mayor John Lloyd M. Pacete\r\nas signatory to a Memorandum of Agreement with the Department of Social Welfare and Development\r\nfor the implementation of Social Pension Program to Indigent Senior Citizens in Bugasong, Antique.\r\n\r\nRESOLVED FURTHER, that both parties hereby agreed to undertake the above program\r\nbased on the terms and conditions as stipulated in the Memorandum of Agreement.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of the Municipal Mayor and the\r\nDepartment of Social Welfare and Development Field Office, lloilo City for information and guidance.\r\n', 'N/A', 'ARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED  AND CERTIFIED AS DULY ADOPTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.273-2024.pdf', '2024-08-29 18:33:43', '2024-11-17 11:40:13.000000', 1),
(14, 1, 3, 'A RESOLUTION DECLARING AS OPERATIVE THE SK ANNUAL BUDGET FOR FY 2024\r\nOF BARANGAYS ARANGOTE AND LACAYON, ALL OF BUGASONG, ANTIQUE', 'Resolution No. 275 - 2024', 'WHEREAS, forwarded for legislative authorization of the Sangguniang Bayan is the\r\nSK Annual Budget for FY 2024 of Barangays Arangote and Lacayon;\r\n\r\nWHEREAS, finding the submitted SK Annual Budget to be in order and the same\r\ncomplied with the budgetary regulations, its operationalization is therefore granted based on\r\nthe preliminary review of the Local Finance Committee;\r\n\r\nWHEREFORE, upon motion by Hon. Gerardo Antoy and duly seconded by Hon.\r\nGeraldine Pesayco, be it\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to declare as operative the SK Annual\r\nBudget for FY 2024 of Barangays Arangote and Lacayon, all of Bugasong, Antique with its\r\ncorresponding appropriation to wit:\r\n\r\n_Barangay Amount si\r\n__ARANGOTE Php 214,932.80 __ |\r\n| LACAYON 297,196.30\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to SK Chairman of the above-\r\nmentioned barangays and the Local Finance Committee, all of Bugasong, Antique for\r\ninformation and guidance.\r\n\r\nAPPROVED', 'N/A', 'ARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED  AND CERTIFIED AS DULY ADOPTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.275-2024.pdf', '2024-08-29 18:34:44', '2024-08-29 18:41:29.000000', 1),
(15, 1, 8, 'A RESOLUTION DECLARING AS OPERATIVE THE ANNUAL BARANGAY BUDGET FOR\r\nFY 2024 OF BARANGAYS LACAYON AND PANGALCAGAN, BUGASONG, ANTIQUE', 'Resolution No. 276 — 2024', 'WHEREAS, the annual barangay budget are budgetary ordinances and fall within the\r\nmandatory review of the Sangguniang Bayan as prescribed by Section 57 of R.A. 7160;\r\n\r\nWHEREAS, the barangay budget reflects the operational expenditures of every\r\nbarangay in the municipality in line with the development effort of the municipal government;\r\n\r\nWHEREAS, finding the submitted annual budgets to be in order and the same\r\ncomplied with the budgetary regulations, its operationalization are therefore granted based\r\non the preliminary review of the Local Finance Committee;\r\n\r\nWHEREFORE, upon motion made by Hon. Gerardo Antoy and duly seconded by\r\nHon. Geraldine Pesayco, be it\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to declare as operative the Annual\r\nBarangay Budget for FY 2024 of Barangays Lacayon and Pangalcagan_ involving,\r\nappropriations of Php 2,971,963.00 and Php 3,789,293.00 respectively.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the above-mentioned barangays,\r\n\r\nthe members of the Local Finance Committee, all of Bugasong, Antique for guidance and\r\ninformation.\r\n\r\nUNANIMOUSLY', 'N/A', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED  AND CERTIFIED AS DULY ADOPTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.276-2024.jpg', '2024-08-29 18:35:41', '2024-08-29 18:41:31.000000', 1),
(16, 1, 3, 'A RESOLUTION DECLARING AS OPERATIVE THE SK ANNUAL BUDGET FOR FY 2024', 'Resolution No. 277 — 2024', 'WHEREAS, forwarded for legislative authorization of the Sangguniang Bayan is the\r\nSK Annual Budget for FY 2024 of Barangays Anilawan, Igbalangao, Igsoro and Jinalinan;\r\n\r\nWHEREAS, finding the submitted SK Annual Budget to be in order and the same\r\n\r\ncomplied with the budgetary regulations, its operationalization are therefore granted based\r\non the preliminary review of the Local Finance Committee;\r\n\r\nWHEREFORE, upon motion by Hon. Gerardo Antoy and duly seconded by Hon.\r\nJennifer Rose Tatoy, be it\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to declare as operative the SK Annual\r\nBudget for FY 2024 of Barangays Anilawan, Igbalangao, Igsoro and Jinalinan, all of\r\nBugasong, Antique with its corresponding appropriation to wit:\r\n\r\n[ Barangay Amount |\r\nANILAWAN Pip Aeai7eireo |\r\n\r\n| IGBALANGAO 354,182.00\r\nIGSORO 354,045.00 |\r\nJINALINAN [ 305,518.00\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to SK Chairman of the above-\r\nmentioned barangays and the Local Finance Committee, all of Bugasong, Antique for\r\n\r\ninformation and guidance.\r\n\r\nUNANIMOUSLY', 'N/A', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED  AND CERTIFIED AS DULY ADOPTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.277-2024.jpg', '2024-08-29 18:36:24', '2024-08-29 18:41:33.000000', 1),
(17, 1, 4, 'A RESOLUTION DECLARING AS OPERATIVE THE SUPPLEMENTAL BUDGET FOR FY\r\n2024 OF BARANGAYS IGBALANGAO AND TALISAY, ALL OF BUGASONG, ANTIQUE', 'Resolution No. 278 — 2024', 'WHEREAS, Section 57 paragraph (b) of R.A. 7160 otherwise known as the Local\r\n\r\nGovernment Code of 1991 prescribed the review of Barangay Ordinances by the\r\nSangguniang Bayan;\r\n\r\nWHEREAS, the Local Finance Committee duly signified as to the appropriateness\r\n\r\nand concurrence of the supplemental budget to the budget regulations and circular issued by\r\nthe Department of Budget and Management and the Commission on Audit;\r\n\r\nWHEREAS, finding the above-mentioned budgets to be in order, the Committee on\r\nFinance recommended for approval as the said budget did not run counter to the provisions\r\nof the Department of Budget and Management on Barangay Budgeting;\r\n\r\nWHEREFORE, upon motion by Hon. Gerardo Antoy and duly seconded by Hon.\r\nEdsel James Capendit, be it\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to declare as operative the Supplemental\r\n\r\nBudget for FY 2024 of Barangays Igbalangao and Talisay, all of Bugasong, Antique with its\r\ncorresponding appropriation to wit:\r\n\r\nBarangay | Supp. Budget No. Amount\r\nIGBALANGAO 01 Php 63,664.00\r\n_TALISAY 01 Z2225.00,\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the above-mentioned barangays\r\nand the Municipal Accountant, all of Bugasong, Antique for information and guidance.\r\n\r\nUNANIMOUSLY', 'N/A', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED  AND CERTIFIED AS DULY ADOPTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.278-2024.jpg', '2024-08-29 18:37:11', '2024-08-29 18:41:35.000000', 1),
(18, 1, 20, 'A RESOLUTION ENDORSING THE APPLICATION FOR COMMERCIAL SAND a\r\nGRAVEL (CSAG) QUARRY PERMIT OF EMILE ARSAGA WITHIN A SPECIFIED AR', 'Resolution No. 279 — 2024', 'WHEREAS, application for quarry permit of Emile Arsaga along Paliwan River in\r\nBarangay Igsoro as indorsed by the concerned barangay interposing no objection on the said\r\napplication was submitted to the Sangguniang Bayan for review and endorsement to the\r\nProvincial Environment and Natural Resources Office (PENRO);\r\n\r\nWHEREAS, the above-mentioned application was referred to the Chairman,\r\nCommittee on Environment and Natural Resources and upon proper scrutiny of the\r\ndocument, the committee was convinced that the applicant has complied all the requirements\r\npertinent thereto hence, it is recommended for endorsement:\r\n\r\nSilfredo Maghari, Jr., be it\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to favorably endorse the application for\r\nCommercial Sand and Gravel (CSAG) quarry permit of Emile Arsaga within a specified area\r\n\r\nalong Paliwan River, Barangay Igsoro, Bugasong, Antique.\r\n\r\nrelative to revenue generation and regulation as maybe deemed imposed by the\r\nSangguniang Bayan specifically on matters to environmental fees and charges within the\r\njurisdiction of quarry areas and transport activities.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to Emile Arsaga for information and\r\nguidance.\r\n\r\nUNANIMOUSLY', 'N/A', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED  AND CERTIFIED AS DULY ADOPTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No.279-2024.jpg', '2024-08-29 18:38:22', '2024-08-29 18:41:38.000000', 1),
(19, 1, 17, 'A RESOLUTION RENAMING THE BUGASONG RURAL HEALTH UNIT AS BUGASONG', 'Resolution No. 282 — 2024', 'WHEREAS, forwarded for legislative authorization of the Sangguniang Bayan is the\r\nendorsement letter from the Office of the Local Chief Executive for consideration and\r\n\r\nconcurrence;\r\n\r\nWHEREAS, pursuant to Section 17 of R.A. 7160, the Local Government Unit shall\r\nexercise powers and discharge functions and responsibilities necessary, appropriate and\r\nincidental to effective and efficient provision of basic services and facilities;\r\n\r\nWHEREAS, the Rural Health Unit has several functional facilities and aimed for the\r\nnext level of accreditation to cater on medical, birthing, dental, laboratory and basic\r\n\r\ndiagnostic health services;\r\n\r\nWHEREAS, to ensure the achievement of the health system goals for better and\r\nresponsive health outcomes, the council deemed it necessary and proper to rename the\r\nexisting facilities and shall be known as Bugasong Primary Care Facility;\r\n\r\nWHEREFORE, upon motion by Hon. Geraldine Pesayco as duly seconded by Hon.\r\nGerardo Antoy, be it,\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to rename the Bugasong Rural Health Unit\r\nas Bugasong Primary Care Facility.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of the Municipal Mayor,\r\nthe Municipal Health Officer for information and guidance.\r\n\r\nUNANIMOUSLY', 'N/A', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED  AND CERTIFIED AS DULY ADOPTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No. 282-2024.jpg', '2024-08-29 18:39:26', '2024-08-29 18:41:43.000000', 1),
(20, 1, 10, 'A RESOLUTION RESPECTFULLY REQUESTING HON. GOVERNOR RHODORA J.\r\nCADIAO TO ALLOCATE FUNDS IN THE AMOUNT OF FIVE MILLION PESOS\r\n(Php 5,000.000.00) FOR THE CONSTRUCTION OF MULTI-PURPOSE COVERED\r\nCOURT/IGYM WITH COMFORT ROOMS AT ANTIQUE VOCATIONAL SCHOOL,', 'Resolution No. 283 — 2024', 'WHEREAS, the proposed Multi-Purpose Covered Court/Gym at Antique Vocational\r\nSchool could be of great benefit to the students as they will have a venue for all socio-\r\ncultural activities and for all other educational events;\r\n\r\nWHEREAS, the space could also be utilized by the residents of Bugasong as\r\nevacuation areas during calamities;\r\n\r\nWHEREFORE, upon motion by Hon. Silfredo Maghari, Jr. as duly seconded by Hon.\r\nGeraldine Pesayco, be it\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to respectfully request Honorable Governor\r\nRhodora J. Cadiao to allocate funds in the amount of Five Million Pesos (Php 5,000.000.00)\r\nfor the Construction of Multi-Purpose Covered Court/Gym with Comfort Rooms at Antique\r\n\r\nVocational School, Bugasong, Antique.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of Governor Rhodora J.\r\nCadiao, San Jose, Antique for consideration.\r\n\r\nUNANIMOUSLY', 'N/A', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED  AND CERTIFIED AS DULY ADOPTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No. 283-2024.jpg', '2024-08-29 18:40:03', '2024-08-29 18:41:44.000000', 1),
(21, 1, 12, 'A RESOLUTION GRANTING AUTHORITY TO MUNICIPAL MAYOR JOHN LLOYD M.\r\nPACETE AND ACTING MUNICIPAL TREASURER JEANNE G. VARONA AS SIGNATORIES\r\nTO THE OPENING OF TRUST FUND — CURRENT ACCOUNT WITH THE DEVELOPMENT', 'Resolution No. 281 — 2024', 'WHEREAS, the council was in receipt of a letter request from the Local Chief Executive\r\nrequesting authority to open a Trust Fund — Current Account with the Development Bank of the\r\n\r\nPhilippines;\r\nWHEREAS, the opening of the said account will be used as Depository Account for all\r\nfunds transfer and releases from other LGUs, National Agencies and other Government Owned\r\n\r\nand Controlled Corporations or funds with specific purpose;\r\n\r\nWHEREAS, recognizing the importance of the above-mentioned program, the body in\r\nsession was unanimous to grant authority to Municipal Mayor John Lloyd M. Pacete and Acting\r\n\r\nMunicipal Treasurer Jeanne Varona for the purpose;\r\nWHEREFORE, on motion made by Hon. Gerardo Antoy as duly seconded by Hon.\r\n\r\nJennifer Rose Tatoy, be it\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to authorize Municipal Mayor John Lloyd M.\r\nPacete and Acting Municipal Treasurer Jeanne G. Varona as signatories to the opening Trust\r\nFund — Current Account with the Development Bank of the Philippines to be used as Depository\r\nAccount for all funds transfer and releases from other LGUs, National Agencies and other\r\n\r\nGovernment Owned and Controlled Corporations or funds with specific purpose.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Manager, Development Bank of\r\nthe Philippines San Jose, Antique Branch, the Office of the Municipal Mayor and the Acting\r\n\r\nMunicipal Treasurer, all of Bugasong, Antique for information and guidance.\r\n\r\nUNANIMOUSLY', 'N/A', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARACELI V. BANTOLO\r\nSecretary to Sangguniang Bayan\r\n\r\nATTESTED  AND CERTIFIED AS DULY ADOPTED:\r\nHON. SUSAN V. ESCOTE\r\nMunicipal Vice Mayor/Presiding Officer', '../uploads/Resolution No. 281-2024.jpg', '2024-08-29 18:41:12', '2024-08-29 18:41:41.000000', 1),
(22, 1, 20, 'A RESOLUTION FAVORABLE ENDORSING DRA. IRMA J. ADAYON AS AN\r\nADDITIONAL MEMBER OF THE PROVINCIAL HEALTH BOARD', 'Resolution No. 280 — 2024', 'WHEREAS, presented for consideration is the letter from the Local Chief Executive\r\nrequesting endorsement of Dra. Irma Adayon as additional member of the Provincial Health\r\n\r\nBoard;\r\n\r\nWHEREAS, pursuant to Section 19 of R.A. 11223, the integration of Local Health\r\nSystems into Province-wide Health System shall endeavor to integrate health systems into\r\nprovince-wide health systems Provided, that municipalities included in the province-wide\r\nhealth systems shall be entitled to a representative in the Provincial Health Board as the\r\n\r\ncase may be;\r\n\r\nWHEREAS, the representation of Municipal Health Officer jointly with the Municipal\r\nMayor affirms a more dynamic action for the promotion, protection and maintenance of\r\n\r\nhealth of the citizenry.\r\n\r\nWHEREFORE, upon motion by Hon. Jennifer Rose Tatoy as duly seconded by\r\nGeraldine Pesayco, be it,\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to endorse Dra. Irma Adayon as an\r\nadditional member of the Provincial Health Board.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of the Municipal Mayor,\r\nthe Municipal Health Officer and the Chairman of the Provincial Health Board for information\r\n\r\nand guidance.\r\n\r\nUNANIMOUSLY', 'N/A', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.\r\n\r\nARA! - BANTOLO\r\nSecretary Sangguniang Bayan\r\n\r\nATTESTED AND CERTIFIED AS DULY ADOPTED:\r\n\r\nMunicipal Vice May@r/Presiding Officer', '../uploads/Resolution No. 280-2024.pdf', '2024-08-30 16:06:01', '2024-11-17 10:06:25.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resolution_cat`
--

CREATE TABLE `resolution_cat` (
  `resolution_cat_id` int(255) NOT NULL,
  `resolution_category_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resolution_cat`
--

INSERT INTO `resolution_cat` (`resolution_cat_id`, `resolution_category_name`, `date_added`) VALUES
(2, 'Senior Citizens R', '2024-06-03 18:51:20'),
(3, 'SK Annual Budget R', '2024-06-03 18:51:32'),
(4, 'Supplemental Budget R', '2024-06-03 18:51:36'),
(5, 'Security or Prevention R', '2024-06-03 19:38:34'),
(6, 'Agriculture R', '2024-08-29 18:21:50'),
(7, 'Animals Welfare R', '2024-08-29 18:21:56'),
(8, 'Annual Budget R', '2024-08-29 18:22:00'),
(9, 'Financial assistance R', '2024-08-29 18:22:08'),
(10, 'Funds R', '2024-08-29 18:22:13'),
(11, 'Financial Program R', '2024-08-29 18:22:17'),
(12, 'Granting Authority R', '2024-08-29 18:22:22'),
(13, 'Health R', '2024-08-29 18:22:26'),
(14, 'Local Youth Development Council R', '2024-08-29 18:22:35'),
(15, 'Budget R', '2024-08-29 18:22:50'),
(16, 'Business R', '2024-08-29 18:22:54'),
(17, 'Naming and Renaming R', '2024-08-29 18:23:00'),
(18, 'Memorandum of Agreement R', '2024-08-29 18:23:04'),
(19, 'Tourism R', '2024-08-29 18:23:13'),
(20, 'Endorsing R', '2024-08-29 18:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `system_setting_id` int(255) NOT NULL,
  `system_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `document_view_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `log_history_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ordinances`
--
ALTER TABLE `ordinances`
  MODIFY `ordinance_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ordinance_cat`
--
ALTER TABLE `ordinance_cat`
  MODIFY `ordinance_cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
  MODIFY `resolution_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
