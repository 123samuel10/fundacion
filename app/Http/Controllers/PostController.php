<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

            // Obtener posts de administradores
            $adminPosts = Post::whereHas('user', function($query) {
                $query->where('usertype', 'admin');
            })->with('categoria')->get();

            // Obtener posts de usuarios que no son administradores
            $userPosts = Post::whereHas('user', function($query) {
                $query->where('usertype', '!=', 'admin');
            })->with('categoria')->get();

            $categorias = Categoria::all();
            return view('welcome', compact('adminPosts', 'userPosts', 'categorias'));
    // $posts = Post::with('categoria')->get();

    // return view('welcome', compact('posts'));

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
        //-------------------------------------------

        // $nombre=$request->file('image_url')->getClientOriginalName();

        // $ruta=storage_path().$nombre;
        // return $ruta;
        // image::make($request->file('image_url'))->save();

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
