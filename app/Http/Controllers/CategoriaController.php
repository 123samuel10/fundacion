<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->id=$request->id;
        $categoria->name=$request->name;


        if ($request->hasFile('image_url')) {
            $categoria->image_url = $request->file('image_url')->store('uploads', 'public');
        }

        $categoria->save();

        return redirect("/categories");
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
