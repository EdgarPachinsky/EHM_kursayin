-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 19 2017 г., 19:57
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
  `product_price` int(255) NOT NULL,
  `product_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_description`, `product_place`, `product_price`, `product_count`) VALUES
(1, 2, 'prod 1', 'prod 1 text', 'prod 1 place ', 200, 50),
(2, 3, 'prod 2', 'prod 2 text', 'prod 2 place', 200, 0),
(3, 1, 'prod 3 ', 'prod 3 text', 'prod 3 place', 300, 0),
(4, 6, 'prod 4', 'prod 4 text', 'prod 4 place', 500, 0),
(5, 4, 'prod 5', 'prod 5 text', 'prod 5 place', 100, 50),
(6, 5, 'prod 6', 'prod 6 text', 'prod 6 place', 900, 0),
(7, 1, 'prod 6', 'prod 6 text', 'prod 6 place', 300, 0),
(8, 1, 'some product', 'some product des', 'some product place', 300, 15),
(9, 1, 'some product', 'some product', 'some product', 200, 0),
(10, 1, 'some product', 'some product des', 'some product place', 300, 0),
(11, 1, 'some product', 'some product', 'some product', 200, 0),
(12, 1, 'some product', 'some product', 'some product', 22000, 0),
(13, 1, 'some product', 'some product', 'some product', 52121, 0),
(14, 1, 'some product', 'some product', 'some product', 22000, 0),
(15, 1, 'some product', 'some product', 'some product', 52121, 0),
(16, 1, 'some product', 'some product', 'some product', 22000, 0),
(17, 1, 'some product', 'some product', 'some product', 52121, 0),
(18, 1, 'some product', 'some product', 'some product', 22000, 0),
(19, 1, 'some product', 'some product', 'some product', 52121, 0),
(20, 1, 'some product', 'some product', 'some product', 22000, 0),
(21, 1, 'some product', 'some product', 'some product', 52121, 0),
(22, 1, 'some product', 'some product', 'some product', 22000, 0),
(23, 1, 'some product', 'some product', 'some product', 52121, 0),
(24, 1, 'some product', 'some product', 'some product', 22000, 0),
(25, 1, 'some product', 'some product', 'some product', 52121, 0),
(26, 1, 'some product', 'some product', 'some product', 22000, 0),
(27, 1, 'some product', 'some product', 'some product', 52121, 0),
(28, 1, 'some product', 'some product', 'some product', 22000, 0),
(29, 1, 'some product', 'some product', 'some product', 52121, 0),
(30, 1, 'some product', 'some product', 'some product', 22000, 0),
(31, 1, 'some product', 'some product', 'some product', 52121, 0),
(32, 1, 'some product', 'some product', 'some product', 22000, 0),
(33, 1, 'some product', 'some product', 'some product', 52121, 0),
(34, 1, 'some product', 'some product', 'some product', 22000, 0),
(35, 1, 'some product', 'some product', 'some product', 52121, 0),
(36, 1, 'some product', 'some product', 'some product', 22000, 0),
(37, 1, 'some product', 'some product', 'some product', 52121, 0),
(38, 1, 'some product', 'some product', 'some product', 22000, 0),
(39, 1, 'some product', 'some product', 'some product', 52121, 0),
(40, 1, 'some product', 'some product', 'some product', 22000, 0),
(41, 1, 'some product', 'some product', 'some product', 52121, 0),
(42, 1, 'some product', 'some product', 'some product', 22000, 0),
(43, 1, 'some product', 'some product', 'some product', 52121, 0),
(44, 1, 'some product', 'some product', 'some product', 22000, 0),
(45, 1, 'some product', 'some product', 'some product', 52121, 0),
(46, 1, 'some product', 'some product', 'some product', 22000, 0),
(47, 1, 'some product', 'some product', 'some product', 52121, 0),
(48, 1, 'some product', 'some product', 'some product', 22000, 0),
(49, 1, 'some product', 'some product', 'some product', 52121, 0),
(50, 1, 'some product', 'some product', 'some product', 22000, 0),
(51, 1, 'some product', 'some product', 'some product', 52121, 0),
(52, 1, 'some product', 'some product', 'some product', 22000, 0),
(53, 1, 'some product', 'some product', 'some product', 52121, 0),
(54, 1, 'some product', 'some product', 'some product', 22000, 0),
(55, 1, 'some product', 'some product', 'some product', 52121, 0),
(56, 1, 'some product', 'some product', 'some product', 22000, 0),
(57, 1, 'some product', 'some product', 'some product', 52121, 0),
(58, 1, 'some product', 'some product', 'some product', 22000, 0),
(59, 1, 'some product', 'some product', 'some product', 52121, 0),
(60, 1, 'some product', 'some product', 'some product', 22000, 0),
(61, 1, 'some product', 'some product', 'some product', 52121, 0),
(62, 1, 'some product', 'some product', 'some product', 22000, 0),
(63, 1, 'some product', 'some product', 'some product', 52121, 0),
(64, 1, 'some product', 'some product', 'some product', 22000, 0),
(65, 1, 'some product', 'some product', 'some product', 52121, 0),
(66, 1, 'some product', 'some product', 'some product', 22000, 0),
(67, 1, 'some product', 'some product', 'some product', 52121, 0),
(68, 1, 'some product', 'some product', 'some product', 22000, 0),
(69, 1, 'some product', 'some product', 'some product', 52121, 0),
(70, 1, 'some product', 'some product', 'some product', 22000, 0),
(71, 1, 'some product', 'some product', 'some product', 52121, 0),
(72, 1, 'some product', 'some product', 'some product', 22000, 0),
(73, 1, 'some product', 'some product', 'some product', 52121, 0),
(74, 1, 'some product', 'some product', 'some product', 22000, 0),
(75, 1, 'some product', 'some product', 'some product', 52121, 0),
(76, 1, 'some product', 'some product', 'some product', 22000, 0),
(77, 1, 'some product', 'some product', 'some product', 52121, 0),
(78, 1, 'some product', 'some product', 'some product', 22000, 0),
(79, 1, 'some product', 'some product', 'some product', 52121, 0),
(80, 1, 'some product', 'some product', 'some product', 22000, 0),
(81, 1, 'some product', 'some product', 'some product', 52121, 0),
(82, 1, 'some product', 'some product', 'some product', 22000, 0),
(83, 1, 'some product', 'some product', 'some product', 52121, 0),
(84, 1, 'some product', 'some product', 'some product', 22000, 0),
(85, 1, 'some product', 'some product', 'some product', 52121, 0),
(86, 1, 'some product', 'some product', 'some product', 22000, 0),
(87, 1, 'some product', 'some product', 'some product', 52121, 0),
(88, 1, 'some product', 'some product', 'some product', 22000, 0),
(89, 1, 'some product', 'some product', 'some product', 52121, 0),
(90, 1, 'some product', 'some product', 'some product', 22000, 0),
(91, 1, 'some product', 'some product', 'some product', 52121, 0),
(92, 1, 'some product', 'some product', 'some product', 22000, 0),
(93, 1, 'some product', 'some product', 'some product', 52121, 0),
(94, 1, 'some product', 'some product', 'some product', 22000, 0),
(95, 1, 'some product', 'some product', 'some product', 52121, 0),
(96, 1, 'some product', 'some product', 'some product', 22000, 0),
(97, 1, 'some product', 'some product', 'some product', 52121, 0),
(98, 1, 'some product', 'some product', 'some product', 22000, 0),
(99, 1, 'some product', 'some product', 'some product', 52121, 0),
(100, 1, 'some product', 'some product', 'some product', 22000, 0),
(101, 1, 'some product', 'some product', 'some product', 52121, 0),
(102, 1, 'some product', 'some product', 'some product', 22000, 0),
(103, 1, 'some product', 'some product', 'some product', 52121, 0),
(104, 1, 'some product', 'some product', 'some product', 22000, 0),
(105, 1, 'some product', 'some product', 'some product', 52121, 0),
(106, 1, 'some product', 'some product', 'some product', 22000, 0),
(107, 1, 'some product', 'some product', 'some product', 52121, 0),
(108, 1, 'some product', 'some product', 'some product', 22000, 0),
(109, 1, 'some product', 'some product', 'some product', 52121, 0),
(110, 1, 'some product', 'some product', 'some product', 22000, 0),
(111, 1, 'some product', 'some product', 'some product', 52121, 0),
(112, 1, 'some product', 'some product', 'some product', 22000, 0),
(113, 1, 'some product', 'some product', 'some product', 52121, 0),
(114, 1, 'some product', 'some product', 'some product', 22000, 0),
(115, 1, 'some product', 'some product', 'some product', 52121, 0),
(116, 1, 'some product', 'some product', 'some product', 22000, 0),
(117, 1, 'some product', 'some product', 'some product', 52121, 0),
(118, 1, 'some product', 'some product', 'some product', 22000, 0),
(119, 1, 'some product', 'some product', 'some product', 52121, 0),
(120, 1, 'some product', 'some product', 'some product', 22000, 0),
(121, 1, 'some product', 'some product', 'some product', 52121, 0),
(122, 1, 'some product', 'some product', 'some product', 22000, 0),
(123, 1, 'some product', 'some product', 'some product', 52121, 0),
(124, 1, 'some product', 'some product', 'some product', 22000, 0),
(125, 1, 'some product', 'some product', 'some product', 52121, 0),
(126, 1, 'some product', 'some product', 'some product', 22000, 0),
(127, 1, 'some product', 'some product', 'some product', 52121, 0),
(128, 1, 'some product', 'some product', 'some product', 22000, 0),
(129, 1, 'some product', 'some product', 'some product', 52121, 0),
(130, 1, 'some product', 'some product', 'some product', 22000, 0),
(131, 1, 'some product', 'some product', 'some product', 52121, 0),
(132, 1, 'some product', 'some product', 'some product', 22000, 0),
(133, 1, 'some product', 'some product', 'some product', 52121, 0),
(134, 2, 'some prod', 'some prod', 'some prod', 1100, 0),
(135, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(136, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(137, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(138, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(139, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(140, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(141, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(142, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(143, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(144, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(145, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(146, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(147, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(148, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(149, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(150, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(151, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(152, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(153, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(154, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(155, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(156, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(157, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(158, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(159, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(160, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(161, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(162, 2, 'henc esa some prod', 'some prod', 'some prod', 1100, 0),
(163, 2, 'some prod', 'some prod', 'some prod description', 54641, 0),
(164, 2, 'henc esa vor man es gali some prod', 'some prod', 'some prod', 1100, 0),
(165, 2, 'some prod', 'some prod', 'some prod description', 546411, 0),
(166, 5, 'erkar anun vor karoxa shat erkar lini', 'description erkar description vor karoxa shat erkar linierkar description vor karoxa shat erkar\r\n', 'tex eli erkar tex eli erkar tex elierkar tex eli erkar tex eli erkar tex eli erkar tex eli erkar', 555555, 0),
(167, 5, 'erkar anun vor karoxa shat erkar lini', 'description erkar description vor karoxa shat erkar linierkar description vor karoxa shat erkar linierkar ', 'tex eli erkar tex eli erkar tex eli erkar tex eli erkar tex eli erkar tex eli erkar ', 555555, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
