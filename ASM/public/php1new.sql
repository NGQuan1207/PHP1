-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2024 at 04:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php1new`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `madh` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `iduser` int NOT NULL,
  `nguoidat_ten` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nguoidat_email` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nguoidat_tel` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nguoidat_diachi` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nguoinhan_ten` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nguoinhan_diachi` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nguoinhan_tel` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `total` int NOT NULL,
  `ship` int NOT NULL DEFAULT '0',
  `voucher` int NOT NULL DEFAULT '0',
  `tongthanhtoan` int NOT NULL,
  `pttt` tinyint(1) NOT NULL COMMENT '0: COD; 1: ck; 2: ví điện tử'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `madh`, `iduser`, `nguoidat_ten`, `nguoidat_email`, `nguoidat_tel`, `nguoidat_diachi`, `nguoinhan_ten`, `nguoinhan_diachi`, `nguoinhan_tel`, `total`, `ship`, `voucher`, `tongthanhtoan`, `pttt`) VALUES
(1, 'Zhope11-064753-08102023', 11, 'fsdfsd', 'fsdfdsfds', 'fsdfdsfds', 'fsdfdsfds', '', '', '', 1200, 0, 0, 1200, 1),
(2, 'Zhope12-064936-08102023', 12, 'fdgdgfd', 'gfdgfdg', 'fgdfgfđ', 'gfdgdfgfd', '', '', '', 400, 0, 0, 400, 1),
(3, 'Zhope13-065000-08102023', 13, 'fdgdgfd', 'gfdgfdg', 'fgdfgfđ', 'gfdgdfgfd', '', '', '', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `idpro` int NOT NULL,
  `price` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL,
  `idbill` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `idpro`, `price`, `name`, `img`, `soluong`, `thanhtien`, `idbill`) VALUES
(1, 4, 400, 'Sản phẩm 4', 'sp4.webp', 1, 400, 2);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `stt` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `home`, `stt`) VALUES
(1, 'Trà', 1, 1),
(2, 'Phụ kiện, Quà tặng', 0, 0),
(3, 'Cà phê', 1, 2),
(4, 'Cà phê Việt Nam', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `dacbiet` tinyint(1) NOT NULL DEFAULT '0',
  `view` int NOT NULL DEFAULT '0',
  `bestseller` tinyint(1) NOT NULL DEFAULT '0',
  `iddm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `img`, `price`, `hide`, `dacbiet`, `view`, `bestseller`, `iddm`) VALUES
(2, 'Sản phẩm 2', 'sp2.webp', 200, 1, 0, 235, 0, 1),
(3, 'Sản phẩm 3', 'sp3.webp', 300, 0, 0, 33, 0, 3),
(4, 'Sản phẩm 44', 'Công nghệ hỗ trợ lập trình nhanh.jpg', 4000, 0, 0, 44, 1, 3),
(5, 'Americano Nóng', 'Americano Nóng.webp', 23000, 0, 0, 0, 0, 2),
(6, 'Cappuccino Đá', 'Cappuccino Đá.webp', 50000, 0, 0, 0, 0, 2),
(7, 'Cappuccino Nóng', 'Cappuccino Nóng.webp', 36000, 0, 0, 0, 0, 2),
(8, 'Caramel Macchiato Đá', 'Caramel Macchiato Đá.webp', 45000, 0, 0, 0, 0, 2),
(9, 'Caramel Macchiato Nóng', 'Caramel Macchiato Nóng.webp', 55000, 0, 0, 0, 0, 2),
(10, 'Bạc Sỉu Nóng', 'Bạc Sỉu Nóng.webp', 29000, 0, 0, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ten` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dienthoai` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `ten`, `diachi`, `email`, `dienthoai`, `role`) VALUES
(1, 'hotb', '123', NULL, 'QTSC 9, CVPM QUang Trung', 'hotb2@fe.edu.vn', '012345678', 1),
(2, 'hotb', '123', NULL, NULL, 'hotb2@fe.edu.vn', NULL, 0),
(3, 'HO', '123', NULL, NULL, 'hotb@fpt.edu.vn', NULL, 0),
(4, 'tranbaho', '1234567', NULL, NULL, 'tranbaho@gmail.com', NULL, 0),
(5, 'guest667', '123456', 'dsfsdf', 'fsdfsdf', 'fsdfsdf', 'fsdfsdfds', 0),
(6, 'guest941', '123456', 'dsfsdf', 'fsdfsdf', 'fsdfsdf', 'fsdfsdfds', 0),
(7, 'guest759', '123456', 'tuong', '123 Q8', 'tuong@gmail.com', '0-989078089', 0),
(8, 'guest896', '123456', 'tran', 'quan 8', 'tranbaho@gmail.com', '98070987098', 0),
(9, 'guest661', '123456', 'tuongtuong', 'tuong @', 'tuopng@123', '5435 534534', 0),
(10, 'guest905', '123456', 'tuongtuong', 'tuong @', 'tuopng@123', '5435 534534', 0),
(11, 'guest736', '123456', 'fsdfsd', 'fsdfdsfds', 'fsdfdsfds', 'fsdfdsfds', 0),
(12, 'guest556', '123456', 'fdgdgfd', 'gfdgdfgfd', 'gfdgfdg', 'fgdfgfđ', 0),
(13, 'guest120', '123456', 'fdgdgfd', 'gfdgdfgfd', 'gfdgfdg', 'fgdfgfđ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_bill` (`idbill`),
  ADD KEY `fk_cart_sp` (`idpro`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_dm` (`iddm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `fk_cart_sp` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_dm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
