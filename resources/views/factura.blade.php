<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .details {
      margin-bottom: 20px;
    }
    .details p {
      margin: 5px 0;
    }
    .item {
      margin-bottom: 10px;
    }
    .item span {
      float: right;
    }
    .total {
      font-size: 18px;
      font-weight: bold;
      margin-top: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="header">
    <h1 style="text-align: center; color: #333;">Factura</h1>
    <p><strong>Choluteca: {{ now()->toDateString() }}</strong></p>
    <p><strong> Empresa XYZ</strong></p>
  </div>
  <div class="details">
    <p><strong>Cliente:</strong> {{ $contribuyente->primer_nombre }} {{ $contribuyente->segundo_nombre }} {{ $contribuyente->primer_apellido }} {{ $contribuyente->segundo_apellido }}</p>
    <p><strong>N° de Identidad:</strong> {{ $contribuyente->identidad }}</p>
    <p><strong>Sexo:</strong> {{ $contribuyente->sexo === 0 ? 'Femenino' : 'Masculino' }}</p>
    <p><strong>N° de Teléfono:</strong> {{ $contribuyente->telefono }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $contribuyente->email }}</p>
  </div>
  <!-- Tabla de detalles de la factura -->
  <table>
    <thead>
      <tr>
        <th>Número de Recibo</th>
        <th>Fecha de Pago</th>
        <th>Servicio</th>
        <th>Importe Individual</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pagoservicio as $pago)
        @foreach ($pago->servicios as $index => $servicio)
          <tr>
            @if ($index === 0)
              <td rowspan="{{ count($pago->servicios) }}">{{ $pago->num_recibo }}</td>
              <td rowspan="{{ count($pago->servicios) }}">{{ $pago->fecha_pago }}</td>
            @endif
            <td>{{ $servicio->nombre_servicio }}</td>
            <td>{{ $servicio->importes }}</td>
          </tr>
        @endforeach
      @endforeach
    </tbody>
  </table>
  <!-- Total de la factura -->
  <div class="total">
    @php
      $total_factura = 0;
      foreach ($pagoservicio as $pago) {
          foreach ($pago->servicios as $servicio) {
              $total_factura += $servicio->importes;
          }
      }
    @endphp
    <p><strong>Total:</strong> {{ $total_factura }}</p>
  </div>
</div>

</body>
</html>
