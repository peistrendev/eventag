<x-sidebarAdmin/>
<x-sweetAlerts></x-sweetAlerts>

<style>
  .tooltip {
    position: relative;
  }

  .tooltip::after {
    content: attr(data-tooltip);
    position: absolute;
    top: 125%; /* Ajusta la posición: arriba del elemento */
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.8); /* Fondo semi-transparente negro */
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 12px;
    white-space: normal; /* Evita que el texto se divida en líneas */
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    z-index: 9999; /* Aumenta para que se superponga a todo (cambio agregado) */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Sombra opcional para profundidad */
    max-width: 250px; /* Limita el ancho si el comentario es muy largo */
    max-height: 200px; /* Limita altura máxima para evitar tooltips infinitos (cambio agregado) */
    overflow: hidden;
    overflow-y: auto; /* Si el texto es muy largo verticalmente, permite scroll interno (cambio agregado) */
    text-overflow: ellipsis; /* Si es muy largo, muestra puntos suspensivos */
  }

  .tooltip:hover::after {
    opacity: 1;
    visibility: visible;
  }

  /* Opcional: Flecha apuntando al elemento (triángulo) */
  .tooltip::before {
    content: '';
    position: absolute;
    top: 100%; /* Justo debajo del tooltip */
    left: 50%;
    transform: translateX(-50%);
    border: 5px solid transparent;
    border-top-color: rgba(0, 0, 0, 0.8);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    z-index: 9999; /* Aumenta para que se superponga a todo (cambio agregado) */
  }

  .tooltip:hover::before {
    opacity: 1;
    visibility: visible;
  }

  /* Nueva regla para el contenedor de la tabla: permite desbordamiento vertical (agregado) */
  .table-container {
    overflow-x: auto; /* Mantiene scroll horizontal si la tabla es ancha */
    overflow-y: visible !important; /* Permite que el tooltip salga verticalmente sin cortarse */
    position: relative; /* Ayuda con el posicionamiento absoluto */
  }

  /* Opcional: Si quieres que el tooltip aparezca ARRIBA cuando hay poco espacio abajo (agregado) */
  /* Esto usa un hack CSS simple; para casos complejos, usa JS (ver abajo) */
  .tooltip.below-space::after {
    top: auto; /* Resetea top */
    bottom: 125%; /* Posición arriba del elemento */
    transform: translateX(-50%) translateY(100%); /* Ajusta para centrar arriba */
  }

  .tooltip.below-space::before {
    top: auto;
    bottom: 100%;
    border-top-color: transparent;
    border-bottom-color: rgba(0, 0, 0, 0.8); /* Flecha apunta arriba */
  }
</style>

