-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 07:11 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipskppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_keluar`
--

CREATE TABLE `tb_surat_keluar` (
  `id_surat` int(3) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` datetime NOT NULL,
  `nama_pengirim` varchar(99) NOT NULL,
  `perihal_surat` varchar(99) NOT NULL,
  `waktu_input` datetime NOT NULL,
  `foto_surat` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal_surat` varchar(99) NOT NULL,
  `tanggal_surat_diterima` date NOT NULL,
  `foto_surat` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`id`, `no_surat`, `nama_pengirim`, `tanggal_surat`, `perihal_surat`, `tanggal_surat_diterima`, `foto_surat`) VALUES
(24, '11', '1323', '2018-04-23', '1234', '2018-04-24', ''),
(31, 'asdsa', 'daqe', '2018-04-25', 'as', '2018-04-25', 'IMG_20160913_134622.jpg'),
(32, 'asd', 'asda', '2018-04-25', 'sda', '2018-04-25', '.pdf'),
(33, 'asd', 'asda', '2018-04-25', 'sda', '2018-04-25', '1.pdf'),
(34, '13', '12', '2018-04-25', '312', '2018-04-25', ''),
(35, 'sf', 'asf', '2018-04-25', 'asf', '2018-04-25', ''),
(36, 'asd', 'sad', '2018-04-25', 'dsa', '2018-04-25', ''),
(38, 'asd', 'ads', '2018-04-25', 'd', '2018-04-25', ''),
(39, 'asd', 'ds', '0000-00-00', 'sda', '0000-00-00', ''),
(40, 'asd', 'ds', '0000-00-00', 'sda', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_nip` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_nip`, `user_password`, `user_jabatan`) VALUES
(1, 'Ehtesham', 'ehtesham@gmail.com', '123', ''),
(2, 'Ehtesham', 'ehtesham@gmail.com', '123', ''),
(3, 'farrukh', 'farrukh@gmail.com', '123', ''),
(4, 'zaid', 'zaid@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(5, 'Muhammad Ilmi Fauzan', '10151031', '10151031', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  MODIFY `id_surat` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
