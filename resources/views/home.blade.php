@extends('layout')

@section('content')
    <div class="container">
        <div class="mdl-grid">
            @if(isset($vide))
                <div class="btn-candidate">
                <p>{{$vide}}</p>
                @if(isset($btn))
                        <a href="{{ route('formulaire') }}">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Nouvelle candidature</button>
                        </a>
                @endif
                </div>
            @endif
            @foreach($entreprises as $compagny)
            <div class="enterprise-card mdl-cell mdl-cell--3-col mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <div class=" mdl-card mdl-shadow--2dp">
                    <div class="card-title mdl-card__title mdl-card--expand" style="background-color:
                        @if($compagny->status == 'negatif')
                            FireBrick
                        @elseif($compagny->status == 'positif')
                            #30B349
                        @elseif($compagny->status == 'encours')
                            #492980
                        @else
                            #201238
                        @endif
                        ">
                        @if($compagny->response == 'on')
                            <div class="mail-logo"><img src="{{ asset('images/mail-solid.svg') }}" alt="Réponse réçu"></div>
                        @endif
                        <h2 class="title mdl-card__title-text">{{ $compagny->entreprise->ent_name }}</h2>
                        <p class="subtitle">{{ $compagny->entreprise->ent_city }}</p>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <a class="web" target="_blank" href="http://{{ $compagny->entreprise->ent_web }}">{{ $compagny->entreprise->ent_web }}</a>
                        <p class="contact">{{ $compagny->entreprise->ent_contact_name }}</p>
                        <p class="phone">{{ $compagny->entreprise->ent_phone }}</p>
                        <a href="mailto:{{ $compagny->entreprise->ent_mail }}" class="mail">{{ $compagny->entreprise->ent_mail }}</a>
                        <p class="desc">{{ $compagny->entreprise->ent_description }}</p>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="{{ route('update', $compagny->id) }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Modifier
                        </a>
                        <div class="btn-delete">
                            <button id="show-dialog-{{$compagny->id}}" onclick="showDialog({{$compagny->id}})" type="button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Supprimer</button>
                            <dialog class="mdl-dialog" id="delete-dialog-{{$compagny->id}}">
                                <h4 class="mdl-dialog__title">Voulez-vous vraiment supprimer?</h4>
                                <div class="mdl-dialog__content">
                                    <p>
                                        Les informations que vous allez supprimer ne pourront plus être récupérés.
                                    </p>
                                </div>
                                <div class="mdl-dialog__actions">
                                    <form action="{{ route('delete', $compagny->id) }}" method="POST" class="btn-delete">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-red mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                            supprimer
                                        </button>
                                    </form>
                                    <button type="button" class="mdl-button close mdl-button--colored mdl-js-button mdl-js-ripple-effect">Annuler</button>
                                </div>
                            </dialog>
                        </div>
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
                        timeout: 4000
                    }
                );
            }
        }
        function showDialog(id) {
            let dialog = document.querySelector('#delete-dialog-'+id);
            let showDialogButton = document.querySelector('#show-dialog-'+id);
            if (!dialog.showModal) {
                dialogPolyfill.registerDialog(dialog);
            }
            // showDialogButton.addEventListener('click', function () {
            //     dialog.showModal();
            // });
            dialog.showModal();
            dialog.querySelector('.close').addEventListener('click', function () {
                dialog.close();
            });
        }
    </script>
@endsection
