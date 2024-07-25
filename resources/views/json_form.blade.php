<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>JSON</title>

    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}" type="text/css">

</head>
<body>
    <div class="container">
        <div class="header border-0">
            <h5 class="title">Данные в формате JSON</h5>
        </div>
        <div class="form-floating mb-3">
            <textarea name="json" id="json" cols="30" rows="10"
            class="form-control border-0 border-bottom mytextarea"
            data-validate-field="json" aria-label="json" required>
            {{ $data }}
            </textarea>
        </div>
    </div>

</body>
</html>
