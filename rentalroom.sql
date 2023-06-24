-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2023 pada 08.26
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalroom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `book_id` varchar(11) NOT NULL,
  `room_id` varchar(10) NOT NULL,
  `tenant_id` varchar(30) NOT NULL,
  `book_start_date` date NOT NULL,
  `book_end_date` date NOT NULL,
  `book_tr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`book_id`, `room_id`, `tenant_id`, `book_start_date`, `book_end_date`, `book_tr_date`) VALUES
('B01', 'Rd02', 'Emily', '2022-04-17', '2022-12-18', '0000-00-00'),
('B02', 'Rc01', 'Farah Mutiara', '2022-05-17', '2022-12-18', '2022-05-17'),
('B03', 'Rd06', 'Rachel ', '2022-05-17', '2022-12-18', '2022-05-17'),
('B04', 'Rc01', 'Rachel ', '2022-05-18', '2022-12-30', '2022-05-18'),
('B05', 'Re03', 'Hilda Irdanita', '2022-05-18', '2022-11-18', '2022-05-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` varchar(30) NOT NULL,
  `tenant_name` varchar(30) NOT NULL,
  `tenant_address` varchar(30) NOT NULL,
  `tenant_phone` int(20) NOT NULL,
  `zip_code` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `room_label` varchar(30) NOT NULL,
  `month` varchar(20) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `tenant_name`, `tenant_address`, `tenant_phone`, `zip_code`, `date`, `room_label`, `month`, `price`) VALUES
('INV001', 'Farah Mutiara', 'Malang', 0, '08137382873', '2022-05-17', 'Rc01', '6', '1200000'),
('INV002', 'Rachel ', 'Jakarta', 0, '08127382103', '2022-05-18', 'Rc01', '6', '1200000'),
('INV003', 'Hilda Irdanita', 'Surabaya', 0, '0812638283', '2022-05-18', 'Re03', '6', '1400000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `room_id` varchar(30) NOT NULL,
  `room_label` varchar(30) NOT NULL,
  `room_location` varchar(30) NOT NULL,
  `room_window` varchar(50) NOT NULL,
  `room_monthly_price` int(10) NOT NULL,
  `room_availibility` varchar(20) NOT NULL,
  `room_description` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`room_id`, `room_label`, `room_location`, `room_window`, `room_monthly_price`, `room_availibility`, `room_description`) VALUES
('R01', 'Rc01', '1st Floor', 'South', 1200000, 'Available', 'Good Condition'),
('R02', 'Rd02', '1st Floor', 'South', 1200000, 'Available', 'Good Condition'),
('R03', 'Re03', '1st Floor', 'South', 1300000, 'Available', 'Good Condition'),
('R04', 'Rf04', '1st Floor', 'North', 1300000, 'Not Available', 'good condition\r\n'),
('R05', 'Rc05', '2nd floor', 'North', 1400000, 'available', 'Good'),
('R06', 'Rd06', '1st floor', 'South', 1400000, 'Available', 'Good Condition'),
('R07', 'Rg07', '2nd floor', 'South', 1400000, 'Available', 'Good condition');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` varchar(30) NOT NULL,
  `tenant_name` varchar(40) NOT NULL,
  `tenant_address` varchar(200) NOT NULL,
  `tenant_ktp_no` int(20) NOT NULL,
  `tenant_phone` int(20) NOT NULL,
  `tenant_email` varchar(30) NOT NULL,
  `tenant_emergcp` varchar(30) NOT NULL,
  `tenant_emergcp_phone` int(20) NOT NULL,
  `tenant_emergcp_email` varchar(30) NOT NULL,
  `tenant_bankaccount` varchar(20) NOT NULL,
  `tenant_bankaccount_no` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `tenant_name`, `tenant_address`, `tenant_ktp_no`, `tenant_phone`, `tenant_email`, `tenant_emergcp`, `tenant_emergcp_phone`, `tenant_emergcp_email`, `tenant_bankaccount`, `tenant_bankaccount_no`) VALUES
('T01', 'Farah Mutiara', 'Malang', 467814619, 2147483647, 'farah@gmail.com', 'Renata Arikha', 2147483647, 'renata@gmail.com', 'Mandiri', 19749605),
('T02', 'Anna Lee', 'Jakarta', 2147483647, 2147483647, 'anna@gmail.com', 'Jessica Lee', 2147483647, 'jessy@gmail.com', 'BRI', 17402560),
('T03', 'Rachel ', 'Bekasi', 89364941, 2147483647, 'rachel@gmail.com', 'Sekar', 2147483647, 'sekar@gmail.com', 'BCA', 947105410),
('T04', 'Kirana', 'Jakarta', 283196213, 2147483647, 'kirana@gmail.com', 'Fariska', 2147483647, 'fariska@gmail.com', 'BCA', 973619304),
('T05', 'Hilda Irdanita', 'Surabaya', 84207462, 812748274, 'hilda@gmail.com', 'Raisa', 852738294, 'raisa@gmail.com', 'Mandiri', 873291645);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`) VALUES
(2, 'Sekar Aishwara', 'sekaraishwara@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(3, 'Siska Andriani', 'siskandriani@gmail.com', '46d045ff5190f6ea93739da6c0aa19bc', 'user'),
(4, 'Rachel', 'rachel@gmail.com', 'e3251075554389fe91d17a794861d47b', 'admin'),
(5, 'Farah Mutiara', 'farah@gmail.com', '64d905a556cd5aa2cccafe73e5ca1069', 'user'),
(6, 'Hilda', 'hilda@gmail.com', '46d045ff5190f6ea93739da6c0aa19bc', 'user'),
(8, 'Sekar Maharani', 'sekar.maharani@student.president.ac.id', '2f2295b9167476d14fc9d5e2fefaf2d3', 'user'),
(9, 'Rachel Evalyn', 'rachel.evalyn@gmail.com', '2f2295b9167476d14fc9d5e2fefaf2d3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indeks untuk tabel `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
