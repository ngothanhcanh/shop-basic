-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 04, 2023 at 05:30 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `use_id` int NOT NULL,
  `pid` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pid_cart` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `use_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `number` int NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `use_id`, `name`, `email`, `number`, `message`) VALUES
(4, 14, 'canh', 'ngothanhcanh03@gmail.com', 123, 'hang qua dep'),
(5, 14, 'canh', 'ngothanhcanh03@gmail.com', 123, 'hang qua dep'),
(6, 14, 'ngothanhcanh03', 'ngothanhcanh03@gmail.com', 0, 'haha'),
(7, 14, 'ngothanhcanh03', 'ngothanhcanh03@gmail.com', 858116654, 'haha');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `use_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `total_products` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `placed_on` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `use_id`, `name`, `number`, `email`, `method`, `adress`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(3, 14, 'canh', '0858116654', 'ngothanhcanh03@gmail.com', 'credit card', 'flat no. le quy don,,Phan Thiet,7000,,', ', ??o ??en con r???ng (1), ??o kho??c nam (2), ??o doremon (1), ??o doremon cao c???p (3)', '101', '04-Mar-2023', 'pending'),
(4, 14, 'canh', '0858116654', 'ngothanhcanh03@gmail.com', 'paypal', ' le quy don  Phan Thiet Binh Thuan Viet Nam PIN CODE: 7000', ', ??o kho??c nam (3)', '60', '04-Mar-2023', 'pending'),
(5, 14, 'ngothanhcanh03', '0858116654', 'ngothanhcanh03@gmail.com', 'credit card', '170-le quy don--Phan Thiet-Binh Thuan-Viet Nam PIN CODE: 7000', ', ??o doremon (1)', '12', '04-Mar-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_detail` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_detail`, `image`) VALUES
(33, '??o doremon cao c???p', '13', '??o ch???t li???u b???n ch???ng tia uv', 'OIP.jfif'),
(34, '??o ??en con r???ng', '10', '??o ???????c s???n xu???t t??? Vi???t Nam', 'SP7-02-1-2015x2048.png'),
(35, '??o kho??c nam', '20', '??o kho??c nam ?????n t??? ch??u ??u', 'size-ao-khoac-nam-1.jpg'),
(32, '??o doremon', '12', '??o ???????c nh???p kh???u t??? ch??u ??u ch???t li???u m???m ?????p', 'R.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(14, 'canh', 'ngothanhcanh2001@gmail.com', '123', 'user'),
(13, 'ngo thanh canh', 'admin@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `use_id` int NOT NULL,
  `pid` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wishlist` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `use_id`, `pid`, `name`, `price`, `image`) VALUES
(20, 14, 33, '??o doremon cao c???p', '13', 'OIP.jfif'),
(22, 14, 35, '??o kho??c nam', '20', 'size-ao-khoac-nam-1.jpg'),
(23, 14, 32, '??o doremon', '12', 'R.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
