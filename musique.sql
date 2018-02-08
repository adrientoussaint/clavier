-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 30 jan. 2018 à 08:24
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `musique`
--

-- --------------------------------------------------------

--
-- Structure de la table `perso`
--

CREATE TABLE `perso` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `touche` varchar(1) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `perso`
--

INSERT INTO `perso` (`id`, `username`, `touche`, `name`) VALUES
(313, 'bernard', 'a', '0477.wav'),
(314, 'bernard', 'z', 'piston-1.mp3'),
(315, 'bernard', 'e', 'clay.mp3'),
(316, 'bernard', 'r', 'prism-1.mp3'),
(317, 'bernard', 't', 'flash-3.mp3'),
(318, 'bernard', 'y', 'flash-2.mp3'),
(319, 'bernard', 'u', 'pinwheel.mp3'),
(320, 'bernard', 'i', '6553.wav'),
(321, 'bernard', 'o', 'wipe.mp3'),
(322, 'bernard', 'p', 'ufo.mp3'),
(323, 'bernard', 'q', '0477.wav'),
(324, 'bernard', 's', '0477.wav'),
(325, 'bernard', 'd', '0477.wav'),
(326, 'bernard', 'f', '0477.wav'),
(327, 'bernard', 'g', '0477.wav'),
(328, 'bernard', 'h', '0477.wav'),
(329, 'bernard', 'j', '0477.wav'),
(330, 'bernard', 'k', '0477.wav'),
(331, 'bernard', 'l', '0477.wav'),
(332, 'bernard', 'm', '0477.wav'),
(333, 'bernard', 'w', '0477.wav'),
(334, 'bernard', 'x', '0477.wav'),
(335, 'bernard', 'c', '0477.wav'),
(336, 'bernard', 'v', '0477.wav'),
(337, 'bernard', 'b', '0477.wav'),
(338, 'bernard', 'n', '0477.wav'),
(339, 'testSf2', 'a', 'instruetnic-EMRE  UD  04.sf2'),
(340, 'testSf2', 'z', 'instruetnic-EMRE KANUN 2.sf2'),
(341, 'testSf2', 'e', 'instruetnic-EMRE KEMAN 1.sf2'),
(342, 'testSf2', 'r', 'instruetnic-tampour corde graveEMREMTANBUR1.sf2'),
(343, 'testSf2', 't', 'intruetnic-EMRE BATILAR.sf2'),
(344, 'testSf2', 'y', '0477.wav'),
(345, 'testSf2', 'u', '0477.wav'),
(346, 'testSf2', 'i', '0477.wav'),
(347, 'testSf2', 'o', '0477.wav'),
(348, 'testSf2', 'p', '0477.wav'),
(349, 'testSf2', 'q', '0477.wav'),
(350, 'testSf2', 's', '0477.wav'),
(351, 'testSf2', 'd', '0477.wav'),
(352, 'testSf2', 'f', '0477.wav'),
(353, 'testSf2', 'g', '0477.wav'),
(354, 'testSf2', 'h', '0477.wav'),
(355, 'testSf2', 'j', '0477.wav'),
(356, 'testSf2', 'k', '0477.wav'),
(357, 'testSf2', 'l', '0477.wav'),
(358, 'testSf2', 'm', '0477.wav'),
(359, 'testSf2', 'w', '0477.wav'),
(360, 'testSf2', 'x', '0477.wav'),
(361, 'testSf2', 'c', '0477.wav'),
(362, 'testSf2', 'v', '0477.wav'),
(363, 'testSf2', 'b', '0477.wav'),
(364, 'testSf2', 'n', '0477.wav'),
(365, 'wilhelm', 'a', '0477.wav'),
(366, 'wilhelm', 'z', '0477.wav'),
(367, 'wilhelm', 'e', '0477.wav'),
(368, 'wilhelm', 'r', '0477.wav'),
(369, 'wilhelm', 't', '0477.wav'),
(370, 'wilhelm', 'y', '0477.wav'),
(371, 'wilhelm', 'u', '0477.wav'),
(372, 'wilhelm', 'i', '0477.wav'),
(373, 'wilhelm', 'o', '0477.wav'),
(374, 'wilhelm', 'p', '0477.wav'),
(375, 'wilhelm', 'q', '0477.wav'),
(376, 'wilhelm', 's', '0477.wav'),
(377, 'wilhelm', 'd', '0477.wav'),
(378, 'wilhelm', 'f', '0477.wav'),
(379, 'wilhelm', 'g', '0477.wav'),
(380, 'wilhelm', 'h', '0477.wav'),
(381, 'wilhelm', 'j', '0477.wav'),
(382, 'wilhelm', 'k', '0477.wav'),
(383, 'wilhelm', 'l', '0477.wav'),
(384, 'wilhelm', 'm', '0477.wav'),
(385, 'wilhelm', 'w', '0477.wav'),
(386, 'wilhelm', 'x', '0477.wav'),
(387, 'wilhelm', 'c', '0477.wav'),
(388, 'wilhelm', 'v', '0477.wav'),
(389, 'wilhelm', 'b', '0477.wav'),
(390, 'wilhelm', 'n', '0477.wav');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`) VALUES
(2, 'bernard'),
(3, 'testSf2'),
(4, 'wilhelm');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `perso`
--
ALTER TABLE `perso`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `perso`
--
ALTER TABLE `perso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
