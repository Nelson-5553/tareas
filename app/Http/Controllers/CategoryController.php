<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Category = Category::all();

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

        $Category->save();

        return redirect()->route("category")->with("success","Cagtegoria guardada correctamente");

    }

    public function visualizar(){

        $category = Category::all();

        return view("categorias.categoria", compact("category"));


    }
    public function show(string $id)
    {
        //
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

        return redirect()->route("category");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categoria)
    {
        $categoria-> delete();

        return redirect()->route('category')->with("succes", "Eliminado correctamente");
    }
}
