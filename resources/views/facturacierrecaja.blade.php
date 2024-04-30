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
<div id="estilo" class="flex flex-wrap">
    <div class="w-full md:w-1/3 p-3">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-gray-900">
            <h2 class="text-xl font-bold mb-3 dark:text-white"" style="text-align: center;">Información de cierre de caja</h2>
            <br>
            <img style="width: 150px; margin-left: 85px;" src="https://cdn-icons-png.flaticon.com/512/245/245431.png">
            <br>
            <hr class="border-t border-gray-300 mb-4">
            <p class="text-xl font-bold mb-3 dark:text-white"><b>Usuario:</b> {{ $usuario->name ?? 'Usuario no disponible' }}</p>
            <hr class="border-t border-gray-300 mb-4">
            <p class="text-xl font-bold mb-3 dark:text-white"><b>Hora y fecha de apertura:</b></p>
            <p class="text-xl font-bold mb-3 dark:text-white">{{ $fechainiciocaja ?? 'Fecha no disponible' }}</p>
            <hr class="border-t border-gray-300 mb-4">
            <p class="text-xl font-bold mb-3 dark:text-white"><b>Monto de apertura:</b> {{ $montoInicial ?? 'Monto no disponible' }}</p>
            <hr class="border-t border-gray-300 mb-4">
            <p class="text-xl font-bold mb-3 dark:text-white"><b>Total de operaciones realizadas:</b> {{ $totalOperaciones ?? 'Operaciones no disponibles' }}</p>
            <hr class="border-t border-gray-300 mb-4">
            <p class="text-xl font-bold mb-3 dark:text-white"><b>Monto Total de cierre:</b> {{ $totalCaja ?? 'Total no disponible' }}</p>
            <hr class="border-t border-gray-300 mb-4">
            <p class="text-xl font-bold mb-3 dark:text-white"><b>Monto de cierre ingresado por el usuario:</b> {{ $montoCierreUser }}</p>
            <p id="mensajeCierreCaja" class="text-sm text-gray-500 mt-2"></p>
        </div>
    </div>
    <div class="w-full md:w-2/3 p-3 dark:bg-gray-900">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-gray-900">
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert" id="alertaCierre" style="display: none;">
            </div>

            
        </div>
    </div>
</div>



</body>
</html>