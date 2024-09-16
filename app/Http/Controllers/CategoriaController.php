<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categories.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * Crea una nueva categoría, guarda la imagen y optimiza la imagen usando Spatie.
     */
    public function store(Request $request)
    {
        // Validar los datos del request
        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Crear una nueva categoría y asignar los valores del request
        $categoria = new Categoria();
        $categoria->name = $request->name;

        // Guardar la categoría inicialmente para obtener el ID
        $categoria->save();
        $categoriaId = $categoria->id;

        // Definir el path donde se guardará la imagen de la categoría
        $path = 'images/categories/' . $categoriaId;
        Storage::makeDirectory($path); // Crear el directorio para las imágenes de la categoría

        // Verificar si el formulario contiene una imagen principal
        if ($request->hasFile('image_url')) {
            // Almacenar la imagen principal en el directorio especificado con el disco 'public'
            $imagePath = $request->file('image_url')->store($path, 'public');

            // Optimizar la imagen
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize(storage_path('app/public/' . $imagePath));

            // Actualizar el campo image_url de la categoría con la ruta completa
            $categoria->image_url = $imagePath;
        }

        // Guardar la categoría nuevamente con la ruta de la imagen principal
        $categoria->save();

        // Redirigir con un mensaje de éxito
        return redirect('/categories')->with('message', 'Categoría creada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect('/categories');
    }
}
