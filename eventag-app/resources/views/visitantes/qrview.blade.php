<x-sidebarAdmin/>
<x-sweetAlerts/>

<div class="flex justify-center items-center min-h-screen bg-gray-50 px-4 py-8">
    <div class="bg-white shadow-xl rounded-2xl p-6 sm:p-8 w-full sm:w-1/2 max-w-sm mx-auto flex flex-col items-center">
        <!-- Contenedor del QR centrado y responsivo -->
        <div class="w-full flex justify-center items-center mb-6 mt-6 max-w-xs sm:max-w-sm">
            <div class="w-full max-w-full flex justify-center">
                {!! $qrcode !!}
            </div>
        </div>
        
        <!-- Texto "SCAN ME" debajo del QR -->
        <p class="text-center font-bold text-slate-600 tracking-wide sm:text-lg">{{$visitor->name}}</p>
        <h2 class="text-center font-bold text-slate-600 tracking-wide mb-6 text-xg sm:text-base">SCAN ME</h2>
        
    </div>
</div>

<style>
    /* Asegurar que el QR sea responsivo y no exceda el contenedor */
    .qr-container img,
    .qr-container svg {
        max-width: 100% !important;
        height: auto !important;
        max-height: 100% !important;
    }
</style>

<script>
    // Opcional: Ajuste dinámico para móviles si es necesario
    if (window.innerWidth < 640) {
        document.querySelector('.qr-container')?.classList.add('max-w-[250px]');
    }
</script>