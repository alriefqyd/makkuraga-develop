-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 06:34 PM
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
-- Database: `makkuraga`
--

-- --------------------------------------------------------

--
-- Table structure for table `backlog`
--

CREATE TABLE `backlog` (
  `id_backlog` int(11) NOT NULL,
  `down_date` date NOT NULL,
  `up_date` date NOT NULL,
  `ID` varchar(100) NOT NULL,
  `model` varchar(200) NOT NULL,
  `hours_meter` bigint(100) NOT NULL,
  `indication` varchar(200) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `history` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `reminder_km` bigint(100) NOT NULL,
  `reminder_hours_meter` bigint(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backlog`
--

INSERT INTO `backlog` (`id_backlog`, `down_date`, `up_date`, `ID`, `model`, `hours_meter`, `indication`, `priority`, `status`, `history`, `description`, `reminder_km`, `reminder_hours_meter`, `location`) VALUES
(655, '2019-07-04', '2019-07-09', 'MAN', '8GH', 1, 'Indication', 'P2', 'MN', 'done', '', 190, 190, 'a'),
(656, '0000-00-00', '0000-00-00', 'MAN', '8GH', 1, 'Indication', '', 'MN', 'backlog', '', 21212, 121212, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `user_name`, `password`, `level`, `lokasi`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Master Admin', 'a'),
(1291, 'Mekanik', 'mekanik', '21232f297a57a5a743894a0e4a801fc3', 'mekanik', 'b'),
(1892, 'Administrator', 'administrator', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backlog`
--
ALTER TABLE `backlog`
  ADD PRIMARY KEY (`id_backlog`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backlog`
--
ALTER TABLE `backlog`
  MODIFY `id_backlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1893;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
