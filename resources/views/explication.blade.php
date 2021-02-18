@extends(isset(Illuminate\Support\Facades\Auth::user()->name) ? 'layout' : 'auth.layout')

@section('content')
    <div class="container info">
        <div class="info-text">
            <h2 class="title">Candidate c'est quoi ?</h2>
            <p class="subtitle">C'est une application pour t'aider à gérer tes candidatures quand tu recherches un emploi ou un stage. Elle te permet de garder une trace de toutes les candidatures que va envoyer aux entreprises et de suivre en toute simplicité tes contacts, tes relances, tes entretiens, etc.</p>
            <h3 class="subtitle">Un peu d'histoire </h3>
            <p>candidate.wilddev.fr est venu d'un besoin personnel pendant ma formation au Campus Numérique In the Alps afin de devenir un développeur Web aguerri tout en étant débutant. Pour valider cette formation il faut trouver un stage <b>(d'ailleurs je recherche toujours un stage toujours du 17 Mai au 27 Juillet 2021)</b> et les tableaux Excel, Google sheet ou Number ce n'est pas ma tasse de thé. Puis il faut l'avouer pour devenir un bon développeur il faut développer. Avec les connaissances acquises pendant la formation de développeur WEB et celle de Designer Web j'ai donc commencer ce nouveau projet.</p>
            <h3 class="subtitle">Tester Candidate </h3>
            <p class="last">Candidate.wilddev.fr est gratuite et elle ne transmets pas de données, alors pourquoi ne pas créer un compte pour la tester. De nombreuses fonctionnalités vont surement arriver dans les prochaines versions afin de pouvoir tout gérer depuis l'application.</p>
            <p class="last ital">candidate.wilddev.fr v2.0 - 2021 - <a href="https://www.bartosnicolas.fr" target="_blank">www.bartosnicolas.fr</a></p>


        @empty(Illuminate\Support\Facades\Auth::user()->name)
            <a href="{{ route('login') }}" class="create-btn waves-effect waves-light btn">
                Retour
            </a>
        @endempty
    </div>

@endsection
