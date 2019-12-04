-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 18 2017 г., 12:00
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop-test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category_products`
--

CREATE TABLE `category_products` (
  `id` int(30) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_products`
--

INSERT INTO `category_products` (`id`, `title`) VALUES
(1, 'Категория 1'),
(2, 'Категория 2'),
(3, 'Категория 3'),
(4, 'Категория 4');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `mark` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_catalog` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `mark`, `description`, `id_catalog`) VALUES
(1, 'Товар 1', 110, 'отмечено', 'Описание товара', 1),
(2, 'Товар 2', 220, 'отмечено', 'Описание товара', 1),
(3, 'Товар 1', 110, 'отмечено', 'Описание товара', 1),
(4, 'Товар 2', 220, 'отмечено', 'Описание товара', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_catalog` (`id_catalog`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
