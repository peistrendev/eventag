<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitanteXExpositor extends Model
{
    protected $table = 'visitantexexpositor';
    protected $fillable = ['visitante_id','expositor_id',  'clasification','comments'];
}
