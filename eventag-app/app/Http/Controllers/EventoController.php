<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Log;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $event = Evento::paginate(4);
        return view('eventos.evento', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'fechaInicio' => 'required|date',
        'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        'lugar' => 'required|string|max:255',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);
    $event = new Evento();
    $event->name = $request->input('nombre');
    $event->description = $request->input('descripcion');
    $event->start_date = $request->input('fechaInicio');
    $event->finish_date = $request->input('fechaFin');
    $event->location = $request->input('lugar');
    if ($logo = $request->file('logo')) {
        $destinationPath = 'logo/';
        $logoName = date('YmdHis') . "." . $logo->getClientOriginalExtension();
        $logo->move(public_path($destinationPath), $logoName);
        $event->logo = $destinationPath . $logoName;
    }
    $event->save();
    return redirect('event/all')->with('success', 'Evento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)

    {
      if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $evento = Evento::find($id);
        return view('eventos.show', compact('evento'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($eventid)
    {
         if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $event = Evento::find($eventid);
        return view('eventos.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    $event = Evento::findOrFail($id);
    // Validar otros campos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'lugar' => 'required|string|max:255',
        'fechaInicio' => 'required|date',
        'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        'logo' => 'nullable|image|max:2048', // 2MB max
    ]);
    // Actualizar campos básicos
    $event->name = $request->input('nombre');
    $event->description = $request->input('descripcion');
    $event->location = $request->input('lugar');
    $event->start_date = $request->input('fechaInicio');
    $event->finish_date = $request->input('fechaFin');
    // Verificar si se cargó un nuevo logo
    if ($request->hasFile('logo')) {
    $logo = $request->file('logo');
    $destinationPath = 'logo/';
    $logoName = date('YmdHis') . "." . $logo->getClientOriginalExtension();
    $logo->move(public_path($destinationPath), $logoName);
    $event->logo = $destinationPath . $logoName;
}
    // Si no hay archivo nuevo, no se cambia el logo
    $event->save();
    return redirect('event/all')->with('success', 'Evento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $event = Evento::findOrFail($id);
        $event->delete();
        return redirect('event/all')->with('success', 'Evento eliminado exitosamente');
        
    }
}
