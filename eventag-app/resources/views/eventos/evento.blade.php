<x-sidebarAdmin/>

<x-sweetAlerts></x-sweetAlerts>

<!-- Botón Nuevo arriba de la tabla -->
<div class="flex justify-end mb-4">
  <a href="{{ url('event/create') }}"
     class="inline-block px-6 py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all text-sm mr-4">
    <i class="fa fa-plus mr-2"></i> Nuevo
  </a>
</div>

<!-- Contenedor de cards -->
<div class="flex flex-wrap justify-start mx-auto max-w-full mt-6">
  @foreach($event as $evento)
    <div class="w-full sm:w-1/2 lg:w-5/12 px-3 mb-6">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
        <div class="flex-auto p-4">
          <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
              <div class="flex flex-col h-full">
                <p class="pt-2 mb-1 font-semibold">Del {{ \Carbon\Carbon::parse($evento->start_date)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($evento->finish_date)->format('d/m/Y') }}</p>
                <h5 class="font-bold">{{ $evento->name }}</h5>
                <p class="mb-4">{{ $evento->description }}</p> <!-- Reduje mb-12 a mb-4 para dar espacio a los enlaces -->

                <!-- Enlaces alineados horizontalmente -->
                <div class="flex flex-row gap-4 mt-auto">
                  <!-- Enlace Entrar -->
                  <a class="font-semibold leading-normal text-sm group text-slate-500 hover:text-slate-700" href="{{ url('visitor/all?evento_id='. $evento->id) }}">
                    Entrar
                    <i class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                  </a>
                  
                  <!-- Enlace Config -->
                  <a class="font-semibold ml-4 leading-normal text-sm group text-slate-500 hover:text-slate-700" href="{{ url('event/'.$evento->id.'/edit') }}">
                    Config
                    <i class="fa-solid fa-gear ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                  </a>
                  
                  <!-- Form de Eliminar (alineado como enlace) -->
                  <form action="{{ url('event/destroy/'. $evento->id) }}" method="POST" class="inline ml-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="font-semibold leading-normal text-sm group text-red-500 hover:text-red-700 bg-transparent border-none cursor-pointer"
                            data-delete
                            >
                      Eliminar
                      <i class="fa-solid fa-trash ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
              <div class="h-full bg-gradient-to-tl rounded-xl flex items-center justify-center p-4">
                <img src="{{ asset($evento->logo) }}" alt="Logo del evento"
                     class="w-full max-w-[150px] h-auto object-contain rounded-lg" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

<div class="mt-6 flex justify-center">
  {{ $event->links('pagination::tailwind') }}
</div>