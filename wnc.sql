-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 10:09 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wnc`
--

-- --------------------------------------------------------

--
-- Table structure for table `wnc_adoption`
--

CREATE TABLE `wnc_adoption` (
  `adoption_id` int(5) NOT NULL,
  `adoption_animal_id` int(5) NOT NULL,
  `adoption_username` varchar(20) NOT NULL,
  `adoption_int` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1=Interested , 2= Not Interested',
  `adoption_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wnc_adoption`
--

INSERT INTO `wnc_adoption` (`adoption_id`, `adoption_animal_id`, `adoption_username`, `adoption_int`, `adoption_date`) VALUES
(4, 3, '18', '2', '2017-03-30 06:03:08'),
(5, 1, '18', '2', '2017-03-30 06:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `wnc_animal`
--

CREATE TABLE `wnc_animal` (
  `animal_id` int(5) NOT NULL,
  `animal_name` varchar(255) NOT NULL,
  `animal_category` varchar(50) NOT NULL,
  `animal_breed` varchar(50) NOT NULL,
  `animal_age` int(5) NOT NULL,
  `animal_color` varchar(30) NOT NULL,
  `animal_image` longtext NOT NULL,
  `animal_des` longtext NOT NULL,
  `animal_placefound` varchar(30) NOT NULL,
  `animal_adopt` enum('1','2') NOT NULL DEFAULT '1',
  `animal_status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wnc_animal`
--

INSERT INTO `wnc_animal` (`animal_id`, `animal_name`, `animal_category`, `animal_breed`, `animal_age`, `animal_color`, `animal_image`, `animal_des`, `animal_placefound`, `animal_adopt`, `animal_status`) VALUES
(1, 'Victoria', 'Dog', 'Nan', 5, 'Brown', 'team1.jpg', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo', 'Ahmedabad', '1', '1'),
(2, 'Thomson', 'Dog', 'Nan', 3, 'White', 'team2.jpg', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo', 'Ahmedabad', '1', '1'),
(3, 'Federica', 'Dog', 'Nan', 7, 'White', 'team3.jpg', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo', 'Ahmedabad', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wnc_blog`
--

