@extends('layouts.app')
@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mapa con Polígonos</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <style>
            #map {
                height: 700px;
                width: 1110px;
            }
        </style>

    </head>

    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
        <h2 class="text-3xl text-center font-extrabold dark:text-white">Agregar Nueva Propiedad</h2>
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
        @livewire('contribuyente.create-contribuyente-form')
    </div>
    <center>
        <div id="map"></div>
    </center>
    
    <script>
        // Obtener las coordenadas del controlador
        // Inicializa el mapa
        var map = L.map('map').setView([14.072644954380328, -87.220458984375], 7);

        // Cargar el mapa
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Crea un polígono
        var polygon = L.polygon([
            [14.072644954380328, -87.220458984375]
        ]).addTo(map);

        var markers = [];
        var coordenadaClaveTomada = [];

        // Crear y agregar un marcador al mapa
        function addMarker(lat, lng, coordenadaclave) {
            console.log(coordenadaclave);
            if (!(coordenadaclave in coordenadaClaveTomada)) {
                var marker = L.marker([lat, lng]).addTo(map);
                marker.dragging.enable();
                var texto = "Punto " + parseInt(coordenadaclave + 1);
                marker.bindPopup(texto).openPopup();

                // Evento dragend para el marcador
                marker.on('dragend', function(e) {
                    var coordenadas = Livewire.first().get('data').Georeferenciacion;
                    var coordenasClaves = Object.keys(coordenadas);
                    // var cantidadCoordenadas = Object.keys(coordenadas).length;

                    // Acceder a las coordenadas
                    coordenadas[coordenasClaves[coordenadaclave]] = {
                        latitud: e.target.getLatLng().lat,
                        longitud: e.target.getLatLng().lng
                    };
                    // Modificar las coordenadas del polígono actualizándolas por las del arreglo de coordenadas
                    polygon.setLatLngs(Object.values(coordenadas).map(coordenada => [coordenada.latitud, coordenada
                        .longitud
                    ]));
                });
                // Agregar el marcador a la lista de marcadores
                markers.push(marker);
                coordenadaClaveTomada.push(coordenadaclave);
            }

        }

        function removeLastMarker(coordenadas) {
            var coordenasClaves = Object.keys(coordenadas);
            var cantidadCoordenadas = Object.keys(coordenadas).length;
            if (markers.length > 0 && markers.length > cantidadCoordenadas) {
                // Eliminar el último marcador del mapa y de la lista de marcadores
                var lastMarker = markers.pop();
                map.removeLayer(lastMarker);
                coordenadaClaveTomada.pop();

                // actualizar las coordenadas de los marke de markers
                for (let i = 0; i < markers.length; i++) {
                    markers[i].setLatLng([coordenadas[coordenasClaves[coordenadaClaveTomada[i]]].latitud, coordenadas[
                        coordenasClaves[coordenadaClaveTomada[i]]].longitud]);
                    var texto = "punto " + parseInt(i + 1);
                    markers[i].bindPopup(texto).openPopup();
                }
                console.log(coordenadaClaveTomada);
            }
        }

        
        window.addEventListener('eliminarcoordenada', function(e) {

            var coordenadas = Livewire.first().get('data').Georeferenciacion;
            var coordenasClaves = Object.keys(coordenadas);
            var cantidadCoordenadas = Object.keys(coordenadas).length;

            removeLastMarker(coordenadas);
            // eliminar coordenadas anteriores del poligono
            polygon.setLatLngs([]);
            // agregar las coordenadas al poligono
            polygon.setLatLngs(Object.values(coordenadas).map(coordenada => [coordenada.latitud, coordenada
                .longitud]));
            // actualizar la ubicacion del marcador por la ultima coordenada y actualizar el mapa
        });


        window.addEventListener('actualizarCoordenadas', function(e) {

            var coordenadas = Livewire.first().get('data').Georeferenciacion;
            var coordenasClaves = Object.keys(coordenadas);
            var cantidadCoordenadas = Object.keys(coordenadas).length;
            
            try {
                // posicionar el nuevo marker en el centro de la vista del mapa
                var centroMapa = map.getCenter();
                console.log(map.getZoom());
                addMarker(centroMapa.lat, centroMapa.lng, (cantidadCoordenadas - 1));
            } catch (error) {
                // si se encuentra algun fallo, posicionarlo en tegucigalpa
                addMarker(14.072644954380328, -87.220458984375, (cantidadCoordenadas - 1));
            }

            var ultimaCoordenada = coordenadas[coordenasClaves[cantidadCoordenadas - 1]];

            coordenadas[coordenasClaves[cantidadCoordenadas - 1]] = {
                // agregar las coordenadas al array
                latitud: markers[(cantidadCoordenadas - 1)].getLatLng().lat,
                longitud: markers[(cantidadCoordenadas - 1)].getLatLng().lng
            };

            // eliminar coordenadas anteriores del poligono
            polygon.setLatLngs([]);
            // agregar las coordenadas al poligono
            polygon.setLatLngs(Object.values(coordenadas).map(coordenada => [coordenada.latitud, coordenada
                .longitud]));

        });

        window.addEventListener('actualizar', function(e) {

            var coordenadas = Livewire.first().get('data').Georeferenciacion;
            var coordenasClaves = Object.keys(coordenadas);
            var cantidadCoordenadas = Object.keys(coordenadas).length;

            // actualizar la ubicacion de todos los marcadores de la lista markers
            for (let i = 0; i < markers.length; i++) {
                markers[i].setLatLng([coordenadas[coordenasClaves[coordenadaClaveTomada[i]]].latitud, coordenadas[
                    coordenasClaves[coordenadaClaveTomada[i]]].longitud]);
            }
            // marker.setLatLng([coordenadas[coordenasClaves[cantidadCoordenadas - 1]].latitud, coordenadas[coordenasClaves[cantidadCoordenadas - 1]].longitud]);

            // eliminar coordenadas anteriores del poligono
            polygon.setLatLngs([]);
            // agregar las coordenadas al poligono
            polygon.setLatLngs(Object.values(coordenadas).map(coordenada => [coordenada.latitud, coordenada
                .longitud]));

        });

        function iniciar() {
            var coordenadas = Livewire.first().get('data').Georeferenciacion;
            var coordenasClaves = Object.keys(coordenadas);
            var cantidadCoordenadas = Object.keys(coordenadas).length;

            addMarker(14.072644954380328, -87.220458984375, 0);

            // actualizar la coordenada en base al marcador en posicion 0
            coordenadas[coordenasClaves[0]] = {
                latitud: markers[0].getLatLng().lat,
                longitud: markers[0].getLatLng().lng
            };
        };

        //map.fitBounds(polygon.getBounds());

        window.onload = iniciar;

    </script>

    <br>
    <br>
    <br>
@endsection
