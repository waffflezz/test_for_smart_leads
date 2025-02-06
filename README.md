# Random Number

Тестовый проект для SmartLeads. Представляет из себя сервер на голом php, который реализует систему роутинга и контроллеров.

## Текст задания
Правила выполнения тестового задания

Задания нужно сделать на чистом PHP, без использования библиотек и фреймворков.
Для соединений к внешним сервисам нужно использовать CURL. 
Нужно сделать декомпозицию классов, как будто мы планируем писать большой проект.
Выполнить нужно одно из заданий, на ваш выбор.

REST API сервер и клиент
Напишите REST API для генерации случайного числа. Каждой генерации присваивать уникальный id по которому можно получить результат. 

Должны быть доступны 2 публичных API метода:
1. random - генерирует случайное число, и присваивает ему id
2. get - принимает id через GET, и выдаёт ранее сгенерированное число.

После сервера написать библиотеку или клиента для его использования. На выбор.

## Что было сделано

- Система роутинга
- Класс пришедшего реквеста и внедрение его в контроллере
- Два метода, один для генерации рандомного числа (был выбран диапазон от 0 до 100), другой для получения числа по его уникальному id
- Всё декомпозированно на отдельные классы, что позволит в будущем безболезненно добавить новые эндпоинты или же другие сервисы/репозитории

## Зависимости

- PHP 7.4
- SQLite3 extension for PHP (если не ошибаюсь, то это встроенное решение, которое строится на основе pdo, но можно переписать и под pdo)
- Composer

## Установка и запуск

1. **Клонирование репозитория:**

   ```bash
   git clone https://github.com/waffflezz/test_for_smart_leads.git
   cd test_for_smart_leads

2. **Установка зависимостей и запуск приложения**
   ```bash
   composer install
   cd public
   php -S localhost:8001

3. **Запуск консольной утилиты**

   Теперь нужно будет запустить консольную утилиту, которая будет находиться в этом же репозитории ради простоты (утилита написана одним скриптом на python)

   !Если вы указали другой порт для сервера, то нужно будет в файле client.py изменить порт в 4 строке!

   Открываем другой терминал, переходим в главную директорию проекта и пишем:
   ```bash
   cd client
   python3 client.py

## Пример клиента
![изображение](https://github.com/user-attachments/assets/6a967917-1c6d-4413-bf69-1db6c0fb42e6)
