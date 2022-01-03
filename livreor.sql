-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 jan. 2022 à 16:38
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text COLLATE utf8_bin NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'dsfjbnkfgn dgjfdj,', 1, '2021-11-29 00:00:00'),
(2, 'qsgr oipiuygtf xvbvj jkfhdgj ???', 1, '2021-11-29 00:00:00'),
(3, 'je te defonce cell?', 1, '2021-11-29 00:00:00'),
(4, 'je défonce yamacha!!!', 2, '2021-11-29 00:00:00'),
(5, 'tagueulle tenshihan', 3, '2021-11-29 00:00:00'),
(6, 'je vous éclate tous', 4, '2021-11-29 00:00:00'),
(7, 'hou hou hou', 5, '2021-11-29 00:00:00'),
(8, 'ORA ORA ORA', 6, '2021-11-29 00:00:00'),
(9, 'enculé!!!!!!!!!!\r\n', 9, '2021-12-02 00:00:00'),
(10, 'putain de sa mère le date time', 9, '2021-12-02 14:50:49'),
(11, 'boby 258951!!!!', 9, '2021-12-05 12:29:52'),
(12, 'qsfgj wxvh', 9, '2021-12-05 13:14:10'),
(13, 'Super projet tu gères de fou le choix des couleurs est super\r\ntu peux améliorer encore. ', 9, '2021-12-12 19:51:46'),
(14, 'djgkgnùm', 9, '2021-12-12 21:27:58'),
(15, 'test', 9, '2021-12-12 21:37:42'),
(16, 'kamehameha', 7, '2021-12-12 21:38:27'),
(17, 'qsdfghj', 9, '2021-12-27 11:22:06'),
(18, '', 9, '2021-12-27 11:22:06'),
(19, 'voila voila\r\n', 9, '2021-12-27 11:22:34'),
(20, '', 9, '2021-12-28 14:18:48'),
(21, 'yo ', 9, '2021-12-28 14:33:38'),
(22, 'voilà', 9, '2021-12-28 14:38:41'),
(23, 'ok marche', 9, '2021-12-28 14:38:51'),
(24, 'kaméhaméha', 10, '2021-12-28 17:27:56'),
(25, 'poing du phoenix\r\n', 11, '2021-12-28 17:28:48'),
(26, 'yo', 12, '2022-01-03 17:30:36');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'picolo', '$argon2i$v=19$m=65536,t=4,p=1$SVNhQzU3bzlxQ2VGcFZFSA$P/Y267IpeLitWXIRpRA4t7w44VPLTsfy4VhZkiliHwA'),
(2, 'tenshinhan', '$argon2i$v=19$m=65536,t=4,p=1$LjIuZi43TGR3ZEU2LmZnRQ$6xrZk4juxGB2li8h4NiCj1ad8Sf2GNGZ8A8PJWuGNyc'),
(3, 'yamcha', '$argon2i$v=19$m=65536,t=4,p=1$RXhhRlFWSWtBeXRpWHpKRQ$xX873DbvGfQ8MFwwL6TXyt6mAYuMp7GXP85TEJc5hHg'),
(4, 'vegeta', '$argon2i$v=19$m=65536,t=4,p=1$S3llc01PSG1SS0MyaWxMWA$LR+pQccBZeEM4zU8knn5mbiLdBlYFEUak4TyVcrhOT0'),
(5, 'freezer', '$argon2i$v=19$m=65536,t=4,p=1$LjlydmE5dm9xY2dlaS5PSg$Qt65M7WkVBek/rtAeV3fJj7K2AKHRqBA/yk9vxU+vXQ'),
(6, 'jotaro', '$argon2i$v=19$m=65536,t=4,p=1$cGgzMUFUSGY1QjY4ckpRWQ$DpF8ctQkdDLwGCR1HovEZ0p57WFDFcc/22teOEAZol0'),
(7, 'jojo', '$argon2id$v=19$m=65536,t=4,p=1$L2wwbTdBdFBPb2FScnR5Lw$POmonoccvb9GIeT/WcnKOyDCPLQGM9716VK93b8sU9Y'),
(8, 'bob', '$argon2i$v=19$m=65536,t=4,p=1$Z3B0Z2NSaGFGTkVaQXoubw$AH/EJI8u7jWrHPK+cSdCwTR2NC4SXaOD7GlNgjQr/k8'),
(9, 'joe', '$argon2id$v=19$m=65536,t=4,p=1$dnFSeVZQNVM0L3EubEQ1Sg$5R//FBIEUFgwF4P1/xmbyIdPJEtHV6YsgB4s/4PlEDg'),
(10, 'kamesenin', '$argon2i$v=19$m=65536,t=4,p=1$TmZGSUo1a3BiODJSdXBNVQ$zybTK2bf2IRmldva6SpNnwD+Ty9kBfWwbnkiUcL87vg'),
(11, 'ikki', '$argon2i$v=19$m=65536,t=4,p=1$WDBHVnlrQU8wSTM0YzcyRQ$TeMRZysfNFlWYu/uAvQ3Wp3bvHmVS/byOOj+eHr/Lak'),
(12, 'gg', '$argon2id$v=19$m=65536,t=4,p=1$elYyeG0yWXhPNFRvRFRGMA$eLzO0KOMFqwYypZtH3Hkr5Nl9iiPF0K5bzPX6Zu2ooY');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
