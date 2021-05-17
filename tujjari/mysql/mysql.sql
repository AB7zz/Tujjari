-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 03:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tujjari`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_brand`
--

CREATE TABLE `car_brand` (
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_brand`
--

INSERT INTO `car_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Audi'),
(2, 'Nissan'),
(3, 'Toyota'),
(4, 'Ford'),
(5, 'Mercedes-Benz'),
(6, 'Honda'),
(8, 'Ferrari'),
(9, 'BMW'),
(10, 'Chevrolet'),
(11, 'Jeep'),
(12, 'Porsche'),
(13, 'Subaru'),
(14, 'Cadillac'),
(15, 'Volkswagen'),
(16, 'Lexus'),
(17, 'Volvo'),
(18, 'Jaguar'),
(19, 'GMC'),
(20, 'Acura'),
(21, 'Bentley'),
(22, 'Buick'),
(23, 'Dodge'),
(24, 'Hyundai'),
(25, 'Lincoln'),
(26, 'Mazda'),
(27, 'Land Rover'),
(28, 'Tesla'),
(29, 'Kia'),
(30, 'Chrysler'),
(31, 'Pontiac'),
(32, 'Infiniti'),
(33, 'Mitsubishi'),
(34, 'Maserati'),
(35, 'Aston Martin'),
(36, 'Bugatti'),
(37, 'Fiat'),
(38, 'Mini '),
(39, 'Alfa Romeo'),
(40, 'Saab'),
(41, 'Genesis'),
(42, 'Suzuki'),
(43, 'Renault'),
(44, 'Peugeot'),
(45, 'Daewoo'),
(46, 'Hudson'),
(47, 'Citroen'),
(48, 'MG');

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE `car_model` (
  `brand_id` int(50) NOT NULL,
  `model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`brand_id`, `model_name`) VALUES
(3, 'Corolla'),
(3, 'Camry'),
(3, 'Yaris'),
(3, 'Prado'),
(3, 'Land Cruiser'),
(2, 'Altima'),
(2, 'Tiida'),
(2, 'Patrol'),
(2, 'Sunny'),
(2, 'Pathfinder'),
(6, 'Accord'),
(6, 'Civic'),
(6, 'CR-V'),
(6, 'City'),
(6, 'Pilot'),
(5, 'E-Class'),
(5, 'C-Class'),
(5, 'S-Class'),
(5, 'G-Class'),
(5, 'M-Class'),
(4, 'Explorer'),
(4, 'Focus'),
(4, 'Edge'),
(4, 'Mustang'),
(4, 'Escape'),
(1, 'A4'),
(1, 'Q7'),
(1, 'A6'),
(1, 'Q5'),
(1, 'A3'),
(1, 'R8'),
(8, 'F40'),
(8, 'F355'),
(8, '250 GTO'),
(8, '125 S'),
(8, '488 GTB'),
(9, '3-Series'),
(9, '5-Series'),
(9, 'X5'),
(9, '7-Series'),
(9, 'X6'),
(10, 'Cruze'),
(10, 'Camaro'),
(10, 'Tahoe'),
(10, 'Captiva'),
(10, 'Malibu'),
(11, 'Grand Cherokee'),
(11, 'Wrangler'),
(11, 'Cherokee'),
(11, 'Compass'),
(11, 'Wrangler Unlimited'),
(12, 'Cayenne'),
(12, 'Boxster'),
(12, 'Panamera'),
(12, 'Cayman'),
(12, 'Macan'),
(13, 'Legacy'),
(13, 'Forester'),
(13, 'Impreza'),
(13, 'WRX STI'),
(13, 'XV'),
(14, 'Escalade'),
(0, 'CTS'),
(14, 'SRX'),
(14, 'ATS'),
(14, 'CTS-V'),
(15, 'Touareg'),
(15, 'Passat'),
(15, 'Golf'),
(15, 'Jetta'),
(15, 'Tiguan'),
(16, 'LS'),
(16, 'ES'),
(16, 'LX'),
(16, 'IS'),
(16, 'RX-Series'),
(17, 'XC90'),
(17, 'XC60'),
(17, 'S40'),
(17, 'S60'),
(17, 'S80'),
(18, 'XF'),
(18, 'XJ'),
(18, 'XK'),
(18, 'X-Type'),
(18, 'XF-Type'),
(19, 'Acadia'),
(19, 'Yukon'),
(19, 'Denali'),
(19, 'Sierra'),
(19, 'Terrain'),
(20, 'CSX/EL'),
(20, 'CL'),
(20, 'MDX'),
(20, 'TL'),
(20, 'EL'),
(21, 'Continental GT'),
(21, 'Continental Flying Spur'),
(21, 'Continental'),
(21, 'Mulsanne'),
(21, 'Bentayga'),
(24, 'Tucson'),
(24, 'Elantra'),
(24, 'Accent'),
(24, 'Santa Fe'),
(24, 'Sonata'),
(23, 'Charger'),
(23, 'Challenger'),
(23, 'Durango'),
(23, 'Ram'),
(23, 'Nitro'),
(25, 'MKX'),
(25, 'MKZ'),
(25, 'MKS'),
(25, 'Navigator'),
(25, 'Town Car'),
(26, '6'),
(26, '2'),
(26, '3'),
(26, 'CX-9'),
(26, 'CX-5'),
(28, 'Model S'),
(28, 'Model X'),
(35, 'DB9'),
(35, 'Vantage'),
(35, 'DB7'),
(35, 'Rapide'),
(35, 'V12 Vantage'),
(36, 'Veyron'),
(36, 'Super Sport'),
(36, 'Grand Sport'),
(36, 'Vitesse'),
(39, 'Giulietta'),
(39, '156'),
(39, '147'),
(39, '159'),
(39, '146'),
(30, '300C'),
(30, '200C'),
(30, '300'),
(30, 'Grand Voyager'),
(30, 'Sebring'),
(47, 'C4'),
(47, 'C3'),
(47, 'C5'),
(47, 'Berlingo'),
(47, 'PICASSO'),
(37, 'Linea'),
(37, 'Punto'),
(37, 'Dubblo'),
(37, 'Doblo'),
(37, '500'),
(37, 'Fiorino'),
(32, 'FX35'),
(32, 'G-Series'),
(32, 'Q50'),
(32, 'QX70'),
(32, 'QX56'),
(29, 'Sportage'),
(29, 'Optima'),
(29, 'Cerato'),
(29, 'Sorento'),
(29, 'Rio'),
(27, 'Range Rover Sport'),
(27, 'Range Rover'),
(27, 'Range Rover Evoque'),
(27, 'LR2'),
(27, 'HSE V8'),
(34, 'Quattroporte'),
(34, 'Ghibli'),
(34, 'GranTurismo'),
(34, 'GranCabrio'),
(34, 'GranSport'),
(38, 'Cooper'),
(38, 'Cooper S'),
(38, 'Cooper Clubman'),
(38, 'Cooper Roadstar'),
(38, 'Cooper Countryman'),
(33, 'Pajero'),
(33, 'Lancer'),
(33, 'Lancer EX'),
(33, 'Outlander'),
(33, 'ASX'),
(44, '206'),
(44, '207'),
(44, '307'),
(44, '308'),
(44, '407'),
(43, 'Megane'),
(43, 'Duster'),
(43, 'Clio'),
(43, 'Fluence'),
(43, 'Koleos'),
(42, 'Baleno'),
(42, 'Swift'),
(42, 'Jimny'),
(42, 'Grand Vitara'),
(42, 'ALTO'),
(42, 'SX4');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `customer_pass`, `phone`) VALUES
(25, 'Abhinav CV', 'abhiksi613@gmail.com', '$2y$10$SlkP5rV3WVmnEw.7nBGpKuGvE7LShllQ0bD3Odrd3v/m5qeKb/yvS', 551271295),
(26, 'Remya Surjith', 'surjithcv@gmail.com', '$2y$10$9EOc7lNXTtwAlwtsHy6po.3j0TAnvN5J7o5/AWYFMvlVeFNbT71ui', 2147483647),
(28, 'Abbas', 'abbas@gmail.com', '$2y$10$rR8wOXcXhkNvTZhZqnBZAe8Bvo0fpK1MCcvUgp5U2C8Af.yn1XlGa', 543678940),
(29, 'Afzal Biabani Syed', 'afzal@gmail.com', '$2y$10$xY8dhyFkWn8KTXRg.RIyvux2NgiAdQwWLgSK50oJIl.MS80FYEDXi', 563789200),
(30, 'Hola amigos', 'holaaa@gmail.com', '$2y$10$LS2TJ4/r3wo2C7BH7aSeDOvNUL436xL1eR5LHL3elfWuKkATff9.u', 0);

-- --------------------------------------------------------

--
-- Table structure for table `free_ad`
--

CREATE TABLE `free_ad` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timenow` varchar(255) NOT NULL,
  `car_brand` int(50) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `vin` int(100) NOT NULL,
  `model_year` int(50) NOT NULL,
  `body_condition` varchar(255) NOT NULL,
  `mechanical_condition` varchar(255) NOT NULL,
  `transmission_type` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `car_color` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `warranty` date NOT NULL,
  `km` int(50) NOT NULL,
  `specs` varchar(255) NOT NULL,
  `accident_hist` varchar(255) NOT NULL,
  `ad_image` varchar(355) NOT NULL,
  `ad_img1` varchar(255) NOT NULL,
  `ad_img2` varchar(255) NOT NULL,
  `ad_img3` varchar(255) NOT NULL,
  `ad_img4` varchar(255) NOT NULL,
  `ad_img5` varchar(255) NOT NULL,
  `ad_img6` varchar(255) NOT NULL,
  `ad_img7` varchar(255) NOT NULL,
  `ad_img8` varchar(255) NOT NULL,
  `ad_img9` varchar(255) NOT NULL,
  `ad_img10` varchar(255) NOT NULL,
  `desci` text NOT NULL,
  `check1` varchar(255) NOT NULL,
  `emirate` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `free_ad`
--

INSERT INTO `free_ad` (`id`, `user_id`, `user_name`, `user_email`, `title`, `timenow`, `car_brand`, `car_model`, `vin`, `model_year`, `body_condition`, `mechanical_condition`, `transmission_type`, `fuel_type`, `car_color`, `price`, `warranty`, `km`, `specs`, `accident_hist`, `ad_image`, `ad_img1`, `ad_img2`, `ad_img3`, `ad_img4`, `ad_img5`, `ad_img6`, `ad_img7`, `ad_img8`, `ad_img9`, `ad_img10`, `desci`, `check1`, `emirate`, `phone`, `latitude`, `longitude`) VALUES
(166, 26, 'Remya Surjith', 'surjithcv@gmail.com', 'Used Toyota Corolla available in Dubai', '2021-01-14', 3, 'Corolla', 0, 2016, 'Perfect(no damage/scratches)', 'Perfect(no damage)', 'Manual', 'Gasoline', 'Gray', 45000, '2022-01-17', 100, 'Canadian', 'No Accidents', '', 'Toyota-Corolla-Altis-Facelift-Exterior-87849.jpg', 'download.jpg', 'corolla.jpg', '', '', '', '', '', '', '', 'If you need it, kindly call me at +971551271295', '4 Wheel Drive,CD Players,Front Wheel Drive,Bluetooth System,Parking Sensors,Cooled Seats,Dual Exhaust,Anti Theft System,', 'Dubai', '971551271295', 25.20410257674827, 55.27328151675474);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(6, 'abhiksi613@gmail.com', '5740260e713e32cf', '$2y$10$4Mkk3vuLX94/P3X2Cu.Gp.FMH7MuV3HPu7ZS0tmsQk/BRwXd50JxK', '1611765414');

-- --------------------------------------------------------

--
-- Table structure for table `verifyacc`
--

CREATE TABLE `verifyacc` (
  `verifyaccEmail` varchar(300) NOT NULL,
  `verifyaccToken` longtext NOT NULL,
  `verifyaccExpires` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifyacc`
--

INSERT INTO `verifyacc` (`verifyaccEmail`, `verifyaccToken`, `verifyaccExpires`) VALUES
('abhinavcv007@gmail.com', '$2y$10$hwhLBYPPz1gt8da/Up23P.CNwamjgl1hUwqBPqcRSqEOybvxyWOoO', 1612353669);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_brand`
--
ALTER TABLE `car_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_ad`
--
ALTER TABLE `free_ad`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `free_ad` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `free_ad` ADD FULLTEXT KEY `desci` (`desci`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_brand`
--
ALTER TABLE `car_brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `free_ad`
--
ALTER TABLE `free_ad`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

