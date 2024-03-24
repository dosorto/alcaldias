<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Factura</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 400px;
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
  </style>
</head>
<body>

<div class="container">
  <div class="header">
    <h2>Factura</h2>
    <p>Fecha de emisión: 24 de marzo de 2024</p>
    <p>Fecha de pago: 30 de marzo de 2024</p>
    <p>Nombre de la empresa: Empresa XYZ</p>
  </div>
  <div class="details">
    <p><strong>Cliente:</strong> Juan Pérez</p>
    <p><strong>Dirección:</strong> Calle Principal, 123</p>
    <p><strong>Ciudad:</strong> Ciudad Principal</p>
  </div>
  <div class="item">
    <span>$10.00</span>
    Producto 1
  </div>
  <div class="item">
    <span>$15.00</span>
    Producto 2
  </div>
  <hr>
  <div class="total">
    Total: $25.00
  </div>
</div>

</body>
</html>
