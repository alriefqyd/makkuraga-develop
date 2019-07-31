-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2019 at 06:38 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

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
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Master Admin', 'Asera'),
(1291, 'Fadhilah', 'fadhilah', '21232f297a57a5a743894a0e4a801fc3', 'Inventory Admin All Area', 'b'),
(1892, 'ita', 'ita', '21232f297a57a5a743894a0e4a801fc3', 'Mekanik Admin All Area', 'c'),
(1893, 'Habibi', 'habibi', '21232f297a57a5a743894a0e4a801fc3', 'Admin All Area', 'Asera'),
(1894, 'Baru', 'suherang', '21232f297a57a5a743894a0e4a801fc3', 'Admin Kodal', 'Asera'),
(1895, 'Dedi Purnomo', 'dedip', '21232f297a57a5a743894a0e4a801fc3', 'Inventory Admin Kodal', 'Asera'),
(1896, 'Rusdi', 'rusdi', '21232f297a57a5a743894a0e4a801fc3', 'Admin Asera', 'Asera'),
(1897, 'Jaya', 'jaya', '21232f297a57a5a743894a0e4a801fc3', 'Admin Asera', 'Asera'),
(1898, 'Afiat', 'afiat', '21232f297a57a5a743894a0e4a801fc3', 'Inventory Admin Asera', 'Asera'),
(1899, '', 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'Master Admin', 'Asera'),
(1900, 'Chairul Walad', 'chairul', '21232f297a57a5a743894a0e4a801fc3', 'User Kodal', 'Kodal'),
(1901, 'Rahmat', 'rahmat', '21232f297a57a5a743894a0e4a801fc3', 'User Asera', 'Asera'),
(1902, 'Hasrianto', 'hasrianto', '21232f297a57a5a743894a0e4a801fc3', 'User All Area', 'Kodal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1903;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
