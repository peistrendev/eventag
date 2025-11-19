<x-sidebarAdmin/>

<x-sweetAlerts></x-sweetAlerts>

<h3>Bienvenido de vuelta
    @if($expo->user_id == auth()->user()->id )
        {{$expo->name}}
  @endif
</h3>

<!-- Contenedor de cards -->
<div class="flex flex-wrap justify-start mx-auto max-w-full mt-6">
  
    <div class="w-full sm:w-1/2 lg:w-5/12 px-3 mb-6">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
        <div class="flex-auto p-4">
          <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
              <div class="flex flex-col h-full">
                <p class="pt-2 mb-1 font-semibold">Del 
                  
                  
                  {{ \Carbon\Carbon::parse($eventexpo->start_date)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($eventexpo->finish_date)->format('d/m/Y') }}</p>
                <h5 class="font-bold">{{ $eventexpo->name }}</h5>
                <p class="mb-4">{{$eventexpo->description}}</p> <!-- Reduje mb-12 a mb-4 para dar espacio a los enlaces -->

                <!-- Enlaces alineados horizontalmente -->
                <div class="flex flex-row gap-4 mt-auto">
                  <!-- Enlace Entrar -->
                  <a class="font-semibold leading-normal text-sm group text-slate-500 hover:text-slate-700" href="{{ url('visitorofex/all?id='.$expo->id.'&evento_id='. $eventexpo->id) }}">
                    Entrar
                    <i class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
              <div class="h-full bg-gradient-to-tl rounded-xl flex items-center justify-center p-4">
                <img src="{{asset($eventexpo->logo)}}" alt="Logo del evento"
                     class="w-full max-w-[150px] h-auto object-contain rounded-lg" />
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  
</div>
