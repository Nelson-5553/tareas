<?php

use App\Http\Controllers\TareasController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
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
    return view('welcome');
});


// Route::get('/todo', function () {
//      return view('tareas.new')->name('tareas');;
//  });


//Rutas inicio de sesion

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware('auth')->group(function () {

    // Mostrar lista de tareas
    Route::get('tareas', [TareasController::class, 'index'])->name('tarea.index');

    // Crear una nueva tarea
    Route::post('tareas/store', [TareasController::class, 'store'])->name('tarea.store');

    // Actualizar estado de tarea (completar)
    Route::patch('tareas/{tarea}/completar', [TareasController::class, 'CompletedFinished'])->name('tarea.completed');

    // Editar tarea
    Route::get('tareas/{tarea}/editar', [TareasController::class, 'edit'])->name('tareas.edit');

    // Mostrar una tarea específica
    Route::get('tareas/{tarea}', [TareasController::class, 'show'])->name('tareas.show');

    // Actualizar tarea
    Route::put('tareas/{tarea}', [TareasController::class, 'update'])->name('tarea.update');

    // Eliminar tarea
    Route::delete('tareas/{tarea}', [TareasController::class, 'destroy'])->name('tarea.destroy');
});



//Rutas para categorias
Route::middleware('auth')->group(function () {
//Mostrar lista de Categorias
Route::get('Mostrar/Categoria/Visualizar', [CategoryController::class,'visualizar' ])->name('category');

//Guardar Nuevas Categorias
Route::post('tipo', [CategoryController::class,'store'])->name('store.categorias');

//Editar Cateorias
Route::get('Mostrar/Categoria/{categoria}', [CategoryController::class, 'edit'])->name('categoria.edit');

//Ver informacion de la categoria
Route::get('Mostrar/shows/{categoria}', [CategoryController::class, 'show'])->name('categoria.show');

//Actualizar categoria
Route::put('Mostrar/Actualizar/{categoria}', [CategoryController::class, 'update'])->name('categoria.update');

//Eliminar Categoria
Route::delete('Mostrar/{categoria}', [CategoryController::class, 'destroy'])->name('categoria.destroy');
});


