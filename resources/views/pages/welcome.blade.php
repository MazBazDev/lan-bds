@extends('layouts.guest')

@section('title', "Accueil")


@section('content')
<div class="row">
        <div class="col-md-8 mb-3">
            @if (setting("countdown.display"))
                <div class="card mb-3" id="countdown">
                    <div class="card-body d-flex justify-content-center">
                        <div class="text-center">
                            <h3>DEBUT DE LA YPARTY !</h3>
                            <div id="flipdown" class="flipdown"></div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset("assets/img/logobds.svg") }}" style="height: 130px" alt="">
                    </div>
                    <div class="border rounded p-3 my-3">
                        {!! setting("home.info") !!}
                    </div>
                </div>
            </div>
        </div>
    

    <div class="col-md-4 mb-3">
        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between">
                <a href="https://www.instagram.com/bdeynovlyon/" target="_blank" class="btn twitch"><i class="bi bi-instagram"></i> BDE</a>
                <a href="https://www.instagram.com/bdsynovlyon/" target="_blank" class="btn twitch"><i class="bi bi-instagram"></i> BDS</a>
                <a href="mailto:{{ setting("contact.mail") }}" class="btn twitch"><i class="bi bi-envelope"></i> MAIL</a>
            </div>
        </div>
        @if(setting("stream.status"))
            <div class="card mb-3">
                <div class="card-body">
                    <h4><i class="bi bi-twitch"></i> LIVE</h4>
                    <div id="twitch-embed" style="border-radius: 15px;"></div>
        
                    <div class="d-grid mt-2">
                        <a href="{{ setting("stream.link") }}" class="btn twitch shadow">
                            <div class="spinner-grow text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span>Rejoindre le live !</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>


@endsection

@push('scripts')
@if (setting("countdown.display"))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            var twoDaysFromNow = (new Date("{{ date('F d, Y H:i', strtotime(setting('countdown.end'))) }}").getTime()/1000);

            var flipdown = new FlipDown(twoDaysFromNow, {
                headings: ["Jours", "Heures", "Minutes", "Secondes"],
            }).start().ifEnded(() => {
                $( "#countdown" ).addClass( "d-none" );
            });
            
            var ver = document.getElementById('ver');
            ver.innerHTML = flipdown.version;
        });
    </script>
@endif
@endpush

@push('footer-scripts')
@if (setting("countdown.display"))
    <script src="{{ asset("assets/js/flipdown/main.js") }}"></script>
@endif

@if(setting("stream.status"))
    <script src="https://player.twitch.tv/js/embed/v1.js"></script>

    <script type="text/javascript">
    new Twitch.Player("twitch-embed", {
        channel: "{{ setting('stream.channel') }}"
    });
    </script>
@endif
@endpush

@push('styles')
    <style>
        #twitch-embed > iframe {
            border-radius: 15px;
            width: 100%;
        }  

        .twitch {
            background-color: #6441a5;
            color: white
        }
        .twitch > .spinner-grow {
            max-height: 20px;
            max-width: 20px;
            translate: 0 2px;
        }

        .spinner-grow {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            vertical-align: -0.125em;
            background-color: currentColor;
            border-radius: 50%;
            opacity: 0;
            -webkit-animation: .75s linear infinite spinner-grow;
            animation: .75s linear infinite spinner-grow;
        }
    </style>
    <link rel="stylesheet" href="{{ asset("assets/css/flipdown/main.css") }}">
@endpush

