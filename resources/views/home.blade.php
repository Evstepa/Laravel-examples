@extends('layouts.default')

@section('content')
<ul class="list-group">
    @foreach ($data as $key => $val)
        <li class="list-group-item">
            <h5>{{ $key }}</h5>
            @switch($key)
            @case('age')
                @if ($val <= 18)
                    <p>Слишком молодой человек</p>
                @else
                    <p>{{ $val }}</p>
                @endif
                @break
            @case('address')
                @empty($val)
                    <p>Адрес электронной почты не указан</p>
                @else
                    <p>{{ $val }}</p>
                @endempty
                @break
            @default
                <p>{{ $val }}</p>
        @endswitch
        </li>
    @endforeach
</ul>
@stop
