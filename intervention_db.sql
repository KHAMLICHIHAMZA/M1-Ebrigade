-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2020 at 02:22 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intervention_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contenu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `id_rapport` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `commentaires_id_rapport_foreign` (`id_rapport`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `contenu`, `date`, `id_rapport`) VALUES
(1, 'ce pas bon', '2020-03-11', 4),
(2, 'ces ppacac', '2020-03-11', 5),
(3, 'papp asasdm ', '2020-03-11', 8),
(4, 'bien fait', '2020-03-11', 5),
(5, 'caséalksd asjnkljasdn aslnlkasdlk asdljnlksd ', '2020-03-12', 8),
(6, 'mec toujours pas bon ', '2020-03-12', 8),
(7, 'tu plaisante', '2020-03-12', 8),
(8, 'pas bon', '2020-03-14', 8),
(9, 'bien', '2020-03-14', 8),
(10, 'hamza le rapport est bon', '2020-04-23', 10),
(11, 'admin: c\'est  pas bon', '2020-04-23', 4),
(12, 'admin :change le rapport tu na pas cité le gadget de ....', '2020-04-23', 11),
(13, 'admin :change le rapport tu na pas cité le gadget de ....', '2020-04-23', 11),
(14, 'c bon mnt', '2020-04-23', 10),
(15, 'jaime', '2020-04-23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `engins`
--

DROP TABLE IF EXISTS `engins`;
CREATE TABLE IF NOT EXISTS `engins` (
  `idEngins` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom_Engin` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date_Heur_Depart` date DEFAULT NULL,
  `Date_Heure_Arriver` date DEFAULT NULL,
  `Date_Heure_Retour` date DEFAULT NULL,
  PRIMARY KEY (`idEngins`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engins`
--

INSERT INTO `engins` (`idEngins`, `Nom_Engin`, `Date_Heur_Depart`, `Date_Heure_Arriver`, `Date_Heure_Retour`) VALUES
(1, 'CCFL', '2020-02-26', '2020-02-27', '2020-02-28'),
(2, 'jaguar', '2020-02-10', '2020-02-11', '2020-02-12'),
(3, 'mercedes', '2020-02-26', '2020-02-27', '2020-02-28'),
(4, 'FPTL', '2020-02-01', '2020-02-01', '2020-03-01'),
(5, 'PCM', '2020-12-31', '2020-02-01', '2020-12-01'),
(6, 'CCFM', '2020-01-31', '2020-01-31', '2020-01-01'),
(7, 'EPA', '2020-01-01', '2021-01-02', '2020-01-01'),
(8, 'CCGC', '2020-01-01', '2020-02-01', '2020-02-01'),
(10, 'CCFM', '2020-01-01', '2020-01-01', '2020-01-01'),
(11, 'CCFM', '2020-01-01', '2020-01-01', '2020-01-01'),
(12, 'CCFM', '2020-01-01', '2020-01-01', '2020-01-01'),
(13, 'EPA', '2020-01-01', '2020-01-01', '2020-01-01'),
(15, 'MOTO', '2020-01-01', '2020-01-01', '2020-01-01'),
(16, 'QUAD', '2020-01-01', '2020-01-01', '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `engins_personnels`
--

DROP TABLE IF EXISTS `engins_personnels`;
CREATE TABLE IF NOT EXISTS `engins_personnels` (
  `Engins_idEngins` int(11) NOT NULL,
  `Personnel_idPersonnel` int(11) NOT NULL,
  `Intervention_Numero_intervention` int(11) DEFAULT NULL,
  `Responsable_idResponsable` int(11) DEFAULT NULL,
  PRIMARY KEY (`Personnel_idPersonnel`,`Engins_idEngins`),
  KEY `engins_personnels_intervention_numero_intervention_foreign` (`Intervention_Numero_intervention`),
  KEY `engins_personnels_responsable_idresponsable_foreign` (`Responsable_idResponsable`),
  KEY `engins_personnels_engins_idengins_foreign` (`Engins_idEngins`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engins_personnels`
--

INSERT INTO `engins_personnels` (`Engins_idEngins`, `Personnel_idPersonnel`, `Intervention_Numero_intervention`, `Responsable_idResponsable`) VALUES
(2, 3, 3, NULL),
(3, 5, 4, NULL),
(1, 24, 1, NULL),
(1, 23, 1, NULL),
(7, 11, 8, NULL),
(7, 12, 8, NULL),
(7, 13, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `geographiques`
--

DROP TABLE IF EXISTS `geographiques`;
CREATE TABLE IF NOT EXISTS `geographiques` (
  `idGeographique` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Position_X` int(11) DEFAULT NULL,
  `Position_Y` int(11) DEFAULT NULL,
  PRIMARY KEY (`idGeographique`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `geographiques`
--

INSERT INTO `geographiques` (`idGeographique`, `Position_X`, `Position_Y`) VALUES
(1, 2, 3),
(2, 34, 54),
(3, 43, 98),
(4, 25, 47);

-- --------------------------------------------------------

--
-- Table structure for table `interventions`
--

DROP TABLE IF EXISTS `interventions`;
CREATE TABLE IF NOT EXISTS `interventions` (
  `Numero_Intervention` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Commune` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Type_interv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Opm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Important` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date_Heure_Debut` datetime DEFAULT NULL,
  `Date_Heure_Fin` date DEFAULT NULL,
  `Geographique_idGeographique` int(11) DEFAULT NULL,
  `Responsable_idResponsable` int(11) DEFAULT NULL,
  PRIMARY KEY (`Numero_Intervention`),
  KEY `interventions_geographique_idgeographique_foreign` (`Geographique_idGeographique`),
  KEY `interventions_responsable_idresponsable_foreign` (`Responsable_idResponsable`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interventions`
--

INSERT INTO `interventions` (`Numero_Intervention`, `Commune`, `Adresse`, `Type_interv`, `Opm`, `Important`, `Date_Heure_Debut`, `Date_Heure_Fin`, `Geographique_idGeographique`, `Responsable_idResponsable`) VALUES
(1, 'sabata', '47 barte', 'BLLP', 'on', 'on', '2020-02-03 00:00:00', '2020-02-10', 1, 2),
(2, 'bamako', '56 charle stoessel', 'AP', 'off', 'off', '2020-02-11 00:00:00', '2020-02-29', 2, 2),
(3, 'kalaban', '46 deste', 'sstr', '4', '5', '2020-02-26 00:00:00', '2020-02-27', 3, 2),
(4, 'paris', '57 retw', 'sstre', '0', '0', '2020-02-11 00:00:00', '2020-02-19', 4, 2),
(5, 'mulhouse', '18 rue de la lanterne', 'CHUTA', 'on', 'on', '2021-01-30 00:00:00', '2021-01-30', NULL, 1),
(6, 'darbayda', 'Mulhouse', 'CONVU', 'on', 'on', '1999-02-07 00:00:00', '2020-01-31', NULL, 3),
(7, 'hhhh', 'jjajaj', 'AP', 'on', 'on', '2020-12-01 12:00:00', '2020-01-31', NULL, 2),
(8, 'darbayda2', 'Mulhouse', 'CHUT', '2', '2', '2021-01-01 01:00:00', '2020-01-01', NULL, 3),
(12, 'Hamza', 'KHAMLICHI', 'CHUTO', 'on', 'on', '2020-01-01 01:00:00', '2020-01-01', NULL, 3),
(13, 'ha', 'kdn', 'BLLP', 'on', 'on', '2020-01-01 02:00:00', '2020-01-02', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `interventions_engins`
--

DROP TABLE IF EXISTS `interventions_engins`;
CREATE TABLE IF NOT EXISTS `interventions_engins` (
  `Intervention_Numero_Intervention` int(11) NOT NULL,
  `Engins_idEngins` int(11) NOT NULL,
  PRIMARY KEY (`Intervention_Numero_Intervention`,`Engins_idEngins`),
  KEY `interventions_engins_engins_idengins_foreign` (`Engins_idEngins`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interventions_engins`
--

INSERT INTO `interventions_engins` (`Intervention_Numero_Intervention`, `Engins_idEngins`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(12, 15),
(13, 16);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(162, '2014_10_12_000000_create_users_table', 5),
(163, '2014_10_12_100000_create_password_resets_table', 5),
(164, '2019_08_19_000000_create_failed_jobs_table', 5),
(165, '2020_03_24_165305_create_commentaires_table', 5),
(166, '2020_03_24_170033_create_engins_table', 5),
(167, '2020_03_24_190524_create_engins_personnels_table', 5),
(168, '2020_03_24_190725_create_geographiques_table', 5),
(169, '2020_03_24_190751_create_interventions_table', 5),
(170, '2020_03_24_190852_create_interventions_engins_table', 5),
(171, '2020_03_24_190910_create_parametres_table', 5),
(172, '2020_03_24_190921_create_personnels_table', 5),
(173, '2020_03_24_190931_create_rapports_table', 5),
(174, '2020_03_24_191238_create_responsables_table', 5),
(28, '2020_04_12_170229_create_pompiers_table', 2),
(29, '2020_04_13_131907_create_pompiers_table', 3),
(70, '2020_04_14_011743_create_pompiers_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `parametres`
--

DROP TABLE IF EXISTS `parametres`;
CREATE TABLE IF NOT EXISTS `parametres` (
  `idParametre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Jours_Feries` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Heure_Debut` datetime DEFAULT NULL,
  `Heure_Fin` datetime DEFAULT NULL,
  PRIMARY KEY (`idParametre`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parametres`
--

INSERT INTO `parametres` (`idParametre`, `Jours_Feries`, `Heure_Debut`, `Heure_Fin`) VALUES
(1, '2', '2020-02-12 00:00:00', '2020-02-13 00:00:00'),
(2, '3', '2020-02-24 00:00:00', '2020-02-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

DROP TABLE IF EXISTS `personnels`;
CREATE TABLE IF NOT EXISTS `personnels` (
  `idPersonnel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Role` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Responsable_idResponsable` int(11) DEFAULT NULL,
  `Parametre_idParametre` int(11) DEFAULT NULL,
  `P_CODE` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idPersonnel`),
  KEY `fk_resopns` (`Responsable_idResponsable`),
  KEY `fk_paramidparam` (`Parametre_idParametre`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personnels`
--

INSERT INTO `personnels` (`idPersonnel`, `Nom`, `Role`, `Responsable_idResponsable`, `Parametre_idParametre`, `P_CODE`) VALUES
(27, 'david', 'coducteur', 3, 1, '6'),
(28, 'badr', 'equipier', 3, 1, '7'),
(26, 'tata', 'equipier', 4, 1, '5'),
(25, 'toto', 'equipier', 2, 1, '4'),
(29, 'joel', 'equipier', 3, 3, '8');

-- --------------------------------------------------------

--
-- Table structure for table `rapports`
--

DROP TABLE IF EXISTS `rapports`;
CREATE TABLE IF NOT EXISTS `rapports` (
  `id_rapport` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contenu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Numero_intervention` int(11) DEFAULT NULL,
  `statut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_rapport`),
  KEY `rapports_numero_intervention_foreign` (`Numero_intervention`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rapports`
--

INSERT INTO `rapports` (`id_rapport`, `contenu`, `Numero_intervention`, `statut`, `date`) VALUES
(4, 'rejete', 1, 'valide', '2020-02-25'),
(5, 'tooot ttrettrebbyx yx,nbxmc mnbkj< kkjyx  poolk', 4, 'rejete', '2020-02-25'),
(8, 'dernier rapport maitenant je faais la dernierre modification fifn mec qdfjsd sdjfknlkdf knk df sdnlksdf dsfsmd   sdfl  df j\'aos poopo khckybfnm', 2, 'valide', '2020-03-11'),
(9, 'DDDDDDDDDDDD', 3, '', '2020-04-21'),
(10, 'rejete', 10, 'valide', '2020-04-23'),
(11, 'nouvelle rapport', 6, NULL, '2020-04-23'),
(12, 'voila monsieur le chef', 8, NULL, '2020-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `responsables`
--

DROP TABLE IF EXISTS `responsables`;
CREATE TABLE IF NOT EXISTS `responsables` (
  `idResponsable` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_CODE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idResponsable`)
) ENGINE=MyISAM AUTO_INCREMENT=1248 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responsables`
--

INSERT INTO `responsables` (`idResponsable`, `Nom`, `P_CODE`) VALUES
(2, 'Hebner', '2'),
(1, 'kante', '1'),
(3, 'khamlichi', '3'),
(4, 'khamlichi', '3'),
(1247, 'khamlichi', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `P_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `P_NOM` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `P_EMAIL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `P_MDP` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `P_CODE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_PRENOM` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_PRENOM2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_NOM_NAISSANCE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_SEXE` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `P_CIVILITE` tinyint(4) NOT NULL DEFAULT 1,
  `P_OLD_MEMBER` tinyint(4) NOT NULL DEFAULT 0,
  `P_GRADE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_PROFESSION` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SPP',
  `P_STATUT` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SPV',
  `P_PASSWORD_FAILURE` tinyint(4) DEFAULT NULL,
  `P_DATE_ENGAGEMENT` date DEFAULT NULL,
  `P_FIN` date DEFAULT NULL,
  `P_SECTION` smallint(6) DEFAULT NULL,
  `C_ID` int(11) NOT NULL DEFAULT 0,
  `GP_ID` smallint(6) NOT NULL DEFAULT 0,
  `GP_ID2` smallint(6) NOT NULL DEFAULT 0,
  `P_BIRTHDATE` date DEFAULT NULL,
  `P_BIRTHPLACE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_BIRTH_DEP` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_HORAIRE` smallint(6) DEFAULT NULL,
  `P_PHONE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_PHONE2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_ABBREGE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_ADDRESS` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_ZIP_CODE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_CITY` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_RELATION_PRENOM` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_RELATION_NOM` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_RELATION_PHONE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_RELATION_MAIL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_HIDE` tinyint(4) NOT NULL DEFAULT 1,
  `P_PHOTO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_LAST_CONNECT` datetime DEFAULT NULL,
  `P_NB_CONNECT` int(11) NOT NULL DEFAULT 0,
  `GP_FLAG1` tinyint(4) NOT NULL DEFAULT 0,
  `GP_FLAG2` tinyint(4) NOT NULL DEFAULT 0,
  `TS_CODE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TS_HEURES` double(8,2) DEFAULT NULL,
  `TS_JOURS_CP_PAR_AN` double(8,2) DEFAULT NULL,
  `TS_HEURES_PAR_AN` double(8,2) DEFAULT NULL,
  `TS_HEURES_A_RECUPERER` double(8,2) DEFAULT NULL,
  `P_NOSPAM` tinyint(4) NOT NULL DEFAULT 0,
  `P_CREATE_DATE` date DEFAULT NULL,
  `SERVICE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `TP_ID` tinyint(4) NOT NULL DEFAULT 0,
  `MOTIF_RADIATION` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `NPAI` tinyint(4) NOT NULL DEFAULT 0,
  `DATE_NPAI` date DEFAULT NULL,
  `OBSERVATION` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `SUSPENDU` tinyint(4) NOT NULL DEFAULT 0,
  `DATE_SUSPENDU` date DEFAULT NULL,
  `DATE_FIN_SUSPENDU` date DEFAULT NULL,
  `MONTANT_REGUL` double(8,2) NOT NULL DEFAULT 0.00,
  `P_CALENDAR` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `P_ACCEPT_DATE` datetime DEFAULT NULL,
  `TS_HEURES_PAR_JOUR` double(8,2) DEFAULT NULL,
  `P_MAITRE` int(11) NOT NULL DEFAULT 0,
  `P_PAYS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`P_ID`),
  UNIQUE KEY `users_p_email_unique` (`P_EMAIL`),
  UNIQUE KEY `P_CODE` (`P_CODE`)
) ENGINE=MyISAM AUTO_INCREMENT=6003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`P_ID`, `P_NOM`, `P_EMAIL`, `P_MDP`, `P_CODE`, `P_PRENOM`, `P_PRENOM2`, `P_NOM_NAISSANCE`, `P_SEXE`, `P_CIVILITE`, `P_OLD_MEMBER`, `P_GRADE`, `P_PROFESSION`, `P_STATUT`, `P_PASSWORD_FAILURE`, `P_DATE_ENGAGEMENT`, `P_FIN`, `P_SECTION`, `C_ID`, `GP_ID`, `GP_ID2`, `P_BIRTHDATE`, `P_BIRTHPLACE`, `P_BIRTH_DEP`, `P_HORAIRE`, `P_PHONE`, `P_PHONE2`, `P_ABBREGE`, `P_ADDRESS`, `P_ZIP_CODE`, `P_CITY`, `P_RELATION_PRENOM`, `P_RELATION_NOM`, `P_RELATION_PHONE`, `P_RELATION_MAIL`, `P_HIDE`, `P_PHOTO`, `P_LAST_CONNECT`, `P_NB_CONNECT`, `GP_FLAG1`, `GP_FLAG2`, `TS_CODE`, `TS_HEURES`, `TS_JOURS_CP_PAR_AN`, `TS_HEURES_PAR_AN`, `TS_HEURES_A_RECUPERER`, `P_NOSPAM`, `P_CREATE_DATE`, `SERVICE`, `TP_ID`, `MOTIF_RADIATION`, `NPAI`, `DATE_NPAI`, `OBSERVATION`, `SUSPENDU`, `DATE_SUSPENDU`, `DATE_FIN_SUSPENDU`, `MONTANT_REGUL`, `P_CALENDAR`, `P_ACCEPT_DATE`, `TS_HEURES_PAR_JOUR`, `P_MAITRE`, `P_PAYS`) VALUES
(9, 'Hebner', 'michael@sdis68.com', '0acf4539a14b3aa27deeb4cbdf6e989f', '2', 'michael', '', '', 'M', 1, 0, 'JSP', 'SPP', 'SPV', NULL, '2020-03-14', NULL, 0, 0, 0, 0, '1995-05-27', 'MULHOUSE', '', NULL, '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 0, 0, 0, '', 0.00, NULL, NULL, NULL, 0, '2020-03-14', NULL, 4, NULL, 0, NULL, NULL, 0, NULL, NULL, 0.00, NULL, NULL, NULL, 0, 65),
(7, 'khojn', 'badr@sdis68.com', 'e1a378b86bc5c0203239b935e2964ba3', '7', 'badr', '', '', 'M', 1, 0, 'JSP', 'SPP', 'SPV', NULL, '2020-03-14', NULL, 0, 0, 0, 0, '1995-05-27', 'MULHOUSE', '', NULL, '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 0, 0, 0, '', 0.00, NULL, NULL, NULL, 0, '2020-03-14', NULL, 4, NULL, 0, NULL, NULL, 0, NULL, NULL, 0.00, NULL, NULL, NULL, 0, 65),
(8, 'joel', 'joel@sdis68.com', 'c000ccf225950aac2a082a59ac5e57ff', '8', 'joel', '', '', 'M', 1, 0, 'JSP', 'SPP', 'SPV', NULL, '2020-03-14', NULL, 0, 0, 0, 0, '1995-05-27', 'MULHOUSE', '', NULL, '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 0, 0, 0, '', 0.00, NULL, NULL, NULL, 0, '2020-03-14', NULL, 4, NULL, 0, NULL, NULL, 0, NULL, NULL, 0.00, NULL, NULL, NULL, 0, 65),
(5, 'tata', 'tata@sdis68.com', '49d02d55ad10973b7b9d0dc9eba7fdf0', '5', 'tata', '', '', 'M', 1, 0, 'JSP', 'SPP', 'SPV', NULL, '2020-03-14', NULL, 0, 0, 0, 0, '1995-05-27', 'MULHOUSE', '', NULL, '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 0, 0, 0, '', 0.00, NULL, NULL, NULL, 0, '2020-03-14', NULL, 4, NULL, 0, NULL, NULL, 0, NULL, NULL, 0.00, NULL, NULL, NULL, 0, 65),
(6, 'david', 'david@sdis68.com', '172522ec1028ab781d9dfd17eaca4427', '6', 'david', '', '', 'M', 1, 0, 'JSP', 'SPP', 'SPV', NULL, '2020-03-14', NULL, 0, 0, 0, 0, '1995-05-27', 'MULHOUSE', '', NULL, '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 0, 0, 0, '', 0.00, NULL, NULL, NULL, 0, '2020-03-14', NULL, 4, NULL, 0, NULL, NULL, 0, NULL, NULL, 0.00, NULL, NULL, NULL, 0, 65),
(4, 'toto', 'toto@sdis68.com', 'f71dbe52628a3f83a77ab494817525c6', '4', 'toto', '', '', 'M', 1, 0, 'JSP', 'SPP', 'SPV', NULL, '2020-03-14', NULL, 0, 0, 0, 0, '1995-05-27', 'MULHOUSE', '', NULL, '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 0, 0, 0, '', 0.00, NULL, NULL, NULL, 0, '2020-03-14', NULL, 4, NULL, 0, NULL, NULL, 0, NULL, NULL, 0.00, NULL, NULL, NULL, 0, 65),
(1, 'fares', 'fares@sdis68.com', '21232f297a57a5a743894a0e4a801fc3', '1234', 'admin', NULL, NULL, 'f', 1, 0, 'CHEF', 'SPA', 'ff', NULL, '2006-01-01', NULL, 0, 0, 4, 0, '1995-05-27', 'TANGER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2020-03-14 00:29:36', 23, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 4, NULL, 0, NULL, NULL, 0, NULL, NULL, 0.00, NULL, NULL, NULL, 0, NULL),
(2, 'Kante', 'kante@sdis68.com', 'eac0cfd495187ac65c68ed47bb43312d', '1', 'kante', '', '', 'M', 1, 0, 'RESP', 'SPP', 'SPV', NULL, '2020-03-14', NULL, 2, 0, 0, 0, '1995-05-27', 'MULHOUSE', '', NULL, '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 0, 0, 0, '', 0.00, NULL, NULL, NULL, 0, '2020-03-14', NULL, 4, NULL, 0, NULL, NULL, 0, NULL, NULL, 0.00, NULL, NULL, NULL, 0, 65),
(3, 'khamlichi', 'hamza@sdis68.com', '8950259507cd8ce2a99f8b94674f2b77', '3', 'hamza', 'hamza', '', 'M', 1, 0, 'RESP', 'SPP', 'SPV', NULL, '2020-03-14', NULL, 0, 0, 0, 0, '1995-05-27', 'MULHOUSE', '', NULL, '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 0, 0, 0, '', 0.00, NULL, NULL, NULL, 0, '2020-03-14', NULL, 4, NULL, 0, NULL, NULL, 0, NULL, NULL, 0.00, NULL, NULL, NULL, 0, 65);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
