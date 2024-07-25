@extends('layouts.default')

@section('content')
<ul class="list-group">
    <li class="list-group-item">
        <h4>Имя</h4>
        <p>{{ $name }}</p>
    </li>
    <li class="list-group-item">
        <h4>Возраст</h4>
        @if ($age > 18)
            <p>{{ $age }}</p>
        @else
            <p>Слишком молодой человек</p>
        @endif
    </li>
    <li class="list-group-item">
        <h4>Должность</h4>
        <p>{{ $position }}</p>
    </li>
    <li class="list-group-item">
        <h4>Email</h4>
        @if ($address === '')
            <p>Адрес электронной почты не указан</p>
        @else
            <p>{{ $address }}</p>
        @endif
    </li>
</ul>
@stop
