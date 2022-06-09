-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 03:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kohstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `namaDepan` varchar(50) NOT NULL,
  `namaBelakang` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `namaDepan`, `namaBelakang`, `email`, `password`) VALUES
(8, 'asd', 'asd', 'andreas.nugroho@ti.ukdw.ac.id', '$2y$10$8Dp'),
(9, 'tesxxx', 'tes3', 'prog.web@gmail.com', '$2y$10$otE'),
(10, 'andre', 'andre', 'tes@gmail.com', '$2y$10$izZ'),
(11, 'david', 'david', 'david@gmail.com', '$2y$10$xKu'),
(14, 'andre', 'andre', 'andre@gmail.com', 'andre'),
(15, 'tesxxx', 'tes3', 'testing@test.com', '$2y$10$eF5');

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id_instruktur` int(11) NOT NULL,
  `nama_instruktur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id_instruktur`, `nama_instruktur`) VALUES
(2, 'tes'),
(4, 'tes'),
(5, 'andre');

-- --------------------------------------------------------

--
-- Table structure for table `olahraga`
--

CREATE TABLE `olahraga` (
  `id_olahraga` int(11) NOT NULL,
  `nama_olahraga` varchar(50) NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `durasi` text NOT NULL,
  `peralatan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kesulitan` enum('Beginner','Intermediate','Advanced') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `olahraga`
--

INSERT INTO `olahraga` (`id_olahraga`, `nama_olahraga`, `id_instruktur`, `video`, `deskripsi`, `durasi`, `peralatan`, `gambar`, `kesulitan`) VALUES
(18, 'kohxx', 5, 'kohxx', 'kohxx', 'kohxxxxx', 'kohxx', 'frame.png', 'Intermediate'),
(21, 'xcv', 5, 'xcv', 'xcv', 'xcv', 'xcv', 'Kasus Edy Mulyadi.png', 'Intermediate'),
(22, 'ngocok perut', 4, 'https://www.youtube.com/watch?v=MNaeKmkF8uk', 'testing', 'testing', 'ga ada', '24487603198_482c0eaf99_o.jpg', 'Advanced'),
(23, 'tes des', 2, 'tes des ', 'dessss', 'des', 'des', 'image_2022-05-31_17-57-45.png', 'Beginner'),
(24, 'tes', 2, 'tes', 'tes ', 'hehe', 'xxx', 'Screenshot_20211110_145419.png', 'Beginner'),
(25, 'tes', 2, 'tes', 'asd', 'test', 'tes', 'IMG_20220211_225218.jpg', 'Advanced');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indexes for table `olahraga`
--
ALTER TABLE `olahraga`
  ADD PRIMARY KEY (`id_olahraga`),
  ADD KEY `fk_instruktur` (`id_instruktur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `instruktur`
--
ALTER TABLE `instruktur`
  MODIFY `id_instruktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `olahraga`
--
ALTER TABLE `olahraga`
  MODIFY `id_olahraga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `olahraga`
--
ALTER TABLE `olahraga`
  ADD CONSTRAINT `fk_instruktur` FOREIGN KEY (`id_instruktur`) REFERENCES `instruktur` (`id_instruktur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
