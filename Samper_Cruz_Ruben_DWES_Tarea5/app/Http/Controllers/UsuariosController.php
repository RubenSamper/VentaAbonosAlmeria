<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class UsuariosController extends Controller{
    public function login(){
        return view('usuarios.login');
    }

    public function loginValidation(Request $request){
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        $user = Usuario::where('username', $request->username)->first();

        if(!$user|| !Hash::check($request->password, $user->password)) {
            return back();
        }

        Auth::login($user);
        return redirect()->route('abonos.index');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('usuarios.login');
    }
}