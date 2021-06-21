-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 03:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukuque_laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) NOT NULL,
  `is_nugas` tinyint(4) NOT NULL,
  `is_ngaji` tinyint(4) NOT NULL,
  `is_doabanguntidur` tinyint(4) NOT NULL,
  `is_doabelumtidur` tinyint(4) NOT NULL,
  `book_content` text NOT NULL,
  `is_subuh` tinyint(4) NOT NULL,
  `is_dzuhur` tinyint(4) NOT NULL,
  `is_azhar` tinyint(4) NOT NULL,
  `is_maghrib` tinyint(4) NOT NULL,
  `is_isya` tinyint(4) NOT NULL,
  `date` timestamp(1) NOT NULL DEFAULT current_timestamp(1) ON UPDATE current_timestamp(1),
  `bookisreviewed` tinyint(4) DEFAULT NULL,
  `Surah_id` bigint(20) NOT NULL,
  `Students_id` bigint(20) NOT NULL,
  `Students_Teacher_id` bigint(20) NOT NULL,
  `Students_Class_id` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `is_nugas`, `is_ngaji`, `is_doabanguntidur`, `is_doabelumtidur`, `book_content`, `is_subuh`, `is_dzuhur`, `is_azhar`, `is_maghrib`, `is_isya`, `date`, `bookisreviewed`, `Surah_id`, `Students_id`, `Students_Teacher_id`, `Students_Class_id`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 1, 'Saya Baca Buku surat', 1, 1, 1, 1, 1, '2021-06-19 11:13:29.0', 0, 4, 4, 4, 4, NULL, NULL),
