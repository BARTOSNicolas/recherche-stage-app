@extends('layout')

@section('content')
    <div class="container">
        <div class="tableau">
            @if($pdf == false)
                <div>
                    <a class="waves-effect waves-light btn right btn-export" href="{{ route('createPDF') }}">Exporter en PDF</a>
                </div>
            @endif
            <table>
                <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Ville</th>
                    <th>Nom du contact</th>
                    <th>Téléphone</th>
                    <th>Mail</th>
                    <th>Date candidature</th>
                    <th>Relancée le</th>
                    <th>Date entretien</th>
                    <th>Status</th>
                </tr>
                </thead>

                <tbody>
                @foreach($entreprises as $tab)
                    <tr>
                        <td>{{$tab->entreprise->ent_name}}</td>
                        <td>{{$tab->entreprise->ent_city}}</td>
                        <td>{{$tab->entreprise->ent_contact_name}}</td>
                        <td>{{$tab->entreprise->ent_phone}}</td>
                        <td>{{$tab->entreprise->ent_mail}}</td>
                        <td>@isset($tab->first_date){{ date('d/m/Y', strtotime($tab->first_date)) }}@endisset</td>
                        <td>@isset($tab->relaunch){{ date('d/m/Y', strtotime($tab->relaunch)) }}@endisset</td>
                        <td>@isset($tab->interview_date){{ date('d/m/Y', strtotime($tab->interview_date)) }}@endisset</td>
                        <td>
                            @if($tab->status == 'afaire')
                                à faire
                            @elseif($tab->status == 'encours')
                                en cours
                            @elseif($tab->status == 'negatif')
                                négatif
                            @elseif($tab->status == 'positif')
                                positif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

