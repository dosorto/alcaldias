<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PasswordResetController extends ApiController
{
    public function sendResetLinkEmail(Request $request)
    {
        Log::channel('stderr')->info($request);

        try {
            // Validar el campo de email
            $validateEmail = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
            ]);

            if ($validateEmail->fails()) {
                return $this->errorResponse('Falta campos en la petición o el email no existe.', ['error' => $validateEmail->errors()], 403);
            }

            // Intentar enviar el enlace de restablecimiento
            $status = Password::sendResetLink($request->only('email'));

            // Verificar si se envió correctamente o hubo un error
            if ($status === Password::RESET_LINK_SENT) {
                return $this->successResponse('Correo de restablecimiento de contraseña enviado exitosamente.', ['status' => __($status)]);
            } else {
                return $this->errorResponse('Error al enviar el correo de restablecimiento.', ['error' => __($status)], 500);
            }

        } catch (\Throwable $th) {
            // Loguea el error completo con stack trace
            Log::error('Error en sendResetLinkEmail: ' . $th->getMessage(), [
                'file' => $th->getFile(),
                'line' => $th->getLine(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->errorResponse('Error en el servidor.', ['error' => $th->getMessage()], 500);
        }
    }
}


