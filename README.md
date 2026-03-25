## Задача 1
Написать пузырьковую фильтрацию для массива числовых данных от 200 тысяч элементов
Пример:
[15,23,1,-234, 400, …, 92]
Примечание:
Желательно получить результат максимально быстро затрачивая минимум памяти при математических расчётах

Итоговый результат:
Получить отсортированный массив данных от меньшего к большему. В устной форме обосновать свое решение

### Решение
Чтобы выполнить требование «максимально быстро» в рамках этого алгоритма, я сделал такие оптимизации:
- Сокращение диапазона: После каждого прохода внешнего цикла наибольший элемент «всплывает» в конец массива. Нет 
  смысла сравнивать его снова. Поэтому внутренний цикл с каждым проходом становится короче ($n - 1 - $i).
- Флаг раннего выхода ($swapped): Если за полный проход массива не произошло ни одной перестановки, значит, данные 
  уже упорядочены. Алгоритм прерывает работу досрочно.
- Передача по ссылке: Метод BubbleSorter.sort принимает массив по ссылке (&$arr). Без этого 
  при передаче большого массива в метод могло бы сработать «копирование при записи» (Copy-on-Write), что удвоило бы 
  потребление оперативной памяти.

---

## Задача 2




Сформировать таблицы баз данных по условиям:


Необходимо разработать таблицы базы данных для хранения игроков по сезонам.
Клуб игрока должен содержать информацию:
• Название клуба на русском
• Название клуба на английском
• Город клуба на русском
• Город клуба на английском


Информация об игроке:
• ФИО на русском
• ФИО на английском
• Вес
• Рост
• Игровой номер игрока

### Решение
```sql
SELECT
CONCAT(seasons.start_year, '-', seasons.end_year) as season,
CONCAT(clubs.name, ' / ', tcl.name) as club,
CONCAT(cities.name, ' / ', tc.name) as city,
CONCAT(players.fio, ' / ', tp.name) as player
FROM seasons
INNER JOIN seasons_clubs ON seasons_clubs.season_id = seasons.id
INNER JOIN clubs ON seasons_clubs.club_id = clubs.id
INNER JOIN translates tcl ON (tcl.model_id = clubs.id
AND tcl.model_type = 'App\\Models\\Club'
AND tcl.language_id = 1)
INNER JOIN cities on clubs.city_id = cities.id
INNER JOIN translates tc ON (tc.model_id = cities.id
AND tc.model_type = 'App\\Models\\City'
AND tc.language_id = 1)
INNER JOIN players on clubs.id = players.club_id
INNER JOIN translates tp ON (tp.model_id = players.id
AND tp.model_type = 'App\\Models\\Player'
AND tp.language_id = 1)
ORDER BY seasons.id;
```


---