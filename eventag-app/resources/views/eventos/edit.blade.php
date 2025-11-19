<x-sidebarAdmin>
    <h4 class="text-center mb-6">Editar Evento</h4>

    <div class="flex justify-center items-center w-full px-4 py-8">

      <form method="POST" action="{{url('event/update/'.$event->id)}}" enctype="multipart/form-data"
            class="bg-white shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">
        @csrf
        @method('PUT')
        
        <!-- Recuadro centrado para mostrar el logo actual -->
        @if($event->logo)
        <div class="flex justify-center items-center mb-6">
          <div class="bg-gray-100 rounded-lg p-4 shadow-soft-md">
            <img src="{{ asset($event->logo) }}" alt="Logo actual del evento"
                 class="w-32 h-16 object-cover rounded-lg">
            <p class="text-xs text-slate-500 text-center mt-2">{{$event->name}}</p>
          </div>
        </div>
        @endif
        
        <!-- Nombre y Documento en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="nombre" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Nombre</label>
            <input type="text" id="nombre" name="nombre" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Nombre completo" value="{{$event->name}}">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="descripcion" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Descripcion</label>
            <textarea id="descripcion" name="descripcion" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Acerca del evento">{{$event->description}}</textarea>
          </div>
        </div>
        
        <!-- Lugar y Logo en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4 ">
          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="lugar" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Lugar</label>
            <input type="text" id="lugar" name="lugar" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Lugar del evento" value="{{$event->location}}">
          </div>    
          <div class="flex flex-col items-center w-1/2">
            <label for="logo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Logo del evento </label>
            
            <input type="file" id="logo" name="logo" 
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg cursor-pointer focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all">
            <div id="logo-error" class="text-red-600 text-sm mb-1 hidden"></div>
          </div>
        </div>

        <!-- Dos inputs de fecha -->
        <div class="mb-6 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="fecha_inicio" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Fecha Inicio</label>
            <input type="date" id="fecha_inicio" name="fechaInicio" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   value="{{ $event->start_date }}">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="fecha_fin" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Fecha Fin</label>
            <input type="date" id="fecha_fin" name="fechaFin" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   value="{{ $event->finish_date }}">
          </div>
        </div>
        
        <button type="submit"
                class="max-w-sm w-1/2 py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all">
          <i class="fa fa-user-plus mr-2"></i> Actualizar
        </button>
      </form>
    </div>

    <script>
      document.getElementById('logo').addEventListener('change', function() {
        const errorDiv = document.getElementById('logo-error');
        errorDiv.classList.add('hidden'); // Oculta mensaje por defecto
        errorDiv.textContent = '';
        const file = this.files[0];
        if (file) {
          const maxSize = 2 * 1024 * 1024; // 2MB en bytes
          if (file.size > maxSize) {
            errorDiv.textContent = 'La imagen no debe superar los 2MB.';
            errorDiv.classList.remove('hidden');
            this.value = ''; // Limpia el input para que el usuario seleccione otra imagen
          }
        }
      });
    </script>
</x-sidebarAdmin>