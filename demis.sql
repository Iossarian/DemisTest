
--
-- База данных: `demis`
--

-- --------------------------------------------------------

--
CREATE DATABASE demis
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;
USE demis;
-- Структура таблицы `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `text` text NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `report`
--

INSERT INTO `report` (`id`, `name`, `text`, `code`) VALUES
(3, 'Название', 'Случайный тек { ст со слу {48} {-793} {/3g} {+35} ', '48,-793,+35'),
(6, 'Название1', 'bla{79}bl -5 varchar {+64{7}', '79,7');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `report` ADD FULLTEXT KEY `reports_search` (`name`,`code`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

