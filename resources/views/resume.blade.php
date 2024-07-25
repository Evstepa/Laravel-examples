<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PDF</title>

    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}" type="text/css">
    <style>
        body { font-family: DejaVu Sans; }
    </style>
</head>
<body>
    <div class="container">
        <h5 class="title">User data for ID: {{ $employee->id }}</h5>
        <ul class="list-group">
            <li class="list-group-item mylist">Name: {{ $employee->name }}</li>
            <li class="list-group-item mylist">Surname: {{ $employee->surname }}</li>
            <li class="list-group-item mylist">Age: {{ $employee->age }}</li>
            <li class="list-group-item mylist">Job: {{ $employee->job }}</li>
            <li class="list-group-item mylist">Email: {{ $employee->email }}</li>
            <li class="list-group-item mylist">Address: {{ $employee->address }}</li>
        </ul>
    </div>

</body>
</html>
