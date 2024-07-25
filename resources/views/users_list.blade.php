<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Модуль 11. Данные о пользователях</title>

    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}" type="text/css">
</head>
<body>
    <div class="container">
        <div class="header border-0">
            <h5 class="title">Данные о пользователях</h5>
        </div>
        @if (count($users) === 0)
            <h6 class="title">Данных пока нет</h6>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Роль (права)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if ($user->is_admin === 1)
                            Админинстратор
                        @else
                            Пользователь
                        @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
