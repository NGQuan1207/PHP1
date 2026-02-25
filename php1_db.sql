-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2026 at 09:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `country` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `country`) VALUES
(1, 'Toyota', 'Japan'),
(2, 'Honda', 'Japan'),
(3, 'BMW', 'Germany'),
(4, 'Mercedes-Benz', 'Germany'),
(5, 'Hyundai', 'South Korea'),
(6, 'Kia', 'South Korea'),
(7, 'Ford', 'USA'),
(8, 'VinFast', 'Vietnam');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `year` int(11) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `ngay_them` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `brand_id`, `type_id`, `price`, `year`, `color`, `description`, `image_url`, `ngay_them`) VALUES
(1, 'Toyota Vios', 1, 1, 570000000.00, 2023, 'Trắng', 'Xe sedan tiết kiệm nhiên liệu, phù hợp gia đình', 'public/layout/img/toyotavious.png', '2026-01-27 12:04:36'),
(2, 'Toyota Camry', 1, 1, 1295000000.00, 2023, 'Đen', 'Sedan cao cấp với động cơ mạnh mẽ', 'public/layout/img/toyotacampry2023.png', '2026-01-27 12:04:36'),
(3, 'Toyota Fortuner', 1, 2, 1350000000.00, 2023, 'Bạc', 'SUV 7 chỗ mạnh mẽ, phù hợp đi xa', 'public/layout/img/toyotafortuner2023.png', '2026-01-27 12:04:36'),
(4, 'Toyota Innova', 1, 4, 780000000.00, 2022, 'Xám', 'MPV gia đình rộng rãi và tiện nghi', 'public/layout/img/toyotainnova2022.webp', '2026-01-27 12:04:36'),
(5, 'Honda Civic', 2, 1, 950000000.00, 2023, 'Đỏ', 'Sedan thể thao với thiết kế hiện đại', 'public/layout/img/hondacivic2023.png', '2026-01-27 12:04:36'),
(6, 'Honda City', 2, 1, 609000000.00, 2023, 'Trắng', 'Sedan hạng B tiết kiệm và thông minh', 'public/layout/img/hondacity2023.png', '2026-01-27 12:04:36'),
(7, 'Honda CR-V', 2, 2, 1200000000.00, 2022, 'Đen', 'SUV 5 chỗ với công nghệ hiện đại', 'public/layout/img/hondacrv2023.png', '2026-01-27 12:04:36'),
(8, 'BMW 320i', 3, 1, 1899000000.00, 2023, 'Trắng', 'Sedan hạng sang với hiệu suất cao', 'public/layout/img/bmw320i.png', '2026-01-27 12:04:36'),
(9, 'BMW X3', 3, 2, 2100000000.00, 2022, 'Xanh', 'SUV hạng sang với nội thất cao cấp', 'public/layout/img/bmwx32022.png', '2026-01-27 12:04:36'),
(10, 'Hyundai Tucson', 6, 2, 820000000.00, 2023, 'Trắng', 'SUV gia đình với thiết kế hiện đại', 'public/layout/img/hyundaitucson2023.png', '2026-01-27 12:04:36'),
(11, 'Hyundai Accent', 6, 1, 499000000.00, 2022, 'Bạc', 'Sedan hạng B giá hợp lý', 'public/layout/img/HyundaiAccent2023.png', '2026-01-27 12:04:36'),
(12, 'Kia Seltos', 7, 6, 799000000.00, 2023, 'Cam', 'Crossover compact năng động', 'public/layout/img/kiaseltos2023.png', '2026-01-27 12:04:36'),
(13, 'Kia Morning', 7, 3, 369000000.00, 2022, 'Vàng', 'Hatchback nhỏ gọn cho đô thị', 'public/layout/img/kiamorning2022.png', '2026-01-27 12:04:36'),
(14, 'Ford Ranger', 8, 5, 1359000000.00, 2023, 'Cam', 'Pickup mạnh mẽ và đa dụng', 'public/layout/img/fordranger2023.png', '2026-01-27 12:04:36'),
(15, 'Ford Territory', 8, 2, 899000000.00, 2023, 'Xám', 'SUV 7 chỗ với công nghệ thông minh', 'public/layout/img/fordterritory2023.png', '2026-01-27 12:04:36'),
(16, 'VinFast Fadil', 8, 3, 400000000.00, 2022, 'Trắng', 'Hatchback Việt Nam chất lượng cao', 'public/layout/img/vinfastfadil2022.png', '2026-01-27 12:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `car_types`
--

CREATE TABLE `car_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_types`
--

INSERT INTO `car_types` (`type_id`, `type_name`, `img`) VALUES
(1, 'Sedan', 'public/layout/img/SUVimg.webp'),
(2, 'SUV', 'public/layout/img/SUVimg.webp'),
(3, 'Hatchback', 'public/layout/img/SUVimg.webp'),
(4, 'MPV', 'public/layout/img/SUVimg.webp'),
(5, 'Pickup', 'public/layout/img/SUVimg.webp'),
(6, 'Crossover', 'public/layout/img/SUVimg.webp'),
(7, 'SPORT', 'public/layout/img/SUVimg.webp');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `total_price` decimal(15,2) NOT NULL,
  `payment_method` enum('Tiền mặt','Vay ngân hàng','Trả góp') DEFAULT 'Tiền mặt',
  `down_payment` decimal(15,2) DEFAULT 0.00,
  `loan_months` int(11) DEFAULT 0,
  `status` enum('Đang xử lý','Hoàn thành','Đã hủy') DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `car_id`, `order_date`, `total_price`, `payment_method`, `down_payment`, `loan_months`, `status`) VALUES
(1, 1, 1, '2026-01-27 11:34:36', 570000000.00, 'Tiền mặt', 570000000.00, 0, 'Hoàn thành'),
(2, 2, 3, '2026-01-27 11:34:36', 1350000000.00, 'Vay ngân hàng', 300000000.00, 60, 'Đang xử lý'),
(3, 3, 5, '2026-01-27 11:34:36', 950000000.00, 'Trả góp', 200000000.00, 36, 'Hoàn thành'),
(4, 4, 8, '2026-01-27 11:34:36', 1899000000.00, 'Vay ngân hàng', 500000000.00, 72, 'Đang xử lý'),
(5, 5, 12, '2026-01-27 11:34:36', 799000000.00, 'Tiền mặt', 799000000.00, 0, 'Hoàn thành');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `phone`, `address`, `created_at`) VALUES
(1, 'Nguyễn Văn An', 'nguyenvanan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0901234567', '123 Đường Lê Lợi, Quận 1, TP.HCM', '2026-01-27 04:34:36'),
(2, 'Trần Thị Bình', 'tranthibinh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0907654321', '456 Đường Nguyễn Huệ, Quận 1, TP.HCM', '2026-01-27 04:34:36'),
(3, 'Lê Văn Cường', 'levancuong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0912345678', '789 Đường Hàn Thuyên, Hai Châu, Đà Nẵng', '2026-01-27 04:34:36'),
(4, 'Phạm Thị Dung', 'phamthidung@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0913456789', '321 Đường Trần Hưng Đạo, Ba Đình, Hà Nội', '2026-01-27 04:34:36'),
(5, 'Hoàng Văn Em', 'hoangvanem@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0914567890', '654 Đường Võ Văn Tần, Quận 3, TP.HCM', '2026-01-27 04:34:36'),
(6, 'Admin User', 'admin@mqauto.com', '0192023a7bbd73250516f069df18b500', '0999999999', 'MQAuto Headquarters', '2026-01-27 04:34:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `car_types`
--
ALTER TABLE `car_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `car_types` (`type_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
