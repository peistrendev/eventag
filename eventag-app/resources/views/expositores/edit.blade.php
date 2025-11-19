<x-sidebarAdmin>
    <x-sweetAlerts />
    <h4 class="text-center mb-6">Editar Expositor</h4>
        

    <div class="flex justify-center items-center w-full px-4 py-8">

          <form method="POST" action="{{url('expositor/update/'. $expo->id)}}" enctype="multipart/form-data"
            class="bg-white shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">

        @csrf
        @method('PUT')    
        
       
       <!-- Recuadro centrado para mostrar el logo actual -->
        @if($expo->logo)
        <div class="flex justify-center items-center mb-6">
          <div class="bg-gray-100 rounded-lg p-4 shadow-soft-md">
            <img src="{{ asset($expo->logo) }}" alt="Logo actual del evento"
                 class="w-32 h-16 object-cover rounded-lg">
            <p class="text-xs text-slate-500 text-center mt-2">{{$expo->name}}</p>
          </div>
        </div>
        @endif
        
        <!-- Nombre y Documento en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="nombre" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Nombre</label>
            <input type="text" id="nombre" name="nombre" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Nombre completo" value="{{$expo->name}}">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="descripcion" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Descripcion</label>
            <textarea id="descripcion" name="descripcion" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Acerca del evento">{{$expo->description}}</textarea>
          </div>
        </div>
        
        <!-- Lugar y Logo en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4 ">
          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="lugar" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Lugar</label>
            <input type="text" id="lugar" name="lugar" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Lugar del evento" value="{{$expo->location}}">
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
            <label for="telefono" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Telefono Comercial</label>
            <input type="text" id="telefono" name="telefono" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   value="{{ $expo->phone }}">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="correo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Correo Comercial</label>
            <input type="text" id="correo" name="correo" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   value="{{ $expo->email }}">
          </div>
        </div>



        <!-- Dos inputs(Prod ofrece y demanda) -->
        <div class="mb-6 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="prodofrece" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Productos que ofrece</label>
            <textarea  id="prodofrece" name="prodofrece" required
                   class="mr-4 max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" placeholder="Productos xxxx">{{$expo->prod_ofrece}}</textarea>
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="prodemanda" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Productos que demanda</label>
            <textarea  id="prodemanda" name="prodemanda" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" placeholder="Producto xyz">{{$expo->prod_demanda}}</textarea>
          </div>
        </div>

        <div class="mb-6 w-full flex flex-row justify-center gap-4">

          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="paginaweb" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Pagina web</label>
            <input  id="paginaweb" name="paginaweb" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" placeholder="https://www.empresaXYZ.com" value="{{$expo->pagina_web}}">
          </div>
          <div class="flex flex-col items-center w-1/2 ">
                <label for="usuario_responsable" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Tipo de expositor</label>
                <select id="tipo" name="tipo" required
                        class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all">
                    <option value="" disabled selected>{{$expo->tipo}}</option>
                    <option value="Organizador">Organizador</option>
                    <option value="Patrocinante">Patrocinante</option>
                    <option value="Expositor">Expositor</option>
                </select>
            </div>

        
        </div>



         <!--Asoiar usuario al expositor-->
       <div class="mb-6 w-full flex flex-row justify-center gap-4">
            <div class="flex flex-col items-center w-1/2">
                <label for="usuario_responsable" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Usuario responsable</label>
                <select id="usuario_responsable" name="user_id" required
                        class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all">
                <option value="{{$expo->user_id}}"  selected>{{$expo->usuario->email }}</option>
                <!-- Ejemplo de opciones, reemplaza con tus datos -->
                @foreach($user as $u)
                <option value="{{ $u->id }}">{{ $u->email }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <input type="hidden" id="" name="event" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" value="{{$eventid}}" >
        
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