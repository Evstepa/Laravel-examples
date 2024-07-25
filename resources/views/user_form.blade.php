<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>User form</title>

    <link rel="stylesheet" href="./styles/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./styles/normalize.css" type="text/css">
    <link rel="stylesheet" href="./styles/main.css" type="text/css">

</head>
<body>
    <div class="container">
        <div class="header border-0">
            <h5 class="title">Новый пользователь</h5>
        </div>
        <form id="formAdd" action="{{ route('store_form') }}" method="post" class="px-3">
            @csrf
            <div class="form-floating mb-3">
                <input id="inputName" name="inputName" type="text" class="form-control border-0 border-bottom myinput" data-validate-field="name" placeholder="Имя*" required>
                <label for="inputName">Имя*</label>
                <div class="invalid-message" for="inputName">Введите имя</div>
            </div>
            <div class="form-floating mb-3">
                <input id="inputSurname" name="inputSurname" type="text" class="form-control border-0 border-bottom myinput" data-validate-field="name" placeholder="Фамилия*" required>
                <label for="inputSurname">Фамилия*</label>
                <div class="invalid-message" for="inputSurname">Введите фамилию</div>
            </div>
            <div class="form-floating mb-3">
                <input id="inputMail" name="inputMail" type="email" class="form-control border-0 border-bottom myinput" data-validate-field="mail" aria-label="email" placeholder="Email*" required>
                <label for="inputMail">Email*</label>
                <div class="invalid-message" for="inputMail">Введите адрес электронной почты</div>
            </div>
            <button id="addBtn" type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

</body>
</html>
