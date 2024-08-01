<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

//TUTAS Publicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get("/posts/create",[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.delete');

Route::get('/posts/{post}/edit',[PostController::class,'edit']);
Route::put('/posts/{post}',[PostController::class,'update']);


Route::get('/categories',[CategoriaController::class,'index'])->name('categories.index');
Route::get('/categories/create',[CategoriaController::class,'create'])->name('categories.create');
Route::post('/categories',[CategoriaController::class,'store'])->name('categories.store');
Route::delete('categories/{categoria}',[CategoriaController::class,'destroy']);


Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoriaController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas privadas
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


