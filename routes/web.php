<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanBookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StaffController;
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
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            $user = User::with('staff')->firstOrFail();
            return view('staff.index', ['user' => $user]);
        })->name('staff-index');


        Route::prefix('book')->group(function () {
            route::resource('author', AuthorController::class);
            route::resource('category', CategoryController::class);
            route::resource('publisher', PublisherController::class);
            route::get('/lost', [BookController::class, 'indexLost'])->name('book.lost');

        });

        route::resource('book', BookController::class);
        route::resource('member', MemberController::class);
        route::resource('staff', StaffController::class);

        Route::prefix('transaction')->group(function () {
            // Index
            route::get('borrowing-book', [LoanBookController::class, 'indexBorrowingBook'])->name('transaction.borrowing-book.index');
            route::get('book-return', [LoanBookController::class, 'indexBookReturn'])->name('transaction.book-return.index');
            route::get('lost-book-return-fine', [LoanBookController::class, 'indexLostBookReturnFine'])->name('transaction.lost-book-return-fine.index');
            route::get('lost-book-return-replacing', [LoanBookController::class, 'indexLostBookReturnReplacing'])->name('transaction.lost-book-return-replacing.index');

            // Form
            route::get('borrowing-book/create', [LoanBookController::class, 'createBorrowingBook'])->name('transaction.borrowing-book.create');
            route::get('borrowing-book/edit/{id}', [LoanBookController::class, 'editBorrowingBook'])->name('transaction.borrowing-book.edit');
            route::get('book-return/create/{id}', [LoanBookController::class, 'createBookReturn'])->name('transaction.book-return.create-id');
            route::get('book-return/create/', [LoanBookController::class, 'createBookReturn'])->name('transaction.book-return.create');

            // 
            route::post('borrowing-book/store', [LoanBookController::class, 'storeBorrowingBook'])->name('transaction.borrowing-book.store');
            route::PATCH('borrowing-book/update/{id}', [LoanBookController::class, 'updateBorrowingBook'])->name('transaction.borrowing-book.update');
            route::post('book-return/store/{id}', [LoanBookController::class, 'storeBookReturn'])->name('transaction.book-return.store-id');
            route::post('book-return/store/', [LoanBookController::class, 'storeBookReturn'])->name('transaction.book-return.store');
        });
    });
});
