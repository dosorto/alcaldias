@extends('layouts.app')
@section('content')


<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
    <h2 class="text-3xl font-extrabold dark:text-white">Agregar nueva propiedad</h2>
    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">


    @livewire('contribuyente.create-contribuyente-form')
</div>

@endsection