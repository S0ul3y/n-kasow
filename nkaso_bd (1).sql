-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 juin 2024 à 16:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nkaso_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(30) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `mdp`, `telephone`, `adresse`, `role`) VALUES
(8, 'Maiga', 'Souleymane', 'maigasouleymane244@gmail.com', '$2y$10$euaf4VKKgUonM03qKOzpVOj3/V4Uo.kRxeX2oIilXx1o0Bl9IIceG', '98101237', 'Sirakoro', 'admin'),
(9, 'Maiga', 'Almahamoud', 'admin@gmail.com', '$2y$10$HRCVankP1N2nG/ES90klkOnc91NGfXvk5BbEGqeIzBX8ZTvY4SsKO', '--- --- ', '-', 'user'),
(10, 'Maiga', 'Almahamoud', 'mamoutou@gmail.com', '$2y$10$gRXTSvShrTfO9wkpejtER.YQKkDPN6QJ38UXyFc1FfMD0cagNVreW', '50568506', 'Yorodjanbougou', 'user'),
(11, 'Maiga', 'Maimouna', 'maimouna@gmail.com', '$2y$10$kRJCR4OfkokJr4Z8mhZKWOF3V4rwUq0D6Nx12atSWla/QnVvCxXQi', '73720183', 'Sirakoro', 'user'),
(12, 'Kalifa', 'Sanogo', 'sanogo@gmail.com', '$2y$10$xvc4q2T21Y5qZyl1Xy6jWuoARHFbZo2Ils0Vl4zlssVpG7iF0Tv3.', '76160186', 'Hamdalaye', 'user'),
(14, 'Dicko', 'Mohamed', 'mohamed@gmail.com', '$2y$10$IUDy9FYxf.BkDbGc2FgzJuLn6XE/5xgQxUstwCle/rWyNtVeURPwC', '', '', 'admin'),
(15, 'Maiga', 'Aboubacrine', 'hacha@gmail.com', '$2y$10$D3YW9DsESY4LihNNyMre4eA/7KyQ3/dWhOUbjFWqWDIxvp68BvGWy', '', '', 'admin'),
(16, 'yalcouyé', 'Mamoutou', 'yalcouye@gmail.com', '$2y$10$qsLReNEprqYMa3B7hOGN.O1HqaQjyUfAhFrjMK2BYkEe7KvD9h2Qe', '50200428', 'Bamako', 'user'),
(17, 'Maïga ', 'Almahamoud ', 'maigaalmahamoud@gmail.com', '$2y$10$YU7i43zrNgjBTuPrUynW4uzCWAm868OG6bqoXzs3MPq57AnBn2aMO', '', '', 'user'),
(18, 'Maïga ', 'Almahamoud ', 'maigaalmahamoud12@gmail.com', '$2y$10$jJW1yz0UcedRKJp/eYOQLuKeIbv3dHFmpCln1TtqbxHDwvzyk7Z4W', '50568506', 'Tabacoro', 'user'),
(19, 'Dao', 'Oumar', 'oumardao99@gmail.com', '$2y$10$6JCov2bSZWYBzu6zYqHJbOTPiRpBHpL1vw/CucqE9V1OWy.Ftqsom', '', '', 'user'),
(20, 'Sanogo', 'Abdramane ', 'abdramanesanogo749@gmail.com', '$2y$10$sB7xW22mOl1ygLG.AqoyUObSsNEKJkBJHp35dXFXdDwP7s4TjjKs6', '', '', 'user'),
(21, 'Mamoutou ', 'Yalcouyé', 'yalcouyemamoutou02@gmail.com', '$2y$10$xvsxRRQ5SkCO3rqUkHoW9.A4nHvBFl8Wm.lci9417.KoXnShFhgB2', '', '', 'user'),
(22, 'Mohamed', 'Kone', 'kone@gmail.com', '$2y$10$tHI6Z/cICfHKX.mxYNCbfOPrtdIz117Z52IwyclSEnQ1h8adlGkAq', '91240633', '', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idcom` int(11) NOT NULL,
  `nomprenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idcom`, `nomprenom`, `email`, `tel`, `message`) VALUES
(1, 'Souleymane Maiga', 'maigasouleymane244@gmail.com', '98101237', 'Hello word ! professionnelles et parcours académique.\r\nJe mesure la portée des tâches liées à un tel poste ainsi qu’à l’atteinte des objectifs de   votre organisation. C’est pourquoi mon expérience en tant qu’Assistante Programme chargée Éducation et Prot'),
(3, 'Maimouna Maiga', 'maimouna@gmail.com', '73728403', '•	Diapositive 4 : Revue de la littérature, avec les principaux travaux existants sur le domaine de la gestion de bien immobilier, les lacunes et les limites identifiées, et la contribution de la thèse.\r\n•	Diapositive 5 : Méthodologie, avec la démarche ado'),
(4, 'Souleymane Maiga', 'souley@gmail.com', '98101237', 'n,n; sbjxbkx; '),
(5, 'Souleymane Maiga', 'maigasouleymane244@gmail.com', '98101237', 'Bonjour tout le monde'),
(6, 'Chetty', 'souley23474@gmail.com', '73728403', 'Ha ha haha');

-- --------------------------------------------------------

--
-- Structure de la table `favorie`
--

CREATE TABLE `favorie` (
  `idFavorie` int(30) NOT NULL,
  `idUser` int(50) NOT NULL,
  `idMaison` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favorie`
--

INSERT INTO `favorie` (`idFavorie`, `idUser`, `idMaison`) VALUES
(97, 8, 4),
(107, 21, 4),
(108, 21, 5),
(109, 21, 7),
(112, 11, 11),
(117, 11, 5),
(129, 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id` int(30) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `par` varchar(50) NOT NULL,
  `quartier` varchar(200) NOT NULL,
  `dateAjout` varchar(200) NOT NULL,
  `nbreSalon` int(50) NOT NULL,
  `nbreToilette` int(50) NOT NULL,
  `nbreChambre` int(50) NOT NULL,
  `nbreCuisine` int(50) NOT NULL,
  `meuble` varchar(50) NOT NULL,
  `electricite` varchar(50) NOT NULL,
  `piscine` varchar(50) NOT NULL,
  `eau` varchar(50) NOT NULL,
  `image0` varchar(200) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `image5` varchar(200) NOT NULL,
  `image6` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`id`, `titre`, `type`, `statut`, `prix`, `par`, `quartier`, `dateAjout`, `nbreSalon`, `nbreToilette`, `nbreChambre`, `nbreCuisine`, `meuble`, `electricite`, `piscine`, `eau`, `image0`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`) VALUES
(4, 'Super Maison', 'Appartement', 'A louer', 20000, 'Jour', 'Sirakoro', '2023-10-20', 2, 6, 4, 2, 'Non meublé', 'disponible', 'indisponible', 'disponible', '1697784202220619419_342500184183847_5750707004491483162_n.jpg', '1697784202S.jpg', '1697784202lavage des mains.png', '1697784202aoudou.jpg', '1697784202independance.png', '1697784202journée de l\'alimentation.png', '1697784202dell (5).png'),
(5, 'Super Appartement', 'villa', 'A louer', 26000, 'Mois', 'Sogoniko', '2023-10-21', 2, 8, 5, 3, 'Non meublé', 'disponible', 'disponible', 'disponible', '1697877232Capture d’écran (1).png', '1697877232Capture d’écran (2).png', '1697877232Capture d’écran (3).png', '1697877232Capture d’écran (4).png', '1697877232Capture d’écran (7).png', '1697877232Capture d’écran (10).png', '1697877232Capture d’écran (16).png'),
(6, 'Une Boutique ', 'Boutique', 'Loué', 15000, 'Mois', 'Kalaban coura', '2023-10-21', 1, 1, 1, 1, 'Non meublé', 'disponible', 'indisponible', 'indisponible', '1698045627WhatsApp Image 2023-09-03 à 20.43.59.jpg', '1698045627E1CEmqiWEAIb_tr.jpg', '1698045627WhatsApp Image 2023-09-03 à 20.44.08.jpg', '1698045627WhatsApp Image 2023-09-07 à 20.12.22.jpg', '1698045627pt103731.1312380.w430.jpg', '1698045627WhatsApp Image 2023-09-09 à 09.54.33.jpg', '1698045627WhatsApp Image 2023-09-09 à 09.54..jpg'),
(7, 'Un immeuble', 'immeuble', 'A louer', 200000, 'Mois', 'Yirimadjon', '2023-10-23', 1, 1, 2, 2, 'Meublé', 'disponible', 'disponible', 'disponible', '1698052115WhatsApp Image 2023-09-04 à 10.24.28.jpg', '1698052115IMG_20221105_171535.jpg', '1698052115pt103731.1312380.w430.jpg', '1698052115IMG_20221105_172300.jpg', '1698052115WhatsApp Image 2023-09-01 à 11.54.40.jpg', '1698052115IMG_20221105_171535.jpg', '1698052115IMG_20221105_172308.jpg'),
(8, 'Une Boutique ', 'Boutique', 'A louer', 10000, 'Mois', 'Sabalibougou', '2023-10-23', 0, 0, 0, 1, 'Non meublé', 'disponible', 'indisponible', 'indisponible', '1698053135WhatsApp Image 2023-09-03 à 20.43.57.jpg', '1698053135WhatsApp Image 2023-09-03 à 20.43.59.jpg', '1698053135WhatsApp Image 2023-09-03 à 20.44.08.jpg', '1698053135WhatsApp Image 2023-09-07 à 20.12.2.jpg', '1698053135WhatsApp Image 2023-09-09 à 09.37.52.jpg', '1698053135WhatsApp Image 2023-09-09 à 09.54..jpg', '1698053135WhatsApp Image 2023-09-09 à 09.5.jpg'),
(11, 'Super Maison', 'villa', 'A vendre', 50000000, '', 'ZRNI', '2023-12-16', 2, 6, 8, 2, 'Non meublé', 'disponible', 'indisponible', 'disponible', '1702727899355081895_228499062982648_6922963488124003675_n.jpg', '1702727899355113753_228499486315939_207949275952701721_n.jpg', '1702727899355126159_228499096315978_3529680038087758289_n.jpg', '1702727899355130892_228498792982675_3629452873769410358_n.jpg', '1702727899355143347_228499682982586_5825751831257463856_n.jpg', '1702727899355143858_228500996315788_3171495197231679823_n.jpg', '1702727899355145625_228499759649245_8953229188129371327_n.jpg'),
(12, 'MARKET', 'Boutique', 'A vendre', 30000, 'Jour', 'Sirakoro', '2024-04-11', 8, 5, 1, 2, 'Meublé', 'disponible', 'indisponible', 'disponible', '17120646271711283644.jpg', '17120646272557376402e.png', '1712064627Conférence2 (1).jpg', '1712064627KAKEMONO Dr BM_ (1).jpg', '1712064627Anefis.jpg', '17120646278 mars.jpg', '17120646278 mars (3).jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcom`);

--
-- Index pour la table `favorie`
--
ALTER TABLE `favorie`
  ADD PRIMARY KEY (`idFavorie`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `favorie`
--
ALTER TABLE `favorie`
  MODIFY `idFavorie` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
