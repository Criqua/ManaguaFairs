<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin',
        'hora_inicio', 'hora_fin', 'lugar'
    ];

    public function emprendedores()
    {
        return $this->belongsToMany(Emprendedor::class);
    }
    
}
