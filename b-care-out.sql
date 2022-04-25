-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 01:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b-care-out`
--

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `secret` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `secret`, `level`) VALUES
(1, '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `user_id` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `domisili` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `no_kartu` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`user_id`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `alamat`, `domisili`, `no_hp`, `no_kartu`, `created`, `updated`) VALUES
(1, '234782394842', 'West Coast', '2010-01-01', 'L', 'test', 'test', 'test', '024584686454', '-', '2022-04-03 08:27:14', '2022-04-04 00:50:04'),
(2, '123812129038', 'Melbourne', '1996-01-11', 'P', 'None', 'Streets', 'Northampton', '293829382938', '2398429832', '2022-04-04 07:44:45', '2022-04-04 00:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `location` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `date_time`, `location`, `image`, `active`, `created`) VALUES
(1, 'Test Active', '2022-04-12 11:00:00', 'Test Location', 'doctor-parallax.jpg', 1, '2022-04-14 11:31:18'),
(2, 'Test Off', '2022-04-19 11:00:00', 'Test Location', 'JPEG_Dog.png', 0, '2022-04-14 11:32:37'),
(3, 'Test Input', '2022-04-14 12:12:00', 'Test Input Location', 'jpegdog.png', 1, '2022-04-14 12:12:29'),
(4, 'Test Insert 2', '2022-04-09 12:25:00', 'Test Location 2', '720px-President_Barack_Obama.jpg', 1, '2022-04-14 12:25:45'),
(5, 'Test Input 3', '2022-04-14 12:46:00', 'Test Location A', 'logpu.png', 1, '2022-04-14 12:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_donor`
--

CREATE TABLE `request_donor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `type` varchar(10) NOT NULL,
  `form_answers` text NOT NULL,
  `req` text NOT NULL,
  `donor_date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_donor`
--

INSERT INTO `request_donor` (`id`, `user_id`, `status`, `type`, `form_answers`, `req`, `donor_date`, `created`, `updated`) VALUES
(2, 1, 0, 'PLASMA', '{\n    \"version\": \"1\",\n    \"answers\":{\n        \"page-1\":[0,0,0,0],\n        \"page-2\":[0,0,0,0],\n        \"page-3\":[0,0,0,0],\n        \"page-4\":[0,0,0,0],\n        \"page-5\":[0,0,0,0],\n        \"page-6\":[0,0,0,0],\n    }\n}', '{\'PCR\': \'NEGATIVE\'}', '2022-04-05', '2022-04-03 07:59:05', '2022-04-03 22:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `request_item`
--

CREATE TABLE `request_item` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `blood_type` varchar(3) NOT NULL,
  `reason` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_item`
--

INSERT INTO `request_item` (`id`, `type`, `name`, `phone`, `address`, `blood_type`, `reason`, `created`, `updated`) VALUES
(3, 'PLASMA', 'Macgyver', '5486954', '3242 North Carolina Ave', 'A+', 'no reason', '2022-04-03 07:45:07', '2022-04-03 23:38:45'),
(4, 'PLASMA', 'Macgyver', '879434', '3242 North Carolina Ave', 'A+', 'no reason', '2022-04-03 07:45:24', '2022-04-03 23:38:48'),
(5, 'PLASMA', 'Macgyver', '32169', '3242 North Carolina Ave', 'A+', 'no reason', '2022-04-03 07:45:46', '2022-04-03 23:38:50'),
(6, 'BLOOD', 'John Test', '6548943', 'West Virginia', 'O-', 'Unknown', '2022-04-03 07:46:43', '2022-04-03 23:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `identifier` text NOT NULL,
  `expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `identifier`, `expiry`) VALUES
(17, 3, 'c82095c630c902bd447b25eef75410b8', '2022-05-14 13:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `blood_type` varchar(3) NOT NULL,
  `amount` int(11) NOT NULL,
  `edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `type`, `blood_type`, `amount`, `edited`) VALUES
