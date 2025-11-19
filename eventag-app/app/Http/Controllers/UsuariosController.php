<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Para debug opcional
use App\Models\Rol;
use App\Models\Expositor;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logins.login');
    }

    public function login(Request $request){
               // Validar solo email (requerido y formato válido)
        $request->validate([
            'email' => 'required|email',
        ]);
        // DEBUG opcional: Log del email ingresado
        Log::info('Intento de login solo con email: ' . $request->email);
        // Buscar usuario: email exacto, rol_id = 1, y password no vacío (opcional, para filtrar)
        $user = Usuarios::where('email', $request->email)
                        ->whereIn('rol_id', [1,2]) // Solo admins (rol_id = 1)
                        ->whereNotNull('password') // O where('password', '!=', '') si prefieres
                        ->where('password', '!=', '') // Filtra usuarios sin contraseña
                        ->first();

     
        // Si no encuentra usuario, error específico
        if (!$user) {
            Log::error('Usuario no encontrado o no cumple criterios (rol_id=1/2 o sin password) para email: ' . $request->email);
            return back()->withErrors([
                'email' => 'Email no encontrado,no estas configurado correctamente.',
            ])->onlyInput('email');
        }else{

        $expo = Expositor::where('user_id',$user->id)->first();
        
       
        // Login exitoso: Autentica sin chequear password
        Auth::login($user, $request->has('remember')); // 'remember' opcional si lo mantienes en la vista
        $request->session()->regenerate();
        Auth::user();

        $redirectUrl = ($user->rol_id == 1) ? 'event/dash' : 'eventofex/all?id='.$expo->id;
        Log::info('Login exitoso sin password, redirigiendo a event/dash para: ' . $user->email);
        // Redirigir (intended() usa 'event/dash' como fallback si hay una URL previa)
        return redirect()->intended($redirectUrl);
        }

    }
    public function loginE(){
        return view('logins.loginExpo');
    }

    public function loginEx(Request $request){
         // Validar solo email (requerido y formato válido)
        $request->validate([
            'email' => 'required|email',
        ]);
        // DEBUG opcional: Log del email ingresado
        Log::info('Intento de login solo con email: ' . $request->email);
        // Buscar usuario: email exacto, rol_id = 1, y password no vacío (opcional, para filtrar)
        $user = Usuarios::where('email', $request->email)
                        ->where('rol_id', 2) // Solo admins (rol_id = 1)
                        ->whereNotNull('password') // O where('password', '!=', '') si prefieres
                        ->where('password', '!=', '') // Filtra usuarios sin contraseña
                        ->first();

     
        // Si no encuentra usuario, error específico
        if (!$user) {
            Log::error('Usuario no encontrado o no cumple criterios (rol_id=1/2 o sin password) para email: ' . $request->email);
            return back()->withErrors([
                'email' => 'Email no encontrado,no estas configurado correctamente.',
            ])->onlyInput('email');
        }else{

        $expo = Expositor::where('user_id',$user->id)->first();
        
       
        // Login exitoso: Autentica sin chequear password
        Auth::login($user, $request->has('remember')); // 'remember' opcional si lo mantienes en la vista
        $request->session()->regenerate();
        Auth::user();

        $redirectUrl ='eventofex/all?id='.$expo->id;
        Log::info('Login exitoso sin password, redirigiendo a event/dash para: ' . $user->email);
        // Redirigir (intended() usa 'event/dash' como fallback si hay una URL previa)
        return redirect()->intended($redirectUrl);
        }
    }
    
    public function profile(){
        return view('profiles.profile');
    }

    public function logout(Request $request)
    {
     $user = Auth::user(); // Obtener el usuario autenticado
    Auth::logout(); // Desloguear al usuario
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    // Verificar el rol_id del usuario
    if ($user && $user->rol_id == 2) {
        // Redirige a una URL distinta si rol_id es 2 (ejemplo: 'home', ajusta según necesites)
        return redirect(url('login/expositor')) // Cambia 'home' por la URL deseada
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    } else {
        // Redirige al login para otros roles
        return redirect(url('login'))
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
    }

    public function users(){
        $us = Usuarios::paginate(10);
        $rol = Rol::all();
        return view('usuarios.user',compact('us','rol'));
    }

    public function create(){
        $rol = Rol::all();
        return view('usuarios.create',compact('rol'));
    }


    public function store(Request $request){
        try {
        $user = new Usuarios();
        $user->name = $request->input('nombre');
        $user->email = $request->input('correo');
        $user->password = Hash::make($request->input('pass'));
        $user->rol_id = $request->input('rol');
        $user->save();
        return redirect('user/all')->with('success', 'Usuario registrado exitosamente');
    } catch (\Exception $e) {
        
        return redirect('user/all')->with('error', 'Ocurrió un error al registrar el usuario. Inténtalo de nuevo.');
    }
    }

    public function edit($id){
        $expo = $id;

        $user = Usuarios::find($id);
        $roln = Usuarios::join('rol','usuario.rol_id','=','rol.id')->where('usuario.id','=',$id)
        ->value('rol.name');
        $rol = Rol::all();
        return view('usuarios.edit',compact('user','rol','roln','expo'));
    }

    public function update(Request $request,$id ){
        try{
            $user = Usuarios::findOrFail($id);
            $user->name = $request->input('nombre');
            $user->email = $request->input('correo');
            $user->password = $request->input('pass');
            $user->rol_id = $request->input('rol');
            $user->save();
            return redirect('user/all')->with('success', 'Usuario actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect('user/all')->with('error', 'Error al actualizar el usuario'.$e->getMessage());
        }
    }

    
    public function destroy($id){
        $user = Usuarios::findOrFail($id);
        $user->delete();
        return redirect('user/all')->with('success', 'Usuario eliminado exitosamente');
    }
   

}
