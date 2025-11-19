<x-sidebarAdmin/>
<x-sweetAlerts/>
 <div class="flex justify-center items-center w-full px-4 py-8">
  <div class="bg-white shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">
    <h6 class="mb-6 font-bold text-lg text-slate-700 text-center">Escanear código QR</h6>

    <!-- Recuadro de escaneo -->
    <button  id="btn-escanear"  class="mb-6 w-1/3 h-48 border-2 p-6 border-dashed border-green-400 rounded-lg flex items-center justify-center cursor-pointer hover:border-lime-500 transition-all">
       escanear QR
    </button>

    

    <!-- Contenedor del lector QR -->
<div id="reader" style="width:220px; display:none;"></div>


<form method="POST" action="{{url('/visitorofex/store')}}"
            class="bg-white shadow-soft-xl rounded-2xl p-6 w-full max-w-md mx-auto flex flex-col items-center">
        @csrf
    <!-- Inputs llenados por el JSON del QR -->
    <div id="qr-data" class="w-full hidden">
      
      <div class="mb-4 w-full flex flex-row justify-center gap-4">
        <div class="flex flex-col items-center w-full">
          <label for="nombre" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Nombre y Apellido</label>
          <input type="text" id="nombre" name="nombre"
                 class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                 placeholder="Jon Doe" disabled>
        </div>
        
      </div>

 <div class="mb-4 w-full flex flex-row justify-center gap-4">
      <div class="flex flex-col items-center w-full">
          <label for="documento" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Documento</label>
          <input type="text" id="documento" name="documento"
                 class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                 placeholder="Número de documento" disabled>
        </div>
  </div>      

      <div class="mb-4 w-full flex flex-row justify-center gap-4">
        <div class="flex flex-col items-center w-full">
          <label for="telefono" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Teléfono</label>
          <input type="text" id="telefono" name="telefono"
                 class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                 placeholder="Teléfono" disabled>
        </div>
        
      </div>


<div class="mb-4 w-full flex flex-row justify-center gap-4">
      <div class="flex flex-col items-center w-full">
          <label for="correo" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Correo</label>
          <input type="email" id="correo" name="correo"
                 class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                 placeholder="Correo electrónico" disabled>
        </div>
        </div>


      <div class="mb-6 w-full flex flex-col items-center">
        <label for="direccion" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Dirección</label>
        <textarea id="direccion" name="direccion"
                  class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all resize-none"
                  rows="3" placeholder="Dirección" disabled></textarea>
                  
      </div>
      <div class="mb-6 w-full flex flex-col items-center">
        <label for="razon" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Razon Visita</label>
        <input id="razon" name="razon"
                  class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all resize-none"
                  rows="3" placeholder="Razon" disabled>
                  
      </div>

       <div class="mb-4 w-full flex flex-row justify-center gap-4">
        <div class="flex flex-col items-center w-1/2">
          <label for="calsificacion" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Clasificacion</label>
          <select id="clasificacion" name="clasificacion" required
                        class="max-w-sm w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all">
                <option value="" disabled selected>Seleccione una clasificacion</option>
                <option value="Visitante"> Visitante </option>
                 <option value="Por contactar"> Por contactar </option>
                 <option value="Cliente"> Cliente </option>
                <option value="Potencial cliente"> Potencial cliente </option>
                <option value="Potencial proveedor"> Potencial proveedor </option>
                </select>
        </div>
        <div class="flex flex-col items-center w-1/2">
          <label for="comentario" class="block mb-2 text-sm font-semibold text-slate-600 text-center">Comentario</label>
          <input type="text" id="comentario" name="comentario"
                 class="max-w-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-green-400 focus:outline-none focus:shadow-soft-primary-outline transition-all"
                 placeholder="Contactar luego">
        </div>

        
      </div>



      <button type="submit"
                class="max-w-sm w-full py-3 bg-gradient-to-tl from-green-600 to-lime-400 text-white font-bold rounded-lg shadow-soft-md hover:scale-102 transition-all">
          <i class="fa fa-user-plus mr-2"></i> Registrar
        </button>

        <input type="hidden" name="expositor_id" value="{{ $exp }}">
         <input type="hidden" name="idvisi" id="idvisi" >
         <input type="hidden" name="eventid" id="eventid" value="{{request()->get('evento_id')}}" >
         
        
    </div>
  </div>
 
        
  </form>
</div>



<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

<script>
let html5QrCode; // Variable global para controlar el escáner
let isScanning = false; // Estado del escaneo

function onScanSuccess(decodedText, decodedResult) {
    try {
        const data = JSON.parse(decodedText);

        document.getElementById('nombre').value = data.nombre || '';
        document.getElementById('documento').value = data.documento || '';
        document.getElementById('telefono').value = data.telefono || '';
        document.getElementById('correo').value = data.correo || '';
        document.getElementById('direccion').value = data.direccion || '';
        document.getElementById('razon').value = data.razon || '';
        document.getElementById('idvisi').value = data.idvis || '';
        


        document.getElementById('reader').style.display = 'none';
        document.getElementById('qr-data').classList.remove('hidden');

        if (html5QrCode && isScanning) {
            html5QrCode.stop()
                .then(() => {
                    console.log("Escáner detenido correctamente");
                    isScanning = false;
                })
                .catch((err) => {
                    console.error("Error al detener el escáner:", err);
                });
        }

    } catch (e) {
        alert("QR inválido o malformado");
        console.error("Error al parsear JSON:", e);
    }
}

document.getElementById('btn-escanear').addEventListener('click', function () {
    const readerElement = document.getElementById('reader');

    if (isScanning) {
        // Si ya está escaneando, detener
        html5QrCode.stop()
            .then(() => {
                console.log("Escáner detenido por el usuario");
                readerElement.style.display = 'none';
                isScanning = false;
            })
            .catch((err) => {
                console.error("Error al detener el escáner:", err);
            });
    } else {
        // Iniciar escaneo
        readerElement.style.display = 'block';
        html5QrCode = new Html5Qrcode("reader");
        const config = {
            fps: 15,
            qrbox: 220
        };
        html5QrCode.start(
            { facingMode: "environment" },
            config,
            onScanSuccess
        ).then(() => {
            isScanning = true;
            console.log("Escáner iniciado");
        }).catch((err) => {
            console.error("Error al iniciar el escáner:", err);
            alert("Error al iniciar la cámara. Verifica los permisos.");
        });
    }
});
</script>
