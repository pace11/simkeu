-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2020 at 07:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_login`
--

CREATE TABLE `auth_login` (
  `id` varchar(10) NOT NULL,
  `role_login_id` int(2) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_login`
--

INSERT INTO `auth_login` (`id`, `role_login_id`, `name`, `username`, `password`, `last_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
('ADMIN00001', 1, 'Imam', 'imam01', 'UlovazZYajU2bnNWMHNUUGdNSlVaQT09', '2020-09-13 17:56:49', NULL, NULL, NULL),
('ADMIN00002', 2, 'Pace Yunus', 'yunus01', 'RUFtVUVib2VmemNVU2Z3R1BaQ3Nvdz09', '2020-09-12 10:52:28', '2020-09-12 15:42:19', '2020-09-12 16:06:54', NULL),
('ADMIN00003', 2, 'Pace Akbar', 'akbar01', 'b2xpaSsxdHRVc0hQcEx2cm81Z3g5QT09', NULL, '2020-09-12 16:06:34', '2020-09-12 16:06:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(13) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_phone`, `customer_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
('CUSTOMER00001', 'PT. Tirta Abadi', NULL, 'Jl. Raya Sentani', NULL, '2020-08-31 13:59:48', NULL),
('CUSTOMER00002', 'PT. Ryan Pace', NULL, 'Jl. Raya Abepura', NULL, '2020-08-30 12:25:51', NULL),
('CUSTOMER00003', 'PT  PANTANG MUNDUR', '0855100000000', 'Pinggir Jalan Raya', '2020-09-05 04:04:23', '2020-09-05 04:04:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` varchar(50) NOT NULL,
  `auth_login_id` varchar(10) NOT NULL,
  `customer_id` varchar(13) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `reg_id` varchar(10) DEFAULT NULL,
  `invoice_number` varchar(10) DEFAULT NULL,
  `invoice_contract_no` varchar(40) DEFAULT NULL,
  `invoice_record_no` varchar(40) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_date_period_1` date DEFAULT NULL,
  `invoice_date_period_2` date DEFAULT NULL,
  `invoice_note` text DEFAULT NULL,
  `invoice_total_hour` varchar(20) DEFAULT NULL,
  `invoice_price_hour` varchar(20) DEFAULT NULL,
  `invoice_total` bigint(20) DEFAULT NULL,
  `invoice_amount` bigint(20) DEFAULT NULL,
  `invoice_route_from` varchar(20) DEFAULT NULL,
  `invoice_route_to` varchar(20) DEFAULT NULL,
  `invoice_weight` varchar(15) DEFAULT NULL,
  `invoice_period_from` date DEFAULT NULL,
  `invoice_period_to` date DEFAULT NULL,
  `invoice_calculated` text DEFAULT NULL,
  `invoice_vat` bigint(20) DEFAULT NULL,
  `invoice_ppn` bigint(20) DEFAULT NULL,
  `invoice_psc` bigint(20) DEFAULT NULL,
  `invoice_iwjr` bigint(20) DEFAULT NULL,
  `invoice_discount` bigint(20) DEFAULT NULL,
  `invoice_file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `auth_login_id`, `customer_id`, `product_id`, `reg_id`, `invoice_number`, `invoice_contract_no`, `invoice_record_no`, `invoice_date`, `invoice_date_period_1`, `invoice_date_period_2`, `invoice_note`, `invoice_total_hour`, `invoice_price_hour`, `invoice_total`, `invoice_amount`, `invoice_route_from`, `invoice_route_to`, `invoice_weight`, `invoice_period_from`, `invoice_period_to`, `invoice_calculated`, `invoice_vat`, `invoice_ppn`, `invoice_psc`, `invoice_iwjr`, `invoice_discount`, `invoice_file`, `created_at`, `updated_at`, `deleted_at`) VALUES
