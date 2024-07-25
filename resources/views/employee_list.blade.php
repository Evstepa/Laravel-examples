<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Модуль 7. Данные о пользователях</title>

    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}" type="text/css">
</head>
<body>
    <div class="container">
        <div class="header border-0">
            <h5 class="title">Данные о пользователях</h5>
        </div>
        @if (count($employees) === 0)
            <h6 class="title">Данных пока нет</h6>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Фамилия Имя</th>
                        <th>Возраст</th>
                        <th>Должность</th>
                        <th>Email</th>
                        <th>Адрес</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <th>{{ $employee->id }}</th>
                        <td>{{ $employee->surname . ' ' . $employee->name }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>{{ $employee->job }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
