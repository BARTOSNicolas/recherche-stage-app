@extends('layout')

@section('content')

    <div class="container">
        <form class="recherche" action="#" method="post">
            @csrf
            <div class="input-field search-name">
                <input id="search" type="search" required name="motsclefs">
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
            <div class="input-field">
                <select name="dept" id="dept">
                    <option value="" disabled selected></option>
                    @foreach($departs as $depart)
                        <option value="{{$depart->code}}">{{$depart->code}} - {{$depart->libelle}}</option>
                    @endforeach
                </select>
                <label for="dept">Choix du département</label>
            </div>
{{--            <div class="input-field search-city">--}}
{{--                <input id="ville" type="search" required placeholder="Ville">--}}
{{--                <label class="label-icon" for="ville"><i class="material-icons">search</i></label>--}}
{{--                <i class="material-icons">close</i>--}}
{{--            </div>--}}
{{--            <p class="range-field search-range">--}}
{{--                <label>Distance</label>--}}
{{--                <input type="range" id="test5" min="0" max="100" step="10"/>--}}
{{--            </p>--}}
            <button type="submit" class="waves-effect waves-light btn">test</button>
        </form>
        <div class="result">
            @if(isset($datas))
                <ul class="collapsible">
                @foreach($datas as $offre)
                        <li>
                            <div class="collapsible-header"><i class="material-icons">filter_drama</i>{{ $offre->typeContrat }} - {{ $offre->intitule }}  <span class="right">VILLE : {{ $offre->lieuTravail->libelle }}</span></div>
                            <div class="collapsible-body row">

                                <div class="desc col s12 m10">
                                    <h4>{{ $offre->appellationlibelle }} - ROME : {{ $offre->romeCode }}</h4>
                                    <p>Créée le : {{ $offre->dateCreation }} - Actualisée le : {{ $offre->dateActualisation }}</p>
                                    <p>{{ $offre->description }}</p>
                                </div>
                                <div class="col s12 m2 row">
                                    <p>ID : {{ $offre->id }}</p>
                                    <p>Contrat : {{ $offre->typeContrat }}</p>
                                    <p>Salaire : @isset($offre->salaire->libelle){{ $offre->salaire->libelle }}@endisset</p>
                                    <p>Expérience : {{ $offre->experienceLibelle }}</p>
                                    <p>Durée de travail : {{ $offre->dureeTravailLibelleConverti }}</p>
                                    <a class="waves-effect waves-light btn">Ajouter</a>
                                </div>
                            </div>
                        </li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>


@endsection
