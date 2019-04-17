-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 17 avr. 2019 à 18:04
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pidev`
--

-- --------------------------------------------------------

--
-- Structure de la table `action_benevole`
--

DROP TABLE IF EXISTS `action_benevole`;
CREATE TABLE IF NOT EXISTS `action_benevole` (
  `id_action` int(32) NOT NULL AUTO_INCREMENT,
  `date_d_action` date NOT NULL,
  `date_f_action` date NOT NULL,
  `Description` varchar(255) NOT NULL,
  `etat` varchar(32) NOT NULL DEFAULT 'invalide',
  `type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_action`),
  KEY `IDX_63D63FBDC54C8C93` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `action_benevole`
--

INSERT INTO `action_benevole` (`id_action`, `date_d_action`, `date_f_action`, `Description`, `etat`, `type_id`) VALUES
(26, '2014-01-01', '2014-01-01', 'mm', 'valide', 6),
(25, '2014-03-01', '2014-01-01', 'sss', 'valide', 6),
(23, '2014-01-01', '2014-01-01', 'ffff', 'valide', 6),
(22, '2014-01-01', '2014-01-01', 'xxx', 'valide', 6),
(24, '2014-01-01', '2014-01-01', 'eeee', 'invalide', 6);

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id_activite` int(11) NOT NULL AUTO_INCREMENT,
  `id_animateur` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `nom_activite` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Date_activite` date NOT NULL,
  `description_activite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_activite`),
  KEY `IDX_B8755515A051670B` (`id_animateur`),
  KEY `IDX_B8755515C9486A13` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `id_animateur`, `id_categorie`, `nom_activite`, `Date_activite`, `description_activite`, `photo`) VALUES
(6, 7, 7, 'test', '2014-01-01', 'zef', '0495ed3ee80aacd2fd0184b6a60ed857.jpeg'),
(9, 10, 7, 'testdf', '2014-01-01', 'qf', 'b3f1f6010aaf868297819a9b9213b080.jpeg'),
(10, 9, 7, 'aeaze', '2014-01-01', 'dsqdqsd', '802fccbf27ff52a8dc5fd30ea623f3b3.jpeg'),
(11, 10, 7, 'test', '2014-01-01', 'zef', 'e6b8df695fb05dca8b725b267fc17888.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `allergies`
--

DROP TABLE IF EXISTS `allergies`;
CREATE TABLE IF NOT EXISTS `allergies` (
  `id_allergie` int(11) NOT NULL AUTO_INCREMENT,
  `date_allergies` date NOT NULL,
  `antecedants` varchar(2000) NOT NULL,
  `id_dossier` int(11) NOT NULL,
  `description_allergie` varchar(20000) DEFAULT NULL,
  PRIMARY KEY (`id_allergie`),
  KEY `id_dossier` (`id_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `allergies`
--

