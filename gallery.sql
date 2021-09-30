-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Сен 30 2021 г., 14:01
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `img_name` varchar(256) NOT NULL,
  `img_address` varchar(256) NOT NULL,
  `small_img_address` varchar(256) NOT NULL,
  `img_size` varchar(256) NOT NULL,
  `views_count` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `img_name`, `img_address`, `small_img_address`, `img_size`, `views_count`) VALUES
(1, '000001.jpg', '/gallery_img/big', '/gallery_img/small', '40KB', 6),
(2, '000002.jpg', '/gallery_img/big', '/gallery_img/small', '50KB', 20),
(3, '000003.jpg', '/gallery_img/big', '/gallery_img/small', '90KB', 4),
(4, '000004.jpg', '/gallery_img/big', '/gallery_img/small', '100KB', 5),
(5, '000005.jpg', '/gallery_img/big', '/gallery_img/small', '10KB', 3),
(6, '000006.jpg', '/gallery_img/big', '/gallery_img/small', '15KB', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
