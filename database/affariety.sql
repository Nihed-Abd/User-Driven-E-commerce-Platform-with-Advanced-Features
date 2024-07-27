-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 26 mars 2024 à 02:47
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `affariety`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `nom`, `categorie`, `prix`) VALUES
(1, 'vase', 'meuble', 12),
(2, 'vase', 'meuble', 14),
(3, 'vase', 'meuble', 15);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_c` int(11) NOT NULL,
  `nom_c` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_c`, `nom_c`) VALUES
(52, 'Canapés'),
(54, 'Literie'),
(55, 'Cuisine');

-- --------------------------------------------------------

--
-- Structure de la table `categoriecodepromo`
--

CREATE TABLE `categoriecodepromo` (
  `idCcp` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `valeur` int(11) NOT NULL,
  `limite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categoriecodepromo`
--

INSERT INTO `categoriecodepromo` (`idCcp`, `code`, `valeur`, `limite`) VALUES
(9, '12', 14, 45),
(10, '100', 10, 10),
(11, '15', 101, 111),
(12, '12', 14, 123);

-- --------------------------------------------------------

--
-- Structure de la table `codepromo`
--

CREATE TABLE `codepromo` (
  `idCode` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `idCategorieCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `cmd_client` int(11) NOT NULL,
  `cmd_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `etat`, `cmd_client`, `cmd_date`) VALUES
(96, 'confirme', 76, '2024-02-29 05:11:35'),
(97, 'en cours', 45, '2024-02-29 08:48:47'),
(98, 'en cours', 12, '2024-02-29 16:21:51'),
(99, 'en cours', 54, '2024-03-01 20:44:34'),
(100, 'nullllls', 12, '2024-03-07 08:14:56');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` int(11) NOT NULL,
  `id_pub` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `contenu` varchar(5000) NOT NULL,
  `date_com` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_com`, `id_pub`, `id_client`, `contenu`, `date_com`) VALUES
(13, 95, 109, 'hello from inde', '2024-03-07 14:30:57');

-- --------------------------------------------------------

--
-- Structure de la table `depot`
--

