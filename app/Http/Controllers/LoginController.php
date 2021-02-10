<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;


class LoginController extends Controller
{
    //Page d'accueil du login
    public function index(){
        return view('auth.login');
    }
    //Authentification
    public function authenticate(Request $request){
        $credentials = $request->only('name', 'password');
        $remember = $request->only('remember'); //Remember Me

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('homepage')->with('status', 'Bienvenue '.Auth::user()->name);
        }

        return back()->withErrors([
            'email' => "Votre nom d'utilisateur ou mot de passe n'est pas valide",
        ]);
    }
    //Page pour Créer un utilisateur
    public function create_index(){
        return view('auth.create_user');
    }
    //Création du nouvel utilisateur
    public function create_user(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:users,email|max:255',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'rgpd' => 'accepted'
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
    //Déconnection
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    //Mot de passe perdu
    public function lost_password(){
        return view('auth.lost_password');
    }
    //Demande de nouveau mot de passe
    public function request_password(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
    //Changement du mot de passe
    public function reset_password(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
