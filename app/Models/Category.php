<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function tareas()
    {
        return $this->hasMany(tarea::class, 'id_category');
    }
}
