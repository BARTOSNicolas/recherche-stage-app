@extends('layout')

@section('content')
    <div class="row">
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
                <p>nombres d'offres : {{ count($datas)}}</p>


            </form>
        </div>
        <div class="col s12 m8 l8 xl9">
            <div class="container">
                <div class="result">
                    @if(isset($datas))
                        <ul class="collapsible">
                            @foreach($datas as $offre)
                                <li class="list-card">
                                    <div class="collapsible-header"><i
                                            class="material-icons">work_outline</i>{{ $offre->typeContrat }}
                                        - {{ $offre->intitule }} <span
                                            class="right">VILLE : {{ $offre->lieuTravail->libelle }}</span></div>
                                    <div class="collapsible-body row">

                                        <div class="desc col s12 m10">
                                            <p class="body-ent">@isset($offre->entreprise->nom){{ $offre->entreprise->nom }}@endisset</p>
                                            <h4 class="body-title">{{ $offre->appellationlibelle }}</h4>
                                            <p>Créée le : {{ $offre->dateCreation }} - Actualisée le
                                                : {{ $offre->dateActualisation }}</p>
                                            <p>{{ $offre->description }}</p>
                                            <hr>
                                            <p>@isset($offre->contact->nom){{ $offre->contact->nom }}@endisset</p>
                                            <p>@isset($offre->contact->courriel){{ $offre->contact->courriel }}@endisset</p>
                                            <p>@isset($offre->contact->urlPostulation){{ $offre->contact->urlPostulation }}@endisset</p>

                                            <p>@isset($offre->entreprise->nom){{ $offre->entreprise->nom }}@endisset</p>
                                            <p>@isset($offre->entreprise->description){{ $offre->entreprise->description }}@endisset</p>
                                            <p><a href="@isset($offre->entreprise->url){{ $offre->entreprise->url }}@endisset">@isset($offre->entreprise->url){{ $offre->entreprise->url }}@endisset</a></p>

                                            <p>@isset($offre->origineOffre->partenaires[0]->nom){{ $offre->origineOffre->partenaires[0]->nom }}@endisset</p>
                                            <p><a href="@isset($offre->origineOffre->partenaires[0]->url){{ $offre->origineOffre->partenaires[0]->url }}@endisset" target="_blank">@isset($offre->origineOffre->partenaires[0]->url){{ $offre->origineOffre->partenaires[0]->url }}@endisset</a></p>


                                            <span class="tooltipped" data-position="right" data-tooltip="Bientôt disponible"><a class="waves-effect waves-light btn" disabled >Ajouter</a></span>
                                            <a class="waves-effect waves-light btn" target="_blank" href="https://candidat.pole-emploi.fr/offres/recherche/detail/{{$offre->id}}" >Lien vers l'offre</a>
                                        </div>
                                        <div class="col s12 m2 row">
                                            <p>ROME : {{ $offre->romeCode }}</p>
                                            <p>Offre n° {{ $offre->id }}</p>
                                            <p>Contrat : {{ $offre->typeContrat }}</p>
                                            <p>Salaire
                                                : @isset($offre->salaire->libelle){{ $offre->salaire->libelle }}@endisset</p>
                                            <p>Expérience : {{ $offre->experienceLibelle }}</p>
                                            <p>Durée de travail : {{ $offre->dureeTravailLibelleConverti }}</p>

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

