<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function index()

    {

                // Obtener posts de administradores
                $adminPosts = Post::whereHas('user', function($query) {
                    $query->where('usertype', 'admin');
                })->with('categoria')->get();

                // Obtener posts de usuarios que no son administradores
                $userPosts = Post::whereHas('user', function($query) {
                    $query->where('usertype', '!=', 'admin');
                })->with('categoria')->get();

                $categorias = Categoria::all();
                return view('noticias.index', compact('adminPosts', 'userPosts', 'categorias'));


    }
}
