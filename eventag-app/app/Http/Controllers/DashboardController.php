<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Visitante;
use App\Models\Evento;
use App\Models\Expositor;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function dash(Request $request)
    {
        // Si se logueo como expositor e intenta acceder a una vista administrador lo rechaza
        if (Auth::user()->rol_id != 1) {
            return redirect('/login')->with('error', 'Acceso denegado.');
        }

        $eventoId = $request->input('eventos');
        $mes = (int) $request->input('mes', now()->month); // Mes seleccionado, por defecto el actual

        // CANTIDAD DE EXPOSITORES REGISTRADOS EN EL SISTEMA
        $userEx = Expositor::where('evento_id', $eventoId)->count();

        // CANTIDAD DE USUARIOS ADMINISTRADORES REGISTRADOS EN EL SISTEMA
        $userAd = Usuarios::where('rol_id', 1)->count();

        // OBTENER EL ID DEL EVENTO CON MAS VISITANTES
        $evenVisi = Visitante::select('evento_id', DB::raw('count(*) as visitor_count'))
            ->groupBy('evento_id')->orderBy('visitor_count', 'desc')->value('evento_id');

        // NOMBRE DEL EVENTO CON MAS VISITANTES
        $eventSelect = Evento::where('id', $eventoId)->value('name');

        // CANTIDAD DE VISITANTES EN EL EVENTO MAS VISITADO
        $visi = Visitante::where('evento_id', $eventoId)->count();

        // VISITANTES POR DÍA DEL MES SELECCIONADO (datos reales para la gráfica)
        $now = now(); // Usa Carbon para fecha actual
        $year = $now->year; // Usar el año actual (puedes ajustar si necesitas años dinámicos)
        $diaMes = now()->setYear($year)->setMonth($mes)->daysInMonth; // Días en el mes seleccionado

        // Si es el mes actual, limita hasta hoy; de lo contrario, todos los días
        $maxDay = ($mes == $now->month) ? $now->day : $diaMes;

        $visitantesPorDia = DB::table('visitante') // Ajusta el nombre de la tabla si es necesario (ej: 'visitantes')
            ->select(
                DB::raw('DAY(created_at) as dia'), // Solo el día del mes (1, 2, 3, etc.)
                DB::raw('COUNT(*) as total_visitantes')
            )
            ->where('evento_id', $eventoId)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $mes) // Filtrar por el mes seleccionado
            ->groupBy('dia')
            ->orderBy('dia', 'asc') // Orden ascendente para coincidir con etiquetas de la gráfica
            ->get();

        // ACTIVIDADES REGISTRADAS SEGUN EL EVENTO SELECCIONADO
        $acti = Actividad::where('evento_id', $eventoId)->orderBy('start_date', 'asc')
            ->orderBy('hour', 'asc')->paginate(4);

        // CANTIDAD DE ACTIVIDADES REGISTRADAS SEGUN EL EVENTO SELECCIONADO
        $actiTot = Actividad::where('evento_id', $eventoId)->count();

        // NOMBRE DEL EVENTO EN LA ACTIVIDAD
        $eventoAct = Evento::find($eventoId);

        // CONSULTAR TODOS LOS EVENTOS REGISTRADOS EN EL SISTEMA
        $event = Evento::all();

        return view('eventos.dash', compact('userEx', 'userAd', 'visi', 'evenVisi', 'eventSelect', 'acti', 'actiTot', 'eventoAct', 'visitantesPorDia', 'diaMes', 'mes', 'event', 'maxDay'));
    }
}