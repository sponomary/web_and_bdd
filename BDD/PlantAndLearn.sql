-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 29 mai 2022 à 19:41
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `PlantAndLearn`
--

-- --------------------------------------------------------

--
-- Structure de la table `Families`
--

CREATE TABLE `Families` (
  `family_id` int(11) NOT NULL,
  `family_name` varchar(100) NOT NULL,
  `need_water` varchar(100) DEFAULT NULL,
  `need_light` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Families`
--

INSERT INTO `Families` (`family_id`, `family_name`, `need_water`, `need_light`) VALUES
(1, 'Araceae', NULL, NULL),
(2, 'Marantaceae', NULL, NULL),
(3, 'Asparagaceae', NULL, NULL),
(4, 'Arecaceae', NULL, NULL),
(5, 'Begoniaceae', NULL, NULL),
(6, 'Urticaceae', NULL, NULL),
(7, 'Asclepiadaceae', NULL, NULL),
(8, 'Commelinaceae', NULL, NULL),
(9, 'Piperaceae', NULL, NULL),
(10, 'Acanthaceae', NULL, NULL),
(11, 'Mimosaceae', NULL, NULL),
(12, 'Asclepiadaceae', NULL, NULL),
(13, 'Gesneriaceae', NULL, NULL),
(14, 'Orchidaceae', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Plants`
--

CREATE TABLE `Plants` (
  `plant_id` int(11) NOT NULL,
  `scientific_name` varchar(100) DEFAULT NULL,
  `family` int(11) DEFAULT NULL,
  `common_name_en` varchar(150) DEFAULT NULL,
  `common_name_fr` varchar(150) DEFAULT NULL,
  `common_name_ru` varchar(150) DEFAULT NULL,
  `photo` varchar(2000) DEFAULT NULL,
  `notes` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Plants`
--

INSERT INTO `Plants` (`plant_id`, `scientific_name`, `family`, `common_name_en`, `common_name_fr`, `common_name_ru`, `photo`, `notes`) VALUES
(1, 'Philodendron hastatum', 1, 'Silver sword, silver queen', 'Épée d\'argent', 'Филодендрон копьевидный', 'Philodendron_hastatum.avif', NULL),
(2, 'Alocasia reginula', 1, 'Alocasia little queen', 'Oreille d’éléphant, Joyau de la reine', 'Алоказия реджинула', 'Alocasia_reginula.avif', NULL),
(3, 'Monstera adansonii', 1, 'Monkey mask, Swiss cheese plant', 'Masque de singe, Plante gruyère', 'Обезьянья маска филодендрон, Дырчатое растение ', 'Monstera_adansonii.avif', NULL),
(4, 'Aglaonema', 1, 'Chinese evergreen', 'Aglaonème', 'Аглаонема', 'Aglaonema.avif', NULL),
(5, 'Maranta leuconeura fascinator', 2, 'Maranta tricolour, Prayer plant', 'Plante prieuse, plante dormeuse', 'Молящаяся трава', 'Maranta_leuconeura_fascinator.avif', NULL),
(6, 'Cordyline fruticosa', 3, 'Cabbage palm', 'Épinard hawaïen', 'Кордилина кустарниковая', 'Cordyline_fruticosa.avif', NULL),
(7, 'Howea forsteriana', 4, 'Kentia palm', 'Kentia de Foster', 'Ховея Форстера', 'Howea_forsteriana.jpeg', NULL),
(8, 'Syngonium podophyllum', 1, 'Arrowhead plant, goosefoot, nephthytis', 'Patte-d\'oie', 'Сингониум ножколистный', 'Syngonium_podophyllum.avif', NULL),
(9, 'Goeppertia makoyana', 2, 'Cathedral plant, peacock plant', 'Plante de fenêtres cathédrale, plante de paon', 'Калатея Макоя, павлиний цветок', 'Goeppertia_makoyana.avif', NULL),
(10, 'Begonia maculata', 5, 'Trout begonia, Polka dot begonia, Spotted begonia', 'Tamaya, bégonia bambou', 'Бегония макулата', 'Begonia_maculata.jpeg', NULL),
(11, 'Pilea peperomioides', 6, 'Chinese money plant, UFO plant, pancake plant, missionary plant', 'Plante à monnaie chinoise, lefse plant, plante du missionnaire', 'Пилея Кадье, китайское денежное дерево', 'Pilea_peperomioides.avif', NULL),
(12, 'Hoya', 7, 'Wax plant, porcelain flower', 'Fleurs de cire, fleurs de porcelaine', 'Восковой плющ', 'Hoya.avif', NULL),
(13, 'Tradescantia zebrina', 8, 'Silver inch plant, wandering Jew', 'Misère', 'Традесканция висячая, блуждающий еврей', 'Tradescantia_zebrina.jpeg', NULL),
(14, 'Anthurium crystallinum', 1, 'Crystal Anthurium', 'Anthurium crystal', 'Антуриум хрустальный', 'Anthurium_crystallinum.avif', NULL),
(15, 'Peperomia caperata', 9, 'Emerald ripple peperomia', 'Canne d\'aveugle', 'Пеперомия сморщенная', 'Peperomia_caperata.jpeg', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Plants`
--
ALTER TABLE `Plants`
  ADD PRIMARY KEY (`plant_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Plants`
--
ALTER TABLE `Plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
