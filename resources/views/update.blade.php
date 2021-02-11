@extends('layout')

@section('content')
    <div class="container">
        <form action="{{ route('updated', $suivi->id) }}" method="POST" class="mdl-grid">
            @method('PUT')
            @csrf
            <div class="form-group top mdl-cell mdl-cell--7-col">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="entreprise" name="ent_name" value="{{ $suivi->entreprise->ent_name }}">
                    <label class="mdl-textfield__label" for="entreprise">Entreprise</label>
                    @if($errors->has('ent_name'))
                        <p>Nom pas valide</p>
                    @endif
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="city" name="ent_city" value="{{ $suivi->entreprise->ent_city }}">
                    <label class="mdl-textfield__label" for="city">Ville</label>
                    @if($errors->has('ent_city'))
                        <p>Ville pas valide</p>
                    @endif
                </div>
            </div>
            <div class="form-group middle mdl-cell mdl-cell--6-col mdl-cell--0-offset">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="contact" name="ent_contact_name" value="{{ $suivi->entreprise->ent_contact_name }}">
                    <label class="mdl-textfield__label" for="contact">Nom du contact</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="mail" name="ent_mail" value="{{ $suivi->entreprise->ent_mail }}">
                    <label class="mdl-textfield__label" for="mail">E-mail</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="phone" name="ent_phone" value="{{ $suivi->entreprise->ent_phone }}">
                    <label class="mdl-textfield__label" for="phone">Téléphone</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="phone" name="ent_web" value="{{ $suivi->entreprise->ent_web }}">
                    <label class="mdl-textfield__label" for="phone">Site Web</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <textarea class="mdl-textfield__input" rows= "5" id="description" name="ent_description">{{ $suivi->entreprise->ent_description }}</textarea>
                    <label class="mdl-textfield__label" for="description">Description</label>
                </div>
            </div>
            <div class="form-group bottom mdl-cell mdl-cell--6-col">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="date" id="firstdate" name="first_date" value="{{ $suivi->first_date }}">
                    <label class="mdl-textfield__label" for="firstdate">Date de candidature</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="date" id="relancedate" name="relaunch" value="{{ $suivi->relaunch }}">
                    <label class="mdl-textfield__label" for="relancedate">Date de la relance</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="date" id="entretien" name="interview_date" value="{{ $suivi->interview_date }}">
                    <label class="mdl-textfield__label" for="entretien">Date d'entretien</label>
                </div>
                <div><label class="slider mdl-switch mdl-js-switch mdl-js-ripple-effect" for="relance">
                        <span class="mdl-switch__label">Relancé</span>
                        <input type="checkbox" id="relance" class="mdl-switch__input" name="relaunched" {{ $suivi->relaunched == 'on' ? 'checked' : '' }}>
                    </label>
                    <label class="slider mdl-switch mdl-js-switch mdl-js-ripple-effect" for="reponse">
                        <span class="mdl-switch__label">Répondu</span>
                        <input type="checkbox" id="reponse" class="mdl-switch__input" name="response"  {{ $suivi->response == 'on' ? 'checked' : '' }}>
                    </label>
                </div>
                <div>
                    <label class="radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="encours">
                        <input type="radio" id="encours" class="mdl-radio__button" name="status" value="afaire" {{ $suivi->status == "afaire"? "checked" : 'checked' }}>
                        <span class="mdl-radio__label">A faire</span>
                    </label>
                    <label class="radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="encours">
                        <input type="radio" id="encours" class="mdl-radio__button" name="status" value="encours" {{ $suivi->status == "encours"? "checked" : '' }}>
                        <span class="mdl-radio__label">En Cours</span>
                    </label>
                    <label class="radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="positif">
                        <input type="radio" id="positif" class="mdl-radio__button" name="status" value="positif" {{ $suivi->status == "positif" ? "checked" : '' }}>
                        <span class="mdl-radio__label">Positif</span>
                    </label>
                    <label class="radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="negatif">
                        <input type="radio" id="negatif" class="mdl-radio__button" name="status" value="negatif" {{ $suivi->status == "negatif"? "checked" : '' }}>
                        <span class="mdl-radio__label">Négatif</span>
                    </label>

                </div>
            </div>
            <div class="form-group bottom mdl-cell mdl-cell--6-col">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    Modifier
                </button>
                <a href="{{ route('homepage') }}" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    Annuler
                </a>
            </div>
        </form>
    </div>
@endsection
