-- Culture Béninoise Database Setup
-- phpMyAdmin SQL Dump adapté pour Laravel
-- Compatible avec le projet Culture Béninoise Laravel

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Supprimer les tables existantes (sauf migrations qui sera préservée)
DROP TABLE IF EXISTS `cache`;
DROP TABLE IF EXISTS `cache_locks`;
DROP TABLE IF EXISTS `commentaires`;
DROP TABLE IF EXISTS `contenus`;
DROP TABLE IF EXISTS `failed_jobs`;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `job_batches`;
DROP TABLE IF EXISTS `langues`;
DROP TABLE IF EXISTS `medias`;
DROP TABLE IF EXISTS `parler`;
DROP TABLE IF EXISTS `password_reset_tokens`;
DROP TABLE IF EXISTS `regions`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `sessions`;
DROP TABLE IF EXISTS `type_contenus`;
DROP TABLE IF EXISTS `type_medias`;
DROP TABLE IF EXISTS `utilisateurs`;
-- Note: La table `migrations` est préservée

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `texte` text NOT NULL,
  `note` tinyint(4) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '2025-11-30 22:21:05',
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `id_contenu` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `texte`, `note`, `date`, `id_utilisateur`, `id_contenu`, `created_at`, `updated_at`) VALUES
(1, 'Très intéressant !', 5, '2025-11-30 22:21:06', 4, 1, NULL, NULL),
(2, 'Recette facile à suivre', 4, '2025-11-30 22:21:06', 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contenus`
--

CREATE TABLE `contenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT '2025-11-30 22:21:05',
  `statut` enum('en_attente','valide','bloque') NOT NULL DEFAULT 'en_attente',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `id_region` bigint(20) UNSIGNED DEFAULT NULL,
  `id_langue` bigint(20) UNSIGNED DEFAULT NULL,
  `id_moderateur` bigint(20) UNSIGNED DEFAULT NULL,
  `id_type_contenu` bigint(20) UNSIGNED DEFAULT NULL,
  `id_auteur` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contenus`
--

INSERT INTO `contenus` (`id`, `titre`, `texte`, `date_creation`, `statut`, `parent_id`, `date_validation`, `id_region`, `id_langue`, `id_moderateur`, `id_type_contenu`, `id_auteur`, `created_at`, `updated_at`) VALUES
(1, 'Le conte de la tortue et du lièvre', 'Il était une fois une tortue sage qui défia un lièvre rapide...', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 2, 2, 2, 1, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(2, 'Légende de Dan, le serpent sacré', 'Dan, le serpent arc-en-ciel, protège les villages depuis la nuit des temps...', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 6, 2, 2, 1, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(3, 'L\'histoire de Sègbo, le chasseur du Zou', 'Sègbo était un chasseur réputé pour son courage et ses pouvoirs mystiques...', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 5, 2, 2, 1, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(4, 'La légende des jumeaux sacrés', 'Dans la culture yoruba du Bénin, les jumeaux sont des êtres sacrés porteurs de bénédictions...', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 10, 3, 1, 1, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(5, 'La Porte du Non-Retour', 'Monument emblématique de la Route des Esclaves à Ouidah.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 6, 1, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(6, 'La Forêt Sacrée de Kpassè', 'Site religieux majeur où se pratiquent des rites Vodoun.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 6, 1, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(7, 'Le Temple des Pythons', 'Lieu sacré abritant des pythons associés au dieu Dangbé.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 6, 1, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(8, 'Le Musée Historique d\'Abomey', 'Ancien palais royal retraçant l\'histoire du royaume du Danxomè.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 4, 1, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(9, 'Ganvié – La Cité Lacustre', 'Village sur pilotis surnommé la Venise d\'Afrique.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 8, 1, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(10, 'Les Tata Somba', 'Habitat traditionnel fortifié du peuple Somba dans l\'Atacora.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 2, 1, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(11, 'Plage de Grand-Popo', 'Une des plus belles plages du Bénin, entre mer et lagune.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 9, 1, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(12, 'Pendjari – Parc National', 'Réserve animalière avec éléphants, lions et biodiversité unique.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 2, 1, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(13, 'Amiwo et poulet braisé', 'Plat rouge traditionnel préparé avec du maïs et de l\'huile rouge.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 4, 2, 2, 2, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(14, 'Pâte rouge et poisson', 'Pâte de maïs accompagnée de sauce tomate épicée.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 4, 2, 2, 2, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(15, 'Ignam pilé + sauce arachide', 'Plat national préparé à base d\'igname pilé et de sauce arachide.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 5, 2, 2, 2, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(16, 'Ablo et poisson', 'Gâteau vapeur sucré/salé servi avec du poisson.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 9, 2, 2, 2, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(17, 'Wassa-Wassa', 'Plat du nord à base de manioc râpé cuit à la vapeur.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 1, 2, 2, 2, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(18, 'Kom', 'Pâte fermentée servie avec une sauce légère.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 8, 2, 2, 2, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(19, 'Toubani', 'Gâteau de haricot blanc apprécié dans la région nord.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 1, 2, 2, 2, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(20, 'Dégué', 'Couscous sucré au lait et yaourt.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 8, 2, 2, 2, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(21, 'Gari Foté', 'Gari mélangé avec sauce arachide et poisson.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 10, 2, 2, 2, 3, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(22, 'Tèkè', 'Danse rituelle du nord accompagnée de tambours et de chants.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 1, 2, 2, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(23, 'Zinli', 'Danse populaire du centre avec rythme rapide.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 5, 2, 2, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(24, 'Agbadja', 'Danse traditionnelle du Sud du Bénin.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 10, 2, 2, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(25, 'Sato', 'Grande danse cérémonielle du Danxomè.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 4, 2, 2, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(26, 'Gouka', 'Danse de bravoure avec chants épiques.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 6, 2, 2, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(27, 'Tchingounmè', 'Rythme typique du Sud bénin utilisé pour les cérémonies.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 10, 2, 1, 3, 2, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(28, 'Kpanlogo vodoun', 'Musique traditionnelle jouée avec tambours sacrés.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 6, 2, 1, 3, 2, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(29, 'Sato royal', 'Rythme du royaume du Danxomè joué lors des fêtes royales.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 4, 2, 1, 3, 2, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(30, 'Rite Vodoun Dan', 'Culte dédié au serpent sacré dans la région de Ouidah.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 6, 2, 2, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(31, 'Rite Egungun', 'Masques et cérémonies spirituelles des Yorubas.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 10, 2, 2, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(32, 'Rite Sakpata', 'Culte de la terre et des maladies de la peau.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 4, 2, 2, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(33, 'Festival du Vodoun', 'Célébration annuelle du 10 janvier à Ouidah.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 6, 2, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(34, 'Gaani', 'Grande fête traditionnelle peule et bariba.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 1, 2, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(35, 'Fête de l\'igname', 'Cérémonie annuelle célébrant les nouvelles récoltes.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 5, 2, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(36, 'Festival des masques Guèlèdè', 'Célébration classée patrimoine UNESCO.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 10, 2, 1, 3, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(37, 'Artisanat du bronze d\'Abomey', 'Fabrication de statues et objets en bronze.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 4, 2, 3, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(38, 'Teinture Kanvô', 'Technique traditionnelle de teinture indigo à Porto-Novo.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 10, 2, 3, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(39, 'Tissage traditionnel', 'Méthodes ancestrales de tissage dans le nord.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 1, 2, 3, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(40, 'Fabrication du korè', 'Sculpture du bois pour rites spirituels.', '2025-11-30 22:21:06', 'valide', NULL, '2025-11-30 22:21:06', 6, 2, 3, 3, 4, '2025-11-30 21:21:06', '2025-11-30 21:21:06');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

CREATE TABLE `langues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_langue` varchar(255) NOT NULL,
  `code_langue` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `langues`
--

INSERT INTO `langues` (`id`, `nom_langue`, `code_langue`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Français', 'fr', 'Langue officielle du Bénin', NULL, NULL),
(2, 'Fon', 'fon', 'Principal language du sud (Gbe)', NULL, NULL),
(3, 'Yoruba', 'yor', 'Langue importante au sud', NULL, NULL),
(4, 'Goun', 'gou', 'Parlé dans la région de Porto-Novo', NULL, NULL),
(5, 'Mina', 'min', 'Parlé dans le Sud (Grand-Popo)', NULL, NULL),
(6, 'Aja', 'aja', 'Langue du sud-ouest', NULL, NULL),
(7, 'Bariba', 'bar', 'Langue du Nord (Borgou)', NULL, NULL),
(8, 'Dendi', 'den', 'Langue du Nord (zone Dendi)', NULL, NULL),
(9, 'Fulfulde', 'ful', 'Langue des Peuls au nord', NULL, NULL),
(10, 'Yom', 'yom', 'Langue du centre (Collines)', NULL, NULL),
(11, 'Mokole', 'mok', 'Variante du sud, proche du Yoruba', NULL, NULL),
(12, 'Adja', 'adj', 'Groupe Gbe, sud-ouest', NULL, NULL),
(13, 'Tori', 'tor', 'Petite langue locale', NULL, NULL),
(14, 'Toffin', 'tof', 'Variante locale', NULL, NULL),
(15, 'Biali', 'bia', 'Langue du nord', NULL, NULL),
(16, 'Anii', 'ani', 'Langue menacée du sud-ouest', NULL, NULL),
(17, 'Aguna', 'agu', 'Langue vulnérable', NULL, NULL),
(18, 'Miyobe', 'miy', 'Langue menacée', NULL, NULL),
(19, 'Gwamhi-Wuri', 'gwm', 'Langue locale vulnérable', NULL, NULL),
(20, 'Lokpa', 'lok', 'Langue du nord-ouest', NULL, NULL),
(21, 'Tammari', 'tam', 'Langue au nord (Somba/Tata)', NULL, NULL),
(22, 'Nateni', 'nat', 'Langue nord-centre', NULL, NULL),
(23, 'Kabiyé', 'kab', 'Présente en régions frontalières (Togo/Bénin)', NULL, NULL),
(24, 'Wémé', 'wem', 'Petit groupe linguistique local', NULL, NULL),
(25, 'Seto', 'set', 'Petit groupe local', NULL, NULL),
(26, 'Defi', 'def', 'Petit groupe', NULL, NULL),
(27, 'Xwla', 'xwl', 'Petit groupe', NULL, NULL),
(28, 'Tchumbuli', 'tch', 'Langue en danger', NULL, NULL),
(29, 'Nago', 'nago', 'Dialecte du yoruba au Bénin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `id_contenu` bigint(20) UNSIGNED DEFAULT NULL,
  `id_type_media` bigint(20) UNSIGNED NOT NULL,
  `langue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `chemin`, `description`, `id_contenu`, `id_type_media`, `langue_id`, `created_at`, `updated_at`) VALUES
