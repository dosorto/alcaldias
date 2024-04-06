<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cierre de Caja</title>
<style>
    @media print {
        @page {
            size: 80mm 100mm;
            margin: 0;
        }
    }
    body {
        font-family: Arial, sans-serif;
        font-size: 10px;
        width: 80mm;
        padding: 5mm;
    }
    .titulo {
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 5px;
    }
    .detalle {
        width: 100%;
        margin-top: 5px;
    }
    .detalle th, .detalle td {
        padding: 2px;
        text-align: left;
    }
    .detalle th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
    <div class="titulo">Cierre de Caja</div>
    <div>Usuario: Juan Pérez</div>
    <div>Sección: Caja Principal</div>
    <div>Fecha y Hora: 2024-04-05 18:00</div>
    <table class="detalle">
        <tr>
            <th>Descripción</th>
            <th>Cantidad</th>
        </tr>
        <tr>
            <td>Cantidad al Aperturar:</td>
            <td>$1000.00</td>
        </tr>
        <tr>
            <td>Reporte del Cajero:</td>
            <td>$1500.00</td>
        </tr>
        <tr>
            <td>Reporte del Sistema:</td>
            <td>$1480.00</td>
        </tr>
    </table>
</body>
</html>
