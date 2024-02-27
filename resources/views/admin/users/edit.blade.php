@extends('layouts.app')
@Section('edit')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="{{ asset('assets/css/role.css') }}">

</head>
<body>
    <header>
        <h2 style="margin: 30px; text-align: center;">Editar Usuario</h2>
    </header>

    <div class="container">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

</body>
</html>
@endsection
