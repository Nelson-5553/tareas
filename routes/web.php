<?php

use App\Http\Controllers\TareasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('tareas.new');
});


route::get('Mostrar/tarea', [TareasController::class,'index'])->name('Todo');

Route::get('Mostrar/tablas',[TareasController::class,'visualizar'])->name('Tablasrr');

Route::get('Mostrar/categorias', [TareasController::class, 'categorias' ])->name('categoria');

route::post('tareas', [TareasController::class,'store'])->name('tarea.store');

Route::get('Mostrar/tablas/{tarea}', [TareasController::class, 'edit' ])->name('tareas.edit');

Route::put('Mostrar/actualizar/{tarea}', [TareasController::class, 'update'] )->name('tarea.update');

Route::delete('tareas/{tarea}', [TareasController::class, 'destroy'])->name('tarea.destroy');

