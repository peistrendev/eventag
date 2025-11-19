<x-sidebarAdmin/>

<!-- Contenedor padre con ancho completo -->
<div class="w-full max-w-full px-3 lg-max:mt-6">
  <!-- Recuadro para la imagen, con mismo estilo que el card -->
  <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border mb-6 ml-4">
    <div class="flex justify-center items-center p-6">
      <img src="{{asset($exp->logo)}}" alt="Imagen centrada" class="max-w-full h-auto rounded-2xl" />
    </div>
  </div>
  <!-- Card Profile Information con ancho completo -->
  <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border ml-4">
    <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
      <div class="flex flex-wrap -mx-3">
        <div class="flex justify-center items-center w-full max-w-full px-3 shrink-0">
          <h3 class="mb-4 ">{{$exp->name}}</h3>
        </div>
       
      </div>
    </div>
    <div class="flex-auto p-4">
      <p class="leading-normal text-sm">
        <p class="mb-4">{{$exp->description}}</p> <br>
        
        <p><b>Productos o servicios que ofrece: </b><br>{{$exp->prod_ofrece}}</p>
        <hr>
        <p><b>Productos o servicios que demanda: </b><br>{{$exp->prod_ofrece}}</p>
        <hr>
       <div class="mb-4"> <a href="{{$exp->pagina_web}}" ><i class="fa-solid fa-globe"></i> Web</a></div>  <!-- Añadí texto para claridad -->
          <div class="mb-4"><i class="fa-solid fa-envelope"></i>{{$exp->email}}</div>
          <div class="mb-4"><i class="fa-solid fa-phone"></i>{{$exp->phone}}</div>
          <div><i class="fa-solid fa-location-dot"></i>{{$exp->location}}</div>
      </p>
      <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
    </div>
  </div>
</div>
