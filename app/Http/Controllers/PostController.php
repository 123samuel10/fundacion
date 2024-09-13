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
        // Crear un nuevo post y asignar los valores del request
    $post = new Post();
    $post->user_id = $request->user_id;
    $post->title = $request->title;
    $post->body = $request->body;
    $post->category = $request->category;
    $post->date_time = now(); // Establecer la fecha y hora actual

    // Guardar el post inicialmente para obtener el ID
    $post->save();
    $postId = $post->id;

    // Definir el path donde se guardarán las imágenes del post
    $path = 'images/' . $postId;
    Storage::makeDirectory($path); // Crear el directorio para las imágenes del post
    chmod(storage_path('app/'.$path),0755);

    // Verificar si el formulario contiene una imagen principal
    if ($request->hasFile('image_url')) {
        // Almacenar la imagen en el directorio especificado con el disco 'public'
        $imagePath = $request->file('image_url')->store($path, 'public');

        // Actualizar el campo image_url del post con la ruta completa
        $post->image_url = $imagePath;
    }

    // Guardar el post nuevamente con la ruta de la imagen
    $post->save();

    // Redirigir con un mensaje de éxito
    return redirect('/posts')->with('message', 'Post creado exitosamente');

    }
    // public function store(Request $request)
//     {
//        $post = new Post();
//        $post->user_id = $request->user_id;
//        $post->title = $request->title;
//        $post->body = $request->body;
//        $post->category = $request->category;
//        $post->date_time = now(); // Establece la fecha y hora actual

//        $post->save();
//        $postId = $post->id;
//        $path = '/images/'.$postId;
//        Storage::makeDirectory($path);

//    // Verifica si el formulario tiene un archivo de imagen principal
//        if ($request->hasFile('image_url')) {
//            $post->image_url = $request->file('image_url')->store($path, 'public');
//        }

//        $post->image_url = $path . '/' . $request->file('image_url')->getFilename();
//        $post->save();


//    return redirect('/posts')->with('message', 'Post creado exitosamente');

//    }

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
            'user_id' => 'required|string',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $post->user_id = $request->input('user_id');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category = $request->input('category');

        // Manejo de la imagen principal
        if ($request->hasFile('image_url')) {
            if ($post->image_url) {
                Storage::delete('public/' . $post->image_url);
            }
            $post->image_url = $request->file('image_url')->store('uploads', 'public');
        }

    // Manejo de imágenes adicionales
        if ($request->hasFile('additional_images')) {
            $additionalImages = [];
            foreach ($request->file('additional_images') as $image) {
                $path = $image->store('uploads', 'public');
                $additionalImages[] = $path;
            }
            $post->additional_images = json_encode($additionalImages); // Actualiza las rutas en formato JSON
        }

        $post->save();

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

    public function updateImage($post)
    {


        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente');
     }

}
// este es
