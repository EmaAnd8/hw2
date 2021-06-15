@extends('/layouts/authors_artists_album')

<!-- head -->
@section('title', '| Autori')


@section('script')
    <script src="{{asset('/js/autori.js')}}" defer></script>
@endsection

@section('stile')
    <link rel="stylesheet" href='{{ asset('css/authors.css') }}'>
@endsection

<!-- fine head -->


@section('paragrafo')
    <p>
        In questa sezione puoi  vedere gli autori da noi  selezionati  da noi per scrivere i migliori brani e le informazioni ad essi inerenti e molto altro ancora.
    </p>
@endsection

@section('content')

    <section id="contents">


        <div>
            <br>
            <h1>Autori</h1>
            <div class="X1234">

            </div>
        </div>
    </section>
@endsection


@section('iframes')
    <section id='top_autori'>
        <h1>top autori</h1>
        <div>
            <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX3EvTrESVmN6" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
            <iframe src="https://open.spotify.com/embed/show/6qS10tDyNNlkgugnS1xfMc" width="100%" height="232" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
            <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1EFDY6AC2Mq9pO" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
    </section>
@endsection
