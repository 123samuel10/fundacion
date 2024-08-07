<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HistorialController extends Controller
{



    public function index(){
        // Filtrar los posts que no son creados por el admin
        $posts = Post::whereHas('user', function($query) {
            $query->where('usertype', '!=', 'admin');
        })->get();

        return view('historial.index', compact('posts'));
}

public function destroy($post){
    $post=Post::find($post);
    $post->delete();
    return redirect('/historial');
   }
}
