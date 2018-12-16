-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 14 Des 2018 pada 22.42
-- Versi Server: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 5.6.38-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silabus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbhari`
--

CREATE TABLE `tbhari` (
  `idhari` int(11) NOT NULL,
  `hari` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbhari`
--

INSERT INTO `tbhari` (`idhari`, `hari`) VALUES
(1, 'SENIN'),
(2, 'SELASA'),
(3, 'RABU'),
(4, 'KAMIS'),
(5, 'JUMAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjadwal`
--

CREATE TABLE `tbjadwal` (
  `idlab` int(11) NOT NULL,
  `idwaktu` int(11) NOT NULL,
  `idhari` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbjadwal`
--

INSERT INTO `tbjadwal` (`idlab`, `idwaktu`, `idhari`, `iduser`, `tanggal`, `keterangan`, `status`) VALUES
(1, 1, 1, 3, '2018-12-17', '4A-JARKOM-ANWAR', 1),
(1, 2, 1, 3, '2018-12-17', '4A-JARKOM-ANWAR', 1),
(1, 3, 1, 3, '2018-12-17', '4A-JARKOM-ANWAR', 1),
(1, 3, 2, 18, '2018-12-18', '3A-KRIPTOGRAFI-Anwarpro', 2),
(2, 1, 4, 2, '2018-12-13', '4A-Anwar-Kripto', 2),
(2, 2, 4, 2, '2018-12-13', '4A-Anwar-Kripto', 2),
(2, 3, 2, 1, NULL, 'FaPet-Nalsa', 1),
(2, 3, 5, 1, NULL, 'PGSD - 2B - Jatmiko', 1),
(2, 4, 2, 1, NULL, 'FaPet-Nalsa', 1),
(2, 4, 5, 1, NULL, 'PGSD - 2B - JATMIKO', 1),
(2, 5, 1, 1, NULL, 'TM-2A-HESTY', 1),
(2, 5, 3, 1, NULL, 'TI-PATMI', 1),
(2, 5, 4, 1, NULL, 'FKES', 1),
(2, 5, 5, 1, NULL, 'PGSD - 2B - JATMIKO', 1),
(2, 6, 1, 1, NULL, 'TM-2A-Hesty', 1),
(2, 6, 3, 1, NULL, 'TI-PATMI', 1),
(2, 6, 4, 1, NULL, 'FKES', 1),
(2, 6, 5, 1, NULL, 'PGSD - 2B - JATMIKO', 1),
(2, 7, 1, 1, NULL, 'TM-2A-HESTY', 1),
(2, 7, 3, 1, NULL, 'TI-PATMI', 1),
(2, 7, 4, 1, NULL, 'FKES', 1),
(2, 7, 5, 1, NULL, 'PPKN-JATMIKO', 1),
(2, 8, 3, 1, NULL, 'TI-PATMI', 1),
(2, 8, 5, 1, NULL, 'PPKN-JATMIKO', 1),
(2, 9, 1, 1, NULL, 'TM-2B-FATKUR', 1),
(2, 10, 1, 1, NULL, 'TM-2B-FATKUR', 1),
(3, 1, 1, 1, NULL, 'TI-ANITA', 1),
(3, 1, 2, 1, NULL, 'TI-DANIEL', 1),
(3, 1, 3, 1, NULL, 'TI-ARI', 1),
(3, 1, 4, 1, NULL, 'TI-JULI', 1),
(3, 2, 1, 1, NULL, 'TI-ANITA', 1),
(3, 2, 2, 1, NULL, 'TI-DANIEL', 1),
(3, 2, 3, 1, NULL, 'TI-ARI', 1),
(3, 2, 4, 1, NULL, 'TI-JULI', 1),
(3, 3, 1, 1, NULL, 'TI-PATMI', 1),
(3, 3, 2, 1, NULL, 'TI-DANIEL', 1),
(3, 3, 3, 1, NULL, 'TI-BAGUS', 1),
(3, 3, 4, 1, NULL, 'TI-JULI', 1),
(3, 3, 5, 1, NULL, 'TI-ARDI', 1),
(3, 4, 1, 1, NULL, 'TI-PATMI', 1),
(3, 4, 2, 1, NULL, 'TI-DANIEL', 1),
(3, 4, 3, 1, NULL, 'TI-BAGUS', 1),
(3, 4, 4, 1, NULL, 'TI-JULI', 1),
(3, 4, 5, 1, NULL, 'TI-ARDI', 1),
(3, 5, 1, 1, NULL, 'TI-DANAR', 1),
(3, 5, 2, 1, NULL, 'TI-DANAR', 1),
(3, 5, 4, 1, NULL, 'TI-DARA', 1),
(3, 5, 5, 1, NULL, 'TI-BILAL', 1),
(3, 6, 1, 1, NULL, 'TI-DANAR', 1),
(3, 6, 2, 1, NULL, 'TI-DANAR', 1),
(3, 6, 3, 1, NULL, 'SI-2A-Praktek SD-Rina', 1),
(3, 6, 4, 1, NULL, 'TI-DARA', 1),
(3, 6, 5, 1, NULL, 'TI-BILAL', 1),
(3, 7, 3, 1, NULL, 'SI-2A-Praktek SD-Rina', 1),
(3, 8, 1, 1, NULL, 'SI - 3A - Prak PBO - Arie N', 1),
(3, 8, 2, 1, NULL, 'SI-3A-Prak PBO-AN', 1),
(3, 8, 3, 1, NULL, 'SI-2A-Praktek SD-Rina', 1),
(3, 9, 1, 1, NULL, 'SI - 3A - Prak PBO - Arie N', 1),
(3, 9, 2, 1, NULL, 'SI-3A-Prak PBO-AN', 1),
(3, 9, 3, 1, NULL, 'SI-2A-Praktek SD-Rina', 1),
(3, 10, 1, 1, NULL, 'SI - 3A - Prak PBO - Arie N', 1),
(3, 10, 2, 1, NULL, 'SI-3A-Prak PBO-AN', 1),
(3, 11, 1, 1, NULL, 'SI - 3A - Prak PBO - Arie N', 1),
(3, 11, 2, 1, NULL, 'SI-3A-Prak PBO-AN', 1),
(4, 1, 2, 1, NULL, 'TI-RATIH', 1),
(4, 1, 3, 1, NULL, 'TI-JULIAN', 1),
(4, 1, 4, 1, NULL, 'TI-BILAL', 1),
(4, 2, 2, 1, NULL, 'TI-RATIH', 1),
(4, 2, 3, 1, NULL, 'TI-JULIAN', 1),
(4, 2, 4, 1, NULL, 'TI-BILAL', 1),
(4, 3, 1, 1, NULL, 'TI-ARDI', 1),
(4, 3, 2, 1, NULL, 'TI-INTAN', 1),
(4, 3, 3, 1, NULL, 'TI-JULIAN', 1),
(4, 3, 4, 1, NULL, 'TI-DARA', 1),
(4, 3, 5, 1, NULL, 'TI-NOVITA', 1),
(4, 4, 1, 1, NULL, 'TI-ARDI', 1),
(4, 4, 2, 1, NULL, 'TI-INTAN', 1),
(4, 4, 3, 1, NULL, 'TI-JULIAN', 1),
(4, 4, 4, 1, NULL, 'TI-DARA', 1),
(4, 4, 5, 1, NULL, 'TI-NOVITA', 1),
(4, 5, 1, 1, NULL, 'TI-RISA', 1),
(4, 5, 2, 1, NULL, 'TI-INTAN', 1),
(4, 5, 3, 1, NULL, 'TI-RONI', 1),
(4, 5, 4, 1, NULL, 'TI-DANAR', 1),
(4, 5, 5, 1, NULL, 'TI-ARIE', 1),
(4, 6, 1, 1, NULL, 'TI-RISA', 1),
(4, 6, 2, 1, NULL, 'TI-INTAN', 1),
(4, 6, 3, 1, NULL, 'TI-RONI', 1),
(4, 6, 4, 1, NULL, 'TI-DANAR', 1),
(4, 6, 5, 1, NULL, 'TI-ARIE', 1),
(4, 7, 2, 1, NULL, 'TI-RATIH', 1),
(4, 7, 3, 1, NULL, 'TI-RONI', 1),
(4, 7, 5, 1, NULL, 'TI-ADIMAS', 1),
(4, 8, 2, 1, NULL, 'TI-RATIH', 1),
(4, 8, 3, 1, NULL, 'TI-RONI', 1),
(4, 8, 5, 1, NULL, 'TI-ADIMAS', 1),
(5, 1, 3, 1, NULL, 'SI-1A-Prak. Log & Alg-AR', 1),
(5, 2, 3, 1, NULL, 'SI-1A-Prak. Log & Alg-AR', 1),
(5, 3, 3, 1, NULL, 'SI-1A-Prak. Log & Alg-AR', 1),
(5, 4, 3, 1, NULL, 'SI-1A-Prak. Log & Alg-AR', 1),
(5, 6, 2, 1, NULL, 'SI-1B-Prak. Log & Alg-Aidina', 1),
(5, 7, 2, 1, NULL, 'SI-1B-Prak. Log & Alg-Aidina', 1),
(5, 8, 1, 1, NULL, 'SI - 2A Prak PW - Teguh', 1),
(5, 8, 2, 1, NULL, 'SI-1B-Prak. Log & Alg-Aidina', 1),
(5, 9, 1, 1, NULL, 'SI - 2A Prak PW - Teguh', 1),
(5, 9, 2, 1, NULL, 'SI-1B-Prak. Log & Alg-Aidina', 1),
(5, 10, 1, 1, NULL, 'SI - 2A Prak PW - Teguh', 1),
(5, 10, 2, 1, NULL, 'SI-1B-Prak. Log & Alg-Aidina', 1),
(5, 11, 1, 1, NULL, 'SI - 2A Prak PW - Teguh', 1),
(5, 11, 2, 1, NULL, 'SI-1B-Prak. Log & Alg-Aidina', 1),
(5, 12, 2, 1, NULL, 'SI-1B-Prak. Log & Alg-Aidina', 1),
(5, 13, 2, 1, NULL, 'SI-1B-Prak. Log & Alg-Aidina', 1),
(7, 1, 5, 1, NULL, 'PGSD-2A-LINA', 1),
(7, 2, 5, 1, NULL, 'PGSD-2A-LINA', 1),
(7, 5, 5, 1, NULL, 'PGSD-2A-LINA', 1),
(7, 6, 1, 1, NULL, 'PGSD - 2C - IKA', 1),
(7, 6, 2, 1, NULL, 'PGSD - 2C - IKA', 1),
(7, 6, 5, 1, NULL, 'PGSD-2A-LINA', 1),
(7, 7, 1, 1, NULL, 'PGSD - 2C - IKA', 1),
(7, 7, 2, 1, NULL, 'PGSD - 2C - IKA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblab`
--

CREATE TABLE `tblab` (
  `idlab` int(11) NOT NULL,
  `lab` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tblab`
--

INSERT INTO `tblab` (`idlab`, `lab`) VALUES
(1, 'F1'),
(2, 'F2'),
(3, 'F3'),
(4, 'G1'),
(5, 'G2'),
(6, 'G5'),
(7, 'L12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ni` varchar(16) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `otoritas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `username`, `password`, `ni`, `nama`, `otoritas`) VALUES
(1, 'admin', 'nqzva', '1', 'Administrator', 1),
(2, 'hax0r', 'e4u4514', '31337', 'hax0r', 1),
(3, 'trianwar', 'gevnajne', '16103020018', 'Anwar Pro', 2),
(4, 'pwn', 'rot13(md5(pwn))', '2343242323423', 'pwn', 2),
(5, 'sans', 'cDJTaHBqPT0=', '2332423423', 'sans', 2),
(6, 'kamu', 'xnzh', '23423', 'kamu', 2),
(7, 'zzz', 'bW1t', '456464', 'zzz', 2),
(10, 'qqq', 'cXFx', '345353', 'qqq', 2),
(11, 'haha', 'unun', 'haha', 'haha', 2),
(12, 'kksdhfk', '123', '1', 'kjsdhk', 2),
(13, 'sdfnmqq', '11', '1', 'sdhfjnme', 2),
(14, 'dddd', '44', '1', 'ddd', 2),
(15, 'xxx', '11', '1', 'xxx', 2),
(17, 'aha', 'bub', '23435', 'oho', 2),
(18, 'trianwarx', 'gevnajnek', '16103020018', 'Muhammad Tri Anwarruddin', 2),
(19, 'tambah', 'gnzonu', '36476', 'tambah', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbwaktu`
--

CREATE TABLE `tbwaktu` (
  `idwaktu` int(11) NOT NULL,
  `waktu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbwaktu`
--

INSERT INTO `tbwaktu` (`idwaktu`, `waktu`) VALUES
(1, '08.00-08.50'),
(2, '08.50-09.40'),
(3, '09.45-10.35'),
(4, '10.35-11.25'),
(5, '12.30-13.20'),
(6, '13.20-14.10'),
(7, '14.15-15.05'),
(8, '15.05-15.55'),
(9, '16.00-16.50'),
(10, '16.50-17.40'),
(11, '18.00-18.50'),
(12, '18.50-19.40'),
(13, '19.45-20.35'),
(14, '20.35-21.25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbhari`
--
ALTER TABLE `tbhari`
  ADD PRIMARY KEY (`idhari`);

--
-- Indexes for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  ADD PRIMARY KEY (`idlab`,`idwaktu`,`idhari`,`iduser`),
  ADD KEY `fk_tblab_has_tbwaktu_tbwaktu1_idx` (`idwaktu`),
  ADD KEY `fk_tblab_has_tbwaktu_tblab1_idx` (`idlab`),
  ADD KEY `fk_tbjadwal_tbhari1_idx` (`idhari`),
  ADD KEY `fk_tbjadwal_tbuser1_idx` (`iduser`);

--
-- Indexes for table `tblab`
--
ALTER TABLE `tblab`
  ADD PRIMARY KEY (`idlab`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tbwaktu`
--
ALTER TABLE `tbwaktu`
  ADD PRIMARY KEY (`idwaktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbhari`
--
ALTER TABLE `tbhari`
  MODIFY `idhari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblab`
--
ALTER TABLE `tblab`
  MODIFY `idlab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbwaktu`
--
ALTER TABLE `tbwaktu`
  MODIFY `idwaktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbjadwal`
--
ALTER TABLE `tbjadwal`
  ADD CONSTRAINT `fk_tbjadwal_tbhari1` FOREIGN KEY (`idhari`) REFERENCES `tbhari` (`idhari`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbjadwal_tbuser1` FOREIGN KEY (`iduser`) REFERENCES `tbuser` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblab_has_tbwaktu_tblab1` FOREIGN KEY (`idlab`) REFERENCES `tblab` (`idlab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblab_has_tbwaktu_tbwaktu1` FOREIGN KEY (`idwaktu`) REFERENCES `tbwaktu` (`idwaktu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
