-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 05:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_techbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `joining_date` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `f_name`, `l_name`, `username`, `password`, `email`, `phone`, `joining_date`, `gender`, `role`, `address`, `image`) VALUES
(5, 'Farjum', 'Haider', 'FarjumHaider', 'A123#', 'yean13@gmail.com', 168544000, '1996-4-7', 'Male', 'Admin', '91/1 Dhanmondi Dhaka', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(200) NOT NULL,
  `brand_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'ASUS'),
(4, 'Macbook'),
(5, 'Apple'),
(6, 'Samsung'),
(7, 'Canon'),
(8, 'lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quality` int(11) NOT NULL DEFAULT 1,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `customer_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `product_title`, `ip_address`, `quality`, `unit_price`, `total_price`, `customer_id`) VALUES
(2, 101, 'Apple Watch Series 6', '192.168.0.1', 1, 56000, 56000, '1'),
(3, 102, 'iPhone XS', '192.168.2.0', 1, 72000, 72000, '2'),
(5, 103, 'Del Monitor', '192.168.2.4', 1, 16000, 16000, '3');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(7, 'Computer'),
(19, 'Laptop'),
(21, 'Mobiles'),
(6, 'TV');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `rating` varchar(15) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `phone`, `address`, `rating`, `comment`) VALUES
(1, 'Rayhan', 'Kobir', 'rayhan', 'rayhankobir793@gmail.com', '123', '01722333312', 'Nazipur,Naogaon,Rajshahi', 'bad', 'Behavior is not so good'),
(2, 'Taj Ahmed', 'Hridoy', 'taj', 'taj@gmail.com', '123', '01722333312', 'Rjshahi,Dhaka,Bangladesh', '', ''),
(3, 'Hridory ', 'Khan', 'hridoy', 'hridoy@gmail.com', '123', '01722333312', 'Rampura,Dhaka,Bangladesh', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(12) NOT NULL,
  `avilability` varchar(11) NOT NULL,
  `working_hours` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`first_name`, `last_name`, `username`, `email`, `password`, `avilability`, `working_hours`) VALUES
('Rayhan', 'Kobir', 'rayhan', 'rayhankobir793@gmail.com', '123', 'Yes', ''),
('Nahid', 'Hasan', 'nahid', 'nahidhasannibir121370@gmail.com', '123', 'Yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `ecustomer`
--

CREATE TABLE `ecustomer` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ecustomer`
--

INSERT INTO `ecustomer` (`id`, `ip_address`, `name`, `email`, `password`, `country`, `city`, `contact`, `user_address`, `image`, `role`) VALUES
(9, '1', 'ISRAFIL HOSSAIN', 'israfilhossain166091@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'BGD', 'DHAKA', '01843566251', 'BANGLADESH, 11', 'profile-icon.png', 'guest'),
(14, '1', ' HOSSAIN', 'israfilhossain166091@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'BGD', 'DHAKA', '01843566251', 'BANGLADESH, 11', 'profile-icon.png', 'guest'),
(15, '1', 'fahimmmmm', 'israfilhossain166091@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'BGD', 'DHAKA', '01843566251', 'BANGLADESH, 11', 'profile-icon.png', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `text`) VALUES
(1, 'forhad.fahim826@gmail.com', 'bguihn'),
(2, 'forhad.fahim826@gmail.com', 'iugygdiugeEFEWFGWFG'),
(3, '18-37192-1@student.aiub.edu', 'my name is forhad'),
(4, 'forhad.fahim826@gmail.com', 'this is forhad fahim'),
(5, 'forhad.fahim826@gmail.com', 'tsyeeeeeeee'),
(6, 'forhad.fahim826@gmail.com', '44444erty5y'),
(7, 'forhad.fahim826@gmail.com', 'this is me\r\n'),
(8, '18-37192-1@student.aiub.edu', 'key');

-- --------------------------------------------------------

--
-- Table structure for table `eorders`
--

CREATE TABLE `eorders` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` int(15) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eorders`
--

INSERT INTO `eorders` (`id`, `pro_name`, `quantity`, `price`, `address`, `phone`, `status`) VALUES
(2, 'mobile', 11, 1200001, 'nk', 124767867, 'pending'),
(3, 'radio', 12, 12000, 'dhaka', 124767867, 'pending'),
(5, 'tab', 15, 1200001, 'nk', 124767867, 'pending'),
(6, 'radio', 12, 12000, 'dhaka', 124767867, 'pending'),
(7, 'laptop', 1, 55000, 'ctg', 12475686, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `received_date` varchar(50) NOT NULL,
  `ongoing_date` varchar(50) NOT NULL,
  `delivered_date` varchar(30) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `ammount` varchar(20) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `picked` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `status`, `received_date`, `ongoing_date`, `delivered_date`, `pro_id`, `pro_name`, `ammount`, `cart_id`, `payment`, `picked`) VALUES
(1, 'deliverd', '08/17/2021 03:48:24 pm', '08/17/2021 04:00:45 pm', '08/17/2021 04:02:23 pm', 101, 'Apple Watch Series 6', '56000', 2, '', 'rayhankobir793@gmail.com'),
(2, 'received', '08/17/2021 03:49:11 pm', '', '', 102, 'iPhone XS', '72000', 3, 'Done', 'nahidhasannibir121370@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pickedorder`
--

CREATE TABLE `pickedorder` (
  `id` int(11) NOT NULL,
  `deliveryman` varchar(60) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pickedorder`
--

INSERT INTO `pickedorder` (`id`, `deliveryman`, `order_id`, `address`) VALUES
(9, 'rayhankobir793@gmail.com', '1', 'Nazipur,Naogaon,Rajshahi'),
(10, 'nahidhasannibir121370@gmail.com', '2', 'Rjshahi,Dhaka,Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `c_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `description` text NOT NULL,
  `store_date` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `c_id`, `price`, `quantity`, `description`, `store_date`, `image`) VALUES
(15, 'mobil', 21, 52856, 555, 'gtrsjhr6', '2006-2-18', 'storage/product_images/611bcab7abbde.png'),
(16, 'fahim', 6, 528, 55, 'bdfg', '2007-6-17', 'storage/product_images/611bcb43bb0ab.png');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(10) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `salary` int(50) NOT NULL,
  `paid` int(50) NOT NULL,
  `due` int(50) NOT NULL,
  `payment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `f_name`, `l_name`, `username`, `salary`, `paid`, `due`, `payment_date`) VALUES
(1, 'farjum', 'haider', 'far123', 2000, 2000, 0, '1992-2-2'),
(6, 'QQQ11', 'sasa', 'asasasasa', 10000, 2110, 7890, '1990-1-2'),
(7, 'QQQ11', 'sasa', 'asasasasa', 10000, 9012, 988, '1991-3-2'),
(8, 'aaa', 'rahman', 'asasasasa', 10000, 2000, 8000, '1991-3-2'),
(9, 'BBBBB11', 'asasa', 'as33aas', 10000, 1160, 8840, '1992-3-1'),
(10, 'jamal', 'Hossain', 'aaaa22', 10000, 3000, 7000, '2000-4-5'),
(11, 'GGGGsas', 'asas', 'sasa2', 10000, 4000, 6000, '2000-3-2'),
(12, 'jobbarssa', 'rahman', 'asas12', 3000, 2000, 1000, '1998-1-2'),
(13, 'jamal', 'Hossain', 'aaaa22', 4000, 4000, 0, '1995-1-1'),
(14, 'jobbarssa', 'rahman', 'asas12', 3000, 3000, 0, '1997-1-3'),
(15, 'QQQ11', 'sasa', 'asasasasa', 10000, 10000, 0, '1999-2-1'),
(16, 'jamal', 'Hossain', 'aaaa22', 4000, 2000, 2000, '1990-1-2'),
(17, 'jobbarssa', 'rahman', 'asas12', 3000, 200, 2800, '1998-2-2'),
(18, 'jobbarssa', 'rahman', 'asas12', 3000, 3000, 0, '2000-1-1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `joining_date` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `salary` int(50) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `username`, `password`, `email`, `phone`, `joining_date`, `gender`, `role`, `salary`, `address`, `image`) VALUES
(13, 'tamim', 'Hossain', 'tamim123', 'sad#12', 'tamim@gmail.com', 186654, '1992-3-3', 'Male', 'Employee', 10000, 'Dhaka', 'storage/user_images/610e80085b819.jpg'),
(19, 'sasa', 'sasa', 'asass', 'a#11s', 'aa12@gmail.com', 9281212, '1994-1-2', 'Male', 'Employee', 10000, 'Dhaka', 'storage/user_images/610ec6ef4b136.jpg'),
(32, 'Fahimaa', 'rahman', 'aa123', 'aA12#', 'ad22@gmail.com', 11827, '1997-5-7', 'Male', 'Employee', 10000, 'dhaka', 'storage/user_images/610ec1c989da3.jpg'),
(33, 'ddfdf', 'rahman', 'dfdff', 'A12#as', 'admi11n@gmail.com', 11111, '1994-2-2', 'Male', 'Employee', 10000, 'Dhaka', 'storage/user_images/610ec1f230bf5.jpg'),
(34, 'Fahim', 'rahman', 'as22asasa', 'aaA#122', 'adssan@gmail.com', 28171, '1993-2-2', 'Male', 'Employee', 10000, 'aaaa', 'storage/user_images/610ec5dd058b0.jpg'),
(35, 'M/s', '&amp;Furniture', 'fahim', '12345#', 'forhad.fahim826@gmail.com', 1687195797, '1992-2-2', 'Male', 'Employee', 100, 'jamiderhat, rasulpur, begumgonj ,noakhali', 'storage/user_images/611bc764d6295.png'),
(36, 'M/s', '&amp;Furniture', 'fahimh', '12345#', 'forhad.fahim826@gmail.com', 1687195797, '1992-2-17', 'Male', 'Employee', 858329, 'jamiderhat, rasulpur, begumgonj ,noakhali', 'storage/user_images/611bc7da2ecdd.png'),
(37, 'M/s', '&amp;Furniture', 'karim', '565455#', 'forhad.fahim826@gmail.com', 1687195797, '1991-1-16', 'Male', 'Delivery man', 100, 'jamiderhat, rasulpur, begumgonj ,noakhali', 'storage/user_images/611bc80836049.png'),
(38, 'forhad', 'mahmud', 'forhadfahim', '12345#', 'forhad.fahim826@gmail.com', 2723723, '1993-2-20', 'Male', 'Delivery man', 234, 'jamiderhat, rasulpur, begumgonj ,noakhali', 'storage/user_images/611bcdbb258af.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`password`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecustomer`
--
ALTER TABLE `ecustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eorders`
--
ALTER TABLE `eorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `pickedorder`
--
ALTER TABLE `pickedorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_2` (`name`),
  ADD KEY `fk_products_categories` (`c_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ecustomer`
--
ALTER TABLE `ecustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eorders`
--
ALTER TABLE `eorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pickedorder`
--
ALTER TABLE `pickedorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`c_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
