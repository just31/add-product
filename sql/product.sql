-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 25 2015 г., 12:42
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `product`
--

-- --------------------------------------------------------

--
-- Структура таблицы `add_product`
--

CREATE TABLE IF NOT EXISTS `add_product` (
  `product_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET cp1251 NOT NULL,
  `number` float NOT NULL DEFAULT '0',
  `cost` float NOT NULL DEFAULT '0',
  `more_information` text CHARACTER SET cp1251 NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Дамп данных таблицы `add_product`
--

INSERT INTO `add_product` (`product_id`, `name`, `number`, `cost`, `more_information`, `url`) VALUES
(46, 'Картофель', 5, 25, 'Молодой картофель.', 'upload/2015-08-24_3349.jpg'),
(47, 'Яблоки', 5, 70, 'Нового урожая.', 'upload/2015-08-24_5841.jpg'),
(51, 'Морковь', 10, 70, 'Сладкая морковь.', 'upload/2015-08-25_9484.jpg'),
(52, 'Капуста', 20, 40, 'Капуста белокачанная.', 'upload/2015-08-25_4933.jpg'),
(53, 'Молоко', 5, 25, 'Натуральное коровье молоко!:)', 'upload/2015-08-25_8263.jpg'),
(54, 'Мед', 12, 300, 'Лечебный, липовый мед.', 'upload/2015-08-25_1458.jpg'),
(76, 'Сосиски дубки', 3, 290.3, 'Сосиски производство Дубки', ''),
(77, 'Сосиски сливочные', 4.5, 320.9, 'Сливочные сосиски', 'upload/2015-08-25_1551.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
