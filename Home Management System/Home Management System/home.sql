-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 07:42 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `rent` int(5) NOT NULL,
  `elecBill` int(5) NOT NULL,
  `waterBill` int(5) NOT NULL,
  `utility` int(5) NOT NULL,
  `penalty` int(5) NOT NULL,
  `mealBill` int(5) NOT NULL,
  `currBalance` int(10) NOT NULL,
  `totalBill` int(5) NOT NULL,
  `ownerName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `rent`, `elecBill`, `waterBill`, `utility`, `penalty`, `mealBill`, `currBalance`, `totalBill`, `ownerName`) VALUES
(7, 'pantho', 18000, 1500, 975, 1000, 0, 0, 1000, 20475, 'abc'),
(8, 'Akash', 20000, 1000, 1000, 500, 0, 0, 0, 22500, 'abc'),
(9, 'hemel', 10000, 500, 500, 500, 0, 0, 500, 11000, 'xyz'),
(10, 'arefin', 10000, 500, 500, 500, 0, 0, 100, 11400, 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`, `type`) VALUES
(1, '1', '1', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `caretaker`
--

CREATE TABLE `caretaker` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `type` varchar(8) NOT NULL,
  `picture` varchar(350) NOT NULL,
  `ownerName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caretaker`
--

INSERT INTO `caretaker` (`id`, `name`, `pass`, `address`, `phone`, `nid`, `date`, `gender`, `type`, `picture`, `ownerName`) VALUES
(5, '12', '12', 'jkt', '122555555', '018555454545', '12-10-1988', 'male', 'CareTake', '', 'abc'),
(6, 'm', '123', '123', '01258875544', '4545154415', '9-12-1985', 'male', 'CareTake', '', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `complainbox`
--

CREATE TABLE `complainbox` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `complain` varchar(300) NOT NULL,
  `ownerName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complainbox`
--

INSERT INTO `complainbox` (`id`, `name`, `complain`, `ownerName`) VALUES
(3, 'pantho', 'I have no Complain', 'abc'),
(4, 'Akash', 'I have a complain', 'abc'),
(5, 'hemel', 'Contact me ', 'xyz'),
(6, 'arefin', '', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `ownerName` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `pass`, `type`, `ownerName`, `phone`) VALUES
(4, '1', '1', 'Admin', '', ''),
(47, 'abc', '123', 'Owner', '', '01792207540'),
(48, 'xyz', 'xyz', 'Owner', '', '01665622522'),
(49, 'pantho', '123', 'Renter', 'abc', '01728161900'),
(50, 'Akash', '123', 'Renter', 'abc', '12255122222'),
(51, '12', '12', 'CareTaker', 'abc', '122555555'),
(52, 'hemel', '123', 'Renter', 'xyz', '0151585775'),
(53, 'arefin', '123', 'Renter', 'xyz', '0158586577'),
(54, 'm', '123', 'CareTaker', 'xyz', '01258875544'),
(55, 'own', 'own', 'Owner', '', '01789981');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `date` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `picture` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `name`, `pass`, `address`, `phone`, `nid`, `date`, `email`, `gender`, `type`, `picture`) VALUES
(20, 'abc', '123', 'Dhaka', '01792207540', '123456789', '26-09-1997', 'abc@gmail.com', 'male', 'Owner', ''),
(21, 'xyz', 'xyz', 'Barishal', '01665622522', '9874554455441', '26-02-1995', 'xyz@gmail.com', 'female', 'Owner', ''),
(22, 'own', 'own', 'Barishal', '01789981', '555555555555', '19-12-1990', 'own@gmail.com', 'female', 'Owner', '');

-- --------------------------------------------------------

--
-- Table structure for table `ownerrequest`
--

CREATE TABLE `ownerrequest` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `address` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `type` varchar(10) NOT NULL,
  `picture` varchar(350) NOT NULL,
  `ownerName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`id`, `name`, `pass`, `address`, `phone`, `nid`, `date`, `email`, `gender`, `type`, `picture`, `ownerName`) VALUES
(15, 'pantho', '123', '123', '01728161900', '44552115555', '26-10-1999', '', 'male', 'Renter', '', 'abc'),
(16, 'Akash', '123', 'dhaka', '12255122222', '22222222222', '26-02-1999', 'akash@gmail.com', 'male', 'Renter', '', 'abc'),
(17, 'hemel', '123', 'dhaka', '0151585775', '6455454545', '26-10-1999', '', 'male', 'Renter', '', 'xyz'),
(18, 'arefin', '123', 'dhaka', '0158586577', '548455415454', '12-12-1997', 'arefin@gmail.com', 'male', 'Renter', '', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `tolet`
--

CREATE TABLE `tolet` (
  `id` int(11) NOT NULL,
  `number` varchar(10) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `freeFrom` varchar(20) NOT NULL,
  `rent` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `ownerName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tolet`
--

INSERT INTO `tolet` (`id`, `number`, `floor`, `freeFrom`, `rent`, `type`, `address`, `contact`, `ownerName`) VALUES
(8, '34', '5th', 'November', '30000', 'Bachelors', 'Nikunjo 2,Dhaka', '01515686770', 'abc'),
(9, '19', '3rd', 'November', '15000', 'Family', 'Dhaka', '1785507924', 'xyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caretaker`
--
ALTER TABLE `caretaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complainbox`
--
ALTER TABLE `complainbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownerrequest`
--
ALTER TABLE `ownerrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tolet`
--
ALTER TABLE `tolet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `caretaker`
--
ALTER TABLE `caretaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complainbox`
--
ALTER TABLE `complainbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ownerrequest`
--
ALTER TABLE `ownerrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `renter`
--
ALTER TABLE `renter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tolet`
--
ALTER TABLE `tolet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
