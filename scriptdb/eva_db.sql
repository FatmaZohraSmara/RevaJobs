-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 juin 2022 à 20:27
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
-- Base de données : `eva_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

DROP TABLE IF EXISTS `candidature`;
CREATE TABLE IF NOT EXISTS `candidature` (
  `id_candidature` bigint(19) NOT NULL AUTO_INCREMENT,
  `evaluation_cantidature` tinyint(4) DEFAULT '0',
  `date_reponse_cantidature` datetime DEFAULT NULL,
  `reponse_cantidature` longtext COLLATE utf8_unicode_ci,
  `date_entretien_cantidature` datetime DEFAULT NULL,
  `date_soumission_cantidature` datetime DEFAULT CURRENT_TIMESTAMP,
  `numero_soumission_cantidature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat_cantidature` tinyint(4) DEFAULT '1',
  `candidat_candidature` bigint(19) DEFAULT NULL,
  `offre_candidature` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id_candidature`),
  KEY `FK_offre_ayant_des_candidatures` (`offre_candidature`),
  KEY `FK_candidat_ayant_des_candidatures` (`candidat_candidature`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`id_candidature`, `evaluation_cantidature`, `date_reponse_cantidature`, `reponse_cantidature`, `date_entretien_cantidature`, `date_soumission_cantidature`, `numero_soumission_cantidature`, `etat_cantidature`, `candidat_candidature`, `offre_candidature`) VALUES
