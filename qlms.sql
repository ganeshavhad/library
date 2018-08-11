-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 03:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_audit_log`
--

CREATE TABLE `mst_audit_log` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `visit_page` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `mst_book`
--

CREATE TABLE `mst_book` (
  `bookID` int(11) UNSIGNED NOT NULL,
  `book` varchar(60) NOT NULL,
  `subject_code` tinytext NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `due_quantity` int(11) NOT NULL,
  `rack` varchar(100) CHARACTER SET latin1 NOT NULL,
  `bookcatID` varchar(100) NOT NULL,
  `unique_code` varchar(25) NOT NULL,
  `ISBN_NO` varchar(25) DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `receipt` varchar(100) DEFAULT NULL,
  `page` varchar(100) DEFAULT NULL,
  `edition` varchar(100) NOT NULL,
  `pubilcation_address` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `classification` varchar(100) NOT NULL,
  `accesseion_date` varchar(100) NOT NULL,
  `accesseion_no` varchar(100) NOT NULL,
  `availbility` varchar(100) NOT NULL,
  `activebook` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `mst_bookcat`
--

CREATE TABLE `mst_bookcat` (
  `bookcatID` int(11) NOT NULL,
  `bookcat` varchar(50) DEFAULT NULL,
  `added_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mst_division`
--

CREATE TABLE `mst_division` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `activediv` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `mst_library_setting`
--

CREATE TABLE `mst_library_setting` (
  `id` int(11) NOT NULL,
  `fine` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `updated_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_library_setting`
--

INSERT INTO `mst_library_setting` (`id`, `fine`, `due_date`, `updated_user`) VALUES
(1, '10', '5', 'ganesh');

-- --------------------------------------------------------

--
-- Table structure for table `mst_privileges`
--

CREATE TABLE `mst_privileges` (
  `privilege_id` int(10) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `p_add` varchar(255) NOT NULL,
  `p_view` varchar(255) NOT NULL,
  `p_edit` varchar(255) NOT NULL,
  `p_delete` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_privileges`
--

