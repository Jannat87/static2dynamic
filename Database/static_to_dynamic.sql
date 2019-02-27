-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 10:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `static_to_dynamic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_add`
--

CREATE TABLE `tb_add` (
  `id` int(11) NOT NULL,
  `top` varchar(255) NOT NULL,
  `left_at` varchar(255) NOT NULL,
  `right_at` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_add`
--

INSERT INTO `tb_add` (`id`, `top`, `left_at`, `right_at`, `post`, `update_at`) VALUES
(1, 'top.jpg', 'left.png', 'r1.jpg', 'p.jpeg', '2019-01-13 12:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `sender_email`, `subject`, `message`, `status`, `deleted_at`, `update_at`) VALUES
(1, 'saiful@mail.com', 'no', 'no message ', 1, 1, '2019-01-19 10:37:06'),
(2, 'saiful@mail.com', 'lot of direction ', 'direction about bangladesh making. how to make it personal property... ', 1, 1, '2019-01-17 14:05:35'),
(3, 'saiful@mail.com', 'lot of direction ', 'direction about bangladesh making. how to make it personal property... ', 1, 1, '2019-01-19 10:37:07'),
(4, 'saiful@mail.com', 'lot of direction ', 'direction about bangladesh making. how to make it personal property... ', 1, 0, '2019-01-19 12:14:41'),
(5, 'saiful@mail.com', 'lot of direction ', 'direction about bangladesh making. how to make it personal property... ', 1, 0, '2019-01-17 14:05:27'),
(6, 'saiful@mail.com', 'lot of direction ', 'direction about bangladesh making. how to make it personal property... ', 1, 0, '2019-01-21 11:07:48'),
(7, 'saiful@mail.com', 'lot of direction ', 'direction about bangladesh making. how to make it personal property... ', 0, 0, '2019-01-17 14:05:27'),
(8, 'islamhossainwork@gmail.com', 'test online message ', 'no body of this message ', 0, 0, '2019-01-17 14:24:09'),
(9, 'islamhossainwork@gmail.com', 'Where is your product..', 'asdfasd fasdf sadf asdf ', 0, 0, '2019-01-19 12:13:42'),
(10, 'soikot@mail.com', 'test email from soikot', 'n/a no commments about this web site... ', 1, 1, '2019-01-19 12:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `menu_title`, `menu_name`, `update_at`) VALUES
(10, 'Mobile', 'mobile', ''),
(11, 'Computer', 'computer', ''),
(12, 'Laptop', 'laptop', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `product_name`, `product_price`, `product_details`, `product_category`, `product_image`, `updated_at`) VALUES
(1, 'Nokia 1100', '2500', 'n/a', '10', '1.jpg', ''),
(2, 'Nokia 1200', '2600', 'n/a', '10', 'sadfadsfadsf.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site`
--

CREATE TABLE `tb_site` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `welcome_head` varchar(255) NOT NULL,
  `welcome_body` text NOT NULL,
  `address` text NOT NULL,
  `link_address` varchar(255) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `copyright` varchar(255) NOT NULL,
  `map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_site`
--

INSERT INTO `tb_site` (`id`, `site_name`, `welcome_head`, `welcome_body`, `address`, `link_address`, `update_at`, `copyright`, `map`) VALUES
(1, 'ChalkBazar', 'Big Offer â€” 50% Discount !!', 'loren ipsum dummy text for web content. example data for slider right content body..66 123456', '127/A, Katasur, Mohammadpur, Dhaka â€” 1207', 'https://goo.gl/maps/ndpy7wDQEdD2', '2019-01-19 12:12:48', '2020', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7640756862515!2d90.35943001445591!3d23.755791094488423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf9c7c652f05%3A0xf2e1996212c19523!2sAims-365!5e0!3m2!1sen!2sbd!4v1547302448817" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `image_url`, `status`, `updated_at`) VALUES
(1, 'slider1.jpg', 1, '2019-01-12 14:27:43'),
(2, 'slider2.jpg', 0, '2019-01-12 14:02:44'),
(7, 'slider3.jpg', 0, '2019-01-12 14:03:27'),
(8, 'slider4.jpg', 0, '2019-01-12 14:23:27'),
(9, 'slider5.jpg', 0, '2019-01-12 14:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_theme`
--

CREATE TABLE `tb_theme` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_theme`
--

INSERT INTO `tb_theme` (`id`, `color`) VALUES
(1, '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `firstname`, `lastname`, `phone`, `address`, `username`, `email`, `password`, `user_image`, `type`) VALUES
(1, 'Masud Khan', 'Patowari', '+889 2587 145896', 'Dhaka, Bangladesh - 1209', 'admin', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'p.png', 'admin'),
(3, 'user', 'one', '09090909', 'n/a', 'userone', 'userone@mail.com', '202cb962ac59075b964b07152d234b70', 'one.jpg', 'production'),
(4, 'user', 'two', '+889 545454', 'n/a', 'usertwo', 'usertwo@mail.com', '202cb962ac59075b964b07152d234b70', '2.jpg', 'manager'),
(5, 'Saiful', 'Islam', '+880 1478 457896', 'nowakhali', 'saipul', 'saipul@fakibaz.com', '202cb962ac59075b964b07152d234b70', '', 'editor'),
(6, '', '', '', '', '', 'asha@mail.com', '202cb962ac59075b964b07152d234b70', '', 'production');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_add`
--
ALTER TABLE `tb_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site`
--
ALTER TABLE `tb_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_theme`
--
ALTER TABLE `tb_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_add`
--
ALTER TABLE `tb_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_site`
--
ALTER TABLE `tb_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_theme`
--
ALTER TABLE `tb_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
