-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2024 at 05:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galerifoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(2, 'Rasya', 'rasya', 'admin1', '085603183916', 'rasyarasyifah11@gmail.com', 'Jl. Raden Kadmirah'),
(3, 'Rizkya', 'rizkya', 'admin2', '085712524472', 'rizkyanoorkhaerunisha31juli@gmail.com', 'Jl. PLTA ParakanKondang'),
(4, 'Lisnawati', 'lisna', 'admin3', '085795146348', 'lisnawatispentira@gmail.com', 'Jl. Pasir malang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(14, 'Obat Diare'),
(15, 'Obat Batuk'),
(16, 'Obat Radang'),
(17, 'Obat Pereda Nyeri'),
(18, 'Obat Magh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int NOT NULL,
  `category_id` int NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id` int NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(34, 18, 'Obat Magh', 2, 'Rasya', 'Promag', 'Harga : Rp8.000\r\nObat ini untuk mengurangi rasa sakit pada lambung.\r\n', 'obat-magh.jpeg', 1, '2024-08-25 03:52:08'),
(35, 18, 'Obat Magh', 2, 'Rasya', 'Mylanta', 'Harga : Rp.18.000\r\nObat ini untuk meredakan rasa nyeri pada lambung.\r\n', 'obat-magh1.jpeg', 1, '2024-08-25 03:51:27'),
(36, 17, 'Obat Pereda Nyeri', 3, 'Rizkya', 'Mefenamic Acid', 'Harga : Rp 28.000\r\nUntuk meredakan nyeri pada tubuh', 'obat-peredanyeri.jpeg', 1, '2024-08-25 04:03:39'),
(37, 17, 'Obat Pereda Nyeri', 3, 'Rizkya', 'Sumagesic\r\nParacetamol 600mg', 'Harga : Rp. 15.000\r\nParacetamol untuk menghilangkan rasa sakit di kepala.', 'obat-peredanyeri1.jpeg', 1, '2024-08-25 04:03:51'),
(38, 16, 'Obat Radang', 4, 'Lisna', 'Kalmethasone\r\nDexamethasone', 'Harga : Rp. 158.000\r\nUntuk meredakan sakit pada tenggorokan', 'obat-radang.jpeg', 1, '2024-08-25 04:04:06'),
(39, 16, 'Obat Radang', 4, 'Lisna', 'Cooling5\r\nAntiseptic', 'Harga : Rp. 40.000\r\nUntuk meredakan sariawan dan sakit tenggorokan', 'obat-radang1.jpeg', 1, '2024-08-25 04:03:25'),
(40, 15, 'Obat Batuk', 2, 'Rasya', 'Komix Herbal', 'Harga : Rp. 13.000\r\nUntuk meredakan batuk berdahak', 'obat-batuk1.jpeg', 1, '2024-08-25 04:07:18'),
(41, 15, 'Obat Batuk', 2, 'Rasya', 'Ambroxol HCL\r\nTablet 30mg', 'Harga : Rp. 5.000\r\nUntuk meredakan sakit batuk', 'obat-batuk.jpeg', 1, '2024-08-25 04:09:11'),
(42, 14, 'Obat Diare', 3, 'Rizkya', 'Entrostop', 'Harga : Rp. 10.000\r\nUntuk mengatasi sakit perut akibat diare.', 'obat-diare.jpeg', 1, '2024-08-25 04:11:38'),
(49, 14, 'Obat Diare', 4, 'Lisna', 'Imodium\r\nIoperamide HCI 2mg', 'Harga : Rp 15.000\r\nUntuk mengatasi sakit akibat diare ', 'obat-diare1.jpeg', 1, '2024-08-25 04:16:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
