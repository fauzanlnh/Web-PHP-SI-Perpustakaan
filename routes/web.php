<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;

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
            // ddd('hello');
            $user = User::with('staff')->firstOrFail();
            return view('staff.index', ['user' => $user]);
        });
    });
});
