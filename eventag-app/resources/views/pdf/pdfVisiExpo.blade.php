<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Mis Visitantes</title>
    <style>
        /* Estilos generales para un diseño limpio y profesional */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Encabezado del reporte */
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0 0 10px 0;
            font-size: 2.5em;
            font-weight: bold;
        }

        .header p {
            margin: 0;
            font-size: 1.1em;
            opacity: 0.9;
        }

        /* Contenedor de la tabla */
        .table-wrapper {
            overflow-x: auto; /* Para responsividad en pantallas pequeñas */
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            background-color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.9em;
            letter-spacing: 0.5px;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .text-center {
            text-align: center;
            font-style: italic;
            color: #6c757d;
        }

        /* Ajuste para la columna de clasificación */
        th:nth-child(5), td:nth-child(5) {
            width: 20%;
        }

        /* Pie del reporte */
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 0.9em;
        }

        /* Estilos para impresión (opcional, para reportes PDF o impresos) */
        @media print {
            body {
                padding: 0;
                background-color: #fff;
            }
            .container {
                box-shadow: none;
                border-radius: 0;
            }
            .header {
                background-color: #007bff !important;
                -webkit-print-color-adjust: exact;
            }
            th {
                background-color: #f8f9fa !important;
                -webkit-print-color-adjust: exact;
            }
        }

        /* Responsividad para móviles */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            .header h1 {
                font-size: 2em;
            }
            .table-wrapper {
                padding: 10px;
            }
            th, td {
                padding: 8px 10px;
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Encabezado del Reporte -->
        <div class="header">
            <h1>Reporte de mis visitantes</h1>
            <p>Generado el: {{ date('d/m/Y H:i:s') }}</p>
        </div>

        <!-- Tabla de Datos -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombre y Apellido</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Clasificacion</th> <!-- Nota: Corregí la mayúscula para consistencia, pero no es obligatoria -->
                    </tr>
                </thead>
                <tbody>
                    @forelse ($visitantes as $v)
                    <tr>
                        <td class="whitespace-nowrap">{{ $v->document ?? 'N/A' }}</td>
                        <td class="whitespace-nowrap">{{ $v->name ?? 'N/A' }}</td>
                        <td class="whitespace-nowrap">{{ $v->phone ?? 'N/A' }}</td>
                        <td class="whitespace-nowrap">{{ $v->email ?? 'N/A' }}</td>
                        <td class="whitespace-nowrap">{{ $v->clasification ?? 'Sin clasificar' }}</td> <!-- Acceso directo, con fallback si es null -->
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No se encontraron visitantes para este expositor.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pie del Reporte -->
        <div class="footer">
            <p>Reporte generado por Laravel con Tailwind CSS</p>
        </div>
    </div>
</body>
</html>
``` ⬤