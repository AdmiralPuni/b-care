-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2022 at 07:46 PM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`user_id`, `blood_type`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `alamat`, `domisili`, `no_hp`, `no_kartu`, `created`, `updated`) VALUES
(1, 'A+', '234782394842', 'West Coast', '2010-01-01', 'L', 'test', 'test', 'test', '024584686454', '-', '2022-04-03 08:27:14', '2022-04-15 12:25:59'),
(2, 'AB+', '123812129038', 'Melbourne Grav', '1996-01-11', 'P', 'None', 'Streets', 'Northampton', '293829382938', '3577DGSW2', '2022-04-04 07:44:45', '2022-04-18 11:32:55'),
(19, 'A-', '23426393562365236', 'Madinah', '0000-00-00', 'L', 'sdvsd', 'Madiun', 'Maiunsadiahh', '314131325253', '3577DG19', '2022-04-19 13:30:18', '2022-04-19 09:42:11'),
(21, 'AB+', '123812129038', 'Melbourne Grav', '1996-01-11', 'P', 'None', 'Streets', 'Northampton', '293829382938', '3577DGJA21', '2022-04-19 04:41:48', '2022-04-18 21:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `temp_code` text NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `last_send` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `user_id`, `temp_code`, `verified`, `last_send`) VALUES
(9, 19, '', 1, '2022-04-19 04:30:03'),
(10, 20, '1f6a0b9f39b8f10e7479513395e9b89292b41d7568fe6d3dc6fd9ecedc3d7ee2', 0, '2022-04-19 04:36:56'),
(11, 21, '50ed7d607b6b0a6ba1612de27060b7033dc875f5ca3871ec6dc2fa2310148389', 0, '2022-04-19 04:38:23'),
(14, 24, '', 1, '2022-04-19 16:51:08'),
(16, 26, '3912f1e5cd879c3b5270e9091994f2e8e5b8d5664f485a317d9fb953de4283b7', 0, '2022-04-25 15:34:49'),
(17, 27, '', 1, '2022-04-25 15:36:51');

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
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `date_time`, `location`, `image`, `active`, `created`) VALUES
(4, 'Donor Darah Masal', '2022-04-18 11:39:00', 'Taman, Kota Madiun', '0e2b764b220caa58fcb752c1aeff5b46.jpg', 1, '2022-04-18 11:41:37'),
(5, 'Tes Event', '2022-04-19 00:13:00', 'Taman, Madiun', '0e2b764b220caa58fcb752c1aeff5b46.jpg', 1, '2022-04-19 00:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(87, 3, '16784482e6a8cd77c424824fafde9c67', '2022-05-25 12:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `blood_type` varchar(3) NOT NULL,
  `amount` int(11) NOT NULL,
  `edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `type`, `blood_type`, `amount`, `edited`) VALUES
(1, 'BLOOD', 'A+', 5, '2022-04-07 15:43:44'),
(2, 'BLOOD', 'A-', 9, '2022-04-07 15:41:40'),
(3, 'BLOOD', 'B+', 17, '2022-04-08 09:24:33'),
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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`, `created`, `updated`) VALUES
(1, 'Test User', 'test@mailto.com', '$2y$10$V4Jk/sERZsMzEQxZteEjmOyxrS5w9X2zwDKuiUw248uvJozkRxgA6', 10, '2022-04-03 07:24:52', '2022-04-03 00:24:52'),
(2, 'So Way', 'test2@mailto.com', '$2y$10$Dq1zm4BActl72C.80IVsg.JaUxZTW6/BdS5IuXCBNSc4zVRpPA1rK', 10, '2022-04-04 07:42:03', '2022-04-18 11:32:55'),
(3, 'admin', 'admin@bcare.com', '$2y$10$UyPQLl3lRvxYGE8SlPWarO7uCwxpvaJ37OWnvvtUH02gH.8PR7CRG', 0, '2022-04-04 08:35:43', '2022-04-04 01:35:43'),
(19, 'demodemodemoayo demo', 'admiralpuni@protonmail.com', '$2y$10$O0TNBF4f37weSBTXGz1cGe7e0xaVmEAuPwTm7/fLz7fI9zv/dCNSW', 10, '2022-04-19 04:30:03', '2022-04-19 09:45:07'),
(20, 'mailtest3', '135489546865@invalixd.com', '$2y$10$uwL9yC9x/2/azFfBIDx54uEwwAwiRhphqjkS/pC/a./PqFaUjwaKq', 10, '2022-04-19 04:36:56', '2022-04-18 21:36:56'),
(21, 'John Amm', '135489546865@invxalixd.com', '$2y$10$74JZu6VZ8yI9/zKkR7LaD.7xYi.cB4ujYSJ3e2xSOS8cw2/8Rzeza', 10, '2022-04-19 04:38:23', '2022-04-18 21:38:23'),
(24, 'Fadhilah Gatya Putri', 'fadhilahgp.9a11@gmail.com', '$2y$10$l3GJQS7OLoZZCIn7WXMmDOhcmlcS92dwaHc1qjuOmEFlKjNGhc5KO', 10, '2022-04-19 16:51:08', '2022-04-19 09:51:08'),
(26, 'gilang', 'ti.gilangac@gmail.com', '$2y$10$KvZ1Oz1RmPyfNc.ARDXk6.TaCSOQdqHhvaaoCMRuDYtMVSs5fMuBO', 10, '2022-04-25 15:34:49', '2022-04-25 08:34:49'),
(27, 'vario', 'mario@yopmail.com', '$2y$10$BFrcdQpTXoIhJeuYmy.SkOkTn3JcDhT.D2OprTk81s5Z7m9X/r.DC', 10, '2022-04-25 15:36:51', '2022-04-25 08:36:51');

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
-- Stand-in structure for view `v_user_donor`
-- (See below for the actual view)
--
CREATE TABLE `v_user_donor` (
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
-- Structure for view `v_front_donor`
--
DROP TABLE IF EXISTS `v_front_donor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bcac1338`@`localhost` SQL SECURITY DEFINER VIEW `v_front_donor`  AS SELECT `a`.`id` AS `id`, `b`.`name` AS `name`, `a`.`status` AS `status`, `a`.`type` AS `type`, `a`.`req` AS `req`, `a`.`donor_date` AS `donor_date` FROM (`request_donor` `a` join `user` `b`) WHERE `a`.`user_id` = `b`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_front_user_donor`
--
DROP TABLE IF EXISTS `v_front_user_donor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bcac1338`@`localhost` SQL SECURITY DEFINER VIEW `v_front_user_donor`  AS SELECT `donor`.`user_id` AS `user_id`, `user`.`name` AS `name`, `donor`.`tempat_lahir` AS `tempat_lahir`, `donor`.`tanggal_lahir` AS `tanggal_lahir`, `donor`.`alamat` AS `alamat`, `donor`.`no_hp` AS `no_hp`, `donor`.`no_kartu` AS `no_kartu`, `donor`.`jenis_kelamin` AS `jenis_kelamin`, `donor`.`pekerjaan` AS `pekerjaan`, `donor`.`domisili` AS `domisili` FROM (`donor` join `user`) WHERE `donor`.`user_id` = `user`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_donor`
--
DROP TABLE IF EXISTS `v_user_donor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bcac1338`@`localhost` SQL SECURITY DEFINER VIEW `v_user_donor`  AS SELECT `donor`.`user_id` AS `user_id`, `user`.`name` AS `name`, `donor`.`blood_type` AS `blood_type`, `donor`.`nik` AS `nik`, `donor`.`tempat_lahir` AS `tempat_lahir`, `donor`.`tanggal_lahir` AS `tanggal_lahir`, `donor`.`jenis_kelamin` AS `jenis_kelamin`, `donor`.`pekerjaan` AS `pekerjaan`, `donor`.`alamat` AS `alamat`, `donor`.`domisili` AS `domisili`, `donor`.`no_hp` AS `no_hp`, `donor`.`no_kartu` AS `no_kartu`, `donor`.`created` AS `created` FROM (`user` join `donor`) WHERE `user`.`id` = `donor`.`user_id` ;

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
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `request_donor`
--
ALTER TABLE `request_donor`
  ADD CONSTRAINT `request_donor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
