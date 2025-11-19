<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ asset('img/ecilara25.png') }}" />
    <title>Registro de visitantes</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="{{ asset('css/soft-ui-dashboard-tailwind.css?v=1.0.5') }}" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
      /* Forzar borde azul en focus para inputs, textarea y select */
      input:focus, textarea:focus, select:focus {
        border-color: #2A4B89 !important; /* azul principal */
        outline: none !important;
        box-shadow: 0 0 0 3px rgba(42, 75, 137, 0.3) !important; /* sombra azul suave */
      }

      /* Sombras oscuras personalizadas para el card del formulario */
      .form-card {
        box-shadow: 
          0 20px 25px -5px rgba(0, 0, 0, 0.3),  /* Sombra externa grande y oscura */
          0 10px 10px -5px rgba(0, 0, 0, 0.2),   /* Sombra media para profundidad */
          inset 0 2px 4px rgba(0, 0, 0, 0.1) !important; /* Sombra interna sutil para efecto hundido */
      }

      .form-card:hover {
        box-shadow: 
          0 25px 50px -12px rgba(0, 0, 0, 0.35), /* Aumenta la sombra en hover para interactividad */
          0 10px 10px -5px rgba(0, 0, 0, 0.25),
          inset 0 2px 4px rgba(0, 0, 0, 0.1) !important;

      }

          :root {
            --primary-blue: #2a4b89;
            --dark-blue: #1d3a6b;
            --light-blue: #d8e2f3;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .bg-primary-blue {
            background-color: var(--primary-blue);
        }
        
        .bg-light-blue {
            background-color: var(--light-blue);
        }
        
        .text-blue {
            color: var(--primary-blue);
        }
        
        .hero-section {
            background: linear-gradient(rgba(42, 75, 137, 0.7), rgba(42, 75, 137, 0.7)), 
                        url('https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-blue);
            margin-bottom: 1rem;
        }
        
        .btn-custom {
            background-color: white;
            color: var(--primary-blue);
            border: 2px solid white;
            font-weight: bold;
        }
        
        .btn-custom:hover {
            background-color: transparent;
            color: white;
        }
        
        .schedule-item {
            border-left: 3px solid var(--primary-blue);
            padding-left: 15px;
            margin-bottom: 20px;
        }
        
        .expositor-img {
            height: 80px;
            object-fit: contain;
            filter: grayscale(100%);
            transition: all 0.3s ease;
        }
        
        .expositor-img:hover {
            filter: grayscale(0%);
            transform: scale(1.05);
        }
        
        .about-img {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .about-img:hover {
            transform: translateY(-5px);
        }
        
        /* Estilos adicionales para centrar los logos */
        .organizadores-container {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
        }
        
        .organizador-logo {
            max-width: 400px;
            height: auto;
        }
        
        /* Estilo para el logo en el navbar */
        .navbar-logo {
            height: 60px; /* Ajusta este valor según el tamaño deseado */
            margin-right: 10px;
        }

      
    </style>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
     <!--SweetAlert-->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
  </head>
  

  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
<x-sweetAlerts/>


<!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary-blue sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <img src="{{asset('img/ecilarablanco.png')}}" alt="ExpoCILARA Logo" class="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('visitevent/register')}}">Registro Visitantes</a>
                    </li>
                   
                    
                </ul>
            
            </div>
        </div>
    </nav>


    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
      <section class="min-h-screen mb-32">
        <div class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl" style="background-image: ; ">
          <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80"></span>
          <div class="container z-10">
            <div class="flex flex-wrap justify-center -mx-3">
              <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                <h1 class="mt-12 mb-2 text-white">Bienvenido a ExpoCILARA 2025</h1>
                <p class="text-white">Registrate para que puedas acceder a la mejor experiencia empresarial.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
            <!-- AQUÍ SE AJUSTÓ EL ANCHO DEL CARD: Cambié md:w-7/12 a md:w-9/12, lg:w-5/12 a lg:w-7/12, y xl:w-4/12 a xl:w-6/12 para hacerlo más ancho en todas las pantallas responsivas -->
            <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-9/12 lg:w-7/12 xl:w-6/12">
              <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-2xl rounded-2xl bg-clip-border form-card"> <!-- Agregadas clases: shadow-2xl y form-card -->
                <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                  <h5>REGISTRATE</h5>
                </div>

                <div class="flex-auto p-6">
                  <form method="POST" action="{{ url('visitevent/store') }}" role="form text-left">
                    @csrf
                    <div class="mb-4">
                        <label for="">Documento de Identidad</label>
                      <input type="text" name="documento" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="10233521" aria-label="documento" required  pattern="[0-9]*"  />
                    </div>
                    <div class="mb-4">
                        <label for="">Nombre y Apellido</label>
                      <input type="text" name="nombre" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Jon Doe" aria-label="name" required />
                    </div>

                    <div class="mb-4">
                        <label for="">Telefono </label>
                      <input 
                          type="tel"  name="telefono" id="telefono" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="04245678899" aria-label="telefono" aria-describedby="telefono" required minlength="11" maxlength="13" pattern="^(\+[\d]{10,12})|([\d]{11,13})$" title="El número de teléfono debe tener entre 11 y 13 caracteres: números (0-9) y opcionalmente el símbolo + al inicio."/>

                    </div>

                    <div class="mb-4">
                        <label for="">Correo Electronico</label>
                      <input type="email" name="email" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="jondoe@gmail.com" aria-label="Correo" aria-describedby="email" required/>
                    </div>

                    <div class="mb-4">
                        <label for="direccion">Ciudad</label>
                        <select name="direct" id="direccion" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="direccion" aria-describedby="direccion" required>
                            <option value="" disabled selected>Seleccione una dirección</option>
                            <option value="Barquisimeto">Barquisimeto</option>
                            <option value="Cabudare">Cabudare</option>
                            <option value="Carora">Carora</option>
                            <option value="Acarigua-Araure">Acarigua-Araure</option>
                            <option value="Valencia">Valencia</option>
                            <option value="Maracay">Maracay</option>
                            <option value="Caracas">Caracas</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <!-- Input adicional para ciudad personalizada, inicialmente invisible -->
                    <div class="mb-4" id="customCityDiv" style="display: none;">
                        <input type="text" name="direccion" id="customCiudad" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Especifique su ciudad" aria-label="Ciudad personalizada" />
                    </div>

                    <!-- Select para el tipo de visita -->
                     <div class="mb-4">
                        <label for="direccion">Su visita es:</label>
                        <select name="tipo" id="tipo" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="direccion" aria-describedby="direccion" required>
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="Particular">Particular</option>
                            <option value="Empresarial">Empresarial</option>
                            
                        </select>
                    </div>

                    <!-- Input adicional para indicar el nombre de la empresa en tipo empresarial -->
                    <div class="mb-4" id="empresa" style="display: none;">
                        <input type="text" name="nameEmpresa" id="nameEmpresa" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Indique el nombre de la empresa" aria-label="Ciudad personalizada" />
                    </div>

                    <div class="mb-4">
                      <input type="hidden" name="evento_id" value="1" />
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Registrar</button>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="mb-0">© 2025 ExpoCILARA. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                                   
                    <a href="https://www.instagram.com/expocilara/?hl=es" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script para mostrar/ocultar y sincronizar el input de ciudad -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectCiudad = document.getElementById('direccion');
            const customCityDiv = document.getElementById('customCityDiv');
            const customCityInput = document.getElementById('customCiudad');

            // Función para manejar el cambio en el select
            function handleSelectChange() {
                if (selectCiudad.value === 'otro') {
                    customCityInput.value = ''; // Limpiar el valor
                    customCityInput.readOnly = false; // Permitir edición
                    customCityInput.required = true; // Hacerlo requerido
                    customCityDiv.style.display = 'block'; // Mostrar el input
                } else if (selectCiudad.value !== '') {
                    customCityInput.value = selectCiudad.value; // Asignar el valor seleccionado al input
                    customCityInput.readOnly = true; // Hacerlo de solo lectura
                    customCityInput.required = false; // No requerido ya que tiene valor
                    customCityDiv.style.display = 'none'; // Mantener invisible
                } else {
                    // Si no se ha seleccionado nada, ocultar y limpiar
                    customCityInput.value = '';
                    customCityInput.readOnly = false;
                    customCityInput.required = false;
                    customCityDiv.style.display = 'none';
                }
            }

            // Escuchar cambios en el select
            selectCiudad.addEventListener('change', handleSelectChange);

            // Llamar inicialmente para manejar el estado por defecto (inicialmente oculto)
            handleSelectChange();
        });

