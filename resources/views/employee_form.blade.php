<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Модуль 5. Данные о работнике</title>

    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}" type="text/css">
</head>
<body>
    <div class="container">
        <div class="header border-0">
            <h5 class="title">Данные о работнике</h5>
        </div>
        <form id="formAdd" class="px-3"
            @if (isset($employee))
                action="{{ url('/user/' . $employee['id']) }}"
            @else
                action="{{ route('employee_store') }}"
            @endif
            method="post">
            @csrf
            <div class="form-floating mb-3">
                <input id="name" name="name" type="text"
                    class="form-control border-0 border-bottom myinput"
                    aria-describedby="nameDescr" placeholder="Имя*"
                    value="{{ old('name', $employee) }}"
                    required>
                <label class="@error('name') invalid @enderror" for="name">Имя*</label>
                <div class="invalid-message" id="nameDescr">
                    Введите имя.
                    @error('name')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <input id="surname" name="surname" type="text"
                    class="form-control border-0 border-bottom"
                    aria-describedby="surnameDescr" placeholder="Фамилия*"
                    value="{{ old('surname', $employee) }}"
                    required>
                <label class="@error('surname') invalid @enderror" for="surname">Фамилия*</label>
                <div class="invalid-message" id="surnameDescr">
                    Введите фамилию.
                    @error('surname')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <input id="email" name="email" type="email"
                    class="form-control border-0 border-bottom"
                    aria-describedby="emailDescr" placeholder="Email*"
                    value="{{ old('email', $employee) }}"
                    >
                <label class="@error('email') invalid @enderror" for="email">Email*</label>
                <div class="invalid-message" id="emailDescr">
                    Введите адрес электронной почты.
                    @error('email')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <input id="age" name="age" type="number"
                    class="form-control border-0 border-bottom"
                    aria-describedby="ageDEscr" placeholder="Возраст*"
                    value="{{ old('age', $employee) }}"
                    required>
                <label class="@error('age') invalid @enderror" for="age">Возраст*</label>
                <div class="invalid-message" id="ageDescr">
                    Введите возраст.
                    @error('age')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <input id="job" name="job" type="text"
                    class="form-control border-0 border-bottom"
                    aria-describedby="jobDescr" placeholder="Должность*"
                    value="{{ old('job', $employee) }}"
                    required>
                <label class="@error('job') invalid @enderror" for="job">Занимаемая должность*</label>
                <div class="invalid-message" id="jobDescr">
                    Введите должность.
                    @error('job')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <input id="address" name="address" type="text"
                    class="form-control border-0 border-bottom"
                    placeholder="Адрес*" aria-describedby="addressDescr"
                    value="{{ old('address', $employee) }}"
                    required>
                <label class="@error('address') invalid @enderror" for="address">Адрес проживания*</label>
                <div id="addressDescr">
                    Введите адрес.
                    @error('address')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <textarea name="workData" id="workData" cols="30" rows="3"
                class="form-control border-0 border-bottom mytextarea" aria-describedby="workDataDescr"
                required>{{ old('workData', $employee) }}</textarea>
                <label class="@error('workData') invalid @enderror" for="workData">Рабочие данные*</label>
                <div class="invalid-message" id="workDataDescr">
                    Введите данные.
                    @error('workData')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <button id="addBtn" type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

</body>
</html>