INSERT INTO `allergies` (`id_allergie`, `date_allergies`, `antecedants`, `id_dossier`, `description_allergie`) VALUES
(20, '2019-04-16', 'aaa', 1, 'aaa'),
(22, '2019-04-17', '', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `animateur`
--

DROP TABLE IF EXISTS `animateur`;
CREATE TABLE IF NOT EXISTS `animateur` (
  `id_animateur` int(32) NOT NULL AUTO_INCREMENT,
  `nom_animateur` varchar(32) NOT NULL,
  `prenom_animateur` varchar(32) NOT NULL,
  `mail_animateur` varchar(32) NOT NULL,
  `tel_animateur` int(255) NOT NULL,
  `adresse_animateur` varchar(255) NOT NULL,
  `dispo` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_animateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animateur`
--

INSERT INTO `animateur` (`id_animateur`, `nom_animateur`, `prenom_animateur`, `mail_animateur`, `tel_animateur`, `adresse_animateur`, `dispo`, `image`, `updated_at`) VALUES
(7, 'chahir', 'bahri', 'chahir@esprit.tn', 27914140, 'nabeul', 'Nondisponible', '5052bd6cf7e620d03d8809b3cb298476.jpeg', NULL),
(8, 'hh', 'vg', 'vv', 14, 'nabeul', 'Nondisponible', '77d4b5eadee80f2aba4f1c6aae45d804.jpeg', NULL),
(9, 'mohamed', 'mohamed', 'alcacja', 132154, 'alefhaefu', 'Nondisponible', 'zaegz', NULL),
(10, 'jfea', 'laefa', 'laehf', 35, 'lauzgfa', 'Nondisponible', 'alihfze', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_activite`
--

DROP TABLE IF EXISTS `categorie_activite`;
CREATE TABLE IF NOT EXISTS `categorie_activite` (
  `id_categoriea` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`id_categoriea`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_activite`
--

INSERT INTO `categorie_activite` (`id_categoriea`, `type`) VALUES
(7, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_demande`
--

DROP TABLE IF EXISTS `categorie_demande`;
CREATE TABLE IF NOT EXISTS `categorie_demande` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_demande`
--

INSERT INTO `categorie_demande` (`id_categorie`, `nom_categorie`) VALUES
(64, 'asz'),
(65, 'as');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `id_demande` int(11) NOT NULL AUTO_INCREMENT,
  `id_maison` int(11) DEFAULT NULL,
  `id_demande_categorie` int(255) NOT NULL,
  `quantite_demande` int(11) NOT NULL,
  `description_demande` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_demande`),
  KEY `id_maison` (`id_maison`),
  KEY `id_demande` (`id_demande`),
  KEY `id_user` (`id_user`),
  KEY `id_demande_categorie` (`id_demande_categorie`),
  KEY `id_demande_2` (`id_demande`),
  KEY `id_demande_categorie_2` (`id_demande_categorie`),
  KEY `id_demande_categorie_3` (`id_demande_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

DROP TABLE IF EXISTS `don`;
CREATE TABLE IF NOT EXISTS `don` (
  `id_don` int(11) NOT NULL AUTO_INCREMENT,
  `id_don_categorie` int(11) NOT NULL,
  `quantite_don` int(255) NOT NULL,
  `description_don` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_demande` int(11) NOT NULL,
  PRIMARY KEY (`id_don`),
  KEY `id_user` (`id_user`),
  KEY `id_demande` (`id_demande`),
  KEY `id_user_2` (`id_user`),
  KEY `id_demande_2` (`id_demande`),
  KEY `id_don_categorie` (`id_don_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `dossier_medicale`
--

DROP TABLE IF EXISTS `dossier_medicale`;
CREATE TABLE IF NOT EXISTS `dossier_medicale` (
  `id_dossier` int(11) NOT NULL AUTO_INCREMENT,
  `problemes_sante` varchar(2000) DEFAULT NULL,
  `nb_visite` int(11) DEFAULT NULL,
  `id_resident` int(11) NOT NULL,
  PRIMARY KEY (`id_dossier`),
  KEY `id_resident` (`id_resident`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dossier_medicale`
--

INSERT INTO `dossier_medicale` (`id_dossier`, `problemes_sante`, `nb_visite`, `id_resident`) VALUES
(1, 'vvvvvvvvvvvv', 10, 34);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `date_d_evenement` date NOT NULL,
  `date_f_evenement` date NOT NULL,
  `heure_evenement` varchar(255) NOT NULL,
  `nom_evenement` varchar(255) NOT NULL,
  `adresse_evenement` varchar(255) NOT NULL,
  `description_evenement` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `date_d_evenement`, `date_f_evenement`, `heure_evenement`, `nom_evenement`, `adresse_evenement`, `description_evenement`) VALUES
(12, '2019-02-19', '2019-02-19', '18h', 'visite des enfants', 'ariana', 'loisirs'),
(29, '2019-02-22', '2019-02-22', '17h', 'petit dej avec les enfants', 'ariana', 'loisirs'),
(30, '2019-02-20', '2019-02-20', '15h', 'yoga', 'Sfax', 'meditation'),
(32, '2019-02-14', '2019-02-16', '18h', 'projection film', 'elghazela', 'culturel'),
(33, '2019-02-13', '2019-02-13', '14h', 'traditions tunisiennes', 'Bizerte', 'traditionnel'),
(40, '2019-02-06', '2019-02-06', '18h', 'projection film', 'bizerte', 'evenement culturel'),
(41, '2019-03-07', '2019-03-07', '14h', 'tournoi scrabble', 'tunis', 'jeux et loisirs'),
(66, '2014-01-01', '2019-06-09', '12h', 'test', 'test', 'rest'),
(70, '2019-08-01', '2019-08-01', '18h', 'journée traditions', 'maison de retraite bardo', 'loisirs');

-- --------------------------------------------------------

--
-- Structure de la table `fiche_medicale`
--

DROP TABLE IF EXISTS `fiche_medicale`;
CREATE TABLE IF NOT EXISTS `fiche_medicale` (
  `id_fiche` int(11) NOT NULL AUTO_INCREMENT,
  `date_creation_fiche` date DEFAULT NULL,
  `date_dermodif_fiche` date DEFAULT NULL,
  `remarques_fiche` varchar(20000) NOT NULL,
  `niveau_temp` double NOT NULL,
  `niveau_sec` double NOT NULL,
  `niveau_tension` double NOT NULL,
  `groupe_sanguin` varchar(3) NOT NULL,
  `medicaments` varchar(20000) NOT NULL,
  `taille_resident` double NOT NULL,
  `poids_resident` double NOT NULL,
  PRIMARY KEY (`id_fiche`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fiche_medicale`
--

INSERT INTO `fiche_medicale` (`id_fiche`, `date_creation_fiche`, `date_dermodif_fiche`, `remarques_fiche`, `niveau_temp`, `niveau_sec`, `niveau_tension`, `groupe_sanguin`, `medicaments`, `taille_resident`, `poids_resident`) VALUES
(12, '2019-02-05', '2019-02-06', 'test remarque', 36.5, 0.5, 12.8, 'A', 'zefzfzf', 160, 70),
(14, '2019-02-03', '2019-02-27', 'aaaaaaaaaaaa', 36, 1, 10, 'C', 'aaaaaaaaaaaaaaaaaaaa', 177, 77),
(21, '3919-02-01', '3919-02-01', 'ijhoin', 38, 1, 15, 'B+', 'sdsc', 160, 70),
(23, '3919-02-01', '3919-02-01', 'dzdddddddddd', 36, 11, 15, 'B+', 'aaaaaaa', 155, 70),
(24, '3919-02-01', '3919-02-01', 'ccccccccccccccc', 37, 1.1, 16, 'A+', 'cccccccccccc', 150, 60),
(26, '3919-02-01', '3919-02-01', 'kkkkkkkkkkk', 38, 1, 15, 'A-', 'kkkkkkkkkk', 155, 80),
(27, '2014-02-01', '2014-02-01', 'ppppppppppp', 37, 0.8, 16, 'B+', 'ppppppppppp', 155, 70),
(34, '2019-02-27', '2019-02-28', 'aaaaaaaaaaa', 37, 0.9, 15, 'A-', 'cccccccc', 155, 70),
(35, '2019-02-27', '2019-04-17', 'Attension', 36.5, 0.82, 13.8, 'A+', 'ADOL', 169, 93.2),
(36, '2019-02-28', '2019-02-28', 'nothing', 36.7, 0.83, 11.5, 'B+', 'Doliprane,Adol', 157, 73),
(37, '2019-03-01', '2019-03-01', 'aaa', 35.7, 0.78, 11.4, 'B+', 'aaaa', 158, 61.4),
(39, '2020-03-01', '2019-04-16', 'testt', 36.8, 0.76, 11.5, 'B+', 'aatest', 154, 50.8),
(40, '2019-04-14', '2019-04-14', 'sss', 14, 14, 14, 'A+', 'ada', 14, 14),
(41, '2019-04-16', '2019-04-16', 'sss', 14, 14, 14, 'A+', 'ada', 14, 14),
(42, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(43, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(44, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(45, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(46, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(47, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(48, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(49, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(50, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(51, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(52, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(53, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(54, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(55, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(56, '2019-04-16', '2019-04-16', 'sss', 36, 10, 14, 'A+', 'ada', 14, 14),
(59, '2019-04-17', '2019-04-17', 'sss', 37.3, 0.91, 13.1, 'AB+', 'ada', 169.1, 78.6),
(60, '2019-04-17', '2019-04-17', 'sss', 37.3, 0.91, 13.1, 'AB+', 'ada', 169.1, 78.6),
(62, '2019-04-17', '2019-04-17', 'a', 37, 0.9, 12.5, 'A+', 'aa', 170, 75),
(63, '2019-04-17', '2019-04-17', 'sss', 37, 0.9, 12.5, 'A+', 'ada', 170, 75);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

DROP TABLE IF EXISTS `maison`;
CREATE TABLE IF NOT EXISTS `maison` (
  `id_maison` int(11) NOT NULL AUTO_INCREMENT,
  `nom_maison` varchar(20) NOT NULL,
  `adresse_maison` varchar(20) NOT NULL,
  `telephone_maison` varchar(8) NOT NULL,
  `mail_maison` varchar(30) NOT NULL,
  `nbr_personne` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_maison`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`id_maison`, `nom_maison`, `adresse_maison`, `telephone_maison`, `mail_maison`, `nbr_personne`, `id_user`) VALUES
(24, 'shil', 'jemmel', '25487587', 'fsfs', 11, NULL),
(25, 'fsf', 'fsd', '455', 'fs', -1, NULL),
(26, 'sfs', 'fsdf', '45', 'fs', 50, NULL),
(27, 'fs', 'fs', '545', 'fs', -1, NULL),
(28, 'sdf', 'vs', '545', 'fs', -1, NULL),
(29, 'sdf', 'fs', '45', 'fs', -1, NULL),
(30, 'jasmine', 'fs', '452565', 'dfg', -1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_parameters` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `notification_date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `title`, `description`, `icon`, `route`, `route_parameters`, `notification_date`, `seen`) VALUES
(26, 'Un nouveau résident est inscrit', 'yafet', NULL, 'affiche_reA', 'a:1:{s:2:\"id\";i:30;}', '2019-04-17 03:09:57', 0),
(27, 'Un nouveau résident est inscrit', 'yafet', NULL, 'affiche_re', 'a:1:{s:2:\"id\";i:30;}', '2019-04-17 03:09:57', 0),
(28, 'Un nouveau résident est inscrit', 'chahir', NULL, 'affiche_reA', 'a:1:{s:2:\"id\";i:31;}', '2019-04-17 03:11:30', 0),
(29, 'Un nouveau résident est inscrit', 'fsd', NULL, 'affiche_reA', 'a:1:{s:2:\"id\";i:32;}', '2019-04-17 03:43:56', 0);

-- --------------------------------------------------------

--
-- Structure de la table `prescriptions_medicaments`
--

DROP TABLE IF EXISTS `prescriptions_medicaments`;
CREATE TABLE IF NOT EXISTS `prescriptions_medicaments` (
  `id_prescriptions_medicaments` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut_traitement` date DEFAULT NULL,
  `id_dossier` int(11) NOT NULL,
  `description_medicament` varchar(20000) DEFAULT NULL,
  PRIMARY KEY (`id_prescriptions_medicaments`),
  KEY `id_dossier` (`id_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prescriptions_medicaments`
--

INSERT INTO `prescriptions_medicaments` (`id_prescriptions_medicaments`, `date_debut_traitement`, `id_dossier`, `description_medicament`) VALUES
(12, '2019-04-16', 1, 'aaaaa'),
(14, '2019-04-17', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `prestation_sante`
--

DROP TABLE IF EXISTS `prestation_sante`;
CREATE TABLE IF NOT EXISTS `prestation_sante` (
  `id_prestation` int(11) NOT NULL AUTO_INCREMENT,
  `id_resident` int(11) NOT NULL,
  `id_fiche` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nom_resident` varchar(255) NOT NULL,
  `prenom_resident` varchar(255) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `medicaments` varchar(20000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_prestation`),
  KEY `id_fiche` (`id_fiche`),
  KEY `id_resident` (`id_resident`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestation_sante`
--

INSERT INTO `prestation_sante` (`id_prestation`, `id_resident`, `id_fiche`, `id_user`, `nom_resident`, `prenom_resident`, `nom_user`, `prenom_user`, `medicaments`, `date`) VALUES
(1, 34, 63, NULL, 'nomresident', 'prenomresident', 'nomuser', 'prenomuser', 'ada', '2019-04-17');

-- --------------------------------------------------------

--
-- Structure de la table `resident`
--

DROP TABLE IF EXISTS `resident`;
CREATE TABLE IF NOT EXISTS `resident` (
  `id_resident` int(11) NOT NULL AUTO_INCREMENT,
  `nom_resident` varchar(20) NOT NULL,
  `prenom_resident` varchar(20) NOT NULL,
  `age_resident` int(11) NOT NULL,
  `alzheimer_resident` varchar(10) NOT NULL,
  `maladie_resident` varchar(255) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `telephone_responsable` int(11) NOT NULL,
  `id_maison` int(11) DEFAULT NULL,
  `sexe_resident` varchar(255) NOT NULL,
  `date_resident` date NOT NULL,
  `etat` varchar(32) NOT NULL DEFAULT 'invalide',
  PRIMARY KEY (`id_resident`),
  KEY `id_maison` (`id_maison`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resident`
--

INSERT INTO `resident` (`id_resident`, `nom_resident`, `prenom_resident`, `age_resident`, `alzheimer_resident`, `maladie_resident`, `responsable`, `telephone_responsable`, `id_maison`, `sexe_resident`, `date_resident`, `etat`) VALUES
(34, 'gsf', 'kjk', 4, 'fds', 'fsg', 'fs', 457, 24, 'gs', '2019-04-17', 'valide');

-- --------------------------------------------------------

--
-- Structure de la table `sponsor_evenement`
--

DROP TABLE IF EXISTS `sponsor_evenement`;
CREATE TABLE IF NOT EXISTS `sponsor_evenement` (
  `id_sponsor` int(11) NOT NULL AUTO_INCREMENT,
  `nom_sponsor` varchar(55) NOT NULL,
  `prenom_sponsor` varchar(55) NOT NULL,
  `adresse_sponsor` varchar(55) NOT NULL,
  `tel_sponsor` varchar(55) NOT NULL,
  `description_sponsoring` varchar(55) NOT NULL,
  `evenement_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sponsor`),
  KEY `IDX_2ED122F0FD02F13` (`evenement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sponsor_evenement`
--

INSERT INTO `sponsor_evenement` (`id_sponsor`, `nom_sponsor`, `prenom_sponsor`, `adresse_sponsor`, `tel_sponsor`, `description_sponsoring`, `evenement_id`) VALUES
(2, 'cherni', 'sabrine', 'tunis', '25252525', 'argent 1000 dt', 29),
(3, 'xx', 'yy', 'ariana', '21212121', 'transporthjkhhkhkhk', 40),
(10, 'aa', 'aaaa', 'aa', 'aa', 'aa', 41),
(11, 'bb', 'bb', 'bb', 'bb', 'bb', 12);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(32) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(32) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `categorie`) VALUES
(6, 'Prestation de santé'),
(7, 'hh'),
(8, 'ff'),
(9, 'kkk'),
(10, 'ff');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nom` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `datenaissance` date DEFAULT NULL,
  `adresse` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(13) DEFAULT NULL,
  `image` varchar(20000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `datenaissance`, `adresse`, `phone`, `image`, `profession`, `status`) VALUES
(21, 'yafetsh', 'yafetsh', 'yafet.shil@esprit.tn', 'yafet.shil@esprit.tn', 1, 'pYgFJQRsyq9KrIbuG9L/b2XM9m0L2zhxBA6OqG68o8o', 'yafetsh{pYgFJQRsyq9KrIbuG9L/b2XM9m0L2zhxBA6OqG68o8o}', '2019-04-13 11:32:13', NULL, NULL, 'a:1:{i:0;s:11:\"ROLE_CLIENT\";}', 'shil', 'yafet', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'test', 'test', 'sf@gmail.com', 'sf@gmail.com', 1, 'ciOI.N2T0LXZB9hO3Iwte9XFx0tiKhchyKG8U2yN0Vo', 'test{ciOI.N2T0LXZB9hO3Iwte9XFx0tiKhchyKG8U2yN0Vo}', '2019-04-17 16:10:06', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `FK_B8755515A051670B` FOREIGN KEY (`id_animateur`) REFERENCES `animateur` (`id_animateur`),
  ADD CONSTRAINT `FK_B8755515C9486A13` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_activite` (`id_categoriea`);

--
-- Contraintes pour la table `allergies`
--
ALTER TABLE `allergies`
  ADD CONSTRAINT `allergies_ibfk_1` FOREIGN KEY (`id_dossier`) REFERENCES `dossier_medicale` (`id_dossier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_maison`) REFERENCES `maison` (`id_maison`) ON DELETE CASCADE,
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`id_demande_categorie`) REFERENCES `categorie_demande` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demande_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`id_demande`) REFERENCES `demande` (`id_demande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `don_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `don_ibfk_3` FOREIGN KEY (`id_don_categorie`) REFERENCES `categorie_demande` (`id_categorie`);

--
-- Contraintes pour la table `dossier_medicale`
--
ALTER TABLE `dossier_medicale`
  ADD CONSTRAINT `dossier_medicale_ibfk_1` FOREIGN KEY (`id_resident`) REFERENCES `resident` (`id_resident`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `FK_F90CB66D6B3CA4B` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prescriptions_medicaments`
--
ALTER TABLE `prescriptions_medicaments`
  ADD CONSTRAINT `prescriptions_medicaments_ibfk_1` FOREIGN KEY (`id_dossier`) REFERENCES `dossier_medicale` (`id_dossier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prestation_sante`
--
ALTER TABLE `prestation_sante`
  ADD CONSTRAINT `prestation_sante_ibfk_1` FOREIGN KEY (`id_fiche`) REFERENCES `fiche_medicale` (`id_fiche`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestation_sante_ibfk_2` FOREIGN KEY (`id_resident`) REFERENCES `resident` (`id_resident`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestation_sante_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`id_maison`) REFERENCES `maison` (`id_maison`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sponsor_evenement`
--
ALTER TABLE `sponsor_evenement`
  ADD CONSTRAINT `FK_2ED122F0FD02F13` FOREIGN KEY (`evenement_id`) REFERENCES `evenement` (`id_evenement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
