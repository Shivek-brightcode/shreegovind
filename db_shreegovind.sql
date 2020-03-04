-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 07:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mcps`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `t_address` varchar(255) NOT NULL,
  `t_state` varchar(255) NOT NULL,
  `t_district` varchar(255) NOT NULL,
  `t_area` varchar(255) NOT NULL,
  `t_pincode` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `p_state` varchar(255) NOT NULL,
  `p_district` varchar(255) NOT NULL,
  `p_area` varchar(255) NOT NULL,
  `p_pincode` varchar(255) NOT NULL,
  `admission_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_expenditure`
--

CREATE TABLE `add_expenditure` (
  `exp_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  `billno` varchar(255) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `school` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `cid` int(11) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `alt_mobile` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admission_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_details`
--

CREATE TABLE `enquiry_details` (
  `e_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `Admission_date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `refrence` varchar(255) NOT NULL,
  `t_address` varchar(255) NOT NULL,
  `t_state` varchar(255) NOT NULL,
  `t_district` varchar(255) NOT NULL,
  `t_area` varchar(255) NOT NULL,
  `t_pincode` varchar(255) NOT NULL,
  `add_check` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `p_state` varchar(255) NOT NULL,
  `p_district` varchar(255) NOT NULL,
  `p_area` varchar(255) NOT NULL,
  `p_pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `alt_mobile` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_detail`
--

CREATE TABLE `fee_detail` (
  `fee_id` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `m_fee` varchar(200) NOT NULL,
  `admission_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `month_name` varchar(255) NOT NULL,
  `index1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_registration`
--

CREATE TABLE `new_registration` (
  `admission_no` int(11) NOT NULL,
  `admission_date` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_occup` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_occup` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `caste` varchar(255) NOT NULL,
  `adhar_no` varchar(50) NOT NULL,
  `identification` varchar(255) NOT NULL,
  `previous_school` varchar(255) NOT NULL,
  `previous_class` varchar(255) NOT NULL,
  `promoted` varchar(255) NOT NULL,
  `transfer_certificate` varchar(255) NOT NULL,
  `marksheet` varchar(255) NOT NULL,
  `caste_certificate` varchar(255) NOT NULL,
  `domecile` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promoted_class`
--

CREATE TABLE `promoted_class` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `employee_id` int(11) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `employee_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `caste` varchar(255) NOT NULL,
  `identification` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `company_pf` varchar(255) NOT NULL,
  `pf_acc_no` varchar(255) NOT NULL,
  `income_tax_no` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `t_address` varchar(255) NOT NULL,
  `t_state` varchar(255) NOT NULL,
  `t_district` varchar(255) NOT NULL,
  `t_area` varchar(255) NOT NULL,
  `t_pin` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `p_state` varchar(255) NOT NULL,
  `p_district` varchar(255) NOT NULL,
  `p_area` varchar(255) NOT NULL,
  `p_pin` varchar(255) NOT NULL,
  `mobile` int(20) NOT NULL,
  `alt_mobile` int(20) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `pf` varchar(255) NOT NULL,
  `hra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_payment`
--

CREATE TABLE `staff_payment` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `months` varchar(255) NOT NULL,
  `employee_type` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `doj` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `company_pf_no` varchar(255) NOT NULL,
  `pf_acc_no` varchar(255) NOT NULL,
  `income_tax_no` varchar(255) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `working_day` varchar(255) NOT NULL,
  `holiday` varchar(255) NOT NULL,
  `hra` varchar(255) NOT NULL,
  `medical-allowance` varchar(255) NOT NULL,
  `con_allowance` varchar(255) NOT NULL,
  `special_allowance` varchar(255) NOT NULL,
  `tot_deduction` varchar(255) NOT NULL,
  `net_payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE `student_payments` (
  `id` int(11) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `adm_form` varchar(255) NOT NULL,
  `adm_charge` varchar(255) NOT NULL,
  `re_adm_charge` varchar(255) NOT NULL,
  `monthly_fee` varchar(255) NOT NULL,
  `transport_fee` varchar(255) NOT NULL,
  `annual_dev` varchar(255) NOT NULL,
  `tie_belt_diary` varchar(255) NOT NULL,
  `book_cover_copies` varchar(255) NOT NULL,
  `fine` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `admission_date` varchar(255) NOT NULL,
  `total_fee` varchar(255) NOT NULL,
  `payable_amount` varchar(255) NOT NULL,
  `dues_amount` varchar(255) NOT NULL,
  `pay_mode` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_payment_updation`
--

CREATE TABLE `student_payment_updation` (
  `id` int(11) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `months` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `admission_date` varchar(255) NOT NULL,
  `total_fee` varchar(255) NOT NULL,
  `payable_amount` varchar(255) NOT NULL,
  `dues_amount` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE `student_result` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sci` varchar(200) NOT NULL,
  `s_sci` varchar(200) NOT NULL,
  `math` varchar(200) NOT NULL,
  `hindi` varchar(200) NOT NULL,
  `english` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `published` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `mobile`, `email`, `date`, `published`) VALUES
(1, 'admin', 'admin', 'admin', 'chitranjan mahto', '9504304862', 'chitranjan.mahto@rsgss.com', '2017-04-01', '1'),
(2, 'user', 'user', 'user', 'chitranjan kumar', '9504304862', 'chitranjan.mahto@rsgss.com', '2017-04-12', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `add_expenditure`
--
ALTER TABLE `add_expenditure`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `enquiry_details`
--
ALTER TABLE `enquiry_details`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `fee_detail`
--
ALTER TABLE `fee_detail`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `new_registration`
--
ALTER TABLE `new_registration`
  ADD PRIMARY KEY (`admission_no`);

--
-- Indexes for table `promoted_class`
--
ALTER TABLE `promoted_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `staff_payment`
--
ALTER TABLE `staff_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_payment_updation`
--
ALTER TABLE `student_payment_updation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_result`
--
ALTER TABLE `student_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_expenditure`
--
ALTER TABLE `add_expenditure`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry_details`
--
ALTER TABLE `enquiry_details`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_detail`
--
ALTER TABLE `fee_detail`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_registration`
--
ALTER TABLE `new_registration`
  MODIFY `admission_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promoted_class`
--
ALTER TABLE `promoted_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_payment`
--
ALTER TABLE `staff_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_payments`
--
ALTER TABLE `student_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_payment_updation`
--
ALTER TABLE `student_payment_updation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_result`
--
ALTER TABLE `student_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
