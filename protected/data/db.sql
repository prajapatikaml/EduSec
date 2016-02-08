-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2013 at 10:28 AM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testedusoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_term`
--

CREATE TABLE IF NOT EXISTS `academic_term` (
  `academic_term_id` int(2) NOT NULL AUTO_INCREMENT,
  `academic_term_name` varchar(30) NOT NULL,
  `academic_term_start_date` date NOT NULL,
  `academic_term_end_date` date NOT NULL,
  `academic_term_period_id` int(11) NOT NULL,
  `academic_term_organization_id` int(2) NOT NULL,
  `current_sem` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`academic_term_id`),
  KEY `fk_period_id` (`academic_term_period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `academic_term_period`
--

CREATE TABLE IF NOT EXISTS `academic_term_period` (
  `academic_terms_period_id` int(2) NOT NULL AUTO_INCREMENT,
  `academic_terms_period_name` varchar(50) DEFAULT NULL,
  `academic_term_period` varchar(10) NOT NULL,
  `academic_terms_period_start_date` date NOT NULL,
  `academic_terms_period_end_date` date NOT NULL,
  `academic_terms_period_organization_id` int(2) NOT NULL,
  `academic_terms_period_created_by` int(2) NOT NULL,
  `academic_terms_period_creation_date` datetime NOT NULL,
  PRIMARY KEY (`academic_terms_period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('AcademicTerm.*', 1, NULL, NULL, 'N;'),
('AcademicTerm.AcademicTermExportExcel', 0, NULL, NULL, 'N;'),
('AcademicTerm.AcademicTermGeneratePdf', 0, NULL, NULL, 'N;'),
('AcademicTerm.Admin', 0, NULL, NULL, 'N;'),
('AcademicTerm.Create', 0, NULL, NULL, 'N;'),
('AcademicTerm.Delete', 0, NULL, NULL, 'N;'),
('AcademicTerm.Index', 0, NULL, NULL, 'N;'),
('AcademicTerm.Update', 0, NULL, NULL, 'N;'),
('AcademicTerm.View', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.*', 1, NULL, NULL, 'N;'),
('AcademicTermPeriod.AcademicTermPeriodExportExcel', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.AcademicTermPeriodGeneratePdf', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Admin', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Create', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Delete', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Index', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Update', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.View', 0, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('City.*', 1, NULL, NULL, 'N;'),
('City.Admin', 0, NULL, NULL, 'N;'),
('City.Create', 0, NULL, NULL, 'N;'),
('City.Delete', 0, NULL, NULL, 'N;'),
('City.Index', 0, NULL, NULL, 'N;'),
('City.Update', 0, NULL, NULL, 'N;'),
('City.View', 0, NULL, NULL, 'N;'),
('Country.*', 1, NULL, NULL, 'N;'),
('Country.Admin', 0, NULL, NULL, 'N;'),
('Country.Create', 0, NULL, NULL, 'N;'),
('Country.Delete', 0, NULL, NULL, 'N;'),
('Country.Index', 0, NULL, NULL, 'N;'),
('Country.Update', 0, NULL, NULL, 'N;'),
('Country.View', 0, NULL, NULL, 'N;'),
('CourseMaster.*', 1, NULL, NULL, 'N;'),
('CourseMaster.Admin', 0, NULL, NULL, 'N;'),
('CourseMaster.Create', 0, NULL, NULL, 'N;'),
('CourseMaster.Delete', 0, NULL, NULL, 'N;'),
('CourseMaster.Index', 0, NULL, NULL, 'N;'),
('CourseMaster.MultiDel', 0, NULL, NULL, 'N;'),
('CourseMaster.NewCreate', 0, NULL, NULL, 'N;'),
('CourseMaster.NewUpdate', 0, NULL, NULL, 'N;'),
('CourseMaster.Update', 0, NULL, NULL, 'N;'),
('CourseMaster.View', 0, NULL, NULL, 'N;'),
('CourseUnitTable.*', 1, NULL, NULL, 'N;'),
('CourseUnitTable.Admin', 0, NULL, NULL, 'N;'),
('CourseUnitTable.Create', 0, NULL, NULL, 'N;'),
('CourseUnitTable.Delete', 0, NULL, NULL, 'N;'),
('CourseUnitTable.Index', 0, NULL, NULL, 'N;'),
('CourseUnitTable.MultiDel', 0, NULL, NULL, 'N;'),
('CourseUnitTable.NewCreate', 0, NULL, NULL, 'N;'),
('CourseUnitTable.NewUpdate', 0, NULL, NULL, 'N;'),
('CourseUnitTable.Update', 0, NULL, NULL, 'N;'),
('CourseUnitTable.View', 0, NULL, NULL, 'N;'),
('Dashboard.Default.*', 1, NULL, NULL, 'N;'),
('Dashboard.Default.Index', 0, NULL, NULL, 'N;'),
('Dashboard.Default.Notify', 0, NULL, NULL, 'N;'),
('Dashboard.Default.Save', 0, NULL, NULL, 'N;'),
('Dashboard.DefaultCon.*', 1, NULL, NULL, 'N;'),
('Dashboard.DefaultCon.Index', 0, NULL, NULL, 'N;'),
('Dashboard.DefaultCon.Save', 0, NULL, NULL, 'N;'),
('Department.*', 1, NULL, NULL, 'N;'),
('Department.Admin', 0, NULL, NULL, 'N;'),
('Department.Create', 0, NULL, NULL, 'N;'),
('Department.Delete', 0, NULL, NULL, 'N;'),
('Department.Index', 0, NULL, NULL, 'N;'),
('Department.Update', 0, NULL, NULL, 'N;'),
('Department.View', 0, NULL, NULL, 'N;'),
('Dependent.*', 1, NULL, NULL, 'N;'),
('Dependent.AutoCompleteLookup', 0, NULL, NULL, 'N;'),
('Dependent.Branchreceiptdivision', 0, NULL, NULL, 'N;'),
('Dependent.Getattendancediv', 0, NULL, NULL, 'N;'),
('Dependent.Getsubject', 0, NULL, NULL, 'N;'),
('Dependent.Gettimetablediv', 0, NULL, NULL, 'N;'),
('Dependent.UpdateEmpCCities', 0, NULL, NULL, 'N;'),
('Dependent.UpdateEmpCStates', 0, NULL, NULL, 'N;'),
('Dependent.UpdateEmpPCities', 0, NULL, NULL, 'N;'),
('Dependent.UpdateEmpPStates', 0, NULL, NULL, 'N;'),
('Dependent.UpdateItemCategory', 0, NULL, NULL, 'N;'),
('Dependent.UpdateStudCCities', 0, NULL, NULL, 'N;'),
('Dependent.UpdateStudCStates', 0, NULL, NULL, 'N;'),
('Dependent.UpdateStudPCities', 0, NULL, NULL, 'N;'),
('Dependent.UpdateStudPStates', 0, NULL, NULL, 'N;'),
('Dependent.View', 0, NULL, NULL, 'N;'),
('Eduboard.*', 1, NULL, NULL, 'N;'),
('Eduboard.Admin', 0, NULL, NULL, 'N;'),
('Eduboard.Create', 0, NULL, NULL, 'N;'),
('Eduboard.Delete', 0, NULL, NULL, 'N;'),
('Eduboard.Index', 0, NULL, NULL, 'N;'),
('Eduboard.Update', 0, NULL, NULL, 'N;'),
('Eduboard.View', 0, NULL, NULL, 'N;'),
('Employee', 2, 'Employee of the college', NULL, 'N;'),
('Employee.Default.*', 1, NULL, NULL, 'N;'),
('Employee.Default.Index', 0, NULL, NULL, 'N;'),
('Employee.Dependent.*', 1, NULL, NULL, 'N;'),
('Employee.Dependent.AutoCompleteLookup', 0, NULL, NULL, 'N;'),
('Employee.Dependent.UpdateEmpCCities', 0, NULL, NULL, 'N;'),
('Employee.Dependent.UpdateEmpCStates', 0, NULL, NULL, 'N;'),
('Employee.Dependent.UpdateEmpPCities', 0, NULL, NULL, 'N;'),
('Employee.Dependent.UpdateEmpPStates', 0, NULL, NULL, 'N;'),
('Employee.Dependent.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAcademicRecordTrans.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeAcademicRecordTrans.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAcademicRecordTrans.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAcademicRecordTrans.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAcademicRecordTrans.EmployeeAcademicRecords', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAcademicRecordTrans.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAcademicRecordTrans.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAcademicRecordTrans.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddress.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeAddress.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddress.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddress.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddress.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddress.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddress.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.EmployeeCertificates', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocs.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeDocs.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocs.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocs.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocs.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocs.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocs.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocsTrans.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeDocsTrans.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocsTrans.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocsTrans.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocsTrans.Employeedocs', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocsTrans.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocsTrans.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocsTrans.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.EmployeeExperience', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeInfo.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeInfo.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeInfo.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeInfo.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeInfo.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeInfo.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeInfo.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeePhotos.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeePhotos.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeePhotos.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeePhotos.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeePhotos.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeePhotos.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeePhotos.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.EmployeeAcademicRecords', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.EmployeeCertificates', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Employeecontact', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Employeedocs', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.EmployeeExperience', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Finalview', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Newview', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.PhotoDelete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Transferemployee', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.UpdateCCities', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.UpdateCStates', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.UpdatePCities', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Updateprofilephoto', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Updateprofiletab1', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Updateprofiletab2', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Updateprofiletab3', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Updateprofiletab4', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.UpdatePStates', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.*', 1, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.CertificateExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.CertificateExportToPdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmpcertificateGenerateExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmpcertificateGeneratePdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeAttendenceExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeAttendenceExportToPdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeedataExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeExportToPdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeFinalViewExportToPdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.FeedbackMasterExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.FeedbackMasterExportToPdf', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.*', 1, NULL, NULL, 'N;'),
('EmployeeDesignation.Admin', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.Create', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.Delete', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.Index', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.Update', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.View', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.*', 1, NULL, NULL, 'N;'),
('ExportToPDFExcel.AcademicTermExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AcademicTermExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AcademicTermPeriodExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AcademicTermPeriodExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AdminlibdataExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AssetsExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AssetsExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AssignSubjectExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AssignSubjectExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AttendenceExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.AttendenceExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.BankMasterExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.BankMasterExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.BatchExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.BatchExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.BranchExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.BranchExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.BranchPassoutsemTagExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.BranchPassoutsemTagExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CastMasterGenerateExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CastMasterGeneratePdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CategoryExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CategoryExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CertificateExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CertificateExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CityExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CityExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CountryExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.CountryExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.DepartmentExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.DepartmentExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.DivisionExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.DivisionExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EducationExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EducationExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ElectivesubjectGenerateExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ElectivesubjectGeneratePdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmpcertificateGenerateExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmpcertificateGeneratePdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmployeeAttendenceExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmployeeAttendenceExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmployeedataExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmployeeDesignationExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmployeeDesignationExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmployeeExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmployeeExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EmployeeFinalViewExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EventMasterGenerateExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EventMasterGeneratePdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EventParticipantsGenerateExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.EventParticipantsGeneratePdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.FeedbackcategoryExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.FeedbackcategoryExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.FeedbackMasterExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.FeedbackMasterExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.FeesMasterExportPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.FeesMasterExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.FeesPaymentTypeExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.FeesPaymentTypeExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.GtuNoticeExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.GtuNoticeExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ImportantNoticeExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ImportantNoticeExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.InwardExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.InwardExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ItemCategoryExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ItemCategoryExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.LanguageExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.LanguageExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.LeftDetainExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.LeftDetainExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.MiscellaneousFeesExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.MiscellaneousFeesExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.NationalityExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.NationalityExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.OrganizationExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.OrganizationExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.OutwardExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.OutwardExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.QualificationExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.QualificationExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.QuotaExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.QuotaExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ReligionExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ReligionExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.RoomCategoryExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.RoomCategoryExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.RoomDetailsExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.RoomDetailsExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ScheduleTimingGenerateExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ScheduleTimingGeneratePdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ShiftExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.ShiftExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.StateExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.StateExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.StudentdataExportExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.StudentFinalViewExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.StudentStatusExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.StudentStatusExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.StudentTransactionExportExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.StudentTransactionExportPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubEventGenerateExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubEventGeneratePdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectExaminationMarkExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectExaminationMarkExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectGuidelinesExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectGuidelinesExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectMasterExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectMasterExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectMasterviewExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectRefbookExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectRefbookExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectSyllabusExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectSyllabusExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectTeachingSchemaExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectTeachingSchemaExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectTextbookExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectTextbookExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectTypeExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectTypeExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.SubjectviewExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.TechnicalstaffdataExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.TermExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.TermExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.TrustMasterGenerateExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.TrustMasterGeneratePdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.TrustMemberDetailsGenerateExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.TrustMemberDetailsGeneratePdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.UserTypeExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.UserTypeExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.VisitorPassExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.VisitorPassExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.VisitortotalPassExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.VisitortotalPassExportToPdf', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.YearExportToExcel', 0, NULL, NULL, 'N;'),
('ExportToPDFExcel.YearExportToPdf', 0, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('Languages.*', 1, NULL, NULL, 'N;'),
('Languages.Admin', 0, NULL, NULL, 'N;'),
('Languages.Create', 0, NULL, NULL, 'N;'),
('Languages.Delete', 0, NULL, NULL, 'N;'),
('Languages.Index', 0, NULL, NULL, 'N;'),
('Languages.Update', 0, NULL, NULL, 'N;'),
('Languages.View', 0, NULL, NULL, 'N;'),
('LanguagesKnown.*', 1, NULL, NULL, 'N;'),
('LanguagesKnown.Admin', 0, NULL, NULL, 'N;'),
('LanguagesKnown.Create', 0, NULL, NULL, 'N;'),
('LanguagesKnown.Delete', 0, NULL, NULL, 'N;'),
('LanguagesKnown.Index', 0, NULL, NULL, 'N;'),
('LanguagesKnown.Update', 0, NULL, NULL, 'N;'),
('LanguagesKnown.View', 0, NULL, NULL, 'N;'),
('LoginUser.*', 1, NULL, NULL, 'N;'),
('LoginUser.Admin', 0, NULL, NULL, 'N;'),
('LoginUser.Create', 0, NULL, NULL, 'N;'),
('LoginUser.Delete', 0, NULL, NULL, 'N;'),
('LoginUser.Index', 0, NULL, NULL, 'N;'),
('LoginUser.Update', 0, NULL, NULL, 'N;'),
('LoginUser.View', 0, NULL, NULL, 'N;'),
('MessageOfDay.*', 1, NULL, NULL, 'N;'),
('MessageOfDay.Admin', 0, NULL, NULL, 'N;'),
('MessageOfDay.Create', 0, NULL, NULL, 'N;'),
('MessageOfDay.Delete', 0, NULL, NULL, 'N;'),
('MessageOfDay.Index', 0, NULL, NULL, 'N;'),
('MessageOfDay.Update', 0, NULL, NULL, 'N;'),
('MessageOfDay.View', 0, NULL, NULL, 'N;'),
('Nationality.*', 1, NULL, NULL, 'N;'),
('Nationality.Admin', 0, NULL, NULL, 'N;'),
('Nationality.Create', 0, NULL, NULL, 'N;'),
('Nationality.Delete', 0, NULL, NULL, 'N;'),
('Nationality.Index', 0, NULL, NULL, 'N;'),
('Nationality.Update', 0, NULL, NULL, 'N;'),
('Nationality.View', 0, NULL, NULL, 'N;'),
('Organization.*', 1, NULL, NULL, 'N;'),
('Organization.Admin', 0, NULL, NULL, 'N;'),
('Organization.Create', 0, NULL, NULL, 'N;'),
('Organization.Delete', 0, NULL, NULL, 'N;'),
('Organization.Index', 0, NULL, NULL, 'N;'),
('Organization.Update', 0, NULL, NULL, 'N;'),
('Organization.UpdateCities', 0, NULL, NULL, 'N;'),
('Organization.UpdateStates', 0, NULL, NULL, 'N;'),
('Organization.View', 0, NULL, NULL, 'N;'),
('Parents.Default.*', 1, NULL, NULL, 'N;'),
('Parents.Default.Index', 0, NULL, NULL, 'N;'),
('Parents.Parent.*', 1, NULL, NULL, 'N;'),
('Parents.Parent.Change', 0, NULL, NULL, 'N;'),
('Parents.Parent.Index', 0, NULL, NULL, 'N;'),
('Parents.Parent.Monthview', 0, NULL, NULL, 'N;'),
('Parents.Parent.Myholidays', 0, NULL, NULL, 'N;'),
('Parents.Parent.Mysubjects', 0, NULL, NULL, 'N;'),
('Parents.Parent.Studentacademicrecord', 0, NULL, NULL, 'N;'),
('Parents.Parent.StudentAttendenceReport', 0, NULL, NULL, 'N;'),
('Parents.Parent.Studentcertificate', 0, NULL, NULL, 'N;'),
('Parents.Parent.Studentdocs', 0, NULL, NULL, 'N;'),
('Parents.Parent.StudentFees', 0, NULL, NULL, 'N;'),
('Parents.Parent.Studenthistory', 0, NULL, NULL, 'N;'),
('Parents.Parent.Studentperformance', 0, NULL, NULL, 'N;'),
('Parents.Parent.Studentpersonaltimetable', 0, NULL, NULL, 'N;'),
('Parents.Parent.Studentprofile', 0, NULL, NULL, 'N;'),
('Parents.Parent.Studenttimetable', 0, NULL, NULL, 'N;'),
('Parents.ParentLogin.*', 1, NULL, NULL, 'N;'),
('Parents.ParentLogin.Admin', 0, NULL, NULL, 'N;'),
('Parents.ParentLogin.Create', 0, NULL, NULL, 'N;'),
('Parents.ParentLogin.Delete', 0, NULL, NULL, 'N;'),
('Parents.ParentLogin.GenerateExcel', 0, NULL, NULL, 'N;'),
('Parents.ParentLogin.GeneratePdf', 0, NULL, NULL, 'N;'),
('Parents.ParentLogin.Index', 0, NULL, NULL, 'N;'),
('Parents.ParentLogin.Update', 0, NULL, NULL, 'N;'),
('Parents.ParentLogin.View', 0, NULL, NULL, 'N;'),
('Qualification.*', 1, NULL, NULL, 'N;'),
('Qualification.Admin', 0, NULL, NULL, 'N;'),
('Qualification.Create', 0, NULL, NULL, 'N;'),
('Qualification.Delete', 0, NULL, NULL, 'N;'),
('Qualification.Index', 0, NULL, NULL, 'N;'),
('Qualification.Update', 0, NULL, NULL, 'N;'),
('Qualification.View', 0, NULL, NULL, 'N;'),
('QualificationType.*', 1, NULL, NULL, 'N;'),
('QualificationType.Admin', 0, NULL, NULL, 'N;'),
('QualificationType.Create', 0, NULL, NULL, 'N;'),
('QualificationType.Delete', 0, NULL, NULL, 'N;'),
('QualificationType.Index', 0, NULL, NULL, 'N;'),
('QualificationType.Update', 0, NULL, NULL, 'N;'),
('QualificationType.View', 0, NULL, NULL, 'N;'),
('Report.*', 1, NULL, NULL, 'N;'),
('Report.CourseDetails', 0, NULL, NULL, 'N;'),
('Report.Documentsearch', 0, NULL, NULL, 'N;'),
('Report.Documentsearchview', 0, NULL, NULL, 'N;'),
('Report.Employeeid', 0, NULL, NULL, 'N;'),
('Report.EmployeeInfoReport', 0, NULL, NULL, 'N;'),
('Report.Myholidays', 0, NULL, NULL, 'N;'),
('Report.PostLabelStudent', 0, NULL, NULL, 'N;'),
('Report.SelectedEmployeeList', 0, NULL, NULL, 'N;'),
('Report.SelectedList', 0, NULL, NULL, 'N;'),
('Report.StudentDocumentsearch', 0, NULL, NULL, 'N;'),
('Report.Studentdocumentsearchview', 0, NULL, NULL, 'N;'),
('Report.Studenthistory', 0, NULL, NULL, 'N;'),
('Report.Studentid', 0, NULL, NULL, 'N;'),
('Report.StudInfoReport', 0, NULL, NULL, 'N;'),
('Report.View', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.CreateOrg', 0, NULL, NULL, 'N;'),
('Site.CreateUser', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Forgotpassword', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Site.NewDashboard', 0, NULL, NULL, 'N;'),
('Site.RedirectLogin', 0, NULL, NULL, 'N;'),
('Site.Welcome', 0, NULL, NULL, 'N;'),
('State.*', 1, NULL, NULL, 'N;'),
('State.Admin', 0, NULL, NULL, 'N;'),
('State.Create', 0, NULL, NULL, 'N;'),
('State.Delete', 0, NULL, NULL, 'N;'),
('State.Index', 0, NULL, NULL, 'N;'),
('State.Update', 0, NULL, NULL, 'N;'),
('State.View', 0, NULL, NULL, 'N;'),
('Student', 2, 'Student of the College', NULL, 'N;'),
('Student.Attendence.*', 1, NULL, NULL, 'N;'),
('Student.Attendence.Admin', 0, NULL, NULL, 'N;'),
('Student.Attendence.Attendencedivisionreport', 0, NULL, NULL, 'N;'),
('Student.Attendence.Chart', 0, NULL, NULL, 'N;'),
('Student.Attendence.ChartReport', 0, NULL, NULL, 'N;'),
('Student.Attendence.Create', 0, NULL, NULL, 'N;'),
('Student.Attendence.Delete', 0, NULL, NULL, 'N;'),
('Student.Attendence.Display', 0, NULL, NULL, 'N;'),
('Student.Attendence.DisplayChart', 0, NULL, NULL, 'N;'),
('Student.Attendence.Index', 0, NULL, NULL, 'N;'),
('Student.Attendence.Monthview', 0, NULL, NULL, 'N;'),
('Student.Attendence.Monthwiseattendreport', 0, NULL, NULL, 'N;'),
('Student.Attendence.Popbrowser', 0, NULL, NULL, 'N;'),
('Student.Attendence.Searchstudid1', 0, NULL, NULL, 'N;'),
('Student.Attendence.Showstudentview', 0, NULL, NULL, 'N;'),
('Student.Attendence.StudentAttendenceReport', 0, NULL, NULL, 'N;'),
('Student.Attendence.Studentwisereport', 0, NULL, NULL, 'N;'),
('Student.Attendence.Studentwisereportpdf', 0, NULL, NULL, 'N;'),
('Student.Attendence.Update', 0, NULL, NULL, 'N;'),
('Student.Attendence.View', 0, NULL, NULL, 'N;'),
('Student.Attendence.Viewchart', 0, NULL, NULL, 'N;'),
('Student.Dependent.*', 1, NULL, NULL, 'N;'),
('Student.Dependent.Getattendancediv', 0, NULL, NULL, 'N;'),
('Student.Dependent.Getsubject', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudCCities', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudCStates', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudPCities', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudPStates', 0, NULL, NULL, 'N;'),
('Student.Dependent.View', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.*', 1, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.AttendenceExportToExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.AttendenceExportToPdf', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.Cancelstudentlistexcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.Cancelstudentlistpdf', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.CertificateExportToExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.CertificateExportToPdf', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.FeedbackcategoryExportToExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.FeedbackcategoryExportToPdf', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.FeedbackMasterExportToExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.FeedbackMasterExportToPdf', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.LeftDetainExportToExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.LeftDetainExportToPdf', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.ScheduleTimingGenerateExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.ScheduleTimingGeneratePdf', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.StudentdataExportExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.StudentFinalViewExportToPdf', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.StudentTransactionExportExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.StudentTransactionExportPdf', 0, NULL, NULL, 'N;'),
('Student.StudentAcademicRecordTrans.*', 1, NULL, NULL, 'N;'),
('Student.StudentAcademicRecordTrans.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentAcademicRecordTrans.Create', 0, NULL, NULL, 'N;'),
('Student.StudentAcademicRecordTrans.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentAcademicRecordTrans.Index', 0, NULL, NULL, 'N;'),
('Student.StudentAcademicRecordTrans.StudentAcademicRecords', 0, NULL, NULL, 'N;'),
('Student.StudentAcademicRecordTrans.Update', 0, NULL, NULL, 'N;'),
('Student.StudentAcademicRecordTrans.View', 0, NULL, NULL, 'N;'),
('Student.StudentAddress.*', 1, NULL, NULL, 'N;'),
('Student.StudentAddress.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentAddress.Create', 0, NULL, NULL, 'N;'),
('Student.StudentAddress.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentAddress.Index', 0, NULL, NULL, 'N;'),
('Student.StudentAddress.Update', 0, NULL, NULL, 'N;'),
('Student.StudentAddress.View', 0, NULL, NULL, 'N;'),
('Student.StudentDocs.*', 1, NULL, NULL, 'N;'),
('Student.StudentDocs.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentDocs.Create', 0, NULL, NULL, 'N;'),
('Student.StudentDocs.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentDocs.Index', 0, NULL, NULL, 'N;'),
('Student.StudentDocs.Update', 0, NULL, NULL, 'N;'),
('Student.StudentDocs.View', 0, NULL, NULL, 'N;'),
('Student.StudentDocsTrans.*', 1, NULL, NULL, 'N;'),
('Student.StudentDocsTrans.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentDocsTrans.Create', 0, NULL, NULL, 'N;'),
('Student.StudentDocsTrans.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentDocsTrans.Index', 0, NULL, NULL, 'N;'),
('Student.StudentDocsTrans.StudentDocs', 0, NULL, NULL, 'N;'),
('Student.StudentDocsTrans.Update', 0, NULL, NULL, 'N;'),
('Student.StudentDocsTrans.View', 0, NULL, NULL, 'N;'),
('Student.StudentInfo.*', 1, NULL, NULL, 'N;'),
('Student.StudentInfo.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentInfo.Create', 0, NULL, NULL, 'N;'),
('Student.StudentInfo.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentInfo.Index', 0, NULL, NULL, 'N;'),
('Student.StudentInfo.Update', 0, NULL, NULL, 'N;'),
('Student.StudentInfo.View', 0, NULL, NULL, 'N;'),
('Student.StudentPhotos.*', 1, NULL, NULL, 'N;'),
('Student.StudentPhotos.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentPhotos.Create', 0, NULL, NULL, 'N;'),
('Student.StudentPhotos.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentPhotos.Index', 0, NULL, NULL, 'N;'),
('Student.StudentPhotos.Update', 0, NULL, NULL, 'N;'),
('Student.StudentPhotos.View', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.*', 1, NULL, NULL, 'N;'),
('Student.StudentTransaction.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Allstudent', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Create', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Error', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Finalview', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Importationinstruction', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Index', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Newview', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.PhotoDelete', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Studentacademicrecord', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Studentcertificate', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Studentcontact', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Studentdocs', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Studentperformance', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Update', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofilephoto', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofiletab1', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofiletab2', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofiletab3', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofiletab4', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.*', 1, NULL, NULL, 'N;'),
('Studentstatusmaster.Admin', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.Create', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.Delete', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.Index', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.Update', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.View', 0, NULL, NULL, 'N;'),
('SuperAdmin', 2, NULL, NULL, 'N;'),
('UnitDetailTable.*', 1, NULL, NULL, 'N;'),
('UnitDetailTable.Admin', 0, NULL, NULL, 'N;'),
('UnitDetailTable.Create', 0, NULL, NULL, 'N;'),
('UnitDetailTable.Delete', 0, NULL, NULL, 'N;'),
('UnitDetailTable.Index', 0, NULL, NULL, 'N;'),
('UnitDetailTable.NewCreate', 0, NULL, NULL, 'N;'),
('UnitDetailTable.Update', 0, NULL, NULL, 'N;'),
('UnitDetailTable.View', 0, NULL, NULL, 'N;'),
('User.*', 1, NULL, NULL, 'N;'),
('User.Admin', 0, NULL, NULL, 'N;'),
('User.Change', 0, NULL, NULL, 'N;'),
('User.Create', 0, NULL, NULL, 'N;'),
('User.Delete', 0, NULL, NULL, 'N;'),
('User.Index', 0, NULL, NULL, 'N;'),
('User.Resetadminpassword', 0, NULL, NULL, 'N;'),
('User.Resetemploginid', 0, NULL, NULL, 'N;'),
('User.Resetemppassword', 0, NULL, NULL, 'N;'),
('User.Resetstudloginid', 0, NULL, NULL, 'N;'),
('User.Resetstudpassword', 0, NULL, NULL, 'N;'),
('User.Update', 0, NULL, NULL, 'N;'),
('User.Updateemploginid', 0, NULL, NULL, 'N;'),
('User.Updatestudloginid', 0, NULL, NULL, 'N;'),
('User.View', 0, NULL, NULL, 'N;'),
('UserType.*', 1, NULL, NULL, 'N;'),
('UserType.Admin', 0, NULL, NULL, 'N;'),
('UserType.Create', 0, NULL, NULL, 'N;'),
('UserType.Delete', 0, NULL, NULL, 'N;'),
('UserType.Index', 0, NULL, NULL, 'N;'),
('UserType.Update', 0, NULL, NULL, 'N;'),
('UserType.View', 0, NULL, NULL, 'N;'),
('Year.*', 1, NULL, NULL, 'N;'),
('Year.Admin', 0, NULL, NULL, 'N;'),
('Year.Create', 0, NULL, NULL, 'N;'),
('Year.Delete', 0, NULL, NULL, 'N;'),
('Year.Index', 0, NULL, NULL, 'N;'),
('Year.Update', 0, NULL, NULL, 'N;'),
('Year.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('Employee', 'CourseMaster.Admin'),
('Student', 'CourseMaster.Admin'),
('Employee', 'CourseMaster.View'),
('Student', 'CourseMaster.View'),
('Employee', 'Employee.EmployeeTransaction.Admin'),
('Employee', 'Employee.EmployeeTransaction.Update'),
('Student', 'Report.CourseDetails'),
('Employee', 'Student.StudentTransaction.Admin'),
('Employee', 'Student.StudentTransaction.Update'),
('Student', 'Student.StudentTransaction.Update'),
('Student', 'Student.StudentTransaction.Updateprofilephoto'),
('Student', 'Student.StudentTransaction.Updateprofiletab1'),
('Student', 'Student.StudentTransaction.Updateprofiletab2'),
('Student', 'Student.StudentTransaction.Updateprofiletab3'),
('Student', 'Student.StudentTransaction.Updateprofiletab4'),
('Student', 'User.Change');

-- --------------------------------------------------------

--
-- Table structure for table `bank_master`
--

CREATE TABLE IF NOT EXISTS `bank_master` (
  `bank_id` int(3) NOT NULL AUTO_INCREMENT,
  `bank_full_name` varchar(100) NOT NULL,
  `bank_short_name` varchar(15) NOT NULL,
  `bank_organization_id` int(2) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(30) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(30) NOT NULL,
  `state_id` int(30) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course_master`
--

CREATE TABLE IF NOT EXISTS `course_master` (
  `course_master_id` int(3) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `course_category_id` int(3) NOT NULL,
  `course_level` int(3) NOT NULL,
  `course_completion_hours` int(3) NOT NULL,
  `course_code` varchar(25) NOT NULL,
  `course_cost` int(9) NOT NULL,
  `course_desc` varchar(10000) NOT NULL,
  `course_created_by` int(3) NOT NULL,
  `course_creation_date` date NOT NULL,
  PRIMARY KEY (`course_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course_unit_table`
--

CREATE TABLE IF NOT EXISTS `course_unit_table` (
  `course_unit_id` int(9) NOT NULL AUTO_INCREMENT,
  `course_unit_master_id` int(3) NOT NULL,
  `course_unit_ref_code` varchar(100) NOT NULL,
  `course_unit_name` varchar(200) NOT NULL,
  `course_unit_level` int(3) NOT NULL,
  `course_unit_credit` int(3) NOT NULL,
  `course_unit_hours` int(3) NOT NULL,
  `course_unit_created_by` int(3) NOT NULL,
  `course_unit_creation_date` date NOT NULL,
  PRIMARY KEY (`course_unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency_format_table`
--

CREATE TABLE IF NOT EXISTS `currency_format_table` (
  `currency_format_id` int(3) NOT NULL AUTO_INCREMENT,
  `currency_format_name` varchar(50) NOT NULL,
  `currency_format` varchar(10) NOT NULL,
  PRIMARY KEY (`currency_format_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_page`
--

CREATE TABLE IF NOT EXISTS `dashboard_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `path` varchar(1000) DEFAULT NULL,
  `weight` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_portlet`
--

CREATE TABLE IF NOT EXISTS `dashboard_portlet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dashboard` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned DEFAULT NULL,
  `settings` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(3) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(60) NOT NULL,
  `department_organization_id` int(2) NOT NULL,
  `department_created_by` int(2) NOT NULL,
  `department_created_date` datetime NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document_category_master`
--

CREATE TABLE IF NOT EXISTS `document_category_master` (
  `doc_category_id` int(3) NOT NULL AUTO_INCREMENT,
  `doc_category_name` varchar(30) NOT NULL,
  `created_by` int(3) NOT NULL,
  `creation_date` date NOT NULL,
  `docs_category_organization_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`doc_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eduboard`
--

CREATE TABLE IF NOT EXISTS `eduboard` (
  `eduboard_id` int(2) NOT NULL AUTO_INCREMENT,
  `eduboard_name` varchar(30) NOT NULL,
  `eduboard_organization_id` int(2) NOT NULL,
  `eduboard_created_by` int(3) NOT NULL,
  `eduboard_created_date` datetime NOT NULL,
  `for_whom` int(2) NOT NULL,
  PRIMARY KEY (`eduboard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_academic_record_trans`
--

CREATE TABLE IF NOT EXISTS `employee_academic_record_trans` (
  `employee_academic_record_trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_academic_record_trans_user_id` int(5) NOT NULL,
  `employee_academic_record_trans_qualification_id` int(5) NOT NULL,
  `employee_academic_record_trans_eduboard_id` int(5) NOT NULL,
  `employee_academic_record_trans_year_id` int(5) NOT NULL,
  `theory_mark_obtained` int(3) NOT NULL,
  `theory_mark_max` int(3) NOT NULL,
  `theory_percentage` float NOT NULL,
  `practical_mark_obtained` int(3) DEFAULT NULL,
  `practical_mark_max` int(3) DEFAULT NULL,
  `practical_percentage` float DEFAULT NULL,
  `employee_academic_record_trans_oraganization_id` int(3) NOT NULL,
  PRIMARY KEY (`employee_academic_record_trans_id`),
  KEY `fk_emp_qualification` (`employee_academic_record_trans_qualification_id`),
  KEY `fk_emp_eduboard` (`employee_academic_record_trans_eduboard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_address`
--

CREATE TABLE IF NOT EXISTS `employee_address` (
  `employee_address_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_address_c_line1` varchar(100) DEFAULT NULL,
  `employee_address_c_line2` varchar(100) DEFAULT NULL,
  `employee_address_c_city` int(9) DEFAULT NULL,
  `employee_address_c_pincode` int(6) DEFAULT NULL,
  `employee_address_c_state` int(9) DEFAULT NULL,
  `employee_address_c_country` int(9) DEFAULT NULL,
  `employee_address_p_line1` varchar(100) DEFAULT NULL,
  `employee_address_p_line2` varchar(100) DEFAULT NULL,
  `employee_address_p_city` int(9) DEFAULT NULL,
  `employee_address_p_pincode` int(6) DEFAULT NULL,
  `employee_address_p_state` int(9) DEFAULT NULL,
  `employee_address_p_country` int(9) DEFAULT NULL,
  `employee_address_phone` bigint(15) DEFAULT NULL,
  `employee_address_mobile` bigint(15) DEFAULT NULL,
  `employee_address_c_taluka` varchar(50) DEFAULT NULL,
  `employee_address_c_district` varchar(50) DEFAULT NULL,
  `employee_address_p_taluka` varchar(50) DEFAULT NULL,
  `employee_address_p_district` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`employee_address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendence`
--

CREATE TABLE IF NOT EXISTS `employee_attendence` (
  `employee_attendence_id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) NOT NULL,
  `attendence` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `time1` time NOT NULL,
  `time2` time NOT NULL,
  `time3` time NOT NULL,
  `time4` time NOT NULL,
  `time5` time NOT NULL,
  `time6` time NOT NULL,
  `time7` time NOT NULL,
  `time8` time NOT NULL,
  `time9` time NOT NULL,
  `time10` time NOT NULL,
  `total_hour` time NOT NULL,
  `overtime_hour` time NOT NULL,
  `csvfile` varchar(150) NOT NULL,
  `employee_attendence_organization_id` int(3) NOT NULL,
  PRIMARY KEY (`employee_attendence_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_certificate_details_table`
--

CREATE TABLE IF NOT EXISTS `employee_certificate_details_table` (
  `employee_certificate_details_table_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_certificate_details_table_emp_id` int(5) NOT NULL,
  `employee_certificate_type_id` int(5) NOT NULL,
  `employee_certificate_created_by` int(5) NOT NULL,
  `employee_certificate_creation_date` date NOT NULL,
  `employee_certificate_org_id` int(5) NOT NULL,
  PRIMARY KEY (`employee_certificate_details_table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation`
--

CREATE TABLE IF NOT EXISTS `employee_designation` (
  `employee_designation_id` int(2) NOT NULL AUTO_INCREMENT,
  `employee_designation_name` varchar(25) NOT NULL,
  `employee_designation_level` int(5) NOT NULL,
  `employee_designation_organization_id` int(2) NOT NULL,
  `employee_designation_created_by` int(3) NOT NULL,
  `employee_designation_created_date` datetime NOT NULL,
  PRIMARY KEY (`employee_designation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_docs`
--

CREATE TABLE IF NOT EXISTS `employee_docs` (
  `employee_docs_id` int(5) NOT NULL AUTO_INCREMENT,
  `doc_category_id` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `employee_docs_desc` varchar(50) DEFAULT NULL,
  `employee_docs_path` varchar(150) NOT NULL,
  `employee_docs_submit_date` date NOT NULL,
  PRIMARY KEY (`employee_docs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_docs_trans`
--

CREATE TABLE IF NOT EXISTS `employee_docs_trans` (
  `employee_docs_trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_docs_trans_user_id` int(5) NOT NULL,
  `employee_docs_trans_emp_docs_id` int(5) NOT NULL,
  PRIMARY KEY (`employee_docs_trans_id`),
  KEY `fk_emp_docs_id` (`employee_docs_trans_emp_docs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_experience`
--

CREATE TABLE IF NOT EXISTS `employee_experience` (
  `employee_experience_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_experience_organization_name` varchar(50) NOT NULL,
  `employee_experience_designation` varchar(25) NOT NULL,
  `employee_experience_from` date NOT NULL,
  `employee_experience_to` date NOT NULL,
  `employee_experience` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_experience_trans`
--

CREATE TABLE IF NOT EXISTS `employee_experience_trans` (
  `employee_experience_trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_experience_trans_user_id` int(5) NOT NULL,
  `employee_experience_trans_emp_experience_id` int(5) NOT NULL,
  `employee_experience_trans_organization_id` int(3) NOT NULL,
  PRIMARY KEY (`employee_experience_trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE IF NOT EXISTS `employee_info` (
  `employee_id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `employee_no` varchar(10) DEFAULT NULL,
  `employee_first_name` varchar(25) NOT NULL,
  `employee_middle_name` varchar(25) NOT NULL,
  `employee_last_name` varchar(25) NOT NULL,
  `employee_name_alias` varchar(25) DEFAULT NULL,
  `employee_mother_name` varchar(25) DEFAULT NULL,
  `employee_dob` date DEFAULT NULL,
  `employee_birthplace` varchar(25) DEFAULT NULL,
  `employee_gender` varchar(6) DEFAULT NULL,
  `employee_bloodgroup` varchar(3) DEFAULT NULL,
  `employee_marital_status` varchar(10) DEFAULT NULL,
  `employee_private_email` varchar(60) DEFAULT NULL,
  `employee_organization_mobile` bigint(15) DEFAULT NULL,
  `employee_private_mobile` bigint(15) NOT NULL,
  `employee_pancard_no` varchar(15) DEFAULT NULL,
  `employee_account_no` bigint(20) DEFAULT NULL,
  `employee_pf_id` varchar(20) DEFAULT NULL,
  `employee_joining_date` date NOT NULL,
  `employee_probation_period` varchar(10) DEFAULT NULL,
  `employee_hobbies` text,
  `employee_technical_skills` text,
  `employee_project_details` text,
  `employee_curricular` text,
  `employee_reference` varchar(25) DEFAULT NULL,
  `employee_refer_designation` varchar(20) DEFAULT NULL,
  `employee_guardian_name` varchar(100) DEFAULT NULL,
  `employee_guardian_relation` varchar(20) DEFAULT NULL,
  `employee_guardian_home_address` varchar(100) DEFAULT NULL,
  `employee_guardian_qualification` varchar(50) DEFAULT NULL,
  `employee_guardian_occupation` varchar(50) DEFAULT NULL,
  `employee_guardian_income` varchar(15) DEFAULT NULL,
  `employee_guardian_occupation_address` varchar(100) DEFAULT NULL,
  `employee_guardian_occupation_city` int(4) DEFAULT NULL,
  `employee_guardian_city_pin` int(6) DEFAULT NULL,
  `employee_guardian_phone_no` bigint(15) DEFAULT NULL,
  `employee_guardian_mobile1` bigint(15) DEFAULT NULL,
  `employee_guardian_mobile2` bigint(15) DEFAULT NULL,
  `employee_faculty_of` varchar(50) DEFAULT NULL,
  `employee_attendance_card_id` varchar(15) NOT NULL,
  `employee_tally_id` varchar(9) DEFAULT NULL,
  `employee_created_by` bigint(20) DEFAULT NULL,
  `employee_creation_date` datetime DEFAULT NULL,
  `employee_type` int(3) NOT NULL,
  `employee_aicte_id` int(5) DEFAULT NULL,
  `employee_gtu_id` int(5) DEFAULT NULL,
  `employee_left_transfer_date` date DEFAULT NULL,
  `transfer_left_remarks` varchar(200) DEFAULT NULL,
  `employee_info_transaction_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_marks`
--

CREATE TABLE IF NOT EXISTS `employee_marks` (
  `employee_marks_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_marks_obtained` int(4) NOT NULL,
  `employee_marks_out_of` int(4) NOT NULL,
  `employee_marks_percent` decimal(3,2) NOT NULL,
  `employee_marks_created_by` int(3) NOT NULL,
  `employee_marks_creation_date` datetime NOT NULL,
  PRIMARY KEY (`employee_marks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_notification`
--

CREATE TABLE IF NOT EXISTS `employee_notification` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `expire` datetime NOT NULL,
  `alert_after_date` datetime NOT NULL,
  `alert_before_date` datetime NOT NULL,
  `content` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `from` int(3) NOT NULL,
  `emp_notice_to` int(3) NOT NULL DEFAULT '0',
  `org_id` int(3) NOT NULL,
  `notifiyii_department_id` int(3) DEFAULT '0',
  `employee_notification_type` varchar(20) DEFAULT '',
  `employee_notification_creation_date` date NOT NULL,
  `employee_notification_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_photos`
--

CREATE TABLE IF NOT EXISTS `employee_photos` (
  `employee_photos_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_photos_desc` varchar(50) DEFAULT NULL,
  `employee_photos_path` varchar(150) NOT NULL,
  PRIMARY KEY (`employee_photos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_sms_email_details`
--

CREATE TABLE IF NOT EXISTS `employee_sms_email_details` (
  `employee_sms_email_id` int(3) NOT NULL AUTO_INCREMENT,
  `employee_sms_email_organization_id` int(3) NOT NULL,
  `department_id` int(3) NOT NULL,
  `branch_id` int(3) NOT NULL,
  `shift_id` int(3) NOT NULL,
  `message_email_text` text NOT NULL,
  `email_sms_status` int(1) NOT NULL,
  `created_by` int(3) NOT NULL,
  `creation_date` datetime NOT NULL,
  `employee_id` int(3) NOT NULL,
  `employee_sms_email_details_ack_id` varchar(20) NOT NULL,
  PRIMARY KEY (`employee_sms_email_id`),
  KEY `fk_emp_sms_bid` (`branch_id`),
  KEY `fk_emp_sms_did` (`department_id`),
  KEY `fk_emp_sms_sid` (`shift_id`),
  KEY `fk_emp_sms_eid` (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_transaction`
--

CREATE TABLE IF NOT EXISTS `employee_transaction` (
  `employee_transaction_id` int(9) NOT NULL AUTO_INCREMENT,
  `employee_transaction_user_id` int(5) NOT NULL,
  `employee_transaction_employee_id` int(5) NOT NULL,
  `employee_transaction_emp_address_id` int(5) DEFAULT NULL,
  `employee_transaction_branch_id` int(2) DEFAULT NULL,
  `employee_transaction_category_id` int(2) DEFAULT NULL,
  `employee_transaction_quota_id` int(2) DEFAULT NULL,
  `employee_transaction_religion_id` int(2) DEFAULT NULL,
  `employee_transaction_shift_id` int(5) NOT NULL,
  `employee_transaction_designation_id` int(2) NOT NULL,
  `employee_transaction_nationality_id` int(2) DEFAULT NULL,
  `employee_transaction_department_id` int(3) NOT NULL,
  `employee_transaction_organization_id` int(2) NOT NULL,
  `employee_transaction_languages_known_id` int(2) DEFAULT NULL,
  `employee_transaction_emp_photos_id` int(5) DEFAULT NULL,
  `employee_status` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`employee_transaction_id`),
  KEY `fk_designation` (`employee_transaction_designation_id`),
  KEY `fk_nationality` (`employee_transaction_nationality_id`),
  KEY `fk_department` (`employee_transaction_department_id`),
  KEY `fk_emp_info` (`employee_transaction_employee_id`),
  KEY `fk_emp_photo` (`employee_transaction_emp_photos_id`),
  KEY `employee_transaction_user_id` (`employee_transaction_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
  `event_master_id` int(3) NOT NULL AUTO_INCREMENT,
  `event_master_name` varchar(20) NOT NULL,
  `event_master_start_date` date NOT NULL,
  `event_master_created_by` int(3) NOT NULL,
  `event_master_creation_date` date NOT NULL,
  `event_master_org_id` int(3) NOT NULL,
  PRIMARY KEY (`event_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `important_notice`
--

CREATE TABLE IF NOT EXISTS `important_notice` (
  `notice_id` int(3) NOT NULL AUTO_INCREMENT,
  `notice` varchar(200) NOT NULL,
  `created_by` int(2) NOT NULL,
  `creation_date` datetime NOT NULL,
  `notice_organization_id` int(3) NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `languages_id` int(2) NOT NULL AUTO_INCREMENT,
  `languages_name` varchar(30) NOT NULL,
  `languages_organization_id` int(2) NOT NULL,
  `languages_created_by` int(3) NOT NULL,
  `languages_created_date` datetime NOT NULL,
  PRIMARY KEY (`languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages_known`
--

CREATE TABLE IF NOT EXISTS `languages_known` (
  `languages_known_id` int(2) NOT NULL AUTO_INCREMENT,
  `languages_known1` int(2) DEFAULT NULL,
  `languages_known2` int(2) DEFAULT NULL,
  `languages_known3` int(2) DEFAULT NULL,
  `languages_known4` int(2) DEFAULT NULL,
  PRIMARY KEY (`languages_known_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE IF NOT EXISTS `login_user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  `log_in_time` datetime NOT NULL,
  `log_out_time` datetime DEFAULT NULL,
  `user_ip_address` varchar(16) NOT NULL,
  `login_organization_id` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_of_day`
--

CREATE TABLE IF NOT EXISTS `message_of_day` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `message` varchar(250) NOT NULL,
  `created_by` int(7) NOT NULL,
  `creation_date` datetime NOT NULL,
  `message_of_day_active` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `nationality_id` int(2) NOT NULL AUTO_INCREMENT,
  `nationality_name` varchar(30) NOT NULL,
  `nationality_organization_id` int(2) NOT NULL,
  `nationality_created_by` int(3) NOT NULL,
  `nationality_created_date` datetime NOT NULL,
  PRIMARY KEY (`nationality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `organization_id` int(2) NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(50) NOT NULL,
  `organization_created_by` int(3) NOT NULL,
  `organization_creation_date` datetime NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `city` int(3) NOT NULL,
  `state` int(3) NOT NULL,
  `country` int(3) NOT NULL,
  `pin` int(6) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `fax_no` varchar(15) DEFAULT NULL,
  `logo` longblob NOT NULL,
  `file_type` varchar(30) NOT NULL,
  `no_of_semester` int(3) NOT NULL,
  `organization_trust_id` int(3) DEFAULT NULL,
  `name_alias` varchar(100) NOT NULL,
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parent_login`
--

CREATE TABLE IF NOT EXISTS `parent_login` (
  `parent_id` int(5) NOT NULL AUTO_INCREMENT,
  `parent_user_name` varchar(100) NOT NULL,
  `parent_password` varchar(200) NOT NULL,
  `created_by` int(5) NOT NULL,
  `creation_date` date NOT NULL,
  `parent_organization_id` int(3) NOT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE IF NOT EXISTS `photo_gallery` (
  `photo_id` int(5) NOT NULL AUTO_INCREMENT,
  `photo_path` varchar(50) NOT NULL,
  `photo_desc` varchar(50) DEFAULT NULL,
  `created_by` int(3) NOT NULL,
  `creation_date` date NOT NULL,
  `photo_gallery_org_id` int(3) NOT NULL,
  `display_status` int(2) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `qualification_id` int(2) NOT NULL AUTO_INCREMENT,
  `qualification_name` varchar(30) NOT NULL,
  `qualification_organization_id` int(2) NOT NULL,
  `qualification_created_by` int(3) NOT NULL,
  `qualification_created_date` datetime NOT NULL,
  PRIMARY KEY (`qualification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qualification_type`
--

CREATE TABLE IF NOT EXISTS `qualification_type` (
  `qualification_type_id` int(3) NOT NULL AUTO_INCREMENT,
  `qualification_type_name` varchar(100) NOT NULL,
  `qualification_type_desc` varchar(500) NOT NULL,
  `qualification_type_created_by` int(3) NOT NULL,
  `qualification_type_creation_date` date NOT NULL,
  PRIMARY KEY (`qualification_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(30) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_record_trans`
--

CREATE TABLE IF NOT EXISTS `student_academic_record_trans` (
  `student_academic_record_trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `student_academic_record_trans_stud_id` int(5) NOT NULL,
  `student_academic_record_trans_qualification_id` int(3) NOT NULL,
  `student_academic_record_trans_eduboard_id` int(3) NOT NULL,
  `student_academic_record_trans_record_trans_year_id` int(5) NOT NULL,
  `theory_mark_obtained` int(3) NOT NULL,
  `theory_mark_max` int(3) NOT NULL,
  `theory_percentage` float NOT NULL,
  `practical_mark_obtained` int(3) DEFAULT NULL,
  `practical_mark_max` int(3) DEFAULT NULL,
  `practical_percentage` float DEFAULT NULL,
  PRIMARY KEY (`student_academic_record_trans_id`),
  KEY `fk_qualification` (`student_academic_record_trans_qualification_id`),
  KEY `fk_eduboard` (`student_academic_record_trans_eduboard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_address`
--

CREATE TABLE IF NOT EXISTS `student_address` (
  `student_address_id` int(5) NOT NULL AUTO_INCREMENT,
  `student_address_c_line1` varchar(100) DEFAULT NULL,
  `student_address_c_line2` varchar(100) DEFAULT NULL,
  `student_address_c_taluka` varchar(50) DEFAULT NULL,
  `student_address_c_district` varchar(50) DEFAULT NULL,
  `student_address_c_country` int(9) DEFAULT NULL,
  `student_address_c_city` int(9) DEFAULT NULL,
  `student_address_c_pin` int(6) DEFAULT NULL,
  `student_address_c_state` int(9) DEFAULT NULL,
  `student_address_p_line1` varchar(100) DEFAULT NULL,
  `student_address_p_line2` varchar(100) DEFAULT NULL,
  `student_address_p_taluka` varchar(50) DEFAULT NULL,
  `student_address_p_district` varchar(50) DEFAULT NULL,
  `student_address_p_city` int(9) DEFAULT NULL,
  `student_address_p_pin` int(6) DEFAULT NULL,
  `student_address_p_state` int(9) DEFAULT NULL,
  `student_address_p_country` int(9) DEFAULT NULL,
  `student_address_phone` bigint(15) DEFAULT NULL,
  `student_address_mobile` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`student_address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_docs`
--

CREATE TABLE IF NOT EXISTS `student_docs` (
  `student_docs_id` int(6) NOT NULL AUTO_INCREMENT,
  `doc_category_id` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `student_docs_desc` varchar(50) DEFAULT NULL,
  `student_docs_path` varchar(150) NOT NULL,
  `student_docs_submit_date` date NOT NULL,
  PRIMARY KEY (`student_docs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_docs_trans`
--

CREATE TABLE IF NOT EXISTS `student_docs_trans` (
  `student_docs_trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `student_docs_trans_user_id` int(7) NOT NULL,
  `student_docs_trans_stud_docs_id` int(6) NOT NULL,
  PRIMARY KEY (`student_docs_trans_id`),
  KEY `fk_student_docs_id` (`student_docs_trans_stud_docs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
  `student_id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `student_roll_no` varchar(15) NOT NULL,
  `student_merit_no` varchar(15) DEFAULT NULL,
  `student_enroll_no` varchar(15) NOT NULL,
  `student_gr_no` bigint(15) DEFAULT NULL,
  `student_first_name` varchar(25) NOT NULL,
  `student_middle_name` varchar(25) NOT NULL,
  `student_last_name` varchar(25) NOT NULL,
  `student_father_name` varchar(25) DEFAULT NULL,
  `student_mother_name` varchar(25) DEFAULT NULL,
  `student_living_status` varchar(15) DEFAULT NULL,
  `student_adm_date` date DEFAULT NULL,
  `student_dob` date DEFAULT NULL,
  `student_birthplace` varchar(25) DEFAULT NULL,
  `student_gender` varchar(6) DEFAULT NULL,
  `student_guardian_name` varchar(100) DEFAULT NULL,
  `student_guardian_relation` varchar(20) DEFAULT NULL,
  `student_guardian_qualification` varchar(50) DEFAULT NULL,
  `student_guardian_occupation` varchar(50) DEFAULT NULL,
  `student_guardian_income` varchar(15) DEFAULT NULL,
  `student_guardian_occupation_address` varchar(100) DEFAULT NULL,
  `student_guardian_occupation_city` int(4) DEFAULT NULL,
  `student_guardian_city_pin` int(6) DEFAULT NULL,
  `student_guardian_home_address` varchar(100) DEFAULT NULL,
  `student_guardian_phoneno` bigint(15) DEFAULT NULL,
  `student_guardian_mobile` bigint(15) DEFAULT NULL,
  `student_email_id_1` varchar(60) NOT NULL,
  `student_email_id_2` varchar(60) DEFAULT NULL,
  `student_bloodgroup` varchar(3) DEFAULT NULL,
  `student_tally_ledger_name` varchar(30) DEFAULT NULL,
  `student_created_by` int(1) DEFAULT NULL,
  `student_creation_date` datetime DEFAULT NULL,
  `student_mobile_no` bigint(15) NOT NULL,
  `student_dtod_regular_status` varchar(20) NOT NULL,
  `student_info_transaction_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_notification`
--

CREATE TABLE IF NOT EXISTS `student_notification` (
  `student_notification_id` int(3) NOT NULL AUTO_INCREMENT,
  `student_notification_expire` datetime NOT NULL,
  `student_notification_alert_after_date` datetime NOT NULL,
  `student_notification_alert_before_date` datetime NOT NULL,
  `student_notification_content` text NOT NULL,
  `student_notification_link` varchar(30) NOT NULL,
  `student_notification_title` varchar(50) NOT NULL,
  `student_notification_from` int(3) NOT NULL,
  `student_notification_to` int(3) DEFAULT '0',
  `student_notification_org_id` int(3) NOT NULL,
  `student_notification_academic_term_id` int(3) DEFAULT '0',
  `student_notification_academic_period_id` int(3) DEFAULT '0',
  `student_notification_branch_id` int(3) DEFAULT '0',
  `student_notification_creation_date` date NOT NULL,
  `student_notification_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`student_notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_paid_fees_details`
--

CREATE TABLE IF NOT EXISTS `student_paid_fees_details` (
  `student_paid_fees_id` int(9) NOT NULL AUTO_INCREMENT,
  `student_paid_student_id` int(9) NOT NULL,
  `student_paid_course_id` int(3) NOT NULL,
  `student_paid_amount` int(9) NOT NULL,
  `student_paid_date` date NOT NULL,
  `student_paid_to` int(3) NOT NULL,
  PRIMARY KEY (`student_paid_fees_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_photos`
--

CREATE TABLE IF NOT EXISTS `student_photos` (
  `student_photos_id` int(5) NOT NULL AUTO_INCREMENT,
  `student_photos_desc` varchar(50) DEFAULT NULL,
  `student_photos_path` varchar(150) NOT NULL,
  PRIMARY KEY (`student_photos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_sms_email_details`
--

CREATE TABLE IF NOT EXISTS `student_sms_email_details` (
  `student_sms_email_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(3) NOT NULL,
  `academic_period_id` int(3) NOT NULL,
  `academic_name_id` int(3) NOT NULL,
  `division_id` int(3) NOT NULL,
  `student_id` int(3) NOT NULL,
  `message_email_text` text NOT NULL,
  `email_sms_status` int(3) NOT NULL,
  `created_by` int(3) NOT NULL,
  `creation_date` datetime NOT NULL,
  `shift_id` int(11) NOT NULL,
  `student_sms_email_organization_id` int(3) NOT NULL,
  `student_sms_email_details_ack` varchar(20) NOT NULL,
  `student_sms_email_details_schedule_flag` int(3) NOT NULL,
  `student_sms_email_details_schedule_minute` int(3) NOT NULL,
  `student_sms_email_details_schedule_date` int(3) DEFAULT NULL,
  `student_sms_email_details_hour` int(3) DEFAULT NULL,
  `student_sms_email_details_day` int(3) DEFAULT NULL,
  `student_sms_email_details_month` int(3) DEFAULT NULL,
  `student_sms_email_details_to_mobile` int(3) DEFAULT NULL,
  `student_sms_email_details_fees_msg_type` int(3) DEFAULT NULL,
  `student_sms_email_details_purpose` varchar(20) DEFAULT NULL,
  `student_sms_email_details_cron_no` int(3) NOT NULL,
  `student_sms_email_details_schedule_time_id` int(3) NOT NULL,
  PRIMARY KEY (`student_sms_email_id`),
  KEY `fk_acdm_period` (`academic_period_id`),
  KEY `fk_acdm_name` (`academic_name_id`),
  KEY `fk_stu_sms_bid` (`branch_id`),
  KEY `fk_stu_sms_shiftid` (`shift_id`),
  KEY `fk_stu_sms_divid` (`division_id`),
  KEY `fk_stu_sms_stuid` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_status_master`
--

CREATE TABLE IF NOT EXISTS `student_status_master` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(30) NOT NULL,
  `student_status_master_detain_shift_id` int(5) DEFAULT NULL,
  `creation_date` date NOT NULL,
  `created_by` int(5) NOT NULL,
  `organization_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_transaction`
--

CREATE TABLE IF NOT EXISTS `student_transaction` (
  `student_transaction_id` int(9) NOT NULL AUTO_INCREMENT,
  `student_transaction_user_id` int(5) NOT NULL,
  `student_transaction_student_id` int(5) NOT NULL,
  `student_transaction_detain_student_flag` int(5) DEFAULT NULL,
  `student_transaction_branch_id` int(2) NOT NULL,
  `student_transaction_category_id` int(2) DEFAULT NULL,
  `student_transaction_organization_id` int(2) NOT NULL,
  `student_transaction_student_address_id` int(5) DEFAULT NULL,
  `student_transaction_nationality_id` int(2) DEFAULT NULL,
  `student_transaction_quota_id` int(2) NOT NULL,
  `student_transaction_religion_id` int(2) DEFAULT NULL,
  `student_transaction_shift_id` int(2) NOT NULL,
  `student_transaction_languages_known_id` int(2) DEFAULT NULL,
  `student_transaction_student_photos_id` int(5) NOT NULL,
  `student_transaction_division_id` int(2) DEFAULT NULL,
  `student_transaction_batch_id` int(2) DEFAULT NULL,
  `student_academic_term_period_tran_id` int(2) NOT NULL,
  `student_academic_term_name_id` int(11) DEFAULT NULL,
  `student_transaction_cast_id` int(3) DEFAULT NULL,
  `student_transaction_parent_id` int(5) DEFAULT NULL,
  `student_transaction_course_id` int(3) NOT NULL,
  PRIMARY KEY (`student_transaction_id`),
  KEY `fk_organization` (`student_transaction_organization_id`),
  KEY `fk_nationality` (`student_transaction_nationality_id`),
  KEY `FK_student_id` (`student_transaction_student_id`),
  KEY `fk_std_photo` (`student_transaction_student_photos_id`),
  KEY `fk_std_term_period_id` (`student_academic_term_period_tran_id`),
  KEY `fk_lan_id` (`student_transaction_languages_known_id`),
  KEY `student_transaction_user_id` (`student_transaction_user_id`),
  KEY `student_transaction_detain_student_flag` (`student_transaction_detain_student_flag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailbox_conversation`
--

CREATE TABLE IF NOT EXISTS `tbl_mailbox_conversation` (
  `conversation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `initiator_id` int(10) NOT NULL,
  `interlocutor_id` int(10) NOT NULL,
  `subject` varchar(100) NOT NULL DEFAULT '',
  `bm_read` tinyint(3) NOT NULL DEFAULT '0',
  `bm_deleted` tinyint(3) NOT NULL DEFAULT '0',
  `modified` int(10) unsigned NOT NULL,
  `is_system` enum('yes','no') NOT NULL DEFAULT 'no',
  `initiator_del` tinyint(1) unsigned DEFAULT '0',
  `interlocutor_del` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`conversation_id`),
  KEY `initiator_id` (`initiator_id`),
  KEY `interlocutor_id` (`interlocutor_id`),
  KEY `conversation_ts` (`modified`),
  KEY `subject` (`subject`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailbox_message`
--

CREATE TABLE IF NOT EXISTS `tbl_mailbox_message` (
  `message_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `conversation_id` int(10) unsigned NOT NULL,
  `created` int(10) unsigned NOT NULL DEFAULT '0',
  `sender_id` int(10) unsigned NOT NULL DEFAULT '0',
  `recipient_id` int(10) unsigned NOT NULL DEFAULT '0',
  `text` mediumtext NOT NULL,
  `crc64` bigint(20) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `sender_profile_id` (`sender_id`),
  KEY `recipient_profile_id` (`recipient_id`),
  KEY `conversation_id` (`conversation_id`),
  KEY `timestamp` (`created`),
  KEY `crc64` (`crc64`),
  FULLTEXT KEY `text` (`text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unit_detail_table`
--

CREATE TABLE IF NOT EXISTS `unit_detail_table` (
  `unit_detail_id` int(9) NOT NULL AUTO_INCREMENT,
  `unit_detail_unit_master_id` int(9) NOT NULL,
  `unit_detail_course_id` int(9) NOT NULL,
  `unit_detail_title` varchar(300) NOT NULL,
  `unit_lec_date` date NOT NULL,
  `unit_detail_desc` mediumtext NOT NULL,
  `unit_detail_created_by` int(3) NOT NULL,
  `unit_detail_creation_date` date NOT NULL,
  PRIMARY KEY (`unit_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_organization_email_id` varchar(60) NOT NULL,
  `user_password` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `user_created_by` int(3) NOT NULL,
  `user_creation_date` datetime NOT NULL,
  `user_organization_id` int(5) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(30) NOT NULL,
  `created_by` int(3) NOT NULL,
  `creation_date` date NOT NULL,
  `user_type_organization_id` int(3) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_term`
--
ALTER TABLE `academic_term`
  ADD CONSTRAINT `academic_term_ibfk_1` FOREIGN KEY (`academic_term_period_id`) REFERENCES `academic_term_period` (`academic_terms_period_id`);

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_academic_record_trans`
--
ALTER TABLE `employee_academic_record_trans`
  ADD CONSTRAINT `fk_emp_eduboard` FOREIGN KEY (`employee_academic_record_trans_eduboard_id`) REFERENCES `eduboard` (`eduboard_id`),
  ADD CONSTRAINT `fk_emp_qualification` FOREIGN KEY (`employee_academic_record_trans_qualification_id`) REFERENCES `qualification` (`qualification_id`);

--
-- Constraints for table `employee_docs_trans`
--
ALTER TABLE `employee_docs_trans`
  ADD CONSTRAINT `fk_emp_docs_id` FOREIGN KEY (`employee_docs_trans_emp_docs_id`) REFERENCES `employee_docs` (`employee_docs_id`);

--
-- Constraints for table `employee_transaction`
--
ALTER TABLE `employee_transaction`
  ADD CONSTRAINT `employee_transaction_ibfk_1` FOREIGN KEY (`employee_transaction_user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`employee_transaction_department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `fk_designation` FOREIGN KEY (`employee_transaction_designation_id`) REFERENCES `employee_designation` (`employee_designation_id`),
  ADD CONSTRAINT `fk_emp_info` FOREIGN KEY (`employee_transaction_employee_id`) REFERENCES `employee_info` (`employee_id`),
  ADD CONSTRAINT `fk_emp_photo` FOREIGN KEY (`employee_transaction_emp_photos_id`) REFERENCES `employee_photos` (`employee_photos_id`),
  ADD CONSTRAINT `fk_nationality` FOREIGN KEY (`employee_transaction_nationality_id`) REFERENCES `nationality` (`nationality_id`);

--
-- Constraints for table `Rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_academic_record_trans`
--
ALTER TABLE `student_academic_record_trans`
  ADD CONSTRAINT `fk_eduboard` FOREIGN KEY (`student_academic_record_trans_eduboard_id`) REFERENCES `eduboard` (`eduboard_id`),
  ADD CONSTRAINT `fk_qualification` FOREIGN KEY (`student_academic_record_trans_qualification_id`) REFERENCES `qualification` (`qualification_id`);

--
-- Constraints for table `student_docs_trans`
--
ALTER TABLE `student_docs_trans`
  ADD CONSTRAINT `fk_student_docs_id` FOREIGN KEY (`student_docs_trans_stud_docs_id`) REFERENCES `student_docs` (`student_docs_id`);

--
-- Constraints for table `student_transaction`
--
ALTER TABLE `student_transaction`
  ADD CONSTRAINT `batch_ibfk_4` FOREIGN KEY (`student_academic_term_period_tran_id`) REFERENCES `academic_term_period` (`academic_terms_period_id`),
  ADD CONSTRAINT `fk_lan_id` FOREIGN KEY (`student_transaction_languages_known_id`) REFERENCES `languages_known` (`languages_known_id`),
  ADD CONSTRAINT `student_transaction_ibfk_1` FOREIGN KEY (`student_transaction_user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `student_transaction_ibfk_2` FOREIGN KEY (`student_transaction_detain_student_flag`) REFERENCES `student_status_master` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
