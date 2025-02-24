<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Llamadas Planificadas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Llamadas Planificadas para el {{ $fecha }}</h1>
    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Fecha y Hora</th>
                <th>Zona</th>
            </tr>
        </thead>
        <tbody>
            @foreach($llamadas as $llamada)
                <tr>
                    <td>{{ $llamada->paciente->nombre }} {{ $llamada->paciente->apellidos }}</td>
                    <td>{{ $llamada->fecha_hora }}</td>
                    <td>{{ $llamada->paciente->zona->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
