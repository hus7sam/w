-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 07:28 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Category` varchar(150) NOT NULL,
  `State` varchar(150) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Number` int(10) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID`, `name`, `Description`, `Status`, `Category`, `State`, `City`, `Number`, `Date`) VALUES
(4, 'جلكسي اس 8', 'جوال جلسي اس 5 اذاكرة 256 احمر\r\n', 'مستعمل', 'مواد غذائية', 'تبوك', 'الوجة', 123456789, '2020-12-13 18:08:47'),
(8, 'سلك شاحن', 'سلك شاحن ايفون', 'مستعمل', 'الالكترونيات', 'المدينة المنورة', 'المدينة', 123456789, '2020-12-16 02:09:51'),
(9, 'سماعة', 'سماعة سوني يدوية', 'مستعمل', 'الالكترونيات', 'المدينة المنورة', 'المدينة', 123456789, '2020-12-16 02:11:17'),
(10, 'سماعة', 'سماعة سوني يدوية', 'مستعمل', 'الالكترونيات', 'المدينة المنورة', 'المدينة', 123456789, '2020-12-16 02:13:31'),
(11, 'سماعة', 'سماعة سوني صغيرة لون اسود', 'مستعمل', 'أجهزة الكترونية', 'تبوك', 'المدينة', 123456789, '2020-12-16 02:14:13'),
(12, 'ثلاجة', 'ثلاجة قهوة لتر ونص', 'مستعمل', 'أجهزة الكترونية', 'المدينة المنورة', 'ينبع', 123456789, '2020-12-16 02:16:15'),
(17, 'ثلاجة', 'لاجة قهوة صناعة المانية ٣ لتر', 'جديد', 'أثاث', 'الحدود الشمالية', 'عرعر', 123456789, '2020-12-20 00:18:47'),
(18, 'ثلاجة', 'ثلاجة قهوة صناعة المانية ٣ لتر احمر', 'جديد', 'أثاث', 'الحدود الشمالية', 'عرعر', 123456789, '2020-12-20 00:18:51'),
(31, 'راوتر هواوي', 'راوتر هواوي سعة البطارية 5 الف ملي امبير اللون اسود', 'مستعمل', 'أجهزة الكترونية', 'المدينة المنورة', 'المدينة', 530423063, '2020-12-31 02:36:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
