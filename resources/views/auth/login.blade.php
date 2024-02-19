<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Iniciar Sesión</title> 
    <style> 
        body { 
            font-family: Arial, Verdana; 
            background-image: url('https://live.staticflickr.com/4117/4802354450_e8b1281008_b.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            backdrop-filter: blur(5px); 
            margin: 0; 
            padding: 0; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
        } 
         
        .card { 
            background-color: white;
            width:500px;
            height: 100%;
            float: right;
            text-align: left;
            color: black;
        } 

        .info h1{
            text-align: center;
            margin: 30px;
            margin-top: 100px;
        }

         .info p{
            margin: 40px;
            font-size: 18px; 
        }

        .info { 
            background-color: rgba(45, 55, 68, 0.8);
            width:900px;
            height: 600px;
            float: left;
            text-align: justify;
            color: white;
            margin-left: 100px;
        } 
 
        .card-header { 
            margin: 30px;
            font-size: 24px; 
            font-weight: bold; 
            margin-bottom: 20px; 
            text-align: center; 
            color: #2D3744;
        } 
 
        .form-group { 
            margin-bottom: 20px; 
        } 
 
        .form-group label { 
            margin-left: 30px;
            display: block; 
            font-size: 18px; 
            margin-bottom: 5px; 
        } 
 
        .form-group input { 
            margin-left: 30px;
            width: 400px; 
            padding: 10px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        } 
 
        .form-group input:focus { 
            outline: none; 
            border-color: #2D3744; 
        } 
 
        .btn-primary { 
            margin-left: 180px;
            background-color: #33383E; 
            color: #fff; 
            border: none; 
            border-radius: 5px; 
            padding: 10px 20px; 
            cursor: pointer; 
            width: 150px; 
            display: block; 
            font-size: 18px; 
            transition: background-color 0.3s; 
        } 
 
        .btn-primary:hover { 
            background-color: #659DE7; 
        } 
 
        .text-center { 
            text-align: right; 
            margin: 30px; 
            color: #364964;
        } 
 
        .form-check { 
            text-align: right; 
            margin: 30px; 
            color: #364964;
        } 

        img {
            width: 100px;
            height: 90px;
            margin-top: 110px;
            margin-left: 200px;
            margin-bottom: 0px;
        }
 
        @media (max-width: 480px) { 
            .card { 
                padding: 10px; 
            } 
        } 
    </style> 
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
                        <a type="btn btn-primary" href="{{ route('register') }}">  Registrarse</a>
                    </div> 
            
                    
                </form> 
            </div>
        </div>
            
</body> 
</html>