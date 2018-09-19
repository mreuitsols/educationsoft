-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 04:11 PM
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
-- Table structure for table `account_purpose_list`
--

CREATE TABLE `account_purpose_list` (
  `purpose_id` int(11) NOT NULL,
  `purpose_name` varchar(255) NOT NULL,
  `purpose_description` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_purpose_list`
--

INSERT INTO `account_purpose_list` (`purpose_id`, `purpose_name`, `purpose_description`, `create_at`) VALUES
(1, 'Admission', 'Student Admission', '2018-09-16 10:10:42'),
(2, 'Tuition Fees', 'Tuition Fees', '2018-09-16 10:10:42'),
(3, 'Library Fee', 'Library Fee', '2018-09-16 11:36:02'),
(4, 'Lab Fee', 'Lab Fee', '2018-09-16 11:37:10'),
(5, 'Fee Purpose Setup', 'Fee Purpose Setup', '2018-09-16 11:38:11'),
(6, 'test', 'test', '2018-09-16 13:33:00'),
(7, 'Purpose Name', 'Sort Description', '2018-09-17 07:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_catid` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `self_row_id` int(11) NOT NULL,
  `bookself_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_sort_name` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookselfs`
--

CREATE TABLE `bookselfs` (
  `bookself_id` int(11) NOT NULL,
  `self_name` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookself_rows`
--

CREATE TABLE `bookself_rows` (
  `self_row_id` int(11) NOT NULL,
  `book_self_id` int(11) NOT NULL,
  `row_name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books_author`
--

CREATE TABLE `books_author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_details` longtext NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `book_catid` int(11) NOT NULL,
  `book_cat_name` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_publishers`
--

CREATE TABLE `book_publishers` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `publisher_phone` varchar(50) NOT NULL,
  `publisher_email` varchar(200) NOT NULL,
  `publisher_website` varchar(200) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `publisher_status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_store`
--

CREATE TABLE `book_store` (
  `book_store_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quentity` int(11) NOT NULL,
  `available_quantity` int(11) NOT NULL,
  `out_of_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_subcategories`
--

CREATE TABLE `book_subcategories` (
  `subcat_id` int(11) NOT NULL,
  `book_main_catid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 1, 1, 2, 'Curriculum - 2019', '', 120, 2, 4, 1500, 400, 200, 4000);

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
-- Table structure for table `fees_amount_by_semester`
--

CREATE TABLE `fees_amount_by_semester` (
  `fees_amount_id` int(11) NOT NULL,
  `account_purpose_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_amount_by_semester`
--

INSERT INTO `fees_amount_by_semester` (`fees_amount_id`, `account_purpose_id`, `program_id`, `semester_id`, `session_id`, `amount`, `status`, `created_at`) VALUES
(34, 1, 1, 1, 1, 500, '1', '2018-09-19 13:52:17'),
(35, 1, 2, 1, 1, 500, '1', '2018-09-19 13:54:51'),
(36, 2, 2, 1, 1, 200, '1', '2018-09-19 13:54:44'),
(37, 3, 2, 1, 1, 300, '1', '2018-09-19 13:54:48'),
(38, 4, 2, 1, 1, 150, '1', '2018-09-19 13:54:41');

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
(2, 1, 1, 0, 'BSC in CSE Engineering', 'active', '2018-09-17 09:01:54'),
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
(26, '310264', 2, 1, 1, 6, 1, 1, 1, 1, 'Mahfuj', '01737831156', 'mahfuj.euitsols@gmail.com', 'Bangladesh (????????)', 'Bangladesh (????????)', '52012', 'Lalmonirhat', '05555555', '', 'Single', 'Lalmonirhat', 'Islam', 'Male', 'Mr X', 'Mast Y', 'Techer', 'Present Address', 'Present Address', '03/10/1992', 'A+', '', '2018-09-19 13:26:18', '09/19/2018', 'Degree', '0000-00-00', '2.55', 'HSC', 'Masters', '', '', '3.66', '1', 0),
(27, '310263', 2, 1, 1, 6, 1, 1, 1, 1, 'Sajidul', '01737831156', 'mahfuj.euitsols@gmail.com', 'Bangladesh (????????)', 'Bangladesh (????????)', '52012', 'Lalmonirhat', '05555555', '', 'Single', 'Lalmonirhat', 'Islam', 'Male', 'Mr X', 'Mast Y', 'Techer', 'Present Address', 'Present Address', '03/10/1992', 'A+', '', '2018-09-19 13:26:18', '09/19/2018', 'Degree', '0000-00-00', '2.55', 'HSC', 'Masters', '', '', '3.66', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `student_account_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `student_fees_by_semeste_id` int(11) NOT NULL,
  `dr_amount` float NOT NULL,
  `cr_amount` float NOT NULL,
  `p_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`student_account_id`, `student_id`, `program_id`, `semester_id`, `session_id`, `student_fees_by_semeste_id`, `dr_amount`, `cr_amount`, `p_date`, `status`, `created_at`) VALUES
(12, 310264, 2, 1, 1, 0, 0, 500, '0000-00-00 00:00:00', '', '2018-09-19 13:56:46'),
(13, 310263, 2, 1, 1, 0, 0, 500, '0000-00-00 00:00:00', '', '2018-09-19 14:01:41'),
(14, 310263, 2, 1, 1, 0, 0, 500, '0000-00-00 00:00:00', '', '2018-09-19 14:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `student_dr_account`
--

CREATE TABLE `student_dr_account` (
  `dr_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `dr_amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_dr_account`
--

INSERT INTO `student_dr_account` (`dr_id`, `student_id`, `program_id`, `semester_id`, `session_id`, `dr_amount`, `created_at`) VALUES
(5, 310264, 2, 1, 1, 1000, '2018-09-19 13:56:46'),
(6, 310263, 2, 1, 1, 500, '2018-09-19 14:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_by_semeste`
--

CREATE TABLE `student_fees_by_semeste` (
  `student_fees_by_semeste_id` int(11) NOT NULL,
  `purpose_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fees_amount` float NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fees_by_semeste`
--

INSERT INTO `student_fees_by_semeste` (`student_fees_by_semeste_id`, `purpose_id`, `program_id`, `semester_id`, `session_id`, `student_id`, `fees_amount`, `status`, `created_at`) VALUES
(9, 1, 2, 1, 1, 0, 500, '1', '2018-09-19 13:54:21'),
(10, 2, 2, 1, 1, 0, 200, '1', '2018-09-19 13:54:21'),
(11, 3, 2, 1, 1, 0, 300, '1', '2018-09-19 13:54:21');

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
(15, 1, 1, 2, '6', '1212', 'Theory', 'Bangla', 3, 100, 'Dr. Mahfuj', 'Euitsols', '2017', '2018-09-19 13:22:13');

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
(16, 'noyon', '', '', '', '', '', 0, 'active', '', '2018-09-04 07:59:18'),
(17, '20182', 'fb56db5736e9e08a951803b8f72e9e6c', '', '9889e13e195c27a9856cc9b697868542', '', 'student', 2, 'active', '', '2018-09-19 13:12:55'),
(18, '310264', '54c3d69021fd48a3b29706e7200606a1', '', 'fd72f0e0d70042a3abc3d48026cd5e35', '', 'student', 0, 'active', '', '2018-09-19 13:26:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_purpose_list`
--
ALTER TABLE `account_purpose_list`
  ADD PRIMARY KEY (`purpose_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_catid` (`book_catid`),
  ADD KEY `subcat_id` (`subcat_id`),
  ADD KEY `publisher_id` (`publisher_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `self_row_id` (`self_row_id`),
  ADD KEY `bookself_id` (`bookself_id`);

--
-- Indexes for table `bookselfs`
--
ALTER TABLE `bookselfs`
  ADD PRIMARY KEY (`bookself_id`);

--
-- Indexes for table `bookself_rows`
--
ALTER TABLE `bookself_rows`
  ADD PRIMARY KEY (`self_row_id`),
  ADD KEY `book_self_id` (`book_self_id`);

--
-- Indexes for table `books_author`
--
ALTER TABLE `books_author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`book_catid`);

--
-- Indexes for table `book_publishers`
--
ALTER TABLE `book_publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `book_store`
--
ALTER TABLE `book_store`
  ADD PRIMARY KEY (`book_store_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_subcategories`
--
ALTER TABLE `book_subcategories`
  ADD PRIMARY KEY (`subcat_id`);

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
-- Indexes for table `fees_amount_by_semester`
--
ALTER TABLE `fees_amount_by_semester`
  ADD PRIMARY KEY (`fees_amount_id`),
  ADD KEY `account_purpose_id` (`account_purpose_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `session_id` (`session_id`);

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
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`student_account_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `fees_purpose_id` (`student_fees_by_semeste_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_dr_account`
--
ALTER TABLE `student_dr_account`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `student_fees_by_semeste`
--
ALTER TABLE `student_fees_by_semeste`
  ADD PRIMARY KEY (`student_fees_by_semeste_id`),
  ADD KEY `fees_amount_by_semester_id` (`purpose_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `student_id` (`student_id`);

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
-- AUTO_INCREMENT for table `account_purpose_list`
--
ALTER TABLE `account_purpose_list`
  MODIFY `purpose_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookselfs`
--
ALTER TABLE `bookselfs`
  MODIFY `bookself_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookself_rows`
--
ALTER TABLE `bookself_rows`
  MODIFY `self_row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `books_author`
--
ALTER TABLE `books_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `book_catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book_publishers`
--
ALTER TABLE `book_publishers`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book_store`
--
ALTER TABLE `book_store`
  MODIFY `book_store_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book_subcategories`
--
ALTER TABLE `book_subcategories`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_sections`
--
ALTER TABLE `class_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `course_marks`
--
ALTER TABLE `course_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `curriculums`
--
ALTER TABLE `curriculums`
  MODIFY `curriculum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `distribution_subject_list`
--
ALTER TABLE `distribution_subject_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fees_amount_by_semester`
--
ALTER TABLE `fees_amount_by_semester`
  MODIFY `fees_amount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
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
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `student_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `student_dr_account`
--
ALTER TABLE `student_dr_account`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student_fees_by_semeste`
--
ALTER TABLE `student_fees_by_semeste`
  MODIFY `student_fees_by_semeste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
