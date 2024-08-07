<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
            // Filtrar los posts que no son creados por el admin
            $posts = Post::whereHas('user', function($query) {
                $query->where('usertype', '!=', 'admin');
            })->get();

            return view('clientes.index', compact('posts'));
    }

    public function create()
    {

        $categorias = Categoria::all();
        // Pasar las categorías a la vista
        return view('clientes.create',compact('categorias'));



    }
    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = Auth::id(); // Usa el ID del usuario autenticado
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category = $request->category;

        $post->save();

        return redirect('/users')->with('message', 'Post creado exitosamente');
    }
}
