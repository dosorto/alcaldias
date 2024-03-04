<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Iniciar Sesión</title> 
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}"> 
</head> 
<body> 
<div class="info">
                <h1>Bienvenido</h1>
                <p><b>Misión:</b>
                <br>
                Nuestra misión es servir a la comunidad con dedicación y transparencia, 
                trabajando incansablemente para mejorar la calidad de vida de nuestros ciudadanos.</p>
                <p><b>Visión:</b>
                <br>
                Aspiramos a ser una Alcaldía líder, reconocida por su excelencia en la administración 
                pública y su compromiso con el bienestar de la comunidad.</p>
            </div>
        <div class="card"> 
            <img src="https://th.bing.com/th/id/OIP.mPe6EcAAhBZxQ2DXmzj8wwHaGT?rs=1&pid=ImgDetMain">
            <div class="card-header">Iniciar Sesión</div> 
                <form method="POST" action="{{ route('login') }}"> 
                    @csrf 
            
                    <div class="form-group"> 
                        <label for="email">Correo Electrónico</label> 
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                        @error('email') 
                            <span class="invalid-feedback" role="alert">{{ $message }}</span> 
                        @enderror 
                    </div> 
            
                    <div class="form-group"> 
                        <label for="password">Contraseña</label> 
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> 
                        @error('password') 
                            <span class="invalid-feedback" role="alert">{{ $message }}</span> 
                        @enderror 
                    </div> 
            
                    @if (Route::has('password.request')) 
                        <div class="text-center"> 
                            <a href="{{ route('password.request') }}">Olvidé mi contraseña</a> 
                        </div> 
                    @endif 
            
                    <button type="submit" class="btn-primary">Iniciar Sesión</button> 

                    <div class="form-check"> 
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Recordar nombre de usuario</label><br> 
                        <a type="btn btn-primary" href="{{ route('register') }}">Registrarse</a>
                    </div> 
            
                    
                </form> 
            </div>
        </div>
            
</body> 
</html>