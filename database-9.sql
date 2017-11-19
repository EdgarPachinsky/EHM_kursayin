-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 14 2017 г., 06:05
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_place` text NOT NULL,
  `product_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_description`, `product_place`, `product_price`) VALUES
(1, 2, 'prod 1', 'prod 1 text', 'prod 1 place ', 200),
(2, 3, 'prod 2', 'prod 2 text', 'prod 2 place', 200),
(3, 1, 'prod 3 ', 'prod 3 text', 'prod 3 place', 300),
(4, 6, 'prod 4', 'prod 4 text', 'prod 4 place', 500),
(5, 4, 'prod 5', 'prod 5 text', 'prod 5 place', 100),
(6, 5, 'prod 6', 'prod 6 text', 'prod 6 place', 900),
(7, 1, 'prod 6', 'prod 6 text', 'prod 6 place', 300),
(8, 1, 'some product', 'some product des', 'some product place', 300),
(9, 1, 'some product', 'some product', 'some product', 200),
(10, 1, 'some product', 'some product des', 'some product place', 300),
(11, 1, 'some product', 'some product', 'some product', 200),
(12, 1, 'some product', 'some product', 'some product', 22000),
(13, 1, 'some product', 'some product', 'some product', 52121),
(14, 1, 'some product', 'some product', 'some product', 22000),
(15, 1, 'some product', 'some product', 'some product', 52121),
(16, 1, 'some product', 'some product', 'some product', 22000),
(17, 1, 'some product', 'some product', 'some product', 52121),
(18, 1, 'some product', 'some product', 'some product', 22000),
(19, 1, 'some product', 'some product', 'some product', 52121),
(20, 1, 'some product', 'some product', 'some product', 22000),
(21, 1, 'some product', 'some product', 'some product', 52121),
(22, 1, 'some product', 'some product', 'some product', 22000),
(23, 1, 'some product', 'some product', 'some product', 52121),
(24, 1, 'some product', 'some product', 'some product', 22000),
(25, 1, 'some product', 'some product', 'some product', 52121),
(26, 1, 'some product', 'some product', 'some product', 22000),
(27, 1, 'some product', 'some product', 'some product', 52121),
(28, 1, 'some product', 'some product', 'some product', 22000),
(29, 1, 'some product', 'some product', 'some product', 52121),
(30, 1, 'some product', 'some product', 'some product', 22000),
(31, 1, 'some product', 'some product', 'some product', 52121),
(32, 1, 'some product', 'some product', 'some product', 22000),
(33, 1, 'some product', 'some product', 'some product', 52121),
(34, 1, 'some product', 'some product', 'some product', 22000),
(35, 1, 'some product', 'some product', 'some product', 52121),
(36, 1, 'some product', 'some product', 'some product', 22000),
(37, 1, 'some product', 'some product', 'some product', 52121),
(38, 1, 'some product', 'some product', 'some product', 22000),
(39, 1, 'some product', 'some product', 'some product', 52121),
(40, 1, 'some product', 'some product', 'some product', 22000),
(41, 1, 'some product', 'some product', 'some product', 52121),
(42, 1, 'some product', 'some product', 'some product', 22000),
(43, 1, 'some product', 'some product', 'some product', 52121),
(44, 1, 'some product', 'some product', 'some product', 22000),
(45, 1, 'some product', 'some product', 'some product', 52121),
(46, 1, 'some product', 'some product', 'some product', 22000),
(47, 1, 'some product', 'some product', 'some product', 52121),
(48, 1, 'some product', 'some product', 'some product', 22000),
(49, 1, 'some product', 'some product', 'some product', 52121),
(50, 1, 'some product', 'some product', 'some product', 22000),
(51, 1, 'some product', 'some product', 'some product', 52121),
(52, 1, 'some product', 'some product', 'some product', 22000),
(53, 1, 'some product', 'some product', 'some product', 52121),
(54, 1, 'some product', 'some product', 'some product', 22000),
(55, 1, 'some product', 'some product', 'some product', 52121),
(56, 1, 'some product', 'some product', 'some product', 22000),
(57, 1, 'some product', 'some product', 'some product', 52121),
(58, 1, 'some product', 'some product', 'some product', 22000),
(59, 1, 'some product', 'some product', 'some product', 52121),
(60, 1, 'some product', 'some product', 'some product', 22000),
(61, 1, 'some product', 'some product', 'some product', 52121),
(62, 1, 'some product', 'some product', 'some product', 22000),
(63, 1, 'some product', 'some product', 'some product', 52121),
(64, 1, 'some product', 'some product', 'some product', 22000),
(65, 1, 'some product', 'some product', 'some product', 52121),
(66, 1, 'some product', 'some product', 'some product', 22000),
(67, 1, 'some product', 'some product', 'some product', 52121),
(68, 1, 'some product', 'some product', 'some product', 22000),
(69, 1, 'some product', 'some product', 'some product', 52121),
(70, 1, 'some product', 'some product', 'some product', 22000),
(71, 1, 'some product', 'some product', 'some product', 52121),
(72, 1, 'some product', 'some product', 'some product', 22000),
(73, 1, 'some product', 'some product', 'some product', 52121),
(74, 1, 'some product', 'some product', 'some product', 22000),
(75, 1, 'some product', 'some product', 'some product', 52121),
(76, 1, 'some product', 'some product', 'some product', 22000),
(77, 1, 'some product', 'some product', 'some product', 52121),
(78, 1, 'some product', 'some product', 'some product', 22000),
(79, 1, 'some product', 'some product', 'some product', 52121),
(80, 1, 'some product', 'some product', 'some product', 22000),
(81, 1, 'some product', 'some product', 'some product', 52121),
(82, 1, 'some product', 'some product', 'some product', 22000),
(83, 1, 'some product', 'some product', 'some product', 52121),
(84, 1, 'some product', 'some product', 'some product', 22000),
(85, 1, 'some product', 'some product', 'some product', 52121),
(86, 1, 'some product', 'some product', 'some product', 22000),
(87, 1, 'some product', 'some product', 'some product', 52121),
(88, 1, 'some product', 'some product', 'some product', 22000),
(89, 1, 'some product', 'some product', 'some product', 52121),
(90, 1, 'some product', 'some product', 'some product', 22000),
(91, 1, 'some product', 'some product', 'some product', 52121),
(92, 1, 'some product', 'some product', 'some product', 22000),
(93, 1, 'some product', 'some product', 'some product', 52121),
(94, 1, 'some product', 'some product', 'some product', 22000),
(95, 1, 'some product', 'some product', 'some product', 52121),
(96, 1, 'some product', 'some product', 'some product', 22000),
(97, 1, 'some product', 'some product', 'some product', 52121),
(98, 1, 'some product', 'some product', 'some product', 22000),
(99, 1, 'some product', 'some product', 'some product', 52121),
(100, 1, 'some product', 'some product', 'some product', 22000),
(101, 1, 'some product', 'some product', 'some product', 52121),
(102, 1, 'some product', 'some product', 'some product', 22000),
(103, 1, 'some product', 'some product', 'some product', 52121),
(104, 1, 'some product', 'some product', 'some product', 22000),
(105, 1, 'some product', 'some product', 'some product', 52121),
(106, 1, 'some product', 'some product', 'some product', 22000),
(107, 1, 'some product', 'some product', 'some product', 52121),
(108, 1, 'some product', 'some product', 'some product', 22000),
(109, 1, 'some product', 'some product', 'some product', 52121),
(110, 1, 'some product', 'some product', 'some product', 22000),
(111, 1, 'some product', 'some product', 'some product', 52121),
(112, 1, 'some product', 'some product', 'some product', 22000),
(113, 1, 'some product', 'some product', 'some product', 52121),
(114, 1, 'some product', 'some product', 'some product', 22000),
(115, 1, 'some product', 'some product', 'some product', 52121),
(116, 1, 'some product', 'some product', 'some product', 22000),
(117, 1, 'some product', 'some product', 'some product', 52121),
(118, 1, 'some product', 'some product', 'some product', 22000),
(119, 1, 'some product', 'some product', 'some product', 52121),
(120, 1, 'some product', 'some product', 'some product', 22000),
(121, 1, 'some product', 'some product', 'some product', 52121),
(122, 1, 'some product', 'some product', 'some product', 22000),
(123, 1, 'some product', 'some product', 'some product', 52121),
(124, 1, 'some product', 'some product', 'some product', 22000),
(125, 1, 'some product', 'some product', 'some product', 52121),
(126, 1, 'some product', 'some product', 'some product', 22000),
(127, 1, 'some product', 'some product', 'some product', 52121),
(128, 1, 'some product', 'some product', 'some product', 22000),
(129, 1, 'some product', 'some product', 'some product', 52121),
(130, 1, 'some product', 'some product', 'some product', 22000),
(131, 1, 'some product', 'some product', 'some product', 52121),
(132, 1, 'some product', 'some product', 'some product', 22000),
(133, 1, 'some product', 'some product', 'some product', 52121),
(134, 2, 'some prod', 'some prod', 'some prod', 1100),
(135, 2, 'some prod', 'some prod', 'some prod description', 54641),
(136, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(137, 2, 'some prod', 'some prod', 'some prod description', 54641),
(138, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(139, 2, 'some prod', 'some prod', 'some prod description', 54641),
(140, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(141, 2, 'some prod', 'some prod', 'some prod description', 54641),
(142, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(143, 2, 'some prod', 'some prod', 'some prod description', 54641),
(144, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(145, 2, 'some prod', 'some prod', 'some prod description', 54641),
(146, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(147, 2, 'some prod', 'some prod', 'some prod description', 54641),
(148, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(149, 2, 'some prod', 'some prod', 'some prod description', 54641),
(150, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(151, 2, 'some prod', 'some prod', 'some prod description', 54641),
(152, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(153, 2, 'some prod', 'some prod', 'some prod description', 54641),
(154, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(155, 2, 'some prod', 'some prod', 'some prod description', 54641),
(156, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(157, 2, 'some prod', 'some prod', 'some prod description', 54641),
(158, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(159, 2, 'some prod', 'some prod', 'some prod description', 54641),
(160, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(161, 2, 'some prod', 'some prod', 'some prod description', 54641),
(162, 2, 'henc esa some prod', 'some prod', 'some prod', 1100),
(163, 2, 'some prod', 'some prod', 'some prod description', 54641),
(164, 2, 'henc esa vor man es gali some prod', 'some prod', 'some prod', 1100),
(165, 2, 'some prod', 'some prod', 'some prod description', 546411),
(166, 5, 'erkar anun vor karoxa shat erkar lini', 'description erkar description vor karoxa shat erkar linierkar description vor karoxa shat erkar\r\n', 'tex eli erkar tex eli erkar tex elierkar tex eli erkar tex eli erkar tex eli erkar tex eli erkar', 555555),
(167, 5, 'erkar anun vor karoxa shat erkar lini', 'description erkar description vor karoxa shat erkar linierkar description vor karoxa shat erkar linierkar ', 'tex eli erkar tex eli erkar tex eli erkar tex eli erkar tex eli erkar tex eli erkar ', 555555);

-- --------------------------------------------------------

--
-- Структура таблицы `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `product_category_name` varchar(255) NOT NULL,
  `product_category_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_category_name`, `product_category_description`) VALUES
(1, 'category 1', 'category 1 des'),
(2, 'category 2', 'category 2 des'),
(3, 'category 3', 'category 3 des'),
(4, 'category 4', 'category 4 des'),
(5, 'category 5', 'category 5 des'),
(6, 'category 6', 'category 6 des');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT для таблицы `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
