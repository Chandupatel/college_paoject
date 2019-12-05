-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 12:54 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(10) NOT NULL,
  `brand_name` text NOT NULL,
  `bra_cat` int(20) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `brand_name`, `bra_cat`, `status`) VALUES
(2, 'Lava', 8, ''),
(3, 'Samsung', 8, ''),
(4, 'Oppo', 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pr_id` int(11) NOT NULL,
  `prd_name` text NOT NULL,
  `cart_unit` int(11) NOT NULL,
  `prd_price` int(11) NOT NULL,
  `prd_t_prie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`pr_id`, `prd_name`, `cart_unit`, `prd_price`, `prd_t_prie`) VALUES
(1, 'Lava V1', 1, 10000, 10000),
(9, 'Oppo A37', 1, 9000, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `Cat_id` int(20) NOT NULL,
  `Parent_cat` int(20) NOT NULL,
  `Catagory` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`Cat_id`, `Parent_cat`, `Catagory`, `status`) VALUES
(2, 0, 'Electronic', ''),
(3, 0, 'Book', ''),
(6, 0, 'fation', ''),
(8, 2, 'Mobile', ''),
(9, 2, 'Fan', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `product_name` tinytext NOT NULL,
  `product_stock` int(10) NOT NULL,
  `product_price` double NOT NULL,
  `total_price` double NOT NULL,
  `add_date` date NOT NULL,
  `prod_states` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `brand_id`, `cat_id`, `product_name`, `product_stock`, `product_price`, `total_price`, `add_date`, `prod_states`) VALUES
(1, 2, 8, 'Lava V1', 2, 10000, 30000, '2018-06-29', NULL),
(9, 4, 8, 'Oppo A37', 3, 9000, 45000, '2018-06-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `prid` int(20) NOT NULL,
  `prdname` text NOT NULL,
  `unit` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `total_pric` int(20) NOT NULL,
  `co_name` text NOT NULL,
  `comobil` text NOT NULL,
  `coemail` text NOT NULL,
  `home_address` text NOT NULL,
  `distic` text NOT NULL,
  `state` text NOT NULL,
  `pincode` int(20) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`prid`, `prdname`, `unit`, `price`, `total_pric`, `co_name`, `comobil`, `coemail`, `home_address`, `distic`, `state`, `pincode`, `order_date`) VALUES
(9, 'Oppo A37', 1, 9000, 9000, 'Nirmal', '8890343865', 'nirmalpatel853@gmail.com', '144/udaipur', 'udaipur', 'rajasthan', 313001, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` date NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(1, 'Chandrakant', 'Chandrakant101112@gmail.com', 'chandu', 'Admin', '2018-06-20', '0000-00-00', 'I am a admin'),
(2, 'kalpesh', 'kpatel12127694@gmail.com', 'kalpesh', 'Other', '0000-00-00', '0000-00-00', ''),
(3, 'nirmal Patel', 'nirmalpatel853@gmail.com', 'nirmal', 'Other', '0000-00-00', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`(20));

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `prd_name` (`prd_name`(20));

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`Cat_id`),
  ADD UNIQUE KEY `Catagory` (`Catagory`(25));

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `product_name` (`product_name`(75)),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `Cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `catagory` (`Cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