//PARA SELECT DEL TIPO DE VISITA
document.addEventListener('DOMContentLoaded', function() {
            const selectTipo = document.getElementById('tipo');
            const empresa = document.getElementById('empresa');
            const nameEmpresaInput = document.getElementById('nameEmpresa');

            // Función para manejar el cambio en el select
            function handleSelectChange() {
                if (selectTipo.value === 'Empresarial') {
                    nameEmpresaInput.value = ''; // Limpiar el valor
                    nameEmpresaInput.readOnly = false; // Permitir edición
                    nameEmpresaInput.required = true; // Hacerlo requerido
                    empresa.style.display = 'block'; // Mostrar el input
                } else if (selectTipo.value !== '') {
                    nameEmpresaInput.value = selectTipo.value; // Asignar el valor seleccionado al input
                    nameEmpresaInput.readOnly = true; // Hacerlo de solo lectura
                    nameEmpresaInput.required = false; // No requerido ya que tiene valor
                    empresa.style.display = 'none'; // Mantener invisible
                } else {
                    // Si no se ha seleccionado nada, ocultar y limpiar
                    nameEmpresaInput.value = '';
                    nameEmpresaInput.readOnly = false;
                    nameEmpresaInput.required = false;
                    empresa.style.display = 'none';
                }
            }

            // Escuchar cambios en el select
            selectTipo.addEventListener('change', handleSelectChange);

            // Llamar inicialmente para manejar el estado por defecto (inicialmente oculto)
            handleSelectChange();
        });

    </script>

<script>
  //PARA VALIDACION DE CAMPO NUMERO TELEFONICO
document.getElementById('telefono').addEventListener('input', function(e) {
  // Permitir solo dígitos (0-9) y un solo '+' al inicio
  let value = e.target.value;
  
  // Si hay más de un '+', mantener solo el primero
  value = value.replace(/\+/g, '+').replace(/\++/g, '+');
  
  // Remover cualquier carácter que no sea dígito o '+'
  value = value.replace(/[^0-9+]/g, '');
  
  // Asegurar que el '+' solo esté al inicio (moverlo si está en otro lugar)
  if (value.indexOf('+') > 0) {
    value = '+' + value.replace(/\+/g, '').replace(/[^0-9]/g, '');
  }
  
  // Limitar longitud
  if (value.length > 13) {
    value = value.substring(0, 13);
  }
  
  e.target.value = value;
});
</script>

  </body>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>
</html>