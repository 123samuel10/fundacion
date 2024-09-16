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
use Spatie\ImageOptimizer\OptimizerChainFactory;
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
          // Validar los datos del request
          $request->validate([
              'user_id' => 'required|string',
              'title' => 'required|string|max:255',
              'body' => 'required|string',
              'category' => 'required|string',
              'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
              'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
          ]);

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

          // Verificar si el formulario contiene una imagen principal
          if ($request->hasFile('image_url')) {
              // Almacenar la imagen principal en el directorio especificado con el disco 'public'
              $imagePath = $request->file('image_url')->store($path, 'public');

              // Optimizar la imagen
              $optimizer = OptimizerChainFactory::create();
              $optimizer->optimize(storage_path('app/public/' . $imagePath));

              // Actualizar el campo image_url del post con la ruta completa
              $post->image_url = $imagePath;
          }

          // Verificar si el formulario contiene imágenes adicionales
          if ($request->hasFile('additional_images')) {
              $additionalImages = [];

              foreach ($request->file('additional_images') as $file) {
                  // Almacenar cada imagen adicional en el mismo directorio
                  $additionalImagePath = $file->store($path, 'public');

                  // Optimizar la imagen adicional
                  $optimizer = OptimizerChainFactory::create();
                  $optimizer->optimize(storage_path('app/public/' . $additionalImagePath));

                  // Agregar la ruta de la imagen adicional a la lista
                  $additionalImages[] = $additionalImagePath;
              }

              // Guardar todas las rutas de imágenes adicionales en un campo del post
              $post->additional_images = json_encode($additionalImages);
          }

          // Guardar el post nuevamente con la ruta de la imagen principal y las imágenes adicionales
          $post->save();

          // Redirigir con un mensaje de éxito
          return redirect('/posts')->with('message', 'Post creado exitosamente');
      }
    //   public function store(Request $request)
    //   {
    //       // Crear un nuevo post y asignar los valores del request
    //       $post = new Post();
    //       $post->user_id = $request->user_id;
    //       $post->title = $request->title;
    //       $post->body = $request->body;
    //       $post->category = $request->category;
    //       $post->date_time = now(); // Establecer la fecha y hora actual

    //       // Guardar el post inicialmente para obtener el ID
    //       $post->save();
    //       $postId = $post->id;

    //       // Definir el path donde se guardarán las imágenes del post
    //       $path = 'images/' . $postId;
    //       Storage::makeDirectory($path); // Crear el directorio para las imágenes del post

    //       // Verificar si el formulario contiene una imagen principal
    //       if ($request->hasFile('image_url')) {
    //           // Almacenar la imagen principal en el directorio especificado con el disco 'public'
    //           $imagePath = $request->file('image_url')->store($path, 'public');

    //           // Actualizar el campo image_url del post con la ruta completa
    //           $post->image_url = $imagePath;
    //       }

    //       // Guardar el post nuevamente con la ruta de la imagen principal
    //       $post->save();


    //   }
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
      public function update(Request $request, $postId)
      {
          $post = Post::findOrFail($postId);

          // Validar los datos del request
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
              // Eliminar la imagen anterior si existe
              if ($post->image_url) {
                  Storage::delete('public/' . $post->image_url);
              }
              // Almacenar la nueva imagen principal
              $post->image_url = $request->file('image_url')->store('images/' . $post->id, 'public');

              // Optimizar la nueva imagen
              $optimizer = OptimizerChainFactory::create();
              $optimizer->optimize(storage_path('app/public/' . $post->image_url));
          }

          // Manejo de imágenes adicionales
          if ($request->hasFile('additional_images')) {
              // Eliminar las imágenes adicionales anteriores
              if ($post->additional_images) {
                  $existingImages = json_decode($post->additional_images);
                  foreach ($existingImages as $image) {
                      Storage::delete('public/' . $image);
                  }
              }

              $additionalImages = [];
              foreach ($request->file('additional_images') as $image) {
                  $path = $image->store('images/' . $post->id, 'public');

                  // Optimizar la imagen adicional
                  $optimizer = OptimizerChainFactory::create();
                  $optimizer->optimize(storage_path('app/public/' . $path));

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

    // public function updateImage($post)
    // {
    //     $post->save();

    //     return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente');
    //  }

}
// este es
