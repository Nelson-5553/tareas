<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tarea;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Category = Category::where('user_id', auth()->id())->get();

        return view("categorias.categoria");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Category = new Category();

        $Category->name = $request->name;
        $Category->color = $request->color;
        $Category->user_id = auth()->id();

        $Category->save();

        return redirect()->route("category")->with("success","Cagtegoria guardada correctamente");

    }

    public function visualizar(){

        $category = Category::where('user_id', auth()->id())->get();
        $tareas = Category::with('tareas')->get();
        return view("categorias.categoria", compact("category","tareas"));


    }
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categoria)
    {
//        dd($categoria);
        return view("categorias.CategoriaUpdate", compact('categoria'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $categoria)
    {
        $categoria -> name = $request->name;
        $categoria -> color = $request->color;

        $categoria -> save();

        return redirect()->route("category")->with("success", "Actualizado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categoria)
    {
        $categoria-> delete();
//        $categoria->tareas()->delete();

        return redirect()->route('category')->with("success", "Eliminado correctamente");
    }
}
