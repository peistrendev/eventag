<x-sidebarAdmin />
<x-sweetAlerts></x-sweetAlerts>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

<div class="container mx-auto px-4 py-8">
    <h3 class="text-3xl font-bold text-center text-gray-800 mb-8">Rifa del Evento {{$event->first()->name}}</h3>
    <h5 class="text-3xl font-bold text-center text-gray-600 mb-8">
        Organizado por
        
        
            {{$nameExpo}}
        
    </h5>
    <!-- Botón para generar número aleatorio -->
    <div class="flex justify-center mb-8">
        <button id="rifaButton" 
                class="mb-4 py-3 bg-gradient-to-tl from-green-600 to-lime-400  font-bold  px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 text-white">
            ¡Generar Ganador!
        </button>
    </div>

    <!-- Sección para mostrar el resultado (oculta inicialmente, debajo del botón) -->
    <div id="resultado" 
        class="hidden p-4 mx-auto max-w-md text-center bg-white p-8 rounded-lg shadow-xl transition-all duration-500 ease-in-out opacity-0 translate-y-4">
        <h2 class="text-2xl font-bold text-green-600 mb-4">¡Ganador Seleccionado!</h2>
        <h4 id="numeroGanador" class="text-4xl font-bold text-blue-600 mb-4 animate-bounce"></h4>
        <p class="text-gray-600 ">¡Felicidades! al ganador(a).</p>
    </div>

    <!-- Botón Reiniciar (oculto inicialmente) -->
    <div id="reiniciarContainer" class="hidden flex justify-center mb-8">
        <button id="reiniciar" 
                class="mt-4 py-3 bg-gradient-to-tl from-green-600 to-lime-400  font-bold  px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 text-white">
            Reiniciar
        </button>
    </div>
</div>

<!-- JavaScript para la lógica de la rifa -->
<script>
    // Pasar los visitantes de Laravel a JavaScript (como array JSON con id y nombre)
    const visitantes = @json($visitantes);

    // Función para seleccionar visitante aleatorio
    function seleccionarAleatorio() {
        if (visitantes.length > 0) {
            const indiceAleatorio = Math.floor(Math.random() * visitantes.length);
            const visitanteGanador = visitantes[indiceAleatorio];
            return visitanteGanador;
        }
        return null;
    }

    // Variable para rastrear si ya se generó un ganador (para permitir múltiples o no)
    let ganadorGenerado = false;

    // Evento del botón: Generar ganador y mostrar confetis
    document.getElementById('rifaButton').addEventListener('click', function() {
        const ganador = seleccionarAleatorio();
        if (ganador) {
            // Mostrar el nombre del ganador en la sección (animación: fade-in y slide-up)
            document.getElementById('numeroGanador').textContent = ganador.name;
            const resultadoDiv = document.getElementById('resultado');
            resultadoDiv.classList.remove('hidden', 'opacity-0', 'translate-y-4');
            resultadoDiv.classList.add('opacity-100', 'translate-y-0');

            // Mostrar el botón de reiniciar con animación (fade-in y slide-up similar al resultado)
            const reiniciarContainer = document.getElementById('reiniciarContainer');
            reiniciarContainer.classList.remove('hidden', 'opacity-0', 'translate-y-4');
            reiniciarContainer.classList.add('opacity-100', 'translate-y-0');

            // Disparar confetis (configuración festiva: múltiples explosiones con colores)
            confetti({
                particleCount: 100,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#feca57']
            });
            // Confeti adicional desde abajo para más efecto
            setTimeout(() => {
                confetti({
                    particleCount: 100,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    colors: ['#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#feca57']
                });
                confetti({
                    particleCount: 100,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    colors: ['#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#feca57']
                });
            }, 250);

            // Deshabilitar botón y cambiar texto (para una sola rifa; ajusta si quieres múltiples)
            this.disabled = true;
            this.innerHTML = '¡Ya se seleccionó un ganador!';
            this.classList.add('bg-green-500');
            this.classList.remove('hover:bg-blue-700', 'hover:scale-105'); // Quitar hover effects
            ganadorGenerado = true;
        } else {
            alert('No hay participantes para la rifa.');
        }
    });

    // Evento del botón Reiniciar: Ocultar resultado y botón reiniciar, resetear botón principal y permitir nueva selección
    document.getElementById('reiniciar').addEventListener('click', function() {
        // Ocultar el resultado con animación
        const resultadoDiv = document.getElementById('resultado');
        resultadoDiv.classList.add('hidden', 'opacity-0', 'translate-y-4');
        resultadoDiv.classList.remove('opacity-100', 'translate-y-0');

        // Ocultar el botón de reiniciar con animación
        const reiniciarContainer = document.getElementById('reiniciarContainer');
        reiniciarContainer.classList.add('hidden', 'opacity-0', 'translate-y-4');
        reiniciarContainer.classList.remove('opacity-100', 'translate-y-0');

        // Resetear el botón de rifa
        const rifaButton = document.getElementById('rifaButton');
        rifaButton.disabled = false;
        rifaButton.innerHTML = '¡Generar Ganador!';
        rifaButton.classList.remove('bg-green-500');
        rifaButton.classList.add('hover:scale-105'); // Restaurar hover effects (ajusta si es necesario)

        // Resetear la variable de control
        ganadorGenerado = false;
    });
</script>