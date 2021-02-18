@extends('auth.layout')
@section('content')
    <div class="background-login">
        <h1 class="title">Ne l'oublie pas cette fois !</h1>
        <form class="auth" action="{{route('update_password')}}" method="POST">
            <fieldset class="z-depth-2">
                <legend class="z-depth-2">Créer ton nouveau mot de passe</legend>
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <div class="input-field">
                        <input id="email" type="text" class="validate" name="email" value="{{ old('email') }}" required>
                        <label for="email">Vérifions ton adresse mail</label>
                        @error('email')
                            <span class="helper-text" data-error="wrong">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="input-field">
                    <input id="password" type="text" class="validate" name="password" value="{{ old('password') }}" required>
                    <label for="password">Nouveau Mot de passe</label>
                    @error('password')
                        <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <input id="password_confirmation" type="text" class="validate" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                    <label for="password_confirmation">Confirmation du nouveau mot de passe</label>
                    @error('password_confirmation')
                        <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="create-btn waves-effect waves-light btn">
                    Confirmer
                </button>
            </fieldset>
        </form>
    </div>
@endsection
