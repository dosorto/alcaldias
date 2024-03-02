<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="{{ asset('assets/css/role.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
body {
  background-color: #eee;
}

.container-sm {
    margin: 50px;
    margin-left: 100px;
}
</style>

</head>
<body>
    <main>
    <div class="mt-3">
        <a class="btn btn-primary" href=" {{ route( 'login' ) }}" style="margin-left: 120px; margin-top: 20px;">Volver a inicio</a>
        <div class="container-sm">
            <h3>Crear nuevo usuario</h3>
            <hr>
        <div class="col-8">
            <form method="POST" action="{{ route('register') }}" class="form-create">
                @csrf

                <div class="mb-3">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Correo Electrónico</label>
                    <input id="email" style="width: 100%;" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
        </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.form-create').submit(function(e){
            e.preventDefault();
            this.submit();
                Swal.fire({
                    title: "¡Usuario Creado!",
                    text: "El usuario se creado con éxito.",
                    icon: "success"
                  });

        });
    </script>
</body>
</html>