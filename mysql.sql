--
-- Структура таблицы `autors`
--

CREATE TABLE `autors` (
  `id_autor` int(11) NOT NULL,
  `autor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `autors`
--

INSERT INTO `autors` (`id_autor`, `autor`) VALUES
(1, 'Пушкин'),
(2, 'Толстой'),
(3, 'Достоевский'),
(4, 'Бунин'),
(5, 'Ахматова'),
(6, 'Есенин'),
(7, 'Лермонтов');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id_book` int(11) NOT NULL,
  `book` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id_book`, `book`) VALUES
(1, 'Том 1'),
(2, 'Том 2'),
(3, 'Том 3'),
(4, 'Том 4'),
(5, 'Том 5'),
(6, 'Том 6'),
(7, 'Том 7');


--
-- Структура таблицы `values`
--

CREATE TABLE `values` (
  `id` int(11) NOT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `id_book` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `values`
--

INSERT INTO `values` (`id`, `id_autor`, `id_book`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 6, 3),
(5, 4, 3),
(6, 2, 4),
(7, 2, 5),
(8, 6, 2),
(9, 6, 3),
(10, 2, 6),
(11, 2, 7);

-- --------------------------------------------------------


--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autors`
--
ALTER TABLE `autors`
  ADD PRIMARY KEY (`id_autor`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);


--
-- Индексы таблицы `values`
--
ALTER TABLE `values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_book` (`id_book`),
  ADD KEY `id_autor` (`id_autor`);

--
-- AUTO_INCREMENT для таблицы `values`
--
ALTER TABLE `values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа таблицы `values`
--
ALTER TABLE `values`
  ADD CONSTRAINT `id_autor` FOREIGN KEY (`id_autor`) REFERENCES `autors` (`id_autor`),
  ADD CONSTRAINT `id_book` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`);
COMMIT;

--
-- запрос к бд: выведет авторов, написавших не более 6 книг.
--

SELECT `autor` FROM `values` JOIN `autors` ON (values.id_autor = autors.id_autor) GROUP BY (autor) HAVING COUNT(autor)<7
