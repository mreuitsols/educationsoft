-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2018 at 12:58 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education_soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE `branchs` (
  `branch_id` int(11) NOT NULL,
  `setting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`branch_id`, `setting_id`, `user_id`, `branch_name`, `address`, `phone_no`, `create_at`) VALUES
(1, 35, 0, 'Dhaka Mirpur 10', 'Shenpara,Parbata,259/1,Shapnil 3rd Floor', '01741877058', '2018-02-25 11:34:37'),
(3, 35, 0, 'Dhaka, Shamoly', 'Shamoly', '01741877060', '2018-02-25 11:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `period_count` int(11) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `user_id`, `period_count`, `create_at`) VALUES
(26, 1, 1, '2018-02-27 09:03:45'),
(27, 1, 1, '2018-02-27 09:03:46'),
(28, 1, 1, '2018-02-27 09:03:47'),
(29, 1, 1, '2018-02-27 09:03:48'),
(30, 1, 1, '2018-02-27 09:03:49'),
(31, 1, 1, '2018-02-27 09:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `class_courses`
--

CREATE TABLE `class_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_courses`
--

INSERT INTO `class_courses` (`id`, `course_id`, `class_id`, `user_id`, `create_at`) VALUES
(1, 1, 26, 0, '2018-02-27 09:03:45'),
(2, 1, 26, 0, '2018-02-27 09:03:45'),
(3, 1, 26, 0, '2018-02-27 09:03:45'),
(4, 2, 26, 0, '2018-02-27 09:03:45'),
(5, 2, 26, 0, '2018-02-27 09:03:45'),
(6, 2, 26, 0, '2018-02-27 09:03:45'),
(7, 1, 27, 0, '2018-02-27 09:03:46'),
(8, 1, 27, 0, '2018-02-27 09:03:46'),
(9, 1, 27, 0, '2018-02-27 09:03:46'),
(10, 2, 27, 0, '2018-02-27 09:03:46'),
(11, 2, 27, 0, '2018-02-27 09:03:46'),
(12, 2, 27, 0, '2018-02-27 09:03:46'),
(13, 1, 28, 0, '2018-02-27 09:03:47'),
(14, 1, 28, 0, '2018-02-27 09:03:47'),
(15, 1, 28, 0, '2018-02-27 09:03:47'),
(16, 2, 28, 0, '2018-02-27 09:03:47'),
(17, 2, 28, 0, '2018-02-27 09:03:47'),
(18, 2, 28, 0, '2018-02-27 09:03:47'),
(19, 1, 29, 0, '2018-02-27 09:03:48'),
(20, 1, 29, 0, '2018-02-27 09:03:48'),
(21, 1, 29, 0, '2018-02-27 09:03:48'),
(22, 2, 29, 0, '2018-02-27 09:03:48'),
(23, 2, 29, 0, '2018-02-27 09:03:48'),
(24, 2, 29, 0, '2018-02-27 09:03:48'),
(25, 1, 30, 0, '2018-02-27 09:03:49'),
(26, 1, 30, 0, '2018-02-27 09:03:49'),
(27, 1, 30, 0, '2018-02-27 09:03:49'),
(28, 2, 30, 0, '2018-02-27 09:03:49'),
(29, 2, 30, 0, '2018-02-27 09:03:49'),
(30, 2, 30, 0, '2018-02-27 09:03:49'),
(31, 1, 31, 0, '2018-02-27 09:03:50'),
(32, 1, 31, 0, '2018-02-27 09:03:50'),
(33, 1, 31, 0, '2018-02-27 09:03:50'),
(34, 2, 31, 0, '2018-02-27 09:03:50'),
(35, 2, 31, 0, '2018-02-27 09:03:50'),
(36, 2, 31, 0, '2018-02-27 09:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_no` varchar(30) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_sections`
--

CREATE TABLE `class_sections` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section` varchar(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_sections`
--

INSERT INTO `class_sections` (`id`, `class_id`, `user_id`, `section`, `create_at`) VALUES
(1, 26, 0, '1', '2018-02-27 09:03:45'),
(2, 26, 0, '1', '2018-02-27 09:03:45'),
(3, 26, 0, '1', '2018-02-27 09:03:45'),
(4, 26, 0, '1', '2018-02-27 09:03:45'),
(5, 26, 0, '1', '2018-02-27 09:03:45'),
(6, 26, 0, '1', '2018-02-27 09:03:45'),
(7, 27, 0, '1', '2018-02-27 09:03:46'),
(8, 27, 0, '1', '2018-02-27 09:03:46'),
(9, 27, 0, '1', '2018-02-27 09:03:46'),
(10, 27, 0, '1', '2018-02-27 09:03:46'),
(11, 27, 0, '1', '2018-02-27 09:03:46'),
(12, 27, 0, '1', '2018-02-27 09:03:46'),
(13, 28, 0, '1', '2018-02-27 09:03:47'),
(14, 28, 0, '1', '2018-02-27 09:03:47'),
(15, 28, 0, '1', '2018-02-27 09:03:47'),
(16, 28, 0, '1', '2018-02-27 09:03:47'),
(17, 28, 0, '1', '2018-02-27 09:03:47'),
(18, 28, 0, '1', '2018-02-27 09:03:47'),
(19, 29, 0, '1', '2018-02-27 09:03:48'),
(20, 29, 0, '1', '2018-02-27 09:03:48'),
(21, 29, 0, '1', '2018-02-27 09:03:48'),
(22, 29, 0, '1', '2018-02-27 09:03:48'),
(23, 29, 0, '1', '2018-02-27 09:03:48'),
(24, 29, 0, '1', '2018-02-27 09:03:48'),
(25, 30, 0, '1', '2018-02-27 09:03:49'),
(26, 30, 0, '1', '2018-02-27 09:03:49'),
(27, 30, 0, '1', '2018-02-27 09:03:49'),
(28, 30, 0, '1', '2018-02-27 09:03:49'),
(29, 30, 0, '1', '2018-02-27 09:03:49'),
(30, 30, 0, '1', '2018-02-27 09:03:49'),
(31, 31, 0, '1', '2018-02-27 09:03:50'),
(32, 31, 0, '1', '2018-02-27 09:03:50'),
(33, 31, 0, '1', '2018-02-27 09:03:50'),
(34, 31, 0, '1', '2018-02-27 09:03:50'),
(35, 31, 0, '1', '2018-02-27 09:03:50'),
(36, 31, 0, '1', '2018-02-27 09:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_teachers`
--

INSERT INTO `class_teachers` (`id`, `class_id`, `teacher_id`, `create_at`) VALUES
(1, 26, 1, '2018-02-27 09:03:45'),
(2, 26, 1, '2018-02-27 09:03:45'),
(3, 26, 1, '2018-02-27 09:03:45'),
(4, 26, 1, '2018-02-27 09:03:45'),
(5, 26, 1, '2018-02-27 09:03:45'),
(6, 26, 1, '2018-02-27 09:03:46'),
(7, 27, 1, '2018-02-27 09:03:46'),
(8, 27, 1, '2018-02-27 09:03:46'),
(9, 27, 1, '2018-02-27 09:03:46'),
(10, 27, 1, '2018-02-27 09:03:47'),
(11, 27, 1, '2018-02-27 09:03:47'),
(12, 27, 1, '2018-02-27 09:03:47'),
(13, 28, 1, '2018-02-27 09:03:47'),
(14, 28, 1, '2018-02-27 09:03:48'),
(15, 28, 1, '2018-02-27 09:03:48'),
(16, 28, 1, '2018-02-27 09:03:48'),
(17, 28, 1, '2018-02-27 09:03:48'),
(18, 28, 1, '2018-02-27 09:03:48'),
(19, 29, 1, '2018-02-27 09:03:48'),
(20, 29, 1, '2018-02-27 09:03:48'),
(21, 29, 1, '2018-02-27 09:03:48'),
(22, 29, 1, '2018-02-27 09:03:49'),
(23, 29, 1, '2018-02-27 09:03:49'),
(24, 29, 1, '2018-02-27 09:03:49'),
(25, 30, 1, '2018-02-27 09:03:49'),
(26, 30, 1, '2018-02-27 09:03:49'),
(27, 30, 1, '2018-02-27 09:03:49'),
(28, 30, 1, '2018-02-27 09:03:49'),
(29, 30, 1, '2018-02-27 09:03:49'),
(30, 30, 1, '2018-02-27 09:03:49'),
(31, 31, 1, '2018-02-27 09:03:50'),
(32, 31, 1, '2018-02-27 09:03:50'),
(33, 31, 1, '2018-02-27 09:03:50'),
(34, 31, 1, '2018-02-27 09:03:50'),
(35, 31, 1, '2018-02-27 09:03:50'),
(36, 31, 1, '2018-02-27 09:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(255) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mark_distribution_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_credit` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `program_id`, `semester_id`, `session_id`, `user_id`, `mark_distribution_id`, `course_code`, `course_name`, `course_credit`, `create_at`) VALUES
(1, 1, 1, 1, 1, 2, '201', 'Bangla', '3', '2018-02-26 12:45:56'),
(2, 1, 1, 1, 1, 3, '302', 'English', '3\r\n', '2018-02-28 12:08:49'),
(3, 2, 2, 1, 1, 4, '120', 'Bangla', '3', '2018-02-27 13:29:56'),
(4, 2, 2, 1, 1, 5, 'CSE-202', 'Programming', '3', '2018-02-27 13:30:23'),
(5, 2, 1, 1, 1, 6, 'CSE-201', 'Programming', '3', '2018-02-28 09:32:46'),
(6, 1, 1, 1, 1, 7, 'CSE-201', 'Programming', '3', '2018-02-28 11:28:34'),
(7, 2, 2, 9, 1, 8, 'CSE-201', 'Programming', '3', '2018-02-28 11:29:51'),
(8, 1, 2, 1, 1, 9, 'CSE-202', 'Physics', '2', '2018-03-01 10:14:44'),
(9, 1, 2, 1, 1, 10, 'CSE-203', 'Laravel', '2', '2018-03-01 10:15:22'),
(10, 3, 1, 1, 1, 11, '120', 'Bangla', '2', '2018-03-03 11:34:25'),
(11, 1, 3, 1, 1, 12, '220', 'EEE-02', '3', '2018-03-27 12:56:01'),
(12, 1, 3, 1, 1, 13, '101', 'Bangla', '3', '2018-03-29 06:23:58'),
(13, 3, 6, 9, 1, 14, '101', 'Bangla', '3', '2018-03-29 13:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `course_marks`
--

CREATE TABLE `course_marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `exam_type` varchar(20) NOT NULL,
  `theory` float NOT NULL,
  `practical` float NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_marks`
--

INSERT INTO `course_marks` (`id`, `student_id`, `course_id`, `user_id`, `semester_id`, `exam_type`, `theory`, `practical`, `create_at`) VALUES
(19, 6, 5, 1, 1, 'Mid Exam', 40, 30, '2018-02-28 09:35:05'),
(41, 8, 1, 1, 1, 'Mid Exam', 20, 25, '2018-03-01 09:07:12'),
(42, 9, 1, 1, 1, 'Mid Exam', 30, 25, '2018-03-01 09:07:12'),
(43, 1, 2, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:08:28'),
(44, 2, 2, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:08:28'),
(45, 3, 2, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:08:28'),
(46, 4, 2, 1, 1, 'Mid Exam', 30, 25, '2018-03-01 09:08:28'),
(47, 5, 2, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:08:28'),
(48, 7, 2, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:08:28'),
(49, 8, 2, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:08:28'),
(50, 9, 2, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:08:28'),
(51, 1, 6, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:09:10'),
(52, 2, 6, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:09:10'),
(53, 3, 6, 1, 1, 'Mid Exam', 30, 30, '2018-03-01 09:09:11'),
(54, 4, 6, 1, 1, 'Mid Exam', 30, 25, '2018-03-01 09:09:11'),
(55, 5, 6, 1, 1, 'Mid Exam', 30, 25, '2018-03-01 09:09:11'),
(56, 7, 6, 1, 1, 'Mid Exam', 30, 25, '2018-03-01 09:09:11'),
(57, 8, 6, 1, 1, 'Mid Exam', 30, 25, '2018-03-01 09:09:11'),
(58, 9, 6, 1, 1, 'Mid Exam', 30, 25, '2018-03-01 09:09:11'),
(111, 1, 1, 1, 1, 'Mid Exam', 30, 20, '2018-03-03 12:07:25'),
(113, 3, 1, 1, 1, 'Mid Exam', 25, 20, '2018-03-03 12:07:25'),
(117, 1, 8, 1, 2, 'Mid Exam', 20, 20, '2018-03-27 06:50:29'),
(118, 3, 8, 1, 2, 'Mid Exam', 20, 20, '2018-03-27 06:50:29'),
(119, 8, 8, 1, 2, 'Mid Exam', 20, 18, '2018-03-27 06:50:29'),
(120, 9, 8, 1, 2, 'Mid Exam', 20, 20, '2018-03-27 06:50:29'),
(121, 1, 9, 1, 2, 'Mid Exam', 20, 20, '2018-03-27 06:50:48'),
(122, 3, 9, 1, 2, 'Mid Exam', 20, 20, '2018-03-27 06:50:48'),
(123, 8, 9, 1, 2, 'Mid Exam', 30, 20, '2018-03-27 06:50:48'),
(124, 9, 9, 1, 2, 'Mid Exam', 30, 20, '2018-03-27 06:50:48'),
(125, 1, 11, 1, 3, 'Mid Exam', 20, 20, '2018-03-27 12:56:27'),
(126, 1, 11, 1, 3, 'Final Exam', 20, 20, '2018-03-29 06:21:48'),
(127, 1, 12, 1, 3, 'Mid Exam', 20, 20, '2018-03-29 06:24:23'),
(128, 1, 12, 1, 3, 'Final Exam', 20, 20, '2018-03-29 07:13:57'),
(129, 2, 1, 1, 1, 'Mid Exam', 25, 20, '2018-07-02 10:14:57'),
(130, 4, 1, 1, 1, 'Mid Exam', 20, 18, '2018-07-02 10:14:57'),
(131, 5, 1, 1, 1, 'Mid Exam', 27, 20, '2018-07-02 10:14:57'),
(132, 7, 1, 1, 1, 'Mid Exam', 30, 20, '2018-07-02 10:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `curriculums`
--

CREATE TABLE `curriculums` (
  `curriculum_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `curriculum_name` varchar(255) NOT NULL,
  `program_type` varchar(30) NOT NULL,
  `creadit` int(11) NOT NULL,
  `program_duration` int(11) NOT NULL,
  `semester_duration` int(11) NOT NULL,
  `per_creadit_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `library_fee` int(11) NOT NULL,
  `registration_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculums`
--

INSERT INTO `curriculums` (`curriculum_id`, `faculty_id`, `department_id`, `program_id`, `curriculum_name`, `program_type`, `creadit`, `program_duration`, `semester_duration`, `per_creadit_fee`, `lab_fee`, `library_fee`, `registration_fee`) VALUES
(1, 1, 2, 1, 'probidha-2011', '', 130, 1, 2, 100, 100, 100, 100),
(2, 1, 1, 2, 'Curriculum-2018', '', 130, 2, 2, 1200, 400, 300, 4000),
(3, 1, 0, 3, 'Curriculum - 2020', '', 140, 2, 6, 1440, 400, 300, 4000),
(4, 3, 5, 5, 'Curriculum-2020', '', 120, 4, 6, 2000, 300, 300, 4000),
(5, 1, 1, 4, 'Sikkhaborsho-2018-2019', '', 120, 1, 2, 1500, 3000, 2000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `sort_name` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `faculty_id`, `user_id`, `department_name`, `sort_name`, `status`, `create_at`) VALUES
(1, 1, 1, 'Computer Science and Engineering', 'CSE', 'active', '2018-04-08 11:21:11'),
(2, 1, 1, 'CIVIL Engineering', 'CIVIL', 'active', '2018-04-08 11:21:10'),
(3, 1, 1, 'Food Engineering', 'Food', 'active', '2018-04-10 10:15:34'),
(4, 1, 1, 'Electrical and Electronics Engineering', 'EEE', 'active', '2018-04-10 10:15:32'),
(5, 3, 1, 'Marketing Department', 'Marketing', 'active', '2018-04-08 13:11:47'),
(6, 1, 1, 'power', 'PWR', 'active', '2018-08-30 09:04:33'),
(7, 1, 1, 'power2', '25', 'active', '2018-08-30 09:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `distribution_subject_list`
--

CREATE TABLE `distribution_subject_list` (
  `id` int(11) NOT NULL,
  `distribution_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribution_subject_list`
--

INSERT INTO `distribution_subject_list` (`id`, `distribution_id`, `semester_id`, `subject_id`) VALUES
(32, 19, 1, 7),
(33, 19, 1, 8),
(34, 20, 2, 7),
(35, 20, 2, 8),
(36, 21, 3, 7),
(37, 21, 3, 8),
(38, 22, 4, 7),
(39, 22, 4, 8),
(40, 24, 6, 7),
(41, 24, 6, 8),
(68, 73, 1, 1),
(69, 73, 1, 2),
(70, 73, 1, 3),
(71, 73, 1, 4),
(72, 73, 1, 5),
(73, 73, 1, 6),
(74, 73, 1, 9),
(75, 73, 1, 10),
(76, 73, 1, 11),
(77, 73, 1, 12),
(78, 74, 2, 1),
(79, 74, 2, 2),
(80, 74, 2, 3),
(81, 74, 2, 4),
(82, 74, 2, 5),
(83, 74, 2, 6),
(84, 74, 2, 9),
(85, 74, 2, 10),
(86, 74, 2, 11),
(87, 74, 2, 12),
(88, 75, 3, 3),
(89, 76, 4, 3),
(90, 76, 4, 4),
(91, 76, 4, 6),
(92, 77, 5, 1),
(93, 77, 5, 6),
(94, 78, 6, 2),
(95, 78, 6, 3),
(96, 78, 6, 5),
(97, 78, 6, 6),
(98, 78, 6, 10),
(99, 78, 6, 11),
(100, 80, 8, 11),
(101, 82, 10, 1),
(102, 82, 10, 2),
(103, 82, 10, 4),
(104, 82, 10, 9),
(105, 82, 10, 12),
(106, 83, 11, 1),
(107, 83, 11, 4),
(108, 83, 11, 9),
(109, 83, 11, 12),
(110, 84, 12, 1),
(111, 84, 12, 4),
(112, 84, 12, 9),
(113, 84, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `e_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `employee_id` varchar(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `post` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `employee_type` varchar(50) NOT NULL,
  `post_code` varchar(20) NOT NULL,
  `present_address` longtext NOT NULL,
  `parmanent_address` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`e_id`, `department_id`, `employee_id`, `employee_name`, `post`, `gender`, `join_date`, `nationality`, `father_name`, `mother_name`, `country`, `district`, `mobile_no`, `email`, `date_of_birth`, `blood_group`, `qualification`, `experience`, `religion`, `marital_status`, `employee_type`, `post_code`, `present_address`, `parmanent_address`, `photo`, `user_id`, `create_at`) VALUES
(1, 2, '20181', 'Mahfuj', 'Lecturer', 'Male', '2018-02-25', 'Bangladeshi', 'Mr.x', 'Begum..........', 'Bangladesh', 'Lalmonirhat', '01796173454', 'mahfuj.euitsols@gmail.com', '1988-02-03', 'A-', 'Studing in BSC', '2 Years', 'Islam', '', 'Teacher', '1216', 'Mirpur 10, Shenpara 301/2', 'Lalmonirhar Sadar', '6564d9cfScreenshot_1.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `branch_id`, `user_id`, `faculty_name`, `department_name`, `status`, `create_at`) VALUES
(1, 1, 0, 'Engineering', 'Cse', 'active', '2018-04-08 11:03:17'),
(3, 1, 0, 'Business', '', 'active', '2018-04-10 10:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fee_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_fee` double NOT NULL,
  `discounted_fee` double NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `urc_cost` float NOT NULL,
  `dc_cost` float NOT NULL,
  `other_fee` float NOT NULL,
  `semester_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `markdistributions`
--

CREATE TABLE `markdistributions` (
  `id` int(11) NOT NULL,
  `mark_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markdistributions`
--

INSERT INTO `markdistributions` (`id`, `mark_id`, `user_id`, `create_at`) VALUES
(2, 2, 1, '2018-02-25 12:33:52'),
(3, 3, 1, '2018-02-26 09:49:55'),
(4, 4, 1, '2018-02-27 13:29:56'),
(5, 5, 1, '2018-02-27 13:30:23'),
(6, 6, 1, '2018-02-28 09:32:46'),
(7, 7, 1, '2018-02-28 11:28:34'),
(8, 8, 1, '2018-02-28 11:29:51'),
(9, 9, 1, '2018-03-01 10:14:44'),
(10, 10, 1, '2018-03-01 10:15:22'),
(11, 11, 1, '2018-03-03 11:34:25'),
(12, 12, 1, '2018-03-27 12:56:00'),
(13, 13, 1, '2018-03-29 06:23:58'),
(14, 14, 1, '2018-03-29 13:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `theory_id` int(11) NOT NULL,
  `practical_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `theory_id`, `practical_id`, `user_id`, `create_at`) VALUES
(2, 2, 2, 1, '2018-02-25 12:33:52'),
(3, 3, 3, 1, '2018-02-26 09:49:55'),
(4, 4, 4, 1, '2018-02-27 13:29:56'),
(5, 5, 5, 1, '2018-02-27 13:30:23'),
(6, 6, 6, 1, '2018-02-28 09:32:46'),
(7, 7, 7, 1, '2018-02-28 11:28:34'),
(8, 8, 8, 1, '2018-02-28 11:29:51'),
(9, 9, 9, 1, '2018-03-01 10:14:44'),
(10, 10, 10, 1, '2018-03-01 10:15:22'),
(11, 11, 11, 1, '2018-03-03 11:34:25'),
(12, 12, 12, 1, '2018-03-27 12:56:00'),
(13, 13, 13, 1, '2018-03-29 06:23:58'),
(14, 14, 14, 1, '2018-03-29 13:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `current_balance` double NOT NULL,
  `amount_due` double NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `practicals`
--

CREATE TABLE `practicals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cont_asses` float NOT NULL,
  `final_exam` float NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practicals`
--

INSERT INTO `practicals` (`id`, `user_id`, `cont_asses`, `final_exam`, `create_at`) VALUES
(2, 1, 20, 30, '2018-02-25 12:33:52'),
(3, 1, 25, 45, '2018-02-26 09:49:55'),
(4, 1, 25, 30, '2018-02-27 13:29:56'),
(5, 1, 25, 10, '2018-02-27 13:30:23'),
(6, 1, 50, 50, '2018-02-28 09:32:46'),
(7, 1, 30, 50, '2018-02-28 11:28:34'),
(8, 1, 30, 50, '2018-02-28 11:29:51'),
(9, 1, 20, 30, '2018-03-01 10:14:44'),
(10, 1, 20, 30, '2018-03-01 10:15:22'),
(11, 1, 0, 0, '2018-03-03 11:34:25'),
(12, 1, 20, 30, '2018-03-27 12:56:00'),
(13, 1, 20, 30, '2018-03-29 06:23:58'),
(14, 1, 20, 30, '2018-03-29 13:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `faculty_id`, `department_id`, `user_id`, `program_name`, `status`, `create_at`) VALUES
(1, 1, 2, 0, 'BSC in CIVIL Engineering', 'active', '2018-04-10 10:13:58'),
(2, 1, 1, 0, 'BSC in CSE Engineering', 'active', '2018-04-08 12:02:19'),
(3, 1, 3, 0, 'Food Engineering', 'active', '2018-04-08 12:11:55'),
(4, 1, 1, 0, 'Msc in CSE', 'active', '2018-04-08 11:40:36'),
(5, 3, 5, 0, 'Honours', 'active', '2018-04-10 10:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `routins`
--

CREATE TABLE `routins` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shift` varchar(30) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routins`
--

INSERT INTO `routins` (`id`, `program_id`, `semester_id`, `session_id`, `section_id`, `user_id`, `shift`, `create_at`) VALUES
(3, 1, 1, 1, 0, 0, '1st Shift', '2018-02-27 09:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `routine_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `sat` int(11) DEFAULT NULL,
  `sun` int(11) DEFAULT NULL,
  `mon` int(11) DEFAULT NULL,
  `tue` int(11) DEFAULT NULL,
  `wed` int(11) DEFAULT NULL,
  `thu` int(11) DEFAULT NULL,
  `fri` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `routine_id`, `user_id`, `period`, `sat`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `create_at`) VALUES
(9, 3, 1, 1, 26, 27, 28, 29, 30, 31, NULL, '2018-02-27 09:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `create_at`) VALUES
(1, 'A', '2018-02-26 11:13:09'),
(2, 'B', '2018-02-26 11:13:26'),
(3, 'C', '2018-02-26 11:13:34'),
(4, 'D', '2018-02-26 11:13:40'),
(5, 'E', '2018-02-26 11:13:51'),
(6, 'F', '2018-02-26 11:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `semester_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semester_id`, `user_id`, `semester_name`, `create_at`) VALUES
(1, 0, 'First Semester', '2018-02-25 11:20:23'),
(2, 0, 'Second Semester', '2018-02-25 11:20:45'),
(3, 0, 'Third Semester', '2018-02-25 11:20:54'),
(4, 0, 'Fourth Semester', '2018-04-09 07:15:57'),
(5, 0, 'Fifth Semester', '2018-04-09 07:16:08'),
(6, 0, 'Six Semester', '2018-04-09 07:16:15'),
(7, 0, 'Seventh Semester', '2018-04-09 07:16:28'),
(8, 0, 'Eight Semester', '2018-04-09 07:16:45'),
(9, 0, 'Nine Semester', '2018-04-09 07:18:34'),
(10, 0, 'Ten Semester', '2018-04-09 07:18:40'),
(11, 0, 'Eleventh Semester', '2018-04-09 07:18:49'),
(12, 0, 'Twelve Semester', '2018-04-09 07:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `year`, `create_at`) VALUES
(1, 0, '2002-2003', '2018-02-25 11:23:49'),
(2, 0, '2003-2004', '2018-02-25 11:24:01'),
(3, 0, '2004-2005', '2018-02-25 11:25:21'),
(4, 0, '2005-2006', '2018-02-25 11:25:28'),
(5, 0, '2006-2007', '2018-02-25 11:25:37'),
(7, 0, '2008-2009', '2018-02-25 11:25:55'),
(8, 0, '2010-2011', '2018-02-25 11:26:03'),
(9, 0, '2011-2012', '2018-02-25 11:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `user_id`, `setting_name`, `setting_key`, `value`, `create_at`) VALUES
(35, 1, 'Institute', 'settings', 'EuitSols Training Institute', '2018-02-25 11:18:39'),
(36, 1, 'address', 'settings', 'H#259/1, Shapnil, 3<sup>rd</sup> Floor, Senpara Parbata, Mirpur-10, Dhaka-1216, Bangladesh', '2018-02-25 11:18:39'),
(37, 1, 'history', 'settings', 'European IT Solutions (EUITSols) started off as a IT and web based \r\nsolutions, services and web design company in Ireland, Germany and \r\nBangladesh in 2009. Over the years, EUITSols has delivered successful \r\nprojects in multiple platforms to clients in ', '2018-02-25 11:18:40'),
(38, 1, 'copyright', 'settings', ' Copyright © 2018 Euitsols.com | All Rights Reserved ', '2018-02-25 11:18:40'),
(39, 1, 'institue_email', 'settings', 'training@euitsols-inst.com', '2018-02-25 11:18:40'),
(40, 1, 'logo', 'settings', '2018-02-28_11-02-15default-logo.png', '2018-02-28 10:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `section_id` int(20) NOT NULL,
  `semester_id` int(20) NOT NULL,
  `session_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `post_code` varchar(20) NOT NULL,
  `district` varchar(255) NOT NULL,
  `telephone_no` varchar(15) NOT NULL,
  `passport_no` varchar(255) NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `parmanent_address` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hsc_passing_year` varchar(11) NOT NULL,
  `graduation_honurs` varchar(255) NOT NULL,
  `graduation_honurs_passing_year` date NOT NULL,
  `honours_result` varchar(30) NOT NULL,
  `hsc` varchar(255) NOT NULL,
  `graduation_masters` varchar(255) NOT NULL,
  `graduation_masters_year` varchar(11) NOT NULL,
  `graduation_masters_result` varchar(30) NOT NULL,
  `hsc_result` varchar(50) NOT NULL,
  `update_status` enum('1','0') NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `student_id`, `program_id`, `faculty_id`, `department_id`, `curriculum_id`, `section_id`, `semester_id`, `session_id`, `user_id`, `student_name`, `mobile_no`, `email`, `nationality`, `country`, `post_code`, `district`, `telephone_no`, `passport_no`, `marital_status`, `birth_place`, `religion`, `gender`, `father_name`, `mother_name`, `father_occupation`, `parmanent_address`, `present_address`, `date_of_birth`, `blood_group`, `photo`, `create_at`, `hsc_passing_year`, `graduation_honurs`, `graduation_honurs_passing_year`, `honours_result`, `hsc`, `graduation_masters`, `graduation_masters_year`, `graduation_masters_result`, `hsc_result`, `update_status`, `status`) VALUES
(1, '20181', 2, 1, 1, 2, 1, 3, 1, 1, 'Faruk Ahamed 4488', '0178964858', 'faruk@gmail.com', 'Bangladeshi', 'Bangladesh', '1216', 'Kurigram', '+4564647', '0123456789', 'Unmarried', 'Kurigram, Nageswari', 'Islam', 'Male', 'Mr.Mizanur Rahman', 'Begum .........', 'Business', 'Kurigram, Ghogadaha', 'Shenpara, parbata 259/1, Dhaka 1216', '1997-02-04', 'A+', '294a897e', '2018-09-04 09:57:45', '2018-02-05', '2018-02-07', '0000-00-00', '', 'BSC In Cse', '', '0000-00-00', '', 'asdf', '1', 0),
(2, '20182', 1, 1, 1, 2, 1, 1, 1, 1, ' Faruk Ahamed', '0178964858', 'farukdj@gmail.com', 'Bangladeshi', 'Bangladesh', '1216', 'Kurigram', '+4564647', '0123456789', 'Unmarried', 'Kurigram, Nageswari', 'Islam', 'Male', 'Mr.Mizanur Rahman', 'Begum .........', 'Business', 'Kurigram, Ghogadaha', 'Shenpara, parbata 259/1, Dhaka 1216', '1997-02-04', 'A+', '1ed2f0a5image1.jpg', '2018-09-13 09:29:17', '2018-02-05', '2018-02-07', '0000-00-00', '', 'BSC In Cse', '', '0000-00-00', '', 'asdf', '1', 0),
(3, '20183', 1, 1, 1, 2, 1, 2, 1, 16, 'Mahafujur Rahman hgfgf', '0178964858', 'Mahafuj@gmail.com', 'Bangladeshi', 'Bangladesh', '1216', 'Kurigram', '+4564647', '0123456789', 'Unmarried', 'Kurigram, Nageswari', 'Islam', 'Male', 'Mr.Mizanur Rahman', 'Begum .........', 'Business', 'Kurigram, Ghogadaha', 'Shenpara, parbata 259/1, Dhaka 1216', '1997-02-04', 'A+', 'f897b5ee', '2018-09-13 09:52:19', '2018-02-05', '2018-02-07', '0000-00-00', '', 'BSC In Cse', '', '0000-00-00', '', 'asdf', '1', 0),
(4, '20184', 1, 1, 1, 2, 1, 1, 1, 15, 'Nayon Hosain', '0178964858', 'Nayon@gmail.com', 'Bangladeshi', 'Bangladesh', '1216', 'Kurigram', '+4564647', '0123456789', 'Unmarried', 'Kurigram, Nageswari', 'Islam', 'Male', 'Mr.Mizanur Rahman', 'Begum .........', 'Business', 'Kurigram, Ghogadaha', 'Shenpara, parbata 259/1, Dhaka 1216', '1997-02-04', 'A+', '8cf251b2images.jpg', '2018-09-13 10:14:25', '2018-02-05', '2018-02-07', '0000-00-00', '', 'BSC In Cse', '', '0000-00-00', '', 'asdf', '1', 0),
(5, '20185', 1, 1, 1, 2, 1, 1, 1, 1, 'Arif Babu', '0178964858', 'arif@gmail.com', 'Bangladeshi', 'Bangladesh', '1216', 'Kurigram', '+4564647', '0123456789', 'Unmarried', 'Kurigram, Nageswari', 'Islam', 'Male', 'Mr.Mizanur Rahman', 'Begum .........', 'Business', 'Kurigram, Ghogadaha', 'Shenpara, parbata 259/1, Dhaka 1216', '1997-02-04', 'A+', 'ffcd9d28images.png', '2018-08-30 12:20:23', '2018-02-05', '2018-02-07', '0000-00-00', '', 'BSC In Cse', '', '0000-00-00', '', 'asdf', '1', 0),
(6, '20190', 2, 1, 1, 2, 1, 2, 1, 1, 'Arif Babu', '725432542354', '', 'Dinajpuri', '3', '91710', '91710', '', '', 'Married', '', '', 'Male', 'ABC', 'ABCD', 'Business', 'test', 'df', '2018-03-27', '', '1283a33e', '2018-08-30 12:20:08', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '1', 0),
(7, '1990', 1, 1, 1, 2, 1, 1, 1, 1, 'Nayan', '01796173584', 'jhkhk', 'Bangladeshi', 'Bangladesh', '1216', 'Naogaon', '0178956486', '', '', '', '', '', '', '', '----Select----', 'Naogaon', 'Dhaka , Dhanmondi', '2018-02-14', '', 'c9994decimages.jpg', '2018-08-30 12:20:19', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '1', 0),
(8, '1991', 1, 1, 1, 2, 1, 2, 1, 1, 'Siyam Ahamed Nahid fgjfj', '01796173485', '', 'Bangladesh', 'Bangladesh', '5489', 'Naogaon', '', '', '', '', '', 'Male', 'MR............', 'Mst.........', '', 'Naogaon', 'Dhaka', '2018-02-08', '', 'e1116b1327545416_2012916932297823_1829002932811663465_n.jpg', '2018-09-04 09:58:50', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '1', 0),
(9, '1992', 1, 1, 1, 2, 1, 2, 1, 1, 'Mahafujur Rahman', '9096280101', '', 'Dinajpuri', 'Bangladesh', '91710', 'kurigram', '', '524', 'Unmarried', '', 'Islam', 'Male', 'MR............', 'Mst.........', 'Business', 'kjk', 'hjmh', '2018-02-13', '', '7401dcf227545416_2012916932297823_1829002932811663465_n.jpg', '2018-08-30 12:20:10', '2018-01-30', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '1', 0),
(10, '1993', 3, 0, 1, 2, 1, 1, 3, 1, 'Abu', '9096280101', '', 'Dinajpuri', 'Bangladesh', '91710', '91710', '', '', 'Married', '', 'Islam', '', 'MR............', 'Mst.........', '', 'gdfg', 'gcfgb', '2018-01-31', '', '40e9bf08images.jpg', '2018-08-30 12:20:02', '2018-02-13', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '1', 0),
(13, '310264', 2, 1, 1, 2, 1, 1, 1, 1, 'Truck-Tek', '9096280101', '', 'Dinajpuri', 'Bangladesh', '91710', '91710', '', '', '', '', '', 'Male', 'ABC', 'Mst.........', 'Business', 'Building "E", 13626 Monte Vista Ave', 'Building "E", 13626 Monte Vista Ave', '2018-03-21', '', '767f756cimages.png', '2018-08-30 12:20:05', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '1', 0),
(17, '2018196', 2, 1, 1, 2, 1, 1, 1, 1, 'ASDF', '725432542354', 'mdalamin6554@gmail.com', 'asdf', 'Bangladesh', 'asdf', 'Dhaka', 'asdf', '105454455', 'Married', 'Dhaka', 'Islam', 'Male', 'ASD', 'ASF', 'Business', 'test', 'test', '2018-04-17', 'A+', '', '2018-04-11 06:23:45', '2018-04-18', '2018-04-12', '0000-00-00', '', 'est', '', '0000-00-00', '', 'test', '1', 0),
(18, '12548', 2, 1, 1, 2, 1, 1, 1, 15, 'Mahfuj11', 'asdf', 'mdalamin6554@gmail.com', 'asdf', 'asdf', 'asdf', 'sdf', 'asdf', 'df', 'Unmarried', 'asdf', 'Hindu', 'Female', 'asdf', 'asdf', 'asdf', 'asdf', 'sadf', '04/18/2018', 'asdf', '', '2018-09-13 09:50:36', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Test', '', '0000-00-00', '', 'tst', '1', 1),
(19, '310269', 2, 1, 1, 2, 1, 1, 1, 1, 'ASDF', '725432542354', 'mdalamin6554@gmail.com', 'asdf', 'Bangladesh', 'asdf', 'Dhaka', 'asdf', '105454455', 'Married', 'Dhaka', 'Islam', 'Male', 'ASD', 'ASF', 'asdf', 'asdf', 'asdf', '01/11/2010', 'A+', '', '2018-04-11 11:03:13', '0000-00-00', '0000-00-00', '0000-00-00', '', 'asdf', '', '0000-00-00', '', 'asdf', '1', 0),
(20, '201813', 2, 1, 1, 2, 1, 1, 1, 1, 'ASDF', '725432542354', 'mdalamin6554@gmail.com', 'Bangladesh (????????)', 'Bangladesh (????????)', '52012', 'Dhaka', '655555555', '105454455', 'Married', 'Dhaka', 'Islam', 'Male', 'ASD', 'ASF', 'asdf', 'test', 'test', '04/25/2018', 'O+', '', '2018-04-12 13:18:43', '0000-00-00', '04/18/2018', '0000-00-00', '252', 'HSC', '04/25/2018', '0000-00-00', '', '3.66', '1', 0),
(21, '20181653', 2, 1, 1, 2, 1, 1, 1, 1, 'ASDF', '725432542354', 'mdalamin6554@gmail.com', 'Bangladesh (????????)', 'Bangladesh (????????)', '52012', 'Dhaka', '963752', '105454455', 'Married', 'Dhaka', 'Hindu', 'Female', 'ASD', 'ASF', 'asdf', 'test', 'test', '04/11/2018', 'O+', '', '2018-09-13 10:14:50', '04/18/2018', '04/26/2018', '0000-00-00', '252', 'HSC', '04/26/2018', '', '', '3.66', '1', 1),
(24, '19934', 3, 0, 1, 2, 1, 1, 3, 15, 'Samim ', '9096280101dgd', '', 'Dinajpuri', 'Bangladesh', '91710', '91710', '', '', 'Married', '', 'Islam', '', 'MR............', 'Mst.........', '', 'gdfg', 'gcfgb', '2018-01-31', '', '40e9bf08images.jpg', '2018-09-13 10:12:35', '2018-02-13', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '1', 0),
(25, '19935', 3, 0, 1, 2, 1, 1, 3, 16, 'Abu  Samin hh', '909628010', '', 'Dinajpuri', 'Bangladesh', '91710', '91710', '', '', 'Married', '', 'Islam', '', 'MR............', 'Mst.........', '', 'gdfg', 'gcfgb', '2018-01-31', '', '40e9bf08images.jpg', '2018-09-04 09:59:07', '2018-02-13', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `curriculum_id` varchar(11) NOT NULL,
  `subject_code` varchar(30) NOT NULL,
  `subject_type` varchar(30) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL,
  `subject_mark` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `publish_year` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `faculty_id`, `department_id`, `program_id`, `curriculum_id`, `subject_code`, `subject_type`, `subject_name`, `credit`, `subject_mark`, `author_name`, `publisher`, `publish_year`, `create_at`) VALUES
(1, 1, 1, 2, '2', '7412', 'Theory', 'Bangla', 3, 100, 'Dr. Mahfuj', 'Euitsols', '2017', '2018-04-10 07:52:54'),
(2, 1, 1, 2, '2', '9855', 'Theory', 'English', 3, 100, 'Dr. Noyon', 'Euitsols', '102017', '2018-04-10 07:52:50'),
(3, 1, 1, 2, '2', '1586', 'Practical', 'Computer Fundamental', 2, 50, 'JCK', 'Euitsols', '2017', '2018-04-10 07:52:43'),
(4, 1, 1, 2, '2', '9632', 'Theory', 'Algorithm', 3, 100, 'Dr. Noyon', 'Euitsols', '2017', '2018-04-10 09:39:25'),
(5, 1, 1, 2, '2', '1212', 'Theory', 'C++', 3, 100, 'Dr. Mahfuj', 'Euitsols', '2017', '2018-04-08 13:45:56'),
(6, 1, 1, 2, '2', '1212', 'Theory', 'Java Programming', 3, 150, 'Dr. Mahfuj', 'Euitsols', '2017', '2018-04-08 13:46:05'),
(7, 1, 2, 1, '1', '1212', 'Theory', 'Bangla', 3, 100, 'Dr. Mahfuj', 'Euitsols', '2017', '2018-04-09 09:21:23'),
(8, 1, 2, 1, '1', '1212', 'Theory', 'C++', 3, 150, 'Dr. Mahfuj', 'Euitsols', '2017', '2018-04-09 09:21:48'),
(9, 1, 1, 2, '2', '2050', 'Theory', 'Database Management', 3, 100, 'Dr. Mahfuj', 'Euitsols', '2017', '2018-04-10 09:39:41'),
(10, 1, 1, 2, '2', '3256', 'Theory', 'Mathmatical', 3, 100, 'Dr. Noyon', 'Euitsols', '102017', '2018-04-10 09:39:59'),
(11, 1, 1, 2, '2', '2050', 'Theory', 'Micro-processor', 2, 50, 'JCK', 'Euitsols', '2017', '2018-04-10 09:40:25'),
(12, 1, 1, 2, '2', '9555', 'Theory', 'Computer Graphics', 3, 100, 'Dr. Noyon', 'Euitsols', '2017', '2018-04-10 09:40:49'),
(13, 3, 5, 5, '4', '1212', 'Theory', 'Bangla', 3, 150, 'Dr. Mahfuj', 'Euitsols', '2017', '2018-04-10 10:16:15'),
(14, 1, 3, 3, '5', '1212', 'Theory', 'Bangla', 3, 100, 'Dr. Mahfuj', 'Euitsols', '2017', '2018-08-30 09:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `subject_distributions`
--

CREATE TABLE `subject_distributions` (
  `distribution_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `semester_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_distributions`
--

INSERT INTO `subject_distributions` (`distribution_id`, `faculty_id`, `program_id`, `curriculum_id`, `semester_id`) VALUES
(19, 1, 1, 1, 1),
(20, 1, 1, 1, 2),
(21, 1, 1, 1, 3),
(22, 1, 1, 1, 4),
(23, 1, 1, 1, 5),
(24, 1, 1, 1, 6),
(73, 1, 2, 2, 1),
(74, 1, 2, 2, 2),
(75, 1, 2, 2, 3),
(76, 1, 2, 2, 4),
(77, 1, 2, 2, 5),
(78, 1, 2, 2, 6),
(79, 1, 2, 2, 7),
(80, 1, 2, 2, 8),
(81, 1, 2, 2, 9),
(82, 1, 2, 2, 10),
(83, 1, 2, 2, 11),
(84, 1, 2, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `theories`
--

CREATE TABLE `theories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cont_asses` float NOT NULL,
  `final_exam` float NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theories`
--

INSERT INTO `theories` (`id`, `user_id`, `cont_asses`, `final_exam`, `create_at`) VALUES
(2, 1, 80, 20, '2018-02-25 12:33:52'),
(3, 1, 25, 45, '2018-02-26 09:49:55'),
(4, 1, 10, 20, '2018-02-27 13:29:56'),
(5, 1, 10, 10, '2018-02-27 13:30:23'),
(6, 1, 50, 50, '2018-02-28 09:32:46'),
(7, 1, 50, 50, '2018-02-28 11:28:34'),
(8, 1, 50, 50, '2018-02-28 11:29:50'),
(9, 1, 20, 30, '2018-03-01 10:14:44'),
(10, 1, 20, 30, '2018-03-01 10:15:21'),
(11, 1, 20, 80, '2018-03-03 11:34:25'),
(12, 1, 20, 30, '2018-03-27 12:56:00'),
(13, 1, 20, 30, '2018-03-29 06:23:58'),
(14, 1, 20, 30, '2018-03-29 13:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `g_id` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `email`, `phone_no`, `role`, `g_id`, `status`, `last_login`, `create_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'Students', 'admin', 0, 'active', '', '2018-03-13 12:40:52'),
(2, '310264', '54c3d69021fd48a3b29706e7200606a1', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Students/add', 'student', 13, 'active', '', '2018-03-13 12:40:57'),
(3, '20181', '6974909f63282da92162267b49df3b34', '', 'bc488127794cf28a76cd50d3b69033d6', '', 'student', 1, 'active', '', '2018-03-27 06:37:32'),
(4, '20190', '5a6d8346f6a318aa3019f591b878b4aa', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'student', 6, 'active', '', '2018-03-27 06:44:42'),
(5, '20183', 'fcc6ffa7317267fe729f6ab3d5152496', '', '05bf9d10b755e14ce6b961153204a326', '', 'student', 3, 'active', '', '2018-03-27 06:45:13'),
(6, '20181', '6974909f63282da92162267b49df3b34', '', 'bc488127794cf28a76cd50d3b69033d6', '', 'student', 1, 'active', '', '2018-03-27 12:55:08'),
(7, '1211', '285ab9448d2751ee57ece7f762c39095', '', '4ba14db603cea223ebfccb23f93a042d', '', 'student', 0, 'active', '', '2018-04-11 05:14:19'),
(8, '123456', 'e10adc3949ba59abbe56e057f20f883e', '', '4ba14db603cea223ebfccb23f93a042d', '', 'student', 0, 'active', '', '2018-04-11 05:16:28'),
(9, '125555', 'bb2c459df0caccdd65ab4d03c1ea4f9f', '', '4ba14db603cea223ebfccb23f93a042d', '', 'student', 0, 'active', '', '2018-04-11 05:25:33'),
(10, '2018196', '3f4521f579a6ba57c904693623deb058', '', '4ba14db603cea223ebfccb23f93a042d', '', 'student', 0, 'active', '', '2018-04-11 06:23:45'),
(11, '12548', '194585b5215aea447389c5fefca09c61', '', '4ba14db603cea223ebfccb23f93a042d', '', 'student', 0, 'active', '', '2018-04-11 10:59:22'),
(12, '310269', '888ca3835c51c0ce6710f80ef9e0f83a', '', '4ba14db603cea223ebfccb23f93a042d', '', 'student', 0, 'active', '', '2018-04-11 11:03:13'),
(13, '201813', '932e6fe70fe993b61bef4cd613c8bb5c', '', '4ba14db603cea223ebfccb23f93a042d', '', 'student', 0, 'active', '', '2018-04-12 13:18:43'),
(14, '20181653', 'a613cebd2af17c4acb2998966ae013e8', '', '4ba14db603cea223ebfccb23f93a042d', '', 'student', 0, 'active', '', '2018-04-12 13:22:50'),
(15, 'mahfuj', '123456', 'mahfuj', 'mahfuj', 'mahfuj', 'mahfuj', 0, 'active', '', '2018-09-04 07:58:56'),
(16, 'noyon', '', '', '', '', '', 0, 'active', '', '2018-09-04 07:59:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branchs`
--
ALTER TABLE `branchs`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `setting_id` (`setting_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_courses`
--
ALTER TABLE `class_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`course_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `class_sections`
--
ALTER TABLE `class_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `mark_distribution_id` (`mark_distribution_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `course_marks`
--
ALTER TABLE `course_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `curriculums`
--
ALTER TABLE `curriculums`
  ADD PRIMARY KEY (`curriculum_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `distribution_subject_list`
--
ALTER TABLE `distribution_subject_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distribution_id` (`distribution_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `faculty_id` (`department_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `markdistributions`
--
ALTER TABLE `markdistributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_id` (`mark_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theory_id` (`theory_id`),
  ADD KEY `practical_id` (`practical_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `practicals`
--
ALTER TABLE `practicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `faculty_id` (`department_id`),
  ADD KEY `faculty_id_2` (`faculty_id`);

--
-- Indexes for table `routins`
--
ALTER TABLE `routins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`program_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routine_id` (`routine_id`),
  ADD KEY `period` (`period`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD KEY `admin_id` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `curriculum_id` (`curriculum_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `subject_distributions`
--
ALTER TABLE `subject_distributions`
  ADD PRIMARY KEY (`distribution_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `curriculum_id` (`curriculum_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `theories`
--
ALTER TABLE `theories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `class_courses`
--
ALTER TABLE `class_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_sections`
--
ALTER TABLE `class_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `course_marks`
--
ALTER TABLE `course_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `curriculums`
--
ALTER TABLE `curriculums`
  MODIFY `curriculum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `distribution_subject_list`
--
ALTER TABLE `distribution_subject_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `markdistributions`
--
ALTER TABLE `markdistributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `practicals`
--
ALTER TABLE `practicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `routins`
--
ALTER TABLE `routins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `subject_distributions`
--
ALTER TABLE `subject_distributions`
  MODIFY `distribution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `theories`
--
ALTER TABLE `theories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `branchs`
--
ALTER TABLE `branchs`
  ADD CONSTRAINT `branchs_ibfk_1` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`setting_id`) ON UPDATE CASCADE;

--
-- Constraints for table `class_courses`
--
ALTER TABLE `class_courses`
  ADD CONSTRAINT `class_courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_courses_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD CONSTRAINT `class_rooms_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `class_sections`
--
ALTER TABLE `class_sections`
  ADD CONSTRAINT `class_sections_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD CONSTRAINT `class_teachers_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`mark_distribution_id`) REFERENCES `markdistributions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON UPDATE CASCADE;

--
-- Constraints for table `course_marks`
--
ALTER TABLE `course_marks`
  ADD CONSTRAINT `course_marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`s_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_marks_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`branch_id`) ON UPDATE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`semester_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fees_ibfk_4` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`session_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fees_ibfk_5` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON UPDATE CASCADE;

--
-- Constraints for table `markdistributions`
--
ALTER TABLE `markdistributions`
  ADD CONSTRAINT `markdistributions_ibfk_1` FOREIGN KEY (`mark_id`) REFERENCES `marks` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`practical_id`) REFERENCES `practicals` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`theory_id`) REFERENCES `theories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_5` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON UPDATE CASCADE;

--
-- Constraints for table `routins`
--
ALTER TABLE `routins`
  ADD CONSTRAINT `routins_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON UPDATE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`routine_id`) REFERENCES `routins` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`session_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`semester_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
