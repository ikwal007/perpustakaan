<?php

use App\Models\Books;
use App\Models\Admins;
use App\Models\Students;
use App\Models\Borrowings;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\BorrowingsController;
use App\Http\Controllers\CategoriesController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index',[
        'title' => 'dashboard',
        'borrowings' => Borrowings::where('status', 'returned')->latest()->get()
    ]);
})->middleware('auth');

Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store']);

Route::get('/signin', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/signin', [LoginController::class, 'authenticate']);
Route::post('/signout', [LoginController::class, 'signout']);

Route::resource('/borrowings', BorrowingsController::class)->middleware('auth');
Route::resource('/books', BooksController::class)->middleware('auth');
Route::resource('/categories', CategoriesController::class)->middleware('auth');
Route::resource('/students', StudentsController::class)->middleware('auth');
Route::resource('/admins', AdminsController::class)->middleware('admin');