<div class="w-full px-6 py-6 mx-auto">

    <!-- Contenedor para alinear botones y h6 en la misma línea, a la derecha -->
    <div class="flex items-center justify-end w-full mt-4 space-x-4 mb-4">

      <h6 class="text-sm font-bold mr-auto ml-4 mr-4">VISITANTES</h6>
        <!-- Boton de exportar XLSX -->
        <a href="{{url('exportarVisitantesExpositor?id='.request()->get('id').'&evento_id='.request()->get('evento_id'))}}"
           class="inline-block px-4 py-2 bg-slate-500 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all text-sm mr-2">
            <i class="fa-solid fa-file-excel"></i>XLS
        </a>

        <!-- Boton de Buscar visitante por CI -->
        <a href="{{ url('visitorofex/createCI?id='.request()->get('id').'&evento_id='.request()->get('evento_id')) }}"
           class="inline-block px-4 py-2 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all text-sm mr-2">
            <i class="fa-solid fa-id-badge"></i> CI
        </a>

        <!-- Botón Nuevo -->
        <a href="{{ url('visitorofex/create?id=' . $exp . '&evento_id=' . $event) }}"
           class="inline-block px-4 py-2 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all text-sm ">
            <i class="fa-solid fa-qrcode"></i> Scan
        </a>

        <!-- h6 en la misma línea -->
        
    </div>

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    

                    <form method="GET" action="{{ url()->current() }}" class="flex justify-end mb-4 items-center space-x-4">
                      
                        
                        <!-- Hidden para mantener parámetros al buscar -->
                        <input type="hidden" name="evento_id" value="{{ request('evento_id', $event) }}" />
                        <input type="hidden" name="id" value="{{ request('id', $exp) }}" />
                        
                        <!-- Botón Buscar (submit) -->
                        <button type="submit" 
                                class="bg-white inline-flex items-center px-4 py-3 font-semibold rounded-lg shadow-soft-md transition-all text-sm">
                            <i class="fa fa-search mr-2"></i> 
                        </button> 
                        <!-- Input de búsqueda -->
                        <input type="text" 
                               id="searchInput" 
                               name="search" 
                               placeholder="Buscar nombre, email, telefono, documento" 
                               value="{{ request('search') }}"
                               autocomplete="off"
                               class="mr-2 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500" />
                    </form>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <!-- Cambio aquí: Agregada clase 'table-container' y style para overflow-y visible -->
                    <div class="p-0 overflow-x-auto table-container" style="overflow-y: visible !important;">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nombre</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Telefono</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Ciudad</th>
                                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Razon Visita</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Clasificacion y comentarios</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visiexpo as $index => $v) 
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('img/user.jpg') }}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1" />
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">{{$v->name}}</h6>
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">V-{{$v->document}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">{{$v->phone}}</p>
                                            <input type="hidden" name="idvisi" class="mb-0 text-xs leading-tight text-slate-400" value="{{$v->id}}">
                                        </td>
                                        <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="bg-gradient-to-tl  px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold  leading-none text-slate-400">{{$v->email}}</span>
                                        </td>
                                        <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="bg-gradient-to-tl  px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold  leading-none text-slate-400">{{$v->location}}</span>
                                            
                                        </td>
                                        <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="bg-gradient-to-tl  px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold  leading-none text-slate-400">{{$v->razon}}</span>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            @foreach ($visiexpo2 as $vx)
                                                @if($vx->visitante_id == $v->id)
                                                    <!-- Cambio: Agregada clase condicional 'below-space' para las últimas 3 filas -->
                                                    <span data-tooltip="{{ htmlspecialchars($vx->clasification . ': ' . $vx->comments, ENT_QUOTES) }}" 
                                                          class="tooltip {{ ($index >= count($visiexpo) - 3) ? 'below-space' : '' }} text-xs font-semibold leading-tight text-slate-400 relative inline-block cursor-help">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                    </span>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-6 flex justify-center">
                          <h6 class="text-sm font-bold mr-auto ml-4">Total: {{$totalVisi}}</h6>
                            {{ $visiexpo->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Opcional: JavaScript para tooltips dinámicos (descomenta si el CSS no resuelve el clipping en viewport/scroll vertical) -->
<!--
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tooltips = document.querySelectorAll('.tooltip');
    
    tooltips.forEach(function(tooltip) {
        const tooltipText = tooltip.getAttribute('data-tooltip');
        let tooltipElement = null;
        
        tooltip.addEventListener('mouseenter', function(e) {
            // Crea el tooltip dinámicamente y lo appendea al body para evitar clipping
            tooltipElement = document.createElement('div');
            tooltipElement.className = 'dynamic-tooltip';
            tooltipElement.innerHTML = tooltipText.replace(/\n/g, '<br>'); // Soporte para saltos de línea si los hay
            tooltipElement.style.cssText = `
                position: fixed;
                top: ${e.clientY + 10}px; /* 10px abajo del mouse */
                left: ${e.clientX + 10}px; /* 10px a la derecha del mouse */
                background-color: rgba(0, 0, 0, 0.8);
                color: white;
                padding: 8px 12px;
                border-radius: 6px;
                font-size: 12px;
                white-space: normal;
                z-index: 9999;
                max-width: 250px;
                max-height: 200px;
                overflow-y: auto;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
                pointer-events: none;
                opacity: 1;
                visibility: visible;
            `;
            document.body.appendChild(tooltipElement);
            
            // Ajusta posición si sale del viewport
            const rect = tooltipElement.getBoundingClientRect();
            if (rect.bottom > window.innerHeight) {
                tooltipElement.style.top = (e.clientY - tooltipElement.offsetHeight - 10) + 'px'; // Mueve arriba
            }
            if (rect.right > window.innerWidth) {
                tooltipElement.style.left = (e.clientX - tooltipElement.offsetWidth - 10) + 'px'; // Mueve izquierda
            }
        });
        
        tooltip.addEventListener('mouseleave', function() {
            if (tooltipElement) {
                document.body.removeChild(tooltipElement);
                tooltipElement = null;
            }
        });
        
        // Mueve con el mouse para mejor UX (opcional)
        tooltip.addEventListener('mousemove', function(e) {
            if (tooltipElement) {
                tooltipElement.style.left = (e.clientX + 10) + 'px';
                tooltipElement.style.top = (e.clientY + 10) + 'px';
                
                // Re-ajusta si sale del viewport
                const rect = tooltipElement.getBoundingClientRect();
                if (rect.bottom > window.innerHeight) {
                    tooltipElement.style.top = (e.clientY - tooltipElement.offsetHeight - 10) + 'px';
                }
                if (rect.right > window.innerWidth) {
                    tooltipElement.style.left = (e.clientX - tooltipElement.offsetWidth - 10) + 'px';
                }
            }
        });
    });
});
</script>
-->
</main>