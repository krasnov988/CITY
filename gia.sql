-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 25 2025 г., 10:58
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gia`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id_application` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `name_application` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_application` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `after_file_application` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_application` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_application` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cancellation_reason` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id_application`, `id_user`, `id_category`, `name_application`, `file_application`, `after_file_application`, `text_application`, `date_application`, `status`, `cancellation_reason`) VALUES
(8, 1, 2, 'test', '../img/1739714287.png', '1739868343.jpeg', 'test', '2025-02-16', 2, ''),
(10, 1, 1, 'test', '1739714435.png', '1739868343.jpeg', 'test', '2025-02-16', 2, NULL),
(11, 1, 1, 'test', '1739714435.png', '1739868343.jpeg', 'test', '2025-02-16', 2, NULL),
(12, 1, 1, 'test', '1739714435.png', '1739868343.jpeg', 'test', '2025-02-16', 2, NULL),
(15, 1, 1, '2dqdwedewd', '1739869406.png', '1739869676.png', 'wedwedew', '2025-02-18', 2, ''),
(16, 1, NULL, 'wedwed', '1739869481.gif', NULL, 'wedewd', '2025-02-18', 3, 'нам лень работать');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(1, 'ЖКХ'),
(2, 'Дорожные службы'),
(3, 'Пожарные');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `fio`, `login`, `email`, `password`, `role`) VALUES
(1, 'Краснов Андрей Глебович', 'andrew', 'andry.k2005@mail.ru', '123123', 1),
(2, 'Миша Мороз', 'admin', '123123@йцуйц.qwe', '123123', 2),
(3, 'Хнум Хнумов Хнумович', 'andrew2', 'ruaknmo.77@gmail.com', '123', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id_application`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id_application` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