CREATE TABLE `wnc_blog` (
  `blog_id` int(5) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_image` longtext NOT NULL,
  `blog_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wnc_blog`
--

INSERT INTO `wnc_blog` (`blog_id`, `blog_title`, `blog_date`, `blog_image`, `blog_description`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', '2017-03-30 06:27:55', 'bl.jpg', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leosd.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo\r\n\r\n'),
(2, '2 Lorem ipsum dolor sit amet, consectetur adipisicing elit', '2017-03-23 06:27:55', 'bl1.jpg', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leosd.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo\r\n\r\n'),
(3, 'Tsdf  orem ipsum dolor sit amet, consectetur adipisicing elit', '2017-03-27 06:27:55', 'bl2.jpg', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leosd.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `wnc_city`
--

CREATE TABLE `wnc_city` (
  `city_id` int(5) NOT NULL,
  `city_name` int(5) NOT NULL,
  `state_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wnc_comment`
--

CREATE TABLE `wnc_comment` (
  `comment_id` int(5) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_description` longtext NOT NULL,
  `comment_username` varchar(255) NOT NULL,
  `comment_blog` int(5) NOT NULL,
  `comment_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=Approved , 2=Not App.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wnc_comment`
--

INSERT INTO `wnc_comment` (`comment_id`, `comment_date`, `comment_description`, `comment_username`, `comment_blog`, `comment_status`) VALUES
(1, '2017-03-30 07:37:59', 'dsjfhdj fd ', '18', 0, '2'),
(2, '2017-03-30 07:41:21', 'demo cmnt', '18', 0, '1'),
(3, '2017-03-30 07:41:23', 'demo cmnt', '18', 0, '1'),
(4, '2017-03-30 07:42:01', 'demo cmnt', '18', 0, '1'),
(5, '2017-03-30 07:43:03', 'demo cmnt', '18', 0, '1'),
(6, '2017-03-30 07:44:09', 'demo 2', '18', 0, '1'),
(7, '2017-03-30 07:45:43', 'kdkd fkg kg gf f', '18', 0, '1'),
(8, '2017-03-30 08:15:12', 'final ', '18', 0, '1'),
(9, '2017-03-30 08:15:12', 'final ', '18', 1, '1'),
(10, '2017-03-30 08:19:51', 'kjfdkgfd', 'dkfdjk', 1, '1'),
(11, '2017-03-30 08:20:26', 'kdjfgkfd', 'kdfj@fd.com', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wnc_complaint`
--

CREATE TABLE `wnc_complaint` (
  `complaint_id` int(5) NOT NULL,
  `complaint_username` varchar(20) NOT NULL,
  `complaint_complaint` longtext NOT NULL,
  `complaint_image` longtext NOT NULL,
  `complaint_desc` longtext NOT NULL,
  `complaint_phone` int(10) NOT NULL,
  `complaint_status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=Pending, 2= Solved, 3= CAncel',
  `complaint_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wnc_complaint`
--

INSERT INTO `wnc_complaint` (`complaint_id`, `complaint_username`, `complaint_complaint`, `complaint_image`, `complaint_desc`, `complaint_phone`, `complaint_status`, `complaint_date`) VALUES
(1, '18', 'dkfjdk', 'NAN', ' dlfkd jks dj ', 1423456878, '1', '2017-03-30 09:46:14'),
(2, '18', 'ldskf ldfk l', 'complaint_1490866585.jpg', ' kdfkgdk gjk kjgkr', 254554545, '1', '2017-03-30 09:46:14'),
(3, '21', 'kfj gfd gkfd j', 'NAN', 'djf gg jf d ', 454545454, '1', '2017-03-30 09:46:14'),
(4, '22', 'demo ', 'complaint_1490866955.jpg', 'dlfjkg fjg kfd ', 45458787, '1', '2017-03-30 09:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `wnc_events`
--

CREATE TABLE `wnc_events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(30) NOT NULL,
  `event_place` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_relation` int(11) NOT NULL,
  `event_iv_id` int(5) NOT NULL,
  `event_description` varchar(100) NOT NULL,
  `event_status` char(1) NOT NULL,
  `event_username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wnc_event_image`
--

CREATE TABLE `wnc_event_image` (
  `event_image_id` int(5) NOT NULL,
  `event_image_is` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wnc_register`
--

CREATE TABLE `wnc_register` (
  `register_id` int(5) NOT NULL,
  `register_fname` varchar(20) NOT NULL,
  `register_lname` varchar(20) NOT NULL,
  `register_gender` char(1) DEFAULT NULL,
  `register_city` varchar(20) DEFAULT NULL,
  `register_state` varchar(20) DEFAULT NULL,
  `register_country` varchar(20) DEFAULT NULL,
  `register_pincode` int(10) DEFAULT NULL,
  `register_dob` date DEFAULT NULL,
  `register_email` longtext NOT NULL,
  `register_phone` int(10) DEFAULT NULL,
  `register_username` longtext NOT NULL,
  `register_password` longtext NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `register_status` enum('1','2','3','') NOT NULL DEFAULT '1',
  `register_profilepic` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wnc_register`
--

INSERT INTO `wnc_register` (`register_id`, `register_fname`, `register_lname`, `register_gender`, `register_city`, `register_state`, `register_country`, `register_pincode`, `register_dob`, `register_email`, `register_phone`, `register_username`, `register_password`, `register_date`, `register_status`, `register_profilepic`) VALUES
(5, 'dhruvi', 'dhruvi', NULL, NULL, NULL, NULL, NULL, NULL, 'abc@gmail.com ', NULL, 'dhruvi', '123456', '2017-03-29 18:40:56', '1', NULL),
(6, 'Dj', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'xyz@gmail.com', NULL, 'Dj', '808ad70a5b47d547132fe80dbbe0f5b5', '2017-03-29 18:45:37', '1', NULL),
(7, 'T', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'fjd@fdgj.com', NULL, 'T', 'cfd497897797958b5e073da300e53d42', '2017-03-29 18:47:05', '1', NULL),
(8, 'sdgk', 'jkfjdk', NULL, NULL, NULL, NULL, NULL, NULL, 'fdkg@kdfjg.com', NULL, 'usersdgk', 'b1b06df3f798743a3b42bd6d08f8b13e', '2017-03-29 18:47:56', '1', NULL),
(9, 'dsgfd', 'fdg', NULL, NULL, NULL, NULL, NULL, NULL, 'Enter Email', NULL, 'userdsgfd', '63141188c108fe9662ee901e3b0ac67c', '2017-03-29 18:48:16', '1', NULL),
(10, 'dsf', 'Last Name', NULL, NULL, NULL, NULL, NULL, NULL, 'Enter Email', NULL, 'userdsf', '63141188c108fe9662ee901e3b0ac67c', '2017-03-29 18:49:18', '1', NULL),
(11, 'dsf', 'Last Name', NULL, NULL, NULL, NULL, NULL, NULL, 'Enter Email', NULL, 'userdsf', '63141188c108fe9662ee901e3b0ac67c', '2017-03-29 18:50:10', '1', NULL),
(12, 'First Namesfd', 'Last Name', NULL, NULL, NULL, NULL, NULL, NULL, 'sdfjdf@dkj.com', NULL, 'userFirst Namesfd', '63141188c108fe9662ee901e3b0ac67c', '2017-03-29 18:53:32', '1', NULL),
(13, 'dksfj', 'jdhfj', NULL, NULL, NULL, NULL, NULL, NULL, 'jfd2@fdg.com', NULL, 'userdksfj', '333f7723a3159aa218491982296f89dcd17ea745b582247076dfccb380b21f4d130daa1a', '2017-03-29 19:36:05', '1', NULL),
(14, 'kclgjd', 'fkdg', NULL, NULL, NULL, NULL, NULL, NULL, 'kfg@fgfd.com', NULL, 'userkclgjd', '91698ce9526b65b6dbba46d0afa728e5c313c615437e50511a2161721cac1d9295f462f9', '2017-03-29 19:36:29', '1', NULL),
(18, 'Dhruvi', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'xxx@gmail.com', NULL, 'userDhruvi', '67a79a5a1647c28cc76d01b9db96764ee87842a652e9d20987c5c41aad8ba5c18ab22b10', '2017-03-29 20:02:30', '1', NULL),
(19, 'Dhruvi', 'Mistry', NULL, NULL, NULL, NULL, NULL, NULL, 'dj@gmail.com', NULL, 'userDhruvi', '', '2017-03-29 22:44:20', '1', NULL),
(20, 'djhf', 'djhg', NULL, NULL, NULL, NULL, NULL, NULL, 'djf@fj.com', NULL, 'userdjhf', '917011de592f9a7838bcf7c2a11e9130890290ef950f0d44562652b28cb8e0ab37952edd', '2017-03-30 09:40:09', '1', NULL),
(21, 'dsjfh', 'jdsf', NULL, NULL, NULL, NULL, NULL, NULL, 'jds@fd.com', NULL, 'userdsjfh', '432d343137179ec1a07c8752adedfe3e796cfffa8d67aaac2aee87bbceabf038101cdbfb', '2017-03-30 09:41:57', '1', NULL),
(22, 'dfjh jfd', 'jdhjfdhj', NULL, NULL, NULL, NULL, NULL, NULL, 'hjdfh@fdh.com', NULL, 'userdfjh jfd', '5cf55ad1859f9da43b1409d4a90c510805c48017301d3d364a831d9d27b099dc1b107d5d', '2017-03-30 09:42:35', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wnc_state`
--

CREATE TABLE `wnc_state` (
  `state_id` int(5) NOT NULL,
  `state_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wnc_volunteer`
--

CREATE TABLE `wnc_volunteer` (
  `volunteer_id` int(5) NOT NULL,
  `volunteer_username` varchar(20) NOT NULL,
  `volunteer_phone` int(10) NOT NULL,
  `volunteer_availability` enum('1','2','3') NOT NULL,
  `volunteer_experience` longtext NOT NULL,
  `volunteer_resume` longtext,
  `volunteer_awareness` int(11) NOT NULL DEFAULT '2',
  `volunteer_collectinginfo` int(11) NOT NULL DEFAULT '2',
  `volunteer_fundraising` int(11) NOT NULL DEFAULT '2',
  `volunteer_status` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wnc_volunteer`
--

INSERT INTO `wnc_volunteer` (`volunteer_id`, `volunteer_username`, `volunteer_phone`, `volunteer_availability`, `volunteer_experience`, `volunteer_resume`, `volunteer_awareness`, `volunteer_collectinginfo`, `volunteer_fundraising`, `volunteer_status`) VALUES
(1, '18', 1234567890, '2', ' kdjf jgfk fjgk fdk', 'NAN', 1, 2, 2, 2),
(5, '19', 1234567890, '1', 'dkfjkd jfkds j ', 'resume_1490828074.jpg', 2, 2, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wnc_adoption`
--
ALTER TABLE `wnc_adoption`
  ADD PRIMARY KEY (`adoption_id`);

--
-- Indexes for table `wnc_animal`
--
ALTER TABLE `wnc_animal`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `wnc_blog`
--
ALTER TABLE `wnc_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `wnc_city`
--
ALTER TABLE `wnc_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `wnc_comment`
--
ALTER TABLE `wnc_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `wnc_complaint`
--
ALTER TABLE `wnc_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `wnc_register`
--
ALTER TABLE `wnc_register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `wnc_state`
--
ALTER TABLE `wnc_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `wnc_volunteer`
--
ALTER TABLE `wnc_volunteer`
  ADD PRIMARY KEY (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wnc_adoption`
--
ALTER TABLE `wnc_adoption`
  MODIFY `adoption_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wnc_animal`
--
ALTER TABLE `wnc_animal`
  MODIFY `animal_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wnc_blog`
--
ALTER TABLE `wnc_blog`
  MODIFY `blog_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wnc_city`
--
ALTER TABLE `wnc_city`
  MODIFY `city_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wnc_comment`
--
ALTER TABLE `wnc_comment`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `wnc_complaint`
--
ALTER TABLE `wnc_complaint`
  MODIFY `complaint_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wnc_register`
--
ALTER TABLE `wnc_register`
  MODIFY `register_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `wnc_state`
--
ALTER TABLE `wnc_state`
  MODIFY `state_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wnc_volunteer`
--
ALTER TABLE `wnc_volunteer`
  MODIFY `volunteer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
