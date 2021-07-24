-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 01:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'abc@abc.com', '2598c50685bc072d4bd6484febf79958'),
(2, 'abc@abc.coma', 'd9e4a6cf91d9f5527dfc8a8b9f57fe48'),
(3, 'qwertyu@qwerty.com', 'd0b5a8756230bce6f8c2a2ce5f2e4d5a'),
(4, 'asdf@asdf.comw', 'c7ddb7d2e5f42e380667bc359bd724ef'),
(5, 'asdf@asdf.comwa', 'e0c04b977d11ee832837de2870ff8508'),
(6, 'panja.tushar15@gmail.com', '4ea783f0d5020b34d26d72fcc91e14cc'),
(7, 'abc@abc.comm', '25cbf5415b91ba5decf116bdbc643a88'),
(8, 'abc@abc.comx', 'd18b148e277f18c29234f766ea85af76'),
(9, 'asdf@asdf.comwasss', 'asdf'),
(10, 'abc@abc.comasdf', 'asdf'),
(11, 'abcd@abcd.combb', 'asdf'),
(12, 'panja.tushar15@gmail.comfdsfsdsfds', 'd6a077558351ec1bea98508867b8fcaf'),
(13, 'qwertyu@qwerty.comxxx', 'b16d36ea21243b8e6a49288d6e8e9c9d'),
(14, 'abc@abc.comxxx', 'aaaa'),
(15, 'asdf@asdf.comwqqqq', 'b1cf8242d78218199d2a2de97234b76c'),
(16, 'abc@abc.comqw11', '9f67046ac47e70d0bd3d06c9407bb7e0'),
(17, 'abc@abc.com1111111', '1186f3e68c52d7358f597a9da9b00d30'),
(18, 'abc@abc.comdddd', 'cee1c5b6031b7d458b07a9365b1c72c9'),
(19, 'panja.tushar15@gmail.comasg', '0cd76702056156983c777d07ecedaeaf'),
(20, 'abcd@abcd.com', '2433abae04d8c6c4870ee7db287790be'),
(21, 'abcwd@abcd.com', '6b7e60bfa088e8abe85273adf9f77c23'),
(22, 'abcwd@abcd.comsasa', '975892c6b52b4001ad3015a11d9f5d31'),
(23, 'qwerf@rwrw.in', 'f50644c5ec2a199b9164e821300a4e34'),
(24, 'John@simon.com', 'b0a5574014102841be5962d537db3540'),
(25, 'qwertyu@qwerty.comfff', '5f14723c9ed74c8d3bdf84b27a0c6784'),
(26, 'abc@abc.com11111222', '5fb44c690666918f7172192864b5382f'),
(27, 'abcwd@abcd.com5tytre', 'dfd7cd9690d9444c3dcafc321d713867'),
(28, 'abc@abc.com90909090', '854c3bd2af4bae4e6b8bf12cfb36ecc8'),
(29, 'qwertyu@qwerty.comkjhgfds', '2761063f10cdd996013159ceb314a035'),
(30, 'main@main.com', '780124241fa849b6f1bbe287dd455eab');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `specialization` text NOT NULL,
  `experience` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `street_address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `pincode` text NOT NULL,
  `country` text NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `gender` text NOT NULL,
  `birthday` text NOT NULL,
  `is_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `user_id`, `username`, `specialization`, `experience`, `phone`, `address`, `street_address`, `city`, `state`, `pincode`, `country`, `lat`, `lng`, `gender`, `birthday`, `is_doctor`) VALUES
(7, 8, 'MaGnetO', '', 0, 2147483647, '', '', '', '', '', '', '', '', 'Male', '11/10/2020', 0),
(8, 15, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0),
(9, 16, 'SimonGhostRiley', '', 0, 2147483647, '', '', '', '', '', '', '', '', 'Male', '11/10/2020', 0),
(10, 17, 'SimonGhostRiley', '', 0, 2147483647, '', '', '', '', '', '', '', '', 'Male', '11/10/2020', 1),
(11, 18, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 1),
(12, 19, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 1),
(13, 20, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0),
(14, 21, 'MaGnetO', '', 0, 2147483647, '', '', '', '', '', '', '', '', 'Male', '2018-07-05', 1),
(15, 22, 'MaGnetO141', '', 0, 2147483647, 'Oxy Homez', 'Loni-Bhopura Rd', 'Ghaziabad', 'Uttar Pradesh', '201005', 'India', '', '', 'Male', '2000-12-15', 1),
(16, 23, 'MaGnetO141', '', 0, 2147483647, 'Oxy Homez', 'Loni-Bhopura Rd', 'Ghaziabad', 'Uttar Pradesh', '201005', 'India', '', '', 'Female', '2018-08-05', 0),
(17, 24, 'John Simon', 'Orthopaedics', 15, 1123454213, 'Hertford House', 'Manchester Square', 'London', 'United Kingdom', 'W1U 3BN', 'England', '', '', 'Male', '1981-07-01', 1),
(18, 25, 'SimonRiley', 'Neurologist', 20, 1123454213, 'Oxy Homez', 'Loni-Bhopura Rd', 'Ghaziabad', 'Uttar Pradesh', '201005', 'India', '', '', 'Male', '1972-07-10', 1),
(19, 26, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0),
(20, 27, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0),
(21, 28, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0),
(22, 29, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0),
(23, 30, 'Simon Riley', 'undefined', 0, 98765432, 'Oxy', 'Orange Rd', 'Nagpur', 'Maharashtra', '100986', 'India', '', '', 'Male', '1982-07-12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_data`
--
ALTER TABLE `users_data`
  ADD CONSTRAINT `users_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
