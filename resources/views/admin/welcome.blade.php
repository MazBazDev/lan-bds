@extends('layouts.app')

@section('title', "Accueil")


@section('content')
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Equipes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $teams }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Joueurs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h4><i class="bi bi-twitch"></i> LIVE</h4>
                <div id="twitch-embed" style="border-radius: 15px;"></div>

                <div class="text-center">
                    <a href="{{ setting("stream.link") }}" class="btn twitch shadow">
                        <div class="spinner-grow text-danger" role="status"></div>
                        <span>Rejoindre le live !</span>
                    </a>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
<script src="https://player.twitch.tv/js/embed/v1.js"></script>
@endpush

@push('footer-scripts')
    <script type="text/javascript">
    new Twitch.Player("twitch-embed", {
        channel: "{{ setting('stream.channel') }}"
    });
</script>
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
@endpush