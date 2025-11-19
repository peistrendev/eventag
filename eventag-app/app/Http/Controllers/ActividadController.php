<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Log;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Logout si no es admin
        if (Auth::user()->rol_id != 1) {
            return redirect('/login')->with('error', 'Acceso denegado.');
                    
        }
        //Obtener el ID del evento desde la solicitud
        $eventid = request()->get('evento_id');

        $query = Actividad::query();
        if ($eventid) {
            $query->where('evento_id', $eventid);
        }
        // Ordenar por fecha ascendente y luego por hora ascendente
            $query->orderBy('start_date', 'asc')
                ->orderBy('hour', 'asc');
                
        //Mostrar 1o actividades por página        
        $act = $query->paginate(10);

        return view('actividades.activity', compact('act', 'eventid'));
    }

    public function create(Request $request)
    {
        //Logout si no es admin
         if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }

        //Obtener el ID del evento desde la solicitud
        $eventid = $request->get('evento_id');

        return view('actividades.create',compact('eventid'));
    }

    public function store(Request $request)
    {
        //try catch para manejar errores
         try {

            $acti = new Actividad();

            //obtener datos del formulario
            $acti->name = $request->input('nombre');
            $acti->description = $request->input('descripcion');
            $acti->location = $request->input('lugar');
            $acti->author = $request->input('autor');
            $acti->start_date = $request->input('fecha');
            $acti->hour = $request->input('hora');
            $acti->evento_id = $request->input('evento_id');

            //guardar actividad
            $acti->save();
            //redireccionar con mensaje de exito
            return redirect('activity/all?evento_id='.request()->input('evento_id'))->with('success', 'Actividad registrada exitosamente');

         } catch (\Exception $e) {
        
            //redireccionar con mensaje de error
            return redirect('activity/all?evento_id='.request()->input('evento_id'))->with( 'Ocurrió un error al registrar la Actividad. Inténtalo de nuevo.');
        }
    }


    public function edit(string $id)
    {
        //logout si no es admin
        if (Auth::user()->rol_id != 1) {
            return redirect('/login')->with('error', 'Acceso denegado.');  
        }

        //obetener el ID del evento desde la solicitud
        $eventid = request()->get('evento_id');

        //mostrar actividad segun su id
        $act =  Actividad::find($id);

        return view('actividades.edit', compact('act','eventid'));
    }

    
    public function update(Request $request,  $id)
    {
        //obetener el ID del evento desde la solicitud
        $eventid = $request->get('evento_id');

        //try catch para manejar errores
        try {
            //buscar actividad por id
            $act = Actividad::findOrFail($id);
            //actualizar datos de la actividad
            $act->name = $request->input('nombre');
            $act->description = $request->input('descripcion');
            $act->author = $request->input('autor');
            $act->location = $request->input('lugar');
            $act->start_date = $request->input('fecha');
            $act->hour = $request->input('hora');

            $act->save();//guardar cambios

            return redirect('activity/all?evento_id='.$eventid)->with('success', 'Actividad actualizada exitosamente');
        } catch (\Exception $e) {
            //redireccionar con mensaje de error
            return redirect('activity/all?evento_id='.$eventid)->with('error', 'Ocurrió un error al actualizar la actividad. Inténtalo de nuevo.');
        }
    }

   
    public function destroy( Request $request, $id)
    {
        $eventid = $request->get('evento_id'); 
        $act = Actividad::findOrFail($id); //buscar actividad por id

         //try catch para manejar errores
        try{

            $act->delete(); //eliminar actividad
            return redirect('activity/all?evento_id='.$eventid)->with('success', 'Actividad eliminada exitosamente');

        } catch (\Exception $e) {

            //redireccionar con mensaje de error
            return redirect('activity/all?evento_id='.$eventid)->with('error', 'Ocurrió un error al eliminar la actividad. Inténtalo de nuevo.');
            
        }
    }
}
