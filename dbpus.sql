-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 11:46 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nm_admin` text CHARACTER SET utf8mb4 NOT NULL,
  `username` text CHARACTER SET utf8mb4 NOT NULL,
  `password` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nm_admin`, `username`, `password`) VALUES
(1, 'admin', 'jwd', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `nama`, `jeniskelamin`, `alamat`, `status`, `foto`) VALUES
('AD007', 'Asad Abdan Syakur', 'Pria', 'Prambon, Mojokerto', 'Tidak Meminjam', 'AD007.jpg'),
('AG003', 'Sindy Jelita Nada', 'Wanita', 'Mojosari, Mojokerto', 'Tidak Meminjam', 'AG003.jpg'),
('AG005', 'Reza Aprillianto', 'Pria', 'Seduri, Mojokerto', 'Tidak Meminjam', 'AG005.jpg'),
('AG007', 'Cindy Tatia Amallia', 'Wanita', 'Pungging, Mojokerto', 'Tidak Meminjam', 'AG007.jpg'),
('AG009', 'Dena Oktaviana', 'Wanita', 'Seduri, Mojokerto', 'Tidak Meminjam', 'AG009.jpg'),
('AP001', 'Fredy Wijaya Pratama Tuhulele', 'Pria', 'Bangsal, Mojokerto', 'Tidak Meminjam', 'AP001.jpg'),
('AP003', 'Lailatul Africha Al Azizi', 'Wanita', 'Bangsal Mojokerto', 'Tidak Meminjam', 'AP003.jpg'),
('AP100', 'Nadhira Thafana Arsyifa', 'Wanita', 'Ngoro, Mojokerto', 'Tidak Meminjam', 'AP100.jpeg'),
('AYS00', 'Yurischa Aulya Firnanda', 'Wanita', 'Ngoro, Mojokerto', 'Tidak Meminjam', 'AYS001.jpg'),
('SZ001', 'Afika Diah Nurmayasari', 'Wanita', 'Bangsal, Mojokerto', 'Tidak Meminjam', 'SZ001.JPG'),
('SZ002', 'Bima British Junior', 'Pria', 'Kutorejo, Mojokerto', 'Tidak Meminjam', 'SZ002.JPG'),
('SZ005', 'Dona Vania Femdika', 'Wanita', 'Mojosari, Mojokerto', 'Tidak Meminjam', 'SZ005.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbbuku`
--

CREATE TABLE `tbbuku` (
  `idbuku` varchar(25) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `penulis` varchar(25) NOT NULL,
  `penerbit` varchar(25) NOT NULL,
  `cover` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbuku`
--

INSERT INTO `tbbuku` (`idbuku`, `judul`, `penulis`, `penerbit`, `cover`) VALUES
('BK010', 'Hello Salma', 'Erisca Febriani', 'Coconut Books', 'BK010.jpg'),
('BK020', 'Pulang Pergi', 'Tere Liye', 'Gramedia Pustaka Utama ', 'BK020.jpg'),
('BK030', 'MENJADI PEMIMPIN HEBAT', 'Dewi Indra P	', 'Psikologi Corner ', 'BK030.jpg'),
('BK080', 'Mommyclopedia', 'dr. Meta Hanindita, Sp.A', 'Gramedia Pustaka Utama ', 'BK080.jpg'),
('SZ011', 'Dear Nathan', 'Erisca Febriani', 'Best Media', 'SZ011.jpg'),
('SZ012', 'Laut Bercerita', 'Leila S. Chudori', 'Kpg ', 'SZ012.jpg'),
('SZ015', 'Hujan Bulan Juni', 'Sapardi Djoko Damono	', ' Gramedia Pustaka Utama ', 'SZ015.jpg'),
('SZ020', 'Komik Doraemon Vol. 0', 'Fujiko F Fujio', 'Elex Media Komputindo ', 'SZ020.jpg'),
('SZ055', 'Yang Belum Usai', 'Pijar Psikologi', 'Elex Media Komputindo ', 'SZ055.jpg'),
('SZ070', 'Seni Berbahagia', 'ARDHINA NUGRAHAEN', 'Psikologi Corner ', 'SZ070.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` varchar(25) NOT NULL,
  `idanggota` varchar(25) NOT NULL,
  `idbuku` varchar(25) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indexes for table `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
