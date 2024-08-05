<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
      // Relación con el modelo Cliente
      public function Categoria()
      {
        return $this->belongsTo(Categoria::class,'category');
      }



}
