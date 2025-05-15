<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Entrepreneur extends Model
{
    protected $fillable = [
        'name', 'phone', 'category', 'description'
    ];

    public function fairs()
    {
        return $this->belongsToMany(Fair::class);
    }    
}