('CRG-01/INV/SD-SEN/IX/2020', 'ADMIN00001', 'CUSTOMER00001', 'PRODUCT001', NULL, '01', NULL, NULL, '2020-09-04', '2020-09-14', '2020-09-17', 'biaya angkutan kargo', NULL, NULL, 14973045, 15122775, 'sentani', 'wamena', '1.777', NULL, NULL, 'lima belas juta seratus dua puluh dua ribu tujuh ratus tujuh puluh lima rupiah', 149730, NULL, NULL, NULL, NULL, 'file/SEPTEMBER_2020/CRG01INVSDSENIX2020.pdf', '2020-09-05 00:00:05', '2020-09-12 13:08:25', NULL),
('CRG-02/INV/SD-SEN/IX/2020', 'ADMIN00001', 'CUSTOMER00002', 'PRODUCT001', NULL, '02', '0', '0', '2020-09-05', '2020-09-05', '2020-09-06', 'Makanan dan Minuman', '0', '0', 1500000, 1515000, 'sentani', 'mulia', '10', NULL, NULL, 'satu juta lima ratus lima belas ribu rupiah', 15000, NULL, NULL, NULL, 0, 'file/SEPTEMBER_2020/CRG02INVSDSENIX2020.pdf', '2020-09-05 03:54:52', '2020-09-06 17:33:53', NULL),
('CRG-03/INV/SD-SEN/IX/2020', 'ADMIN00001', 'CUSTOMER00001', 'PRODUCT001', NULL, '03', NULL, NULL, '2020-09-05', '2020-09-01', '2020-09-15', NULL, '-', '-', 8500, 8585, 'sentani', 'wamena', '9', NULL, NULL, 'delapan ribu lima ratus delapan puluh lima rupiah', 85, NULL, NULL, NULL, 0, 'file/SEPTEMBER_2020/CRG03INVSDSENIX2020.pdf', '2020-09-05 04:14:00', '2020-09-06 17:34:19', NULL),
('CRG-04/INV/SD-SEN/IX/2020', 'ADMIN00001', 'CUSTOMER00003', 'PRODUCT001', NULL, '04', NULL, NULL, '2020-09-05', '2020-09-01', '2020-09-15', NULL, NULL, NULL, 2200000, 2222000, 'djj', 'soq', '9', NULL, NULL, 'dua juta dua ratus dua puluh dua ribu rupiah', 22000, NULL, NULL, NULL, 0, 'file/SEPTEMBER_2020/CRG04INVSDSENIX2020.pdf', '2020-09-05 04:17:26', '2020-09-08 02:26:45', NULL),
('CRT-01/INV/SD-SEN/IX/2020', 'ADMIN00001', 'CUSTOMER00001', 'PRODUCT002', 'REG0000001', '01', NULL, NULL, '2020-09-05', NULL, NULL, NULL, '3', NULL, 72727273, 80000000, 'jayapura', 'wamena', NULL, NULL, NULL, 'delapan puluh  juta rupiah', NULL, 7272727, NULL, NULL, NULL, 'file/SEPTEMBER_2020/CRT01INVSDSENIX2020.pdf', '2020-09-05 00:03:02', '2020-09-06 17:35:04', NULL),
('CRT-02/INV/SD-SEN/IX/2020', 'ADMIN00001', 'CUSTOMER00003', 'PRODUCT002', 'REG0000001', '02', '01', '12345', '2020-09-06', NULL, NULL, NULL, '8', NULL, 90000000, 99000000, 'sentani', 'manokwari', NULL, NULL, NULL, 'sembilan puluh sembilan juta rupiah', NULL, 9000000, NULL, NULL, NULL, 'file/SEPTEMBER_2020/CRT02INVSDSENIX2020.pdf', '2020-09-05 04:06:54', '2020-09-06 17:34:54', NULL),
('GH-01/INV/GH-STN/IX/2020', 'ADMIN00001', 'CUSTOMER00001', 'PRODUCT003', NULL, '01', NULL, NULL, '2020-09-05', '2020-09-20', '2020-09-20', 'Pelayanan Jasa Ground Handling Smart Cakrawala Aviation PK-SNH', NULL, NULL, 970000, 1067000, NULL, NULL, NULL, NULL, NULL, 'satu juta enam puluh tujuh ribu rupiah', 97000, NULL, NULL, NULL, NULL, 'file/SEPTEMBER_2020/GH01INVGHSTNIX2020.pdf', '2020-09-05 01:40:07', '2020-09-07 07:10:32', NULL),
('TCK-01/INV/SD-SEN/IX/2020', 'ADMIN00001', 'CUSTOMER00001', 'PRODUCT004', NULL, '01', NULL, NULL, '2020-09-06', '2020-09-10', '2020-09-14', 'biaya airface voucher 1 pax', NULL, NULL, 2668182, 3000000, 'sentani', 'mulia', NULL, NULL, NULL, 'tiga juta rupiah', 266818, NULL, 55000, 10000, NULL, 'file/SEPTEMBER_2020/TCK01INVSDSENIX2020.pdf', '2020-09-05 00:08:13', '2020-09-06 17:36:03', NULL),
('TCK-02/INV/SD-SEN/IX/2020', 'ADMIN00001', 'CUSTOMER00003', 'PRODUCT004', NULL, '02', NULL, NULL, '2020-09-09', '2020-09-01', '2020-09-15', '-', '0', '0', 3000000, 3300000, 'djj', 'wmx', NULL, NULL, NULL, 'tiga juta tiga ratus  ribu rupiah', 300000, NULL, 0, 0, NULL, 'file/SEPTEMBER_2020/TCK02INVSDSENIX2020.pdf', '2020-09-08 23:50:36', '2020-09-08 23:50:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(10) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_code` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
('PRODUCT001', 'Kargo', 'CRG', '2020-08-30 14:58:27', '2020-08-30 15:06:47', NULL),
('PRODUCT002', 'Charter', 'CRT', '2020-08-30 14:59:18', '2020-08-30 14:59:18', NULL),
('PRODUCT003', 'Ground Handling', 'GH', '2020-08-30 14:59:33', '2020-08-30 17:30:35', NULL),
('PRODUCT004', 'Ticket', 'TCK', '2020-08-30 14:59:50', '2020-08-30 14:59:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` varchar(10) NOT NULL,
  `reg_name` varchar(30) DEFAULT NULL,
  `reg_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `reg_name`, `reg_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
('REG0000001', 'PK-SMW', 'kode penerbangan', NULL, '2020-09-05 03:11:10', NULL),
('REG0000002', 'PK-CGK', 'pengiriman indonesia', '2020-09-05 10:02:49', '2020-09-05 10:02:49', '2020-09-05 10:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_login`
--

CREATE TABLE `role_login` (
  `id` int(2) NOT NULL,
  `role_login_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_login`
--

INSERT INTO `role_login` (`id`, `role_login_name`) VALUES
(1, 'Manager'),
(2, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_login`
--
ALTER TABLE `auth_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_login_id` (`role_login_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_login_id` (`auth_login_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_login`
--
ALTER TABLE `role_login`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_login`
--
ALTER TABLE `auth_login`
  ADD CONSTRAINT `auth_login_ibfk_1` FOREIGN KEY (`role_login_id`) REFERENCES `role_login` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`auth_login_id`) REFERENCES `auth_login` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `invoices_ibfk_4` FOREIGN KEY (`reg_id`) REFERENCES `reg` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
