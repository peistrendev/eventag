  <x-sidebarAdmin>
    
    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
      

      <!-- Sección de bienvenido estilizada -->
  <div class="mb-8 p-6 bg-gradient-to-r from-slate-600 to-slate-300 rounded-2xl shadow-soft-xl mb-4 text-white">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
      <div class="flex items-center space-x-4">
        <div class="p-3 bg-white/20 rounded-full">
          
        </div>
        <div>
          <h5 class="text-2xl sm:text-3xl font-bold leading-tight text-white">¡Bienvenido de vuelta!</h5>
          <p class="text-lg opacity-90">{{ auth()->user()->name }}</p>
        </div>
      </div>
      <div class="mt-4 sm:mt-0 flex items-center space-x-2 text-sm opacity-90">
        <i class="fas fa-calendar-day"></i>
        <span>Hoy: {{ now()->format('d/m/Y') }}</span>
      </div>
    </div>
  </div>

<!--BOTON PARA MOSTRAR ESTADISTICAS DE UN EVENTO-->
  <form action="{{url('event/dash')}}" class="m-4 p-4">
  <div>
    <h5>Selecciona un Evento</h5>
    <div class="flex items-center space-x-2">
      <select name="eventos" id="eventos" class="border border-gray-300 rounded-lg p-2">
        <option value="" {{ !request('eventos') ? 'selected' : '' }}>Seleccione...</option>
        @foreach($event as $e)
        <option value="{{$e->id}}" {{ request('eventos') == $e->id ? 'selected' : '' }}>{{$e->name}}</option>
        @endforeach
      </select>
      <button type="submit" class=" ml-4 px-4 py-2  rounded-lg bg-gradient-to-tl from-slate-600 to-slate-300 text-white ">
        <i class="fa-solid fa-eye"></i>
      </button>
    </div>
  </div>
