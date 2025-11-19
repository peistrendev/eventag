<x-sidebarAdmin >
   

    <div class="flex justify-center items-center w-full px-4 py-8">

      <form method="POST" action="{{url('expositor/store')}}" enctype="multipart/form-data"
            class="bg-white shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">
        @csrf
        <h6 class="mb-6 font-bold text-lg text-slate-700 text-center">Crear un Expositor</h6>
        
        <!-- Nombre y Documento en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="nombre" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Nombre</label>
            <input type="text" id="nombre" name="nombre" required
                   class="mr-4 max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Nombre completo">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="descripcion" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Descripcion</label>
            <textarea id="descripcion" name="descripcion" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Acerca del expositor"></textarea>
          </div>
        </div>
        
        <!-- Lugar y Logo en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="lugar" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Direccion</label>
            <input type="text" id="lugar" name="lugar" required
                   class="mr-4 max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Direccion de la empresa">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="logo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Logo del evento</label>
            
            <input type="file" id="logo" name="logo"  required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg cursor-pointer focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   >
                   <div id="logo-error" class="text-red-600 text-sm mb-1 hidden"></div>
          </div>
        </div>

        <!-- Dos inputs(telefono y correo) -->
        <div class="mb-6 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="fecha_inicio" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Telefono comercial</label>
            <input type="text" id="fecha_inicio" name="telefono" required
                   class="mr-4 max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" placeholder="0424-1234567">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="fecha_fin" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Correo comercial</label>
            <input type="email" id="fecha_fin" name="correo" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" placeholder="ejemplo@info.com">
          </div>
        </div>

        <!-- Dos inputs(Prod ofrece y demanda) -->
        <div class="mb-6 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="prodofrece" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Productos que ofrece</label>
            <textarea  id="prodofrece" name="prodofrece" required
                   class="mr-4 max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" placeholder="Productos xxxx"></textarea>
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="prodemanda" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Productos que demanda</label>
            <textarea  id="prodemanda" name="prodemanda" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" placeholder="Producto xyz"></textarea>
          </div>
        </div>

        <div class="mb-6 w-full flex flex-row justify-center gap-4">

          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="paginaweb" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Pagina web</label>
            <input  id="paginaweb" name="paginaweb" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" placeholder="https://www.empresaXYZ.com">
          </div>
          <div class="flex flex-col items-center w-1/2 ">
                <label for="usuario_responsable" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Tipo de expositor</label>
                <select id="tipo" name="tipo" required
                        class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all">
                    <option value="" disabled selected>Seleccione un usuario</option>
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
                <option value="" disabled selected>Seleccione un usuario</option>
                <!-- Ejemplo de opciones, reemplaza con tus datos -->
                @foreach($user as $u)
                <option value="{{ $u->id }}">{{ $u->email }} ({{$u->name}})</option>
                @endforeach
                </select>
            </div>
        </div>

        <input type="hidden" id="" name="event" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" value="{{$eventid}}" >
        
        <button type="submit"
                class="max-w-sm w-full py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all">
          <i class="fa fa-user-plus mr-2"></i> Registrar
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
</x-sidebarAdmin >