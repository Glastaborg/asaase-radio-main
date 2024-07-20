-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 02:01 PM
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
-- Database: `asaase_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` bigint(20) NOT NULL,
  `activity_name` varchar(200) NOT NULL,
  `activity_date` date NOT NULL,
  `assignment` varchar(200) NOT NULL,
  `estimates` varchar(200) NOT NULL,
  `activity_status` enum('Pending','Ongoing','Completed') NOT NULL,
  `observation` varchar(200) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `department` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `archive_act` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `activity_name`, `activity_date`, `assignment`, `estimates`, `activity_status`, `observation`, `end_date`, `department`, `branch`, `archive_act`) VALUES
(1, 'Home', '2020-10-05', 'sstoute0@usda.gov', 'Construction Foreman', 'Completed', NULL, NULL, 'News', 'Kumasi', 'No'),
(2, 'Music', '2020-11-27', 'rbishell1@google.ru', 'Project Manager', 'Ongoing', NULL, NULL, 'News', 'Accra', 'No'),
(6, 'Beauty', '2021-04-02', 'khosten5@upenn.edu', 'Estimator', 'Pending', NULL, NULL, 'News', 'Kumasi', 'No'),
(10, 'Industrial', '2021-06-09', 'tbento9@elpais.com', 'Construction Worker', 'Completed', 'Universal stable contingency', '2021-06-24', 'News', 'Accra', 'No'),
(11, 'Grocery', '2021-03-12', 'omacilraitha@ucla.edu', 'Construction Expeditor', 'Pending', NULL, NULL, 'Sales', 'Kumasi', 'No'),
(12, 'Baby', '2020-12-25', 'lolenovb@spotify.com', 'Surveyor', 'Completed', 'Focused needs-based paradigm', '2021-08-14', 'News', 'Kumasi', 'No'),
(16, 'Tools', '2021-05-13', 'cclusef@google.ru', 'Construction Foreman', 'Ongoing', NULL, NULL, 'Sales', 'Accra', 'No'),
(17, 'Beauty', '2021-01-04', 'apoverg@gmpg.org', 'Construction Worker', 'Pending', NULL, NULL, 'News', 'Accra', 'No'),
(19, 'Jewelry', '2021-03-19', 'eyousteri@irs.gov', 'Supervisor', 'Ongoing', NULL, NULL, 'News', 'Accra', 'No'),
(20, 'Jewelry', '2021-02-26', 'mstickellsj@macromedia.com', 'Estimator', 'Completed', 'Multi-lateral multi-state matrices', '2020-12-29', 'Sales', 'Accra', 'No'),
(21, 'Music', '2021-06-14', 'khaink@yellowpages.com', 'Project Manager', 'Completed', 'fgfbgf', '2020-10-21', 'News', 'Accra', 'No'),
(22, 'Home', '2021-02-18', 'jforcel@w3.org', 'Construction Foreman', 'Ongoing', 'Customer-focused interactive protocol', '2021-06-24', 'Sales', 'Kumasi', 'No'),
(23, 'Sports', '2021-04-13', 'mmcduffm@harvard.edu', 'Supervisor', 'Pending', 'Implemented asynchronous adapter', '2021-07-24', 'News', 'Kumasi', 'No'),
(24, 'Grocery', '2021-06-08', 'lmustarden@sfgate.com', 'Estimator', 'Ongoing', NULL, NULL, 'Sales', 'Kumasi', 'No'),
(25, 'Home', '2021-03-24', 'dwillersono@vimeo.com', 'Project Manager', 'Ongoing', 'Networked local system engine', '2021-06-04', 'News', 'Accra', 'No'),
(26, 'Games', '2021-08-29', 'nocurranep@si.edu', 'Architect', 'Pending', NULL, NULL, 'Sales', 'Kumasi', 'No'),
(27, 'Computers', '2021-01-16', 'bbursnallq@miibeian.gov.cn', 'Surveyor', 'Completed', 'Total coherent support', '2021-03-14', 'News', 'Kumasi', 'No'),
(28, 'Outdoors', '2020-10-15', 'kfreiburgerr@istockphoto.com', 'Construction Manager', 'Completed', 'scvklkvk', '2021-11-15', 'Sales', 'Accra', 'No'),
(29, 'Automotive', '2021-09-17', 'acorsors@example.com', 'Estimator', 'Pending', 'Centralized clear-thinking neural-net', '2021-02-11', 'Sales', 'Accra', 'No'),
(30, 'Games', '2020-11-13', 'wcolquerant@senate.gov', 'Construction Expeditor', 'Pending', 'Re-contextualized next generation attitude', '2020-12-01', 'Sales', 'Kumasi', 'No'),
(33, '222', '2021-12-02', '2222', '22', 'Completed', 'sssssss', '2021-11-20', 'Marketing', 'Accra', 'No'),
(20211109113538, '1212111', '2021-11-11', '111223', '44', 'Completed', '111', '2021-11-24', 'Finance', 'Accra', 'No'),
(20211109114051, 'Advertising', '2021-11-12', 'dfdvdf', '44', 'Ongoing', NULL, '2021-11-08', 'Finance', 'Admin', 'No'),
(20211109114154, 'try', '2021-11-11', 'fdvsd', '333', 'Completed', NULL, NULL, 'Finance', 'Admin', 'No'),
(20211109125546, 'test', '2021-11-09', 'test', 'test', 'Completed', NULL, NULL, 'Finance', 'Accra', 'No'),
(20211109125640, 'test', '2021-11-09', 'test', 'test', 'Completed', NULL, NULL, 'Finance', 'Accra', 'No'),
(20211109125704, 'test', '2021-11-09', 'test', 'test', 'Completed', NULL, NULL, 'Finance', 'Accra', 'No'),
(20211109154902, '1232321111111111111111111111111', '2021-11-09', '111111111', 'hchfgh', 'Pending', NULL, NULL, 'Admin', 'Accra', 'No'),
(20211109160455, 'Advertising', '2021-11-09', 'dgsdgdgbd', '22', 'Pending', NULL, NULL, 'Admin', 'Accra', 'No'),
(20211112082205, 't56t6', '2021-11-13', 'onfgolnoldf', '1000', 'Pending', NULL, NULL, 'Finance', 'Accra', 'Yes'),
(20211112084930, 'Ash Test Pen', '2021-11-12', 'Ash Test Pen', '1000', 'Pending', NULL, NULL, 'News', 'Accra', 'Yes'),
(20211112111507, 'Sales Test', '2021-11-14', 'Sales Test', '1002', 'Completed', 'hvdsvhv', '2021-12-01', 'Sales', 'Accra', 'Yes'),
(20211124173035, 'new', '2021-11-24', 'dvxzv xv c', '1000', 'Pending', NULL, NULL, 'Finance', 'Accra', 'Yes'),
(20211124191603, 'dffvv', '2021-11-24', 'fvdfvfvdfv', '1000', 'Pending', NULL, NULL, 'HR', 'Accra', 'No'),
(20211209125903, 'wefssd', '2021-12-09', 'dvdfxbv xbv', '1000', 'Pending', NULL, '2021-12-09', 'HR', 'Accra', 'Yes'),
(20211209170640, 'dsdvc', '2021-12-09', 'tyhytytn', '1000', 'Pending', NULL, NULL, 'Office Management', 'Accra', 'No'),
(20211209171034, 'test', '2021-12-09', 'fefefe', '1000', 'Completed', 'dfvdvdf', '2021-12-09', 'Office Management', 'Accra', 'Yes'),
(20220202104414, 'rtgsdf', '2022-02-02', 'gdgdg', '10000', 'Pending', NULL, NULL, 'Finance', 'Kumasi', 'No'),
(20220805105557, 'test est', '2022-08-05', 'test test1', '1000', 'Pending', NULL, NULL, 'HR', 'Accra', 'No'),
(20240530225026, 'sport', '2024-05-30', 'Work', '1000', 'Ongoing', 'good', '2024-05-31', 'Marketing', 'Cape Coast', '');

-- --------------------------------------------------------

--
-- Table structure for table `activity_budget`
--

