<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    private const BOOK_VALIDATOR = [
        "title" => "required|string|unique:books,title|max:255",
        "author" => "required|string|max:100",
        "genre" => "required|string|max:100",
        "publisher" => "required|string|max:100",
        "price" => "required|numeric|integer|min:1|max:2147483647",
    ];

    private const BOOK_ERROR_MESSAGES = [
        'title.required' => 'Не должно быть книги без названия',
        'title.unique' => 'Название книги болжно быть уникальным',
        'author.required' => 'Страна должна знать своего героя',
        'price.required' => 'Раздавать книги бесплатно нельзя',
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длиннее :max символов',
        'price.min' => 'Значение не должно быть меньше :min',
        'price.max' => 'Значение не должно быть больше :max',
        'numeric' => 'Введите число',
        'integer' => 'Число должно быть целым',
    ];

    /**
     * Страница ввода/корректировки данных
     */
    public function show(?Book $book = null): Renderable
    {
        return view("book_add_form", ['book' => $book]);
    }

    /**
     * Валидация и сохранение данных в БД
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(self::BOOK_VALIDATOR, self::BOOK_ERROR_MESSAGES);

        $book = Book::make($validated);
        $book->save();
        return redirect()->route("welcome");
    }
}
