-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 07:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restful`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'LG P880 4X HD', 'My first awesome phone!', 336),
(2, 'Google Nexus 4', 'The most awesome phone of 2013!', 299),
(3, 'Samsung Galaxy S4', 'How about no?', 600),
(4, 'Bench Shirt', 'The best shirt!', 29),
(5, 'Lenovo Laptop', 'My business partner.', 399),
(6, 'Samsung Galaxy Tab 10.1', 'Good tablet.', 259),
(7, 'Spalding Watch', 'My sports watch.', 199),
(8, 'Sony Smart Watch', 'The coolest smart watch!', 300),
(9, 'Huawei Y300', 'For testing purposes.', 100),
(10, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', 60),
(11, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', 70),
(12, 'Another product', 'Awesome product!', 555),
(13, 'Wallet', 'You can absolutely use this one!', 799),
(14, 'Amanda Waller Shirt', 'New awesome shirt!', 333),
(15, 'Nike Shoes for Men', 'Nike Shoes', 12999),
(16, 'Bristol Shoes', 'Awesome shoes.', 999),
(17, 'Rolex Watch', 'Luxury watch.', 25000),
(18, 'Amazing Pillow 2.0', 'The best pillow for amazing programmers.', 199),
(25, 'Amazing Pillow 2.0', 'The best pillow for amazing programmers.', 199);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
