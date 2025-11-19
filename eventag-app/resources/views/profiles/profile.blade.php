<x-sidebarAdmin>
<x-sweetAlerts/>   

    <div class="flex flex-col items-center w-full px-4 py-8">
        <form method="POST" action="" class="w-full max-w-md ">
            @csrf
        
            <h6 class="mb-6 font-bold text-lg text-slate-700 text-center">MI PERFIL</h6>
            
            <!-- Nombre -->
            <div class="mb-4 w-full  bg-white rounded-lg p-4">
                <label for="nombre" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Nombre y Apellido</label>
                <center>
                <input type="text" id="nombre" name="nombre" required
                       class="w-1/4 px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                       placeholder="Jon Doe" value="{{ auth()->user()->name }}">
                </center>
            </div>

            <!-- Email -->
            <div class="mb-4 w-full  bg-white rounded-lg p-4">
                <label for="correo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Email</label>
                <center>
                <input type="email" id="correo" name="correo" required
                       class="w-1/4 px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                       placeholder="ejemplo@correo.com" value="{{ auth()->user()->email }}">
                  </center>
            </div>

            <!-- Contraseña (oculta, si es necesaria para actualización) -->
            <input type="hidden" id="pass" name="pass" value="">
            
            <!-- Botón de envío -->
            <div class="text-center">
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all">
                    Actualizar Perfil
                </button>
            </div>
        </form>
    </div>
</x-sidebarAdmin>
