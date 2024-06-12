-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 03:44 PM
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
-- Table structure for table `ordinances`
--

CREATE TABLE `ordinances` (
  `ordinance_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `tag_id` int(255) NOT NULL,
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
  `status` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordinances`
--

INSERT INTO `ordinances` (`ordinance_id`, `user_id`, `tag_id`, `title`, `ordinanceNo`, `preamble`, `enactingClause`, `body`, `repealingClause`, `effectivityClause`, `enactmentDetails`, `file`, `date_added`, `status`) VALUES
(1, 1, 2, 'AN ORDINANCE AUTHORIZING THE ANNUAL BUDGET OF BUGASONG,\r\nANTIQUE FOR FISCAL YEAR 2022 IN THE TOTAL AMOUNT OF TWO HUNDRED\r\nFOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS\r\n(Php _204,423,040.00) COVERING THE VARIOUS EXPENDITURES FOR THE\r\nOPERATION OF THE GENERAL FUND AND THE TOTAL AMOUNT OF NINE\r\nMILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN', 'Ordinance No. 06- 2021 Pagel of 3', 'WHEREAS, the Annual Municipal Budget serves as the basis of operation, coordination\r\nand delivery of basic services, facilities and effective governance of the inhabitants in every\r\nmunicipality;\r\n\r\nWHEREAS, the Annual Budget of the municipality for Fiscal Year 2021 was submitted\r\nbefore the Sangguniang Bayan for review, consideration and approval specifying sources of\r\nrevenues available for appropriation;\r\n\r\nWHEREAS, after proper scrutiny, deliberations and thorough discussions of the items on\r\nthe said proposed budget, the same complied with the stipulations of Local Budget Circular No.\r\n112 dated June 10, 2016 as mandated by R. A. 7160 otherwise known as the New Local\r\nGovernment Code together with statutory and contractual obligations of the municipality,\r\nwhereby the same has been provided in the Annual General Fund of the Budget;', 'WHEREFORE, be it enacted, as it is hereby enacted, in session assembled that:', 'Section1. Annual Budget. The Annual Budget of Bugasong, Antique for Fiscal\n\nYear 2022 in the total amount of TWO HUNDRED FOUR MILLION FOUR HUNDRED\n\nENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) covering the various\n\nexpenditures for the operation of the GENERAL FUND and the total amount of NINE MILLION\n\nSIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS (Php\n\n9,620,927.00) covering the various expenditures for the operation of ECONOMIC REVENUE\nREGULATION AND GENERATION OFFICE (ERRGO) is hereby approved.\n\nAppropriation Ordinance No. 06- 2021 Pagel of 3\nAnnual Municipal Budget for FY 2022\nRepublic of the Philippines\n\nProvince of Antique\n\nOFFICE OF THE SANGGUNIANG BAYAN\nBugasong, Antique\n\nThe budget documents consisting of the following are incorporated herein and made an\nintegral part of this ordinance:\n\n1. Annual Investment Program\n2. Plantilla of Personnel; and\n\n3. Others\nSection 2. Receipts Program. The sources of funds for the Annual Budget shall be\nas follows:\n7 A. General Fund\nRECEIPTS AMOUNT\nLocal Sources Php 4,396,860.00\nOperating and Miscellaneous Revenue 1,949,937.00\nNational Tax Allotment 198,076,243.00\nTotal Available Resources 204,423,040.00\nB. ERRGO\nRECEIPTS AMOUNT\nIncome from Cemetery Php 20,000.00\n_ | Income from Market 5,235,050.00\nIncome from Slaughterhouse 750,000.00\nOther Business Income - 240,000.00\n— Subsidy from General Fund 3,375,877.00\nTotal Available Resources Php —_9,620,927.00\nSection 3. _ Expenditure Program. The amount of TWO HUNDRED FOUR MILLION\n~ FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) for\nthe General Fund and NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED\nTWENTY-SEVEN PESOS (Php 9,620,927.00) for ERRGO are hereby appropriated for the\n~ following expenditures:\nA. General Fund\n= EXPENDITURES AMOUNT\nPersonal Services 62,901,082.40\n| MOOE 78,950,849.96\n7 Capital Outlay 4,575,000.00\nSpecial Purpose Account 57,996,107.64\nTOTAL EXPENDITURES Php 204,423,040.00\nENDING BALANCE -0-\nB. ERRGO\n- EXPENDITURES AMOUNT\nPersonal Services Php 7,790,927.00\n_ MOOE 1,580,000.00\nCapital Outlay 250,000.00\nTOTAL EXPENDITURES 9,620,927.00\nENDING BALANCE Php -0-\n\nSection 4. Use of Savings and Augmentation. In accordance with Section 336 of\nRepublic Act No. 7160, the Local Government Code of 1991, the Mayor and the Presiding\n\nOfficer of the Sanggunian are authorized to augment any item in the approved annual budget\n\nfor their respective offices from savings in other items within the same expense class of their\nLa respective appropriations.\n\nAppropriation Ordinance No: 06- 2021\n_ Annu Municipal Budget for FY 2022\nRepublic of the Philippines\n\nProvince of Antique\n\nOFFICE OF THE SANGGUNIANG BAYAN\nBugasong, Antique\n\nSection 5. Priority in the Use of Personal Services Savings. Priority shall be given to\n\npersonnel benefits of local employees in the use of Personal Services savings.\n\nSection 6. That No Job Order charges shall be allowed against the following items: Aid\nto Youth, Aid to Tourism, Aid to Nutrition except when the project proposal stipulate the hiring of\n\nJob Order provided, that the allocation for Job Order charges will not exceed 30% of the total\namount, as a matter of fiscal safeguards of the herein stipulated objects for public spending.\n\nSection 7. Separability Clause. [f, for any reason, any Section or provision of\nAppropriation Ordinance is disallowed in Budget Review or declared invalid by proper\nauthorities, other Sections or provisions hereof that are not affected thereby shall continue to be\nin full force and effect.\n\nSection 8. Effectivity. The provisions of this Appropriation Ordinance shall take effect\nupon its approval.', 'TEST', 'TEST', 'TEST', '../uploads/ORDINANCE (POPS).pdf', '2024-06-06 20:06:12', 0),
(2, 1, 2, 'AN ORDINANCE AUTHORIZING THE ANNUAL BUDGET OF BUGASONG,\r\nANTIQUE FOR FISCAL YEAR 2022 IN THE TOTAL AMOUNT OF TWO HUNDRED\r\nFOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS\r\n(Php _204,423,040.00) COVERING THE VARIOUS EXPENDITURES FOR THE OPERATION OF THE GENERAL FUND AND THE TOTAL AMOUNT OF NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN', 'Ordinance No. 06- 2021 Pagel of 3', 'WHEREAS, the Annual Municipal Budget serves as the basis of operation, coordination and delivery of basic services, facilities and effective governance of the inhabitants in every municipality;\r\n\r\nWHEREAS, the Annual Budget of the municipality for Fiscal Year 2021 was submitted before the Sangguniang Bayan for review, consideration and approval specifying sources of revenues available for appropriation;\r\n\r\nWHEREAS, after proper scrutiny, deliberations and thorough discussions of the items on the said proposed budget, the same complied with the stipulations of Local Budget Circular No. 112 dated June 10, 2016 as mandated by R. A. 7160 otherwise known as the New Local\r\nGovernment Code together with statutory and contractual obligations of the municipality, whereby the same has been provided in the Annual General Fund of the Budget;', 'WHEREFORE, be it enacted, as it is hereby enacted, in session assembled that:', 'Section1. Annual Budget. The Annual Budget of Bugasong, Antique for Fiscal Year 2022 in the total amount of TWO HUNDRED FOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) covering the various expenditures for the operation of the GENERAL FUND and the total amount of NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS (Php 9,620,927.00) covering the various expenditures for the operation of ECONOMIC REVENUE REGULATION AND GENERATION OFFICE (ERRGO) is hereby approved.\n\nThe budget documents consisting of the following are incorporated herein and made an integral part of this ordinance:\n1. Annual Investment Program\n2. Plantilla of Personnel; and\n3. Others\n\nSection 2. Receipts Program. The sources of funds for the Annual Budget shall be\nas follows:\nA. General Fund RECEIPTS AMOUNT\nLocal Sources Php 4,396,860.00\nOperating and Miscellaneous Revenue 1,949,937.00 National Tax Allotment 198,076,243.00 Total Available Resources 204,423,040.00\nB. ERRGO RECEIPTS AMOUNT\nIncome from Cemetery Php 20,000.00\n_ | Income from Market 5,235,050.00\nIncome from Slaughterhouse 750,000.00\nOther Business Income - 240,000.00\n— Subsidy from General Fund 3,375,877.00\nTotal Available Resources Php —_9,620,927.00\n\nSection 3. _ Expenditure Program. The amount of TWO HUNDRED FOUR MILLION\n~ FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) for the General Fund and NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS (Php 9,620,927.00) for ERRGO are hereby appropriated for the\n~ following expenditures:\nA. General Fund\n= EXPENDITURES AMOUNT\nPersonal Services 62,901,082.40\n| MOOE 78,950,849.96\n7 Capital Outlay 4,575,000.00\nSpecial Purpose Account 57,996,107.64\nTOTAL EXPENDITURES Php 204,423,040.00\nENDING BALANCE -0-\nB. ERRGO\n- EXPENDITURES AMOUNT\nPersonal Services Php 7,790,927.00\n_ MOOE 1,580,000.00\nCapital Outlay 250,000.00\nTOTAL EXPENDITURES 9,620,927.00\nENDING BALANCE Php -0-\n\nSection 4. Use of Savings and Augmentation. In accordance with Section 336 of Republic Act No. 7160, the Local Government Code of 1991, the Mayor and the Presiding Officer of the Sanggunian are authorized to augment any item in the approved annual budget for their respective offices from savings in other items within the same expense class of their La respective appropriations.\n\nSection 5. Priority in the Use of Personal Services Savings. Priority shall be given to\npersonnel benefits of local employees in the use of Personal Services savings.\n\nSection 6. That No Job Order charges shall be allowed against the following items: Aid\nto Youth, Aid to Tourism, Aid to Nutrition except when the project proposal stipulate the hiring of Job Order provided, that the allocation for Job Order charges will not exceed 30% of the total amount, as a matter of fiscal safeguards of the herein stipulated objects for public spending.\n\nSection 7. Separability Clause. [f, for any reason, any Section or provision of\nAppropriation Ordinance is disallowed in Budget Review or declared invalid by proper authorities, other Sections or provisions hereof that are not affected thereby shall continue to be in full force and effect.\n\nSection 8. Effectivity. The provisions of this Appropriation Ordinance shall take effect\nupon its approval.', 'Repealing Clause', 'Effectivity Clause', 'Enactment Details', '../uploads/ORDINANCE (POPS).pdf', '2024-06-06 20:49:13', 0),
(4, 1, 3, 'AN ORDINANCE AUTHORIZING THE ANNUAL BUDGET OF BUGASONG,\r\nANTIQUE FOR FISCAL YEAR 2022 IN THE TOTAL AMOUNT OF TWO HUNDRED\r\nFOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS\r\n(Php _204,423,040.00) COVERING THE VARIOUS EXPENDITURES FOR THE\r\nOPERATION OF THE GENERAL FUND AND THE TOTAL AMOUNT OF NINE\r\nMILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN', 'Ordinance No. 06- 2021 Pagel of 3', 'WHEREAS, the Annual Municipal Budget serves as the basis of operation, coordination\r\nand delivery of basic services, facilities and effective governance of the inhabitants in every\r\nmunicipality;\r\n\r\nWHEREAS, the Annual Budget of the municipality for Fiscal Year 2021 was submitted\r\nbefore the Sangguniang Bayan for review, consideration and approval specifying sources of\r\nrevenues available for appropriation;\r\n\r\nWHEREAS, after proper scrutiny, deliberations and thorough discussions of the items on\r\nthe said proposed budget, the same complied with the stipulations of Local Budget Circular No.\r\n112 dated June 10, 2016 as mandated by R. A. 7160 otherwise known as the New Local\r\nGovernment Code together with statutory and contractual obligations of the municipality,\r\nwhereby the same has been provided in the Annual General Fund of the Budget;', 'WHEREFORE, be it enacted, as it is hereby enacted, in session assembled that:', 'Section1. Annual Budget. The Annual Budget of Bugasong, Antique for Fiscal\r\n\r\nYear 2022 in the total amount of TWO HUNDRED FOUR MILLION FOUR HUNDRED\r\n\r\nENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) covering the various\r\n\r\nexpenditures for the operation of the GENERAL FUND and the total amount of NINE MILLION\r\n\r\nSIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS (Php\r\n\r\n9,620,927.00) covering the various expenditures for the operation of ECONOMIC REVENUE\r\nREGULATION AND GENERATION OFFICE (ERRGO) is hereby approved.\r\n\r\nAppropriation Ordinance No. 06- 2021 Pagel of 3\r\nAnnual Municipal Budget for FY 2022\r\nRepublic of the Philippines\r\n\r\nProvince of Antique\r\n\r\nOFFICE OF THE SANGGUNIANG BAYAN\r\nBugasong, Antique\r\n\r\nThe budget documents consisting of the following are incorporated herein and made an\r\nintegral part of this ordinance:\r\n\r\n1. Annual Investment Program\r\n2. Plantilla of Personnel; and\r\n\r\n3. Others\r\nSection 2. Receipts Program. The sources of funds for the Annual Budget shall be\r\nas follows:\r\n7 A. General Fund\r\nRECEIPTS AMOUNT\r\nLocal Sources Php 4,396,860.00\r\nOperating and Miscellaneous Revenue 1,949,937.00\r\nNational Tax Allotment 198,076,243.00\r\nTotal Available Resources 204,423,040.00\r\nB. ERRGO\r\nRECEIPTS AMOUNT\r\nIncome from Cemetery Php 20,000.00\r\n_ | Income from Market 5,235,050.00\r\nIncome from Slaughterhouse 750,000.00\r\nOther Business Income - 240,000.00\r\n— Subsidy from General Fund 3,375,877.00\r\nTotal Available Resources Php —_9,620,927.00\r\nSection 3. _ Expenditure Program. The amount of TWO HUNDRED FOUR MILLION\r\n~ FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) for\r\nthe General Fund and NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED\r\nTWENTY-SEVEN PESOS (Php 9,620,927.00) for ERRGO are hereby appropriated for the\r\n~ following expenditures:\r\nA. General Fund\r\n= EXPENDITURES AMOUNT\r\nPersonal Services 62,901,082.40\r\n| MOOE 78,950,849.96\r\n7 Capital Outlay 4,575,000.00\r\nSpecial Purpose Account 57,996,107.64\r\nTOTAL EXPENDITURES Php 204,423,040.00\r\nENDING BALANCE -0-\r\nB. ERRGO\r\n- EXPENDITURES AMOUNT\r\nPersonal Services Php 7,790,927.00\r\n_ MOOE 1,580,000.00\r\nCapital Outlay 250,000.00\r\nTOTAL EXPENDITURES 9,620,927.00\r\nENDING BALANCE Php -0-\r\n\r\nSection 4. Use of Savings and Augmentation. In accordance with Section 336 of\r\nRepublic Act No. 7160, the Local Government Code of 1991, the Mayor and the Presiding\r\n\r\nOfficer of the Sanggunian are authorized to augment any item in the approved annual budget\r\n\r\nfor their respective offices from savings in other items within the same expense class of their\r\nLa respective appropriations.\r\n\r\nAppropriation Ordinance No: 06- 2021\r\n_ Annu Municipal Budget for FY 2022\r\nRepublic of the Philippines\r\n\r\nProvince of Antique\r\n\r\nOFFICE OF THE SANGGUNIANG BAYAN\r\nBugasong, Antique\r\n\r\nSection 5. Priority in the Use of Personal Services Savings. Priority shall be given to\r\n\r\npersonnel benefits of local employees in the use of Personal Services savings.\r\n\r\nSection 6. That No Job Order charges shall be allowed against the following items: Aid\r\nto Youth, Aid to Tourism, Aid to Nutrition except when the project proposal stipulate the hiring of\r\n\r\nJob Order provided, that the allocation for Job Order charges will not exceed 30% of the total\r\namount, as a matter of fiscal safeguards of the herein stipulated objects for public spending.\r\n\r\nSection 7. Separability Clause. [f, for any reason, any Section or provision of\r\nAppropriation Ordinance is disallowed in Budget Review or declared invalid by proper\r\nauthorities, other Sections or provisions hereof that are not affected thereby shall continue to be\r\nin full force and effect.\r\n\r\nSection 8. Effectivity. The provisions of this Appropriation Ordinance shall take effect\r\nupon its approval.', 'ss', 'sss', 'ss', '../uploads/ORDINANCE (POPS).pdf', '2024-06-06 20:55:13', 0),
(5, 1, 3, 'AN ORDINANCE AUTHORIZING THE ANNUAL BUDGET OF BUGASONG,\r\nANTIQUE FOR FISCAL YEAR 2022 IN THE TOTAL AMOUNT OF TWO HUNDRED\r\nFOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS\r\n(Php _204,423,040.00) COVERING THE VARIOUS EXPENDITURES FOR THE\r\nOPERATION OF THE GENERAL FUND AND THE TOTAL AMOUNT OF NINE\r\nMILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN', 'Ordinance No. 06- 2021 Pagel of 3', 'WHEREAS, the Annual Municipal Budget serves as the basis of operation, coordination\r\nand delivery of basic services, facilities and effective governance of the inhabitants in every\r\nmunicipality;\r\n\r\nWHEREAS, the Annual Budget of the municipality for Fiscal Year 2021 was submitted\r\nbefore the Sangguniang Bayan for review, consideration and approval specifying sources of\r\nrevenues available for appropriation;\r\n\r\nWHEREAS, after proper scrutiny, deliberations and thorough discussions of the items on\r\nthe said proposed budget, the same complied with the stipulations of Local Budget Circular No.\r\n112 dated June 10, 2016 as mandated by R. A. 7160 otherwise known as the New Local\r\nGovernment Code together with statutory and contractual obligations of the municipality,\r\nwhereby the same has been provided in the Annual General Fund of the Budget;', 'WHEREFORE, be it enacted, as it is hereby enacted, in session assembled that:', 'Section1. Annual Budget. The Annual Budget of Bugasong, Antique for Fiscal\r\n\r\nYear 2022 in the total amount of TWO HUNDRED FOUR MILLION FOUR HUNDRED\r\n\r\nENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) covering the various\r\n\r\nexpenditures for the operation of the GENERAL FUND and the total amount of NINE MILLION\r\n\r\nSIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS (Php\r\n\r\n9,620,927.00) covering the various expenditures for the operation of ECONOMIC REVENUE\r\nREGULATION AND GENERATION OFFICE (ERRGO) is hereby approved.\r\n\r\nAppropriation Ordinance No. 06- 2021 Pagel of 3\r\nAnnual Municipal Budget for FY 2022\r\nRepublic of the Philippines\r\n\r\nProvince of Antique\r\n\r\nOFFICE OF THE SANGGUNIANG BAYAN\r\nBugasong, Antique\r\n\r\nThe budget documents consisting of the following are incorporated herein and made an\r\nintegral part of this ordinance:\r\n\r\n1. Annual Investment Program\r\n2. Plantilla of Personnel; and\r\n\r\n3. Others\r\nSection 2. Receipts Program. The sources of funds for the Annual Budget shall be\r\nas follows:\r\n7 A. General Fund\r\nRECEIPTS AMOUNT\r\nLocal Sources Php 4,396,860.00\r\nOperating and Miscellaneous Revenue 1,949,937.00\r\nNational Tax Allotment 198,076,243.00\r\nTotal Available Resources 204,423,040.00\r\nB. ERRGO\r\nRECEIPTS AMOUNT\r\nIncome from Cemetery Php 20,000.00\r\n_ | Income from Market 5,235,050.00\r\nIncome from Slaughterhouse 750,000.00\r\nOther Business Income - 240,000.00\r\n— Subsidy from General Fund 3,375,877.00\r\nTotal Available Resources Php —_9,620,927.00\r\nSection 3. _ Expenditure Program. The amount of TWO HUNDRED FOUR MILLION\r\n~ FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) for\r\nthe General Fund and NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED\r\nTWENTY-SEVEN PESOS (Php 9,620,927.00) for ERRGO are hereby appropriated for the\r\n~ following expenditures:\r\nA. General Fund\r\n= EXPENDITURES AMOUNT\r\nPersonal Services 62,901,082.40\r\n| MOOE 78,950,849.96\r\n7 Capital Outlay 4,575,000.00\r\nSpecial Purpose Account 57,996,107.64\r\nTOTAL EXPENDITURES Php 204,423,040.00\r\nENDING BALANCE -0-\r\nB. ERRGO\r\n- EXPENDITURES AMOUNT\r\nPersonal Services Php 7,790,927.00\r\n_ MOOE 1,580,000.00\r\nCapital Outlay 250,000.00\r\nTOTAL EXPENDITURES 9,620,927.00\r\nENDING BALANCE Php -0-\r\n\r\nSection 4. Use of Savings and Augmentation. In accordance with Section 336 of\r\nRepublic Act No. 7160, the Local Government Code of 1991, the Mayor and the Presiding\r\n\r\nOfficer of the Sanggunian are authorized to augment any item in the approved annual budget\r\n\r\nfor their respective offices from savings in other items within the same expense class of their\r\nLa respective appropriations.\r\n\r\nAppropriation Ordinance No: 06- 2021\r\n_ Annu Municipal Budget for FY 2022\r\nRepublic of the Philippines\r\n\r\nProvince of Antique\r\n\r\nOFFICE OF THE SANGGUNIANG BAYAN\r\nBugasong, Antique\r\n\r\nSection 5. Priority in the Use of Personal Services Savings. Priority shall be given to\r\n\r\npersonnel benefits of local employees in the use of Personal Services savings.\r\n\r\nSection 6. That No Job Order charges shall be allowed against the following items: Aid\r\nto Youth, Aid to Tourism, Aid to Nutrition except when the project proposal stipulate the hiring of\r\n\r\nJob Order provided, that the allocation for Job Order charges will not exceed 30% of the total\r\namount, as a matter of fiscal safeguards of the herein stipulated objects for public spending.\r\n\r\nSection 7. Separability Clause. [f, for any reason, any Section or provision of\r\nAppropriation Ordinance is disallowed in Budget Review or declared invalid by proper\r\nauthorities, other Sections or provisions hereof that are not affected thereby shall continue to be\r\nin full force and effect.\r\n\r\nSection 8. Effectivity. The provisions of this Appropriation Ordinance shall take effect\r\nupon its approval.', 'TEST', 'TEST', 'TEST', '../uploads/ORDINANCE (POPS).pdf', '2024-06-08 15:35:37', 0),
(6, 1, 5, 'AN ORDINANCE AUTHORIZING THE ANNUAL BUDGET OF BUGASONG,\r\nANTIQUE FOR FISCAL YEAR 2022 IN THE TOTAL AMOUNT OF TWO HUNDRED\r\nFOUR MILLION FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS\r\n(Php _204,423,040.00) COVERING THE VARIOUS EXPENDITURES FOR THE\r\nOPERATION OF THE GENERAL FUND AND THE TOTAL AMOUNT OF NINE\r\nMILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN', 'Ordinance No. 06- 2021 Pagel of 3', 'WHEREAS, the Annual Municipal Budget serves as the basis of operation, coordination\r\nand delivery of basic services, facilities and effective governance of the inhabitants in every\r\nmunicipality;\r\n\r\nWHEREAS, the Annual Budget of the municipality for Fiscal Year 2021 was submitted\r\nbefore the Sangguniang Bayan for review, consideration and approval specifying sources of\r\nrevenues available for appropriation;\r\n\r\nWHEREAS, after proper scrutiny, deliberations and thorough discussions of the items on\r\nthe said proposed budget, the same complied with the stipulations of Local Budget Circular No.\r\n112 dated June 10, 2016 as mandated by R. A. 7160 otherwise known as the New Local\r\nGovernment Code together with statutory and contractual obligations of the municipality,\r\nwhereby the same has been provided in the Annual General Fund of the Budget;', 'WHEREFORE, be it enacted, as it is hereby enacted, in session assembled that:', 'Section1. Annual Budget. The Annual Budget of Bugasong, Antique for Fiscal\r\n\r\nYear 2022 in the total amount of TWO HUNDRED FOUR MILLION FOUR HUNDRED\r\n\r\nENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) covering the various\r\n\r\nexpenditures for the operation of the GENERAL FUND and the total amount of NINE MILLION\r\n\r\nSIX HUNDRED TWENTY THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS (Php\r\n\r\n9,620,927.00) covering the various expenditures for the operation of ECONOMIC REVENUE\r\nREGULATION AND GENERATION OFFICE (ERRGO) is hereby approved.\r\n\r\nAppropriation Ordinance No. 06- 2021 Pagel of 3\r\nAnnual Municipal Budget for FY 2022\r\nRepublic of the Philippines\r\n\r\nProvince of Antique\r\n\r\nOFFICE OF THE SANGGUNIANG BAYAN\r\nBugasong, Antique\r\n\r\nThe budget documents consisting of the following are incorporated herein and made an\r\nintegral part of this ordinance:\r\n\r\n1. Annual Investment Program\r\n2. Plantilla of Personnel; and\r\n\r\n3. Others\r\nSection 2. Receipts Program. The sources of funds for the Annual Budget shall be\r\nas follows:\r\n7 A. General Fund\r\nRECEIPTS AMOUNT\r\nLocal Sources Php 4,396,860.00\r\nOperating and Miscellaneous Revenue 1,949,937.00\r\nNational Tax Allotment 198,076,243.00\r\nTotal Available Resources 204,423,040.00\r\nB. ERRGO\r\nRECEIPTS AMOUNT\r\nIncome from Cemetery Php 20,000.00\r\n_ | Income from Market 5,235,050.00\r\nIncome from Slaughterhouse 750,000.00\r\nOther Business Income - 240,000.00\r\n— Subsidy from General Fund 3,375,877.00\r\nTotal Available Resources Php —_9,620,927.00\r\nSection 3. _ Expenditure Program. The amount of TWO HUNDRED FOUR MILLION\r\n~ FOUR HUNDRED TWENTY-THREE THOUSAND FORTY PESOS (Php 204,423,040.00) for\r\nthe General Fund and NINE MILLION SIX HUNDRED TWENTY THOUSAND NINE HUNDRED\r\nTWENTY-SEVEN PESOS (Php 9,620,927.00) for ERRGO are hereby appropriated for the\r\n~ following expenditures:\r\nA. General Fund\r\n= EXPENDITURES AMOUNT\r\nPersonal Services 62,901,082.40\r\n| MOOE 78,950,849.96\r\n7 Capital Outlay 4,575,000.00\r\nSpecial Purpose Account 57,996,107.64\r\nTOTAL EXPENDITURES Php 204,423,040.00\r\nENDING BALANCE -0-\r\nB. ERRGO\r\n- EXPENDITURES AMOUNT\r\nPersonal Services Php 7,790,927.00\r\n_ MOOE 1,580,000.00\r\nCapital Outlay 250,000.00\r\nTOTAL EXPENDITURES 9,620,927.00\r\nENDING BALANCE Php -0-\r\n\r\nSection 4. Use of Savings and Augmentation. In accordance with Section 336 of\r\nRepublic Act No. 7160, the Local Government Code of 1991, the Mayor and the Presiding\r\n\r\nOfficer of the Sanggunian are authorized to augment any item in the approved annual budget\r\n\r\nfor their respective offices from savings in other items within the same expense class of their\r\nLa respective appropriations.\r\n\r\nAppropriation Ordinance No: 06- 2021\r\n_ Annu Municipal Budget for FY 2022\r\nRepublic of the Philippines\r\n\r\nProvince of Antique\r\n\r\nOFFICE OF THE SANGGUNIANG BAYAN\r\nBugasong, Antique\r\n\r\nSection 5. Priority in the Use of Personal Services Savings. Priority shall be given to\r\n\r\npersonnel benefits of local employees in the use of Personal Services savings.\r\n\r\nSection 6. That No Job Order charges shall be allowed against the following items: Aid\r\nto Youth, Aid to Tourism, Aid to Nutrition except when the project proposal stipulate the hiring of\r\n\r\nJob Order provided, that the allocation for Job Order charges will not exceed 30% of the total\r\namount, as a matter of fiscal safeguards of the herein stipulated objects for public spending.\r\n\r\nSection 7. Separability Clause. [f, for any reason, any Section or provision of\r\nAppropriation Ordinance is disallowed in Budget Review or declared invalid by proper\r\nauthorities, other Sections or provisions hereof that are not affected thereby shall continue to be\r\nin full force and effect.\r\n\r\nSection 8. Effectivity. The provisions of this Appropriation Ordinance shall take effect\r\nupon its approval.', 'TEST', 'TEST', 'TEST', '', '2024-06-08 15:40:37', 0);

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
(126, 10, 5, 'disliked', '2024-06-11 21:52:03'),
(128, 5, 5, 'disliked', '2024-06-11 22:07:39'),
(141, 9, 5, 'liked', '2024-06-11 22:19:26'),
(145, 6, 5, 'liked', '2024-06-11 22:21:38'),
(146, 7, 5, 'disliked', '2024-06-11 22:22:03'),
(148, 12, 5, 'liked', '2024-06-11 22:24:53'),
(150, 3, 5, 'disliked', '2024-06-12 19:18:55'),
(152, 14, 5, 'disliked', '2024-06-12 19:26:54'),
(154, 13, 5, 'liked', '2024-06-12 19:27:01'),
(155, 11, 5, 'disliked', '2024-06-12 19:41:47'),
(156, 4, 5, 'disliked', '2024-06-12 19:44:51'),
(157, 9, 6, 'liked', '2024-06-12 21:34:13'),
(158, 4, 6, 'disliked', '2024-06-12 21:34:20');

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
(9, 1, 5, 'A RESOLUTION AUTHORIZING MUNICIPAL MAYOR JOHN LLOYD M. PACETE AS\r\na SIGNATORY TO A MEMORANDUM OF AGREEMENT WITH THE DEPARTMENT OF\r\n7 HEALTH-WESTERN VISAYAS CENTER FOR HEALTH DEVELOPMENT FOR THE\r\nGRANTING OF HEALTH EMERGENCY ALLOWANCE TO HEALTH CARE AND NON-\r\nHEALTH CARE WORKERS', 'Resolution No. 248 — 2024', 'WHEREAS, RA 11712 known as the Public Health Emergency Benefits and\nAllowances for Health Care Workers provides for the payment of health emergency\nallowance, sickness and death compensation and other benefits for public and private health\ncare workers and non-health care workers during COVID-19 pandemic;\n\nWHEREAS, the Department of Health shall transfer funds to LGU for the grant of\nhealth emergency allowance to eligible health care workers and non-health care workers;\n\nWHEREFORE, upon motion by Hon. Jennifer Rose Tatoy and duly seconded en Pa\n\nmasse, be it i\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to grant authority to Municipal Mayor John\r\nLloyd M. Pacete as signatory to a Memorandum of Agreement with the Lange =.\r\nHealth-Western Visayas Center for Health Development for the granting Health mt\r\nEmergency Allowance to health care and non-health workers.\r\ni ed to undertake the above |\r\nRESOLVED FURTHER, that both parties agre\r\nbased on the terms and conditions as stipulated in the Memorandum of Agreement. “7\r\nRESOLVED FINALLY, to furnish a copy: hereof to the oe the Municipal\r\nand the Rural Health Physician, Bugasong, Antique and the ppb Visayas |\r\nfor Health Development, Iloilo City for information and guidance k\r\n\r\nUNANIMOUSLY', '', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of\r\n\r\nthe foregoing resolution.', '../uploads/442650283_1280175949612730_5370110906241116354_n.jpg', '2024-06-02 12:57:21', 1),
(10, 1, 4, 'test 1', 'Resolution No. 251 — 2024', 'WHEREAS, the Sangguniang Kabataan (SK) operates in consonance with its\r\nfunctions and responsibilities as stipulated in Republic Act No. 10742 otherwise known as\r\nSangguniang Kabataan Reform Act of 2015, as amended by Republic Act No. 11768;\r\n\r\n\' WHEREAS, the Municipality of Bugasong acknowledges the vital role of the youth in\r\nnation building and its mandate in providing opportunities for their voices to be amplified in\r\nany programs in the locality;\r\n\r\nWHEREAS, to fully enable them to facilitate meetings, planning and mobilization of\r\nresources in the service delivery of youth centered programs, there is a need to have their\r\nown Sangguniang Kabataan building;\r\n\r\nWHEREAS, the Hon. Congressman Antonio Agapito “AA” B. Legarda, Jr is very\r\nsupportive of the advocacies and programs of the SK as manifested on the funded projects\r\npertaining to youth education, leadership and empowerment;\r\n\r\nWHEREFORE upon motion by SKMF John Alrich Vincent Magaro and duly seconded\r\nby Hon. Silfredo Maghari, Jr., be it\r\n\r\nRESOLVED', 'RESOLVED, as it is hereby RESOLVED to respectfully request Congressman\r\nAntonio Agapito “AA” Legarda for fund allocation in the amount of TEN MILLION Pesos for\r\nthe construction of Sangguniang Kabataan Building in the Municipality of Bugasong, Antique.\r\n\r\nRESOLVED FINALLY, to furnish a copy hereof to the Office of Congressman Antonio\r\nAgapito B. Legarda, San Jose, Antique for information and guidance of action, \"\r\n\r\nUNANIMOUSLY', '', 'UNANIMOUSLY APPROVED.\r\n| HEREBY CERTIFY to the correctness of the foregoing resolution.', '../uploads/442669547_370288385500501_7669609671883454448_n.jpg', '2024-06-02 15:33:34', 1),
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
  `user_type` varchar(255) NOT NULL DEFAULT 'citizen',
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `password`, `status`, `user_type`, `date_added`) VALUES
(1, 'BLTS Admin', 'bltsadmin@blts.com', 'admin', '$2y$10$RR/O6CpKiL8O29XXOq1gpu.ChW9cNHU/JbVQkHO93HwDLkYiHuvZ2', 0, 'admin', '2024-06-08 16:10:38'),
(5, 'test member', 'testmember1@gmail.com', 'testmember1', '$2y$10$TgHtplHst90abiQdVVSWA.crlvr.2zw89Efh/y/6Guno.p8rJEp7i', 0, 'citizen', '2024-06-08 16:10:38'),
(6, 'test member 2', 'testmember2@gmail.com', 'testmember2', '$2y$10$4jC4V10ZYgzfm8RN/nMnbui.7XkOH7S39zaeK5ArpAhLMMi/6WsR6', 0, 'citizen', '2024-06-08 16:10:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordinances`
--
ALTER TABLE `ordinances`
  ADD PRIMARY KEY (`ordinance_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`post_comment_id`);

--
-- Indexes for table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD PRIMARY KEY (`post_reaction_id`);

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
-- AUTO_INCREMENT for table `ordinances`
--
ALTER TABLE `ordinances`
  MODIFY `ordinance_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `post_comment_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_reactions`
--
ALTER TABLE `post_reactions`
  MODIFY `post_reaction_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

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
