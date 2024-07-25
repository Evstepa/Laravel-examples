<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Модуль 8. Logs</title>

    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}" type="text/css">

</head>
<body>
    <div class="container">
        <div class="header border-0">
            <h5 class="title">Данные об http-запросах</h5>
        </div>
        @if (count($logs) === 0)
            <h6 class="title">Данных пока нет</h6>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Time</th>
                        <th>Duration</th>
                        <th>IP</th>
                        <th>URL</th>
                        <th>Method</th>
                        <th>Input</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                    <tr>
                        <th>{{ $log->id }}</th>
                        <td>{{ $log->time }}</td>
                        <td>{{ $log->duration }}</td>
                        <td>{{ $log->ip }}</td>
                        <td>{{ $log->url }}</td>
                        <td>{{ $log->method }}</td>
                        <td>{{ $log->input }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
