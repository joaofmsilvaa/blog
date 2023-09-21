<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can sessions web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('register', [RegisterController::class, 'create']);
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('profile/{user}', [UserController::class, 'create']);
Route::get('/profile/{user}/edit', [UserController::class, 'edit'])->middleware('editProfile');
Route::patch('/profile/{user}/update', [UserController::class, 'update'])->middleware('editProfile');

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts/publish', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('posted', 'addView');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::patch('/posts/{post}', [PostController::class, 'publish'])->name('posts.publish');


Route::post('posts/{post:slug}/comments', [CommentController::class, 'store']);
Route::delete('/posts/comments/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::get('/admin/posts', [AdminController::class, 'indexPosts'])->middleware('admin');
Route::get('/admin/posts/{post}/edit', [AdminController::class, 'editPost'])->middleware('admin');
Route::patch('/admin/posts/{post}', [AdminController::class, 'updatePost'])->middleware('admin');
Route::delete('/admin/posts/{post}', [AdminController::class, 'destroyPost'])->middleware('admin');

Route::get('/admin/categories', [AdminController::class, 'indexCategories'])->middleware('admin');
Route::get('/admin/categories/{category}/edit', [AdminController::class, 'editCategory'])->middleware('admin');
Route::delete('/admin/categories/{category}', [AdminController::class, 'destroyCategory'])->middleware('admin');
Route::patch('/admin/categories/{category}', [AdminController::class, 'updateCategory'])->middleware('admin');

Route::get('/admin/users', [AdminController::class, 'indexUsers'])->middleware('admin');
Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->middleware('admin');
