### Selenoid

Необходимо реализовать парсинг информации с помощью Selenoid с сайта: https://yandex.ru/pogoda

- Задание выполнять в файле: backend/controllers/SelenoidController.php
- Для запуска Selenoid, нужно открыть страницу: selenoid/index.
- Элементы на страницах искать с помощью XPath, не использовать CSS Selector.
- Информация должна сохраняться в виде таблицы, в файл с расширением: csv.

1. Selenoid должен первым делом открывать сайт: https://yandex.ru/pogoda
2. После загрузки страницы, парсер должен в поле: Город или район - указать значение: Москва и выбрать из списка значение: Москва, Москва и Московская область 
3. После перезагрузки страницы, парсер должен получить все прогнозы за 10 дней.
4. Так-же получить информацию о световом дне, начало и конец светового дня.

Таблица в файле должно сохранятся в формате:

| Дата       | Температура | Начало светового дня | Конец светового дня |
|------------|-------------|----------------------|---------------------|
| 13 декабря | 0           | 00:00                | 00:00               |
| 14 декабря | +100        | 00:00                | 00:00               |
| 15 декабря | -100        | 00:00                | 00:00               |

Фреймворк Yii2 (https://www.yiiframework.com/)
