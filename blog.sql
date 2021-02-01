-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2021 at 12:25 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(1, 'Hunter x Hunter (le meilleur au monde)', 1, 1, '2021-01-28 10:49:13'),
(2, 'Naruto', 2, 1, '2021-01-28 13:18:52'),
(3, 'un autre confinement ?', 3, 3, '2021-01-27 23:00:00'),
(4, 'j\'ai plus de lessive', 2, 2, '2021-01-27 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Animés'),
(2, 'Vie quotidienne'),
(3, 'Covid-19');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'le meilleur animé au monde, hisoka le meilleur', 1, 1, '2021-01-28 12:24:30'),
(2, 'les animés c\'est de la bombe', 1, 1, '2021-01-28 19:21:03'),
(3, 'Etiam rhoncus dui fringilla iaculis.', 2, 2, '2021-01-27 23:00:00'),
(4, 'Aenean elementum sagittis ante, at.', 3, 3, '2021-01-27 23:00:00'),
(5, 'dolor sit amet, consectetur adipiscing elit. Donec', 4, 3, '2021-01-27 23:00:00'),
(6, 'mauris ultricies malesuada vel quis nulla. Nulla', 1, 1, '2021-01-27 23:00:00'),
(7, 'facilisi. Aliquam elit odio, aliquam eu nulla in, facilisis vestibulum turpis. Etiam vitae sem', 1, 3, '2021-01-27 23:00:00'),
(8, 'eros. Aliquam velit purus, sollicitudin sed mattis in, bibendum molestie ligula. Nam mi ', 2, 2, '2021-01-27 23:00:00'),
(9, 'sapien, feugiat vel leo eu, mattis mollis libero', 4, 1, '2021-01-27 23:00:00'),
(10, 'Morbi leo dui, euismod eget libero sit amet, cursus pulvinar elit. Sed est purus, ornare vit', 2, 3, '2021-01-27 23:00:00'),
(11, ' leo tempor, consequat finibus massa. Vivamus vulputate elit in sagittis congue. Viv', 4, 3, '2021-01-27 23:00:00'),
(12, 'amus posuere, libero et tincidunt tempor, augue dolor facilisis mauris, in elementum turp', 3, 1, '2021-01-27 23:00:00'),
(13, 'pus at tortor vitae euismod. Fusce laoreet molestie mollis. Ut eleifend lacus quis libe', 3, 2, '2021-01-27 23:00:00'),
(14, 'o egestas, ac fermentum risus maximus. In condimentum ut est sit amet rutrum. Pe', 1, 3, '2021-01-27 23:00:00'),
(15, 'lentesque imperdiet eros a eros condimentum maximus. Cras a consectetur diam. Ma', 1, 1, '2021-01-27 23:00:00'),
(16, 'cenas blandit ex vitae elit fermentum, vitae facilisis lorem posuere. Ut metus dui, mole', 2, 1, '2021-01-27 23:00:00'),
(17, 'tie id erat ac, tempor tristique est. Aliquam id purus sed neque ullamcorper vehic', 4, 2, '2021-01-27 23:00:00'),
(18, 'aesent consectetur massa sit amet facilisis condimentum. Suspendisse posuere tortor a od', 4, 1, '2021-01-27 23:00:00'),
(19, 'o hendrerit tempor. Vestibulum nec libero eu sem maximus posuere. Proin ac accu', 2, 3, '2021-01-27 23:00:00'),
(20, 'san turpis. Proin ut condimentum neque. Donec pharetra leo id erat consectetur conval', 1, 2, '2021-01-27 23:00:00'),
(21, 'lis. In imperdiet placerat mi, in rutrum lorem imperdiet ac. Phasellus id dolor nibh. Sed ve', 3, 2, '2021-01-27 23:00:00'),
(22, 'hicula massa massa, sed sollicitudin augue commodo consectetur. Duis gravida non velit suscipit vestibulum. Pellentesque habitant morbi tristique senectus et netus et males', 2, 1, '2021-01-27 23:00:00'),
(23, 'malesuada fames ac turpis egestas. Sed in luctus eros. Maecenas in justo sit amet sem ultrices', 3, 2, '2021-01-27 23:00:00'),
(24, 's ultricies. Praesent blandit diam nec lacus porta tempus. Fusce sollicitudin comm', 3, 3, '2021-01-27 23:00:00'),
(25, ' pulvinar consectetur augue vitae convallis. Proin vehicula, arcu luctus maximus finibu', 2, 1, '2021-01-27 23:00:00'),
(26, 'finibus, felis eros ultrices purus, ut semper quam sapien a lectus. Donec iaculis eros est, ut consequat', 4, 3, '2021-01-27 23:00:00'),
(27, '', 4, 2, '2021-01-27 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1338 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'marie', 'marie', 'marie.clerc@laplateforme.io', 1),
(2, 'william', 'william', 'william.kies@laplateforme.io', 42),
(3, 'guillaume', 'guillaume', 'guillaume.grac@laplateforme.io', 1337);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
