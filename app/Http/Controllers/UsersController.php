<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;

class UsersController extends Controller
{
    /**
     * Список все пользователей
     */
    public function index(): Renderable
    {
        $this->authorize('view-any', User::class);
        return view('users_list', ['users' => User::all()]);
    }

    /**
     * Данные на одного пользователя
     */
    public function show(User $user): Renderable
    {
        $this->authorize('view', $user);
        return view('users_list', ['users' => [$user]]);
    }
}
