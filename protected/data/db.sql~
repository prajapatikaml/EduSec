-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2014 at 01:00 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demonew`
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
  `current_sem` tinyint(4) DEFAULT NULL,
  `course_id` int(3) NOT NULL,
  PRIMARY KEY (`academic_term_id`),
  KEY `fk_period_id` (`academic_term_period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `academic_terms_period_created_by` int(2) NOT NULL,
  `academic_terms_period_creation_date` datetime NOT NULL,
  PRIMARY KEY (`academic_terms_period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `st_id` int(10) NOT NULL,
  `employee_id` int(3) NOT NULL,
  `attendence` varchar(10) DEFAULT NULL,
  `sub_id` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `attendence_date` date NOT NULL,
  `student_attendence_period_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_a_subid` (`sub_id`),
  KEY `fk_a_stid` (`st_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
('AcademicTerm.ReqTest', 0, NULL, NULL, 'N;'),
('AcademicTerm.Update', 0, NULL, NULL, 'N;'),
('AcademicTerm.View', 0, NULL, NULL, 'N;'),
('AcademicTermC.*', 1, NULL, NULL, 'N;'),
('AcademicTermC.AcademicTermExportExcel', 0, NULL, NULL, 'N;'),
('AcademicTermC.AcademicTermGeneratePdf', 0, NULL, NULL, 'N;'),
('AcademicTermC.Admin', 0, NULL, NULL, 'N;'),
('AcademicTermC.Create', 0, NULL, NULL, 'N;'),
('AcademicTermC.Delete', 0, NULL, NULL, 'N;'),
('AcademicTermC.Index', 0, NULL, NULL, 'N;'),
('AcademicTermC.ReqTest', 0, NULL, NULL, 'N;'),
('AcademicTermC.Update', 0, NULL, NULL, 'N;'),
('AcademicTermC.View', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.*', 1, NULL, NULL, 'N;'),
('AcademicTermPeriod.AcademicTermPeriodExportExcel', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.AcademicTermPeriodGeneratePdf', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Admin', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Create', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Delete', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Index', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.Update', 0, NULL, NULL, 'N;'),
('AcademicTermPeriod.View', 0, NULL, NULL, 'N;'),
('AcademicTermPeriodC.*', 1, NULL, NULL, 'N;'),
('AcademicTermPeriodC.AcademicTermPeriodExportExcel', 0, NULL, NULL, 'N;'),
('AcademicTermPeriodC.AcademicTermPeriodGeneratePdf', 0, NULL, NULL, 'N;'),
('AcademicTermPeriodC.Admin', 0, NULL, NULL, 'N;'),
('AcademicTermPeriodC.Create', 0, NULL, NULL, 'N;'),
('AcademicTermPeriodC.Delete', 0, NULL, NULL, 'N;'),
('AcademicTermPeriodC.Index', 0, NULL, NULL, 'N;'),
('AcademicTermPeriodC.Update', 0, NULL, NULL, 'N;'),
('AcademicTermPeriodC.View', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.*', 1, NULL, NULL, 'N;'),
('Assignment.Assignment.Admin', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.Assignmentreport', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.Assignmentreportview', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.Backgroundnotice', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.Create', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.Delete', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.EmpAssignments', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.StudAssignments', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.Update', 0, NULL, NULL, 'N;'),
('Assignment.Assignment.View', 0, NULL, NULL, 'N;'),
('Assignment.AssignmentTrans.*', 1, NULL, NULL, 'N;'),
('Assignment.AssignmentTrans.Admin', 0, NULL, NULL, 'N;'),
('Assignment.AssignmentTrans.Create', 0, NULL, NULL, 'N;'),
('Assignment.AssignmentTrans.Delete', 0, NULL, NULL, 'N;'),
('Assignment.AssignmentTrans.StudAssignments', 0, NULL, NULL, 'N;'),
('Assignment.AssignmentTrans.Update', 0, NULL, NULL, 'N;'),
('Assignment.AssignmentTrans.View', 0, NULL, NULL, 'N;'),
('Assignment.Default.*', 1, NULL, NULL, 'N;'),
('Assignment.Default.Index', 0, NULL, NULL, 'N;'),
('Assignment.Dependent.*', 1, NULL, NULL, 'N;'),
('Assignment.Dependent.GetAssignments', 0, NULL, NULL, 'N;'),
('Assignment.Dependent.View', 0, NULL, NULL, 'N;'),
('Assignment.ExportToPDFExcel.*', 1, NULL, NULL, 'N;'),
('Assignment.ExportToPDFExcel.AssignmentGenerateExcel', 0, NULL, NULL, 'N;'),
('Assignment.ExportToPDFExcel.AssignmentGeneratePdf', 0, NULL, NULL, 'N;'),
('Assignment.ExportToPDFExcel.AssignmentTransGenerateExcel', 0, NULL, NULL, 'N;'),
('Assignment.ExportToPDFExcel.AssignmentTransGeneratePdf', 0, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Backup.DatabaseBackupCron.*', 1, NULL, NULL, 'N;'),
('Backup.DatabaseBackupCron.Admin', 0, NULL, NULL, 'N;'),
('Backup.DatabaseBackupCron.Create', 0, NULL, NULL, 'N;'),
('Backup.DatabaseBackupCron.Delete', 0, NULL, NULL, 'N;'),
('Backup.DatabaseBackupCron.Update', 0, NULL, NULL, 'N;'),
('Backup.DatabaseBackupCron.View', 0, NULL, NULL, 'N;'),
('Backup.Default.*', 1, NULL, NULL, 'N;'),
('Backup.Default.Clean', 0, NULL, NULL, 'N;'),
('Backup.Default.Create', 0, NULL, NULL, 'N;'),
('Backup.Default.CronCreate', 0, NULL, NULL, 'N;'),
('Backup.Default.Delete', 0, NULL, NULL, 'N;'),
('Backup.Default.Download', 0, NULL, NULL, 'N;'),
('Backup.Default.Index', 0, NULL, NULL, 'N;'),
('Backup.Default.Restore', 0, NULL, NULL, 'N;'),
('Backup.Default.Syncdown', 0, NULL, NULL, 'N;'),
('Backup.Default.Upload', 0, NULL, NULL, 'N;'),
('Backup.ExportToPDFExcel.*', 1, NULL, NULL, 'N;'),
('Backup.ExportToPDFExcel.ScheduleBackupGenerateExcel', 0, NULL, NULL, 'N;'),
('Backup.ExportToPDFExcel.ScheduleBackupGeneratePdf', 0, NULL, NULL, 'N;'),
('BarcodeGenerator.*', 1, NULL, NULL, 'N;'),
('BarcodeGenerator.GenerateBarcode', 0, NULL, NULL, 'N;'),
('Batch.*', 1, NULL, NULL, 'N;'),
('Batch.Admin', 0, NULL, NULL, 'N;'),
('Batch.Create', 0, NULL, NULL, 'N;'),
('Batch.Delete', 0, NULL, NULL, 'N;'),
('Batch.Update', 0, NULL, NULL, 'N;'),
('Batch.View', 0, NULL, NULL, 'N;'),
('BatchC.*', 1, NULL, NULL, 'N;'),
('BatchC.Admin', 0, NULL, NULL, 'N;'),
('BatchC.Create', 0, NULL, NULL, 'N;'),
('BatchC.Delete', 0, NULL, NULL, 'N;'),
('BatchC.Update', 0, NULL, NULL, 'N;'),
('BatchC.View', 0, NULL, NULL, 'N;'),
('Certificate.*', 1, NULL, NULL, 'N;'),
('Certificate.Admin', 0, NULL, NULL, 'N;'),
('Certificate.Certificategeneration', 0, NULL, NULL, 'N;'),
('Certificate.Certiview', 0, NULL, NULL, 'N;'),
('Certificate.Create', 0, NULL, NULL, 'N;'),
('Certificate.Delete', 0, NULL, NULL, 'N;'),
('Certificate.EmployeeCertificategeneration', 0, NULL, NULL, 'N;'),
('Certificate.SaveEmployeeCertificatedata', 0, NULL, NULL, 'N;'),
('Certificate.SaveStudentCertificatedata', 0, NULL, NULL, 'N;'),
('Certificate.SingleCertificate', 0, NULL, NULL, 'N;'),
('Certificate.Update', 0, NULL, NULL, 'N;'),
('Certificate.View', 0, NULL, NULL, 'N;'),
('City.*', 1, NULL, NULL, 'N;'),
('City.Admin', 0, NULL, NULL, 'N;'),
('City.Create', 0, NULL, NULL, 'N;'),
('City.Delete', 0, NULL, NULL, 'N;'),
('City.Update', 0, NULL, NULL, 'N;'),
('City.View', 0, NULL, NULL, 'N;'),
('Country.*', 1, NULL, NULL, 'N;'),
('Country.Admin', 0, NULL, NULL, 'N;'),
('Country.Create', 0, NULL, NULL, 'N;'),
('Country.Delete', 0, NULL, NULL, 'N;'),
('Country.Update', 0, NULL, NULL, 'N;'),
('Country.View', 0, NULL, NULL, 'N;'),
('Course.*', 1, NULL, NULL, 'N;'),
('Course.Admin', 0, NULL, NULL, 'N;'),
('Course.Create', 0, NULL, NULL, 'N;'),
('Course.Delete', 0, NULL, NULL, 'N;'),
('Course.Update', 0, NULL, NULL, 'N;'),
('Course.View', 0, NULL, NULL, 'N;'),
('CoursewiseSubjectTable.*', 1, NULL, NULL, 'N;'),
('CoursewiseSubjectTable.Admin', 0, NULL, NULL, 'N;'),
('CoursewiseSubjectTable.Create', 0, NULL, NULL, 'N;'),
('CoursewiseSubjectTable.Delete', 0, NULL, NULL, 'N;'),
('CoursewiseSubjectTable.Update', 0, NULL, NULL, 'N;'),
('CoursewiseSubjectTable.View', 0, NULL, NULL, 'N;'),
('Dashboard.*', 1, NULL, NULL, 'N;'),
('Dashboard.AictReport', 0, NULL, NULL, 'N;'),
('Dashboard.Dashboard', 0, NULL, NULL, 'N;'),
('Dashboard.MyProfile', 0, NULL, NULL, 'N;'),
('DashboardC.*', 1, NULL, NULL, 'N;'),
('DashboardC.AictReport', 0, NULL, NULL, 'N;'),
('DashboardC.Dashboard', 0, NULL, NULL, 'N;'),
('DashboardC.MyProfile', 0, NULL, NULL, 'N;'),
('Department.*', 1, NULL, NULL, 'N;'),
('Department.Admin', 0, NULL, NULL, 'N;'),
('Department.Create', 0, NULL, NULL, 'N;'),
('Department.Delete', 0, NULL, NULL, 'N;'),
('Department.Update', 0, NULL, NULL, 'N;'),
('Department.View', 0, NULL, NULL, 'N;'),
('Dependent.*', 1, NULL, NULL, 'N;'),
('Dependent.AutoCompleteLookup', 0, NULL, NULL, 'N;'),
('Dependent.Branchreceiptdivision', 0, NULL, NULL, 'N;'),
('Dependent.Getattendancediv', 0, NULL, NULL, 'N;'),
('Dependent.GetStudCertiSem', 0, NULL, NULL, 'N;'),
('Dependent.Getsubject', 0, NULL, NULL, 'N;'),
('Dependent.Gettimetablediv', 0, NULL, NULL, 'N;'),
('Dependent.SemEndSemester', 0, NULL, NULL, 'N;'),
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
('DependentC.*', 1, NULL, NULL, 'N;'),
('DependentC.AutoCompleteLookup', 0, NULL, NULL, 'N;'),
('DependentC.Branchreceiptdivision', 0, NULL, NULL, 'N;'),
('DependentC.Getattendancediv', 0, NULL, NULL, 'N;'),
('DependentC.GetStudCertiSem', 0, NULL, NULL, 'N;'),
('DependentC.Getsubject', 0, NULL, NULL, 'N;'),
('DependentC.Gettimetablediv', 0, NULL, NULL, 'N;'),
('DependentC.SemEndSemester', 0, NULL, NULL, 'N;'),
('DependentC.UpdateEmpCCities', 0, NULL, NULL, 'N;'),
('DependentC.UpdateEmpCStates', 0, NULL, NULL, 'N;'),
('DependentC.UpdateEmpPCities', 0, NULL, NULL, 'N;'),
('DependentC.UpdateEmpPStates', 0, NULL, NULL, 'N;'),
('DependentC.UpdateItemCategory', 0, NULL, NULL, 'N;'),
('DependentC.UpdateStudCCities', 0, NULL, NULL, 'N;'),
('DependentC.UpdateStudCStates', 0, NULL, NULL, 'N;'),
('DependentC.UpdateStudPCities', 0, NULL, NULL, 'N;'),
('DependentC.UpdateStudPStates', 0, NULL, NULL, 'N;'),
('DependentC.View', 0, NULL, NULL, 'N;'),
('Document', 0, 'Document', NULL, 'N;'),
('DocumentCategoryMaster.*', 1, NULL, NULL, 'N;'),
('DocumentCategoryMaster.Admin', 0, NULL, NULL, 'N;'),
('DocumentCategoryMaster.Create', 0, NULL, NULL, 'N;'),
('DocumentCategoryMaster.Delete', 0, NULL, NULL, 'N;'),
('DocumentCategoryMaster.Update', 0, NULL, NULL, 'N;'),
('DocumentCategoryMaster.View', 0, NULL, NULL, 'N;'),
('Eduboard.*', 1, NULL, NULL, 'N;'),
('Eduboard.Admin', 0, NULL, NULL, 'N;'),
('Eduboard.Create', 0, NULL, NULL, 'N;'),
('Eduboard.Delete', 0, NULL, NULL, 'N;'),
('Eduboard.Update', 0, NULL, NULL, 'N;'),
('Eduboard.View', 0, NULL, NULL, 'N;'),
('ElectiveSubjectClass.*', 1, NULL, NULL, 'N;'),
('ElectiveSubjectClass.Admin', 0, NULL, NULL, 'N;'),
('ElectiveSubjectClass.AssignElecClass', 0, NULL, NULL, 'N;'),
('ElectiveSubjectClass.Create', 0, NULL, NULL, 'N;'),
('ElectiveSubjectClass.Delete', 0, NULL, NULL, 'N;'),
('ElectiveSubjectClass.Update', 0, NULL, NULL, 'N;'),
('ElectiveSubjectClass.View', 0, NULL, NULL, 'N;'),
('ElectiveSubjectDetails.*', 1, NULL, NULL, 'N;'),
('ElectiveSubjectDetails.Admin', 0, NULL, NULL, 'N;'),
('ElectiveSubjectDetails.Create', 0, NULL, NULL, 'N;'),
('ElectiveSubjectDetails.Delete', 0, NULL, NULL, 'N;'),
('ElectiveSubjectDetails.Electivesubjectcreate', 0, NULL, NULL, 'N;'),
('ElectiveSubjectDetails.Index', 0, NULL, NULL, 'N;'),
('ElectiveSubjectDetails.Update', 0, NULL, NULL, 'N;'),
('ElectiveSubjectDetails.View', 0, NULL, NULL, 'N;'),
('Employee', 2, 'Employee', NULL, 'N;'),
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
('Employee.EmployeeAddressC.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeAddressC.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddressC.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddressC.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddressC.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddressC.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAddressC.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Attendenceimport', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Employeeupdate', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Monthlyempattendance', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Singleemployeeupdate', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Singlemonthattendence', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeAttendence.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeCertificateDetailsTable.EmployeeCertificates', 0, NULL, NULL, 'N;'),
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
('Employee.EmployeeDocsTrans.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeDocsTrans.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeExperienceTrans.EmployeeExperience', 0, NULL, NULL, 'N;'),
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
('Employee.EmployeeSmsEmailDetails.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.Background', 0, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.Backgroundmsg', 0, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.DoChacked', 0, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.EmployeeBulkSmsEmail', 0, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.Index', 0, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.Mycreate', 0, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeSmsEmailDetails.View', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.EmployeeAcademicRecords', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.EmployeeCertificates', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Employeecontact', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Employeedocs', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.EmployeeExperience', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Leftresignemployee', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.PhotoDelete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Resignemployee', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Transferemployee', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransaction.Transferemployeeexcel', 0, NULL, NULL, 'N;'),
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
('Employee.EmployeeTransactionC.*', 1, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Admin', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Create', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Delete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.EmployeeAcademicRecords', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.EmployeeCertificates', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Employeecontact', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Employeedocs', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.EmployeeExperience', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Leftresignemployee', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.PhotoDelete', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Resignemployee', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Transferemployee', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Transferemployeeexcel', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Update', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.UpdateCCities', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.UpdateCStates', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.UpdatePCities', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Updateprofilephoto', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Updateprofiletab1', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Updateprofiletab2', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Updateprofiletab3', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.Updateprofiletab4', 0, NULL, NULL, 'N;'),
('Employee.EmployeeTransactionC.UpdatePStates', 0, NULL, NULL, 'N;'),
('Employee.ExcelSheetFormat.*', 1, NULL, NULL, 'N;'),
('Employee.ExcelSheetFormat.Admin', 0, NULL, NULL, 'N;'),
('Employee.ExcelSheetFormat.Create', 0, NULL, NULL, 'N;'),
('Employee.ExcelSheetFormat.Delete', 0, NULL, NULL, 'N;'),
('Employee.ExcelSheetFormat.GenerateExcel', 0, NULL, NULL, 'N;'),
('Employee.ExcelSheetFormat.GeneratePdf', 0, NULL, NULL, 'N;'),
('Employee.ExcelSheetFormat.Index', 0, NULL, NULL, 'N;'),
('Employee.ExcelSheetFormat.Update', 0, NULL, NULL, 'N;'),
('Employee.ExcelSheetFormat.View', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.*', 1, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.CertificateExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.CertificateExportToPdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmpcertificateGenerateExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmpcertificateGeneratePdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeAttendenceExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeAttendenceExportToPdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.Employeecontactexcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeedataExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeExportToPdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.EmployeeFinalViewExportToPdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.FeedbackMasterExportToExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.FeedbackMasterExportToPdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.Resignemployeeexcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.StudentAttendenceEmailGenerateExcel', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.StudentAttendenceEmailGeneratePdf', 0, NULL, NULL, 'N;'),
('Employee.ExportToPDFExcel.Transferemployeeexcel', 0, NULL, NULL, 'N;'),
('Employee.StudentAttendenceEmail.*', 1, NULL, NULL, 'N;'),
('Employee.StudentAttendenceEmail.Admin', 0, NULL, NULL, 'N;'),
('Employee.StudentAttendenceEmail.Create', 0, NULL, NULL, 'N;'),
('Employee.StudentAttendenceEmail.Delete', 0, NULL, NULL, 'N;'),
('Employee.StudentAttendenceEmail.EmployeeChecked', 0, NULL, NULL, 'N;'),
('Employee.StudentAttendenceEmail.Index', 0, NULL, NULL, 'N;'),
('Employee.StudentAttendenceEmail.Update', 0, NULL, NULL, 'N;'),
('Employee.StudentAttendenceEmail.View', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.*', 1, NULL, NULL, 'N;'),
('EmployeeDesignation.Admin', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.Create', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.Delete', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.Update', 0, NULL, NULL, 'N;'),
('EmployeeDesignation.View', 0, NULL, NULL, 'N;'),
('Employeemodule', 0, 'Employeemodule', NULL, 'N;'),
('EmployeeTransaction.UpdateEmployeeData', 0, 'EmployeeTransaction.UpdateEmployeeData', NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.*', 1, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.Admin', 0, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.Create', 0, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.Delete', 0, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.Facultyexamtimetable', 0, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.GenerateExcel', 0, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.GeneratePdf', 0, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.Scheduleexamlist', 0, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.Studentexamtimetable', 0, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.Update', 0, NULL, NULL, 'N;'),
('Exam.BranchSubjectwiseScheduling.View', 0, NULL, NULL, 'N;'),
('Exam.Default.*', 1, NULL, NULL, 'N;'),
('Exam.Default.Index', 0, NULL, NULL, 'N;'),
('Exam.Dependent.*', 1, NULL, NULL, 'N;'),
('Exam.Dependent.Branchwiseschedule', 0, NULL, NULL, 'N;'),
('Exam.Dependent.Getexamroom', 0, NULL, NULL, 'N;'),
('Exam.Dependent.Getfaculty', 0, NULL, NULL, 'N;'),
('Exam.Dependent.GetresultSemester', 0, NULL, NULL, 'N;'),
('Exam.Dependent.Getroomsubjects', 0, NULL, NULL, 'N;'),
('Exam.Dependent.GetSemester', 0, NULL, NULL, 'N;'),
('Exam.Dependent.Getsubjects', 0, NULL, NULL, 'N;'),
('Exam.ExamFinalResult.*', 1, NULL, NULL, 'N;'),
('Exam.ExamFinalResult.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamFinalResult.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamFinalResult.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamFinalResult.Studentresults', 0, NULL, NULL, 'N;'),
('Exam.ExamFinalResult.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamFinalResult.View', 0, NULL, NULL, 'N;'),
('Exam.ExamHallMapping.*', 1, NULL, NULL, 'N;'),
('Exam.ExamHallMapping.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamHallMapping.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamHallMapping.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamHallMapping.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamHallMapping.View', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleAssignment.*', 1, NULL, NULL, 'N;'),
('Exam.ExamRoleAssignment.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleAssignment.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleAssignment.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleAssignment.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleAssignment.View', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleManagement.*', 1, NULL, NULL, 'N;'),
('Exam.ExamRoleManagement.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleManagement.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleManagement.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleManagement.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamRoleManagement.View', 0, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.*', 1, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.Assignfaculty', 0, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.Facultyroomassigment', 0, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.RoomAssignment', 0, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.Selectroom', 0, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamRoomAllocation.View', 0, NULL, NULL, 'N;'),
('Exam.ExamScheduled.*', 1, NULL, NULL, 'N;'),
('Exam.ExamScheduled.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamScheduled.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamScheduled.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamScheduled.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamScheduled.View', 0, NULL, NULL, 'N;'),
('Exam.ExamSeatNumberMapping.*', 1, NULL, NULL, 'N;'),
('Exam.ExamSeatNumberMapping.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamSeatNumberMapping.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamSeatNumberMapping.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamSeatNumberMapping.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamSeatNumberMapping.View', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentAttendance.*', 1, NULL, NULL, 'N;'),
('Exam.ExamStudentAttendance.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentAttendance.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentAttendance.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentAttendance.Listexam', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentAttendance.Showstudents', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentAttendance.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentAttendance.View', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentResult.*', 1, NULL, NULL, 'N;'),
('Exam.ExamStudentResult.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentResult.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentResult.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentResult.Examresultstudentlist', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentResult.Transcript', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentResult.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamStudentResult.View', 0, NULL, NULL, 'N;'),
('Exam.ExamSubType.*', 1, NULL, NULL, 'N;'),
('Exam.ExamSubType.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamSubType.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamSubType.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamSubType.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamSubType.View', 0, NULL, NULL, 'N;'),
('Exam.ExamTypeTable.*', 1, NULL, NULL, 'N;'),
('Exam.ExamTypeTable.Admin', 0, NULL, NULL, 'N;'),
('Exam.ExamTypeTable.Create', 0, NULL, NULL, 'N;'),
('Exam.ExamTypeTable.Delete', 0, NULL, NULL, 'N;'),
('Exam.ExamTypeTable.Update', 0, NULL, NULL, 'N;'),
('Exam.ExamTypeTable.View', 0, NULL, NULL, 'N;'),
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
('FeedbackCategoryMaster.*', 1, NULL, NULL, 'N;'),
('FeedbackCategoryMaster.Admin', 0, NULL, NULL, 'N;'),
('FeedbackCategoryMaster.Create', 0, NULL, NULL, 'N;'),
('FeedbackCategoryMaster.Delete', 0, NULL, NULL, 'N;'),
('FeedbackCategoryMaster.Update', 0, NULL, NULL, 'N;'),
('FeedbackCategoryMaster.View', 0, NULL, NULL, 'N;'),
('FeedbackDetails.*', 1, NULL, NULL, 'N;'),
('FeedbackDetails.Admin', 0, NULL, NULL, 'N;'),
('FeedbackDetails.Create', 0, NULL, NULL, 'N;'),
('FeedbackDetails.Delete', 0, NULL, NULL, 'N;'),
('FeedbackDetails.Msg', 0, NULL, NULL, 'N;'),
('FeedbackDetails.Mycreate', 0, NULL, NULL, 'N;'),
('FeedbackDetails.Question', 0, NULL, NULL, 'N;'),
('FeedbackDetails.Update', 0, NULL, NULL, 'N;'),
('FeedbackDetails.View', 0, NULL, NULL, 'N;'),
('FeedbackDetailsTable.*', 1, NULL, NULL, 'N;'),
('FeedbackDetailsTable.Admin', 0, NULL, NULL, 'N;'),
('FeedbackDetailsTable.Create', 0, NULL, NULL, 'N;'),
('FeedbackDetailsTable.Delete', 0, NULL, NULL, 'N;'),
('FeedbackDetailsTable.Index', 0, NULL, NULL, 'N;'),
('FeedbackDetailsTable.StudentPerformance', 0, NULL, NULL, 'N;'),
('FeedbackDetailsTable.Update', 0, NULL, NULL, 'N;'),
('FeedbackDetailsTable.View', 0, NULL, NULL, 'N;'),
('FeedbackMaster.*', 1, NULL, NULL, 'N;'),
('FeedbackMaster.Admin', 0, NULL, NULL, 'N;'),
('FeedbackMaster.Create', 0, NULL, NULL, 'N;'),
('FeedbackMaster.Delete', 0, NULL, NULL, 'N;'),
('FeedbackMaster.Update', 0, NULL, NULL, 'N;'),
('FeedbackMaster.View', 0, NULL, NULL, 'N;'),
('Fees', 0, 'Fees', NULL, 'N;'),
('Fees.BankMaster.*', 1, NULL, NULL, 'N;'),
('Fees.BankMaster.Admin', 0, NULL, NULL, 'N;'),
('Fees.BankMaster.Create', 0, NULL, NULL, 'N;'),
('Fees.BankMaster.Delete', 0, NULL, NULL, 'N;'),
('Fees.BankMaster.Update', 0, NULL, NULL, 'N;'),
('Fees.BankMaster.View', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.*', 1, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.Addfees', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.Admin', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.Create', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.Delete', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.Payfeescash', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.Payfeescheque', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.StudentFeesReport', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.Upadatefeescash', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.Update', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.Updatefeescheque', 0, NULL, NULL, 'N;'),
('Fees.FeesPaymentTransaction.View', 0, NULL, NULL, 'N;'),
('Gtunotice.*', 1, NULL, NULL, 'N;'),
('Gtunotice.Admin', 0, NULL, NULL, 'N;'),
('Gtunotice.Create', 0, NULL, NULL, 'N;'),
('Gtunotice.Delete', 0, NULL, NULL, 'N;'),
('Gtunotice.Update', 0, NULL, NULL, 'N;'),
('Gtunotice.View', 0, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('Holidays.*', 1, NULL, NULL, 'N;'),
('Holidays.Admin', 0, NULL, NULL, 'N;'),
('Holidays.Create', 0, NULL, NULL, 'N;'),
('Holidays.Delete', 0, NULL, NULL, 'N;'),
('Holidays.Index', 0, NULL, NULL, 'N;'),
('Holidays.Update', 0, NULL, NULL, 'N;'),
('Holidays.View', 0, NULL, NULL, 'N;'),
('Hostel.Default.*', 1, NULL, NULL, 'N;'),
('Hostel.Default.Index', 0, NULL, NULL, 'N;'),
('Hostel.Dependent.*', 1, NULL, NULL, 'N;'),
('Hostel.Dependent.Gethostel', 0, NULL, NULL, 'N;'),
('Hostel.Dependent.GetRoom', 0, NULL, NULL, 'N;'),
('Hostel.Dependent.OccupancyRoomCategory', 0, NULL, NULL, 'N;'),
('Hostel.Dependent.RoomCategory', 0, NULL, NULL, 'N;'),
('Hostel.Dependent.StudentOccupancy', 0, NULL, NULL, 'N;'),
('Hostel.Dependent.UpdateRoom', 0, NULL, NULL, 'N;'),
('Hostel.Dependent.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelBlocks.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelBlocks.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelBlocks.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelBlocks.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelBlocks.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelBlocks.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCash.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelFeesCash.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCash.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCash.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCash.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCash.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCheque.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelFeesCheque.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCheque.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCheque.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCheque.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesCheque.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.Index', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.Payfeescash', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.Payfeescheque', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.Printcashreceipt', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.Printchequereceipt', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.UpdatePayfeescash', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.UpdatePayfeescheque', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesPaymentTransaction.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesReceipt.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelFeesReceipt.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesReceipt.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesReceipt.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesReceipt.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesReceipt.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesStructure.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelFeesStructure.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesStructure.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesStructure.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesStructure.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelFeesStructure.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelInformation.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelInformation.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelInformation.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelInformation.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelInformation.Index', 0, NULL, NULL, 'N;'),
('Hostel.HostelInformation.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelInformation.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomMaster.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelRoomMaster.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomMaster.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomMaster.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomMaster.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomMaster.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatus.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatus.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatus.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatus.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatus.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatus.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatusMaster.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatusMaster.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatusMaster.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatusMaster.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatusMaster.Index', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatusMaster.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelRoomStatusMaster.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.Error', 0, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.Leave', 0, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.StudentList', 0, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.Transfer', 0, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelStudentRegistration.View', 0, NULL, NULL, 'N;'),
('Hostel.HostelType.*', 1, NULL, NULL, 'N;'),
('Hostel.HostelType.Admin', 0, NULL, NULL, 'N;'),
('Hostel.HostelType.Create', 0, NULL, NULL, 'N;'),
('Hostel.HostelType.Delete', 0, NULL, NULL, 'N;'),
('Hostel.HostelType.Update', 0, NULL, NULL, 'N;'),
('Hostel.HostelType.View', 0, NULL, NULL, 'N;'),
('ImportantNotice.*', 1, NULL, NULL, 'N;'),
('ImportantNotice.Admin', 0, NULL, NULL, 'N;'),
('ImportantNotice.Create', 0, NULL, NULL, 'N;'),
('ImportantNotice.Delete', 0, NULL, NULL, 'N;'),
('ImportantNotice.Index', 0, NULL, NULL, 'N;'),
('ImportantNotice.Update', 0, NULL, NULL, 'N;'),
('ImportantNotice.View', 0, NULL, NULL, 'N;'),
('Inventory.Assets.*', 1, NULL, NULL, 'N;'),
('Inventory.Assets.Admin', 0, NULL, NULL, 'N;'),
('Inventory.Assets.Create', 0, NULL, NULL, 'N;'),
('Inventory.Assets.Delete', 0, NULL, NULL, 'N;'),
('Inventory.Assets.Newview', 0, NULL, NULL, 'N;'),
('Inventory.Assets.Update', 0, NULL, NULL, 'N;'),
('Inventory.AssetsDetails.*', 1, NULL, NULL, 'N;'),
('Inventory.AssetsDetails.Admin', 0, NULL, NULL, 'N;'),
('Inventory.AssetsDetails.Create', 0, NULL, NULL, 'N;'),
('Inventory.AssetsDetails.Delete', 0, NULL, NULL, 'N;'),
('Inventory.AssetsDetails.Update', 0, NULL, NULL, 'N;'),
('Inventory.AssetsDetails.View', 0, NULL, NULL, 'N;'),
('Inventory.Dependent.*', 1, NULL, NULL, 'N;'),
('Inventory.Dependent.UpdateItemCategory', 0, NULL, NULL, 'N;'),
('Inventory.Dependent.View', 0, NULL, NULL, 'N;'),
('Inventory.Inward.*', 1, NULL, NULL, 'N;'),
('Inventory.Inward.Admin', 0, NULL, NULL, 'N;'),
('Inventory.Inward.Create', 0, NULL, NULL, 'N;'),
('Inventory.Inward.Delete', 0, NULL, NULL, 'N;'),
('Inventory.Inward.Newview', 0, NULL, NULL, 'N;'),
('Inventory.Inward.Update', 0, NULL, NULL, 'N;'),
('Inventory.InwardDetails.*', 1, NULL, NULL, 'N;'),
('Inventory.InwardDetails.Admin', 0, NULL, NULL, 'N;'),
('Inventory.InwardDetails.Create', 0, NULL, NULL, 'N;'),
('Inventory.InwardDetails.Delete', 0, NULL, NULL, 'N;'),
('Inventory.InwardDetails.Update', 0, NULL, NULL, 'N;'),
('Inventory.InwardDetails.View', 0, NULL, NULL, 'N;'),
('Inventory.Outward.*', 1, NULL, NULL, 'N;'),
('Inventory.Outward.Admin', 0, NULL, NULL, 'N;'),
('Inventory.Outward.Create', 0, NULL, NULL, 'N;'),
('Inventory.Outward.Delete', 0, NULL, NULL, 'N;'),
('Inventory.Outward.Newview', 0, NULL, NULL, 'N;'),
('Inventory.Outward.Update', 0, NULL, NULL, 'N;'),
('Inventory.OutwardDetails.*', 1, NULL, NULL, 'N;'),
('Inventory.OutwardDetails.Admin', 0, NULL, NULL, 'N;'),
('Inventory.OutwardDetails.Create', 0, NULL, NULL, 'N;'),
('Inventory.OutwardDetails.Delete', 0, NULL, NULL, 'N;'),
('Inventory.OutwardDetails.Update', 0, NULL, NULL, 'N;'),
('Inventory.OutwardDetails.View', 0, NULL, NULL, 'N;'),
('ItemCategory.*', 1, NULL, NULL, 'N;'),
('ItemCategory.Admin', 0, NULL, NULL, 'N;'),
('ItemCategory.Create', 0, NULL, NULL, 'N;'),
('ItemCategory.Delete', 0, NULL, NULL, 'N;'),
('ItemCategory.Update', 0, NULL, NULL, 'N;'),
('ItemCategory.View', 0, NULL, NULL, 'N;'),
('Languages.*', 1, NULL, NULL, 'N;'),
('Languages.Admin', 0, NULL, NULL, 'N;'),
('Languages.Create', 0, NULL, NULL, 'N;'),
('Languages.Delete', 0, NULL, NULL, 'N;'),
('Languages.Update', 0, NULL, NULL, 'N;'),
('Languages.View', 0, NULL, NULL, 'N;'),
('LanguagesKnown.*', 1, NULL, NULL, 'N;'),
('LanguagesKnown.Admin', 0, NULL, NULL, 'N;'),
('LanguagesKnown.Create', 0, NULL, NULL, 'N;'),
('LanguagesKnown.Delete', 0, NULL, NULL, 'N;'),
('LanguagesKnown.Index', 0, NULL, NULL, 'N;'),
('LanguagesKnown.Update', 0, NULL, NULL, 'N;'),
('LanguagesKnown.View', 0, NULL, NULL, 'N;'),
('Library.BookInvoiceDetails.*', 1, NULL, NULL, 'N;'),
('Library.BookInvoiceDetails.Admin', 0, NULL, NULL, 'N;'),
('Library.BookInvoiceDetails.Create', 0, NULL, NULL, 'N;'),
('Library.BookInvoiceDetails.Delete', 0, NULL, NULL, 'N;'),
('Library.BookInvoiceDetails.Update', 0, NULL, NULL, 'N;'),
('Library.BookInvoiceDetails.View', 0, NULL, NULL, 'N;'),
('Library.BookPurchaseDetails.*', 1, NULL, NULL, 'N;'),
('Library.BookPurchaseDetails.Admin', 0, NULL, NULL, 'N;'),
('Library.BookPurchaseDetails.Create', 0, NULL, NULL, 'N;'),
('Library.BookPurchaseDetails.Delete', 0, NULL, NULL, 'N;'),
('Library.BookPurchaseDetails.Update', 0, NULL, NULL, 'N;'),
('Library.BookPurchaseDetails.View', 0, NULL, NULL, 'N;'),
('Library.BookVenderDetails.*', 1, NULL, NULL, 'N;'),
('Library.BookVenderDetails.Admin', 0, NULL, NULL, 'N;'),
('Library.BookVenderDetails.Create', 0, NULL, NULL, 'N;'),
('Library.BookVenderDetails.Delete', 0, NULL, NULL, 'N;'),
('Library.BookVenderDetails.Update', 0, NULL, NULL, 'N;'),
('Library.BookVenderDetails.View', 0, NULL, NULL, 'N;'),
('Library.Default.*', 1, NULL, NULL, 'N;'),
('Library.Default.Index', 0, NULL, NULL, 'N;'),
('Library.Dependent.*', 1, NULL, NULL, 'N;'),
('Library.Dependent.AutoCompleteLookup', 0, NULL, NULL, 'N;'),
('Library.Dependent.Autocompletelookupbookname', 0, NULL, NULL, 'N;'),
('Library.Dependent.AutoCompleteLookuplibrarian', 0, NULL, NULL, 'N;'),
('Library.Dependent.Autocompletelookupsubject', 0, NULL, NULL, 'N;'),
('Library.Dependent.Autocompletelookupvenername', 0, NULL, NULL, 'N;'),
('Library.Dependent.View', 0, NULL, NULL, 'N;'),
('Library.Librarybook.*', 1, NULL, NULL, 'N;'),
('Library.Librarybook.Booksearch', 0, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardMaster.*', 1, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardMaster.Admin', 0, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardMaster.Create', 0, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardMaster.Delete', 0, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardMaster.Update', 0, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardMaster.View', 0, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardShelfMaster.*', 1, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardShelfMaster.Admin', 0, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardShelfMaster.Create', 0, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardShelfMaster.Delete', 0, NULL, NULL, 'N;');
INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Library.LibraryBookCupboardShelfMaster.Update', 0, NULL, NULL, 'N;'),
('Library.LibraryBookCupboardShelfMaster.View', 0, NULL, NULL, 'N;'),
('Library.LibraryBookHolderRegistration.*', 1, NULL, NULL, 'N;'),
('Library.LibraryBookHolderRegistration.Admin', 0, NULL, NULL, 'N;'),
('Library.LibraryBookHolderRegistration.Create', 0, NULL, NULL, 'N;'),
('Library.LibraryBookHolderRegistration.Delete', 0, NULL, NULL, 'N;'),
('Library.LibraryBookHolderRegistration.Issuebook', 0, NULL, NULL, 'N;'),
('Library.LibraryBookHolderRegistration.Update', 0, NULL, NULL, 'N;'),
('Library.LibraryBookHolderRegistration.View', 0, NULL, NULL, 'N;'),
('Library.LibraryBookMaster.*', 1, NULL, NULL, 'N;'),
('Library.LibraryBookMaster.Admin', 0, NULL, NULL, 'N;'),
('Library.LibraryBookMaster.Create', 0, NULL, NULL, 'N;'),
('Library.LibraryBookMaster.Delete', 0, NULL, NULL, 'N;'),
('Library.LibraryBookMaster.Update', 0, NULL, NULL, 'N;'),
('Library.LibraryBookMaster.View', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStatusMaster.*', 1, NULL, NULL, 'N;'),
('Library.LibraryBookStatusMaster.Admin', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStatusMaster.Create', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStatusMaster.Delete', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStatusMaster.Update', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStatusMaster.View', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.*', 1, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.Admin', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.Create', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.Delete', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.Holderbookhistory', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.Renewbook', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.ReturnBook', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.Studempwisesearch', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.Update', 0, NULL, NULL, 'N;'),
('Library.LibraryBookStudentTransaction.View', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.*', 1, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Admin', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.AllBook', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Barcodebook', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Bookhistory', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Bookissue', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Bookissuebylibrarian', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Bookresult', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Booksearch', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Create', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Delete', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Librarianbookissue', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.ManageBookCupboard', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.MultiBarcodebook', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.Update', 0, NULL, NULL, 'N;'),
('Library.LibraryBookTransaction.View', 0, NULL, NULL, 'N;'),
('Library.LibraryBookType.*', 1, NULL, NULL, 'N;'),
('Library.LibraryBookType.Admin', 0, NULL, NULL, 'N;'),
('Library.LibraryBookType.Create', 0, NULL, NULL, 'N;'),
('Library.LibraryBookType.Delete', 0, NULL, NULL, 'N;'),
('Library.LibraryBookType.Update', 0, NULL, NULL, 'N;'),
('Library.LibraryBookType.View', 0, NULL, NULL, 'N;'),
('Library.LibraryLibrarianDetails.*', 1, NULL, NULL, 'N;'),
('Library.LibraryLibrarianDetails.Admin', 0, NULL, NULL, 'N;'),
('Library.LibraryLibrarianDetails.Create', 0, NULL, NULL, 'N;'),
('Library.LibraryLibrarianDetails.Delete', 0, NULL, NULL, 'N;'),
('Library.LibraryLibrarianDetails.Update', 0, NULL, NULL, 'N;'),
('Library.LibraryLibrarianDetails.View', 0, NULL, NULL, 'N;'),
('LoginUser.*', 1, NULL, NULL, 'N;'),
('LoginUser.Admin', 0, NULL, NULL, 'N;'),
('LoginUser.Create', 0, NULL, NULL, 'N;'),
('LoginUser.Delete', 0, NULL, NULL, 'N;'),
('LoginUser.Index', 0, NULL, NULL, 'N;'),
('LoginUser.Update', 0, NULL, NULL, 'N;'),
('LoginUser.View', 0, NULL, NULL, 'N;'),
('Mailbox.Ajax.*', 1, NULL, NULL, 'N;'),
('Mailbox.Ajax.Auto', 0, NULL, NULL, 'N;'),
('Mailbox.Message.*', 1, NULL, NULL, 'N;'),
('Mailbox.Message.Inbox', 0, NULL, NULL, 'N;'),
('Mailbox.Message.MyInbox', 0, NULL, NULL, 'N;'),
('Mailbox.Message.New', 0, NULL, NULL, 'N;'),
('Mailbox.Message.Reply', 0, NULL, NULL, 'N;'),
('Mailbox.Message.Sent', 0, NULL, NULL, 'N;'),
('Mailbox.Message.Trash', 0, NULL, NULL, 'N;'),
('Mailbox.Message.View', 0, NULL, NULL, 'N;'),
('Mailbox.News.*', 1, NULL, NULL, 'N;'),
('Mailbox.News.Index', 0, NULL, NULL, 'N;'),
('Mailbox.News.Info', 0, NULL, NULL, 'N;'),
('MessageOfDay.*', 1, NULL, NULL, 'N;'),
('MessageOfDay.Admin', 0, NULL, NULL, 'N;'),
('MessageOfDay.Create', 0, NULL, NULL, 'N;'),
('MessageOfDay.Delete', 0, NULL, NULL, 'N;'),
('MessageOfDay.Update', 0, NULL, NULL, 'N;'),
('MessageOfDay.View', 0, NULL, NULL, 'N;'),
('NationalHolidays.*', 1, NULL, NULL, 'N;'),
('NationalHolidays.Addholiday', 0, NULL, NULL, 'N;'),
('NationalHolidays.Admin', 0, NULL, NULL, 'N;'),
('NationalHolidays.Create', 0, NULL, NULL, 'N;'),
('NationalHolidays.Delete', 0, NULL, NULL, 'N;'),
('NationalHolidays.Update', 0, NULL, NULL, 'N;'),
('NationalHolidays.View', 0, NULL, NULL, 'N;'),
('Nationality.*', 1, NULL, NULL, 'N;'),
('Nationality.Admin', 0, NULL, NULL, 'N;'),
('Nationality.Create', 0, NULL, NULL, 'N;'),
('Nationality.Delete', 0, NULL, NULL, 'N;'),
('Nationality.Update', 0, NULL, NULL, 'N;'),
('Nationality.View', 0, NULL, NULL, 'N;'),
('Notification.Default.*', 1, NULL, NULL, 'N;'),
('Notification.Default.AddEndOfWorld', 0, NULL, NULL, 'N;'),
('Notification.Default.Index', 0, NULL, NULL, 'N;'),
('Notification.Dependent.*', 1, NULL, NULL, 'N;'),
('Notification.Dependent.Index', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.*', 1, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.Admin', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.AjaxRequest', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.Create', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.Delete', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.Index', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.Messageform', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.Notify', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.Read', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.Update', 0, NULL, NULL, 'N;'),
('Notification.EmployeeNotification.View', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.*', 1, NULL, NULL, 'N;'),
('Notification.StudentNotification.Admin', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.AjaxRequest', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.Create', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.Delete', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.Index', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.Messageform', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.Notify', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.Read', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.Update', 0, NULL, NULL, 'N;'),
('Notification.StudentNotification.View', 0, NULL, NULL, 'N;'),
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
('PhotoGallery.*', 1, NULL, NULL, 'N;'),
('PhotoGallery.Admin', 0, NULL, NULL, 'N;'),
('PhotoGallery.Create', 0, NULL, NULL, 'N;'),
('PhotoGallery.Delete', 0, NULL, NULL, 'N;'),
('PhotoGallery.Multiupload', 0, NULL, NULL, 'N;'),
('PhotoGallery.Update', 0, NULL, NULL, 'N;'),
('PhotoGallery.Upload', 0, NULL, NULL, 'N;'),
('PhotoGallery.View', 0, NULL, NULL, 'N;'),
('PhotoGallery.Viewalbum', 0, NULL, NULL, 'N;'),
('Qualification.*', 1, NULL, NULL, 'N;'),
('Qualification.Admin', 0, NULL, NULL, 'N;'),
('Qualification.Create', 0, NULL, NULL, 'N;'),
('Qualification.Delete', 0, NULL, NULL, 'N;'),
('Qualification.Update', 0, NULL, NULL, 'N;'),
('Qualification.View', 0, NULL, NULL, 'N;'),
('Report.*', 1, NULL, NULL, 'N;'),
('Report.BranchwiseAllStudentsFeesDetailInfoReport', 0, NULL, NULL, 'N;'),
('Report.DailyDivisionwiseStudentAttendenceReport', 0, NULL, NULL, 'N;'),
('Report.DepartmentwiseEmployeeInfoReport', 0, NULL, NULL, 'N;'),
('Report.Documentsearch', 0, NULL, NULL, 'N;'),
('Report.Documentsearchview', 0, NULL, NULL, 'N;'),
('Report.Documentsearchview1', 0, NULL, NULL, 'N;'),
('Report.Employeeid', 0, NULL, NULL, 'N;'),
('Report.EmployeeInfoReport', 0, NULL, NULL, 'N;'),
('Report.EmployeeLeaveInfoReport', 0, NULL, NULL, 'N;'),
('Report.HostelRoomAllocatoin', 0, NULL, NULL, 'N;'),
('Report.Myholidays', 0, NULL, NULL, 'N;'),
('Report.Mysubjects', 0, NULL, NULL, 'N;'),
('Report.PostLabelStudent', 0, NULL, NULL, 'N;'),
('Report.SelectedEmployeeList', 0, NULL, NULL, 'N;'),
('Report.SelectedList', 0, NULL, NULL, 'N;'),
('Report.StudentDocumentsearch', 0, NULL, NULL, 'N;'),
('Report.Studentdocumentsearchview', 0, NULL, NULL, 'N;'),
('Report.Studentdocumentsearchview1', 0, NULL, NULL, 'N;'),
('Report.Studenthistory', 0, NULL, NULL, 'N;'),
('Report.Studentid', 0, NULL, NULL, 'N;'),
('Report.Studentidcard', 0, NULL, NULL, 'N;'),
('Report.StudInfoReport', 0, NULL, NULL, 'N;'),
('Report.StudMonthlyAllsubjectAttendenceReport', 0, NULL, NULL, 'N;'),
('Report.View', 0, NULL, NULL, 'N;'),
('Report.YearlyBranchwiseAllstudentsInfoReport', 0, NULL, NULL, 'N;'),
('Reports', 0, 'Reports', NULL, 'N;'),
('RoomCategory.*', 1, NULL, NULL, 'N;'),
('RoomCategory.Admin', 0, NULL, NULL, 'N;'),
('RoomCategory.Create', 0, NULL, NULL, 'N;'),
('RoomCategory.Delete', 0, NULL, NULL, 'N;'),
('RoomCategory.Update', 0, NULL, NULL, 'N;'),
('RoomCategory.View', 0, NULL, NULL, 'N;'),
('RoomDetailsMaster.*', 1, NULL, NULL, 'N;'),
('RoomDetailsMaster.Admin', 0, NULL, NULL, 'N;'),
('RoomDetailsMaster.Create', 0, NULL, NULL, 'N;'),
('RoomDetailsMaster.Delete', 0, NULL, NULL, 'N;'),
('RoomDetailsMaster.Update', 0, NULL, NULL, 'N;'),
('RoomDetailsMaster.View', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.CreateOrg', 0, NULL, NULL, 'N;'),
('Site.CreateUser', 0, NULL, NULL, 'N;'),
('Site.Dashboard', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Forgotpassword', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Site.Parentlogin', 0, NULL, NULL, 'N;'),
('Site.RedirectLogin', 0, NULL, NULL, 'N;'),
('Site.SmsNotification', 0, NULL, NULL, 'N;'),
('Site.Switchcompany', 0, NULL, NULL, 'N;'),
('Site.Welcome', 0, NULL, NULL, 'N;'),
('SiteC.*', 1, NULL, NULL, 'N;'),
('SiteC.Contact', 0, NULL, NULL, 'N;'),
('SiteC.CreateOrg', 0, NULL, NULL, 'N;'),
('SiteC.CreateUser', 0, NULL, NULL, 'N;'),
('SiteC.Dashboard', 0, NULL, NULL, 'N;'),
('SiteC.Error', 0, NULL, NULL, 'N;'),
('SiteC.Forgotpassword', 0, NULL, NULL, 'N;'),
('SiteC.Index', 0, NULL, NULL, 'N;'),
('SiteC.Login', 0, NULL, NULL, 'N;'),
('SiteC.Logout', 0, NULL, NULL, 'N;'),
('SiteC.Parentlogin', 0, NULL, NULL, 'N;'),
('SiteC.RedirectLogin', 0, NULL, NULL, 'N;'),
('SiteC.SmsNotification', 0, NULL, NULL, 'N;'),
('SiteC.Switchcompany', 0, NULL, NULL, 'N;'),
('SiteC.Welcome', 0, NULL, NULL, 'N;'),
('State.*', 1, NULL, NULL, 'N;'),
('State.Admin', 0, NULL, NULL, 'N;'),
('State.Create', 0, NULL, NULL, 'N;'),
('State.Delete', 0, NULL, NULL, 'N;'),
('State.Index', 0, NULL, NULL, 'N;'),
('State.Update', 0, NULL, NULL, 'N;'),
('State.View', 0, NULL, NULL, 'N;'),
('Student', 2, 'Student', NULL, 'N;'),
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
('Student.Attendence.Showallstudentview', 0, NULL, NULL, 'N;'),
('Student.Attendence.Showstudentview', 0, NULL, NULL, 'N;'),
('Student.Attendence.StudentAttendenceReport', 0, NULL, NULL, 'N;'),
('Student.Attendence.Studentwisereport', 0, NULL, NULL, 'N;'),
('Student.Attendence.Studentwisereportpdf', 0, NULL, NULL, 'N;'),
('Student.Attendence.TakeAttendance', 0, NULL, NULL, 'N;'),
('Student.Attendence.Update', 0, NULL, NULL, 'N;'),
('Student.Attendence.View', 0, NULL, NULL, 'N;'),
('Student.Attendence.Viewchart', 0, NULL, NULL, 'N;'),
('Student.Dependent.*', 1, NULL, NULL, 'N;'),
('Student.Dependent.Getsubject', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudCCities', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudCCities1', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudCStates', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudCStates1', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudPCities', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudPCities1', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudPStates', 0, NULL, NULL, 'N;'),
('Student.Dependent.UpdateStudPStates1', 0, NULL, NULL, 'N;'),
('Student.Dependent.View', 0, NULL, NULL, 'N;'),
('Student.DependentC.*', 1, NULL, NULL, 'N;'),
('Student.DependentC.Getsubject', 0, NULL, NULL, 'N;'),
('Student.DependentC.UpdateStudCCities', 0, NULL, NULL, 'N;'),
('Student.DependentC.UpdateStudCCities1', 0, NULL, NULL, 'N;'),
('Student.DependentC.UpdateStudCStates', 0, NULL, NULL, 'N;'),
('Student.DependentC.UpdateStudCStates1', 0, NULL, NULL, 'N;'),
('Student.DependentC.UpdateStudPCities', 0, NULL, NULL, 'N;'),
('Student.DependentC.UpdateStudPCities1', 0, NULL, NULL, 'N;'),
('Student.DependentC.UpdateStudPStates', 0, NULL, NULL, 'N;'),
('Student.DependentC.UpdateStudPStates1', 0, NULL, NULL, 'N;'),
('Student.DependentC.View', 0, NULL, NULL, 'N;'),
('Student.ExcelSheetFormat.*', 1, NULL, NULL, 'N;'),
('Student.ExcelSheetFormat.Admin', 0, NULL, NULL, 'N;'),
('Student.ExcelSheetFormat.Create', 0, NULL, NULL, 'N;'),
('Student.ExcelSheetFormat.Delete', 0, NULL, NULL, 'N;'),
('Student.ExcelSheetFormat.GenerateExcel', 0, NULL, NULL, 'N;'),
('Student.ExcelSheetFormat.GeneratePdf', 0, NULL, NULL, 'N;'),
('Student.ExcelSheetFormat.Index', 0, NULL, NULL, 'N;'),
('Student.ExcelSheetFormat.Update', 0, NULL, NULL, 'N;'),
('Student.ExcelSheetFormat.View', 0, NULL, NULL, 'N;'),
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
('Student.ExportToPDFExcel.Studentcontactexcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.StudentdataExportExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.StudentFinalViewExportToPdf', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.StudentTransactionExportExcel', 0, NULL, NULL, 'N;'),
('Student.ExportToPDFExcel.StudentTransactionExportPdf', 0, NULL, NULL, 'N;'),
('Student.FeedbackDetailsTable.*', 1, NULL, NULL, 'N;'),
('Student.FeedbackDetailsTable.Admin', 0, NULL, NULL, 'N;'),
('Student.FeedbackDetailsTable.Create', 0, NULL, NULL, 'N;'),
('Student.FeedbackDetailsTable.Delete', 0, NULL, NULL, 'N;'),
('Student.FeedbackDetailsTable.Index', 0, NULL, NULL, 'N;'),
('Student.FeedbackDetailsTable.StudentPerformance', 0, NULL, NULL, 'N;'),
('Student.FeedbackDetailsTable.Update', 0, NULL, NULL, 'N;'),
('Student.FeedbackDetailsTable.View', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.*', 1, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Admin', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Canceladmission', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Cancelstudent', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Cancelstudentlist', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Create', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Delete', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.DetainAgain', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Index', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.LeftClearStudent', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Rejoin', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Update', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Updatestatus', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.Updatestudentstatus', 0, NULL, NULL, 'N;'),
('Student.LeftDetainedPassStudentTable.View', 0, NULL, NULL, 'N;'),
('Student.ScheduleTiming.*', 1, NULL, NULL, 'N;'),
('Student.ScheduleTiming.Admin', 0, NULL, NULL, 'N;'),
('Student.ScheduleTiming.Create', 0, NULL, NULL, 'N;'),
('Student.ScheduleTiming.Delete', 0, NULL, NULL, 'N;'),
('Student.ScheduleTiming.Index', 0, NULL, NULL, 'N;'),
('Student.ScheduleTiming.Update', 0, NULL, NULL, 'N;'),
('Student.ScheduleTiming.View', 0, NULL, NULL, 'N;'),
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
('Student.StudentArchiveTable.*', 1, NULL, NULL, 'N;'),
('Student.StudentArchiveTable.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentArchiveTable.Create', 0, NULL, NULL, 'N;'),
('Student.StudentArchiveTable.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentArchiveTable.Index', 0, NULL, NULL, 'N;'),
('Student.StudentArchiveTable.Update', 0, NULL, NULL, 'N;'),
('Student.StudentArchiveTable.View', 0, NULL, NULL, 'N;'),
('Student.StudentCertificateDetailsTable.*', 1, NULL, NULL, 'N;'),
('Student.StudentCertificateDetailsTable.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentCertificateDetailsTable.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentCertificateDetailsTable.StudentCertificate', 0, NULL, NULL, 'N;'),
('Student.StudentCertificateDetailsTable.View', 0, NULL, NULL, 'N;'),
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
('Student.StudentRegistrationAcademicInfo.*', 1, NULL, NULL, 'N;'),
('Student.StudentRegistrationAcademicInfo.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationAcademicInfo.Create', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationAcademicInfo.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationAcademicInfo.Index', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationAcademicInfo.Update', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationAcademicInfo.View', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationInfo.*', 1, NULL, NULL, 'N;'),
('Student.StudentRegistrationInfo.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationInfo.Aprove', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationInfo.Create', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationInfo.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationInfo.Index', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationInfo.StudentRegistration', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationInfo.Update', 0, NULL, NULL, 'N;'),
('Student.StudentRegistrationInfo.View', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.*', 1, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.Background', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.Backgroundmsg', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.Create', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.DoChacked', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.Mycreate', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.ScheduleAttendanceMessage', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.ScheduleFeesMessage', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.ScheduleMessages', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.StudentBulkSmsEmail', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.Update', 0, NULL, NULL, 'N;'),
('Student.StudentSmsEmailDetails.View', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.*', 1, NULL, NULL, 'N;'),
('Student.StudentTransaction.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Allstudent', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.AssignDivBatch', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.BatchWiseStudents', 0, NULL, NULL, 'N;'),
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
('Student.StudentTransaction.StudentMultipleDivisionAssign', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Studentperformance', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Update', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofilephoto', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofiletab1', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofiletab2', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofiletab3', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofiletab4', 0, NULL, NULL, 'N;'),
('Student.StudentTransaction.Updateprofiletab5', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.*', 1, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Admin', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Allstudent', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.AssignDivBatch', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.BatchWiseStudents', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Create', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Delete', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Error', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Finalview', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Importationinstruction', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Index', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Newview', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.PhotoDelete', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Studentacademicrecord', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Studentcertificate', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Studentcontact', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Studentdocs', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.StudentMultipleDivisionAssign', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Studentperformance', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Update', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Updateprofilephoto', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Updateprofiletab1', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Updateprofiletab2', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Updateprofiletab3', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Updateprofiletab4', 0, NULL, NULL, 'N;'),
('Student.StudentTransactionC.Updateprofiletab5', 0, NULL, NULL, 'N;'),
('Studentmodule', 0, 'Studentmodule', NULL, 'N;'),
('Studentstatusmaster.*', 1, NULL, NULL, 'N;'),
('Studentstatusmaster.Admin', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.Create', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.Delete', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.Update', 0, NULL, NULL, 'N;'),
('Studentstatusmaster.View', 0, NULL, NULL, 'N;'),
('SubjectAllotment.*', 1, NULL, NULL, 'N;'),
('SubjectAllotment.Admin', 0, NULL, NULL, 'N;'),
('SubjectAllotment.Create', 0, NULL, NULL, 'N;'),
('SubjectAllotment.Delete', 0, NULL, NULL, 'N;'),
('SubjectAllotment.Update', 0, NULL, NULL, 'N;'),
('SubjectAllotment.View', 0, NULL, NULL, 'N;'),
('SubjectMaster.*', 1, NULL, NULL, 'N;'),
('SubjectMaster.Admin', 0, NULL, NULL, 'N;'),
('SubjectMaster.Create', 0, NULL, NULL, 'N;'),
('SubjectMaster.Delete', 0, NULL, NULL, 'N;'),
('SubjectMaster.SubjectMasterviewExportToExcel', 0, NULL, NULL, 'N;'),
('SubjectMaster.SubjectviewExportToPdf', 0, NULL, NULL, 'N;'),
('SubjectMaster.Update', 0, NULL, NULL, 'N;'),
('SubjectMaster.View', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.*', 1, NULL, NULL, 'N;'),
('SubjectSyllabus.Actualcreate', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.Addlessionplan', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.Addsyllabustopic', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.Admin', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.Create', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.Delete', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.Facultyplancreate', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.Teachinghours', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.Update', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.Updatesyllabustopic', 0, NULL, NULL, 'N;'),
('SubjectSyllabus.View', 0, NULL, NULL, 'N;'),
('SubjectType.*', 1, NULL, NULL, 'N;'),
('SubjectType.Admin', 0, NULL, NULL, 'N;'),
('SubjectType.Create', 0, NULL, NULL, 'N;'),
('SubjectType.Delete', 0, NULL, NULL, 'N;'),
('SubjectType.Update', 0, NULL, NULL, 'N;'),
('SubjectType.View', 0, NULL, NULL, 'N;'),
('SuperAdmin', 2, NULL, NULL, 'N;'),
('Timetable.Default.*', 1, NULL, NULL, 'N;'),
('Timetable.Default.Index', 0, NULL, NULL, 'N;'),
('Timetable.Timetable.*', 1, NULL, NULL, 'N;'),
('Timetable.Timetable.Admin', 0, NULL, NULL, 'N;'),
('Timetable.Timetable.Create', 0, NULL, NULL, 'N;'),
('Timetable.Timetable.Delete', 0, NULL, NULL, 'N;'),
('Timetable.Timetable.Error', 0, NULL, NULL, 'N;'),
('Timetable.Timetable.FacultyPersonalTimetable', 0, NULL, NULL, 'N;'),
('Timetable.Timetable.Update', 0, NULL, NULL, 'N;'),
('Timetable.Timetable.View', 0, NULL, NULL, 'N;'),
('Timetable.TimetableDetail.*', 1, NULL, NULL, 'N;'),
('Timetable.TimetableDetail.Admin', 0, NULL, NULL, 'N;'),
('Timetable.TimetableDetail.Create', 0, NULL, NULL, 'N;'),
('Timetable.TimetableDetail.Delete', 0, NULL, NULL, 'N;'),
('Timetable.TimetableDetail.GetFaculty', 0, NULL, NULL, 'N;'),
('Timetable.TimetableDetail.GetSubject', 0, NULL, NULL, 'N;'),
('Timetable.TimetableDetail.Update', 0, NULL, NULL, 'N;'),
('Timetable.TimetableDetail.View', 0, NULL, NULL, 'N;'),
('Timetable.TimetableWeekdays.*', 1, NULL, NULL, 'N;'),
('Timetable.TimetableWeekdays.Admin', 0, NULL, NULL, 'N;'),
('Timetable.TimetableWeekdays.Create', 0, NULL, NULL, 'N;'),
('Timetable.TimetableWeekdays.Delete', 0, NULL, NULL, 'N;'),
('Timetable.TimetableWeekdays.Index', 0, NULL, NULL, 'N;'),
('Timetable.TimetableWeekdays.Update', 0, NULL, NULL, 'N;'),
('Timetable.TimetableWeekdays.View', 0, NULL, NULL, 'N;'),
('Transport.Default.*', 1, NULL, NULL, 'N;'),
('Transport.Default.Index', 0, NULL, NULL, 'N;'),
('Transport.Dependent.*', 1, NULL, NULL, 'N;'),
('Transport.Dependent.Updatebuscapacity', 0, NULL, NULL, 'N;'),
('Transport.Dependent.UpdatePickpoint', 0, NULL, NULL, 'N;'),
('Transport.Dependent.View', 0, NULL, NULL, 'N;'),
('Transport.TransportBusMaster.*', 1, NULL, NULL, 'N;'),
('Transport.TransportBusMaster.Admin', 0, NULL, NULL, 'N;'),
('Transport.TransportBusMaster.Create', 0, NULL, NULL, 'N;'),
('Transport.TransportBusMaster.Delete', 0, NULL, NULL, 'N;'),
('Transport.TransportBusMaster.Update', 0, NULL, NULL, 'N;'),
('Transport.TransportBusMaster.View', 0, NULL, NULL, 'N;'),
('Transport.TransportBusRouteAllocation.*', 1, NULL, NULL, 'N;'),
('Transport.TransportBusRouteAllocation.Admin', 0, NULL, NULL, 'N;'),
('Transport.TransportBusRouteAllocation.Create', 0, NULL, NULL, 'N;'),
('Transport.TransportBusRouteAllocation.Delete', 0, NULL, NULL, 'N;'),
('Transport.TransportBusRouteAllocation.Update', 0, NULL, NULL, 'N;'),
('Transport.TransportBusRouteAllocation.View', 0, NULL, NULL, 'N;'),
('Transport.TransportDriverRegistration.*', 1, NULL, NULL, 'N;'),
('Transport.TransportDriverRegistration.Admin', 0, NULL, NULL, 'N;'),
('Transport.TransportDriverRegistration.Create', 0, NULL, NULL, 'N;'),
('Transport.TransportDriverRegistration.Delete', 0, NULL, NULL, 'N;'),
('Transport.TransportDriverRegistration.Update', 0, NULL, NULL, 'N;'),
('Transport.TransportDriverRegistration.View', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.*', 1, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.Admin', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.Create', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.Delete', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.Payfeescash', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.Payfeescheque', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.Printcashreceipt', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.Printchequereceipt', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.Update', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.UpdatePayfeescash', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.UpdatePayfeescheque', 0, NULL, NULL, 'N;'),
('Transport.TransportFeesPaymentTransaction.View', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteDetailMaster.*', 1, NULL, NULL, 'N;'),
('Transport.TransportRouteDetailMaster.Admin', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteDetailMaster.Create', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteDetailMaster.Delete', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteDetailMaster.Update', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteDetailMaster.View', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteMaster.*', 1, NULL, NULL, 'N;'),
('Transport.TransportRouteMaster.Admin', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteMaster.Create', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteMaster.Delete', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteMaster.Update', 0, NULL, NULL, 'N;'),
('Transport.TransportRouteMaster.View', 0, NULL, NULL, 'N;'),
('Transport.TransportStudentRegistration.*', 1, NULL, NULL, 'N;'),
('Transport.TransportStudentRegistration.Admin', 0, NULL, NULL, 'N;'),
('Transport.TransportStudentRegistration.Create', 0, NULL, NULL, 'N;'),
('Transport.TransportStudentRegistration.Delete', 0, NULL, NULL, 'N;'),
('Transport.TransportStudentRegistration.StudentList', 0, NULL, NULL, 'N;'),
('Transport.TransportStudentRegistration.Update', 0, NULL, NULL, 'N;'),
('Transport.TransportStudentRegistration.View', 0, NULL, NULL, 'N;'),
('User.*', 1, NULL, NULL, 'N;'),
('User.Change', 0, NULL, NULL, 'N;'),
('User.Delete', 0, NULL, NULL, 'N;'),
('User.Resetemploginid', 0, NULL, NULL, 'N;'),
('User.Resetemppassword', 0, NULL, NULL, 'N;'),
('User.Resetstudloginid', 0, NULL, NULL, 'N;'),
('User.Resetstudpassword', 0, NULL, NULL, 'N;'),
('User.Updateemploginid', 0, NULL, NULL, 'N;'),
('User.Updatestudloginid', 0, NULL, NULL, 'N;'),
('User.View', 0, NULL, NULL, 'N;'),
('UserC.*', 1, NULL, NULL, 'N;'),
('UserC.Change', 0, NULL, NULL, 'N;'),
('UserC.Delete', 0, NULL, NULL, 'N;'),
('UserC.Resetemploginid', 0, NULL, NULL, 'N;'),
('UserC.Resetemppassword', 0, NULL, NULL, 'N;'),
('UserC.Resetstudloginid', 0, NULL, NULL, 'N;'),
('UserC.Resetstudpassword', 0, NULL, NULL, 'N;'),
('UserC.Updateemploginid', 0, NULL, NULL, 'N;'),
('UserC.Updatestudloginid', 0, NULL, NULL, 'N;'),
('UserC.View', 0, NULL, NULL, 'N;'),
('UserType.*', 1, NULL, NULL, 'N;'),
('UserType.Admin', 0, NULL, NULL, 'N;'),
('UserType.Create', 0, NULL, NULL, 'N;'),
('UserType.Delete', 0, NULL, NULL, 'N;'),
('UserType.Update', 0, NULL, NULL, 'N;'),
('UserType.View', 0, NULL, NULL, 'N;'),
('Visitor.ExportToPDFExcel.*', 1, NULL, NULL, 'N;'),
('Visitor.ExportToPDFExcel.VisitorPassExportToExcel', 0, NULL, NULL, 'N;'),
('Visitor.ExportToPDFExcel.VisitorPassExportToPdf', 0, NULL, NULL, 'N;'),
('Visitor.ExportToPDFExcel.VisitortotalPassExportToExcel', 0, NULL, NULL, 'N;'),
('Visitor.ExportToPDFExcel.VisitortotalPassExportToPdf', 0, NULL, NULL, 'N;'),
('Visitor.VisitorPass.*', 1, NULL, NULL, 'N;'),
('Visitor.VisitorPass.Admin', 0, NULL, NULL, 'N;'),
('Visitor.VisitorPass.Create', 0, NULL, NULL, 'N;'),
('Visitor.VisitorPass.Delete', 0, NULL, NULL, 'N;'),
('Visitor.VisitorPass.Myupdate', 0, NULL, NULL, 'N;'),
('Visitor.VisitorPass.Newview', 0, NULL, NULL, 'N;'),
('Visitor.VisitorPass.Totalvisitors', 0, NULL, NULL, 'N;'),
('Visitor.VisitorPass.Update', 0, NULL, NULL, 'N;'),
('Visitor.VisitorPass.View', 0, NULL, NULL, 'N;'),
('VisitorPass.*', 1, NULL, NULL, 'N;'),
('VisitorPass.Admin', 0, NULL, NULL, 'N;'),
('VisitorPass.Create', 0, NULL, NULL, 'N;'),
('VisitorPass.Delete', 0, NULL, NULL, 'N;'),
('VisitorPass.Index', 0, NULL, NULL, 'N;'),
('VisitorPass.Update', 0, NULL, NULL, 'N;'),
('VisitorPass.View', 0, NULL, NULL, 'N;'),
('Year.*', 1, NULL, NULL, 'N;'),
('Year.Admin', 0, NULL, NULL, 'N;'),
('Year.Create', 0, NULL, NULL, 'N;'),
('Year.Delete', 0, NULL, NULL, 'N;'),
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
('Employee', 'Course.Admin'),
('Student', 'Course.Admin'),
('Employee', 'Course.View'),
('Student', 'Course.View'),
('Employee', 'Document'),
('Employee', 'Employee.EmployeeTransaction.Admin'),
('Student', 'Employee.EmployeeTransaction.Admin'),
('Employee', 'Employee.EmployeeTransaction.Update'),
('Employee', 'Employee.EmployeeTransaction.Updateprofiletab1'),
('Employee', 'Employee.EmployeeTransaction.Updateprofiletab2'),
('Employee', 'Employee.EmployeeTransaction.Updateprofiletab3'),
('Employee', 'Employee.EmployeeTransaction.Updateprofiletab4'),
('Employee', 'Employee.ExportToPDFExcel.EmployeeFinalViewExportToPdf'),
('Employee', 'Employeemodule'),
('Student', 'Employeemodule'),
('Student', 'Fees'),
('Student', 'Fees.FeesPaymentTransaction.Create'),
('Employee', 'ImportantNotice.View'),
('Student', 'ImportantNotice.View'),
('Employee', 'Report.Documentsearch'),
('Employee', 'Report.Documentsearchview'),
('Employee', 'Report.Documentsearchview1'),
('Employee', 'Report.EmployeeInfoReport'),
('Employee', 'Report.SelectedEmployeeList'),
('Employee', 'Report.SelectedList'),
('Employee', 'Report.StudentDocumentsearch'),
('Employee', 'Report.Studentdocumentsearchview'),
('Employee', 'Report.Studentdocumentsearchview1'),
('Employee', 'Report.StudInfoReport'),
('Employee', 'Reports'),
('Employee', 'Student.ExportToPDFExcel.StudentFinalViewExportToPdf'),
('Student', 'Student.ExportToPDFExcel.StudentFinalViewExportToPdf'),
('Employee', 'Student.StudentTransaction.Admin'),
('Employee', 'Student.StudentTransaction.Update'),
('Student', 'Student.StudentTransaction.Update'),
('Employee', 'Studentmodule'),
('Employee', 'EmployeeTransaction.UpdateEmployeeData');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `batch_id` int(2) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(60) NOT NULL,
  `batch_created_by` int(3) NOT NULL,
  `batch_creation_date` datetime NOT NULL,
  `batch_intake` int(3) DEFAULT NULL,
  `batch_start_date` date NOT NULL,
  `batch_end_date` date DEFAULT NULL,
  `course_id` int(5) NOT NULL,
  `academic_term_id` int(3) NOT NULL,
  `batch_fees` float NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `certificate_id` int(3) NOT NULL AUTO_INCREMENT,
  `certificate_title` varchar(1000) NOT NULL,
  `certificate_content` text NOT NULL,
  `certificate_type` varchar(20) NOT NULL,
  `certificate_organization_id` int(3) NOT NULL,
  `certificate_created_by` int(3) NOT NULL,
  `certificate_creation_date` date NOT NULL,
  PRIMARY KEY (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(30) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(80) NOT NULL,
  `country_id` int(30) NOT NULL,
  `state_id` int(30) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(3) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `course_fees` int(9) NOT NULL,
  `academic_term_period_id` int(3) NOT NULL,
  `created_by` int(3) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coursewise_subject_table`
--

CREATE TABLE IF NOT EXISTS `coursewise_subject_table` (
  `couse_subject_id` int(9) NOT NULL AUTO_INCREMENT,
  `couse_subject_course_id` int(9) NOT NULL,
  `couse_subject_sub_id` int(9) NOT NULL,
  `couse_subject_created_by` int(9) NOT NULL,
  `couse_subject_creation_date` date NOT NULL,
  PRIMARY KEY (`couse_subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `database_backup_cron`
--

CREATE TABLE IF NOT EXISTS `database_backup_cron` (
  `database_backup_cron_no` int(3) NOT NULL,
  `database_backup_cron_created_by` int(3) NOT NULL,
  `database_backup_cron_creation_date` date NOT NULL,
  `database_backup_cron_id` int(3) NOT NULL AUTO_INCREMENT,
  `database_backup_cron_schedule_time_id` int(3) NOT NULL,
  PRIMARY KEY (`database_backup_cron_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(3) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(60) NOT NULL,
  `department_created_by` int(2) NOT NULL,
  `department_created_date` datetime NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document_category_master`
--

CREATE TABLE IF NOT EXISTS `document_category_master` (
  `doc_category_id` int(3) NOT NULL AUTO_INCREMENT,
  `doc_category_name` varchar(30) NOT NULL,
  `created_by` int(3) NOT NULL,
  `creation_date` date NOT NULL,
  `docs_category_organization_id` int(3) NOT NULL,
  PRIMARY KEY (`doc_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eduboard`
--

CREATE TABLE IF NOT EXISTS `eduboard` (
  `eduboard_id` int(2) NOT NULL AUTO_INCREMENT,
  `eduboard_name` varchar(30) NOT NULL,
  `eduboard_created_by` int(3) NOT NULL,
  `eduboard_created_date` datetime NOT NULL,
  `for_whom` int(2) NOT NULL,
  PRIMARY KEY (`eduboard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  KEY `fk_emp_eduboard` (`employee_academic_record_trans_eduboard_id`),
  KEY `fk_emp_year` (`employee_academic_record_trans_year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `employee_address_c_phone` bigint(15) DEFAULT NULL,
  `employee_address_c_mobile` bigint(15) DEFAULT NULL,
  `employee_address_c_taluka` varchar(50) DEFAULT NULL,
  `employee_address_c_district` varchar(50) DEFAULT NULL,
  `employee_address_p_taluka` varchar(50) DEFAULT NULL,
  `employee_address_p_district` varchar(50) DEFAULT NULL,
  `employee_address_p_phone` varchar(15) NOT NULL,
  `employee_address_p_mobile` varchar(10) NOT NULL,
  `employee_c_house_no` varchar(20) NOT NULL,
  `employee_p_house_no` varchar(20) NOT NULL,
  PRIMARY KEY (`employee_address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation`
--

CREATE TABLE IF NOT EXISTS `employee_designation` (
  `employee_designation_id` int(2) NOT NULL AUTO_INCREMENT,
  `employee_designation_name` varchar(25) NOT NULL,
  `employee_designation_level` int(5) NOT NULL,
  `employee_designation_created_by` int(3) NOT NULL,
  `employee_designation_created_date` datetime NOT NULL,
  PRIMARY KEY (`employee_designation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE IF NOT EXISTS `employee_info` (
  `employee_id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `employee_no` varchar(10) DEFAULT NULL,
  `employee_unique_id` int(6) NOT NULL,
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
  `employee_account_no` bigint(20) DEFAULT NULL,
  `employee_pf_id` varchar(20) DEFAULT NULL,
  `employee_joining_date` date NOT NULL,
  `employee_probation_period` varchar(10) DEFAULT NULL,
  `employee_hobbies` mediumtext,
  `employee_technical_skills` mediumtext,
  `employee_project_details` mediumtext,
  `employee_curricular` mediumtext,
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
  `employee_attendance_card_id` varchar(30) NOT NULL,
  `employee_tally_id` varchar(9) DEFAULT NULL,
  `employee_created_by` bigint(20) DEFAULT NULL,
  `employee_creation_date` datetime DEFAULT NULL,
  `employee_type` int(3) NOT NULL,
  `employee_left_transfer_date` date DEFAULT NULL,
  `transfer_left_remarks` varchar(200) DEFAULT NULL,
  `employee_info_transaction_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_notification`
--

CREATE TABLE IF NOT EXISTS `employee_notification` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `expire` datetime NOT NULL,
  `alert_after_date` datetime NOT NULL,
  `alert_before_date` datetime NOT NULL,
  `content` mediumtext NOT NULL,
  `link` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `from` int(3) NOT NULL,
  `emp_notice_to` int(3) NOT NULL DEFAULT '0',
  `org_id` int(3) NOT NULL,
  `notifiyii_department_id` int(3) DEFAULT '0',
  `employee_notification_type` varchar(20) DEFAULT '',
  `employee_notification_creation_date` date NOT NULL,
  `employee_notification_read` tinyint(1) NOT NULL,
  `employee_notification_compensatory_leave_id` int(3) NOT NULL,
  `employee_notification_leave_application_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_photos`
--

CREATE TABLE IF NOT EXISTS `employee_photos` (
  `employee_photos_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_photos_desc` varchar(50) DEFAULT NULL,
  `employee_photos_path` varchar(150) NOT NULL,
  PRIMARY KEY (`employee_photos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_sms_email_details`
--

CREATE TABLE IF NOT EXISTS `employee_sms_email_details` (
  `employee_sms_email_id` int(3) NOT NULL AUTO_INCREMENT,
  `department_id` int(3) NOT NULL,
  `message_email_text` mediumtext NOT NULL,
  `email_sms_status` int(1) NOT NULL,
  `created_by` int(3) NOT NULL,
  `creation_date` datetime NOT NULL,
  `employee_id` int(3) NOT NULL,
  `employee_sms_email_details_ack_id` varchar(20) NOT NULL,
  PRIMARY KEY (`employee_sms_email_id`),
  KEY `fk_emp_sms_did` (`department_id`),
  KEY `fk_emp_sms_eid` (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_transaction`
--

CREATE TABLE IF NOT EXISTS `employee_transaction` (
  `employee_transaction_id` int(9) NOT NULL AUTO_INCREMENT,
  `employee_transaction_user_id` int(5) NOT NULL,
  `employee_transaction_employee_id` int(5) NOT NULL,
  `employee_transaction_emp_address_id` int(5) DEFAULT NULL,
  `employee_transaction_designation_id` int(2) NOT NULL,
  `employee_transaction_nationality_id` int(2) DEFAULT NULL,
  `employee_transaction_department_id` int(3) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fees_payment_transaction`
--

CREATE TABLE IF NOT EXISTS `fees_payment_transaction` (
  `fees_payment_transaction_id` int(9) NOT NULL AUTO_INCREMENT,
  `fees_payment_type` varchar(15) NOT NULL,
  `fees_payment_receipt_no` int(9) NOT NULL,
  `fees_payment_student_id` int(9) NOT NULL,
  `fees_payment_batch_id` int(5) NOT NULL,
  `fees_student_academic_term_id` int(3) NOT NULL,
  `fees_student_academic_term_period_id` int(3) NOT NULL,
  `fees_student_course_id` int(3) NOT NULL,
  `fees_payment_amount` int(6) NOT NULL,
  `fees_payment_cheque_number` varchar(6) DEFAULT NULL,
  `fees_payment_cheque_date` date DEFAULT NULL,
  `fees_payment_cheque_bank` varchar(50) DEFAULT NULL,
  `fees_payment_details` varchar(100) DEFAULT NULL,
  `fees_payment_received_date` date NOT NULL,
  `fees_payment_user_id` int(9) NOT NULL,
  PRIMARY KEY (`fees_payment_transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `holiday_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `created_by` int(7) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `important_notice`
--

CREATE TABLE IF NOT EXISTS `important_notice` (
  `notice_id` int(3) NOT NULL AUTO_INCREMENT,
  `notice` varchar(500) NOT NULL,
  `created_by` int(2) NOT NULL,
  `creation_date` datetime NOT NULL,
  `notice_organization_id` int(3) NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `languages_id` int(2) NOT NULL AUTO_INCREMENT,
  `languages_name` varchar(30) NOT NULL,
  `languages_created_by` int(3) NOT NULL,
  `languages_created_date` datetime NOT NULL,
  PRIMARY KEY (`languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages_known`
--

CREATE TABLE IF NOT EXISTS `languages_known` (
  `languages_known_id` int(2) NOT NULL AUTO_INCREMENT,
  `languages_known1` varchar(100) DEFAULT NULL,
  `languages_known2` int(2) DEFAULT NULL,
  `languages_known3` int(2) DEFAULT NULL,
  `languages_known4` int(2) DEFAULT NULL,
  PRIMARY KEY (`languages_known_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `user_id`, `status`, `log_in_time`, `log_out_time`, `user_ip_address`, `login_organization_id`) VALUES
(1, 1, 1, '2014-09-24 17:06:40', NULL, '192.168.1.109', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message_of_day`
--

CREATE TABLE IF NOT EXISTS `message_of_day` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `message` varchar(1000) NOT NULL,
  `created_by` int(7) NOT NULL,
  `creation_date` datetime NOT NULL,
  `message_of_day_active` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `nationality_id` int(2) NOT NULL AUTO_INCREMENT,
  `nationality_name` varchar(30) NOT NULL,
  `nationality_created_by` int(3) NOT NULL,
  `nationality_created_date` datetime NOT NULL,
  PRIMARY KEY (`nationality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `national_holidays`
--

CREATE TABLE IF NOT EXISTS `national_holidays` (
  `national_holiday_id` int(3) NOT NULL AUTO_INCREMENT,
  `national_holiday_date` date NOT NULL,
  `national_holiday_name` varchar(30) NOT NULL,
  `national_holiday_remarks` varchar(20) NOT NULL,
  `national_holiday_org_id` int(3) NOT NULL,
  `national_holiday_by_user_id` int(3) NOT NULL,
  `national_holiday_by_date` date NOT NULL,
  PRIMARY KEY (`national_holiday_id`),
  KEY `national_holiday_org_id` (`national_holiday_org_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `city` int(3) DEFAULT NULL,
  `state` int(3) DEFAULT NULL,
  `country` int(3) DEFAULT NULL,
  `pin` int(6) DEFAULT NULL,
  `phone` bigint(15) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fax_no` varchar(15) DEFAULT NULL,
  `logo` longblob NOT NULL,
  `file_type` varchar(30) NOT NULL,
  `name_alias` varchar(100) NOT NULL,
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `qualification_id` int(2) NOT NULL AUTO_INCREMENT,
  `qualification_name` varchar(30) NOT NULL,
  `qualification_created_by` int(3) NOT NULL,
  `qualification_created_date` datetime NOT NULL,
  PRIMARY KEY (`qualification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `state_name` varchar(80) NOT NULL,
  `country_id` varchar(30) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_record_trans`
--

CREATE TABLE IF NOT EXISTS `student_academic_record_trans` (
  `student_academic_record_trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `student_academic_record_trans_stud_id` int(5) NOT NULL,
  `student_academic_record_trans_qualification_id` varchar(50) NOT NULL,
  `student_academic_record_trans_eduboard_id` varchar(50) NOT NULL,
  `student_academic_record_trans_record_trans_year_id` int(5) NOT NULL,
  `theory_mark_obtained` int(3) NOT NULL,
  `theory_mark_max` int(3) NOT NULL,
  `theory_percentage` float NOT NULL,
  `practical_mark_obtained` int(3) DEFAULT NULL,
  `practical_mark_max` int(3) DEFAULT NULL,
  `practical_percentage` float DEFAULT NULL,
  PRIMARY KEY (`student_academic_record_trans_id`),
  KEY `fk_year` (`student_academic_record_trans_record_trans_year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `student_c_house_no` varchar(20) NOT NULL,
  `student_p_house_no` varchar(20) NOT NULL,
  `student_address_c_mobile` varchar(20) NOT NULL,
  `student_address_p_mobile` varchar(20) NOT NULL,
  `student_address_c_phone` varchar(20) NOT NULL,
  `student_address_p_phone` varchar(20) NOT NULL,
  PRIMARY KEY (`student_address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendence_email`
--

CREATE TABLE IF NOT EXISTS `student_attendence_email` (
  `student_attendence_email_id` int(3) NOT NULL AUTO_INCREMENT,
  `student_attendence_email_emp_id` int(3) NOT NULL,
  `student_attendence_email_branch_id` int(3) NOT NULL DEFAULT '0',
  `student_attendence_email_org_id` int(3) NOT NULL,
  `student_attendence_email_created_by` int(3) NOT NULL,
  `student_attendence_email_creation_date` date NOT NULL,
  `student_attendence_email_minute` int(3) NOT NULL,
  `student_attendence_email_hour` int(3) NOT NULL,
  `student_attendence_email_cron_no` int(3) NOT NULL,
  PRIMARY KEY (`student_attendence_email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_certificate_details_table`
--

CREATE TABLE IF NOT EXISTS `student_certificate_details_table` (
  `student_certificate_details_table_id` int(5) NOT NULL AUTO_INCREMENT,
  `student_certificate_details_table_student_id` int(5) NOT NULL,
  `student_certificate_type_id` int(5) NOT NULL,
  `student_certificate_created_by` int(5) NOT NULL,
  `student_certificate_creation_date` date NOT NULL,
  `student_certificate_org_id` int(5) NOT NULL,
  `certificate_reference_number` varchar(50) NOT NULL,
  `student_semester_id` int(11) NOT NULL,
  PRIMARY KEY (`student_certificate_details_table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
  `student_id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `student_roll_no` varchar(15) NOT NULL,
  `student_no` int(6) DEFAULT NULL,
  `student_first_name` varchar(25) NOT NULL,
  `student_middle_name` varchar(25) NOT NULL,
  `student_last_name` varchar(25) NOT NULL,
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
  `student_created_by` int(3) NOT NULL,
  `student_creation_date` datetime DEFAULT NULL,
  `student_mobile_no` bigint(15) NOT NULL,
  `student_info_transaction_id` int(5) DEFAULT NULL,
  `emergency_cont_name` varchar(50) NOT NULL,
  `emergency_cont_no` varchar(15) NOT NULL,
  `passport_no` varchar(50) NOT NULL,
  `visa_exp_date` date NOT NULL,
  `passport_exp_date` date NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_marks_type_master`
--

CREATE TABLE IF NOT EXISTS `student_marks_type_master` (
  `student_marks_type_master_id` int(3) NOT NULL,
  `student_marks_type_master_name` varchar(20) NOT NULL,
  `student_marks_type_organization_id` int(3) NOT NULL,
  PRIMARY KEY (`student_marks_type_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_notification`
--

CREATE TABLE IF NOT EXISTS `student_notification` (
  `student_notification_id` int(3) NOT NULL AUTO_INCREMENT,
  `student_notification_expire` datetime NOT NULL,
  `student_notification_alert_after_date` datetime NOT NULL,
  `student_notification_alert_before_date` datetime NOT NULL,
  `student_notification_content` mediumtext NOT NULL,
  `student_notification_link` varchar(100) NOT NULL,
  `student_notification_title` varchar(100) NOT NULL,
  `student_notification_from` int(3) NOT NULL,
  `student_notification_to` int(3) DEFAULT '0',
  `student_notification_org_id` int(3) NOT NULL,
  `student_notification_academic_term_id` int(3) DEFAULT '0',
  `student_notification_academic_period_id` int(3) DEFAULT '0',
  `student_notification_branch_id` int(3) DEFAULT '0',
  `student_notification_creation_date` date NOT NULL,
  `student_notification_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`student_notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_photos`
--

CREATE TABLE IF NOT EXISTS `student_photos` (
  `student_photos_id` int(5) NOT NULL AUTO_INCREMENT,
  `student_photos_desc` varchar(50) DEFAULT NULL,
  `student_photos_path` varchar(150) NOT NULL,
  PRIMARY KEY (`student_photos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_registration_academic_info`
--

CREATE TABLE IF NOT EXISTS `student_registration_academic_info` (
  `student_registration_academic_id` int(5) NOT NULL AUTO_INCREMENT,
  `examination` varchar(30) NOT NULL,
  `year_of_passing` varchar(25) NOT NULL,
  `name_of_board` varchar(25) NOT NULL,
  `medium` varchar(15) NOT NULL,
  `class_obtained` varchar(15) NOT NULL,
  `marks_obtained` double NOT NULL,
  `marks_out_of` int(3) NOT NULL,
  `percentage` double NOT NULL,
  `student_registration_id` int(5) NOT NULL,
  PRIMARY KEY (`student_registration_academic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_registration_info`
--

CREATE TABLE IF NOT EXISTS `student_registration_info` (
  `student_registration_id` int(5) NOT NULL AUTO_INCREMENT,
  `student_title` varchar(10) NOT NULL,
  `student_first_name` varchar(25) NOT NULL,
  `student_middle_name` varchar(25) NOT NULL,
  `student_last_name` varchar(25) NOT NULL,
  `student_merit_no` varchar(10) NOT NULL,
  `student_merit_marks` double NOT NULL,
  `student_category_id` int(2) DEFAULT NULL,
  `student_gender` varchar(10) DEFAULT NULL,
  `student_date_of_registration` date NOT NULL,
  `student_branch_id` varchar(100) NOT NULL,
  `student_board` varchar(15) DEFAULT NULL,
  `student_dob` date DEFAULT NULL,
  `student_place_of_birth` varchar(30) DEFAULT NULL,
  `student_address_c_line1` varchar(100) DEFAULT NULL,
  `student_address_c_line2` varchar(100) DEFAULT NULL,
  `student_address_c_taluka` varchar(50) DEFAULT NULL,
  `student_address_c_district` varchar(50) DEFAULT NULL,
  `student_address_c_country` int(3) DEFAULT NULL,
  `student_address_c_city` int(6) DEFAULT NULL,
  `student_address_c_pin` int(6) DEFAULT NULL,
  `student_address_c_state` int(6) DEFAULT NULL,
  `student_address_p_line1` varchar(100) DEFAULT NULL,
  `student_address_p_line2` varchar(100) DEFAULT NULL,
  `student_address_p_taluka` varchar(50) DEFAULT NULL,
  `student_address_p_district` varchar(50) DEFAULT NULL,
  `student_address_p_country` int(3) DEFAULT NULL,
  `student_address_p_city` int(6) DEFAULT NULL,
  `student_address_p_pin` int(6) DEFAULT NULL,
  `student_address_p_state` int(6) DEFAULT NULL,
  `student_email_id` varchar(60) NOT NULL,
  `student_phoneno` bigint(15) DEFAULT NULL,
  `student_mobile` bigint(15) DEFAULT NULL,
  `student_guardian_phoneno` bigint(15) DEFAULT NULL,
  `student_guardian_mobile` bigint(15) DEFAULT NULL,
  `student_last_school_attended` varchar(50) DEFAULT NULL,
  `student_last_school_attended_address` varchar(100) DEFAULT NULL,
  `student_father_name` varchar(100) DEFAULT NULL,
  `student_mother_name` varchar(100) DEFAULT NULL,
  `student_father_occupation` varchar(50) DEFAULT NULL,
  `student_mother_occupation` varchar(50) DEFAULT NULL,
  `studnet_father_office_address` varchar(100) DEFAULT NULL,
  `student_mother_office_address` varchar(100) DEFAULT NULL,
  `student_photo` varchar(150) DEFAULT NULL,
  `student_aproved` varchar(1) DEFAULT NULL,
  `organization_id` tinyint(4) NOT NULL,
  `acpc_fees_receipt_no` int(11) NOT NULL,
  `acpc_fees_amount` int(6) NOT NULL,
  `acpc_fees_bank` varchar(100) DEFAULT NULL,
  `acpc_fees_date` date DEFAULT NULL,
  `student_status` int(2) NOT NULL,
  PRIMARY KEY (`student_registration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE IF NOT EXISTS `student_result` (
  `student_result_id` int(10) NOT NULL AUTO_INCREMENT,
  `student_result_student_id` int(10) NOT NULL,
  `student_result_subject_id` int(11) NOT NULL,
  `student_result_academic_term_name_id` int(11) NOT NULL,
  `student_result_brach_id` int(11) NOT NULL,
  `student_result_student_gain_mark` int(11) NOT NULL,
  `student_result_student_total_mark` int(11) NOT NULL,
  `student_result_created_by` int(11) NOT NULL,
  `student_result_creation_date` date NOT NULL,
  PRIMARY KEY (`student_result_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_sms_email_details`
--

CREATE TABLE IF NOT EXISTS `student_sms_email_details` (
  `student_sms_email_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(3) NOT NULL,
  `student_id` int(3) NOT NULL,
  `message_email_text` mediumtext NOT NULL,
  `email_sms_status` int(3) NOT NULL,
  `created_by` int(3) NOT NULL,
  `creation_date` datetime NOT NULL,
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
  `student_sms_email_details_course_id` int(3) NOT NULL,
  `student_sms_email_details_batch_id` int(3) NOT NULL,
  PRIMARY KEY (`student_sms_email_id`),
  KEY `fk_stu_sms_bid` (`branch_id`),
  KEY `fk_stu_sms_stuid` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_status_master`
--

CREATE TABLE IF NOT EXISTS `student_status_master` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(30) NOT NULL,
  `creation_date` date NOT NULL,
  `created_by` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student_status_master`
--

INSERT INTO `student_status_master` (`id`, `status_name`, `creation_date`, `created_by`) VALUES
(1, 'Regular', '2014-09-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_transaction`
--

CREATE TABLE IF NOT EXISTS `student_transaction` (
  `student_transaction_id` int(9) NOT NULL AUTO_INCREMENT,
  `student_transaction_user_id` int(5) NOT NULL,
  `student_transaction_student_id` int(5) NOT NULL,
  `student_transaction_student_address_id` int(5) DEFAULT NULL,
  `student_transaction_nationality_id` int(2) DEFAULT NULL,
  `student_transaction_languages_known_id` int(2) DEFAULT NULL,
  `student_transaction_student_photos_id` int(5) NOT NULL,
  `student_transaction_batch_id` int(2) DEFAULT NULL,
  `student_transaction_detain_student_flag` int(3) NOT NULL,
  `student_transaction_parent_id` int(5) DEFAULT NULL,
  `academic_term_id` int(3) NOT NULL,
  `academic_term_period_id` int(3) NOT NULL,
  `course_id` int(3) NOT NULL,
  PRIMARY KEY (`student_transaction_id`),
  KEY `fk_nationality` (`student_transaction_nationality_id`),
  KEY `FK_student_id` (`student_transaction_student_id`),
  KEY `fk_std_photo` (`student_transaction_student_photos_id`),
  KEY `fk_lan_id` (`student_transaction_languages_known_id`),
  KEY `student_transaction_user_id` (`student_transaction_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_organization_email_id` varchar(60) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `user_created_by` int(3) NOT NULL,
  `user_creation_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(30) NOT NULL,
  `created_by` int(3) NOT NULL,
  `creation_date` date NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `year_id` int(2) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `employee_transaction_ibfk_2` FOREIGN KEY (`employee_transaction_user_id`) REFERENCES `user` (`user_id`),
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
-- Constraints for table `student_docs_trans`
--
ALTER TABLE `student_docs_trans`
  ADD CONSTRAINT `fk_student_docs_id` FOREIGN KEY (`student_docs_trans_stud_docs_id`) REFERENCES `student_docs` (`student_docs_id`);

--
-- Constraints for table `student_transaction`
--
ALTER TABLE `student_transaction`
  ADD CONSTRAINT `fk_lan_id` FOREIGN KEY (`student_transaction_languages_known_id`) REFERENCES `languages_known` (`languages_known_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
