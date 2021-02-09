<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('Auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('homepage')->with('status', 'Bienvenue '.Auth::user()->name);
        }

        return back()->withErrors([
            'email' => "Votre mail ou mot de passe n'est pas valide",
        ]);
    }

    public function create_index(){
        return view('Auth.create_user');
    }
    public function create_user(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:users,email|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|same:password_verif',
            'password_verif' => 'required',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->rgpd = $request->input('rgpd');

        $user->save();

        Auth::login($user);

        return redirect()->route('homepage')->with('status', 'Bienvenue '.$user->name);

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
