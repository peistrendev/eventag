<?php

namespace App\Http\Controllers;

use App\Models\Expositor;
use Illuminate\Http\Request;
use App\Models\Usuarios;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Log;

use function Pest\Laravel\get;

class ExpositorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
       $search = $request->input('search');
    $query = Expositor::query();
    if ($search) {
        $query->where('name', 'like', '%' . $search . '%');
        // Puedes agregar más condiciones para otros campos si quieres
    }
    $expo = $query->get();
    $eventid = $request->input('evento_id'); // o como obtengas el evento
    return view('expositores.expositor', compact('expo', 'eventid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
           if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $eventid = $request->get('evento_id');
        $user = Usuarios::where('rol_id', 2)->get();
        return view('expositores.create',compact('eventid','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
     {
        
        $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'telefono' => 'required|string|max:255',
        'correo' => 'required|string|email|max:255',
        'lugar' => 'required|string|max:255',
        'prodofrece' => 'required|string',
        'prodemanda' => 'required|string',
        'paginaweb' => 'required|string',
        'tipo' => 'required|string',
        'event' => 'required',
        'user_id' => 'required',
        'event' => 'required',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $expo = new Expositor();
    $expo->name = $request->input('nombre');
    $expo->description = $request->input('descripcion');
    $expo->phone = $request->input('telefono');
    $expo->email = $request->input('correo');
    $expo->location = $request->input('lugar');
    $expo->pagina_web = $request->input('paginaweb');
    $expo->prod_ofrece = $request->input('prodofrece');
    $expo->prod_demanda = $request->input('prodemanda');
    $expo->tipo = $request->input('tipo');
    $expo->user_id = $request->input('user_id');
    $expo->evento_id = $request->input('event');
    if ($logo = $request->file('logo')) {
        $destinationPath = 'logo/';
        $logoName = date('YmdHis') . "." . $logo->getClientOriginalExtension();
        $logo->move(public_path($destinationPath), $logoName);
        $expo->logo = $destinationPath . $logoName;
    }
    $expo->save();
    return redirect('expositor/all?evento_id='.request()->input('event'))->with('success', 'Expositor creado exitosamente.');

    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
           if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $exp = Expositor::find($id);
        $eventid = request()->get('evento_id');
        return view('expositores.info', compact('exp','eventid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
            if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $eventid = request()->get('evento_id');
        $user = Usuarios::where('rol_id', 2)->get();
         $expo = Expositor::find($id);
        return view('expositores.edit', compact('expo', 'user','eventid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
         try {
        $expo = Expositor::find($id);
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'lugar' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
            'prodofrece' => 'required|string',
        'prodemanda' => 'required|string',
        'paginaweb' => 'required|string',
        'tipo' => 'required|string',
            'user_id' => 'required',
            'event' => 'required',
            'logo' => 'nullable|image|max:2048',
        ]);
        $expo->name = $request->input('nombre');
        $expo->description = $request->input('descripcion');
        $expo->location = $request->input('lugar');
        $expo->phone = $request->input('telefono');
        $expo->email = $request->input('correo');
        $expo->pagina_web = $request->input('paginaweb');
    $expo->prod_ofrece = $request->input('prodofrece');
    $expo->prod_demanda = $request->input('prodemanda');
    $expo->tipo = $request->input('tipo');
        $expo->user_id = $request->input('user_id');
        $expo->evento_id = $request->input('event');
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $destinationPath = 'logo/';
            $logoName = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move(public_path($destinationPath), $logoName);
            $expo->logo = $destinationPath . $logoName;

    
}
        $expo->save();
        return redirect('expositor/all?evento_id=' . $request->input('event'))
               ->with('success', 'Expositor actualizado correctamente.');
        }catch (\Exception $e) {
        // Guardar el mensaje de error en la sesión para mostrarlo en la vista
         return redirect('expositor/all?evento_id=' . $request->input('event'))
               ->with('error', 'Error al actualizar el expositor.');
    }
}


    public function destroy($id)
    {
         $eventid= request()->get('evento_id'); // ahora sí lo obtienes
        $exp = Expositor::findOrFail($id);
        $exp->delete();
        return redirect('expositor/all?evento_id='.$eventid)->with('success', 'Expositor eliminado exitosamente');
    }


    public function viewExposiPag(){

        $eventid = request()->get('evento_id');
        //Obtener los organizadores de un evento 
        $organizadorEvento = Expositor::where('evento_id',$eventid)->where('tipo','Organizador')->get();
          //Obtener los patrocinantes de un evento 
        $patrocinanteEvento = Expositor::where('evento_id',$eventid)->where('tipo','Patrocinante')->get();
        //Obtener los expositores de un evento 
        $expositorEvento = Expositor::where('evento_id',$eventid)->where('tipo','Expositor')->get();

        return view('expositores.expoPagina', compact('expositorEvento','eventid','organizadorEvento','patrocinanteEvento'));
    }

    public function infoExpoPag(){

        $id = request()->get('id');
        $eventid = request()->get('evento_id');
        $exp = Expositor::where('id',$id)->where('evento_id',$eventid)->first();

        return view('expositores.infoExpositorPag',compact('exp','eventid'));
    }
}
