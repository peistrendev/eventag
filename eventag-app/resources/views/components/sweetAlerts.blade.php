{{$slot}}

@if(session('success'))
<script>
    
//NOTIFICACION DE REGISTRO EXITOSO
document.addEventListener('DOMContentLoaded', function() {
    // Verifica si SweetAlert2 está disponible
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            toast: true,  // Modo toast (notificación en esquina, no modal)
            position: 'top-end',  // Posición: esquina superior derecha (ajusta si prefieres otra, ej. 'top-start')
            showConfirmButton: false,  // Sin botón de confirmar
            timer: 3000,  // Desaparece automáticamente después de 3 segundos
            timerProgressBar: true,  // Barra de progreso para mostrar el tiempo restante
            icon: 'success',  // Icono de éxito (verde por defecto)
            title: '{{ session('success') }}',  // Mensaje de la sesión
            background: '#10b981',  // Fondo verde similar a Tailwind bg-green-500 (opcional)
            color: '#fff',  // Texto blanco para contraste
            iconColor: '#ffffff'  // Icono blanco para mejor visibilidad
        });
        console.log('SweetAlert toast de éxito mostrado.');  // Debug opcional
    } else {
        // Fallback: Si SweetAlert no está disponible, muestra una alerta nativa simple
        console.warn('SweetAlert2 no disponible, usando alerta nativa.');
        alert('{{ session('success') }}');
    }
});

</script>
@elseif(session('error'))
<script>

//NOTIFICACION DE ERROR DE REGISTRO 
document.addEventListener('DOMContentLoaded', function() {
    // Verifica si SweetAlert2 está disponible
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            toast: true,  // Modo toast (notificación en esquina, no modal)
            position: 'top-end',  // Posición: esquina superior derecha (ajusta si prefieres otra, ej. 'top-start')
            showConfirmButton: false,  // Sin botón de confirmar
            timer: 3000,  // Desaparece automáticamente después de 3 segundos
            timerProgressBar: true,  // Barra de progreso para mostrar el tiempo restante
            icon: 'error',  // Icono de éxito (verde por defecto)
            title: '{{ session('error') }}',  // Mensaje de la sesión
            background: 'red',  // Fondo verde similar a Tailwind bg-green-500 (opcional)
            color: '#fff',  // Texto blanco para contraste
            iconColor: '#ffffff'  // Icono blanco para mejor visibilidad
        });
        console.log('SweetAlert toast de éxito mostrado.');  // Debug opcional
    } else {
        // Fallback: Si SweetAlert no está disponible, muestra una alerta nativa simple
        console.warn('SweetAlert2 no disponible, usando alerta nativa.');
        alert('{{ session('error') }}');
    }
});


</script>
@endif


<script>


//MODAL PARA ELIMINAR REGISTRO

document.addEventListener('DOMContentLoaded', function() {
    // Verifica si SweetAlert2 está disponible
    if (typeof Swal !== 'undefined') {
        // Usar SweetAlert2 si está cargado
        const deleteButtons = document.querySelectorAll('button[data-delete]');
        
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Detiene el envío
                
                const form = this.closest('form');
                
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¡No podrás revertir esta acción!',
                    icon: 'warning',
                    showCancelButton: true,
                    allowOutsideClick: true, // Evita cerrar clicando fuera
                    allowEscapeKey: false,    // Evita cerrar con ESC
                    focusConfirm: true,       // Enfoca el botón de confirmar
                    backdrop: 'rgba(0,0,0,0.4)', // Fondo semi-transparente (ajusta si es muy oscuro)
                    
                    // Colores base (hex para compatibilidad)
                    confirmButtonColor: '#ef4444', // Rojo Tailwind
                    cancelButtonColor: '#6b7280',  // Gris Tailwind
                    
                    // Clases personalizadas con Tailwind para forzar estilos visibles
                    customClass: {
                        popup: 'animate-pulse', // Opcional: animación para visibilidad
                        confirmButton: 'bg-red-500  text-red-600 font-bold py-2 px-4 rounded shadow-md !opacity-100', // Rojo visible con Tailwind, fuerza opacidad
                        cancelButton: 'bg-gray-500 hover:bg-gray-600 text-dark font-bold py-2 px-4 rounded shadow-md !opacity-100' // Gris visible, fuerza opacidad
                    },
                    
                    buttonsStyling: false, // Cambiado a false para que customClass tenga prioridad total sobre estilos de SweetAlert
                    
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Envía si confirma
                    }
                });
            });
        });
        console.log('SweetAlert2 cargado con clases Tailwind. Eventos asignados.'); // Debug
    } else {
        // Fallback: Usar confirm nativo
        console.warn('SweetAlert2 no disponible, usando confirm nativo.');
        const deleteButtons = document.querySelectorAll('button[data-delete]');
        
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                
                const form = this.closest('form');
                const message = '¿Seguro que deseas eliminar este visitante?';
                
                if (confirm(message)) {
                    form.submit();
                }
            });
        });
    }
});



</script>

{{$slot}}