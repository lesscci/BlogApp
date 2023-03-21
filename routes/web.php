<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;


//RUTAS PÚBLICAS
Route::get('/', function () {
    return view('muro',[
    'posts' => Post::where('active', true)->get()
    ]);
});


//RUTAS PRIVADAS
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//POSTS
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//vista
Route::get('/posts/{id}', [PostController::class, 'view'])->name('posts.view');
Route::get('/perfil',[ProfileController::class, 'view'])->name('perfil');


//Borrar
Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//Editar post
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
//Actualizar
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

//Comenarios
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

//Valoracion
Route::post('/posts/{post}/rate', 'App\Http\Controllers\PostController@rate')->name('posts.rate');

//Buscador
Route::get('/posts/search', [App\Http\Controllers\PostController::class, 'search'])->name('posts.search');


Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//Admin
Route::get('/admin', [AdminController::class, 'showDatos'])->name('datos.admin');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
