<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;

class EmployeeController extends Controller
{
    private const USER_VALIDATOR = [
        "name" => "required|string|max:50",
        "surname" => "required|string|max:50",
        "email" => "required|string|max:100|regex:/^[a-z0-9-\.+]+@[a-z0-9-]+\.[a-z]{2,}\z/i",
        // "email" => "required|string|max:100|email:rfc,dns",
        "job" => "required|string|max:100",
        "age" => "required|numeric|integer|min:1|max:100",
        "address" => "required|string|max:255",
        "workData" => "required|string|json|max:2147483647",
    ];

    private const USER_ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длиннее :max символов',
        'age.min' => 'Значение не должно быть меньше :min',
        'age.max' => 'Значение не должно быть больше :max',
        'numeric' => 'Введите число',
        'integer' => 'Число должно быть целым',
        'email.regex' => 'Неверный формат электронной почты',
        // 'email.email' => 'Неверный формат электронной почты',
    ];

    /**
     * Страница формы для ввода или изменения данных о работнике
     */
    public function index(?Employee $employee = null): Renderable
    {
        return view("employee_form", ['employee' => $employee]);
    }

    /**
     *  Сохранение данных о работнике в БД
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(self::USER_VALIDATOR, self::USER_ERROR_MESSAGES);

        Employee::create($validated);

        return redirect()->route("welcome");
    }

    /**
     *  Обновление данных о работнике в БД
     */
    public function updateJson(Request $request, Employee $employee): Renderable
    {
        $validated = $request->validate(self::USER_VALIDATOR, self::USER_ERROR_MESSAGES);
        $employee->fill($validated);
        $employee->save();

        $data = json_encode($employee);

        return view("json_form", compact("data"));
    }

    public function showUserList(): Renderable
    {
        // return response()->json(Employee::all());
        return view("employee_list", ['employees' => Employee::all()]);
    }
}
