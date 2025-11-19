<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ asset('img/ecilara25.png') }}" />
    <title>Expositores</title>
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

        /* Estilos para la sección de organizadores */
        .organizadores-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        
        .organizador-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        
        .organizador-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        /* ESTILOS MEJORADOS PARA CENTRAR LAS IMÁGENES */
        .organizador-logo-card {
            height: 120px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            padding: 15px;
            display: block;
            margin: 0 auto;
        }
        
        .organizador-btn {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            transition: all 0.3s ease;
        }
        
        .organizador-btn:hover {
            background-color: var(--dark-blue);
            color: white;
        }
        
        /* Asegurar que las cards mantengan una altura consistente */
        .organizador-card .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Contenedor para la imagen que asegura el centrado */
        .organizador-card .card-body > .mb-3 {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
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
                        <a class="nav-link active " href="">Expositores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('visitevent/register')}}">Registro Visitantes</a>
                    </li>
                   
                    
                </ul>
            
            </div>
        </div>
    </nav>

 

    <!-- Sección de Organizadores -->
    <section class="organizadores-section" id="organizadores">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h5 class="display-4 fw-bold text-sm text-blue mb-3">Organizadores</h5>
                    <p class="lead"></p>
                </div>
            </div>
            
            <!-- Aquí está la parte corregida para mostrar las cards en filas de 4 -->
            @php
                $counter = 0;
            @endphp
            
            @foreach($organizadorEvento as $o)
                @if($counter % 4 == 0)
                    <div class="row mb-4">
                @endif
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card organizador-card h-100">
                        <div class="card-body text-center d-flex flex-column">
                            <div class="mb-3">
                                <img src="{{asset($o->logo)}}" alt="{{$o->name}}" class="organizador-logo-card" width="200" height="200">
                            </div>
                            <h5 class="card-title mb-3">{{$o->name}}</h5>
                            <a href="{{url('info/expositor?id='.$o->id.'&evento_id='.$eventid)}}" class="btn organizador-btn mt-auto">Ver</a>
                        </div>
                    </div>
                </div>
                
                @php
                    $counter++;
                @endphp
                
                @if($counter % 4 == 0 || $loop->last)
                    </div>
                @endif
            @endforeach
        </div>
    </section>


    <!-- Sección de Patrocinantes -->
    <section class="organizadores-section" id="organizadores">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h5 class="display-4 fw-bold text-sm text-blue mb-3">Patrocinantes</h5>
                    <p class="lead"></p>
                </div>
            </div>
            
            <!-- Aquí está la parte corregida para mostrar las cards en filas de 4 -->
            @php
                $counter = 0;
            @endphp
            
            @foreach($patrocinanteEvento as $p)
                @if($counter % 4 == 0)
                    <div class="row mb-4">
                @endif
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card organizador-card h-100">
                        <div class="card-body text-center d-flex flex-column">
                            <div class="mb-3">
                                <img src="{{asset($p->logo)}}" alt="{{$p->name}}" class="organizador-logo-card" width="200" height="200">
                            </div>
                            <h5 class="card-title mb-3">{{$p->name}}</h5>
                            <a href="{{url('info/expositor?id='.$p->id.'&evento_id='.$eventid)}}" class="btn organizador-btn mt-auto">Ver</a>
                        </div>
                    </div>
                </div>
                
                @php
                    $counter++;
                @endphp
                
                @if($counter % 4 == 0 || $loop->last)
                    </div>
                @endif
            @endforeach
        </div>
    </section>


    <!-- Sección de Expositores -->
    <section class="organizadores-section" id="organizadores">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h5 class="display-4 fw-bold text-sm text-blue mb-3">Expositores</h5>
                    <p class="lead"></p>
                </div>
            </div>
            
            <!-- Aquí está la parte corregida para mostrar las cards en filas de 4 -->
            @php
                $counter = 0;
            @endphp
            
            @foreach($expositorEvento as $e)
                @if($counter % 4 == 0)
                    <div class="row mb-4">
                @endif
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card organizador-card h-100">
                        <div class="card-body text-center d-flex flex-column">
                            <div class="mb-3">
                                <img src="{{asset($e->logo)}}" alt="{{$e->name}}" class="organizador-logo-card" width="200" height="200">
                            </div>
                            <h5 class="card-title mb-3">{{$e->name}}</h5>
                            <a href="{{url('info/expositor?id='.$e->id.'&evento_id='.$eventid)}}" class="btn organizador-btn mt-auto">Ver</a>
                        </div>
                    </div>
                </div>
                
                @php
                    $counter++;
                @endphp
                
                @if($counter % 4 == 0 || $loop->last)
                    </div>
                @endif
            @endforeach
        </div>
    </section>

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