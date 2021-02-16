@extends('auth.layout')

@section('content')
    <div class="background-login">
        <div class="login-logo">
            <img src="" alt="">
        </div>
        <h1 class="title">Bienvenue sur candidate.fr</h1>
        <form class="auth" action="{{ route('authentification') }}" method="POST">
            @csrf
            <fieldset class="z-depth-2">
                <legend class="z-depth-2">candidate.fr - Login</legend>
                <div class="input-field">
                    <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}">
                    <label for="name">Nom</label>
                    @error('name')
                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <input id="password" type="text" class="validate" name="password" value="">
                    <label for="password">Mot de passe</label>
                    @error('password')
                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                @foreach ($errors->all() as $error)
                    <span class="helper-text" data-error="wrong">{{$error}}</span>
                @endforeach
                <button type="submit" class="waves-effect waves-light btn login-btn">
                    Connexion
                </button>
                <label for="remember" class="remember">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Se souvenir de moi</span>
                </label>
                <a href="{{ route('create_user') }}">création d'un compte</a>
                <a href="{{ route('lost_password') }}">mot de passe perdu ?</a>
            </fieldset>
        </form>
    </>
@endsection
