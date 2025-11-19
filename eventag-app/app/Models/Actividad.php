<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    
    protected $table = 'actividad';

    protected $fillable = ['name', 'description', 'start_date', 'hour','location','author', 'evento_id'];

     public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
