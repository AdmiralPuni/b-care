-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2022 at 06:12 PM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.29

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
(18, 22, '67d3bae456ff1d5b57dac54c8e39b4697d0e92c2332b416e6e02beecced56772', 0, '2022-06-06 11:13:52'),
(19, 23, '9c318d39b70a2c57a9f00d04eac0e3eb2021741d73b2d69d45a7e97d89cb5f38', 0, '2022-06-06 11:16:11'),
(21, 25, '', 1, '2022-06-06 11:44:24'),
(23, 1, '1234', 1, '2022-06-11 19:45:59'),
(24, 27, '', 1, '2022-06-17 08:52:03'),
(25, 28, '', 1, '2022-06-26 14:34:28');

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
(1, 'Test Active', '2022-04-12 11:00:00', 'Test Location', 'doctor-parallax.jpg', 1, '2022-04-14 11:31:18'),
(2, 'Test Off', '2022-04-19 11:00:00', 'Test Location', 'JPEG_Dog.png', 0, '2022-04-14 11:32:37'),
(15, 'Donor', '2022-06-18 16:00:00', 'madiun', 'Poster_Sirkulasi_(3)5.png', 1, '2022-06-08 14:44:15');

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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `blood_type`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `alamat`, `domisili`, `no_hp`, `no_kartu`, `created`, `updated`) VALUES
(1, 'A-', '234782394842', 'West Coast', '2010-01-01', 'L', 'test', 'test', 'test', '024584686454', '3577DG0001', '2022-04-03 08:27:14', '2022-06-24 05:59:27'),
(2, 'AB+', '123812129038', 'Melbourne Grav', '1996-01-11', 'P', 'None', 'Streets', 'Northampton', '293829382938', '3577DGSW2', '2022-04-04 07:44:45', '2022-04-18 11:26:46'),
(27, 'A+', '8151545811854', 'Madiun', '2000-06-05', 'L', 'Hekel', 'Madiun', 'Madiun', '0784564648484', '3577DGPNL0027', '2022-06-17 09:10:46', '2022-06-17 02:10:46');

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
(2, 1, 0, 'PLASMA', '{\n    \"version\": \"1\",\n    \"answers\":{\n        \"page-1\":[0,0,0,0],\n        \"page-2\":[0,0,0,0],\n        \"page-3\":[0,0,0,0],\n        \"page-4\":[0,0,0,0],\n        \"page-5\":[0,0,0,0],\n        \"page-6\":[0,0,0,0],\n    }\n}', '{\'PCR\': \'NEGATIVE\'}', '2022-04-05', '2022-04-03 07:59:05', '2022-04-03 22:56:03'),
(4, 2, 0, 'BLOOD', '', '', '2022-04-30', '2022-04-25 18:33:38', '2022-04-25 11:33:38'),
(28, 27, 2, 'BLOOD', '{\"jawaban\":[{\"No. KTP\":\"8151545811854\"},{\"Nama Lengkap Pendonor\":\"Paijo no Luffy\"},{\"Tempat, Tanggal lahir\":\"Madiun, 2000-06-05\"},{\"Umur\":\"21\"},{\"Jenis Kelamin\":1},{\"No. Kartu\":\"3577DGPNL0027\"},{\"Pekerjaan\":\"Hekel\"},{\"Alamat\":\"Madiun\"},{\"No. HP\":\"0784564648484\"},{\"Penghargaan yang telah diterima\":1},{\"Bersediakah saudara donor pada waktu bulan puasa ?\":1},{\"Bersediakah saudara donor saat dibutuhkan untuk komponen darah tertentu ?\":1},{\"Donor terakhir pada tanggal?\":\"2022-06-17\"},{\"Sekarang donor yang ke?\":\"1\"},{\"Merasa sehat, dan tidak sedang flu/batuk/demam/pusing?\":1},{\"Apakah Anda semalam tidur minimal 4 jam?\":1},{\"Apakah Anda sedang minum obat?\":2},{\"Apakah Anda sedang minum jamu?\":2},{\"Apakah Anda mencabut gigi?\":2},{\"Apakah Anda mengalami demam lebih dari 38 derajat celcius?\":2},{\"Wanita : Apakah saat ini Anda pernah/sedang hamil?\":2},{\"Apakah Anda mendonorkan darah, trombosit, atau plasma?\":2},{\"Apakah Anda menerima vaksin atau suntikan lain?\":2},{\"Apakah Anda pernah kontak dengan orang yang pernah menerima vaksinasi smallpox?\":2},{\"Apakah Anda mendonorkan 2 kantong sel darah merah melalui proses aferesis?\":2},{\"Wanita : Apakah Anda saat ini sedang menyusui?\":2},{\"Apakah Anda pernah menerima transfusi darah?\":2},{\"Apakah Anda pernah menerima transpalasi organ?\":2},{\"Apakah Anda pernah cangkok tulang untuk kulit?\":2},{\"Apakah Anda pernah tusuk jarum medis tanpa sengaja?\":2},{\"Apakah Anda pernah berhubungan seksual dengan penderita HIV/AIDS?\":2},{\"Apakah Anda pernah berhubungan seksual dengan PSK?\":2},{\"Apakah Anda pernah berhubungan seksual dengan pengguna narkoba jarum suntik?\":2},{\"Apakah Anda pernah berhubungan dengan pengguna konsentrat faktor pembekuan?\":2},{\"Wanita : Apakah Anda pernah berhubungan seksual dengan laki-laki biseksual?\":2},{\"Apakah Anda pernah berhubungan seksual dengan penderita hepatitis?\":2},{\"Apakah Anda pernah tinggal bersama penderita hepatitis?\":2},{\"Apakah Anda memiliki tato?\":2},{\"Apakah Anda menindik telinga atau bagian tubuh lain?\":2},{\"Apakah Anda sedang atau pernah mendapat pengobatan sifilis atau GO(Kencing nanah)?\":2},{\"Apakah Anda pernah ditahan/dipenjara dalam waktu 72 jam?\":2},{\"Apakah Anda pernah berada diluar wilayah indonesia?\":2},{\"Apakah Anda menerima uang, obat atau pembayaran lainnya untuk seks?\":2},{\"Laki-laki : Apakah Anda pernah berhubungan seks dengan  laki-laki?\":2},{\"Tinggal 5 tahun atau lebih di Eropa?\":2},{\"Pernah menerima tranfusi darah di Inggris?\":2},{\"Tinggal 3 bulan atau lebih di Inggris?\":2},{\"Mendapat hasil positif untuk HIV/AIDS?\":2},{\"Menggunakan jarum suntik untuk obat-obatan?\":2},{\"Menggunakan konsentrat untuk faktor pembekuan?\":2},{\"Menderita hepatitis?\":2},{\"Menderita malaria?\":2},{\"Menderita kanker?\":2},{\"Bermasalah dengan jantung atau paru?\":2},{\"Menderita pendarahan atau penyakit yang berhubungan dengan darah?\":2},{\"Berhubungan seksual dengan orang yang tinggal di Afrika?\":2},{\"Pernah tinggal di Afrika?\":2}]}', 'null', '2022-06-17', '2022-06-17 09:11:51', '2022-06-27 07:10:18'),
(29, 27, 0, 'PLASMA', '{\"jawaban\":[{\"No. Pendonor\":\"3577DGPNL0027\"},{\"Nama Lengkap Pendonor\":\"Paijo no Luffy\"},{\"No. Hp\":\"0784564648484\"},{\"Tempat, Tanggal Lahir\":\"Madiun, 2000-06-05\"},{\"Umur\":\"12\"},{\"Jenis Kelamin\":1},{\"Status Perkawinan\":2},{\"Riwayat Kehamilan\":\"tidak\"},{\"Jumlah Anak\":\"0\"},{\"Berat Badan\":\"26\"},{\"Tinggi Badan\":\"25\"},{\"Golongan Darah\":\"A+\"},{\"Pernah Berdonor ?\":1},{\"Berapa kali? (isi 0 bila tidak pernah)\":\"1\"},{\"Pernah Donor Apheresis ?\":2},{\"Berapa kali? (isi 0 bila tidak pernah)\":\"0\"},{\"Jantung\":2},{\"Hipertensi\":2},{\"Diabetes Mellitus\":2},{\"Paru-paru\":2},{\"Hati\":2},{\"Ginjal Kronik\":2},{\"Neurologi atau Neuromuskular\":2},{\"HIV\":2},{\"Sejak kapan Anda dinyatakan PDP COVID-19 ?\":\"2022-06-17\"},{\"Panas atau riwayat panas ? 38oC\":2},{\"Batuk\":2},{\"Sakit Tenggorokan\":2},{\"Sesak Nafas\":2},{\"Pilek\":2},{\"Lesu\":2},{\"Sakit kepala\":2},{\"Diare\":2},{\"Mual Muntah\":2},{\"Adakah riwayat transfusi selama perawatan ?\":\"tidak\"},{\"Kapan dinyatakan sembuh dari COVID-19 ?\":\"sudah\"},{\"Tanggal berapa sajakah, pemeriksaan PCR yang dilakukan oleh RS ?\":\"Tanggal 10\"},{\"Nama Rumah sakit \":\"RS uwu\"},{\"Apakah Anda bersedia untuk mendonorkan plasma Anda ?\":1}]}', 'd34adcffcb0a124d16e7caf0f6191bbc.pdf', '2022-06-17', '2022-06-17 09:14:13', '2022-06-24 05:55:30');

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
(128, 3, '3a1d0e8e98b8ed961fc10f7c4a553ccc', '2022-07-27 06:18:53');

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
(3, 'BLOOD', 'B+', 13, '2022-06-24 05:56:23'),
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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`, `created`, `updated`) VALUES
(1, 'Test User', 'test@mailto.com', '$2y$10$UyPQLl3lRvxYGE8SlPWarO7uCwxpvaJ37OWnvvtUH02gH.8PR7CRG', 10, '2022-04-03 07:24:52', '2022-06-11 12:44:21'),
(2, 'So Way', 'test2@mailto.com', '$2y$10$Dq1zm4BActl72C.80IVsg.JaUxZTW6/BdS5IuXCBNSc4zVRpPA1rK', 10, '2022-04-04 07:42:03', '2022-04-18 11:26:46'),
(3, 'admin', 'admin@bcare.com', '$2y$10$UyPQLl3lRvxYGE8SlPWarO7uCwxpvaJ37OWnvvtUH02gH.8PR7CRG', 0, '2022-04-04 08:35:43', '2022-04-04 01:35:43'),
(4, 'newtest', 'test@bcare.com', '$2y$10$cd/3vmHPNaw4f7Rk8kafKOxOq4tmkWegLRCGu2lDuBmCFPMsihc8y', 0, '2022-04-14 12:32:12', '2022-04-14 05:32:12'),
(22, 'John Amm', 'admiralpuni@protonmail.com', '$2y$10$W51HhPhoFeI/5NIcf6dp6O.KLZsOVnfTBCWp1jHdXxS38gy9Q369K', 10, '2022-06-06 11:13:52', '2022-06-06 04:13:52'),
(23, 'John Amm', 'drfredmagic@gmail.com', '$2y$10$kNsjLChrL0acz5ZThhkcEOWEYMcvwqvDVkRZW7FmbWUofMalhjsyW', 10, '2022-06-06 11:16:11', '2022-06-06 04:16:11'),
(25, 'Michael Jackson', 'danyrazzaq@gmail.com', '$2y$10$gCoSuqdmySZtquTKsrgtSe3rIjZQeytsTtDPSjcGY2lfyiqvr.Kfu', 10, '2022-06-06 11:44:24', '2022-06-06 04:44:24'),
(27, 'Paijo no Luffy', 'bimaandrian73@gmail.com', '$2y$10$p.XPPBptWK6TrnQ4kBnDqeQMpX3trSDpE9fgFutWJ2DtaLZHo8u2O', 10, '2022-06-17 08:52:03', '2022-06-17 01:52:03'),
(28, 'test fadhilah', 'ti.fadhilahgatya@gmail.com', '$2y$10$v/w4kTytzbxPW3LggCMwouHqs7HNjR1B4vcnbwELWLv0PZrnYHv/G', 10, '2022-06-26 14:34:28', '2022-06-26 07:34:28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_donor`
-- (See below for the actual view)
--
CREATE TABLE `v_donor` (
`id` int(11)
,`user_id` int(11)
,`donor_id` int(11)
,`name` varchar(50)
,`status` int(1)
,`type` varchar(10)
,`blood_type` varchar(3)
,`domisili` varchar(30)
,`req` text
,`form_answers` text
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

CREATE ALGORITHM=UNDEFINED DEFINER=`bcac1338`@`localhost` SQL SECURITY DEFINER VIEW `v_donor`  AS SELECT `a`.`id` AS `id`, `b`.`user_id` AS `user_id`, `b`.`id` AS `donor_id`, `a`.`name` AS `name`, `b`.`status` AS `status`, `b`.`type` AS `type`, `c`.`blood_type` AS `blood_type`, `c`.`domisili` AS `domisili`, `b`.`req` AS `req`, `b`.`form_answers` AS `form_answers`, `b`.`donor_date` AS `donor_date`, `b`.`created` AS `created` FROM ((`user` `a` join `request_donor` `b`) join `profile` `c`) WHERE `a`.`id` = `b`.`user_id` AND `a`.`id` = `c`.`user_id` ORDER BY `b`.`donor_date` DESC, `a`.`name` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_front_donor`
--
DROP TABLE IF EXISTS `v_front_donor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bcac1338`@`localhost` SQL SECURITY DEFINER VIEW `v_front_donor`  AS SELECT `a`.`id` AS `id`, `b`.`name` AS `name`, `a`.`status` AS `status`, `a`.`type` AS `type`, `a`.`req` AS `req`, `a`.`donor_date` AS `donor_date` FROM (`request_donor` `a` join `user` `b`) WHERE `a`.`user_id` = `b`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_profile`
--
DROP TABLE IF EXISTS `v_user_profile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bcac1338`@`localhost` SQL SECURITY DEFINER VIEW `v_user_profile`  AS SELECT `profile`.`user_id` AS `user_id`, `user`.`name` AS `name`, `profile`.`blood_type` AS `blood_type`, `profile`.`nik` AS `nik`, `profile`.`tempat_lahir` AS `tempat_lahir`, `profile`.`tanggal_lahir` AS `tanggal_lahir`, `profile`.`jenis_kelamin` AS `jenis_kelamin`, `profile`.`pekerjaan` AS `pekerjaan`, `profile`.`alamat` AS `alamat`, `profile`.`domisili` AS `domisili`, `profile`.`no_hp` AS `no_hp`, `profile`.`no_kartu` AS `no_kartu`, `profile`.`created` AS `created` FROM (`user` join `profile`) WHERE `user`.`id` = `profile`.`user_id` ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request_donor`
--
ALTER TABLE `request_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
