<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ asset('img/ecilara25.png') }}" />
    <title>Info | {{$exp->name}}</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/bb8b54b78c.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="{{ asset('css/soft-ui-dashboard-tailwind.css?v=1.0.5') }}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
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
      
      /* Estilo para el logo en el navbar */
      .navbar-logo {
        height: 60px;
        margin-right: 10px;
      }

      /* NUEVOS ESTILOS PARA EL CONTENEDOR DEL EXPOSITOR */
      .expositor-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 40px 0;
      }
      
      .logo-empresa {
        max-width: 100%;
        height: auto;
        max-height: 200px;
        object-fit: contain;
        margin: 0 auto;
        display: block;
        border-radius: 15px;
        padding: 20px;
      }
      
      .nombre-empresa {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-blue);
        text-align: center;
        margin: 30px 0;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
      }
      
      .contacto-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
        background: white;
      }
      
      .contacto-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
      }
      
      .contacto-icon {
        font-size: 2.5rem;
        color: var(--primary-blue);
        margin-bottom: 15px;
      }
      
      .contacto-titulo {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--dark-blue);
        margin-bottom: 10px;
      }
      
      .contacto-info {
        color: #6c757d;
        font-size: 1rem;
      }
      
      .contacto-link {
        color: var(--primary-blue);
        text-decoration: none;
        transition: color 0.3s ease;
      }
      
      .contacto-link:hover {
        color: var(--dark-blue);
        text-decoration: underline;
      }
      
      /* ESTILOS PARA EL CONTENEDOR DE DESCRIPCIÓN */
      .descripcion-container {
        margin-top: 40px;
      }
      
      .descripcion-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        background: white;
        transition: all 0.3s ease;
      }
      
      .descripcion-card:hover {
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
      }
      
      .descripcion-titulo {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 20px;
        text-align: center;
        padding-top: 20px;
      }
      
      .descripcion-texto {
        color: #555;
        font-size: 1.1rem;
        line-height: 1.6;
        text-align: justify;
      }
      
      /* MEDIA QUERIES PARA RESPONSIVE */
      @media (max-width: 768px) {
        .logo-empresa {
          max-height: 150px;
          padding: 15px;
        }
        
        .nombre-empresa {
          font-size: 1.5rem;
          margin: 20px 0;
        }
        
        .contacto-card {
          padding: 15px !important;
        }
        
        .contacto-icon {
          font-size: 1.8rem;
          margin-bottom: 10px;
        }
        
        .contacto-titulo {
          font-size: 1rem;
          margin-bottom: 8px;
        }
        
        .contacto-info {
          font-size: 0.9rem;
        }
        
        .descripcion-titulo {
          font-size: 1.5rem;
          margin-bottom: 15px;
        }
        
        .descripcion-texto {
          font-size: 1rem;
          line-height: 1.5;
        }
        
        /* Asegurar que las cards ocupen una sola fila */
        .contacto-cards-container .col-md-4 {
          flex: 0 0 33.333333%;
          max-width: 33.333333%;
        }
      }
      
      @media (max-width: 576px) {
        .logo-empresa {
          max-height: 120px;
          padding: 10px;
        }
        
        .nombre-empresa {
          font-size: 1.3rem;
          margin: 15px 0;
        }
        
        .contacto-card {
          padding: 10px !important;
        }
        
        .contacto-icon {
          font-size: 1.5rem;
          margin-bottom: 8px;
        }
        
        .contacto-titulo {
          font-size: 0.9rem;
          margin-bottom: 5px;
        }
        
        .contacto-info {
          font-size: 0.8rem;
        }
        
        .descripcion-container {
          margin-top: 30px;
        }
        
        .descripcion-titulo {
          font-size: 1.3rem;
          margin-bottom: 12px;
          padding-top: 15px;
        }
        
        .descripcion-texto {
          font-size: 0.95rem;
          line-height: 1.4;
          text-align: left;
        }
        
        /* Ajustar el espaciado entre cards en móviles muy pequeños */
        .contacto-cards-container .col-md-4 {
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    
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
                        <a class="nav-link active " href="{{url('expositores/evento?evento_id='.$eventid)}}">Expositores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('visitevent/register')}}">Registro Visitantes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENEDOR PRINCIPAL DEL EXPOSITOR -->
    <section class="expositor-container">
        <div class="container">
            <!-- Contenedor de la imagen centrada -->
            <div class="row justify-content-center mb-4">
                <div class="col-12 text-center">
                    <img src="{{ asset($exp->logo)}}" 
                         alt="Logo de {{ $exp->name }}" 
                         class="logo-empresa">
                </div>
            </div>
            
            <!-- Contenedor del nombre de la empresa -->
            <div class="row justify-content-center mb-5">
                <div class="col-12 text-center">
                    <h1 class="nombre-empresa">{{ $exp->name }}</h1>
                </div>
            </div>
            
            <!-- Contenedor de las 3 cards de contacto -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-4 contacto-cards-container">
                        <!-- Card Página Web -->
                        <div class="col-md-4">
                            <div class="card contacto-card text-center p-4">
                                <div class="card-body">
                                    <div class="contacto-icon">
                                        <i class="fas fa-globe"></i>
                                    </div>
                                    <h3 class="contacto-titulo">Página Web</h3>
                                    <p class="contacto-info">
                                        @if($exp->pagina_web)
                                            <a href="{{ $exp->pagina_web}}" class="contacto-link" target="_blank">
                                                Ir a la Web
                                            </a>
                                        @else
                                            <span class="text-muted">No disponible</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card Teléfono -->
                        <div class="col-md-4">
                            <div class="card contacto-card text-center p-4">
                                <div class="card-body">
                                    <div class="contacto-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <h3 class="contacto-titulo">Teléfono</h3>
                                    <p class="contacto-info">
                                        @if($exp->phone)
                                            <a href="tel:{{ $exp->phone }}" class="contacto-link">
                                                {{ $exp->phone }}
                                            </a>
                                        @else
                                            <span class="text-muted">No disponible</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card Correo -->
                        <div class="col-md-4">
                            <div class="card contacto-card text-center p-4">
                                <div class="card-body">
                                    <div class="contacto-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <h3 class="contacto-titulo">Correo Electrónico</h3>
                                    <p class="contacto-info">
                                        @if($exp->email)
                                            <a href="mailto:{{ $exp->email }}" class="contacto-link">
                                                 {{ $exp->email }}
                                            </a>
                                        @else
                                            <span class="text-muted">No disponible</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- CONTENEDOR DE DESCRIPCIÓN DEL EXPOSITOR -->
            <div class="row justify-content-center descripcion-container">
                <div class="col-lg-10">
                    <div class="card descripcion-card">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="descripcion-titulo">Sobre Nosotros</h2>
                            <div class="descripcion-texto">
                                @if($exp->description && trim($exp->description) != '')
                                    {!! nl2br(e($exp->description)) !!}
                                @else
                                    <p class="text-muted text-center">No hay descripción disponible para este expositor.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
 <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="mb-0">© 2025 ExpoCILARA. Todos los derechos reservados.</p>
                </div>
              
            </div>
        </div>
    </footer>

  </body>
</html>