(1, 0, '2022-05-05 00:00:00', 'NON FAVORABLE', NULL, '2022-04-01 00:00:00', '1f47f5', NULL, 1, 1),
(2, 10, NULL, 'TEST', NULL, '2022-05-24 11:01:41', 'ea61c979', 1, 0, 0),
(3, 0, NULL, NULL, NULL, '2022-05-24 11:02:07', '9b8a6125', 1, 0, 0),
(4, 0, NULL, NULL, NULL, '2022-05-24 11:02:07', '9b8a6125', 1, 0, 0),
(5, 0, NULL, NULL, NULL, '2022-05-24 11:02:07', '9b8a6125', 1, 0, 0),
(6, 0, NULL, NULL, NULL, '2022-05-24 11:02:07', '9b8a6125', 1, 0, 0),
(7, 0, NULL, NULL, NULL, '2022-05-24 11:02:08', 'a46c1ff7', 1, 0, 0),
(8, 0, NULL, NULL, NULL, '2022-05-24 11:02:08', 'a46c1ff7', 1, 0, 0),
(9, 0, NULL, NULL, NULL, '2022-05-24 11:02:08', 'a46c1ff7', 1, 0, 0),
(10, 0, NULL, NULL, NULL, '2022-05-24 11:02:08', 'a46c1ff7', 1, 0, 0),
(11, 0, NULL, NULL, NULL, '2022-05-24 11:02:08', 'a46c1ff7', 1, 0, 0),
(12, 0, NULL, NULL, NULL, '2022-05-24 11:02:08', 'a46c1ff7', 1, 0, 0),
(13, 0, NULL, NULL, NULL, '2022-05-24 11:02:08', 'a46c1ff7', 1, 0, 0),
(14, 0, NULL, NULL, NULL, '2022-05-24 11:02:09', 'c3fc0795', 1, 0, 0),
(15, 0, NULL, NULL, NULL, '2022-05-24 11:02:09', 'c3fc0795', 1, 0, 0),
(16, 0, NULL, NULL, NULL, '2022-05-24 11:02:09', 'c3fc0795', 1, 0, 0),
(17, 0, NULL, NULL, NULL, '2022-05-24 11:41:36', '809096e2', 1, 0, 0),
(21, 0, NULL, NULL, NULL, '2022-05-26 13:02:07', '9c9f53a5', 1, 0, 0),
(19, 0, NULL, NULL, NULL, '2022-05-24 11:42:11', '5f2414cc', 1, 0, 0),
(22, 0, NULL, NULL, NULL, '2022-06-06 11:10:01', '19f59590', 1, 1, 1),
(23, 0, NULL, NULL, NULL, '2022-06-06 11:10:01', '19f59590', 1, 1, 1),
(24, 0, NULL, NULL, NULL, '2022-06-14 02:14:26', '703e4c5c', 1, 7, 9),
(25, 0, NULL, NULL, NULL, '2022-06-14 22:40:20', 'd39d1abf', 1, 7, 9),
(26, 0, NULL, NULL, NULL, '2022-06-14 22:40:28', 'b9bdb9f3', 1, 7, 8),
(27, 0, NULL, NULL, NULL, '2022-06-15 00:55:16', '64939bee', 1, 7, 9),
(28, 0, NULL, NULL, NULL, '2022-06-15 00:59:29', '93ce04b6', 1, 7, 9),
(29, 0, NULL, NULL, NULL, '2022-06-15 01:01:03', '325c3e0d', 1, 8, 9),
(31, 0, NULL, NULL, NULL, '2022-06-15 18:08:10', '4cdf5b73', 1, 8, 3),
(32, 0, NULL, NULL, NULL, '2022-06-15 18:09:44', '38853636', 1, 9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `id_competence` bigint(19) NOT NULL AUTO_INCREMENT,
  `intitule_competence` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_competence` longtext COLLATE utf8_unicode_ci,
  `niveau_competence` tinyint(4) DEFAULT NULL,
  `date_debut_competence` datetime DEFAULT NULL,
  `date_fin_competence` datetime DEFAULT NULL,
  `type_competence` tinyint(4) DEFAULT NULL,
  `candidat_competence` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id_competence`),
  KEY `FK_candidat_ayant_des_competences` (`candidat_competence`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id_competence`, `intitule_competence`, `description_competence`, `niveau_competence`, `date_debut_competence`, `date_fin_competence`, `type_competence`, `candidat_competence`) VALUES
(1, 'TESTE', 'TEXTE', 0, NULL, NULL, 1, 0),
(2, 'TEST', 'TEXTE', 0, NULL, NULL, 1, 0),
(3, 'TEST', 'TEXTE', 0, NULL, NULL, 1, 0),
(6, 'TEST', 'TEXTE', 0, NULL, NULL, 1, 0),
(5, 'TEST', 'TEXTE', 0, NULL, NULL, 1, 0),
(7, 'TESTE', 'TEXTE', 0, NULL, NULL, 1, 0),
(8, 'TESTE', 'TEXTE', 0, NULL, NULL, 1, 0),
(9, 'TEST', 'TEST', NULL, '1999-01-01 00:00:00', '2022-01-01 00:00:00', 11, 7),
(10, 'TEST', 'TEST', NULL, '1999-01-01 00:00:00', '2022-01-01 00:00:00', 11, 7),
(11, 'TEST', 'TEST', NULL, '1999-01-01 00:00:00', '2022-01-01 00:00:00', 11, 7),
(12, 'YAYA', 'SALAM', NULL, '2020-01-01 00:00:00', '2022-01-01 00:00:00', 8, 7),
(19, 'MASTER II GADM', 'Master en études de BIG DATA et DATA Science', NULL, '2020-09-01 00:00:00', '2022-06-30 00:00:00', 9, 8),
(18, 'Directeur', 'Pilotage de l\'entreprise', NULL, '1970-01-01 00:00:00', '2022-01-01 00:00:00', 11, 8),
(20, 'TEST', 'TEST', NULL, '1960-01-01 00:00:00', '2022-01-01 00:00:00', 11, 9);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id_offre` bigint(19) NOT NULL AUTO_INCREMENT,
  `intitule_poste_offre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_offre` tinyint(4) DEFAULT '0',
  `description_offre` longtext COLLATE utf8_unicode_ci,
  `coordonnees_offre` longtext COLLATE utf8_unicode_ci,
  `date_debut_offre` datetime DEFAULT NULL,
  `date_fin_offre` datetime DEFAULT NULL,
  `bareme_minimaum_offre` int(10) DEFAULT '0',
  `domaine_offre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_soumission_offre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_soumission_offre` datetime DEFAULT CURRENT_TIMESTAMP,
  `organisme_offre` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id_offre`),
  KEY `FK_organisme_ayant_des_offres` (`organisme_offre`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `intitule_poste_offre`, `type_offre`, `description_offre`, `coordonnees_offre`, `date_debut_offre`, `date_fin_offre`, `bareme_minimaum_offre`, `domaine_offre`, `numero_soumission_offre`, `date_soumission_offre`, `organisme_offre`) VALUES
(2, 'Développeur mobile', 1, 'Le design graphique est une activité de conception visant à mettre en oeuvre et coordonner la réalisation d\'une communication visuelle combinant image et texte, sur imprimé ou sur écran.', 'Gestion du temps : respect scrupuleux de mes délais.\nCommunication : réponses à mes clients dans la journée assurée.\nAdaptation : capable de travailler sur des sujets et univers très divers. ', '2022-04-01 00:00:00', '2022-10-01 00:00:00', 40, 'Informatique', '09117a3c', '2022-07-26 11:33:44', 1),
(3, 'Graphic designer', 0, 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '2022-04-01 00:00:00', '2022-10-01 00:00:00', 50, 'Design publicitaire', '777a5396', '2022-05-26 15:27:25', 1),
(4, 'Lorem ipsum set amet dolor', 0, 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '2022-04-01 00:00:00', '2022-10-01 00:00:00', 200, 'TAT', NULL, NULL, 1),
(5, 'Lorem ipsum set amet dolor', 0, 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '2022-04-01 00:00:00', '2022-10-01 00:00:00', 200, 'TAT', '1a4fa8c8', '2022-05-26 15:32:32', 1),
(6, 'Lorem ipsum set amet dolor', 0, 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '2022-04-01 00:00:00', '2022-10-01 00:00:00', 200, 'TAT', '296ca6bf', '2022-05-26 15:36:27', 1),
(7, 'Lorem ipsum set amet dolor', 0, 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '2022-04-01 00:00:00', '2022-10-01 00:00:00', 200, 'TAT', '024b9916', '2022-06-06 10:09:55', 1),
(8, 'Lorem ipsum set amet dolor', 0, 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '2022-04-01 00:00:00', '2022-10-01 00:00:00', 200, 'TAT', '024b9916', '2022-06-06 10:09:55', 1),
(9, 'Lorem ipsum set amet dolor', 0, 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '2022-04-01 00:00:00', '2022-10-01 00:00:00', 200, 'TAT', 'cee907f9', '2022-06-06 10:12:24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `organisme`
--

DROP TABLE IF EXISTS `organisme`;
CREATE TABLE IF NOT EXISTS `organisme` (
  `id_organisme` bigint(19) NOT NULL AUTO_INCREMENT,
  `raison_sociale_organisme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_organisme` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default_logo.jpg',
  `specialite_organisme` longtext COLLATE utf8_unicode_ci,
  `fixe_organisme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_organisme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_organisme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_organisme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal_organisme` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrc_organisme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rib_organisme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_soumission_organisme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_soumission_organisme` datetime DEFAULT CURRENT_TIMESTAMP,
  `etat_organisme` tinyint(4) DEFAULT '1',
  `recruteur_organisme` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id_organisme`),
  KEY `FK_recruteur_ayant_des_organismes` (`recruteur_organisme`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `organisme`
--

INSERT INTO `organisme` (`id_organisme`, `raison_sociale_organisme`, `logo_organisme`, `specialite_organisme`, `fixe_organisme`, `fax_organisme`, `email_organisme`, `adresse_organisme`, `code_postal_organisme`, `nrc_organisme`, `rib_organisme`, `numero_soumission_organisme`, `date_soumission_organisme`, `etat_organisme`, `recruteur_organisme`) VALUES
(1, 'Lorem ipsum set amet dolor', 'default_logo.png', 'Lorem ipsum set amet dolor', '0669873542', '0684736625', 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '12345', 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '01a75d98', '2022-06-06 10:18:01', 0, 1),
(8, 'TEST', 'default_logo.png', 'TEST', '037876543', '0684736625', 'mouhamed@gmail.com', 'annaba', '', '', '', '5f6602a7', '2022-06-15 18:57:48', 1, 7),
(7, 'Lorem ipsum set amet dolor', 'default_logo.png', 'Lorem ipsum set amet dolor', '0669873542', '0684736625', 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '12345', 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', '0e683321', '2022-06-06 10:14:30', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id_test` bigint(19) NOT NULL AUTO_INCREMENT,
  `ennonce_test` longtext COLLATE utf8_unicode_ci,
  `image_test` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default_test.jpg',
  `reponse1_test` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reponse2_test` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reponse3_test` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reponse_valide_test` tinyint(4) DEFAULT NULL,
  `numero_soumission_test` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_soumission_test` datetime DEFAULT CURRENT_TIMESTAMP,
  `offre_test` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id_test`),
  KEY `FK_offre_ayant_des_tests` (`offre_test`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id_test`, `ennonce_test`, `image_test`, `reponse1_test`, `reponse2_test`, `reponse3_test`, `reponse_valide_test`, `numero_soumission_test`, `date_soumission_test`, `offre_test`) VALUES
