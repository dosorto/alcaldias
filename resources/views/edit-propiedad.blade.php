@extends('layouts.app')
@section('content')
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
        <h2 class="text-3xl font-extrabold dark:text-white">Editar propiedad</h2>
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

        {{-- @php
            dd($propiedad);
        @endphp --}}
        @livewire('Contribuyente.EditarPropiedad', ['record' => $propiedad])
        <div>
            <div id="map" style="width: 100%; height: 400px;">
            </div>
        </div>
    </div>
    <script>
        function iniciarMapa() {
            var coord = {
                lat: 13.331673031284199,
                lng: -87.13575244940186
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: coord
            });

            var marker = new google.maps.Marker({
                position: coord,
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
                var coordenadas = Livewire.first().get('data').Georeferenciacion;
                var coordenasClaves = Object.keys(coordenadas);
                var cantidadCoordenadas = Object.keys(coordenadas).length;
                // acceder a las coordenadas
                coordenadas[coordenasClaves[cantidadCoordenadas - 1]] = {
                    latitud: event.latLng.lat(),
                    longitud: event.latLng.lng()
                };

            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>
@endsection