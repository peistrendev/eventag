<x-sidebarAdmin/>

<x-sweetAlerts></x-sweetAlerts>

 <!-- Botón Reporte Excel -->
 <div class="flex "></div>
<a href="{{ url('exportarExpositores?evento_id='.request()->get('evento_id')) }}"
   class=" m-6 justify-content-end  px-3 py-2 bg-gray-600 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all text-sm">
  <i class="fa-solid fa-file-excel"></i> XLS
</a>


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
          <a href="{{ url('expositorofex/info/'.$e->id.'?id='.$expoid.'&evento_id='.$eventid) }}"
            class="btn-ver inline-block px-4 py-2 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-transform text-sm">
            Ver
          </a>

         
        </div>


      </div>
    </div>
  @endforeach
</div>




