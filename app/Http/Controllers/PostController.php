<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PostController extends Controller
{
      /**
     * Display a listing of the resource.
     */

     public function index()

     {
         // Solo obtener posts de administradores
         $posts = Post::whereHas('user', function($query) {
             $query->where('usertype', 'admin');
         })->with('categoria')->get();

         $categorias = Categoria::all();
         return view('posts.index', compact('posts', 'categorias'));
     }

     public function index2()

 {
             return view('welcome');

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

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads', 'public');
                $post->images()->create(['image_url' => $path]);
            }
        }

        return redirect('/posts')->with('message', 'Post creado exitosamente');

     }

     public function edit($id)
 {
     $post = Post::findOrFail($id);
     $categorias = Categoria::all();
     return view('posts.edit', compact('post', 'categorias'));
 }
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, $post)
     {
        $post = Post::findOrFail($post);

        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $post->user_id = $request->input('user_id');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category= $request->input('category');

        // Manejo de la imagen principal
        if ($request->hasFile('image')) {
            // Elimina la imagen existente si hay una
            if ($post->image_url) {
                Storage::delete('public/' . $post->image_url);
            }

            $image = $request->file('image');
            $imagePath = $image->store('posts', 'public');
            $post->image_url = $imagePath;
        }

        $post->save();

        // Manejo de las imágenes adicionales
        if ($request->hasFile('images')) {
            foreach ($post->images as $image) {
                Storage::delete('public/' . $image->image_url);
                $image->delete();
            }

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('posts', 'public');
                $post->images()->create(['image_url' => $imagePath]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente');
     }

     /**
      * Remove the specified resource from storage.
      */
     public function destroy($post){
         $post=Post::find($post);
         $post->delete();
         return redirect('/posts');
        }


       public function show($id)
{
    $post = Post::with('images')->findOrFail($id); // Cargar imágenes junto con el post
    return view('posts.show', compact('post'));
}
}
