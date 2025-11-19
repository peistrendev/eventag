<x-sidebarAdmin>
   

    <div class="flex justify-center items-center w-full px-4 py-8">
      <form method="POST" action="{{url('user/store')}}"
            class="bg-white shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">
        @csrf
        
        <h6 class="mb-6 font-bold text-lg text-slate-700 text-center">Registrar Usuario</h6>
        
        <!-- Nombre y Documento en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="nombre" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Nombre y Apellido</label>
            <input type="text" id="nombre" name="nombre" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Jon Doe">
          </div>
          
        </div>




        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          
          <div class="flex flex-col items-center w-1/2">
            <label for="documento" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Email</label>
            <input type="text" id="correo" name="correo" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="ejemplo@correo.com">
          </div>
        </div>

        
        
        <!-- Teléfono y Correo en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2">
            <label for="telefono" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Clave</label>
            <input type="text" id="pass" name="pass" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="123Abc">
          </div>
        
        </div>
        
        
        <!--Asoiar ROL-->
       <div class="mb-6 w-full flex flex-row justify-center gap-4">
            <div class="flex flex-col items-center w-1/2">
                <label for="rol" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Rol</label>
                <select id="rol" name="rol" required
                        class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all">
                <option value="" disabled selected>Seleccione un usuario</option>
                <!-- Ejemplo de opciones, reemplaza con tus datos -->
                @foreach($rol as $r)
                <option value="{{ $r->id }}">{{ $r->name }}</option>
                @endforeach
                </select>
            </div>
        </div>

    <button type="submit"
                class="max-w-sm w-1/2 py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all">
          <i class="fa fa-user-plus mr-2"></i> Registrar
        </button>
        </div>
        
        
      </form>
    </div>
</x-sidebarAdmin>