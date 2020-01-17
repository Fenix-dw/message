-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 28 2019 г., 13:27
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`user_1`, `user_2`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `to_user_id`, `from_user_id`, `text`, `time`) VALUES
(1, 1, 2, 'Привет!', '0000-00-00 00:00:00'),
(2, 2, 1, 'Привет!', '0000-00-00 00:00:00'),
(3, 2, 1, 'Что делaеш?', '0000-00-00 00:00:00'),
(4, 1, 2, 'Та ничого', '0000-00-00 00:00:00'),
(5, 3, 2, 'Хай', '0000-00-00 00:00:00'),
(13, 1, 0, 'sdcsdc', '2019-09-26 21:04:43'),
(14, 1, 2, 'ПРивет', '2019-09-26 21:07:19'),
(33, 2, 3, 'Хай\r\n', '2019-09-27 17:39:39'),
(34, 1, 2, 'Привет\r\n', '2019-09-28 14:18:49'),
(35, 1, 2, 'Привет\r\n', '2019-09-28 14:21:28'),
(36, 1, 2, 'Привет\r\n', '2019-09-28 14:21:34');

-- --------------------------------------------------------

--
-- Структура таблицы `polzovateli`
--

CREATE TABLE `polzovateli` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `polzovateli`
--

INSERT INTO `polzovateli` (`id`, `name`, `phone`, `email`, `foto`, `password`) VALUES
(1, 'Peter', '516556', 'peter@i.ua', 'imges/user.png', '333'),
(2, 'Ivan', '45343534', 'peter@i.ua', 'imges/user_3.png', '222'),
(3, 'Vasiliy', '6544654', 'peter@i.ua', 'imges/user_1.png', '111'),
(4, 'Катя', '648988', 'peter@i.ua', 'imges/user_0.png', '999');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD UNIQUE KEY `user_1` (`user_1`,`user_2`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `polzovateli`
--
ALTER TABLE `polzovateli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `polzovateli`
--
ALTER TABLE `polzovateli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
