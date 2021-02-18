@extends(isset(Illuminate\Support\Facades\Auth::user()->name) ? 'layout' : 'auth.layout')

@section('content')
    <div class="background-login">
        <div class="login-logo">
            <img src="" alt="">
        </div>
        <h1 class="title">Bienvenue sur <span>candidate.wilddev.fr</span></h1>
        <p class="subtitle"><span>Ici </span>tu va pouvoir gérer toutes tes candidatures !!</p>
        <form class="auth" action="{{ route('authentification') }}" method="POST">
            @csrf
            <fieldset class="z-depth-2">
                <legend class="z-depth-2">Connecte toi à ta base</legend>
                <div class="input-field">
                    <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required>
                    <label for="name">Nom</label>
                    @error('name')
                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <input id="password" type="password" class="validate" name="password" value="" required>
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
                <a href="{{ route('create_user') }}" class="btn waves-effect waves-light create-btn">création d'un compte</a>

                <label for="remember" class="remember">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Se souvenir de moi</span>
                </label>
                <a href="{{ route('lost_password') }}">mot de passe perdu ?</a>

            </fieldset>
        </form>
    </div>
@endsection
