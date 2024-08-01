<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()

    {
        if (Auth::user()->email != 'coste@gmail.com') {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta sección.');
        }
        $posts = Post::all();
        $categorias = Categoria::all();
        return view('posts.index', compact('posts','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        // Pasar las categorías a la vista
        return view('posts.create', compact('categorias'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $post = new Post();
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category = $request->category;
        $post->date_time = now();

        if ($request->hasFile('image_url')) {
            $post->image_url = $request->file('image_url')->store('uploads', 'public');
        }

        $post->save();

        return redirect('/posts')->with('message', 'Post creado exitosamente');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $categorias = Categoria::all();
        // return view('posts.edit', compact('post', 'categorias'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post)
    {
        $post = Post::findOrFail($post);
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category = $request->category;
        $post->date_time = $request->date_time;

        if ($request->hasFile('image_url')) {
            // Elimina la imagen antigua si existe
            if ($post->image_url) {
                Storage::delete('public/' . $post->image_url);
            }
            // Guarda la nueva imagen
            $post->image_url = $request->file('image_url')->store('uploads', 'public');
        }

        $post->save();
        return redirect('/posts');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post){
        $post=Post::find($post);
        $post->delete();
        return redirect('/posts');
       }

}
