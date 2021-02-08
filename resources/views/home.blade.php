@extends('layout')

@section('content')
    <div class="container">
        <div class="mdl-grid">
            @foreach($entreprises as $compagny)
            <div class="enterprise-card mdl-cell mdl-cell--3-col mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <div class=" mdl-card mdl-shadow--2dp">
                    <div class="card-title mdl-card__title mdl-card--expand" style="background-color:
                        @if($compagny->status == 'negatif')
                            FireBrick
                        @elseif($compagny->status == 'positif')
                            OliveDrab
                        @else
                            SlateGray
                        @endif
                        ">
                        <h2 class="title mdl-card__title-text">{{ $compagny->entreprise->ent_name }}</h2>
                        <p class="subtitle">{{ $compagny->entreprise->ent_city }}</p>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p class="contact">{{ $compagny->entreprise->ent_contact_name }}</p>
                        <p class="phone">{{ $compagny->entreprise->ent_phone }}</p>
                        <a href="mailto:{{ $compagny->entreprise->ent_mail }}" class="mail">{{ $compagny->entreprise->ent_mail }}</a>
                        <p class="desc">{{ $compagny->entreprise->ent_description }}</p>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="{{ route('update', $compagny->id) }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Modifier
                        </a>
                        <form action="{{ route('delete', $compagny->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('Etes-vous sûr')" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if(session('status'))
            <div id="snackbar" aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button type="button" class="mdl-snackbar__action"></button>
            </div>
        @endif

    </div>

@endsection
@section('script')
    <script>
        window.onload = function(){
            var opensnack = document.querySelector("#snackbar");
            if(opensnack != null) {
                var notification = document.querySelector('#snackbar');
                notification.MaterialSnackbar.showSnackbar(
                    {
                        message: '{{ session('status') }}',
                        timeout: 5000
                    }
                );
            }
        }
    </script>
@endsection
