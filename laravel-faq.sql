-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 30 2017 г., 19:26
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel-faq`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL,
  `answer_text` text NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `answer_text`, `user_id`, `question_id`, `created_at`, `updated_at`) VALUES
(6, 'Уже лет 10 почта работает и в выходные дни.', 9, 26, '2017-09-29 01:33:04', '2017-09-29 01:33:04'),
(7, 'В судебном порядке', 9, 22, '2017-09-29 01:34:06', '2017-09-29 01:34:06'),
(8, 'Согласно прайса.', 9, 20, '2017-09-29 01:54:42', '2017-09-29 01:54:42'),
(9, 'Понедельник-пятница с 8.00 до 17.00', 9, 25, '2017-09-29 01:55:40', '2017-09-29 01:55:40'),
(11, 'sdfsdfdfdf', 9, 27, '2017-09-29 06:17:15', '2017-09-29 06:17:15'),
(13, 'sdfsdfsdfsdf', 9, 36, '2017-09-29 16:36:30', '2017-09-29 16:36:30'),
(14, 'werwrwerwer', 9, 30, '2017-09-30 02:28:11', '2017-09-30 02:28:11'),
(15, 'werwrwerwer', 9, 30, '2017-09-30 02:34:39', '2017-09-30 02:34:39'),
(16, 'ertertertet', 9, 30, '2017-09-30 02:37:04', '2017-09-30 02:37:04'),
(17, 'ertertertet', 9, 30, '2017-09-30 02:37:37', '2017-09-30 02:37:37'),
(18, 'ertertertet', 9, 30, '2017-09-30 02:45:14', '2017-09-30 02:45:14'),
(19, 'ertertertet', 9, 30, '2017-09-30 02:46:18', '2017-09-30 02:46:18'),
(20, 'ertertertet', 9, 30, '2017-09-30 02:46:43', '2017-09-30 02:46:43'),
(21, 'qweqweqweqweqe', 9, 30, '2017-09-30 03:01:21', '2017-09-30 03:01:21'),
(22, 'qweqweqweqweqe', 9, 30, '2017-09-30 03:01:28', '2017-09-30 03:01:28'),
(23, 'asdasdsds', 9, 30, '2017-09-30 03:04:19', '2017-09-30 03:04:19'),
(24, 'asdasdsds', 9, 30, '2017-09-30 03:05:06', '2017-09-30 03:05:06'),
(25, 'три месяца', 9, 31, '2017-09-30 08:30:52', '2017-09-30 08:30:52'),
(26, 'фыфывфывфыв', 9, 37, '2017-09-30 08:52:30', '2017-09-30 08:52:30'),
(27, 'adasdasdsd', 9, 38, '2017-09-30 11:31:43', '2017-09-30 11:31:43'),
(28, 'qwe', 9, 14, '2017-09-30 11:35:09', '2017-09-30 11:35:09');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Общие вопросы текущего раздела', NULL, '2017-09-24 06:42:18'),
(2, 'Правовые вопросы ЖКХ', NULL, NULL),
(4, 'Начисления за ОДН', NULL, NULL),
(5, 'Тестовые вопросы', '2017-09-24 06:19:09', '2017-09-29 01:56:02');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_14_170452_create_sessions_table', 1),
(4, '2017_08_17_132458_create_questions_table', 2),
(5, '2017_08_17_132927_create_categories_table', 2),
(6, '2017_08_18_143835_create_questions_table', 3),
(7, '2017_08_18_165131_create_answers_table', 4),
(8, '2017_09_05_192747_add_userinfo_questions_table', 5),
(9, '2017_09_28_191042_add_foreign_to_answers_table', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `description`, `status`, `category_id`, `created_at`, `updated_at`, `username`, `email`) VALUES
(14, 'Скрытый вопрос: Как формируется резервный фонд?', 1, 4, '2017-09-03 20:00:00', '2017-09-30 11:35:09', 'advisor', 'ad@mail.ru'),
(20, 'Почем услуги юриста в РФ?', 1, 4, '2017-09-24 12:04:59', '2017-09-29 16:28:06', 'Алиса', 'sds@mail.ru'),
(22, 'Как оспорить расчет услуг за ОДН?', 1, 4, '2017-09-24 12:08:48', '2017-09-29 16:27:12', 'Сергей', 'serg@mail.ru'),
(23, 'Можно ли в течение трех месяцев погасить задолженность без пени?', 0, 4, '2017-09-24 12:15:00', '2017-09-30 11:40:56', 'Михаил', 'stf@as.as'),
(25, 'Каков график приема посетителей?', 2, 1, '2017-09-28 15:34:46', '2017-09-29 16:42:56', 'zoya', 'stdd01@mail.ru'),
(26, 'Почему не работает почта по выходным?', 2, 5, '2017-09-28 15:58:24', '2017-09-29 01:53:08', 'zoya', 'stdd01@mail.ru'),
(27, 'Тестовый вопрос', 2, 1, '2017-09-29 03:37:38', '2017-09-30 12:15:41', 'admin', 'admin@gmail.com'),
(30, 'Можно ли оставить в правовых вопросах', 1, 1, '2017-09-29 03:47:35', '2017-09-30 12:11:27', 'qwe', 'qw@a.ti'),
(31, 'Каковы сроки внесения платежа?', 1, 4, '2017-09-29 03:55:37', '2017-09-30 08:30:52', 'sdfsdfsdf', 'qw@a.ti'),
(36, 'sfsdsdfsdfsdf', 1, 2, '2017-09-29 16:36:08', '2017-09-30 09:02:02', 'admin', 'admin@gmail.com'),
(37, 'ываываываыва', 1, 2, '2017-09-30 08:52:20', '2017-09-30 11:32:35', 'admin', 'admin@gmail.com'),
(38, 'asdasdsadasdas', 1, 2, '2017-09-30 11:28:52', '2017-09-30 11:31:43', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'admin', 'admin@gmail.com', 'admin', NULL, '2017-09-26 14:37:46', '2017-09-29 02:00:16'),
(10, 'maria', 'maria@mail.ru', 'asdasd', NULL, '2017-09-29 01:57:03', '2017-09-29 06:12:32'),
(11, 'adad', 'as@asd.ru', 'admin', NULL, '2017-09-29 05:59:07', '2017-09-29 06:01:16'),
(12, 'Иван', 'gdg@fgfdg.ru', '123546', NULL, '2017-09-29 06:15:55', '2017-09-29 06:16:12'),
(13, 'Иван', 'ivan@mail.ru', 'qwery', NULL, '2017-09-29 13:50:11', '2017-09-29 13:50:11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_index` (`question_id`),
  ADD KEY `answers_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_name_index` (`name`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_status_index` (`status`),
  ADD KEY `questions_category_id_index` (`category_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