(3, 1, 1, 1, 1, 'Saya Baca Buku', 1, 1, 1, 1, 1, '2021-06-19 11:13:29.0', 0, 4, 4, 4, 4, NULL, NULL),
(7, 1, 1, 1, 1, 'Saya Baca Buku', 1, 1, 1, 1, 1, '2021-06-19 11:13:29.0', 0, 4, 2, 2, 2, NULL, NULL),
(8, 1, 1, 1, 1, 'Belajar pagi', 1, 1, 1, 1, 1, '2021-06-20 04:36:49.0', 0, 1, 1, 1, 1, NULL, NULL),
(9, 1, 1, 1, 1, 'Belajar pagi', 1, 1, 1, 1, 1, '2021-06-20 04:53:18.2', 0, 1, 1, 1, 1, NULL, NULL),
(12, 1, 1, 1, 1, 'Belajar pagi', 1, 1, 1, 1, 1, '2021-06-20 04:57:16.1', 0, 1, 2, 2, 2, NULL, NULL),
(13, 1, 1, 1, 1, 'Belajar pagi', 1, 1, 1, 1, 1, '2021-06-20 10:47:54.2', 0, 1, 2, 2, 2, NULL, NULL),
(14, 1, 1, 1, 1, 'Belajar pagi', 1, 1, 1, 1, 1, '2021-06-20 10:50:52.0', 0, 1, 2, 2, 2, NULL, NULL),
(16, 1, 1, 1, 1, 'Saya Baca Buku surat', 1, 1, 1, 1, 1, '2021-06-19 11:13:29.0', 0, 4, 8, 5, 1, NULL, NULL),
(17, 1, 1, 1, 1, 'Saya Baca Buku surat', 1, 1, 1, 1, 1, '2021-06-19 11:13:29.0', 0, 4, 8, 5, 1, NULL, NULL),
(22, 1, 1, 1, 1, 'Saya Baca Buku surat', 1, 1, 1, 1, 1, '2021-06-19 11:13:29.0', 0, 4, 8, 5, 1, NULL, NULL),
(25, 1, 1, 1, 1, 'Saya Baca Buku surat', 1, 1, 1, 1, 1, '2021-06-19 11:13:29.0', 0, 4, 8, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint(20) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`) VALUES
(1, 'Kelas A'),
(2, 'Kelas B'),
(3, 'Kelas C'),
(4, 'Kelas D'),
(5, 'Kelas E'),
(6, 'Kelas F');

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `date_id` bigint(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` bigint(20) NOT NULL,
  `day_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sholat`
--

CREATE TABLE `sholat` (
  `sholat_id` bigint(20) NOT NULL,
  `is_subuh` tinyint(4) NOT NULL,
  `is_dzuhur` tinyint(4) NOT NULL,
  `is_azhar` tinyint(4) NOT NULL,
  `is_maghrib` tinyint(4) NOT NULL,
  `is_isya` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Teacher_id` bigint(20) NOT NULL,
  `Class_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `address`, `phone_number`, `number`, `username`, `password`, `Teacher_id`, `Class_id`) VALUES
(1, 'Nando', 'Malang', '0846358245', '101', '', '', 1, 1),
(2, 'Beni', 'Surabaya', '054786254', '102', '', '', 2, 2),
(3, 'Denoi', 'Blitar', '23165566', '103', '', '', 3, 3),
(4, 'Benas', 'Surabaya', '98656576', '105', '', '', 4, 4),
(5, 'Sakam', 'Jabr', '6546556', '4144', 'sakam', 'sakam123', 5, 5),
(6, 'adi', 'malang', '445665454654', '1004', 'adi', 'adi123', 5, 5),
(7, 'adi', 'malang', '445665454654', '1004', 'adi', 'adi123', 5, 1),
(8, 'adi', 'malang', '445665454654', '1004', 'adi', 'adi123', 5, 1),
(9, 'Sakam', 'Jabr', '6546556', '4144', 'sakam', 'sakam123', 5, 2),
(10, 'adi', 'malang', '445665454654', '1004', 'adi', 'adi123', 5, 2),
(11, 'adi', 'malang', '445665454654', '1004', 'adi', 'adi123', 5, 2),
(12, 'adi', 'malang', '445665454654', '1004', 'adi', 'adi123', 5, 1),
(13, 'adi', 'malang', '445665454654', '1004', 'adi', 'adi123', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE `student_user` (
  `student_id` bigint(20) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `surah`
--

CREATE TABLE `surah` (
  `id` bigint(20) NOT NULL,
  `surah_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surah`
--

INSERT INTO `surah` (`id`, `surah_name`) VALUES
(1, 'Al-Fatiha'),
(2, 'Al-Baqara'),
(3, 'Aal-e-Imran'),
(4, 'An-Nisa'),
(5, 'Al-Maeda'),
(6, 'Al-Anaam'),
(7, 'Al-Araf'),
(8, 'Al-Anfal'),
(9, 'At-Taubah'),
(10, 'Yunus'),
(11, 'Hud'),
(12, 'Yusuf'),
(13, 'Ar-Rad'),
(14, 'Ibrahim'),
(15, 'Al-Hijr'),
(16, 'An-Nahl'),
(17, 'Al-Isra'),
(18, 'Al-Kahf'),
(19, 'Maryam'),
(20, 'Taha'),
(21, 'Al-Anbiya'),
(22, 'Al-Hajj'),
(23, 'Al-Mumenoon'),
(24, 'An-Noor'),
(25, 'Al-Furqan'),
(26, 'Ash-Shuara'),
(27, 'An-Naml'),
(28, 'Al-Qasas'),
(29, 'Al-Ankaboot'),
(30, 'Ar-Room'),
(31, 'Luqman'),
(32, 'As-Sajda'),
(33, 'Al-Ahzab'),
(34, 'Saba'),
(35, 'Fatir'),
(36, 'Ya Seen'),
(37, 'As-Saaffat'),
(38, 'Sad'),
(39, 'Az-Zumar'),
(40, 'Ghafir'),
(41, 'Fussilat'),
(42, 'Ash-Shura'),
(43, 'Az-Zukhruf'),
(44, 'Ad-Dukhan'),
(45, 'Al-Jathiya'),
(46, 'Al-Ahqaf'),
(47, 'Muhammad'),
(48, 'Al-Fath'),
(49, 'Al-Hujraat'),
(50, 'Qaf'),
(51, 'Adh-Dhariyat'),
(52, 'At-tur'),
(53, 'An-Najm'),
(54, 'Al-Qamar'),
(55, 'Al-Rahman'),
(56, 'Al-Waqia'),
(57, 'Al-Hadid'),
(58, 'Al-Mujadila'),
(59, 'Al-Hashr'),
(60, 'Al-Mumtahina'),
(61, 'As-Saff'),
(62, 'Al-Jumua'),
(63, 'Al-Munafiqoon'),
(64, 'At-Taghabun'),
(65, 'At-Talaq'),
(66, 'At-Tahrim'),
(67, 'Al-Mulk'),
(68, 'Al-Qalam'),
(69, 'Al-Haaqqa'),
(70, 'Al-Maarij'),
(71, 'Nooh'),
(72, 'Al-Jinn'),
(73, 'Al-Muzzammil'),
(74, 'Al-Muddathir'),
(75, 'Al-Qiyama'),
(76, 'Al-Insan'),
(77, 'Al-Mursalat'),
(78, 'An-Naba'),
(79, 'An-Naziat'),
(80, 'Abasa'),
(81, 'At-Takwir'),
(82, 'AL-Infitar'),
(83, 'Al-Mutaffifin'),
(84, 'Al-Inshiqaq'),
(85, 'Al-Burooj'),
(86, 'At-Tariq'),
(87, 'Al-Ala'),
(88, 'Al-Ghashiya'),
(89, 'Al-Fajr'),
(90, 'Al-Balad'),
(91, 'Ash-Shams'),
(92, 'Al-Lail'),
(93, 'Ad-Dhuha'),
(94, 'Al-Inshirah'),
(95, 'At-Tin'),
(96, 'Al-Alaq'),
(97, 'Al-Qadr'),
(98, 'Al-Bayyina'),
(99, 'Al-Zalzala'),
(100, 'Al-Adiyat'),
(101, 'Al-Qaria'),
(102, 'At-Takathur'),
(103, 'Al-Asr'),
(104, 'Al-Humaza'),
(105, 'Al-fil'),
(106, 'Quraish'),
(107, 'Al-Maun'),
(108, 'Al-Kauther'),
(109, 'Al-Kafiroon'),
(110, 'An-Nasr'),
(111, 'Al-Masadd'),
(112, 'Al-Ikhlas'),
(113, 'Al-Falaq'),
(114, 'An-Nas');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Class_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `number`, `phone_number`, `username`, `password`, `Class_id`) VALUES
(1, 'Ahmad', '1001', '08563524785', '', '', 1),
(2, 'Ridwan', '1002', '085635385785', '', '', 2),
(3, 'Bella', '1003', '085324536987', '', '', 3),
(4, 'Andi', '1004', '0856342571', '', '', 4),
(5, 'Siti', '1005', '08541235175', 'siti', 'siti123', 1),
(5, 'Siti', '1005', '08541235175', 'siti', 'siti123', 2),
(5, 'Siti', '1005', '08541235175', 'siti', 'siti123', 5),
(6, 'asndi', '655645645', '555455545', 'andi', 'andi123', 6),
(7, 'kam', '3545345', '453545534', 'kamu', 'kamu123', 5),
(8, 'Siti', '1005', '08541235175', 'siti', 'siti123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_user`
--

CREATE TABLE `teacher_user` (
  `teacher_id` bigint(20) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`,`Surah_id`,`Students_id`,`Students_Teacher_id`,`Students_Class_id`),
  ADD KEY `fk_Books_Surah1_idx` (`Surah_id`),
  ADD KEY `fk_Books_Students1_idx` (`Students_id`,`Students_Teacher_id`,`Students_Class_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `sholat`
--
ALTER TABLE `sholat`
  ADD PRIMARY KEY (`sholat_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`,`Teacher_id`,`Class_id`),
  ADD KEY `fk_Students_Teacher_idx` (`Teacher_id`),
  ADD KEY `fk_Students_Class1_idx` (`Class_id`);

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `surah`
--
ALTER TABLE `surah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`,`Class_id`),
  ADD KEY `fk_Teacher_Class1_idx` (`Class_id`);

--
-- Indexes for table `teacher_user`
--
ALTER TABLE `teacher_user`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `day_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sholat`
--
ALTER TABLE `sholat`
  MODIFY `sholat_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_user`
--
ALTER TABLE `student_user`
  MODIFY `student_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surah`
--
ALTER TABLE `surah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_user`
--
ALTER TABLE `teacher_user`
  MODIFY `teacher_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_Books_Students1` FOREIGN KEY (`Students_id`,`Students_Teacher_id`,`Students_Class_id`) REFERENCES `students` (`id`, `Teacher_id`, `Class_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Books_Surah1` FOREIGN KEY (`Surah_id`) REFERENCES `surah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_Students_Class1` FOREIGN KEY (`Class_id`) REFERENCES `class` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Students_Teacher` FOREIGN KEY (`Teacher_id`) REFERENCES `teacher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_Teacher_Class1` FOREIGN KEY (`Class_id`) REFERENCES `class` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
