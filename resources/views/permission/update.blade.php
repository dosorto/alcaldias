@extends('layouts.app')
@Section('content')
    <div class="mt-3">
        <div class="container-sm" style="width: 50%">

            <h3>Actualizar permiso</h3>
            <hr>

                    <form action="{{ route('permissionUpdate', $permission->id) }}" method="post" class="form-update">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="name" class="form-label">Nombre del permiso</label>
                          <input type="text" name="name" value="{{ $permission->name }}" class="form-control @error('name') field-error @enderror" id="name">
                          @error('name')
                          <p class="msg-error">{{ $message }}</p>    
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label">Descripción del permiso</label>
                          <textarea class="form-control  @error('description') field-error @enderror" name="description" id="roleDescription" rows="3" >{{ $permission->description }}</textarea>
                          @error('description')
                          <p class="msg-error">{{ $message }}</p>    
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.form-update').submit(function(e){
            e.preventDefault();

            this.submit();
                Swal.fire({
                    title: "¡Permiso Actualizado!",
                    text: "El permiso se actualizo con éxito.",
                    icon: "success"
                  });
        });
    </script>
@endsection