</form>


      <div class="flex flex-wrap -mx-3">


         <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
          <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
              <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                  <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Usuarios Administradores</p>
                    <h5 class="mb-0 font-bold">
                      {{$userAd}}
                      <span class="leading-normal text-sm font-weight-bolder text-lime-500"></span>
                    </h5>
                  </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                  <div class="flex items-center justify-center w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-green-600 to-lime-400">
                    <i class="fa-solid fa-circle-user text-white"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
          <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
              <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                  <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Expositores en {{$eventSelect}} </p>
                    <h5 class="mb-0 font-bold">
                      {{$userEx}}
                      <span class="leading-normal text-sm font-weight-bolder text-lime-500"></span>
                    </h5>
                  </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                  <div class="flex items-center justify-center w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-green-600 to-lime-400">
                    <i class="fa-solid fa-person-chalkboard text-white"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

       

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
          <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
              <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                  <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Evento Seleccionado</p>
                    <h5 class="mb-0 font-bold text-sm">
                      {{$eventSelect}}
                      <span class="leading-normal text-red-600 text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                  <div class="flex items-center justify-center w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-green-600 to-lime-400">
                    <i class="fa-solid fa-ticket text-white"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- card4 -->
        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
          <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
              <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                  <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Visitantes en {{$eventSelect}} </p>
                    <h5 class="mb-0 font-bold">
                      {{$visi}}
                      <span class="leading-normal text-sm font-weight-bolder text-lime-500"></span>
                    </h5>
                  </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                  <div class="flex items-center justify-center w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-green-600 to-lime-400">
                    <i class="fa fa-users text-lg text-white"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      

      <!-- CARDS -->
      <!-- Contenedor principal para gráficas apiladas y aside -->
      <div class="flex flex-col lg:flex-row -mx-3 mt-6">
        <!-- Columna principal de gráficas (2/3 en lg, apiladas verticalmente) -->
        <div class="w-full lg:w-2/3 px-3">


          <!-- Grafica lineal de visitantes registrados por dia -->
          <div class="w-full">
            <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                <h6>Visitantes registrados en el sistema por dia en {{$eventSelect}}</h6>
                <p class="leading-normal text-sm">
                  <i class="fa fa-arrow-down text-lime-500"></i>
                  
                </p>
              </div>
              <div>
                <form action="{{ url('event/dash') }}" class="m-4">
                  <input type="hidden" name="eventos" value="{{ request('eventos') }}"> <!-- Mantener el evento seleccionado -->
                  @php
                      $meses = [
                          1 => 'Enero',
                          2 => 'Febrero',
                          3 => 'Marzo',
                          4 => 'Abril',
                          5 => 'Mayo',
                          6 => 'Junio',
                          7 => 'Julio',
                          8 => 'Agosto',
                          9 => 'Septiembre',
                          10 => 'Octubre',
                          11 => 'Noviembre',
                          12 => 'Diciembre'
                      ];
                  @endphp

                  <select name="mes" id="mes" class="border border-gray-300 rounded-lg p-2">
                      <option value="" {{ !request('mes') ? 'selected' : '' }}>Seleccione un mes</option>
                      @foreach($meses as $numero => $mesNombre)
                          <option value="{{ $numero }}" {{ request('mes') == $numero ? 'selected' : '' }}>{{ $mesNombre }}</option>
                      @endforeach
                  </select>
                  <button type="submit" class=" ml-4 px-4 py-2  rounded-lg bg-gradient-to-tl from-slate-600 to-slate-300 text-white ">
                    <i class="fa-solid fa-chart-simple"></i>
                  </button>
                </form>
              </div>
              <div class="flex-auto p-4">
                <div>
                  <canvas id="chart" height="300"></canvas>
                </div>
              </div>
            </div>
          </div>

          

          
        </div>

        <!-- Aside: Orders overview (1/3 en lg, al lado derecho) -->
        <div class="w-full lg:w-1/3 px-3 mt-6 lg:mt-0">
          <div class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
              <h6>ACTIVIDADES EN {{$eventSelect}}</h6>
              <p class="leading-normal text-sm">
                
                <span class="font-semibold">{{$actiTot}}</span> Actividades Registradas
              </p>
            </div>
            <div class="flex-auto p-4">

              @foreach($acti as $a)
              <div class="before:border-r-solid relative before:absolute before:top-0 before:left-4 before:h-full before:border-r-2 before:border-r-slate-100 before:content-[''] before:lg:-ml-px">
                <div class="relative mb-4 mt-0 after:clear-both after:table after:content-['']">
                  <span class="w-6.5 h-6.5 text-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
                    <i class="fa-solid fa-calendar relative z-10 text-transparent ni leading-none ni-bell-55 leading-pro bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text "></i>
                  </span>
                  <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
                    <h6 class="mb-0 font-semibold leading-normal text-sm text-slate-700">{{$a->name}}</h6>
                    <h4 class="mb-0 font-semibold leading-normal text-sm text-slate-500"><a href="{{url('activity/all?evento_id='. $a->evento_id)}}">En 
                    @if($a->evento_id == $eventoAct->id)  
                      {{$eventoAct->name}}</a>
                      @endif
                    </h4>
                    <p class="mt-1 mb-0 font-semibold leading-tight text-xs text-slate-400">{{$a->start_date}} - {{$a->hour}}</p>
                  </div>
                </div>
              </div>
              @endforeach
              <div class="mt-6 flex justify-center">
                  {{ $acti->links('pagination::tailwind') }}
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- end cards -->
  </main>

   

  <script>

     
    // Datos de visitantes por día desde el controlador formato JSON
    var visitantesData = @json($visitantesPorDia);
    // Mes seleccionado desde el controlador (por defecto el actual)
    var mesSeleccionado = @json($mes);
    // Días en el mes seleccionado
    var daysInMonth = @json($diaMes);
    // Día máximo (hoy si es mes actual, de lo contrario todos los días)
    var maxDay = @json($maxDay);

    // Logs para depuración (remuévelos después de probar)
    console.log('visitantesData:', visitantesData);
    console.log('mesSeleccionado:', mesSeleccionado);
    console.log('daysInMonth:', daysInMonth);
    console.log('maxDay:', maxDay);

    // Script existente para la gráfica de línea (chart) - ajustado para mes dinámico
    var ctx = document.getElementById("chart").getContext("2d");

    // Generar etiquetas dinámicas para los días del mes seleccionado
    const numLabels = maxDay; // Hasta el día máximo (hoy o todos los días)
    const labels = Array.from({length: numLabels}, (_, i) => `${i + 1}/${mesSeleccionado}`);
    console.log('labels:', labels); // Verifica que se generen correctamente

    // Procesar datos reales: crear array de longitud numLabels, rellenar con 0 y actualizar con conteos reales
    const data = new Array(numLabels).fill(0); // Inicializa con 0 para días sin visitantes
    visitantesData.forEach(function(item) {
        const dia = parseInt(item.dia); // Día del mes (1, 2, etc.)
        const index = dia - 1; // Índice en el array (0-based)
        if (index >= 0 && index < numLabels) {
            data[index] = item.total_visitantes; // Asigna el conteo real
        }
    });
    console.log('data:', data); // Verifica que se llene correctamente


      new Chart(ctx, {
          type: "line",
          data: {
              labels: labels, // Etiquetas dinámicas: días del mes actual (ej: ["1", "2", ..., "15"])
              datasets: [
                  {
                      label: "Visitantes",
                      tension: 0.4, // Curvatura suave en la línea
                      borderWidth: 3, // Grosor de la línea
                      pointRadius: 4, // Radio de los puntos en la línea
                      borderColor: "#28a745", // Verde medio para la línea
                      backgroundColor: "#28a745", // Color para los puntos (opcional)
                      fill: false, // Sin relleno de fondo bajo la línea
                      data: data, // Ahora usa los datos reales procesados (reemplaza el array hardcoded)
                  },
              ],
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      display: true, // Muestra la leyenda para identificar datasets
                      position: 'top',
                  },
              },
              interaction: {
                  intersect: false,
                  mode: "index",
              },
              scales: {
                  y: {
                      grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5],
                      },
                      ticks: {
                          display: true,
                          padding: 10,
                          color: "#b2b9bf",
                          font: {
                              size: 11,
                              family: "Open Sans",
                              style: "normal",
                              lineHeight: 2,
                          },
                      },
                      beginAtZero: true, // Comenzar el eje Y en 0 para mejor visualización
                  },
                  x: {
                      grid: {
                          drawBorder: false,
                          display: false,
                          drawOnChartArea: false,
                          drawTicks: false,
                          borderDash: [5, 5],
                      },
                      ticks: {
                          display: true,
                          color: "#b2b9bf",
                          padding: 20,
                          font: {
                              size: 11,
                              family: "Open Sans",
                              style: "normal",
                              lineHeight: 2,
                          },
                      },
                  },
              },
          },
      });
  </script>

  </x-sidebarAdmin>