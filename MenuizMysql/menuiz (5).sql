-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 juin 2022 à 16:42
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `menuiz`
--
CREATE DATABASE IF NOT EXISTS `menuiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `menuiz`;

-- --------------------------------------------------------

--
-- Structure de la table `t_d_address_adr`
--

DROP TABLE IF EXISTS `t_d_address_adr`;
CREATE TABLE `t_d_address_adr` (
  `ADR_ID` int(11) NOT NULL,
  `ADR_FIRSTNAME` varchar(1024) NOT NULL,
  `ADR_LASTNAME` varchar(1024) NOT NULL,
  `ADR_LINE1` varchar(1024) NOT NULL,
  `ADR_LINE2` varchar(1024) DEFAULT NULL,
  `ADR_LINE3` varchar(1024) DEFAULT NULL,
  `ADR_ZIPCODE` varchar(1024) NOT NULL,
  `ADR_CITY` varchar(1024) NOT NULL,
  `ADR_COUNTRY` varchar(1024) NOT NULL,
  `ADR_MAIL` varchar(1024) NOT NULL,
  `ADR_PHONE` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_address_adr`
--

INSERT INTO `t_d_address_adr` (`ADR_ID`, `ADR_FIRSTNAME`, `ADR_LASTNAME`, `ADR_LINE1`, `ADR_LINE2`, `ADR_LINE3`, `ADR_ZIPCODE`, `ADR_CITY`, `ADR_COUNTRY`, `ADR_MAIL`, `ADR_PHONE`) VALUES
(1, 'Non renseigné', '', '', NULL, NULL, '', '', '', '', ''),
(2, 'Gwenou', 'lepierrot', '10 rue de laporte', NULL, NULL, '27500', 'Evreux', 'FRANCE', 'gwen@hotmail.fr', '0694425635'),
(3, 'Gwen2', 'lepierres2', '12 rue de laporte', NULL, NULL, '56420', 'plumelec', 'FRANCE', 'gwen2@hotmail.fr', '0694465758'),
(4, 'Gwen3', 'lepierres3', '13 rue de laporte', NULL, NULL, '56426', 'plume', 'FRANCE', 'gwen3@hotmail.fr', '0694545758');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_expeditiontype_ety`
--

DROP TABLE IF EXISTS `t_d_expeditiontype_ety`;
CREATE TABLE `t_d_expeditiontype_ety` (
  `ETY_ID` int(11) NOT NULL,
  `ETY_WORDING` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_expeditiontype_ety`
--

INSERT INTO `t_d_expeditiontype_ety` (`ETY_ID`, `ETY_WORDING`) VALUES
(1, 'Colissimo'),
(2, 'Transporteur interne'),
(3, 'Chronopost');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_expedition_exp`
--

DROP TABLE IF EXISTS `t_d_expedition_exp`;
CREATE TABLE `t_d_expedition_exp` (
  `EXP_ID` int(11) NOT NULL,
  `EXP_WEIGTH` decimal(8,2) DEFAULT NULL,
  `EXP_TRACKINGNUMBER` varchar(1024) DEFAULT NULL,
  `EXP_SENTDATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_expedition_exp`
--

INSERT INTO `t_d_expedition_exp` (`EXP_ID`, `EXP_WEIGTH`, `EXP_TRACKINGNUMBER`, `EXP_SENTDATE`) VALUES
(1, '1.00', 'nann', '2022-06-07 14:10:44'),
(2, '1.00', 'nann', '2022-06-07 14:11:48'),
(3, '1.00', 'nann', '2022-06-07 14:11:55'),
(4, '1.00', 'nann', '2022-06-07 14:12:15'),
(5, '1.00', 'nann', '2022-06-07 14:12:45'),
(6, '1.00', 'nann', '2022-06-07 14:13:45');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_orderdetails_odt`
--

