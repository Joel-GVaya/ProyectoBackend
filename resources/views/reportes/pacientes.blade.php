<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pacientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;  
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;  
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 5px;
            text-align: left;
            word-wrap: break-word;  
            white-space: normal;    
        }

        th {
            background-color: #f2f2f2;
        }

        .title {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        th:nth-child(1), td:nth-child(1) { width: 15%; }  
        th:nth-child(2), td:nth-child(2) { width: 10%; }
        th:nth-child(3), td:nth-child(3) { width: 12%; }
        th:nth-child(4), td:nth-child(4) { width: 12%; }
        th:nth-child(5), td:nth-child(5) { width: 15%; }
        th:nth-child(6), td:nth-child(6) { width: 25%; }  
        th:nth-child(7), td:nth-child(7) { width: 10%; }
        th:nth-child(8), td:nth-child(8) { width: 10%; }
        th:nth-child(9), td:nth-child(9) { width: 10%; }
    </style>
</head>
<body>

    <div class="title">
        <h1>Lista de Pacientes</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Fecha de Nacimiento</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Código Postal</th>
                <th>Zona</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->nombre }}</td>
                    <td>{{ $paciente->DNI }}</td>
                    <td>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d/m/Y') }}</td>
                    <td>{{ $paciente->telefono }}</td>
                    <td>{{ $paciente->correo }}</td>
                    <td>{{ $paciente->direccion }}</td>
                    <td>{{ $paciente->ciudad }}</td>
                    <td>{{ $paciente->cp }}</td>
                    <td>{{ $paciente->zona->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
