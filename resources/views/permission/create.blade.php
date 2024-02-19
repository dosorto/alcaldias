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
            <h3>Crear nuevo permiso</h3>
            <hr>
  <form action="{{ route('permissionCreate') }}" method="post" class="form-create">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nombre del permiso</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') field-error @enderror" id="name">
    @error('name')
    <p class="msg-error">{{ $message }}</p>    
    @enderror
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Descripción del permiso</label>
    <textarea class="form-control  @error('description') field-error @enderror" name="description" id="roleDescription" rows="3" >{{ old('description') }}</textarea>
    @error('description')
    <p class="msg-error">{{ $message }}</p>    
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Agregar</button>
</div>

</form>    
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.form-create').submit(function(e){
            e.preventDefault();
            this.submit();
                Swal.fire({
                    title: "¡Permiso Creado!",
                    text: "El permiso se creó con éxito.",
                    icon: "success"
                  });

        });
    </script>
</body>
</html>

