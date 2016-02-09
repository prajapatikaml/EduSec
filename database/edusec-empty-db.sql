-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2015 at 07:07 PM
-- Server version: 5.5.22
-- PHP Version: 5.5.19-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `edusecyii2_empty_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, '/*', NULL, NULL, 1432554657, 1432554657),
('/auth-assignment/*', 2, '/auth-assignment/*', NULL, NULL, 1432554652, 1432554652),
('/auth-assignment/create', 2, '/auth-assignment/create', NULL, NULL, 1432554652, 1432554652),
('/auth-assignment/delete', 2, '/auth-assignment/delete', NULL, NULL, 1432554652, 1432554652),
('/auth-assignment/index', 2, '/auth-assignment/index', NULL, NULL, 1432554652, 1432554652),
('/auth-assignment/update', 2, '/auth-assignment/update', NULL, NULL, 1432554652, 1432554652),
('/auth-assignment/view', 2, '/auth-assignment/view', NULL, NULL, 1432554652, 1432554652),
('/city/*', 2, '/city/*', NULL, NULL, 1432554652, 1432554652),
('/city/create', 2, '/city/create', NULL, NULL, 1432555253, 1432555253),
('/city/delete', 2, '/city/delete', NULL, NULL, 1432554652, 1432554652),
('/city/index', 2, '/city/index', NULL, NULL, 1432554652, 1432554652),
('/city/update', 2, '/city/update', NULL, NULL, 1432554652, 1432554652),
('/city/view', 2, '/city/view', NULL, NULL, 1432554652, 1432554652),
('/country/*', 2, '/country/*', NULL, NULL, 1432554653, 1432554653),
('/country/create', 2, '/country/create', NULL, NULL, 1432554652, 1432554652),
('/country/delete', 2, '/country/delete', NULL, NULL, 1432554653, 1432554653),
('/country/index', 2, '/country/index', NULL, NULL, 1432554652, 1432554652),
('/country/update', 2, '/country/update', NULL, NULL, 1432554652, 1432554652),
('/country/view', 2, '/country/view', NULL, NULL, 1432554652, 1432554652),
('/course/*', 2, '/course/*', NULL, NULL, 1432554639, 1432554639),
('/course/batches/*', 2, '/course/batches/*', NULL, NULL, 1432554638, 1432554638),
('/course/batches/create', 2, '/course/batches/create', NULL, NULL, 1432554638, 1432554638),
('/course/batches/delete', 2, '/course/batches/delete', NULL, NULL, 1432554638, 1432554638),
('/course/batches/index', 2, '/course/batches/index', NULL, NULL, 1432554638, 1432554638),
('/course/batches/toggle', 2, '/course/batches/toggle', NULL, NULL, 1432554638, 1432554638),
('/course/batches/update', 2, '/course/batches/update', NULL, NULL, 1432554638, 1432554638),
('/course/batches/view', 2, '/course/batches/view', NULL, NULL, 1432554638, 1432554638),
('/course/courses/*', 2, '/course/courses/*', NULL, NULL, 1432554638, 1432554638),
('/course/courses/create', 2, '/course/courses/create', NULL, NULL, 1432554638, 1432554638),
('/course/courses/delete', 2, '/course/courses/delete', NULL, NULL, 1432554638, 1432554638),
('/course/courses/index', 2, '/course/courses/index', NULL, NULL, 1432554638, 1432554638),
('/course/courses/toggle', 2, '/course/courses/toggle', NULL, NULL, 1432554638, 1432554638),
('/course/courses/update', 2, '/course/courses/update', NULL, NULL, 1432554638, 1432554638),
('/course/courses/view', 2, '/course/courses/view', NULL, NULL, 1432554638, 1432554638),
('/course/default/*', 2, '/course/default/*', NULL, NULL, 1432554639, 1432554639),
('/course/default/index', 2, '/course/default/index', NULL, NULL, 1432554638, 1432554638),
('/course/section/*', 2, '/course/section/*', NULL, NULL, 1432554639, 1432554639),
('/course/section/create', 2, '/course/section/create', NULL, NULL, 1432554639, 1432554639),
('/course/section/delete', 2, '/course/section/delete', NULL, NULL, 1432554639, 1432554639),
('/course/section/index', 2, '/course/section/index', NULL, NULL, 1432554639, 1432554639),
('/course/section/toggle', 2, '/course/section/toggle', NULL, NULL, 1432554639, 1432554639),
('/course/section/update', 2, '/course/section/update', NULL, NULL, 1432554639, 1432554639),
('/course/section/view', 2, '/course/section/view', NULL, NULL, 1432554639, 1432554639),
('/dashboard/*', 2, '/dashboard/*', NULL, NULL, 1432554649, 1432554649),
('/dashboard/default/*', 2, '/dashboard/default/*', NULL, NULL, 1432554647, 1432554647),
('/dashboard/default/index', 2, '/dashboard/default/index', NULL, NULL, 1432554647, 1432554647),
('/dashboard/events/*', 2, '/dashboard/events/*', NULL, NULL, 1432554648, 1432554648),
('/dashboard/events/add-event', 2, '/dashboard/events/add-event', NULL, NULL, 1432554647, 1432554647),
('/dashboard/events/event-delete', 2, '/dashboard/events/event-delete', NULL, NULL, 1432554648, 1432554648),
('/dashboard/events/index', 2, '/dashboard/events/index', NULL, NULL, 1432554647, 1432554647),
('/dashboard/events/update-event', 2, '/dashboard/events/update-event', NULL, NULL, 1432554648, 1432554648),
('/dashboard/events/view', 2, '/dashboard/events/view', NULL, NULL, 1432554647, 1432554647),
('/dashboard/events/view-events', 2, '/dashboard/events/view-events', NULL, NULL, 1432554647, 1432554647),
('/dashboard/msg-of-day/*', 2, '/dashboard/msg-of-day/*', NULL, NULL, 1432554648, 1432554648),
('/dashboard/msg-of-day/create', 2, '/dashboard/msg-of-day/create', NULL, NULL, 1432554648, 1432554648),
('/dashboard/msg-of-day/delete', 2, '/dashboard/msg-of-day/delete', NULL, NULL, 1432554648, 1432554648),
('/dashboard/msg-of-day/index', 2, '/dashboard/msg-of-day/index', NULL, NULL, 1432554648, 1432554648),
('/dashboard/msg-of-day/toggle', 2, '/dashboard/msg-of-day/toggle', NULL, NULL, 1432554648, 1432554648),
('/dashboard/msg-of-day/update', 2, '/dashboard/msg-of-day/update', NULL, NULL, 1432554648, 1432554648),
('/dashboard/msg-of-day/view', 2, '/dashboard/msg-of-day/view', NULL, NULL, 1432554648, 1432554648),
('/dashboard/notice/*', 2, '/dashboard/notice/*', NULL, NULL, 1432554649, 1432554649),
('/dashboard/notice/create', 2, '/dashboard/notice/create', NULL, NULL, 1432554649, 1432554649),
('/dashboard/notice/delete', 2, '/dashboard/notice/delete', NULL, NULL, 1432554649, 1432554649),
('/dashboard/notice/index', 2, '/dashboard/notice/index', NULL, NULL, 1432554649, 1432554649),
('/dashboard/notice/notice-file', 2, '/dashboard/notice/notice-file', NULL, NULL, 1432554649, 1432554649),
('/dashboard/notice/toggle', 2, '/dashboard/notice/toggle', NULL, NULL, 1432554649, 1432554649),
('/dashboard/notice/update', 2, '/dashboard/notice/update', NULL, NULL, 1432554649, 1432554649),
('/dashboard/notice/view', 2, '/dashboard/notice/view', NULL, NULL, 1432554649, 1432554649),
('/dashboard/notice/view-popup', 2, '/dashboard/notice/view-popup', NULL, NULL, 1432554649, 1432554649),
('/debug/*', 2, '/debug/*', NULL, NULL, 1432554651, 1432554651),
('/debug/default/*', 2, '/debug/default/*', NULL, NULL, 1432554651, 1432554651),
('/debug/default/download-mail', 2, '/debug/default/download-mail', NULL, NULL, 1432554651, 1432554651),
('/debug/default/index', 2, '/debug/default/index', NULL, NULL, 1432554651, 1432554651),
('/debug/default/toolbar', 2, '/debug/default/toolbar', NULL, NULL, 1432554651, 1432554651),
('/debug/default/view', 2, '/debug/default/view', NULL, NULL, 1432554651, 1432554651),
('/default/*', 2, '/default/*', NULL, NULL, 1432554653, 1432554653),
('/default/index', 2, '/default/index', NULL, NULL, 1432554653, 1432554653),
('/dependent/*', 2, '/dependent/*', NULL, NULL, 1432554653, 1432554653),
('/dependent/getcity', 2, '/dependent/getcity', NULL, NULL, 1432554653, 1432554653),
('/dependent/getorgcity', 2, '/dependent/getorgcity', NULL, NULL, 1432554653, 1432554653),
('/dependent/getorgstate', 2, '/dependent/getorgstate', NULL, NULL, 1432554653, 1432554653),
('/dependent/getstate', 2, '/dependent/getstate', NULL, NULL, 1432554653, 1432554653),
('/dependent/index', 2, '/dependent/index', NULL, NULL, 1432554653, 1432554653),
('/dependent/studbatch', 2, '/dependent/studbatch', NULL, NULL, 1432554653, 1432554653),
('/dependent/studsection', 2, '/dependent/studsection', NULL, NULL, 1432554653, 1432554653),
('/document-category/*', 2, '/document-category/*', NULL, NULL, 1432554653, 1432554653),
('/document-category/create', 2, '/document-category/create', NULL, NULL, 1432554653, 1432554653),
('/document-category/delete', 2, '/document-category/delete', NULL, NULL, 1432554653, 1432554653),
('/document-category/index', 2, '/document-category/index', NULL, NULL, 1432554653, 1432554653),
('/document-category/update', 2, '/document-category/update', NULL, NULL, 1432554653, 1432554653),
('/document-category/view', 2, '/document-category/view', NULL, NULL, 1432554653, 1432554653),
('/employee/*', 2, '/employee/*', NULL, NULL, 1432554645, 1432554645),
('/employee/default/*', 2, '/employee/default/*', NULL, NULL, 1432554642, 1432554642),
('/employee/default/index', 2, '/employee/default/index', NULL, NULL, 1432554642, 1432554642),
('/employee/dependent/*', 2, '/employee/dependent/*', NULL, NULL, 1432554642, 1432554642),
('/employee/dependent/emp-c-city', 2, '/employee/dependent/emp-c-city', NULL, NULL, 1432554642, 1432554642),
('/employee/dependent/emp-c-state', 2, '/employee/dependent/emp-c-state', NULL, NULL, 1432554642, 1432554642),
('/employee/dependent/emp-p-city', 2, '/employee/dependent/emp-p-city', NULL, NULL, 1432554642, 1432554642),
('/employee/dependent/emp-p-state', 2, '/employee/dependent/emp-p-state', NULL, NULL, 1432554642, 1432554642),
('/employee/emp-address/*', 2, '/employee/emp-address/*', NULL, NULL, 1432554642, 1432554642),
('/employee/emp-address/create', 2, '/employee/emp-address/create', NULL, NULL, 1432554642, 1432554642),
('/employee/emp-address/delete', 2, '/employee/emp-address/delete', NULL, NULL, 1432554642, 1432554642),
('/employee/emp-address/index', 2, '/employee/emp-address/index', NULL, NULL, 1432554642, 1432554642),
('/employee/emp-address/update', 2, '/employee/emp-address/update', NULL, NULL, 1432554642, 1432554642),
('/employee/emp-address/view', 2, '/employee/emp-address/view', NULL, NULL, 1432554642, 1432554642),
('/employee/emp-category/*', 2, '/employee/emp-category/*', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-category/create', 2, '/employee/emp-category/create', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-category/delete', 2, '/employee/emp-category/delete', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-category/index', 2, '/employee/emp-category/index', NULL, NULL, 1432554642, 1432554642),
('/employee/emp-category/update', 2, '/employee/emp-category/update', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-category/view', 2, '/employee/emp-category/view', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-department/*', 2, '/employee/emp-department/*', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-department/create', 2, '/employee/emp-department/create', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-department/delete', 2, '/employee/emp-department/delete', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-department/index', 2, '/employee/emp-department/index', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-department/update', 2, '/employee/emp-department/update', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-department/view', 2, '/employee/emp-department/view', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-designation/*', 2, '/employee/emp-designation/*', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-designation/create', 2, '/employee/emp-designation/create', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-designation/delete', 2, '/employee/emp-designation/delete', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-designation/index', 2, '/employee/emp-designation/index', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-designation/update', 2, '/employee/emp-designation/update', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-designation/view', 2, '/employee/emp-designation/view', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-docs/*', 2, '/employee/emp-docs/*', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-docs/create', 2, '/employee/emp-docs/create', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-docs/delete', 2, '/employee/emp-docs/delete', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-docs/index', 2, '/employee/emp-docs/index', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-docs/update', 2, '/employee/emp-docs/update', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-docs/view', 2, '/employee/emp-docs/view', NULL, NULL, 1432554643, 1432554643),
('/employee/emp-info/*', 2, '/employee/emp-info/*', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-info/create', 2, '/employee/emp-info/create', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-info/delete', 2, '/employee/emp-info/delete', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-info/index', 2, '/employee/emp-info/index', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-info/update', 2, '/employee/emp-info/update', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-info/view', 2, '/employee/emp-info/view', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/*', 2, '/employee/emp-master/*', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/adddocs', 2, '/employee/emp-master/adddocs', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/change-status', 2, '/employee/emp-master/change-status', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/create', 2, '/employee/emp-master/create', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/delete', 2, '/employee/emp-master/delete', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/delete-doc', 2, '/employee/emp-master/delete-doc', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/docs-download', 2, '/employee/emp-master/docs-download', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/emp-photo', 2, '/employee/emp-master/emp-photo', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/index', 2, '/employee/emp-master/index', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/update', 2, '/employee/emp-master/update', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-master/view', 2, '/employee/emp-master/view', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-status/*', 2, '/employee/emp-status/*', NULL, NULL, 1432554645, 1432554645),
('/employee/emp-status/create', 2, '/employee/emp-status/create', NULL, NULL, 1432554645, 1432554645),
('/employee/emp-status/delete', 2, '/employee/emp-status/delete', NULL, NULL, 1432554645, 1432554645),
('/employee/emp-status/index', 2, '/employee/emp-status/index', NULL, NULL, 1432554644, 1432554644),
('/employee/emp-status/update', 2, '/employee/emp-status/update', NULL, NULL, 1432554645, 1432554645),
('/employee/emp-status/view', 2, '/employee/emp-status/view', NULL, NULL, 1432554644, 1432554644),
('/employee/export-data/*', 2, '/employee/export-data/*', NULL, NULL, 1432554645, 1432554645),
('/employee/export-data/employee-profile-pdf', 2, '/employee/export-data/employee-profile-pdf', NULL, NULL, 1432554645, 1432554645),
('/export-data/*', 2, '/export-data/*', NULL, NULL, 1432554653, 1432554653),
('/export-data/export-excel', 2, '/export-data/export-excel', NULL, NULL, 1432554653, 1432554653),
('/export-data/export-to-pdf', 2, '/export-data/export-to-pdf', NULL, NULL, 1432554653, 1432554653),
('/fees/*', 2, '/fees/*', NULL, NULL, 1432554646, 1432554646),
('/fees/bank-master/*', 2, '/fees/bank-master/*', NULL, NULL, 1432554645, 1432554645),
('/fees/bank-master/create', 2, '/fees/bank-master/create', NULL, NULL, 1432554645, 1432554645),
('/fees/bank-master/delete', 2, '/fees/bank-master/delete', NULL, NULL, 1432554645, 1432554645),
('/fees/bank-master/index', 2, '/fees/bank-master/index', NULL, NULL, 1432554645, 1432554645),
('/fees/bank-master/update', 2, '/fees/bank-master/update', NULL, NULL, 1432554645, 1432554645),
('/fees/bank-master/view', 2, '/fees/bank-master/view', NULL, NULL, 1432554645, 1432554645),
('/fees/default/*', 2, '/fees/default/*', NULL, NULL, 1432554645, 1432554645),
('/fees/default/index', 2, '/fees/default/index', NULL, NULL, 1432554645, 1432554645),
('/fees/dependent/*', 2, '/fees/dependent/*', NULL, NULL, 1432554645, 1432554645),
('/fees/dependent/get-fees-category', 2, '/fees/dependent/get-fees-category', NULL, NULL, 1432554645, 1432554645),
('/fees/fees-category-details/*', 2, '/fees/fees-category-details/*', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-category-details/create', 2, '/fees/fees-category-details/create', NULL, NULL, 1432554645, 1432554645),
('/fees/fees-category-details/delete', 2, '/fees/fees-category-details/delete', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-category-details/index', 2, '/fees/fees-category-details/index', NULL, NULL, 1432554645, 1432554645),
('/fees/fees-category-details/update', 2, '/fees/fees-category-details/update', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-category-details/view', 2, '/fees/fees-category-details/view', NULL, NULL, 1432554645, 1432554645),
('/fees/fees-collect-category/*', 2, '/fees/fees-collect-category/*', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-collect-category/create', 2, '/fees/fees-collect-category/create', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-collect-category/delete', 2, '/fees/fees-collect-category/delete', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-collect-category/index', 2, '/fees/fees-collect-category/index', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-collect-category/toggle', 2, '/fees/fees-collect-category/toggle', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-collect-category/update', 2, '/fees/fees-collect-category/update', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-collect-category/view', 2, '/fees/fees-collect-category/view', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-payment-transaction/*', 2, '/fees/fees-payment-transaction/*', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-payment-transaction/collect', 2, '/fees/fees-payment-transaction/collect', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-payment-transaction/delete', 2, '/fees/fees-payment-transaction/delete', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-payment-transaction/export-fcc-wise-fees-pdf', 2, '/fees/fees-payment-transaction/export-fcc-wise-fees-pdf', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-payment-transaction/pay-fees', 2, '/fees/fees-payment-transaction/pay-fees', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-payment-transaction/print-common-receipt', 2, '/fees/fees-payment-transaction/print-common-receipt', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-payment-transaction/stu-fees-data', 2, '/fees/fees-payment-transaction/stu-fees-data', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-payment-transaction/update', 2, '/fees/fees-payment-transaction/update', NULL, NULL, 1432554646, 1432554646),
('/fees/fees-payment-transaction/view', 2, '/fees/fees-payment-transaction/view', NULL, NULL, 1432554646, 1432554646),
('/gii/*', 2, '/gii/*', NULL, NULL, 1432554652, 1432554652),
('/gii/default/*', 2, '/gii/default/*', NULL, NULL, 1432554652, 1432554652),
('/gii/default/action', 2, '/gii/default/action', NULL, NULL, 1432554652, 1432554652),
('/gii/default/diff', 2, '/gii/default/diff', NULL, NULL, 1432554652, 1432554652),
('/gii/default/index', 2, '/gii/default/index', NULL, NULL, 1432554651, 1432554651),
('/gii/default/preview', 2, '/gii/default/preview', NULL, NULL, 1432554651, 1432554651),
('/gii/default/view', 2, '/gii/default/view', NULL, NULL, 1432554651, 1432554651),
('/languages/*', 2, '/languages/*', NULL, NULL, 1432554654, 1432554654),
('/languages/create', 2, '/languages/create', NULL, NULL, 1432554654, 1432554654),
('/languages/delete', 2, '/languages/delete', NULL, NULL, 1432554654, 1432554654),
('/languages/index', 2, '/languages/index', NULL, NULL, 1432554653, 1432554653),
('/languages/update', 2, '/languages/update', NULL, NULL, 1432554654, 1432554654),
('/languages/view', 2, '/languages/view', NULL, NULL, 1432554654, 1432554654),
('/login-details/*', 2, '/login-details/*', NULL, NULL, 1432554654, 1432554654),
('/login-details/create', 2, '/login-details/create', NULL, NULL, 1432554654, 1432554654),
('/login-details/delete', 2, '/login-details/delete', NULL, NULL, 1432554654, 1432554654),
('/login-details/index', 2, '/login-details/index', NULL, NULL, 1432554654, 1432554654),
('/login-details/update', 2, '/login-details/update', NULL, NULL, 1432554654, 1432554654),
('/login-details/view', 2, '/login-details/view', NULL, NULL, 1432554654, 1432554654),
('/national-holidays/*', 2, '/national-holidays/*', NULL, NULL, 1432554654, 1432554654),
('/national-holidays/create', 2, '/national-holidays/create', NULL, NULL, 1432554654, 1432554654),
('/national-holidays/delete', 2, '/national-holidays/delete', NULL, NULL, 1432554654, 1432554654),
('/national-holidays/index', 2, '/national-holidays/index', NULL, NULL, 1432554654, 1432554654),
('/national-holidays/update', 2, '/national-holidays/update', NULL, NULL, 1432554654, 1432554654),
('/national-holidays/view', 2, '/national-holidays/view', NULL, NULL, 1432554654, 1432554654),
('/nationality/*', 2, '/nationality/*', NULL, NULL, 1432554655, 1432554655),
('/nationality/create', 2, '/nationality/create', NULL, NULL, 1432554654, 1432554654),
('/nationality/delete', 2, '/nationality/delete', NULL, NULL, 1432554655, 1432554655),
('/nationality/index', 2, '/nationality/index', NULL, NULL, 1432554654, 1432554654),
('/nationality/update', 2, '/nationality/update', NULL, NULL, 1432554655, 1432554655),
('/nationality/view', 2, '/nationality/view', NULL, NULL, 1432554654, 1432554654),
('/organization/*', 2, '/organization/*', NULL, NULL, 1432554655, 1432554655),
('/organization/create', 2, '/organization/create', NULL, NULL, 1432554655, 1432554655),
('/organization/delete', 2, '/organization/delete', NULL, NULL, 1432554655, 1432554655),
('/organization/index', 2, '/organization/index', NULL, NULL, 1432554655, 1432554655),
('/organization/update', 2, '/organization/update', NULL, NULL, 1432554655, 1432554655),
('/organization/view', 2, '/organization/view', NULL, NULL, 1432554655, 1432554655),
('/report/*', 2, '/report/*', NULL, NULL, 1432554647, 1432554647),
('/report/default/*', 2, '/report/default/*', NULL, NULL, 1432554647, 1432554647),
('/report/default/index', 2, '/report/default/index', NULL, NULL, 1432554646, 1432554646),
('/report/dependent/*', 2, '/report/dependent/*', NULL, NULL, 1432554647, 1432554647),
('/report/dependent/index', 2, '/report/dependent/index', NULL, NULL, 1432554647, 1432554647),
('/report/dependent/studbatch', 2, '/report/dependent/studbatch', NULL, NULL, 1432554647, 1432554647),
('/report/dependent/studsection', 2, '/report/dependent/studsection', NULL, NULL, 1432554647, 1432554647),
('/report/empinforeport', 2, '/report/empinforeport', NULL, NULL, 1432554655, 1432554655),
('/report/employee/*', 2, '/report/employee/*', NULL, NULL, 1432554647, 1432554647),
('/report/employee/empinforeport', 2, '/report/employee/empinforeport', NULL, NULL, 1432554647, 1432554647),
('/report/employee/index', 2, '/report/employee/index', NULL, NULL, 1432554647, 1432554647),
('/report/employee/selected-employee-list', 2, '/report/employee/selected-employee-list', NULL, NULL, 1432554647, 1432554647),
('/report/index', 2, '/report/index', NULL, NULL, 1432554655, 1432554655),
('/report/selected-employee-list', 2, '/report/selected-employee-list', NULL, NULL, 1432554655, 1432554655),
('/report/selected-student-list', 2, '/report/selected-student-list', NULL, NULL, 1432554655, 1432554655),
('/report/student/*', 2, '/report/student/*', NULL, NULL, 1432554647, 1432554647),
('/report/student/index', 2, '/report/student/index', NULL, NULL, 1432554647, 1432554647),
('/report/student/selected-student-list', 2, '/report/student/selected-student-list', NULL, NULL, 1432554647, 1432554647),
('/report/student/stuinforeport', 2, '/report/student/stuinforeport', NULL, NULL, 1432554647, 1432554647),
('/report/stuinforeport', 2, '/report/stuinforeport', NULL, NULL, 1432554655, 1432554655),
('/rights/*', 2, '/rights/*', NULL, NULL, 1432554651, 1432554651),
('/rights/assignment/*', 2, '/rights/assignment/*', NULL, NULL, 1432554649, 1432554649),
('/rights/assignment/assign', 2, '/rights/assignment/assign', NULL, NULL, 1432554649, 1432554649),
('/rights/assignment/index', 2, '/rights/assignment/index', NULL, NULL, 1432554649, 1432554649),
('/rights/assignment/role-search', 2, '/rights/assignment/role-search', NULL, NULL, 1432554649, 1432554649),
('/rights/assignment/view', 2, '/rights/assignment/view', NULL, NULL, 1432554649, 1432554649),
('/rights/default/*', 2, '/rights/default/*', NULL, NULL, 1432554649, 1432554649),
('/rights/default/index', 2, '/rights/default/index', NULL, NULL, 1432554649, 1432554649),
('/rights/menu/*', 2, '/rights/menu/*', NULL, NULL, 1432554650, 1432554650),
('/rights/menu/create', 2, '/rights/menu/create', NULL, NULL, 1432554650, 1432554650),
('/rights/menu/delete', 2, '/rights/menu/delete', NULL, NULL, 1432554650, 1432554650),
('/rights/menu/index', 2, '/rights/menu/index', NULL, NULL, 1432554650, 1432554650),
('/rights/menu/update', 2, '/rights/menu/update', NULL, NULL, 1432554650, 1432554650),
('/rights/menu/view', 2, '/rights/menu/view', NULL, NULL, 1432554650, 1432554650),
('/rights/permission/*', 2, '/rights/permission/*', NULL, NULL, 1432554650, 1432554650),
('/rights/permission/assign', 2, '/rights/permission/assign', NULL, NULL, 1432554650, 1432554650),
('/rights/permission/create', 2, '/rights/permission/create', NULL, NULL, 1432554650, 1432554650),
('/rights/permission/delete', 2, '/rights/permission/delete', NULL, NULL, 1432554650, 1432554650),
('/rights/permission/index', 2, '/rights/permission/index', NULL, NULL, 1432554650, 1432554650),
('/rights/permission/role-search', 2, '/rights/permission/role-search', NULL, NULL, 1432554650, 1432554650),
('/rights/permission/update', 2, '/rights/permission/update', NULL, NULL, 1432554650, 1432554650),
('/rights/permission/view', 2, '/rights/permission/view', NULL, NULL, 1432554650, 1432554650),
('/rights/role/*', 2, '/rights/role/*', NULL, NULL, 1432554651, 1432554651),
('/rights/role/assign', 2, '/rights/role/assign', NULL, NULL, 1432554650, 1432554650),
('/rights/role/create', 2, '/rights/role/create', NULL, NULL, 1432554650, 1432554650),
('/rights/role/delete', 2, '/rights/role/delete', NULL, NULL, 1432554650, 1432554650),
('/rights/role/index', 2, '/rights/role/index', NULL, NULL, 1432554650, 1432554650),
('/rights/role/role-search', 2, '/rights/role/role-search', NULL, NULL, 1432554651, 1432554651),
('/rights/role/update', 2, '/rights/role/update', NULL, NULL, 1432554650, 1432554650),
('/rights/role/view', 2, '/rights/role/view', NULL, NULL, 1432554650, 1432554650),
('/rights/route/*', 2, '/rights/route/*', NULL, NULL, 1432554651, 1432554651),
('/rights/route/assign', 2, '/rights/route/assign', NULL, NULL, 1432554651, 1432554651),
('/rights/route/create', 2, '/rights/route/create', NULL, NULL, 1432554651, 1432554651),
('/rights/route/index', 2, '/rights/route/index', NULL, NULL, 1432554651, 1432554651),
('/rights/route/route-search', 2, '/rights/route/route-search', NULL, NULL, 1432554651, 1432554651),
('/rights/rule/*', 2, '/rights/rule/*', NULL, NULL, 1432554651, 1432554651),
('/rights/rule/create', 2, '/rights/rule/create', NULL, NULL, 1432554651, 1432554651),
('/rights/rule/delete', 2, '/rights/rule/delete', NULL, NULL, 1432554651, 1432554651),
('/rights/rule/index', 2, '/rights/rule/index', NULL, NULL, 1432554651, 1432554651),
('/rights/rule/update', 2, '/rights/rule/update', NULL, NULL, 1432554651, 1432554651),
('/rights/rule/view', 2, '/rights/rule/view', NULL, NULL, 1432554651, 1432554651),
('/site/*', 2, '/site/*', NULL, NULL, 1432554656, 1432554656),
('/site/about', 2, '/site/about', NULL, NULL, 1432554656, 1432554656),
('/site/captcha', 2, '/site/captcha', NULL, NULL, 1432554655, 1432554655),
('/site/contact', 2, '/site/contact', NULL, NULL, 1432554655, 1432554655),
('/site/error', 2, '/site/error', NULL, NULL, 1432554655, 1432554655),
('/site/forgotpassword', 2, '/site/forgotpassword', NULL, NULL, 1432554655, 1432554655),
('/site/index', 2, '/site/index', NULL, NULL, 1432554655, 1432554655),
('/site/loadimage', 2, '/site/loadimage', NULL, NULL, 1432554655, 1432554655),
('/site/login', 2, '/site/login', NULL, NULL, 1432554655, 1432554655),
('/site/logout', 2, '/site/logout', NULL, NULL, 1432554655, 1432554655),
('/state/*', 2, '/state/*', NULL, NULL, 1432554656, 1432554656),
('/state/create', 2, '/state/create', NULL, NULL, 1432554656, 1432554656),
('/state/delete', 2, '/state/delete', NULL, NULL, 1432554656, 1432554656),
('/state/index', 2, '/state/index', NULL, NULL, 1432554656, 1432554656),
('/state/update', 2, '/state/update', NULL, NULL, 1432554656, 1432554656),
('/state/view', 2, '/state/view', NULL, NULL, 1432554656, 1432554656),
('/student/*', 2, '/student/*', NULL, NULL, 1432554642, 1432554642),
('/student/default/*', 2, '/student/default/*', NULL, NULL, 1432554639, 1432554639),
('/student/default/index', 2, '/student/default/index', NULL, NULL, 1432554639, 1432554639),
('/student/dependent/*', 2, '/student/dependent/*', NULL, NULL, 1432554639, 1432554639),
('/student/dependent/studbatch', 2, '/student/dependent/studbatch', NULL, NULL, 1432554639, 1432554639),
('/student/dependent/studsection', 2, '/student/dependent/studsection', NULL, NULL, 1432554639, 1432554639),
('/student/dependent/ustud-c-city', 2, '/student/dependent/ustud-c-city', NULL, NULL, 1432554639, 1432554639),
('/student/dependent/ustud-c-state', 2, '/student/dependent/ustud-c-state', NULL, NULL, 1432554639, 1432554639),
('/student/dependent/ustud-p-city', 2, '/student/dependent/ustud-p-city', NULL, NULL, 1432554639, 1432554639),
('/student/dependent/ustud-p-state', 2, '/student/dependent/ustud-p-state', NULL, NULL, 1432554639, 1432554639),
('/student/export-data/*', 2, '/student/export-data/*', NULL, NULL, 1432554639, 1432554639),
('/student/export-data/student-profile-pdf', 2, '/student/export-data/student-profile-pdf', NULL, NULL, 1432554639, 1432554639),
('/student/stu-address/*', 2, '/student/stu-address/*', NULL, NULL, 1432554640, 1432554640),
('/student/stu-address/create', 2, '/student/stu-address/create', NULL, NULL, 1432554639, 1432554639),
('/student/stu-address/delete', 2, '/student/stu-address/delete', NULL, NULL, 1432554640, 1432554640),
('/student/stu-address/index', 2, '/student/stu-address/index', NULL, NULL, 1432554639, 1432554639),
('/student/stu-address/update', 2, '/student/stu-address/update', NULL, NULL, 1432554640, 1432554640),
('/student/stu-address/view', 2, '/student/stu-address/view', NULL, NULL, 1432554639, 1432554639),
('/student/stu-category/*', 2, '/student/stu-category/*', NULL, NULL, 1432554640, 1432554640),
('/student/stu-category/create', 2, '/student/stu-category/create', NULL, NULL, 1432554640, 1432554640),
('/student/stu-category/delete', 2, '/student/stu-category/delete', NULL, NULL, 1432554640, 1432554640),
('/student/stu-category/index', 2, '/student/stu-category/index', NULL, NULL, 1432554640, 1432554640),
('/student/stu-category/update', 2, '/student/stu-category/update', NULL, NULL, 1432554640, 1432554640),
('/student/stu-category/view', 2, '/student/stu-category/view', NULL, NULL, 1432554640, 1432554640),
('/student/stu-docs/*', 2, '/student/stu-docs/*', NULL, NULL, 1432554640, 1432554640),
('/student/stu-docs/create', 2, '/student/stu-docs/create', NULL, NULL, 1432554640, 1432554640),
('/student/stu-docs/delete', 2, '/student/stu-docs/delete', NULL, NULL, 1432554640, 1432554640),
('/student/stu-docs/index', 2, '/student/stu-docs/index', NULL, NULL, 1432554640, 1432554640),
('/student/stu-docs/update', 2, '/student/stu-docs/update', NULL, NULL, 1432554640, 1432554640),
('/student/stu-docs/view', 2, '/student/stu-docs/view', NULL, NULL, 1432554640, 1432554640),
('/student/stu-guardians/*', 2, '/student/stu-guardians/*', NULL, NULL, 1432554641, 1432554641),
('/student/stu-guardians/create', 2, '/student/stu-guardians/create', NULL, NULL, 1432554640, 1432554640),
('/student/stu-guardians/delete', 2, '/student/stu-guardians/delete', NULL, NULL, 1432554640, 1432554640),
('/student/stu-guardians/index', 2, '/student/stu-guardians/index', NULL, NULL, 1432554640, 1432554640),
('/student/stu-guardians/update', 2, '/student/stu-guardians/update', NULL, NULL, 1432554640, 1432554640),
('/student/stu-guardians/view', 2, '/student/stu-guardians/view', NULL, NULL, 1432554640, 1432554640),
('/student/stu-info/*', 2, '/student/stu-info/*', NULL, NULL, 1432554641, 1432554641),
('/student/stu-info/create', 2, '/student/stu-info/create', NULL, NULL, 1432554641, 1432554641),
('/student/stu-info/delete', 2, '/student/stu-info/delete', NULL, NULL, 1432554641, 1432554641),
('/student/stu-info/index', 2, '/student/stu-info/index', NULL, NULL, 1432554641, 1432554641),
('/student/stu-info/update', 2, '/student/stu-info/update', NULL, NULL, 1432554641, 1432554641),
('/student/stu-info/view', 2, '/student/stu-info/view', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/*', 2, '/student/stu-master/*', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/adddocs', 2, '/student/stu-master/adddocs', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/addguardian', 2, '/student/stu-master/addguardian', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/change-status', 2, '/student/stu-master/change-status', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/create', 2, '/student/stu-master/create', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/delete', 2, '/student/stu-master/delete', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/delete-doc', 2, '/student/stu-master/delete-doc', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/docs-download', 2, '/student/stu-master/docs-download', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/emg-change-status', 2, '/student/stu-master/emg-change-status', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/index', 2, '/student/stu-master/index', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/stu-photo', 2, '/student/stu-master/stu-photo', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/update', 2, '/student/stu-master/update', NULL, NULL, 1432554641, 1432554641),
('/student/stu-master/view', 2, '/student/stu-master/view', NULL, NULL, 1432554641, 1432554641),
('/student/stu-status/*', 2, '/student/stu-status/*', NULL, NULL, 1432554642, 1432554642),
('/student/stu-status/create', 2, '/student/stu-status/create', NULL, NULL, 1432554642, 1432554642),
('/student/stu-status/delete', 2, '/student/stu-status/delete', NULL, NULL, 1432554642, 1432554642),
('/student/stu-status/index', 2, '/student/stu-status/index', NULL, NULL, 1432554641, 1432554641),
('/student/stu-status/update', 2, '/student/stu-status/update', NULL, NULL, 1432554642, 1432554642),
('/student/stu-status/view', 2, '/student/stu-status/view', NULL, NULL, 1432554642, 1432554642),
('/subject-master/*', 2, '/subject-master/*', NULL, NULL, 1432554656, 1432554656),
('/subject-master/create', 2, '/subject-master/create', NULL, NULL, 1432554656, 1432554656),
('/subject-master/delete', 2, '/subject-master/delete', NULL, NULL, 1432554656, 1432554656),
('/subject-master/index', 2, '/subject-master/index', NULL, NULL, 1432554656, 1432554656),
('/subject-master/update', 2, '/subject-master/update', NULL, NULL, 1432554656, 1432554656),
('/subject-master/view', 2, '/subject-master/view', NULL, NULL, 1432554656, 1432554656),
('/user/*', 2, '/user/*', NULL, NULL, 1432554657, 1432554657),
('/user/change', 2, '/user/change', NULL, NULL, 1432554656, 1432554656),
('/user/create', 2, '/user/create', NULL, NULL, 1432554656, 1432554656),
('/user/delete', 2, '/user/delete', NULL, NULL, 1432554656, 1432554656),
('/user/index', 2, '/user/index', NULL, NULL, 1432554656, 1432554656),
('/user/resetemploginid', 2, '/user/resetemploginid', NULL, NULL, 1432554657, 1432554657),
('/user/resetemppassword', 2, '/user/resetemppassword', NULL, NULL, 1432554657, 1432554657),
('/user/resetstudloginid', 2, '/user/resetstudloginid', NULL, NULL, 1432554657, 1432554657),
('/user/resetstudpassword', 2, '/user/resetstudpassword', NULL, NULL, 1432554657, 1432554657),
('/user/update', 2, '/user/update', NULL, NULL, 1432554656, 1432554656),
('/user/update-emp-password', 2, '/user/update-emp-password', NULL, NULL, 1432554657, 1432554657),
('/user/update-stud-password', 2, '/user/update-stud-password', NULL, NULL, 1432554657, 1432554657),
('/user/updateemploginid', 2, '/user/updateemploginid', NULL, NULL, 1432554657, 1432554657),
('/user/updatestudloginid', 2, '/user/updatestudloginid', NULL, NULL, 1432554657, 1432554657),
('/user/view', 2, '/user/view', NULL, NULL, 1432554656, 1432554656),
('Configuration', 2, 'Access Configuration views', NULL, NULL, 1429870570, 1430298672),
('Employee', 1, 'Employee', NULL, NULL, 1422967395, 1430299553),
('Rights', 2, 'Access Rights Module Link', NULL, NULL, 1430227237, 1431776281),
('Student', 1, 'Student', NULL, NULL, 1422958231, 1422958231),
('SuperAdmin', 1, 'SuperAdmin', NULL, NULL, 1422957183, 1422957183),
('updateAllEmpInfo', 2, 'Update Employee all details', NULL, NULL, 1430979242, 1430979242),
('updateAllStuInfo', 2, 'Update Student all details', NULL, NULL, 1430913145, 1430913145);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('SuperAdmin', '/*'),
('SuperAdmin', '/auth-assignment/*'),
('SuperAdmin', '/auth-assignment/create'),
('SuperAdmin', '/auth-assignment/delete'),
('SuperAdmin', '/auth-assignment/index'),
('SuperAdmin', '/auth-assignment/update'),
('SuperAdmin', '/auth-assignment/view'),
('SuperAdmin', '/city/*'),
('SuperAdmin', '/city/create'),
('SuperAdmin', '/city/delete'),
('SuperAdmin', '/city/index'),
('SuperAdmin', '/city/update'),
('SuperAdmin', '/city/view'),
('SuperAdmin', '/country/*'),
('SuperAdmin', '/country/create'),
('SuperAdmin', '/country/delete'),
('SuperAdmin', '/country/index'),
('SuperAdmin', '/country/update'),
('SuperAdmin', '/country/view'),
('SuperAdmin', '/course/*'),
('SuperAdmin', '/course/batches/*'),
('SuperAdmin', '/course/batches/create'),
('SuperAdmin', '/course/batches/delete'),
('SuperAdmin', '/course/batches/index'),
('SuperAdmin', '/course/batches/toggle'),
('SuperAdmin', '/course/batches/update'),
('SuperAdmin', '/course/batches/view'),
('SuperAdmin', '/course/courses/*'),
('SuperAdmin', '/course/courses/create'),
('SuperAdmin', '/course/courses/delete'),
('Employee', '/course/courses/index'),
('Student', '/course/courses/index'),
('SuperAdmin', '/course/courses/index'),
('SuperAdmin', '/course/courses/toggle'),
('SuperAdmin', '/course/courses/update'),
('SuperAdmin', '/course/courses/view'),
('SuperAdmin', '/course/default/*'),
('Employee', '/course/default/index'),
('Student', '/course/default/index'),
('SuperAdmin', '/course/default/index'),
('SuperAdmin', '/course/section/*'),
('SuperAdmin', '/course/section/create'),
('SuperAdmin', '/course/section/delete'),
('SuperAdmin', '/course/section/index'),
('SuperAdmin', '/course/section/toggle'),
('SuperAdmin', '/course/section/update'),
('SuperAdmin', '/course/section/view'),
('SuperAdmin', '/dashboard/*'),
('SuperAdmin', '/dashboard/default/*'),
('SuperAdmin', '/dashboard/default/index'),
('SuperAdmin', '/dashboard/events/*'),
('SuperAdmin', '/dashboard/events/add-event'),
('SuperAdmin', '/dashboard/events/event-delete'),
('SuperAdmin', '/dashboard/events/index'),
('SuperAdmin', '/dashboard/events/update-event'),
('SuperAdmin', '/dashboard/events/view'),
('Employee', '/dashboard/events/view-events'),
('Student', '/dashboard/events/view-events'),
('SuperAdmin', '/dashboard/events/view-events'),
('SuperAdmin', '/dashboard/msg-of-day/*'),
('SuperAdmin', '/dashboard/msg-of-day/create'),
('SuperAdmin', '/dashboard/msg-of-day/delete'),
('SuperAdmin', '/dashboard/msg-of-day/index'),
('SuperAdmin', '/dashboard/msg-of-day/toggle'),
('SuperAdmin', '/dashboard/msg-of-day/update'),
('SuperAdmin', '/dashboard/msg-of-day/view'),
('SuperAdmin', '/dashboard/notice/*'),
('SuperAdmin', '/dashboard/notice/create'),
('SuperAdmin', '/dashboard/notice/delete'),
('SuperAdmin', '/dashboard/notice/index'),
('SuperAdmin', '/dashboard/notice/notice-file'),
('SuperAdmin', '/dashboard/notice/toggle'),
('SuperAdmin', '/dashboard/notice/update'),
('SuperAdmin', '/dashboard/notice/view'),
('Employee', '/dashboard/notice/view-popup'),
('Student', '/dashboard/notice/view-popup'),
('SuperAdmin', '/dashboard/notice/view-popup'),
('SuperAdmin', '/debug/*'),
('SuperAdmin', '/debug/default/*'),
('SuperAdmin', '/debug/default/download-mail'),
('SuperAdmin', '/debug/default/index'),
('SuperAdmin', '/debug/default/toolbar'),
('SuperAdmin', '/debug/default/view'),
('SuperAdmin', '/default/*'),
('SuperAdmin', '/default/index'),
('Employee', '/dependent/*'),
('SuperAdmin', '/dependent/*'),
('SuperAdmin', '/dependent/getcity'),
('SuperAdmin', '/dependent/getorgcity'),
('SuperAdmin', '/dependent/getorgstate'),
('SuperAdmin', '/dependent/getstate'),
('SuperAdmin', '/dependent/index'),
('SuperAdmin', '/dependent/studbatch'),
('SuperAdmin', '/dependent/studsection'),
('SuperAdmin', '/document-category/*'),
('SuperAdmin', '/document-category/create'),
('SuperAdmin', '/document-category/delete'),
('SuperAdmin', '/document-category/index'),
('SuperAdmin', '/document-category/update'),
('SuperAdmin', '/document-category/view'),
('SuperAdmin', '/employee/*'),
('SuperAdmin', '/employee/default/*'),
('Employee', '/employee/default/index'),
('Student', '/employee/default/index'),
('SuperAdmin', '/employee/default/index'),
('Employee', '/employee/dependent/*'),
('SuperAdmin', '/employee/dependent/*'),
('SuperAdmin', '/employee/dependent/emp-c-city'),
('SuperAdmin', '/employee/dependent/emp-c-state'),
('SuperAdmin', '/employee/dependent/emp-p-city'),
('SuperAdmin', '/employee/dependent/emp-p-state'),
('SuperAdmin', '/employee/emp-address/*'),
('SuperAdmin', '/employee/emp-address/create'),
('SuperAdmin', '/employee/emp-address/delete'),
('SuperAdmin', '/employee/emp-address/index'),
('SuperAdmin', '/employee/emp-address/update'),
('SuperAdmin', '/employee/emp-address/view'),
('SuperAdmin', '/employee/emp-category/*'),
('SuperAdmin', '/employee/emp-category/create'),
('SuperAdmin', '/employee/emp-category/delete'),
('SuperAdmin', '/employee/emp-category/index'),
('SuperAdmin', '/employee/emp-category/update'),
('SuperAdmin', '/employee/emp-category/view'),
('SuperAdmin', '/employee/emp-department/*'),
('SuperAdmin', '/employee/emp-department/create'),
('SuperAdmin', '/employee/emp-department/delete'),
('SuperAdmin', '/employee/emp-department/index'),
('SuperAdmin', '/employee/emp-department/update'),
('SuperAdmin', '/employee/emp-department/view'),
('SuperAdmin', '/employee/emp-designation/*'),
('SuperAdmin', '/employee/emp-designation/create'),
('SuperAdmin', '/employee/emp-designation/delete'),
('SuperAdmin', '/employee/emp-designation/index'),
('SuperAdmin', '/employee/emp-designation/update'),
('SuperAdmin', '/employee/emp-designation/view'),
('SuperAdmin', '/employee/emp-docs/*'),
('SuperAdmin', '/employee/emp-docs/create'),
('SuperAdmin', '/employee/emp-docs/delete'),
('SuperAdmin', '/employee/emp-docs/index'),
('SuperAdmin', '/employee/emp-docs/update'),
('SuperAdmin', '/employee/emp-docs/view'),
('SuperAdmin', '/employee/emp-info/*'),
('SuperAdmin', '/employee/emp-info/create'),
('SuperAdmin', '/employee/emp-info/delete'),
('SuperAdmin', '/employee/emp-info/index'),
('SuperAdmin', '/employee/emp-info/update'),
('SuperAdmin', '/employee/emp-info/view'),
('SuperAdmin', '/employee/emp-master/*'),
('SuperAdmin', '/employee/emp-master/adddocs'),
('SuperAdmin', '/employee/emp-master/change-status'),
('SuperAdmin', '/employee/emp-master/create'),
('SuperAdmin', '/employee/emp-master/delete'),
('SuperAdmin', '/employee/emp-master/delete-doc'),
('SuperAdmin', '/employee/emp-master/docs-download'),
('Employee', '/employee/emp-master/emp-photo'),
('SuperAdmin', '/employee/emp-master/emp-photo'),
('Employee', '/employee/emp-master/index'),
('Student', '/employee/emp-master/index'),
('SuperAdmin', '/employee/emp-master/index'),
('Employee', '/employee/emp-master/update'),
('SuperAdmin', '/employee/emp-master/update'),
('Employee', '/employee/emp-master/view'),
('SuperAdmin', '/employee/emp-master/view'),
('SuperAdmin', '/employee/emp-status/*'),
('SuperAdmin', '/employee/emp-status/create'),
('SuperAdmin', '/employee/emp-status/delete'),
('SuperAdmin', '/employee/emp-status/index'),
('SuperAdmin', '/employee/emp-status/update'),
('SuperAdmin', '/employee/emp-status/view'),
('SuperAdmin', '/employee/export-data/*'),
('Employee', '/employee/export-data/employee-profile-pdf'),
('SuperAdmin', '/employee/export-data/employee-profile-pdf'),
('SuperAdmin', '/export-data/*'),
('SuperAdmin', '/export-data/export-excel'),
('SuperAdmin', '/export-data/export-to-pdf'),
('SuperAdmin', '/fees/*'),
('SuperAdmin', '/fees/bank-master/*'),
('SuperAdmin', '/fees/bank-master/create'),
('SuperAdmin', '/fees/bank-master/delete'),
('SuperAdmin', '/fees/bank-master/index'),
('SuperAdmin', '/fees/bank-master/update'),
('SuperAdmin', '/fees/bank-master/view'),
('SuperAdmin', '/fees/default/*'),
('Student', '/fees/default/index'),
('SuperAdmin', '/fees/default/index'),
('SuperAdmin', '/fees/dependent/*'),
('SuperAdmin', '/fees/dependent/get-fees-category'),
('SuperAdmin', '/fees/fees-category-details/*'),
('SuperAdmin', '/fees/fees-category-details/create'),
('SuperAdmin', '/fees/fees-category-details/delete'),
('SuperAdmin', '/fees/fees-category-details/index'),
('SuperAdmin', '/fees/fees-category-details/update'),
('SuperAdmin', '/fees/fees-category-details/view'),
('SuperAdmin', '/fees/fees-collect-category/*'),
('SuperAdmin', '/fees/fees-collect-category/create'),
('SuperAdmin', '/fees/fees-collect-category/delete'),
('SuperAdmin', '/fees/fees-collect-category/index'),
('SuperAdmin', '/fees/fees-collect-category/toggle'),
('SuperAdmin', '/fees/fees-collect-category/update'),
('SuperAdmin', '/fees/fees-collect-category/view'),
('SuperAdmin', '/fees/fees-payment-transaction/*'),
('SuperAdmin', '/fees/fees-payment-transaction/collect'),
('SuperAdmin', '/fees/fees-payment-transaction/delete'),
('SuperAdmin', '/fees/fees-payment-transaction/export-fcc-wise-fees-pdf'),
('SuperAdmin', '/fees/fees-payment-transaction/pay-fees'),
('SuperAdmin', '/fees/fees-payment-transaction/print-common-receipt'),
('Student', '/fees/fees-payment-transaction/stu-fees-data'),
('SuperAdmin', '/fees/fees-payment-transaction/stu-fees-data'),
('SuperAdmin', '/fees/fees-payment-transaction/update'),
('SuperAdmin', '/fees/fees-payment-transaction/view'),
('SuperAdmin', '/gii/*'),
('SuperAdmin', '/gii/default/*'),
('SuperAdmin', '/gii/default/action'),
('SuperAdmin', '/gii/default/diff'),
('SuperAdmin', '/gii/default/index'),
('SuperAdmin', '/gii/default/preview'),
('SuperAdmin', '/gii/default/view'),
('SuperAdmin', '/languages/*'),
('SuperAdmin', '/languages/create'),
('SuperAdmin', '/languages/delete'),
('SuperAdmin', '/languages/index'),
('SuperAdmin', '/languages/update'),
('SuperAdmin', '/languages/view'),
('SuperAdmin', '/login-details/*'),
('SuperAdmin', '/login-details/create'),
('SuperAdmin', '/login-details/delete'),
('SuperAdmin', '/login-details/index'),
('SuperAdmin', '/login-details/update'),
('SuperAdmin', '/login-details/view'),
('SuperAdmin', '/national-holidays/*'),
('SuperAdmin', '/national-holidays/create'),
('SuperAdmin', '/national-holidays/delete'),
('SuperAdmin', '/national-holidays/index'),
('SuperAdmin', '/national-holidays/update'),
('SuperAdmin', '/national-holidays/view'),
('SuperAdmin', '/nationality/*'),
('SuperAdmin', '/nationality/create'),
('SuperAdmin', '/nationality/delete'),
('SuperAdmin', '/nationality/index'),
('SuperAdmin', '/nationality/update'),
('SuperAdmin', '/nationality/view'),
('SuperAdmin', '/organization/*'),
('SuperAdmin', '/organization/create'),
('SuperAdmin', '/organization/delete'),
('SuperAdmin', '/organization/index'),
('SuperAdmin', '/organization/update'),
('SuperAdmin', '/organization/view'),
('SuperAdmin', '/report/*'),
('SuperAdmin', '/report/default/*'),
('Employee', '/report/default/index'),
('SuperAdmin', '/report/default/index'),
('Employee', '/report/dependent/*'),
('SuperAdmin', '/report/dependent/*'),
('SuperAdmin', '/report/dependent/index'),
('SuperAdmin', '/report/dependent/studbatch'),
('SuperAdmin', '/report/dependent/studsection'),
('Employee', '/report/empinforeport'),
('SuperAdmin', '/report/empinforeport'),
('SuperAdmin', '/report/employee/*'),
('Employee', '/report/employee/empinforeport'),
('SuperAdmin', '/report/employee/empinforeport'),
('SuperAdmin', '/report/employee/index'),
('Employee', '/report/employee/selected-employee-list'),
('SuperAdmin', '/report/employee/selected-employee-list'),
('SuperAdmin', '/report/index'),
('Employee', '/report/selected-employee-list'),
('SuperAdmin', '/report/selected-employee-list'),
('Employee', '/report/selected-student-list'),
('SuperAdmin', '/report/selected-student-list'),
('SuperAdmin', '/report/student/*'),
('SuperAdmin', '/report/student/index'),
('Employee', '/report/student/selected-student-list'),
('SuperAdmin', '/report/student/selected-student-list'),
('Employee', '/report/student/stuinforeport'),
('SuperAdmin', '/report/student/stuinforeport'),
('Employee', '/report/stuinforeport'),
('SuperAdmin', '/report/stuinforeport'),
('SuperAdmin', '/rights/*'),
('SuperAdmin', '/rights/assignment/*'),
('SuperAdmin', '/rights/assignment/assign'),
('SuperAdmin', '/rights/assignment/index'),
('SuperAdmin', '/rights/assignment/role-search'),
('SuperAdmin', '/rights/assignment/view'),
('SuperAdmin', '/rights/default/*'),
('SuperAdmin', '/rights/default/index'),
('SuperAdmin', '/rights/menu/*'),
('SuperAdmin', '/rights/menu/create'),
('SuperAdmin', '/rights/menu/delete'),
('SuperAdmin', '/rights/menu/index'),
('SuperAdmin', '/rights/menu/update'),
('SuperAdmin', '/rights/menu/view'),
('SuperAdmin', '/rights/permission/*'),
('SuperAdmin', '/rights/permission/assign'),
('SuperAdmin', '/rights/permission/create'),
('SuperAdmin', '/rights/permission/delete'),
('SuperAdmin', '/rights/permission/index'),
('SuperAdmin', '/rights/permission/role-search'),
('SuperAdmin', '/rights/permission/update'),
('SuperAdmin', '/rights/permission/view'),
('SuperAdmin', '/rights/role/*'),
('SuperAdmin', '/rights/role/assign'),
('SuperAdmin', '/rights/role/create'),
('SuperAdmin', '/rights/role/delete'),
('SuperAdmin', '/rights/role/index'),
('SuperAdmin', '/rights/role/role-search'),
('SuperAdmin', '/rights/role/update'),
('SuperAdmin', '/rights/role/view'),
('SuperAdmin', '/rights/route/*'),
('SuperAdmin', '/rights/route/assign'),
('SuperAdmin', '/rights/route/create'),
('SuperAdmin', '/rights/route/index'),
('SuperAdmin', '/rights/route/route-search'),
('SuperAdmin', '/rights/rule/*'),
('SuperAdmin', '/rights/rule/create'),
('SuperAdmin', '/rights/rule/delete'),
('SuperAdmin', '/rights/rule/index'),
('SuperAdmin', '/rights/rule/update'),
('SuperAdmin', '/rights/rule/view'),
('SuperAdmin', '/site/*'),
('SuperAdmin', '/site/about'),
('SuperAdmin', '/site/captcha'),
('SuperAdmin', '/site/contact'),
('SuperAdmin', '/site/error'),
('SuperAdmin', '/site/forgotpassword'),
('SuperAdmin', '/site/index'),
('SuperAdmin', '/site/loadimage'),
('SuperAdmin', '/site/login'),
('SuperAdmin', '/site/logout'),
('SuperAdmin', '/state/*'),
('SuperAdmin', '/state/create'),
('SuperAdmin', '/state/delete'),
('SuperAdmin', '/state/index'),
('SuperAdmin', '/state/update'),
('SuperAdmin', '/state/view'),
('SuperAdmin', '/student/*'),
('SuperAdmin', '/student/default/*'),
('Employee', '/student/default/index'),
('SuperAdmin', '/student/default/index'),
('SuperAdmin', '/student/dependent/*'),
('SuperAdmin', '/student/dependent/studbatch'),
('SuperAdmin', '/student/dependent/studsection'),
('SuperAdmin', '/student/dependent/ustud-c-city'),
('SuperAdmin', '/student/dependent/ustud-c-state'),
('SuperAdmin', '/student/dependent/ustud-p-city'),
('SuperAdmin', '/student/dependent/ustud-p-state'),
('SuperAdmin', '/student/export-data/*'),
('SuperAdmin', '/student/export-data/student-profile-pdf'),
('SuperAdmin', '/student/stu-address/*'),
('SuperAdmin', '/student/stu-address/create'),
('SuperAdmin', '/student/stu-address/delete'),
('SuperAdmin', '/student/stu-address/index'),
('SuperAdmin', '/student/stu-address/update'),
('SuperAdmin', '/student/stu-address/view'),
('SuperAdmin', '/student/stu-category/*'),
('SuperAdmin', '/student/stu-category/create'),
('SuperAdmin', '/student/stu-category/delete'),
('SuperAdmin', '/student/stu-category/index'),
('SuperAdmin', '/student/stu-category/update'),
('SuperAdmin', '/student/stu-category/view'),
('SuperAdmin', '/student/stu-docs/*'),
('SuperAdmin', '/student/stu-docs/create'),
('SuperAdmin', '/student/stu-docs/delete'),
('SuperAdmin', '/student/stu-docs/index'),
('SuperAdmin', '/student/stu-docs/update'),
('SuperAdmin', '/student/stu-docs/view'),
('SuperAdmin', '/student/stu-guardians/*'),
('SuperAdmin', '/student/stu-guardians/create'),
('SuperAdmin', '/student/stu-guardians/delete'),
('SuperAdmin', '/student/stu-guardians/index'),
('SuperAdmin', '/student/stu-guardians/update'),
('SuperAdmin', '/student/stu-guardians/view'),
('SuperAdmin', '/student/stu-info/*'),
('SuperAdmin', '/student/stu-info/create'),
('SuperAdmin', '/student/stu-info/delete'),
('SuperAdmin', '/student/stu-info/index'),
('SuperAdmin', '/student/stu-info/update'),
('SuperAdmin', '/student/stu-info/view'),
('SuperAdmin', '/student/stu-master/*'),
('SuperAdmin', '/student/stu-master/adddocs'),
('SuperAdmin', '/student/stu-master/addguardian'),
('SuperAdmin', '/student/stu-master/change-status'),
('SuperAdmin', '/student/stu-master/create'),
('SuperAdmin', '/student/stu-master/delete'),
('SuperAdmin', '/student/stu-master/delete-doc'),
('SuperAdmin', '/student/stu-master/docs-download'),
('SuperAdmin', '/student/stu-master/emg-change-status'),
('Employee', '/student/stu-master/index'),
('SuperAdmin', '/student/stu-master/index'),
('SuperAdmin', '/student/stu-master/stu-photo'),
('SuperAdmin', '/student/stu-master/update'),
('Employee', '/student/stu-master/view'),
('Student', '/student/stu-master/view'),
('SuperAdmin', '/student/stu-master/view'),
('SuperAdmin', '/student/stu-status/*'),
('SuperAdmin', '/student/stu-status/create'),
('SuperAdmin', '/student/stu-status/delete'),
('SuperAdmin', '/student/stu-status/index'),
('SuperAdmin', '/student/stu-status/update'),
('SuperAdmin', '/student/stu-status/view'),
('SuperAdmin', '/subject-master/*'),
('SuperAdmin', '/subject-master/create'),
('SuperAdmin', '/subject-master/delete'),
('SuperAdmin', '/subject-master/index'),
('SuperAdmin', '/subject-master/update'),
('SuperAdmin', '/subject-master/view'),
('SuperAdmin', '/user/*'),
('Employee', '/user/change'),
('Student', '/user/change'),
('SuperAdmin', '/user/change'),
('SuperAdmin', '/user/create'),
('SuperAdmin', '/user/delete'),
('SuperAdmin', '/user/index'),
('SuperAdmin', '/user/resetemploginid'),
('SuperAdmin', '/user/resetemppassword'),
('SuperAdmin', '/user/resetstudloginid'),
('SuperAdmin', '/user/resetstudpassword'),
('SuperAdmin', '/user/update'),
('SuperAdmin', '/user/update-emp-password'),
('SuperAdmin', '/user/update-stud-password'),
('SuperAdmin', '/user/updateemploginid'),
('SuperAdmin', '/user/updatestudloginid'),
('SuperAdmin', '/user/view'),
('SuperAdmin', 'Configuration'),
('SuperAdmin', 'Rights'),
('SuperAdmin', 'updateAllEmpInfo'),
('SuperAdmin', 'updateAllStuInfo');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank_master`
--

