<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\PostController;

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

Route::get('/authors/{author:username}', function (User $author) {
    return view('author', [
        'posts' => $author->posts
    ]);
})->name('author');

Route::get('register', [RegisteredUserController::class, 'create'])->middleware('guest');
Route::post('register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
