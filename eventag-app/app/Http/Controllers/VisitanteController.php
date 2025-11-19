<?php

namespace App\Http\Controllers;
use App\Models\Visitante;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Log;
 use App\Models\Evento;


class VisitanteController extends Controller
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
             $eventid = request()->input('evento_id');
             $query = Visitante::query();

             if($eventid){
            $query->where('evento_id', $eventid);
        }

    if ($search) {
        $query->where('name', 'like', '%' . $search . '%')
            ->orwhere('document', 'like', '%' . $search . '%')
            ->orwhere('phone', 'like', '%' . $search . '%')
            ->orwhere('email', 'like', '%' . $search . '%');      
    }
       

        $visitor = $query->paginate(10);
       
    
        return view('visitantes.index', compact('visitor','eventid','search'));
    }


    public function qrview($id)
    {
      if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $visitor = Visitante::find($id);
        
        if ($visitor) {
            $data = [
                'idvis' => $visitor->id,
                'documento' => $visitor->document,
                'nombre' => $visitor->name,
                'correo' => $visitor->email,
                'telefono' => $visitor->phone,
                'direccion' => $visitor->location,
                'razon'=>$visitor->razon
                
            ];
        }
        $qrcode = QrCode::size(300)->generate(json_encode($data));

        return view('visitantes.qrview', compact('visitor', 'qrcode'));
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
        return view('visitantes.create',compact('eventid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       try {
        $visitor = new Visitante();
        $visitor->document = $request->input('documento');
        $visitor->name = $request->input('nombre');
        $visitor->email = $request->input('correo');
        $visitor->phone = $request->input('telefono');
        $visitor->location = $request->input('direccion');

        if($request->input('tipo') == "Empresarial"){
            $visitor->razon = 'Empresarial: '.$request->input('tipo');
        }else{
            $visitor->razon =  $request->input('tipo');
        }
         
        $visitor->evento_id = $request->input('evento_id');
       
        $exist = Visitante::where('document',$request->input('documento'))->exists();
        if($exist){
            return redirect('visitor/all?evento_id='.request()->input('evento_id'))->with('error', 'La persona se encuentra registrada con la cedula');
        }else{
        
        $visitor->save();
        return redirect('visitor/all?evento_id='.request()->input('evento_id'))->with('success', 'Persona registrada exitosamente');
        }
    } catch (\Exception $e) {
        
        return redirect('visitor/all?evento_id='.request()->input('evento_id'))->with('error', 'Ocurrió un error al registrar la persona. Inténtalo de nuevo.');
    }
    }

  

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
          if (Auth::user()->rol_id != 1) {
                return redirect('/login')->with('error', 'Acceso denegado.');
                
            }
        $eventid = request()->get('evento_id');
        $visitor =  Visitante::find($id);

      

        return view('visitantes.edit', compact('visitor','eventid'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $eventid = $request->get('evento_id');
        try {
            $visitor = Visitante::findOrFail($id);
            $visitor->document = $request->input('documento');
            $visitor->name = $request->input('nombre');
            $visitor->email = $request->input('correo');
            $visitor->phone = $request->input('telefono');
            $visitor->location = $request->input('direccion');
            $visitor->razon =  $request->input('tipo');
            $visitor->evento_id = $request->input('evento_id');
            $visitor->save();
            return redirect('visitor/all?evento_id='.$eventid)->with('success', 'Visitante actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect('visitor/all?evento_id='.$eventid)->with('error', 'Ocurrió un error al actualizar el visitante. Inténtalo de nuevo.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $visitor = Visitante::findOrFail($id);
        $visitor->delete();
        return redirect('visitor/all')->with('success', 'Visitante eliminado exitosamente');
    }


    //PARA FORMULARIO DE REGISTRO PUBLICO DE VISITANTES
    public function visiform(){
        return view ('formVisitante.form');
    }

    public function storeVisiForm(Request $request)
{
    try {
        // Validación de datos de entrada
        $validatedData = $request->validate([
            'documento' => 'required|string|max:20',
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:500',
            'tipo' => 'required|string', // Ajusta según tus valores posibles
            'nameEmpresa' => 'required|string|max:255',
            'evento_id' => 'required|integer' // Asegura que el evento exista
        ], [
            'documento.required' => 'El documento es obligatorio',
            'nombre.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe tener un formato válido',
            'telefono.required' => 'El teléfono es obligatorio',
            'direccion.required' => 'La dirección es obligatoria',
            'tipo.required' => 'El tipo es obligatorio',
            'nameEmpresa.required' => 'El nombre de empresa es obligatorio',
            
        ]);

        // Verificar si el visitante ya está registrado en el evento
        $existV = Visitante::where('document', $validatedData['documento'])
            ->where('evento_id', $validatedData['evento_id'])
            ->exists();

        if ($existV) {
            return redirect('visitevent/register')
                ->with('error', 'Esta persona ya ha sido registrada en este evento.')
                ->withInput(); // Mantiene los datos del formulario
        }

        // Crear el visitante con los datos validados
        $visitor = new Visitante();
        $visitor->document = $validatedData['documento'];
        $visitor->name = $validatedData['nombre'];
        $visitor->email = $validatedData['email'];
        $visitor->phone = $validatedData['telefono'];
        $visitor->location = $validatedData['direccion'];
        $visitor->razon = $validatedData['tipo'];
        $visitor->evento_id = $validatedData['evento_id'];

        // Asignar razón social según el tipo
        if ($validatedData['tipo'] == "Empresarial") {
            $visitor->razon = 'Empresarial: ' . $validatedData['nameEmpresa'];
        } else {
            $visitor->razon = $validatedData['nameEmpresa'];
        }

        $visitor->evento_id = $validatedData['evento_id'];
        $visitor->save();

        // Redireccionar con éxito - escapando el parámetro documento
        $documento = urlencode($validatedData['documento']);
        return redirect('visitevent/qr?doc=' . $documento)
            ->with('success', 'Persona registrada exitosamente');

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Manejar errores de validación
        return redirect('visitevent/register')
            ->withErrors($e->validator)
            ->withInput();
            
    } catch (\Exception $e) {
      
        
        return redirect('visitevent/register')
            ->with('error', 'Ocurrió un error al registrar la persona. Inténtalo de nuevo.')
            ->withInput();
    }
}

    public function visiteventQR(Request $request){
        $docu = $request->get('doc');

        $visitor = Visitante::where('document',$docu)->first();
        
        if ($visitor) {
            $data = [
                'idvis' => $visitor->id,
                'documento' => $visitor->document,
                'nombre' => $visitor->name,
                'correo' => $visitor->email,
                'telefono' => $visitor->phone,
                'direccion' => $visitor->location,
                'razon' => $visitor->razon
                
            ];
        }
        $qrcode = QrCode::size(300)->generate(json_encode($data));

        return view('formVisitante.qrcode', compact('visitor', 'qrcode'));

    }
}
