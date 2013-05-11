-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2013 at 09:25 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nepali_culture`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `type` enum('historical','cultural') NOT NULL,
  `description` text NOT NULL,
  `cover_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `place`, `type`, `description`, `cover_pic`) VALUES
(1, 'Prithvi Jayanti', '2013-01-11', 'Gorkha Durbar (Gorkha Palace)', 'historical', 'King Prithvi Narayan Shah (1723-1775) was born in the Shah dynasty of Gorkha. Who started the unification campagin in Nepal.', ''),
(2, 'Black Day', '2012-12-16', '', 'historical', 'Establishment of Panchayat: king Mahendra arrested all the ministers and dissolved the parliament.', ''),
(3, 'Panchayat System re-enforced', '2013-01-06', '', 'historical', 'King Mahendra introduced panchayat Democracy On Poush 22, 2017 BS, which was partyless. Dr. Tulsi Giri was made Prime Minister.', ''),
(4, 'Birendra Jayanti', '2012-12-29', 'Basantapur Durbar (Basantapur Palace)', 'historical', 'King Birendra was born on 28th December 1945 AD (14th Poush 2002 BS).', ''),
(5, 'Panchayat System', '2012-12-16', '', 'historical', 'The Constitution of Nepal was announced publicly on 1 Paush,2019 (December 16, 1962 AD). It provided the legitimacy to the party-less Panchayat System.', ''),
(6, 'Declaration of first Constitutional Assebly', '2013-01-08', '', 'historical', 'The first declaration of the Constitutional Assembly in the Nepalese history was made by the Rana prime Mohan Shumsher while addressing the nation on 24th Poush, 2007 BS (January 8, 1959 AD).', ''),
(7, 'Tamu Lhosar', '2012-12-30', 'Himalayan and High Hilly regions', 'cultural', 'Lhosar is a Buddhist festival.Lho means year and Sar means new.Lhosar thus basically is a New Year festival.It is celebrated mainly in the Himalayan region by the Gurungs,Tamangs and the Sherpas.They celebrate Lhosar according their own community and customs.Some celebrate it on 15th of Poush,some on Magh Shukla Pratipada and others on Falgun Shukla Pratipada.The Gurungs have Tamu Lhosar,the Tamangs celebrate Sonam Lhosar and the Sherpas observe Gyalpo Lhosar. ', ''),
(8, 'Christmas', '2012-12-25', '', 'cultural', 'The most important festival for the Christians is Christmas.It is also known as X-Mas.The letter X represents the holy sign Cross for the Christians.It falls on 25 December every year.It marks the birth anniversity of Jesus Christ,the founder of Christianity.It is generally celebrated for three days from 24 to 26 December', ''),
(9, 'Gorkha - Kathamndu treaty', '2012-12-18', '', 'historical', 'Jaya Prakash Malla signed a treaty in the name of God as a witness to Prithvi Narayan Shah in 3 Poush 1814 BS,  stating, "Kathmandu will not ambush the materials brought from Gorkha, receive the goldsmith coming from Bhot, take the coins brought from Madhes, give Naldum to Kathmandu and do the work of Kathmandu."', ''),
(10, 'Publication of ''Purusartha''', '2012-12-16', 'Kathmandu', 'historical', 'Publication of ''Purusartha'' a monthly literary magazine was started from Poush 1, 2006 BS (December 16, 1949 AD).', '');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('image','video') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
