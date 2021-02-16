@extends('layout')

@section('content')
    <div class="container">
        <form action="{{ route('validate') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="input-field">
                    <i class="material-icons prefix">create</i>
                    <input id="entreprise" type="text" class="validate" name="ent_name" value="{{ old('ent_name') }}">
                    <label for="entreprise">Entreprise</label>
                    @error('ent_name')
                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">create</i>
                    <input id="ville" type="text" class="validate" name="ent_city" value="{{ old('ent_city') }}">
                    <label for="ville">Ville</label>
                    @error('ent_city')
                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="input-field">
                            <i class="material-icons prefix">create</i>
                            <input id="contact_name" type="text" class="validate" name="ent_contact_name" value="{{ old('ent_contact_name') }}">
                            <label for="contact_name">Nom du contact</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">create</i>
                            <input id="contact_phone" type="text" class="validate" name="ent_phone" value="{{ old('ent_phone') }}">
                            <label for="contact_phone">Téléphone</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">create</i>
                            <input id="contact_mail" type="text" class="validate" name="ent_mail" value="{{ old('ent_mail') }}">
                            <label for="contact_mail">E-mail</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">create</i>
                            <input id="contact_web" type="text" class="validate" name="ent_web" value="{{ old('ent_web') }}">
                            <label for="contact_web">Site Web</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">create</i>
                            <textarea id="description" type="text" class="materialize-textarea" name="ent_description" rows="4">{{ old('ent_description') }}</textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <i class="material-icons prefix">today</i>
                            <input type="text" id="candidate" class="datepicker" name="first_date" value="{{ old('first_date') }}">
                            <label for="candidate">Date de la candidature</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">today</i>
                            <input type="text" id="relance" class="datepicker" name="relaunch" value="{{ old('relaunch') }}">
                            <label for="relance">Date de la candidature</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">today</i>
                            <input type="text" id="interview" class="datepicker" name="interview_date" value="{{ old('interview_date') }}">
                            <label for="interview">Date de la candidature</label>
                        </div>
                        <div class="switch">
                            <label>
                                <input type="checkbox" name="relaunched" {{ old('relaunched') == 'on' ? 'checked' : '' }}>
                                <span class="lever"></span>
                                Relancé
                            </label>
                        </div>
                        <div class="switch">
                            <label>
                                <input type="checkbox" name="response" {{ old('response') == 'on' ? 'checked' : '' }}>
                                <span class="lever"></span>
                                Répondu
                            </label>
                        </div>
                        <div class="input-field radio">
                            <label>
                                <input type="radio" name="status" value="afaire" {{ old('status') == "afaire"? "checked" : 'checked' }}/>
                                <span>A faire</span>
                            </label>
                            <label>
                                <input type="radio" name="status" value="encours" {{ old('status') == "encours"? "checked" : '' }}/>
                                <span>En cours</span>
                            </label>
                            <label>
                                <input type="radio" name="status" value="positif" {{ old('status') == "positif"? "checked" : '' }}/>
                                <span>Positive</span>
                            </label>
                            <label>
                                <input type="radio" name="status" value="negatif" {{ old('status') == "negatif"? "checked" : '' }}/>
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    M.toast({html: '{{ $error }}', displayLength: 5000, classes: 'toast-error'});
                @endforeach
            @endif
        })
    </script>
@endsection
