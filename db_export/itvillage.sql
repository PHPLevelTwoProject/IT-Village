-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 09:51 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itvillage`
--

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` tinyint(4) NOT NULL,
  `result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `result`) VALUES
(0, 'Загуба'),
(1, 'Победа');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `score_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `is_win` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`score_id`, `user_id`, `score`, `date_created`, `date_deleted`, `is_win`) VALUES
(14, 47, 320, '2021-04-04', NULL, 1),
(15, 47, 50, '2021-04-04', NULL, 1),
(16, 47, 500, '2021-04-04', NULL, 1),
(17, 47, 500, '2021-04-04', NULL, 1),
(18, 47, 70, '2021-04-04', NULL, 0),
(19, 47, 65, '2021-04-04', NULL, 0),
(20, 47, 50, '2021-04-04', NULL, 1),
(21, 47, 35, '2021-04-04', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `wins_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `date_created`, `date_deleted`, `wins_count`) VALUES
(46, 'kris', 'fc65de856b04190cfb3dbe1a88d58c518c7e32a9f5e2feb33daacb0e0bcfd94e9d2d2167a67ad8ad161437831a88f1addfc38fcd7cddb2498db99b9e49f3c374', '0000-00-00', NULL, 0),
(47, 'toshko', 'b7f165504d7f860c89b3c27c088475d038c05c626fe3bb80382a27e4e2924cf28b3d35569d849f07a9eb8b6572f907ba71665b952ac93970a56c84aefb29231d', '0000-00-00', NULL, 6),
(53, 'secure', 'be06e444e0fa7efa418537b0aec35557c5e732935517d9cd58160bee54fc41c6eb006bf303b33f462c3a0a39fc404beffbd899c937cbb6ae9f21225407725590', '2021-04-01', NULL, 0),
(58, 'penka', 'd10badc1d3a3b545000a153f3f7ad80e5570a85e3df29cce69f87cf3d7e2a0d4d4d977b5f324b7724db538ba8594fa1e764e07ed8effa704e495692e253e3c32', '2021-04-04', NULL, 0),
(59, 'penkuca', '4b23779fab02db74fcd1e21f79299606d85bb68466be92d696f04249465b72c85b6e8472cf2ab8bf74c488b08dccc356e03fa3744552eac30a972d2eecc2e577', '2021-04-04', NULL, 0),
(60, 'zaici16', 'e388535b0a07186fa221ee3e38988ec2fcddf402071e8e161a51f4c2107b154d72d99bd21b4f10c4aac083494a0950f327e9d6ed0178e16726a75c0c02b37d96', '2021-04-04', NULL, 0),
(61, 'demo', '$2y$10$8qDPTUN4gPruQKipNoJMtOSEbeCJC.v56sZvKY60WTrxZ4Fxc2/5.', '2021-04-06', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `is_win` (`is_win`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`is_win`) REFERENCES `results` (`result_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
