-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 22 2017 г., 12:46
-- Версия сервера: 10.1.29-MariaDB
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders_table`
--

CREATE TABLE `orders_table` (
  `id` int(11) NOT NULL,
  `fio` varchar(200) NOT NULL,
  `number` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `products_list` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_table`
--

INSERT INTO `orders_table` (`id`, `fio`, `number`, `address`, `products_list`, `status`, `date`, `user_id`) VALUES
(18, 'ÐŸÐµÑ‚Ñ€', '8977-345-91-85', 'Ð³.Ð“ÑƒÐ±ÐºÐ¸Ð½, ÑƒÐ».Ð˜Ð½Ð¾Ñ…Ð¾Ð´Ñ†ÐµÐ²Ð° 163Ð', '48:4,49:1', 'wait', '2017-12-21 18:15:39', 5),
(19, 'ÐÐ»ÐµÐºÑÐ°Ð½Ð´Ñ€', '89773459185', 'ÑƒÐ».Ð˜Ð½Ð¾Ñ…Ð¾Ð´Ñ†ÐµÐ²Ð° 163Ð°', '35:3,49:4,50:1', 'done', '2017-12-21 18:20:00', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `products_table`
--

CREATE TABLE `products_table` (
  `id` int(11) NOT NULL,
  `name_mini` text NOT NULL,
  `name_full` text NOT NULL,
  `path_mini` varchar(200) NOT NULL,
  `path_full` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `see_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_table`
--

INSERT INTO `products_table` (`id`, `name_mini`, `name_full`, `path_mini`, `path_full`, `description`, `price`, `see_counter`) VALUES
(35, 'Ð¢Ð¾Ð²Ð°Ñ€ Ð½Ð¾Ð¼ÐµÑ€ 1', 'ÐŸÐ¾Ð»Ð½Ð¾Ðµ Ð½Ð°Ð·Ð²Ð°Ð½Ð¸Ðµ Ñ‚Ð¾Ð²Ð°Ñ€Ð° Ð½Ð¾Ð¼ÐµÑ€ 1', 'img/product/35/mini.17.jpg', 'img/product/35/17.jpg', 'ÐžÐ¿Ð¸ÑÐ°Ð½Ð¸Ðµ Ñ‚Ð¾Ð²Ð°Ñ€Ð° Ð½Ð¾Ð¼ÐµÑ€ 1', 768, 0),
(48, 'Ð¢Ð¾Ð²Ð°Ñ€ Ð½Ð¾Ð¼ÐµÑ€ 2', 'ÐŸÐ¾Ð»Ð½Ð¾Ðµ Ð½Ð°Ð·Ð²Ð°Ð½Ð¸Ðµ Ñ‚Ð¾Ð²Ð°Ñ€Ð° Ð½Ð¾Ð¼ÐµÑ€ 2', 'img/product/48/mini.4.jpg', 'img/product/48/4.jpg', 'ÐžÐ¿Ð¸ÑÐ°Ð½Ð¸Ðµ Ñ‚Ð¾Ð²Ð°Ñ€Ð° Ð½Ð¾Ð¼ÐµÑ€ 2', 233, 0),
(49, 'Ð¢Ð¾Ð²Ð°Ñ€ Ð½Ð¾Ð¼ÐµÑ€ 3', 'ÐŸÐ¾Ð»Ð½Ð¾Ðµ Ð½Ð°Ð·Ð²Ð°Ð½Ð¸Ðµ Ñ‚Ð¾Ð²Ð°Ñ€Ð° Ð½Ð¾Ð¼ÐµÑ€ 3', 'img/product/49/mini.5.jpg', 'img/product/49/5.jpg', 'ÐžÐ¿Ð¸ÑÐ°Ð½Ð¸Ðµ Ñ‚Ð¾Ð²Ð°Ñ€Ð° Ð½Ð¾Ð¼ÐµÑ€ 3', 432, 0),
(50, 'Ð¢Ð¾Ð²Ð°Ñ€ Ð½Ð¾Ð¼ÐµÑ€ 4', 'ÐŸÐ¾Ð»Ð½Ð¾Ðµ Ð½Ð°Ð·Ð²Ð°Ð½Ð¸Ðµ Ñ‚Ð¾Ð²Ð°Ñ€Ð° Ð½Ð¾Ð¼ÐµÑ€ 4', 'img/product/50/mini.10.jpg', 'img/product/50/10.jpg', 'ÐžÐ¿Ð¸ÑÐ°Ð½Ð¸Ðµ Ñ‚Ð¾Ð²Ð°Ñ€Ð° Ð½Ð¾Ð¼ÐµÑ€ 4', 877, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews_table`
--

CREATE TABLE `reviews_table` (
  `id` int(11) NOT NULL,
  `rev_name` varchar(100) NOT NULL,
  `rev_mail` varchar(100) NOT NULL,
  `rev_text` text NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews_table`
--

INSERT INTO `reviews_table` (`id`, `rev_name`, `rev_mail`, `rev_text`, `id_product`) VALUES
(8, 'Ð”Ð¼Ð¸Ñ‚Ñ€Ð¸Ð¹', 'jgjf@kfgg.ru', 'ÐžÑ‚Ð»Ð¸Ñ‡Ð½Ñ‹Ð¹ Ñ‚Ð¾Ð²Ð°Ñ€, Ð½Ñ€Ð°Ð²Ð¸Ñ‚ÑÑ, ÐºÐ°Ð¿ÐµÑ†', 13),
(9, 'Ð”Ð¸Ð¼Ð¾Ð½', 'hdgb@olg.ru', 'Ð¢ÐµÐºÑÑ‚ Ð¾Ñ‚Ð·Ñ‹Ð²Ð°', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `privelege` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_table`
--

INSERT INTO `users_table` (`id`, `user_email`, `user_password`, `privelege`) VALUES
(1, 'alvcode@ya.ru', 'bf3c0a8c266d4a9752936ee88a99921a', 1),
(2, 'nnn@log.ink', '88f0860257ba6bdc089557444f5cdd16', 3),
(3, 'jik@kil.ru', 'eb9279982226a42afdf2860dbdc29b45', 3),
(4, 'login@login.ru', '202cb962ac59075b964b07152d234b70', 3),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders_table`
--
ALTER TABLE `orders_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews_table`
--
ALTER TABLE `reviews_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders_table`
--
ALTER TABLE `orders_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `products_table`
--
ALTER TABLE `products_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `reviews_table`
--
ALTER TABLE `reviews_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
