-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 08 mai 2021 à 09:09
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
-- Base de données : `comblo`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `user_id` int(11) NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_article` date DEFAULT NULL,
  `favoris` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`user_id`, `text`, `title`, `category`, `pseudo`, `date_article`, `favoris`, `id`) VALUES
(10, 'Je suis un text', 'titre', 'Politique', 'Arkazix', NULL, 1, 5),
(10, 'jeux vidÃ©o', 'Test2.0', 'Jeux vidÃ©o', 'Arkazix', NULL, 1, 6),
(10, 'eaea', 'ea', 'Jeux vidÃ©o', 'Arkazix', NULL, 0, 7),
(10, 'voiture', 'Test', 'Automobile', 'Arkazix', NULL, 0, 8),
(10, 'minecraft', 'jeux', 'Jeux vidÃ©o', 'Arkazix', NULL, 0, 9),
(10, 'eaeaaea', 'voila', 'Automobile', 'Arkazix', NULL, 0, 10),
(10, 'Les jeux vidÃ©o: \r\nLes jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: Les jeux vidÃ©o: ', 'Voici un vrai test', 'Jeux vidÃ©o', 'Arkazix', NULL, 0, 11),
(14, 'Mon bebou d\'amour que j\'aime Ã  la folie c\'est le meilleur et personne ne peut contester cela mÃªme pas lui ! Parce qu\'il a tout pleins de qualitÃ©s exceptionnelles et incroyable, qu\'il me rend chaque jour un peu plus heureuse et que grÃ¢ce Ã  lui je peux dire que j\'ai rÃ©ussi ma vie.\r\nJe t\'aime mon bebou <3', 'Mon bebou que j\'aime', 'Nature', 'Dimididou', NULL, 0, 13),
(14, 'eaeaea', 'j\'uste', 'Jeux vidÃ©o', 'Dimididou', NULL, 0, 14),
(16, 'ea', 'ea', 'Jeux vidÃ©o', 'blaze27', '2021-04-27', 1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `user_id` int(11) NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `deepth` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` date NOT NULL,
  `parent_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`user_id`, `text`, `deepth`, `likes`, `date`, `parent_id`, `id`, `article_id`, `pseudo`) VALUES
(10, 'J\'adore mon didou', 0, 0, '2021-04-11', 0, 1, 10, ''),
(10, 'bebou', 0, 0, '2021-04-11', 0, 2, 15, ''),
(10, 're', 0, 0, '2021-04-11', 0, 3, 15, ''),
(10, 'Colas test', 0, 0, '2021-04-12', 0, 4, 11, ''),
(10, 'te', 0, 0, '2021-04-13', 0, 5, 16, ''),
(10, 'autre test', 0, 0, '2021-04-13', 0, 6, 16, ''),
(10, 'Et puis un autre parce que voila en plus il est trÃ¨s long', 0, 0, '2021-04-13', 0, 7, 16, ''),
(10, 'Et puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s long', 0, 1, '2021-04-13', 0, 8, 16, ''),
(10, 'Et puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s long', 0, 0, '2021-04-13', 0, 9, 16, ''),
(10, 'Et puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s long', 0, 0, '2021-04-13', 0, 10, 16, ''),
(10, 'Et puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s long', 0, 0, '2021-04-13', 0, 11, 16, ''),
(10, 'Et puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s longEt puis un autre parce que voila en plus il est trÃ¨s long', 0, 0, '2021-04-13', 0, 12, 16, ''),
(10, 'réponse', 1, 0, '2021-04-14', 8, 13, 16, ''),
(10, 'reponse reponse', 2, 4, '2021-04-14', 13, 14, 16, ''),
(10, 'un autre comentaire', 0, 0, '2021-04-14', 0, 15, 16, ''),
(14, 'reponse 2', 1, 2, '2021-04-14', 8, 16, 16, ''),
(10, '@10 coucou', 0, 0, '2021-04-14', 0, 17, 16, ''),
(10, 'bt', 0, 0, '2021-04-14', 0, 18, 16, 'Arkazix'),
(10, '@', 0, 0, '2021-04-14', 0, 19, 16, 'Arkazix'),
(10, '@', 0, 0, '2021-04-14', 0, 20, 16, 'Arkazix'),
(10, '@', 0, 0, '2021-04-14', 0, 21, 16, 'Arkazix'),
(10, '@8 je t\'aime', 0, 0, '2021-04-15', 0, 22, 16, 'Arkazix'),
(10, '@8 mon bb', 0, 0, '2021-04-15', 0, 23, 16, 'Arkazix'),
(10, '@22 Moi aussi Ã©normÃ©ment', 0, 0, '2021-04-15', 0, 24, 16, 'Arkazix'),
(10, 'et moi aussi ', 0, 0, '2021-04-15', 0, 25, 5, 'Arkazix'),
(10, 'sans e bien sÃ»r', 0, 0, '2021-04-15', 0, 26, 5, 'Arkazix'),
(10, 'lol', 0, 0, '2021-04-15', 0, 27, 16, 'Arkazix'),
(10, '@ioahubyb', 0, 0, '2021-04-15', 0, 28, 16, 'Arkazix'),
(10, '@10', 0, 0, '2021-04-15', 0, 29, 16, 'Arkazix'),
(10, '@eahbegva', 0, 0, '2021-04-15', 0, 30, 16, 'Arkazix'),
(10, '@00 p', 0, 0, '2021-04-15', 0, 31, 16, 'Arkazix'),
(10, '@8 test', 1, 0, '2021-04-15', 8, 32, 16, 'Arkazix'),
(10, '@14 autre test', 3, 0, '2021-04-15', 14, 33, 16, 'Arkazix'),
(10, '@12 RÃ©ponse', 1, 0, '2021-04-15', 12, 34, 16, 'Arkazix'),
(10, ' RÃ©ponse de rÃ©ponse', 1, 0, '2021-04-15', 8, 35, 16, 'Arkazix'),
(10, 'eaea', 4, 0, '2021-04-15', 33, 36, 16, 'Arkazix'),
(10, 'yt', 0, 0, '2021-04-15', 0, 37, 16, 'Arkazix'),
(10, 'ty', 1, 0, '2021-04-15', 37, 38, 16, 'Arkazix'),
(10, 'Me too', 1, 0, '2021-04-15', 22, 39, 16, 'Arkazix'),
(10, ' Bien Ã©videmment', 1, 0, '2021-04-15', 26, 40, 5, 'Arkazix'),
(10, 'first', 0, 0, '2021-04-15', 0, 41, 17, 'Arkazix'),
(10, ' super', 1, 0, '2021-04-15', 41, 42, 17, 'Arkazix'),
(10, 'First2', 0, 10, '2021-04-15', 0, 43, 17, 'Arkazix'),
(10, 'Suepr aussi', 1, 0, '2021-04-15', 43, 44, 17, 'Arkazix'),
(10, ' Oui mon didou', 1, 0, '2021-04-15', 23, 45, 16, 'Arkazix'),
(10, ' C\'est gÃ©nial', 2, 0, '2021-04-15', 42, 46, 17, 'Arkazix'),
(10, ' coucou', 1, 0, '2021-04-15', 41, 47, 17, 'Arkazix'),
(10, 'lol', 0, 0, '2021-04-16', 0, 48, 17, 'Arkazix'),
(10, 'J\'adore', 0, 0, '2021-04-19', 0, 49, 19, 'Arkazix'),
(10, 'Ok', 1, 0, '2021-04-19', 49, 50, 19, 'Arkazix'),
(10, 'first', 0, 0, '2021-04-19', 0, 51, 19, 'Arkazix'),
(10, 'e', 1, 0, '2021-04-19', 51, 52, 19, 'Arkazix'),
(10, 'a', 2, 0, '2021-04-19', 52, 53, 19, 'Arkazix'),
(10, 'b', 3, 0, '2021-04-19', 53, 54, 19, 'Arkazix'),
(10, 'c', 4, 0, '2021-04-19', 54, 55, 19, 'Arkazix'),
(10, 'd', 5, 0, '2021-04-19', 55, 56, 19, 'Arkazix'),
(10, 'f', 6, 0, '2021-04-19', 56, 57, 19, 'Arkazix'),
(10, 'lol', 0, 0, '2021-04-21', 0, 58, 19, 'Arkazix'),
(16, 'ea', 1, 0, '2021-04-27', 65, 66, 20, 'blaze27'),
(10, 'super', 0, 0, '2021-04-27', 0, 88, 19, 'Arkazix');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`user_id`, `article_id`) VALUES
(10, 20),
(17, 6),
(17, 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(11, 'JujuFatCat', '$2y$10$qDDl5pvXv7lhtZSEK0tXeerUG6fBK53SwJoqP5Kv7OqhK4OCFqPWW', 'julieluciani@gmail.com', '2021-03-22'),
(10, 'Arkazix', '$2y$10$jXvCfhmw25xzvA4t7Qwenu88Mp6uyVwvTy3M2zxrofZDONQbnq5U.', 'hugohamon27@gmail.com', '2021-03-22'),
(12, 'jujufitcat', '$2y$10$jJpQGY3PYaOF5IwGxKnoae.3dIk409ZpM3fvvsq9kgZzKeouSBezu', 'eaeaea@gmail.com', '2021-03-22'),
(13, 'Hugo', '$2y$10$nO6YHANjl5.lQqbfznB/Eupo2286uy5LV0X0vZwWkreG.1vNitNgW', 'hamonhugo@gmail.com', '2021-03-29'),
(14, 'Dimididou', '$2y$10$.6zEUzvosWCYexAnzRKGrOgH/wOG.gQE18lKBe1q/vwXxxn4FLvTi', 'jeannehamelin27@gmail.com', '2021-04-04'),
(15, 'tete', '$2y$10$6pWIhCzUYfHT5cZt6T/CxesIDfJc4Zh9gZHLa.fGnFsssxMDJRd3C', 'tete@gmail.com', '2021-04-12'),
(16, 'blaze27', '$2y$10$qkWKnhDytbwe.LdrSKmxy.rQrIhJDF9HL4y5ynyybSFc4MnRHO1Kq', 'blaze27@gmail.com', '2021-04-27'),
(17, 'lala', '$2y$10$YKmAoJ1prR86vln8.bQmp.0r5VuCtg.XGZygXNrgmT/BCI5KjEIfe', 'lala@gmail.com', '2021-04-27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
