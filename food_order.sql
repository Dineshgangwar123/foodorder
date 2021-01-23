-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 01:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` varchar(45) NOT NULL,
  `restaurants_name` varchar(250) NOT NULL,
  `food_name` varchar(250) NOT NULL,
  `food_price` double(10,2) NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `food_id`, `restaurants_name`, `food_name`, `food_price`, `food_image`, `qty`, `total_price`, `order_time`) VALUES
(307, 26, '77', 'Burger Point', 'Tomato Burger ', 90.00, 'img/products/3500.jpg', 2, 180.00, '2021-01-22 23:17:41'),
(308, 26, '82', 'Dominos', 'Double Cheese Pizza', 240.00, 'img/products/pizza-recipe-2.jpg', 1, 240.00, '2021-01-22 23:18:30'),
(315, 26, '78', 'Burger Point', 'Chicken Burger', 200.00, 'img/products/cburger.jpg', 2, 400.00, '2021-01-23 13:00:58'),
(316, 26, '79', 'Burger Point', 'Chicken Burger', 340.00, 'img/products/npizza.jpg', 1, 340.00, '2021-01-23 13:01:00'),
(317, 26, '83', 'Dominos', 'Dough Pizza-Crust', 222.00, 'img/products/Pizza-Dough-Best-Pizza-Crust-Recipe-3-500x500.jpg', 2, 444.00, '2021-01-23 13:01:04'),
(321, 27, '88', 'Hotel Taj', 'Paneer Butter Mashala', 299.00, 'img/products/kadai-paneer-1-500x375.jpg', 1, 299.00, '2021-01-23 14:41:03'),
(322, 27, '86', 'Hotel Taj', 'Matar Paneer', 250.00, 'img/products/Creamy-Restaurant-Style-Matar-Paneer-1-1568x1046.jpg', 1, 250.00, '2021-01-23 14:41:04'),
(323, 27, '80', 'Dominos', 'Chicken Pizza', 400.00, 'img/products/npizzaa.jpg', 1, 400.00, '2021-01-23 14:41:08'),
(324, 27, '78', 'Burger Point', 'Chicken Burger', 200.00, 'img/products/cburger.jpg', 1, 200.00, '2021-01-23 15:02:08'),
(325, 27, '82', 'Dominos', 'Double Cheese Pizza', 240.00, 'img/products/pizza-recipe-2.jpg', 1, 240.00, '2021-01-23 15:03:40'),
(331, 32, '77', 'Burger Point', 'Tomato Burger ', 90.00, 'img/products/3500.jpg', 1, 90.00, '2021-01-23 17:48:30'),
(332, 32, '78', 'Burger Point', 'Chicken Burger', 200.00, 'img/products/cburger.jpg', 1, 200.00, '2021-01-23 17:51:10'),
(333, 32, '86', 'Hotel Taj', 'Matar Paneer', 250.00, 'img/products/Creamy-Restaurant-Style-Matar-Paneer-1-1568x1046.jpg', 1, 250.00, '2021-01-23 18:00:26'),
(334, 32, '85', 'Hotel Taj', 'Bhindi Mashala', 180.00, 'img/products/download.jpg', 1, 180.00, '2021-01-23 18:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(250) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `preferences` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fname`, `username`, `pass`, `role`, `created_at`, `image`, `mobile`, `preferences`) VALUES
(24, 'Burger Point', 'burger@gmail.com', '$2y$10$5LYnkQ2z1AJUFAKgFUfWJehlxD44vLazjUIKiXntTaBFEhpk9SxB6', 'restaurants', '2021-01-22 22:50:03', 'img/products/NHNH2EHT35GN3EJSHZSAABZWAE.jpg', 2147483647, NULL),
(25, 'Dominos', 'Dominos@gmail.com', '$2y$10$gUnuYiXquye58EOLWbj8Be.ihqHvDuCVsJyMPnSgipOz0hDtbDIES', 'restaurants', '2021-01-22 23:08:18', NULL, NULL, NULL),
(26, 'Vishal', 'vishal@gmail.com', '$2y$10$ZAUwB4mixiKrY1ucMmdEk.H7YagbKBDN2IYwy5AxUwUhbk/9IveFm', 'user', '2021-01-22 23:17:13', NULL, NULL, 'Veg'),
(27, 'dinesh', 'Dinesh@gmail.com', '$2y$10$kah8lCYwNetvduzpc8Jxbe5UMNtvnj1p.XJxnd2G2hOYVX0BkHEo6', 'user', '2021-01-23 12:50:34', NULL, NULL, 'Veg'),
(28, 'Hotel Taj', 'taj@gmail.com', '$2y$10$8sMFrQGdXncgOUIfYb48uuP0.OfaS1zdkOIVNnKBX3dduadzHLIvO', 'restaurants', '2021-01-23 13:22:33', NULL, NULL, NULL),
(29, 'dev', 'dev@gmail.com', '$2y$10$uasNAulvNKY0k0TX0yFWjuvNS9BkiE3HwvRGX/GidGErI7o0o5Ryi', 'user', '2021-01-23 15:50:44', NULL, NULL, 'Veg'),
(30, 'jay', 'jay@gmail.com', '$2y$10$w6zWRumsr255MQSOFc8W/u6M1TFGxbJjPKhk/9cjO4kpzgaGZblXy', 'user', '2021-01-23 15:57:45', NULL, NULL, 'Veg'),
(31, 'Hotel chaand', 'chaand@gmail.com', '$2y$10$e8G.uplWsMHZiRVh5CGWteKOhzulICkFPsXsbFrfwK0LJU6wlYfmO', 'restaurants', '2021-01-23 15:58:22', NULL, NULL, NULL),
(32, 'vivek', 'vivek@gmail.com', '$2y$10$TQJAFUzvETM7lHWsKGLnU.T4v7ADhUOYSkidIrhlHl3R72s4.tjCe', 'user', '2021-01-23 16:27:53', 'img/products/NHNH2EHT35GN3EJSHZSAABZWAE.jpg', NULL, 'Non-veg');

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `id` int(11) NOT NULL,
  `restaurants_name` varchar(100) NOT NULL,
  `food_name` varchar(250) NOT NULL,
  `food_price` double(10,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `activate_status` int(11) NOT NULL DEFAULT '1',
  `category` varchar(24) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`id`, `restaurants_name`, `food_name`, `food_price`, `image`, `discription`, `activate_status`, `category`, `added_at`) VALUES
