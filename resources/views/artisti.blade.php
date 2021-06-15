@extends('/layouts/authors_artists_album')

<!-- head -->
@section('title', '| Artisti')


@section('script')
    <script src="{{asset('/js/artisti.js')}}" defer></script>
@endsection

@section('stile')
    <link rel="stylesheet" href='{{ asset('css/artisti.css') }}'>
@endsection

<!-- fine head -->

@section('paragrafo')
    <p>
        In questa sezione puoi  vedere gli artisti   selezionati  da noi per cantare i nostri brani e molto altro ancora.
    </p>
@endsection

@section('content')

    <section id="contents">



        <div id="container1" >
            <h1>Artisti</h1>
            <div class="X1234">
            </div>
        </div>



    </section>

@endsection


@section('iframes')
    <section id='top_artist'>
        <h1>Reccomandations</h1>
        <div>
            <iframe src="" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
            <iframe src="" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
            <iframe src="" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
    </section>
@endsection