(1, 'BLOOD', 'A+', 5, '2022-04-07 15:43:44'),
(2, 'BLOOD', 'A-', 9, '2022-04-07 15:41:40'),
(3, 'BLOOD', 'B+', 15, '2022-04-07 15:43:07'),
(4, 'BLOOD', 'B-', 10, '2022-04-07 14:51:40'),
(5, 'BLOOD', 'AB+', 30, '2022-04-07 15:43:49'),
(6, 'BLOOD', 'AB-', 14, '2022-04-07 15:34:47'),
(7, 'BLOOD', 'O+', 25, '2022-04-07 15:43:19'),
(8, 'BLOOD', 'O-', 6, '2022-04-07 15:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`, `created`, `updated`) VALUES
(1, 'Test User', 'test@mailto.com', '$2y$10$V4Jk/sERZsMzEQxZteEjmOyxrS5w9X2zwDKuiUw248uvJozkRxgA6', 10, '2022-04-03 07:24:52', '2022-04-03 00:24:52'),
(2, 'Test User #2', 'test2@mailto.com', '$2y$10$Dq1zm4BActl72C.80IVsg.JaUxZTW6/BdS5IuXCBNSc4zVRpPA1rK', 10, '2022-04-04 07:42:03', '2022-04-04 01:26:38'),
(3, 'admin', 'admin@bcare.com', '$2y$10$UyPQLl3lRvxYGE8SlPWarO7uCwxpvaJ37OWnvvtUH02gH.8PR7CRG', 0, '2022-04-04 08:35:43', '2022-04-04 01:35:43'),
(4, 'newtest', 'test@bcare.com', '$2y$10$cd/3vmHPNaw4f7Rk8kafKOxOq4tmkWegLRCGu2lDuBmCFPMsihc8y', 0, '2022-04-14 12:32:12', '2022-04-14 05:32:12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_front_donor`
-- (See below for the actual view)
--
CREATE TABLE `v_front_donor` (
`id` int(11)
,`name` varchar(50)
,`status` int(1)
,`type` varchar(10)
,`req` text
,`donor_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_front_user_donor`
-- (See below for the actual view)
--
CREATE TABLE `v_front_user_donor` (
`user_id` int(11)
,`name` varchar(50)
,`tempat_lahir` varchar(30)
,`tanggal_lahir` date
,`alamat` text
,`no_hp` varchar(15)
,`no_kartu` varchar(30)
,`jenis_kelamin` varchar(1)
,`pekerjaan` varchar(30)
,`domisili` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `v_front_donor`
--
DROP TABLE IF EXISTS `v_front_donor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_front_donor`  AS  select `a`.`id` AS `id`,`b`.`name` AS `name`,`a`.`status` AS `status`,`a`.`type` AS `type`,`a`.`req` AS `req`,`a`.`donor_date` AS `donor_date` from (`request_donor` `a` join `user` `b`) where (`a`.`user_id` = `b`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_front_user_donor`
--
DROP TABLE IF EXISTS `v_front_user_donor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_front_user_donor`  AS  select `donor`.`user_id` AS `user_id`,`user`.`name` AS `name`,`donor`.`tempat_lahir` AS `tempat_lahir`,`donor`.`tanggal_lahir` AS `tanggal_lahir`,`donor`.`alamat` AS `alamat`,`donor`.`no_hp` AS `no_hp`,`donor`.`no_kartu` AS `no_kartu`,`donor`.`jenis_kelamin` AS `jenis_kelamin`,`donor`.`pekerjaan` AS `pekerjaan`,`donor`.`domisili` AS `domisili` from (`donor` join `user`) where (`donor`.`user_id` = `user`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `request_donor`
--
ALTER TABLE `request_donor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `request_item`
--
ALTER TABLE `request_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request_donor`
--
ALTER TABLE `request_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `request_item`
--
ALTER TABLE `request_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD CONSTRAINT `password_reset_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_donor`
--
ALTER TABLE `request_donor`
  ADD CONSTRAINT `request_donor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
