<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\UserPostController;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post');

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/authors/{author:username}', function (User $author) {
    return view('author', [
        'posts' => $author->posts
    ]);
})->name('author');

Route::get('register', [RegisteredUserController::class, 'create'])->middleware('guest');
Route::post('register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('user/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('user/posts', [PostController::class, 'store'])->middleware('auth');
Route::get('user/posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::patch('user/posts/{post}', [PostController::class, 'update'])->middleware('auth');
Route::delete('user/posts/{post}', [PostController::class, 'destroy'])->middleware('auth');

Route::get('user/comments/{comment}/edit', [PostCommentsController::class, 'edit'])->middleware('auth');
Route::patch('user/comments/{comment}', [PostCommentsController::class, 'update'])->middleware('auth');
Route::delete('user/comments/{comment}', [PostCommentsController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
