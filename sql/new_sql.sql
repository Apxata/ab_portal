-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.3.9-MariaDB-log - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных albion
CREATE DATABASE IF NOT EXISTS `albion` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `albion`;

-- Дамп структуры для таблица albion.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_edit_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `preview_text` text CHARACTER SET utf8 NOT NULL,
  `full_text` text CHARACTER SET utf8 NOT NULL,
  `subject` varchar(256) CHARACTER SET utf8 NOT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.articles: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `author_id`, `create_date`, `last_edit_date`, `preview_text`, `full_text`, `subject`, `visible`) VALUES
	(1, 20, '2018-08-16 09:31:43', '0000-00-00 00:00:00', '', 'В альбионе существует система понижающая эффективность больших групп врагов по сравнению с меньшими группами. Это система основана на увеличении защиты при получении урона от нескольких врагов за определенное время. \r\nУменьшение урона зависит от:\r\n- числа врагов нанесших урон\r\n- типа оружия врагов (ближний/дальний бой)\r\n\r\nТак, когда вас атакует несколько врагов вы получаете бафф в простонародье называемый **зерг-контролем**. Данный бафф дает процентное уменьшение урона по вам, но получает только 1 стак за одного атакующего, то бишь если один и тот же человек будет бить несколько раз бафф будет лишь обновляться, но не увеличиваться.\r\nНапример если вас одновременно атакуют два врага ближнего боя (например алебарда и копье), то урон получаемый вами будет уменьшен на 14% и у вас на панели баффов появится соответствующий бафф зерг-контроля в виде бело-красного щита, который будет висеть несколько секунд (примерно 5), если же до окончания баффа вас ударит третий враг ближнего боя то уменьшение урона составит уже 25% и время баффа обновится.\r\nАналогично данная система работает и с уроном дальнего боя, только % снижения урона для дальнего боя несколько меньше чем для ближнего. \r\n\r\nКазалось бы что в таком случае урон и заливка дальнего боя гораздо эффективнее ближнего, но все не так просто. В характеристиках любого оружия ближнего боя присутствует коэффициент "пробивание защиты" (или "resilience penetration" в англ. версии) он может быть равен например 0.3 (30%) (для булав и молотов) или 0.4 0.5 (40-50%) (для топоров и мечей). Данный коэффициент определяет в какой степени зерг-контроль будет влиять на урон вашего оружия. Например если на враге бафф зерг-контроля составляет 25% а вы бьете его алебардой с коэффициентом пробивания защиты = 0.3 то реальный зерг-контроль противника составит 25*0.7=17.5%.\r\n \r\n**Зачем это нужно и что это значит?**\r\n 1. Думайте в кого нужно наносить урон, в танка с 50% хп но имеющего зерг-контроль от 20 человек или в тряпку имеющую 100% хп без защиты от зерг-контроля.\r\n 2. Не используйте кушки и авто-атаки впустую если вы хилер или боец ближнего боя, один-два раза ударив вражеского танка за милишника или хилера вы только навредите своей команде неубиваемым танком.\r\n 3. Если ваш урон имеет свойство дота (периодического урона) или настакивания постарайтесь не менять цель или же выбрать максимум 2 цели которым и только которым вы будете наносить урон (будь то танк или милишник врага).\r\n 4. Если же вы сдали вашу ешку, и данная ешка нанесла урон всем врагам, то пункт 3 не имеет смысла выполнять, бейте того кого необходимо.\r\n 5. Если вы сами являетесь танком или милишником, постарайтесь собрать как можно больше единичных ударов от разных врагов, при этом оставаясь при полном здоровье, немаловажно поддерживать накопленный вами бафф зерг-контроля и врываться после его очередного обновления. Именно данный зерг-контроль, отхил и большой запас здоровья являются основным залогом выживания танка в бою.\r\n\r\n\r\n', 'Фокусирование урона в звз, механика "пробивания защиты", "зерг-контроль"', 1);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Дамп структуры для таблица albion.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.comments: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `article_id`, `user_id`, `date_create`, `comment`, `deleted`) VALUES
	(1, 2, 1, '2018-09-07 07:53:49', 'раз раз', 0),
	(2, 1, 1, '2018-09-10 18:18:03', 'хай', 0);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица albion.fame