(76, 'Burger Point', 'Burger', 190.00, 'img/products/All-you-can-eat-Burger-King-Japan-fast-food-Japanese-Maximum-Super-One-Pound-Beef-Burger-Whopper-news-top-review.jpg', 'Burger', 1, 'Veg', '2021-01-22 22:59:08'),
(77, 'Burger Point', 'Tomato Burger ', 90.00, 'img/products/3500.jpg', 'Tomato and potato  burger', 1, 'Veg', '2021-01-22 23:00:52'),
(78, 'Burger Point', 'Chicken Burger', 200.00, 'img/products/cburger.jpg', 'Chicken Burger', 1, 'Non-veg', '2021-01-22 23:03:18'),
(79, 'Burger Point', 'Chicken Burger', 340.00, 'img/products/npizza.jpg', 'Chicken Pizza ', 1, 'Non-veg', '2021-01-22 23:04:07'),
(80, 'Dominos', 'Chicken Pizza', 400.00, 'img/products/npizzaa.jpg', 'Treat your taste buds with Double Pepper Barbecue Chicken, Peri-Peri Chicken, Chicken Tikka & Grilled Chicken Rashers', 1, 'Non-veg', '2021-01-22 23:12:12'),
(81, 'Dominos', 'Cheese Pizza', 300.00, 'img/products/pizza-recipe-1-500x500.jpg', 'Cheese Pizza', 1, 'Veg', '2021-01-22 23:12:50'),
(82, 'Dominos', 'Double Cheese Pizza', 240.00, 'img/products/pizza-recipe-2.jpg', 'Double Cheese Pizza ', 1, 'Veg', '2021-01-22 23:13:59'),
(83, 'Dominos', 'Dough Pizza-Crust', 222.00, 'img/products/Pizza-Dough-Best-Pizza-Crust-Recipe-3-500x500.jpg', 'Pizza-Dough-Best-Pizza-Crust', 1, 'Veg', '2021-01-22 23:16:00'),
(84, 'Burger Point', 'Burger Special', 249.00, 'img/products/cburger2.jpg', 'Burger point Special burger', 1, 'Veg', '2021-01-23 13:08:53'),
(85, 'Hotel Taj', 'Bhindi Mashala', 180.00, 'img/products/download.jpg', 'Bhindi Masshala', 1, 'Veg', '2021-01-23 13:27:00'),
(86, 'Hotel Taj', 'Matar Paneer', 250.00, 'img/products/Creamy-Restaurant-Style-Matar-Paneer-1-1568x1046.jpg', 'Matar Paneer', 1, 'Veg', '2021-01-23 13:27:37'),
(87, 'Hotel Taj', 'Kadai Paneer', 270.00, 'img/products/kadai-paneer.jpg', 'Kadai Paneer', 1, 'Veg', '2021-01-23 13:33:11'),
(88, 'Hotel Taj', 'Paneer Butter Mashala', 299.00, 'img/products/kadai-paneer-1-500x375.jpg', 'Paneer Butter Mashala', 1, 'Veg', '2021-01-23 14:33:34'),
(89, 'Hotel Taj', 'Bhindi Bharta', 0.00, 'img/products/photo.jpg', 'Bhindi Bharta', 1, 'Veg', '2021-01-23 18:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `pmode` varchar(45) NOT NULL,
  `food_name` varchar(250) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `food_id` int(11) NOT NULL,
  `restaurants_name` varchar(250) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `pmode`, `food_name`, `amount_paid`, `food_id`, `restaurants_name`, `added_at`) VALUES
