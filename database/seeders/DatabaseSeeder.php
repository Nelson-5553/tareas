<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\tarea;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $tarea = new tarea();

       $tarea->name = "Cirugia";   
       $tarea->descripcion="Coputador de jefe marelvis no internet";

       $tarea->save();
    }

    
}
