-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               9.1.0 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных site_structure
CREATE DATABASE IF NOT EXISTS `site_structure` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `site_structure`;

-- Дамп структуры для таблица site_structure.cartridge_disposals
CREATE TABLE IF NOT EXISTS `cartridge_disposals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cartridge_name` varchar(255) DEFAULT NULL,
  `inventory_number` varchar(100) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.cartridge_disposals: ~2 rows (приблизительно)
INSERT INTO `cartridge_disposals` (`id`, `cartridge_name`, `inventory_number`, `quantity`) VALUES
	(37, '212', '', 3),
	(38, '2', '3', 3);

-- Дамп структуры для таблица site_structure.cartridge_requests
CREATE TABLE IF NOT EXISTS `cartridge_requests` (
  `id_request` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) DEFAULT NULL,
  `head_full_name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `inventory_number` varchar(100) DEFAULT NULL,
  `printer_name` varchar(255) DEFAULT NULL,
  `building_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `room_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `reason` text,
  `submission_date` date DEFAULT NULL,
  `status` enum('Завершен','Не завершен') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Не завершен',
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id_request`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `cartridge_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.cartridge_requests: ~52 rows (приблизительно)
INSERT INTO `cartridge_requests` (`id_request`, `department_name`, `head_full_name`, `phone`, `inventory_number`, `printer_name`, `building_number`, `room_number`, `reason`, `submission_date`, `status`, `user_id`) VALUES
	(13, '1', '11', '1', '1', '1', '1', '1', '1', '2025-08-08', 'Завершен', 2),
	(14, '12', '1', '1', '1', '1', '1', '3', '12', '2025-08-08', 'Завершен', 12),
	(15, 'Отдел Учебно-методического управления', 'Ильиных Марина Валентиновна', '23746726487462', '1043695412', 'Pantum m6552W', '1', '315', 'Закончился тонер', '2025-08-10', 'Завершен', 2),
	(16, '2', '2', '2', '2', '2', '2', '2', '123', '2025-08-10', 'Завершен', 2),
	(17, '3', '3', '3', '3', '3', '3', '3', '3', '2025-08-10', 'Завершен', 2),
	(18, '4', '4', '4', '4', '4', '4', '4', '4', '2025-08-10', 'Завершен', 2),
	(19, '5', '5', '5', '5', '5', '5', '5', '5', '2025-08-10', 'Завершен', 2),
	(20, '6', '6', '6', '6', '6', '6', '6', '6', '2025-08-10', 'Завершен', 2),
	(21, '7', '7', '7', '7', '7', '7', '7', '7', '2025-08-10', 'Завершен', 2),
	(22, '8', '8', '8', '8', '8', '8', '8', '8', '2025-08-10', 'Завершен', 2),
	(23, '9', '9', '9', '9', '9', '9', '9', '9', '2025-08-10', 'Завершен', 2),
	(24, '10', '10', '10', '10', '10', '10', '10', '10', '2025-08-10', 'Завершен', 2),
	(25, 'Отдел Учебно-методического управления', 'Афанасьева Мария Викторовна', '9148147669', '1', 'hp laserjet 1160', 'аыыва', '315', 'ыувааываавыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыы', '2025-08-10', 'Завершен', 2),
	(26, 'Отдел Учебно-методического управления', 'Афанасьева Мария Викторовна', '9148147669', '1043695412', 'hp laserjet 1160', 'аыыва', 'ваыа', 'выаааааааааааааааааааааааааа', '2025-08-10', 'Завершен', 2),
	(27, 'Отдел Учебно-методического управления', 'Афанасьева Мария Викторовна', '9148147669', '1043695412', 'hp laserjet 1160', 'аыыва', 'ваыа', 'выфвыфвыфвыфвыфвыф', '2025-08-10', 'Завершен', 2),
	(28, 'Отдел Учебно-методического управления', 'Афанасьева Мария Викторовна', '9148147669', 'выа', 'hp laserjet 1160', 'аыыва', '315', 'ывфффффффффффффффффффффффффффффффффффффффффф', '2025-08-10', 'Завершен', 2),
	(79, 'cxvcx', 'vzvxc', 'vzvx', 'xzv', 'cvz', 'zxcvz', 'vxzc', 'vxcvcz', '2025-12-03', 'Завершен', 2),
	(80, 'dfgd', 'sggs', 'gdssgf', 'gs', 'sdfdsg', 'gsdfg', 'gdsgds', 'fgdsggs', '2025-12-03', 'Завершен', 2),
	(81, 'dfghfdg', 'hdhd', 'hd', 'dfgdh', 'hh', 'dfgh', 'dfhdfg', 'hfd', '2025-12-03', 'Завершен', 2),
	(82, 'dsf', 'sfsd', 'fsdf', 'dsf', 'sdf', 'dsfs', 'sdfdsf', 'dsf', '2025-12-03', 'Завершен', 2),
	(83, 'sdf', 'dsfs', 'sdf', 'dsf', 'sdsdff', 'fsd', 'fds', 'ffds', '2025-12-03', 'Завершен', 2),
	(84, 'dfgfd', 'gfd', 'gdf', 'gdfg', 'gdf', 'dfg', 'dfg', 'dfgdfg', '2025-12-03', 'Завершен', 2),
	(85, '228', 'dffgddfg', 'dfg', 'dfg', 'fgdg', 'dfg', 'dfg', 'dfgdfgd', '2025-12-03', 'Завершен', 2),
	(86, 'выав', 'ыа', 'выа', 'выа', 'выа', 'выа', 'выавы', 'авыа', '2025-12-03', 'Завершен', 2),
	(87, 'вапвап', 'вап', 'вап', 'вапвап', 'вап', 'вап', 'вапва', 'вап', '2025-12-03', 'Не завершен', 12),
	(88, 'апврр', 'апв5677', '65765', '56765', '7 567 657', '7657', '56', '765765', '2025-12-03', 'Не завершен', 12),
	(89, 'ыа', 'вываа', 'выа', 'авы', 'выавы', 'авы', 'авыа', 'выа', '2025-12-03', 'Не завершен', 2),
	(90, 'dsf', 'fsdf', 'fdsf', 'sdf', 'sdf', 'sd', 'sdff', 'dsfdsf', '2025-12-03', 'Завершен', 2),
	(91, 'adsf', 'asdf', 'af', 'asdf', 'fasdf', 'asdf', 'asdf', 'sadf', '2025-12-03', 'Завершен', 12),
	(92, 'ямыа', 'яыавы', 'аяываяыва', 'яываяыва', 'яыва', 'яываыяв', 'аяыва', 'ыяваяывав', '2025-12-03', 'Завершен', 2),
	(93, 'dfsgdsg', 'dsfgs', 'gsdfg', 'gfdsdf', 'sgs', 'gdsgs', 'sgdsg', 'sdsgdsgdfgdfs', '2025-12-03', 'Завершен', 12);

-- Дамп структуры для таблица site_structure.cartridge_stock
CREATE TABLE IF NOT EXISTS `cartridge_stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cartridge_name` varchar(255) DEFAULT NULL,
  `inventory_number` varchar(100) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.cartridge_stock: ~2 rows (приблизительно)
INSERT INTO `cartridge_stock` (`id`, `cartridge_name`, `inventory_number`, `quantity`) VALUES
	(48, '2', '3', 4),
	(49, '3333', '', 1);

-- Дамп структуры для таблица site_structure.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id_notification` int NOT NULL AUTO_INCREMENT,
  `request_type` enum('Картридж','Техника') DEFAULT NULL,
  `request_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_notification`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.notifications: ~0 rows (приблизительно)

