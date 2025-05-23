-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 26, 2024 at 06:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newosms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_td` int(11) NOT NULL,
  `a_name` varchar(60) NOT NULL,
  `a_email` varchar(60) NOT NULL,
  `a_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_td`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `pid` int(11) NOT NULL,
  `pname` varchar(60) NOT NULL,
  `pdop` date NOT NULL,
  `pava` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `poriginalcost` int(11) NOT NULL,
  `psellingcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`pid`, `pname`, `pdop`, `pava`, `ptotal`, `poriginalcost`, `psellingcost`) VALUES
(2, 'mouse', '2024-11-22', 10, 20, 150, 200);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text NOT NULL,
  `request_desc` text NOT NULL,
  `requester_name` varchar(60) NOT NULL,
  `requester_add1` text NOT NULL,
  `requester_add2` text NOT NULL,
  `requester_city` varchar(60) NOT NULL,
  `requester_state` varchar(60) NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `assign_tech` varchar(60) NOT NULL,
  `assign_date` date NOT NULL,
  `tech_ph` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`, `tech_ph`) VALUES
(5, 2, 'i am tharun fan repair', 'yesterday my fan suddenly  does not work , so can you me? ', 'tharun', ' pondy', ' pondy', 'pondicherry', 'tamilnadu', 12345, 'tharun@gmail.com', 1234567899, 'sathish', '2024-11-27', 9897986545),
(6, 4, 'ram fridge repair', 'fridge repair and  particularly fridge not cooling', 'ram', ' cuddalore', ' cuddalore', 'cuddalore', 'tamil nadu', 12345, 'ram@gmail.com', 1234567899, 'pugazh', '2024-11-28', 9897669856);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `custid` int(11) NOT NULL,
  `custname` varchar(60) NOT NULL,
  `custadd` varchar(60) NOT NULL,
  `cpname` varchar(60) NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`custid`, `custname`, `custadd`, `cpname`, `cpquantity`, `cpeach`, `cptotal`, `cpdate`) VALUES
(1, 'tharun', 'pondicherry', 'pc keyboard', 1, 600, 600, '2024-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(1, 'tharun', 'tharun@gmail.com', '123'),
(2, 'jagan', 'jagan@gmail.com', '123'),
(3, 'ram', 'ram@gmail.com', '123'),
(4, 'ravi', 'ravi@gmail.com', '123'),
(5, 'basha', 'basha@gmail.com', '123'),
(6, 'kumar', 'kumar@gmail.com', '123'),
(7, 'vijay', 'vijay@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `status_tb`
--

CREATE TABLE `status_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text NOT NULL,
  `request_desc` varchar(60) NOT NULL,
  `requester_name` varchar(60) NOT NULL,
  `requester_add1` text NOT NULL,
  `requester_add2` text NOT NULL,
  `requester_city` varchar(60) NOT NULL,
  `requester_state` varchar(60) NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `assign_tech` varchar(60) NOT NULL,
  `assign_date` date NOT NULL,
  `tech_ph` int(11) NOT NULL,
  `w_status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `status_tb`
--

INSERT INTO `status_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`, `tech_ph`, `w_status`) VALUES
(33, 2, 'i am tharun fan repair', 'yesterday my fan suddenly  does not work , so can you me? ', 'tharun', '  pondy', '  pondy', 'pondicherry', 'tamilnadu', 12345, 'tharun@gmail.com', 1234567899, 'sathish', '2024-11-27', 2147483647, ' Pending'),
(34, 4, 'ram fridge repair', 'fridge repair and  particularly fridge not cooling', 'ram', '  cuddalore', '  cuddalore', 'cuddalore', 'tamil nadu', 12345, 'ram@gmail.com', 1234567899, 'pugazh', '2024-11-28', 2147483647, ' outofstock'),
(35, 6, 'kumar keyboard repair', 'keyboard repair', 'kumar', '  chennai', '  cbennai', 'chennai', 'tamil nadu', 12345, 'kumar@gmail.com', 1234567997, 'ravi kumar', '2024-11-27', 989411098, ' Pending');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL,
  `request_info` text NOT NULL,
  `request_desc` text NOT NULL,
  `requester_name` varchar(60) NOT NULL,
  `requester_add1` text NOT NULL,
  `requester_add2` text NOT NULL,
  `requester_city` varchar(60) NOT NULL,
  `requester_state` varchar(60) NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(2, 'i am tharun fan repair', 'yesterday my fan suddenly  does not work , so can you me? ', 'tharun', 'pondy', 'pondy', 'pondicherry', 'tamilnadu', 12345, 'tharun@gmail.com', 1234567899, '2024-11-23'),
(4, 'ram fridge repair', 'fridge repair and  particularly fridge not cooling', 'ram', 'cuddalore', 'cuddalore', 'cuddalore', 'tamil nadu', 12345, 'ram@gmail.com', 1234567899, '2024-11-25'),
(5, 'tv', 'tv repair', 'basha', 'cuddalore', 'ggg', '  bkkkh', 'gii', 5858, 'basha@gmail.com', 1234567888, '2024-11-25'),
(6, 'kumar keyboard repair', 'keyboard repair', 'kumar', 'chennai', 'cbennai', 'chennai', 'tamil nadu', 12345, 'kumar@gmail.com', 1234567997, '2024-11-26'),
(7, 'vijay', 'phone repair', 'vijay', 'chennai', 'chennai', 'chennai', 'tamilnadu', 8755, 'vijay@gmail.com', 1234567899, '2024-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `empid` int(11) NOT NULL,
  `empName` varchar(60) NOT NULL,
  `empCity` varchar(60) NOT NULL,
  `empMobile` bigint(20) NOT NULL,
  `empEmail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`empid`, `empName`, `empCity`, `empMobile`, `empEmail`) VALUES
(1, 'ravi kumar', 'pondicherry', 1234567891, 'ravikumar@gmail.com'),
(2, 'sam', 'chennai', 9894229876, 'sam@gmail.com'),
(3, 'pugazj', 'cuddaloree', 9897669856, 'pugazh@gmail.com'),
(4, 'sathish', 'selan', 9897986540, 'sathish@gmail.com'),
(5, 'baskar', 'coimbature', 9893982231, 'basha@gmail.com'),
(6, 'nikash', 'ot', 9894982234, 'nikash@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_td`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `status_tb`
--
ALTER TABLE `status_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_td` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status_tb`
--
ALTER TABLE `status_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
