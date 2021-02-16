@extends('layout')

@section('content')
    <div class="container">
        <div class="mdl-grid">
            @if(isset($vide))
                <div class="btn-candidate">
                <p>{{$vide}}</p>
                </div>
            @endif
            <div class="card-container">
            @foreach($entreprises as $suivi)
                    <div class="card sticky-action hoverable">
                        <div class="card-image waves-effect waves-block waves-light activator" style="background-color:
                        @if($suivi->status == 'negatif')
                        FireBrick
                        @elseif($suivi->status == 'positif')
                        #30B349
                        @elseif($suivi->status == 'encours')
                        #492980
                        @else
                        #201238
                        @endif
                        ">
                            @if($suivi->response == 'on')
                                <span><i class="material-icons reponse">mark_as_unread</i></span>
                            @endif
                            <i class="material-icons more">more_vert</i>
                            <h3 class="card-title activator">{{ $suivi->entreprise->ent_name }}</h3>
                            <p class="card-subtitle activator">{{ $suivi->entreprise->ent_city }}</p>
                        </div>
                        <div class="card-content">
                            <p></p>
                            <p class="card-city"></p>
                            <p class="card-web"><a href="http://{{ $suivi->entreprise->ent_web }}">{{ $suivi->entreprise->ent_web }}</a></p>
                            <p class="card-desc-cut">{{ $suivi->entreprise->ent_description }}</p>
                        </div>

                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{ $suivi->entreprise->ent_name }}<i class="material-icons right">close</i></span>
                            <p class="card-desc">{{ $suivi->entreprise->ent_description }}</p>
                            <p class="card-contact name">{{ $suivi->entreprise->ent_contact_name }}</p>
                            <p class="card-contact phone">{{ $suivi->entreprise->ent_phone }}</p>
                            <a class="card-contact mail" href="mailto::{{ $suivi->entreprise->ent_mail }}">{{ $suivi->entreprise->ent_mail }}</a>
                        </div>
                        <div class="card-action">
                            <a class="waves-effect waves-teal btn-flat modal-trigger" href="#modalUpdate{{$suivi->id}}">Mofifier</a> <!-- Modal Trigger -->
                            <a class="waves-effect waves-teal btn-flat modal-trigger" href="#modalDelete{{$suivi->id}}">Supprimer</a>
                        </div>
                    </div>
                    <!-- Modal Delete -->
                    <div id="modalDelete{{$suivi->id}}" class="modal modalDelete">
                        <div class="modal-content">
                            <p class="modal-title">Voulez-vous vraiment supprimer cette candidature ?</p>
                            <p class="modal-subtitle">Les informations que vous allez supprimer ne pourront plus être récupérés.</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('delete', $suivi->id) }}" class="form-delete" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="modal-close waves-effect waves-red btn red">Supprimer</button>
                            </form>
                            <a href="#!" class="modal-close waves-effect waves-teal btn">Annuler</a>
                        </div>

                    </div>


                    <!-- Modal Update -->
                    <div id="modalUpdate{{$suivi->id}}" class="modal modalUpdate">
                        <form action="{{ route('updated', $suivi->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-content">
                                <div class="input-field">
                                    <i class="material-icons prefix">create</i>
                                    <input id="entreprise{{$suivi->id}}" type="text" class="validate" name="ent_name" value="{{ $suivi->entreprise->ent_name }}">
                                    <label for="entreprise{{$suivi->id}}">Entreprise</label>
                                    @error('ent_name')
                                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                                    @enderror

                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">create</i>
                                    <input id="ville{{$suivi->id}}" type="text" class="validate" name="ent_city" value="{{ $suivi->entreprise->ent_city }}">
                                    <label for="ville{{$suivi->id}}">Ville</label>
                                    @error('ent_city')
                                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col s12 m6">
                                        <div class="input-field">
                                            <i class="material-icons prefix">create</i>
                                            <input id="contact_name{{$suivi->id}}" type="text" class="validate" name="ent_contact_name" value="{{ $suivi->entreprise->ent_contact_name }}">
                                            <label for="contact_name{{$suivi->id}}">Nom du contact</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">create</i>
                                            <input id="contact_phone{{$suivi->id}}" type="text" class="validate" name="ent_phone" value="{{ $suivi->entreprise->ent_phone }}">
                                            <label for="contact_phone{{$suivi->id}}">Téléphone</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">create</i>
                                            <input id="contact_mail{{$suivi->id}}" type="text" class="validate" name="ent_mail" value="{{ $suivi->entreprise->ent_mail }}">
                                            <label for="contact_mail{{$suivi->id}}">E-mail</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">create</i>
                                            <input id="contact_web{{$suivi->id}}" type="text" class="validate" name="ent_web" value="{{ $suivi->entreprise->ent_web }}">
                                            <label for="contact_web{{$suivi->id}}">Site Web</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">create</i>
                                            <textarea id="description{{$suivi->id}}" type="text" class="materialize-textarea" name="ent_description" rows="4">{{ $suivi->entreprise->ent_description }}</textarea>
                                            <label for="description{{$suivi->id}}">Description</label>
                                        </div>
                                    </div>
                                    <div class="col s12 m6">
                                        <div class="input-field">
                                            <i class="material-icons prefix">today</i>
                                            <input type="text" id="candidate{{$suivi->id}}" class="datepicker" name="first_date" value="{{ $suivi->first_date }}">
                                            <label for="candidate{{$suivi->id}}">Date de la candidature</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">today</i>
                                            <input type="text" id="relance{{$suivi->id}}" class="datepicker" name="relaunch" value="{{ $suivi->relaunch }}">
                                            <label for="relance{{$suivi->id}}">Date de la candidature</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">today</i>
                                            <input type="text" id="interview{{$suivi->id}}" class="datepicker" name="interview_date" value="{{ $suivi->interview_date }}">
                                            <label for="interview{{$suivi->id}}">Date de la candidature</label>
                                        </div>
                                        <div class="switch">
                                            <label>
                                                <input type="checkbox" name="relaunched" {{ $suivi->relaunched == 'on' ? 'checked' : '' }}>
                                                <span class="lever"></span>
                                                Relancé
                                            </label>
                                        </div>
                                        <div class="switch">
                                            <label>
                                                <input type="checkbox" name="response" {{ $suivi->response == 'on' ? 'checked' : '' }}>
                                                <span class="lever"></span>
                                                Répondu
                                            </label>
                                        </div>
                                        <div class="input-field radio">
                                            <label>
                                                <input type="radio" name="status" value="afaire" {{ $suivi->status == "afaire"? "checked" : 'checked' }}/>
                                                <span>A faire</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="status" value="encours" {{ $suivi->status == "encours"? "checked" : '' }}/>
                                                <span>En cours</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="status" value="positif" {{ $suivi->status == "positif"? "checked" : '' }}/>
                                                <span>Positive</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="status" value="negatif" {{ $suivi->status == "negatif"? "checked" : '' }}/>
                                                <span>Négative</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="modal-close waves-effect waves-light btn">Valider</button>
                                <a href="#!" class="modal-close waves-effect waves-light btn">Annuler</a>
                            </div>
                        </form>
                    </div>
            @endforeach
            </div>
        </div>

        @if(session('status'))
            <div id="snackbar" aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button type="button" class="mdl-snackbar__action"></button>
            </div>
        @endif

    </div>
    <div class="tap">
        <a id="menu"  href="{{ route('formulaire') }}" class="waves-effect waves-light btn btn-floating pulse" ><i class="material-icons">add</i></a>

        <!-- Tap Target Structure -->
        <div class="tap-target" data-target="menu">
            <div class="tap-target-content">
                <h5>Ajouter une candidature</h5>
                <p>Vous ne savez pas par où commencer ?</p>
                <p>C'est par ici !</p>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            @if(session('status'))
                M.toast({html: '{{session('status')}}', displayLength: 5000});
            @endif
            @if(isset($vide) AND isset($btn))
                setTimeout(function () {
                    $('.tap-target').tapTarget('open');
                }, 1000)
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    M.toast({html: '{{ $error }}', displayLength: 5000, classes: 'toast-error'});
                @endforeach
            @endif
        })
    </script>
@endsection
