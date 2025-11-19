<x-sidebarAdmin/>
<x-sweetAlerts/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex justify-center items-center w-full px-4 py-8">
  <div class="bg-white shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">
    <h6 class="mb-6 font-bold text-lg text-slate-700 text-center">Buscar por Cédula</h6>

    <div class="mb-6 w-full flex flex-col items-center">
      <label for="cedula" class="block mb-2 text-sm font-semibold text-slate-600 text-center"></label>
      <div class="flex gap-2">
        <input type="text" id="cedula" name="cedula" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all" placeholder="Ingrese la cédula">
        <button type="button" id="btn-buscar-cedula" class="py-2 px-4 bg-blue-500  rounded-lg hover:bg-blue-600 transition-all">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </div>

    <form method="POST" action="{{url('/visitorofex/store')}}" class="bg-white shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">
      @csrf
      
      
      <div id="qr-data" class="w-full {{ session('visidata') ? '' : 'hidden' }}">
        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-full">
            <label for="nombre" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Nombre y Apellido</label>
            <input type="text" id="nombre" name="nombre"
                   class="max-w-sm w-full sm:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Jon Doe" readonly>
          </div>
        </div>

        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-full">
            <label for="documento" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Documento</label>
            <input type="text" id="documento" name="documento"
                   class="max-w-sm w-full sm:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Número de documento" readonly>
          </div>
        </div>      

        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-full">
            <label for="telefono" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Teléfono</label>
            <input type="text" id="telefono" name="telefono"
                   class="max-w-sm w-full sm:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Teléfono" readonly>
          </div>
        </div>

        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-full">
            <label for="correo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Correo</label>
            <input type="email" id="correo" name="correo"
                   class="max-w-sm w-full sm:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Correo electrónico" readonly>
          </div>
        </div>

        <div class="mb-6 w-full flex flex-col items-center">
          <label for="direccion" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Dirección</label>
          <textarea id="direccion" name="direccion"
                    class="max-w-sm w-full sm:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all resize-none"
                    rows="3" placeholder="Dirección" readonly></textarea>
        </div>

        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          <div class="flex flex-col items-center w-full sm:w-1/2">
            <label for="clasificacion" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Clasificación</label>
            <select id="clasificacion" name="clasificacion" required
                    class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all">
              <option value="" disabled selected>Seleccione una clasificación</option>
              <option value="Visitante">Visitante</option>
              <option value="Por contactar">Por contactar</option>
              <option value="Cliente">Cliente</option>
              <option value="Potencial cliente">Potencial cliente</option>
              <option value="Potencial proveedor">Potencial proveedor</option>
            </select>
          </div>
        </div>

        <div class="mb-4 w-full flex flex-row justify-center gap-4">
          
          <div class="flex flex-col items-center w-full sm:w-1/2">
            <label for="comentario" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Comentario</label>
            <input type="text" id="comentario" name="comentario"
                   class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                   placeholder="Contactar luego">
          </div>
        </div>

        <button type="submit"
                class="max-w-sm w-full py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all">
          <i class="fa fa-user-plus mr-2"></i> Registrar
        </button>

        <input type="hidden" name="expositor_id" value="{{ $exp }}">
        <input type="hidden" name="idvisi" id="idvisi">
        <input type="hidden" name="eventid" id="eventid" value="{{ request('evento_id') }}">
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById('btn-buscar-cedula').addEventListener('click', function() {
    const cedula = document.getElementById('cedula').value;
    const evento_id = document.getElementById('eventid').value;
    
    if (!cedula) {
        alert('Por favor ingrese una cédula');
        return;
    }

    if (!evento_id) {
        alert('Error: No se encontró el ID del evento');
        return;
    }

    // Crear formulario temporal para enviar la solicitud
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("buscarCi") }}';
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = csrfToken;
    
    const cedulaInput = document.createElement('input');
    cedulaInput.type = 'hidden';
    cedulaInput.name = 'cedula';
    cedulaInput.value = cedula;
    
    const eventoInput = document.createElement('input');
    eventoInput.type = 'hidden';
    eventoInput.name = 'evento_id';
    eventoInput.value = evento_id;
    
    form.appendChild(csrfInput);
    form.appendChild(cedulaInput);
    form.appendChild(eventoInput);
    
    document.body.appendChild(form);
    form.submit();
});

// Cargar datos desde sesión si existen
document.addEventListener('DOMContentLoaded', function() {
    @if(session('visidata'))
        try {
            const data = @json(session('visidata'));
            
            if (data) {
                document.getElementById('nombre').value = data.name || '';
                document.getElementById('documento').value = data.document || '';
                document.getElementById('telefono').value = data.phone || '';
                document.getElementById('correo').value = data.email || '';
                document.getElementById('direccion').value = data.location || '';
                document.getElementById('idvisi').value = data.idvis || '';
                
                // Mostrar el formulario
                document.getElementById('qr-data').classList.remove('hidden');
            }
        } catch (error) {
            console.error('Error cargando datos:', error);
        }
    @endif
});
</script>
