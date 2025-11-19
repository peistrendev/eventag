<x-sidebarAdmin/>
    <x-sweetAlerts/>


   

      <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <!-- Botón Nuevo arriba de la tabla -->
<div class="flex justify-end mb-4">
  <a href="{{url('user/create')}}"
     class="inline-block px-6 py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all text-sm">
    <i class="fa fa-plus mr-2"></i> Nuevo
  </a>
</div>
        <div class="flex flex-wrap -mx-3">
          <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Tabla de Usuarios</h6>
              </div>
              <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                  <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                      <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Usuario</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email </th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Rol</th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($us as $u)

                      <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                          <div class="flex px-2 py-1">
                            <div>
                              <img src="" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 text-sm leading-normal">{{$u->name}}</h6>
                              <p class="mb-0 text-xs leading-tight text-slate-400"></p>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                          <p class="mb-0 text-xs font-semibold leading-tight">{{$u->email}}</p>
                          <p class="mb-0 text-xs leading-tight text-slate-400"></p>
                        </td>
                        <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                          <span class="bg-gradient-to-tl  px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold  leading-none text-slate-400">

                           @php
                              $rolName = 'Sin rol';
                              foreach($rol as $r) {
                                  if($r->id == $u->rol_id) {
                                      $rolName = $r->name;
                                      break;
                                  }
                              }
                          @endphp
                          {{ $rolName }}

                          </span>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                          <span class="text-xs font-semibold leading-tight text-slate-400"></span>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                          <a href="{{url('user/'.$u->id.'/edit')}}" class="text-xs font-semibold leading-tight text-blue-500"> <i class="fa-solid fa-pen"></i> </a>
                        </td>
                        
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        
                          <form action="{{url('user/destroy/'.$u->id)}}" method="POST" >

                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-xs font-semibold leading-tight text-red-500 bg-transparent border-none cursor-pointer" data-delete>
                                <i class="fa-solid fa-trash"></i>
                              </button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
          
                    </tbody>
                  </table>
                  <div class="mt-6 flex justify-center">
    {{ $us->links('pagination::tailwind') }}
</div>
                </div>
              </div>

              @if($us->isEmpty())
<div class="w-full p-6 text-center">
  <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-8">
    <i class="fa-solid fa-inbox text-4xl text-yellow-400 mb-4"></i>
    <h3 class="text-lg font-semibold text-yellow-800 mb-2">No hay usuarios registrados</h3>
    <p class="text-yellow-600">Comienza agregando un nuevo usuario usando el botón "Nuevo"</p>
  </div>
</div>
@endif
            </div>
          </div>
        </div>
        


      </div>
    </main>
    
          
    <!--MODAL PARA CONFIRMAR EL DELETE DEL REGISTRO-->

  
