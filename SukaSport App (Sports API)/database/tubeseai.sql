-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 02:12 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubeseai`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembeliantiket`
--

CREATE TABLE `pembeliantiket` (
  `kodeBooking` varchar(10) NOT NULL,
  `idTiket` varchar(100) NOT NULL,
  `idUser` int(3) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `buktiBayar` varchar(100) NOT NULL,
  `status1` varchar(50) NOT NULL DEFAULT 'Not Yet Uploaded'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeliantiket`
--

INSERT INTO `pembeliantiket` (`kodeBooking`, `idTiket`, `idUser`, `telepon`, `kelas`, `jumlah`, `harga`, `buktiBayar`, `status1`) VALUES
('553CY015GX', 'OYAUOIU9DM', 2, '097231132', 'Tribunes', 12, '$1470', '11318.jpg', 'Payment Verified'),
('AMYE7CJ83Y', 'LLFXPMV2UA', 3, '097231132', 'Tribunes', 3, '$460', '', 'Not Yet Uploaded'),
('AT9TBTOSP9', 'GY4V99541R', 5, '087712312', 'Festival', 15, '$1860', '', 'Not Yet Uploaded'),
('C1WFHEH4T5', 'F24X3CSXWA', 4, '087712312', 'Festival', 5, '$660', '11320.jpg', 'Payment Verified'),
('F3RX5EKLRY', 'KWKNJ8JXIZ', 4, '087712312', 'Festival', 7, '$900', '11320.jpg', 'Payment Verified'),
('KSDKR54B8C', 'LV86CYB5OJ', 7, '087712312', 'Tribunes', 3, '$390', '11325.jpg', 'Payment Verified'),
('QGU4FRXIMG', 'EIJGB2XYWH', 6, '087712312', 'VIP', 7, '$940', '', 'Not Yet Uploaded'),
('UEHC5W6EDD', 'B2D440KZGL', 2, '087712312', 'VIP', 5, '$700', '', 'Not Yet Uploaded'),
('VWJQGM2LJG', '6ZSFDIJAK4', 2, '087712312', 'VIP', 11, '$1420', '', 'Not Yet Uploaded'),
('WHD088WHKU', '3ZQNA8QTX1', 3, '087712312', 'VIP', 3, '$460', '11320.jpg', 'Payment Verified'),
('XWFKE51LBC', '32F3LT3F5J', 2, '087712312', 'Festival', 6, '$780', '11320.jpg', 'Payment Verified'),
('ZFWD6VGKHC', 'MEXYVC3GRD', 6, '097231132', 'VIP', 1, '$220', '', 'Not Yet Uploaded');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `idTiket` varchar(20) NOT NULL,
  `match1` varchar(100) NOT NULL,
  `stadium` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`idTiket`, `match1`, `stadium`, `alamat`, `tgl`, `jam`) VALUES
('32F3LT3F5J', 'Watford vs Tottenham', 'Vicarage Road', 'Vicarage Road, Watford', '2020-01-18', '12:30:00'),
('3ZQNA8QTX1', 'West Ham vs Brighton', 'London Stadium', 'Marshgate Lane, Stratford, London', '2020-02-01', '15:00:00'),
('6ZSFDIJAK4', 'Burnley vs Arsenal', 'Turf Moor', 'Harry Potts Way, Burnley', '2020-02-01', '15:00:00'),
('B2D440KZGL', 'Crystal Palace vs West Ham', 'Selhurst Park', 'Holmesdale Road, London', '2019-12-26', '15:00:00'),
('EIJGB2XYWH', 'Arsenal vs Liverpool', 'Emirates Stadium', 'Queensland Road, London', '2020-05-02', '14:00:00'),
('F24X3CSXWA', 'Sheffield Utd vs Tottenham', 'Bramall Lane', 'Bramall Lane, Sheffield', '2020-04-04', '14:00:00'),
('GY4V99541R', 'Bournemouth vs Chelsea', 'Vitality Stadium', 'Dean Court, Kings Park, Bournemouth, Dorset', '2020-02-29', '15:00:00'),
('KWKNJ8JXIZ', 'Burnley vs Arsenal', 'Turf Moor', 'Harry Potts Way , Burnley', '2020-02-01', '15:00:00'),
('LLFXPMV2UA', 'Manchester United vs Burnley', 'Old Trafford', 'Sir Matt Busby Way, Manchester', '2020-01-22', '20:15:00'),
('LV86CYB5OJ', 'Crystal Palace vs Southampton', 'Selhurst Park', 'Holmesdale Road , London', '2020-01-21', '19:30:00'),
('MEXYVC3GRD', 'Everton vs Chelsea', 'Goodison Park', 'Goodison Road , Liverpool', '2019-12-07', '12:30:00'),
('OYAUOIU9DM', 'Wolves vs Tottenham', 'Molineux Stadium', 'Waterloo Road, Wolverhampton, West Midlands', '2019-12-15', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `pass`, `email`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com'),
(2, 'Aufar', 'aufar', 'm.aufar12@gmail.com'),
(3, 'Rafi', 'rafi', 'Rafigema46@gmail.com'),
(4, 'Dhila', 'dhila', 'fadhilahamani.fa@gmail.com'),
(5, 'Fuad', 'fuad', 'Mfuadzulfikar@gmail.com'),
(6, 'Oksya', 'oksya', 'oksyaoca981015@gmail.com'),
(7, 'Aufar1', '1', 'm.aufar08@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembeliantiket`
--
ALTER TABLE `pembeliantiket`
  ADD PRIMARY KEY (`kodeBooking`),
  ADD KEY `idTiket` (`idTiket`,`idUser`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`idTiket`),
  ADD KEY `idTiket` (`idTiket`),
  ADD KEY `idTiket_2` (`idTiket`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembeliantiket`
--
ALTER TABLE `pembeliantiket`
  ADD CONSTRAINT `pembeliantiket_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `pembeliantiket_ibfk_2` FOREIGN KEY (`idTiket`) REFERENCES `tiket` (`idTiket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
