-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 05:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `APOINT_ID` int(10) NOT NULL,
  `CLNAME` varchar(200) NOT NULL,
  `APPOINTCODE` varchar(222) NOT NULL,
  `GENDER` varchar(150) NOT NULL,
  `PHONE_NUMBER` varchar(110) NOT NULL,
  `APPDATE` varchar(500) NOT NULL,
  `HOSY` varchar(255) NOT NULL,
  `APPTIME` varchar(255) NOT NULL,
  `REASON` text NOT NULL,
  `REMARKS` text NOT NULL DEFAULT 'Updating..Keep Wainting!',
  `STATUS` varchar(200) NOT NULL DEFAULT 'Pending Approval',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer1`
--

CREATE TABLE `customer1` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `NID` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `GENDER` varchar(20) NOT NULL,
  `USERNAME2` varchar(110) NOT NULL,
  `PASSWORD2` varchar(233) NOT NULL,
  `JOB_ID` int(25) NOT NULL,
  `LOCATION_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer1`
--

INSERT INTO `customer1` (`EMPLOYEE_ID`, `FIRST_NAME`, `NID`, `PHONE_NUMBER`, `EMAIL`, `GENDER`, `USERNAME2`, `PASSWORD2`, `JOB_ID`, `LOCATION_ID`) VALUES
(1, 'Bonface Tech', '6473333', '0791471418', 'bontrofftech@gmail.com', 'Male', 'admin', 'admin', 1, 212),
(15, 'Khuyole Bo', '2222', '078887878', 'bontrofftechh@gmail.com', 'Male', 'user2', '1234', 2, 212);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `GENDER` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `STAFFNO` varchar(200) NOT NULL,
  `HOSY` varchar(200) NOT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `STAFFNO`, `HOSY`, `JOB_ID`, `HIRED_DATE`, `LOCATION_ID`) VALUES
(1, 'Bonface', 'Tech', 'Male', 'bontrofftechgmail.com', '0791471418', '', '', 1, '0000-00-00', 212);

-- --------------------------------------------------------

--
-- Table structure for table `hosy`
--

CREATE TABLE `hosy` (
  `SUPPLIER_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `CATEGORY` varchar(400) NOT NULL,
  `AMBU_PHONE` varchar(200) NOT NULL,
  `AMBU_REG` varchar(200) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Administrator'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `PROVINCE` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `PROVINCE`, `CITY`) VALUES
(212, 'Bungoma', 'Webuye East');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medcategory`
--

CREATE TABLE `medcategory` (
  `id` int(150) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medcategory`
--

INSERT INTO `medcategory` (`id`, `CATEGORY_ID`, `CNAME`) VALUES
(10, 1, 'Devices'),
(11, 2, 'Pharmaceutical Drugs');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(50) DEFAULT NULL,
  `SUPPLIER_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `DESCRIPTION` varchar(2000) NOT NULL,
  `QTY_STOCK` varchar(400) NOT NULL,
  `ON_HAND` varchar(400) NOT NULL,
  `PRICE` int(15) NOT NULL,
  `BYUSER` varchar(200) NOT NULL,
  `DATE_STOCK_IN` varchar(20) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANS_ID` int(50) NOT NULL,
  `CUST_ID` int(11) DEFAULT NULL,
  `CUST` varchar(200) NOT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TYPE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMPLOYEE_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`) VALUES
(1, 1, 'admin', 'admin', 1),
(29, 15, 'user', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`APOINT_ID`);

--
-- Indexes for table `customer1`
--
ALTER TABLE `customer1`
  ADD PRIMARY KEY (`EMPLOYEE_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`),
  ADD KEY `JOB_ID` (`JOB_ID`);

--
-- Indexes for table `hosy`
--
ALTER TABLE `hosy`
  ADD PRIMARY KEY (`SUPPLIER_ID`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `medcategory`
--
ALTER TABLE `medcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `SUPPLIER_ID` (`SUPPLIER_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANS_ID`),
  ADD KEY `TRANS_DETAIL_ID` (`TRANS_D_ID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TRANS_D_ID` (`TRANS_D_ID`) USING BTREE;

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `APOINT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer1`
--
ALTER TABLE `customer1`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hosy`
--
ALTER TABLE `hosy`
  MODIFY `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `medcategory`
--
ALTER TABLE `medcategory`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`JOB_ID`) REFERENCES `job` (`JOB_ID`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
