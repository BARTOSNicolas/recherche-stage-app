@extends('homepage.layout')

@section('content')
    <div class="parallax-container">
        <div class="parallax"><img src="{{ asset('images/img.jpg') }}"></div>
        <h1 class="welcome-title">candidate<span>.wilddev.fr</span></h1>
    </div>
    <div class="section para-text z-depth-4">
        <div class="row container">
            <div class="col s12 m8 offset-m1">
                <h2 class="header">candidate<span> c'est quoi ?</span></h2>
                <p class="subheader">Candidate est une application de gestion de candidatures pour t'aider dans ta recherche de stage ou d'entreprise. Elle est totalement gratuite, simple d'utilisation et ne transmet aucune de tes données personnelles. Tu auras accès partout depuis une tablette ou ton téléphone mobile à toutes tes candidatures.</p>
                <p>Si tu en marre des tableaux Excel.</p>
                <p>Si tu as du mal à t'organiser dans ta recherche.</p>
                <p>Si tu es simplement curieux.</p>

                <a href="{{route('create_user')}}" class="waves-effect waves-light btn">inscrit toi gratuitement</a>
                <a href="{{route('homepage')}}" class="waves-effect waves-light btn">Je suis déjà inscrit</a>
            </div>
{{--            <div class="col s12 m4 offset-m2 ">--}}
{{--                <img class="responsive-img" src="{{ asset('images/candidate_desktop.jpg') }}" alt="...">--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="{{ asset('images/candidate_desktop.jpg') }}"></div>
    </div>
    <div class="section para-text z-depth-4">
        <div class="row container">
            <div class="col s12 m3 para-image">
                <img class="responsive-img materialboxed" src="{{ asset('images/candidate_search.jpg') }}" alt="sur candidate.wilddev.fr on peut rechercher des offres d'emplois">
            </div>
            <div class="col s12 m8 offset-m1">
                <h2 class="header"><span>Les</span> nouveautés.</h2>
                <p class="subheader">Candidate est une application en constante évolution. Au fil des versions, de nombreuses améliorations ont été ou seront ajoutées. La finalité de candidate est de pouvoir tout gérer depuis son interface. </p>
                <p>Tu peux déjà rechercher des offres Pôle Emploi directement sur l'application.</p>
                <p>Tu peux déjà filtrer tes candidatures.</p>
            </div>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="{{ asset('images/candidate_tab.jpg') }}"></div>
    </div>
    <div class="section para-text z-depth-4">
        <div class="row container">
            <div class="col s12 m8 offset-m1">
                <h2 class="header">Un peu <span>d'histoire.</span></h2>
                <p class="subheader">candidate.wilddev.fr est venu d'un besoin personnel pendant ma formation au Campus Numérique In the Alps afin de devenir un développeur Web aguerri tout en étant débutant. Pour valider cette formation il faut trouver un stage (d'ailleurs je recherche toujours un stage toujours du 17 Mai au 27 Juillet 2021) et les tableaux Excel, Google sheet ou Number ce n'est pas ma tasse de thé. Puis il faut l'avouer pour devenir un bon développeur il faut développer. Avec les connaissances acquises pendant la formation de développeur WEB et celle de Designer Web j'ai donc commencé ce nouveau projet.</p>
            </div>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="{{ asset('images/img.jpg') }}"></div>
    </div>
    <footer class="welcome-footer z-depth-4">
        <p>candidate.wilddev.fr v2.0 - 2021 - <a target="_blank" href="https://www.bartosnicolas.fr">Bartos Nicolas</a> - </p>
        <ul class="submenu">
            <li><a class="tooltipped" href="{{ route('info') }}" data-position="top" data-tooltip="Mentions légales"><span class="material-icons">info</span></a> </li>
            <li><a class="tooltipped" href="{{ route('data') }}" data-position="top" data-tooltip="Protection des données"><span class="material-icons">text_snippet</span></a></li>
        </ul>

    </footer>

@endsection
