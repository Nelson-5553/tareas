<?php


namespace App\Http\Controllers;
use App\Http\Requests\StoreTarea;
use App\Http\Requests\UpdateTarea;
use App\Models\tarea;
use App\Models\Category;
use Illuminate\Http\Request;


class TareasController extends Controller
{

    public function index()
    {
        $tareas = Tarea::with('Category') // Relación con la categoría
        ->where('user_id', auth()->id()) // Filtrar por el usuario autenticado
        ->get(); // Obtener los resultados

        $category = Category::where('user_id', auth()->id())->get(); // Opcional: Filtrar categorías por usuario autenticado

        return view("tareas.new", compact("tareas", "category"));
    }

    public function store(StoreTarea $request)
    {
        // Crear la tarea y asociar la categoría seleccionada
        $tarea = new Tarea();

        $tarea->name = $request->name;            // Asignar nombre de la tarea
        $tarea->descripcion = $request->descripcion; // Asignar descripción de la tarea
        $tarea->id_category = $request->id_category;  // Asignar la categoría seleccionada
        $tarea->user_id = auth()->id();

        $tarea->save();  // Guardar la tarea

        return redirect()->route('tarea.index')->with('success', 'Tarea guardada correctamente');
    }

    public function edit(Tarea $tarea)
    {
        $tarea->load('Category'); // Carga las relaciones solo para la tarea seleccionada
        $category = Category::all(); // Todas las categorías para el formulario

        return view('tareas.actualizar', compact('tarea', 'category'));
    }

    public function show(Tarea $tarea)
    {
        $tarea->load('Category'); // Carga las relaciones solo para la tarea seleccionada
        $category = Category::all(); // Todas las categorías para el formulario

        return view('tareas.tareasShow', compact('tarea', 'category'));
    }


    public function update(UpdateTarea $request, Tarea $tarea){

        // $tarea->name= $request->name;
        // $tarea->descripcion=$request->descripcion;
        // $tarea->save();
        $tarea->update($request->all());
        return redirect()->route("tarea.index");
    }

    public function destroy(Tarea $tarea){

        $tarea->delete();

         return redirect()->route("tarea.index")->with("success","Eliminado correctamente");

    }

}


