@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa con Polígonos</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

    <style>
        #map { 
            height: 600px;
            width: 800px; 
        }
    </style>

</head>
<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
    <h2 class="text-3xl font-extrabold dark:text-white">Informacion de propiedad</h2>
    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
    @livewire('VerPropiedad', ['record'=> $propiedad])
    <h2 class="text-3xl font-extrabold dark:text-white">Mapa de la propiedad</h2>
</div>
<body>
    <br>
    <center>
        <div id="map"></div>
    </center>

    <script>
        // Obtener las coordenadas del controlador
        var coordenadas = <?php echo json_encode($coordenadas); ?>;

        // Inicializa el mapa
        var map = L.map('map').setView(coordenadas[0], 19);

        // Cargar el mapa
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 30     ,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // crear marca
        var marker = L.marker(coordenadas[0]).addTo(map);

        // Crea un polígono
        var polygon = L.polygon([coordenadas]).addTo(map);

    </script>

</body>

@endsection
