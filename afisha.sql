-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 17 2019 г., 23:14
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `afisha`
--

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE `card` (
  `cid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `description` longtext NOT NULL DEFAULT '',
  `location` varchar(60) NOT NULL,
  `phones` varchar(200) DEFAULT NULL,
  `category` varchar(60) DEFAULT NULL,
  `photos` varchar(5000) DEFAULT NULL,
  `video` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`cid`, `name`, `owner_id`, `description`, `location`, `phones`, `category`, `photos`, `video`) VALUES
(1, 'У моря', 5, 'Бар уморя предоставляет широкий ассортимент услуг в сфере развлечения', 'st. Blukhera 10', '9039998877', 'bar', 'E:\\OSPanel\\domains\\afisha.ru\\images\\_1.jpg E:\\OSPanel\\domains\\afisha.ru\\images\\_2.jpg E:\\OSPanel\\domains\\afisha.ru\\images\\_3.jpg E:\\OSPanel\\domains\\afisha.ru\\images\\_4.jpg', NULL),
(2, 'ШашлыкON', 5, 'Это абсолютно новое и инновационное место', 'Novosib', '9039139090', 'bar', 'E:\\OSPanel\\domains\\afisha.ru\\images\\_1.jpg E:\\OSPanel\\domains\\afisha.ru\\images\\_2.jpg E:\\OSPanel\\domains\\afisha.ru\\images\\_3.jpg ', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `eventid` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `card_id` int(11) NOT NULL,
  `description` varchar(1200) DEFAULT NULL,
  `phones` varchar(200) DEFAULT NULL,
  `category` varchar(60) DEFAULT NULL,
  `photos` varchar(5000) DEFAULT NULL,
  `video` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `id` varchar(11) NOT NULL,
  `total_votes` int(11) NOT NULL DEFAULT '0',
  `total_value` int(11) NOT NULL DEFAULT '0',
  `used_ips` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ratings`
--

INSERT INTO `ratings` (`id`, `total_votes`, `total_value`, `used_ips`) VALUES
('2id', 3, 9, 'a:1:{i:0;s:9:\"127.0.0.1\";}'),
('2idr', 0, 0, ''),
('3id', 3, 10, 'a:1:{i:0;s:9:\"127.0.0.1\";}'),
('3idr', 0, 0, ''),
('4id', 3, 11, 'a:1:{i:0;s:9:\"127.0.0.1\";}'),
('4idr', 0, 0, ''),
('5id', 3, 12, 'a:1:{i:0;s:9:\"127.0.0.1\";}'),
('5idr', 0, 0, ''),
('6id', 1, 4, NULL),
('id21', 12, 42, 'a:1:{i:0;s:9:\"127.0.0.1\";}'),
('id22', 1, 4, 'a:1:{i:0;s:9:\"127.0.0.1\";}');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `review_id` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `review_post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location` varchar(255) NOT NULL DEFAULT '',
  `rating_1` int(3) NOT NULL DEFAULT '0',
  `rating_2` int(3) NOT NULL DEFAULT '0',
  `rating_3` int(3) NOT NULL DEFAULT '0',
  `rating_4` int(3) NOT NULL DEFAULT '0',
  `review_video` varchar(255) NOT NULL DEFAULT '',
  `review_foto` varchar(255) NOT NULL DEFAULT '',
  `review_comment` longtext NOT NULL,
  `location_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`review_id`, `email`, `review_post_date`, `location`, `rating_1`, `rating_2`, `rating_3`, `rating_4`, `review_video`, `review_foto`, `review_comment`, `location_id`, `name`) VALUES
(22, 'jeeee@gmail.com', '2019-03-13 10:12:38', '1', 5, 4, 3, 2, 'video\\_2019-03-13 10-12-38K-391 - Mystery (The Escape Game).mp4', 'photo_review\\_2019-03-13_10-12-38114530262781.jpg', 'Неплохо!!!', 1, 'Alex'),
(23, 'jeeee@gmail.com', '2019-03-14 05:49:19', '1', 2, 3, 4, 5, 'video\\_2019-03-14 05-49-19K-391 - Mystery (The Escape Game).mp4', 'photo_review\\_2019-03-14 05-49-19bar-nochnoy-klub-truba-v-eroshevskoge_e04d5_full-36229.jpeg', 'Вау!!!\r\nПросто отпадное место))', 1, 'BOBO');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(60) NOT NULL,
  `date_of_reg` datetime DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `kind_of_user` int(11) NOT NULL,
  `photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`uid`, `password`, `name`, `date_of_reg`, `email`, `phone`, `kind_of_user`, `photo`) VALUES
(1, '81dc9bdb52d04dc20036dbd8313ed055', 'Addd', '2019-03-11 10:35:08', 'asd@rus.ru', '11223344', 0, 'E:OSPanel\\domainsafisha.ruimages12019-03-11 10-35-08flower.jpg'),
(2, '202cb962ac59075b964b07152d234b70', 'asd', '2019-03-11 06:50:22', 'asd@sa.ru', '123', 0, 'E:OSPaneldomainsafisha.ruimages12019-03-11 06-50-22K-391 - Mystery (The Escape Game).mp4'),
(3, '76d80224611fc919a5d54f0ff9fba446', 'aqwe', '2019-03-12 02:01:54', 'asdw@ru.ru', '1134', 0, 'E:OSPaneldomainsafisha.ruphoto_review\\_2019-03-12 02-01-54flower.jpg'),
(4, 'b3ddbc502e307665f346cbd6e52cc10d', 'am', '2019-03-12 03:05:29', 'www@ru.ru', '1111', 1, 'E:\\OSPanel\\domains\\afisha.ru\\images\\_2019-03-12 03-05-29flower.jpg'),
(5, '81dc9bdb52d04dc20036dbd8313ed055', '12', '2019-03-12 03:09:15', 'www1@ru.ru', '12112', 1, 'E:\\OSPanel\\domains\\afisha.ru\\images\\_2019-03-12 03-09-15flower.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cid`);

--
-- Индексы таблицы `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventid`);

--
-- Индексы таблицы `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `card`
--
ALTER TABLE `card`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `card` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
