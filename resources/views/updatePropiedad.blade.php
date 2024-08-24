@extends('layouts.app')
@section('content')


<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
    <h2 class="text-3xl font-extrabold dark:text-white">Editar propiedad</h2>
    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">


    @livewire('contribuyente.create-contribuyente-form')
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="latitud">Latitud</label>
<input type="text" id="latitud" class="form-control">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="longitud">Longitud</label>
<input type="text" id="longitud" class="form-control">
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div id="mapa" style="width: 100%; height: 500px"></div>
</div>
</div>

<script>
function iniciarMapa(){
var latitud = 13.327790232962233;
var longitud = -87.13607582211304;

coordenas = {
lng: longitud,
lat: latitud

}

generarMapa(coordenas);
}

function generarMapa(coordenadas){
var mapa = new google.maps.Map(document.getElementById('mapa'),
{
zoom: 12,
center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
});
marcador = new google.maps.Marker({
map: mapa,
draggable: true,
position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
});

marcador.addListener('dragend',function(event){
document.getElementById("latitud").value = this.getPosition().lat();
document.getElementById("longitud").value = this.getPosition().lng();
});

}


</script>

<script src="https://maps.googleapis.com/maps/api/js?key &callback=iniciarMapa"></script>

@endsection