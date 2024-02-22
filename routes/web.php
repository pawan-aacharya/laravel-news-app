<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\NewsController as FrontendNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/', function () {
//     return view('frontend.index');
// })->name('frontend.index');

// Route::get('/admin/login', [UserController::class, 'index'])->name('admin.login');
// ROute::post('/login', [UserController::class, 'login'])->name('login');

// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('dashboard.admin.index');
//     })->name('admin.dashboard');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard',[NewsController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/categories', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::Get('/category/activeinactive/{id}', [CategoryController::class, 'activeInactive'])->name('category.activeinactive');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/events/show', [NewsController::class, 'index'])->name('events');
    Route::get('/event/create', [NewsController::class, 'create'])->name('event.create');
    Route::post('/event/create', [NewsController::class, 'store'])->name('event.store');
    Route::get('/event/edit/{id}', [NewsController::class, 'edit'])->name('event.edit');
    Route::post('/event/edit/{id}', [NewsController::class, 'update'])->name('event.update');
    Route::get('/event/delete/{id}', [NewsController::class, 'delete'])->name('event.delete');

    Route::get('/users', [UserController::class, 'view'])->name('users.view');
    Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('user.detail');
    Route::get('/user-trash', [UserController::class, 'trashed_user'])->name('trash.users');
    Route::get('/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'force_delete'])->name('force.delete');
});

Route::get('/', [FrontendNewsController::class, 'index'])->name('frontend.index');
Route::get('/single-post/{id}', [FrontendNewsController::class, 'singlePost'])->name('frontend.single-post');
Route::get('/news/about', [FrontendNewsController::class, 'about'])->name('frontend.about');
Route::get('/news/contact', [FrontendNewsController::class, 'contact'])->name('frontend.contact');
Route::get('/news/category/{id}', [FrontendNewsController::class, 'category'])->name('frontend.category');
Route::post('/news/comment', [FrontendNewsController::class, 'comment'])->name('comment.store');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
    Route::get('/login', [AuthController::class, 'view'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
