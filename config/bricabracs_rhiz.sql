-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 19 déc. 2017 à 17:14
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bricabracs_rhiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_article` bigint(21) NOT NULL,
  `titre` text NOT NULL,
  `id_rubrique` bigint(21) NOT NULL DEFAULT '0',
  `descriptif` text NOT NULL,
  `texte` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `statut` varchar(10) NOT NULL DEFAULT '0',
  `id_secteur` bigint(21) NOT NULL DEFAULT '0',
  `maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_redac` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modif` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `titre`, `id_rubrique`, `descriptif`, `texte`, `date`, `statut`, `id_secteur`, `maj`, `date_redac`, `date_modif`) VALUES
(1, 'question : quel est le nom de ces pierres ?', 2, '', 'Garance nous a amené une pierre. \nElle vient de son jardin où ils sont en train de faire un forage à plus de 100m de profondeur.\n\nOn voit bien que ce n\'est pas les mêmes pierres que les pierres qu\'on a à Bricabracs, bien blanche ou marron claire.\n\nSavez vous ce que c\'est ?\n\n<img3197|left>', '2017-09-07 21:06:24', 'publie', 2, '2017-12-15 22:24:16', '0000-00-00 00:00:00', '2017-09-07 15:20:02'),
(2, 'Créatextes et dessins 7/9/17', 3, '', 'semaine du 4 au 8 septembre 2017\r\nextraits de créations : dessins et créatextes.\r\n\r\n<emb3198|center>', '2017-09-07 21:05:00', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-07 21:00:02'),
(3, 'Bricole : Puissance 4', 2, '', 'Lys notre ado en résidence, s\'était lancé en juillet dans une construction. \nFinalisation cette semaine et peinture !\nManque que les pions... qu\'on va retrouver !! ou refabriquer...\n<img3199|left><img3200|left>', '2017-09-07 21:23:33', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-07 21:23:19'),
(4, 'Journal La Tanière Bricabracs 1 / 7 septembre 2017', 3, '', '<emb3201|center>', '2017-09-07 21:30:44', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-07 21:30:35'),
(5, 'Une semaine au quotidien', 2, '', 'Il y a de la vie quotidienne qui revient chaque semaine.\n\n{{le pain}} : un groupe est de service chaque jour pour préparer le pain pour le repas du lendemain. \nRepos d\'une nuit et cuisson au petit matin. \nPhotographe indisponible à ce moment là......finalement nous avons une photo !!\n<img3214|center>\n\n{{le journal }} : dès qu\'il y a matière, on s\'y met. \nFrancesca nous a montré comment faire l\'an passé.\nOn cherche une machine à écrire, des tampons avec des lettres ou une imprimerie !\nou toute sorte de tampon rigolo, déco, etc.\n<img3207|center>\n{{\nL\'assemblée}}\ntous les jours à 12h ! discussion sur les problèmes à l\'ordre du jour, présentation des choses qu\'on veut présenter, bilan du travail du matin et préparation de celui de l\'après midi\n\n<img3202|center><img3206|left>\n\n{{Bricolage : }} \nL\'atelier partagé avec les autres associations est ouvert en permanence. on bricole de tout  du puissance en 4 en passant par des épées ou un filet pour la table de ping pong. \n\n<img3203|center>\n\n{{Jardin/ poules}}\nle groupe de service descend tous les jours nourrir la poule de Momo et arroser / nettoyer le jardin. <img3204|left><img3205|left>\n', '2017-09-07 21:47:33', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-12 10:06:35'),
(6, 'Les présentations de la semaine 8/9/17', 2, '', '<img3209|left><img3210|left><img3211|left><img3212|left><img3213|left>', '2017-09-13 12:19:58', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-13 12:20:21'),
(7, 'un jeune homme ', 3, '', 'Un jeune homme \nun  homme arrvie en France fin 1989  avec sa soeur et son petit frere \net un passeport français de son papa puis il est allé à 13003 Marseille\nil commence en cp1 dès qu\'il arrive en 1990 à parc kalliste 13015 \n Après avec sa famille il est allé au collège de vallon de pains 6ème arrondissement.\nIl à décide tout seul avec ses professeur d\'aller en formation professionnelle.\nIls l\'ont aide aussi à faire les démarches de la demande de séjour de dix  ans car son papa  ne voulait pas.\nil aide sa famille aux Comores  il aide beaucoup acheter  à choses pour  la maison à sa maman et ses soeur \nil raconte beaucoup sa vie \nMomo \n\n\n ', '2017-09-12 09:26:44', 'prepa', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-12 10:00:27'),
(8, 'Quel regard !', 2, '', 'En plein cadre, à qui appartient ce regard ? \r\n\r\n<img3215|center>\r\n', '2017-09-12 10:36:36', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-12 10:13:38'),
(9, 'Prise de vue des présentations', 2, '', 'Tous les jours, des présentations théâtralisées ont lieu dans la salle Bricabracs .  \nLa nouveauté de la rentrée : prendre une photo en réalisant la mise en scène. \n\nLundi 11 septembre, Jona photographe \nAnna présente le cheval                                 <img3216|right>\nNils présente des cartes de jeu\nLila présente des pet shop et la sacoche \nIlane présente un porte clef\nJona présente un livre\nYakin présente une raie manta\nEt le microscope de Flora.\n', '2017-09-12 10:36:49', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-13 12:23:21'),
(10, 'Le gecko de la Tanière', 2, '', 'Alors que nous rentrions du repas . \r\nQue voilà !? Un passager \" qui porte bonheur \"dit un enfant . \r\n\r\nDe quel pays nous vient ce reptile ? Avez vous une histoire à nous partager sur ce lézard \"sacré\" ?\r\n<img3217|center>\r\n<img3218|center>', '2017-09-13 19:52:54', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-13 19:52:14'),
(11, 'Créatextes et dessins 13/9/17', 3, '', 'Dessins et textes de la semaine\n<img3220|left>\n<emb3219|center>', '2017-09-13 21:37:00', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-14 15:46:07'),
(12, 'Le bateau et le château', 2, 'Le bateau et le château', 'Siloé et Yaquin ont construit leur espace de jeux\r\n\r\n<img3221|center>', '2017-09-14 23:41:40', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-14 23:26:07'),
(13, 'Prise de vue des présentations du 15-09', 2, '', 'Les présentations du jour\r\n\r\nNils : carte Pokemon<img3222|right>\r\nAmine : une longue vue\r\nRita : des peluches et des poupées\r\nJona : Superman\r\nErrol : un orque\r\nYaquin : Ranger Ninja Style Rose et une murène\r\nIlane : un bateau en lego\r\net Fabien : Une balance à pince', '2017-09-14 23:42:36', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-14 23:31:34'),
(14, 'Construire un volume ', 2, '', 'Flora et Lilith travaillent les mathématiques, avec les bois colorés. \nElles travaillent aussi leur créativité....\nUne vue de côté , une vue de dessus \n<img3223|left> <img3224|right>\n<img3225|left> <img3226|right>', '2017-09-14 23:42:17', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-14 23:41:26'),
(15, 'La préparation du pain', 2, 'La préparation du pain', 'Avec le groupe de service du lundi 18 septembre,\nLa préparation du pain se fait avec effort et sourire \n<img3228|center>\n<img3230|center>\n<img3231|center>\n<img3232|center>\n<img3233|center>', '2017-09-21 11:08:30', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-21 11:08:26'),
(16, 'Apprendre avec le jeu', 2, 'Apprendre avec le jeu ', 'Lundi après midi, nous avons appris à compter , à créer des formes...avec les dominos, tan gram, jeu de carte, carte de séquence...\r\nDes plus vieux aident des moins vieux \r\n<img3235|center>\r\n<img3236|center>\r\n<img3237|center>\r\n<img3238|center>\r\n<img3239|center>', '2017-09-21 11:26:29', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-21 11:26:14'),
(17, 'Créatextes et dessins 21/9/17', 3, '', '<img3247|left>\r\n<emb3246|center>', '2017-09-21 21:46:40', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-21 21:46:33'),
(18, 'Découverte d\'Anna et question fruit', 2, '', 'Anna a pris ce fruit dans un arbre. Elle a photographié l\'arbre. \r\nalors, pouvez vous nous aider, on ne connait pas leurs noms ?\r\n\r\n<img3248|left><img3249|left>', '2017-09-25 17:51:56', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-25 17:51:44'),
(19, 'Créa math : araignée', 2, '', 'Et vous vous en voyez combien des triangles dans cette création ?\r\n<img3250|center>', '2017-09-25 17:59:57', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-25 17:59:49'),
(20, 'cuisine en plein air', 2, '', 'La Cantine du midi nous avait offert quelques légumes après le vide grenier.\r\nFabien a préparé le repas du midi avec les enfants.\r\n\r\n<img3251|left><img3252|left><img3253|left>', '2017-09-26 06:14:50', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-26 06:14:43'),
(21, 'question petite bête', 2, '', 'On a attrapé une bête qui vole. \r\nC\'est plus gros qu\'une guêpe.\r\nElle a quatre taches noires sur le dos...\r\n\r\nOn ne connait pas son nom. Pouvez vous nous aider ?\r\n<img3254|left><img3255|left>', '2017-09-26 06:17:56', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-26 06:17:50'),
(22, 'Expériences électriques', 2, '', 'Ca y est, la caisse électricitée est découverte.\n\nexpériences d\'alarme et de boite lumineuse. Ca devrait s\'allumer quand on ferme la boite. Ce n\'est pas fini...\n<img3259|left><img3257|left><img3258|left><emb3256|left>', '2017-09-26 06:24:11', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-26 06:24:00'),
(23, 'Créa math : comment ça fonctionne ?', 2, '', 'D\'après vous comment ça fonctionne cette machine à mathématique qu\'on a construit à plusieurs avec Flora, Amine, Nils, Lilas, Lilith\r\n <img3260|left>', '2017-09-26 06:26:51', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-26 06:26:44'),
(24, 'Bricolage en tout genre', 2, '', 'Souvenez vous je me faisais bousculer gentiment par Sybille parce que les filles ne faisaient pas de bricolage... patience, on ne rattrape pas des années de conscientisation en une journée...\r\nmais ça vient...\r\nles voilà à l\'oeuvre\r\n\r\n<img3261|left><img3262|left><img3263|left><img3264|left><img3265|left>', '2017-09-26 06:37:51', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-26 06:37:42'),
(25, 'Echelle d\'arbre', 2, '', 'Notre échelle de corde avait été cassée (corde coupée). Jona et Antonio l\'ont reconstruite avec l\'aide d\'Amine et Garance. \r\nJona est déçu il voulait qu\'elle monte jusqu\'à la \"maison\" tout en haut dans l\'arbre. \r\nMais c\'est vraiment trop haut pour les plus jeunes. \r\n\r\n<img3266|left><img3267|left><img3268|left>', '2017-09-26 06:41:12', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-26 06:41:06'),
(26, 'Les gladiateurs', 2, '', 'Atelier bricolage avec Fabien. \nJona, Antonio, Ilane, Nino et Yaquin, les 5 gladiateurs ont construit leurs boucliers . \n\nMirina compte la durée de chaque duel . \nAntonio est l\'arbitre. \n\nLe combat final , tous dans l\'arène !!\n<img3269|center>\n<img3270|center>', '2017-09-26 21:02:27', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-26 21:02:18'),
(27, 'Les vacances de Rita', 2, 'Les vacances de Rita', 'Rita trouve sur son chemin une carte postale, son cahier pour travailler avec son stylo et une balle pour jouer.\r\n<img3273|center>', '2017-09-26 21:05:10', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-26 21:05:06'),
(28, 'une jardinière', 2, '', 'Nous avons une jardinière, souvent que je veux arroser, et j\'écrase tout sous mes pieds. \nAlors nous avons installé des planches, puis des pierres ...en faisant la chaine c\'est plus drôle. \n\nUn peu de ménage , on ramasse les feuilles mortes de l\'amandier. \nC\'est l\'automne !\n\n<img3274|center>\n<img3275|center>\n<img3277|center>\n<img3276|center>', '2017-09-26 21:18:49', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-26 21:17:59'),
(29, 'La roue à aube', 2, '', 'Le projet d\'Antonio : création d\'un bateau à roue à aube\n\nLa bateau est grand, nous avons dû remplir la piscine pour voir si la roue à aube fonctionne. \n\nMontage du toboggan gouttière. \n<img3278|center>\n<img3279|center>\n<img3280|center>\n<img3281|center>', '2017-09-27 16:32:26', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-27 16:48:39'),
(30, 'La maison électrique', 2, '', 'Projet de Nils et Ilane,\n\nLa maison s\'allume quand on ferme boite.\n\nLa préparation d\'une alarme est en cours. \n\n<img3282|center>\n<img3284|center>\n<img3283|center>', '2017-09-27 16:35:44', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-27 16:37:54'),
(31, 'La chasse au trésor', 2, '', 'Rita et Anna ont organisé une chasse au trésor.\n\nAvant le départ, un grand câlin pour une seule équipe. <img3285|right>\n\nDécouverte du trésor.<img3286|right>', '2017-09-27 16:40:52', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-27 16:42:52'),
(32, 'Initiation au Kung - Fu', 2, '', 'Yuma : est ce qu\'un intervenant peux venir donner des cours d\'arts martiaux ?\r\nErwan : et bien, vous avez Sophie sur place qui pratique le Kung Fu.\r\n\r\nYuma s\'occupe de faire les inscriptions.\r\n\r\nLe galop du cheval \r\n<img3287|left>\r\n<img3288|right>', '2017-09-27 16:47:50', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-27 16:47:21'),
(33, 'La stand de Rita et Anna', 2, '', ' Lilith et Mirina ont réalisé une marchande. \r\n\r\nLe support est utilisé pour mettre en vente des objets.<img3289|right>', '2017-09-27 16:53:50', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-27 16:53:44'),
(34, 'La cabane du puit', 2, '', 'Après l\'échelle, nous continuons à aménager l\'espace.\nUne nouvelle cabane pour les plus jeunes.\n\nOn a posé une palette pour commencer le mur\n\n<img3290|center>\n<img3291|center>', '2017-09-27 17:01:36', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-27 17:07:02'),
(35, 'SPAROS les pirates du jardin', 2, '', 'Fabien a proposé qu\'on donne un nom à notre jardin.\r\nPlusieurs propositions ont eu lieu et puis un enfant a proposé de construire un mot à partir des initiale des mots utilisés pendant le jardin.\r\n\r\nPlanter, Semer, Observer, arroser, sentir, récolter\r\n\r\naprès une belle recherche ensemble, le pirate Jacques Sparrow est revenu au jardin sous l\'aspect du\r\n\r\n{{Jardin des SPAROS}}\r\n<img3292|left>', '2017-09-30 07:45:28', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-30 07:45:21'),
(36, 'cabane ça continue', 2, '', 'amélioration et perfectionnement\r\nla cabane continue\r\n\r\n<img3293|left><img3294|left><img3295|left>', '2017-09-30 07:48:43', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-30 07:48:37'),
(37, 'un toit pour notre vieille cabane', 2, '', 'Notre cabane fabriquée en terre, il y a deux ans, a perdu son toit.\n\nNous réfléchissons pour en refaire un. \naujourd\'hui : maquette\nvendredi prochain : on choisira le toit qu\'on veut faire et on commencera à le construire. \n\nTout cela grâce à Laura et Anna, les architectes qui nous aident à penser et construire. \n\n\n<img3296|left><img3297|left><img3298|left><img3299|left><img3300|left><img3301|left><img3302|left>\nCe sont elles aussi qui nous avait mis les pieds dans la boue il y a deux ans !\n<emb1281|center><doc1281|left>', '2017-09-30 08:00:40', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-30 08:01:09'),
(38, 'on sème chez Les SPAROS', 2, '', 'Chez Les SPAROS\r\n\r\navec Lilian aujourd\'hui\r\npréparer la terre en la dégageant de son paillage, \r\nsemer, \r\nratisser doucement pour faire entrer les graines en terre, \r\nremettre de la paille\r\narroser\r\n\r\non a semé : de la luzerne (pour les vaches !), du sarrazin, du trèfle...\r\n\r\nCe sont des plantes qui vont aider la terre à être pleine de nourriture. Ca aidera à grandir les autres plantes qu\'on sèmera plus tard pour les manger (!) \r\n<img3303|left><img3304|left><img3305|left><img3306|left>', '2017-09-30 08:09:12', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-09-30 08:09:03'),
(39, 'Créatextes et dessins 01/10/17', 3, '', '<img3307|center>\r\n<emb3308|center>', '2017-10-01 09:36:14', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-01 09:36:07'),
(40, 'Dissection Le poisson de Yaqin', 2, '', 'Yaqin a pêché un poisson. Il nous l\'a amené. \nOn a regardé comment c\'est à l\'intérieur.\n\nOn a vu les branchies (poumon du poisson qui attrape l\'oxygène qui est dans l\'eau pour le mettre dans le sang du poisson) \nles opercules (petit volet qui se ferme et s\'ouvre sur les cotés du poisson pour faire sortir l\'eau que le poisson a laissé passer par sa bouche.)\net les ouïes (ouverture sur les cotés qui se ferment avec les opercules.)\n\nOn a vu aussi les différentes nageoires.\n\nReportage photo de Lilith.\n\nMais on ne connait pas le nom du poisson.\n<img3309|left><img3310|left><img3311|left><img3312|left><img3313|left><img3314|left>', '2017-10-02 21:49:43', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-02 21:49:36'),
(41, 'Créatextes et dessins 03/10/17', 3, '', '<img3316|center>\r\n<emb3315|center>', '2017-10-03 15:39:07', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-03 15:38:59'),
(42, 'A la Cantine du Midi', 2, '', 'Lundi 2 octobre , à la cantine du midi , \nau menu salade de crudités, Aïoli et Pomme cuite et biscuit fait maison !!!!\nUne délégation de 4 enfants de Bricabracs ont préparé le repas . \n<img3323|center>\n\nFlora et Amine ont présenté le journal \"la Tanière\" aux personnes venues manger. \n\nDessin de Mirina\n<img3320|right>\n\nDessin de Flora\n<img3321|right>\n\nDessin d\'Amine\n<img3322|right>\n\n<img3326|center>\n<img3325|center>\n<img3324|center>\n', '2017-10-03 16:26:52', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-03 16:26:40'),
(43, 'La Tanière N°2 ', 3, '', '<emb3327|center>', '2017-10-03 20:16:03', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-03 20:15:55'),
(44, 'Peintres de cabane', 2, '', 'Ils sont quelques uns à avoir décidé de peindre la cabane cette après midi.\n\n<img3328|left><img3329|left>', '2017-10-04 18:32:18', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-04 18:32:01'),
(45, 'dés-dés', 2, '', 'on a récupéré des dés et une table à langer pour bébé ! \r\n\r\nhop, jets de dés \r\ndis moi comment tu comptes ? \r\n\r\n<img3330|left>', '2017-10-04 18:36:20', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-04 18:36:14'),
(46, 'Créatextes et dessins 09/10/17', 3, '', '<img3331|center>\r\n<emb3332|left>', '2017-10-09 21:37:00', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-09 21:36:52'),
(47, 'Poules', 2, '', 'Ca y est elle n\'est plus seule... Trois nouvelles arrivantes, grâce à Momo et Patrick. \r\nAllez au boulot !  nettoyez le poulailler, nourrir les poules, ... On va avoir du boulot à Bricabracs !\r\n\r\n<img3334|left><img3335|left><img3336|left>', '2017-10-09 21:52:34', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-09 21:52:28'),
(48, 'Cabane Travaux pratiques vendredi 6 octobre 2017', 2, '', 'Vendredi avec Laura et Yohan on a commencé à faire le toit\r\n\r\nOn a fait de sorte : un arrondi et puis un autre en forme de tipi. \r\n\r\nL\'un qui s\'accroche dans le mur déjà construit, l\'autre qui s\'enfonce dans le sol. \r\n\r\nIl faudra qu\'on choisisse !\r\n\r\nMirina, qui était là il y a deux ans s\'est souvenue du plaisir de patauger dans la boue !\r\nOn prépare à nouveau du torchis pour réparer le mur. \r\n\r\nOn a aussi coupé les cannes de Provence en 4 avec un fendeur. \r\n<img3340|left>\r\n<img3339|left><img3338|left><img3337|left>', '2017-10-09 22:04:54', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-09 22:04:47'),
(49, 'Un jour de bon temps pour les mathématiques ', 2, '', 'Du temps libre, des jeux, du beau temps et des mathématiques...à la Tanière, nous comptons même en nous amusant. \n\n<img3341|center>\n<img3342|center>', '2017-10-11 21:30:39', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-11 21:30:10'),
(50, ' Comment fait-on ses lacets ? ', 2, '', '\" Hey ! tu peux faire mes lacets, je ne sais pas les faire \"\nQuotidiennement Lys assiste les demandeurs avec générosité et attention. \nAlors aujourd\'hui, elle propose un atelier \" faire ses lacets\"\n\n<img3344|left>\n<img3343|right>\n<img3345|left>', '2017-10-11 21:53:27', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-11 21:52:29'),
(51, 'La maison en papier ', 2, '', '', '2017-10-11 16:06:00', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-20 16:07:17'),
(52, 'les choix de la semaine', 2, '', 'Chaque semaine on demande aux enfants si ils ont des envies de création, des envies d\'activité, des envies de faire une chose qui leur tient à cœur, seul ou à plusieurs.\n\nVoici en images quelques éléments parmi d\'autres.\nChantier de lacets à la demande de Lys, la boite à Mirina, les fusées de Nils, Ilane et Amine\n\n<img3352|left><img3353|left><img3354|left><img3355|left><img3357|left><img3358|left><img3360|left>\n', '2017-10-14 07:38:36', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-14 07:37:44'),
(53, 'Sirop de menthe', 2, '', 'Passez vos commandes ! \r\n\r\nCécilia est venue nous montrer comment faire du sirop de menthe.\r\nUn gros chantier effectué en deux jours.\r\n\r\n<img3363|left><img3364|left><img3365|left><img3366|left>', '2017-10-14 08:15:37', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-14 08:15:28'),
(54, 'suite atelier toit cabane Hors Gabarit', 2, '', 'Après avoir testé deux méthodes de construction nous avons choisi celle en forme de tipi. Car elle ne se fixe pas directement sur le mur de la cabane.\n\nOn a dû tout démonter pour choisir de nouvelle canne plus adapter. \nOn a encore utilisé le fendeur pour fendre des cannes en quatre et les placer en tressant sur la cabane. \nOn a creusé pour enfoncer davantage les cannes dans la terre. \nMerci à Hors Gabarit, Anna, Laura et Alessandra pour leur action.\nMerci à Lilian et Nidal qui sont allés ramasser des cannes.\n\n<img3367|left><img3368|left><img3369|left><img3370|left><img3371|left>\n', '2017-10-14 08:44:11', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-14 08:44:03'),
(55, 'Récolte d\'Olives', 2, '', 'En chemin pour aller récolter les olives sur le terrain de Jean-Paul. \n<img3372|right>\n\n\nUn monsieur \" Mais où allez vous avec vos cannes ? \" \n\"Nous allons ramasser les olives \"\n                                       \" J\'en ai des Oliviers \" \"Venez chez moi, c\'est juste là\"\n\n\nNous voici tous dans son jardin. A tapoter sur ses 3 oliviers. \n<img3373|left>\n<img3374|right>\n<img3375|left>\n\nUne fois que nous avons tout remballé, cet homme généreux nous apporte de l\'eau et du sirop. \n<img3376|right>\n\nDe retour à la Tanière, nous faisons la pesée . \nCombien de kilos avons nous récolté ? \n<img3377|center>\n<img3379|center>\n<img3378|center>\n\n\n\n\n\n', '2017-10-18 20:56:16', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-19 07:14:04'),
(56, 'La chasse au trésor', 2, '', 'Rita s\'essaie une deuxième dans la préparation de la chasse au trésor.\n\" cette fois-ci, je donne pas la solution \"\n\n<img3413|center><img3414|center>', '2017-10-16 14:54:00', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-20 16:04:39'),
(57, 'Les perpendiculaires', 2, '', 'Lilith et Lilas travaillent leur géométrie. \n\nElles mettent en place un laboratoire de recherche autour de la Tanière, avec une équerre à la main. <img3392|right>\n\nOù est ce qu\'il y a des perpendiculaires ?\n\n \"Il y en a partout !! \"  \n\n\n<doc3380|center>\n<doc3381|center><doc3382|center><doc3383|center><doc3384|center><doc3385|center><doc3386|center><doc3387|center><doc3388|center><doc3389|center><img3390|center><img3391|center><img3393|center>\n', '2017-10-16 21:05:00', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-20 16:05:34'),
(58, 'Nuité 2ème on tourne ...le repas et soirée', 2, '', 'Ça y est c\'est reparti pour une nouvelle nuit à Bricabracs. \n\nLes lits sont prêts. \nL\'odeur de pizza commence à se répandre dans l\'air\naprès une journée de préparation.\ngateau au chocolat\nsalade de fruit\npizza et flammekushe\n\net une veillée ciné club. \n\nqui a choisi quoi ?\nla veillée/ nuitée : les enfants... la date, les éducateurs\nle repas : les enfants...menu, achats et préparation \nles chambrées : les enfants sauf le nombre par chambre\nle ciné club : les enfants, le film : les éducateurs.\n\n<img3397|left><img3398|left><img3399|left><img3400|left>\n<img3394|left><img3395|left><img3396|left>', '2017-10-19 18:44:59', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-19 20:23:05'),
(59, 'et pendant ce temps là', 2, '', 'on avait une grosse journée de préparation de la veillée\r\nmais d\'autres activités ne se sont pas arrêtées pour autant.\r\n\r\n-* Couture avec Sylviane : Yuma et Garance l\'ont rejoint\r\nil prépare une housse pour un coussin. \r\n<img3402|left><img3403|left>\r\n\r\n-* Présentation de l\'atelier clown avec Mariane.\r\n5 enfants nous ont présenté ce qu\'ils ont fait pendant deux séances et comment se déroule une séance.\r\nAprès les vacances, tout le monde ira gouter le clown. \r\net puis ensuite ceux qui seront encore intéressés pourront s\'y remettre pour 4 séances d\'affilées.\r\nMerci à Mariane ! \r\n<img3401|left>\r\n\r\n\r\n', '2017-10-19 20:38:07', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-19 20:37:58'),
(60, 'et aussi, notre invité du jour', 2, '', 'une souris avait élu domicile. \r\nOn l\'a attrapé vivante avec le piège de Flora et Lys. \r\n\r\nQuand la maman d\'Amine a vu sa petite cage elle est allée en acheter une plus grosse qu\'elle nous a amené dans la journée !\r\n\r\nDessin de Lys\r\n<img3406|left><img3407|left><img3408|left>', '2017-10-19 20:44:17', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-19 20:44:06'),
(61, 'Bricolage avec Fabien', 2, '', 'Accrochage d\'un abris à oiseau... \r\n\r\nConstruction d\'un trépied par Garance et Mirina\r\n\r\n<img3409|left>', '2017-10-19 20:47:49', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-19 20:47:43'),
(62, 'Réveil à La Tanière', 2, '', '6h30 les premiers se réveillent...\n6h45... le ventre devient plus important que le sac de couchage.\n8h les derniers se lèvent.\net le rangement commence !\n\n<img3410|left><img3411|left><img3412|left><img3416|left><img3417|left><img3418|left><img3419|left><img3420|left><img3421|left>', '2017-10-20 12:17:27', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-20 15:26:40'),
(63, 'Le rangement et après ?', 2, '', ' Après 8h, brossage de dents et finition du rangements.\r\nQue nous reste -il pour manger ce midi ? \r\nAllons acheter des pâtes !\r\n\r\nEn chemin, nous récupérons une planche de skate .\r\n\r\n<img3422|left><img3423|left><img3424|left><img3425|left>', '2017-10-20 15:36:58', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-20 15:36:36'),
(64, 'Le courrier pour le Monsieur du 17', 2, '', 'Un courrier avant les vacances pour le monsieur du 17, où nous avons récolté les olives. <img3426|left><img3427|left><img3428|left><img3428|left><img3429|left><img3431|left><img3432|left><img3433|left><img3434|left><img3435|left>', '2017-10-20 15:54:35', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-10-20 15:50:54'),
(65, 'poulailler quotidien avec Momo', 2, '', 'Momo nous aide tous les jours à entretenir le poulailler\r\n\r\n4 enfants de service vont avec lui pour nettoyer et nourrir les poules.\r\n\r\n<img3452|left><img3453|left><img3454|left><img3455|left>', '2017-11-06 17:16:46', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-06 17:16:36'),
(66, 'Le repas des Minots', 2, '', 'Menu de ce jour :\r\nBetteraves crues râpées aux pommes\r\nLentilles et Potimarron avec saucisses des Cévennes\r\nMoelleux aux pommes\r\n\r\nGarance, Lilith, Lilas, Nils et Angèle ont mis leur agilité à toute épreuve de la découpe au service des assiettes généreuses !\r\nUn Grand Merci à l\'équipe bénévole de choc en cuisine , Laila , Martine, Dominique, Lucile, Marie, Saida, Marie-Laure, et Paco . \r\n<img3456|left><img3457|left><img3458|left><img3459|left><img3460|left><img3461|left><img3462|left><img3463|left>', '2017-11-06 18:01:18', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-06 18:01:12'),
(67, 'Les vautours', 2, '', 'je voulais présenter plusieurs races de vautours que j\'ai vu dans la Drome provençale\n\nil y en a 5:\nLes Fauves [voir l\'image->http://didier.oiseaux.net/images/vautour.fauve.dico.1g.jpg]\nLes moines [voir image->http://www.oiseaux.net/photos/yoram.shpirer/images/vautour.moine.yosh.6g.jpg]\nles percnoptères d\'Egypte   [voir image->http://www.oiseaux.net/photos/vincent.palomares/images/vautour.percnoptere.vipa.1g.jpg]\nle gypaète barbu[ voir image->http://rapaces.lpo.fr/sites/default/files/vautours/842/gypavoldsc6175.jpg]\nle charognard[ voir image->https://www.bing.com/images/search?view=detailV2&ccid=TXtgsLi0&id=077CBD15FC6222977735C52833433999029E0D12&thid=OIP.TXtgsLi0qU0dRt9tUToyKAEsCw&q=vautour+charognard&simid=608033282133593600&selectedIndex=58&ajaxhist=0]\n\nIls peuvent voir de très haut.Du coup ils volent très haut ils ne mangent que les carcasses mortes. \nIl y a une chose de très bizarre chez les vautours c\'est que celui qui n\'a pas mangé depuis une semaine va en premier ceux qui ont mangé la semaine dernière mangent en dernier.  \nSi la carcasse est trop petite, ceux qui ont mangé la semaine dernière n\'auront pas à manger cette fois là.\n\nNils\n\n', '2017-11-14 08:31:43', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-15 10:07:59'),
(68, 'créatexte et dessins 15/11/17', 3, '', '<img3465|left>\n<emb3464|center>', '2017-11-15 10:23:48', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-15 10:24:50'),
(69, 'création de parcours', 2, '', 'de temps en temps ça nous prend, on se fait un parcours d\'équilibre, de peur, de saut, de joie, de grimpe, de glisse... \r\n<img3467|left><img3468|left>\r\n<img3466|left>', '2017-11-15 10:29:09', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-15 10:29:02'),
(70, 'Constructions pratiques', 2, '', 'Meuble de rangement\r\n\r\nOn avait un problème les boites de crayons, ciseaux etc. tombaient à l\'arrière du meuble.\r\nAlors Mirina et Lilith ont résolu le problème.\r\nMesure, découpe et fixation de deux planches dans le fond.\r\n\r\nOn avait un autre problème les classeurs des fiches de travail tombaient tout le temps les uns sur les autres. Nils et Ilane ont résolu le problème en clouant une planche au milieu;\r\n\r\n<img3471|left><img3470|left><img3469|left><img3472|left><img3473|left><img3474|left>', '2017-11-15 10:35:30', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-15 10:35:23'),
(71, 'visite murale', 2, '', 'C\'était en fin de matinée. L\'ombre nous a rendu visite sur le mur. \n\nC\'était étonnant et très beau. On est tout.e.s venu.e.s la voir et en discuter.\nLa lumière rentrait par la porte fenêtre sur laquelle il y a des feuilles accrochées.\n\n<img3475|left><img3476|left>', '2017-11-15 10:47:46', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-15 10:46:18'),
(72, 'Constructions astucieuses le retour de Sabine', 2, '', 'comment ça roule ? comment ça vole ? comment... ?\net pourquoi...\n\nc\'est reparti pour quelques séances de constructions. \n\n<emb3482|left><img3477|left><img3478|left><emb3479|left><doc3479|left><doc3482|left>', '2017-11-15 11:06:50', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-15 11:07:43'),
(73, 'Les lasagnes du jardin et la cabane', 2, '', '{{Jardin lasagne}}\r\n\r\nAvec Lilian on a fait des lasagnes vendredi. \r\navec la bande des jeunes : Malou, Anna, Siloé, Yaqin, Antonio, Jona, Errol\r\npendant ce temps là, les petits vieux préparaient leur film sur la cabane avec Laura, Lucie et Anna\r\nRamasser des feuilles et en faire des petits bouts.\r\nRamasser de l\'herbe verte\r\nFaire des couches de feuilles et d\'herbe dans un cageot\r\nVerser de la terre par dessus\r\net planter.\r\nNous, on a planté des salades et des épinards. \r\n<img3483|left><img3484|left><img3485|left><img3486|left><img3488|left><img3487|left><img3489|left>\r\n\r\n{{Le film de la cabane}}\r\nRejouer toutes les étapes de la construction depuis deux ans !!\r\n<img3490|left><img3491|left><img3492|left>', '2017-11-15 11:17:08', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-15 11:17:01'),
(74, 'de la souris à la gerbille', 2, '', 'On avait attrapé une souris voici un mois. On avait décidé de la relacher. \r\non a fait cela vendredi en fin d\'après midi.\r\n\r\nOn ne voit pas la souris parce qu\'elle a sauté très vite. \r\nAu début elle ne voulait pas sortir et puis d\'un coup elle est parti\r\n\r\nGarance nous a proposé de la remplacer par des gerbilles qu\'elle a chez elle.\r\non attend qu\'elle en amène.\r\n<img3493|left>', '2017-11-15 11:20:06', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-15 11:20:00'),
(75, 'gerbille', 2, '', 'Garance a  ramené des gerbilles à l\'école.\n<img3502|left><img3503|left>\n[photo->https://tse4.mm.bing.net/th?id=OIP.ftwUp-rlqCe6MVpsRcTCAgEsEa&pid=15.1]\n\net si on leur tire la queue elle s\'arrache.\nLa gerbille est un grand rongeur. \nElles font partie des mammifères.\nElles sont très nombreuses. Elles comptent 90 espèces.\nElles ne sont pas les plus connues des animaux de compagnie. \nElles peuvent vivre de 2 à 3 ans en captivité. \n\n[photo->https://tse3.mm.bing.net/th?id=OIP.31Jt9WCfmcBvAOvRWeW9ewEpEs&w=191&h=193&c=7&qlt=90&o=4&pid=1.7]photo[->https://tse4.mm.bing.net/th?id=OIP.chhEh2NfSbZrdZ9rDa43LAEsEs&w=189&h=187&c=7&qlt=90&o=4&pid=1.7]\nles gerbille vivent en Mongolie en Afrique et en chine. sourse:vikidia\n\nLa nourriture des gerbilles : Herbivores et granivores insectivores\nNils et Garance', '2017-11-20 15:30:24', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-21 08:44:57'),
(76, 'La cabane le film', 2, '', 'Après deux ans de construction et reconstruction, du toit notamment\r\n\r\nOn a fait un très court métrage des différentes étapes de la construction. \r\n\r\nAttention ! Ca tourne !\r\n\r\nL\'association Hors Gabarit et Lucie Thierry (vidéaste, Les Herbes Folles / art\'up13) ont mené ce travail.  \r\n<img3494|left><img3495|left><img3496|left><img3497|left><img3498|left><img3499|left><doc3500|left>', '2017-11-18 09:31:35', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-18 09:31:26'),
(77, 'photo', 2, '', '[->https://bibliothequedecombat.files.wordpress.com/2014/08/cheval-de-troie.jpg][[[photo]]', '2017-11-20 11:15:19', 'prepa', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-20 11:18:21'),
(78, 'photo', 2, '', '[photo->http://www.trignac-gerard.com/IMG/jpg/Sans-titre-1.jpg]', '2017-11-20 11:35:53', 'prepa', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-20 11:35:53'),
(79, 'photo', 2, '', '[photo->http://www.trignac-gerard.com/IMG/jpg/Sans-titre-1.jpg][photo->https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSofftBptIEo2lhPrBOZEmVHTTZCMZb8ZKc3r7gqhUc7PrNQhPPvg][photo->http://i40.servimg.com/u/f40/16/10/94/57/01743.jpg]', '2017-11-20 11:38:53', 'prepa', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-20 11:40:47'),
(80, 'couture en plein air', 2, '', 'Vendredi, il n\'y avait pas assez de place dans La Tanière.\r\nL\'atelier couture s\'est mis dehors avec Sylviane pour fabriquer une banderole pour le vide grenier !\r\n\r\nProblème : la machine à coudre ne fonctionne plus... faut qu\'on la fasse réparer...\r\n<img3501|center>', '2017-11-20 15:23:44', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-20 15:23:38'),
(81, 'aménagement d\'intérieur', 2, '', 'Nils et Amine ont construit un panneau de séparation pour la cuisine, avec l\'aide de Fabien.\r\n\r\n<img3504|left><img3505|left>', '2017-11-20 15:33:29', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-20 15:33:21'),
(82, 'affichage vide grenier', 2, '', 'Tous les mois on fait un vide grenier festif \r\nmais tous les mois il faut installer et désinstaller les banderoles, les guirlandes etc. \r\n\r\nLilith et Amine ont décroché la banderole au dessus du portillon. \r\n<img3506|left>', '2017-11-20 15:39:07', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-20 15:38:57'),
(83, 'abris de jardin', 2, '', 'c\'est pour les petites bêtes !\r\nAntonio, Anna, Yaqin, Malou et Jona ont fait des abris pour les petites bêtes.\r\n\r\navec des feuilles dans des pots\r\navec des tubes de bambous\r\n\r\n<img3507|left><img3508|left><img3509|left><img3510|left>', '2017-11-20 19:06:40', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-20 19:06:33'),
(84, 'Boite d\'objets perdus', 2, '', 'Réunion \" les problèmes \" :\n\"J\'ai perdu mon ninja go...\"\n\" j\'ai trouvé un objet , super ! \"\n\" ah , oui mais c\'est à moi ça !!! je le récupère, je l\'avais perdu \"\n\" ben pourquoi, je l\'ai trouvé par terre, je le garde \".....\nFlora propose la fabrication d\'une boite \nRita et Garance sont volontaire pour la faire. \n\n<img3511|center><img3512|center>', '2017-11-22 17:42:52', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-22 17:42:39'),
(85, 'Silence , ça tourne ! Première', 2, '', 'Ce mercredi 22 novembre, lancement de la première session Ciné Débat. \nL\'an passé, nous avons travaillé avec Marie-Laure, l\'analyse de court-métrage. \nAujourd\'hui, on a présenté une série de court-métrage aux enfants du soutien scolaire des Resto du cœur . \n_ La leçon de natation de Danny Devent\n_ La révolution des crabes d\'Arthur de Pince\n_ Les Girafes 5m80 de Nicolas Deveaux\n\nPar la suite, le terrain  de jeu est exploré par tous...\n<img3513|center><img3514|center>', '2017-11-24 15:24:31', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-24 15:24:20'),
(86, 'L\'aigle  / par Jona et Nils', 2, '', '{{L\'aigle }} par Jona et Nils \nLes pays de l\'aigle sont :  en Chine, en Italie, en Russie, au Canada, en Afrique. \nIl mange de la viande crue.    \nIl vit 15-20 ans. \nLes petits mettent 43 - 45 jours avant de naitre (incubation : combien de temps il reste dans l\'oeuf avant de naitre)\nA partir de 4-5 ans ils peuvent faire des bébés. (maturité sexuelle)\n\nUne histoire : l\'aigle peut regarder le soleil sans se bruler les yeux. \n\n[photo1->https://www.quizz.biz/uploads/quizz/801409/orig/1.jpg?1479715882]\n[photo 2->http://www.quizz.biz/uploads/quizz/320142/3_8qdkq.jpg]\n[photo 3->http://rapaces.lpo.fr/sites/default/files/imagecache/Original/aigle-royal/488/grue-predatee.jpg]\n[photo 4->https://montagne-hautlanguedoc.com/wp-content/grand-media/image/aigle-royal-renard1.jpg]\n[photo 5->http://www.slate.fr/sites/default/files/styles/1090x500/public/final_600_dn24236-1_1200_web.png]\n\n', '2017-11-24 15:32:43', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-24 15:33:26'),
(87, 'Le pain quotidien', 2, '', 'Tous les jours on fait du pain. \r\nAujourd\'hui on a eu envie de le prendre en photo parce qu\'on le trouvait encore plus beau.\r\n\r\n<img3515|center>', '2017-11-24 15:22:24', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-24 15:22:17'),
(88, 'La cascade glissante', 2, '', '\" est ce que l\'on peux refaire une journée à la cascade \" dit Antonio.\nOk, nous irons le 23 novembre !\n\nC\'est parti, rdv à Saint Charles. L\'aventure commence par une attente surprise à l\'arrêt de bus. \nPuis , nous y voilà . On est à la cascade !!! On y glisse et c\'est super . \nOn refait le toit de la cabane ...puis certains sont inspirés pour faire des séances de portraits au crayons. \n\nOn continue avec un arrêt à la fontaine, sans eau . Puis nous allons jusqu\'au haut de la montagne Et c\'est beau , on voit tout Marseille !\n\nDifférents espaces sont occupés pour le repas...sieste pour l\'un , recherche d\'objets pour d\'autres.\nFabrication d\'une percussion...\"On peut tout faire avec la nature \" dit Amine \" de la musique , des cabanes, de la nourriture \"\nSur le chemin retour, Jona et Tonio font les charpas, puis Fabien fait la démonstration d\'un brancard d\'urgence. \n\n<img3534|left><img3516|center><img3517|left><img3518|right><img3519|left><img3520|right><img3521|left><img3522|left><img3523|right><img3524|left><img3535|right><img3536|right>\n<img3533|right><img3537|center><img3539|center><img3540|center>\n<img3528|left><img3529|center><img3530|left><img3531|right><img3532|left>\n', '2017-11-24 16:43:24', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-24 16:43:14'),
(89, 'kamishibai', 2, '', 'Marie Laure est venue nous présenter son kamishibai.\r\n\r\nElle reviendra un vendredi pour créer une histoire avec les enfants.\r\n\r\n<img3542|left><img3543|left><img3544|left>', '2017-11-24 17:34:16', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-24 17:34:07'),
(90, 'créatextes 8 / 27 novembre 2017', 3, '', '<img3546|left>\r\n<emb3545|center>', '2017-11-27 21:36:53', 'publie', 3, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-27 21:36:46'),
(91, 'l\'oeuf du jour', 2, '', 'Aujourd\'hui,on a trouvé un oeuf de poule qu\'a pondu Grisette sous la cabane des poules.\r\nOn ne peut pas vous montrer de photo parce que Erwan a oublié l\'appareil photo et son cerveau. \r\n\r\nAngèle, Rita, Yaqin, Lilith', '2017-11-29 09:45:40', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-29 09:45:30'),
(92, 'Nos projets , on les fait.', 2, '', 'Cette après-midi, Nils propose un cours de gym, rdv à 14h30. \r\nAntonio et Jona propose de raconter une histoire inventée. \r\nEt Rita, Malou et Angèle se laisse tenter par une proposition de dessin avec les pastels...après le contour de leur main...Et si on faisait le contour de Malou ?!!<img3551|left><img3549|right><img3552|left><img3550|left><img3548|center><img3547|right>', '2017-11-30 11:06:33', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-11-30 11:06:27'),
(93, 'Le combat d\'épée', 2, '', '\"Et moi, je veux que l\'on fasse le combat \"\r\n\"Il faut qu\'on fabrique les épées.\"\r\nEn place, 3-2-1 c\'est parti !!!\r\nquand le premier qui touche l\'autre, on arrête. \r\n', '2017-12-01 12:09:00', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-12-01 12:05:24'),
(94, 'Un anniversaire à la Cantine du Midi', 2, '', 'Au menu du jour :\r\n\r\nEntrée : Carottes rappées avec céleri\r\nPlat : Gratin de légume à la polenta\r\nDessert : Gâteau aux poires avec coulis de chocolat. \r\n\r\nL\'événement du jour , on a préparé le gâteau ce matin. Avant on a fait le calcul pour les ingrédients, car la recette est pour 5 personnes et il y a 10 personnes. \r\n\r\nBrownie pour 5 personnes\r\n\r\nIngrédients:\r\n\r\n	200 g de chocolat noir pâtissier\r\n	4 oeufs\r\n	150 g de sucre\r\n	125 g de beurre\r\n	2 cuillères à soupe de farine\r\n	une pincée de sel\r\n\r\nPréparation:\r\n\r\n     1.   Découper le chocolat et le beurre en petits morceaux.\r\n2.	Faire fondre le chocolat au bain-marie, et à la fin ajouter le beurre. Laisser tiédir.\r\n3.	Dans un saladier fouetter les oeufs et le sucre jusqu\'à ce que le mélange blanchisse.\r\n4.	Verser le chocolat et le beurre fondus sur ce mélange et bien remuer.\r\n5.	Ajouter le sel et la farine tout en continuant à fouetter.\r\n6.	Beurre un moule à gâteau et y verser la préparation.\r\n7.	Faire cuire environ 20mn au four th.180°.\r\n\r\nBon appétit!\r\n\r\n<img3556|left><img3557|right><img3558|left><img3559|right><img3560|left><img3561|right><img3562|left><img3563|right><img3564|left><img3565|right><img3566|left><img3567|right><img3568|left><img3569|right><img3570|left><img3571|left><img3572|right><img3573|left><img3574|right>\r\n\r\nEt tout ceci, avec une équipe de bénévole présente et joyeuse. \r\n\r\n<img3575|center>\r\n\r\n\r\n', '2017-12-04 11:38:00', 'publie', 2, '2017-12-16 13:30:26', '0000-00-00 00:00:00', '2017-12-05 11:39:43');

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id_auteur` bigint(21) NOT NULL,
  `nom` text NOT NULL,
  `bio` text NOT NULL,
  `email` tinytext NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `pass` tinytext NOT NULL,
  `low_sec` tinytext NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT '0',
  `webmestre` varchar(3) NOT NULL DEFAULT 'non',
  `maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `htpass` tinytext NOT NULL,
  `en_ligne` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id_auteur`, `nom`, `bio`, `email`, `login`, `pass`, `low_sec`, `statut`, `webmestre`, `maj`, `htpass`, `en_ligne`) VALUES
(1, 'bruno', '', '', 'bruno', '885444702b544cb49d5400b0141e6946e91ea5796d719e08fc7b3eca78f8d8ff', 'PbhvWoFL', '0minirezo', 'oui', '2017-02-27 21:17:07', '$1$r3HDTzdn$URPYf2ZKd8/iWaP/1ysBq1', '2017-02-27 22:17:07'),
(2, 'Rhizome Bricabracs', '', 'rhizome@bricabracs.org', 'rhizome', 'e3d7c257acfff2b11013d0f2a4729c94a552b72d79ffa7dda94a9ee8a4b56da8', 'cFPSRwLL', '0minirezo', 'oui', '2017-09-07 13:22:35', '$1$soaAhr6c$fw5l6eBS4TITMKCzPPWVU/', '0000-00-00 00:00:00'),
(3, 'Les Bricabracs', 'espaces éducatifs Bricabracs, regroupant 20 enfants maximum, pour s\'instruire, s\'éduquer, s\'émanciper', 'lesbricabracs@bricabracs.org', 'lesbricabracs', '092371ae58bdee193b0118b311cdff1042df06632e1ccab8cedcd43f4b2279a6', 'j4nyn3po', '0minirezo', 'non', '2017-12-05 10:39:43', '$1$FhcJJTUn$q0L.R6uMRWE.9aXzGIF68/', '2017-12-05 11:39:43'),
(4, 'Yanne', '', 'yanne.vb@gmail.com', 'yanne', '4e2f10cb5c58f1185ed8f705de1ebaa02a051d878a1a7b656e234129cf0bacc9', '', '6forum', 'non', '2016-10-09 05:28:03', '$1$36Z8rmhu$6hRXPcqXmVEJW1hGYxkZZ.', '0000-00-00 00:00:00'),
(5, 'erwan', '', 'redonerwan@orange.fr', 'erwan', '3e32efb820efa3f1a2de4761469b977cf08b505c1ea2fd79d7b56d5a3035465e', '', '6forum', 'non', '2015-09-16 07:06:02', '$1$6L295uYt$.2Q.Dqy0DzSYBCR3Sxwbx.', '0000-00-00 00:00:00'),
(6, 'Magali', '', 'magali.b@free.fr', 'magali', '23fa95d7a0d9f028b097a6576a76cb924f1e9ba9890188ce9429e23ef41f6c3e', '', '6forum', 'non', '2017-09-13 21:24:02', '$1$LHLCLCDY$7O96.CMeg.QpogZ4iTQLM0', '0000-00-00 00:00:00'),
(7, 'assia', '', 'assia.zou@orange.fr', 'assia', '94f185917538ba79b5baf16229a80b271309449b982e85a4b373644ce00f3fa0', '', '6forum', 'non', '2015-09-22 05:58:27', '$1$LLcrnXd2$gqTttfi.MENfv/fs1LfQt.', '0000-00-00 00:00:00'),
(8, 'Laura', '', 'laurabe81@gmail.com', 'laura', '8aefb4a4ff765b24760e11c9e3b6feb0099ed68a4ef05b2a51ebbb0474e0a39a', '', '6forum', 'non', '2017-09-12 20:18:57', '$1$oruoMsnK$L2VXu.kNVPuMim93xaZzO1', '0000-00-00 00:00:00'),
(9, 'Francesca', '', 'w.frariva@hotmail.com', 'francesca', '2d57370288778527096911f9c5db99062a0b9491252a93034672af4f46c39d19', '', '6forum', 'non', '2015-10-04 17:25:04', '$1$t52XyhQM$azpECzsJQmXKZigIg0Zn..', '0000-00-00 00:00:00'),
(10, 'marie claude', '', 'mclabo@hotmail.com', 'marie', '7b742cd51728ec4482878574fef57f6b65fb7f15de159e08b52e5fc156869b3a', '', '6forum', 'non', '2017-09-14 20:43:06', '$1$mkarhhs2$8vgKSp5FqU.gZla.WjOug1', '0000-00-00 00:00:00'),
(11, 'Lys jouve', '', 'lys.jouve@free.fr', 'lys_jouve', 'c3e3c9b9b676135a83c0aa0fc2b3db96249c22e58cfbbd283222c9f2fb1cba2f', '', '6forum', 'non', '2015-10-01 17:03:57', '$1$XfSaruop$RH2HwtHPlroyKQzpL0oQb.', '0000-00-00 00:00:00'),
(12, 'Christel', '', 'christelle.braconnot@ac-clermont.fr', 'christel', 'ad7e4dc6d41091c14bd84bb513876fb0f434489290287eba14d462518a825692', '', '6forum', 'non', '2015-11-23 11:45:34', '$1$2BNyM6oB$LkCPOu4pUIb48.veYKPEz0', '0000-00-00 00:00:00'),
(13, 'Michel', '', 'jouve.michel@free.fr', 'michel', '3907837b81935823bd6a195e44eb7dd2ebcf5339dcc3a446a51610586c61a967', '', '6forum', 'non', '2016-11-19 07:19:15', '$1$qmyR3oZS$R351DsA5EuZjUTM7Bcjsw0', '0000-00-00 00:00:00'),
(14, 'l\'Envol', '', 'lamaisondeszoiseaux@yahoo.com', 'LEnvol', 'd625eecab376619807034000e30196f8560da3aae95cb5cc7c09dcc7b39096cb', 'gibZsazy', '0minirezo', 'non', '2016-03-24 21:33:28', '$1$exULuxUC$ts4vdikgUnBF33TvFx.hE/', '2016-03-24 23:33:28'),
(15, 'Thierry Flammant', '', 'thierryflammant@club-internet.fr', 'thierry', 'e033f5a1535b82495ef4063390b12ad6ad870ad75aad2de2cb5bb0baa9d1a04a', '', '6forum', 'non', '2015-10-13 18:10:45', '$1$oYZWLBek$CUlQdbVMZ15m6HfLZVzCR0', '0000-00-00 00:00:00'),
(16, 'pom79', '', 'pomflo79@gmail.com', 'pom79', '622f553631585238dc919e7d580c16b08b7c4d4b888a741fafa2473a5e906b3e', '', '6forum', 'non', '2015-11-09 18:06:56', '$1$AhnYuuyA$D1Ajp8gIFtotzXfFwoq001', '0000-00-00 00:00:00'),
(17, 'Marine', '', 'marinepages@gmail.com', 'marine', '9df1916c02bf0b3b73b6b60cc1b0451f54acc340d2adf1bdec380a750aa39bed', '', '6forum', 'non', '2016-01-05 20:07:45', '$1$oBtx8yWd$5AwdyXf1vsXN6gt2YG6DU.', '0000-00-00 00:00:00'),
(18, 'Pierre', '', 'pierrepages6@yahoo.fr', 'pierre', '09d4178b35c42b8debc5dece63b7c8907d647d450469a35587561fd8d48bb699', '', '6forum', 'non', '2015-11-14 10:41:36', '$1$aL5y6X9v$6O3N63IURnjkJSo2m2IOa/', '0000-00-00 00:00:00'),
(19, 'Nidal', '', 'nidalabdelkrim@gmail.com', 'nidal', 'e58947118fb05771de837edd6468769c2e5f4d022e8449eb0d472e3b36b55d7d', '', '6forum', 'non', '2016-01-04 11:58:42', '$1$yaCee6T2$zJEE/xcUf4ewkF/mxEgPk0', '0000-00-00 00:00:00'),
(20, 'Mathieu', '', 'mathieu.pernot@aliceadsl.fr', 'mathieu', '3b84378f4e9e2f28fc79d3a74caee8245e734963e7d71ea78888f085d8ef7951', '', '6forum', 'non', '2016-03-06 09:01:21', '$1$FG7sLaVL$t9Obnr1C5ZVFyjqoCPNI4/', '0000-00-00 00:00:00'),
(21, 'LAFORE', '', 'd.lafore@numericable.fr', 'lafore', '52918f3361e4ac0f2b80ded0b9270156340437b9871f4e9347a67505a300e0c0', '', '6forum', 'non', '2016-10-08 10:54:47', '$1$xAJ8NLnc$lixpt6A0UpDQOYbW3bF2./', '0000-00-00 00:00:00'),
(22, 'Balthazar', '', 'domraulin@aliceadsl.fr', 'Balthazar', 'd9fe6f022df70b742b8b58e8ab507d1ee33a6f72e8927bb6d9487539717a0397', 'owZAc9Fj', '1comite', 'non', '2016-06-25 17:41:04', '$1$i73hgG2D$oOQ0VVrUXVAl5fZ4sQfiL1', '2016-06-25 21:41:04'),
(23, 'Maceo', '', 'lucie_thierry@yahoo.fr', 'Maceo', '0cfcb07ded5c3af7b874be1ed28f24cab12e132c2004bbd6aa06c6ddd6cdf9f6', '', '1comite', 'non', '2016-06-01 10:55:26', '$1$WZBBUYrc$1ZCqZ6SsuV7Z/Us8q3Uy50', '2016-06-01 14:55:26'),
(24, 'julien', '', 'julien.mobilite@gmail.com', 'julien', '560248b52f0fcb629914d8ba347b3c9ac7da12780c29ba3601f2b4cdf9041ccb', '', '6forum', 'non', '2016-10-06 18:23:46', '$1$csUS3okS$MqMUpnMAGX/d5bo4t7zqE/', '0000-00-00 00:00:00'),
(25, 'yétérienne', '', 'yeterbis@gmail.com', 'yeterienne', 'd77e529c1ff6674388ae0d9e1cc082efac600cc0faed449ca09fe895b25ee8f3', '', '6forum', 'non', '2016-11-19 14:03:02', '$1$PhAj2gBM$TbAZA4662tHWIQyUsnu8z1', '0000-00-00 00:00:00'),
(26, 'bruno', '', '', 'bruno', 'd986b4b72ac2f32ec38d0bf163696f3219c0e1cd8b55e709b727afef21fa6159', 'QasWfvLs', '0minirezo', 'oui', '2017-01-21 18:30:07', '$1$RfaWsoc3$t.jwBRsqzn9QjtQVZOHHk/', '2017-01-21 20:30:07'),
(28, 'Brémond Marie', '', 'mooa13@lilo.org', 'bremond', 'cd93077b9a77cbdd093e4895e8cb6dbccc3919ce5fdd4fb8c40b7c1186bf5589', '', '6forum', 'non', '2017-07-24 12:18:20', '$1$ZwLnjU47$SJIHNRI/Xw49.2NsXOgfm1', '0000-00-00 00:00:00'),
(29, 'denise', '', 'debally@orange.fr', 'denise', '120b5d9bc68ea8e198107b368e7a039aff0ec425b6b89c311f48d94c55676bc4', '', '6forum', 'non', '2017-10-31 19:58:54', '$1$zWWAAsdJ$AbU2yLGgKc7y24btMVVtS0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id_document` bigint(21) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fichier` text NOT NULL,
  `taille` bigint(20) DEFAULT NULL,
  `largeur` int(11) DEFAULT NULL,
  `hauteur` int(11) DEFAULT NULL,
  `media` varchar(10) NOT NULL DEFAULT 'file',
  `mode` varchar(10) NOT NULL DEFAULT 'document',
  `statut` varchar(10) NOT NULL DEFAULT '0',
  `date_publication` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mots`
--

CREATE TABLE `mots` (
  `id_mot` bigint(21) NOT NULL,
  `titre` text NOT NULL,
  `descriptif` text NOT NULL,
  `texte` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mots`
--

INSERT INTO `mots` (`id_mot`, `titre`, `descriptif`, `texte`) VALUES
(1, 'mot_cle', 'Bricolage', ''),
(2, 'mot_cle', 'La tanière', ''),
(3, 'mot_cle', 'Bricabracs', ''),
(4, 'mot_cle', 'Animaux', ''),
(5, 'mot_cle', 'Fusée', ''),
(6, 'mot_cle', 'Sortie', ''),
(7, 'mot_cle', 'Randonnée', ''),
(8, 'mot_cle', 'Neige', ''),
(9, 'mot_cle', 'Bateau', ''),
(10, 'mot_cle', 'Clown', ''),
(11, 'mot_cle', 'Pain', ''),
(12, 'mot_cle', 'Cuisine', ''),
(13, 'mot_cle', 'Jardin', ''),
(14, 'mot_cle', 'Construction', ''),
(15, 'mot_cle', 'Quotidiens', ''),
(16, 'mot_cle', 'Services', ''),
(17, 'mot_cle', 'Ménage', ''),
(18, 'mot_cle', 'Mathématique', ''),
(19, 'mot_cle', 'Géométrie', ''),
(20, 'mot_cle', 'Plante', ''),
(21, 'mot_cle', 'Peinture', ''),
(22, 'mot_cle', 'Cabane', ''),
(23, 'mot_cle', 'Toit', ''),
(24, 'mot_cle', 'Expériences', ''),
(25, 'mot_cle', 'Présentations', ''),
(26, 'mot_cle', 'Jeux', ''),
(27, 'mot_cle', 'Livre', ''),
(28, 'mot_cle', 'Roman', ''),
(29, 'mot_cle', 'Parcours', ''),
(30, 'mot_cle', 'Fabrication', ''),
(31, 'mot_cle', 'Chasse au trésor', ''),
(32, 'mot_cle', 'Poules', ''),
(33, 'mot_cle', 'Arroser', ''),
(34, 'mot_cle', 'Sparo', ''),
(35, 'mot_cle', 'Repas', ''),
(36, 'mot_cle', 'Requin', ''),
(37, 'mot_cle', 'Orque', ''),
(38, 'mot_cle', 'Gnou', ''),
(39, 'mot_cle', 'Lego', ''),
(40, 'mot_cle', 'Aigles', ''),
(41, 'mot_cle', 'Gerbille', ''),
(42, 'mot_cle', 'Vautour', ''),
(43, 'mot_cle', 'Cheval de Troie', ''),
(44, 'mot_cle', 'Ulysse', ''),
(45, 'mot_cle', 'Sirène', ''),
(46, 'mot_cle', 'Souris', ''),
(47, 'mot_cle', 'Escargots', ''),
(48, 'mot_cle', 'Bicarbonate de soude', ''),
(49, 'mot_cle', 'Vinaigre blanc', ''),
(50, 'mot_cle', 'Échelle', ''),
(51, 'mot_cle', 'Puits', ''),
(52, 'mot_cle', 'Eau', ''),
(53, 'mot_cle', 'Jardinière', ''),
(54, 'mot_cle', 'Palettes', ''),
(55, 'mot_cle', 'Balançoire', ''),
(56, 'mot_cle', 'Arbre', ''),
(57, 'mot_cle', 'Nuitée', ''),
(58, 'mot_cle', 'Soirée', ''),
(59, 'mot_cle', 'Petit déjeuner', ''),
(60, 'mot_cle', 'Sac de couchage', ''),
(61, 'mot_cle', 'Matelas', ''),
(62, 'mot_cle', 'Gâteau', ''),
(63, 'mot_cle', 'video', '');

-- --------------------------------------------------------

--
-- Structure de la table `rubriques`
--

CREATE TABLE `rubriques` (
  `id_rubrique` bigint(21) NOT NULL,
  `titre` text NOT NULL,
  `descriptif` text NOT NULL,
  `texte` longtext NOT NULL,
  `statut` varchar(10) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(10) NOT NULL DEFAULT '',
  `langue_choisie` varchar(3) DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rubriques`
--

INSERT INTO `rubriques` (`id_rubrique`, `titre`, `descriptif`, `texte`, `statut`, `date`, `lang`, `langue_choisie`) VALUES
(1, 'Bricabracs', 'Le site de l\'association des Espaces Educatifs Bricabracs', '', '0', '2017-10-14 08:15:37', 'fr', 'non'),
(2, 'RHIZOME', '', '', 'publie', '2017-12-05 11:38:44', 'fr', 'non'),
(3, 'Chantier de Créatextes', 'Enfant, adulte, jeunes et moins jeunes, laissez votre plume courir, en pensant que ce site est avant tout consacré aux enfants. La modération a posteriori pourra se faire dans le respect de cette jeunesse.   ', '', 'publie', '2017-11-27 21:36:53', 'fr', 'non'),
(4, 'Images Pour bricabracs', '', '', 'publie', '2017-01-22 12:24:34', 'fr', 'non');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_rubrique` (`id_rubrique`),
  ADD KEY `id_secteur` (`id_secteur`),
  ADD KEY `statut` (`statut`,`date`);

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id_auteur`),
  ADD KEY `login` (`login`),
  ADD KEY `statut` (`statut`),
  ADD KEY `en_ligne` (`en_ligne`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `mode` (`mode`);

--
-- Index pour la table `mots`
--
ALTER TABLE `mots`
  ADD PRIMARY KEY (`id_mot`);

--
-- Index pour la table `rubriques`
--
ALTER TABLE `rubriques`
  ADD PRIMARY KEY (`id_rubrique`),
  ADD KEY `lang` (`lang`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=737;
--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id_auteur` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id_document` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3576;
--
-- AUTO_INCREMENT pour la table `mots`
--
ALTER TABLE `mots`
  MODIFY `id_mot` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT pour la table `rubriques`
--
ALTER TABLE `rubriques`
  MODIFY `id_rubrique` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
