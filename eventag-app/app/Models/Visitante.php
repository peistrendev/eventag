<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $table = 'visitante';
    protected $fillable = ['document','name',  'phone','email','location', 'razon','evento_id'];

     public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function expositor()
    {
        return $this->belongsToMany(Expositor::class, 'visitantexexpositor');
    }
}
