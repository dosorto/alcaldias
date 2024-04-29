<?php

namespace App\Http\Controllers\Auth;
use App\Models\Contribuyente;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user) // Eliminar la declaración de $request si no lo usas
    {
        if ($user->hasRole('Usuario')) {
            return redirect()->route('contribuyente.perfil');
        } elseif ($user->roles->isEmpty()) {
            auth()->logout();
            return redirect('/login')->with('error', 'No tiene ningún rol asignado.');
        } else {
            return redirect()->intended($this->redirectPath());
        }
    }
}
