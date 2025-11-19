<x-sidebarAdmin>
   <div class="flex justify-start items-center mb-4 p-2">
    <a href="{{ url('visitor/all?evento_id=' . request()->get('evento_id')) }}"
       class=" ml-4 flex items-center justify-center w-10 h-10 bg-white shadow-soft-md rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-800 transition-all duration-200 hover:scale-105 sm:w-12 sm:h-12">
      <i class="fa-solid fa-arrow-left text-sm sm:text-base"></i>
    </a>
  </div>
  


    <div class="flex justify-center items-center w-full px-4 py-8">
      <form method="POST" action="{{url('visitor/store')}}"
            class="bg-white ml-4 shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">
        @csrf
        
        <h6 class="mb-6 font-bold text-lg text-slate-700 text-center">Registrar visitante</h6>
        
        <!-- Nombre y Documento en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">


          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="documento" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Documento</label>
            <input type="text" id="documento" name="documento" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Número de documento">
          </div>
          <div class="flex flex-col items-center w-1/2 ">
            <label for="nombre" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Nombre</label>
            <input type="text" id="nombre" name="nombre" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Nombre completo">
          </div>
          
        </div>
        
        <!-- Teléfono y Correo en la misma fila -->
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="telefono" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Teléfono</label>
            <input type="text" id="telefono" name="telefono" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Teléfono">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="correo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Correo</label>
            <input type="email" id="correo" name="correo" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Correo electrónico">
          </div>
        </div>

        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-1/2 mr-4">
            <label for="tipo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Su visita es:</label>
            <input type="text" id="tipo" name="tipo" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Particular o indicar empresa">
          </div>
          <div class="flex flex-col items-center w-1/2">
            <label for="direccion" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Direccion</label>
            <textarea  id="direccion" name="direccion" required
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Correo electrónico"></textarea>
          </div>
        </div>
        
      

     
          <input type="hidden" id="evento_id" name="evento_id" required
                    class="max-w-sm w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all resize-none"
                    rows="3" placeholder="Dirección" value="{{$eventid}}"></input>
        </div>
        
       <center> <button type="submit"
                class="max-w-sm w-1/2 py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all">
          <i class="fa fa-user-plus mr-2"></i> Registrar
        </button></center>
      </form>
    </div>
</x-sidebarAdmin>