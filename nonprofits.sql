-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 07:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nonprofitlistingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `nonprofits`
--

CREATE TABLE `nonprofits` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `streetName` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `phone` varchar(10) DEFAULT 'N/A',
  `email` varchar(15) DEFAULT 'N/A',
  `founderFirstName` varchar(100) NOT NULL,
  `founderLastName` varchar(100) NOT NULL,
  `missionStatement` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nonprofits`
--

INSERT INTO `nonprofits` (`id`, `Name`, `streetName`, `state`, `city`, `zipCode`, `phone`, `email`, `founderFirstName`, `founderLastName`, `missionStatement`) VALUES
(1, 'Feeding America', '35 East Wacker Drive, Suite 2000', 'IL', 'Chicago', '60601', '800-771-23', 'N/A', 'John', 'van Hengel', 'In a country that wastes billions of pounds of food each year, it\'s almost shocking that anyone in America goes hungry. Yet every day, there are millions of children and adults who do not get the meals they need to thrive. We work to get nourishing food –'),
(2, 'USA Cares', '11760 Commonwealth Drive Suite 3', 'KY', 'Louisville', '40299 ', '2708724422', 'N/A', 'N/A', 'N/A', 'USA Cares exists to help bear the burdens of service by providing post-9/11 military families with financial and advocacy support in their time of need. Assistance is provided to all branches of service, all components, all ranks while protecting the priv'),
(3, 'CMConnect', '802 Glenbarr Pl', 'KY', 'Louisville', '40243', ' 502536778', 'team@cmconnect.', 'N/A', 'N/A', 'CMConnect exists to connect, serve and advance under-resourced children\'s leaders around the world.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nonprofits`
--
ALTER TABLE `nonprofits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nonprofits`
--
ALTER TABLE `nonprofits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
