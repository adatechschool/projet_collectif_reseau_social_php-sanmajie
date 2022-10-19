-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 19, 2022 at 03:51 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `followed_user_id` int(10) UNSIGNED NOT NULL,
  `following_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `followed_user_id`, `following_user_id`) VALUES
(1, 5, 3),
(2, 5, 6),
(3, 5, 7),
(4, 1, 5),
(5, 2, 5),
(6, 4, 5),
(7, 1, 2),
(8, 1, 3),
(9, 1, 7),
(10, 1, 6),
(11, 1, 4),
(12, 5, 8),
(13, 7, 8),
(15, 11, 18),
(16, 8, 18);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 3),
(4, 3, 4),
(5, 3, 5),
(6, 3, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 3, 10),
(11, 1, 9),
(12, 2, 9),
(13, 4, 9),
(14, 5, 9),
(15, 8, 62),
(16, 8, 61),
(17, 8, 59),
(18, 8, 58),
(19, 8, 60),
(20, 8, 55),
(21, 8, 8),
(22, 8, 7),
(23, 8, 5),
(24, 8, 4),
(25, 8, 1),
(26, 8, 2),
(27, 8, 3),
(28, 8, 11),
(29, 8, 12),
(30, 8, 9),
(31, 8, 44),
(32, 8, 46),
(33, 8, 63),
(34, 8, 16),
(35, 8, 49),
(36, 8, 10),
(37, 8, 20),
(38, 18, 65),
(39, 18, 64),
(40, 18, 63);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created`, `parent_id`) VALUES
(1, 5, '#politique étrangère Joe Biden, le président des Américains \r\n\r\n', '2020-02-05 18:19:12', NULL),
(2, 5, 'Le gouvernement a lancé, le 3 septembre, un plan de relance historique de 100 milliards d’euros pour redresser l’#économie.', '2020-04-06 18:19:12', NULL),
(3, 5, 'Dans une définition large de la notion du #social, on peut l\'entendre comme l\'expression de l\'existence de relations et de communication entre les êtres vivants.', '2020-07-12 18:21:49', NULL),
(4, 5, 'La #société (du latin socius : compagnon, associé) est un groupe d\'individus unifiés par un réseau de relations, de traditions et d\'institutions. ', '2020-08-04 18:21:49', NULL),
(5, 5, 'La #technologie est l\'étude des outils et des techniques. Le terme désigne les observations sur l\'état de l\'art aux diverses périodes historiques, en matière d\'outils et de savoir-faire. Il comprend l\'art, l\'artisanat, les métiers, les sciences appliquées et éventuellement les connaissances.', '2020-09-25 18:24:30', NULL),
(6, 5, 'En sociologie, comme en éthologie, la #culture est définie de façon plus étroite comme « ce qui est commun à un groupe d\'individus » et comme « ce qui le soude », c\'est-à-dire ce qui est appris, transmis, produit et inventé. Ainsi, pour une organisation internationale comme l\'UNESCO : « Dans son sens le plus large, la culture peut aujourd’hui être considérée comme l\'ensemble des traits distinctifs, spirituels, matériels, intellectuels et affectifs, qui caractérisent une société ou un groupe social. Elle englobe, outre les arts, les lettres et les sciences, les modes de vie, les lois, les systèmes de valeurs, les traditions et les croyances ». Ce « réservoir commun » évolue dans le temps par et dans les formes des échanges. Il se constitue en de multiples manières distinctes d\'être, de penser, d\'agir et de communiquer en société.', '2020-10-15 00:35:42', NULL),
(7, 5, 'On peut définir le jeu comme une activité d\'ordre psychique ou bien physique pensée pour divertir et improductive à court terme. Le jeu entraîne des dépenses d\'énergie et de moyens matériels, sans créer aucune richesse nouvelle. La plupart des individus qui s\'y engagent n\'en retirent que du plaisir, bien que certains puissent en obtenir des avantages matériels. De ce fait, Johan Huizinga remarque que de très nombreuses activités humaines peuvent s\'assimiler à des jeux. La difficulté de circonscrire la définition du jeu présente un intérêt pour la philosophie. ', '2020-10-25 00:35:39', NULL),
(8, 5, 'Un #jeu de rôle est une technique ou activité, par laquelle une personne interprète le rôle d\'un personnage (réel ou imaginaire) dans un environnement fictif. Le participant agit à travers ce rôle par des actions physiques ou imaginaires, par des actions narratives (dialogues improvisés, descriptions, jeu) et par des prises de décision sur le développement du personnage et de son histoire.', '2020-11-10 18:26:12', NULL),
(9, 1, 'Le #féminisme est un ensemble de mouvements et d\'idées philosophiques qui partagent un but commun : définir, promouvoir et atteindre l\'égalité #politique, économique, culturelle, sociale et juridique entre les femmes et les hommes. Le féminisme a donc pour objectif d\'abolir, dans ces différents domaines, les inégalités homme-femme dont les femmes sont les principales victimes, et ainsi de promouvoir les droits des femmes dans la société civile et dans la vie privée. ', '2020-11-20 18:26:50', NULL),
(10, 7, 'Le #sport est un ensemble d\'exercices physiques se pratiquant sous forme de jeux individuels ou collectifs pouvant donner lieu à des compétitions. Le sport est un phénomène presque universel dans le temps et dans l\'espace humain. La Grèce antique, la Rome antique, Byzance, l\'Occident médiéval puis moderne, mais aussi l\'Amérique précolombienne ou l\'Asie, sont tous marqués par l\'importance du sport. Certaines périodes sont surtout marquées par des interdits. ', '2020-11-30 18:31:16', NULL),
(11, 8, 'hey hey\r\n', '2022-10-10 04:08:32', NULL),
(12, 8, '\"On ne naît pas femme : on le devient. Aucun destin biologique, psychique, économique ne définit\r\nla figure que revêt au sein de la société la femelle humaine ; c\'est l\'ensemble de la civilisation qui\r\nélabore ce produit intermédiaire entre le mâle et le castrat qu\'on qualifie de féminin\", écrivait Simone de Beauvoir.', '2022-10-10 04:10:57', NULL),
(13, 8, 'Yo yo yo', '2022-10-10 16:18:27', NULL),
(14, 8, 'Ceci est un test.', '2022-10-10 16:21:22', NULL),
(15, 8, 'Ceci est un test.', '2022-10-10 16:21:53', NULL),
(16, 8, 'Ceci est un nouveau test.', '2022-10-10 16:22:43', NULL),
(17, 8, 'Ceci est un nouveau test.', '2022-10-10 16:22:49', NULL),
(18, 8, 'Si le concept de féminisme, trop souvent considéré comme une importation occidentale, suscite parfois la méfiance, il a toute sa raison d’être sur le continent, affirme la militante sud-africaine Susan Tolmay.', '2022-10-11 08:48:26', NULL),
(19, 8, 'Si le concept de féminisme, trop souvent considéré comme une importation occidentale, suscite parfois la méfiance, il a toute sa raison d’être sur le continent, affirme la militante sud-africaine Susan Tolmay.', '2022-10-11 08:50:07', NULL),
(20, 8, 'Hello Hello', '2022-10-11 08:55:02', NULL),
(21, 8, 'Hello Hello', '2022-10-11 09:28:38', NULL),
(22, 8, 'Si le concept de féminisme, trop souvent considéré comme une importation occidentale, suscite parfois la méfiance, il a toute sa raison d’être sur le continent, affirme la militante sud-africaine Susan Tolmay.', '2022-10-11 09:29:09', NULL),
(23, 8, 'Si le concept de féminisme, trop souvent considéré comme une importation occidentale, suscite parfois la méfiance, il a toute sa raison d’être sur le continent, affirme la militante sud-africaine Susan Tolmay.', '2022-10-11 09:31:26', NULL),
(24, 8, 'Si le concept de féminisme, trop souvent considéré comme une importation occidentale, suscite parfois la méfiance, il a toute sa raison d’être sur le continent, affirme la militante sud-africaine Susan Tolmay.', '2022-10-11 09:32:18', NULL),
(25, 8, 'Je recherche l\'id du dernier post publié', '2022-10-11 09:32:44', NULL),
(26, 8, 'Je cherche ENCORE l\'ID de mon dernier post', '2022-10-11 09:34:41', NULL),
(27, 8, 'Je cherche ENCORE l\'ID de mon dernier post', '2022-10-11 09:35:19', NULL),
(28, 8, 'Nouvelle recherche de l\'ID de mon dernier ajout', '2022-10-11 09:36:08', NULL),
(29, 8, 'Crash test ultimé !!', '2022-10-11 09:41:28', NULL),
(30, 8, 'Crash test ultimé !!', '2022-10-11 09:41:59', NULL),
(31, 8, 'Crash test ultimé !!', '2022-10-11 09:55:43', NULL),
(32, 8, 'Crash test ultimé !!', '2022-10-11 09:57:01', NULL),
(33, 8, 'Crash test ultimé !!', '2022-10-11 09:58:40', NULL),
(34, 8, 'Crash test ultimé !!', '2022-10-11 09:59:12', NULL),
(35, 8, 'Crash test, second essai !', '2022-10-11 10:07:03', NULL),
(36, 8, 'Crash test, second essai !', '2022-10-11 10:09:54', NULL),
(37, 8, 'Crash test, second essai !', '2022-10-11 10:11:13', NULL),
(38, 8, 'Crash test, second essai !', '2022-10-11 10:13:38', NULL),
(39, 8, 'Crash test, troisième essai !', '2022-10-11 10:22:47', NULL),
(40, 8, 'Crash test, troisième essai !', '2022-10-11 10:23:35', NULL),
(41, 8, 'Crash test, troisième essai !', '2022-10-11 10:24:57', NULL),
(42, 8, 'Crash test, troisième essai !', '2022-10-11 10:26:00', NULL),
(43, 8, 'Crash test, troisième essai !', '2022-10-11 10:28:13', NULL),
(44, 8, 'Crash test, quatrième essai...', '2022-10-11 10:28:32', NULL),
(45, 8, 'Crash test, quatrième essai...', '2022-10-11 10:28:56', NULL),
(46, 8, 'Crash test, quatrième essai...', '2022-10-11 10:30:59', NULL),
(47, 8, 'Ça marche !! Et si maintenant j\'ai plusieurs mots-clés...', '2022-10-11 10:31:40', NULL),
(48, 8, 'Nouvel exemple.', '2022-10-11 12:14:55', NULL),
(49, 8, 'Nouveau test grâce à Julien !', '2022-10-11 12:15:57', NULL),
(50, 8, 'Nouveau test avec $i.', '2022-10-11 12:17:30', NULL),
(51, 8, 'Nouveau test avec $i.', '2022-10-11 12:18:45', NULL),
(52, 8, 'Test avec $i++', '2022-10-11 12:19:45', NULL),
(53, 8, 'Test fetch_assoc();', '2022-10-11 12:25:15', NULL),
(54, 8, 'Nouveau test avec fetch_assoc()[\'id\']', '2022-10-11 12:25:46', NULL),
(55, 8, 'Salut salut', '2022-10-11 12:30:44', NULL),
(56, 8, 'Salut salut', '2022-10-11 12:31:43', NULL),
(57, 8, 'Test avec requête SQL dans la boucle foreach', '2022-10-11 12:33:14', NULL),
(58, 8, 'Nouveau test avec la requête SQL dans la boucle foreach', '2022-10-11 12:34:27', NULL),
(59, 8, 'Troisième test avec la requête SQL écrite dans la boucle foreach', '2022-10-11 12:36:19', NULL),
(60, 8, 'Test avec ajout de mot-clé', '2022-10-11 13:20:52', NULL),
(61, 8, 'Test avec mot-clé existant', '2022-10-11 13:22:53', NULL),
(62, 8, 'Dernier test avant Commit', '2022-10-11 15:14:26', NULL),
(63, 8, 'Ouuuaaaiiis on a réussi à faire une grosse partie du boulot!', '2022-10-12 16:06:05', NULL),
(64, 13, 'En sociologie, comme en éthologie, la culture est définie de façon plus étroite comme « ce qui est commun à un groupe d\'individus » et comme « ce qui le soude », c\'est-à-dire ce qui est appris, transmis, produit et inventé.', '2022-10-13 13:04:52', NULL),
(65, 11, 'L\'écologie ou écologie scientifique, est une science qui étudie les interactions des êtres vivants entre eux et avec leur milieu. L\'ensemble des êtres vivants, de leur milieu de vie et des relations qu\'ils entretiennent forme un écosystème.', '2022-10-13 13:22:06', NULL),
(66, 18, 'Hello la team !', '2022-10-13 13:42:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `post_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 6),
(6, 6, 7),
(7, 7, 8),
(8, 8, 8),
(9, 9, 9),
(10, 10, 5),
(11, 9, 1),
(12, 40, 8),
(13, 41, 8),
(14, 42, 8),
(15, 43, 8),
(16, 44, 1),
(17, 45, 1),
(18, 46, 1),
(19, 47, 6),
(20, 48, 6),
(21, 49, 9),
(25, 55, 6),
(26, 59, 1),
(27, 59, 6),
(28, 60, 2),
(29, 61, 8),
(30, 62, 7),
(31, 62, 5),
(32, 63, 4),
(33, 64, 7),
(34, 65, 10),
(35, 66, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `label`) VALUES
(7, 'culture'),
(10, 'écologie'),
(2, 'économie'),
(9, 'féminisme'),
(8, 'jeux'),
(1, 'politique'),
(3, 'social'),
(4, 'société'),
(5, 'sport'),
(6, 'technologie');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `alias`) VALUES
(1, 'ada@test.org', '098f6bcd4621d373cade4e832627b4f6', 'ada'),
(2, 'alex@test.org', '098f6bcd4621d373cade4e832627b4f6', 'Alexandra'),
(3, 'bea@test.org', '098f6bcd4621d373cade4e832627b4f6', 'Béatrice'),
(4, 'zoe@test.org', '098f6bcd4621d373cade4e832627b4f6', 'Zoé'),
(5, 'felicie@test.org', '098f6bcd4621d373cade4e832627b4f6', 'Félicie'),
(6, 'cecile@test.com', '098f6bcd4621d373cade4e832627b4f6', 'Cécile'),
(7, 'chacha@test.net', '098f6bcd4621d373cade4e832627b4f6', 'Charlotte'),
(8, 'tata@gmail.com', 'cc5a4767cf234b8dbf6677d57256e26e', 'tata'),
(9, 'julie@j.com', '16f12f5e8379e22be995e505ebfc1b84', 'Julie'),
(11, 'clement@c.com', '8c13c1ae4852c8dca8d918f005164c42', 'Clément'),
(13, 'jonathan@j.com', '78842815248300fa6ae79f7776a5080a', 'Jonathan'),
(14, 'florence@f.com', '062c148454b0db6e5a29547c0220a83e', 'Florence'),
(17, 'eddy@e.com', '5aa8fed9741d33c63868a87f1af05ab7', 'Eddy'),
(18, 'woirda@w.com', '163f7c3f5ec741999231abcbc47bca11', 'woirda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_has_users_users2_idx` (`following_user_id`),
  ADD KEY `fk_users_has_users_users1_idx` (`followed_user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_has_posts_posts1_idx` (`post_id`),
  ADD KEY `fk_users_has_posts_users1_idx` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_users_idx` (`user_id`),
  ADD KEY `fk_posts_posts1_idx` (`parent_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_has_tags_tags1_idx` (`tag_id`),
  ADD KEY `fk_posts_has_tags_posts1_idx` (`post_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `label_UNIQUE` (`label`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `alias_UNIQUE` (`alias`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `fk_users_has_users_users1` FOREIGN KEY (`followed_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_users_has_users_users2` FOREIGN KEY (`following_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_users_has_posts_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `fk_users_has_posts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_posts1` FOREIGN KEY (`parent_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `fk_posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `fk_posts_has_tags_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `fk_posts_has_tags_tags1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
