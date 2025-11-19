<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $fillable = ['name'];

    public function usuarios(){
        return $this->belongsTo(Usuarios::class);
    }
}
