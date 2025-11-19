<x-sidebarAdmin/>

<x-sweetAlerts/>



<div class="w-full  p-6 mx-auto">
  <div class="grid  grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <h3 class="mb-4">Actividades del evento</h3>
    <!-- Tarjetas de actividades aqui empieza el foreach-->
    @foreach($act as $a)
    <div class="w-full mb-6"> <!-- Cambié w-1/3 a w-full para que el grid controle el ancho -->
      <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border hover:shadow-lg transition-all duration-300 overflow-visible">
        
        <!-- Header de la card con dropdown -->
        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl flex justify-between items-start relative">
          <h5 class="mb-0 font-semibold text-slate-800">{{$a->name}}</h5>
          
          <!-- Dropdown container -->

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
    <h3 class="text-lg font-semibold text-yellow-800 mb-2">No hay actividades en el evento</h3>
    <p class="text-yellow-600"></p>
  </div>
</div>
@endif
