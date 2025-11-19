   {{$slot}}
   @if(request()->is('event/dash'))
          <li class="mt-0.5 w-full">
            <a class="shadow-soft-xl rounded-lg bg-white py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('event/dash')}}">
              <div class=" py-2.7 bg-gradient-to-tl from-green-600 to-lime-400  shadow-soft-2x mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-chart-simple text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard Eventos </span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('event/all')}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
               <i class="fa-solid fa-ticket"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Eventos </span>
            </a>
          </li>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Sobre la cuenta</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('myprofile')}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-user"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Perfil</span>
            </a>
          </li>

          
          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('user/all')}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
               <i class="fa-solid fa-address-card"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Usuarios</span>
            </a>
          </li>
          @elseif(request()->is('event/all') || request()->is('event/create') || request()->is('event/*/edit') )

            <li class="mt-0.5 w-full">
            <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('event/dash')}}">
              <div class="   mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-chart-simple "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard Eventos </span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors bg-white" href="{{url('event/all')}}">
              <div class=" py-2.7 bg-gradient-to-tl from-green-600 to-lime-400  shadow-soft-2x mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
               <i class="fa-solid fa-ticket text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Eventos </span>
            </a>
          </li>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Sobre la cuenta</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/profile.html">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-user"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Perfil</span>
            </a>
          </li>

          
          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('user/all')}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
               <i class="fa-solid fa-address-card"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Usuarios</span>
            </a>
          </li>

          @elseif(request()->is('visitor/all') || request()->is('visitor/create') || request()->is('visitor/*/edit')|| request()->is('visitor/*/qr') )
        

          <li class="mt-0.5 w-full">
            <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors" href="{{url('visitor/all?evento_id='. request()->get('evento_id'))}}">
              <div class="bg-gradient-to-tl from-green-600 to-lime-400 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-users text-lg text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Visitantes</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('expositor/all?evento_id='. request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-person-chalkboard"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Expositores</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('activity/all?evento_id='. request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-calendar"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Actividades</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('sorteo/all?evento_id='.request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <i class="fa-solid fa-trophy"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Rifa</span>
            </a>
          </li>

        

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('event/dash')}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-circle-xmark"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Salir a eventos</span>
            </a>
          </li>


          @elseif(request()->is('expositor/all') || request()->is('expositor/create')|| request()->is('expositor/info/*') || request()->is('expositor/*'))


          

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('visitor/all?evento_id='. request()->get('evento_id'))}}">
              <div class=" shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-users text-lg "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Visitantes</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 shadow-soft-xl rounded-lg bg-white text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('expositor/all?evento_id='. request()->get('evento_id'))}}">
              <div class="bg-gradient-to-tl from-green-600 to-lime-400 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-person-chalkboard text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Expositores</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('activity/all?evento_id='. request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-calendar"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Actividades</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('sorteo/all?evento_id='.request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <i class="fa-solid fa-trophy"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Rifa</span>
            </a>
          </li>

      

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('event/dash')}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-circle-xmark"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Salir a eventos</span>
            </a>
          </li>


           @elseif(request()->is('sorteo/all') )



          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('visitor/all?evento_id='. request()->get('evento_id'))}}">
              <div class=" shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-users text-lg "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Visitantes</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7   text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('expositor/all?evento_id='. request()->get('evento_id'))}}">
              <div class=" shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-person-chalkboard "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Expositores</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('activity/all?evento_id='. request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-calendar"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Actividades</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" bg-white shadow-soft-xl rounded-lg py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('sorteo/all?evento_id='.request()->get('evento_id'))}}">
              <div class="bg-gradient-to-tl from-green-600 to-lime-400 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <i class="fa-solid fa-trophy text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Rifa</span>
            </a>
          </li>

      

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('event/dash')}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-circle-xmark"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Salir a eventos</span>
            </a>
          </li>


          
          
          @elseif(request()->is('activity/all') || request()->is('activity/create') || request()->is('activity/*/edit') )


          
          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('visitor/all?evento_id='. request()->get('evento_id'))}}">
              <div class=" shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-users text-lg "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Visitantes</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('expositor/all?evento_id='. request()->get('evento_id'))}}">
              <div class=" shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-person-chalkboard "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Expositores</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 shadow-soft-xl rounded-lg bg-white text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('activity/all?evento_id='. request()->get('evento_id'))}}">
              <div class="bg-gradient-to-tl from-green-600 to-lime-400 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-calendar text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Actividades</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('sorteo/all?evento_id='.request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <i class="fa-solid fa-trophy"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Rifa</span>
            </a>
          </li>

          

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('event/dash')}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-circle-xmark"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Salir a eventos</span>
            </a>
          </li>

          @elseif(request()->is('user/all') || request()->is('user/create') || request()->is('user/*/edit') )


           <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('event/dash')}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-chart-simple"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard Eventos </span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors " href="{{url('event/all')}}">
              <div class=" py-2.7    shadow-soft-2x mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
               <i class="fa-solid fa-ticket "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Eventos </span>
            </a>
          


          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Sobre la cuenta</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/profile.html">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-user"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Perfil</span>
            </a>
          </li>

          
          <li class="mt-0.5 w-full">
            <a class="py-2.7 shadow-soft-xl rounded-lg bg-white text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/profile.html">
              <div class="shadow-soft-2xl bg-gradient-to-tl from-green-600 to-lime-400 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
               <i class="fa-solid fa-address-card text-white"></i>
              </div>
              <span class="ml-1  duration-300 opacity-100 pointer-events-none ease-soft">Usuarios</span>
            </a>
          </li>

          
      
              @elseif(request()->is('visitorofex/all') || request()->is('visitorofex/create') || request()->is('visitorofex/createCI')  )

          <li class="mt-0.5 w-full">
            <a class="shadow-soft-xl rounded-lg bg-white py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('visitorofex/all') . '?' . http_build_query(['id' => request()->get('id'), 'evento_id' => request()->get('evento_id')]) }}">
              <div class=" bg-gradient-to-tl from-green-600 to-lime-400 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-users text-lg text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Mis Visitantes</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('expositorofex/all?id='.request()->get('id').'&evento_id='. request()->get('evento_id'))}}">
              <div class=" shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-person-chalkboard "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Expositores</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('activityofex/all?id='.request()->get('id').'&evento_id='.request()->get('evento_id'))}}">
              <div class="0 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-calendar"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Actividades</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('sorteofex/all?id='.request()->get('id').'&evento_id='.request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <i class="fa-solid fa-trophy"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Rifa</span>
            </a>
          </li>

         

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('eventofex/all?id='. request()->get('id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-circle-xmark"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Salir a eventos</span>
            </a>
          </li>

              @elseif(request()->is('expositorofex/all') || request()->is('expositorofex/info/*'))
          
          <li class="mt-0.5 w-full">
            <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('visitorofex/all') . '?' . http_build_query(['id' => request()->get('id'), 'evento_id' => request()->get('evento_id')]) }}">
              <div class="  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-users text-lg "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Mis Visitantes</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="shadow-soft-xl rounded-lg  py-2.7 bg-white text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('expositorofex/all?id='.request()->get('id').'&evento_id='. request()->get('evento_id'))}}">
              <div class=" bg-gradient-to-tl from-green-600 to-lime-400 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-person-chalkboard text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft ">Expositores</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('activityofex/all?id='.request()->get('id').'&evento_id='.request()->get('evento_id'))}}">
              <div class="0 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-calendar"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Actividades</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('sorteofex/all?id='.request()->get('id').'&evento_id='.request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <i class="fa-solid fa-trophy"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Rifa</span>
            </a>
          </li>

         

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('eventofex/all?id='. request()->get('id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-circle-xmark"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Salir a eventos</span>
            </a>
          </li>


                @elseif(request()->is('activityofex/all') )
          
          <li class="mt-0.5 w-full">
            <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('visitorofex/all') . '?' . http_build_query(['id' => request()->get('id'), 'evento_id' => request()->get('evento_id')]) }}">
              <div class="  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-users text-lg "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Mis Visitantes</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="  py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('expositorofex/all?id='.request()->get('id').'&evento_id='. request()->get('evento_id'))}}">
              <div class=" shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-person-chalkboard "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft ">Expositores</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="shadow-soft-xl rounded-lg py-2.7 bg-white  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('activityofex/all?id='.request()->get('id').'&evento_id='.request()->get('evento_id'))}}">
              <div class="bg-gradient-to-tl from-green-600 to-lime-400  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-calendar text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Actividades</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('sorteofex/all?id='.request()->get('id').'&evento_id='.request()->get('evento_id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <i class="fa-solid fa-trophy"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Rifa</span>
            </a>
          </li>

         

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('eventofex/all?id='. request()->get('id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-circle-xmark"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Salir a eventos</span>
            </a>
          </li>


                @elseif(request()->is('sorteofex/all') )
          
          <li class="mt-0.5 w-full">
            <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('visitorofex/all') . '?' . http_build_query(['id' => request()->get('id'), 'evento_id' => request()->get('evento_id')]) }}">
              <div class="  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa fa-users text-lg "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Mis Visitantes</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="  py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('expositorofex/all?id='.request()->get('id').'&evento_id='. request()->get('evento_id'))}}">
              <div class=" shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-person-chalkboard "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft ">Expositores</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" py-2.7   text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('activityofex/all?id='.request()->get('id').'&evento_id='.request()->get('evento_id'))}}">
              <div class="  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-calendar "></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Actividades</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 shadow-soft-xl rounded-lg bg-white text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('sorteofex/all?id='.request()->get('id').'&evento_id='.request()->get('evento_id'))}}">
              <div class="bg-gradient-to-tl from-green-600 to-lime-400 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <i class="fa-solid fa-trophy text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Rifa</span>
            </a>
          </li>

         

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('eventofex/all?id='. request()->get('id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-circle-xmark"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Salir a eventos</span>
            </a>
          </li>




          @elseif(request()->is('eventofex/all'))
          <li class="mt-0.5 w-full">
            <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors bg-white" href="{{url('eventofex/all?id='. request()->get('id'))}}">
              <div class=" py-2.7 bg-gradient-to-tl from-green-600 to-lime-400  shadow-soft-2x mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
               <i class="fa-solid fa-ticket text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Eventos </span>
            </a>
          </li>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Sobre la cuenta</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('myprofile?id='.request()->get('id'))}}">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-user"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Perfil</span>
            </a>
          </li>
          
            @elseif(request()->is('myprofile') )
          <li class="mt-0.5 w-full">
            <a class="py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors" href="{{url('eventofex/all?id='. request()->get('id'))}}">
              <div class=" py-2.7  shadow-soft-2x mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
               <i class="fa-solid fa-ticket"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Eventos </span>
            </a>
          </li>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Sobre la cuenta</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class="rounded-lg  shadow-soft-xl  py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors bg-white" href="{{url('myprofile?id='.request()->get('id'))}}">
              <div class=" bg-gradient-to-tl from-green-600 to-lime-400  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-user text-white"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Perfil</span>
            </a>
          </li>
          
          @endif

          {{$slot}}
        