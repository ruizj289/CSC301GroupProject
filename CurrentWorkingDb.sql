-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 12:52 AM
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
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `nonprofitID` int(11) NOT NULL,
  `amount` float NOT NULL,
  `dateOfTransaction` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `userID`, `nonprofitID`, `amount`, `dateOfTransaction`) VALUES
(1, 1, 1, 97.9, '2020-04-29'),
(2, 1, 1, 97.9, '2020-04-29'),
(3, 1, 1, 897.9, '2020-04-29'),
(4, 1, 1, 89.89, '2020-04-29');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `userType`) VALUES
(1, 'Juan', 'Ruiz', 'juanr26690@gmail.com', '$2y$10$R38hjrrCztkF1FLkMw0Sz.wSeR/m1oFCU5sCtDvfnZEwaRyFtvw2.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nonprofitID` (`nonprofitID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `nonprofitID_2` (`nonprofitID`);

--
-- Indexes for table `nonprofits`
--
ALTER TABLE `nonprofits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nonprofits`
--
ALTER TABLE `nonprofits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`nonprofitID`) REFERENCES `nonprofits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
