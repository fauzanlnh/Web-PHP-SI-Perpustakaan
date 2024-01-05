<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;

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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login-check', [AuthController::class, 'authenticate'])->name('login-check');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('staff')->group(function () {
        Route::get('/', function () {
            $user = User::with('staff')->firstOrFail();
            return view('staff.index', ['user' => $user]);
        })->name('staff-index');

        Route::prefix('book')->group(function () {
            route::resource('author', AuthorController::class);
            route::resource('category', CategoryController::class);
            route::resource('publisher', PublisherController::class);
        });

    });
});
