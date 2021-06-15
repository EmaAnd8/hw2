@extends('/layouts/authors_artists_album')

<!-- head -->
@section('title', '| Album')


@section('script')
    <script src="{{asset('/js/album.js')}}" defer></script>
@endsection

@section('stile')
    <link rel="stylesheet" href='{{ asset('css/album.css') }}'>
@endsection

<!-- fine head -->
@section('paragrafo')
 <p>
     In questa sezione puoi  vedere gli album da noi  prodotti  negli ultimi anni e le informazioni ad essi inerenti e molto altro ancora.
 </p>
@endsection

@section('content')
    <section id="contents">

        <div>
            <br>
            <h1>Album</h1>
            <div class="X1234">

            </div>
        </div>
    </section>
@endsection


@section('iframes')
    <section id='top_album'>
        <h1>Nuove Uscite</h1>
        <div>
            <iframe src="" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
            <iframe src="" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
            <iframe src="" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
    </section>
@endsection
