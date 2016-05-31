-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2016 at 07:22 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todoweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `programa`
--

CREATE TABLE `programa` (
  `nid____programa` bigint(20) UNSIGNED NOT NULL,
  `vnome____programa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programa`
--

INSERT INTO `programa` (`nid____programa`, `vnome____programa`) VALUES
(1, 'SisProdan'),
(2, 'Chat Prodan'),
(3, 'Estudos'),
(4, 'List Logins'),
(9, 'Sped Prodan'),
(10, 'Todo List'),
(11, 'Pagina Prodan'),
(12, 'teste'),
(13, 'testado'),
(14, 'caiocoaco'),
(15, 'sdgasdgd'),
(16, 'eeeeeeee'),
(17, 'gsdgasg'),
(18, 'sdgsg'),
(19, 'dsagasdg'),
(20, 'vsdsd'),
(21, 'vsdsd'),
(22, 'sgsdgsd'),
(23, 'dsgasg'),
(24, 'sdgasg'),
(25, 'skgjasg');

-- --------------------------------------------------------

--
-- Table structure for table `programador`
--

CREATE TABLE `programador` (
  `nid____programador` bigint(20) UNSIGNED NOT NULL,
  `vnome__programador` varchar(255) DEFAULT NULL,
  `vmac___config` varchar(255) DEFAULT NULL,
  `nid____programa` int(11) DEFAULT NULL,
  `vsenha_programador` varchar(255) DEFAULT NULL,
  `cstatusprogramador` int(11) DEFAULT NULL,
  `vlogin_programador` varchar(255) DEFAULT NULL,
  `nadminsprogramador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programador`
--

INSERT INTO `programador` (`nid____programador`, `vnome__programador`, `vmac___config`, `nid____programa`, `vsenha_programador`, `cstatusprogramador`, `vlogin_programador`, `nadminsprogramador`) VALUES
(1, 'Caio', 'F0EEBB7B8302', 9, 'b1252486f1c632dac5caff3c8038747c', 1, 'caiohrm', NULL),
(2, 'Renato', 'F46D044899D8', 1, 'b1252486f1c632dac5caff3c8038747c', 0, 'caiohrm', NULL),
(3, 'Nilton', 'F0EEBB7B8302', 2, 'b1252486f1c632dac5caff3c8038747c', 0, 'caiohrm', NULL),
(8, 'Tais', '7427EA752B23', 4, 'b1252486f1c632dac5caff3c8038747c', 0, 'caiohrm', NULL),
(9, 'Arthur', 'F0EEBB7B8302', 1, 'b1252486f1c632dac5caff3c8038747c', 0, 'caiohrm', NULL),
(10, 'sdgasgassa', NULL, NULL, '83cdcec08fbf90370fcf53bdd56604ff', NULL, 'sshdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `nid____status` bigint(20) UNSIGNED NOT NULL,
  `vdescristatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`nid____status`, `vdescristatus`) VALUES
(1, 'AGUARDANDO'),
(2, 'ANDAMENTO'),
(3, 'FINALIZADO'),
(4, 'dfhsdfh'),
(5, 'sdsdg');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `nid____todolist` bigint(20) UNSIGNED NOT NULL,
  `nid____programador` int(11) DEFAULT NULL,
  `nid____programa` int(11) DEFAULT NULL,
  `vtitulotodolist` varchar(255) DEFAULT NULL,
  `vdescritodolist` varchar(10000) DEFAULT NULL,
  `vcreatotodolist` varchar(255) DEFAULT NULL,
  `nstate_todolist` int(11) DEFAULT NULL,
  `dprazo_todolist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`nid____programa`);

--
-- Indexes for table `programador`
--
ALTER TABLE `programador`
  ADD PRIMARY KEY (`nid____programador`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`nid____status`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`nid____todolist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programa`
--
ALTER TABLE `programa`
  MODIFY `nid____programa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `programador`
--
ALTER TABLE `programador`
  MODIFY `nid____programador` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `nid____status` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `nid____todolist` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
