-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 12:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_img_path` longtext DEFAULT NULL,
  `brand_name` varchar(512) DEFAULT NULL,
  `brand_description` longtext DEFAULT NULL,
  `status` varchar(11) DEFAULT '1',
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_img_path`, `brand_name`, `brand_description`, `status`, `created_on`) VALUES
(1, NULL, 'brand 1', 'test brand desc', '1', '2023-02-04 05:24:05'),
(2, NULL, 'brand 2', 'test brand desc1', '1', '2023-02-04 05:24:05'),
(3, NULL, 'brand 3', 'test desc', '1', '2023-02-07 02:45:48'),
(7, 'assets/images/brands/2023_02_07_04_26_12.jpg', 'this is test brand', 'this is test brand 2', '1', '2023-02-07 04:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(512) DEFAULT NULL,
  `customer_phone` varchar(512) DEFAULT NULL,
  `cnic` varchar(264) DEFAULT NULL,
  `sale_id` varchar(512) DEFAULT NULL,
  `status` varchar(11) DEFAULT '1',
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_phone`, `cnic`, `sale_id`, `status`, `created_on`) VALUES
(3, 'abc1', 'abc3', 'abc2', '5', '1', '2023-02-15 01:19:09'),
(4, 'dsfsdf', '213213', '3123123', '6', '1', '2023-02-15 01:30:58'),
(5, 'c1', '123456', '0-0-0-0-00-0', '8', '1', '2023-02-16 00:30:51'),
(6, 'customer1', '16541641', '8499466', '9', '1', '2023-02-16 00:35:12'),
(7, 'cust1', '18', '17', '11', '1', '2023-02-16 02:27:32'),
(8, 'cust1', '87978', '31321', '12', '1', '2023-02-16 03:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `guarantor`
--

CREATE TABLE `guarantor` (
  `id` int(11) NOT NULL,
  `guarantor_name` varchar(512) DEFAULT NULL,
  `guarantor_phone` varchar(512) DEFAULT NULL,
  `guarantor_cnic` varchar(264) DEFAULT NULL,
  `sale_id` varchar(512) DEFAULT NULL,
  `status` varchar(11) DEFAULT '1',
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guarantor`
--

INSERT INTO `guarantor` (`id`, `guarantor_name`, `guarantor_phone`, `guarantor_cnic`, `sale_id`, `status`, `created_on`) VALUES
(5, 'xyz1', 'xyz3', 'xyz2', '5', '1', '2023-02-15 01:19:09'),
(6, 'ffff1', 'fff3', 'ffff2', '5', '1', '2023-02-15 01:19:09'),
(7, 'sadas', '312312', '3123123', '6', '1', '2023-02-15 01:30:58'),
(8, 'dvsdfsd', '3213123', '12312312312', '6', '1', '2023-02-15 01:30:58'),
(9, 'g1', '2-2-2-2', '1-1-1-1-1', '8', '1', '2023-02-16 00:30:51'),
(10, 'g2', '4-4-4-4-4', '3-3-3-3', '8', '1', '2023-02-16 00:30:51'),
(11, 'g1', '163541', '45646', '9', '1', '2023-02-16 00:35:12'),
(12, 'g2', '132131', '415634', '9', '1', '2023-02-16 00:35:12'),
(13, 'gua1', '20', '19', '11', '1', '2023-02-16 02:27:32'),
(14, 'gua2', '22', '21', '11', '1', '2023-02-16 02:27:32'),
(15, 'gua1', '32131', '1321', '12', '1', '2023-02-16 03:29:49'),
(16, 'gua2', '0000', '111111', '12', '1', '2023-02-16 03:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `installment`
--

CREATE TABLE `installment` (
  `id` int(11) NOT NULL,
  `sale_id` varchar(512) DEFAULT NULL,
  `sequence` varchar(64) DEFAULT NULL,
  `month` date DEFAULT NULL,
  `status` varchar(11) DEFAULT '0' COMMENT '0=unpaid 1=paid',
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `installment`
--

INSERT INTO `installment` (`id`, `sale_id`, `sequence`, `month`, `status`, `created_on`) VALUES
(13, '12', '1', '2023-02-01', '0', '2023-02-16 03:29:49'),
(14, '12', '2', '2023-02-24', '0', '2023-02-16 03:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_img_path` longtext DEFAULT NULL,
  `product_name` longtext DEFAULT NULL,
  `product_description` longtext DEFAULT NULL,
  `product_type` varchar(512) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `brand_id` varchar(64) DEFAULT NULL,
  `status` varchar(11) DEFAULT '1',
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_img_path`, `product_name`, `product_description`, `product_type`, `quantity`, `brand_id`, `status`, `created_on`) VALUES
(3, NULL, 'IPHONE', 'this is iphone X', '1', 2, '2', '1', '2023-02-07 03:44:45'),
(4, NULL, 'i5', 'this is pc', '2', 5, '3', '1', '2023-02-07 03:45:40'),
(6, NULL, 'data', 'data desc', '1', NULL, '2', '1', '2023-02-07 04:06:59'),
(9, 'assets/images/products/2023_02_07_04_16_43.jpg', 'abcd', 'abcdefgh', '2', NULL, '2', '1', '2023-02-07 04:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `product_type_title` varchar(256) DEFAULT NULL,
  `status` varchar(11) DEFAULT '1',
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `product_type_title`, `status`, `created_on`) VALUES
(1, 'Mobile', '1', '2023-02-07 03:35:59'),
(2, 'Computer', '1', '2023-02-07 03:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `product_id` varchar(256) DEFAULT NULL,
  `brand_id` varchar(256) DEFAULT NULL,
  `product_quantity` int(255) DEFAULT NULL,
  `per_item_price` int(255) DEFAULT NULL,
  `total_price` int(255) DEFAULT NULL,
  `purchased_on` datetime DEFAULT NULL,
  `status` varchar(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `product_id`, `brand_id`, `product_quantity`, `per_item_price`, `total_price`, `purchased_on`, `status`) VALUES
(1, '9', '2', 100, 60, 6000, '2023-02-08 02:37:43', '1'),
(2, '4', '3', 4, 100, 400, '2023-02-08 02:50:15', '1'),
(3, '3', '2', 5, 1000, 5000, '2023-02-08 03:24:33', '1'),
(4, '4', '3', 4, 400, 1600, '2023-02-08 03:25:01', '1'),
(5, '9', '2', 100, 60, 6000, '2023-02-08 02:37:43', '1'),
(6, '4', '3', 4, 100, 400, '2023-02-08 02:50:15', '1'),
(7, '3', '2', 5, 1000, 5000, '2023-02-08 03:24:33', '1'),
(8, '4', '3', 4, 400, 1600, '2023-02-08 03:25:01', '1'),
(9, '9', '2', 100, 60, 6000, '2023-02-08 02:37:43', '1'),
(10, '4', '3', 4, 100, 400, '2023-02-08 02:50:15', '1'),
(11, '3', '2', 5, 1000, 5000, '2023-02-08 03:24:33', '1'),
(12, '4', '3', 4, 400, 1600, '2023-02-08 03:25:01', '1'),
(13, '9', '2', 100, 60, 6000, '2023-02-08 02:37:43', '1'),
(14, '4', '3', 4, 100, 400, '2023-02-08 02:50:15', '1'),
(15, '3', '2', 5, 1000, 5000, '2023-01-13 03:24:33', '1'),
(16, '4', '3', 4, 400, 1600, '2023-04-01 03:25:01', '1'),
(18, '4', '3', 5, 5000, 25000, '2023-01-06 02:24:01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `product_id` varchar(256) DEFAULT NULL,
  `brand_id` varchar(512) DEFAULT NULL,
  `quantity` varchar(256) DEFAULT NULL,
  `per_item_price` int(255) DEFAULT NULL,
  `total_price` int(255) DEFAULT NULL,
  `sale_type` varchar(11) DEFAULT NULL,
  `advance` int(255) DEFAULT NULL,
  `remaining_balance` int(255) DEFAULT NULL,
  `no_of_installments` int(255) DEFAULT NULL,
  `single_installment` int(255) DEFAULT NULL,
  `last_installment_month` date DEFAULT NULL,
  `status` varchar(11) DEFAULT '1',
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `product_id`, `brand_id`, `quantity`, `per_item_price`, `total_price`, `sale_type`, `advance`, `remaining_balance`, `no_of_installments`, `single_installment`, `last_installment_month`, `status`, `created_on`) VALUES
(10, '4', '3', '1', 100, 100, 'cash', NULL, NULL, NULL, NULL, NULL, '1', '2023-02-13 02:23:18'),
(12, '3', '2', '2', 1000, 2000, 'installment', 1000, 1000, 2, 500, '2023-04-16', '1', '2023-02-16 03:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@example.com', '$2y$10$yHcm/Li1wdpN0XUYm198u.kzxGRmiNDLENlsYysGRRJAiKHxFfFuO'),
(2, 'admin2@example.com', '$2y$10$c3GJz2cow7AKPZYmuntsDuCc1o1bA7lFY8BJ3F/dTs7jhx3sQKP4u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guarantor`
--
ALTER TABLE `guarantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment`
--
ALTER TABLE `installment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guarantor`
--
ALTER TABLE `guarantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `installment`
--
ALTER TABLE `installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
