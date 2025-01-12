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


// Rutas de las tareas...

route::get('Mostrar/tarea', [TareasController::class,'index'])->name('tarea.index');

route::post('tareas', [TareasController::class,'store'])->name('tarea.store');

Route::get('Mostrar/edit/{tarea}', [TareasController::class, 'edit' ])->name('tareas.edit');

Route::get('Mostrar/show/{tarea}', [TareasController::class, 'show' ])->name('tareas.show');

Route::put('Mostrar/actualizar/{tarea}', [TareasController::class, 'update'] )->name('tarea.update');

Route::delete('tareas/{tarea}', [TareasController::class, 'destroy'])->name('tarea.destroy');

//Rutas para categorias

Route::get('Mostrar/Categoria', [CategoryController::class, 'index'])->name('categorias');

Route::get('Mostrar/Categoria/Visualizar', [CategoryController::class,'visualizar' ])->name('category');

Route::post('tipo', [CategoryController::class,'store'])->name('store.categorias');

Route::get('Mostrar/Categoria/{categoria}', [CategoryController::class, 'edit'])->name('categoria.edit');

Route::put('Mostrar/Actualizar/{categoria}', [CategoryController::class, 'update'])->name('categoria.update');

Route::delete('Mostrar/{categoria}', [CategoryController::class, 'destroy'])->name('categoria.destroy');



