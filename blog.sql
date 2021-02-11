-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2021 at 07:18 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(43, '10 BLOGS LIFESTYLE (VRAIMENT COOL) Ã€ SUIVRE', 'Ã‡a fait dÃ©jÃ  un moment que jâ€™avais en tÃªte de vous partager mes 10 blogs lifestyle prÃ©fÃ©rÃ©s. Ceux qui mâ€™inspirent, me dÃ©tendent, me font voyager, me donnent envie de dÃ©couvrir de nouveaux livres et des marques (et tout un tas dâ€™autres choses), mâ€™ouvrent lâ€™appÃ©tit, me font sourire (voire rire)â€¦ Certains blogs sont trÃ¨s connus, dâ€™autres moins. Pourtant, ils mÃ©ritent tous dâ€™Ãªtre connus. Et on commence avec les blogs lifestyle de trois copines bretonnes talentueuses â™¡.\r\n\r\nâ™¡ Manon : A CUTE CAMERA\r\nManon, câ€™est une ancienne collÃ¨gue de travail mais câ€™est surtout une fille trop cool qui tient un blog trop cool. Sur son blog, elle aborde de nombreux sujets : mode, lecture, lifestyle, beautÃ©, billets dâ€™humeurâ€¦ Manon est sensibilisÃ©e par les actions Ã©co-responsables et nous partage ses bonnes pratiques. Jâ€™aime beaucoup son Ã©criture spontanÃ©e, son originalitÃ© et ses belles photos. Une belle bretonne (cool, je ne vous lâ€™avais pas dit je crois !) Ã  suivre sans hÃ©siter une seule secondeâ€¦\r\nPour visiter le blog cool de Manon : A Cute Camera\r\n\r\nâ™¡ Floriane : Lâ€™INSTANT FLO\r\nJâ€™ai de la chance de croiser le chemin de blogueuses talentueuses dans mes expÃ©riences professionnelles, puisque Floriane est mon actuelle collÃ¨gue de travail. Mais sans Ã§a, jâ€™aurai forcÃ©ment Ã©tÃ© fan de son blog ! Inutile de dire quâ€™il est aussi inspirant que son compte Instagram, quâ€™elle gÃ¨re avec une main de maÃ®tre depuis prÃ¨s de trois ans. Sur Lâ€™Instant Flo, vous y retrouverez notamment des looks mode inspirants et des recettes qui vont vous faire saliver, assurÃ©ment !\r\nPour dÃ©couvrir lâ€™univers de Floriane : Lâ€™Instant Flo\r\n\r\nâ™¡ Pauline : PINUPAPPLEAND & CO\r\nUne autre bretonne Ã  suivre dâ€™urgence, câ€™est Pauline avec son blog Pinupapple & Co. Dâ€™abord blogueuse mode, elle sâ€™est dÃ©sormais spÃ©cialisÃ©e pour partager une de ses plus grandes passions : la lecture. Ce qui ne mâ€™Ã©tonne pas puisque lâ€™on a passÃ© ensemble nos deux ans de lycÃ©e en filiÃ¨re littÃ©raire. Et autant dire que câ€™est une vÃ©ritable dÃ©voreuse de bouquins ! Si vous ne savez plus quoi lire, rendez-vous sur son blog et/ou sa chaÃ®ne YouTube pour trouver des conseils.\r\nPour manger des livres avec Pauline : Pinupappleand & Co & chaÃ®ne YouTube de Pauline\r\n\r\nâ™¡ Leanna : LEANNAEARLE\r\nGros coup de cÅ“ur pour ce blog que jâ€™ai connu il y a peu : celui de Leanna Earle (qui est son nom de blogueuse). Jâ€™aime beaucoup son style en terme de photo. Leanna y aborde de nombreux sujets : DIY, dÃ©coration, recettes, voyages (elle mâ€™a donnÃ© envie de visiter Dijon, ville que je ne connais pas du tout)â€¦ Graphiste, elle partage aussi des printables comme des calendriers ou des Ã©tiquettes de NoÃ«l. Un blog Ã  visiter dâ€™urgence pour un moment de dÃ©tente et dâ€™inspiration assurÃ©es !\r\nPour se dÃ©tendre grÃ¢ce au blog de Leanna : Leanna Earle\r\n\r\nâ™¡ Emilie : GRIOTTES\r\nLe blog dâ€™Emilie est le plus original que je connaisse ! Tout tourne autour de la palette : des couleurs, dâ€™Ã©motions, de voyages et culinaire. Et on peut mÃªme rechercher un article en fonction de la couleur de son choix. Jâ€™adore mâ€™y rendre essentiellement pour ses photos qui sont vraiment top-i-ssi-mes ! Son dernier article remonte au mois de mai 2016, je ne sais pas si elle compte actualiser son blog, mais en tout cas, vous pouvez toujours la suivre sur Instagram oÃ¹ elle poste rÃ©guliÃ¨rement ;-).\r\nPour admirer les photos de la talentueuse Emilie : Griottes\r\n\r\nâ™¡ Victoria : MANGO & SALT\r\nLe site de Victoria est trÃ¨s connu mais je me devais de le faire figurer dans ma liste de mes blogs lifestyle prÃ©fÃ©rÃ©s car câ€™est rÃ©ellement un des blogs que je visite le plus. Jâ€™aime beaucoup la faÃ§on dont elle aborde les sujets autant dans le fond que dans la forme : en toute simplicitÃ© et avec justesse. Son mode de consommation est green et son alimentation, veggie. Son blog est une mine de conseils pour consommer responsable et concocter de bons petits plats sains et gourmands.\r\nPour visiter lâ€™univers green de Victoria : Mango & Salt\r\n\r\nâ™¡ Marie: SWEET AND SOUR\r\nSi vous Ãªtes vegan (ou si vous tendez Ã  le devenir) et suivez le mouvement green, rendez-vous sans plus tarder sur le blog de Marie ! Vous y trouverez surtout des recettes pleines de gourmandise (sans produit dâ€™origine animale, non raffinÃ©, sans gluten). La blogueuse partage aussi la liste de nombreuses boutiques green et 100 livres pour mettre un pied dans le mouvement. Une vraie mine dâ€™orâ€¦\r\nPour en savoir plus sur le mouvement green de Marie : Sweet And Sour\r\n\r\nâ™¡ Sonia : CHOCODISCO\r\nLe blog de Sonia est plein de fraÃ®cheur. Vous y trouverez des recettes healthy qui donnent envie, des articles DIY originaux (jâ€™en ai repÃ©rÃ© plusieurs Ã  faireâ€¦)  et bien-Ãªtre. Mais surtout, de multiples photos de ses nombreux voyages. Un blog inspirant, plein de bonnes idÃ©es !\r\nPour visiter lâ€™univers frais et healthy de Sonia : Chocodisco\r\n\r\nâ™¡ AngÃ©line : CARNET PRUNE\r\nJâ€™aime beaucoup visiter le blog dâ€™AngÃ©line pour y retrouver des articles et des photos bien rÃ©flÃ©chis. Des conseils beautÃ© Ã  foison, des (envies) de voyages Ã  en faire pÃ¢lir votre banquier et des articles lifestyle bien Ã©crits. AngÃ©line partage aussi de bonnes recettes qui mettent (vraiment) lâ€™eau Ã  la bouche !\r\nPour dÃ©couvrir le lifestyle dâ€™AngÃ©line : Carnet Prune\r\n\r\nâ™¡ Florence : LA MOUETTE\r\nFlorence est une talentueuse graphiste et illustratrice. Et sur son blogâ€¦ Ã§a se voit ! Il est esthÃ©tique Ã  souhait et ses articles sont tout aussi soignÃ©s. Jâ€™aime beaucoup la passion et la sincÃ©ritÃ© qui transparaissent Ã  travers son Ã©criture. Ses photos sont (Ã©videmment) trÃ¨s bien faites. Ses articles voyages nous poussent Ã  suivre ses pas. Florence nous partage aussi son expÃ©rience de freelance et saura renseigner toute personne qui aimerait se lancer dans lâ€™aventure.\r\nPour lire les articles de la passionnÃ©e Florence : La Mouette\r\n\r\nJâ€™espÃ¨re que cette sÃ©lection vous a plu. A votre tour, dites-moi quels sont vos blogs lifestyle prÃ©fÃ©rÃ©s ?', 4, 2, '2021-02-11 13:45:39'),
(26, 'titre 1', 'oh la la', 1, 1, '2021-02-05 13:52:39'),
(27, 'titre 2', 'article 2', 1, 2, '2021-02-05 13:52:39'),
(29, 'titre 4', 'article 4', 1, 3, '2021-02-05 13:52:39'),
(40, 'COVID-19: PEUT-ON Ã‰VITER UN RECONFINEMENT? CE QUE DISENT LES CHIFFRES DE L\'Ã‰TAT DE L\'Ã‰PIDÃ‰MIE', 'Si les donnÃ©es de l\'Ã©pidÃ©mie semblent, Ã  court terme, montrer que les mesures actuelles sont efficaces, les soignants alertent sur les consÃ©quences potentielles de la progression des variants.\r\nLongtemps discutÃ©e, longtemps crainte, la perspective d\'un reconfinement semble s\'Ã©loigner pour la France - en tout cas Ã  court terme. Depuis quelques jours, Emmanuel Macron et les membres de l\'exÃ©cutif multiplient les prises de paroles au cours desquelles ils insistent sur la nÃ©cessitÃ© de tout faire pour Ã©viter un tel scÃ©nario. Le reconfinement est vu comme \"une mesure d\'ultime recours\", a rÃ©sumÃ© mercredi Gabriel Attal, le porte-parole du gouvernement, lors de son point presse Ã  l\'issue du Conseil des ministres.\r\n\r\nSi, contrairement Ã  plusieurs pays voisins, l\'Hexagone n\'a pas Ã©tÃ© remis sous cloche, c\'est parce que l\'Ã©pidÃ©mie de Covid-19 ne s\'affole pas, pour l\'heure, autant qu\'Ã  l\'automne dernier, justifie le gouvernement. L\'exÃ©cutif y voit le rÃ©sultat des diffÃ©rentes mesures prises depuis plusieurs semaines, comme le couvre-feu avancÃ© Ã  18h.', 4, 3, '2021-02-11 13:47:16'),
(41, 'Tiramisu au cafÃ©', 'IngrÃ©dients pour 8 personnes : \r\n\r\n500 g de mascarpone\r\n100 g de sucre\r\n4 oeufs\r\n48 biscuits Ã  la cuillÃ¨re\r\n35 cl de cafÃ© fort froid\r\n1 pincÃ©e de sel\r\n2 cuillÃ¨res Ã  soupe de cacao non sucrÃ©\r\n1 cuillÃ¨re Ã  soupe de marsala Ã  l\'amande\r\n\r\n\r\nPrÃ©paration\r\n\r\nTemps Total : 15 min\r\nSÃ©parer le blanc des jaunes des Å“ufs. Dans un saladier mÃ©langer les jaunes d\'oeuf avec le sucre au fouet puis rajouter le Marsala et le mascarpone.\r\nDans un autre saladier, battre les blancs d\'oeuf en neige au fouet avec la pincÃ©e de sel.\r\nAjouter les oeufs en neige Ã  la premiÃ¨re prÃ©paration en mÃ©langeant dÃ©licatement afin d\'obtenir un appareil mousseux et lÃ©ger.\r\nTremper les biscuits dans le cafÃ© froid et en tapisser le fond de votre plat puis Ã©taler par dessus votre prÃ©paration - renouveler l\'opÃ©ration encore une fois.\r\nSaupoudrer le tiramisu de cacao pour finir.\r\nMettre au frais au moins 12 h.', 4, 4, '2021-02-11 13:49:45'),
(42, 'Hunter Ã— Hunter', 'Hunter Ã— Hunter (ãƒãƒ³ã‚¿ãƒ¼ãƒãƒ³ã‚¿ãƒ¼, HantÄ HantÄ?) est un shÅnen manga Ã©crit et dessinÃ© par Yoshihiro Togashi. Il est prÃ©-publiÃ© depuis mars 1998 dans l\'hebdomadaire Weekly ShÅnen Jump de l\'Ã©diteur ShÅ«eisha, et a Ã©tÃ© compilÃ© en trente-six tomes au 4 octobre 2018. En mai 2013, le manga s\'est vendu Ã  plus de 65 millions d\'exemplaires au Japon. La version franÃ§aise est publiÃ©e aux Ã©ditions Kana, avec trente-six tomes sont sortis au 3 mai 2019.\r\n\r\nLa sÃ©rie a fait l\'objet de deux adaptations en anime. La premiÃ¨re, produite par Nippon Animation, est diffusÃ©e entre 1999 et 2001 au Japon, suivie de trois sÃ©ries d\'OAV sorties en 2002, 2003 et 2004. Elle a Ã©tÃ© Ã©ditÃ©e en franÃ§ais par Dybex. La seconde, produite par Madhouse et reprenant l\'histoire depuis le dÃ©but, est diffusÃ©e entre octobre 2011 et septembre 2014 au Japon. La licence pour les principaux pays francophones a Ã©tÃ© acquise par Kana Home Video pour une sortie en DVD.\r\n\r\nLa sÃ©rie est Ã©galement adaptÃ©e en deux films d\'animation sortis au Japon, Hunter Ã— Hunter: Phantom Rouge le 12 janvier 2013 et Hunter Ã— Hunter: The Last Mission le 27 dÃ©cembre 2013.', 4, 1, '2021-02-11 13:51:11'),
(44, 'dernier article', 'en miam ', 4, 4, '2021-02-11 15:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Animes'),
(2, 'Lifestyle'),
(3, 'Covid-19'),
(4, 'Miam');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(55, 'covid nul', 40, 4, '2021-02-11 16:12:03'),
(53, 'voilÃ  ', 44, 4, '2021-02-11 16:11:04'),
(54, 'humm miam', 41, 4, '2021-02-11 16:11:20'),
(51, 'Salut elodie jâ€™adore ce que tu fais et je te souhaite de continuer. Cela fais longtemps que je te suis. Tes articles sont trÃ¨s pertinents.\r\nPour moi jâ€™ai aussi un blog qui est sociÃ©tisteblog.blogspot.fr .\r\nSi il te prend lenvie dâ€™aller le voir ce serait trop cool de ta part.\r\nRÃ©pond moi sâ€™il te plaÃ®t car jâ€™aimerai aussi pourquoi pas te proposer de faire un article exclusif invitÃ©. AprÃ¨s câ€™est toi qui voit.\r\n\r\nBravo et merci dâ€™avoir lu le commentaire', 43, 4, '2021-02-11 13:55:15'),
(50, 'Oh mais je viens seulement de voir ton article ! Ã§a me fait vraiment plaisir dâ€™y apparaÃ®tre, dâ€™autant plus que je suis en trÃ¨s bonne compagnie dans cette petite liste ðŸ™‚\r\n\r\nTu me rediras quand tu seras dispo pour se revoir sur Rennes â€“ St Malo â€“ Dinan !\r\n\r\nTrÃ¨s bonne fin de week-end et Ã  bientÃ´t ðŸ™‚', 43, 4, '2021-02-11 13:54:50'),
(49, 'Trop mignonne Ã§a me touche ! Et jâ€™en dÃ©couvre plein grÃ¢ce Ã  toi ðŸ™‚\r\nBisous', 43, 4, '2021-02-11 13:54:37'),
(48, 'Oh trop dâ€™amour ! Trop merci ma chÃ¨re Elodie ! Oh la la, je suis trop fiÃ¨re ðŸ˜€', 43, 4, '2021-02-11 13:54:20'),
(46, 'oh lala', 37, 4, '2021-02-11 10:31:58'),
(47, 'opiuytrezaergbkjzba fc fezzofih eoiajfioajpo feifhoefopejz ef heozha lu ehouhrzouahoeh orzhgomrzh', 38, 4, '2021-02-11 10:32:40'),
(44, 'test 2', 26, 1, '2021-02-08 10:45:57'),
(45, 'BONJOUR', 36, 4, '2021-02-11 10:10:55'),
(42, 'bonjour ', 26, 1, '2021-02-08 10:39:03'),
(39, 'commentaire 2', 26, 3, '2021-02-08 08:37:42'),
(40, 'ola', 26, 3, '2021-02-08 10:13:43'),
(41, 'poeajpaeztjg', 26, 1, '2021-02-08 10:38:09'),
(35, 'commentaire 8', 33, 1, '2021-02-05 13:57:43'),
(36, 'commentaire 9', 34, 1, '2021-02-05 13:57:43'),
(33, 'commentaire 6', 31, 1, '2021-02-05 13:57:43'),
(34, 'commentaire 7', 32, 1, '2021-02-05 13:57:43'),
(31, 'commentaire4', 29, 1, '2021-02-05 13:57:43'),
(32, 'commentaire 5', 30, 1, '2021-02-05 13:57:43'),
(43, 'test', 26, 1, '2021-02-08 10:41:55'),
(29, 'commentaire 2', 27, 1, '2021-02-05 13:57:43'),
(30, 'commentaire 3', 28, 1, '2021-02-05 13:57:43'),
(28, 'commentaire 1', 26, 1, '2021-02-05 13:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1338 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'marie', 'marie', 'marie.clerc@laplateforme.io', 1),
(2, 'william', 'william', 'william.kies@laplateforme.io', 42),
(3, 'guillaume', 'guillaume', 'guillaume.grac@laplateforme.io', 1337),
(4, 'LOLO', '$2y$10$7Qx0mPElrf7JkthGlYk5geuJeAWJjT2AiNSIMyIoNmnAjTAYsU.hu', 'maria@maria.com', 1337),
(5, 'lala', '$2y$10$pfLfTBNtYZNjKkskfp8E.O31TWQzno.yk.oPE9UKcXIVWLIIgmhgi', 'lala@lala.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
