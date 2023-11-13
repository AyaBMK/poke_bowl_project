-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 nov. 2023 à 09:49
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `poke_bowl_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `basket_user`
--

CREATE TABLE `basket_user` (
  `product_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `zip_code` char(5) NOT NULL,
  `city` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE `command` (
  `command_id` int(11) NOT NULL,
  `command_date` datetime NOT NULL,
  `command_pickup_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `command_product`
--

CREATE TABLE `command_product` (
  `command_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `command_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `image_product` varchar(250) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `image_product`, `price`) VALUES
(66, 'Ahi Poké', 'Le « Ahi Poké » est une variation ensoleillée et exotique du classique Poké Bowl, qui vous transporte directement dans l’ambiance envoûtante d’Hawaï. Inspiré par les danses gracieuses du hula et les saveurs tropicales de l’île, ce plat est une vérita', '85cc41e5004186dc0ad5.png', 19.58),
(67, 'Lava Tofu Poké', 'Le « Lava Tofu Poké » est une création audacieuse et savoureuse qui repousse les limites de la cuisine végétarienne. Ce Poké Bowl unique en son genre met en vedette des cubes de tofu ferme, marinés dans une sauce épicée inspirée des saveurs tropicale', 'bde30ec131bc8560b230.avif', 23.88),
(68, 'Hula Poké', 'le poke, à prononcer « pokaï », est un beau mélange de saveurs dans un bol à base de riz, sur lequel s\'ajoutent la douceur de l\'avocat, le croquant des fèves, les Oméga 3 du saumon et la fraîcheur de la mangue.', '1f74a350b829e5e52698.avif', 15.89),
(69, 'Sunrise Poké', 'Le « Sunrise Poké » est un Poké Bowl éclatant de couleurs et de saveurs, créé pour évoquer l’esprit ensoleillé des débuts de journée à Hawaï. Inspiré par les magnifiques levers de soleil sur l’océan, ce plat vous emmène dans un voyage gustatif matina', 'c96ae9233d41866e3af7.avif', 14.52),
(70, 'Poké Tropical Bliss', 'Un délicieux mélange de thon frais coupé en dés, d\'avocat crémeux, de mangue sucrée, de concombre croquant, le tout garni de graines de sésame et arrosé d\'une sauce à la mangue et au gingembre.', 'bfedba655638bdfde39a.avif', 8.98),
(71, 'Poké Méditerranéen', 'Une fusion méditerranéenne avec du saumon grillé, des tomates cerises, des olives kalamata, des épinards frais, du fromage feta émietté, le tout nappé d\'une vinaigrette au citron et à l\'huile d\'olive.', '30e53fa09e8a484c652b.avif', 27.88),
(72, 'Poké Vegan Zen', 'Un bol végétalien apaisant composé de cubes de tofu mariné, d\'avocat, de carottes râpées, d\'edamame, de radis coupés finement, de graines de chanvre et arrosé d\'une sauce au sésame', 'bec88172361f410cb349.avif', 21.89),
(73, 'Poké Hawaïen Classique', ' L\'authenticité hawaïenne dans un bol avec du thon cru, des oignons verts, de l\'oignon rouge, des algues nori croustillantes, des graines de macadamia et une sauce traditionnelle à base de sauce soja, de sésame et de mirin', 'ce917c8b9cae74049942.avif', 12.99),
(74, 'Poké Fusion Teriyaki', ' Une fusion asiatique avec du saumon mariné dans une sauce teriyaki sucrée, des avocats, des radis, des edamame, des oignons frits croustillants et une garniture de coriandre fraîche.', '1c1afb5b7460c0809d2d.avif', 17.99),
(75, 'Poké Mexicain Fiesta', 'n bol vibrant avec du poulpe grillé, du maïs grillé, des haricots noirs, du piment, de la coriandre, de la laitue iceberg, le tout couronné d\'une salsa de tomates fraîches.', '26d645b647e04867fb9e.avif', 31.88),
(76, 'Poké Buddha Bowl', 'Un bol nourrissant avec du quinoa, du saumon poché, des légumes rôtis, des avocats en tranches, des graines de citrouille grillées et une vinaigrette au tahini pour une expérience saine et équilibrée.', '98256e9558954bb10ccc.avif', 9.89),
(77, 'Poké Asiatique Fusion', ' Une fusion asiatique avec du thon épicé, des nouilles soba, des champignons shiitake sautés, des edamame, des carottes marinées, le tout arrosé d\'une sauce au sésame et garni de ciboule.', '27c17fbc70441501febc.avif', 13.58),
(78, 'Poké Miso Terre et Mer', 'Une combinaison terrestre et marine avec du saumon cru, du bœuf teriyaki, des champignons enoki, des épinards sautés, des radis marinés, le tout agrémenté d\'une sauce miso au sésame.', '861618a0da4620b5f58f.avif', 26.89),
(79, 'Poké Hawaïen Sunrise', 'Un bol qui évoque le lever du soleil à Hawaï, avec du thon à queue jaune, de la papaye sucrée, de la noix de coco râpée, du concombre, du riz vinaigré et une touche de sauce ponzu.', 'b098d156028f65c8aa9c.webp', 22.89),
(80, 'Poké Terre de Feu', 'Un bol épicé avec du saumon grillé au piment, du maïs grillé, des poivrons rouges rôtis, des oignons rouges, du quinoa, le tout couronné d\'une sauce à la mangue épicée.', '1fc1eb713b195457864b.avif', 30.54),
(82, 'Poké Açai Frisson', 'Un bol rafraîchissant avec du saumon gravlax, des baies d\'açai, des graines de chia, des kiwis en dés, des amandes effilées, le tout drapé d\'un filet de miel.', '403a32a54cbdc0fd7af5.png', 16.56),
(83, 'Poké Caliente Mexicain', 'Une explosion de saveurs mexicaines avec du poulet grillé épicé, des haricots noirs, du maïs grillé, de l\'avocat, du pico de gallo, du fromage cotija, le tout arrosé de sauce chipotle.', 'c6ce33437f587ceefbf1.avif', 32.99);

-- --------------------------------------------------------

--
-- Structure de la table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `user_type` tinyint(11) NOT NULL DEFAULT 0,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile_picture` varchar(500) NOT NULL,
  `street_number` int(11) DEFAULT NULL,
  `street_name` varchar(250) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_type`, `email`, `password`, `profile_picture`, `street_number`, `street_name`, `city_id`) VALUES
(12, 'Djoudi', 'Ben', 0, 'djoudi@gmail.com', '$2y$10$ifayeHxYdPz9.vsgQvddiO/CFgaCRTN1/aQPZ04iK4NsEEs4uPBqG', 'f6f9c9b4b1beed09814f.png', NULL, NULL, NULL),
(13, 'khaoula', 'Ouachani', 0, 'khaoula@gmail.com', '$2y$10$4YlcKmAtCmxUMC3uBdanGemIw2T/olN.Yl5QzybKZJj5HTbwYsnlu', '1c544e13868caf4e9264.jpg', NULL, NULL, NULL),
(15, 'Aya', 'Ben', 1, 'aya@gmail.com', '$2y$10$T4y3ypBOk53n8CYCRCvLfen.1zfeImvIAyfBEmRKotluNVw8U94Ji', '09eabb00135d43029f6e.jpg', NULL, NULL, NULL),
(17, 'Hristina', 'Stankova', 0, 'hristina@gmail.com', '$2y$10$T/HNDX.tQgAeBepiAj1x0e8tdPZ4UI3nm8U60WdY8H.rjjaCth0aa', 'cb537ef0e12624210a26.jpg', NULL, NULL, NULL),
(18, 'Florian', 'Morel', 0, 'florian@gmail.com', '$2y$10$DiFMeza7d7Dk5bLVphQwv.N8oVvyNWa0JxxjTXkIc4hSjIKkZ3Hcy', '32431a73613e1cee312e.avif', NULL, NULL, NULL),
(20, 'Clément', 'Charrassier', 0, 'clement@gmail.com', '$2y$10$T2Y5XiTdNbaTLB9D5h3DKumaarTubgTH5JUkujEQ4vqQ6basjlgGS', 'f5f58d431491d60f4d5d.avif', NULL, NULL, NULL),
(21, 'Yanis', 'Benyoucef', 0, 'yanis@gmail.com', '$2y$10$h3wyFidldOrFmuh0eVjJze2QU150gind9wuKMeIFV2VSERNESpH6y', '2bba9e6d2cd660596139.jpg', NULL, NULL, NULL),
(22, 'Meijuan', 'Lu', 0, 'meijuan@gmail.com', '$2y$10$TjYzn4xO0bILPsqcIu9m7.ylJXrWujivME1dTk69hReH4xbGKQSmO', '3e0fb9285dbc338a40b0.jpg', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `basket_user`
--
ALTER TABLE `basket_user`
  ADD PRIMARY KEY (`product_user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Index pour la table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`command_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `command_product`
--
ALTER TABLE `command_product`
  ADD PRIMARY KEY (`command_product_id`),
  ADD KEY `command_id` (`command_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `basket_user`
--
ALTER TABLE `basket_user`
  MODIFY `product_user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `command`
--
ALTER TABLE `command`
  MODIFY `command_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `command_product`
--
ALTER TABLE `command_product`
  MODIFY `command_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `basket_user`
--
ALTER TABLE `basket_user`
  ADD CONSTRAINT `basket_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `basket_user_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Contraintes pour la table `command`
--
ALTER TABLE `command`
  ADD CONSTRAINT `command_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `command_product`
--
ALTER TABLE `command_product`
  ADD CONSTRAINT `command_product_ibfk_1` FOREIGN KEY (`command_id`) REFERENCES `command` (`command_id`),
  ADD CONSTRAINT `command_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Contraintes pour la table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
