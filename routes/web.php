<?php

use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'books' => BookController::class,
        'categories' => CategoryController::class,
    ]);
    Route::get('books/category/{category}', [BookController::class, 'booksByCategory'])->name('books.category');
});
