<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expositor;
use App\Models\Visitante;
use App\Models\Evento;
use App\Models\VisitanteXExpositor;
use App\Models\Actividad;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class VisitanteXExpositorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function evento()
    {

         if (Auth::user()->rol_id != 2) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
       $exp = request()->get('id');
       $expo = Expositor::find($exp);
       $eventexpo = Evento::find($expo->evento_id);

            

   
    
    return view('viewExpositores.eventos', compact('eventexpo', 'exp','expo'));
    }



    public function visitante()
{
    if (Auth::user()->rol_id != 2) {
        return redirect('/login')->with('error', 'Acceso denegado.');
    }

    $exp = request()->get('id');
    $event = request()->get('evento_id');
    $search = request()->get('search'); // Obtener el término de búsqueda

    // Consulta para visitantes conectados específicamente a este expositor ($visiexpo2)
    $visiexpo2 = VisitanteXExpositor::when($search, function ($query) use ($search, $exp) {
        return $query->join('visitante', 'visitantexexpositor.visitante_id', '=', 'visitante.id')
                     ->where(function ($subQuery) use ($search) {
                         $subQuery->where('visitante.name', 'like', "%{$search}%")
                                  ->orWhere('visitante.email', 'like', "%{$search}%")
                                  ->orWhere('visitante.phone', 'like', "%{$search}%")
                                  ->orWhere('visitante.document', 'like', "%{$search}%")
                                  ->orWhere('visitante.razon', 'like', "%{$search}%");
                                 
                     });
    })

    ->where('expositor_id', $exp)
    ->select('visitantexexpositor.*') // Ajusta los selects si necesitas campos de visitante aquí
    ->get();

    // Consulta principal para visitantes del expositor en el evento ($visiexpo) con paginación
    $visiexpoQuery = VisitanteXExpositor::join('expositor', 'visitantexexpositor.expositor_id', '=', 'expositor.id')
                                   ->join('visitante', 'visitantexexpositor.visitante_id', '=', 'visitante.id')
                                   ->where('visitante.evento_id', '=', $event)
                                   ->where('visitantexexpositor.expositor_id', $exp) // Filtro agregado para este expositor
                                   ->when($search, function ($query) use ($search) {
                                       return $query->where(function ($subQuery) use ($search) {
                                           $subQuery->where('visitante.name', 'like', "%{$search}%")
                                                    ->orWhere('visitante.email', 'like', "%{$search}%")
                                                    ->orWhere('visitante.phone', 'like', "%{$search}%")
                                                    ->orWhere('visitante.document', 'like', "%{$search}%")
                                                    ->orWhere('visitante.razon', 'like', "%{$search}%")
                                                    ->orWhere('visitantexexpositor.clasification', 'like', "%{$search}%")
                                                   ->orWhere('visitantexexpositor.comments', 'like', "%{$search}%");
                                       });
                                   })
                                   ->select('visitante.*'); // Selecciona los campos de visitante

    $visiexpo = $visiexpoQuery->paginate(10); // Agregada paginación de 10 registros

    // Asegurar que los enlaces de paginación preserven los parámetros 'id', 'evento_id' y 'search'
    $visiexpo->appends([
        'id' => $exp,
        'evento_id' => $event,
        'search' => $search
    ]);

    //JOIN PARA CONTAR TOTAL DE VISITANTES EN EL EVENTO
    $totalVisi = VisitanteXExpositor::join('visitante', 'visitantexexpositor.visitante_id', '=', 'visitante.id')
    ->where('visitante.evento_id', '=', $event)
    ->where('visitantexexpositor.expositor_id', '=', $exp)
    ->distinct('visitante.id') // Para contar visitantes únicos en caso de duplicados en la tabla de unión
    ->count();


    return view('viewExpositores.visitantes', compact('event', 'visiexpo', 'visiexpo2', 'exp','totalVisi'));
}


    public function expositor(){
         if (Auth::user()->rol_id != 2) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
         $expoid = request()->get('id');
        $eventid = request()->get('evento_id');

        $search = request()->input('search');
    $query = Expositor::query();
    if ($search) {
        $query->where('name', 'like', '%' . $search . '%');
        // Puedes agregar más condiciones para otros campos si quieres
    }
    $expoSearch = $query->get();

        $expo = Expositor::where('evento_id',$eventid)->get();
        return view('viewExpositores.expositores',compact('eventid','expoSearch','expoid','expo'));
    }

    public function expositorinfo($idex){
         if (Auth::user()->rol_id != 2) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $id = request()->get('id');
        $eventid = request()->get('evento_id');

        $exp = Expositor::find($idex);
        return view('viewExpositores.infoExpositores', compact('exp'));
    }


    public function activity(){
         if (Auth::user()->rol_id != 2) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $eventid = request()->get('evento_id');
        $act = Actividad::where('evento_id',$eventid)->get();

        return view('viewExpositores.activity',compact('act','eventid'));

    }

    public function sorteo(){
    $eventid = request()->get('evento_id');
    $expo = request()->get('id');
    // Obtiene todos los visitantes con id y nombre, y los almacena en una colección
    $visiexpo = VisitanteXExpositor::where('expositor_id', $expo)
    ->select('expositor_id')->get();
    $exposi = Expositor::where('evento_id',$eventid)->get(); // Agregado ->get() para que sea una colección
    // Consulta JOIN corregida: 
    // - Prefijamos las columnas en SELECT para evitar ambigüedad (visitante.id y visitante.name).
    // - Agregamos filtro por expositor_id para que la rifa sea específica del expositor (asumiendo que VisitanteXExpositor es una tabla pivot).
    // - Si no quieres filtrar por expositor, quita el where('visitantexexpositor.expositor_id', $expo).
    $visitantes = VisitanteXExpositor::join('visitante', 'visitantexexpositor.visitante_id', '=', 'visitante.id')
        ->where('visitante.evento_id', '=', $eventid)
        ->where('visitantexexpositor.expositor_id', '=', $expo) // Filtro agregado para rifa por expositor
        ->select('visitante.id', 'visitante.name') // Prefijado para claridad y evitar errores de ambigüedad
        ->get();
    $event= Evento::where('id',$eventid)->get();

    $nameExpo = Expositor::where('id',$expo)->where('evento_id',$eventid)->value('name');


    return view('viewExpositores.rifa',compact('visiexpo','expo','eventid','event','exposi','visitantes','nameExpo'));
}
    

    public function create()
    {
         if (Auth::user()->rol_id != 2) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $exp = request()->get('id');
        $event = request()->get('evento_id');
         return view('viewExpositores.createvisitantes', compact( 'event','exp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
     
        $eventId = $request->input('eventid'); // Estandariza y usa una variable para reutilizar
        $expositorId = $request->input('expositor_id');
        $visitanteId = $request->input('idvisi');

        // Verificar si ya existe el registro con el expositor
        $exists = VisitanteXExpositor::where('expositor_id', $expositorId)
            ->where('visitante_id', $visitanteId)
            ->exists();

        // Verificar si el visitante está registrado en este evento
        $existVisi = Visitante::where('id', $visitanteId)
            ->where('evento_id', $eventId) // ¡Aquí estaba el error! Usa 'eventid' en lugar de 'evento_id'
            ->exists();

        if ($exists) {
            // Ya existe, redirigir con mensaje de error
            return redirect("visitorofex/all?id={$expositorId}&evento_id={$eventId}")
                ->with('error', 'El visitante ya está registrado con este expositor.');
        } elseif (!$existVisi) {
            return redirect("visitorofex/all?id={$expositorId}&evento_id={$eventId}")
                ->with('error', 'El visitante no está registrado en este evento.');
        } else {
            // Crear el registro
            $vofex = new VisitanteXExpositor();
            $vofex->expositor_id = $expositorId;
            $vofex->visitante_id = $visitanteId;
            $vofex->clasification = $request->input('clasificacion');
            $vofex->comments = $request->input('comentario');
            $vofex->save();

            return redirect("visitorofex/all?id={$expositorId}&evento_id={$eventId}")
                ->with('success', 'Persona registrada correctamente.');
        }
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Manejo específico de validación
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        // Error general
        $eventId = $request->input('eventid');
        $expositorId = $request->input('expositor_id');
        return redirect("visitorofex/all?id={$expositorId}&evento_id={$eventId}")
            ->with('error', 'Algo ocurrió al registrar a la persona, inténtalo de nuevo: ' . $e->getMessage());
    }
}



//REPORTE PDF DE VISITANTES DE LOS EXPOSITORES
   public function visiReporte($id, $evento_id)
{
    $visitantes = VisitanteXExpositor::join('visitante', 'visitantexexpositor.visitante_id', '=', 'visitante.id')
        ->where('visitante.evento_id', '=', $evento_id)
        ->where('visitantexexpositor.expositor_id', '=', $id) 
        ->select(
            'visitante.id',
            'visitante.document',
            'visitante.name',
            'visitante.phone',
            'visitante.email',
            'visitantexexpositor.clasification'  // Agrega este campo de la tabla unida
        ) 
        ->get();
    // Elimina $visiexpo = VisitanteXExpositor::all(); ya no es necesario
    $pdf = Pdf::loadview('pdf.pdfVisiExpo', compact('visitantes'));
    return $pdf->download('reporte_misvisitantes.pdf');
}

public function createCI(){ 

    $exp = request()->get('id');

    return view('viewExpositores.createVisitantesCI', compact('exp'));
}



public function searchByCI(Request $request)
{
    try {
        $cedula = $request->input('cedula');
        $evento_id = $request->input('evento_id');
        
        // Validación más robusta
        $request->validate([
            'cedula' => 'required|string',
            'evento_id' => 'required|integer'
        ]);
        
        
        
        $visitante = Visitante::where('document', $cedula)
            ->where('evento_id', $evento_id)
            ->first();

        
        if ($visitante) {
            $data = [
                'idvis' => $visitante->id,
                'name' => $visitante->name,
                'document' => $visitante->document,
                'phone' => $visitante->phone,
                'email' => $visitante->email,
                'location' => $visitante->location
            ];
            
            // Guardar en sesión
            session(['visidata' => $data]); // Sin json_encode
            
            return back()->with([
                'success' => 'Visitante encontrado',
                'visidata' => $data // También pasar en la sesión flash
            ]);
            
        } else {
            return back()->with('error', 'Visitante no encontrado para este evento');
        }
    } catch (\Exception $e) {
        
        
        return back()->with('error', 'Error interno del servidor: ' . $e->getMessage());
    }   
}

// Método para registrar el visitante (si necesitas uno)
public function registrarVisitante(Request $request)
{
    try {
        // Tu lógica para registrar el visitante aquí
        // ...
        
        // Limpiar la sesión después de registrar
        $request->session()->forget('visidata');
        
        return redirect()->back()->with('success', 'Visitante registrado exitosamente');
    } catch (\Exception $e) {

        return back()->with('error', 'Error al registrar visitante');
    }
}


}