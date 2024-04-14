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
      margin: 0 auto;
      padding: 20px;
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
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
    }
    .total {
      font-size: 18px;
      font-weight: bold;
      margin-top: 20px;
      text-align: right;
    }
  </style>
</head>
<body>

<div>
  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mt-4">Información de cierre de caja:</h4>
  <p>Monto Inicial: {{ $montoInicial }}</p>
  <p>Total de Operaciones: {{ $totalOperaciones }}</p>
  <p>Total en Caja: {{ $totalCaja }}</p>
  <p id="mensajeCierreCaja" class="text-sm text-gray-500 mt-2"></p>
</div>

<!-- Agregamos un input para que el usuario ingrese el monto en físico de la caja -->
<div class="container">
  <label for="montoFisico">Monto en Físico de la Caja:</label>
  <input type="number" id="montoFisico">
  <button onclick="realizarCierreCaja()">Realizar Cierre de Caja</button>
</div>

<script>
  function realizarCierreCaja() {
    // Obtenemos el valor ingresado por el usuario
    var montoFisico = parseFloat(document.getElementById('montoFisico').value);
    
    // Obtenemos el valor total en caja
    var totalCaja = parseFloat("{{ $totalCaja }}");
    
    // Restamos el monto en físico ingresado al total en caja
    var diferencia = totalCaja - montoFisico;

    // Actualizamos el mensaje de cierre de caja
    var mensajeCierreCaja = document.getElementById('mensajeCierreCaja');
    if (diferencia === 0) {
      mensajeCierreCaja.innerText = "El cierre cuadra.";
    } else {
      mensajeCierreCaja.innerText = "El cierre no cuadra. Diferencia: " + diferencia.toFixed(2);
    }
  }
</script>

</body>
</html>
