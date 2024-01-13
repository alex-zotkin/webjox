-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.30 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп структуры для таблица webjox.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы webjox.categories: ~3 rows (приблизительно)
INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Mr. Kiel O\'Hara', 'Описание для категории!', '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(2, 'Dr. Heaven VonRueden', 'Описание для категории!', '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(3, 'Maxie Schulist', 'Описание для категории!', '2024-01-13 09:12:22', '2024-01-13 09:12:22');

-- Дамп структуры для таблица webjox.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы webjox.migrations: ~0 rows (приблизительно)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(26, '2014_10_12_000000_create_users_table', 1),
	(27, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(28, '2024_01_12_130836_create_posts_table', 1),
	(29, '2024_01_12_130860_create_categories_table', 1),
	(30, '2024_01_12_130921_create_post_category_table', 1);

-- Дамп структуры для таблица webjox.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы webjox.personal_access_tokens: ~0 rows (приблизительно)

-- Дамп структуры для таблица webjox.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы webjox.posts: ~10 rows (приблизительно)
INSERT INTO `posts` (`id`, `title`, `text`, `image`, `isActive`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Пост Marianna Koepp', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(2, 'Пост Amelia Wiegand', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(3, 'Пост Prof. Charles Mueller', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 0, 1, '2024-01-13 09:12:22', '2024-01-13 09:13:01'),
	(4, 'Пост Miss Micaela Bartoletti', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(5, 'Пост Clifton Jerde', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(6, 'Пост Carmen Goldner', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(7, 'Пост Dolly Murphy', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(8, 'Пост Adrienne Eichmann III', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(9, 'Пост Dr. Devonte Yundt II', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(10, 'Пост Adelbert Von', 'Большой фейковый текст длинного поста!', 'postimg.jpg', 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22');

-- Дамп структуры для таблица webjox.post_category
CREATE TABLE IF NOT EXISTS `post_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы webjox.post_category: ~20 rows (приблизительно)
INSERT INTO `post_category` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(2, 9, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(3, 10, 3, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(4, 1, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(5, 3, 3, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(6, 10, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(7, 5, 2, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(8, 5, 3, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(9, 3, 2, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(10, 10, 2, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(11, 7, 3, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(12, 2, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(13, 2, 3, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(14, 2, 3, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(15, 10, 2, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(16, 7, 1, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(17, 6, 2, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(18, 8, 2, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(19, 3, 3, '2024-01-13 09:12:22', '2024-01-13 09:12:22'),
	(20, 4, 2, '2024-01-13 09:12:22', '2024-01-13 09:12:22');

-- Дамп структуры для таблица webjox.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы webjox.users: ~0 rows (приблизительно)
INSERT INTO `users` (`id`, `email`, `password`, `isAdmin`, `created_at`, `updated_at`) VALUES
	(1, 'admin@mail.ru', '$2y$12$lcCYzZ/3p/ohjZubDZOkveUFcDzgA0CxzE84TaNxhsRUMNRFSfCfG', 0, '2024-01-13 09:12:22', '2024-01-13 09:12:55');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
