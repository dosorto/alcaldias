<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Iniciar Sesión</title> 
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/login.css')); ?>"> 
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
                <form method="POST" action="<?php echo e(route('login')); ?>"> 
                    <?php echo csrf_field(); ?> 
            
                    <div class="form-group"> 
                        <label for="email">Correo Electrónico</label> 
                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus> 
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span> 
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    </div> 
            
                    <div class="form-group"> 
                        <label for="password">Contraseña</label> 
                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password"> 
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span> 
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    </div> 
            
                    <?php if(Route::has('password.request')): ?> 
                        <div class="text-center"> 
                            <a href="<?php echo e(route('password.request')); ?>">Olvidé mi contraseña</a> 
                        </div> 
                    <?php endif; ?> 
            
                    <button type="submit" class="btn-primary">Iniciar Sesión</button> 

                    <div class="form-check"> 
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="remember">Recordar nombre de usuario</label><br> 
                        <a type="btn btn-primary" href="<?php echo e(route('register')); ?>">Registrarse</a>
                    </div> 
            
                    
                </form> 
            </div>
        </div>
            
</body> 
</html><?php /**PATH C:\Users\joelc\OneDrive\Escritorio\Allan\Ingenieria de software\alcaldias\resources\views/auth/login.blade.php ENDPATH**/ ?>