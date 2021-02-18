@extends(isset(Illuminate\Support\Facades\Auth::user()->name) ? 'layout' : 'auth.layout')

@section('content')
    <div class="container info">
        <div class="info-text">
            <h2 class="title">Mentions légales</h2>
            <p>Merci de lire avec attention les différentes modalités d’utilisation du présent site avant d’y parcourir ses pages. En vous connectant sur ce site, vous acceptez, sans réserves, les présentes modalités.</p>
            <p>Aussi, conformément à l’article n°6 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l’économie numérique, les responsables du présent site internet candidate.wilddev.fr sont :</p>

            <h3 class="subtitle">Éditeur du Site :</h3>
            <p>Responsable éditorial : BARTOS Nicolas</p>
            <p>5 Chemin de la mairie 38610 Gières</p>
            <p>téléphone : 06 277 663 04</p>
            <p>Email : nicolas.bartos@le-campus-numerique.fr</p>
            <p><a href="https://candidate.wilddev.fr">site web : candidate.wilddev.fr</a></p>

            <h3 class="subtitle">Hébergement :</h3>
            <p>Hébergeur : OVH</p>
            <p>Adresse : 2 rue Kellermann - 59100 Roubaix - France</p>
            <p><a target="_blank" href="https://www.ovh.com">site web : www.ovh.com</a></p>

            <h3 class="subtitle">Développement :</h3>
            <p>Développeur : BARTOS Nicolas</p>
            <p>Email : nicolas.bartos@le-campus-numerique.fr</p>
            <p><a target="_blank" href="https://www.bartosnicolas.fr">site web : www.bartosnicolas.fr</a></p>

            <h3 class="subtitle">Conditions d’utilisation :</h3>
            <p>Ce site (candidate.wilddev.fr) est proposé en différents langages web (HTML, HTML5, Javascript, CSS, etc…) pour un meilleur confort d’utilisation et un graphisme plus agréable.</p>
            <p>Nous vous recommandons de recourir à des navigateurs modernes comme Internet explorer, Safari, Firefox, Google Chrome, etc…</p>
            <p>candidate.wilddev.fr met en œuvre tous les moyens dont elle dispose, pour assurer une information fiable et une mise à jour fiable de ses sites internet.</p>
            <p>Toutefois, des erreurs ou omissions peuvent survenir. L’internaute devra donc s’assurer de l’exactitude des informations auprès de candidate.wilddev.fr , et signaler toutes modifications du site qu’il jugerait utile. candidate.wilddev.fr n’est en aucun cas responsable de l’utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.</p>

            <h3 class="subtitle">Cookies :</h3>
            <p class="last">Le site candidate.wilddev.fr n'utilise que des cookies de fonctionnement qui ne nécéssitent pas le consentement de l'utilisateur. Un cookie est une information déposée sur votre disque dur par le serveur du site que vous visitez. Il contient plusieurs données qui sont stockées sur votre ordinateur dans un simple fichier texte auquel un serveur accède pour lire et enregistrer des informations .</p>
        </div>
        @empty(Illuminate\Support\Facades\Auth::user()->name)
            <a href="{{ route('login') }}" class="create-btn waves-effect waves-light btn">
                Retour
            </a>
        @endempty
    </div>

@endsection
