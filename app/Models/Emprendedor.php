<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Emprendedor extends Model
{
    protected $fillable = [
        'nombre', 'rubro', 'descripcion', 'contacto', 'feria_id'
    ];

    public function ferias()
    {
        return $this->belongsToMany(Feria::class);
    }    
}