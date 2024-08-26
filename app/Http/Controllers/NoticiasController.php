<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function index()
    {
        // Obtener la categoría "Home"
        $homeCategory = Categoria::where('name', 'Home')->first();

        if ($homeCategory) {
            // Obtener posts de administradores, excluyendo la categoría "Home"
            $adminPosts = Post::whereHas('user', function($query) {
                $query->where('usertype', 'admin');
            })->whereHas('categoria', function($query) use ($homeCategory) {
                $query->where('id', '!=', $homeCategory->id);
            })->with('categoria')->get();

            // Obtener posts de usuarios que no son administradores, excluyendo la categoría "Home"
            $userPosts = Post::whereHas('user', function($query) {
                $query->where('usertype', '!=', 'admin');
            })->whereHas('categoria', function($query) use ($homeCategory) {
                $query->where('id', '!=', $homeCategory->id);
            })->with('categoria')->get();
        } else {
            // Si la categoría "Home" no se encuentra, obtener todos los posts
            $adminPosts = Post::whereHas('user', function($query) {
                $query->where('usertype', 'admin');
            })->with('categoria')->get();

            $userPosts = Post::whereHas('user', function($query) {
                $query->where('usertype', '!=', 'admin');
            })->with('categoria')->get();
        }

        $categorias = Categoria::all();
        return view('noticias.index', compact('adminPosts', 'userPosts', 'categorias'));
    }
}
