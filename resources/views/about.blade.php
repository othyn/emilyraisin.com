@extends ('layouts.master')

@section ('main-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">About Me</h1>
            <h5 class="text-muted">Maintaining the word count, while making the words count.</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-10 offset-1 text-left mt-5">
            <p>I’m creative, but I also understand briefs and deadlines.  If that sounds like the type of person you would like to work with, contact me.</p>
            <p>As a copywriter, I specialise in innovative, voice-driven marketing. What does this mean? It means I spend time understanding the culture behind your brand, product or service, before crafting engaging copy that complies with your tone of voice.  To make my words count, I need to know what you value most.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-3">
            @component('swal.contact')
                @slot('buttonTitle')
                    Work with me
                @endslot
                @slot('buttonClass')
                    secondary animated fadeIn delay-2s
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
