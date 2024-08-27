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
    return view('welcome');
});


// Route::get('/todo', function () {
//      return view('tareas.new')->name('tareas');;
//  });

Route::get('Mostrar/Todo', [TareasController::class, 'tareas' ])->name('tarea');

 route::get('Mostrar/tarea', [TareasController::class,'index'])->name('Todo');

Route::get('Mostrar/tablas',[TareasController::class,'visualizar'])->name('Tablasrr');

route::post('tareas', [TareasController::class,'store'])->name('tarea.store');

Route::get('Mostrar/tablas/{tarea}', [TareasController::class, 'edit' ])->name('tareas.edit');

Route::put('Mostrar/actualizar/{tarea}', [TareasController::class, 'update'] )->name('tarea.update');

Route::delete('tareas/{tarea}', [TareasController::class, 'destroy'])->name('tarea.destroy');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
