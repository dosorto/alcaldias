<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Livewire\PagoServicio;
use App\Models\Contribuyente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserController extends ApiController
{
    public function login(Request $request)
    {
        Log::channel('stderr')->info($request);
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return $this->errorResponse('Falta campos en la petición', ['error'=>'Validadción'], 403);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return $this->errorResponse('Unauthorized. Email & Password does not match with our record.', ['error'=>'Unauthorized'], 403);
            } 

            $user = User::where('email', $request->email)->first();
            $user->token =  $user->createToken("API TOKEN")->plainTextToken;

            return $this->successResponse('User successfully logged-in.', $user );

        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized.', ['error'=>'Unauthorized'], 500);
        }
    }
    public function check_identity(Request $request)
    {
        $validateIdentity = Validator::make($request->all(), [
            'identidad' => 'required',
        ]);

        if ($validateIdentity->fails()) {
            return $this->errorResponse('La identidad es requerida.', ['error' => $validateIdentity->errors()], 403);
        }

        $contribuyente = Contribuyente::where('identidad', $request->identidad)->first();

        if ($contribuyente) {
            return $this->successResponse('Identidad encontrada.', ['contribuyente' => $contribuyente], 200);
        } else {
            return $this->errorResponse('No existe un registro asociado a la identidad proporcionada.', [], 404);
        }
    }
    
public function create_user(Request $request)
{
    Log::channel('stderr')->info($request);
    try {
        // Validar los campos de la solicitud
        $validateUser = Validator::make($request->all(), [
            'password' => 'required',
            'identidad' => 'required',
        ]);

        if ($validateUser->fails()) {
            return $this->errorResponse('Faltan campos o la validación falló.', ['error' => $validateUser->errors()], 403);
        }

        DB::beginTransaction();

        // Buscar el contribuyente por identidad
        $contribuyente = Contribuyente::where('identidad', $request->identidad)->first();

        if (!$contribuyente) {
            DB::rollBack();
            return $this->errorResponse('No existe un registro asociado a la identidad proporcionada.', [], 404);
        }

        // Verificar si el correo del contribuyente ya está registrado en la tabla User
        $user = User::where('email', $contribuyente->email)->first();

        if ($user) {
            // Si el usuario ya existe, actualizar el user_id del contribuyente
            $contribuyente->update(['user_id' => $user->id]);
            DB::commit();
            return $this->errorResponse('Ya tiene una cuenta registrada',  ['email' => $contribuyente->email], 409);
        } else {
            // Si el usuario no existe, crear uno nuevo y asociarlo con el contribuyente
            $fullName = $contribuyente->primer_nombre . ' ' . $contribuyente->primer_apellido;
            $newUser = User::create([
                'name'=>$fullName,
                'email'=>$contribuyente->email,
                'password'=>$request['password'], ]);

            $contribuyente->update(['user_id' => $newUser->id]);
            DB::commit();
            return $this->successResponse('Usuario creado y asociado exitosamente con el contribuyente.', ['user' => $newUser]);
        }

    } catch (\Throwable $th) {
        DB::rollBack();
        Log::error('Error en create_user: ' . $th->getMessage());
        return $this->errorResponse('Error en el servidor.', ['error' => $th->getMessage()], 500);
    }
}



    public function get_pagos_by_User(Request $request)
    {
        Log::channel('stderr')->info($request);
        try {
            //revisar consulta
            $pagos = PagoServicio::get();
            return $this->successResponse('Lista de pagos obtenida correctamente', $pagos );

        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized.', ['error'=>'Unauthorized'], 500);
        }
    }

    public function getContribuyenteData()
    {
        try {
            // Obtén el usuario autenticado
            $user = auth()->user();
    
            // Carga el contribuyente asociado
            $contribuyente = $user->contribuyente;
    
            if (!$contribuyente) {
                return $this->errorResponse('No se encontró un contribuyente asociado con este usuario.', [], 404);
            }
    
            // Retorna los datos del contribuyente
            return $this->successResponse('Datos del contribuyente obtenidos correctamente.', $contribuyente);
        } catch (\Throwable $th) {
            Log::error('Error al obtener los datos del contribuyente: ' . $th->getMessage());
            return $this->errorResponse('Error en el servidor.', ['error' => $th->getMessage()], 500);
        }
    }
    


    
}