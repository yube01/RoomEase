-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2023 at 04:17 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacation-booking-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `Id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`Id`, `username`, `email`, `password`, `isAdmin`) VALUES
(1, 'jndj', 'd@h.pm', 'sdk', 1),
(2, 'new', 'new@k.cp', 'yube', 1),
(3, 'yu', 'yu2j@h.com', '202cb962ac59075b964b07152d234b70', 0),
(4, 'yubraj', 'yu@h.cpm', 'cfc6f799df5751f8a7269689a99c5c8f', 0),
(5, 'dmkm', 'sd@j.cp', '26fdb6eafd356c3e4ae0303f5f39e431', 0),
(6, 'kmsk', 'sms@k.cpom', 'd5f44ce2b4a1922dd741d23b09526218', 0),
(7, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(8, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(9, 'mk', 'nkn@h.cpm', 'eab71244afb687f16d8c4f5ee9d6ef0e', 0),
(10, 'yu', 'h@g.com', '385d04e7683a033fcc6c6654529eb7e9', 0),
(11, 'new', 'new@k.com', '22af645d1859cb5ca6da0c484f1f37ea', 1),
(12, 'admin', 'a@h.com', '0cc175b9c0f1b6a831c399e269772661', 1),
(13, 'yubraj', 'skdnk@j.com', 'cfc6f799df5751f8a7269689a99c5c8f', 0),
(15, 'yube', 'skmd@k.com', '56ba7e1de807c12feb7a6521c485b827', 1),
(16, 'yube1', 'dsk@k.cm', '56ba7e1de807c12feb7a6521c485b827', 1),
(17, 'user', 'user@j.com', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(18, 'dmsm', 'ew@k.cp', '6d662f965d1e85bb367efaa03594c5a1', 0),
(19, 'kks', 'new@k.com', '6d662f965d1e85bb367efaa03594c5a1', 0),
(20, 'user', 'dnk@h.cpm', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(21, 'yube1', 'dsdmm@h.com', '740fe5741a128c5990338d7e8b8e4c00', 0),
(22, 'luffy', 'skdmm@h.com', '6cfbec608383fd05c271de92010d455f', 0),
(23, 'zoro', 'asm@l.com', 'eed83905a260b31bc5d254701999ee94', 0),
(24, 'ram', 'ajsn@h.cpom', '4641999a7679fcaef2df0e26d11e3c72', 1),
(25, 'Shyam', 'adlm@h.com', '5a4cd850fc787d454416aa3a47580468', 1),
(26, 'Yubraj', 'sldm@j.com', '56ba7e1de807c12feb7a6521c485b827', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `roomId` int(11) DEFAULT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `citizenship` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adminId` int(11) NOT NULL,
  `bookStatus` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `userId`, `roomId`, `firstName`, `lastName`, `phone`, `citizenship`, `adminId`, `bookStatus`) VALUES
(31, 26, 26, 'Yubraj', 'Adhikari', '9856521542', '../picture/Citizenship sample.jpg', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomId` int(11) NOT NULL,
  `Location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Descr` text COLLATE utf8_unicode_ci NOT NULL,
  `Longlat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminId` int(11) NOT NULL,
  `currency` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomId`, `Location`, `district`, `Descr`, `Longlat`, `Images`, `adminId`, `currency`, `price`, `date`) VALUES
(25, 'patan', 'Lalitpur', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore!\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore!\r\n\r\nBed : 2\r\nWiFi: Yes\r\nBreakfast: No\r\nParking : Yes\r\n\r\n', '25.5941° N, 85.1376° E', '../picture/christopher-jolly-GqbU78bdJFM-unsplash.jpg', 15, 'NPR', 3500, '2023-09-10 01:13:03'),
(26, 'asan', 'Kathmandu', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Bed : 2 WiFi: Yes Breakfast: No Parking : Yes ', '27.7076° N, 85.3121° E', '../picture/roberto-nickson-rEJxpBskj3Q-unsplash.jpg', 15, 'NPR', 4000, '2023-09-10 01:15:20'),
(27, 'nagarkot', 'Bhaktapur', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Bed : 1 WiFi: Yes Breakfast: No Parking : No', '27.6710° N, 85.4298° E', '../picture/francesca-tosolini-ghPHKipv790-unsplash.jpg', 24, 'NPR', 3000, '2023-09-10 01:20:51'),
(28, 'duwakot', 'Bhaktapur', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Bed : 1 WiFi: Yes Breakfast: No Parking : No ', '27.8910° N, 85.4298° E ', '../picture/m-f-s-qd5yc3hpaco-unsplash.jpg', 24, '$', 4000, '2023-09-10 01:21:56'),
(29, 'new road', 'Kathmandu', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Bed : 2 WiFi: Yes Breakfast: Yes Parking : Yes ', '27.6710° N, 85.4298° E', '../picture/sidekix-media-7jlVQPX8PLE-unsplash.jpg', 25, 'NPR', 5000, '2023-09-10 01:24:57'),
(30, 'koteshwor', 'Kathmandu', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sed ipsum non consequatur adipisci inventore odio fugiat eos excepturi dolore! Bed : 2 WiFi: Yes Breakfast: Yes Parking : Yes ', '27.6756° N, 85.3459° E', '../picture/michael-oxendine-BfkTFeysp34-unsplash.jpg', 25, 'INR', 2500, '2023-09-10 01:26:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `roomId` (`roomId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomId`),
  ADD KEY `fk_adminId` (`adminId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `auth` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`roomId`) REFERENCES `room` (`roomId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_adminId` FOREIGN KEY (`adminId`) REFERENCES `auth` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
