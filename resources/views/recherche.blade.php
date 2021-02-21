@extends('layout')

@section('content')
    <div class="row search-container">
        <div class="col s12 m4 l4 xl3">
            <form class="recherche" action="#" method="post">
                @csrf
                <div class="input-field col s12 search-city">
                    <input type="text" id="autocomplete-input" name="city" class="autocomplete" autocomplete="off" value="{{old('name')}}">
                    <label for="autocomplete-input">CHOISIR UNE VILLE</label>
                    @error('city')
                    <p class="red-text">La Ville est requise</p>
                    @enderror
                    <p class="range-field search-range">
                        <label for="distance">Distance</label>
                        <input type="range" id="distance" min="0" max="100" step="10" name="distance" value="30"/><span id="rangeValue"> 30 km</span>
                    </p>
                </div>
                <div class="input-field search-poste">
                    <input  id="motsCles" type="text" name="motsCles" value="{{old('motsCles')}}">
                    <label for="motsCles">Metier</label>
                    @error('motsCles')
                    <p class="red-text">Le Métier est requis</p>
                    @enderror
                </div>
                <div class="input-flied search-partenaire">
                    <label>
                        <input type="checkbox" name="partenaires"/>
                        <span>Voir les offres des partenaires</span>
                    </label>
                </div>
                <button type="submit" class="waves-effect waves-light btn autoDisable" disabled>Rechercher</button>
                <p>nombres d'offres : @isset($datas){{ count($datas)}}@endisset</p>
            </form>
        </div>
        <div class="col s12 m8 l8 xl9">
            <div class="container">
                <div class="result">
                    @isset($status)
                        <div class="no-offre">
                            <p>Pas d'offres aujourd'hui</p>
                        </div>
                    @endisset
                    @if(isset($datas))
                        <ul class="collapsible">
                            @foreach($datas as $offre)
                                <li class="list-card">
                                    <div class="collapsible-header">
                                        <p><i class="material-icons">work_outline</i>{{ $offre->typeContrat }} - {{ $offre->intitule }}<p> <p>{{ $offre->lieuTravail->libelle }}</p>
                                    </div>
                                    <div class="collapsible-body row">
                                        <div class="desc col s12 m9">
                                            {{--TITRE--}}
                                            @isset($offre->entreprise->nom)<p class="body-ent">{{ $offre->entreprise->nom }}</p>@endisset
                                            <h4 class="body-title">{{ $offre->appellationlibelle }}</h4>
                                            <p class="body-lieu">{{ $offre->lieuTravail->libelle }}</p>
                                            <p class="body-date">Actualisée le : {{ date('d/m/Y', strtotime($offre->dateActualisation)) }} - offre n° {{ $offre->id }}</p>
                                            <p class="body-desc">{{ $offre->description }}</p>
                                            {{--Expérience--}}
                                            @isset($offre->experienceLibelle) <p class="body-exp">Expérience : {{ $offre->experienceLibelle }} <span>@if($offre->experienceExige == 'E'): Exigée @elseif($offre->experienceExige == 'S'): Souhaitée @endif</span></p> @endisset
                                            {{--FORMATION--}}
                                            @isset($offre->formations)
                                                <p class="body-subtitle">Formations :</p>
                                                @foreach($offre->formations as $formation)
                                                    @isset($formation->domaineLibelle)<p class="body-form">{{$formation->domaineLibelle}} : {{$formation->niveauLibelle}} : @isset($formation->exigence)<span> @if($formation->exigence == 'E') Exigée @elseif($formation->exigence == 'S') Souhaitée @endif</span> @endisset</p>@endisset
                                                    @isset($formation->commentaire)<p class="body-form">{{$formation->commentaire}}</p>@endisset
                                                @endforeach
                                            @endisset
                                            {{--COMPETENCES--}}
                                            @isset($offre->competences)
                                                <p class="body-subtitle">Compétences :</p>
                                                @foreach($offre->competences as $competence)
                                                    @isset($competence->libelle)<p class="body-form">{{$competence->libelle}} : @isset($competence->exigence)<span> @if($competence->exigence == 'E') Exigée @elseif($competence->exigence == 'S') Souhaitée @endif </span>@endisset</p>@endisset
                                                @endforeach
                                            @endisset
                                            {{--LANGUES--}}
                                            @isset($offre->langues)
                                                <p class="body-subtitle">Langues :</p>
                                                @foreach($offre->langues as $langue)
                                                    @isset($langue->libelle)<p class="body-form">{{$langue->libelle}} : <span>@if($langue->exigence == 'E') Exigée @elseif($langue->exigence == 'S') Souhaitée @endif</span></p>@endisset
                                                @endforeach
                                            @endisset
                                            {{--PERMIS--}}
                                            @isset($offre->permis)
                                                <p class="body-subtitle">Permis :</p>
                                                @foreach($offre->permis as $perm)
                                                    @isset($perm->libelle)<p class="body-form">{{$perm->libelle}}: <span>@if($perm->exigence == 'E') Exigée @elseif($perm->exigence == 'S') Souhaitée @endif</span></p>@endisset
                                                @endforeach
                                            @endisset
                                            @isset($offre->qualitesProfessionnelles)
                                                <p class="body-subtitle">Qualités professionnelles :</p>
                                                @foreach($offre->qualitesProfessionnelles as $quality)
                                                    @isset($quality->libelle)<p class="body-form quality"><span>{{$quality->libelle}} : </span></p>@endisset
                                                    @isset($quality->libelle)<p class="body-form">{{$quality->description}}</p>@endisset
                                                @endforeach
                                            @endisset
                                            <hr>
                                            @isset($offre->entreprise)
                                                <p class="body-subtitle">Entreprise :</p>
                                                @isset($offre->entreprise->nom)<p class="body-form">{{ $offre->entreprise->nom }}</p>@endisset
                                                @isset($offre->entreprise->description)<p class="body-form">{{ $offre->entreprise->description }}</p>@endisset
                                                @isset($offre->entreprise->url)<p class="body-form"><a href="{{ $offre->entreprise->url }}">lien vers le site de l'entreprise</a></p>@endisset
                                            @endisset

                                            @isset($offre->contact)
                                                <p class="body-subtitle">Contact :</p>
                                                @isset($offre->contact->nom) <p class="contact-line">Nom : {{ $offre->contact->nom }} </p>@endisset
                                                @isset($offre->contact->coordonnees1) <p class="contact-line">Coordonnée :{{ $offre->contact->coordonnees1 }} </p>@endisset
                                                @isset($offre->contact->coordonnees2) <p class="contact-line">Coordonnée : {{ $offre->contact->coordonnees2 }} </p>@endisset
                                                @isset($offre->contact->coordonnees3) <p class="contact-line">Coordonnée : {{ $offre->contact->coordonnees3 }} </p>@endisset
                                                @isset($offre->contact->telephone) <p class="contact-line">Téléphone : {{ $offre->contact->telephone }} </p>@endisset
                                                @isset($offre->contact->courriel) <p class="contact-line">Mail : {{ $offre->contact->courriel }} </p>@endisset
                                                @isset($offre->contact->commentaire) <p class="contact-line">Commentaire : {{ $offre->contact->commentaire }} </p>@endisset
                                                @isset($offre->contact->urlRecruteur) <a target="_blank" href="{{ $offre->contact->urlRecruteur }}" class="contact-line"> Lien vers le recruteur </a>@endisset
                                                @isset($offre->contact->urlPostulation) <a target="_blank" href="{{ $offre->contact->urlPostulation }}" class="contact-line"> Postuler ici </a>@endisset
                                            @endisset
                                            @isset($offre->agence)
                                                <p class="body-subtitle">Agence :</p>
                                                @isset($offre->agence->telephone) <p class="contact-line">Téléphone : {{ $offre->agence->telephone }} </p>@endisset
                                                @isset($offre->agence->courriel) <p class="contact-line">Mail : {{ $offre->agence->courriel }} </p>@endisset
                                            @endisset
                                            @isset($offre->origineOffre)
                                                <p class="body-subtitle">Origine de l'offre:</p>
                                                @isset($offre->origineOffre->origine) <p class="contact-line">Origine : {{ $offre->origineOffre->origine }} </p>@endisset
                                                @isset($offre->origineOffre->urlOrigine) <a href="{{ $offre->origineOffre->urlOrigine }}" target="_blank" class="contact-line">Lien vers l'offre</a>@endisset
                                                @isset($offre->origineOffre->partenaires)
                                                    <p class="body-subtitle">partenaires:</p>
                                                    @foreach($offre->origineOffre->partenaires as $partenaire)
                                                            @isset($partenaire->nom) <p class="contact-line">Nom partenaire : {{ $partenaire->nom }} </p>@endisset
                                                            @isset($partenaire->url) <a href="{{ $partenaire->url }}" target="_blank" class="contact-line last">Lien du partenaire </a>@endisset
                                                    @endforeach
                                                @endisset
                                            @endisset
                                            <div class="btn-offre">
                                                @if(isset($offre->entreprise->nom))
                                                    <a href="{{route('addFromPE', ['ent' => $offre->entreprise->nom , 'city' => $offre->lieuTravail->libelle, 'link' => $offre->id])}}" class="waves-effect waves-light btn">Ajouter</a>
                                                @else
                                                    <a href="{{route('addFromPE', ['ent' => 'null' , 'city' => $offre->lieuTravail->libelle, 'link' => $offre->id])}}" class="waves-effect waves-light btn">Ajouter</a>
                                                @endif
                                            <a class="waves-effect waves-light btn" target="_blank" href="https://candidat.pole-emploi.fr/offres/recherche/detail/{{$offre->id}}" >Lien vers Pôle emploi</a>
                                            </div>
                                        </div>
                                        <div class="col s12 m3 row">
                                            <p class="cote-line">CODE ROME : {{ $offre->romeCode }}</p>
                                            @isset($offre->alternance) @if($offre->alternance)<p class="cote-up">Offre en Alternance</p>@endif @endisset
                                            @isset($offre->accessibleTH) @if($offre->accessibleTH)<p class="cote-up">Accessible TH</p>@endif @endisset
                                            <hr>
                                            @isset($offre->secteurActiviteLibelle)<p class="cote-line"><span class="bold">Secteur d'activité :</span> {{ $offre->secteurActiviteLibelle }}</p>@endisset
                                            @isset($offre->typeContrat)<p class="cote-line"><span class="bold">Type de Contrat :</span> <span class="color">{{ $offre->typeContrat }}</span></p>@endisset
                                            @isset($offre->dureeTravailLibelleConverti)<p class="cote-line"><span class="bold">Durée de travail :</span> {{ $offre->dureeTravailLibelleConverti }}</p>@endisset
                                            @isset($offre->dureeTravailLibelle)<p class="cote-line"><span class="bold">Horaire :</span>  {{ $offre->dureeTravailLibelle }}</p>@endisset
                                            @isset($offre->salaire->libelle)<p class="cote-line"><span class="bold">Salaire :</span> {{ $offre->salaire->libelle }}</p>@endisset
                                            @isset($offre->nombrePostes)<p class="cote-line"><span class="bold">Nombre de Poste :</span> {{ $offre->nombrePostes }}</p>@endisset
                                            @isset($offre->deplacementLibelle)<p class="cote-line"><span class="bold">Déplacements :</span> {{ $offre->deplacementLibelle }}</p>@endisset
                                            @isset($offre->complementExercice)<p class="cote-line"><span class="bold">Compléments :</span> {{ $offre->complementExercice }}</p>@endisset
                                            @isset($offre->conditionExercice)<p class="cote-line"><span class="bold">Conditions :</span> {{ $offre->conditionExercice }}</p>@endisset
                                         </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>


    </script>
@endsection

