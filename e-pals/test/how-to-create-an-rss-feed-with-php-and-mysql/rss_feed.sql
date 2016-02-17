-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2014 at 09:21 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rss_feed`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `link`, `description`) VALUES
(1, 'Installing and configuring a web environment for PHP/MySQL', 'http://www.bewebdeveloper.com/tutorial-about-installing-and-configuring-a-web-environment-for-php-mysql', 'Hi, I am Ali Aboussebaba, Web and Mobile Engineer. Having worked with various technologies ranging from web to mobile. In this first tutorial, i’ll show you how to install and configure a web environment using WampSerer.'),
(2, 'Using Ajax with native JavaScript', 'http://www.bewebdeveloper.com/tutorial-about-using-ajax-with-native-javascript', 'In this tutorial, I’ll show you how to execute PHP scripts in the web server using Ajax with native JavaScript.'),
(3, 'Using Ajax with PHP/MySQL', 'http://www.bewebdeveloper.com/tutorial-about-using-ajax-with-phpmysql', 'Hi guys, in this tutorial, w’ll use Ajax with PHP/MySQL. A small administration page, with listing, adding and deleting members using Ajax with PHP/MySQL.'),
(4, 'Autocomplete using PHP/MySQL and jQuery', 'http://www.bewebdeveloper.com/tutorial-about-autocomplete-using-php-mysql-and-jquery', 'Hi, a new tutorial explain how to impliment an autocomplete using PHP/MySQL and jQuery is available. In this tutorial w’ll focus on the autocomplete functionality using a single table in the database and a single input text in the web page. When we type a letter, a list of proposition containning the keyword will be displayed with the keyword in bold.'),
(5, 'Crop photo using PHP and jQuery', 'http://www.bewebdeveloper.com/tutorial-about-crop-photo-using-php-and-jquery', 'Give the possibility for users to upload photos dynamically is good, but users upload photos with different sizes, and usually that cause problem in the website design. So in this tutorial I’ll show you how to crop photo using PHP and jQuery. Don’t worry, it’s simple, just follow the tutorial step by step.'),
(6, 'Dynamic Drag and Drop with jQuery and PHP', 'http://www.bewebdeveloper.com/tutorial-about-dynamic-drag-and-drop-with-jquery-and-php', 'A new tutorial about Dynamic Drag and Drop With jQuery and PHP is available. Need to order your items quickly and easily ? so read this tutorial step by step. A basic knowledge about PHP and jQuery is required.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
