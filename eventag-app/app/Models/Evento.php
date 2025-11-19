<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $fillable = ['name', 'description', 'location', 'logo', 'start_date', 'finish_date'];

    public function expositores()
    {
        return $this->hasMany(Expositor::class, 'evento_id');
    }

     public function actividad()
    {
        return $this->hasMany(Actividad::class, 'evento_id');
    }

     public function visitante()
    {
        return $this->hasMany(Visitante::class, 'evento_id');
    }
}
