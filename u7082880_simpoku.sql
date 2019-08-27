-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2019 at 03:41 PM
-- Server version: 10.2.25-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u7082880_simpoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `region` varchar(50) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAhkir` date NOT NULL,
  `contact` varchar(50) NOT NULL,
  `spec` varchar(150) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `filepdf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id`, `judul`, `deskripsi`, `tempat`, `region`, `tglMulai`, `tglAhkir`, `contact`, `spec`, `gambar`, `filepdf`) VALUES
(25, 'Simposium HKFM Jakarta', 'Simposium HKFM Jakarta', 'Raffles Hotel', 'jakarta', '2019-08-12', '2019-07-14', '089740102489', 'SpOG', 'foto1.jpg', 'event.pdf'),
(26, 'Bandung International Society for Pediatric Neuros', 'Bandung International Society for Pediatric Neurosurgery\r\n', 'Auditorium RSHS, Bdg', 'bandung', '2019-07-19', '2019-07-22', '0318029831', 'SpBS', 'foto2.jpg', 'event.pdf'),
(29, 'One Day Symposium of Emergencies in Gastroentero H', 'One Day Symposium of Emergencies in Gastroentero Hepatology\r\n', 'Hotel Sunan\r\n', 'Solo', '2019-07-01', '2019-07-02', '090123812', 'Sp.PD, KGEH, GP, PPDS, Paramedis\r\n', 'foto3.jpg', 'event.pdf'),
(30, 'The First Annual Meeting of Indonesia Society of I', 'The First Annual Meeting of Indonesia Society of Intensivist Anesthesiologist (INASIA)\r\n', 'Hotel Clarion \r\n', 'Makassar', '2019-10-30', '2019-10-31', '08975050520', 'SpAN', 'foto4.jpg', 'event.pdf'),
(33, 'KONAS PERHOMPEDIN', 'KONAS PERHOMPEDIN\r\n', 'Hotel Grand Inna\r\n', ' Padang, Sumatra Barat', '2019-07-24', '2019-07-25', '08975050520', 'SpPD. KHOM\r\n', '1.jpg', 'event.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_favorite`
--

CREATE TABLE `tb_favorite` (
  `id` bigint(20) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_favorite`
--

INSERT INTO `tb_favorite` (`id`, `idUser`, `idEvent`) VALUES
(2, 2, 26),
(28, 1, 25),
(32, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tb_slide`
--

CREATE TABLE `tb_slide` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `terlihat` enum('ya','tidak') NOT NULL DEFAULT 'ya'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slide`
--

INSERT INTO `tb_slide` (`id`, `judul`, `gambar`, `terlihat`) VALUES
(1, 'event surabaya', '1.jpg', 'ya'),
(2, 'event jakarta', '2.jpg', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `verifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `password`, `nama`, `no_telp`, `pekerjaan`, `tgl_lahir`, `verifikasi`) VALUES
(1, 'pradanamahendra@gmail.com', '$2y$10$rOcxErSbIZgvLBVgYzKlLu/K/Uk7oWxqiYVePHdrhrCzYdcgo/H1O', 'pradana', '08975050520', 'programer', '1992-04-18', 'sudah'),
(2, 'tes@gmail.com', '$2y$10$SSEyuMa8zd4vMpH6OuMdcu5ATr5WWU2KFt5KgakRE8HUNLdUmO6Nq', 'pradan', '08975455', 'Dokter Umum', '1965-07-01', 'belum'),
(3, 'admin@gmail.com', '$2y$10$32sGpwEEgbQP7HDDeYoOlumQIddTsQ3Rb9pBUIOmdME7povU3Uemq', 'admin', '08784545', 'Apoteker', '1972-07-09', 'sudah'),
(4, 'admin2@gmail.com', '$2y$10$W7vM7iEVSHaKHhNFvNNh8Oa572fKCMbTpXFLoCsszpoEUd.iC6kPy', 'admin2', '008849494', 'Dokter Spesialis', '2019-07-09', 'belum'),
(5, 'bagus@gmail.com', '$2y$10$.jfQClVoVSndITm1veP4DuWL2VacT8HAQrsPsL8Nx0hF6rWYmZx4u', 'bagus', '087975458', 'Perawat', '1991-07-16', 'belum'),
(6, 'genossys@gmail.com', '$2y$10$TvcXEkmkE70WQEQcH6mTx.q/FiGBp.la4dm3/r0wEzmXdluXCHxy6', 'genossys', '089754285', 'Perawat', '1967-08-31', 'sudah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_favorite`
--
ALTER TABLE `tb_favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idEvent` (`idEvent`);

--
-- Indexes for table `tb_slide`
--
ALTER TABLE `tb_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_favorite`
--
ALTER TABLE `tb_favorite`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_slide`
--
ALTER TABLE `tb_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_favorite`
--
ALTER TABLE `tb_favorite`
  ADD CONSTRAINT `tb_favorite_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_favorite_ibfk_2` FOREIGN KEY (`idEvent`) REFERENCES `tb_event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
