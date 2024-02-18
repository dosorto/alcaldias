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
            <form action="{{ route('roleUpdate', $role->id) }}" method="post">
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
              </form>
        </div>
        
    </div>
</body>
</html>

