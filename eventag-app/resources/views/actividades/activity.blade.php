<x-sidebarAdmin/>
<x-sweetAlerts/>

<!-- Botón Nuevo arriba de la tabla -->
<div class="flex justify-end mb-4">
  <a href="{{ url('activity/create?evento_id='.$eventid) }}"
     class="inline-block px-6 py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all text-sm mr-4">
    <i class="fa fa-plus mr-2"></i> Nuevo
  </a>
</div>

<div class="w-full  p-6 mx-auto">
  <div class="grid  grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    
    <!-- Tarjetas de actividades aqui empieza el foreach-->
    @foreach($act as $a)
    <div class="w-full mb-6"> <!-- Cambié w-1/3 a w-full para que el grid controle el ancho -->
      <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border hover:shadow-lg transition-all duration-300 overflow-visible">
        
        <!-- Header de la card con dropdown -->
        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl flex justify-between items-start relative">
          <h5 class="mb-0 font-semibold text-slate-800">{{$a->name}}</h5>
          
          <!-- Dropdown container -->
          <div class="relative inline-block text-left">
            <button type="button" class="inline-flex justify-center w-8 h-8 rounded-full hover:bg-slate-100 focus:outline-none" id="menu-button-{{$a->id}}" aria-expanded="false" aria-haspopup="true">
              <i class="fa fa-ellipsis-vertical text-slate-600"></i>
            </button>

            <!-- Dropdown menu -->
            <div class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-{{$a->id}}" tabindex="-1" id="dropdown-menu-{{$a->id}}">
              <div class="py-1" role="none">
                <a href="{{ url('activity/'.$a->id.'/edit?evento_id='.$eventid) }}" class=" bg-gray-50 block  px-4 py-2 text-sm text-black hover:bg-gray-200" role="menuitem" tabindex="-1">
                   Editar
                </a>
                <form action="{{url('activity/destroy/'.$a->id.'?evento_id='.$eventid)}}" method="POST" class=" bg-gray-50 block px-4 py-2 text-sm text-black hover:bg-gray-200" role="menuitem" tabindex="-1" >
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="w-full text-left text-red-600" data-delete> 
                    Eliminar
                  </button>
                </form>
              </div>
            </div>

          </div>
        </div>
        
        <!-- Contenido de la card -->
        <div class="flex-auto p-4">
          <!-- Empresa o persona -->
          <h6 class="font-bold leading-tight uppercase text-xs text-slate-500 mb-3">
            <i class="fa-solid fa-user-tie mr-1"></i> 
            {{$a->author}}
          </h6>
          
          <ul class="flex flex-col pl-0 mb-0 rounded-lg space-y-2">
            <li class="relative block px-0 py-1 bg-white border-0 rounded-t-lg text-inherit">
              <div class="flex items-center text-slate-600">
                <i class="fa-solid fa-info-circle text-xs mr-2"></i>
                <span class="text-sm">{{$a->description}}</span>
              </div>
            </li>

            <li class="relative block px-0 py-1 bg-white border-0 rounded-t-lg text-inherit">
              <div class="flex items-center text-slate-600">
                <i class="fa-solid fa-location-dot"></i>
                <span class="text-sm">{{$a->location}}</span>
              </div>
            </li>
            
            <li class="relative block px-0 py-1 bg-white border-0 text-inherit">
              <div class="flex items-center text-slate-600">
                <i class="fa-solid fa-calendar-day text-xs mr-2"></i>
                <span class="text-sm">{{\Carbon\Carbon::parse($a->start_date)->format('d/m/Y')}}</span>
              </div>
            </li>
            
            <li class="relative block px-0 py-1 bg-white border-0 rounded-b-lg text-inherit">
              <div class="flex items-center text-slate-600">
                <i class="fa-solid fa-clock text-xs mr-2"></i>
                <span class="text-sm">{{ \Carbon\Carbon::parse($a->hour)->format('h:i A') }}</span>
              </div>
            </li>
          </ul>
        </div> 
      </div>
    </div>
    <!--aqui termina el foreach -->
    @endforeach

  </div>
</div>

@if($act->isEmpty())
<div class="w-full p-6 text-center">
  <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-8">
    <i class="fa-solid fa-inbox text-4xl text-yellow-400 mb-4"></i>
    <h3 class="text-lg font-semibold text-yellow-800 mb-2">No hay actividades registradas</h3>
    <p class="text-yellow-600">Comienza agregando una nueva actividad usando el botón "Nuevo"</p>
  </div>
</div>
@endif

<script>
  document.addEventListener('click', function(event) {
    const clickedButton = event.target.closest('[id^="menu-button-"]');
    const allMenus = document.querySelectorAll('[id^="dropdown-menu-"]');
    if (clickedButton) {
      const id = clickedButton.id.split('-')[2];
      const menuToToggle = document.getElementById('dropdown-menu-' + id);
      allMenus.forEach(menu => {
        if (menu !== menuToToggle) {
          menu.classList.add('hidden'); // Cierra los demás
        }
      });
      // Toggle el menú clickeado
      menuToToggle.classList.toggle('hidden');
      event.stopPropagation();
    } else {
      // Clic fuera: cerrar todos
      allMenus.forEach(menu => menu.classList.add('hidden'));
    }
  });
</script>