CREATE TABLE `activity_budget` (
  `activity_budget_id` int(11) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `budget` decimal(10,2) NOT NULL,
  `budget_status` varchar(200) NOT NULL,
  `applied_date` date NOT NULL,
  `archive_activity_budget` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity_budget`
--

INSERT INTO `activity_budget` (`activity_budget_id`, `activity_id`, `budget`, `budget_status`, `applied_date`, `archive_activity_budget`) VALUES
(3, 1, 20000.00, 'Pending', '2022-01-07', 'No'),
(4, 2, 10000.00, 'Declined', '2022-01-07', 'No'),
(5, 2, 25000.00, 'Pending', '2022-01-07', 'Yes'),
(6, 17, 15000.00, 'Pending', '2022-01-07', 'No'),
(7, 23, 30000.00, 'Pending', '2022-01-07', 'No'),
(8, 20211124191603, 20000.00, 'Approved', '2022-01-07', 'No'),
(9, 28, 10000.00, 'Approved', '2022-01-07', 'No'),
(10, 20220805105557, 20000.00, 'Pending', '2022-08-05', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `annual_expense`
--

CREATE TABLE `annual_expense` (
  `ann_exp_id` int(11) NOT NULL,
  `annual_amount` decimal(10,2) NOT NULL,
  `exp_year` year(4) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `archive_exp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `annual_expense`
--

INSERT INTO `annual_expense` (`ann_exp_id`, `annual_amount`, `exp_year`, `branch`, `archive_exp`) VALUES
(1, 2000000.00, '2022', 'Accra', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` char(15) NOT NULL,
  `cv_name` text NOT NULL,
  `cv_file` blob NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `applied_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `fullname`, `email`, `phone`, `cv_name`, `cv_file`, `vacancy_id`, `applied_date`) VALUES
(1, 'Test Apply', 'testapply@a.com', '0202020202', '18082022150346evaluation.pdf', 0x31383038323032323135303334366576616c756174696f6e2e706466, 4, '2022-08-18 13:03:46'),
(2, 'Test Apply', 'testapply@a.com', '0202020202', '18-08-2022-150506evaluation.pdf', 0x31382d30382d323032322d3135303530366576616c756174696f6e2e706466, 4, '2022-08-18 13:05:06'),
(3, 'Test Apply', 'testapply@a.com', '0202020202', '18-08-2022-150515-evaluation.pdf', 0x31382d30382d323032322d3135303531352d6576616c756174696f6e2e706466, 4, '2022-08-18 13:05:15'),
(4, 'Test Apply', 'testapply@a.com', '0202020202', '18-08-2022-150603evaluation.pdf', 0x31382d30382d323032322d3135303630336576616c756174696f6e2e706466, 4, '2022-08-18 13:06:03'),
(5, 'Testing again', 'ta@a.com', '1234567893', '18-08-2022-153547appraisal.pdf', 0x31382d30382d323032322d31353335343761707072616973616c2e706466, 2, '2022-08-18 13:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` varchar(200) NOT NULL,
  `asset` text NOT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `asset_type` varchar(200) NOT NULL,
  `archive_asset` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `asset`, `date`, `branch`, `asset_type`, `archive_asset`) VALUES
('245265366785', 'MicrophoneD', '2021-11-25', 'Accra', 'Equipment', 'Yes'),
('AS-451-21', 'Kia Picato', '2021-11-24', 'Kumasi', 'Vehicle', 'No'),
('GA-1202-21', 'Toyata Vitz', '2021-12-16', 'Accra', 'Vehicle', 'No'),
('GT-1021-20', 'Toyata Camry', '2021-11-24', 'Accra', 'Vehicle', 'No'),
('GT-1021-22', 'Toyota Camry', '2022-08-12', 'Accra', 'Vehicle', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `asset_employee`
--

CREATE TABLE `asset_employee` (
  `asset_employee_id` bigint(20) NOT NULL,
  `asset_id` varchar(200) NOT NULL,
  `employee_id` int(200) NOT NULL,
  `col_date` date NOT NULL,
  `col_time` time NOT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` time DEFAULT NULL,
  `description` text NOT NULL,
  `archive_asset_employee` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `asset_employee`
--

INSERT INTO `asset_employee` (`asset_employee_id`, `asset_id`, `employee_id`, `col_date`, `col_time`, `return_date`, `return_time`, `description`, `archive_asset_employee`) VALUES
(1, 'AS-451-21', 2021002, '2021-11-24', '13:13:00', '2021-11-24', '13:34:00', 'aCszvzdxvbx', 'No'),
(4, '245265366785', 2021002, '2021-11-24', '19:56:00', NULL, NULL, 'ascssc', 'Yes'),
(5, '245265366785', 2021001, '2021-12-09', '17:41:00', NULL, NULL, 'fgfnfg', 'No'),
(6, 'GT-1021-20', 2021005, '2021-12-09', '14:37:00', '2021-12-09', '15:38:00', 'gdfgbbgfb', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `asset_request`
--

CREATE TABLE `asset_request` (
  `asset_request_id` int(11) NOT NULL,
  `employee` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `department` varchar(200) NOT NULL,
  `departure` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `request_time` datetime NOT NULL,
  `drop_off` varchar(200) NOT NULL,
  `driver` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `request_status` varchar(200) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_request`
--

INSERT INTO `asset_request` (`asset_request_id`, `employee`, `department`, `departure`, `destination`, `request_time`, `drop_off`, `driver`, `request_status`, `driver_id`, `status`) VALUES
(1, '2021111', 'Digital Media', 'Accra', 'Tema', '2024-06-25 22:37:00', 'Work Stuff', '2021048', 'Approved', NULL, NULL),
(5, '2021036', 'HR', 'Cantoments', 'Tema', '2022-08-12 13:51:00', 'Program', 'ABCKM010', 'Approved', NULL, NULL),
(6, '2021036', 'HR', 'Cantoments', 'Accra', '2022-08-10 13:52:00', 'Programs', 'ABCKM010', 'Approved', NULL, NULL),
(12, '2021034', 'News', 'Accra', 'Tema', '2022-08-12 14:48:00', 'News', 'Transport Transport', 'Approved', NULL, NULL),
(13, '2021003', 'Sales', 'Kumasi', 'Accra', '2024-06-03 09:20:00', 'Event', '2021001', 'Approved', NULL, NULL),
(14, 'AC2022-08-12120136', 'Transport', 'Kumasi', 'Accra', '2024-06-15 14:10:00', 'Event', 'Unassigned', 'Pending', NULL, NULL),
(15, '2021003', 'Sales', 'Kumasi', 'Accra', '2024-06-08 14:13:00', 'Event', 'ABCKM010', 'Approved', NULL, NULL),
(16, 'AC2022-08-12120136', 'Transport', 'Kumasi', 'Accra', '2024-06-08 14:13:00', 'Event', 'Unassigned', 'Pending', NULL, NULL),
(17, '2021036', 'HR', 'Kumasi', 'Accra', '2024-06-04 08:26:00', 'Events', '2021045', 'Declined', NULL, NULL),
(18, '2021126', 'HR', 'Kumasi', 'Accra', '2024-07-26 09:15:00', 'Achimota', 'Unassigned', 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asset_status`
--

CREATE TABLE `asset_status` (
  `asset_status_id` bigint(20) NOT NULL,
  `asset_id` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `archive_asset_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `asset_status`
--

INSERT INTO `asset_status` (`asset_status_id`, `asset_id`, `description`, `status`, `date`, `archive_asset_status`) VALUES
(1, 'AS-451-21', 'Monthly Maintenance', 'Maintenance', '2021-11-23', 'No'),
(4, 'GT-1021-20', 'scedc', 'Repair', '2021-11-24', 'No'),
(5, '245265366785', 'verferf', 'Maintenance', '2021-12-09', 'Yes'),
(6, 'GT-1021-20', 'verferf', 'Sold', '2021-12-09', 'No'),
(7, '245265366785', 'dfvgbf', 'Damaged', '2021-12-09', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch`) VALUES
('Accra'),
('Admin'),
('Cape Coast'),
('Kumasi'),
('Tamale');

-- --------------------------------------------------------

--
-- Table structure for table `breaking_news`
--

CREATE TABLE `breaking_news` (
  `break_id` int(11) NOT NULL,
  `type` enum('Web','Business','Current Affairs','Newsroom') NOT NULL,
  `amt` int(11) NOT NULL,
  `comment` text NOT NULL,
  `gmcomment` text DEFAULT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `archive_break` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `breaking_news`
--

INSERT INTO `breaking_news` (`break_id`, `type`, `amt`, `comment`, `gmcomment`, `date`, `branch`, `archive_break`) VALUES
(2, 'Current Affairs', 2, 'dvdsv', NULL, '2021-11-10', 'Accra', 'No'),
(3, 'Web', 6, 'sdfsfasjcs', 'hkeghhhihjir', '2021-11-15', 'Accra', 'Yes'),
(4, 'Business', 2, 'dshbvhjbjdb', NULL, '2021-11-11', 'Accra', 'Yes'),
(5, 'Current Affairs', 11, 'hvjsdjv', NULL, '2021-11-11', 'Accra', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `collection_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `archive_ysales` enum('Yes','No') DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department`) VALUES
('Admin'),
('Digital Media'),
('Finance'),
('HR'),
('Marketing'),
('News'),
('Office Administration'),
('Office Management'),
('Online'),
('Programs'),
('Research'),
('Sales'),
('Secretary'),
('Security'),
('Transport');

-- --------------------------------------------------------

--
-- Table structure for table `department_unit`
--

CREATE TABLE `department_unit` (
  `id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_upload`
--

CREATE TABLE `document_upload` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `documentname` varchar(200) NOT NULL,
  `documentsize` int(11) NOT NULL,
  `documenttype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `document_upload`
--

INSERT INTO `document_upload` (`id`, `title`, `documentname`, `documentsize`, `documenttype`, `upload_date`) VALUES
(15, 'Test 1', 'Yeboah_certificate', 219580, 'application/pdf', '2024-07-02 15:43:22'),
(16, 'Test 2', 'Deep_learning_approach_to_text_analysis_for_human_', 3985976, 'application/pdf', '2024-07-02 20:28:08'),
(17, 'Test 3', 'Screenshot (65)', 863051, 'image/png', '2024-07-02 20:33:20'),
(18, 'Test 4', '2cb1650ca4e1bbab4a0572c9216aec3a', 84064, 'image/jpeg', '2024-07-02 20:38:11'),
(19, 'Test 5', 'shutter2', 4676, 'image/jpeg', '2024-07-02 20:39:58'),
(20, 'Test 6', 'Microsoft Learn Student Ambassador Certificate', 91463, 'application/pdf', '2024-07-03 15:54:40'),
(21, 'Test 5', 'Internship Report Grading Scheme -2', 270874, 'application/pdf', '2024-07-08 02:39:23'),
(22, 'Test 6', 'Internship defence.pdf', 110267, 'application/pdf', '2024-07-08 03:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `vehicle_assigned` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` char(15) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(200) NOT NULL,
  `job_description` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `department` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `prev_name` varchar(200) DEFAULT NULL,
  `pref_name` varchar(200) DEFAULT NULL,
  `archive_emp` varchar(200) NOT NULL,
  `employee_type` varchar(200) DEFAULT NULL,
  `date_joined` date DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `probation_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `firstname`, `lastname`, `email`, `phone`, `dob`, `password`, `job_description`, `position`, `unit`, `department`, `branch`, `prev_name`, `pref_name`, `archive_emp`, `employee_type`, `date_joined`, `deleted`, `link_url`, `probation_file`) VALUES
(2021001, 'Jaclin', 'Brownill', 'jbrownill0@theatlantic.com', '4747122841', '1990-05-05', 'MTIzNDU2Nzg=', 'Admin', '', '', 'News', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021002, 'Heindrick', 'Kringe', 'hkringe1@fema.gov', '8802368570', '1990-05-05', '3906374268', 'Department Head', '', '', 'Sales', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021003, 'Neila', 'D\'eath', 'ndeath2@wiley.com', '8414953993', '1990-05-05', 'MTIzNDU2Nzg=', 'Employee', '', '', 'Sales', 'Kumasi', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021004, 'Chucho', 'Dryden', 'cdryden3@princeton.edu', '4795728515', '1990-05-05', 'MTIzNDU2Nzg=', 'General Manager', '', '', 'Sales', 'Kumasi', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021005, 'Padget', 'Gilling', 'pgilling4@fastcompany.com', '8756942511', '1990-05-05', '1711797893', 'Employee', '', '', 'Sales', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021006, 'Luella', 'Bravey', 'lbravey5@woothemes.com', '8888379252', '1990-05-05', '4359963204', 'Employee', '', '', 'News', 'Kumasi', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021009, 'Page', 'Maseyk', 'pmaseyk8@businesswire.com', '8685566838', '1990-05-05', '7298659015', 'Employee', 'Secretary', '', 'Office Management', 'Accra', ' ', NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021010, 'Morry', 'Rottery', 'mrottery9@arstechnica.com', '1936522657', '1990-05-05', 'MTIzNDU2Nzg=', 'Admin', '', '', 'Sales', 'Kumasi', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021011, 'Bartlett', 'Monks', 'bmonksa@naver.com', '2569229979', '1990-05-05', 'MTIzNDU2Nzg=', 'General Manager', '', '', 'News', 'Kumasi', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021012, 'Aubree', 'Holston', 'aholstonb@youtube.com', '2115068661', '1990-05-05', 'MTIzNDU2Nzg=', 'Employee', '', '', 'Finance', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021013, 'Myrtice', 'Kyrkeman', 'mkyrkemanc@rambler.ru', '3448271164', '1990-05-05', '268477+9XTfvv70=', 'Employee', '', '', 'HR', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021014, 'Woodie', 'Lorans', 'wloransd@last.fm', '8208617716', '1990-05-05', 'MTIzNDU2Nzg=', 'Admin', '', '', 'News', 'Kumasi', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021015, 'Orsa', 'Laing', 'olainge@eventbrite.com', '7793416789', '1990-05-05', 'MTIzNDU2Nzg=', 'Employee', 'Officer', '', 'Office Management', 'Accra', ' ', NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021016, 'Fenelia', 'Morant', 'fmorantf@oracle.com', '6336351560', '1990-05-05', 'MTIzNDU2Nzg=', 'General Manager', '', '', 'News', 'Kumasi', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021018, 'Deloria', 'Harm', 'dharmh@ehow.com', '5015884290', '1990-05-05', 'MTIzNDU2Nzg=', 'Admin', '', '', 'News', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021019, 'Arel', 'Trimmill2', 'atrimmilli@gmpg.org', '1209254009', '1990-05-05', 'MTIzNDU2Nzg=', 'Employee', 'Accountant', '', 'Sales', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021020, 'Vanya', 'Lazenbury', 'vlazenburyj@jiathis.com', '3383809112', '1990-05-05', 'MTIzNDU2Nzg=', 'Admin', '', '', 'News', 'Kumasi', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021026, 'Cobby', 'Cobby', 'cobby@gmail.com', '0203479795', '1990-05-05', 'MTIzNDU2Nzg=', 'Employee', 'Producer', '', 'Programs', 'Accra', ' ', NULL, 'No', 'Permanent', '2022-09-27', 0, NULL, NULL),
(2021029, 'Admin', 'Admin', 'admin@admin.com', '0000000000', '1990-05-05', 'MTIzNDU2Nzg=', 'Admin', '', '', 'Admin', 'Admin', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021030, 'Cobby', 'adsd', 'admin@a.com', '0203479795', '1990-05-05', 'MTIzNDU2Nzg5', 'Department Head', '', '', 'Marketing', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021031, 'Super', 'Super', 'super@a.com', '0203479792', '1990-05-05', 'MTIzNDU2Nzg=', 'Employee', 'Journalist', '', 'News', 'Accra', ' ', NULL, 'No', 'Permanent', '2022-09-01', 0, NULL, NULL),
(2021032, 'Finhead2', 'Finhead', 'finance@a.com', '0203479792', '1990-05-05', 'MTIzNDU2Nzg=', 'Department Head', '', '', 'Finance', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021033, 'sale', 'sale', 'sales@a.com', '0203479792', '1990-05-05', 'MTIzNDU2Nzg=', 'Department Head', 'Head of Sales Department', '', 'Sales', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021034, 'prog', 'prog', 'program@a.com', '0203479792', '1990-05-05', 'MTIzNDU2Nzg=', 'Programs Manager', 'Head of Department', '', 'Programs', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021035, 'gen', 'gen', 'general@a.com', '0203479792', '1990-05-05', 'MTIzNDU2Nzg=', 'General Manager', 'General Manager', '', 'Office Administration', 'Accra', ' ', NULL, 'No', 'Permanent', '2018-01-01', 0, NULL, NULL),
(2021037, 'ofmgt', 'ofmgt', 'ofmgt@a.com', '0000000000', '1990-05-05', 'MTIzNDU2Nzg=', 'Office Manager', 'Department Head', '', 'Office Management', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021038, 'Daddy', 'Yo', 'daddyyo@a.com', '0203479792', '1990-05-05', 'RGFkZHk=', 'Employee', '', '', 'Finance', 'Accra', NULL, NULL, 'No', NULL, NULL, 0, NULL, NULL),
(2021041, 'dfsfds', 'dfsds', 'ref@a.com', '0203479792', '2021-07-02', 'ZGZzZmRz', 'Employee', 'Secretary', '', 'Marketing', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021045, 'Obed', 'Asare', 'obed@a.com', '0555559675', '1995-08-02', 'MTIzNDU2Nzg=', 'Employee', 'Driver', '', 'Transport', 'Kumasi', ' ', ' ', 'No', 'Permanent ', NULL, 0, NULL, NULL),
(2021048, 'Milo', 'Cummings', 'milo@gmail.com', '0244057628', '2025-02-08', 'MTIzNDU2Nzg=', 'Employee', 'Driver', ' ', 'Transport', 'Tamale', 'Lenna Dooley', 'Lenna Dooley', 'No', NULL, NULL, 0, NULL, NULL),
(2021049, 'Prog', 'Manager', 'pm@a.com', '0202020202', '2000-01-01', 'MTIzNDU2Nzg=', 'Employee', 'Presenter', '', 'Programs', 'Accra', ' ', ' ', 'No', 'Permanent', '2022-08-09', 0, NULL, NULL),
(2021050, 'Transport', 'Transport', 'trans@a.com', '0202020202', '2022-08-12', 'MTIzNDU2Nzg=', 'Department Head', 'Transport  Head', '', 'Transport', 'Accra', ' ', ' ', 'No', 'Permanent', '2022-08-12', 0, NULL, NULL),
(2021051, 'bbbbb', 'bbbbb', 'bbbbbb@bbbbbbb.com', '0203479792', '1995-04-04', 'MTIzNDU2Nzg=', 'Employee', 'Accountant', '', 'Finance', 'Cape Coast', ' ', ' ', 'No', 'NSS', '2022-06-20', 0, NULL, NULL),
(2021052, 'aaaaaaa', 'aaaaaaaaaa', 'aaaaaaa@aaaaa.com', '0203479792', '1995-04-04', 'YWFhYWFhYQ==', 'Employee', 'Accountant', '', 'Finance', 'Cape Coast', ' ', ' ', 'No', 'Intern', '2022-06-20', 0, NULL, NULL),
(2021087, 'Bismark', 'Owusu', 'hods@a.com', '0555404000', '1983-06-14', 'MTIzNDU2Nzg=', 'Head of Security', 'Head of Department', ' ', 'Security', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021089, 'Isaac', 'Abban', 'mnews@a.com', '0559877750', '1985-08-30', 'MTIzNDU2Nzg=', 'Managing News Editor', 'Department Head', '', 'News', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021095, 'Amos', 'Adjei', 'tech@a.com', '0243334343', '1995-01-30', 'MTIzNDU2Nzg=', 'Technical', 'Technical', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021097, 'Nana', 'Esi', 'ceo@a.com', '0559866680', '2000-09-01', 'MTIzNDU2Nzg=', 'Chief Executive Officer', 'CEO', ' ', 'Admin', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021099, 'Digital', 'Media', 'digital@media.com', '', '0000-00-00', 'MTIzNDU2Nzg=', 'Department Head', 'Digital Media Head', '', 'Digital Media', 'Accra', NULL, NULL, '', NULL, NULL, 0, NULL, NULL),
(2021110, 'Phil', 'Coulson', 'phil@shield.gmail.com', '0576760647', '0000-00-00', 'MTIzNDU2Nzg=', 'Employee', 'Employee', ' ', 'Digital Media', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021111, 'Melinda', 'May', 'melinda@gmail.com', '0576760648', '0000-00-00', 'MTIzNDU2Nzg=', 'Employee', 'Employee', ' ', 'Digital Media', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021112, 'Fitz', 'Ha', 'fitz@shield.gmail.com', '0576760649', '0000-00-00', 'MTIzNDU2Nzg=', 'Employee', 'Employee', ' ', 'Security', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021114, 'Rasta', 'Man', 'rasta@man.com', '0576760610', '0000-00-00', 'MTIzNDU2Nzg=', 'Employee', 'Employee', ' ', 'Online', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021115, 'Owura', 'Kwaku', 'kwaku@owura.com', '0576760611', '0000-00-00', 'MTIzNDU2Nzg=', 'Employee', 'Employee', ' ', 'Online', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021116, 'Research', 'Head', 'head@research.com', '0559866655', '0000-00-00', 'MTIzNDU2Nzg=', 'Department Head', 'Head of Research', '', 'Research', 'Accra', NULL, NULL, '', NULL, NULL, 0, NULL, NULL),
(2021117, 'Simmonns', 'Shield', 'simmons@gmail.com', '0576760615', '0000-00-00', 'MTIzNDU2Nzg=', 'Employee', 'Employee', ' ', 'Research', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021118, 'Yeboah', 'Opoku', 'yeboah@gmail.com', '0576760647', '0000-00-00', 'MTIzNDU2Nzg=', 'Employee', 'Employee', ' ', 'Research', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021120, 'Executive', 'Secretary', 'executive@secretary.com', '0559866655', '0000-00-00', 'MTIzNDU2Nzg=', 'Employee', 'Secretary', '', 'Office Management', 'Accra', NULL, NULL, '', NULL, NULL, 0, NULL, NULL),
(2021123, 'Paul', 'Hopes', 'paul@gmail.com', '0576760647', '2024-07-07', 'MTIzNDU2Nzg=', 'Employee', 'Journalist', ' ', 'News', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021124, 'Esther', 'Yeboah', 'esther@hr.com', '0576760647', '0000-00-00', 'MTIzNDU2Nzg=', 'Employee', 'Cleaner', ' ', 'HR', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021125, 'Ethel', 'Opoku', 'ether@hr.com', '0576760647', '2024-07-07', 'MTIzNDU2Nzg=', 'Employee', 'Washer', ' ', 'HR', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021126, 'New', 'Hr', 'hr@a.com', '0576760647', '2024-07-07', 'MTIzNDU2Nzg=', 'Department Head', 'HR', ' ', 'HR', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021127, 'Frank', 'Editor', 'news@editor.com', '0559866655', '2024-07-08', 'MTIzNDU2Nzg=', 'News Editor', 'Head of Department', '', 'News', '', NULL, NULL, '', NULL, NULL, 0, NULL, NULL),
(2021128, 'McKenzie', 'Cooley', 'cooley@1.com', '0576760646', '2018-08-10', 'MTIzNDU2Nzg=', 'Employee', 'Journalist', ' ', 'News', 'Cape Coast', 'Matthew Powers', 'Matthew Powers', 'No', NULL, NULL, 0, NULL, NULL),
(2021129, 'Nell', 'Cannon', 'nell@1.com', '0265132643', '1972-07-12', 'MTIzNDU2Nzg=', 'Employee', 'News Anchor', ' ', 'News', 'Accra', 'Ginger Townsend', 'Ginger Townsend', 'No', NULL, NULL, 0, NULL, NULL),
(2021130, 'Allen', 'Acevedo', 'allen@1.com', '0369192817', '1995-01-07', 'MTIzNDU2Nzg=', 'Employee', 'News Anchor', ' ', 'News', 'Cape Coast', 'Ivor Sherman', 'Ivor Sherman', 'No', NULL, NULL, 0, NULL, NULL),
(2021131, 'James', 'Brown', 'dho@a.com', '0576760647', '2024-07-08', 'MTIzNDU2Nzg=', 'Department Head', 'Head of Online', ' ', 'Online', 'Accra', ' ', ' ', 'No', NULL, NULL, 0, NULL, NULL),
(2021132, 'James', 'Badu', 'dj@a.com', '0556794343', '1997-11-12', 'MTIzNDU2Nzg=', 'Employee', 'Dj', ' ', 'Programs', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021133, 'Jerry', 'Abban', 'headsport@a.com', '0553424343', '1994-10-13', 'MTIzNDU2Nzg=', 'Head of Sport', 'Head of Sport News', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021134, 'Samuel', 'Gabby', 'sport@a.com', '0545555545', '1989-06-13', 'MTIzNDU2Nzg=', 'Sports Presenter', 'News Anchor', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021135, 'Joe', 'Flick', 'hodb@a.com', '0544433322', '1989-11-16', 'MTIzNDU2Nzg=', 'Head of Business', 'Head of Business News', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021136, 'Mavis', 'Abban', 'bsub@a.com', '0543222233', '1999-06-08', 'MTIzNDU2Nzg=', 'Creative designer', 'Employee', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021137, 'Amos', 'Oduro', 'hodp@a.com', '0533434344', '1987-06-25', 'MTIzNDU2Nzg=', 'Head of Legal and Political Desk', 'Head of Legal and Political Desk', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021138, 'Jude', 'Adu', 'subp@a.com', '0543321321', '1988-06-13', 'MTIzNDU2Nzg=', 'Political', 'Employee', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021139, 'Persis', 'Sarfowaa', 'hodsocial@a.com', '0559865433', '2000-04-05', 'MTIzNDU2Nzg=', 'Head of Social Media', 'Head of Social Media News', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021140, 'Vanessa', 'Oteng', 'subs@a.com', '0543224334', '2002-07-25', 'MTIzNDU2Nzg=', 'Social Media', 'Employee', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021141, 'Bright', 'Kombat', 'hodtech@a.com', '0534454554', '1996-10-31', 'MTIzNDU2Nzg=', 'Head of Technical', 'Head of Technical News', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL),
(2021142, 'Mike', 'Mensah', 'supereditor@a.com', '0596633223', '1992-07-23', 'MTIzNDU2Nzg=', 'Supervising News Editor', 'Head of Department', ' ', 'News', 'Accra', ' ', '', 'No', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_address`
--

CREATE TABLE `employee_address` (
  `employee_id` int(200) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `current_address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `digital_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_address`
--

INSERT INTO `employee_address` (`employee_id`, `nationality`, `current_address`, `city`, `district`, `region`, `digital_address`) VALUES
(2021040, 'Ghanaian', 'Tema Comm 21', 'Tema', 'Tema Metro', 'Greater Accra', 'GB-076-2676');

-- --------------------------------------------------------

--
-- Table structure for table `employee_allergies`
--

CREATE TABLE `employee_allergies` (
  `allergy_id` int(11) NOT NULL,
  `employee_id` int(200) NOT NULL,
  `allergies` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_allergies`
--

INSERT INTO `employee_allergies` (`allergy_id`, `employee_id`, `allergies`) VALUES
(20, 2021040, 'Garlic'),
(21, 2021040, 'Bees'),
(23, 2021019, 'Bees');

-- --------------------------------------------------------

--
-- Table structure for table `employee_bank`
--

CREATE TABLE `employee_bank` (
  `employee_id` int(200) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `bank_branch` varchar(200) NOT NULL,
  `account_name` varchar(200) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `ssnit` varchar(200) NOT NULL,
  `tin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_bank`
--

INSERT INTO `employee_bank` (`employee_id`, `bank`, `bank_branch`, `account_name`, `account_number`, `ssnit`, `tin`) VALUES
(2021040, 'EcoBank', 'Tema', 'Enoch Ashitey Safo Mensah', '1215426622656253', '1215632254', 'GHA-0012525665-0');

-- --------------------------------------------------------

--
-- Table structure for table `employee_image`
--

CREATE TABLE `employee_image` (
  `imageid` int(11) NOT NULL,
  `employee_id` int(200) NOT NULL,
  `imagename` text NOT NULL,
  `imagefile` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_image`
--

INSERT INTO `employee_image` (`imageid`, `employee_id`, `imagename`, `imagefile`) VALUES
(8, 2021026, 'PHOTO-2022-07-01-07-18-17.jpg', 0x50484f544f2d323032322d30372d30312d30372d31382d31372e6a7067),
(9, 2021011, 'Obsession_620x600.jpg', 0x4f6273657373696f6e5f363230783630302e6a7067),
(10, 2021018, 'images.jpg', 0x696d616765732e6a7067),
(11, 2021040, 'rsz_photo_2024-05-27_09-36-48.png', 0x72737a5f70686f746f5f323032342d30352d32375f30392d33362d34382e706e67),
(12, 2021045, 'rsz_1logo_new.png', 0x72737a5f316c6f676f5f6e65772e706e67),
(13, 0, 'user.jpg', 0x757365722e6a7067),
(14, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067),
(0, 0, 'user.jpg', 0x757365722e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(200) NOT NULL,
  `leave_status` varchar(200) NOT NULL,
  `applied_date` date DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `days_left` int(11) DEFAULT NULL,
  `archive_leave` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`leave_id`, `employee_id`, `leave_status`, `applied_date`, `reason`, `date_from`, `date_to`, `days_left`, `archive_leave`) VALUES
(1, 2021033, 'Pending', '2024-06-13', 'Study Leave without Pay', '2024-09-02', '2024-10-09', NULL, 'No'),
(37, 2021036, 'Granted', '2024-06-09', 'Annual Leave', '2024-08-01', '2024-09-11', 0, 'No'),
(52, 2021031, 'Pending', '2024-06-12', 'Complaints Leave', '2024-07-01', '2024-07-26', NULL, 'No'),
(54, 2021045, 'Rejected', '2024-06-13', 'Sick Leave', '2024-08-28', '2024-09-24', NULL, 'No'),
(61, 2021015, 'Pending', '2024-06-14', 'Sick Leave', '2024-06-17', '2024-06-24', NULL, 'No'),
(64, 2021008, 'Pending', '2024-06-14', 'Sick Leave', '2024-06-17', '2024-06-27', NULL, 'No'),
(67, 2021111, 'Granted', '2024-06-26', 'Paternity Leave', '2024-06-26', '2024-07-17', NULL, 'No'),
(68, 2021110, 'Rejected', '2024-06-26', 'Sick Leave', '2024-06-26', '2024-07-03', NULL, 'No'),
(69, 2021117, 'Pending', '2024-06-26', 'Study Leave with Pay', '2024-06-26', '2024-07-03', NULL, 'No'),
(70, 2021120, 'Pending', '2024-06-27', 'Annual Leave', '2024-06-27', '2024-07-04', NULL, 'No'),
(71, 2021110, 'Pending', '2024-07-02', 'Complaints Leave', '2024-07-02', '2024-07-16', NULL, 'No'),
(72, 2021040, 'Rejected', '2024-07-08', 'Sick Leave', '2024-07-09', '2024-07-16', NULL, 'No'),
(73, 2021124, 'Rejected', '2024-07-08', 'Annual Leave', '2024-07-22', '2024-07-23', NULL, 'No'),
(74, 2021125, 'Granted', '2024-07-08', 'Sick Leave', '2024-07-16', '2024-07-22', NULL, 'No'),
(75, 2021126, 'Granted', '2024-07-08', 'Annual Leave', '2024-07-22', '2024-08-01', NULL, 'No'),
(77, 2021007, 'Pending', '2024-07-08', 'Annual Leave', '2024-07-08', '2024-07-24', NULL, 'No'),
(80, 2021113, 'Pending', '2024-07-08', 'Unpaid Leave', '2024-07-08', '2024-07-23', NULL, 'No'),
(91, 2021134, 'Pending', '2024-07-13', 'Sick Leave', '2024-07-16', '2024-07-26', NULL, 'No'),
(93, 2021136, 'Pending', '2024-07-13', 'Sick Leave', '2024-07-15', '2024-07-17', NULL, 'No'),
(95, 2021140, 'Pending', '2024-07-13', 'Sick Leave', '2024-07-15', '2024-08-01', NULL, 'No'),
(96, 2021095, 'Pending', '2024-07-13', 'Paternity Leave', '2024-07-15', '2024-08-08', NULL, 'No'),
(97, 2021142, 'Pending', '2024-07-14', 'Sick Leave', '2024-07-17', '2024-07-30', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `employee_prev`
--

CREATE TABLE `employee_prev` (
  `employee_id` int(200) NOT NULL,
  `employer` varchar(200) DEFAULT NULL,
  `period` varchar(200) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `region` varchar(200) DEFAULT NULL,
  `hourly_salary` decimal(10,2) DEFAULT NULL,
  `annual_income` decimal(10,2) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `digital_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_prev`
--

INSERT INTO `employee_prev` (`employee_id`, `employer`, `period`, `phone`, `email`, `position`, `address`, `city`, `state`, `region`, `hourly_salary`, `annual_income`, `website`, `digital_address`) VALUES
(2021040, 'Christian Eye Clinic', '2 years', '0203479792', '', 'IT personnel', 'Tema Comm 1', 'Tema', ' ', 'Greater Accra', 0.00, 0.00, ' ', 'GA-124-7845');

-- --------------------------------------------------------

--
-- Table structure for table `employee_relative`
--

CREATE TABLE `employee_relative` (
  `employee_id` int(200) NOT NULL,
  `relative_name` varchar(200) NOT NULL,
  `phone` char(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `digital_address` varchar(200) NOT NULL,
  `relationship` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_relative`
--

INSERT INTO `employee_relative` (`employee_id`, `relative_name`, `phone`, `address`, `city`, `region`, `digital_address`, `relationship`) VALUES
(2021040, 'Akosua Gyanewaa', '0541801594', 'Tema Gold C', 'Tema', 'Greater Accra', 'GB-076-2676', 'Mother');

-- --------------------------------------------------------

--
-- Table structure for table `employee_report`
--

CREATE TABLE `employee_report` (
  `employee_report_id` int(11) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `employee_id` int(200) NOT NULL,
  `progress` text NOT NULL,
  `next_step` text NOT NULL,
  `cost_value` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `require_attention` text NOT NULL,
  `challenge` text NOT NULL,
  `improve` text NOT NULL,
  `gmcomment` text DEFAULT NULL,
  `archive_emp_rep` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_report`
--

INSERT INTO `employee_report` (`employee_report_id`, `activity_id`, `employee_id`, `progress`, `next_step`, `cost_value`, `date`, `require_attention`, `challenge`, `improve`, `gmcomment`, `archive_emp_rep`) VALUES
(2, 10, 2021004, 'Yes', 'No', 2.00, '2021-11-10', 'no comments', 'no comments', 'no comments', NULL, 'No'),
(3, 10, 2021002, 'no comment', 'no comment1', 200.00, '2021-11-12', 'no comment1', 'no comment1', 'no comment1', 'That was a good job done', 'No'),
(5, 20211124173035, 2021012, 'dgdgdf', 'dfdfbfdb', 1222.00, '2021-11-23', 'fbfbd', 'fdfdbfb', 'fbbdfb', NULL, 'No'),
(6, 17, 2021031, 'sdvsvs', 'sdvdsvdsv', 11111.00, '2021-11-24', 'dsvvsdv', 'dvsv', 'dsvvvv', NULL, 'No'),
(7, 20211124191603, 2021013, 'eds', 'svcs', 2222.00, '2021-11-24', 'dsvsvs', 'sdvsv', 'vsvssd', NULL, 'No'),
(9, 20211209170640, 2021015, 'hgbhnn', 'yntn', 5654.00, '2021-12-09', 'hnn', 'nhnhhg', 'hnhgn', NULL, 'No'),
(10, 20211209170640, 2021009, 'gfngfng', 'gfdngfn', 3454.00, '2021-12-09', 'gngfn', 'gngdnf', 'gfbgnbgfn', NULL, 'No'),
(11, 20211209125903, 2021013, 'gngn', 'n  nbbhmn', 2345.00, '2021-12-09', 'hmhjm', 'mhjmhjm', 'mhmhj', NULL, 'Yes'),
(12, 20220805105557, 2021013, 'shuii', 'fdgb', 2000.00, '2022-08-05', 'gbffgb', 'gfbfgb', 'bfgbfg', NULL, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `employee_id` int(200) NOT NULL,
  `employee_status` enum('Full time','Part time','Casual') NOT NULL,
  `annual_pay` decimal(10,2) NOT NULL,
  `monthly_pay` decimal(10,2) NOT NULL,
  `hourly_pay` decimal(10,2) NOT NULL,
  `first_pay_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`employee_id`, `employee_status`, `annual_pay`, `monthly_pay`, `hourly_pay`, `first_pay_date`) VALUES
(2021040, 'Full time', 42000.00, 3500.00, 50.00, '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `employee_social`
--

CREATE TABLE `employee_social` (
  `employee_id` int(200) NOT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `tiktok` varchar(200) DEFAULT NULL,
  `snapchat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_social`
--

INSERT INTO `employee_social` (`employee_id`, `twitter`, `facebook`, `instagram`, `tiktok`, `snapchat`) VALUES
(2021040, '@ashy_snr', ' ', 'ashysnr', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `budget` int(255) NOT NULL,
  `description` text NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_date`, `budget`, `description`, `employee_id`, `created_date`) VALUES
(3, 'All Games', '2024-06-14', 10000, 'Sports Games', 2021033, '2024-06-07 11:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facility_id` int(11) NOT NULL,
  `facility` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `archive_facility` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facility_id`, `facility`, `date`, `branch`, `archive_facility`) VALUES
(2, 'Apartment at Alarjo', '2021-11-24', 'Accra', 'Yes'),
(5, 'Company House At Legon', '2021-11-24', 'Accra', 'No'),
(6, 'Apartment at Tema', '2021-12-09', 'Accra', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `facility_status`
--

CREATE TABLE `facility_status` (
  `facility_status_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `archive_facility_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `facility_status`
--

INSERT INTO `facility_status` (`facility_status_id`, `facility_id`, `description`, `status`, `date`, `archive_facility_status`) VALUES
(2, 2, 'Weekly maintenance', 'Maintenance', '2021-11-25', 'No'),
(3, 6, 'sdhcvwucdg', 'Repair', '2021-12-09', 'No'),
(4, 5, 'fddgd', 'Repair', '2021-12-16', 'Yes'),
(5, 6, 'wedwd', 'Damaged', '2021-12-16', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `insets`
--

CREATE TABLE `insets` (
  `insets_id` int(11) NOT NULL,
  `insets_type` enum('Wrong Insets','Unplayed Insets') NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `gmcomment` text DEFAULT NULL,
  `archive_inset` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `insets`
--

INSERT INTO `insets` (`insets_id`, `insets_type`, `comment`, `date`, `branch`, `gmcomment`, `archive_inset`) VALUES
(3, 'Wrong Insets', 'xvssdvs', '2021-11-11', 'Kumasi', NULL, 'No'),
(4, 'Wrong Insets', 'sdcsc ', '2021-11-11', 'Accra', 'hrhgvdxbzbjfxcv', 'No'),
(5, 'Wrong Insets', 'thdgdv', '2021-11-09', 'Accra', NULL, 'No'),
(6, 'Wrong Insets', 'xc xc x', '2021-11-10', 'Accra', NULL, 'Yes'),
(9, 'Unplayed Insets', 'dhggbf', '2021-11-08', 'Accra', 'rdjbvkjdkjsbvbd', 'Yes'),
(10, 'Unplayed Insets', ' vbgfhr', '2021-11-08', 'Accra', '564v96d4flaebsdu', 'Yes'),
(11, 'Unplayed Insets', 'xzc23evw2', '2021-11-08', 'Accra', NULL, 'No'),
(12, 'Unplayed Insets', 'xzcszcsdcv', '2021-11-08', 'Accra', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_description`) VALUES
('Admin'),
('Department Head'),
('Driver'),
('Employee'),
('General Manager'),
('Unassigned'),
('Unit Head'),
('Branch Manager'),
('Chief Executive Officer	'),
('Creative designer'),
('Head of Business'),
('Head of current affairs'),
('Head of Legal and Political Desk'),
('Head of News Room and Digital Media'),
('Head of Online'),
('Head of Research'),
('Head of Security'),
('Head of Sport'),
('Head of Technical'),
('Human Resource'),
('Intern'),
('Managing News Editor'),
('National Service Personel'),
('News Anchor'),
('News Editor'),
('News Producer'),
('Online Journalist'),
('Producer'),
('Programs Manager'),
('Receptionist'),
('Reporter'),
('Sales'),
('Sales Manager'),
('Social Media'),
('Sports Presenter'),
('Supervising News Editor'),
('Technical'),
('Transport coordinator'),
('Head of Finance'),
('Security'),
('Journalist'),
('Dj'),
('Presenter'),
('Political'),
('Head of Social Media');

-- --------------------------------------------------------

--
-- Table structure for table `job_request`
--

CREATE TABLE `job_request` (
  `jr_id` int(11) NOT NULL,
  `jr_request` varchar(200) NOT NULL,
  `jr_department` varchar(200) NOT NULL,
  `jr_branch` varchar(200) NOT NULL,
  `jr_req_date` date NOT NULL,
  `jr_status` enum('Approved','Declined','Pending') NOT NULL,
  `jr_salary` float(10,2) NOT NULL,
  `jr_budgeted` enum('Yes','No') NOT NULL,
  `jr_exp_date` date NOT NULL,
  `jr_role` varchar(200) NOT NULL,
  `jr_reason` varchar(200) DEFAULT NULL,
  `jr_decline` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job_request`
--

INSERT INTO `job_request` (`jr_id`, `jr_request`, `jr_department`, `jr_branch`, `jr_req_date`, `jr_status`, `jr_salary`, `jr_budgeted`, `jr_exp_date`, `jr_role`, `jr_reason`, `jr_decline`) VALUES
(2, 'I need a driver', 'News', 'Accra', '2022-07-20', 'Pending', 600.00, 'Yes', '2022-07-25', 'Driver', 'N/A', ''),
(3, 'I need a cleaner', 'News', 'Accra', '2022-07-20', 'Declined', 600.00, 'Yes', '2022-07-21', 'Cleaner', 'N/A', 'No funds'),
(5, 'Need HR assistant ', 'HR', 'Accra', '2022-07-20', 'Pending', 2000.00, 'Yes', '2022-08-18', 'HR Assistant', '', ''),
(6, 'Need Personal Assistant', 'Office Administration', 'Accra', '2022-07-20', 'Approved', 1500.00, 'Yes', '2022-07-22', 'Personal Assistant', 'N/A', ''),
(7, 'Need a driver', 'Office Administration', 'Accra', '2022-07-20', 'Approved', 800.00, 'Yes', '2022-07-29', 'Driver', 'N/A', ''),
(8, 'szcsdc', 'HR', 'Accra', '2022-07-20', 'Pending', 44524.00, 'Yes', '2022-07-20', 'dcsdc', 'N/A', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_balance`
--

CREATE TABLE `leave_balance` (
  `employee_id` int(11) NOT NULL,
  `total_leave_days` int(11) DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_balance`
--

INSERT INTO `leave_balance` (`employee_id`, `total_leave_days`) VALUES
(0, 8),
(2021001, 30),
(2021002, 30),
(2021003, 11),
(2021004, 30),
(2021005, 30),
(2021006, 30),
(2021007, 30),
(2021008, 30),
(2021009, 30),
(2021010, 30),
(2021011, 30),
(2021012, 10),
(2021013, 30),
(2021014, 30),
(2021015, 30),
(2021016, 30),
(2021018, 30),
(2021019, 30),
(2021020, 30),
(2021026, 20),
(2021029, 30),
(2021030, 30),
(2021031, 30),
(2021032, 30),
(2021033, 30),
(2021034, 30),
(2021035, 30),
(2021036, 0),
(2021037, 30),
(2021038, 30),
(2021039, 30),
(2021040, 20),
(2021041, 30),
(2021045, 3);

-- --------------------------------------------------------

--
-- Table structure for table `negative_fed`
--

CREATE TABLE `negative_fed` (
  `neg_fed_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `gmcomment` text DEFAULT NULL,
  `archive_neg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `negative_fed`
--

INSERT INTO `negative_fed` (`neg_fed_id`, `comment`, `date`, `branch`, `gmcomment`, `archive_neg`) VALUES
(2, 'all newass\r\n', '2021-11-11', 'Accra', '212erohuubfjbv', 'Yes'),
(3, 'wajhbjsjb', '2021-11-11', 'Accra', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `pay_rec`
--

CREATE TABLE `pay_rec` (
  `pay_rec_id` int(11) NOT NULL,
  `desciption` text NOT NULL,
  `type` enum('Payable','Recievable') NOT NULL,
  `payrectype` varchar(200) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `gmcomment` text DEFAULT NULL,
  `archive_payrec` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pay_rec`
--

INSERT INTO `pay_rec` (`pay_rec_id`, `desciption`, `type`, `payrectype`, `amount`, `date`, `branch`, `gmcomment`, `archive_payrec`) VALUES
(2, 'dgssdvs', 'Payable', '', 12332333.00, '2021-11-10', 'Accra', NULL, 'No'),
(4, 'dxsdvszc', 'Payable', '', 23456544.00, '2021-11-10', 'Accra', NULL, 'No'),
(5, 'scwscfe', 'Recievable', '', 85724520.00, '2021-11-11', 'Accra', NULL, 'Yes'),
(6, 'Sales of tickets', 'Recievable', 'Events ', 100000.00, '2021-11-11', 'Kumasi', NULL, 'No'),
(7, 'dfsfvd', 'Payable', '', 200000.00, '2021-11-11', 'Accra', NULL, 'No'),
(11, 'sefsdv', 'Recievable', '', 500000.00, '2021-11-24', 'Accra', NULL, 'Yes'),
(12, 'No description', 'Payable', '', 100000.00, '2021-12-07', 'Accra', NULL, 'No'),
(13, 'No description', 'Payable', '', 120000.00, '2021-12-08', 'Accra', NULL, 'Yes'),
(14, 'Payment for advert', 'Payable', 'Events and promotions', 140000.00, '2022-01-06', 'Accra', NULL, 'No'),
(15, 'Sales from news', 'Recievable', 'Digital media revenue', 100000.00, '2021-12-07', 'Accra', NULL, 'No'),
(16, 'Loan from bank', 'Recievable', '', 120000.00, '2021-12-08', 'Accra', NULL, 'Yes'),
(17, 'Sales from advert', 'Recievable', '', 140000.00, '2021-12-09', 'Accra', NULL, 'Yes'),
(18, 'No description', 'Payable', '', 100000.00, '2021-12-07', 'Accra', NULL, 'No'),
(19, 'No description', 'Payable', '', 120000.00, '2021-12-08', 'Accra', NULL, 'No'),
(20, 'Payment for advert', 'Payable', '', 140000.00, '2021-12-09', 'Accra', NULL, 'Yes'),
(21, 'No description', 'Payable', '', 100000.00, '2021-12-07', 'Accra', NULL, 'No'),
(22, 'No description', 'Payable', '', 120000.00, '2021-12-08', 'Accra', NULL, 'No'),
(23, 'Payment for advert', 'Payable', '', 140000.00, '2021-12-09', 'Accra', NULL, 'Yes'),
(24, 'No description', 'Payable', '', 100000.00, '2021-12-07', 'Accra', NULL, 'No'),
(25, 'No description', 'Payable', '', 120000.00, '2021-12-08', 'Accra', NULL, 'No'),
(26, 'Payment for advert', 'Payable', '', 140000.00, '2021-12-09', 'Accra', NULL, 'Yes'),
(27, 'Salaries', 'Payable', 'Staff Costs', 20000.00, '2022-01-30', 'Accra', NULL, 'No'),
(28, 'No description', 'Payable', 'Satff Cost', 100000.00, '2022-01-12', 'Accra', NULL, 'No'),
(29, 'No description', 'Payable', 'Transmission expenses', 120000.00, '2022-01-14', 'Accra', NULL, 'No'),
(30, 'Payment for advert', 'Payable', 'Production support', 140000.00, '2022-01-15', 'Accra', NULL, 'No'),
(31, 'No description', 'Payable', 'Satff Cost', 100000.00, '2022-01-12', 'Accra', NULL, 'No'),
(32, 'No description', 'Payable', 'Transmission expenses', 120000.00, '2022-01-14', 'Accra', NULL, 'No'),
(33, 'Payment for advert', 'Payable', 'Production support', 140000.00, '2022-01-15', 'Accra', NULL, 'No'),
(34, 'Sales from news', 'Recievable', 'Airtime revenue', 100000.00, '2021-01-07', 'Accra', NULL, 'No'),
(35, 'Loan from bank', 'Recievable', 'Digital media revenue', 120000.00, '2021-01-10', 'Accra', NULL, 'No'),
(36, 'Sales from advert', 'Recievable', 'Event and promotion revenue', 140000.00, '2021-01-14', 'Accra', NULL, 'No'),
(37, 'Sales from news', 'Recievable', 'Airtime revenue', 100000.00, '2022-01-07', 'Accra', NULL, 'No'),
(38, 'Loan from bank', 'Recievable', 'Digital media revenue', 120000.00, '2022-01-10', 'Accra', NULL, 'No'),
(39, 'Sales from advert', 'Recievable', 'Events and promotion revenue', 140000.00, '2022-02-02', 'Accra', NULL, 'No'),
(40, 'Media Advertisement', 'Recievable', 'Digital Media', 25000.00, '2022-02-02', 'Kumasi', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `perf_part_a`
--

CREATE TABLE `perf_part_a` (
  `part_a_id` int(11) NOT NULL,
  `key_results` varchar(200) NOT NULL,
  `target_desc` longtext NOT NULL,
  `outcome_desc` longtext NOT NULL,
  `part_a_rating` int(11) NOT NULL,
  `part_a_act_score` int(11) NOT NULL,
  `part_a_w` int(11) DEFAULT NULL,
  `part_a_ws` int(11) DEFAULT NULL,
  `perf_id` varchar(200) NOT NULL,
  `part_a_datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perf_part_a`
--

INSERT INTO `perf_part_a` (`part_a_id`, `key_results`, `target_desc`, `outcome_desc`, `part_a_rating`, `part_a_act_score`, `part_a_w`, `part_a_ws`, `perf_id`, `part_a_datecreated`) VALUES
(16, 'Office Management', '<span style=\"background-color: rgb(250, 250, 250);\">Helps to give our client and guest a good ambiance to promote a good business relationship</span>', '\r\n\r\n<span style=\"background-color: rgb(250, 250, 250);\">Helps to give our client and guest a good ambiance to promote a good business relationship</span>', 5, 80, 5, 100, '2021026-2022-09-28', '2022-09-28 15:23:50'),
(17, 'Procurement', '\r\n\r\n<span style=\"background-color: rgb(250, 250, 250);\">Helps to give our client and guest a good ambiance to promote a good business relationship</span>', '\r\n\r\n<span style=\"background-color: rgb(250, 250, 250);\">Helps to give our client and guest a good ambiance to promote a good business relationship</span>', 4, 80, 5, 80, '2021026-2022-09-28', '2022-09-28 15:23:52'),
(18, 'Office Management', '\r\n\r\n<span style=\"background-color: rgb(250, 250, 250);\">Helps to give our client and guest a good ambiance to promote a good business relationship</span>', '\r\n\r\n<span style=\"background-color: rgb(250, 250, 250);\">Helps to give our client and guest a good ambiance to promote a good business relationship</span>', 5, 80, 5, 100, '2021026-2022-09-28', '2022-09-28 15:23:53'),
(20, 'Office Management', 'rgergdsvd<div>vffbfgb</div><div>fdvdfbgb</div><div>dfbbbf</div><div>dbbfb</div>', '', 5, 80, 5, 100, '2021026-2022-09-29', '2022-09-29 08:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `perf_part_b`
--

CREATE TABLE `perf_part_b` (
  `part_b_id` int(11) NOT NULL,
  `dev_target` varchar(200) NOT NULL,
  `dev_targ_def` longtext NOT NULL,
  `assestment` longtext NOT NULL,
  `part_b_rating` int(11) NOT NULL,
  `part_b_act_score` int(11) NOT NULL,
  `part_b_w` int(11) DEFAULT NULL,
  `part_b_ws` int(11) DEFAULT NULL,
  `perf_id` varchar(200) NOT NULL,
  `part_b_datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perf_part_b`
--

INSERT INTO `perf_part_b` (`part_b_id`, `dev_target`, `dev_targ_def`, `assestment`, `part_b_rating`, `part_b_act_score`, `part_b_w`, `part_b_ws`, `perf_id`, `part_b_datecreated`) VALUES
(1, 'PROCUREMENT', '<p class=\"MsoNormal\" style=\"margin-bottom:10.0pt;margin-top:0in;mso-margin-bottom-alt:\r\n8.0pt;mso-margin-top-alt:0in;mso-add-space:auto;line-height:115%\"><span georgia\",serif;=\"\" lang=\"EN-GB\" mso-fareast-font-family:calibri;mso-bidi-font-family:\"times=\"\" new=\"\" roman\"\"=\"\" style=\"font-size:10.0pt;line-height:115%;font-family:\">DEVELOPE\r\nAREA OF THE<o:p></o:p></span></p>\r\n\r\n<span georgia\",serif;=\"\" lang=\"EN-GB\" mso-ansi-language:en-gb;mso-fareast-language:en-us;mso-bidi-language:ar-sa\"=\"\" mso-fareast-font-family:calibri;mso-bidi-font-family:\"times=\"\" new=\"\" roman\";=\"\" style=\"font-size:10.0pt;line-height:107%;font-family:\">PURCHASING\r\nPROCEDURE</span>', '<p class=\"MsoNormal\" style=\"margin-top: 0in; margin-bottom: 10pt; line-height: 18.4px;\"><span lang=\"EN-GB\" style=\"font-size: 10pt; line-height: 15.3333px; font-family: Georgia, serif;\">DEVELOPE AREA OF THE<o:p></o:p></span></p><span lang=\"EN-GB\" style=\"font-size: 10pt; line-height: 14.2667px; font-family: Georgia, serif;\">PURCHASING PROCEDURE</span>', 5, 80, 5, 100, '2021026-2022-09-28', '2022-09-28 16:34:01'),
(2, 'PROCUREMENT', 'ascdsv sdv sdvfer r r', ' dfvfvd vdvdvdv', 5, 80, 5, 100, '2021026-2022-09-28', '2022-09-28 16:38:49'),
(3, 'PROCUREMENT', 'ascdsv sdv sdvfer r r', ' dfvfvd vdvdvdv', 5, 80, 5, 100, '2021026-2022-09-28', '2022-09-28 16:40:52'),
(4, 'PROCUREMENT', 'ascdsv sdv sdvfer r r', ' dfvfvd vdvdvdv', 5, 80, 5, 100, '2021026-2022-09-28', '2022-09-28 16:40:55'),
(6, 'PROCUREMENT', 'bdffdbfdbf<div>dfbvdfbd</div><div>fdbbd</div><div>db</div><div>fbdbdb</div>', 'fdbfbddb<div>fbd</div><div>fb</div><div>fd</div><div>fbdfdbfbdbd</div>', 5, 80, 5, 100, '2021026-2022-09-29', '2022-09-29 08:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `perf_part_c`
--

CREATE TABLE `perf_part_c` (
  `part_c_id` int(11) NOT NULL,
  `sum_of_id` longtext NOT NULL,
  `dev_sup_need` longtext NOT NULL,
  `part_c_datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `perf_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perf_part_c`
--

INSERT INTO `perf_part_c` (`part_c_id`, `sum_of_id`, `dev_sup_need`, `part_c_datecreated`, `perf_id`) VALUES
(4, '<span 14px;=\"\" 255);\"=\"\" 255,=\"\" arial,=\"\" background-color:=\"\" font-size:=\"\" justify;=\"\" open=\"\" rgb(255,=\"\" sans\",=\"\" sans-serif;=\"\" style=\"color: rgb(0, 0, 0); font-family: \" text-align:=\"\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>', '<span 14px;=\"\" 255);\"=\"\" 255,=\"\" arial,=\"\" background-color:=\"\" font-size:=\"\" justify;=\"\" open=\"\" rgb(255,=\"\" sans\",=\"\" sans-serif;=\"\" style=\"color: rgb(0, 0, 0); font-family: \" text-align:=\"\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>', '2022-09-28 17:43:35', '2021026-2022-09-28'),
(5, 'fbdbdfb<div>dfbdbdbdb</div><div>bfddbdbfdbfd</div><div>dbfdb</div>', 'bfddfdfbdbdb<div>dbdfbdbfdbfbdf</div><div><br /></div>', '2022-09-29 08:33:43', '2021026-2022-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `perf_part_d`
--

CREATE TABLE `perf_part_d` (
  `part_d_id` int(11) NOT NULL,
  `ts_target` int(11) NOT NULL,
  `ts_job_fund` int(11) NOT NULL,
  `final_score` int(11) NOT NULL,
  `final_rating` int(11) NOT NULL,
  `emp_comment` longtext NOT NULL,
  `emp_date` date NOT NULL DEFAULT current_timestamp(),
  `sup_comment` longtext DEFAULT NULL,
  `sup_date` date DEFAULT NULL,
  `mgn_comment` longtext DEFAULT NULL,
  `mgn_date` date DEFAULT NULL,
  `hr_comment` longtext DEFAULT NULL,
  `hr_date` date DEFAULT NULL,
  `perf_id` varchar(200) DEFAULT NULL,
  `part_d_datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perf_part_d`
--

INSERT INTO `perf_part_d` (`part_d_id`, `ts_target`, `ts_job_fund`, `final_score`, `final_rating`, `emp_comment`, `emp_date`, `sup_comment`, `sup_date`, `mgn_comment`, `mgn_date`, `hr_comment`, `hr_date`, `perf_id`, `part_d_datecreated`) VALUES
(2, 15, 20, 35, 3, 'bjkvfkjdbjkhbvfbj<div>dfkkkdf</div><div>fdbjkbkbjkjdvf</div><div>fdkkfkbvkjfg</div><div>dfkbkbdf</div>', '2022-09-28', 'gfbfnhg', '2022-09-29', 'Manager comments', '2022-09-29', 'Hr comments', '2022-09-29', '2021026-2022-09-28', '2022-09-28 20:21:03'),
(3, 15, 20, 35, 4, 'dfbdfbfddfb<div>dfbdddbdd</div><div>fdbdbdbfbdfbdbffdfdbdb</div><div>fbdbbd</div>', '2022-09-29', NULL, NULL, NULL, NULL, NULL, NULL, '2021026-2022-09-29', '2022-09-29 08:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `perf_rev`
--

CREATE TABLE `perf_rev` (
  `perf_id` varchar(200) NOT NULL,
  `perf_date` date NOT NULL DEFAULT current_timestamp(),
  `perf_emp_id` varchar(200) NOT NULL,
  `perf_period` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perf_rev`
--

INSERT INTO `perf_rev` (`perf_id`, `perf_date`, `perf_emp_id`, `perf_period`) VALUES
('2021026-2022-12-04', '2022-12-04', '2021026', 'Testing Quater Quarter - 2022'),
('2021099-2024-06-25', '2024-06-25', '2021099', 'Testing Quater Quarter - 2024');

-- --------------------------------------------------------

--
-- Table structure for table `probation`
--

CREATE TABLE `probation` (
  `probation_id` int(11) NOT NULL,
  `employee_id` int(200) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `probation`
--

INSERT INTO `probation` (`probation_id`, `employee_id`, `filename`, `date`) VALUES
(6, 2021026, '2021026-2022.pdf', '2022-12-04 23:08:10'),
(7, 2021036, '2021036-2022.pdf', '2022-12-04 23:33:33'),
(8, 2021033, '2021033-2024.pdf', '2024-05-31 02:45:44'),
(11, 2021019, '2021019-2024.pdf', '2024-05-31 22:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `purchase_date` date NOT NULL,
  `department` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `hostname` varchar(200) NOT NULL,
  `producer` varchar(200) NOT NULL,
  `program_date` date NOT NULL,
  `program_color` text NOT NULL,
  `archive_program` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program`, `branch`, `hostname`, `producer`, `program_date`, `program_color`, `archive_program`) VALUES
(1, 'ASAASE BREAKFAST SHOW', 'Accra', 'Naa Ashorkor', '2021026', '2021-12-15', '#74dbef', 'No'),
(2, 'A day with the stars', 'Accra', 'Naa Ashorkor', '2021008', '2021-12-20', '#b7b3e5', 'No'),
(3, 'A night ', 'Accra', 'Naa Ashorkor', '2021006', '2021-12-18', '#bc5c5c', 'No'),
(4, 'Worship with Joe Mettle', 'Kumasi', 'Joe Mettle', '2021008', '2022-02-01', '#f2ef97', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `program_schedule`
--

CREATE TABLE `program_schedule` (
  `prog_sched_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `program_schedule`
--

INSERT INTO `program_schedule` (`prog_sched_id`, `program_id`, `start_time`, `end_time`, `day`) VALUES
(1, 1, '05:00:00', '10:00:00', 'Monday'),
(2, 1, '05:00:00', '10:00:00', 'Tuesday'),
(3, 1, '05:00:00', '10:00:00', 'Wednesday'),
(4, 1, '05:00:00', '10:00:00', 'Thursday'),
(5, 1, '05:00:00', '10:00:00', 'Friday'),
(6, 1, '05:00:00', '10:00:00', 'Saturday'),
(11, 1, '05:00:00', '10:00:00', 'Sunday'),
(13, 2, '10:00:00', '12:00:00', 'Monday'),
(15, 2, '10:00:00', '12:00:00', 'Tuesday'),
(16, 4, '04:00:00', '06:00:00', 'Monday'),
(17, 4, '04:00:00', '06:00:00', 'Tuesday'),
(18, 4, '04:00:00', '06:00:00', 'Wednesday'),
(19, 4, '04:00:00', '06:00:00', 'Thursday'),
(20, 4, '04:00:00', '06:00:00', 'Friday'),
(21, 4, '04:00:00', '06:00:00', 'Saturday'),
(22, 4, '04:00:00', '06:00:00', 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `program_update`
--

CREATE TABLE `program_update` (
  `prog_upt_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `program_update` text NOT NULL,
  `prog_comment` text DEFAULT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `program_update`
--

INSERT INTO `program_update` (`prog_upt_id`, `program_id`, `program_update`, `prog_comment`, `update_date`) VALUES
(2, 1, '  The program was completed successfully', 'Good job done', '2021-12-28'),
(3, 1, 'The host was late by 5 minutes', 'Keep that up', '2021-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `sales_agency`
--

CREATE TABLE `sales_agency` (
  `agency_id` int(11) NOT NULL,
  `agency_name` varchar(200) NOT NULL,
  `agency_email` varchar(200) NOT NULL,
  `agency_phone` char(15) NOT NULL,
  `agency_location` varchar(200) NOT NULL,
  `archive_agency` varchar(200) NOT NULL,
  `agency_branch` varchar(200) NOT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales_agency`
--

INSERT INTO `sales_agency` (`agency_id`, `agency_name`, `agency_email`, `agency_phone`, `agency_location`, `archive_agency`, `agency_branch`, `contact_name`, `contact_phone`) VALUES
(3, 'Nestle Ghana', 'sales@nestlegh.com', '0200000000', 'Tema Industrial Area', 'Yes', 'Accra', NULL, NULL),
(4, 'Unilever Ghana Limited', 'sales@unilevergh.com', '0202222455', 'Tema Industrial Area', 'No', 'Accra', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scripts`
--

CREATE TABLE `scripts` (
  `script_id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `script_title` varchar(255) DEFAULT NULL,
  `script_content` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `archive_script` enum('Yes','No') DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `employee_id` int(200) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `archive_session` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `employee_id`, `description`, `date`, `archive_session`) VALUES
(4, 2021003, 'drgrgftb', '2021-11-24', 'No'),
(5, 2021005, 'fdvnjkkdfv', '2021-11-24', 'No'),
(6, 2021002, 'fhfn', '2022-08-04', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `teammembers`
--

CREATE TABLE `teammembers` (
  `id` int(11) NOT NULL,
  `employee_id` int(200) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `member_type` enum('Unit Head','Member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teammembers`
--

INSERT INTO `teammembers` (`id`, `employee_id`, `activity_id`, `member_type`) VALUES
(21, 2021005, 20211109145951, 'Member'),
(39, 2021004, 20211109160455, 'Unit Head'),
(40, 2021002, 20211109160455, 'Member'),
(41, 2021011, 20211109160455, 'Member'),
(58, 2021031, 20211112084930, 'Unit Head'),
(63, 2021019, 20211112111507, 'Unit Head'),
(70, 2021015, 20211209171034, 'Member'),
(71, 2021009, 20211209171034, 'Unit Head'),
(72, 2021003, 20240530225026, 'Unit Head');

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--

CREATE TABLE `test_table` (
  `id` int(11) NOT NULL,
  `month` varchar(200) DEFAULT NULL,
  `day` varchar(200) DEFAULT NULL,
  `year` varchar(200) DEFAULT NULL,
  `archive` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test_table`
--

INSERT INTO `test_table` (`id`, `month`, `day`, `year`, `archive`) VALUES
(23, 'January', 'Monday', '2021', 'No'),
(24, 'February', 'Tuesday', '2022', 'No'),
(25, '', 'Wednesday', '', 'No'),
(26, 'April', '', '2024', 'No'),
(27, 'May', 'Friday', '', 'No'),
(28, '', '', '2026', 'No'),
(29, 'July', 'Sunday', '2027', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `vacancy_id` int(11) NOT NULL,
  `vacancy_title` varchar(200) NOT NULL,
  `vacancy_desc` text NOT NULL,
  `vacancy_resp` text NOT NULL,
  `vacancy_qual` text NOT NULL,
  `vacancy_end_date` date NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`vacancy_id`, `vacancy_title`, `vacancy_desc`, `vacancy_resp`, `vacancy_qual`, `vacancy_end_date`, `date_created`) VALUES
(1, 'Test Test Title', '<ul><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Outline </span></li><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">the </span></li><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">core </span></li><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">responsibilities</span></li></ul>', '<ul><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Outline </span></li><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">the </span></li><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">core </span></li><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">responsibilities</span></li></ul>', '<ul><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Outline </span></li><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">the </span></li><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">core </span></li><li><span style=\"box-sizing: inherit; overflow-wrap: anywhere; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">responsibilities</span></li></ul>', '2022-08-17', '0000-00-00'),
(2, 'Test Test Title 2', '<ul><li>dfxhjjhvf</li><li>kbxbvfjdfb</li><li>jhbjdfjjfbdjvb</li></ul><div>dfkvjkbdjvbjbdfjvbjdkfbvjbjbdvfjbjdbvjbjdbb kdbvfkbkbvkbkdfvbkbkdfbvkbkdfbvkbvkfdbkbvkdfbkvdbf</div>', '<ul><li>dfxhjjhvf</li><li>kbxbvfjdfb</li><li>jhbjdfjjfbdjvb</li></ul><div>dfkvjkbdjvbjbdfjvbjdkfbvjbjbdvfjbjdbvjbjdbb kdbvfkbkbvkbkdfvbkbkdfbvkbkdfbvkbvkfdbkbvkdfbkvdbf</div>', '<ul><li>dfxhjjhvf</li><li>kbxbvfjdfb</li><li>jhbjdfjjfbdjvb</li></ul><div>dfkvjkbdjvbjbdfjvbjdkfbvjbjbdvfjbjdbvjbjdbb kdbvfkbkbvkbkdfvbkbkdfbvkbkdfbvkbvkfdbkbvkdfbkvdbf</div>', '2022-08-17', '2022-08-17'),
(4, 'Studio Producer', 'Producer for Asaase Radio<div><ul><li>Manage program line up</li><li>Manage programs</li><li>Train presenters and members</li></ul></div>', 'Producer for Asaase Radio<div><ul><li>Manage program line up</li><li>Manage programs</li><li>Train presenters</li></ul></div>', 'Producer for Asaase Radio<div><ul><li>Manage program line up</li><li>Manage programs</li><li>Train presenters</li></ul></div>', '2022-08-18', '2022-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `week_collection`
--

CREATE TABLE `week_collection` (
  `week_col_id` int(11) NOT NULL,
  `col_week_amt` decimal(10,2) NOT NULL,
  `col_budget_amt` decimal(10,2) NOT NULL,
  `reason` text DEFAULT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `gmcomment` text DEFAULT NULL,
  `archive_wcol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `week_collection`
--

INSERT INTO `week_collection` (`week_col_id`, `col_week_amt`, `col_budget_amt`, `reason`, `date`, `branch`, `gmcomment`, `archive_wcol`) VALUES
(2, 110000.00, 20000.00, 'dgrdgbdfbxfb', '2021-11-10', 'Accra', NULL, 'No'),
(3, 13000.00, 50000.00, 'fdbdbdfb', '2021-11-10', 'Accra', NULL, 'No'),
(5, 255000.10, 300000.05, 'gsdhcvhsdv', '2021-11-20', 'Accra', NULL, 'No'),
(6, 50000.00, 100000.00, 'No reason', '2021-12-13', 'Accra', NULL, 'No'),
(7, 60000.00, 120000.00, '', '2021-12-08', 'Accra', NULL, 'Yes'),
(8, 70000.00, 140000.00, 'There is one', '2021-12-09', 'Accra', NULL, 'Yes'),
(9, 50000.00, 1200000.00, 'No reason', '2022-01-07', 'Accra', NULL, 'No'),
(10, 200000.00, 250000.00, 'sdfbjhjdb', '2022-02-02', 'Kumasi', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `week_sales`
--

CREATE TABLE `week_sales` (
  `week_sales_id` int(11) NOT NULL,
  `sales_target` decimal(10,2) NOT NULL,
  `act_sale_target` decimal(10,2) NOT NULL,
  `reason` text DEFAULT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `gmcomment` text DEFAULT NULL,
  `archive_wsales` varchar(200) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `week_sales`
--

INSERT INTO `week_sales` (`week_sales_id`, `sales_target`, `act_sale_target`, `reason`, `date`, `branch`, `gmcomment`, `archive_wsales`, `employee_id`, `filename`) VALUES
(4, 33000.00, 30000.00, 'bbbuuu1', '2021-11-11', 'Accra', NULL, 'No', 0, NULL),
(5, 4455255.00, 55555.00, 'sAY SOME THING ', '2021-11-12', 'Kumasi', 'That is way to big for the different, do something about it', 'No', 0, NULL),
(6, 2345678.00, 234567.00, 'dfgjjgv', '2021-11-11', 'Accra', NULL, 'No', 0, NULL),
(7, 270000.70, 350000.20, 'hbjjsdjvcs', '2021-11-15', 'Accra', 'The different should be better than this', 'No', 0, NULL),
(8, 50000.00, 100000.00, 'No reason', '2021-12-07', 'Accra', NULL, 'No', 0, NULL),
(9, 60000.00, 120000.00, '', '2021-12-07', 'Accra', NULL, 'No', 0, NULL),
(10, 70000.00, 140000.00, 'There is one', '2021-12-07', 'Accra', NULL, 'No', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `year_collection`
--

CREATE TABLE `year_collection` (
  `year_col_id` int(11) NOT NULL,
  `year_col_budget` decimal(10,2) NOT NULL,
  `year_col_annual` decimal(10,2) NOT NULL,
  `reason` text NOT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `gmcomment` text DEFAULT NULL,
  `archive_ycol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `year_collection`
--

INSERT INTO `year_collection` (`year_col_id`, `year_col_budget`, `year_col_annual`, `reason`, `date`, `branch`, `gmcomment`, `archive_ycol`) VALUES
(2, 50000.00, 100000.00, 'Uudjdujcvjuds', '2021-11-10', 'Kumasi', NULL, 'No'),
(3, 75000.00, 100000.00, 'dfxchjdcxdrh', '2021-11-11', 'Kumasi', NULL, 'No'),
(5, 250000.00, 350000.00, 'dfxvdv', '2021-11-24', 'Accra', NULL, 'No'),
(6, 23454.00, 543565.00, 'fhfhfhbgfsedfsdv', '2021-11-24', 'Accra', NULL, 'No'),
(7, 50000.00, 100000.00, 'No reason', '2021-12-07', 'Accra', NULL, 'No'),
(8, 60000.00, 120000.00, '', '2021-12-08', 'Accra', NULL, 'Yes'),
(9, 70000.00, 140000.00, 'There is one', '2021-12-09', 'Accra', NULL, 'Yes'),
(10, 20000.00, 500000.00, 'No reason', '2022-01-06', 'Kumasi', NULL, 'No'),
(11, 35000.00, 40000.00, 'fdhbjhb', '2022-02-02', 'Kumasi', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `yet_sales`
--

CREATE TABLE `yet_sales` (
  `yet_sales_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `sales_target_yet` decimal(10,2) NOT NULL,
  `sales_to_date` decimal(10,2) NOT NULL,
  `reason` text DEFAULT NULL,
  `date` date NOT NULL,
  `branch` varchar(200) NOT NULL,
  `gmcomment` text DEFAULT NULL,
  `archive_ysales` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `yet_sales`
--

INSERT INTO `yet_sales` (`yet_sales_id`, `employee_id`, `sales_target_yet`, `sales_to_date`, `reason`, `date`, `branch`, `gmcomment`, `archive_ysales`) VALUES
(3, 0, 122500.00, 12000.90, 'Pay in three dajoopjdfjotlhll\nkjndfknkngb\nknkfgnkngbnkl\nlnlnbglng\n', '2021-11-11', 'Accra', 'Let the collection process commence', 'No'),
(6, 0, 500000.00, 200000.00, 'ssvsvsv', '2021-11-11', 'Kumasi', NULL, 'No'),
(8, 0, 60000.00, 120000.00, '', '2021-12-07', 'Accra', NULL, 'Yes'),
(9, 0, 70000.00, 140000.00, 'There is one', '2021-12-07', 'Accra', NULL, 'No'),
(16, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(17, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(18, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(19, 0, 50000.00, 100000.00, 'No reason', '2024-05-31', 'Accra', NULL, ''),
(20, 0, 60000.00, 120000.00, '', '2024-05-31', 'Accra', NULL, ''),
(21, 0, 70000.00, 140000.00, 'There is one', '2024-05-31', 'Accra', NULL, ''),
(22, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(23, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(24, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(25, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(26, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(27, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(28, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(29, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(30, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(31, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(32, 0, 50000.00, 100000.00, 'No reason', '2024-05-31', 'Accra', NULL, ''),
(33, 0, 60000.00, 120000.00, '', '2024-05-31', 'Accra', NULL, ''),
(34, 0, 70000.00, 140000.00, 'There is one', '2024-05-31', 'Accra', NULL, ''),
(35, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(36, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(37, 0, 0.00, 0.00, '', '0000-00-00', 'Accra', NULL, ''),
(38, 0, 50000.00, 100000.00, 'No reason', '2024-05-31', 'Accra', NULL, ''),
(39, 0, 60000.00, 120000.00, '', '2024-05-31', 'Accra', NULL, ''),
(40, 0, 70000.00, 140000.00, 'There is one', '2024-05-31', 'Accra', NULL, ''),
(41, 0, 0.00, 0.00, '100000.00', '0000-00-00', 'Accra', NULL, ''),
(42, 0, 0.00, 0.00, '120000.00', '0000-00-00', 'Accra', NULL, ''),
(43, 0, 0.00, 0.00, '140000.00', '0000-00-00', 'Accra', NULL, ''),
(44, 0, 0.00, 0.00, '100000.00', '2024-05-31', 'Accra', NULL, ''),
(45, 0, 0.00, 0.00, '120000.00', '0000-00-00', 'Accra', NULL, ''),
(46, 0, 0.00, 0.00, '140000.00', '0000-00-00', 'Accra', NULL, ''),
(47, 0, 0.00, 0.00, '100000.00', '0000-00-00', 'Accra', NULL, ''),
(48, 0, 0.00, 0.00, '120000.00', '0000-00-00', 'Accra', NULL, ''),
(49, 0, 0.00, 0.00, '140000.00', '0000-00-00', 'Accra', NULL, ''),
(50, 0, 0.00, 0.00, '100000.00', '0000-00-00', 'Accra', NULL, ''),
(51, 0, 0.00, 0.00, '120000.00', '0000-00-00', 'Accra', NULL, ''),
(52, 0, 0.00, 0.00, '140000.00', '0000-00-00', 'Accra', NULL, ''),
(53, 0, 10000.00, 15000.00, 'Over Stock', '2024-06-05', 'Accra', NULL, 'No'),
(54, 0, 0.00, 0.00, '1100000.00', '0000-00-00', 'Accra', NULL, ''),
(55, 0, 0.00, 0.00, '120000.00', '0000-00-00', 'Accra', NULL, ''),
(56, 0, 0.00, 0.00, '140000.00', '0000-00-00', 'Accra', NULL, ''),
(57, 0, 0.00, 0.00, '1100000.00', '0000-00-00', 'Accra', NULL, ''),
(58, 0, 0.00, 0.00, '120000.00', '0000-00-00', 'Accra', NULL, ''),
(59, 0, 0.00, 0.00, '140000.00', '0000-00-00', 'Accra', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `department` (`department`),
  ADD KEY `branch` (`branch`);

--
-- Indexes for table `activity_budget`
--
ALTER TABLE `activity_budget`
  ADD PRIMARY KEY (`activity_budget_id`);

--
-- Indexes for table `annual_expense`
--
ALTER TABLE `annual_expense`
  ADD PRIMARY KEY (`ann_exp_id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `branch` (`branch`);

--
-- Indexes for table `asset_employee`
--
ALTER TABLE `asset_employee`
  ADD PRIMARY KEY (`asset_employee_id`),
  ADD KEY `asset_id` (`asset_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `asset_request`
--
ALTER TABLE `asset_request`
  ADD PRIMARY KEY (`asset_request_id`),
  ADD UNIQUE KEY `asset_request_id` (`asset_request_id`),
  ADD KEY `employee` (`employee`);

--
-- Indexes for table `asset_status`
--
ALTER TABLE `asset_status`
  ADD PRIMARY KEY (`asset_status_id`),
  ADD KEY `aasset_id` (`asset_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch`);

--
-- Indexes for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD PRIMARY KEY (`break_id`),
  ADD KEY `branch` (`branch`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department`);

--
-- Indexes for table `department_unit`
--
ALTER TABLE `department_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_upload`
--
ALTER TABLE `document_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `scripts`
--
ALTER TABLE `scripts`
  ADD PRIMARY KEY (`script_id`),
  ADD KEY `program_id` (`program_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_request`
--
ALTER TABLE `asset_request`
  MODIFY `asset_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `document_upload`
--
ALTER TABLE `document_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021143;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `scripts`
--
ALTER TABLE `scripts`
  MODIFY `script_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scripts`
--
ALTER TABLE `scripts`
  ADD CONSTRAINT `scripts_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
