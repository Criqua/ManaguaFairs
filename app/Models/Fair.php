<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fair extends Model
{
    protected $fillable = [
        'name', 'description', 'event_date', 'location'
    ];

    public function entrepreneurs()
    {
        return $this->belongsToMany(Entrepreneur::class);
    }
    
}