CREATE TABLE `depot` (
  `iddepot` int(255) NOT NULL,
  `nomdepot` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `depot`
--

INSERT INTO `depot` (`iddepot`, `nomdepot`, `adresse`) VALUES
(1, 'DepotAlpha', 'tunis'),
(3, 'magasinlocal', 'Touza');

-- --------------------------------------------------------

--
-- Structure de la table `detailscommande`
--

CREATE TABLE `detailscommande` (
  `id` int(11) NOT NULL,
  `id_com` int(11) NOT NULL,
  `num_article` int(11) NOT NULL,
  `nom_article` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unitaire` float NOT NULL,
  `sous_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `detailscommande`
--

INSERT INTO `detailscommande` (`id`, `id_com`, `num_article`, `nom_article`, `quantite`, `prix_unitaire`, `sous_total`) VALUES
(13, 96, 11, 'canape', 4, 200, 800),
(14, 97, 8, 'vase', 3, 120, 360);

-- --------------------------------------------------------

--
-- Structure de la table `discount`
--

CREATE TABLE `discount` (
  `idD` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `codePromoId` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE `enchere` (
  `enchere_id` int(11) NOT NULL,
  `idclcreree` varchar(255) NOT NULL,
  `date_debut` varchar(255) DEFAULT NULL,
  `heured` varchar(5) NOT NULL,
  `date_fin` varchar(255) DEFAULT NULL,
  `heuref` varchar(5) NOT NULL,
  `montant_initial` varchar(255) DEFAULT NULL,
  `nom_enchere` varchar(255) NOT NULL,
  `montant_final` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `idclenchere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `grosmots`
--

CREATE TABLE `grosmots` (
  `id_GM` int(11) NOT NULL,
  `GrosMots` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(30) NOT NULL,
  `iddepot` int(255) DEFAULT NULL,
  `adresselivraison` varchar(255) NOT NULL,
  `datecommande` datetime NOT NULL,
  `datelivraison` datetime NOT NULL DEFAULT current_timestamp(),
  `statuslivraison` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id`, `iddepot`, `adresselivraison`, `datecommande`, `datelivraison`, `statuslivraison`, `latitude`, `longitude`) VALUES
(260, NULL, 'monastir', '2024-02-29 11:37:27', '2024-02-29 00:00:00', 'En cours', 0, 0),
(261, 1, 'tunis', '2024-02-29 11:37:40', '2024-02-29 00:00:00', 'En cours', 0, 0),
(267, 3, 'ariana', '2024-03-04 15:48:06', '2024-03-04 00:00:00', 'En cours', 77777, 888888),
(271, 3, 'monastir', '2024-03-05 02:22:22', '2025-02-01 00:00:00', 'En attente', 7777780000, 7777),
(273, 1, 'tunis', '2024-03-05 02:26:25', '2024-03-07 00:00:00', 'En attente', 45278, 10000000),
(274, 1, 'ariana', '2024-03-05 02:31:56', '2024-03-05 00:00:00', 'En cours', 52413, 785214),
(275, 1, 'cheraa ghana', '2024-03-05 23:38:13', '2024-04-07 00:00:00', 'En cours', 0, 7),
(276, 1, 'ariana', '2024-03-07 09:58:31', '2024-03-08 00:00:00', 'En cours', 36.9165, 10.0718),
(277, 1, 'ariana', '2024-03-07 12:58:25', '2024-03-08 00:00:00', 'En attente', 36.9175, 10.0818);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `nom_article` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `nom_article`, `prix`) VALUES
(23, 'Canape en velour', 120),
(24, 'Table', 250);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_p` int(11) NOT NULL,
  `id_c` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `nom_p` varchar(300) NOT NULL,
  `description_p` varchar(300) NOT NULL,
  `prix_p` float NOT NULL,
  `image_p` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_p`, `id_c`, `id_client`, `nom_p`, `description_p`, `prix_p`, `image_p`) VALUES
(81, 52, 113, 'Canape en velour', 'Canapé en velour luxueux', 120, 'tn.esprit.affariety.image/1709393165371_salon.jpg'),
(82, 55, 113, 'Table', 'Table ronde 4 places', 250, 'tn.esprit.affariety.image/1709397611362_Table.jpg'),
(83, 54, 111, 'Lit 2 places', 'Lit 2 places en cuir ', 400, 'tn.esprit.affariety.image/1709397799068_Lit.jpg'),
(84, 52, 109, 'Canapé 2 places', 'Canapé comfortable 2 places', 240, 'tn.esprit.affariety.image/1709397974934_Canapé.jpg'),
(85, 52, 113, 'Etagères', 'Etagères en fer noir ', 199.99, 'tn.esprit.affariety.image/1709402749775_étagères.jpg'),
(86, 52, 113, 'Miroir ronde ', 'Miroir ronde bordure ', 330, 'tn.esprit.affariety.image/1709403110437_mirour.jpg'),
(87, 52, 111, 'Salon beige', 'Salon 6 places couleur beige', 1500, 'tn.esprit.affariety.image/1709727368346_salon.jpg'),
(88, 52, 113, 'salon', 'fcfgvhjkl', 300, 'tn.esprit.affariety.image/1709782120034_0F1A0231.jpg'),
(89, 52, 117, 'salon', 'salon comfortable', 240.99, 'tn.esprit.affariety.image/1709821030454_salon.jpg'),
(90, 52, 118, 'Salon velour ', 'Salon violet ', 13000, 'tn.esprit.affariety.image/1710092465167_salon.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_pub` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `nb_likes` int(11) NOT NULL,
  `nb_dislike` int(11) NOT NULL,
  `date_pub` datetime NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_pub`, `id_client`, `contenu`, `nb_likes`, `nb_dislike`, `date_pub`, `photo`) VALUES
(95, 109, 'vggyhj', 0, 0, '2024-03-07 14:22:15', 'C:\\Users\\Lenovo\\IdeaProjects\\Affariety\\src\\main\\resources\\tn\\esprit\\affariety\\click.png'),
(96, 117, 'Bonjour tout le modne', 0, 0, '2024-03-07 15:35:42', 'C:\\Users\\Lenovo\\IdeaProjects\\Affariety\\src\\main\\resources\\tn\\esprit\\affariety\\82250-removebg-preview.png');

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rating`
--

INSERT INTO `rating` (`rating_id`, `user_id`, `product_id`, `rating_value`) VALUES
(7, 117, 81, 5),
(8, 114, 81, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ticketp`
--

CREATE TABLE `ticketp` (
  `ticketp_id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `enchere_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ticket_enchere`
--

CREATE TABLE `ticket_enchere` (
  `ticket_id` int(11) NOT NULL,
  `enchere_id` int(11) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `verificationCode` varchar(300) NOT NULL,
  `role` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `mdp`, `status`, `nom`, `prenom`, `verificationCode`, `role`) VALUES
(109, 'salimmahdi680@gmail.com', '$2a$10$7MsScNUzC3pbNxSXLkanEOsuIaXfo.lL55LFFnoqpi99GwbThTjj2', 0, 'koussay', 'riahiii', 'djcsjs', 'client'),
(111, 'chaimatlili68@gmail.com', '$2a$10$mIMyKilns2fPKkTQBxJY..T2KCkPWwH47VNNmra78YNhuq6las1Eq', 0, 'riahi', 'chayma', 'xrasul', 'client'),
(113, 'younesmanita975@gmail.com', '$2a$10$Lal6Gj.SITgMpr6NBNXOvuKQLCxDHuTxjk0r9jAarw3LePOlwuuoq', 1, 'manita', 'younes', 'ggccct', 'client'),
(114, 'ghada.benmansour@esprit.tn', '$2a$10$.64y7eJTIpEK/7yBzEayVOh2Uk7XFuf4Fgylch/4wbYO0brENCqqi', 1, 'Ben Mansour', 'Ghada', 'uvlyck', 'client'),
(115, 'maram.rezgui@esprit.tn', '$2a$10$nEp3amnuE9MNyqaJgXWFSOsnHCpD23f8o5FvuEK5J//YNbyyyuAX6', 1, 'Rezgui', 'Maram', 'kmudos', 'admin'),
(116, 'khaled.guedria.1gmail.com', '$2a$10$JrnTOWO9brGI87wLni3yEuQg/x32BatZuP1v9PdgnSYXL0KnP.Znm', 1, 'GUEDRIA', 'KHALED', 'qynibw', 'client'),
(117, 'khaled.guedria.1@gmail.com', '$2a$10$I03xaO1IT1ONJi6MtVwz0OskXq40nhSU6.SgDZfq28rNT.SIxhIjG', 1, 'Guedria', 'Khaled', 'qorsok', 'client'),
(118, 'nadia.bayrem@gmail.com', '$2a$10$.CNH/7NiDXH.5uqoFmHJkOsrQAqTOn7MnYYVYg58IGEbQmzUv08Eu', 1, 'ben mansour', 'nadia', 'epdeil', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_c`);

--
-- Index pour la table `categoriecodepromo`
--
ALTER TABLE `categoriecodepromo`
  ADD PRIMARY KEY (`idCcp`);

--
-- Index pour la table `codepromo`
--
ALTER TABLE `codepromo`
  ADD PRIMARY KEY (`idCode`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `fk_commentaire_id_pub` (`id_pub`),
  ADD KEY `fk_commentaire_user` (`id_client`);

--
-- Index pour la table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`iddepot`);

--
-- Index pour la table `detailscommande`
--
ALTER TABLE `detailscommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_com` (`id_com`);

--
-- Index pour la table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`idD`);

--
-- Index pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`enchere_id`);

--
-- Index pour la table `grosmots`
--
ALTER TABLE `grosmots`
  ADD PRIMARY KEY (`id_GM`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_depot` (`iddepot`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_c` (`id_c`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_pub`),
  ADD KEY `fk_publication_user` (`id_client`);

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `ticketp`
--
ALTER TABLE `ticketp`
  ADD PRIMARY KEY (`ticketp_id`);

--
-- Index pour la table `ticket_enchere`
--
ALTER TABLE `ticket_enchere`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `categoriecodepromo`
--
ALTER TABLE `categoriecodepromo`
  MODIFY `idCcp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `codepromo`
--
ALTER TABLE `codepromo`
  MODIFY `idCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `depot`
--
ALTER TABLE `depot`
  MODIFY `iddepot` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `detailscommande`
--
ALTER TABLE `detailscommande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `discount`
--
ALTER TABLE `discount`
  MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enchere`
--
ALTER TABLE `enchere`
  MODIFY `enchere_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `grosmots`
--
ALTER TABLE `grosmots`
  MODIFY `id_GM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `ticketp`
--
ALTER TABLE `ticketp`
  MODIFY `ticketp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ticket_enchere`
--
ALTER TABLE `ticket_enchere`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_id_pub` FOREIGN KEY (`id_pub`) REFERENCES `publication` (`id_pub`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_commentaire_user` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `detailscommande`
--
ALTER TABLE `detailscommande`
  ADD CONSTRAINT `detailscommande_ibfk_1` FOREIGN KEY (`id_com`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `fk_depot` FOREIGN KEY (`iddepot`) REFERENCES `depot` (`iddepot`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `categorie` (`id_c`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `fk_publication_user` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id_p`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
