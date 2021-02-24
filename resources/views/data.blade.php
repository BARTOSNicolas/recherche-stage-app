@extends(isset(Illuminate\Support\Facades\Auth::user()->name) ? 'layout' : 'auth.layout')

@section('content')
    <div class="container data">
        <div class="data-text">
            <h2 class="title">Données personnelles</h2>

            <p>Les informations recueillies sur les formulaires sont enregistrées dans un fichier informatisé par BARTOS Nicolas pour la gestion et l'organisation du site.</p>

            <p>Les données collectées ne seront pas communiquées.</p>

            <p>Toutes vos données conservées sont supprimer à la suppression de votre compte.</p>

            <p>Vous pouvez accéder aux données vous concernant, les rectifier, demander leur effacement ou exercer votre droit à la limitation du traitement de vos données. Vous pouvez retirer à tout moment votre consentement au traitement de vos données.</p>

            <p>Consultez le site <a href="https://cnil.fr" target="_blank">cnil.fr</a> pour plus d’informations sur vos droits.</p>

            <p>Pour exercer ces droits ou pour toute question sur le traitement de vos données dans ce dispositif, vous pouvez contacter : <br>
            BARTOS Nicolas<br>
            5 chemin de la Mairie<br>
            38610 Gières<br>
            nicolas.bartos@le-campus-numerique.fr</p>

            <p class="last">Si vous estimez, après nous avoir contactés, que vos droits « Informatique et Libertés » ne sont pas respectés, vous pouvez adresser une réclamation à la CNIL.</p>
        </div>
        @empty(Illuminate\Support\Facades\Auth::user()->name)
            <a href="{{ route('welcome') }}" class="create-btn waves-effect waves-light btn">
                Retour
            </a>
        @endempty
    </div>

@endsection
