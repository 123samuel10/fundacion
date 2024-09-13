<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserType;
use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//TUTAS Publicas
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user/create',[PostController::class,'create'])->name('user.index');
// Route::get('/user', [UserController::class, 'index'])->name('user.index');


Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/', [PostController::class, 'index2']);
Route::get("/posts/create",[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.delete');

Route::get('/posts/{post}/edit',[PostController::class,'edit']);
Route::put('/posts/{post}',[PostController::class,'update']);


Route::get('/categories',[CategoriaController::class,'index'])->name('categories.index');
Route::get('/categories/create',[CategoriaController::class,'create'])->name('categories.create');
Route::post('/categories',[CategoriaController::class,'store'])->name('categories.store');
Route::delete('categories/{categoria}',[CategoriaController::class,'destroy']);



Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);


Route::get('/historial',[HistorialController::class,'index'])->name('historial.index');
Route::delete('historial/{historial}',[HistorialController::class,'destroy'])->name('historial.delete');

Route::get('/home',[HomeController::class,'index'])->name('home.index');


Route::get('/noticias',[NoticiasController::class,'index'])->name('noticias.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


//Rutas privadas
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta general que redirige al dashboard específico del usuario
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Ruta específica para el dashboard del admin
    Route::get('/dashboard/admin', function () {
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return app(DashboardController::class)->admin();
        }
        return redirect('/');
    })->name('admin.dashboard');

    // Ruta específica para el dashboard del usuario
    Route::get('/dashboard/user', function () {
        if (Auth::check() && Auth::user()->usertype === 'user') {
            return app(DashboardController::class)->user();
        }
        return redirect('/');
    })->name('user.dashboard');
});
require __DIR__.'/auth.php';

Route::get('/pull', function () {
    // Ejecutar un comando en Linux
    if(shell_exec('git pull --rebase')){
        return "Actualizado";
    }
    else{
        return "Oops, algo ocurrió";
    }
});