(2, 'Lorem ipsum set amet dolor', 'default_picture.png', 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', 3, 'd9444c71', '2022-06-06 10:20:18', 0),
(3, 'Lorem ipsum set amet dolor', 'default_picture.png', 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', 'Lorem ipsum set amet dolor', 3, '051a6fa2', '2022-06-06 10:19:37', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` bigint(19) NOT NULL AUTO_INCREMENT,
  `prenon_utilisateur` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_utilisateur` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance_utilisateur` date DEFAULT NULL,
  `mobile_utilisateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_utilisateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_utilisateur` longtext COLLATE utf8_unicode_ci,
  `code_postal_utilisateur` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situation_familliale_utilisateur` tinyint(4) DEFAULT NULL,
  `numero_inscription_utilisateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_inscription_utilisateur` datetime DEFAULT CURRENT_TIMESTAMP,
  `login_utilisateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_utilisateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valeur_utilisateur` int(11) DEFAULT '0',
  `diplome_utilisateur` tinyint(4) DEFAULT '0',
  `type_utilisateur` tinyint(4) DEFAULT NULL,
  `etat_utilisateur` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `prenon_utilisateur`, `nom_utilisateur`, `date_naissance_utilisateur`, `mobile_utilisateur`, `email_utilisateur`, `adresse_utilisateur`, `code_postal_utilisateur`, `situation_familliale_utilisateur`, `numero_inscription_utilisateur`, `date_inscription_utilisateur`, `login_utilisateur`, `password_utilisateur`, `valeur_utilisateur`, `diplome_utilisateur`, `type_utilisateur`, `etat_utilisateur`) VALUES
(2, 'Nadia', 'HENNI', '1972-02-27', '0646352766', 'nadia@gmail.com', 'sidi Iassa Annaba', '23000', 1, '7b0a183a', '2022-05-26 12:48:30', 'nadia03', '12345', 0, 0, 3, 1),
(3, 'Rayen', 'BEN SALEM', '1997-04-01', '0687954322', 'rayen@gmail.com', 'cite police Annaba', '23000', 1, 'c67d253a', '2022-05-26 12:48:33', 'rayen01', '1234', 0, 0, 1, 0),
(4, 'Amel', 'BOUKHANCHOUCH', '2000-12-31', '0646389527', 'amel@gmail.com', 'cité 500 sidi Amar Annaba ', '21000', 1, '5b1284d7', '2022-05-26 12:48:48', 'amel01', '1234', 0, 0, 1, 0),
(7, 'Mouhamed', 'BEN ISLEM', '1998-03-12', '0654328798', 'mouhamed@gmail.com', 'Constantine-CITE-DAKSI', '25000', 0, 'a566138e', '2022-06-07 13:00:12', 'mohamed01', 'a123', 200, 1, 2, 1),
(8, 'Khaled', 'ACHOURI', '1997-09-12', '0743163527', 'khaled@gmail.com', 'Alger centre', '01091997', 1, '393978d9', '2022-06-07 14:51:40', 'khaled01', '1234', 54, 1, 1, 1),
(9, 'Ahmed', 'MERZOUGUI', '1999-03-12', '0587654321', 'ahmed@gmail.com', 'annaba', '23000', 1, 'db589d55', '2022-06-08 10:06:25', 'ahmed01', '1234', 62, 0, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
