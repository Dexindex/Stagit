-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 09:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stagit`
--

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'John Doe', 'john.doe@example.com', '123-456-7890', '12345678'),
(2, 'Jane Smith', 'jane.smith@example.com', '987-654-3210', 'qwertyuiop'),
(8, 'Oussama', 'aff144@example.com', '0605040803', '$2y$10$XRPBLBhZhHOup5NAxRc8Iu0Znqgz/T1Aob1n44t4S0vhN92vKpKVu');

-- --------------------------------------------------------

--
-- Table structure for table `trainee`
--

CREATE TABLE `trainee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dateJoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `supervisorId` int(11) DEFAULT NULL,
  `nextevaluationDate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainee`
--

INSERT INTO `trainee` (`id`, `name`, `dateJoin`, `email`, `status`, `supervisorId`, `nextevaluationDate`) VALUES
(1, 'Alice Johnson', '2023-07-25 16:17:23', 'alice.johnson@example.com', 'Leave', 8, '2024-08-15'),
(2, 'Bob Anderson', '2023-07-25 16:17:23', 'bob.anderson@example.com', 'Active', 1, '2023-08-18'),
(3, 'Eva Williams', '2023-07-25 16:17:23', 'eva.williams@example.com', 'Active', 2, '2023-08-20'),
(4, 'John Smith', '2023-07-25 16:53:04', 'john.smith@example.com', 'Active', 8, '2023-08-25'),
(6, 'Michael Brown', '2023-07-25 16:53:04', 'michael.brown@example.com', 'Active', 8, '2024-01-30'),
(7, 'Sophia Davis', '2023-07-25 16:53:04', 'sophia.davis@example.com', 'Active', 8, '2023-09-02'),
(9, 'Olivia White', '2023-07-25 16:53:04', 'olivia.white@example.com', 'Active', 8, '2023-09-08'),
(10, 'James Martin', '2023-07-25 16:53:04', 'james.martin@example.com', 'Active', 8, '2023-09-10'),
(12, 'Igor Pavlov', '2023-07-25 17:47:04', 'IgPav2021@blan.net', 'Complet', NULL, '2024-02-02'),
(13, 'Ava Garcia', '2023-07-25 17:50:13', 'ava.garcia@example.com', 'Leave', 8, '2024-06-13'),
(14, 'Mouaade Berrada Ifriqi', '2023-07-25 18:04:29', 'gjndgsdogg44g@gm.vc', 'Complet', 8, '2024-06-14'),
(15, 'Lionel Messi', '2023-07-25 18:05:49', 'Lio159goat@gmail.com', 'Complet', 8, '2023-07-25'),
(16, 'Abdelilah Alaoui', '2023-07-25 18:25:41', 'abdelilah.alaoui@example.com', 'Active', 8, '2023-07-26'),
(17, 'Hassan Amiri', '2023-07-25 18:25:41', 'hassan.amiri@example.com', 'Active', 8, '2023-07-26'),
(18, 'Fatiha Benali', '2023-07-25 18:25:41', 'fatiha.benali@example.com', 'Active', 8, '2023-07-26'),
(19, 'Mohammed El Khattabi', '2023-07-25 18:25:41', 'mohammed.elkhattabi@example.com', 'Active', 8, '2023-07-26'),
(20, 'Amina Berrada', '2023-07-25 18:25:41', 'amina.berrada@example.com', 'Active', 8, '2023-07-26'),
(21, 'Youssef Choukri', '2023-07-25 18:25:41', 'youssef.choukri@example.com', 'Active', 8, '2023-07-26'),
(22, 'Loubna Daoudi', '2023-07-25 18:25:41', 'loubna.daoudi@example.com', 'Active', 8, '2023-07-26'),
(23, 'Karim El Hamdi', '2023-07-25 18:25:41', 'karim.elhamdi@example.com', 'Active', 8, '2023-07-26'),
(24, 'Sanae Fassi', '2023-07-25 18:25:41', 'sanae.fassi@example.com', 'Active', 8, '2023-07-26'),
(25, 'Ahmed Ghanem', '2023-07-25 18:25:41', 'ahmed.ghanem@example.com', 'Active', 8, '2023-07-26'),
(26, 'Rachida Haddi', '2023-07-25 18:25:41', 'rachida.haddi@example.com', 'Active', 8, '2023-07-26'),
(27, 'Jamal Idrissi', '2023-07-25 18:25:41', 'jamal.idrissi@example.com', 'Active', 8, '2023-07-26'),
(28, 'Nadia Jaber', '2023-07-25 18:25:41', 'nadia.jaber@example.com', 'Active', 8, '2023-07-26'),
(29, 'Khalid Kaddioui', '2023-07-25 18:25:41', 'khalid.kaddioui@example.com', 'Active', 8, '2023-07-26'),
(30, 'Samira Lahlou', '2023-07-25 18:25:41', 'samira.lahlou@example.com', 'Active', 8, '2023-07-26'),
(31, 'Adil Mekki', '2023-07-25 18:25:41', 'adil.mekki@example.com', 'Active', 8, '2023-07-26'),
(32, 'Fatima Naji', '2023-07-25 18:25:41', 'fatima.naji@example.com', 'Active', 8, '2023-07-26'),
(33, 'Mounir Oufkir', '2023-07-25 18:25:41', 'mounir.oufkir@example.com', 'Active', 8, '2023-07-26'),
(34, 'Rita Qadiri', '2023-07-25 18:25:41', 'rita.qadiri@example.com', 'Active', 8, '2023-07-26'),
(35, 'Zakaria Rahmouni', '2023-07-25 18:25:41', 'zakaria.rahmouni@example.com', 'Active', 8, '2023-07-26'),
(36, 'Hajar Saidi', '2023-07-25 18:25:41', 'hajar.saidi@example.com', 'Active', 8, '2023-07-26'),
(37, 'Said Taibi', '2023-07-25 18:25:41', 'said.taibi@example.com', 'Active', 8, '2023-07-26'),
(38, 'Latifa Uddah', '2023-07-25 18:25:41', 'latifa.uddah@example.com', 'Active', 8, '2023-07-26'),
(39, 'Omar Wafi', '2023-07-25 18:25:41', 'omar.wafi@example.com', 'Active', 8, '2023-07-26'),
(40, 'Rania Xiri', '2023-07-25 18:25:41', 'rania.xiri@example.com', 'Active', 8, '2023-07-26'),
(41, 'Kamal Yassine', '2023-07-25 18:25:41', 'kamal.yassine@example.com', 'Active', 8, '2023-07-26'),
(42, 'Laila Zahir', '2023-07-25 18:25:41', 'laila.zahir@example.com', 'Active', 8, '2023-07-26'),
(43, 'Younes Zayyani', '2023-07-25 18:25:41', 'younes.zayyani@example.com', 'Active', 8, '2023-07-26'),
(44, 'Najat Ait', '2023-07-25 18:25:41', 'najat.ait@example.com', 'Active', 8, '2023-07-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainee`
--
ALTER TABLE `trainee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisorId` (`supervisorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trainee`
--
ALTER TABLE `trainee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trainee`
--
ALTER TABLE `trainee`
  ADD CONSTRAINT `trainee_ibfk_1` FOREIGN KEY (`supervisorId`) REFERENCES `supervisor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
