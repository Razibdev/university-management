-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2021 at 10:24 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websolves_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `email`, `mobile`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'razibhossen8566@gmail.com', '01848178478', NULL, '$2y$10$8oU0jznkoIDiN0hBCNMOA.wd0ez6FzIIjhL27IFTV1Sdd4jiMlNJG', '', 1, NULL, NULL, NULL),
(2, 'teacher', 'admin', 'teacher@gmail.com', '0195805817', NULL, '$2y$10$8oU0jznkoIDiN0hBCNMOA.wd0ez6FzIIjhL27IFTV1Sdd4jiMlNJG', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_roll` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `department_id`, `batch_id`, `subject_id`, `student_id`, `exam_roll`, `attendance_date`, `attendance`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, 854, '2020-12-30', 'Present', '2020-12-30 15:02:29', '2020-12-30 15:02:29'),
(2, 1, 1, 1, 4, 855, '2020-12-30', 'Present', '2020-12-30 15:02:29', '2020-12-30 15:02:29'),
(3, 1, 1, 1, 5, 856, '2020-12-30', 'Absent', '2020-12-30 15:02:29', '2020-12-30 15:02:29'),
(4, 1, 1, 1, 1, 857, '2020-12-30', 'Absent', '2020-12-30 15:02:29', '2020-12-30 15:02:29'),
(5, 1, 1, 1, 2, 854, '2020-12-31', 'Present', '2020-12-31 09:57:11', '2020-12-31 09:57:11'),
(6, 1, 1, 1, 4, 855, '2020-12-31', 'Present', '2020-12-31 09:57:11', '2020-12-31 09:57:11'),
(7, 1, 1, 1, 5, 856, '2020-12-31', 'Present', '2020-12-31 09:57:11', '2020-12-31 09:57:11'),
(8, 1, 1, 1, 1, 857, '2020-12-31', 'Present', '2020-12-31 09:57:11', '2020-12-31 09:57:11'),
(9, 1, 1, 1, 2, 854, '2021-01-11', 'Present', '2021-01-11 14:31:21', '2021-01-11 14:31:21'),
(10, 1, 1, 1, 4, 855, '2021-01-11', 'Absent', '2021-01-11 14:31:21', '2021-01-11 14:31:21'),
(11, 1, 1, 1, 5, 856, '2021-01-11', 'Present', '2021-01-11 14:31:21', '2021-01-11 14:31:21'),
(12, 1, 1, 1, 1, 857, '2021-01-11', 'Present', '2021-01-11 14:31:21', '2021-01-11 14:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `department_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '23rd', NULL, NULL),
(2, 1, '24th', NULL, NULL),
(3, 1, '25th', NULL, NULL),
(5, 1, '26th', '2020-12-20 14:16:26', '2020-12-20 14:55:25'),
(6, 1, '27th', '2021-01-04 08:55:59', '2021-01-04 08:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `designation_id`, `post_id`, `type`, `message`, `created_at`, `updated_at`) VALUES
(1, 14, 8, 'teacher', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2021-01-14 16:26:09', '2021-01-14 16:26:09'),
(2, 24, 9, 'teacher', 'y text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unk', '2021-01-16 22:01:02', '2021-01-16 22:01:02'),
(3, 24, 1, 'teacher', 'y text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unk', '2021-01-16 22:01:33', '2021-01-16 22:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CSE', NULL, NULL),
(2, 'ENGLISH', NULL, NULL),
(3, 'PHARMACY', NULL, NULL),
(6, 'Math', '2021-01-16 22:16:38', '2021-01-16 22:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_event` time NOT NULL,
  `end_event` time NOT NULL,
  `event_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_description`, `address`, `event_image`, `start_event`, `end_event`, `event_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tech Summit', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only', 'Savar, Dhaka', '5552.jpg', '15:49:00', '16:49:00', '2021-03-10', 1, '2021-01-10 09:51:34', '2021-01-10 09:51:34'),
(2, 'What is Lorem Ipsum?', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only', 'Dhaka', '43994.jpg', '15:30:00', '16:30:00', '2021-04-10', 1, '2021-01-10 09:53:05', '2021-01-10 09:53:05'),
(3, 'Why do we use it?', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only', 'Nolam', '15421.jpg', '15:53:00', '16:53:00', '2021-03-18', 1, '2021-01-10 09:54:24', '2021-01-10 09:54:24'),
(4, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 'Nolam, Savar', '29834.jpg', '15:54:00', '16:54:00', '2021-04-15', 1, '2021-01-10 09:55:50', '2021-01-10 09:55:50'),
(5, 'Where can I get some?', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only', 'Nolam, Savar', '29106.jpg', '15:57:00', '16:57:00', '2021-04-07', 1, '2021-01-10 09:57:56', '2021-01-10 09:57:56'),
(6, 'The standard Lorem', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only', 'Nolam, Dhaka', '14509.jpg', '16:00:00', '17:00:00', '2021-03-18', 1, '2021-01-10 10:01:04', '2021-01-10 10:01:04'),
(7, 'translation by H. Rackham', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only', 'Nolam, Savar', '6895.jpg', '16:03:00', '17:03:00', '2021-03-10', 1, '2021-01-10 10:03:54', '2021-01-10 10:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `exam_type` int(11) NOT NULL,
  `exam_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `exam_duration` int(11) NOT NULL,
  `per_page` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `teacher_id`, `department_id`, `batch_id`, `semester_id`, `exam_type`, `exam_title`, `exam_date`, `exam_time`, `exam_duration`, `per_page`, `status`, `created_at`, `updated_at`) VALUES
(7, 14, 1, 1, 8, 1, 'dddd', '2021-01-11', '20:28:00', 49, 5, 1, '2021-01-11 14:26:59', '2021-01-11 14:26:59'),
(8, 24, 1, 1, 8, 1, 'Data mining', '2021-01-16', '08:50:00', 18, 10, 1, '2021-01-16 21:47:37', '2021-01-16 21:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_results`
--

CREATE TABLE `final_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `grade` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` float NOT NULL,
  `credit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_results`
--

INSERT INTO `final_results` (`id`, `department_id`, `batch_id`, `semester_id`, `student_id`, `subject_id`, `mark`, `grade`, `grade_point`, `credit`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 8, 2, 1, 80, 'A+', 4, 3, '2021-01-02 13:12:01', '2021-01-03 10:01:15'),
(2, 1, 1, 8, 2, 2, 75, 'A', 3.75, 3, '2021-01-02 13:12:01', '2021-01-02 13:12:01'),
(3, 1, 1, 8, 4, 1, 80, 'A+', 4, 3, '2021-01-04 08:59:51', '2021-01-04 08:59:51'),
(4, 1, 1, 8, 4, 2, 70, 'A-', 3, 3, '2021-01-04 08:59:52', '2021-01-04 08:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `book_name`, `writer_name`, `book_image`, `book_qty`, `status`, `book_description`, `created_at`, `updated_at`) VALUES
(1, 'Magazin', 'scott Trench', '89136.jpg', '10', '1', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop', '2021-01-10 15:25:24', '2021-01-10 15:50:02'),
(3, 'A daughters', 'Scott Trech', '84552.jpg', '5', '1', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop', '2021-01-10 15:55:06', '2021-01-10 15:55:06'),
(4, 'Title', 'Scott Trech', '87643.jpg', '15', '1', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop', '2021-01-10 16:01:35', '2021-01-10 16:01:35'),
(5, 'Pices of light', 'Scott Trech', '4518.jpg', '20', '1', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop', '2021-01-10 16:02:28', '2021-01-10 16:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `total_mark` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `exam_id`, `total_mark`, `mark`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 10, 8, '2020-12-28 15:05:05', '2020-12-29 10:56:29'),
(2, 2, 1, 10, 7, '2021-01-04 09:29:35', '2021-01-04 09:29:35'),
(3, 2, 7, 10, 10, '2021-01-11 14:28:53', '2021-01-11 14:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_23_035325_create_admins_table', 1),
(5, '2020_12_20_113320_create_teachers_table', 1),
(6, '2020_12_20_114115_create_batches_table', 1),
(7, '2020_12_20_114144_create_semesters_table', 1),
(8, '2020_12_20_114228_create_subjects_table', 1),
(9, '2020_12_20_114314_create_students_table', 1),
(10, '2020_12_20_114547_create_departments_table', 1),
(11, '2020_12_24_105251_create_exams_table', 2),
(12, '2020_12_25_085929_create_questions_table', 3),
(13, '2020_12_27_205358_create_results_table', 4),
(14, '2020_12_28_205739_create_marks_table', 5),
(15, '2020_12_30_183906_create_attendances_table', 6),
(16, '2021_01_01_085121_create_types_table', 7),
(17, '2021_01_02_140542_create_final_results_table', 8),
(19, '2021_01_04_184408_create_events_table', 9),
(20, '2021_01_08_084640_create_posts_table', 10),
(21, '2021_01_10_201551_create_libraries_table', 11),
(22, '2021_01_11_190325_create_ratings_table', 12),
(23, '2021_01_14_213531_create_comments_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `designation_id`, `type`, `post_title`, `post_description`, `post_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Few tips for get better results in examination', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2075.jpg', 1, '2021-01-08 03:33:58', '2021-01-10 10:46:37'),
(5, 14, 'teacher', 'Lorem Ipsum is simply', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '25055.jpg', 1, '2021-01-08 12:21:25', '2021-01-10 10:47:25'),
(8, 5, 'student', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', '23697.png', 1, '2021-01-11 14:43:06', '2021-01-11 14:43:06'),
(9, 7, 'student', 'Test Website', 'this is testing message to all', '413.png', 1, '2021-01-16 21:45:49', '2021-01-16 21:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question_title`, `option1`, `option2`, `option3`, `option4`, `ans`, `type`, `created_at`, `updated_at`) VALUES
(13, 7, 'dddddd', '', '', '', '', '', 'broadquestion', '2021-01-11 14:27:19', '2021-01-11 14:27:19'),
(14, 7, 'dffff', '', '', '', '', 'True', 'boolean', '2021-01-11 14:27:26', '2021-01-11 14:27:26'),
(15, 7, 'ee', 'f', 's', 'd', 'h', 'h', 'mcq', '2021-01-11 14:27:43', '2021-01-11 14:27:43'),
(16, 8, 'how is it work', '', '', '', '', '', 'broadquestion', '2021-01-16 21:54:46', '2021-01-16 21:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `designation_id`, `book_id`, `type`, `first_name`, `last_name`, `rating`, `message`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 'student', 'Rofiq', 'Islam', 5, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.', '2021-01-13 13:20:47', '2021-01-13 13:20:47'),
(3, 14, 3, 'teacher', 'Razib', 'Hossen', 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.', '2021-01-13 14:10:28', '2021-01-13 14:10:28'),
(4, 24, 5, 'teacher', 'Razib', 'Hossen', 4, 'opularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more re', '2021-01-16 22:00:05', '2021-01-16 22:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `exam_id`, `question_id`, `question_title`, `ans`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 'how is it work', 'dd', '2020-12-27 15:25:56', '2020-12-27 15:25:56'),
(2, 5, 1, 2, 'now it is work', 'True', '2020-12-27 15:25:56', '2020-12-27 15:25:56'),
(3, 5, 1, 3, 'now it is work', 'write your answr', '2020-12-27 15:25:56', '2020-12-27 15:25:56'),
(11, 7, 1, 4, 'ddd', 'fff', NULL, NULL),
(12, 2, 1, 1, 'how is it work', 'dd', '2021-01-04 09:28:00', '2021-01-04 09:28:00'),
(13, 2, 1, 2, 'now it is work', 'False', '2021-01-04 09:28:00', '2021-01-04 09:28:00'),
(14, 2, 1, 3, 'now it is work', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '2021-01-04 09:28:01', '2021-01-04 09:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `department_id`, `batch_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1st', NULL, NULL),
(2, 1, 1, '2nd', NULL, NULL),
(3, 1, 1, '3rd', NULL, NULL),
(4, 1, 1, '4th', NULL, NULL),
(5, 1, 1, '5th', NULL, NULL),
(6, 1, 1, '6th', NULL, NULL),
(7, 1, 1, '7th', NULL, NULL),
(8, 1, 1, '8th', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `exam_roll` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `department_id`, `batch_id`, `exam_roll`, `name`, `username`, `email`, `password`, `address`, `phone`, `gender`, `status`, `type`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 857, 'Razib', 'razib', 'razibhossen8566@gmail.com', '$2y$10$K4f7lLKQjAHFKEhOdjvHyuAYQ95ZW/PQladqg5tdZ5XA8hldD9uo2', 'Savar, Dhaka', 1795805817, 'Male', 'Single', 'student', '40321.jpg', '2020-12-21 14:22:27', '2020-12-21 15:51:53'),
(2, 1, 1, 854, 'Razib Hossen', 'razibhossen', 'razib8566@gmail.com', '$2y$10$QrGp/LMsFrFVxbd.LUFar.curXRE2jaGqaYE9h5HvufrMtaaQhJ2C', 'Savar', 2147483647, 'Male', 'Single', 'student', '24960.jpg', '2020-12-21 14:25:38', '2020-12-21 15:52:35'),
(4, 1, 1, 855, 'ratul', 'ratul', 'ratul5@gmail.com', '$2y$10$N.04.RrHWPBv/rTbO7vODe1Csv3FnMi.Bfer.KJGyQnG1x3mVVSVa', 'dddd', 1795805817, 'Male', 'Single', 'student', '76982.JPG', '2020-12-25 10:41:41', '2020-12-25 14:54:35'),
(5, 1, 1, 856, 'Rofiq', 'rofiq', 'rofiq@gmail.com', '$2y$10$AdH0ZHIFVSESdM7UC5hVvOW2bhMhWU9VJvsrwBdGhgjR83juKHe/i', 'address', 2147483647, 'Male', 'Single', 'student', '2414.jpg', '2020-12-25 15:02:09', '2021-01-13 14:00:56'),
(6, 1, 1, 0, 'Mohi', 'mohi', 'mohi@yopmail.com', '$2y$10$rRk9OwUzbqQh7OLTxz1SNeA0JvPhzJHBfG1RTSVRvqKiEm8DYdk32', 'savar', 111111, 'Male', 'Single', 'student', '37886.jpg', '2021-01-16 21:23:52', '2021-01-16 21:23:52'),
(7, 2, 1, 0, 'mehidy', 'mehidy', 'mehidy@yopmail.com', '$2y$10$Cmjax188ZeKDJ75uF0sJfuLpTf5R.eHOfugreMVZ9UfmGQGpZ07b.', 'dad', 1444444444, 'Male', 'Married', 'student', '83928.jpg', '2021-01-16 21:30:32', '2021-01-16 21:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `department_id`, `batch_id`, `semester_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 8, 'Graphic Design', '345', '2020-12-20 14:24:28', '2021-01-02 10:29:33'),
(2, 1, 1, 8, 'AI', '345', '2021-01-02 10:29:10', '2021-01-02 10:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'teacher',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `department_id`, `name`, `username`, `email`, `password`, `designation`, `address`, `phone`, `gender`, `status`, `profile_image`, `type`, `created_at`, `updated_at`) VALUES
(14, 1, 'Razib Hossen', 'razib', 'razibhossen8566@gmail.com', '$2y$10$2EJp4zAw4FAOex2p/98KtuWEPHQhoyeISx/sBoz44MUBfiaQqa3na', 'Ast. Lecturer', 'Savar, Dhaka', 1848178478, 'Male', 'Single', '61096.jpg', 'teacher', '2021-01-10 08:41:53', '2021-01-10 08:41:53'),
(15, 1, 'Mark Alen', 'alen', 'markalen@gmail.com', '$2y$10$fGwAjifcKRH.RXly1Wh/mO2P6IJs6mUzeZkAHwa9AdFp9PhFp.Hmy', 'Ast Lecturer', 'Savar, Dhaka', 1848178478, 'Male', 'Single', '29829.jpg', 'teacher', '2021-01-10 09:02:42', '2021-01-10 09:02:42'),
(16, 1, 'Rebeka Alig', 'rebeka', 'rebekaalig@gmail.com', '$2y$10$Nge2bH9XkQTsoKd8HXL23evy/gd783W.1EquSOpFmHvftl1JrGxn.', 'Ast. Lecturer', 'Dhaka', 17888888, 'Female', 'Single', '83066.jpg', 'teacher', '2021-01-10 09:06:22', '2021-01-10 09:06:22'),
(17, 1, 'Hanna Bein', 'hanna', 'hannabein@gmail.com', '$2y$10$HjxbojWzRbVr05Ij/UZgT.6xVt3xPYuWI58juRnMG1MLPZkNutx5S', 'Ast. Lecturer', 'Nolam, Dhaka', 1822222222, 'Female', 'Married', '6014.jpg', 'teacher', '2021-01-10 09:11:13', '2021-01-10 09:11:13'),
(18, 2, 'David Card', 'david', 'davidcard@gmail.com', '$2y$10$oDs.W3L2qKeY0mTwO.z8bu.GjTiwk1OUPS7sYb5iDDSSqTOF492Za', 'Ast. lecturer', 'Savar, Dhaka', 195555555, 'Male', 'Single', '17842.jpg', 'teacher', '2021-01-10 09:14:26', '2021-01-10 09:14:26'),
(19, 2, 'Onik Ahmed', 'onik', 'onikahmed@gmail.com', '$2y$10$OnPq9nVU/QQPot4X1/uNhOh/8D2HHTW5Qb4tONWvV1pdDAAYt50Ta', 'Ast. Lecturer', 'Dhaka', 1455555555, 'Male', 'Married', '49169.jpg', 'teacher', '2021-01-10 09:36:10', '2021-01-10 09:36:10'),
(20, 3, 'Shakil Ahmed', 'shakil', 'shakilahmed@gmail.com', '$2y$10$dtB0XvMjLoYUMcot/t32z.sHdXEvvbIheLmUa2qEZIWd4kyCIr7cG', 'Ast. Lecturer', 'Savar', 1388888888, 'Male', 'Married', '3147.jpg', 'teacher', '2021-01-10 09:38:28', '2021-01-10 09:38:28'),
(21, 3, 'Ahmed Ben', 'ahmed', 'ahmedbien@gmail.com', '$2y$10$PR96nhwN3f4NzsBPDtwbXufEOqf/Hk3YPgMM5Z9fUzilVA14Q0H9e', 'Ast. Lecturer', 'Dhaka', 2147483647, 'Male', 'Married', '65585.jpg', 'teacher', '2021-01-10 09:40:49', '2021-01-10 09:40:49'),
(22, 3, 'Happy', 'happy', 'happy@gmail.com', '$2y$10$i/NugU46JjSkrt0bexjfY.T2ipkPceR33/dD2OlCypSe47TgiyS6W', 'Ast. Lecturer', 'Dhaka', 1845666666, 'Female', 'Married', '94157.png', 'teacher', '2021-01-10 09:42:44', '2021-01-10 09:42:44'),
(23, 2, 'sss', 'sss', 'aaa@yopmail.com', '$2y$10$DHNrHvvOlIjNfycFYpNU1.iChUPq9HsRHHlNzXGWZ35bTzqOKfmTG', 'dd', 'fff', 11111, 'Male', 'Single', '71012.jpg', 'teacher', '2021-01-11 14:34:25', '2021-01-11 14:34:25'),
(24, 1, 'Sagor', 'Sagor', 'sagor@yopmail.com', '$2y$10$Dyvt26U81NlP7CcHyVSqnuNSmQ7NXORdKpLc2DaxXKK0DbSAjoBQe', 'Ast. Lsecturer', 'savar, Dhaak', 2147483647, 'Male', 'Single', '33868.jpg', 'teacher', '2021-01-16 21:22:03', '2021-01-16 21:22:03'),
(25, 2, 'santa', 'santa', 'santa@yopmail.com', '$2y$10$LCuyPWecehf/ub52NhJoHuEElG/mTTnZjZKL8XYImU0g6CaDjYQIy', 'ast lecturer', 'asa', 145555, 'Male', 'Single', '60824.jpg', 'teacher', '2021-01-16 21:32:17', '2021-01-16 21:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Class Test', NULL, NULL),
(2, 'Mid Term', NULL, NULL),
(3, 'Final Exam', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `final_results`
--
ALTER TABLE `final_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_results`
--
ALTER TABLE `final_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
