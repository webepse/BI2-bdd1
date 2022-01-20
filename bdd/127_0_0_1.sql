-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 jan. 2022 à 14:50
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `store`
--
CREATE DATABASE IF NOT EXISTS `store` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `store`;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `price` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `date`, `price`) VALUES
(1, 'titre 1', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi enim sem, vehicula vel cursus vitae, semper quis ligula. Maecenas sem nisi, interdum vitae porta accumsan, viverra ut magna. Morbi in metus laoreet, dictum mi id, rutrum tortor. In lacus mi, condimentum non orci et, aliquam consectetur magna. Integer commodo quis neque non lacinia. Vivamus eget lectus a libero convallis tristique. Cras sed lectus nibh. Proin porttitor accumsan interdum. Donec laoreet, felis nec varius pellentesque, justo dolor dapibus nibh, a tristique metus felis at sem. Phasellus venenatis accumsan sem sit amet fermentum. Vestibulum quis purus pretium, placerat mi eget, rhoncus ligula. Praesent rutrum sagittis eros, vulputate ultricies justo mattis vel. In aliquet urna in neque aliquet vehicula vel et nibh. Vivamus eget egestas neque. Nullam lectus magna, sollicitudin sit amet blandit sed, posuere at metus.\r\n\r\nMaecenas ante augue, molestie vitae posuere quis, dapibus quis velit. Suspendisse nec neque porta, gravida enim sit amet, sollicitudin enim. Suspendisse eu eros neque. Cras vitae faucibus ipsum. Morbi varius, elit eu bibendum euismod, quam elit congue ligula, a bibendum elit diam consequat tortor. Fusce fringilla varius est vel pulvinar. Pellentesque tempus ex sit amet diam ultricies porta. Proin nec quam massa. Maecenas sed risus a purus porta tempor. Ut odio diam, egestas in metus quis, gravida pellentesque augue. Vestibulum in volutpat ante. Morbi lacinia a diam eget ultricies. Sed in iaculis metus. Etiam sed placerat nisi. Fusce eget neque ut nisi venenatis eleifend at et orci. ', '2022-01-13', '25.50'),
(2, 'titre 2', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi enim sem, vehicula vel cursus vitae, semper quis ligula. Maecenas sem nisi, interdum vitae porta accumsan, viverra ut magna. Morbi in metus laoreet, dictum mi id, rutrum tortor. In lacus mi, condimentum non orci et, aliquam consectetur magna. Integer commodo quis neque non lacinia. Vivamus eget lectus a libero convallis tristique. Cras sed lectus nibh. Proin porttitor accumsan interdum. Donec laoreet, felis nec varius pellentesque, justo dolor dapibus nibh, a tristique metus felis at sem. Phasellus venenatis accumsan sem sit amet fermentum. Vestibulum quis purus pretium, placerat mi eget, rhoncus ligula. Praesent rutrum sagittis eros, vulputate ultricies justo mattis vel. In aliquet urna in neque aliquet vehicula vel et nibh. Vivamus eget egestas neque. Nullam lectus magna, sollicitudin sit amet blandit sed, posuere at metus.\r\n\r\nMaecenas ante augue, molestie vitae posuere quis, dapibus quis velit. Suspendisse nec neque porta, gravida enim sit amet, sollicitudin enim. Suspendisse eu eros neque. Cras vitae faucibus ipsum. Morbi varius, elit eu bibendum euismod, quam elit congue ligula, a bibendum elit diam consequat tortor. Fusce fringilla varius est vel pulvinar. Pellentesque tempus ex sit amet diam ultricies porta. Proin nec quam massa. Maecenas sed risus a purus porta tempor. Ut odio diam, egestas in metus quis, gravida pellentesque augue. Vestibulum in volutpat ante. Morbi lacinia a diam eget ultricies. Sed in iaculis metus. Etiam sed placerat nisi. Fusce eget neque ut nisi venenatis eleifend at et orci. ', '2022-01-10', '500.00'),
(3, 'titre 3', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi enim sem, vehicula vel cursus vitae, semper quis ligula. Maecenas sem nisi, interdum vitae porta accumsan, viverra ut magna. Morbi in metus laoreet, dictum mi id, rutrum tortor. In lacus mi, condimentum non orci et, aliquam consectetur magna. Integer commodo quis neque non lacinia. Vivamus eget lectus a libero convallis tristique. Cras sed lectus nibh. Proin porttitor accumsan interdum. Donec laoreet, felis nec varius pellentesque, justo dolor dapibus nibh, a tristique metus felis at sem. Phasellus venenatis accumsan sem sit amet fermentum. Vestibulum quis purus pretium, placerat mi eget, rhoncus ligula. Praesent rutrum sagittis eros, vulputate ultricies justo mattis vel. In aliquet urna in neque aliquet vehicula vel et nibh. Vivamus eget egestas neque. Nullam lectus magna, sollicitudin sit amet blandit sed, posuere at metus.\r\n\r\nMaecenas ante augue, molestie vitae posuere quis, dapibus quis velit. Suspendisse nec neque porta, gravida enim sit amet, sollicitudin enim. Suspendisse eu eros neque. Cras vitae faucibus ipsum. Morbi varius, elit eu bibendum euismod, quam elit congue ligula, a bibendum elit diam consequat tortor. Fusce fringilla varius est vel pulvinar. Pellentesque tempus ex sit amet diam ultricies porta. Proin nec quam massa. Maecenas sed risus a purus porta tempor. Ut odio diam, egestas in metus quis, gravida pellentesque augue. Vestibulum in volutpat ante. Morbi lacinia a diam eget ultricies. Sed in iaculis metus. Etiam sed placerat nisi. Fusce eget neque ut nisi venenatis eleifend at et orci. ', '2022-01-05', '250.00'),
(4, 'titre 4', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi enim sem, vehicula vel cursus vitae, semper quis ligula. Maecenas sem nisi, interdum vitae porta accumsan, viverra ut magna. Morbi in metus laoreet, dictum mi id, rutrum tortor. In lacus mi, condimentum non orci et, aliquam consectetur magna. Integer commodo quis neque non lacinia. Vivamus eget lectus a libero convallis tristique. Cras sed lectus nibh. Proin porttitor accumsan interdum. Donec laoreet, felis nec varius pellentesque, justo dolor dapibus nibh, a tristique metus felis at sem. Phasellus venenatis accumsan sem sit amet fermentum. Vestibulum quis purus pretium, placerat mi eget, rhoncus ligula. Praesent rutrum sagittis eros, vulputate ultricies justo mattis vel. In aliquet urna in neque aliquet vehicula vel et nibh. Vivamus eget egestas neque. Nullam lectus magna, sollicitudin sit amet blandit sed, posuere at metus.\r\n\r\nMaecenas ante augue, molestie vitae posuere quis, dapibus quis velit. Suspendisse nec neque porta, gravida enim sit amet, sollicitudin enim. Suspendisse eu eros neque. Cras vitae faucibus ipsum. Morbi varius, elit eu bibendum euismod, quam elit congue ligula, a bibendum elit diam consequat tortor. Fusce fringilla varius est vel pulvinar. Pellentesque tempus ex sit amet diam ultricies porta. Proin nec quam massa. Maecenas sed risus a purus porta tempor. Ut odio diam, egestas in metus quis, gravida pellentesque augue. Vestibulum in volutpat ante. Morbi lacinia a diam eget ultricies. Sed in iaculis metus. Etiam sed placerat nisi. Fusce eget neque ut nisi venenatis eleifend at et orci. ', '2022-01-03', '25.00'),
(5, 'titre 5', 'lorem', '2022-01-21', '12.25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
