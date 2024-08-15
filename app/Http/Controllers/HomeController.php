<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener posts de administradores con categoría 'Home'
        $adminPosts = Post::whereHas('user', function ($query) {
            $query->where('usertype', 'admin');
        })->whereHas('categoria', function ($query) {
            $query->where('name', 'Home');
        })->with('categoria')->get();

        // Obtener posts de usuarios que no son administradores con categoría 'Home'
        $userPosts = Post::whereHas('user', function ($query) {
            $query->where('usertype', '!=', 'admin');
        })->whereHas('categoria', function ($query) {
            $query->where('name', 'Home');
        })->with('categoria')->get();

        $categorias = Categoria::all();
        return view('home.index', compact('adminPosts', 'userPosts', 'categorias'));
    }
}
