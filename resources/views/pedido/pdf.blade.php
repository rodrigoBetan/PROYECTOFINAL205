<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pedido #{{ $pedido->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo img {
            width: 120px;
        }
        h2 {
            text-align: center;
            background-color: #2d3436;
            color: white;
            padding: 8px;
            border-radius: 5px;
        }
        .info {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 15px;
        }
        table thead {
            background-color: #2d3436;
            color: white;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        .totales {
            border: 1px solid #ccc;
            background-color: #f1f2f6;
            border-radius: 5px;
            padding: 8px;
            margin-top: 10px;
        }
        .totales table {
            border: none;
            width: 100%;
        }
        .totales th, .totales td {
            border: none;
            padding: 5px;
            text-align: center;
        }
        .totales thead {
            background-color: transparent;
            color: black;
        }
    </style>
</head>
<body>

    <!-- Logo -->
    <div class="logo">
    <img src="{{ public_path('imagenes/logo.png') }}" alt="Logo" style="width: 240px; height: auto;">
</div>


    <!-- Encabezado -->
    <h2>Pedido #{{ $pedido->id }}</h2>

    <!-- Datos del cliente -->
    <div class="info">
        <p><strong>Cliente:</strong> {{ $pedido->cliente->nombre ?? 'Sin nombre' }}</p>
        <p><strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y') }}</p>

    </div>

    <!-- Tabla de productos -->
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Precio Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre ?? 'Sin nombre' }}</td>
                    <td>{{ $detalle->Cantidad }}</td>
                    <td>${{ number_format($detalle->producto->precio, 2) }}</td>
                    <td>${{ number_format($detalle->Precio_Total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Totales en horizontal -->
    <div class="totales">
        <table>
            <thead>
                <tr>
                    <th>Subtotal</th>
                    <th>Impuesto</th>
                    <th>Total</th>
                    <th>Entrega</th>
                    <!--<th>Mesa</th>-- agregar mesa-->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>${{ number_format($pedido->Subtotal, 2) }}</td>
                    <td>${{ number_format($pedido->Impuesto, 2) }}</td>
                    <td>${{ number_format($pedido->Total, 2) }}</td>
                    <td>{{ $pedido->Entrega }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
