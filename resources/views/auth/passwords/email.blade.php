<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
<<<<<<< HEAD
=======
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
>>>>>>> dev-nataly
    <style>
        body {
            font-family: Arial, Verdana;
            background-color: #eee;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            margin-top: 0px;
            width: 500px;
            height: 500px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
        }

        .card p{
            text-align: justify;
            font-size: 18px;
            margin: 25px;
        }

        .card h1{
            text-align: center;
            margin-top: 100px;
        }

        .card-body {
            padding: 20px;
            margin: 20px
        }

        label {
            margin-bottom: 8px;
            display: block;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <main>
        <div class="card">
            <h1>Reestablecer contraseña</h1>
            <p>A contuación debe proporcionar una dirección de correo electronico, mediante el cual recibirá un correo para continuar con el proceso de restablecimiento de contraseña</p>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="btn btn-primary">
                        Enviar Enlace de Restablecimiento de Contraseña
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
