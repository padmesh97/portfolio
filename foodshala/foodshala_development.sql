-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 04:07 AM
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
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `type` tinytext NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `contact` tinytext NOT NULL,
  `preference` tinytext NOT NULL,
  `cust_id` varchar(70) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`type`, `name`, `email`, `password`, `contact`, `preference`, `cust_id`, `timestamp`) VALUES
('customer', 'john', 'john@gmail.com', '$2y$10$maKp./j7Nl603kCDxwnExuhQsy6pIMZujTRa2xHA7N7Mmwk/hLZvK', '9621452056', 'non_veg', 'am9obkBnbWFpbC5jb20=', '2020-06-10 11:29:05'),
('customer', 'bella', 'bella@gmail.com', '$2y$10$admy3yhhx0.I5Uw54SlHoOylzUjQTOsGslCgkxCxGpsot1BJhukzu', '9520155425', 'veg', 'YmVsbGFAZ21haWwuY29t', '2020-06-10 12:10:33'),
('customer', 'Ajay kumar', 'ajay@yahoo.com', '$2y$10$HEehaEZ/K.mA7mmid4U3J.4uZuMkI.BsOIJSUqkB7Vr5Gv8KNMeeK', '9655256320', 'non_veg', 'YWpheUB5YWhvby5jb20=', '2020-06-10 13:40:50'),
('customer', 'alex', 'alex@gmail.com', '$2y$10$DGh6TD68GbSEXNGUXXpMlO1U29jUSMi7py6aQI8yVyZ1iO5GrmjYW', '9841256320', 'veg', 'YWxleEBnbWFpbC5jb20=', '2020-06-10 11:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `rest_id` text NOT NULL,
  `item` text NOT NULL,
  `price` int(5) NOT NULL,
  `category` tinytext NOT NULL,
  `type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `rest_id`, `item`, `price`, `category`, `type`) VALUES
(1, 'bGl6YUBnbWFpbC5jb20=', 'kadhai paneer', 65, 'full_course', 'veg'),
(3, 'aGFycnlAZ21haWwuY29t', 'kadhai paneer', 150, 'full_course', 'veg'),
(4, 'aGFycnlAZ21haWwuY29t', 'choco lava cake', 85, 'dessert', 'veg'),
(5, 'aGFycnlAZ21haWwuY29t', 'butter chicken', 200, 'full_course', 'non_veg'),
(6, 'aGFycnlAZ21haWwuY29t', 'malai kofta', 200, 'full_course', 'veg'),
(7, 'bGl6YUBnbWFpbC5jb20=', 'mocktail', 200, 'drink', 'veg'),
(8, 'bGl6YUBnbWFpbC5jb20=', 'mutton curry', 450, 'full_course', 'non_veg'),
(9, 'bGl6YUBnbWFpbC5jb20=', 'ice cream (strawberry)', 100, 'dessert', 'veg'),
(10, 'aGFycnlAZ21haWwuY29t', 'juice', 250, 'drink', 'veg'),
(11, 'bGl6YUBnbWFpbC5jb20=', 'matar paneer', 250, 'full_course', 'veg'),
(12, 'aGFyaUBnbWFpbC5jb20=', 'kadhai paneer - quarter', 100, 'full_course', 'veg'),
(13, 'aGFyaUBnbWFpbC5jb20=', 'kadhai paneer - full', 350, 'full_course', 'veg'),
(14, 'aGFyaUBnbWFpbC5jb20=', 'lemonade', 50, 'drink', 'veg'),
(15, 'aGFycnlAZ21haWwuY29t', 'paneer butter masala - half', 80, 'full_course', 'veg'),
(16, 'bGl6YUBnbWFpbC5jb20=', 'malai kofta', 200, 'starter', 'veg'),
(17, 'aGFyaUBnbWFpbC5jb20=', 'mutton do pyaza', 450, 'full_course', 'non_veg'),
(18, 'dmVua2F0QGdtYWlsLmNvbQ==', 'masala dosa', 100, 'full_course', 'veg'),
(19, 'dmVua2F0QGdtYWlsLmNvbQ==', 'chicken dosa', 175, 'full_course', 'non_veg'),
(20, 'dmVua2F0QGdtYWlsLmNvbQ==', 'rawa dosa', 400, 'full_course', 'veg'),
(21, 'dmVua2F0QGdtYWlsLmNvbQ==', 'coconut shake', 150, 'drink', 'veg'),
(22, 'dmVua2F0QGdtYWlsLmNvbQ==', 'masala shake', 40, 'drink', 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(16) NOT NULL,
  `cust_id` text NOT NULL,
  `items` longtext NOT NULL,
  `rest_id` text NOT NULL,
  `address` longtext NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `items`, `rest_id`, `address`, `amount`, `timestamp`) VALUES
('3b876ce48fed93ee', 'YWxleEBnbWFpbC5jb20=', 'eyJiV0Z6WVd4aElHUnZjMkU9IjoyLCJZMjlqYjI1MWRDQnphR0ZyWlE9PSI6MX0=', 'dmVua2F0QGdtYWlsLmNvbQ==', 'bWFsYWFwdXJhbSBlYXN0LGRhdmUgc3RyZWV0LGJlbmdhbHVydQ==', 350, '2020-06-15 01:55:05'),
('5eb2ea7c88c84e0a', 'am9obkBnbWFpbC5jb20=', 'eyJZMmhwWTJ0bGJpQmtiM05oIjoyLCJjbUYzWVNCa2IzTmgiOjEsImJXRnpZV3hoSUhOb1lXdGwiOjEsIlkyOWpiMjUxZENCemFHRnJaUT09IjoxfQ==', 'dmVua2F0QGdtYWlsLmNvbQ==', 'bWFsYWFwdXJhbSBlYXN0LGZsYXQgMTUsYmVuZ2FsdXJ1', 940, '2020-06-15 02:02:19'),
('a8b82769789c5916', 'YWxleEBnbWFpbC5jb20=', 'eyJiR1Z0YjI1aFpHVT0iOjUsImEyRmthR0ZwSUhCaGJtVmxjaUF0SUdaMWJHdz0iOjQsImEyRmthR0ZwSUhCaGJtVmxjaUF0SUhGMVlYSjBaWEk9IjozfQ==', 'aGFyaUBnbWFpbC5jb20=', 'YXNob2sgbmFnYXIsZmxhdCAyMCxlYXN0IGRlbGhpLTExMDA5Ng==', 1950, '2020-06-13 15:16:57'),
('b5c6265ece5d261b', 'YWpheUB5YWhvby5jb20=', 'eyJiWFYwZEc5dUlHTjFjbko1IjozLCJiV0ZzWVdrZ2EyOW1kR0U9IjoxLCJhMkZrYUdGcElIQmhibVZsY2c9PSI6MX0=', 'bGl6YUBnbWFpbC5jb20=', 'c2VjdG9yIDE1LE5vaWRh', 1615, '2020-06-14 11:11:46'),
('d47bb9629914131e', 'YWpheUB5YWhvby5jb20=', 'eyJhMkZrYUdGcElIQmhibVZsY2lBdElIRjFZWEowWlhJPSI6NiwiYkdWdGIyNWhaR1U9Ijo0fQ==', 'aGFyaUBnbWFpbC5jb20=', 'c2VjdG9yIDE1LE5vaWRh', 800, '2020-06-14 05:53:39'),
('f8a71495f2549b2e', 'am9obkBnbWFpbC5jb20=', 'eyJiR1Z0YjI1aFpHVT0iOjEsImEyRmthR0ZwSUhCaGJtVmxjaUF0SUhGMVlYSjBaWEk9IjoxfQ==', 'aGFyaUBnbWFpbC5jb20=', 'c2VjdG9yIDYyLE5vaWRh', 150, '2020-06-13 18:13:20'),
('feee7bac705c1ce5', 'YWxleEBnbWFpbC5jb20=', 'eyJZblYwZEdWeUlHTm9hV05yWlc0PSI6MSwiYTJGa2FHRnBJSEJoYm1WbGNnPT0iOjEsImJXRnNZV2tnYTI5bWRHRT0iOjEsImNHRnVaV1Z5SUdKMWRIUmxjaUJ0WVhOaGJHRWdMU0JvWVd4bSI6MX0=', 'aGFycnlAZ21haWwuY29t', 'aW5kaWFuIG9pbCBhcGFydG1lbnQsc2VjdG9yIDYyLG5vaWRh', 630, '2020-06-14 16:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_info`
--

CREATE TABLE `restaurant_info` (
  `type` tinytext NOT NULL,
  `restaurant_name` text NOT NULL,
  `owner_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `contact` bigint(10) NOT NULL,
  `city` tinytext NOT NULL,
  `area` text NOT NULL,
  `rest_id` varchar(70) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_info`
--

INSERT INTO `restaurant_info` (`type`, `restaurant_name`, `owner_name`, `email`, `password`, `contact`, `city`, `area`, `rest_id`, `timestamp`) VALUES
('restaurant', 'punjabi dhaba', 'hari kumar', 'hari@gmail.com', '$2y$10$pU5y89ndfNaDbNpPzvqJ.ujrXvsnyDyDfoiMlE6Ik8mnwMQzuPM2W', 9856231595, 'delhi', 'rohini,east', 'aGFyaUBnbWFpbC5jb20=', '2020-06-12 06:33:06'),
('restaurant', 'amritsari food', 'harry', 'harry@gmail.com', '$2y$10$tdLZaO/e4bJ8O8msAHar0ePMrdiRsVqczfleH3bZoIJb2jDmlBA0W', 9214563256, 'delhi', 'sector 51', 'aGFycnlAZ21haWwuY29t', '2020-06-10 13:21:25'),
('restaurant', 'pind baluchi', 'liza', 'liza@gmail.com', '$2y$10$a.lFNeVP7.XdDNqbES2UouEvgysQiMCsOvWjmDJVydxqYtiZ2Um/y', 9654532562, 'mumbai', 'borivali,worli', 'bGl6YUBnbWFpbC5jb20=', '2020-06-10 13:39:20'),
('restaurant', 'dosa point', 'venkat d\'souza', 'venkat@gmail.com', '$2y$10$OfHXtAEtCehmjNUC1ZnUD.WiNbdFoTCvcxzK7j6MMbUWkLEOWj.Ey', 9856984265, 'bengaluru', 'next street,south bengaluru', 'dmVua2F0QGdtYWlsLmNvbQ==', '2020-06-15 01:34:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  ADD PRIMARY KEY (`rest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
