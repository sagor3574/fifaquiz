-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 08:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fifaquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'rtvadmin@gmail.com', 'rtvadmin@123');

-- --------------------------------------------------------

--
-- Table structure for table `question_list`
--

CREATE TABLE `question_list` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct` varchar(255) NOT NULL,
  `qst_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_list`
--

INSERT INTO `question_list` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct`, `qst_date`) VALUES
(1, 'ফুটবল কোন ভাষার শব্দ ?', 'স্প্যানিশ', 'পর্তুগিজ', 'গ্রিক', 'ইংরেজি', 'ইংরেজি', '19 Nov, 2022 02:15 PM'),
(2, 'ফিফা কত সালে প্রতিষ্ঠিত হয়?', '১৯০৪', '১৯১৪', '১৯৩০', '১৮৭২', '১৯০৪', '19 Nov, 2022 02:17 PM'),
(3, 'আর্জেন্টিনা দলের প্রধান কোচের নাম কি?', 'লিওনেল স্কালোনি', 'তিতে', 'পেপ গার্দিওলা', 'জিনেদিন জিদান', 'লিওনেল স্কালোনি', '12 Dec, 2022 01:46 PM'),
(4, 'কাতার বিশ্বকাপসহ কত বার সেমিফাইনালে ক্রোয়েশিয়া?', '3', '2', '5', '4', '3', '12 Dec, 2022 01:47 PM');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_count`
--

CREATE TABLE `quiz_count` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL,
  `perticipation_date` varchar(255) NOT NULL,
  `status` tinyint(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_count`
--

INSERT INTO `quiz_count` (`id`, `name`, `phone`, `question1`, `question2`, `perticipation_date`, `status`) VALUES
(1, 'Sagor Kumar', 1755896522, '১৯০৪', 'স্প্যানিশ', '12 Dec, 2022', 2),
(2, 'Sagor Kumar', 1744580577, '১৯৩০', 'স্প্যানিশ', '12 Dec, 2022', 1),
(3, 'Sajib', 1744580570, '১৯০৪', 'স্প্যানিশ', '12 Dec, 2022', 1),
(4, 'Tufan', 1734567895, '3', 'লিওনেল স্কালোনি', '12 Dec, 2022', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_list`
--
ALTER TABLE `question_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_count`
--
ALTER TABLE `quiz_count`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question_list`
--
ALTER TABLE `question_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_count`
--
ALTER TABLE `quiz_count`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
