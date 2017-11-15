-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 20 Octobre 2017 à 18:38
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `TP_minichat`
--

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE `minichat` (
  `ID` int(11) NOT NULL,
  `Pseudo` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `date_com` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `minichat`
--

INSERT INTO `minichat` (`ID`, `Pseudo`, `Message`, `date_com`) VALUES
(1, 'test', 'test', '0000-00-00 00:00:00'),
(2, '', '', '0000-00-00 00:00:00'),
(3, 'test', 'test', '0000-00-00 00:00:00'),
(4, 'TomTom', 'salut !', '0000-00-00 00:00:00'),
(5, 'Diana', 'Hey !', '0000-00-00 00:00:00'),
(6, 'TomTom', 'Ca va ?', '0000-00-00 00:00:00'),
(7, 'Diana', 'Yes !', '0000-00-00 00:00:00'),
(8, 'Diana', 'et toi ?', '0000-00-00 00:00:00'),
(9, 'TomTom', 'Ã§a peut aller.', '0000-00-00 00:00:00'),
(10, 'Diana ', 'c''est un petit oui Ã§a... QuÃ© pasa ?', '0000-00-00 00:00:00'),
(11, 'TomTom', 'J''ai plantÃ© ma console', '0000-00-00 00:00:00'),
(12, '', '', '0000-00-00 00:00:00'),
(13, '', '', '0000-00-00 00:00:00'),
(14, '', '', '0000-00-00 00:00:00'),
(15, 'Diana', 'Mince alors', '0000-00-00 00:00:00'),
(16, 'TomTom', 'Bah ouais c''est con', '0000-00-00 00:00:00'),
(17, 'Stefane', 'bah comment tu fais ?', '0000-00-00 00:00:00'),
(18, 'TomTom', 'Bah tu utilises MySQL !', '0000-00-00 00:00:00'),
(19, 'Stefane', 'Ah ouais c''est top !', '0000-00-00 00:00:00'),
(20, 'TomTom', 'Grave', '0000-00-00 00:00:00'),
(21, 'Diana', 'Ouais c''est pas mal', '0000-00-00 00:00:00'),
(22, 'Stefane', 'Et sinon vous allez voir quoi au cinÃ© ?', '0000-00-00 00:00:00'),
(23, 'Diana', 'Mad max, et toi ?', '0000-00-00 00:00:00'),
(24, 'Stefane', 'Je ne sais pas trop', '2017-10-19 17:05:12'),
(25, 'TomTom', 'Tiens, est-ce que l''heure de nos billets ne s''afficherait pas lÃ  ?', '2017-10-19 17:05:39'),
(26, 'Diana', 'Si !', '2017-10-19 17:05:49'),
(27, 'Stefane', 'C''est sympa', '2017-10-19 17:06:02'),
(28, 'TomTom', 'Oui c''est plus prÃ©cis', '2017-10-19 17:37:40'),
(29, 'TomTom', 'Oui c''est plus prÃ©cis', '2017-10-19 17:44:25'),
(30, 'TomTom', 'Oui c''est plus prÃ©cis', '2017-10-19 17:50:12'),
(31, 'Stefane', 'Tu bÃ©gaies ?', '2017-10-19 17:56:39'),
(32, 'TomTom', 'euh', '2017-10-19 18:04:53'),
(33, 'TomTom', 'j''ai buguÃ©', '2017-10-20 09:25:20'),
(34, 'StÃ©fane', 'C''est la fin de la semaine ;-)', '2017-10-20 09:47:00'),
(35, 'TomTom', 'Oui.', '2017-10-20 10:01:29'),
(36, 'Diana', 'Tu te reposeras ce we !', '2017-10-20 10:39:36'),
(37, 'TomTom', 'Et toi tu fais quoi ce we ?', '2017-10-20 14:54:58'),
(38, 'Diana', 'Je vais en forÃªt', '2017-10-20 17:36:07'),
(39, 'Diana', 'Je vais en forÃªt', '2017-10-20 18:02:08'),
(40, 'Diana', 'Je vais en forÃªt', '2017-10-20 18:04:07'),
(41, 'Diana', 'Je vais en forÃªt', '2017-10-20 18:04:41'),
(42, 'Diana', 'Je vais en forÃªt', '2017-10-20 18:05:48'),
(43, 'Diana', 'yo', '2017-10-20 18:06:04'),
(44, 'StÃ©fane', 'Vous buguez tous ou quoi ?', '2017-10-20 18:21:10'),
(45, 'TomTom', 'c''est vendredi... on est raplapla', '2017-10-20 18:21:33'),
(46, 'StÃ©fane', 'Le souci c''est que le pseudo ne s''affiche pas', '2017-10-20 18:21:54'),
(47, 'TomTom', 'et non, toujours pas', '2017-10-20 18:22:09'),
(48, 'entrez votre pseudo', '', '2017-10-20 18:27:04'),
(49, 'StÃ©fane', 'Qui c''est celui-lÃ  ?', '2017-10-20 18:27:29'),
(50, 'TomTom', 'un intrus. En toutcas, Ã§a marche !', '2017-10-20 18:28:19'),
(51, 'StÃ©fane', 'Oui, les pseudos s''affichent maintenant !', '2017-10-20 18:28:40'),
(52, 'Diana', 'Youhou !!!', '2017-10-20 18:28:52');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
