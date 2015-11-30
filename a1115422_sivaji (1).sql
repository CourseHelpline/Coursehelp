SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `a1115422_sivaji` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `a1115422_sivaji`;

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(5) NOT NULL,
  `graduation` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `degree` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `department` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) NOT NULL,
  `username` varchar(254) NOT NULL,
  `msg` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(3) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fathersname` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mothersname` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dob` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `religion` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pincode` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sslc` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sslcmarks` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hsc` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hscmarks` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(4) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);


ALTER TABLE `course`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
ALTER TABLE `registration`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
