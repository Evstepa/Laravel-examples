<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Модуль 6. Новая книга</title>

    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}" type="text/css">
</head>
<body>
    <div class="container">
        <div class="header border-0">
            <h5 class="title">Данные о книге</h5>
        </div>
        <form id="bookAdd" name="bookAdd" class="px-3" action="{{ Route("book_store") }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input id="title" name="title" type="text"
                    class="form-control border-0 border-bottom myinput"
                    placeholder="Название книги*" aria-describedby="titleDescr"
                    value="{{ old('title', $book) }}">
                <label class="@error('title') invalid @enderror" for="title">Название книги*</label>
                <div class="invalid-message" id="titleDescr">
                    Введите название книги.
                    @error('title')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <input id="author" name="author" type="text"
                    class="form-control border-0 border-bottom"
                    placeholder="Автор*" aria-describedby="authorDescr"
                    value="{{ old('author', $book) }}">
                <label class="@error('author') invalid @enderror" for="author">Автор*</label>
                <div class="invalid-message" id="authorDescr">
                    Введите фамилию автора.
                    @error('author')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <select id="genre" name="genre" class="form-select" aria-describedby="genreDescr">
                    <option selected disabled value="">...</option>
                    <option @if (old('genre', $book) === "Fantasy")selected @endif value="Fantasy">Фэнтези</option>
                    <option @if (old('genre', $book) === "Science fiction") selected @endif value="Science fiction">Научная фантастика</option>
                    <option @if (old('genre', $book) === "Drama") selected @endif value="Drama">Драма</option>
                    <option @if (old('genre', $book) === "Detective") selected @endif value="Detective">Детектив</option>
                    <option @if (old('genre', $book) === "Poetry") selected @endif value="Poetry">Поэзия</option>
                </select>
                <label class="@error('genre') invalid @enderror" id="genreDescr">Жанр произведения*</label>
                <div class="invalid-message" for="genre">
                    Укажите жанр произведения.
                    @error('genre')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <input id="price" name="price" type="number"
                class="form-control border-0 border-bottom"
                aria-label="price" aria-describedby="priceDescr"
                value="{{ old('price', $book) }}">
                <label class="@error('price') invalid @enderror" for="price">Цена*</label>
                <div class="invalid-message" id="priceDescr">
                    Введите цену.
                    @error('price')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-floating mb-3">
                <input id="publisher" name="publisher" type="text"
                class="form-control border-0 border-bottom"
                placeholder="Издатель*" aria-describedby="publisherDescr"
                value="{{ old('publisher', $book) }}">
                <label class="@error('publisher') invalid @enderror" for="publisher">Издатель*</label>
                <div class="invalid-message" for="publisherDescr">
                    Введите издателя.
                    @error('publisher')
                    <span class="invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <button id="addBtn" type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

</body>
</html>