CREATE TABLE IF NOT EXISTS `fame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fame` int(11) NOT NULL DEFAULT 0,
  `fame_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `timespent` int(11) DEFAULT NULL,
  `fame_get` int(11) DEFAULT NULL,
  `fame_per_hour` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `round` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.fame: ~48 rows (приблизительно)
/*!40000 ALTER TABLE `fame` DISABLE KEYS */;
INSERT INTO `fame` (`id`, `fame`, `fame_time`, `timespent`, `fame_get`, `fame_per_hour`, `user_id`, `round`) VALUES
	(1, 1000, '2018-09-07 08:11:06', 1536307866, 1000, 0, 1, 0),
	(2, 2000, '2018-09-07 08:11:13', 7, 1000, 514286, 1, 0),
	(3, 5000, '2018-09-07 08:47:29', 2176, 3000, 4963, 1, 0),
	(4, 10000, '2018-09-07 08:55:27', 478, 5000, 37657, 1, 0),
	(5, 10000, '2018-09-07 08:56:41', NULL, NULL, NULL, 1, 0),
	(6, 15000, '2018-09-07 08:56:54', NULL, NULL, NULL, 1, 0),
	(7, 20000, '2018-09-07 08:57:39', 45, 5000, 400000, 1, 0),
	(8, 150000, '2018-09-07 09:48:20', 3041, 130000, 153897, 1, 0),
	(9, 10000, '2018-09-07 19:30:40', 34940, -140000, -14425, 1, 0),
	(10, 12500, '2018-09-07 19:30:50', 10, 2500, 900000, 2, 0),
	(11, 13500, '2018-09-07 19:47:03', 983, 3500, 12818, 1, 0),
	(12, 14500, '2018-09-07 19:48:32', 89, 1000, 40449, 1, 0),
	(13, 0, '2018-09-14 15:57:06', 590914, -14500, -88, 1, 0),
	(14, 29129, '2018-09-14 17:22:24', 5118, 29129, 20489, 1, 0),
	(15, 0, '2018-09-15 08:24:18', 54114, -29129, -1938, 1, 0),
	(16, 106771, '2018-09-15 08:48:18', 1440, 106771, 266928, 2, 21),
	(17, 154000, '2018-09-15 08:59:26', 668, 47229, 254528, 2, 21),
	(18, 189644, '2018-09-15 09:06:34', 428, 35644, 299809, 2, 21),
	(19, 0, '2018-09-15 09:06:58', 24, -189644, -28446600, 1, 0),
	(20, 0, '2018-09-15 11:05:48', 7130, 0, 0, 1, 0),
	(21, 11164, '2018-09-15 11:20:17', 869, 11164, 46249, 1, 20),
	(22, 64114, '2018-09-15 11:35:54', 937, 52950, 203436, 1, 20),
	(23, 111398, '2018-09-15 11:45:18', 564, 47284, 301813, 1, 20),
	(28, 670000, '2018-09-16 11:27:56', 85358, 558602, 23559, 1, 20),
	(29, 680000, '2018-09-16 11:32:31', 275, 10000, 130909, 1, 21),
	(30, 685000, '2018-09-16 11:35:20', 169, 5000, 106509, 1, 21),
	(31, 690000, '2018-09-16 11:44:46', 566, 5000, 31802, 1, 21),
	(32, 250000, '2018-09-16 11:57:31', NULL, NULL, NULL, 1, 22),
	(33, 255000, '2018-09-16 11:57:44', 13, 5000, 1384615, 1, 22),
	(34, 258000, '2018-09-16 11:58:35', 51, 3000, 211765, 1, 22),
	(35, 350000, '2018-09-16 13:13:49', 4514, 92000, 73372, 1, 22),
	(37, 115000, '2018-09-16 13:47:27', NULL, NULL, NULL, 1, 23),
	(38, 120000, '2018-09-16 13:48:09', 42, 5000, 428571, 1, 23),
	(39, 120000, '2018-09-16 13:55:31', NULL, NULL, NULL, 1, 24),
	(40, 122000, '2018-09-16 13:55:42', 11, 2000, 654545, 1, 24),
	(41, 120000, '2018-09-16 13:56:05', NULL, NULL, NULL, 1, 25),
	(43, 270000, '2018-09-16 14:59:00', 9, 20000, 8000000, 1, 26),
	(44, 275000, '2018-09-16 15:01:23', 143, 5000, 125874, 1, 26),
	(45, 115000, '2018-09-16 15:47:49', NULL, NULL, NULL, 1, 30),
	(46, 116000, '2018-09-16 15:47:56', 7, 1000, 514286, 1, 30),
	(47, 116000, '2018-09-16 15:51:28', NULL, NULL, NULL, 1, 31),
	(50, 148000, '2018-09-16 15:51:59', 11, 18000, 5890909, 1, 31),
	(51, 113, '2018-09-16 16:03:08', NULL, NULL, NULL, 1, 32),
	(52, 1050, '2018-09-16 16:03:14', 6, 937, 562200, 1, 32),
	(53, 1065, '2018-09-16 16:03:24', 10, 15, 5400, 1, 32),
	(54, 10000, '2018-09-17 13:58:37', NULL, NULL, NULL, 1, 33),
	(55, 15000, '2018-09-17 13:59:10', 33, 5000, 545455, 1, 33),
	(56, 20000, '2018-09-17 13:59:30', 20, 5000, 900000, 1, 33);
/*!40000 ALTER TABLE `fame` ENABLE KEYS */;

-- Дамп структуры для таблица albion.fame_round
CREATE TABLE IF NOT EXISTS `fame_round` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `round` int(11) NOT NULL DEFAULT 0,
  `fame_per_hour` int(11) NOT NULL DEFAULT 0,
  `fame_per_round` int(11) NOT NULL DEFAULT 0,
  `total_timespent` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.fame_round: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `fame_round` DISABLE KEYS */;
INSERT INTO `fame_round` (`id`, `user_id`, `round`, `fame_per_hour`, `fame_per_round`, `total_timespent`, `date`) VALUES
	(3, 1, 22, 78637, 100000, 4578, '2018-09-16 13:24:48'),
	(6, 1, 23, 428571, 5000, 42, '2018-09-16 13:55:09'),
	(7, 1, 24, 654545, 2000, 11, '2018-09-16 13:55:52'),
	(8, 1, 25, 0, -120000, -1537106165, '2018-09-16 13:56:06'),
	(9, 1, 26, 592105, 25000, 152, '2018-09-16 15:01:40'),
	(10, 1, 27, 125874, 5000, 143, '2018-09-16 15:46:29'),
	(11, 1, 28, 125874, 5000, 143, '2018-09-16 15:47:40'),
	(12, 1, 29, 125874, 5000, 143, '2018-09-16 15:47:41'),
	(13, 1, 30, 514286, 1000, 7, '2018-09-16 15:48:00'),
	(14, 1, 31, 3716129, 32000, 31, '2018-09-16 15:52:06'),
	(15, 1, 32, 214200, 952, 16, '2018-09-16 16:03:25'),
	(16, 1, 33, 679245, 10000, 53, '2018-09-17 13:59:36');
/*!40000 ALTER TABLE `fame_round` ENABLE KEYS */;

-- Дамп структуры для таблица albion.fame_round_counter
CREATE TABLE IF NOT EXISTS `fame_round_counter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT 0,
  `round` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы albion.fame_round_counter: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `fame_round_counter` DISABLE KEYS */;
INSERT INTO `fame_round_counter` (`id`, `user_id`, `round`) VALUES
	(1, 1, 20),
	(2, 1, 21),
	(3, 1, 22),
	(6, 1, 23),
	(9, 1, 24),
	(10, 1, 25),
	(11, 1, 26),
	(12, 1, 27),
	(13, 1, 28),
	(14, 1, 29),
	(15, 1, 30),
	(16, 1, 31),
	(17, 1, 32),
	(18, 1, 33),
	(19, 1, 34);
/*!40000 ALTER TABLE `fame_round_counter` ENABLE KEYS */;

-- Дамп структуры для таблица albion.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `nickname` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `acc_lvl` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы albion.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `hashed_password`, `reg_date`, `nickname`, `last_name`, `deleted`, `acc_lvl`) VALUES
	(1, 'apxata@gmail.com', '$2y$10$E2arR9d7kS6rH64oCgE5deITM4n3pJ/s1Jus5/OkrGctRyAuD1Nhm', '2018-08-01 09:26:19', 'Apxat', '', 0, 10);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
