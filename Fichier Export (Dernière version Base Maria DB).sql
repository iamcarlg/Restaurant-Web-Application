-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 16 avr. 2021 à 14:08
-- Version du serveur :  10.3.9-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zfl2-zrugeroca`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_element_el`
--

CREATE TABLE `t_element_el` (
  `el_number` int(11) NOT NULL,
  `el_title` varchar(100) DEFAULT NULL,
  `el_descriptive` varchar(500) DEFAULT NULL,
  `el_addedDate` varchar(30) DEFAULT NULL,
  `el_image` varchar(100) DEFAULT NULL,
  `el_state` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_element_el`
--

INSERT INTO `t_element_el` (`el_number`, `el_title`, `el_descriptive`, `el_addedDate`, `el_image`, `el_state`) VALUES
(1, 'Orangina Drink', NULL, '28/01/2021', 'orangina.jpg', '0'),
(2, 'Buffalo Pizza', NULL, '2021-03-03', 'buffalo.jpg', '1'),
(3, 'Ice Scream', NULL, '28/01/2021', 'glace.jpg', '0'),
(4, 'Calzone Pizza', NULL, '28/01/2021', 'calzone.jpg', '1'),
(5, 'Chicken BBQ Pizza', NULL, '28/01/2021', 'chicken-bbq.jpg', '1'),
(6, 'Chicken Cheese Pizza', NULL, '28/01/2021', 'chicken-cheese.jpg', '0'),
(7, 'Chorizo Pizza', NULL, '28/01/2021', 'chorizo.jpg', '1'),
(8, 'Chocolate Cake', NULL, '2021-04-15', 'chocolate.jpg', '1'),
(9, 'Crepe Menu', NULL, '2021-04-15', 'crepe.jpeg', '1');

-- --------------------------------------------------------

--
-- Structure de la table `t_liaison_li`
--

CREATE TABLE `t_liaison_li` (
  `sel_number` int(11) NOT NULL,
  `el_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_liaison_li`
--

INSERT INTO `t_liaison_li` (`sel_number`, `el_number`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 9),
(2, 1),
(2, 3),
(2, 8),
(2, 9),
(3, 1),
(3, 3),
(3, 5),
(3, 7),
(4, 1),
(4, 3),
(4, 6),
(4, 8),
(4, 9);

-- --------------------------------------------------------

--
-- Structure de la table `t_link_link`
--

CREATE TABLE `t_link_link` (
  `link_number` int(11) NOT NULL,
  `link_title` varchar(100) DEFAULT NULL,
  `link_url` varchar(200) DEFAULT NULL,
  `link_author` varchar(100) DEFAULT NULL,
  `link_pubDate` varchar(30) DEFAULT NULL,
  `el_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_link_link`
--

INSERT INTO `t_link_link` (`link_number`, `link_title`, `link_url`, `link_author`, `link_pubDate`, `el_number`) VALUES
(1, 'Buffalo', NULL, 'Administrateur', '28/01/2021', 1),
(2, 'Calzone', 'https://www.google.com/', 'Carl', '28/01/2021', 2),
(3, 'Chicken BBQ', NULL, 'Delon', '28/01/2021', 2),
(4, 'Balance connectée', NULL, 'gestionnaire1', '28/01/2021', 4),
(5, 'Chicken Cheese', NULL, 'Alpha', '28/01/2021', 5);

-- --------------------------------------------------------

--
-- Structure de la table `t_news_new`
--

CREATE TABLE `t_news_new` (
  `acc_pseudo` varchar(64) DEFAULT NULL,
  `new_number` int(1) NOT NULL,
  `new_title` varchar(100) DEFAULT NULL,
  `new_text` varchar(500) DEFAULT NULL,
  `new_pubDate` varchar(30) DEFAULT NULL,
  `new_state` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_news_new`
--

INSERT INTO `t_news_new` (`acc_pseudo`, `new_number`, `new_title`, `new_text`, `new_pubDate`, `new_state`) VALUES
('gestionnaire1', 1, 'The delicious Burger', 'A soft bread with corn chips, an old-fashioned mustard sauce, crispy onions, slices of bacon, slices of melted cheddar and two flame-grilled beef meats!', '2021-02-08', '1'),
('Delon19', 2, 'The Famous Calzone Pizza', 'The Italian term can be translated as \"slipper\"; it is indeed a pizza folded in half to make a dough generally stuffed with mozzarella and tomatoes, and with ham (possibly). Italians consume it during meals as an antipasto (assortment of starters), as a main course or as a snack in the afternoon.\r\n\r\nMost often, calzone pizzas are prepared by a caterer at the customer\'s request and are eaten very hot.', '2021-02-08', '1'),
('Dane14', 3, 'The Breathtaking BBQ Cheese & Bacon', 'Discover a real good classic: melted cheese, bacon, onions and of course its flame grilled meat. All accompanied by a BBQ sauce and a smoked sauce!', '2021-02-08', '1'),
('Alpha18', 4, 'The Breathtaking Chicken Cheese', 'Discover the best chicken with the best ingredients in it', '2021-02-08', '0'),
('gestionnaire1', 5, 'The Delicious Buffalo Pizza', ' A wonderful mix of ingredients to bring the best customer experience in fooding\r\n              ', '2021-04-15', '0'),
('tuctuc15', 6, 'testvm', ' \r\n              eval1504', '2021-04-15', '1');

-- --------------------------------------------------------

--
-- Structure de la table `t_presentation_pre`
--

CREATE TABLE `t_presentation_pre` (
  `acc_pseudo` varchar(64) DEFAULT NULL,
  `pre_number` int(11) NOT NULL,
  `pre_struct` varchar(100) DEFAULT NULL,
  `pre_address` varchar(100) DEFAULT NULL,
  `pre_mail` varchar(100) DEFAULT NULL,
  `pre_phoneNumber` varchar(64) DEFAULT NULL,
  `pre_welcomeText` varchar(500) DEFAULT NULL,
  `pre_openingHour` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_presentation_pre`
--

INSERT INTO `t_presentation_pre` (`acc_pseudo`, `pre_number`, `pre_struct`, `pre_address`, `pre_mail`, `pre_phoneNumber`, `pre_welcomeText`, `pre_openingHour`) VALUES
('gestionnaire1', 1, NULL, '32 Rue Albert Louppe', 'rugerocarlgauss@gmail.com', '06-26-39-74-34', 'Welcome to Maestro', '08-18');

-- --------------------------------------------------------

--
-- Structure de la table `t_selection_sel`
--

CREATE TABLE `t_selection_sel` (
  `acc_pseudo` varchar(64) DEFAULT NULL,
  `sel_number` int(11) NOT NULL,
  `sel_title` varchar(100) DEFAULT NULL,
  `sel_introText` varchar(100) DEFAULT NULL,
  `sel_date` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_selection_sel`
--

INSERT INTO `t_selection_sel` (`acc_pseudo`, `sel_number`, `sel_title`, `sel_introText`, `sel_date`) VALUES
('gestionnaire1', 1, 'Buffalo', 'A soft dough garnished with spicy beef and grilled peppers', '2021-02-08 19:24:58'),
('Delon19', 2, 'Calzone', 'A folded pizza stuffed with mozzarella and tomatoes, and with ham.', '28/01/2021'),
('Alpha18', 4, 'Chicken Cheese', 'The act of sticking anything pointed near or in someone\'s clothed anal hole, and yelling', '2021-02-08 19:24:58');

-- --------------------------------------------------------

--
-- Structure de la table `t_useraccount_acc`
--

CREATE TABLE `t_useraccount_acc` (
  `acc_pseudo` varchar(64) NOT NULL,
  `acc_mdp` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_useraccount_acc`
--

INSERT INTO `t_useraccount_acc` (`acc_pseudo`, `acc_mdp`) VALUES
('Alpha18', '42294e3e9b22d6fc9b9fb3e47a5dfbde'),
('Amissi20', 'a0df931e7a7f9b608c165504bde9b620'),
('carl1921', 'a0df931e7a7f9b608c165504bde9b620'),
('Dane14', 'a797de8051b0d92aebdb28840ff9aef9'),
('delon12', '4e2a3a9864d0e344cf435c98cb4e1128'),
('Delon19', 'a797de8051b0d92aebdb28840ff9aef9'),
('Fatou1', 'a0df931e7a7f9b608c165504bde9b620'),
('florian19', 'a0df931e7a7f9b608c165504bde9b620'),
('gestionnaire1', '388d4ca7d89f912a8fe96b04fb3d8e22'),
('gestionnaire2', '388d4ca7d89f912a8fe96b04fb3d8e22'),
('gestionnaire3', '388d4ca7d89f912a8fe96b04fb3d8e22'),
('tuctuc15', 'a0df931e7a7f9b608c165504bde9b620'),
('yassine20', 'a0df931e7a7f9b608c165504bde9b620');

-- --------------------------------------------------------

--
-- Structure de la table `t_userprofile_usr`
--

CREATE TABLE `t_userprofile_usr` (
  `acc_pseudo` varchar(64) NOT NULL,
  `usr_lastName` varchar(64) DEFAULT NULL,
  `usr_firstName` varchar(64) DEFAULT NULL,
  `usr_mail` varchar(64) DEFAULT NULL,
  `usr_validity` char(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `usr_statut` char(1) DEFAULT NULL,
  `usr_creationDate` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_userprofile_usr`
--

INSERT INTO `t_userprofile_usr` (`acc_pseudo`, `usr_lastName`, `usr_firstName`, `usr_mail`, `usr_validity`, `usr_statut`, `usr_creationDate`) VALUES
('Alpha18', 'Alpha', 'Oumar', 'AlphaOumar@gmail.com', 'D', 'R', '2020-02-05'),
('Amissi20', 'Amissi', 'Decouverte', 'decouverte.amissi@gmail.com', 'A', 'R', '2021-04-15'),
('carl1921', 'Rugamba', 'Delon', 'rugambadelon@gmail.com', 'A', 'R', '2021-04-15'),
('Dane14', 'Ishaka', 'Dane-stevie', 'Ishaka@gmail.com', 'D', 'R', '2020-02-05'),
('delon12', 'Rugamba', 'Delon', 'rugambadelon@gmail.com', 'A', 'R', '2021-04-10'),
('Delon19', 'Rugamba', 'Delon-Nixon', 'rugamba@gmail.com', 'A', 'R', '2020-02-05'),
('Fatou1', 'Ndiaye', 'Fatou', 'fatou.peyre@gmail.com', 'A', 'R', '2021-04-12'),
('florian19', 'Valois', 'Manuel', 'valois.manuel@gmail.com', 'A', 'R', '2021-04-10'),
('gestionnaire1', 'Rugero', 'carl gauss', 'rugerocarlgauss@gmail.com', 'A', 'A', '2021-04-09'),
('gestionnaire2', 'Rugamba', 'Delon', 'rugambadelon@gmail.com', 'A', 'A', '2021-04-11'),
('gestionnaire3', 'Rugamba', 'Delon', 'gestionnaire3@gmail.com', 'A', 'A', '2021-04-12'),
('tuctuc15', 'o\'brian', 'carl', 'carl@gmail.com', 'A', 'R', '2021-04-15'),
('yassine20', 'Ouakili', 'Yassine', 'yassine.ouakili@hotmail.fr', 'D', 'R', '2021-04-12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_liaison_li`
--
ALTER TABLE `t_liaison_li`
  ADD PRIMARY KEY (`sel_number`,`el_number`),
  ADD KEY `el_number` (`el_number`);

--
-- Index pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD PRIMARY KEY (`new_number`),
  ADD KEY `acc_pseudo` (`acc_pseudo`);

--
-- Index pour la table `t_presentation_pre`
--
ALTER TABLE `t_presentation_pre`
  ADD PRIMARY KEY (`pre_number`),
  ADD KEY `acc_pseudo` (`acc_pseudo`);

--
-- Index pour la table `t_selection_sel`
--
ALTER TABLE `t_selection_sel`
  ADD PRIMARY KEY (`sel_number`),
  ADD KEY `acc_pseudo` (`acc_pseudo`);

--
-- Index pour la table `t_useraccount_acc`
--
ALTER TABLE `t_useraccount_acc`
  ADD PRIMARY KEY (`acc_pseudo`);

--
-- Index pour la table `t_userprofile_usr`
--
ALTER TABLE `t_userprofile_usr`
  ADD PRIMARY KEY (`acc_pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  MODIFY `new_number` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10035;

--
-- AUTO_INCREMENT pour la table `t_presentation_pre`
--
ALTER TABLE `t_presentation_pre`
  MODIFY `pre_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_selection_sel`
--
ALTER TABLE `t_selection_sel`
  MODIFY `sel_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD CONSTRAINT `t_news_new_ibfk_1` FOREIGN KEY (`acc_pseudo`) REFERENCES `t_useraccount_acc` (`acc_pseudo`);

--
-- Contraintes pour la table `t_presentation_pre`
--
ALTER TABLE `t_presentation_pre`
  ADD CONSTRAINT `t_presentation_pre_ibfk_1` FOREIGN KEY (`acc_pseudo`) REFERENCES `t_useraccount_acc` (`acc_pseudo`);

--
-- Contraintes pour la table `t_selection_sel`
--
ALTER TABLE `t_selection_sel`
  ADD CONSTRAINT `t_selection_sel_ibfk_1` FOREIGN KEY (`acc_pseudo`) REFERENCES `t_useraccount_acc` (`acc_pseudo`);

--
-- Contraintes pour la table `t_userprofile_usr`
--
ALTER TABLE `t_userprofile_usr`
  ADD CONSTRAINT `t_userprofile_usr_ibfk_1` FOREIGN KEY (`acc_pseudo`) REFERENCES `t_useraccount_acc` (`acc_pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
