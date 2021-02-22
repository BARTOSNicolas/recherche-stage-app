<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/app.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
        table, tbody, tfoot, thead, tr, th, td{
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: middle;
        }
        table{
            border: 1px solid #607D8B;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }
        th{
            border: none;
            background-color: #607D8B;
            color: #FFFFFF;
            font-size: 12px;
            font-family: 'Lato', sans-serif;
            padding: 6px 0;
            font-weight: bold;
        }
        tr{
            border-bottom: 1px solid #CFD8DC;
        }
        td{
            border-bottom: 1px solid #607D8B;
            padding: 6px 2px;
            font-size: 12px;
            font-family: 'Lato', sans-serif;
        }
        tr:nth-child(even){
            background-color: #CFD8DC;
        }
    </style>

    <title>Gère tes candidatures pour trouver un emploi ou un stage</title>
    <meta name= "description" content= "Toutes vos candidature en PDF." />
</head>
<body>
<div class="container">
    <div class="tableau">
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


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
