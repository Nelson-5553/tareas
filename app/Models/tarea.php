<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarea extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'descripcion', 'id_category'];
    public function Category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

}
