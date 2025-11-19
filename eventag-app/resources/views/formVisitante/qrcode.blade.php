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

 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a class="nav-link " href="{{url('visitevent/register')}}">Registro Visitantes</a>
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
                <h1 class="mt-12 mb-2 text-white">¡Hola! {{$visitor->name}}</h1>
                <h2 class="text-white"></h2>
                <h2 class="text-white">Gracias por registarte en ExpoCILARA 2025</h2>
                <p class="text-white">Guarda este codigo QR para que los expositores puedan escanearte.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
            <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
              <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-2xl rounded-2xl bg-clip-border form-card"> <!-- Agregadas clases: shadow-2xl y form-card -->
                <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                  
                </div>

                <div class="flex-auto p-6 mb-6">
                    <center>
                  {!! $qrcode !!}

                  <h4 class="mt-4 text-slate-400">{{$visitor->name}}</h4>
                  <h2>SCAN ME</h2>
                  </center>
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
  </body>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>
</html>