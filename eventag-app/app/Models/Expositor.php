<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expositor extends Model
{
    protected $table = 'expositor';
    protected $fillable = ['name', 'description', 'logo','location','phone', 'email', 'pagina_web','prod_ofrece','prod_demanda', 'tipo','evento_id','user_id'];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

     public function visitante()
    {
        return $this->belongsToMany(Visitante::class, 'visitantexexpositor');
    }
      public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'user_id');
    }
}
