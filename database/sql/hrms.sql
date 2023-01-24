-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 02:22 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `union_id` int(11) DEFAULT NULL,
  `sl` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1=active, 2=inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'সহকারী কর্মকর্তা', 1, 1, '2022-07-31 08:34:34', '2022-09-21 22:50:59'),
(2, 'পরিচালক', 1, 1, '2022-07-31 08:34:34', '2022-09-21 22:51:25'),
(3, 'উপ-পরিচালক', 1, 1, '2022-07-31 08:34:34', '2022-09-21 22:52:08'),
(4, 'সহকারী পরিচালক', 1, 1, '2022-07-31 08:34:34', '2022-09-21 22:52:32'),
(5, 'মাঠ কর্মী', 1, 1, '2022-07-31 02:43:16', '2022-09-21 22:53:15'),
(6, 'মনিটরিং অফিসার', 1, 1, '2022-07-31 02:45:52', '2022-09-21 22:52:52'),
(7, 'প্রকল্প পরিচালক', 1, 1, '2022-09-21 22:37:47', '2022-09-21 22:50:40'),
(8, 'উপজেলা কৃষি অফিসার', 1, 1, '2022-09-21 22:57:11', '2022-09-21 22:57:11'),
(9, 'উপজেলা কৃষি অফিসার (ভাঃ)', 1, 1, '2022-09-21 22:57:32', '2022-09-21 22:57:32'),
(10, 'কৃষি সম্প্রসারণ অফিসার', 1, 1, '2022-09-21 22:58:20', '2022-09-21 22:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `sl` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `sl`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, 'রাঙ্গামাটি', 4, NULL, 1, 1, NULL, '2022-09-14 22:08:42', '2022-09-14 22:08:42'),
(12, 'খাগড়াছড়ি', 4, NULL, 1, 1, NULL, '2022-09-14 22:09:06', '2022-09-14 22:09:06'),
(13, 'বান্দরবান', 4, NULL, 1, 1, NULL, '2022-09-14 22:09:22', '2022-09-14 22:09:22'),
(14, 'কুমিল্লা', 4, NULL, 1, 1, NULL, '2022-09-14 22:09:41', '2022-09-14 22:09:41'),
(15, 'চট্টগ্রাম', 4, NULL, 1, 1, NULL, '2022-09-14 22:10:05', '2022-09-14 22:10:05'),
(16, 'পঞ্চগড়', 5, NULL, 1, 1, NULL, '2022-09-14 22:11:05', '2022-09-14 22:11:05'),
(17, 'দিনাজপুর', 5, NULL, 1, 1, NULL, '2022-09-14 22:11:19', '2022-09-14 22:11:19'),
(18, 'রংপুর', 5, NULL, 1, 1, NULL, '2022-09-14 22:11:33', '2022-09-14 22:11:33'),
(19, 'সিলেট', 6, NULL, 1, 1, NULL, '2022-09-14 22:11:59', '2022-09-14 22:11:59'),
(20, 'টাঙ্গাইল', 7, NULL, 1, 1, NULL, '2022-09-14 22:12:31', '2022-09-14 22:12:31'),
(21, 'নরসিংদী', 7, NULL, 1, 1, NULL, '2022-09-14 22:12:42', '2022-09-14 22:12:42'),
(22, 'ময়মনসিংহ', 8, NULL, 1, 1, NULL, '2022-09-14 22:13:24', '2022-09-14 22:13:24'),
(23, 'শেরপুর', 8, NULL, 1, 1, NULL, '2022-09-14 22:13:37', '2022-09-14 22:13:37'),
(24, 'যশোর', 9, NULL, 1, 1, NULL, '2022-09-14 22:14:05', '2022-09-14 22:14:05'),
(25, 'চাপাঁইনবাবগঞ্জ', 10, NULL, 1, 1, NULL, '2022-09-14 22:14:58', '2022-09-14 22:14:58'),
(26, 'রাজশাহী', 10, NULL, 1, 1, NULL, '2022-09-14 22:15:14', '2022-09-14 22:15:14'),
(27, 'পাবনা', 10, NULL, 1, 1, NULL, '2022-09-14 22:15:33', '2022-09-14 22:15:33'),
(28, 'বগুড়া', 10, NULL, 1, 1, NULL, '2022-09-14 22:15:54', '2022-09-14 22:15:54'),
(29, 'নাটোর', 10, NULL, 1, 1, NULL, '2022-09-14 22:16:13', '2022-09-14 22:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `sl`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'চট্টগ্রাম', NULL, 1, 1, NULL, '2022-09-14 21:59:53', '2022-09-14 21:59:53'),
(5, 'রংপুর', NULL, 1, 1, NULL, '2022-09-14 22:01:41', '2022-09-14 22:01:41'),
(6, 'সিলেট', NULL, 1, 1, NULL, '2022-09-14 22:01:53', '2022-09-14 22:01:53'),
(7, 'ঢাকা', NULL, 1, 1, NULL, '2022-09-14 22:02:16', '2022-09-14 22:02:16'),
(8, 'ময়মনসিংহ', NULL, 1, 1, NULL, '2022-09-14 22:02:28', '2022-09-14 22:02:28'),
(9, 'খুলনা', NULL, 1, 1, NULL, '2022-09-14 22:02:39', '2022-09-14 22:02:39'),
(10, 'রাজশাহী', NULL, 1, 1, NULL, '2022-09-14 22:02:50', '2022-09-14 22:02:50');

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
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gendar` int(11) DEFAULT NULL,
  `nid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1:male,2:female',
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `name`, `f_name`, `h_name`, `mobile`, `gendar`, `nid`, `gender`, `address`, `created_at`, `updated_at`) VALUES
(1, 'aaaa', 'ssss', '', '22222', 2, '22222', NULL, 'werwer', '2022-09-21 23:23:06', '2022-09-21 23:23:06'),
(2, 'sdfsdfsdf', 'sdfsdfsdf', NULL, '433423', NULL, '4234234', NULL, NULL, '2022-09-21 23:24:23', '2022-09-21 23:24:23'),
(3, 'মাধুবি ত্রি:', 'ফিলিপ ত্রি:', '', '০১৮২০৯৫৫৭৫৪', 2, '০৩১০৪৩১২৫২৪১৫', NULL, 'উত্তর পালং পাড়া', '2022-09-28 19:08:42', '2022-09-28 19:08:42'),
(4, 'ফিলিপ ত্রি:', 'গংপ্র ত্রি:', '', '000000000', 1, '০৩১০৪৩১২৫৪৪১৪', NULL, 'উত্তর পালং পাড়া	-', '2022-09-28 19:27:43', '2022-09-28 19:27:43'),
(5, 'দমশিন ত্রি:', 'গুংগারাম ত্রি:', '', '০১৮১০২৪৯৯৯৪', 1, '০৩১০৪৩১২৫৮৮০১', NULL, 'উত্তর পালং পাড়া', '2022-09-28 19:27:43', '2022-09-28 19:27:43'),
(6, 'সত্রগুন ত্রি:', 'হাজারাই ত্রি:', '', '০১৮৭৬৩১৪৩৯৪', 1, '০৩১০৪৩১২৫৮৮০৫', NULL, 'উত্তর পালং পাড়া', '2022-09-28 19:27:44', '2022-09-28 19:27:44'),
(7, 'ইসাহাক ত্রি:', 'কেমরাম ত্রি:', '', '০১৮৮৪৯৭৭৮১১', 1, '০৩১০৪৬৩২৪২৭০৭', NULL, 'জবিরাম পাড়া', '2022-09-28 19:27:44', '2022-09-28 19:27:44'),
(8, 'মো: সাদেক', 'সাবের আহ:', '', '০১৮২৯৬৬৯২২২', 1, '০৩১০৪৩১০০০১০৭', NULL, 'কলার ঝিরি', '2022-09-28 19:27:44', '2022-09-28 19:27:44'),
(9, 'সালা উদ্দিন', 'সাবের আহ:', '', '০১৮২৯৬৬৯২২২', 1, '১৯৯৪০৩১০৪৩১০০০১০৭', NULL, 'কলার ঝিরি', '2022-09-28 19:27:44', '2022-09-28 19:27:44'),
(10, 'মো: সাবের আহ:', 'এজাহার আহ:', '', '000000000', 1, '১৯৬৩০৩১০৪৩১০০০০০২', NULL, 'কলার ঝিরি', '2022-09-28 19:27:44', '2022-09-28 19:27:44'),
(11, 'উইলিয়াম মার্মা', 'মংথোয়াইছা মার্মা', '', '০১৮৭৬০৪১৫৯৭', 1, '০৩১০৪৩১২৬৮০৫২', NULL, 'কলার ঝিরি', '2022-09-28 19:27:44', '2022-09-28 19:27:44'),
(12, 'মংথোয়াইছা মার্মা', 'ফোছাঅং মার্মা', '', '০১৮৭৬০৪১৫৯৭-', 2, '০৩১০৪৩১২৫৩১৪৪', NULL, 'কলার ঝিরি', '2022-09-28 19:27:44', '2022-09-28 19:27:44'),
(13, 'চথুইপ্র মার্মা', 'কুহ্লারী মার্মা', NULL, '০১৬১১৭০০০৫৮', NULL, '০৩১০৪৩১২৫৯০১২', NULL, NULL, '2022-09-28 20:21:40', '2022-09-28 20:21:40'),
(14, 'পাইনুমং মার্মা', 'মংক্যনু মার্মা', NULL, '০১৫৫৩৫৫৭৭৯৯', NULL, '০৩১০৪৩১২৫৯১০০', NULL, NULL, '2022-09-28 20:25:26', '2022-09-28 20:25:26'),
(15, 'থুইনাংমং মার্মা', 'ক্রামং মার্মা', NULL, '০১৮২০৪১২৫৯৬', NULL, '০৩১০৪৩১২৫৯০৪৩', NULL, NULL, '2022-09-28 20:25:26', '2022-09-28 20:25:26'),
(16, 'প্রসন্ন চাকমা', 'সুদন্য চাকমা', NULL, '০১৫৩৯৫৬৫২৯৯', NULL, '০৩১০৪৬৩২৪৬৬৯৭', NULL, NULL, '2022-09-28 20:25:26', '2022-09-28 20:25:26'),
(17, 'উদয় কুমার চাকমা', 'সুদন্য চাকমা', NULL, '০১৫৫৭৬৭৫৩৬৩', NULL, '০৩১০৪৬৩২৪৬৭৩৪', NULL, NULL, '2022-09-28 20:25:27', '2022-09-28 20:25:27'),
(18, 'aswdfgyhujk', 'dfghjkl', NULL, 'dfghj', NULL, 'edrfgtyhj', NULL, NULL, '2022-09-28 21:09:59', '2022-09-28 21:09:59'),
(19, 'vbnvbn', 'vbnvbn', NULL, 'ertertert', NULL, 'erterte', NULL, NULL, '2022-09-28 21:17:22', '2022-09-28 21:17:22'),
(20, 'qawsedrftgyhujikol', 'aswrftgyhujkl.;', '', 'aswrftgyhujkl', 1, 'qwerftgyhujikol;', NULL, 'ASDFGHJMK,L', '2022-09-28 22:58:01', '2022-09-28 22:58:01'),
(21, 'Abdul Kalam', 'Rahomot mia', '', '01556556778', 1, '3333456789', NULL, '', '2022-10-10 19:11:42', '2022-10-10 19:11:42'),
(22, 'সুশান্ত চাকমা', 'দেবকুমার চাকমা', '', '০১৫৫৬৫৬৭০৮৪', 1, '৬০০১০১১২৪৩', NULL, 'মুনিগ্রাম', '2022-10-11 15:23:07', '2022-10-11 15:23:07'),
(23, 'অমরধন চাকমা', 'দয়াসেন চাকমা', '', '০১৫৫২৩৫৪৫২৭', 1, '৪৬১৪৯১৫২৩০১১৪', NULL, 'মুনিগ্রাম', '2022-10-11 15:23:07', '2022-10-11 15:23:07'),
(24, 'বিমলেন্দু চাকমা', 'রযুমনি চাকমা', NULL, '০১৮৯১৫৬৯৮৬৯', NULL, '৬৪৫১০০৪৪৩৩', NULL, NULL, '2022-10-11 15:50:55', '2022-10-11 15:50:55'),
(25, 'গেলেন ত্রিপুরা', 'পুর্ণমোহন এ্রিপুর্নমোহন ত্রিপুরা', NULL, '০১৫৭৫৩৯৮৩৪২', NULL, '১৫০১০১৭৪৪৪', NULL, NULL, '2022-10-11 15:50:55', '2022-10-11 16:27:43'),
(26, 'বদং মারমা', 'অংশিহ্ললা মারমা', NULL, '01556556778', NULL, '৪৬১৪৯৪৭১১৩৭১১', NULL, NULL, '2022-10-11 16:27:43', '2022-10-11 16:27:43'),
(27, 'ইন্দ্র চাকমা', 'বিজয় কুমার চাকমা', NULL, '০১৮৭১৭৭১৬০৬', NULL, '৩৩০১০৬৭৫৬১', NULL, NULL, '2022-10-11 16:27:43', '2022-10-11 16:27:43'),
(28, 'লক্ষীদেবী চাকমা', 'ইন্দ্র চাকমা', NULL, '০১৮৭১৭৭১৬০৬', NULL, '৭৩৫১১০০৫১১', NULL, NULL, '2022-10-11 17:31:10', '2022-10-11 17:31:10'),
(29, 'সুইসাপ্রু মারমা', 'থৈঅংগ্য মারমা', NULL, '০১৫৫২৭৪২৭৮০', NULL, '৭৩৫১০৮৯২২৭', NULL, NULL, '2022-10-11 17:31:10', '2022-10-11 17:31:10'),
(30, 'চিংম্রা মারমা', 'সুইসাপ্রু মারমা', NULL, '০১৫৫২৭৪২৭৮০', NULL, '৭৮০১০৬৪৭৬২', NULL, NULL, '2022-10-11 17:31:10', '2022-10-11 17:31:10'),
(31, 'কালোময় চাকমা', 'পূর্ণকিশোর চাকমা', NULL, '০১৮২১৭৮৮১৯৬', NULL, '০১৫০১১১১', NULL, NULL, '2022-10-11 17:31:10', '2022-10-11 17:31:10'),
(32, 'সুইচিং চৌধৃরী', 'মংচাইগ্যা চৌধুরী', NULL, '০১৫৩১৯৩৯৫৩৯', NULL, '০১৫০২৪৯৭২', NULL, NULL, '2022-10-11 17:43:14', '2022-10-11 17:43:14'),
(33, 'অথুই চৌধুরী', 'কংহানাচাই চৌধুরী', NULL, '০১৫৫৯৭৮৫১৯৭', NULL, '৩৩০১০৩০১৩০', NULL, NULL, '2022-10-11 17:43:14', '2022-10-11 17:43:14'),
(34, 'অনন্ত ত্রিপুরা', 'মনচান ত্রিপুরা', NULL, '০১৮২০৭২৯১৩৬', NULL, '৯১৫১০৭২৮৪১', NULL, NULL, '2022-10-11 17:43:14', '2022-10-11 17:43:14'),
(35, 'মেমাছি মারমা', 'মইও মারমা', NULL, '০১৮২০৭২৯১৩৬', NULL, '০১৫০২৪৯৭৪', NULL, NULL, '2022-10-11 19:20:33', '2022-10-11 19:20:33'),
(36, 'অর্জুন দেবনাখ', 'রাজেন্দ্র দেবনাথ', NULL, '০১৮৮২৬৬৯১৩১', NULL, '৪৬১৪৯২৫১৫৭৩০৮', NULL, NULL, '2022-10-11 19:20:33', '2022-10-11 19:20:33'),
(37, 'কল্পরঞ্জন ত্রিপুরা', 'বজেন্দ্র লাল ত্রিপুরা', NULL, '০১৫৭৫৫০৬৯৪১', NULL, '৭৩৫১১০০৬১', NULL, NULL, '2022-10-11 19:20:33', '2022-10-11 19:20:33'),
(38, 'তপন ত্রিপুরা', 'ধীরেন্দ্রলাল  ত্রিপুরা', NULL, '০১৮৭৫৫৫৮৮৮৪', NULL, '৭৪৫১১০০৫১১', NULL, NULL, '2022-10-11 19:20:33', '2022-10-11 19:20:33'),
(39, 'চথুইপ্র মার্মা', 'গংপ্র ত্রি:', '', '000000000', 1, '০৩১০৪৩১২৫৯০00', NULL, 'khagra chori', '2022-10-12 17:56:00', '2022-10-12 17:56:00'),
(40, 'ফিলিপ ত্রি:', 'কুহ্লারী মার্মা', NULL, '000000000', NULL, '00১০৪৩১২৫২৪১৫', NULL, NULL, '2022-10-12 18:00:51', '2022-10-12 18:00:51'),
(41, 'অংক্যচিং মগ', 'রেম্রাচাই মগ', '', '০১৮৬৭৫৭৮৪১১', 1, '৬০০১১৭৩৪৯৮', NULL, 'গামারীঢালা', '2022-10-13 16:49:41', '2022-10-13 16:49:41'),
(42, 'Dorian White', 'Chandler Buckner', '', 'Ad ducimus sit com', 2, 'Pariatur Exercitati', NULL, 'Amet rerum et totam', '2022-10-27 11:52:33', '2022-10-27 11:52:33'),
(43, 'Maggie Valdez', 'Timon Lester', NULL, 'Sunt est et aut qui', NULL, 'Deserunt ullam occae', NULL, NULL, '2022-10-27 11:56:45', '2022-10-27 11:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--

CREATE TABLE `fiscal_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`id`, `year`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '২০২০', '0', 1, 1, '2022-09-04 05:48:24', '2022-09-14 21:49:19'),
(2, '২০২০-২০২১', '1', 1, 1, '2022-09-04 05:50:46', '2022-09-18 18:27:06'),
(3, '২০২১-২০২২', '1', 1, 1, '2022-09-04 05:50:51', '2022-09-18 18:26:53'),
(4, '২০২২-২০২৩', '1', 1, NULL, '2022-09-18 18:27:23', '2022-09-18 18:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_id` int(11) DEFAULT NULL COMMENT 'related model id',
  `model` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `read_by` int(11) DEFAULT NULL,
  `read_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `head_office` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `horticulture_center_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `head_office`, `name`, `division_id`, `district_id`, `upazila_id`, `horticulture_center_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'সদর দপ্তর', 7, NULL, NULL, NULL, 1, 1, NULL, '2022-09-21 15:58:13', '2022-09-21 15:58:13'),
(2, NULL, 'চট্টগ্রাম অফিস', 4, NULL, NULL, NULL, 1, 1, NULL, '2022-09-21 16:00:11', '2022-09-21 16:00:11'),
(3, NULL, 'রংপুর  অফিস', 5, NULL, NULL, NULL, 1, 1, NULL, '2022-09-21 16:01:10', '2022-09-21 16:01:10'),
(4, NULL, 'সিলেট অফিস', 6, NULL, NULL, NULL, 1, 1, NULL, '2022-09-21 16:12:46', '2022-09-21 16:12:46'),
(5, NULL, 'ময়মনসিংহ অফিস', 8, NULL, NULL, NULL, 1, 1, NULL, '2022-09-21 16:13:48', '2022-09-21 16:13:48'),
(6, NULL, 'খুলনা অফিস', 9, NULL, NULL, NULL, 1, 1, NULL, '2022-09-21 16:14:13', '2022-09-21 16:14:13'),
(7, NULL, 'রাজশাহী অফিস', 10, NULL, NULL, NULL, 1, 1, NULL, '2022-09-21 16:14:37', '2022-09-21 16:14:37'),
(8, NULL, 'টাঙ্গাইল অফিস', 7, 20, NULL, NULL, 1, 1, NULL, '2022-09-21 16:16:09', '2022-09-21 16:16:09'),
(9, NULL, 'মধুপুর অফিস', 7, 20, 49, NULL, 1, 1, NULL, '2022-09-21 16:16:54', '2022-09-21 16:16:54'),
(10, NULL, 'ধনবাড়ী হর্টিকালটার অফিস', 7, 20, 50, 24, 1, 1, NULL, '2022-09-21 16:23:40', '2022-09-21 16:23:40'),
(11, NULL, 'আলীকদম অফিস', 4, 13, 25, NULL, 1, 1, NULL, '2022-09-28 18:59:14', '2022-09-28 18:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1:in,2:out,3:initial in',
  `fiscal_year_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `type`, `fiscal_year_id`, `status`, `division_id`, `district_id`, `upazila_id`, `office_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, NULL, NULL, NULL, 6, 4, 6, NULL, '2022-10-08 17:21:07', '2022-10-08 17:21:07'),
(2, 3, 1, 1, NULL, NULL, NULL, 6, 4, 6, NULL, '2022-10-08 17:22:04', '2022-10-08 17:22:04'),
(3, 3, 2, 1, NULL, NULL, NULL, 6, 4, 6, NULL, '2022-10-10 19:21:15', '2022-10-10 19:21:15'),
(4, 1, 2, 1, 9, NULL, NULL, 6, 4, 6, NULL, '2022-10-10 19:21:47', '2022-10-10 19:21:47'),
(5, 1, 2, 1, 9, NULL, NULL, 6, 4, 6, NULL, '2022-10-10 19:22:42', '2022-10-10 19:22:42'),
(6, 3, 2, 1, NULL, NULL, NULL, 6, 4, 6, NULL, '2022-10-10 19:23:06', '2022-10-10 19:23:06'),
(7, 1, 2, 1, 9, NULL, NULL, 6, 4, 6, NULL, '2022-10-10 19:23:54', '2022-10-10 19:23:54'),
(8, 3, 1, 1, NULL, NULL, NULL, 2, 4, 6, NULL, '2022-10-11 16:27:43', '2022-10-11 16:27:43'),
(9, 3, 4, 1, NULL, NULL, NULL, 2, 4, 6, NULL, '2022-10-11 16:32:03', '2022-10-11 16:32:03'),
(10, 3, 4, 1, NULL, NULL, NULL, 2, 4, 6, NULL, '2022-10-11 16:32:59', '2022-10-11 16:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `farmer_id`, `quantity`, `office_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 0, 6, 4, '2022-10-08 17:21:07', '2022-10-08 17:21:07'),
(2, 2, 2, NULL, 0, 6, 4, '2022-10-08 17:22:04', '2022-10-08 17:22:04'),
(3, 3, 3, NULL, 10000, 6, 4, '2022-10-10 19:21:15', '2022-10-10 19:21:15'),
(4, 4, 3, NULL, 1500, 6, 4, '2022-10-10 19:21:47', '2022-10-10 19:21:47'),
(5, 5, 3, NULL, 500, 6, 4, '2022-10-10 19:22:42', '2022-10-10 19:22:42'),
(6, 6, 4, NULL, 5000, 6, 4, '2022-10-10 19:23:06', '2022-10-10 19:23:06'),
(7, 7, 3, NULL, 3000, 6, 4, '2022-10-10 19:23:54', '2022-10-10 19:23:54'),
(8, 8, 5, NULL, 1000, 2, 4, '2022-10-11 16:27:43', '2022-10-11 16:27:43'),
(9, 9, 6, NULL, 2000, 2, 4, '2022-10-11 16:32:03', '2022-10-11 16:32:03'),
(10, 10, 7, NULL, 3000, 2, 4, '2022-10-11 16:32:59', '2022-10-11 16:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('superadmin@gmail.com', '$2y$10$ehopCMFRIaebfSLjFSWSjOh9Vl7RJYA31gW4mpdb0daVGQZv/ae9S', '2022-08-24 10:51:04'),
('sayeemsiddique1992@gmial.com', '$2y$10$uJUQgWly45I6dQtixWU4quIHZ.QVSLw4zpwo4B6TQEl/ZPgfrIr7W', '2022-09-06 05:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name_en`, `name_bn`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'user_management', 'user_management', 1, 1, NULL, NULL),
(11, 'settings', 'settings', 1, 1, NULL, NULL),
(48, 'add_designation', 'add_designation', 1, 1, NULL, NULL),
(49, 'all_designations', 'all_designations', 1, 1, NULL, NULL),
(50, 'edit_designation', 'edit_designation', 1, 1, NULL, NULL),
(52, 'add_user', 'add_user', 1, 1, NULL, NULL),
(57, 'view_user', 'view_user', 1, 1, NULL, NULL),
(58, 'edit_user', 'edit_user', 1, 1, NULL, NULL),
(59, 'block_user', 'block_user', 1, 1, NULL, NULL),
(61, 'all_roles', 'all_roles', 1, 1, NULL, NULL),
(62, 'add_role', 'add_role', 1, 1, NULL, NULL),
(63, 'edit_role', 'edit_role', 1, 1, NULL, NULL),
(64, 'delete_role', 'delete_role', 1, 1, NULL, NULL),
(65, 'all_permissions', 'all_permissions', 1, 1, NULL, NULL),
(66, 'add_permission', 'add_permission', 1, 1, NULL, NULL),
(67, 'edit_permission', 'edit_permission', 1, 1, NULL, NULL),
(68, 'assign_permission_list', 'assign_permission_list', 1, 1, NULL, NULL),
(69, 'assign_permission', 'assign_permission', 1, 1, NULL, NULL),
(70, 'remove_assign_permission', 'remove_assign_permission', 1, 1, NULL, '2022-08-23 04:32:03'),
(179, 'manage_region', 'manage_region', 1, 1, NULL, NULL),
(180, 'add_region', 'add_region', 1, 1, NULL, NULL),
(181, 'edit_region', 'edit_region', 1, 1, NULL, NULL),
(182, 'delete_region', 'delete_region', 1, 1, NULL, NULL),
(183, 'view_region', 'view_region', 1, 1, NULL, NULL),
(187, 'manage_role_permission', 'manage_role_permission', 1, 1, '2022-08-23 03:48:09', '2022-08-23 03:48:09'),
(188, 'manage_office', 'manage_office', 1, 1, '2022-08-23 06:51:45', '2022-08-23 06:51:45'),
(189, 'add_office', 'add_office', 1, 1, '2022-08-23 06:55:31', '2022-08-23 06:55:31'),
(190, 'view_office', 'view_office', 1, 1, '2022-08-23 06:55:40', '2022-08-23 06:55:40'),
(191, 'edit_office', 'edit_office', 1, 1, '2022-08-23 06:55:49', '2022-08-23 06:55:49'),
(193, 'manage_location', 'manage_location', 1, 1, '2022-08-23 08:18:41', '2022-08-23 08:18:41'),
(194, 'manage_district', 'manage_district', 1, 1, '2022-08-23 08:55:34', '2022-08-23 08:55:34'),
(195, 'add_district', 'add_district', 1, 1, '2022-08-23 09:02:10', '2022-08-23 09:02:10'),
(196, 'view_district', 'view_district', 1, 1, '2022-08-23 09:02:20', '2022-08-23 09:02:20'),
(197, 'edit_district', 'edit_district', 1, 1, '2022-08-23 09:02:36', '2022-08-23 09:02:36'),
(198, 'delete_district', 'delete_district', 1, 1, '2022-08-23 09:02:49', '2022-08-23 09:02:49'),
(199, 'manage_upazila', 'manage_upazila', 1, 1, '2022-08-23 09:34:47', '2022-08-23 09:34:47'),
(200, 'add_upazila', 'add_upazila', 1, 1, '2022-08-23 09:35:05', '2022-08-23 09:35:05'),
(201, 'view_upazila', 'view_upazila', 1, 1, '2022-08-23 09:35:18', '2022-08-23 09:35:18'),
(202, 'edit_upazila', 'edit_upazila', 1, 1, '2022-08-23 09:35:34', '2022-08-23 09:35:34'),
(203, 'delete_upazila', 'delete_upazila', 1, 1, '2022-08-23 09:35:51', '2022-08-23 09:35:51'),
(209, 'manage_union', 'manage_union', 1, 1, '2022-08-23 10:26:12', '2022-08-23 10:26:12'),
(210, 'add_union', 'add_union', 1, 1, '2022-08-23 10:26:21', '2022-08-23 10:26:21'),
(211, 'view_union', 'view_union', 1, 1, '2022-08-23 10:26:33', '2022-08-23 10:26:33'),
(212, 'edit_union', 'edit_union', 1, 1, '2022-08-23 10:26:43', '2022-08-23 10:26:43'),
(213, 'delete_union', 'delete_union', 1, 1, '2022-08-23 10:26:51', '2022-08-23 10:26:51'),
(214, 'manage_block', 'manage_block', 1, 1, '2022-08-24 04:21:09', '2022-08-24 04:21:09'),
(215, 'add_block', 'add_block', 1, 1, '2022-08-24 04:21:28', '2022-08-24 04:21:28'),
(216, 'view_block', 'view_block', 1, 1, '2022-08-24 04:21:54', '2022-08-24 04:21:54'),
(217, 'edit_block', 'edit_block', 1, 1, '2022-08-24 04:22:03', '2022-08-24 04:22:03'),
(218, 'delete_block', 'delete_block', 1, 1, '2022-08-24 04:22:12', '2022-08-24 04:22:12'),
(219, 'manage_village', 'manage_village', 1, 1, '2022-08-24 04:39:42', '2022-08-24 04:39:42'),
(220, 'add_village', 'add_village', 1, 1, '2022-08-24 04:39:54', '2022-08-24 04:39:54'),
(221, 'view_village', 'view_village', 1, 1, '2022-08-24 04:40:04', '2022-08-24 04:40:04'),
(222, 'edit_village', 'edit_village', 1, 1, '2022-08-24 04:40:18', '2022-08-24 04:40:18'),
(223, 'delete_village', 'delete_village', 1, 1, '2022-08-24 04:40:26', '2022-08-24 04:40:26'),
(245, 'manage_fiscal_year', 'manage_fiscal_year', 1, 1, '2022-09-04 08:59:17', '2022-09-04 08:59:17'),
(246, 'add_fiscal_year', 'add_fiscal_year', 1, 1, '2022-09-04 08:59:28', '2022-09-04 08:59:28'),
(247, 'view_fiscal_year', 'view_fiscal_year', 1, 1, '2022-09-04 08:59:38', '2022-09-04 08:59:38'),
(248, 'edit_fiscal_year', 'edit_fiscal_year', 1, 1, '2022-09-04 08:59:49', '2022-09-04 08:59:49'),
(249, 'delete_fiscal_year', 'delete_fiscal_year', 1, 1, '2022-09-04 09:00:06', '2022-09-04 09:00:06'),
(274, 'delete_permission', 'delete_permission', 1, 1, '2022-09-25 10:57:10', '2022-09-25 10:57:10'),
(275, 'website_setting', 'website_setting', 1, 1, NULL, NULL),
(276, 'office_management', 'office_management', 1, 1, NULL, NULL),
(278, 'setting_management', 'setting_management', 1, 1, '2022-09-25 13:23:25', '2022-09-25 13:23:25'),
(292, 'change_any_user_pass', 'change_any_user_pass', 1, 1, '2022-09-25 16:04:28', '2022-09-25 16:04:28'),
(293, 'edit_user_minimum', 'edit_user_minimum', 1, 1, '2022-09-25 16:59:57', '2022-09-25 16:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disabled',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name_en`, `name_bn`, `display_name`, `sl`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'সুপার অ্যাডমিন', 'সুপার অ্যাডমিন', 'সুপার অ্যাডমিন', 1, 1, 1, 1, '2022-07-19 09:32:20', '2022-10-02 19:26:13'),
(2, 'অ্যাডমিন', 'অ্যাডমিন', 'অ্যাডমিন', 2, 1, 1, 1, '2022-07-19 09:32:20', '2022-10-02 19:25:55'),
(3, 'উপজেলা কৃষি অফিসার', 'উপজেলা কৃষি অফিসার', 'উপজেলা কৃষি অফিসার', NULL, 1, 1, 1, '2022-09-25 10:27:19', '2022-09-25 10:27:19'),
(4, 'হর্টিকালচার ইউজার', 'হর্টিকালচার ইউজার', 'হর্টিকালচার ইউজার', NULL, 1, 1, NULL, '2022-09-27 10:17:50', '2022-09-27 10:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `user_id`, `permission_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(804, NULL, 48, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(805, NULL, 49, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(806, NULL, 50, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(807, NULL, 61, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(808, NULL, 62, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(809, NULL, 63, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(810, NULL, 64, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(811, NULL, 65, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(812, NULL, 66, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(813, NULL, 67, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(814, NULL, 68, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(815, NULL, 69, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(816, NULL, 70, 1, 1, NULL, '2022-08-23 06:46:51', '2022-08-23 06:46:51'),
(817, NULL, 187, 1, 1, NULL, '2022-08-23 06:48:46', '2022-08-23 06:48:46'),
(818, NULL, 188, 1, 1, NULL, '2022-08-23 06:52:58', '2022-08-23 06:52:58'),
(819, NULL, 189, 1, 1, NULL, '2022-08-23 06:57:59', '2022-08-23 06:57:59'),
(820, NULL, 190, 1, 1, NULL, '2022-08-23 06:58:28', '2022-08-23 06:58:28'),
(821, NULL, 191, 1, 1, NULL, '2022-08-23 07:04:24', '2022-08-23 07:04:24'),
(822, NULL, 4, 1, 1, NULL, '2022-08-23 07:06:27', '2022-08-23 07:06:27'),
(823, NULL, 52, 1, 1, NULL, '2022-08-23 07:16:00', '2022-08-23 07:16:00'),
(824, NULL, 57, 1, 1, NULL, '2022-08-23 07:52:37', '2022-08-23 07:52:37'),
(826, NULL, 59, 1, 1, NULL, '2022-08-23 08:00:10', '2022-08-23 08:00:10'),
(827, NULL, 193, 1, 1, NULL, '2022-08-23 08:18:51', '2022-08-23 08:18:51'),
(828, NULL, 179, 1, 1, NULL, '2022-08-23 08:25:38', '2022-08-23 08:25:38'),
(829, NULL, 180, 1, 1, NULL, '2022-08-23 08:31:39', '2022-08-23 08:31:39'),
(830, NULL, 183, 1, 1, NULL, '2022-08-23 08:33:41', '2022-08-23 08:33:41'),
(831, NULL, 181, 1, 1, NULL, '2022-08-23 08:37:48', '2022-08-23 08:37:48'),
(832, NULL, 182, 1, 1, NULL, '2022-08-23 08:39:06', '2022-08-23 08:39:06'),
(833, NULL, 194, 1, 1, NULL, '2022-08-23 08:56:47', '2022-08-23 08:56:47'),
(834, NULL, 195, 1, 1, NULL, '2022-08-23 09:03:35', '2022-08-23 09:03:35'),
(835, NULL, 196, 1, 1, NULL, '2022-08-23 09:09:13', '2022-08-23 09:09:13'),
(836, NULL, 197, 1, 1, NULL, '2022-08-23 09:10:39', '2022-08-23 09:10:39'),
(837, NULL, 198, 1, 1, NULL, '2022-08-23 09:12:22', '2022-08-23 09:12:22'),
(838, NULL, 199, 1, 1, NULL, '2022-08-23 09:37:32', '2022-08-23 09:37:32'),
(839, NULL, 200, 1, 1, NULL, '2022-08-23 09:40:13', '2022-08-23 09:40:13'),
(840, NULL, 201, 1, 1, NULL, '2022-08-23 09:42:32', '2022-08-23 09:42:32'),
(841, NULL, 202, 1, 1, NULL, '2022-08-23 09:44:05', '2022-08-23 09:44:05'),
(842, NULL, 203, 1, 1, NULL, '2022-08-23 09:45:19', '2022-08-23 09:45:19'),
(848, NULL, 209, 1, 1, NULL, '2022-08-23 10:27:17', '2022-08-23 10:27:17'),
(849, NULL, 210, 1, 1, NULL, '2022-08-23 10:29:17', '2022-08-23 10:29:17'),
(850, NULL, 211, 1, 1, NULL, '2022-08-23 10:32:52', '2022-08-23 10:32:52'),
(851, NULL, 212, 1, 1, NULL, '2022-08-23 10:34:29', '2022-08-23 10:34:29'),
(852, NULL, 213, 1, 1, NULL, '2022-08-23 10:35:59', '2022-08-23 10:35:59'),
(853, NULL, 214, 1, 1, NULL, '2022-08-24 04:28:10', '2022-08-24 04:28:10'),
(854, NULL, 215, 1, 1, NULL, '2022-08-24 04:32:08', '2022-08-24 04:32:08'),
(855, NULL, 216, 1, 1, NULL, '2022-08-24 04:34:04', '2022-08-24 04:34:04'),
(856, NULL, 217, 1, 1, NULL, '2022-08-24 04:35:31', '2022-08-24 04:35:31'),
(857, NULL, 218, 1, 1, NULL, '2022-08-24 04:36:37', '2022-08-24 04:36:37'),
(858, NULL, 219, 1, 1, NULL, '2022-08-24 04:43:14', '2022-08-24 04:43:14'),
(859, NULL, 220, 1, 1, NULL, '2022-08-24 04:47:04', '2022-08-24 04:47:04'),
(860, NULL, 221, 1, 1, NULL, '2022-08-24 04:49:01', '2022-08-24 04:49:01'),
(861, NULL, 222, 1, 1, NULL, '2022-08-24 04:51:34', '2022-08-24 04:51:34'),
(862, NULL, 223, 1, 1, NULL, '2022-08-24 04:51:34', '2022-08-24 04:51:34'),
(881, NULL, 11, 1, 1, NULL, '2022-08-25 11:52:12', '2022-08-25 11:52:12'),
(913, NULL, 4, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(916, NULL, 11, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(917, NULL, 48, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(918, NULL, 49, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(919, NULL, 50, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(920, NULL, 52, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(921, NULL, 57, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(922, NULL, 58, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(923, NULL, 59, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(924, NULL, 61, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(925, NULL, 62, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(926, NULL, 63, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(927, NULL, 64, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(928, NULL, 65, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(929, NULL, 66, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(930, NULL, 67, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(931, NULL, 68, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(932, NULL, 69, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(933, NULL, 70, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(934, NULL, 150, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(935, NULL, 151, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(936, NULL, 152, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(937, NULL, 153, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(938, NULL, 154, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(939, NULL, 155, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(940, NULL, 156, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(941, NULL, 157, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(942, NULL, 158, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(943, NULL, 159, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(944, NULL, 160, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(945, NULL, 161, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(946, NULL, 162, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(947, NULL, 163, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(948, NULL, 164, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(957, NULL, 173, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(958, NULL, 174, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(959, NULL, 175, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(960, NULL, 176, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(961, NULL, 179, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(962, NULL, 180, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(963, NULL, 181, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(964, NULL, 182, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(965, NULL, 183, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(966, NULL, 187, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(967, NULL, 188, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(968, NULL, 189, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(969, NULL, 190, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(970, NULL, 191, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(971, NULL, 193, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(972, NULL, 194, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(973, NULL, 195, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(974, NULL, 196, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(975, NULL, 197, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(976, NULL, 198, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(977, NULL, 199, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(978, NULL, 200, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(979, NULL, 201, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(980, NULL, 202, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(981, NULL, 203, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(982, NULL, 204, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(983, NULL, 205, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(984, NULL, 206, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(986, NULL, 208, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(987, NULL, 209, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(988, NULL, 210, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(989, NULL, 211, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(990, NULL, 212, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(991, NULL, 213, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(992, NULL, 214, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(993, NULL, 215, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(994, NULL, 216, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(995, NULL, 217, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(996, NULL, 218, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(997, NULL, 219, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(998, NULL, 220, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(999, NULL, 221, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1000, NULL, 222, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1001, NULL, 223, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1002, NULL, 224, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1003, NULL, 225, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1004, NULL, 226, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1005, NULL, 227, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1006, NULL, 228, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1007, NULL, 229, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1008, NULL, 230, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1010, NULL, 232, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1011, NULL, 233, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1012, NULL, 234, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1013, NULL, 235, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1014, NULL, 236, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1016, NULL, 238, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1017, NULL, 239, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1018, NULL, 240, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1019, NULL, 241, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1020, NULL, 242, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1021, NULL, 243, 2, 1, NULL, '2022-08-29 16:18:30', '2022-08-29 16:18:30'),
(1133, NULL, 244, 2, 1, NULL, '2022-08-30 10:11:21', '2022-08-30 10:11:21'),
(1134, NULL, 245, 1, 1, NULL, '2022-09-04 09:00:13', '2022-09-04 09:00:13'),
(1135, NULL, 246, 1, 1, NULL, '2022-09-04 09:00:13', '2022-09-04 09:00:13'),
(1136, NULL, 247, 1, 1, NULL, '2022-09-04 09:00:13', '2022-09-04 09:00:13'),
(1137, NULL, 248, 1, 1, NULL, '2022-09-04 09:00:13', '2022-09-04 09:00:13'),
(1138, NULL, 249, 1, 1, NULL, '2022-09-04 09:00:13', '2022-09-04 09:00:13'),
(1163, NULL, 274, 1, 1, NULL, '2022-09-25 10:57:22', '2022-09-25 10:57:22'),
(1164, NULL, 228, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1165, NULL, 229, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1166, NULL, 230, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1167, NULL, 231, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1168, NULL, 232, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1169, NULL, 233, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1170, NULL, 234, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1171, NULL, 235, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1172, NULL, 236, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1173, NULL, 237, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1174, NULL, 238, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1175, NULL, 239, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1176, NULL, 267, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1177, NULL, 268, 3, 1, NULL, '2022-09-25 12:04:11', '2022-09-25 12:04:11'),
(1178, NULL, 275, 1, 1, NULL, '2022-09-25 13:20:36', '2022-09-25 13:20:36'),
(1179, NULL, 276, 1, 1, NULL, '2022-09-25 13:20:36', '2022-09-25 13:20:36'),
(1181, NULL, 278, 1, 1, NULL, '2022-09-25 13:23:34', '2022-09-25 13:23:34'),
(1195, NULL, 264, 3, 1, NULL, '2022-09-25 14:24:21', '2022-09-25 14:24:21'),
(1196, NULL, 292, 1, 1, NULL, '2022-09-25 16:04:37', '2022-09-25 16:04:37'),
(1197, NULL, 293, 1, 1, NULL, '2022-09-25 17:00:05', '2022-09-25 17:00:05'),
(1199, NULL, 58, 1, 1, NULL, '2022-09-25 17:24:40', '2022-09-25 17:24:40'),
(1210, NULL, 204, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1211, NULL, 205, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1212, NULL, 206, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1213, NULL, 207, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1214, NULL, 208, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1215, NULL, 244, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1216, NULL, 298, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1217, NULL, 300, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1218, NULL, 301, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1219, NULL, 302, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1220, NULL, 303, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1221, NULL, 304, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1222, NULL, 305, 4, 1, NULL, '2022-09-27 10:18:39', '2022-09-27 10:18:39'),
(1223, NULL, 265, 3, 1, NULL, '2022-09-27 10:35:14', '2022-09-27 10:35:14'),
(1224, NULL, 294, 3, 1, NULL, '2022-09-27 10:35:14', '2022-09-27 10:35:14'),
(1225, NULL, 295, 3, 1, NULL, '2022-09-27 10:35:14', '2022-09-27 10:35:14'),
(1226, NULL, 296, 3, 1, NULL, '2022-09-27 10:35:14', '2022-09-27 10:35:14'),
(1227, NULL, 297, 3, 1, NULL, '2022-09-27 10:35:14', '2022-09-27 10:35:14'),
(1228, NULL, 306, 3, 1, NULL, '2022-09-27 10:36:57', '2022-09-27 10:36:57'),
(1229, NULL, 299, 4, 1, NULL, '2022-09-27 10:49:04', '2022-09-27 10:49:04'),
(1234, NULL, 240, 4, 1, NULL, '2022-09-27 10:52:28', '2022-09-27 10:52:28'),
(1235, NULL, 241, 4, 1, NULL, '2022-09-27 10:52:28', '2022-09-27 10:52:28'),
(1236, NULL, 242, 4, 1, NULL, '2022-09-27 10:52:28', '2022-09-27 10:52:28'),
(1237, NULL, 243, 4, 1, NULL, '2022-09-27 10:52:28', '2022-09-27 10:52:28'),
(1239, NULL, 264, 2, 1, NULL, '2022-10-18 19:13:48', '2022-10-18 19:13:48'),
(1240, NULL, 265, 2, 1, NULL, '2022-10-18 19:13:48', '2022-10-18 19:13:48'),
(1241, NULL, 268, 2, 1, NULL, '2022-10-18 19:13:48', '2022-10-18 19:13:48'),
(1242, NULL, 306, 2, 1, NULL, '2022-10-18 19:13:48', '2022-10-18 19:13:48'),
(1243, NULL, 302, 2, 1, NULL, '2022-10-18 19:18:30', '2022-10-18 19:18:30'),
(1244, NULL, 298, 2, 1, NULL, '2022-10-18 19:20:20', '2022-10-18 19:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(251) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_link`)),
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `sub_title`, `logo`, `social_link`, `address`, `phone`, `mobile`, `email`, `alt_phone`, `alt_mobile`, `alt_email`, `copyright`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'কাজুবাদাম ও কৃষি গবেষণা, উন্নয়ন ও সম্পসারণ প্রকল্প', 'কৃষি সম্প্রসারণ অধিদপ্তর', 'ag8ypGnVfbjvd4JOKsSYAgf5CoUAJfoAqJPKhyiC.png', NULL, NULL, NULL, '+৮৮০১৭১২৭৯৪১১৭', 'pdrdecc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-29 10:16:43', '2022-09-22 23:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image`, `link`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'কাজু বাদাম', NULL, 'nFdpUHEHgJDC01B4sFOsuM3pJwjT2CWJ6I7QkMck.jpg', '#', '1', 1, NULL, '2022-09-15 20:42:09', '2022-09-15 20:42:09'),
(2, 'কফি', NULL, '5SHz6wJYIh8jLARJjcs5XaQtyym8acNsH4PNEH5d.jpg', '#', '1', 1, NULL, '2022-09-15 20:43:21', '2022-09-15 20:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE `unions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `sl` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `sl` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `name`, `district_id`, `sl`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 'নানিয়ারচর', 11, NULL, 1, 1, NULL, '2022-09-14 22:21:05', '2022-09-14 22:21:05'),
(7, 'জুরাছড়ি', 11, NULL, 1, 1, NULL, '2022-09-14 22:22:03', '2022-09-14 22:22:03'),
(8, 'বিলাইছড়ি', 11, NULL, 1, 1, NULL, '2022-09-14 22:22:22', '2022-09-14 22:22:22'),
(9, 'রাজস্থলী', 11, NULL, 1, 1, NULL, '2022-09-14 22:22:51', '2022-09-14 22:22:51'),
(10, 'লংগদু', 11, NULL, 1, 1, NULL, '2022-09-14 22:23:10', '2022-09-14 22:23:10'),
(11, 'বরকল', 11, NULL, 1, 1, NULL, '2022-09-14 22:23:30', '2022-09-14 22:23:30'),
(12, 'বাঘাইছড়ি', 11, NULL, 1, 1, NULL, '2022-09-14 22:23:56', '2022-09-14 22:23:56'),
(13, 'কাউখালী', 11, NULL, 1, 1, NULL, '2022-09-14 22:24:36', '2022-09-14 22:24:36'),
(14, 'কাপ্তাই', 11, NULL, 1, 1, NULL, '2022-09-14 22:24:57', '2022-09-14 22:24:57'),
(15, 'রাঙ্গামাটি সদর', 11, NULL, 1, 1, NULL, '2022-09-14 22:25:12', '2022-09-14 22:25:12'),
(16, 'খাগড়াছড়ি সদর', 12, NULL, 1, 1, NULL, '2022-09-14 22:39:16', '2022-09-14 22:39:16'),
(17, 'দিঘীনালা', 12, NULL, 1, 1, NULL, '2022-09-14 22:39:59', '2022-09-14 22:39:59'),
(18, 'পানছড়ি', 12, NULL, 1, 1, NULL, '2022-09-14 22:40:17', '2022-09-14 22:40:17'),
(19, 'লক্ষীছড়ি', 12, NULL, 1, 1, NULL, '2022-09-14 22:40:34', '2022-09-14 22:40:34'),
(20, 'মহালছড়ি', 12, NULL, 1, 1, NULL, '2022-09-14 22:40:49', '2022-09-14 22:40:49'),
(21, 'মানিকছড়ি', 12, NULL, 1, 1, NULL, '2022-09-14 22:41:08', '2022-09-14 22:41:08'),
(22, 'রামগড়', 12, NULL, 1, 1, NULL, '2022-09-14 22:41:29', '2022-09-14 22:41:29'),
(23, 'রাঙ্গামাটি', 12, NULL, 1, 1, NULL, '2022-09-14 22:41:45', '2022-09-14 22:41:45'),
(24, 'বান্দরবান সদর', 13, NULL, 1, 1, NULL, '2022-09-14 22:46:43', '2022-09-14 22:46:43'),
(25, 'আলীকদম', 13, NULL, 1, 1, NULL, '2022-09-14 22:47:02', '2022-09-14 22:47:02'),
(26, 'নাইক্ষ্যংছড়ি', 13, NULL, 1, 1, NULL, '2022-09-14 22:48:13', '2022-09-14 22:48:13'),
(27, 'রোয়াংছড়ি', 13, NULL, 1, 1, NULL, '2022-09-14 22:48:32', '2022-09-14 22:48:32'),
(28, 'লামা', 13, NULL, 1, 1, NULL, '2022-09-14 22:48:46', '2022-09-14 22:48:46'),
(29, 'রুমা', 13, NULL, 1, 1, NULL, '2022-09-14 22:49:04', '2022-09-14 22:49:04'),
(30, 'থানচি', 13, NULL, 1, 1, NULL, '2022-09-14 22:49:25', '2022-09-14 22:49:25'),
(31, 'লালমাই', 14, NULL, 1, 1, NULL, '2022-09-14 22:53:50', '2022-09-14 22:53:50'),
(32, 'আদর্শ সদর', 14, NULL, 1, 1, NULL, '2022-09-14 22:54:12', '2022-09-14 22:54:12'),
(33, 'সদর দক্ষিণ', 14, NULL, 1, 1, NULL, '2022-09-14 22:54:39', '2022-09-14 22:54:39'),
(34, 'হাটহাজারী', 15, NULL, 1, 1, 1, '2022-09-14 22:54:53', '2022-09-14 23:01:46'),
(35, 'রাউজান', 15, NULL, 1, 1, 1, '2022-09-14 22:55:10', '2022-09-14 23:01:59'),
(36, 'ফটিকছড়ি', 15, NULL, 1, 1, 1, '2022-09-14 22:55:28', '2022-09-14 23:02:15'),
(37, 'সীতাকুন্ড', 15, NULL, 1, 1, 1, '2022-09-14 22:55:50', '2022-09-14 23:02:26'),
(38, 'রাঙ্গুনিয়া', 15, NULL, 1, 1, 1, '2022-09-14 22:56:13', '2022-09-14 23:02:39'),
(39, 'সদর পঞ্চগড়', 16, NULL, 1, 1, 1, '2022-09-14 22:58:13', '2022-09-15 16:45:34'),
(40, 'তেতুঁলিয়া', 16, NULL, 1, 1, NULL, '2022-09-14 22:58:54', '2022-09-14 22:58:54'),
(41, 'আটোয়ারী', 16, NULL, 1, 1, NULL, '2022-09-14 22:59:12', '2022-09-14 22:59:12'),
(42, 'ঘোড়াশাল', 17, NULL, 1, 1, NULL, '2022-09-14 23:04:41', '2022-09-14 23:04:41'),
(43, 'নবাবগঞ্জ', 17, NULL, 1, 1, NULL, '2022-09-14 23:04:55', '2022-09-14 23:04:55'),
(44, 'পীরগঞ্জ', 18, NULL, 1, 1, NULL, '2022-09-14 23:05:53', '2022-09-14 23:05:53'),
(45, 'বদরগঞ্জ', 18, NULL, 1, 1, NULL, '2022-09-14 23:06:12', '2022-09-14 23:06:12'),
(46, 'বিয়ানিবাজার', 19, NULL, 1, 1, NULL, '2022-09-14 23:07:24', '2022-09-14 23:07:24'),
(47, 'গোলাপগঞ্চ', 19, NULL, 1, 1, NULL, '2022-09-14 23:07:46', '2022-09-14 23:07:46'),
(48, 'জৈন্তাপুর', 19, NULL, 1, 1, NULL, '2022-09-14 23:08:07', '2022-09-14 23:08:07'),
(49, 'মধুপুর', 20, NULL, 1, 1, NULL, '2022-09-14 23:09:25', '2022-09-14 23:09:25'),
(50, 'ধনবাড়ি', 20, NULL, 1, 1, NULL, '2022-09-14 23:09:47', '2022-09-14 23:09:47'),
(51, 'শিবপুর', 21, NULL, 1, 1, NULL, '2022-09-14 23:10:42', '2022-09-14 23:10:42'),
(52, 'বেলাবো', 21, NULL, 1, 1, NULL, '2022-09-14 23:11:02', '2022-09-14 23:11:02'),
(53, 'পলাশ', 21, NULL, 1, 1, NULL, '2022-09-14 23:11:20', '2022-09-14 23:11:20'),
(54, 'ফুলবাড়ীয়া', 22, NULL, 1, 1, NULL, '2022-09-14 23:12:17', '2022-09-14 23:12:17'),
(55, 'হালুয়াঘাট', 22, NULL, 1, 1, NULL, '2022-09-14 23:12:39', '2022-09-14 23:12:39'),
(56, 'ধোবাউড়া', 22, NULL, 1, 1, NULL, '2022-09-14 23:12:54', '2022-09-14 23:12:54'),
(57, 'নালিতাবাড়ি', 23, NULL, 1, 1, NULL, '2022-09-14 23:14:01', '2022-09-14 23:14:01'),
(58, 'ঝিনাইগাতী', 23, NULL, 1, 1, NULL, '2022-09-14 23:14:21', '2022-09-14 23:14:21'),
(59, 'শ্রীবর্দী', 23, NULL, 1, 1, NULL, '2022-09-14 23:14:35', '2022-09-14 23:14:35'),
(60, 'ঝিকরগাছা', 24, NULL, 1, 1, NULL, '2022-09-14 23:15:36', '2022-09-14 23:15:36'),
(61, 'চৌগাছা', 24, NULL, 1, 1, NULL, '2022-09-14 23:15:58', '2022-09-14 23:15:58'),
(62, 'নাচোল', 25, NULL, 1, 1, NULL, '2022-09-14 23:16:56', '2022-09-14 23:16:56'),
(63, 'গোদাগাড়ী', 26, NULL, 1, 1, NULL, '2022-09-14 23:17:48', '2022-09-14 23:17:48'),
(64, 'তানোর', 26, NULL, 1, 1, NULL, '2022-09-14 23:18:08', '2022-09-14 23:18:08'),
(65, 'পাবনা  সদর', 27, NULL, 1, 1, NULL, '2022-09-14 23:20:36', '2022-09-14 23:20:36'),
(66, 'ঈশরদী', 27, NULL, 1, 1, NULL, '2022-09-14 23:21:17', '2022-09-14 23:21:17'),
(67, 'চাটমোহর', 27, NULL, 1, 1, NULL, '2022-09-14 23:21:34', '2022-09-14 23:21:34'),
(68, 'শেরপুর', 28, NULL, 1, 1, NULL, '2022-09-14 23:22:15', '2022-09-14 23:22:15'),
(69, 'শাহজাহানপুর', 28, NULL, 1, 1, NULL, '2022-09-14 23:22:31', '2022-09-14 23:22:31'),
(70, 'লালপুর', 29, NULL, 1, 1, NULL, '2022-09-14 23:23:02', '2022-09-14 23:23:02'),
(71, 'বাগাতিপাড়া', 29, NULL, 1, 1, NULL, '2022-09-14 23:23:18', '2022-09-14 23:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=active, 2=disable',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `horticulture_cente_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `full_name`, `email`, `mobile`, `role_id`, `designation_id`, `address`, `image`, `status`, `email_verified_at`, `password`, `remember_token`, `division_id`, `district_id`, `upazila_id`, `office_id`, `horticulture_cente_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'সুপার', 'অ্যাডমিন', 'সুপার অ্যাডমিন', 'superadmin@gmail.com', '01234567897', 1, NULL, 'Karwanbazar', NULL, 1, NULL, '$2a$12$ZCXkynIbX1ft3uJ4fE5jkOGEOhBHo9f5UTKug6mw3hRYmOhq1lFre', NULL, 5, 16, 39, NULL, NULL, 1, 1, '2022-08-25 12:33:48', '2022-10-02 20:56:19'),
(2, 'Cumilla District', 'User', 'Cumilla District User', 'cumillauser@gmail.com', '6545647461456', 2, 1, '4545454', '1663662814.jpg', 1, NULL, '$2y$10$Xr9On3359YEI6lhhZPZxq.STgb/DY6/GXoiEA80AgeiHQFkBovfua', NULL, 7, 14, 6, 2, NULL, 1, 1, '2022-08-25 12:33:48', '2022-09-20 12:33:34'),
(3, 'Dhaka Division', 'User', 'Dhaka Division User', 'dhakauser@gmail.com', '34234234234', 2, 1, '4545454', '1663662722.jpg', 1, NULL, '$2y$10$eQ4Tq64UYbHdyNvW99VeZuiNMe.LuBGzNZ/x8Idt8Y24WFrIMeaZy', 'bdtwvgKD4cQqRDQJCVE4QWuN5E8gG86VOCmi1ZKZijBagWvf4SZfl071zYxf', 7, 11, 6, 1, 4, 1, 1, '2022-08-25 12:37:38', '2022-09-25 16:36:36'),
(4, 'lalmai upazil', 'user', 'lalmai upazil user', 'lalmaiuser@gmail.com', '11223344556', 3, 2, 'lalmai user address', '1663759114.png', 1, NULL, '$2y$10$CXikLB90Qp.QGfBoSFgLbO3bUmr5zg/79PWt5pvWLQlsTvvaQVzSS', NULL, 4, 11, 6, 3, NULL, 1, 1, '2022-09-20 12:38:59', '2022-09-25 17:24:21'),
(5, 'Mukta', 'Chakma', 'Mukta Chakma', 'muktachakma@mail.com', '01533126188', 3, 6, 'Khagrachori sador', '1664260271.jpg', 1, NULL, '$2y$10$5KHfR7zcT6mFmj9EWpaJpeZ48Ax08eqUZz0yFMguR80vuCKwEtLzi', NULL, 4, 12, 16, 2, NULL, 1, 1, '2022-09-27 10:31:12', '2022-10-10 19:18:59'),
(6, 'Shamol', 'Sarker', 'Shamol Sarker', 'shamolsarker@mail.com', '01676743165', 4, 5, 'Hathajari, Chittagong', '1664260386.jpg', 1, NULL, '$2y$10$Omw8PVflO5lMsRuLxZ.h1.Yyb1wjpICtM1uSlIsSGAcPRqdWRKgKi', NULL, 4, 15, 34, 2, 20, 1, 1, '2022-09-27 10:33:06', '2022-10-10 19:30:37'),
(7, 'কে,বি,ডি মোঃ রেজাউল করিম', 'রতন', 'কে,বি,ডি মোঃ রেজাউল করিম রতন', 'karimbou@gmail.com', '০১৭১৬৬৫৬০০৭', 2, 6, 'ঢাকা', 'userImage2022_09_27_023215_73109749.jpg', 1, NULL, '$2y$10$gr2WCiBYbpUTuRNS6gvvwOB/yljlfyZR1TBlmSisGtcDWJULiL4oK', NULL, 4, 11, 6, 1, NULL, 1, 1, '2022-09-27 12:32:15', '2022-10-11 15:43:41'),
(8, 'মাধুবি', 'ত্রি:', 'মাধুবি ত্রি:', 'alikodom1@gmail.com', '০১৮২০৯৫৫৭৫৪', 3, 5, 'উত্তর পালং পাড়া', NULL, 1, NULL, '$2y$10$vUiPNgaelJ2MDQ/5WO.q6uQmoyt8homgz93sdE4I.XdIizN2P9r.a', NULL, 4, 13, 25, 11, NULL, 1, 1, '2022-09-28 18:19:51', '2022-09-28 19:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_id` int(11) DEFAULT NULL,
  `sl` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1248;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
