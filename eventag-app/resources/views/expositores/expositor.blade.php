<x-sidebarAdmin/>

<x-sweetAlerts></x-sweetAlerts>

<!-- Contenedor con input de búsqueda y botón Nuevo -->
<form method="GET" action="{{url()->current()}}" class="flex justify-end mb-4 items-center space-x-4">

  <input type="hidden" name="evento_id" value="{{ request('evento_id', $eventid) }}" />
  <!-- Botón Buscar -->
  <button type="submit" 
          class="bg-white inline-flex items-center px-4 py-3 font-semibold rounded-lg shadow-soft-md transition-all text-sm">
    <i class="fa fa-search mr-2"></i> 
  </button>
  <!-- Input de búsqueda -->
  <input type="text" id="searchInput" name="search" placeholder="Buscar..." 
         value="{{ request('search') }}"
         class="mr-2 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500" />
  <!-- Botón Nuevo -->
  <a href="{{ url('expositor/create?evento_id='.$eventid) }}"
     class="mr-6 inline-block px-6 py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all text-sm">
    <i class="fa fa-plus mr-2"></i> Nuevo
  </a>
</form>

<!-- Contenedor de cards -->
<div class="flex ml-4 flex-wrap justify-start mx-auto max-w-full mt-6 gap-4">
  @foreach($expo as $e)
  
        <div class="w-1/2 sm:w-1/2 md:w-1/4 xl:w-1/4 px-2 mb-6 min-w-[150px] max-w-[220px]">
      <div class="relative flex flex-col items-center bg-white shadow-soft-xl rounded-2xl p-4 h-full text-center">
        <h6 class="text-xs">{{$e->tipo}}</h6>
        <div class="flex justify-center mb-4 ">
          <img src="{{ asset($e->logo) }}" alt="Logo del evento"
               class="w-14 h-8 sm:w-16 sm:h-10 md:w-20 md:h-12 object-contain rounded-lg" />
        </div>  
        <h5 class="font-bold text-lg mb-4 truncate">{{$e->name}}</h5>
        <div class="flex items-center justify-center mb-4 space-x-2">
          <a href="{{ url('expositor/info/'.$e->id.'?evento_id='.$eventid) }}"
            class="btn-ver inline-block px-4 py-2 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-transform text-sm">
            Ver
          </a>

          <!-- Dropdown junto al botón Ver -->
          <div class="relative inline-block text-left">
            <button onclick="toggleDropdown('dropdown-{{ $e->id }}')" 
                    class="p-2 rounded-full hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
              <i class="fa fa-ellipsis-v"></i>
            </button>
            <div id="dropdown-{{ $e->id }}" class="hidden absolute right-0 mt-2 w-28 bg-white rounded-md shadow-lg z-10">
              <a href="{{ url('expositor/'.$e->id.'/edit?evento_id='.$eventid) }}" 
                 class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Editar
              </a>
              <form action="{{ url('expositor/destroy/'.$e->id.'?evento_id='.$eventid) }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100" data-delete>
                  Eliminar
                </button>
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>
  @endforeach
</div>




<script>
  function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    if (dropdown.classList.contains('hidden')) {
      // Cerrar otros dropdowns abiertos
      document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
        if (el.id !== id) el.classList.add('hidden');
      });
      dropdown.classList.remove('hidden');
    } else {
      dropdown.classList.add('hidden');
    }
  }

  // Cerrar dropdowns si se hace click fuera
  window.addEventListener('click', function(e) {
    if (!e.target.closest('button') && !e.target.closest('[id^="dropdown-"]')) {
      document.querySelectorAll('[id^="dropdown-"]').forEach(el => el.classList.add('hidden'));
    }
  });
</script>