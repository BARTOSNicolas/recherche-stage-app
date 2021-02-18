 @extends(isset(Illuminate\Support\Facades\Auth::user()->name) ? 'layout' : 'auth.layout')


@section('content')
    <div class="container idea">
        <div class="idea-text">
            <h2 class="title">Bientôt</h2>
            <h3 class="subtitle last">Vous pourrez partager avec nous vos idées d'amélioration.</h3>
        </div>
        @empty(Illuminate\Support\Facades\Auth::user()->name)
            <a href="{{ route('login') }}" class="create-btn waves-effect waves-light btn">
                Retour
            </a>
        @endempty
    </div>
@endsection
