-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour projectix
CREATE DATABASE IF NOT EXISTS `projectix` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `projectix`;

-- Listage de la structure de la table projectix. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `creationDate` datetime NOT NULL,
  `profilImage` text COLLATE utf8_unicode_ci,
  `token` text COLLATE utf8_unicode_ci,
  `newsletter` text COLLATE utf8_unicode_ci,
  `newMail` text COLLATE utf8_unicode_ci,
  `newToken` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='List of users';

-- Listage des données de la table projectix.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `userName`, `password`, `mail`, `creationDate`, `profilImage`, `token`, `newsletter`, `newMail`, `newToken`) VALUES
	(1, 'Teste', '$argon2id$v=19$m=65536,t=4,p=1$a3JxaXlEdjgxZm50QlVOVg$B+4pPK9N+MRze4rzsKiqqVr2rR4QpASdqFuuDfGGzqA', 'test@gmail.com', '2020-06-25 14:08:44', '/ressources/pictures/default/profil.svg', 'M1e17ad8d3db60f4bce6aa1b555f700c3afeee06d', 'on', NULL, NULL),
	(4, 'Anagames', '$argon2id$v=19$m=65536,t=4,p=1$VlJpSjJYOHJOWEZTYzlyMg$HJ0i7U2yIrGP/zHDbcAWfA4V+b8xsxWekLeSWjXKW00', 'anagamesprint@gmail.com', '2020-06-25 17:06:46', '/ressources/pictures/default/profil.svg', 'true', 'on', NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