(1, 'media/contenus/tortue_lièvre.mp3', 'Lecture audio du conte', 1, 2, 2, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(2, 'media/contenus/wagasi.jpg', 'Photo du fromage Wagasi', 2, 1, 5, '2025-11-30 21:21:06', '2025-11-30 21:21:06');

-- --------------------------------------------------------

--
-- Structure de la table `parler`
--

CREATE TABLE `parler` (
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `langue_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parler`
--

INSERT INTO `parler` (`region_id`, `langue_id`, `created_at`, `updated_at`) VALUES
(1, 6, NULL, NULL),
(1, 7, NULL, NULL),
(8, 1, NULL, NULL),
(8, 2, NULL, NULL),
(9, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_region` varchar(255) NOT NULL,
  `type_region` enum('departement','commune','ville','autre') NOT NULL DEFAULT 'commune',
  `description` text DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `superficie` double DEFAULT NULL,
  `localisation` text DEFAULT NULL,
  `code_region` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom_region`, `type_region`, `description`, `population`, `superficie`, `localisation`, `code_region`, `created_at`, `updated_at`) VALUES
(1, 'Alibori', 'departement', 'Nord-est du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Atacora', 'departement', 'Nord-ouest du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Atlantique', 'departement', 'Sud-centre du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Borgou', 'departement', 'Nord-centre du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Collines', 'departement', 'Centre du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Donga', 'departement', 'Nord-ouest du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Kouffo', 'departement', 'Sud-ouest du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Littoral', 'departement', 'Petit département comprenant Cotonou', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Mono', 'departement', 'Sud-ouest du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Ouémé', 'departement', 'Sud-est du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Plateau', 'departement', 'Centre-est du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Zou', 'departement', 'Centre-sud du Bénin', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Banikoara', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Gogounou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Kandi', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Karimama', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Malanville', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Segbana', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Boukoumbé', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Cobly', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Kérou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Kouandé', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Matéri', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Natitingou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Péhunco', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Tanguiéta', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Toucountouna', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Abomey-Calavi', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Allada', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Kpomassè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Ouidah', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Sô-Ava', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Toffo', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Tori-Bossito', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Zè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Bembèrèkè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Kalalé', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'N\'Dali', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Nikki', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Parakou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Pèrèrè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Sinendé', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Tchaourou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Bantè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Dassa-Zoumè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Glazoué', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Ouèssè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Savalou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Savé', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Bassila', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Copargo', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Djougou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Ouaké', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Aplahoué', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Djakotomey', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Klouékanmè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Lalo', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Toviklin', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Dogbo-Tota', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Cotonou', 'ville', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Athiémé', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Bopa', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Comé', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Grand-Popo', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Houéyogbé', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Lokossa', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Adjarra', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Adjohoun', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Aguégués', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Akpro-Missérété', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Avrankou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Bonou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Dangbo', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Porto Novo', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'Sèmè-Kpodji', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Ifangni', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Adja-Ouèrè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Kétou', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Pobè', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Sakété', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Abomey', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Agbangnizoun', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Bohicon', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Cové', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'Djidja', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Ouinhi', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'Za-Kpota', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'Zangnanado', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'Zogbodomey', 'commune', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nom_role`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', NULL, NULL),
(2, 'Moderateur', NULL, NULL),
(3, 'Contributeur', NULL, NULL),
(4, 'Lecteur', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BH3fauXTABSAvLTr0Gwa6qP3AYZL4ATwDJ1ZChmw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWlzWTk3QjFETDhhT1UyVE43WkdzaGR5b3YxV1pvTGVXbGFrcEY3TiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764657901),
('Ibg4O3XWlYRvN0vOXvpHitvHjshvmpnnqutCV0pO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.2161', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclZ2NllPWE1WazJ2QjJzTDFIN285VDNqcFFsS2JGdmU4UUVBdGFvaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764678929),
('KOV1xuAki9Qtik7xdtcUh17tLTfv2xGhCNVbAGGa', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVU5uTThqSHNFVVBEcnAwWTFHOU9PUWNBeHpyUThqaWNDdlhRblB2ViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1764679003),
('L61IYRGgSyWSzFpa7t03dixAtDsyePaZo4x8Waoy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGN2dW85NGQ2OXY2WVM5VERDZmJQdk5ibXVNZU9DbE5wUmMxdWdjViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764595102),
('q5l4a5bstF6orzRYSacJ4Fxi7TWpv7DctVWjRB0z', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieDltWEJFaTRPY2haVDJCSm1YcE5XY3Nua1BjQUtQQ20wRjRRSmxlUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1764581597),
('sNJRv3DCta44N5nALluGRuGjpdRmkTNiSAZ2M1NZ', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRUhrRGYyNVFpcnM3STRNS0lsN3dobHpuVHo2RTdJNDNKSWxSWnZtbyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1764679325),
('TmNSHnmvzVm0M7lxF2iayg42PZaV2azguSQlAqYH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZVJWaUNKOW1QeWhHMEJuYTh4ZVBiYnJjRmVrenRGeVFKWU5YY1VSMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyIjt9fQ==', 1764595168),
('tYH2lrousazUNWJQcO1bNoVkGZJGnidIEV2sW3YK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGN2dW85NGQ2OXY2WVM5VERDZmJQdk5ibXVNZU9DbE5wUmMxdWdjViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764560695),
('uPWSNvd4IdCN0bwBkuwnIEQ2ckZijDRhyXiIdHRX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHhCbjNuNkFaYjhlWHoxbUhMRm1FWHU0NDRsSE9sQ0ZVaWhscVFOZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sYW5ndWVzIjt9fQ==', 1765112408),
('XBNyhXbNNxsVfduk443cDW7MvuTt3FE2K52B8mzT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMlJFR01pajBvQlB5d1JCWkE1eUpsTGFVU3VFZzJiSTdLOFhjelFNbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJzdGF0ZSI7czo0MDoiNEhzUTJzR3U3aWVCaklVbzBwZ216dVpMVGdWUFdWeldQT3ZkelBNbiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1764558609),
('xQ3A4xYdlhg4Lx3w9jqVT6sSU2asiDV55QRrnBIb', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieDltWEJFaTRPY2haVDJCSm1YcE5XY3Nua1BjQUtQQ20wRjRRSmxlUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jb250ZW51cyI7czo1OiJyb3V0ZSI7czoxNDoiZnJvbnQuY29udGVudXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6InN0YXRlIjtzOjQwOiJSNVRoNEpzbHFTTEc3NlNwcUJHZHA5cHprS1JKakI2WldGSHdLcldhIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1764557444),
('YbQLCuSEgu9phfeqLg1HAH3DgGcZjsn94I9dL0FP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRDdHbEtMRm1xazVtN0Nhb1BRemw1VTc1bWxOOHZWazBWdTdTa0p5bSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJzdGF0ZSI7czo0MDoiNEhzUTJzR3U3aWVCaklVbzBwZ216dVpMVGdWUFdWeldQT3ZkelBNbiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1764657895);

-- --------------------------------------------------------

--
-- Structure de la table `type_contenus`
--

CREATE TABLE `type_contenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_contenu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_contenus`
--

INSERT INTO `type_contenus` (`id`, `nom_contenu`, `created_at`, `updated_at`) VALUES
(1, 'Histoire/Conte', NULL, NULL),
(2, 'Recette', NULL, NULL),
(3, 'Article culturel', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_medias`
--

CREATE TABLE `type_medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_media` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_medias`
--

INSERT INTO `type_medias` (`id`, `nom_media`, `created_at`, `updated_at`) VALUES
(1, 'Image', NULL, NULL),
(2, 'Audio', NULL, NULL),
(3, 'Vidéo', NULL, NULL),
(4, 'Document', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `sexe` enum('M','F') DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `date_inscription` datetime NOT NULL DEFAULT '2025-11-30 22:21:05',
  `photo` varchar(255) DEFAULT NULL,
  `statut` enum('valide','bloque','en_attente','desactive') NOT NULL DEFAULT 'en_attente',
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `id_langue` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `sexe`, `date_naissance`, `date_inscription`, `photo`, `statut`, `id_role`, `id_langue`, `created_at`, `updated_at`) VALUES
(1, 'NASCIMENTO', 'Zachario Blimond', 'nascimentozachario@gmail.com', '$2y$12$pRcyDumvjdopGGgiK.cs/uoLW6z3HaUCYwmtXG5i3HUJrw8nNPFMy', 'M', '2004-11-05', '2025-11-30 22:21:05', 'photos/default.png', 'valide', 1, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(2, 'COMLAN', 'Maurice', 'maurice.comlan@uac.bj', '$2y$12$XI6Zuafntay1HfIN74GeOeTfaGW9pBmpa/lryeRODS9Poj63fHKC6', 'M', '1975-01-01', '2025-11-30 22:21:06', 'photos/default.png', 'valide', 1, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(3, 'KUROKIBA', 'Arthur', 'arthur.otk.kurokiba@gmail.com', '$2y$12$wi8ohabvg83TcoAE/E0zFOD2KS9xBdMj7g8haj0vZdgzFd94V9e6a', 'F', '2004-11-04', '2025-11-30 22:21:06', 'photos/default.png', 'valide', 3, 2, '2025-11-30 21:21:06', '2025-11-30 21:21:06'),
(4, 'OKE', 'Meryl', 'meryloke7@gmail.com', '$2y$12$FrOp5DUStd/5FExV8RZvW.o/yn1Z5beG.Ba2Zl5SuIBD.yGaMCKfS', 'M', '2007-12-11', '2025-11-30 22:21:06', 'photos/default.png', 'valide', 4, 1, '2025-11-30 21:21:06', '2025-11-30 21:21:06');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_id_utilisateur_foreign` (`id_utilisateur`),
  ADD KEY `commentaires_id_contenu_foreign` (`id_contenu`);

--
-- Index pour la table `contenus`
--
ALTER TABLE `contenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contenus_id_region_foreign` (`id_region`),
  ADD KEY `contenus_id_langue_foreign` (`id_langue`),
  ADD KEY `contenus_id_moderateur_foreign` (`id_moderateur`),
  ADD KEY `contenus_id_type_contenu_foreign` (`id_type_contenu`),
  ADD KEY `contenus_id_auteur_foreign` (`id_auteur`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `langues_code_langue_unique` (`code_langue`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medias_id_contenu_foreign` (`id_contenu`),
  ADD KEY `medias_id_type_media_foreign` (`id_type_media`),
  ADD KEY `medias_langue_id_foreign` (`langue_id`);

--
-- Index pour la table `parler`
--
ALTER TABLE `parler`
  ADD PRIMARY KEY (`region_id`,`langue_id`),
  ADD KEY `parler_langue_id_foreign` (`langue_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_nom_role_unique` (`nom_role`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `type_contenus`
--
ALTER TABLE `type_contenus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_contenus_nom_contenu_unique` (`nom_contenu`);

--
-- Index pour la table `type_medias`
--
ALTER TABLE `type_medias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_medias_nom_media_unique` (`nom_media`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateurs_email_unique` (`email`),
  ADD KEY `utilisateurs_id_role_foreign` (`id_role`),
  ADD KEY `utilisateurs_id_langue_foreign` (`id_langue`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contenus`
--
ALTER TABLE `contenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_contenus`
--
ALTER TABLE `type_contenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_medias`
--
ALTER TABLE `type_medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_id_contenu_foreign` FOREIGN KEY (`id_contenu`) REFERENCES `contenus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaires_id_utilisateur_foreign` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contenus`
--
ALTER TABLE `contenus`
  ADD CONSTRAINT `contenus_id_auteur_foreign` FOREIGN KEY (`id_auteur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contenus_id_langue_foreign` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `contenus_id_moderateur_foreign` FOREIGN KEY (`id_moderateur`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `contenus_id_region_foreign` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `contenus_id_type_contenu_foreign` FOREIGN KEY (`id_type_contenu`) REFERENCES `type_contenus` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_id_contenu_foreign` FOREIGN KEY (`id_contenu`) REFERENCES `contenus` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `medias_id_type_media_foreign` FOREIGN KEY (`id_type_media`) REFERENCES `type_medias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medias_langue_id_foreign` FOREIGN KEY (`langue_id`) REFERENCES `langues` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `parler`
--
ALTER TABLE `parler`
  ADD CONSTRAINT `parler_langue_id_foreign` FOREIGN KEY (`langue_id`) REFERENCES `langues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parler_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_id_langue_foreign` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `utilisateurs_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

