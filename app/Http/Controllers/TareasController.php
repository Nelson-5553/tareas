<?php


namespace App\Http\Controllers;
use App\Http\Requests\StoreTarea;
use App\Http\Requests\UpdateTarea;
use App\Models\tarea;
use Illuminate\Http\Request;

class TareasController extends Controller
{

    public function index(){

        $tareas = Tarea::all();
        return view("tareas.new",compact("tareas"));

    }

    public function store(StoreTarea $request){

        // $tarea= new tarea();

        // $tarea->name=$request->name;
        // $tarea->descripcion=$request->descripcion;

        // $tarea->save();

        $tarea = Tarea::create(request()->all());

        return redirect()->route('tarea.index')->with("success","Tarea guardada correctamente");

    }
    public function edit(Tarea $tarea){
        return view('tareas.actualizar',compact('tarea'));
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


