# REST API для управления пользователями на Laravel

## Этот проект представляет собой REST API для управления пользователями, разработанный с использованием фреймворка Laravel. API предоставляет возможности для получения списка пользователей, создания, обновления и удаления пользователей.

# Конфигурация

## Проект протестирован и работает на следующей конфигурации:

PHP: 8.2

Laravel: 11.35

---

# Задание

## Основные требования:

1. Создать REST API для управления пользователями.

2. Реализовать следующие методы:

-   index: Получение списка всех пользователей с пагинацией.

-   show: Получение информации о конкретном пользователе по его ID.

-   store: Создание нового пользователя.

-   update: Обновление данных существующего пользователя по его ID.

-   destroy: Удаление пользователя по его ID.

3. Модель пользователя должна быть расширена полями:

-   ip (IP-адрес пользователя).

-   comment (комментарий к пользователю).

4. спользовать Laravel’s Eloquent ORM для работы с базой данных.

5. Возвращать JSON ответы.

6. Реализовать seed для генерации тестовых данных.

7. Написать чистый и понятный код с комментариями.

## Дополнительные требования (плюс):

1. Использовать валидацию данных через правила валидации Laravel.

2. Реализовать поиск по имени и сортировку по имени при запросе списка пользователей.

3. Обеспечить корректную обработку ошибок при запросах.

---

# Установка и запуск проекта

1. Клонирование репозитория

```bash
    https://github.com/AnastsiaRom/user-crud-api.git
    cd user-crud-api
```

2. Установка зависимостей

```bash
    composer install
```

3. Настройка окружения
   Скопируйте файл _.env.example_ в _.env_:

Настройте подключение к базе данных в файле .env:

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=название_базы_данных
    DB_USERNAME=ваш_пользователь
    DB_PASSWORD=ваш_пароль
```

4. Генерация ключа приложения

```bash
    php artisan key:generate
```

5. Миграции и сиды

```bash
    php artisan migrate
```

```bash
    php artisan db:seed
```

6. Запуск сервера

```bash
    php artisan serve
```

## Проект будет доступен по адресу: *http://127.0.0.1:8000*

---

# API Endpoints

## Получение списка всех пользователей

-   Метод HTTP: GET
-   URI: /api/users
-   Действие (метод контроллера): index

Параметры:

-   page (int) - Номер страницы для пагинации.

-   sort (string) - Сортировка по имени (asc или desc).

-   name (string) - Поиск по имени пользователя.

---

## Создание нового пользователя

-   Метод HTTP: POST
-   URI: /api/users
-   Действие (метод контроллера): store

Параметры:

-   name (string, required) - Имя пользователя.

-   email (string, required) - Email пользователя (должен быть уникальным).

-   password (string, required) - Пароль пользователя (минимум 6 символов).

-   ip (string, nullable) - IP-адрес пользователя.

-   comment (string, nullable) - Комментарий к пользователю.

---

## Получение информации о конкретном пользователе

-   Метод HTTP: GET
-   URI: /api/users/{user}
-   Действие (метод контроллера): show

Параметры:

-   {user} (int) - ID пользователя.

---

## Обновление информации о конкретном пользователе

-   Метод HTTP - PUT/PATCH
-   URI - /api/users/{user}
-   Действие (метод контроллера) - update

Параметры:

-   {user} (int) - ID пользователя.

-   name (string, nullable) - Новое имя пользователя.

-   email (string, nullable) - Новый email пользователя (должен быть уникальным).

-   password (string, nullable) - Новый пароль пользователя (минимум 6 символов).

-   ip (string, nullable) - Новый IP-адрес пользователя.

-   comment (string, nullable) - Новый комментарий к пользователю.

---

## Удаление конкретного пользователя

-   Метод HTTP - DELETE
-   URI - /api/users/{user}
-   Действие (метод контроллера) - destroy

Параметры:

-   {user} (int) - ID пользователя

## Затраченное время:

Настройка проекта и установка зависимостей: 10 минут

Написание модели и миграции: 10 минут

Написание контроллера|сервиса: 30 минут

Написание сидера: 5 минут

Тестирование и отладка: 15 минут

Итого: 1 час 10 минут
