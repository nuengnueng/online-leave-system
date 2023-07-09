-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 03:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_online_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'ชื่อผู้ใช้ระบบ',
  `password` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `inspector`
--

CREATE TABLE `inspector` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `inspector`
--

INSERT INTO `inspector` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'ศรันย์', '5656', 'inspector');

-- --------------------------------------------------------

--
-- Table structure for table `leave_information`
--

CREATE TABLE `leave_information` (
  `id` int(10) NOT NULL,
  `Psn_id` varchar(10) NOT NULL,
  `nametitle` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `leave_name` varchar(50) NOT NULL COMMENT 'ชื่อประเภทการลา',
  `description` varchar(255) NOT NULL COMMENT 'รายละเอียดการขอลา',
  `start` varchar(10) NOT NULL COMMENT 'วันที่เริ่มลา',
  `end` varchar(10) NOT NULL COMMENT 'วันที่สิ้นสุด',
  `phonenumber` char(11) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `postingDate` varchar(10) NOT NULL COMMENT 'จำนวนวันที่ลา',
  `status` varchar(20) NOT NULL COMMENT 'สถานะ',
  `img` varchar(50) NOT NULL,
  `leave_limit` varchar(50) NOT NULL COMMENT 'จำกัดการลา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `leave_information`
--

INSERT INTO `leave_information` (`id`, `Psn_id`, `nametitle`, `username`, `lastname`, `leave_name`, `description`, `start`, `end`, `phonenumber`, `postingDate`, `status`, `img`, `leave_limit`) VALUES
(10, '1111', '', '', '', 'ลาป่วย', 'ปวดท้อง', '2023-01-30', '2023-01-31', '0986390209', '2023-01-30', 'รอการอนุมัติ', '197817214320230130_061818.png', ''),
(11, '4565', 'Mrs', 'จานรา', 'ราน', 'ลาป่วย', 'เจ็บท้อง', '2023-02-01', '2023-02-02', '', '', '', '164679759520230201_102048.jpg', ''),
(12, '101', 'Mrs', 'ดารานี', 'เงินดี', 'ลากิจ', ' ปวดหัว', '2023-02-01', '2023-02-02', '', '', '', '203985826920230201_105607.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `leave_id` varchar(10) NOT NULL COMMENT 'รหัสประเภทการลา',
  `leave_name` varchar(50) NOT NULL COMMENT 'ชื่อประเภทการลา',
  `leave_limit` varchar(50) NOT NULL COMMENT 'จำกัดเวลา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(10) NOT NULL,
  `Psn_id` varchar(10) NOT NULL COMMENT 'รหัสพนักงาน',
  `nametitle` varchar(10) NOT NULL COMMENT 'คำนำหน้า',
  `username` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `password` varchar(50) NOT NULL COMMENT 'รหัส',
  `phonenumber` char(11) NOT NULL COMMENT 'โทรศัพท์',
  `position` varchar(50) NOT NULL COMMENT 'ตำแหน่ง',
  `affiliation` varchar(50) NOT NULL COMMENT 'สังกัด',
  `employees` varchar(50) NOT NULL COMMENT 'พนักงาน',
  `leave_limit` varchar(50) NOT NULL COMMENT 'วันลาคงเหลือ',
  `usertype` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `Psn_id`, `nametitle`, `username`, `lastname`, `password`, `phonenumber`, `position`, `affiliation`, `employees`, `leave_limit`, `usertype`, `created_at`) VALUES
(3, '102', 'นาง', 'สุกัญญา', 'รัตนรัก', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้อำนวยการกองคลัง', 'หัวหน้าส่วนราชการ', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:12:13'),
(4, '103', 'นาย', 'จิตร', 'นรสิงห์', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้อำนวยการกองช่าง', 'หัวหน้าส่วนราชการ', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(5, '104', 'นาย', 'อริยะเดช', 'สายเเก้ว', '81dc9bdb52d04dc20036dbd8313ed055', '', 'นิติกรชำนาญการ', 'สำนักงานปลัด', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(6, '105', 'นาย', 'สุทิน', 'วิจิรัมย์', '81dc9bdb52d04dc20036dbd8313ed055', '', 'หัวหน้าสำนักปลัด', 'หัวหน้าส่วนราชการ', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(7, '106', 'นาง', 'ราตรี', 'เงินดี', '81dc9bdb52d04dc20036dbd8313ed055', '', 'นักวิชาการตรวจสอบภายในชำนาญการ', 'หัวหน้าส่วนราชการ', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(8, '107', 'นาย', 'ศรัญย์', 'ศรัทธา', 'ae5eb824ef87499f644c3f11a7176157', '', 'นักจัดการงานทั่วไปชำนาญการ', 'สำนักงานปลัด', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(9, '108', 'นางสาว', 'อริภชา', 'รักโสภา', '81dc9bdb52d04dc20036dbd8313ed055', '', 'นักวิชาการศึกษาปฏิบัติการ', 'กองการศึกษา ศาสนาและวัฒนธรรม', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(10, '109', 'นาง', 'เกศชฎาพร', 'สุทธาบุญ', '81dc9bdb52d04dc20036dbd8313ed055', '', 'นักพัฒนาชุมชนชำนาญการ', 'สำนักงานปลัด', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(11, '110', 'นาย', 'วีระพงษ์', 'ทองมา', '81dc9bdb52d04dc20036dbd8313ed055', '', 'นักวิชาการพัสดุชำนาญการ', 'กองคลัง', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(12, '111', 'นาย', 'มาโนช', 'ทองเทพ', '81dc9bdb52d04dc20036dbd8313ed055', '', 'เจ้าหน้างานป้องกันเเละบรรเทาสาธารณภัยปฏิบัติงาน', 'สำนักงานปลัด', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(13, '112', 'นาย', 'ศรชัย', 'ศรีโสดา', '81dc9bdb52d04dc20036dbd8313ed055', '', 'นายช่างโยธาปฏิบัติงาน', 'กองช่าง', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(14, '113', 'พันจ่า', 'ตรีไสว', 'สายทอง', '81dc9bdb52d04dc20036dbd8313ed055', '', 'นักวิเคราะห์นโยบายเเละเเผนชำนาญการ', 'หัวหน้าส่วนราชการ', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(15, '114', 'นาง', 'สมยงค์', 'คุ้มครอง', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ครูอันดับ คศ.2', 'กองการศึกษา ศาสนาและวัฒนธรรม', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(16, '115', 'นาง', 'กัญชลิกา', 'วิจิรันย์', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานส่วนตำบล', 'ครูอันดับ คศ.3', 'พนักงานส่วนตำบล', '', 'user', '2023-01-29 08:18:24'),
(18, '002', 'นาย', 'บรรพต', 'เที่ยงธรรม', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้ช่วยเจ้าพนักงานจัดเก็บรายได้', 'กองคลัง', 'พนักงานส่วนจ้าง', '', 'user', '2023-01-29 08:18:24'),
(19, '003', 'นาง', 'วิดาวรรณ', 'นรสิงห์', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้ช่วยครูผู้ดูเเลเด็กเล็ก', 'กองการศึกษา ศาสนาและวัฒนธรรม', 'พนักงานส่วนจ้าง', '', 'user', '2023-01-29 08:18:24'),
(20, '004', 'นาง', 'ดวงดาว', 'จิตตโคต', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้ช่วยครูผู้ดูเเลเด็กเล็ก', 'กองการศึกษา ศาสนาและวัฒนธรรม', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:18:24'),
(21, '005', 'นาง', 'อัมพร', 'คุ้มครอง', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้ช่วยครูผู้ดูเเลเด็กเล็ก', 'กองการศึกษา ศาสนาและวัฒนธรรม', 'พนักงานจ้าง', '', 'user', '0000-00-00 00:00:00'),
(22, '106', 'นางสาว', 'เสงี่ยม ', 'คุ้มครอง', '81dc9bdb52d04dc20036dbd8313ed055', '', 'นักการภารโรง', 'สำนักงานปลัด', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:19:44'),
(23, '007', 'นาย', 'ชายตะวัน ', 'โพนปลัด', '81dc9bdb52d04dc20036dbd8313ed055', '', 'นักช่วยนักวิชาการเกษตร', 'สำนักงานปลัด', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:19:44'),
(24, '008', 'นางสาว', 'นวลนภา ', 'ยาศรี', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้ช่วยเจ้าพนักงานศูนย์เยาวชน', 'กองการศึกษา ศาสนาและวัฒนธรรม', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:19:44'),
(25, '009', 'นาย', 'คำพอง', 'ยาศรี', '81dc9bdb52d04dc20036dbd8313ed055', '', 'คนงานทั่วไป', 'สำนักงานปลัด', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:19:44'),
(26, '010', 'นาย', 'สุบิน', 'รุ่งแสง', '1234', '', 'ผู้ช่วยพนักงานประปา', 'กองช่าง', 'พนักงานจ้าง', '', 'user', '2023-01-30 03:15:59'),
(27, '011', 'นาย', 'วราวุฒิ ', 'วงศ์พินิจ', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผุ้ช่วยพนักงานธุรการ(กองช่าง)', 'กองช่าง', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(28, '012', 'นางสาว', 'สุมินตรา ', 'ไก่แก้ว', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้ช่วยนักวิชาการสาธารณสุข', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(29, '013', 'นาย', 'บุญเจียม ', 'คุ้มครอง', '81dc9bdb52d04dc20036dbd8313ed055', '', 'คนงานทั่วไป', 'สำนักงานปลัด', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(30, '014', 'นาย', 'ภานุวัฒน์ ', 'พรมชาติ', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมา', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(31, '015', 'นาย', 'ชาตรี', 'บุญรักษา', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมา', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(32, '016', 'นาย', 'กัณฑโชค', 'บัวจันทร์', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมา', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(33, '017', 'นาย', 'ศุภชัย', 'โพนปลัด', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมาช่างไฟ', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(34, '018', 'นาย', 'รัฐภูมิ', 'บุญศรี', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมาขับรถขยะ', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(35, '019', 'นางสาว', 'ธนิดา', 'สายเเก้ว', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้ช่วยเจ้าพนักงานธุรการ', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(36, '020', 'นางสาว', 'ขวัญเรือน', 'บุญโย', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ผู้ช่วยเจ้าพนักงานธุรการ', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(37, '021', 'นางสาว', 'ทิติยา', 'เบ้างาน', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมาประชาสัมพันธ์', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(38, '022', 'นาย', 'วีระเทพ', 'ภาษี', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมา', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(39, '023', 'นาย', 'วีรชิต', 'บุทธนา', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมา', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(40, '024', 'นาย', 'ศุภวิชญ์', 'มุขขันธ์', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมา', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(41, '025', 'นาย', 'พงษ์ศักดิ์', 'พรมชาติ', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมา', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(42, '026', 'นาย', 'วีระพล', 'เกษี', '81dc9bdb52d04dc20036dbd8313ed055', '', 'พนักงานจ้างเหมา', '', 'พนักงานจ้าง', '', 'user', '2023-01-29 08:24:10'),
(47, '200', 'นาง', ' หนึ่งฤทัย', 'คำโต', 'c369208983346763c5139555a4ea7dca', '0232145565', 'นักวิชาการตรวจสอบภายในชำนาญการ', 'ผู้บริหารท้องถิ่น', 'พนักงานส่วนตำบล', '', '', '2023-01-30 04:55:58'),
(48, '563', 'นาย', 'สุบิน', 'รุ่งแสง', 'cb3ce9b06932da6faaa7fc70d5b5d2f4', '02314569', 'นักวิเคราะห์นโยบายเเละเเผนชำนาญการ', 'ผู้บริหารท้องถิ่น', 'พนักงานส่วนตำบล', '', '', '2023-01-31 13:02:53'),
(49, '563', 'นาย', 'สุบิน', 'รุ่งแสง', 'd14388bb836687ff2b16b7bee6bab182', '02314569', 'นักวิเคราะห์นโยบายเเละเเผนชำนาญการ', 'ผู้บริหารท้องถิ่น', 'พนักงานส่วนตำบล', '', '', '2023-01-31 13:03:54'),
(50, '120', 'นาย', 'สุบิน', 'รุ่งแสง', 'deef326f742931ab8dcb649778a3d77b', '02314569', 'นักวิเคราะห์นโยบายเเละเเผนชำนาญการ', 'ผู้บริหารท้องถิ่น', 'พนักงานส่วนตำบล', '', '', '2023-01-31 13:04:08'),
(51, '456', 'นาง', 'หนึ่งหทัย', 'ยาวนาน', '81dc9bdb52d04dc20036dbd8313ed055', '03214569', 'นายช่างโยธาปฏิบัติงาน', 'ผู้บริหารท้องถิ่น', 'พนักงานส่วนตำบล', '', '', '2023-01-31 13:07:34'),
(53, '003', '-เลือกคำนำ', 'วิดาวรรณ', 'นรสิงห์', 'ec6a6536ca304edf844d1d248a4f08dc', '', '-เลือกตำแหน่ง', '-เลือกสังกัด', '-เลือกพนักงาน', '', '', '2023-01-31 18:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `primeminister`
--

CREATE TABLE `primeminister` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `primeminister`
--

INSERT INTO `primeminister` (`id`, `username`, `password`, `usertype`) VALUES
(1, ' สุริยันต์', '1234', 'primeminis'),
(2, 'primeminister', '5656', 'primeminis');

-- --------------------------------------------------------

--
-- Table structure for table `status1`
--

CREATE TABLE `status1` (
  `Allow` varchar(20) NOT NULL,
  `Cancel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status2`
--

CREATE TABLE `status2` (
  `Approve` varchar(20) NOT NULL,
  `Cancel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspector`
--
ALTER TABLE `inspector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_information`
--
ALTER TABLE `leave_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primeminister`
--
ALTER TABLE `primeminister`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inspector`
--
ALTER TABLE `inspector`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_information`
--
ALTER TABLE `leave_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `primeminister`
--
ALTER TABLE `primeminister`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