-- Дамп структуры для таблица site_structure.printer_cartridge_compatibility
CREATE TABLE IF NOT EXISTS `printer_cartridge_compatibility` (
  `id` int NOT NULL AUTO_INCREMENT,
  `printer_name` varchar(255) DEFAULT NULL,
  `cartridge_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.printer_cartridge_compatibility: ~12 rows (приблизительно)
INSERT INTO `printer_cartridge_compatibility` (`id`, `printer_name`, `cartridge_name`) VALUES
	(77, '3213', '213'),
	(78, '3213', '213331'),
	(87, '2', '2'),
	(88, '3', '3'),
	(89, '4', '4'),
	(90, '5', '5'),
	(91, '6', '6'),
	(92, '7', '7'),
	(93, '8', '8'),
	(95, '2', '55'),
	(98, '13', '1'),
	(99, '1', '1');

-- Дамп структуры для таблица site_structure.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.settings: ~1 rows (приблизительно)
INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
	(1, 'recipient_name', 'К.А. Языков');

-- Дамп структуры для таблица site_structure.tech_disposals
CREATE TABLE IF NOT EXISTS `tech_disposals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tech_name` varchar(255) DEFAULT NULL,
  `inventory_number` varchar(100) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.tech_disposals: ~1 rows (приблизительно)
INSERT INTO `tech_disposals` (`id`, `tech_name`, `inventory_number`, `quantity`) VALUES
	(28, '211', '', 1),
	(32, '1', '2', 3),
	(33, 'Системный блок AMD ryzen 5 3600 OEM, RX 6600, 32gb RAM', '666', 123);

-- Дамп структуры для таблица site_structure.tech_requests
CREATE TABLE IF NOT EXISTS `tech_requests` (
  `id_request` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) DEFAULT NULL,
  `head_full_name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `inventory_number` varchar(100) DEFAULT NULL,
  `action_type` enum('Ремонт','Замена') DEFAULT NULL,
  `tech_name` varchar(255) DEFAULT NULL,
  `building_number` varchar(10) DEFAULT NULL,
  `room_number` varchar(10) DEFAULT NULL,
  `reason` text,
  `submission_date` date DEFAULT NULL,
  `status` enum('Завершен','Не завершен') DEFAULT 'Не завершен',
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id_request`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tech_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.tech_requests: ~0 rows (приблизительно)

-- Дамп структуры для таблица site_structure.tech_stock
CREATE TABLE IF NOT EXISTS `tech_stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tech_name` varchar(255) DEFAULT NULL,
  `inventory_number` varchar(100) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.tech_stock: ~2 rows (приблизительно)

-- Дамп структуры для таблица site_structure.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `log` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` enum('admin_ui','admin_sksis','admin_uvl','admin_st','admin_it','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `log` (`log`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы site_structure.users: ~3 rows (приблизительно)
INSERT INTO `users` (`id_user`, `log`, `pass`, `username`, `role`) VALUES
	(1, 'Admin', '1', 'Админ', 'admin_ui'),
	(2, 'Kovalsky', '2', 'Ковальски', 'admin_it'),
	(12, 'MITT', '31428', 'Факультет МИТТ', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