DROP TABLE IF EXISTS `t_d_orderdetails_odt`;
CREATE TABLE `t_d_orderdetails_odt` (
  `OHR_ID` int(11) NOT NULL,
  `PRD_ID` int(11) NOT NULL,
  `EXP_ID` int(11) NOT NULL,
  `ODT_QUANTITY` int(11) NOT NULL,
  `ODT_ISCANCELED` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_orderdetails_odt`
--

INSERT INTO `t_d_orderdetails_odt` (`OHR_ID`, `PRD_ID`, `EXP_ID`, `ODT_QUANTITY`, `ODT_ISCANCELED`) VALUES
(1, 2, 1, 5, 0),
(2, 4, 2, 5, 0),
(3, 3, 3, 1, 0),
(4, 5, 4, 1, 0),
(6, 8, 6, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_d_orderheader_ohr`
--

DROP TABLE IF EXISTS `t_d_orderheader_ohr`;
CREATE TABLE `t_d_orderheader_ohr` (
  `OHR_ID` int(11) NOT NULL,
  `ADR_ID_LIV` int(11) NOT NULL,
  `ADR_ID_FAC` int(11) NOT NULL,
  `PMT_ID` int(11) NOT NULL,
  `OSS_ID` int(11) NOT NULL,
  `ETY_ID` int(11) NOT NULL,
  `USR_ID` int(11) NOT NULL,
  `OHR_NUMBER` varchar(1024) NOT NULL,
  `OHR_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_orderheader_ohr`
--

INSERT INTO `t_d_orderheader_ohr` (`OHR_ID`, `ADR_ID_LIV`, `ADR_ID_FAC`, `PMT_ID`, `OSS_ID`, `ETY_ID`, `USR_ID`, `OHR_NUMBER`, `OHR_DATE`) VALUES
(1, 2, 2, 1, 1, 3, 1, '1', '2022-06-07 13:06:16'),
(2, 2, 2, 3, 3, 1, 1, '2', '2022-06-07 13:10:03'),
(3, 3, 3, 5, 2, 2, 2, '3', '2022-06-07 13:11:45'),
(4, 3, 3, 5, 2, 2, 2, '4', '2022-06-07 13:13:06'),
(5, 4, 4, 1, 4, 3, 3, '5', '2022-06-07 13:13:49'),
(6, 4, 4, 1, 4, 3, 3, '6', '2022-06-07 13:14:15');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_orderstatus_oss`
--

DROP TABLE IF EXISTS `t_d_orderstatus_oss`;
CREATE TABLE `t_d_orderstatus_oss` (
  `OSS_ID` int(11) NOT NULL,
  `OSS_WORDING` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_orderstatus_oss`
--

INSERT INTO `t_d_orderstatus_oss` (`OSS_ID`, `OSS_WORDING`) VALUES
(1, 'En cours'),
(2, 'Annulé'),
(3, 'Livré totalement'),
(4, 'Livré Partiellement');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_paymenttype_pmt`
--

DROP TABLE IF EXISTS `t_d_paymenttype_pmt`;
CREATE TABLE `t_d_paymenttype_pmt` (
  `PMT_ID` int(11) NOT NULL,
  `PMT_WORDING` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_paymenttype_pmt`
--

INSERT INTO `t_d_paymenttype_pmt` (`PMT_ID`, `PMT_WORDING`) VALUES
(1, 'CB'),
(2, 'Espèces'),
(3, 'Virement'),
(5, 'chèque');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_productkit_kit`
--

DROP TABLE IF EXISTS `t_d_productkit_kit`;
CREATE TABLE `t_d_productkit_kit` (
  `PRD_ID_KIT` int(11) NOT NULL,
  `PRD_ID_COMPONENT` int(11) NOT NULL,
  `KIT_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_productkit_kit`
--

INSERT INTO `t_d_productkit_kit` (`PRD_ID_KIT`, `PRD_ID_COMPONENT`, `KIT_QUANTITY`) VALUES
(1, 2, 100),
(1, 3, 15),
(9, 6, 35),
(9, 7, 35),
(10, 4, 85),
(10, 5, 85),
(11, 5, 12),
(11, 8, 85),
(12, 5, 125),
(12, 6, 125),
(13, 3, 10),
(13, 4, 10);

-- --------------------------------------------------------

--
-- Structure de la table `t_d_producttype_pty`
--

DROP TABLE IF EXISTS `t_d_producttype_pty`;
CREATE TABLE `t_d_producttype_pty` (
  `PTY_ID` int(11) NOT NULL,
  `PTY_DESCRIPTION` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_producttype_pty`
--

INSERT INTO `t_d_producttype_pty` (`PTY_ID`, `PTY_DESCRIPTION`) VALUES
(1, 'KIT'),
(2, 'UNITAIRE');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_product_prd`
--

DROP TABLE IF EXISTS `t_d_product_prd`;
CREATE TABLE `t_d_product_prd` (
  `PRD_ID` int(11) NOT NULL,
  `SPL_ID` int(11) NOT NULL,
  `PTY_ID` int(11) NOT NULL,
  `PRD_DESCRIPTION` varchar(1024) NOT NULL,
  `PRD_GUARANTEE` smallint(6) NOT NULL,
  `PRD_PICTURE` longtext DEFAULT NULL,
  `PRD_PRICE` decimal(8,2) DEFAULT NULL,
  `PRD_DEFINITION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_product_prd`
--

INSERT INTO `t_d_product_prd` (`PRD_ID`, `SPL_ID`, `PTY_ID`, `PRD_DESCRIPTION`, `PRD_GUARANTEE`, `PRD_PICTURE`, `PRD_PRICE`, `PRD_DEFINITION`) VALUES
(1, 1, 1, 'Produit 1', 24, 'https://cdn.monsieurtshirt.com/images/14906/product_large/t-shirt-homme-sacre-breton.jpg?1627897481802&additionalExtensions=WEBP&additionalExtensions=AVIF', '60.00', NULL),
(2, 1, 2, 'Produit 2', 24, 'https://cdn.monsieurtshirt.com/images/14907/product_large/t-shirt-homme-sacre-breton.jpg?1627897886453&additionalExtensions=WEBP&additionalExtensions=AVIF', '50.00', NULL),
(3, 3, 2, 'Produit 3', 24, 'https://cdn.monsieurtshirt.com/images/14908/product_large/t-shirt-homme-sacre-breton.jpg?1627897882226&additionalExtensions=WEBP&additionalExtensions=AVIF', '75.00', NULL),
(4, 3, 2, 'Produit 4', 24, 'https://cdn.monsieurtshirt.com/images/14909/product_large/t-shirt-homme-sacre-breton.jpg?1627896756672&additionalExtensions=WEBP&additionalExtensions=AVIF', '74.00', NULL),
(5, 4, 2, 'Produit 5', 24, 'https://cdn.monsieurtshirt.com/images/14911/product_large/t-shirt-homme-sacre-breton.jpg?1627897603495&additionalExtensions=WEBP&additionalExtensions=AVIF', '70.00', NULL),
(6, 4, 2, 'Produit 6', 24, 'https://www.amikado.com/photo/mug-breton-personnalise_500.webp', '70.00', NULL),
(7, 5, 2, 'Produit 7', 24, 'https://www.amikado.com/photo/mug-breton-personnalise_500.webp', '70.00', NULL),
(8, 5, 2, 'Produit 8', 24, 'https://www.amikado.com/photo/mug-breton-personnalise_500.webp', '70.00', NULL),
(9, 6, 1, 'Produit 9', 24, 'https://www.amikado.com/photo/mug-breton-personnalise_500.webp', '125.00', NULL),
(10, 6, 1, 'Produit 10', 24, 'https://www.amikado.com/photo/mug-breton-personnalise_500.webp', '125.00', NULL),
(11, 4, 1, 'Produit 11', 24, 'https://www.amikado.com/photo/mug-breton-personnalise_500.webp', '125.00', NULL),
(12, 4, 1, 'Produit 12', 24, 'https://www.amikado.com/photo/mug-breton-personnalise_500.webp', '125.00', NULL),
(13, 5, 1, 'Produit 13', 24, 'https://www.amikado.com/photo/mug-breton-personnalise_500.webp', '125.00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_d_supplier_spl`
--

DROP TABLE IF EXISTS `t_d_supplier_spl`;
CREATE TABLE `t_d_supplier_spl` (
  `SPL_ID` int(11) NOT NULL,
  `SPL_NAME` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_supplier_spl`
--

INSERT INTO `t_d_supplier_spl` (`SPL_ID`, `SPL_NAME`) VALUES
(1, 'Amazon'),
(2, 'Fnac'),
(3, 'Orange'),
(4, 'Orange'),
(5, 'Microsoft'),
(6, 'Non renseigné');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_usertype_uty`
--

DROP TABLE IF EXISTS `t_d_usertype_uty`;
CREATE TABLE `t_d_usertype_uty` (
  `UTY_ID` int(11) NOT NULL,
  `UTY_TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_d_usertype_uty`
--

INSERT INTO `t_d_usertype_uty` (`UTY_ID`, `UTY_TYPE`) VALUES
(1, 'VISITOR'),
(2, 'ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_user_usr`
--

DROP TABLE IF EXISTS `t_d_user_usr`;
CREATE TABLE `t_d_user_usr` (
  `USR_ID` int(11) NOT NULL,
  `ADR_ID` int(11) DEFAULT NULL,
  `USR_MAIL` varchar(1024) NOT NULL,
  `USR_PASSWORD` varchar(1024) NOT NULL,
  `USR_FIRSTNAME` varchar(1024) NOT NULL,
  `USR_LASTNAME` varchar(1024) NOT NULL,
  `UTY_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_user_usr`
--

INSERT INTO `t_d_user_usr` (`USR_ID`, `ADR_ID`, `USR_MAIL`, `USR_PASSWORD`, `USR_FIRSTNAME`, `USR_LASTNAME`, `UTY_ID`) VALUES
(1, 1, 'gwen@hotmail.fr', '43adb9630913490ce9b135bf838d762c1a425a09', 'Gwen', 'LEPIERRES', NULL),
(2, 1, 'gwen2@hotmail.fr', '47ad40b3224ade01ca4beec8f4f693af30c49199', 'Gwen2', 'LEPIERRES2', NULL),
(3, 1, 'gwen3@hotmail.fr', '044075b12ec9701827281ad1626683f0e46775d9', 'Gwen3', 'LEPIERRES3', NULL),
(4, 1, 'gwen4@hotmail.fr', 'a1d7584daaca4738d499ad7082886b01117275d8', 'Gwen4', 'LEPIERRES3', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_d_address_adr`
--
ALTER TABLE `t_d_address_adr`
  ADD PRIMARY KEY (`ADR_ID`);

--
-- Index pour la table `t_d_expeditiontype_ety`
--
ALTER TABLE `t_d_expeditiontype_ety`
  ADD PRIMARY KEY (`ETY_ID`);

--
-- Index pour la table `t_d_expedition_exp`
--
ALTER TABLE `t_d_expedition_exp`
  ADD PRIMARY KEY (`EXP_ID`);

--
-- Index pour la table `t_d_orderdetails_odt`
--
ALTER TABLE `t_d_orderdetails_odt`
  ADD PRIMARY KEY (`OHR_ID`,`PRD_ID`,`EXP_ID`),
  ADD KEY `FK_CONCERNE2` (`PRD_ID`),
  ADD KEY `FK_CONCERNE3` (`EXP_ID`);

--
-- Index pour la table `t_d_orderheader_ohr`
--
ALTER TABLE `t_d_orderheader_ohr`
  ADD PRIMARY KEY (`OHR_ID`),
  ADD KEY `FK_A_POUR_PAIEMENT` (`PMT_ID`),
  ADD KEY `FK_A_POUR_STATUT` (`OSS_ID`),
  ADD KEY `FK_A_POUR_TYPE_EXPEDITION` (`ETY_ID`),
  ADD KEY `FK_COMMANDE` (`USR_ID`),
  ADD KEY `FK_EST_FACTURE` (`ADR_ID_FAC`),
  ADD KEY `FK_EST_LIVRE` (`ADR_ID_LIV`);

--
-- Index pour la table `t_d_orderstatus_oss`
--
ALTER TABLE `t_d_orderstatus_oss`
  ADD PRIMARY KEY (`OSS_ID`);

--
-- Index pour la table `t_d_paymenttype_pmt`
--
ALTER TABLE `t_d_paymenttype_pmt`
  ADD PRIMARY KEY (`PMT_ID`);

--
-- Index pour la table `t_d_productkit_kit`
--
ALTER TABLE `t_d_productkit_kit`
  ADD PRIMARY KEY (`PRD_ID_KIT`,`PRD_ID_COMPONENT`),
  ADD KEY `FK_T_D_PROD_SE_COMPOS_T_D_PROD2` (`PRD_ID_COMPONENT`);

--
-- Index pour la table `t_d_producttype_pty`
--
ALTER TABLE `t_d_producttype_pty`
  ADD PRIMARY KEY (`PTY_ID`);

--
-- Index pour la table `t_d_product_prd`
--
ALTER TABLE `t_d_product_prd`
  ADD PRIMARY KEY (`PRD_ID`),
  ADD KEY `FK_EST_DE_TYPE` (`PTY_ID`),
  ADD KEY `FK_PROVIENT_DE` (`SPL_ID`);

--
-- Index pour la table `t_d_supplier_spl`
--
ALTER TABLE `t_d_supplier_spl`
  ADD PRIMARY KEY (`SPL_ID`);

--
-- Index pour la table `t_d_usertype_uty`
--
ALTER TABLE `t_d_usertype_uty`
  ADD PRIMARY KEY (`UTY_ID`);

--
-- Index pour la table `t_d_user_usr`
--
ALTER TABLE `t_d_user_usr`
  ADD PRIMARY KEY (`USR_ID`),
  ADD KEY `FK_T_D_USER_A_COMME_I_T_D_ADDR3` (`ADR_ID`),
  ADD KEY `FK_USERTYPE1` (`UTY_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_d_address_adr`
--
ALTER TABLE `t_d_address_adr`
  MODIFY `ADR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_d_expeditiontype_ety`
--
ALTER TABLE `t_d_expeditiontype_ety`
  MODIFY `ETY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_d_expedition_exp`
--
ALTER TABLE `t_d_expedition_exp`
  MODIFY `EXP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_d_orderheader_ohr`
--
ALTER TABLE `t_d_orderheader_ohr`
  MODIFY `OHR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_d_orderstatus_oss`
--
ALTER TABLE `t_d_orderstatus_oss`
  MODIFY `OSS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_d_paymenttype_pmt`
--
ALTER TABLE `t_d_paymenttype_pmt`
  MODIFY `PMT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_d_producttype_pty`
--
ALTER TABLE `t_d_producttype_pty`
  MODIFY `PTY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_d_product_prd`
--
ALTER TABLE `t_d_product_prd`
  MODIFY `PRD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_d_supplier_spl`
--
ALTER TABLE `t_d_supplier_spl`
  MODIFY `SPL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_d_usertype_uty`
--
ALTER TABLE `t_d_usertype_uty`
  MODIFY `UTY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_d_user_usr`
--
ALTER TABLE `t_d_user_usr`
  MODIFY `USR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_d_orderdetails_odt`
--
ALTER TABLE `t_d_orderdetails_odt`
  ADD CONSTRAINT `FK_CONCERNE1` FOREIGN KEY (`OHR_ID`) REFERENCES `t_d_orderheader_ohr` (`OHR_ID`),
  ADD CONSTRAINT `FK_CONCERNE2` FOREIGN KEY (`PRD_ID`) REFERENCES `t_d_product_prd` (`PRD_ID`),
  ADD CONSTRAINT `FK_CONCERNE3` FOREIGN KEY (`EXP_ID`) REFERENCES `t_d_expedition_exp` (`EXP_ID`);

--
-- Contraintes pour la table `t_d_orderheader_ohr`
--
ALTER TABLE `t_d_orderheader_ohr`
  ADD CONSTRAINT `FK_A_POUR_PAIEMENT` FOREIGN KEY (`PMT_ID`) REFERENCES `t_d_paymenttype_pmt` (`PMT_ID`),
  ADD CONSTRAINT `FK_A_POUR_STATUT` FOREIGN KEY (`OSS_ID`) REFERENCES `t_d_orderstatus_oss` (`OSS_ID`),
  ADD CONSTRAINT `FK_A_POUR_TYPE_EXPEDITION` FOREIGN KEY (`ETY_ID`) REFERENCES `t_d_expeditiontype_ety` (`ETY_ID`),
  ADD CONSTRAINT `FK_COMMANDE` FOREIGN KEY (`USR_ID`) REFERENCES `t_d_user_usr` (`USR_ID`),
  ADD CONSTRAINT `FK_EST_FACTURE` FOREIGN KEY (`ADR_ID_FAC`) REFERENCES `t_d_address_adr` (`ADR_ID`),
  ADD CONSTRAINT `FK_EST_LIVRE` FOREIGN KEY (`ADR_ID_LIV`) REFERENCES `t_d_address_adr` (`ADR_ID`);

--
-- Contraintes pour la table `t_d_productkit_kit`
--
ALTER TABLE `t_d_productkit_kit`
  ADD CONSTRAINT `FK_SE_COMPOSE` FOREIGN KEY (`PRD_ID_KIT`) REFERENCES `t_d_product_prd` (`PRD_ID`),
  ADD CONSTRAINT `FK_T_D_PROD_SE_COMPOS_T_D_PROD2` FOREIGN KEY (`PRD_ID_COMPONENT`) REFERENCES `t_d_product_prd` (`PRD_ID`);

--
-- Contraintes pour la table `t_d_product_prd`
--
ALTER TABLE `t_d_product_prd`
  ADD CONSTRAINT `FK_EST_DE_TYPE` FOREIGN KEY (`PTY_ID`) REFERENCES `t_d_producttype_pty` (`PTY_ID`),
  ADD CONSTRAINT `FK_PROVIENT_DE` FOREIGN KEY (`SPL_ID`) REFERENCES `t_d_supplier_spl` (`SPL_ID`);

--
-- Contraintes pour la table `t_d_user_usr`
--
ALTER TABLE `t_d_user_usr`
  ADD CONSTRAINT `FK_T_D_USER_A_COMME_I_T_D_ADDR3` FOREIGN KEY (`ADR_ID`) REFERENCES `t_d_address_adr` (`ADR_ID`),
  ADD CONSTRAINT `FK_USERTYPE1` FOREIGN KEY (`UTY_ID`) REFERENCES `t_d_usertype_uty` (`UTY_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