(112, 26, 'vishal', 'vishal@gmail.com', '7689034567', 'Ecity bangalore', 'cards', 'Tomato Burger (2)', '180', 77, 'Burger Point', '2021-01-23 13:03:22'),
(113, 26, 'vishal', 'vishal@gmail.com', '7689034567', 'Ecity bangalore', 'cards', 'Double Cheese Pizza(1)', '240', 82, 'Dominos', '2021-01-23 13:03:22'),
(114, 26, 'vishal', 'vishal@gmail.com', '7689034567', 'Ecity bangalore', 'cards', 'Chicken Burger(2)', '400', 78, 'Burger Point', '2021-01-23 13:03:22'),
(115, 26, 'vishal', 'vishal@gmail.com', '7689034567', 'Ecity bangalore', 'cards', 'Chicken Burger(1)', '340', 79, 'Burger Point', '2021-01-23 13:03:22'),
(116, 26, 'vishal', 'vishal@gmail.com', '7689034567', 'Ecity bangalore', 'cards', 'Dough Pizza-Crust(2)', '444', 83, 'Dominos', '2021-01-23 13:03:22'),
(117, 27, 'Dinesh', 'Dinesh@gmail.com', '5657893908', 'rudrapur', 'netbanking', 'Tomato Burger (2)', '180', 77, 'Burger Point', '2021-01-23 13:04:58'),
(118, 27, 'Dinesh', 'Dinesh@gmail.com', '5657893908', 'rudrapur', 'netbanking', 'Chicken Burger(1)', '200', 78, 'Burger Point', '2021-01-23 13:04:58'),
(119, 27, 'Dinesh', 'Dinesh@gmail.com', '5657893908', 'rudrapur', 'netbanking', 'Cheese Pizza(1)', '300', 81, 'Dominos', '2021-01-23 13:04:58'),
(120, 27, 'Dinesh', 'Dinesh@gmail.com', '5657893908', 'rudrapur', 'netbanking', 'Double Cheese Pizza(1)', '240', 82, 'Dominos', '2021-01-23 13:04:58'),
(121, 27, 'Dinesh', 'Dinesh@gmail.com', '5657893908', 'rudrapur', 'netbanking', 'Dough Pizza-Crust(2)', '444', 83, 'Dominos', '2021-01-23 13:04:58'),
(122, 27, 'Dinesh', 'Dinesh@gmail.com', '5657893908', 'rudrapur', 'netbanking', 'Chicken Burger(1)', '340', 79, 'Burger Point', '2021-01-23 13:04:58'),
(123, 27, 'dinesh', 'dinesh@gmail.com', '2345657896', 'Ecity bangalore', 'cod', 'Paneer Butter Mashala(1)', '299', 88, 'Hotel Taj', '2021-01-23 14:41:31'),
(124, 27, 'dinesh', 'dinesh@gmail.com', '2345657896', 'Ecity bangalore', 'cod', 'Matar Paneer(1)', '250', 86, 'Hotel Taj', '2021-01-23 14:41:32'),
(125, 27, 'dinesh', 'dinesh@gmail.com', '2345657896', 'Ecity bangalore', 'cod', 'Chicken Pizza(1)', '400', 80, 'Dominos', '2021-01-23 14:41:32'),
(126, 32, 'vishal', 'vishal@gmail.com', '7676768935', 'Ecity bangalore', 'cod', 'Tomato Burger (1)', '90', 77, 'Burger Point', '2021-01-23 17:43:43'),
(127, 32, 'vishal', 'vishal@gmail.com', '7676768935', 'Ecity bangalore', 'cod', 'Chicken Pizza(2)', '800', 80, 'Dominos', '2021-01-23 17:43:43'),
(128, 32, 'vishal', 'vishal@gmail.com', '7676768935', 'Ecity bangalore', 'cod', 'Chicken Burger(1)', '340', 79, 'Burger Point', '2021-01-23 17:43:43'),
(129, 32, 'vishal', 'vishal@gmail.com', '7676768935', 'Ecity bangalore', 'cod', 'Chicken Burger(1)', '200', 78, 'Burger Point', '2021-01-23 17:43:43'),
(130, 32, 'vivek', 'vivek@gmail.com', '7367689456', 'govind vihar rudrapur', 'cod', 'Tomato Burger (1)', '90', 77, 'Burger Point', '2021-01-23 17:49:26'),
(131, 32, 'vivek', 'vivek@gmail.com', '7878767879', 'rudrapur', 'cards', 'Tomato Burger (1)', '90', 77, 'Burger Point', '2021-01-23 18:01:00'),
(132, 32, 'vivek', 'vivek@gmail.com', '7878767879', 'rudrapur', 'cards', 'Chicken Burger(1)', '200', 78, 'Burger Point', '2021-01-23 18:01:00'),
(133, 32, 'vivek', 'vivek@gmail.com', '7878767879', 'rudrapur', 'cards', 'Matar Paneer(1)', '250', 86, 'Hotel Taj', '2021-01-23 18:01:00'),
(134, 32, 'vivek', 'vivek@gmail.com', '7878767879', 'rudrapur', 'cards', 'Bhindi Mashala(1)', '180', 85, 'Hotel Taj', '2021-01-23 18:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  `image4` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `image`, `image2`, `image3`, `image4`) VALUES
(77, 75, 'img/products/All-you-can-eat-Burger-King-Japan-fast-food-Japanese-Maximum-Super-One-Pound-Beef-Burger-Whopper-news-top-review.jpg', 'img/products/NHNH2EHT35GN3EJSHZSAABZWAE.jpg', 'img/products/', 'img/products/'),
(78, 76, 'img/products/All-you-can-eat-Burger-King-Japan-fast-food-Japanese-Maximum-Super-One-Pound-Beef-Burger-Whopper-news-top-review.jpg', 'img/products/NHNH2EHT35GN3EJSHZSAABZWAE.jpg', 'img/products/', 'img/products/'),
(79, 77, 'img/products/3500.jpg', 'img/products/', 'img/products/', 'img/products/'),
(80, 78, 'img/products/cburger.jpg', 'img/products/', 'img/products/', 'img/products/'),
(81, 79, 'img/products/npizza.jpg', 'img/products/', 'img/products/', 'img/products/'),
(82, 80, 'img/products/npizzaa.jpg', 'img/products/', 'img/products/', 'img/products/'),
(83, 81, 'img/products/pizza-recipe-1-500x500.jpg', 'img/products/', 'img/products/', 'img/products/'),
(84, 82, 'img/products/pizza-recipe-2.jpg', 'img/products/', 'img/products/', 'img/products/'),
(85, 83, 'img/products/Pizza-Dough-Best-Pizza-Crust-Recipe-3-500x500.jpg', 'img/products/', 'img/products/', 'img/products/'),
(86, 84, 'img/products/cburger2.jpg', 'img/products/', 'img/products/', 'img/products/'),
(87, 85, 'img/products/download.jpg', 'img/products/', 'img/products/', 'img/products/'),
(88, 86, 'img/products/Creamy-Restaurant-Style-Matar-Paneer-1-1568x1046.jpg', 'img/products/', 'img/products/', 'img/products/'),
(89, 87, 'img/products/kadai-paneer.jpg', 'img/products/', 'img/products/', 'img/products/'),
(90, 88, 'img/products/kadai-paneer-1-500x375.jpg', 'img/products/', 'img/products/', 'img/products/'),
(91, 89, 'img/products/photo.jpg', 'img/products/', 'img/products/', 'img/products/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
