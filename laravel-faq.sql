-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 25 2017 г., 01:11
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `answer_text`, `user_id`, `question_id`, `created_at`, `updated_at`) VALUES
(5, 'Пунктом 1 части 1 статьи 167 Жилищного кодекса Российской Федерации установление минимального размера взноса на капитальный ремонт общего имущества в многоквартирном доме отнесено к компетенции органов государственной власти субъекта Российской Федерации.\r\n\r\nМетодические рекомендации по установлению минимального размера взноса на капитальный ремонт утверждены приказом Министерства строительства и жилищно-коммунального хозяйства Российской Федерации от 27.06.2016 № 454/пр «Об утверждении методических рекомендаций по установлению минимального размера взноса на капитальный ремонт».\r\n\r\nВ соответствии с частью 1 статьи 5 Закона Московской области от 01.07.2013 № 66/2013-ОЗ «Об организации проведения капитального ремонта общего имущества в многоквартирных домах, расположенных на территории Московской области» минимальный размер взноса определяется на основе оценки общей потребности в средствах на финансирование услуг и (или) работ по капитальному ремонту общего имущества в многоквартирных домах, входящих в установленный перечень услуг и работ по капитальному ремонту и необходимых для восстановления соответствующих требованиям безопасности проектных значений параметров и других характеристик строительных конструкций и систем инженерно-технического обеспечения многоквартирных домов.\r\n\r\nМинимальный размер взноса на капитальный ремонт общего имущества многоквартирных домов, расположенных на территории Московской области, установлен на 2017 год постановлением Правительства Московской область от 28.06.2016 № 502/21 «О минимальном размере взноса на капитальный ремонт общего имущества многоквартирных домов, расположенных на территории Московской области, на 2017 год» в размере 8 (восемь) рублей 65 копеек в месяц на один квадратный метр общей площади помещения в многоквартирном доме, принадлежащего собственнику такого помещения.', 2, 14, '2017-09-03 20:00:00', '2017-09-03 20:00:00'),
(7, 'Не знаю.', 1, 17, '2017-09-24 06:18:14', '2017-09-24 06:18:14'),
(8, 'Согласно действующим нормам РФ', 1, 19, '2017-09-24 06:42:41', '2017-09-24 15:25:04'),
(9, 'В соответствии с законодательством РФ.', 1, 16, '2017-09-24 14:41:14', '2017-09-24 14:41:14'),
(10, 'Вы можете обратиться к запросом к депутату Законодательного собрания по Вашему округу.', 1, 22, '2017-09-24 14:43:38', '2017-09-24 14:43:38'),
(11, 'В соответствии с прайсом.', 1, 20, '2017-09-24 14:48:37', '2017-09-24 14:48:37'),
(12, 'Нет, нельзя.', 1, 23, '2017-09-24 15:27:49', '2017-09-24 15:27:49'),
(13, 'Дорого.', 1, 21, '2017-09-24 16:16:07', '2017-09-24 16:16:07');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Общие вопросы текущего раздела', NULL, '2017-09-24 06:42:18'),
(2, 'Правовые вопросы ЖКХ', NULL, NULL),
(4, 'Начисления за ОДН', NULL, NULL),
(5, 'Абракадабра', '2017-09-24 06:19:09', '2017-09-24 06:19:09');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
(8, '2017_09_05_192747_add_userinfo_questions_table', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `description`, `status`, `category_id`, `created_at`, `updated_at`, `username`, `email`) VALUES
(3, 'Как оплачивать расходы на общедомовые нужды?', 0, 4, '2017-08-09 05:25:06', '2017-09-23 09:31:23', 'Анна', 'ann@bk.ru'),
(14, 'Скрытый вопрос: Как формируется резервный фонд?', 1, 4, '2017-09-03 20:00:00', '2017-09-24 16:50:19', 'advisor', 'ad@mail.ru'),
(16, 'Какова процедура ликвидации ТСЖ?', 1, 2, '2017-09-23 15:32:53', '2017-09-24 14:47:35', 'Сергей', 'serg@mail.ru'),
(17, 'Каковы тарифы на электроэнергию с 01.07.2017?', 1, 2, '2017-09-23 15:35:29', '2017-09-24 14:38:49', 'Анна', 'ann@bk.ru'),
(19, 'Сроки рассмотрения заявлений?', 2, 1, '2017-09-24 06:41:55', '2017-09-24 14:35:02', 'admin', 'admin@gmail.com'),
(20, 'Почем услуги юриста?', 2, 2, '2017-09-24 12:04:59', '2017-09-24 14:48:43', 'Алиса', 'sds@mail.ru'),
(21, 'Сколько стоят услуги юриста?', 1, 2, '2017-09-24 12:07:16', '2017-09-24 16:16:13', 'Алиса', 'alice@list.ru'),
(22, 'Как оспорить расчет услуг за ОДН?', 2, 4, '2017-09-24 12:08:48', '2017-09-24 16:49:41', 'Сергей', 'serg@mail.ru'),
(23, 'Можно ли в течение трех месяцев погасить задолженность без пени?', 1, 2, '2017-09-24 12:15:00', '2017-09-24 16:50:51', 'Михаил', 'stf@as.as');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '8b9c5c1d95d5e59551e0cc97103eeb23', NULL, NULL, NULL),
(4, 'adminer', 'adminer@mail.ru', 'e4171558543da00d498545fc4e702b7e', NULL, '2017-08-20 13:25:29', '2017-09-24 17:31:57'),
(5, 'Иван', 'van@mail.ru', 'van', NULL, '2017-09-23 13:11:02', '2017-09-23 13:11:02'),
(6, 'nadya', 'nadya@mail.ru', 'nadya', NULL, '2017-09-24 16:51:57', '2017-09-24 16:51:57');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_index` (`question_id`);

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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
