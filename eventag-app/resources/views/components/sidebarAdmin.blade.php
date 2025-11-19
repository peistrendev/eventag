<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('img/icon.png') }}" />
    
      @if(request()->routeIs('event.all') || request()->routeIs('event.create') || request()->routeIs('event.edit'))
      <title>
        EvenTag - Eventos
        </title>
      @elseif(request()->routeIs('visitor.all'))
      <title> 
        EvenTag - Visitantes del Evento
        </title>
      @endif
      
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/bb8b54b78c.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    @vite('resources/css/nucleo-icons.css')

    

    
   

    @vite('resources/css/nucleo-svg.css')
  
    <!-- Main Styling -->
   @vite('resources/css/soft-ui-dashboard-tailwind.css')
   <link rel="stylesheet" href="../../css/soft-ui-dashboard-tailwind.css">

   <!--SweetAlert-->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

    <!-- ChartJS -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 <!-- Flowbite -->
 <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

      <style>
          /* Forzar borde verde en focus para inputs, textarea y select */
          input:focus, textarea:focus, select:focus {
            border-color: #22c55e !important; /* verde-400 */
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3) !important; /* sombra verde suave */
          }
        </style>
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    
    <aside class="left-0 max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 mt-2 mb-2 min-h-screen block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:ml-0 xl:left-0 xl:translate-x-0 xl:bg-transparent">
      <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="" target="_blank">
          <img src="{{ asset('img/logo.png') }}" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
          <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">EvenTag</span>
        </a>
      </div>

      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

      <div class="items-center block w-auto   h-sidenav ">
        <ul class="flex flex-col pl-0 mb-0">


          <x-sidebarModules>
          </x-sidebarModules>
          
        </ul>
      </div>

      <div class="mx-4">
        <!-- load phantom colors for card after: -->
        <p class="invisible hidden text-gray-800 text-red-500 text-red-600 after:bg-gradient-to-tl after:from-gray-900 after:to-slate-800 after:from-blue-600 after:to-cyan-400 after:from-red-500 after:to-yellow-400 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-rose-400 after:from-slate-600 after:to-slate-300 text-lime-500 text-cyan-500 text-slate-400 text-fuchsia-500"></p>
        <div class="after:opacity-65 after:bg-gradient-to-tl after:from-slate-600 after:to-slate-300 relative flex min-w-0 flex-col items-center break-words rounded-2xl border-0 border-solid border-blue-900 bg-white bg-clip-border shadow-none after:absolute after:top-0 after:bottom-0 after:left-0 after:z-10 after:block after:h-full after:w-full after:rounded-2xl after:content-['']" sidenav-card>
         
           
            
          </div>
        </div>
        
    </aside>


    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <!-- breadcrumb -->

         
          </nav>

          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
            
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
              
              <li class="flex items-center pl-4 xl:hidden">
                <a href="javascript:;" class="block p-0 text-sm transition-all ease-nav-brand text-slate-500" sidenav-trigger>
                  <div class="w-4.5 overflow-hidden">
                    <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                    <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                    <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                  </div>
                </a>
              </li>
              
           
              <li class="flex items-center">
                <form action="{{route('logout')}}" method="POST">
                  @csrf
                <button type="submit"  class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500">
                  <i class="fa-solid fa-right-from-bracket ml-4" aria-hidden="true"></i>
                  <span class="hidden sm:inline">Cerrar sesión</span>
                </button>
                </form>
              </li>
         

            
            </ul>
          </div>
        </div>
      </nav>

    

    {{$slot}}

    </body>
  <!-- plugin for scrollbar  -->
  @vite('resources/js/plugins/perfect-scrollbar.min.js')
    <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
  <!-- github button -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- main script file  -->
@vite('resources/js/soft-ui-dashboard-tailwind.js')
<script src="{{asset('js/soft-ui-dashboard-tailwind.js')}}"></script>

<!-- ChartJS scripts -->
@vite('resources/js/chart-1.js')
<script src="{{asset('js/chart-1.js')}}"></script>
@vite('resources/js/chart-2.js')
<script src="{{asset('js/chart-2.js')}}"></script>

<!-- Código JS para mostrar/ocultar el menú lateral en responsive -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const trigger = document.querySelector('[sidenav-trigger]');
    const sidenav = document.querySelector('aside');
    const closeBtn = document.querySelector('[sidenav-close]');
    
    // Función para ocultar el sidebar en pantallas grandes (xl+)
    function hideSidebarOnLargeScreen() {
      if (window.innerWidth >= 1280) { // xl breakpoint en Tailwind es 1280px
        sidenav.classList.add('-translate-x-full');
      }
    }
    
    if (trigger && sidenav) {
      trigger.addEventListener('click', function () {
        sidenav.classList.toggle('-translate-x-full');
      });
    }
    if (closeBtn && sidenav) {
      closeBtn.addEventListener('click', function () {
        sidenav.classList.add('-translate-x-full');
      });
    }
    
    // Escuchar cambios de tamaño de ventana para ocultar en desktop si está abierto
    window.addEventListener('resize', hideSidebarOnLargeScreen);
    hideSidebarOnLargeScreen(); // Verificar al cargar
  });
</script>

</html>