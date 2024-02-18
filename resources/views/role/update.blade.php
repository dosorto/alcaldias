@include('home')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/role.css') }}">
</head>
<body>
    <div class="mt-3">
        <div class="container-sm" style="width: 50%">
            <h3>Actualizar rol</h3>
            <hr>
            <div class="row">
                <div class="col-8">
                    <form action="{{ route('roleUpdate', $role->id) }}" method="post" class="form-update">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="name" class="form-label">Nombre del rol</label>
                          <input type="text" name="name" value="{{ $role->name }}" class="form-control @error('name') field-error @enderror" id="name">
                          @error('name')
                          <p class="msg-error">{{ $message }}</p>    
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label">Descripción del rol</label>
                          <textarea class="form-control  @error('description') field-error @enderror" name="description" id="roleDescription" rows="3" >{{ $role->description }}</textarea>
                          @error('description')
                          <p class="msg-error">{{ $message }}</p>    
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <div class="col-4">
                  <p>Selecciona los permisos a asignar al rol:</p>
                  <div  style="max-height: 300px; overflow:auto;">
                  @foreach($permissions as $permission)
                  <div>
                      <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id | old('permissions[]') }}"
                      {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                      <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                  </div>
                      @endforeach
                    </div>
                </form>
                </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.form-update').submit(function(e){
            e.preventDefault();

            this.submit();
                Swal.fire({
                    title: "¡Rol Actualizado!",
                    text: "El rol se actualizo con éxito.",
                    icon: "success"
                  });
        
        });
    </script>
</body>
</html>

