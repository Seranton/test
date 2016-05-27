-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 27 2016 г., 11:10
-- Версия сервера: 10.1.10-MariaDB
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `justcoded`
--

-- --------------------------------------------------------

--
-- Структура таблицы `just_category`
--

CREATE TABLE `just_category` (
  `id` int(11) NOT NULL,
  `label` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `just_category`
--

INSERT INTO `just_category` (`id`, `label`, `parent_id`) VALUES
(7, 'Машины', NULL),
(8, 'Легковые', 7),
(9, 'Грузовые', 7),
(10, 'до 2х тонн', 9),
(11, 'до 10и тонн', 9),
(12, 'свыше 10и тонн', 9),
(13, 'Лимузины', NULL),
(14, '4х дверные', 13),
(15, '6и дверные', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `just_item`
--

CREATE TABLE `just_item` (
  `id` int(11) NOT NULL,
  `label` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL COMMENT 'Название товара',
  `quantity` int(11) DEFAULT '0' COMMENT 'Количество'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `just_item`
--

INSERT INTO `just_item` (`id`, `label`, `quantity`) VALUES
(1, 'Анто-Рус', 12),
(2, 'Богдан ', 4),
(3, 'КРАЗ', 7),
(4, 'Эталон', 3),
(5, 'Эталон-Люкс', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `just_item_category`
--

CREATE TABLE `just_item_category` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL COMMENT 'Товар',
  `category_id` int(11) NOT NULL COMMENT 'Категория'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Дамп данных таблицы `just_item_category`
--

INSERT INTO `just_item_category` (`id`, `item_id`, `category_id`) VALUES
(2, 2, 8),
(6, 2, 14),
(7, 4, 11),
(8, 4, 9),
(29, 1, 8),
(58, 3, 10),
(59, 3, 9),
(60, 3, 13),
(61, 3, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `just_item_discount`
--

CREATE TABLE `just_item_discount` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL COMMENT 'Товар',
  `first_condition` int(11) DEFAULT '0' COMMENT 'Количество больше',
  `second_condition` int(11) DEFAULT '100' COMMENT 'Количество меньше',
  `discount` float DEFAULT '0' COMMENT 'Скидка'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Дамп данных таблицы `just_item_discount`
--

INSERT INTO `just_item_discount` (`id`, `item_id`, `first_condition`, `second_condition`, `discount`) VALUES
(1, 4, 2, 6, 12),
(2, 1, 3, 12, 18),
(3, 1, 20, 40, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `just_item_image`
--

CREATE TABLE `just_item_image` (
  `id` int(11) NOT NULL,
  `url` varchar(200) COLLATE utf16_bin DEFAULT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Дамп данных таблицы `just_item_image`
--

INSERT INTO `just_item_image` (`id`, `url`, `item_id`) VALUES
(11, 'img/5_22765043[1].jpg', 5),
(12, 'img/1_2247[1].jpg', 1),
(13, 'img/1_19408929_w640_h640_ovoe_steklo_haz_anton_3250[1].jpg', 1),
(14, 'img/3_300px-790th_Fighter_Order_of_Kutuzov_3rd_class_Aviation_Regiment,_Khotilovo_airbase_(356-28)[1].jpg', 3),
(15, 'img/3_1255236893_xsDQcbv-M[1].jpg', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `just_category`
--
ALTER TABLE `just_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `just_item`
--
ALTER TABLE `just_item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `just_item_category`
--
ALTER TABLE `just_item_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `just_item_discount`
--
ALTER TABLE `just_item_discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Индексы таблицы `just_item_image`
--
ALTER TABLE `just_item_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `just_category`
--
ALTER TABLE `just_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `just_item`
--
ALTER TABLE `just_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `just_item_category`
--
ALTER TABLE `just_item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT для таблицы `just_item_discount`
--
ALTER TABLE `just_item_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `just_item_image`
--
ALTER TABLE `just_item_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `just_category`
--
ALTER TABLE `just_category`
  ADD CONSTRAINT `just_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `just_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `just_item_category`
--
ALTER TABLE `just_item_category`
  ADD CONSTRAINT `just_item_category_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `just_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `just_item_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `just_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `just_item_image`
--
ALTER TABLE `just_item_image`
  ADD CONSTRAINT `just_item_image_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `just_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
