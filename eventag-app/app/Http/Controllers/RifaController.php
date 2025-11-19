<?php
namespace App\Http\Controllers;


use App\Models\Visitante;
use App\Models\Evento;
use App\Models\Expositor;


class RifaController extends Controller
{
public function index()
    {
        $eventid = request()->get('evento_id');
        
        
        // Obtiene todos los visitantes con id y nombre
        $visitantes = Visitante::where('evento_id', $eventid)->select('id', 'name')->get();
        
        // Obtener el evento específico
        $event = Evento::find($eventid);
        
        // Obtener expositores relacionados con este evento
        $expositores = $event->expositores ?? collect(); // Asumiendo que tienes una relación

        $nameExpositor = Expositor::where('id',request()->get('id'))->where('evento_id',$eventid)->get();
        
        return view('rifa.rifa', compact('visitantes', 'eventid', 'event', 'nameExpositor'));
    }
}
