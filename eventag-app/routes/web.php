<?php

use App\Exports\VisitanteexpositorExport;
use App\Exports\VisitanteEventoExport;
use App\Exports\ExpositorEventoExport;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ExpositorController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\RifaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VisitanteXExpositorController;
use App\Http\Controllers\DashboardController;
use App\Models\VisitanteXExpositor;
use Maatwebsite\Excel\Facades\Excel;

//probando simple software para generar QR

Route::get('/', function () {
    return view('welcome');
});

   

Route::get('/visitor/all', [VisitanteController::class, 'index'])->middleware('auth');
Route::get('/visitor/create', [VisitanteController::class, 'create'])->middleware('auth');
Route::post('/visitor/store', [VisitanteController::class, 'store'])->middleware('auth');
Route::delete('/visitor/destroy/{id}', [VisitanteController::class, 'destroy'])->middleware('auth');
Route::get('/visitor/{id}/edit', [VisitanteController::class, 'edit'])->middleware('auth');
Route::get('/visitor/{id}/qr', [VisitanteController::class, 'qrview'])->middleware('auth');
Route::put('/visitor/update/{id}', [VisitanteController::class, 'update'])->middleware('auth');



Route::get('/event/dash', [DashboardController::class, 'dash'])->middleware('auth');
Route::get('/event/dash/data', [DashboardController::class, 'getVisitantesData']);
Route::get('/event/create', [EventoController::class, 'create'])->middleware('auth');
Route::post('/event/store', [EventoController::class, 'store'])->middleware('auth');
Route::get('/event/all', [EventoController::class, 'index'])->middleware('auth');
Route::get('/event/{event}', [EventoController::class, 'show'])->middleware('auth');
Route::get('/event/{event}/edit', [EventoController::class, 'edit'])->middleware('auth');
Route::delete('/event/destroy/{id}', [EventoController::class, 'destroy'])->middleware('auth');
Route::put('/event/update/{id}', [EventoController::class, 'update'])->middleware('auth');


Route::get('/expositor/all', [ExpositorController::class, 'index'])->middleware('auth');
Route::get('/expositor/create', [ExpositorController::class, 'create'])->middleware('auth');
Route::post('/expositor/store', [ExpositorController::class, 'store'])->middleware('auth');
Route::get('/expositor/info/{id}', [ExpositorController::class, 'show'])->middleware('auth');
Route::get('/expositor/{id}/edit', [ExpositorController::class, 'edit'])->middleware('auth');
Route::put('/expositor/update/{id}', [ExpositorController::class, 'update'])->middleware('auth');
Route::delete('/expositor/destroy/{id}', [ExpositorController::class, 'destroy'])->middleware('auth');

Route::get('/activity/all', [ActividadController::class, 'index'])->middleware('auth');
Route::get('/activity/create', [ActividadController::class, 'create'])->middleware('auth');
Route::post('/activity/store', [ActividadController::class, 'store'])->middleware('auth');
Route::get('/activity/{id}/edit', [ActividadController::class, 'edit'])->middleware('auth');
Route::put('/activity/update/{id}', [ActividadController::class, 'update'])->middleware('auth');
Route::delete('/activity/destroy/{id}', [ActividadController::class, 'destroy'])->middleware('auth');




Route::get('sorteo/all', [RifaController::class, 'index'])->middleware('auth');
Route::get('sorteofex/all', [VisitanteXExpositorController::class, 'sorteo']);

Route::get('/eventofex/all', [VisitanteXExpositorController::class, 'evento'])->middleware('auth');
Route::get('/visitorofex/all', [VisitanteXExpositorController::class, 'visitante'])->middleware('auth');
Route::get('/expositorofex/all', [VisitanteXExpositorController::class, 'expositor'])->middleware('auth');
Route::get('/expositorofex/info/{idex}', [VisitanteXExpositorController::class, 'expositorinfo'])->middleware('auth');
Route::get('/activityofex/all', [VisitanteXExpositorController::class, 'activity'])->middleware('auth');
Route::get('/visitorofex/create', [VisitanteXExpositorController::class, 'create'])->middleware('auth');
Route::post('/visitorofex/store', [VisitanteXExpositorController::class, 'store'])->middleware('auth');
Route::get('/visitorofex/createCI', [VisitanteXExpositorController::class, 'createCI'])->middleware('auth');
Route::post('/visitorofex/searchByCI', [VisitanteXExpositorController::class, 'searchByCI'])->name('buscarCi')->middleware('auth');
Route::get('/myprofile',[UsuariosController::class,'profile']);

Route::get('/user/all', [UsuariosController::class, 'users'])->middleware('auth');
Route::get('/user/create', [UsuariosController::class, 'create'])->middleware('auth');
Route::post('/user/store', [UsuariosController::class, 'store'])->middleware('auth');
Route::get('/user/{id}/edit', [UsuariosController::class, 'edit'])->middleware('auth');
Route::put('/user/update/{id}', [UsuariosController::class, 'update'])->middleware('auth');
Route::delete('/user/destroy/{id}', [UsuariosController::class, 'destroy'])->middleware('auth');

Route::get('/login', [UsuariosController::class, 'index'])->name('login');
Route::post('/login-verified', [UsuariosController::class, 'login'])->name('loginV');
Route::get('/login/expositor', [UsuariosController::class, 'loginE'])->name('loginE');
Route::post('/login-verifiedEx', [UsuariosController::class, 'loginEx'])->name('loginEx');
Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout');

route::get('/visitevent/register',[VisitanteController::class, 'visiform']);
route::post('/visitevent/store',[VisitanteController::class, 'storeVisiForm']);
route::get('/visitevent/qr',[VisitanteController::class, 'visiteventQR']);


//GENERAR REPORTES XLS
route::get('/exportarVisitantesExpositor', function(){
    return Excel::download(new VisitanteexpositorExport, 'misVisitantes.xlsx');
});

route::get('/exportarVisitantesEvento', function(){
    return Excel::download(new VisitanteEventoExport, 'VisitantesDelEvento.xlsx');
});
route::get('/exportarExpositores', function(){
    return Excel::download(new ExpositorEventoExport, 'ExpositoresDelEvento.xlsx');
});



//Visualizar expositores en pagina del evento
route::get('/expositores/evento',[ExpositorController::class, 'viewExposiPag']);
route::get('/info/expositor',[ExpositorController::class,'infoExpoPag']);

