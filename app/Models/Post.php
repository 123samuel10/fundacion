<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostImage;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
      // Relación con el modelo Cliente
      public function Categoria()
      {
        return $this->belongsTo(Categoria::class,'category');
      }

          // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     // Relación con el modelo PostImage
     public function images()
     {
         return $this->hasMany(PostImage::class); // Asegúrate de que PostImage sea el modelo adecuado
     }


}
