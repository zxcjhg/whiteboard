-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2013 at 04:37 AM
-- Server version: 5.5.27-log
-- PHP Version: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cgt356web1k`
--

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
  `group_name` varchar(255) NOT NULL DEFAULT '',
  `update_file` varchar(255) NOT NULL DEFAULT '',
  `clock` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_name`,`update_file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`group_name`, `update_file`, `clock`) VALUES
('test', '0f1dteit2nc2t1otd3ak58gch0104676', '2013-04-16 01:38:53'),
('test', '0f1dteit2nc2t1otd3ak58gch01835938', '2013-04-16 01:38:26'),
('test', '0f1dteit2nc2t1otd3ak58gch01939393', '2013-04-16 02:54:30'),
('test', '0f1dteit2nc2t1otd3ak58gch02715455', '2013-04-16 02:54:29'),
('test', '0f1dteit2nc2t1otd3ak58gch03207398', '2013-04-16 02:54:45'),
('test', '0f1dteit2nc2t1otd3ak58gch03411866', '2013-04-16 01:38:40'),
('test', '0f1dteit2nc2t1otd3ak58gch0366822', '2013-04-16 01:38:22'),
('test', '0f1dteit2nc2t1otd3ak58gch03785706', '2013-04-16 01:38:43'),
('test', '0f1dteit2nc2t1otd3ak58gch03884583', '2013-04-16 01:38:26'),
('test', '0f1dteit2nc2t1otd3ak58gch03987122', '2013-04-16 02:54:41'),
('test', '0f1dteit2nc2t1otd3ak58gch04530640', '2013-04-16 01:38:28'),
('test', '0f1dteit2nc2t1otd3ak58gch05333252', '2013-04-16 01:38:54'),
('test', '0f1dteit2nc2t1otd3ak58gch05419617', '2013-04-16 01:38:37'),
('test', '0f1dteit2nc2t1otd3ak58gch06765137', '2013-04-16 01:38:46'),
('test', '0f1dteit2nc2t1otd3ak58gch06912537', '2013-04-16 01:38:46'),
('test', '0f1dteit2nc2t1otd3ak58gch07417298', '2013-04-16 01:38:47'),
('test', '0f1dteit2nc2t1otd3ak58gch08438416', '2013-04-16 01:38:23'),
('test', '0f1dteit2nc2t1otd3ak58gch0846558', '2013-04-16 01:38:52'),
('test', '0f1dteit2nc2t1otd3ak58gch08686219', '2013-04-16 02:54:51'),
('test', '0f1dteit2nc2t1otd3ak58gch08988343', '2013-04-16 02:54:26'),
('test', '0f1dteit2nc2t1otd3ak58gch09378052', '2013-04-16 01:38:45'),
('test', '0f1dteit2nc2t1otd3ak58gch0942383', '2013-04-16 02:54:36'),
('test', '0f1dteit2nc2t1otd3ak58gch09466858', '2013-04-16 01:39:02'),
('test', '0f1dteit2nc2t1otd3ak58gch09873658', '2013-04-16 01:39:05'),
('test', 'csjii2tcqoatua4jofvsassnp03194275', '2013-04-16 01:38:59'),
('test', 'csjii2tcqoatua4jofvsassnp03208619', '2013-04-16 01:38:55'),
('test', 'csjii2tcqoatua4jofvsassnp03701478', '2013-04-16 01:38:48'),
('test', 'csjii2tcqoatua4jofvsassnp04329529', '2013-04-16 01:38:30'),
('test', 'csjii2tcqoatua4jofvsassnp04744263', '2013-04-16 01:38:30'),
('test', 'csjii2tcqoatua4jofvsassnp07183533', '2013-04-16 02:53:27'),
('test', 'csjii2tcqoatua4jofvsassnp07443543', '2013-04-16 01:38:49'),
('test', 'csjii2tcqoatua4jofvsassnp07547913', '2013-04-16 01:38:53'),
('test', 'csjii2tcqoatua4jofvsassnp07717286', '2013-04-16 01:38:31'),
('test', 'csjii2tcqoatua4jofvsassnp07769776', '2013-04-16 01:38:50'),
('test', 'csjii2tcqoatua4jofvsassnp08322144', '2013-04-16 01:38:48'),
('test', 'csjii2tcqoatua4jofvsassnp09472962', '2013-04-16 02:54:55'),
('test', 'dpv26cduuuqpenh1rqnsb2b5g27831421', '2013-04-17 23:38:20'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s01371766', '2013-04-18 02:07:09'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s01406251', '2013-04-17 23:38:29'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s01716919', '2013-04-18 02:07:27'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s04349061', '2013-04-18 02:07:40'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s045167', '2013-04-17 23:38:24'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s04696045', '2013-04-18 02:07:15'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s04757996', '2013-04-17 23:37:54'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s05039979', '2013-04-17 23:38:25'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s05233155', '2013-04-18 01:31:44'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s0565491', '2013-04-17 23:38:24'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s05752259', '2013-04-18 02:08:18'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s06261292', '2013-04-18 02:07:19'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s07048646', '2013-04-17 23:38:36'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s07124634', '2013-04-17 23:38:25'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s08119813', '2013-04-18 01:31:43'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s09413453', '2013-04-17 23:38:40'),
('test', 'f7sjtfkrknt4o6k8005v3ks8s09846192', '2013-04-18 02:08:16'),
('test1', '7qf31v8oidctunt3a9psrgiub06947632', '2013-04-18 01:27:23'),
('test1', 'f7sjtfkrknt4o6k8005v3ks8s01000367', '2013-04-18 01:27:04'),
('test1', 'f7sjtfkrknt4o6k8005v3ks8s08881226', '2013-04-18 01:23:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `updates`
--
ALTER TABLE `updates`
  ADD CONSTRAINT `updates_ibfk_1` FOREIGN KEY (`group_name`) REFERENCES `groups` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
