<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormProcessor extends Controller
{
    /**
     * Форма ввода данных пользователя
     */
    public function index(): Renderable
    {
        return view("user_form");
    }

    /**
     * Вывод данных в формате json
     *
     * @param Request $request
     */
    public function store(Request $request): Response
    {
        $userData = ['name' => $request->inputName, 'surname' => $request->inputSurname, 'email' => $request->inputMail];
        return response()->json($userData);
    }

    /**
     * страница приветствия нового пользователя
     *
     * @param Request $request
     */
    public function hello(Request $request): Renderable
    {
        return view('user_hello', ['name' => $request->inputName]);
    }
}
