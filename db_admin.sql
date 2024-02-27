-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 02:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatbot_knowledge`
--

CREATE TABLE `tbl_chatbot_knowledge` (
  `id_pattern` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `question` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_chatbot_knowledge`
--

INSERT INTO `tbl_chatbot_knowledge` (`id_pattern`, `category`, `question`, `answer`, `created_at`) VALUES
(1, 'keuangan', 'Berapa harga satu SKS?', 'Harga satu SKS adalah Rp. 150000.', '2023-12-43 11:23:34'),
(2, 'keuangan', 'Cara untuk cek biaya kuliah.', 'Caranya anda dapat pergi ke BO unklab.', '2023-12-43 11:23:34'),
(3, 'pendaftaran', 'Berkas apa yang harus di bawa pada saat pendaftaran.', 'Pada saat anda mendaftar, yang harus dibawa adalah Ijazah, KTP, surat babtisan.', '2023-12-43 11:23:34'),
(4, 'pendaftaran', 'Berapa umur yang diterima pada saat mendaftar di Unklab?', 'Tidak ada perhitungan umur ya.', '2023-12-43 11:23:34'),
(5, 'filkom', 'apa saja jurusan di Fakultas Ilmu Komputer?', 'Terdapat dua jurusan yaitu Sistem informasi dan Informatika.', '2023-12-43 11:23:34'),
(6, 'filkom', 'Ekstrakulikuler apa yang ada di fakultas ilmu komputer?', 'Ada yang menarik seperti Google developer club dan group paduan suara.', '2023-12-43 11:23:34'),
(7, 'filkom', 'apa kepanjangan filkom?', 'Kepanjangan dari filkom adalah Fakultas Ilmu Komputer.', '2023-12-43 11:23:34'),
(8, 'filkom', 'Siapa dekan fakultas ilmu komputer?', 'Dekan di fakultas ilmu komputer adalah Bpk. Andrew Liem.', '2023-12-43 11:23:34'),
(9, 'greetings', 'Selamat pagi?', 'Ya, selamat pagi juga.', '2023-12-43 11:23:34'),
(10, 'greetings', 'Selamat siang?', 'Okey, selamat siang juga.', '2023-12-43 11:23:34'),
(12, 'greetings', 'Apa kabar kamu?', 'Saya senang dan bahagia selalu.', '2023-12-43 11:23:34'),
(13, 'greetings', 'Selamat malam?', 'Ya. Selamat malam juga.', '2023-12-43 11:23:34'),
(14, 'greetings', 'hay', 'hello', '2023-05-18 14:35:20'),
(34, 'keuangan', 'berapa harga uang laboratorium ?', 'harga uang laboratorium 350.000/mata kuliah', '2023-05-19 03:53:25'),
(35, 'filkom', 'dimana gedung fakultas filkom', 'GA ', '2023-05-19 04:32:07'),
(36, 'filkom', 'dimana ruang dosen filkom?', 'GK3', '2023-05-19 04:52:24'),
(37, 'filkom', 'dimana ruangan dekan filkom?', 'ada di GA', '2023-05-19 06:40:44'),
(38, 'asrama', 'ada berapa asrama putri?', 'ada 3', '2023-05-19 06:43:06'),
(39, 'pendaftaran', 'bulan apa tanggal pendaftaran di Unklab?', 'bulan agustus', '2023-05-19 06:49:55'),
(40, 'sejarah', 'kapan filkom dibuka?', 'filkom dibuka tahun 1999', '2023-05-19 06:58:21'),
(41, 'asrama', 'dimana letak asrama annex?', 'asrama annex terletak disebelah kanan GK2', '2023-05-19 07:01:00'),
(42, 'asrama', 'siapa nama kepala asrama crystal?', 'Pdt Jacob', '2023-05-19 07:01:56'),
(43, 'filkom', 'Siapa kaprodi informatika saat ini?', 'Sir Green Mandias', '2023-05-19 08:13:06'),
(44, 'filkom', 'Siapa kaprodi SI?', 'Sir Stenly Pungus', '2023-05-19 08:15:34'),
(45, 'filkom', 'siapa wakil dekan filkom?', 'Sir Lengkong', '2023-05-19 08:32:53'),
(46, 'pendaftaran', 'kapan wisuda ankatan 88 Unklab?', 'wisuda diadakan bulan juni', '2023-05-19 08:36:29'),
(47, 'fasilitas', 'Apakah ada fasilitas lapangan bola kaki di Unklab?', 'yah ada lapangan bola kaki yang luas di Unklab', '2023-05-19 08:44:41'),
(48, 'pendaftaran', 'Dimana letak unklab?', 'letaknya di airmadidi', '2023-05-19 08:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history_chat`
--

CREATE TABLE `tbl_history_chat` (
  `email_user` varchar(50) NOT NULL,
  `id_pattern` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `user_question` varchar(250) NOT NULL,
  `chatbot_answer` varchar(250) NOT NULL,
  `decision_threshold` varchar(20) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_history_chat`
--

INSERT INTO `tbl_history_chat` (`email_user`, `id_pattern`, `category`, `user_question`, `chatbot_answer`, `decision_threshold`, `created_at`) VALUES
('folken@gmail.com', '7', 'filkom', 'Apa kepanjangan filkom?', 'Kepanjangan dari filkom adalah Fakultas Ilmu Komputer.', '100', '2023-05-18 09:44:32'),
('folken@gmail.com', '13', 'greetings', 'Selamat malam', 'Ya. Selamat malam juga.', '96.2962963', '2023-05-18 09:47:43'),
('jeremy@gmail.com', '1', 'kekuangan', 'Berapa harga satu SKS?', 'Harga satu SKS adalah Rp. 150000.', '100', '2023-05-18 09:57:44'),
('jeremy@gmail.com', '8', 'filkom', 'Siapa dekan fakultas ilmu komputer', 'Dekan di fakultas ilmu komputer adalah Bpk. Andrew Liem.', '98.55072464', '2023-05-18 09:58:11'),
('jeremy@gmail.com', '8', 'filkom', 'Kenapa unklan libur?', 'Senang bertemu denganmu. Pertanyaan yang menarik.', '47.27272727', '2023-05-18 09:58:22'),
('s954321@student.unklab.ac.id', '13', 'greetings', 'Selamat malam', 'Ya. Selamat malam juga.', '96.2962963', '2023-05-18 17:17:34'),
('s954321@student.unklab.ac.id', '12', 'greetings', 'Apa kabar mu?', 'Saya senang dan bahagia selalu.', '92.85714286', '2023-05-18 17:17:48'),
('jeremy@gmail.com', '9', 'greetings', 'Hi', 'Lebih baik tidak untuk bertanya.', '13.33333333', '2023-05-19 02:21:34'),
('jeremy@gmail.com', '9', 'greetings', 'Selamat pagi', 'Ya, selamat pagi juga.', '96', '2023-05-19 02:21:49'),
('jeremy@gmail.com', '12', 'greetings', 'Apa kabar?', 'Saya senang dan bahagia selalu.', '80', '2023-05-19 02:22:00'),
('jeremy@gmail.com', '1', 'kekuangan', 'Apa asrama perempuan paling banyak?', 'Ayo mendaftar di Universitas Klabat.', '42.10526316', '2023-05-19 02:22:23'),
('jeremy@gmail.com', '3', 'pendaftaran', 'Apa asrama laki-laki paling banyak penghuninya?', 'Ku coba untuk mengerti tapi tidak bisa.', '38.38383838', '2023-05-19 02:22:54'),
('jeremy@gmail.com', '12', 'greetings', 'Uang lab?', 'Tidak dapat dimengerti, mohon bertanya dengan singkat dan jelas.', '41.66666667', '2023-05-19 04:04:23'),
('jeremy@gmail.com', '12', 'greetings', 'Uang laboratorium', 'Ada kalanya keyword tidak cocok, mohon diperjelas.', '43.75', '2023-05-19 04:05:33'),
('jeremy@gmail.com', '1', 'keuangan', 'Berapa harga uang laboratorium unklab?', 'Ayo mendaftar di Universitas Klabat.', '63.33333333', '2023-05-19 04:07:55'),
('jeremy@gmail.com', '1', 'keuangan', 'Berapa uang laboratorium unklab?', 'Tidak dapat dimengerti, mohon bertanya dengan singkat dan jelas.', '59.25925926', '2023-05-19 04:08:52'),
('jeremy@gmail.com', '1', 'keuangan', 'berapa harga uang laboratorium ?', 'Ku coba untuk mengerti tapi tidak bisa.', '66.66666667', '2023-05-19 04:10:38'),
('jeremy@gmail.com', '1', 'keuangan', 'berapa harga uang laboratorium ?', 'Senang bertemu denganmu. Pertanyaan yang menarik.', '66.66666667', '2023-05-19 04:11:36'),
('s954321@student.unklab.ac.id', '1', 'keuangan', 'Berapa harga uang laboratorium unklab?', 'Ku coba untuk mengerti tapi tidak bisa.', '63.33333333', '2023-05-19 04:12:22'),
('s954321@student.unklab.ac.id', '9', 'greetings', 'Selamat pagi', 'Ya, selamat pagi juga.', '96', '2023-05-19 04:12:43'),
('s954321@student.unklab.ac.id', '1', 'keuangan', 'Berapa harga uang laboratorium?', 'Ayo mendaftar di Universitas Klabat.', '64.1509434', '2023-05-19 04:12:59'),
('jeremy@gmail.com', '1', 'keuangan', 'berapa harga uang laboratorium ?', 'Tidak dapat dimengerti, mohon bertanya dengan singkat dan jelas.', '66.66666667', '2023-05-19 04:13:22'),
('s954321@student.unklab.ac.id', '1', 'keuangan', 'Berapa harga uang laboratorium?', 'Tidak dapat dimengerti, mohon bertanya dengan singkat dan jelas.', '64.1509434', '2023-05-19 04:14:43'),
('jeremy@gmail.com', '1', 'keuangan', 'berapa harga uang laboratorium ?', 'Ku coba untuk mengerti tapi tidak bisa.', '66.66666667', '2023-05-19 04:16:56'),
('s954321@student.unklab.ac.id', '1', 'keuangan', 'Berapa harga uang laboratorium?', 'Tidak dapat dimengerti, mohon bertanya dengan singkat dan jelas.', '64.1509434', '2023-05-19 04:17:13'),
('s954321@student.unklab.ac.id', '8', 'filkom', 'Siapa dekan fakultas ilmu komputer?', 'Dekan di fakultas ilmu komputer adalah Bpk. Andrew Liem.', '100', '2023-05-19 04:17:48'),
('jeremy@gmail.com', '8', 'filkom', 'Siapa dekan fakultas ilmu komputer', 'Dekan di fakultas ilmu komputer adalah Bpk. Andrew Liem.', '98.55072464', '2023-05-19 04:17:50'),
('jeremy@gmail.com', '1', 'keuangan', 'berapa harga uang laboratorium ?', 'Tidak dapat dimengerti, mohon bertanya dengan singkat dan jelas.', '66.66666667', '2023-05-19 04:21:08'),
('jeremy@gmail.com', '12', 'greetings', 'Uang asrama', 'Ku coba untuk mengerti tapi tidak bisa.', '46.15384615', '2023-05-19 04:23:08'),
('jeremy@gmail.com', '33', '--Choose Category--', 'Tanggal berapa ujian', 'Ada kalanya keyword tidak cocok, mohon diperjelas.', '43.07692308', '2023-05-19 04:23:24'),
('jeremy@gmail.com', '1', 'keuangan', 'Berapa harga satu sks', 'Harga satu SKS adalah Rp. 150000.', '97.6744186', '2023-05-19 04:23:56'),
('jeremy@gmail.com', '1', 'keuangan', 'Harga sks', 'Maaf, saya tidak mengerti. Bisa diperjelas.', '58.06451613', '2023-05-19 04:24:42'),
('jeremy@gmail.com', '1', 'keuangan', 'Harga satu sks', 'Harga satu SKS adalah Rp. 150000.', '77.77777778', '2023-05-19 04:24:55'),
('jeremy@gmail.com', '1', 'keuangan', 'Satu sks', 'Mohon diperjelas pertanyaan anda.', '53.33333333', '2023-05-19 04:25:06'),
('s954321@student.unklab.ac.id', '1', 'keuangan', 'Berapa harga uang laboratorium?', 'Ayo mendaftar di Universitas Klabat.', '64.1509434', '2023-05-19 04:29:00'),
('jeremy@gmail.com', '1', 'keuangan', 'berapa harga uang laboratorium ?', 'Mohon diperjelas pertanyaan anda.', '66.66666667', '2023-05-19 04:29:03'),
('s954321@student.unklab.ac.id', '1', 'keuangan', 'Berapa harga uang laboratorium?', 'Ada kalanya keyword tidak cocok, mohon diperjelas.', '64.1509434', '2023-05-19 04:29:19'),
('jeremy@gmail.com', '8', 'filkom', 'Siapa dekan fakultas ilmu komputer?', 'Mohon diperjelas pertanyaan anda.', '68.29268293', '2023-05-19 04:37:25'),
('jeremy@gmail.com', '8', 'filkom', 'dimana gedung fakultas filkom', 'Kami mencoba mengerti dan menjadi yang terbaik.', '56.25', '2023-05-19 04:38:11'),
('s954321@student.unklab.ac.id', '17', 'keuangan', 'Dimana gedung fakultas filkom?', 'di gedung GA', '98.36065574', '2023-05-19 04:41:09'),
('jeremy@gmail.com', '17', 'keuangan', 'Dimana gedung fakultas ilmu komputer ?', 'di gedung GA', '84.05797101', '2023-05-19 04:43:06'),
('jeremy@gmail.com', '37', 'filkom', 'dimana ruangan dekan filkom?', 'ada di GA', '100', '2023-05-19 06:42:31'),
('jeremy@gmail.com', '38', 'asrama', 'ada berapa asrama putri di unklab?', 'ada 3', '82.75862069', '2023-05-19 06:44:22'),
('jeremy@gmail.com', '40', 'sejarah', 'Kapan filkom dibuka?', 'filkom dibuka tahun 1999', '100', '2023-05-19 06:58:46'),
('jeremy@gmail.com', '39', 'pendaftaran', 'Bulan apa tanggal pendaftaran di unklab?', 'bulan agustus', '100', '2023-05-19 06:59:12'),
('jeremy@gmail.com', '41', 'asrama', 'Dimana letak asrama annex?', 'asrama annex terletak disebelah kanan GK2', '100', '2023-05-19 07:01:20'),
('jeremy@gmail.com', '42', 'asrama', 'Siapa nama kepala asrama crystal?', 'Pdt Jacob', '100', '2023-05-19 07:02:14'),
('jeremy@gmail.com', '42', 'asrama', 'Siapa nama kepala asrama crystal?', 'Pdt Jacob', '100', '2023-05-19 08:12:21'),
('jeremy@gmail.com', '43', 'filkom', 'Siapa kaprodi informatika saat ini?', 'Sir Green Mandias', '100', '2023-05-19 08:13:45'),
('jeremy@gmail.com', '43', 'filkom', 'Siapa kaprodi SI?', 'Kami mencoba mengerti dan menjadi yang terbaik.', '65.38461538', '2023-05-19 08:14:14'),
('jeremy@gmail.com', '43', 'filkom', 'Siapa kaprodi SI?', 'Ku coba untuk mengerti tapi tidak bisa.', '65.38461538', '2023-05-19 08:15:05'),
('jeremy@gmail.com', '44', 'filkom', 'Siapa kaprodi SI?', 'Sir Stenly Pungus', '100', '2023-05-19 08:16:01'),
('jeremy@gmail.com', '45', 'filkom', 'Siapa wakil dekan filkom?', 'Sir Lengkong', '100', '2023-05-19 08:34:05'),
('jeremy@gmail.com', '39', 'pendaftaran', 'Kapan wisuda angkatan 88 Unklab?', 'Kami mencoba mengerti dan menjadi yang terbaik.', '55.55555556', '2023-05-19 08:35:09'),
('jeremy@gmail.com', '46', 'pendaftaran', 'kapan wisuda ankatan 88 Unklab?', 'wisuda diadakan bulan juni', '100', '2023-05-19 08:37:17'),
('jeremy@gmail.com', '46', 'pendaftaran', 'Kapan wisuda ankatan 88 Unklab?', 'wisuda diadakan bulan juni', '100', '2023-05-19 08:38:06'),
('jeremy@gmail.com', '47', 'fasilitas', 'Apakah ada fasilitas lapangan bola kaki di Unklab?', 'yah ada lapangan bola kaki yang luas di Unklab', '100', '2023-05-19 08:45:59'),
('jeremy@gmail.com', '41', 'asrama', 'Dimana letak unklab?', 'Mohon diperjelas pertanyaan anda.', '65.2173913', '2023-05-19 08:46:54'),
('jeremy@gmail.com', '48', 'pendaftaran', 'Dimana letak unklab?', 'letaknya di airmadidi', '100', '2023-05-19 08:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `fullname` varchar(255) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `prog_study` varchar(50) NOT NULL,
  `curriculum_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`fullname`, `reg_num`, `nim`, `faculty`, `prog_study`, `curriculum_name`, `email`, `password`, `created_at`) VALUES
('Vicky Ravensky Pati Ani', 'S2200285', '105022010046', 'Fakultas Ilmu Komputer', 'Informatika', 'Informatika 2020-2024', 's2200285@student.unklab.ac.id', '12345', '2024-02-26 13:23:19'),
('Ardita Estika Ruku', 's22110035', '103022110005', 'Fakultas Ekonomi dan Bisnis', 'Management', 'Management 2020', 's22110035@student.unklab.ac.id', '12345', '2024-02-26 13:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_mobile`
--

CREATE TABLE `tbl_user_mobile` (
  `user_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_mobile`
--

INSERT INTO `tbl_user_mobile` (`user_name`, `email`, `phonenumber`, `address`, `password`, `created_at`) VALUES
('Folken Mamarimbing', 'folken@gmail.com', '0984348583', 'Tomohon', '12345', '2023-04-05 11:29:43'),
('Jeremy Pongantung', 'jeremy@gmail.com', '081265357896', 'Kanaan Airmadidi', '12345', '2023-05-17 07:41:43'),
('Semmy Wellem Taju', 'semmy@gmail.com', '0984348583', 'Unklab Aermadidi', '12345', '2023-04-05 11:29:43'),
('Yehezkiel Wonte', 'Yehezkiel@gmail.com', '081265937598', 'Kanaan Unklab', '12345678', '2023-05-17 23:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` enum('Admin','Operator') DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `department`, `email`, `password`, `role`, `date_created`) VALUES
(3, 'Vicky Pati Ani', 'Fakultas Ilmu Komputer', 'vickyravensky@gmail.com', '12345', 'Admin', '2024-02-26 21:26:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chatbot_knowledge`
--
ALTER TABLE `tbl_chatbot_knowledge`
  ADD PRIMARY KEY (`id_pattern`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
