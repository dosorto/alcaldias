<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Iniciar Sesión</title> 
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head> 
<body class="bg-gray-100">

    <div class="bg-gray-200 h-16 flex items-center justify-center justify-between px-4">
        <h2 style="margin-top: 25px;" class="text-4xl font-extrabold lg:leading-[50px] text-black mb-8">
            SMIT - Pro
        </h2>
        <a href="/consultatributaria" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Consulta tus Pagos
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center justify-between py-8">
       
        <div class="w-full md:w-1/2 mb-8 md:mb-0 ">
            <div class="info mt-15">
                <img src="{{ asset('assets/css/alcaldias.jpg') }}" alt="Logo" class="mx-auto w-64 rounded-full mb-20">

               
                <h2 class="text-4xl font-extrabold lg:leading-[50px] text-black mb-8">
                    Sistema Municipal de Ingresos Tributarios - Profesional
                </h2>
                
                <p>Somos una herramienta diseñada para la gestion y transparencia tributaria de tu municipalidad.</p>
            </div>
        </div>

        
        <div class="w-full md:w-1/2 bg-gray-200 rounded-md shadow-md px-6 py-8">
            <div class="max-w-md mx-auto bg-white shadow-md rounded-md px-6 py-8">
                <div class="text-center mb-4">
                    <img src="{{ asset('assets/css/loginimagen.png') }}" alt="Imagen" class="mx-auto w-64 rounded-full">

                    <div class="font-bold text-xl mt-4">Iniciar Sesión</div>
                </div>
                <form method="POST" action="{{ route('login') }}"> 
                    @csrf 
                    <div class="form-group"> 
                        <label for="email" class="block mb-2">Correo Electrónico</label> 
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror w-full px-4 py-2 rounded-md border border-gray-300" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                        @error('email') 
                            <span class="invalid-feedback" role="alert">{{ $message }}</span> 
                        @enderror 
                    </div> 
        
                    <div class="form-group mt-4"> 
                        <label for="password" class="block mb-2">Contraseña</label> 
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror w-full px-4 py-2 rounded-md border border-gray-300" name="password" required autocomplete="current-password"> 
                        @error('password') 
                            <span class="invalid-feedback" role="alert">{{ $message }}</span> 
                        @enderror 
                    </div> 
        
                    @if (Route::has('password.request')) 
                        <div class="text-center mt-4"> 
                            <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">Olvidé mi contraseña</a> 
                        </div> 
                    @endif 
        
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 mt-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Iniciar Sesión</button> 
        
                    <div class="mt-4 text-center"> 
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Recordar nombre de usuario</label><br> 
                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Registrarse</a>
                    </div> 
                </form> 
            </div>
        </div>
    </div>
</body> 
</html>




