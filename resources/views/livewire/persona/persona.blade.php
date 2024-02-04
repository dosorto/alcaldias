<div class="container-sm">
    @if(!$modalCrear and !$modalEditar)
    <h3>Lista de Personas</h3>
      <table class="table table-striped">
        <thead>
            <tr>
              <th class="px-4 py-2" scope="col">DNI</th>
              <th class="px-4 py-2" scope="col">Nombres</th>
              <th class="px-4 py-2" scope="col">Apellidos</th>
              <th class="px-4 py-2" scope="col">Fecha de Nacimiento</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
          @foreach($personas as $persona)
            <tr>
              <td class="border px-4 py-2">{{ $persona->dni }}</td>
              <td class="border px-4 py-2">{{ $persona->nombres }}</td>
              <td class="border px-4 py-2">{{ $persona->apellidos }}</td>
              <td class="border px-4 py-2">{{ $persona->fecha_nacimiento }}</td>
              <td>
      <button wire:click="irEditar({{ $persona->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar</button>
      <button wire:click="eliminar({{ $persona->id }})" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Eliminar</button>

              </td>
            </tr>
          @endforeach
          </tbody>
      </table>
      <button wire:click="crear()" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Agregar</button>

      @endif
      @if($modalCrear)
        @include('livewire.persona.crearPersona')
      @endif

      @if($modalEditar)
        @include('livewire.persona.editarPersona')
      @endif

</div>
