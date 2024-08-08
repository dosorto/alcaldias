<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Log;

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

    
}
