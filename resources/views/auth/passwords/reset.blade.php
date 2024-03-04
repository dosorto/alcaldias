<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            height: 550px;
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
            margin-top: 60px;
        }

        .card-body {
            padding: 20px;
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
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <main>
        <div class="card">
            <h1>Restablecer contraseña</h1>
            <p>Ingrese su nueva contraseña</p>

            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="password">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="password-confirm">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    <button type="submit" class="btn btn-primary">
                        Restablecer Contraseña
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
