@extends('layouts.guest')

@section('title', "Réglements")


@section('content')
<h3 class="text-white">Réglements</h3>
<div class="row">
    <div class="col-md-3 d-grid gap-2 mb-3">
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseGeneral" role="button" aria-expanded="false" aria-controls="collapseGeneral">
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-house-door"></i> Général   
                </div>
            </div>
        </a>
        <hr>
        @if(false)
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseLOL" role="button" aria-expanded="false" aria-controls="collapseLOL">
            <div class="card">
                <div class="card-body d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 24px" src="{{ asset("assets/img/LoL_icon.svg") }}" alt="">
                    </div>
                    <span>League of Legends</span>  
                </div>
            </div>
        </a>
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseValo" role="button" aria-expanded="false" aria-controls="collapseValo">
            <div class="card">
                <div class="card-body d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 24px" src="{{ asset("assets/img/Valorant_icon.svg") }}" alt="">
                    </div>
                    <span>Valorant</span>   
                </div>
            </div>
        </a>
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseRL" role="button" aria-expanded="false" aria-controls="collapseRL">
            <div class="card">
                <div class="card-body d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 26px" src="{{ asset("assets/img/RL_icon.png") }}" alt="">
                    </div>
                    <span>Rocket League</span>   
                </div>
            </div>
        </a>
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseSmash" role="button" aria-expanded="false" aria-controls="collapseSmash">
            <div class="card">
                <div class="card-body d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 24px" src="{{ asset("assets/img/Smash_icon.svg") }}" alt="">
                    </div>
                    <span>Super Smash Bros</span>
                </div>
            </div>
        </a>
        <hr>
        @endif
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseBaby" role="button" aria-expanded="false" aria-controls="collapseBaby">
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-controller"></i> Tournoi de babyfoot
                </div>
            </div>
        </a>
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseLG" role="button" aria-expanded="false" aria-controls="collapseLG">
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-moon-stars"></i> Loup Garou
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-9" id="collapse">
        <div class="collapse show" id="collapseGeneral">
            <h3 class="text-white">Général</h3>

            <div class="card card-body" style="max-height: 600px; overflow: auto;">
              {!! setting("rules.general") !!}
            </div>
        </div>

        <div class="collapse" id="collapseLOL">
            <h3 class="text-white">League Of Legends</h3>

            <div class="card card-body" style="max-height: 600px; overflow: auto;">
                {!! setting("rules.lol") !!}
            </div>
        </div>

        <div class="collapse" id="collapseValo">
            <h3 class="text-white">Valorant</h3>

            <div class="card card-body" style="max-height: 600px; overflow: auto;">
                {!! setting("rules.valo") !!}
            </div>
        </div>

        <div class="collapse" id="collapseRL">
            <h3 class="text-white">Rocket League</h3>

            <div class="card card-body" style="max-height: 600px; overflow: auto;">
              {!! setting("rules.lol") !!}
            </div>
        </div>

        <div class="collapse" id="collapseSmash">
            <h3 class="text-white">Super Smash Bross</h3>

            <div class="card card-body" style="max-height: 600px; overflow: auto;">
                {!! setting("rules.smash") !!}
            </div>
        </div>

        <div class="collapse" id="collapseBaby">
            <h3 class="text-white">Babyfoot</h3>

            <div class="card card-body" style="max-height: 600px; overflow: auto;">
                {!! setting("rules.baby") !!}
            </div>
        </div>

        <div class="collapse" id="collapseLG">
            <h3 class="text-white">Loup Garou</h3>

            <div class="card card-body" style="max-height: 600px; overflow: auto;">
                {!! setting("rules.lg") !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
@push('footer-scripts')
    <script>
        jQuery('a').click( function(e) {
            jQuery('.collapse').collapse('hide');
        });
    </script>
@endpush
@push('styles')
    
@endpush