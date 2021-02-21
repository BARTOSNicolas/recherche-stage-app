@extends('auth.layout')

@section('content')
    <div class="background-login">
        <h1 class="title">Attention alzheimer te guette ! </h1>
        <form class="auth" action="{{route('request_password')}}" method="POST">
            <fieldset class="z-depth-2">
                <legend class="z-depth-2">Tu as perdu ton mot de passe ?</legend>
                @csrf
                <div class="input-field">
                    <input id="email" type="text" class="validate" name="email" value="{{ old('email') }}" required>
                    <label for="email">Adresse mail</label>
                    @error('email')
                        <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="create-btn waves-effect waves-light btn">
                        Envoyer
                    </button>
                    <a href="{{ route('homepage') }}" class="create-btn waves-effect waves-light btn">
                        Annuler
                    </a>
                </div>
            </fieldset>
        </form>
    </div>
 @endsection
