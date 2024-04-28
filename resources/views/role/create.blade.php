@extends('layouts.app')

@section('content')
<div>
  
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif



<!-- Breadcrumb -->


<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
          </svg>
          Inicio
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <a href="/role-list" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Roles</a>
        </div>
      </li>
      
    </ol>
  </nav>
  

  <br>

  <div class="columns-2">
    
   
  </div>

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow-md bg-white p-4 min-w-96 max-w-md mx-auto rounded-md">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Crear Nuevo Rol</h2>
    <hr class="h-px my-2 bg-gray-200 border-0">

    <div class="mt-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <form action="{{ route('roleCreate') }}" method="post" class="form-create">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold">Nombre del rol</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-input mt-1 block w-full rounded-md border-gray-300 @error('name') border-red-500 @enderror" id="name">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>    
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-semibold">Descripción del rol</label>
                        <textarea class="form-textarea mt-1 block w-full rounded-md border-gray-300 @error('description') border-red-500 @enderror" name="description" id="roleDescription" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>    
                        @enderror
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar</button>
                </form>
            </div>

            <div>
                <div class="bg-gray-100 p-4 rounded">
                    <p class="mb-3 font-semibold">Selecciona los permisos a asignar al rol:</p>
                    <div class="max-h-60 overflow-auto">
                        @foreach($permissions as $permission)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" class="form-checkbox">
                            <label for="permission_{{ $permission->id }}" class="ml-2 text-gray-800">{{ $permission->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.form-create').submit(function(e){
        e.preventDefault();
        this.submit();
        Swal.fire({
            title: "¡Rol Creado!",
            text: "El rol se ha creado con éxito.",
            icon: "success"
        });
    });
</script>

@endsection

