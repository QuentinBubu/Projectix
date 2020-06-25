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

-- Listage des données de la table projectix.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `userName`, `password`, `mail`, `creationDate`, `profilImage`, `token`, `newsletter`, `newMail`, `newToken`) VALUES
	(1, 'Teste', '$argon2id$v=19$m=65536,t=4,p=1$a3JxaXlEdjgxZm50QlVOVg$B+4pPK9N+MRze4rzsKiqqVr2rR4QpASdqFuuDfGGzqA', 'test@gmail.com', '2020-06-25 14:08:44', '/ressources/pictures/default/profil.svg', 'M1e17ad8d3db60f4bce6aa1b555f700c3afeee06d', 'on', NULL, NULL),
	(4, 'Anagames', '$argon2id$v=19$m=65536,t=4,p=1$VlJpSjJYOHJOWEZTYzlyMg$HJ0i7U2yIrGP/zHDbcAWfA4V+b8xsxWekLeSWjXKW00', 'anagamesprint@gmail.com', '2020-06-25 17:06:46', '/ressources/pictures/default/profil.svg', 'true', 'on', NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
