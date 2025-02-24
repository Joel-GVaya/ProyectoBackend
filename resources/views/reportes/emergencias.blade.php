<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Emergencias - {{ $zona->nombre }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Emergencias - {{ $zona->nombre }}</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha y Hora</th>
                <th>Paciente</th>
                <th>Descripción</th>
                <th>Duración</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emergencias as $emergencia)
                <tr>
                    <td>{{ $emergencia->id }}</td>
                    <td>{{ $emergencia->fecha_hora }}</td>
                    <td>{{ $emergencia->paciente->nombre }}</td>
                    <td>{{ $emergencia->descripcion }}</td>
                    <td>
                        @php
                            // Convertir segundos a minutos y segundos
                            $duracionSegundos = $emergencia->duracion;
                            $minutos = floor($duracionSegundos / 60);
                            $segundos = $duracionSegundos % 60;
                            echo "{$minutos}m {$segundos}s";
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
