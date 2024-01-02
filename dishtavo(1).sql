-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 07:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dishtavo`
--

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_admin`
--

CREATE TABLE `dsh2_admin` (
  `id` int(3) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1=admin,2 =editor,3=team member,4=office member',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_admin`
--

INSERT INTO `dsh2_admin` (`id`, `type`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '2023-12-06 10:06:24', '2023-12-06 10:06:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_college`
--

CREATE TABLE `dsh2_college` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_archive` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dsh2_college`
--

INSERT INTO `dsh2_college` (`id`, `name`, `address`, `email`, `mobile`, `is_active`, `is_archive`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Testeeeedfdf', 'testsdfsdf', 'test@testing.com', '9890098900sdfsd', 1, 0, NULL, NULL, NULL, '2023-12-11 09:50:42', '2023-12-13 10:49:26'),
(2, 'DMC', 'Assagao - Goafgfgf', 'dmc@yopmail.com', '9890098900', 1, 0, NULL, NULL, NULL, '2023-12-13 05:32:28', '2023-12-13 11:04:23'),
(3, 'Khandola', 'sdfsdf', 'sdfdsf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 05:39:45', '2023-12-13 05:39:45'),
(4, 'Khandola', 'sdfsdf', 'sdfdsf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 05:41:56', '2023-12-13 05:41:56'),
(5, 'fdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 05:42:05', '2023-12-13 05:42:05'),
(6, 'fdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 05:42:55', '2023-12-13 05:42:55'),
(7, 'fdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 05:43:24', '2023-12-13 05:43:24'),
(8, 'fdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 05:52:50', '2023-12-13 05:52:50'),
(9, 'fdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 05:54:30', '2023-12-13 05:54:30'),
(10, 'fdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 05:54:44', '2023-12-13 05:54:44'),
(11, 'fdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 06:03:41', '2023-12-13 06:03:41'),
(12, 'fdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 06:04:34', '2023-12-13 06:04:34'),
(13, 'bla', 'sdfsd', 'sdfsd', 'sdf', 1, 0, NULL, NULL, NULL, '2023-12-13 06:08:38', '2023-12-13 06:08:38'),
(14, 'bla', 'sdfsd', 'sdfsd', 'sdf', 1, 0, NULL, NULL, NULL, '2023-12-13 06:21:27', '2023-12-13 06:21:27'),
(15, 'bla', 'sdfsd', 'sdfsd', 'sdf', 1, 0, NULL, NULL, NULL, '2023-12-13 06:21:58', '2023-12-13 06:21:58'),
(16, 'Test', 'addresss', 'test@testing.com', '9898765632', 1, 0, NULL, NULL, NULL, '2023-12-13 09:37:43', '2023-12-13 09:37:43'),
(17, 'Test', 'addresss', 'test@testing.com', '9898765632', 1, 0, NULL, NULL, NULL, '2023-12-13 09:38:21', '2023-12-13 09:38:21'),
(18, 'Test', 'addresss', 'test@testing.com', '9898765632', 1, 0, NULL, NULL, NULL, '2023-12-13 09:38:55', '2023-12-13 09:38:55'),
(19, 'Test', 'addresss', 'test@testing.com', '9898765632', 1, 0, NULL, NULL, NULL, '2023-12-13 09:40:16', '2023-12-13 09:40:16'),
(20, 'sdfdsf', 'sdfsdf', 'sdfsdf', 'sdf', 1, 0, NULL, NULL, NULL, '2023-12-13 09:40:41', '2023-12-13 09:40:41'),
(21, 'dsfsdffdfd', 'sdfsdfdfdf', 'sdfds', 'sdf', 1, 0, NULL, NULL, NULL, '2023-12-13 09:41:54', '2023-12-13 10:44:33'),
(22, 'sdsdsd', 'sdsds', 'dsds', 'sdfsdf', 1, 0, NULL, NULL, NULL, '2023-12-13 10:14:33', '2023-12-13 10:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_course`
--

CREATE TABLE `dsh2_course` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_archive` tinyint(1) DEFAULT 0,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dsh2_course`
--

INSERT INTO `dsh2_course` (`id`, `name`, `is_active`, `is_archive`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Research Methodology', 1, 0, NULL, NULL, NULL, '2023-12-20 10:26:25', '2023-12-21 05:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_course_category`
--

CREATE TABLE `dsh2_course_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_course_codes`
--

CREATE TABLE `dsh2_course_codes` (
  `id` int(3) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_designation`
--

CREATE TABLE `dsh2_designation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_designation`
--

INSERT INTO `dsh2_designation` (`id`, `name`) VALUES
(1, 'Assistant Professor'),
(2, 'Associate Professor'),
(3, 'Professor'),
(4, 'Associate Proffessor');

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_editing_schedule`
--

CREATE TABLE `dsh2_editing_schedule` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `allocation_date` date NOT NULL,
  `status` enum('Incomplete','Incomplete') NOT NULL,
  `completion_date` date NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_faculty`
--

CREATE TABLE `dsh2_faculty` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `current_appointment_type` enum('Regular','Contact','Lecture Basis') DEFAULT 'Regular',
  `current_designation_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_language`
--

CREATE TABLE `dsh2_language` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dsh2_language`
--

INSERT INTO `dsh2_language` (`id`, `code`, `name`) VALUES
(1, 'EN', 'English'),
(2, 'KN', 'Konkani');

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_menu`
--

CREATE TABLE `dsh2_menu` (
  `id` int(3) NOT NULL,
  `parent_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url_slug` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_menu`
--

INSERT INTO `dsh2_menu` (`id`, `parent_id`, `name`, `url_slug`, `icon`) VALUES
(1, 0, 'Subjects', '/subjects', ''),
(2, 1, 'List', '/subjects/list', ''),
(3, 0, 'Courses', '/courses', ''),
(4, 3, 'Add ', '/courses/Add', ''),
(5, 3, 'List', '/courses/list', ''),
(6, 0, 'Course coordinator', '/course_coordinator', ''),
(7, 6, 'List', '/course_coordinator/list', ''),
(8, 6, 'Add ', '/course_coordinator/Add', ''),
(9, 6, 'Coordinator report', '/course_coordinator/report', ''),
(10, 0, 'Video', '/video', ''),
(11, 10, 'Add Video', '/video/add_video', ''),
(12, 10, 'List Videos', '/video/list', ''),
(13, 0, 'Recording details', '/recording_details', ''),
(14, 0, 'Faculty', '/faculty', ''),
(15, 14, 'List Faculties', '/list_faculties', ''),
(16, 14, 'Module Report-Faculty wise', '/fac_modulereport', ''),
(17, 14, 'Quad Report-Facultywise', '/fac_quadreport', ''),
(18, 14, 'Quad Report- Collegewise', '/college_quadreport', ''),
(19, 0, 'Quadrant', '/quadrant', ''),
(20, 19, 'Transcript Report', '/quadrant/transcript_report', ''),
(21, 19, 'Quadrant Report Subject wise', '/quadreport_subjectwise', ''),
(22, 19, 'Unit End Assessment Report Subject wise', '/uae_subjectwise', ''),
(23, 0, 'Office Reports', '/office_reports', ''),
(24, 23, 'College Wise duty report-monthly', '/collegewise_dutyreport', ''),
(25, 23, 'Vetting Modules', '/vetting_modules', ''),
(26, 23, 'College Wise Duty report-Daily', '/collegewise_dutyreport_daily', ''),
(28, 0, 'Quadrant Data', '/quadrant_data', ''),
(29, 0, 'Vet Modules', '/vet_modules', ''),
(30, 0, 'Transcript Management', '/transcript_management', ''),
(31, 0, 'View Profile', '/view_profile', ''),
(32, 0, 'Generate Certificate', '/generate_cert', '');

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_module`
--

CREATE TABLE `dsh2_module` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_no` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `learning_outcomes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_archive` tinyint(1) DEFAULT 0,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dsh2_module`
--

INSERT INTO `dsh2_module` (`id`, `name`, `display_no`, `learning_outcomes`, `is_active`, `is_archive`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tools of Data Collection: Schedules', '1', NULL, 1, 0, NULL, NULL, NULL, '2023-12-21 06:23:39', '2023-12-21 06:23:39', NULL),
(2, 'Tools of Data Collection: Questionnaire', '2', NULL, 1, 0, NULL, NULL, NULL, '2023-12-21 06:23:39', '2023-12-21 06:23:39', NULL),
(3, 'sdfds', '', 'sdfdsf', 1, 0, 1, NULL, NULL, '2023-12-28 11:51:15', '2023-12-28 11:51:15', NULL),
(4, 'test1', '', 'test1', 1, 0, 1, NULL, NULL, '2023-12-28 12:00:44', '2023-12-28 12:00:44', NULL),
(5, 'test1', '', 'test1', 1, 0, 1, NULL, NULL, '2023-12-28 12:01:33', '2023-12-28 12:01:33', NULL),
(6, 'test1', '', 'test1', 1, 0, 1, NULL, NULL, '2023-12-28 12:06:08', '2023-12-28 12:06:08', NULL),
(7, 'test3', '', 'test3', 1, 0, 1, NULL, NULL, '2023-12-28 12:08:09', '2023-12-28 12:08:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_module_video`
--

CREATE TABLE `dsh2_module_video` (
  `id` int(11) NOT NULL,
  `unit_module_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_module_video`
--

INSERT INTO `dsh2_module_video` (`id`, `unit_module_id`, `video_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, '2023-12-21 07:06:34', '2023-12-21 07:06:34', NULL),
(2, 1, 2, NULL, NULL, NULL, '2023-12-21 07:06:34', '2023-12-21 07:06:34', NULL),
(3, NULL, 1, 1, NULL, NULL, '2023-12-29 11:43:12', '2023-12-29 11:43:12', NULL),
(4, NULL, 1, 1, NULL, NULL, '2023-12-29 11:44:08', '2023-12-29 11:44:08', NULL),
(5, 2, 1, 1, NULL, NULL, '2023-12-29 11:44:52', '2023-12-29 11:44:52', NULL),
(6, 6, 2, 1, NULL, NULL, '2023-12-29 11:45:30', '2023-12-29 11:45:30', NULL),
(7, 7, 2, 1, NULL, NULL, '2023-12-29 11:48:24', '2023-12-29 11:48:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_programme`
--

CREATE TABLE `dsh2_programme` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1= current, 2=NEP',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(4) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_archive` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(4) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dsh2_programme`
--

INSERT INTO `dsh2_programme` (`id`, `type`, `name`, `position`, `is_active`, `is_archive`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Bachelor of Arts', 1, 1, 0, NULL, NULL, NULL, '2023-12-20 10:25:53', '2023-12-20 10:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_programme_course`
--

CREATE TABLE `dsh2_programme_course` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `position` int(6) NOT NULL,
  `code` varchar(50) NOT NULL COMMENT 'code will be unique for programme course',
  `paper_code` varchar(50) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester` int(3) NOT NULL,
  `programme_type` enum('General','Honours') DEFAULT 'General',
  `no_of_credits` int(10) NOT NULL,
  `effective_from_year` varchar(4) NOT NULL,
  `course_prerequisite` text NOT NULL,
  `objectives` text NOT NULL,
  `is_derived` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_programme_course`
--

INSERT INTO `dsh2_programme_course` (`id`, `subject_id`, `faculty_id`, `position`, `code`, `paper_code`, `program_id`, `course_id`, `semester`, `programme_type`, `no_of_credits`, `effective_from_year`, `course_prerequisite`, `objectives`, `is_derived`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'CODE', 'PCODE', 1, 1, 4, 'General', 2, '2024', 'prerequi', 'obj', 0, NULL, NULL, NULL, '2023-12-20 10:27:58', '2023-12-20 10:27:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_programme_course_coordinator`
--

CREATE TABLE `dsh2_programme_course_coordinator` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = Coordinator, 2 = Co-coordinator',
  `programme_course_id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_programme_course_unit`
--

CREATE TABLE `dsh2_programme_course_unit` (
  `id` int(11) NOT NULL,
  `position` int(5) NOT NULL,
  `programme_course_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_programme_course_unit`
--

INSERT INTO `dsh2_programme_course_unit` (`id`, `position`, `programme_course_id`, `unit_id`, `created_at`, `created_by`) VALUES
(1, 1, 1, 1, '2023-12-21 11:26:42', 0),
(2, 3, 1, 2, '2023-12-21 11:26:42', 0),
(3, 3, 1, 3, '2023-12-28 15:06:59', 1),
(5, 2, 1, 5, '2023-12-29 17:17:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_programme_course_unit_module`
--

CREATE TABLE `dsh2_programme_course_unit_module` (
  `id` int(11) NOT NULL,
  `position` int(6) NOT NULL,
  `programme_course_unit_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_programme_course_unit_module`
--

INSERT INTO `dsh2_programme_course_unit_module` (`id`, `position`, `programme_course_unit_id`, `module_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, '2023-12-21 06:25:03', '2023-12-21 06:25:03', NULL),
(4, 4, 1, 7, 1, NULL, NULL, '2023-12-28 12:08:09', '2023-12-28 12:08:09', NULL),
(7, 0, 5, 7, 1, NULL, NULL, '2023-12-29 11:48:06', '2023-12-29 11:48:06', NULL),
(10, 0, 5, 2, 1, NULL, NULL, '2023-12-29 11:55:31', '2023-12-29 11:55:31', NULL),
(11, 0, 2, 1, 1, NULL, NULL, '2023-12-29 11:56:34', '2023-12-29 11:56:34', NULL),
(12, 0, 1, 6, 1, NULL, NULL, '2024-01-01 04:44:46', '2024-01-01 04:44:46', NULL),
(13, 5, 1, 5, 1, NULL, NULL, '2024-01-01 04:46:31', '2024-01-01 04:46:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_recording_schedule`
--

CREATE TABLE `dsh2_recording_schedule` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `studio_id` int(3) NOT NULL,
  `recording_date` datetime NOT NULL,
  `recording_status` tinyint(1) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_role`
--

CREATE TABLE `dsh2_role` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_role`
--

INSERT INTO `dsh2_role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Team_member'),
(3, 'Office_member'),
(4, 'Editor'),
(5, 'Faculty'),
(6, 'Coordinator'),
(7, 'Co-coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_role_menu`
--

CREATE TABLE `dsh2_role_menu` (
  `id` int(3) NOT NULL,
  `role_id` int(1) NOT NULL,
  `menu_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_role_menu`
--

INSERT INTO `dsh2_role_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 6),
(4, 1, 10),
(5, 1, 13),
(6, 1, 14),
(7, 1, 19),
(8, 1, 23),
(9, 2, 1),
(10, 2, 3),
(11, 2, 6),
(12, 2, 10),
(13, 2, 13),
(14, 2, 14),
(15, 2, 19),
(16, 5, 28),
(17, 5, 30),
(18, 5, 31),
(19, 5, 32),
(20, 6, 28),
(21, 6, 29),
(22, 6, 30),
(23, 6, 31),
(24, 6, 32),
(25, 3, 23);

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_studio`
--

CREATE TABLE `dsh2_studio` (
  `id` int(3) NOT NULL,
  `studio_name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_subject`
--

CREATE TABLE `dsh2_subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_archive` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dsh2_subject`
--

INSERT INTO `dsh2_subject` (`id`, `name`, `icon`, `is_active`, `is_archive`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Konkani', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(2, 'Economics', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(3, 'Zoology', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(4, 'Hindi', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(5, 'Marathi', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(6, 'Geography', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(7, 'History', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(8, 'Political Science', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(9, 'Sociology', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(10, 'English', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(11, 'Commerce', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(12, 'Psychology', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(13, 'Mathematics', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(14, 'Philosophy', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(15, 'Chemistry', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(16, 'Botany', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(17, 'Physics', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(18, 'Computer Science', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(19, 'Microbiology', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(20, 'Music', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(21, 'Geology', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(22, 'Electronics', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(23, 'Law', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(24, 'Education', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(25, 'Theatre', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(26, 'Home Science', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(27, 'EVS', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(28, 'Agriculture', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42'),
(100, 'Dishtavo', '', 1, 0, 1, NULL, NULL, '2023-12-14 05:08:42', '2023-12-14 05:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_unit`
--

CREATE TABLE `dsh2_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `learning_objectives` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_archive` tinyint(1) DEFAULT 0,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dsh2_unit`
--

INSERT INTO `dsh2_unit` (`id`, `name`, `learning_objectives`, `is_active`, `is_archive`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Data Collection and Presentation', NULL, 1, 0, NULL, NULL, NULL, '2023-12-21 05:56:00', '2023-12-21 05:56:00', NULL),
(2, 'Measures of Central Tendency and Dispersion', NULL, 1, 0, NULL, NULL, NULL, '2023-12-21 05:56:00', '2023-12-21 05:56:00', NULL),
(4, 'Bhakti unit', 'something', 1, 0, 1, NULL, NULL, '2023-12-28 10:19:33', '2023-12-28 10:19:33', NULL),
(5, 'Abhi', 'sdfsdf sdfds', 1, 0, 1, NULL, NULL, '2023-12-29 11:47:42', '2023-12-29 11:47:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_user`
--

CREATE TABLE `dsh2_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salutation` char(8) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_user`
--

INSERT INTO `dsh2_user` (`id`, `username`, `password`, `email`, `mobile`, `salutation`, `firstname`, `lastname`, `is_approved`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sinduraparabnzcc@gmail.com', '99dc018492f7dad0650855d839c039f6', 'sinduraparabnzcc@gmail.com', '9049467160', 'Ms.', 'Sindura', 'Parab', 1, 1, '2021-10-01 10:28:43', '2023-12-18 11:40:26', NULL),
(2, 'demelooscar@yahoo.co.in', 'dd850853fd31687be091b4e669a5ca4b', 'demelooscar@yahoo.co.in', '9850453149', 'Dr.', 'OSCAR', 'BRAGANCA DEMELO', 1, 1, '2022-07-22 03:31:54', '2023-12-18 11:40:26', NULL),
(3, 'vilmafdes@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'vilmafdes@gmail.com', '8378011997', 'Ms.', 'Vilma Maria Teresa', 'Fernandes', 1, 1, '2022-02-23 05:36:07', '2023-12-18 11:40:26', NULL),
(4, 'naziya1019@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'naziya1019@gmail.com', '9765729734', 'Ms.', 'Naziya', 'Shaikh', 1, 1, '2021-10-01 10:28:43', '2023-12-18 11:40:26', NULL),
(5, 'carina@fragnelcollege.edu.in', '0be1c4599909bdab534643870c07e0df', 'carina@fragnelcollege.edu.in', '9923480648', 'Ms.', 'Carina', 'Vaz', 1, 1, '2021-10-01 10:28:43', '2023-12-18 11:40:26', NULL),
(6, 'rahulnaik160@gmail.com', '875cc9d926189fcbf6ec9c93537adc5e', 'rahulnaik160@gmail.com', '8975104734', 'Mr.', 'Rahul', 'Naik', 1, 1, '2021-10-01 10:28:43', '2023-12-18 11:40:26', NULL),
(7, 'mainkarabhijeet21@gmail.com', '09f7a388972d7f88200cbb071a4fb707', 'mainkarabhijeet21@gmail.com', '8208523064', 'Mr.', 'Abhijeet', 'Mainkar', 1, 1, '2022-02-21 10:24:21', '2023-12-18 11:40:26', NULL),
(8, 'sanchilianafaria@gmail.com', '3091a1746a922cf6304bdee57b66cb6f', 'sanchilianafaria@gmail.com', '9850454270', 'Dr.', 'Sancheliana ', 'Faria ', 1, 1, '2021-10-28 06:12:53', '2023-12-18 11:40:27', NULL),
(9, 'roshnagawas@gmail.com', 'c776addf352b75e0dc07939201a080cc', 'roshnagawas@gmail.com', '9637769012', 'Ms.', 'Roshna', 'Gawas', 1, 1, '2021-10-01 10:28:43', '2023-12-18 11:40:27', NULL),
(10, 'renusagvekar18@gmail.com', '18bef42857abd5eef4358facd37bc22b', 'renusagvekar18@gmail.com', '9881064559', 'Ms.', 'Renuka ', 'Sagvekar ', 1, 1, '2021-10-01 10:28:43', '2023-12-18 11:40:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_user_role`
--

CREATE TABLE `dsh2_user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(3) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsh2_user_role`
--

INSERT INTO `dsh2_user_role` (`id`, `user_id`, `role_id`, `created_at`) VALUES
(1, 0, 5, '2023-12-18 17:20:39'),
(2, 1, 5, '2023-12-18 17:20:39'),
(3, 2, 5, '2023-12-18 17:20:39'),
(4, 2, 6, '2023-12-18 17:20:39'),
(5, 4, 5, '2023-12-18 17:20:39'),
(6, 5, 5, '2023-12-18 17:20:40'),
(7, 6, 5, '2023-12-18 17:20:40'),
(8, 7, 5, '2023-12-18 17:20:40'),
(9, 7, 6, '2023-12-18 17:20:40'),
(10, 9, 5, '2023-12-18 17:20:40'),
(11, 10, 5, '2023-12-18 17:20:40'),
(12, 11, 5, '2023-12-18 17:20:40'),
(13, 0, 5, '2023-12-18 17:21:25'),
(14, 13, 5, '2023-12-18 17:21:26'),
(15, 14, 5, '2023-12-18 17:21:26'),
(16, 14, 6, '2023-12-18 17:21:26'),
(17, 16, 5, '2023-12-18 17:21:26'),
(18, 17, 5, '2023-12-18 17:21:26'),
(19, 18, 5, '2023-12-18 17:21:26'),
(20, 19, 5, '2023-12-18 17:21:26'),
(21, 19, 6, '2023-12-18 17:21:26'),
(22, 21, 5, '2023-12-18 17:21:26'),
(23, 22, 5, '2023-12-18 17:21:26'),
(24, 23, 5, '2023-12-18 17:21:26'),
(25, 0, 5, '2023-12-18 17:22:01'),
(26, 25, 5, '2023-12-18 17:22:01'),
(27, 26, 5, '2023-12-18 17:22:01'),
(28, 26, 6, '2023-12-18 17:22:01'),
(29, 28, 5, '2023-12-18 17:22:01'),
(30, 29, 5, '2023-12-18 17:22:01'),
(31, 30, 5, '2023-12-18 17:22:01'),
(32, 31, 5, '2023-12-18 17:22:01'),
(33, 31, 6, '2023-12-18 17:22:01'),
(34, 33, 5, '2023-12-18 17:22:01'),
(35, 34, 5, '2023-12-18 17:22:02'),
(36, 35, 5, '2023-12-18 17:22:02'),
(37, 0, 5, '2023-12-18 17:22:22'),
(38, 37, 5, '2023-12-18 17:22:22'),
(39, 38, 5, '2023-12-18 17:22:22'),
(40, 38, 6, '2023-12-18 17:22:22'),
(41, 40, 5, '2023-12-18 17:22:22'),
(42, 41, 5, '2023-12-18 17:22:22'),
(43, 42, 5, '2023-12-18 17:22:22'),
(44, 43, 5, '2023-12-18 17:22:22'),
(45, 43, 6, '2023-12-18 17:22:22'),
(46, 45, 5, '2023-12-18 17:22:22'),
(47, 46, 5, '2023-12-18 17:22:23'),
(48, 47, 5, '2023-12-18 17:22:23'),
(49, 0, 5, '2023-12-18 17:25:51'),
(50, 49, 5, '2023-12-18 17:25:51'),
(51, 50, 5, '2023-12-18 17:25:51'),
(52, 50, 6, '2023-12-18 17:25:51'),
(53, 52, 5, '2023-12-18 17:25:51'),
(54, 53, 5, '2023-12-18 17:25:51'),
(55, 54, 5, '2023-12-18 17:25:51'),
(56, 55, 5, '2023-12-18 17:25:51'),
(57, 55, 6, '2023-12-18 17:25:51'),
(58, 57, 5, '2023-12-18 17:25:51'),
(59, 58, 5, '2023-12-18 17:25:52'),
(60, 59, 5, '2023-12-18 17:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_vetter_remark`
--

CREATE TABLE `dsh2_vetter_remark` (
  `id` int(11) NOT NULL,
  `vetting_schedule_id` int(11) NOT NULL,
  `content_changes` varchar(1000) NOT NULL,
  `rec_remarks` varchar(100) NOT NULL,
  `other_rec_reson` varchar(100) NOT NULL,
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_vetting_schedule`
--

CREATE TABLE `dsh2_vetting_schedule` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `allocation_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `vet_url` varchar(255) NOT NULL,
  `vet_cmpl_date` date NOT NULL,
  `vet_action` varchar(150) NOT NULL,
  `vet_remarks` varchar(150) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dsh2_video`
--

CREATE TABLE `dsh2_video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `transcript` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `is_archive` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `created_by` int(3) UNSIGNED DEFAULT NULL,
  `updated_by` int(3) UNSIGNED DEFAULT NULL,
  `deleted_by` int(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dsh2_video`
--

INSERT INTO `dsh2_video` (`id`, `user_id`, `name`, `video_url`, `language_id`, `transcript`, `is_active`, `is_archive`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'video', 'https://www.youtube.com/watch?v=4ILqym44W0A', 1, 'transcript', 'Y', 'N', NULL, NULL, NULL, '2023-12-21 07:27:08', '2023-12-29 09:48:44', NULL),
(2, 1, 'something', 'https://i.ytimg.com/vi/bATUwsh4mzU/maxresdefault.jpg', 2, NULL, 'Y', 'N', NULL, NULL, NULL, '2023-12-21 07:27:08', '2023-12-29 09:48:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dsh2_admin`
--
ALTER TABLE `dsh2_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`user_id`);

--
-- Indexes for table `dsh2_college`
--
ALTER TABLE `dsh2_college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_course`
--
ALTER TABLE `dsh2_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_course_category`
--
ALTER TABLE `dsh2_course_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_course_codes`
--
ALTER TABLE `dsh2_course_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_designation`
--
ALTER TABLE `dsh2_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_editing_schedule`
--
ALTER TABLE `dsh2_editing_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_language`
--
ALTER TABLE `dsh2_language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `dsh2_menu`
--
ALTER TABLE `dsh2_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_module`
--
ALTER TABLE `dsh2_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_module_video`
--
ALTER TABLE `dsh2_module_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_programme`
--
ALTER TABLE `dsh2_programme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_programme_course`
--
ALTER TABLE `dsh2_programme_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_programme_course_coordinator`
--
ALTER TABLE `dsh2_programme_course_coordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_programme_course_unit`
--
ALTER TABLE `dsh2_programme_course_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_programme_course_unit_module`
--
ALTER TABLE `dsh2_programme_course_unit_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_recording_schedule`
--
ALTER TABLE `dsh2_recording_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_role`
--
ALTER TABLE `dsh2_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_role_menu`
--
ALTER TABLE `dsh2_role_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_studio`
--
ALTER TABLE `dsh2_studio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_subject`
--
ALTER TABLE `dsh2_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_unit`
--
ALTER TABLE `dsh2_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_user`
--
ALTER TABLE `dsh2_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `dsh2_user_role`
--
ALTER TABLE `dsh2_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_vetter_remark`
--
ALTER TABLE `dsh2_vetter_remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_vetting_schedule`
--
ALTER TABLE `dsh2_vetting_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsh2_video`
--
ALTER TABLE `dsh2_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dsh2_admin`
--
ALTER TABLE `dsh2_admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dsh2_college`
--
ALTER TABLE `dsh2_college`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dsh2_course`
--
ALTER TABLE `dsh2_course`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dsh2_course_category`
--
ALTER TABLE `dsh2_course_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dsh2_designation`
--
ALTER TABLE `dsh2_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dsh2_editing_schedule`
--
ALTER TABLE `dsh2_editing_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dsh2_language`
--
ALTER TABLE `dsh2_language`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dsh2_menu`
--
ALTER TABLE `dsh2_menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `dsh2_module`
--
ALTER TABLE `dsh2_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dsh2_module_video`
--
ALTER TABLE `dsh2_module_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dsh2_programme`
--
ALTER TABLE `dsh2_programme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dsh2_programme_course_unit`
--
ALTER TABLE `dsh2_programme_course_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dsh2_programme_course_unit_module`
--
ALTER TABLE `dsh2_programme_course_unit_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dsh2_recording_schedule`
--
ALTER TABLE `dsh2_recording_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dsh2_role`
--
ALTER TABLE `dsh2_role`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dsh2_role_menu`
--
ALTER TABLE `dsh2_role_menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dsh2_subject`
--
ALTER TABLE `dsh2_subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `dsh2_unit`
--
ALTER TABLE `dsh2_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dsh2_user`
--
ALTER TABLE `dsh2_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `dsh2_user_role`
--
ALTER TABLE `dsh2_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `dsh2_vetter_remark`
--
ALTER TABLE `dsh2_vetter_remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dsh2_vetting_schedule`
--
ALTER TABLE `dsh2_vetting_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dsh2_video`
--
ALTER TABLE `dsh2_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