CREATE TABLE IF NOT EXISTS `bank_master` (
  `bank_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_master_name` varchar(255) NOT NULL,
  `bank_alias` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bank_master_id`),
  UNIQUE KEY `bank_master_name` (`bank_master_name`),
  UNIQUE KEY `bank_alias` (`bank_alias`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(120) NOT NULL,
  `batch_course_id` int(11) NOT NULL,
  `batch_alias` varchar(35) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`batch_id`),
  UNIQUE KEY `batch_name` (`batch_name`,`batch_course_id`),
  UNIQUE KEY `batch_alias` (`batch_alias`),
  KEY `batch_course_id` (`batch_course_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(35) NOT NULL,
  `city_state_id` int(11) NOT NULL,
  `city_country_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`city_id`),
  UNIQUE KEY `city_name` (`city_name`,`city_state_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `city_state_id` (`city_state_id`),
  KEY `city_country_id` (`city_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(35) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`country_id`),
  UNIQUE KEY `country_name` (`country_name`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_alias` varchar(35) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_name` (`course_name`,`course_code`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document_category`
--

CREATE TABLE IF NOT EXISTS `document_category` (
  `doc_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_category_name` varchar(50) NOT NULL,
  `doc_category_user_type` char(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`doc_category_id`),
  UNIQUE KEY `doc_category_name` (`doc_category_name`,`doc_category_user_type`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_address`
--

CREATE TABLE IF NOT EXISTS `emp_address` (
  `emp_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_cadd` varchar(255) DEFAULT NULL,
  `emp_cadd_city` int(11) DEFAULT NULL,
  `emp_cadd_state` int(11) DEFAULT NULL,
  `emp_cadd_country` int(11) DEFAULT NULL,
  `emp_cadd_pincode` int(11) DEFAULT NULL,
  `emp_cadd_house_no` varchar(25) DEFAULT NULL,
  `emp_cadd_phone_no` varchar(25) DEFAULT NULL,
  `emp_padd` varchar(255) DEFAULT NULL,
  `emp_padd_city` int(11) DEFAULT NULL,
  `emp_padd_state` int(11) DEFAULT NULL,
  `emp_padd_country` int(11) DEFAULT NULL,
  `emp_padd_pincode` int(11) DEFAULT NULL,
  `emp_padd_house_no` varchar(25) DEFAULT NULL,
  `emp_padd_phone_no` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`emp_address_id`),
  KEY `emp_cadd_city` (`emp_cadd_city`),
  KEY `emp_cadd_state` (`emp_cadd_state`),
  KEY `emp_cadd_country` (`emp_cadd_country`),
  KEY `emp_padd_city` (`emp_padd_city`),
  KEY `emp_padd_state` (`emp_padd_state`),
  KEY `emp_padd_country` (`emp_padd_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_category`
--

CREATE TABLE IF NOT EXISTS `emp_category` (
  `emp_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_category_name` varchar(50) NOT NULL,
  `emp_category_alias` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_category_id`),
  UNIQUE KEY `emp_category_name` (`emp_category_name`),
  UNIQUE KEY `emp_category_alias` (`emp_category_alias`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_department`
--

CREATE TABLE IF NOT EXISTS `emp_department` (
  `emp_department_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_department_name` varchar(65) NOT NULL,
  `emp_department_alias` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_department_id`),
  UNIQUE KEY `emp_department_name` (`emp_department_name`),
  UNIQUE KEY `emp_department_alias` (`emp_department_alias`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_designation`
--

CREATE TABLE IF NOT EXISTS `emp_designation` (
  `emp_designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_designation_name` varchar(50) NOT NULL,
  `emp_designation_alias` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_designation_id`),
  UNIQUE KEY `emp_designation_name` (`emp_designation_name`),
  UNIQUE KEY `emp_designation_alias` (`emp_designation_alias`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_docs`
--

CREATE TABLE IF NOT EXISTS `emp_docs` (
  `emp_docs_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_docs_details` varchar(100) DEFAULT NULL,
  `emp_docs_category_id` int(11) NOT NULL,
  `emp_docs_path` varchar(150) NOT NULL,
  `emp_docs_submited_at` datetime NOT NULL,
  `emp_docs_status` tinyint(1) NOT NULL DEFAULT '0',
  `emp_docs_emp_master_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`emp_docs_id`),
  KEY `created_by` (`created_by`),
  KEY `emp_docs_emp_master_id` (`emp_docs_emp_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_info`
--

CREATE TABLE IF NOT EXISTS `emp_info` (
  `emp_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_unique_id` int(11) NOT NULL,
  `emp_attendance_card_id` varchar(50) DEFAULT NULL,
  `emp_title` varchar(5) DEFAULT NULL,
  `emp_first_name` varchar(35) NOT NULL,
  `emp_middle_name` varchar(35) DEFAULT NULL,
  `emp_last_name` varchar(35) NOT NULL,
  `emp_name_alias` varchar(10) DEFAULT NULL,
  `emp_mother_name` varchar(50) DEFAULT NULL,
  `emp_gender` varchar(10) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_religion` varchar(50) DEFAULT NULL,
  `emp_bloodgroup` varchar(10) NOT NULL DEFAULT 'Unknown',
  `emp_joining_date` date DEFAULT NULL,
  `emp_birthplace` varchar(50) DEFAULT NULL,
  `emp_email_id` varchar(65) DEFAULT NULL,
  `emp_maritalstatus` varchar(35) DEFAULT NULL,
  `emp_mobile_no` bigint(12) DEFAULT NULL,
  `emp_photo` varchar(150) DEFAULT NULL,
  `emp_languages` varchar(255) DEFAULT NULL,
  `emp_bankaccount_no` varchar(25) DEFAULT NULL,
  `emp_qualification` varchar(50) DEFAULT NULL,
  `emp_specialization` varchar(255) DEFAULT NULL,
  `emp_experience_year` tinyint(2) DEFAULT NULL,
  `emp_experience_month` tinyint(2) DEFAULT NULL,
  `emp_hobbies` varchar(100) DEFAULT NULL,
  `emp_reference` varchar(35) DEFAULT NULL,
  `emp_guardian_name` varchar(65) DEFAULT NULL,
  `emp_guardian_relation` varchar(30) DEFAULT NULL,
  `emp_guardian_qualification` varchar(50) DEFAULT NULL,
  `emp_guardian_occupation` varchar(50) DEFAULT NULL,
  `emp_guardian_income` varchar(50) DEFAULT NULL,
  `emp_guardian_homeadd` varchar(255) DEFAULT NULL,
  `emp_guardian_officeadd` varchar(255) DEFAULT NULL,
  `emp_guardian_mobile_no` bigint(12) DEFAULT NULL,
  `emp_guardian_phone_no` varchar(25) DEFAULT NULL,
  `emp_guardian_email_id` varchar(65) DEFAULT NULL,
  `emp_info_emp_master_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_info_id`),
  UNIQUE KEY `emp_unique_id` (`emp_unique_id`),
  UNIQUE KEY `emp_info_emp_master_id` (`emp_info_emp_master_id`),
  UNIQUE KEY `emp_email_id` (`emp_email_id`),
  UNIQUE KEY `emp_mobile_no` (`emp_mobile_no`),
  UNIQUE KEY `emp_attendance_card_id` (`emp_attendance_card_id`),
  KEY `emp_info_emp_master_id_fgn` (`emp_info_emp_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_master`
--

CREATE TABLE IF NOT EXISTS `emp_master` (
  `emp_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_master_emp_info_id` int(11) NOT NULL,
  `emp_master_user_id` int(11) NOT NULL,
  `emp_master_department_id` int(11) NOT NULL,
  `emp_master_designation_id` int(11) DEFAULT NULL,
  `emp_master_category_id` int(11) NOT NULL,
  `emp_master_nationality_id` int(11) DEFAULT NULL,
  `emp_master_emp_address_id` int(11) NOT NULL,
  `emp_master_status_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_master_id`),
  UNIQUE KEY `emp_master_user_id` (`emp_master_user_id`),
  UNIQUE KEY `emp_master_emp_info_id` (`emp_master_emp_info_id`),
  KEY `emp_master_department_id` (`emp_master_department_id`),
  KEY `emp_master_designation_id` (`emp_master_designation_id`),
  KEY `emp_master_category_id` (`emp_master_category_id`),
  KEY `emp_master_nationality_id` (`emp_master_nationality_id`),
  KEY `emp_master_emp_address_id` (`emp_master_emp_address_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `emp_master_emp_info_id_frg` (`emp_master_emp_info_id`),
  KEY `emp_master_user_id_frg` (`emp_master_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_status`
--

CREATE TABLE IF NOT EXISTS `emp_status` (
  `emp_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_status_name` varchar(50) NOT NULL,
  `emp_status_description` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_status_id`),
  UNIQUE KEY `emp_status_name` (`emp_status_name`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(80) NOT NULL,
  `event_detail` varchar(255) NOT NULL,
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_url` varchar(255) DEFAULT NULL,
  `event_all_day` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fees_category_details`
--

CREATE TABLE IF NOT EXISTS `fees_category_details` (
  `fees_category_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `fees_details_name` varchar(70) NOT NULL,
  `fees_details_category_id` int(11) NOT NULL,
  `fees_details_description` varchar(255) DEFAULT NULL,
  `fees_details_amount` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fees_category_details_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `fees_details_category_id` (`fees_details_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fees_collect_category`
--

CREATE TABLE IF NOT EXISTS `fees_collect_category` (
  `fees_collect_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `fees_collect_name` varchar(70) NOT NULL,
  `fees_collect_batch_id` int(11) NOT NULL,
  `fees_collect_details` varchar(255) DEFAULT NULL,
  `fees_collect_start_date` date NOT NULL,
  `fees_collect_end_date` date NOT NULL,
  `fees_collect_due_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fees_collect_category_id`),
  UNIQUE KEY `fees_collect_name` (`fees_collect_name`,`fees_collect_batch_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `fees_collect_batch_id` (`fees_collect_batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fees_payment_transaction`
--

CREATE TABLE IF NOT EXISTS `fees_payment_transaction` (
  `fees_pay_tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `fees_pay_tran_collect_id` int(11) NOT NULL,
  `fees_pay_tran_stu_id` int(11) NOT NULL,
  `fees_pay_tran_batch_id` int(11) NOT NULL,
  `fees_pay_tran_course_id` int(11) NOT NULL,
  `fees_pay_tran_section_id` int(11) NOT NULL,
  `fees_pay_tran_mode` tinyint(1) NOT NULL,
  `fees_pay_tran_cheque_no` int(11) DEFAULT NULL,
  `fees_pay_tran_cheque_date` date DEFAULT NULL,
  `fees_pay_tran_bank_id` int(11) DEFAULT NULL,
  `fees_pay_tran_bank_branch` varchar(50) DEFAULT NULL,
  `fees_pay_tran_amount` decimal(10,0) NOT NULL,
  `fees_pay_tran_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fees_pay_tran_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `fees_pay_tran_bank_id` (`fees_pay_tran_bank_id`),
  KEY `fees_pay_tran_collect_id` (`fees_pay_tran_collect_id`),
  KEY `fees_pay_tran_stu_id` (`fees_pay_tran_stu_id`),
  KEY `fees_pay_tran_batch_id` (`fees_pay_tran_batch_id`),
  KEY `fees_pay_tran_course_id` (`fees_pay_tran_course_id`),
  KEY `fees_pay_tran_section_id` (`fees_pay_tran_section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`language_id`),
  UNIQUE KEY `language_name` (`language_name`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE IF NOT EXISTS `login_details` (
  `login_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_user_id` int(11) NOT NULL,
  `login_status` tinyint(1) NOT NULL DEFAULT '0',
  `login_at` datetime NOT NULL,
  `logout_at` datetime DEFAULT NULL,
  `user_ip_address` varchar(16) NOT NULL,
  PRIMARY KEY (`login_detail_id`),
  KEY `login_user_id` (`login_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `msg_of_day`
--

CREATE TABLE IF NOT EXISTS `msg_of_day` (
  `msg_of_day_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_details` varchar(100) NOT NULL,
  `msg_user_type` char(3) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_of_day_id`),
  UNIQUE KEY `msg_details` (`msg_details`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `nationality_id` int(11) NOT NULL AUTO_INCREMENT,
  `nationality_name` varchar(35) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nationality_id`),
  UNIQUE KEY `nationality_name` (`nationality_name`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `national_holidays`
--

CREATE TABLE IF NOT EXISTS `national_holidays` (
  `national_holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `national_holiday_name` varchar(50) NOT NULL,
  `national_holiday_date` date NOT NULL,
  `national_holiday_remarks` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`national_holiday_id`),
  UNIQUE KEY `national_holiday_name` (`national_holiday_name`,`national_holiday_date`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(25) NOT NULL,
  `notice_description` varchar(255) DEFAULT NULL,
  `notice_user_type` char(3) NOT NULL,
  `notice_date` date DEFAULT NULL,
  `notice_file_path` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notice_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(255) NOT NULL,
  `org_alias` varchar(25) NOT NULL,
  `org_address_line1` varchar(255) NOT NULL,
  `org_address_line2` varchar(255) DEFAULT NULL,
  `org_phone` varchar(25) DEFAULT NULL,
  `org_email` varchar(65) DEFAULT NULL,
  `org_website` varchar(120) DEFAULT NULL,
  `org_logo` longblob NOT NULL,
  `org_logo_type` varchar(35) NOT NULL,
  `org_stu_prefix` varchar(10) NOT NULL,
  `org_emp_prefix` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`org_id`),
  UNIQUE KEY `org_name` (`org_name`),
  UNIQUE KEY `org_alias` (`org_alias`),
  UNIQUE KEY `org_id` (`org_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(50) NOT NULL,
  `section_batch_id` int(11) NOT NULL,
  `intake` int(5) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`section_id`),
  UNIQUE KEY `section_name` (`section_name`,`section_batch_id`),
  KEY `section_batch_id` (`section_batch_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(35) NOT NULL,
  `state_country_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`state_id`),
  UNIQUE KEY `state_name` (`state_name`,`state_country_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `state_country_id` (`state_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stu_address`
--

CREATE TABLE IF NOT EXISTS `stu_address` (
  `stu_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_cadd` varchar(255) DEFAULT NULL,
  `stu_cadd_city` int(11) DEFAULT NULL,
  `stu_cadd_state` int(11) DEFAULT NULL,
  `stu_cadd_country` int(11) DEFAULT NULL,
  `stu_cadd_pincode` int(6) DEFAULT NULL,
  `stu_cadd_house_no` varchar(25) DEFAULT NULL,
  `stu_cadd_phone_no` varchar(25) DEFAULT NULL,
  `stu_padd` varchar(255) DEFAULT NULL,
  `stu_padd_city` int(11) DEFAULT NULL,
  `stu_padd_state` int(11) DEFAULT NULL,
  `stu_padd_country` int(11) DEFAULT NULL,
  `stu_padd_pincode` int(6) DEFAULT NULL,
  `stu_padd_house_no` varchar(25) DEFAULT NULL,
  `stu_padd_phone_no` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`stu_address_id`),
  KEY `stu_cadd_city` (`stu_cadd_city`),
  KEY `stu_cadd_state` (`stu_cadd_state`),
  KEY `stu_cadd_country` (`stu_cadd_country`),
  KEY `stu_padd_city` (`stu_padd_city`),
  KEY `stu_padd_state` (`stu_padd_state`),
  KEY `stu_padd_country` (`stu_padd_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stu_category`
--

CREATE TABLE IF NOT EXISTS `stu_category` (
  `stu_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_category_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stu_category_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stu_docs`
--

CREATE TABLE IF NOT EXISTS `stu_docs` (
  `stu_docs_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_docs_details` varchar(100) DEFAULT NULL,
  `stu_docs_category_id` int(11) NOT NULL,
  `stu_docs_path` varchar(150) NOT NULL,
  `stu_docs_submited_at` datetime NOT NULL,
  `stu_docs_status` tinyint(1) NOT NULL DEFAULT '0',
  `stu_docs_stu_master_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`stu_docs_id`),
  KEY `created_by` (`created_by`),
  KEY `stu_docs_stu_master_id` (`stu_docs_stu_master_id`),
  KEY `stu_docs_category_id` (`stu_docs_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stu_guardians`
--

CREATE TABLE IF NOT EXISTS `stu_guardians` (
  `stu_guardian_id` int(11) NOT NULL AUTO_INCREMENT,
  `guardian_name` varchar(65) DEFAULT NULL,
  `guardian_relation` varchar(30) DEFAULT NULL,
  `guardian_mobile_no` bigint(12) DEFAULT NULL,
  `guardian_phone_no` varchar(25) DEFAULT NULL,
  `guardian_qualification` varchar(50) DEFAULT NULL,
  `guardian_occupation` varchar(50) DEFAULT NULL,
  `guardian_income` varchar(50) DEFAULT NULL,
  `guardian_email` varchar(65) DEFAULT NULL,
  `guardian_home_address` varchar(255) DEFAULT NULL,
  `guardian_office_address` varchar(255) DEFAULT NULL,
  `is_emg_contact` tinyint(1) NOT NULL DEFAULT '0',
  `guardia_stu_master_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stu_guardian_id`),
  UNIQUE KEY `guardian_email` (`guardian_email`),
  KEY `guardia_stu_master_id` (`guardia_stu_master_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stu_info`
--

CREATE TABLE IF NOT EXISTS `stu_info` (
  `stu_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_unique_id` int(11) NOT NULL,
  `stu_title` varchar(5) DEFAULT NULL,
  `stu_first_name` varchar(50) NOT NULL,
  `stu_middle_name` varchar(50) DEFAULT NULL,
  `stu_last_name` varchar(50) NOT NULL,
  `stu_gender` varchar(10) DEFAULT NULL,
  `stu_dob` date NOT NULL,
  `stu_email_id` varchar(65) DEFAULT NULL,
  `stu_bloodgroup` varchar(10) DEFAULT 'Unknown',
  `stu_birthplace` varchar(45) DEFAULT NULL,
  `stu_religion` varchar(50) DEFAULT NULL,
  `stu_admission_date` date NOT NULL,
  `stu_photo` varchar(150) DEFAULT NULL,
  `stu_languages` varchar(255) DEFAULT NULL,
  `stu_mobile_no` bigint(12) DEFAULT NULL,
  `stu_info_stu_master_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stu_info_id`),
  UNIQUE KEY `stu_unique_id` (`stu_unique_id`),
  UNIQUE KEY `stu_email_id` (`stu_email_id`),
  KEY `stu_info_stu_master_id` (`stu_info_stu_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stu_master`
--

CREATE TABLE IF NOT EXISTS `stu_master` (
  `stu_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_master_stu_info_id` int(11) NOT NULL,
  `stu_master_user_id` int(11) NOT NULL,
  `stu_master_nationality_id` int(11) DEFAULT NULL,
  `stu_master_category_id` int(11) DEFAULT NULL,
  `stu_master_course_id` int(11) NOT NULL,
  `stu_master_batch_id` int(11) NOT NULL,
  `stu_master_section_id` int(11) NOT NULL,
  `stu_master_stu_status_id` int(11) NOT NULL DEFAULT '0',
  `stu_master_stu_address_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stu_master_id`),
  UNIQUE KEY `stu_master_stu_info_id` (`stu_master_stu_info_id`),
  UNIQUE KEY `stu_master_user_id` (`stu_master_user_id`),
  KEY `stu_master_nationality_id` (`stu_master_nationality_id`),
  KEY `stu_master_category` (`stu_master_category_id`),
  KEY `stu_master_course_id` (`stu_master_course_id`),
  KEY `stu_master_batch_id` (`stu_master_batch_id`),
  KEY `stu_master_section_id` (`stu_master_section_id`),
  KEY `stu_master_stu_address_id` (`stu_master_stu_address_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `stu_master_stu_info_id_fng` (`stu_master_stu_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stu_status`
--

CREATE TABLE IF NOT EXISTS `stu_status` (
  `stu_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_status_name` varchar(50) NOT NULL,
  `stu_status_description` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stu_status_id`),
  UNIQUE KEY `stu_status_name` (`stu_status_name`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login_id` varchar(65) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_type` char(2) NOT NULL,
  `is_block` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_login_id` (`user_login_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank_master`
--
ALTER TABLE `bank_master`
  ADD CONSTRAINT `bank_master_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bank_master_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_ibfk_3` FOREIGN KEY (`batch_course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `batches_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `batches_ibfk_5` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `city_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `city_ibfk_3` FOREIGN KEY (`city_state_id`) REFERENCES `state` (`state_id`),
  ADD CONSTRAINT `city_ibfk_4` FOREIGN KEY (`city_country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `country_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `document_category`
--
ALTER TABLE `document_category`
  ADD CONSTRAINT `document_category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `document_category_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `emp_address`
--
ALTER TABLE `emp_address`
  ADD CONSTRAINT `emp_address_ibfk_1` FOREIGN KEY (`emp_cadd_city`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `emp_address_ibfk_2` FOREIGN KEY (`emp_cadd_state`) REFERENCES `state` (`state_id`),
  ADD CONSTRAINT `emp_address_ibfk_3` FOREIGN KEY (`emp_cadd_country`) REFERENCES `country` (`country_id`),
  ADD CONSTRAINT `emp_address_ibfk_4` FOREIGN KEY (`emp_padd_city`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `emp_address_ibfk_5` FOREIGN KEY (`emp_padd_state`) REFERENCES `state` (`state_id`),
  ADD CONSTRAINT `emp_address_ibfk_6` FOREIGN KEY (`emp_padd_country`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `emp_category`
--
ALTER TABLE `emp_category`
  ADD CONSTRAINT `emp_category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `emp_category_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `emp_department`
--
ALTER TABLE `emp_department`
  ADD CONSTRAINT `emp_department_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `emp_department_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `emp_designation`
--
ALTER TABLE `emp_designation`
  ADD CONSTRAINT `emp_designation_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `emp_designation_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `emp_docs`
--
ALTER TABLE `emp_docs`
  ADD CONSTRAINT `emp_docs_ibfk_1` FOREIGN KEY (`emp_docs_emp_master_id`) REFERENCES `emp_master` (`emp_master_id`),
  ADD CONSTRAINT `emp_docs_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD CONSTRAINT `emp_info_ibfk_3` FOREIGN KEY (`emp_info_emp_master_id`) REFERENCES `emp_master` (`emp_master_id`);

--
-- Constraints for table `emp_master`
--
ALTER TABLE `emp_master`
  ADD CONSTRAINT `emp_master_ibfk_11` FOREIGN KEY (`emp_master_emp_info_id`) REFERENCES `emp_info` (`emp_info_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_master_ibfk_12` FOREIGN KEY (`emp_master_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_master_ibfk_13` FOREIGN KEY (`emp_master_department_id`) REFERENCES `emp_department` (`emp_department_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_master_ibfk_14` FOREIGN KEY (`emp_master_designation_id`) REFERENCES `emp_designation` (`emp_designation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_master_ibfk_15` FOREIGN KEY (`emp_master_category_id`) REFERENCES `emp_category` (`emp_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_master_ibfk_16` FOREIGN KEY (`emp_master_nationality_id`) REFERENCES `nationality` (`nationality_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_master_ibfk_17` FOREIGN KEY (`emp_master_emp_address_id`) REFERENCES `emp_address` (`emp_address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_master_ibfk_19` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_master_ibfk_20` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emp_status`
--
ALTER TABLE `emp_status`
  ADD CONSTRAINT `emp_status_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `emp_status_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `fees_category_details`
--
ALTER TABLE `fees_category_details`
  ADD CONSTRAINT `fees_category_details_ibfk_1` FOREIGN KEY (`fees_details_category_id`) REFERENCES `fees_collect_category` (`fees_collect_category_id`),
  ADD CONSTRAINT `fees_category_details_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fees_category_details_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `fees_collect_category`
--
ALTER TABLE `fees_collect_category`
  ADD CONSTRAINT `fees_collect_category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fees_collect_category_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fees_collect_category_ibfk_3` FOREIGN KEY (`fees_collect_batch_id`) REFERENCES `batches` (`batch_id`);

--
-- Constraints for table `fees_payment_transaction`
--
ALTER TABLE `fees_payment_transaction`
  ADD CONSTRAINT `fees_payment_transaction_ibfk_21` FOREIGN KEY (`fees_pay_tran_course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `fees_payment_transaction_ibfk_16` FOREIGN KEY (`fees_pay_tran_collect_id`) REFERENCES `fees_collect_category` (`fees_collect_category_id`),
  ADD CONSTRAINT `fees_payment_transaction_ibfk_17` FOREIGN KEY (`fees_pay_tran_stu_id`) REFERENCES `stu_master` (`stu_master_id`),
  ADD CONSTRAINT `fees_payment_transaction_ibfk_18` FOREIGN KEY (`fees_pay_tran_batch_id`) REFERENCES `batches` (`batch_id`),
  ADD CONSTRAINT `fees_payment_transaction_ibfk_20` FOREIGN KEY (`fees_pay_tran_section_id`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `fees_payment_transaction_ibfk_3` FOREIGN KEY (`fees_pay_tran_bank_id`) REFERENCES `bank_master` (`bank_master_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fees_payment_transaction_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fees_payment_transaction_ibfk_5` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `languages_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `login_details`
--
ALTER TABLE `login_details`
  ADD CONSTRAINT `login_details_ibfk_1` FOREIGN KEY (`login_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `msg_of_day`
--
ALTER TABLE `msg_of_day`
  ADD CONSTRAINT `msg_of_day_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `msg_of_day_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `nationality`
--
ALTER TABLE `nationality`
  ADD CONSTRAINT `nationality_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `nationality_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `national_holidays`
--
ALTER TABLE `national_holidays`
  ADD CONSTRAINT `national_holidays_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `national_holidays_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `notice_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `organization_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`section_batch_id`) REFERENCES `batches` (`batch_id`),
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `section_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `state_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `state_ibfk_3` FOREIGN KEY (`state_country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `stu_address`
--
ALTER TABLE `stu_address`
  ADD CONSTRAINT `stu_address_ibfk_13` FOREIGN KEY (`stu_cadd_city`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `stu_address_ibfk_14` FOREIGN KEY (`stu_cadd_state`) REFERENCES `state` (`state_id`),
  ADD CONSTRAINT `stu_address_ibfk_15` FOREIGN KEY (`stu_cadd_country`) REFERENCES `country` (`country_id`),
  ADD CONSTRAINT `stu_address_ibfk_16` FOREIGN KEY (`stu_padd_city`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `stu_address_ibfk_17` FOREIGN KEY (`stu_padd_state`) REFERENCES `state` (`state_id`),
  ADD CONSTRAINT `stu_address_ibfk_18` FOREIGN KEY (`stu_padd_country`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `stu_category`
--
ALTER TABLE `stu_category`
  ADD CONSTRAINT `stu_category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `stu_category_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `stu_docs`
--
ALTER TABLE `stu_docs`
  ADD CONSTRAINT `stu_docs_ibfk_1` FOREIGN KEY (`stu_docs_stu_master_id`) REFERENCES `stu_master` (`stu_master_id`),
  ADD CONSTRAINT `stu_docs_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `stu_docs_ibfk_3` FOREIGN KEY (`stu_docs_category_id`) REFERENCES `document_category` (`doc_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stu_guardians`
--
ALTER TABLE `stu_guardians`
  ADD CONSTRAINT `stu_guardians_ibfk_1` FOREIGN KEY (`guardia_stu_master_id`) REFERENCES `stu_master` (`stu_master_id`),
  ADD CONSTRAINT `stu_guardians_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `stu_guardians_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `stu_info`
--
ALTER TABLE `stu_info`
  ADD CONSTRAINT `stu_info_ibfk_3` FOREIGN KEY (`stu_info_stu_master_id`) REFERENCES `stu_master` (`stu_master_id`);

--
-- Constraints for table `stu_master`
--
ALTER TABLE `stu_master`
  ADD CONSTRAINT `stu_master_ibfk_12` FOREIGN KEY (`stu_master_stu_info_id`) REFERENCES `stu_info` (`stu_info_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stu_master_ibfk_13` FOREIGN KEY (`stu_master_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stu_master_ibfk_14` FOREIGN KEY (`stu_master_nationality_id`) REFERENCES `nationality` (`nationality_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stu_master_ibfk_15` FOREIGN KEY (`stu_master_category_id`) REFERENCES `stu_category` (`stu_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stu_master_ibfk_16` FOREIGN KEY (`stu_master_course_id`) REFERENCES `courses` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stu_master_ibfk_17` FOREIGN KEY (`stu_master_batch_id`) REFERENCES `batches` (`batch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stu_master_ibfk_18` FOREIGN KEY (`stu_master_section_id`) REFERENCES `section` (`section_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stu_master_ibfk_20` FOREIGN KEY (`stu_master_stu_address_id`) REFERENCES `stu_address` (`stu_address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stu_master_ibfk_21` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stu_master_ibfk_22` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stu_status`
--
ALTER TABLE `stu_status`
  ADD CONSTRAINT `stu_status_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `stu_status_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
