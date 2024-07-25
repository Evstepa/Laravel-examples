<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\FormProcessor;
use App\Models\Employee;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PdfGeneratorController;
use App\Models\Log;
use App\Models\News;
use App\Events\NewsHidden;
use App\Http\Controllers\UsersController;
use Telegram\Bot\Laravel\Facades\Telegram;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return view("welcome");
})->name("welcome");
Route::get("/userform", [FormProcessor::class, "index"])->name("user_form");
// Route::post("/storeform", [FormProcessor::class, "store"])->name("store_form");
Route::post("/storeform", [FormProcessor::class, "hello"])->name("store_form");

Route::get("/test_database", function () {
    $record = new Employee();
    $record->name = 'Ivan';
    $record->surname = 'Ivanov';
    $record->email = 'Ivan@ii.ii';
    $record->age = 25;
    $record->job = 'no';
    $record->address = 'Ivanovo';
    $record->workData = json_encode($record);
    $record->save();
    return response("Добавлена запись: " . json_encode($record));
})->name('test_database');

Route::get('/home', function () {
    $data = ['name' => 'Елена', 'age' => 48, 'position' => 'доцент', 'address' => 'ee@ee.ee'];
    return view('home', ['data' => $data]);
})->name("home");

Route::get("/contacts", function () {
    return view('contacts', ['name' => 'Егор', 'age' => 15, 'position' => 'ученик', 'address' => '']);
})->name("contacts");

Route::get("/user", [EmployeeController::class, "index"])->name("employee_get");
Route::post("/user", [EmployeeController::class, "store"])->name("employee_store");
Route::get("/user/{employee}", [EmployeeController::class, "index"])->name("employee_id_get");
Route::post("/user/{employee}", [EmployeeController::class, "updateJson"])->name("employee_id_post");

Route::get("/book/{book?}", [BookController::class, "show"])->name("book_input");
Route::post("/book", [BookController::class, "store"])->name("book_store");

Route::get("/users", [EmployeeController::class, "showUserList"])->name("employee_list");
Route::get("/resume/{employee}", [PdfGeneratorController::class, "index"])->name("resume");

Route::view('/logs', 'logs', ['logs' => Log::all()]);

Route::get('/news/create', function (): Response {
    $news = new News();

    $news->title = 'Title. ' . (string) rand();
    $news->body = 'News boby. ' . (string) rand();

    $news->save();
    return response()->json($news);
})->name('news-create');

Route::get('/news/{news}/hide', function (News $news): Response {
    $news->hidden = true;
    $news->save();

    NewsHidden::dispatch($news);
    return response('Новость ' . $news->id . ' скрыта.');
})->name('news-hidden');

//модуль 11
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/userslist', [UsersController::class, 'index'])->name('user-list');
Route::get('/userslist/{user}', [UsersController::class, 'show'])->name('user-show');

//модуль 12
Route::get('testtelegram', function () {
    Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
        'parse_mode' => 'html',
        'text' => 'Test'
    ]);
    return response()->json([
        'status' => 'success'
    ]);
});

//модуль 14
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
