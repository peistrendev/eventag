<x-sidebarAdmin/>
<X-sweetAlerts />


   <div class="flex justify-center items-center w-full px-4 py-8">
      <form method="POST" action="{{url('activity/update/'.$act->id)}}"
            class="bg-white shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">
        @csrf
        @method('PUT')
        <h6 class="mb-6 font-bold text-lg text-slate-700 text-center">Editar Actividad</h6>
        
        <!-- Nombre y Documento en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="nombre" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Nombre de la actividad</label>
            <input type="text" id="nombre" name="nombre" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Actividad" value="{{$act->name}}">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="documento" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Descripcion</label>
            <textarea type="text" id="documento" name="descripcion" required
                   class="ml-6 max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Descripcion">{{$act->description}}</textarea>
          </div>
        </div>
        
        <!-- autor y lugar en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="telefono" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Autor</label>
            <input type="text" id="autor" name="autor" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Jon Doe" value="{{$act->author}}">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="correo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Lugar de la actividad</label>
            <textarea type="text" id="lugar" name="lugar" required
                   class=" ml-6 max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Salon Multiple">{{$act->location}}</textarea>
          </div>
        </div>

         <!-- fecha y hora  en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="telefono" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Fecha</label>
            <input type="date" id="fecha" name="fecha" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="" value="{{$act->start_date}}">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="correo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Hora</label>
            <input type="time" id="hora" name="hora" required
                   class="ml-6 max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   value="{{$act->hour}}">
          </div>
        </div>
        
    

     
          <input type="hidden" id="evento_id" name="evento_id" required
                    class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all resize-none"
                    rows="3"  value="{{$eventid}}"></input>
        </div>
        
        <button type="submit"
                class="max-w-sm w-full py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all">
          <i class="fa fa-user-plus mr-2"></i> Registrar
        </button>
      </form>
    </div>
