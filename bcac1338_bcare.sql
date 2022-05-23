-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 02:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcac1338_bcare`
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
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `temp_code` text NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `last_send` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `user_id`, `temp_code`, `verified`, `last_send`) VALUES
(7, 11, '21419bd1960ec1bd3f85d91bc015b19711261a9057164ed97d03c7be1ba582e0', 0, '2022-04-18 11:23:02'),
(8, 12, '61a443eed3e5c60ec9c17658b6a0f38d9dfc9a442ba49fccdb3cc2f6e4b48bde', 0, '2022-04-30 07:46:02'),
(9, 3, '789', 0, '2022-05-16 09:15:16');

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
(5, 'Test Input 3', '2022-04-14 12:46:00', 'Test Location A', 'logpu.png', 1, '2022-04-14 12:46:56'),
(6, 'Sey', '2022-04-18 11:34:00', 'mour', 'Screenshot_(655).png', 1, '2022-04-18 11:34:31'),
(7, 'Se', '2022-04-18 11:35:00', '123', 'Screenshot_(591)3.png', 1, '2022-04-18 11:37:21'),
(8, 'Se', '2022-04-18 11:39:00', '233', 'Screenshot_(655)1.png', 1, '2022-04-18 11:39:48'),
(9, '555', '2022-04-22 11:42:00', '123', 'Screenshot_(591)4.png', 1, '2022-04-18 11:42:50');

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

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `user_id`, `token`, `timestamp`) VALUES
(1, 12, '45f164bbd5654c6b931795b49847a3810fafebd38953b178da35f89d3e7c71af', '2022-05-19 04:15:43'),
(2, 1, 'cf07b4a60a06d2d576e0644ebb43b6da431c71964eb082093b6a65f2fad19403', '2022-05-19 04:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `blood_type` varchar(3) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `blood_type`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `alamat`, `domisili`, `no_hp`, `no_kartu`, `created`, `updated`) VALUES
(1, 'A-', '234782394842', 'West Coast', '2010-01-01', 'L', 'test', 'Pagotan, Madiun', 'test', '024584686454', '-', '2022-04-03 08:27:14', '2022-04-27 02:22:13'),
(2, 'AB+', '123812129038', 'Melbourne Grav', '1996-01-11', 'P', 'None', 'Jenangan, Ponorogo', 'Northampton', '293829382938', '3577DGSW2', '2022-04-04 07:44:45', '2022-04-27 02:21:54');

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
(2, 1, 0, 'PLASMA', '{\n    \"version\": \"1\",\n    \"answers\":{\n        \"page-1\":[0,0,0,0],\n        \"page-2\":[0,0,0,0],\n        \"page-3\":[0,0,0,0],\n        \"page-4\":[0,0,0,0],\n        \"page-5\":[0,0,0,0],\n        \"page-6\":[0,0,0,0],\n    }\n}', '{\'PCR\': \'NEGATIVE\'}', '2022-04-05', '2022-04-03 07:59:05', '2022-05-23 03:15:25'),
(4, 2, 1, 'BLOOD', '', '', '2022-01-12', '2022-04-25 18:33:38', '2022-05-23 03:20:02'),
(5, 1, 0, 'PLASMA', '{\n    \"version\": \"1\",\n    \"patient_id\": \"1\",\n    \"answers\":{\n        \"page-1\":[0,0,0,0],\n        \"page-2\":[0,0,0,0],\n        \"page-3\":[0,0,0,0],\n        \"page-4\":[0,0,0,0],\n        \"page-5\":[0,0,0,0],\n        \"page-6\":[0,0,0,0],\n    }\n}', '???????.pdf', '2022-02-02', '2022-05-23 09:48:40', '2022-05-23 03:19:49'),
(6, 1, 0, 'PLASMA', '{\n    \"version\": \"1\",\n    \"patient_id\": \"1\",\n    \"answers\":{\n        \"page-1\":[0,0,0,0],\n        \"page-2\":[0,0,0,0],\n        \"page-3\":[0,0,0,0],\n        \"page-4\":[0,0,0,0],\n        \"page-5\":[0,0,0,0],\n        \"page-6\":[0,0,0,0],\n    }\n}', 'test.pdf', '2022-02-02', '2022-05-23 09:50:20', '2022-05-23 03:19:54'),
(7, 1, 1, 'PLASMA', '{\n    \"version\": \"1\",\n    \"patient_id\": \"1\",\n    \"answers\":{\n        \"page-1\":[0,0,0,0],\n        \"page-2\":[0,0,0,0],\n        \"page-3\":[0,0,0,0],\n        \"page-4\":[0,0,0,0],\n        \"page-5\":[0,0,0,0],\n        \"page-6\":[0,0,0,0],\n    }\n}', '2b7af64297120003b0b5c417b42ffd47.pdf', '2022-02-02', '2022-05-23 09:56:19', '2022-05-23 03:19:58');

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
(1, 3, 'b397ff2b04075d84f4baf3df997b4f66', '2022-06-22 04:49:15');

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
(7, 'BLOOD', 'O+', 28, '2022-04-19 09:38:14'),
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
(2, 'So Way', 'test2@mailto.com', '$2y$10$Dq1zm4BActl72C.80IVsg.JaUxZTW6/BdS5IuXCBNSc4zVRpPA1rK', 10, '2022-04-04 07:42:03', '2022-04-18 11:26:46'),
(3, 'admin', 'admin@bcare.com', '$2y$10$ddoMSaaV5rx/MoV8gdvAtelXRVcDpI2udeeNxxrp72AAUDOKYb3uS', 0, '2022-04-04 08:35:43', '2022-05-16 02:31:37'),
(4, 'newtest', 'test@bcare.com', '$2y$10$cd/3vmHPNaw4f7Rk8kafKOxOq4tmkWegLRCGu2lDuBmCFPMsihc8y', 0, '2022-04-14 12:32:12', '2022-04-14 05:32:12'),
(11, 'mailtest', 'bimaandrian73@gmail.com', '$2y$10$/5nYsrgtCU/6OxSbxaF/WO0YPPr6sDYnikVWSrAHxh0VXHmbJC2ue', 10, '2022-04-18 11:23:02', '2022-04-18 04:23:02'),
(12, 'John Amm', 'admiralpuni@protonmail.com', '$2y$10$Ui2QTLLo6whC7.1Q4.1qUebVq9/DMb1Z5oc8gEGaJ78CeBuD/ii06', 10, '2022-04-30 07:46:02', '2022-04-30 00:46:02');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_donor`
-- (See below for the actual view)
--
CREATE TABLE `v_donor` (
`id` int(11)
,`donor_id` int(11)
,`name` varchar(50)
,`status` int(1)
,`type` varchar(10)
,`blood_type` varchar(3)
,`domisili` varchar(30)
,`req` text
,`donor_date` date
,`created` datetime
);

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
-- Stand-in structure for view `v_user_profile`
-- (See below for the actual view)
--
CREATE TABLE `v_user_profile` (
`user_id` int(11)
,`name` varchar(50)
,`blood_type` varchar(3)
,`nik` varchar(30)
,`tempat_lahir` varchar(30)
,`tanggal_lahir` date
,`jenis_kelamin` varchar(1)
,`pekerjaan` varchar(30)
,`alamat` text
,`domisili` varchar(30)
,`no_hp` varchar(15)
,`no_kartu` varchar(30)
,`created` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `v_donor`
--
DROP TABLE IF EXISTS `v_donor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_donor`  AS  select `a`.`id` AS `id`,`b`.`id` AS `donor_id`,`a`.`name` AS `name`,`b`.`status` AS `status`,`b`.`type` AS `type`,`c`.`blood_type` AS `blood_type`,`c`.`domisili` AS `domisili`,`b`.`req` AS `req`,`b`.`donor_date` AS `donor_date`,`b`.`created` AS `created` from ((`user` `a` join `request_donor` `b`) join `profile` `c`) where ((`a`.`id` = `b`.`user_id`) and (`a`.`id` = `c`.`user_id`)) order by `b`.`donor_date` desc,`a`.`name` ;

-- --------------------------------------------------------

--
-- Structure for view `v_front_donor`
--
DROP TABLE IF EXISTS `v_front_donor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_front_donor`  AS  select `a`.`id` AS `id`,`b`.`name` AS `name`,`a`.`status` AS `status`,`a`.`type` AS `type`,`a`.`req` AS `req`,`a`.`donor_date` AS `donor_date` from (`request_donor` `a` join `user` `b`) where (`a`.`user_id` = `b`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_profile`
--
DROP TABLE IF EXISTS `v_user_profile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user_profile`  AS  select `profile`.`user_id` AS `user_id`,`user`.`name` AS `name`,`profile`.`blood_type` AS `blood_type`,`profile`.`nik` AS `nik`,`profile`.`tempat_lahir` AS `tempat_lahir`,`profile`.`tanggal_lahir` AS `tanggal_lahir`,`profile`.`jenis_kelamin` AS `jenis_kelamin`,`profile`.`pekerjaan` AS `pekerjaan`,`profile`.`alamat` AS `alamat`,`profile`.`domisili` AS `domisili`,`profile`.`no_hp` AS `no_hp`,`profile`.`no_kartu` AS `no_kartu`,`profile`.`created` AS `created` from (`user` join `profile`) where (`user`.`id` = `profile`.`user_id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
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
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `request_donor`
--
ALTER TABLE `request_donor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `request_donor`
--
ALTER TABLE `request_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD CONSTRAINT `email_verification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD CONSTRAINT `password_reset_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
