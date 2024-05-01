<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Estilos CSS personalizados */
    .caja {
      background-color: #f9f9f9;
      border-radius: 10px;
      padding: 20px;
      margin: 20px auto;
      max-width: 600px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .titulo {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }
    .imagen {
      display: block;
      margin: 0 auto;
      width: 150px;
    }
    .mensaje-error {
      color: red;
      font-weight: bold;
    }
    .mensaje-exito {
      color: green;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="caja">
    <h2 class="titulo">Reporte de Cierre de Caja</h2>
    <img class="imagen" src="https://cdn-icons-png.flaticon.com/512/245/245431.png">
    <hr>
    <p><strong>Usuario:</strong> {{ $usuario->name ?? 'Usuario no disponible' }}</p>
    <hr>
    <p><strong>Hora y fecha de apertura:</strong> {{ $fechainiciocaja ?? 'Fecha no disponible' }}</p>
    <hr>
    <p><strong>Hora y fecha de cierre:</strong> {{ $fechacierrecaja ?? 'Fecha no disponible' }}</p>
    <hr>
    <p><strong>Monto de apertura:</strong> {{ $montoInicial ?? 'Monto no disponible' }}</p>
    <hr>
    <p><strong>Suma de operaciones realizadas:</strong> {{ $totalOperaciones ?? 'Operaciones no disponibles' }}</p>
    <hr>
    <p><strong>Monto Total de cierre:</strong> {{ $totalCaja ?? 'Total no disponible' }}</p>
    <hr>
    <p><strong>Monto de cierre ingresado por el usuario:</strong> {{ $montoCierreUser }}</p>
    <hr>
    <p id="mensajeCierreCaja" class="mensaje-exito"></p>
  </div>

  <script>
    // Lógica para comparar los montos de cierre
    var totalCaja = parseFloat("{{ $totalCaja }}");
    var montoCierreUser = parseFloat("{{ $montoCierreUser }}");
    var diferencia = montoCierreUser - totalCaja;

    if (diferencia === 0) {
      document.getElementById("mensajeCierreCaja").innerText = "El cierre de caja cuadra correctamente.";
    } else {
      document.getElementById("mensajeCierreCaja").innerText = "El cierre de caja no cuadra. Diferencia: " + diferencia.toFixed(2);
      document.getElementById("mensajeCierreCaja").classList.add("mensaje-error");
    }
  </script>
</body>
</html>
