<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Laravel projects</title>

    <link rel="stylesheet" href="./styles/bootstrap.min.css" type="text/css">

    <style>
    html {
        box-sizing: border-box;
        line-height: 1;
        background: #FFFFFF;
    }
    *,
    *::before,
    *::after {
        box-sizing: inherit;
    }
    .container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 20px;
        margin: 20px auto;
        padding: 20px;
        width: 80vw;
        border-radius: 10px;
        border: 1px solid rgb(43, 226, 192);
        background-color: rgb(239, 250, 248);
    }
    </style>
</head>
<body class="">
    <div class="container">
        @if (Route::has('login'))
            <div class="text-end">
                <a href="{{ route('dashboard') }}" class="btn btn-light">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                @endif
            </div>
        @endif
        <h3>Доступные маршруты:</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-light">
                <a href="{{ route('user_form') }}">Модуль 2. Форма ввода</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ route('test_database') }}">Модуль 3. Добавление записи в таблицу</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ route('home') }}">Модуль 4. Домашняя страница</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ route('contacts') }}">Модуль 4. Страница контактов</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ route('employee_get') }}">Модуль 5. Использование класса Request. Ввод данных</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/user/1') }}">Модуль 5. Использование класса Request. Изменение данных</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/book') }}">Модуль 6. Работа с формами</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ route('employee_list') }}">Модуль 7. Класс Response. Список пользователей</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/user') }}">Модуль 7. Класс Response. Ввод данных пользователя и запись в БД</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/user/1') }}">Модуль 7. Класс Response. Просмотр данных пользователя, редактирование и обновление в БД</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/resume/1') }}">Модуль 7. Класс Response. Создание pdf</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/logs') }}">Модуль 8. Logs</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/news/create') }}">Модуль 9. События, слушатели, наблюдатели</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/news/1/hide') }}">Модуль 9. События, слушатели, наблюдатели</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/userslist') }}">Модуль 11. Список пользователей (для администратора)</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/userslist/1') }}">Модуль 11. Конкретный пользователь (по id)</a>
            </li>
            <li class="list-group-item list-group-item-light">
                <a href="{{ url('/admin') }}">Модуль 14. Панель администратора</a>
            </li>
        </ul>
    </div>
</body>
</html>