INSERT INTO `mst_privileges` (`privilege_id`, `page_name`, `p_add`, `p_view`, `p_edit`, `p_delete`) VALUES
(1, 'Students', '0', '0', '0', '0'),
(2, 'Division', '0', '0', '0', '0'),
(3, 'Standard', '0', '0', '0', '0'),
(4, 'School', '0', '0', '0', '0'),
(5, 'Standard Wise Division', '0', '0', '0', '0'),
(6, 'Book', '0', '0', '0', '0'),
(7, 'User Privileges', '0', '0', '0', '0'),
(8, 'qrcode', '0', '0', '0', '0'),
(9, 'backup', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mst_school_info`
--

CREATE TABLE `mst_school_info` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `principal_name` varchar(50) NOT NULL,
  `school_code` varchar(20) NOT NULL,
  `registration_prefix` varchar(20) NOT NULL,
  `signature` varchar(50) NOT NULL,
  `estd_year` date NOT NULL,
  `fs_date` date NOT NULL,
  `fe_date` date NOT NULL,
  `as_date` date NOT NULL,
  `ae_date` date NOT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT 'abc@mail.com',
  `chairman_name` varchar(45) DEFAULT NULL,
  `class_allow` varchar(45) DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cur_addmision_year` varchar(10) NOT NULL,
  `principal_email` varchar(100) NOT NULL DEFAULT ' ',
  `principal_mobile` varchar(100) NOT NULL DEFAULT ' ',
  `rc_name` varchar(100) NOT NULL DEFAULT '',
  `rc_email` varchar(100) NOT NULL DEFAULT ' ',
  `rc_mobile` varchar(100) NOT NULL DEFAULT ' ',
  `web_url` varchar(100) NOT NULL DEFAULT ' ',
  `fax_no` varchar(100) NOT NULL DEFAULT ' ',
  `board` varchar(100) NOT NULL DEFAULT ' ',
  `financial_year` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_school_info`
--

INSERT INTO `mst_school_info` (`id`, `school_name`, `logo`, `address`, `principal_name`, `school_code`, `registration_prefix`, `signature`, `estd_year`, `fs_date`, `fe_date`, `as_date`, `ae_date`, `contact`, `email`, `chairman_name`, `class_allow`, `added_on`, `cur_addmision_year`, `principal_email`, `principal_mobile`, `rc_name`, `rc_email`, `rc_mobile`, `web_url`, `fax_no`, `board`, `financial_year`) VALUES
(1, 'Quick School', '/assets/uploads/Quick School.jpg', 'Ghodbunder,Thane(W)', 'Ram Sathe', 'SCL', 'sgl', '150667668966SCL.jpg', '2001-10-08', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '9876543210', 'abqc@mail.com', 'd', 'Pre Nursery to XII', '2016-10-07 18:30:00', '2017-2018', 'sd@gmail.com', '9819234567', 's', 'f@gmil.com', 'dfg', 'http://quick4it.com/', '124245645', 'maharastra', '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `mst_standard`
--

CREATE TABLE `mst_standard` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_standard`
--

INSERT INTO `mst_standard` (`id`, `name`) VALUES
(1, '2 nd'),
(2, '1 st');

-- --------------------------------------------------------

--
-- Table structure for table `mst_student`
--

CREATE TABLE `mst_student` (
  `studentID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` text,
  `phone` tinytext,
  `address` text,
  `classesID` int(11) DEFAULT NULL,
  `sectionID` int(11) DEFAULT NULL,
  `section` varchar(60) DEFAULT NULL,
  `roll` tinytext,
  `library` varchar(100) DEFAULT NULL,
  `hostel` int(11) DEFAULT NULL,
  `transport` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `totalamount` varchar(128) DEFAULT NULL,
  `paidamount` varchar(128) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `student_qr` varchar(500) DEFAULT NULL,
  `student_qr_img` varchar(500) DEFAULT NULL,
  `parentID` int(11) DEFAULT NULL,
  `year` varchar(200) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_userID` int(11) DEFAULT NULL,
  `create_username` varchar(40) DEFAULT NULL,
  `create_usertype` varchar(20) DEFAULT NULL,
  `studentactive` int(11) DEFAULT NULL,
  `clubID` int(11) DEFAULT NULL,
  `councilID` varchar(100) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `any_outstanding_acheivement` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `pcity` varchar(45) DEFAULT NULL,
  `parea` varchar(45) DEFAULT NULL,
  `ppin` varchar(45) DEFAULT NULL,
  `sybling_name1` varchar(255) DEFAULT NULL,
  `sybling_class1` varchar(255) DEFAULT NULL,
  `sybling_school1` varchar(255) DEFAULT NULL,
  `sybling_relation1` varchar(255) DEFAULT NULL,
  `sybling_name2` varchar(255) DEFAULT NULL,
  `sybling_class2` varchar(255) DEFAULT NULL,
  `sybling_school2` varchar(255) DEFAULT NULL,
  `sybling_relation2` varchar(255) DEFAULT NULL,
  `regID` varchar(255) DEFAULT NULL,
  `caste` int(11) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `pin` varchar(45) DEFAULT NULL,
  `fee_concession` varchar(110) DEFAULT NULL,
  `promoted` int(2) DEFAULT '0',
  `quota` varchar(45) DEFAULT '0',
  `permission_id` text,
  `adhar_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_student`
--

INSERT INTO `mst_student` (`studentID`, `name`, `dob`, `sex`, `religion`, `email`, `phone`, `address`, `classesID`, `sectionID`, `section`, `roll`, `library`, `hostel`, `transport`, `create_date`, `totalamount`, `paidamount`, `photo`, `student_qr`, `student_qr_img`, `parentID`, `year`, `username`, `password`, `usertype`, `modify_date`, `create_userID`, `create_username`, `create_usertype`, `studentactive`, `clubID`, `councilID`, `nationality`, `any_outstanding_acheivement`, `permanent_address`, `pcity`, `parea`, `ppin`, `sybling_name1`, `sybling_class1`, `sybling_school1`, `sybling_relation1`, `sybling_name2`, `sybling_class2`, `sybling_school2`, `sybling_relation2`, `regID`, `caste`, `area`, `city`, `pin`, `fee_concession`, `promoted`, `quota`, `permission_id`, `adhar_no`) VALUES
(1, 'ganesh avhad', '2018-08-01', 'male', NULL, 'vishal@gmail.coom', '7208297990', 'kalyan', 1, 1, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, '/assets/uploads/ganesh avhad1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_type` varchar(255) NOT NULL,
  `updated_user` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `created_user` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `company_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`user_id`, `name`, `mobile_number`, `email`, `gender`, `user_name`, `birth_date`, `user_role`, `password`, `login_type`, `updated_user`, `updated_date`, `created_user`, `created_date`, `status`, `company_id`) VALUES
(1, 'ganesh as admin', '7845457845', 'siddesh@siddeshevents.com', 'male', 'admin', '1995-02-26', '1', 'admin', '', '', '', 'ganesh', '2018-08-06 06-24-29', '1', NULL),
(2, 'ganesh Avhad', '789854628', 'siddesh@siddeshevents.com', 'male', 'ganesh', '2018-08-04', '2', 'ganesh123', '', '', '', 'ganesh', '2018-08-06 06-19-26', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qlms_login`
--

CREATE TABLE `qlms_login` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qlms_login`
--

INSERT INTO `qlms_login` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '205ae2bf209417b292e95e6f611a8708', '1'),
(5, 'ganesh', '083e5887cc424efb202bc44ea6e8bc3f', '2');

-- --------------------------------------------------------

--
-- Table structure for table `trans_issue`
--

CREATE TABLE `trans_issue` (
  `issueID` int(10) NOT NULL,
  `lID` varchar(128) NOT NULL,
  `bookID` int(11) NOT NULL,
  `book` varchar(60) DEFAULT NULL,
  `author` varchar(100) NOT NULL,
  `serial_no` varchar(40) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `total_fine` varchar(10) DEFAULT NULL,
  `fine_conc` varchar(10) DEFAULT NULL,
  `fine` varchar(11) DEFAULT NULL,
  `day_fine` varchar(20) DEFAULT '0',
  `note` text,
  `fine_remark` varchar(100) DEFAULT NULL,
  `return_by` varchar(100) DEFAULT NULL,
  `return_by_type` varchar(100) DEFAULT NULL,
  `bookcatID` varchar(100) NOT NULL,
  `accesseion_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trans_lmember`
--

CREATE TABLE `trans_lmember` (
  `lmemberID` int(11) UNSIGNED NOT NULL,
  `lID` varchar(40) NOT NULL,
  `studentID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `lbalance` varchar(20) DEFAULT NULL,
  `ljoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trans_payment`
--

CREATE TABLE `trans_payment` (
  `paymentID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `studentID` varchar(11) NOT NULL,
  `paymentamount` varchar(20) NOT NULL,
  `paymenttype` varchar(128) NOT NULL,
  `paymentdate` date NOT NULL,
  `bookID` varchar(100) NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `cheque_no` varchar(100) DEFAULT NULL,
  `account_no` varchar(100) DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trans_privilege`
--

CREATE TABLE `trans_privilege` (
  `tran_privilege_id` int(100) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  `privilege_id` varchar(255) NOT NULL,
  `pri_view` varchar(255) NOT NULL,
  `pri_add` varchar(255) NOT NULL,
  `pri_edit` varchar(255) NOT NULL,
  `pri_delete` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `trans_privilege`
--

INSERT INTO `trans_privilege` (`tran_privilege_id`, `role_id`, `privilege_id`, `pri_view`, `pri_add`, `pri_edit`, `pri_delete`) VALUES
(1, '1', '1', '1', '1', '1', '1'),
(2, '1', '2', '1', '1', '1', '1'),
(3, '1', '3', '1', '1', '1', '1'),
(4, '1', '4', '1', '1', '1', '1'),
(5, '1', '5', '1', '1', '1', '1'),
(6, '1', '6', '1', '1', '1', '1'),
(7, '1', '7', '0', '0', '0', '0'),
(8, '1', '8', '1', '1', '1', '1'),
(9, '1', '9', '0', '0', '0', '0'),
(10, '2', '1', '1', '1', '1', '1'),
(11, '2', '2', '1', '1', '1', '1'),
(12, '2', '3', '1', '1', '1', '1'),
(13, '2', '4', '1', '1', '1', '1'),
(14, '2', '5', '1', '1', '1', '1'),
(15, '2', '6', '1', '1', '1', '1'),
(16, '2', '7', '1', '1', '1', '1'),
(17, '2', '8', '1', '1', '1', '1'),
(18, '2', '9', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trans_roles`
--

CREATE TABLE `trans_roles` (
  `tran_role_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `updated_user` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `created_user` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_std_div_mapping`
--

CREATE TABLE `trans_std_div_mapping` (
  `id` int(11) NOT NULL,
  `std_id` int(100) NOT NULL,
  `div_id` int(100) NOT NULL,
  `user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_audit_log`
--
ALTER TABLE `mst_audit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_book`
--
ALTER TABLE `mst_book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `mst_bookcat`
--
ALTER TABLE `mst_bookcat`
  ADD PRIMARY KEY (`bookcatID`);

--
-- Indexes for table `mst_division`
--
ALTER TABLE `mst_division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_library_setting`
--
ALTER TABLE `mst_library_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_privileges`
--
ALTER TABLE `mst_privileges`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Indexes for table `mst_school_info`
--
ALTER TABLE `mst_school_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_standard`
--
ALTER TABLE `mst_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_student`
--
ALTER TABLE `mst_student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `regID` (`regID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `qlms_login`
--
ALTER TABLE `qlms_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_issue`
--
ALTER TABLE `trans_issue`
  ADD PRIMARY KEY (`issueID`);

--
-- Indexes for table `trans_lmember`
--
ALTER TABLE `trans_lmember`
  ADD PRIMARY KEY (`lmemberID`);

--
-- Indexes for table `trans_payment`
--
ALTER TABLE `trans_payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `trans_privilege`
--
ALTER TABLE `trans_privilege`
  ADD PRIMARY KEY (`tran_privilege_id`);

--
-- Indexes for table `trans_roles`
--
ALTER TABLE `trans_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `trans_std_div_mapping`
--
ALTER TABLE `trans_std_div_mapping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_audit_log`
--
ALTER TABLE `mst_audit_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_book`
--
ALTER TABLE `mst_book`
  MODIFY `bookID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_bookcat`
--
ALTER TABLE `mst_bookcat`
  MODIFY `bookcatID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_division`
--
ALTER TABLE `mst_division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_library_setting`
--
ALTER TABLE `mst_library_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mst_privileges`
--
ALTER TABLE `mst_privileges`
  MODIFY `privilege_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mst_school_info`
--
ALTER TABLE `mst_school_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_standard`
--
ALTER TABLE `mst_standard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_student`
--
ALTER TABLE `mst_student`
  MODIFY `studentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qlms_login`
--
ALTER TABLE `qlms_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trans_issue`
--
ALTER TABLE `trans_issue`
  MODIFY `issueID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trans_payment`
--
ALTER TABLE `trans_payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trans_privilege`
--
ALTER TABLE `trans_privilege`
  MODIFY `tran_privilege_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `trans_roles`
--
ALTER TABLE `trans_roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trans_std_div_mapping`
--
ALTER TABLE `trans_std_div_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
