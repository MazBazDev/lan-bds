@extends('layouts.guest')

@section('title', "Equipes")


@section('content')
<h3 class="text-white">Equipes</h3>
<div class="row">
    <div class="col-md-3 mb-3">
        @if(false)
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseLOL" role="button" aria-expanded="false" aria-controls="collapseLOL">
            <div class="card mb-2">
                <div class="card-body d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 24px" src="{{ asset("assets/img/LoL_icon.svg") }}" alt="">
                    </div>
                    <span>League of Legends</span>  
                </div>
            </div>
        </a>
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseValo" role="button" aria-expanded="false" aria-controls="collapseValo">
            <div class="card mb-2">
                <div class="card-body d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 24px" src="{{ asset("assets/img/Valorant_icon.svg") }}" alt="">
                    </div>
                    <span>Valorant</span>   
                </div>
            </div>
        </a>
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseRL" role="button" aria-expanded="false" aria-controls="collapseRL">
            <div class="card mb-2">
                <div class="card-body d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 26px" src="{{ asset("assets/img/RL_icon.png") }}" alt="">
                    </div>
                    <span>Rocket League</span>   
                </div>
            </div>
        </a>
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseSmash" role="button" aria-expanded="false" aria-controls="collapseSmash">
            <div class="card mb-2">
                <div class="card-body d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 24px" src="{{ asset("assets/img/Smash_icon.svg") }}" alt="">
                    </div>
                    <span>Super Smash Bros</span>
                </div>
            </div>
        </a>
        @endif
        <a data-bs-toggle="collapse" style="color: black; text-decoration: none" href="#collapseBaby" role="button" aria-expanded="false" aria-controls="collapseBaby">
            <div class="card mb-2">
                <div class="card-body">
                    <i class="bi bi-controller"></i> Tournoi de babyfoot
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-9" id="collapse">
        @if(false)
        
        <div class="collapse show" id="collapseLOL">
            <h3 class="text-white">League Of Legends</h3>

            <div class="row">
                <div class="col-md-3 mb-3">
                    @forelse ($lol as $item)
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">{{ $item->name }}</h3>
                                <div id="carousel-{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                      @for($i = 0; $i < count($item->mates); $i++)
                                        <button type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? "active" : "" }}" aria-current="true"></button>
                                      @endfor
                                    </div>
                                    <div class="carousel-inner">
                                        <?php $i = 0 ?>
                                        @foreach ($item->players as $mate)
                                            <div class="carousel-item {{ $i == 0 ? "active" : "" }}">
                                                <img src="{{ $mate->avatar() ?? "https://via.placeholder.com/500" }}" class="d-block w-100">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <span class="badge rounded bg-dark"><h4>{{ $mate->pseudo }}</h4></span>
                                                </div>
                                            </div>
                                            <?php $i++ ?>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="d-grid">
                                    <a href="{{ route("teams.show", $item) }}" class="btn btn-primary">Voir l'équipe</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">Aucune équipe pour le moment</div>
                        </div>
                    @endforelse
                    
                </div>
            </div>
        </div>

        <div class="collapse" id="collapseValo">
            <h3 class="text-white">Valorant</h3>

            <div class="row">
                <div class="col-md-3 mb-3">
                    @forelse ($valo as $item)
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">{{ $item->name }}</h3>
                                <div id="carousel-{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                      @for($i = 0; $i < count($item->mates); $i++)
                                        <button type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? "active" : "" }}" aria-current="true"></button>
                                      @endfor
                                    </div>
                                    <div class="carousel-inner">
                                        <?php $i = 0 ?>
                                        @foreach ($item->mates() as $mate)
                                            <div class="carousel-item {{ $i == 0 ? "active" : "" }}">
                                                <img src="{{ $mate->avatar() ?? "https://via.placeholder.com/500" }}" class="d-block w-100">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <span class="badge rounded bg-dark"><h4>{{ $mate->pseudo }}</h4></span>
                                                </div>
                                            </div>
                                            <?php $i++ ?>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="d-grid">
                                    <a href="{{ route("teams.show", $item) }}" class="btn btn-primary">Voir l'équipe</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">Aucune équipe pour le moment</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="collapse" id="collapseRL">
            <h3 class="text-white">Rocket League</h3>

            <div class="row">
                <div class="col-md-3 mb-3">
                    @forelse($rl as $item)
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">{{ $item->name }}</h3>
                                <div id="carousel-{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                      @for($i = 0; $i < count($item->mates); $i++)
                                        <button type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? "active" : "" }}" aria-current="true"></button>
                                      @endfor
                                    </div>
                                    <div class="carousel-inner">
                                        <?php $i = 0 ?>
                                        @foreach ($item->mates() as $mate)
                                            <div class="carousel-item {{ $i == 0 ? "active" : "" }}">
                                                <img src="{{ $mate->avatar() ?? "https://via.placeholder.com/500" }}" class="d-block w-100">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <span class="badge rounded bg-dark"><h4 style="margin-bottom: 0;">{{ $mate->pseudo }}</h4></span>
                                                </div>
                                            </div>
                                            <?php $i++ ?>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="d-grid">
                                    <a href="{{ route("teams.show", $item) }}" class="btn btn-primary">Voir l'équipe</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">Aucune équipe pour le moment</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="collapse" id="collapseSmash">
            <h3 class="text-white">Super Smash Bross</h3>

            <div class="row">
                <div class="col-md-3 mb-3">
                    @forelse ($smash as $item)
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">{{ $item->name }}</h3>
                                <div id="carousel-{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                      @for($i = 0; $i < count($item->mates); $i++)
                                        <button type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? "active" : "" }}" aria-current="true"></button>
                                      @endfor
                                    </div>
                                    <div class="carousel-inner">
                                        <?php $i = 0 ?>
                                        @foreach ($item->mates() as $mate)
                                            <div class="carousel-item {{ $i == 0 ? "active" : "" }}">
                                                <img src="{{ $mate->avatar() ?? "https://via.placeholder.com/500" }}" class="d-block w-100">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <span class="badge rounded bg-dark"><h4>{{ $mate->pseudo }}</h4></span>
                                                </div>
                                            </div>
                                            <?php $i++ ?>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="d-grid">
                                    <a href="{{ route("teams.show", $item) }}" class="btn btn-primary">Voir l'équipe</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">Aucune équipe pour le moment</div>
                        </div>
                    @endforelse
                    
                </div>
            </div>
        </div>
        @endif
        <div class="collapse show" id="collapseBaby">
            <h3 class="text-white">Babyfoot</h3>

            <div class="row">
                <div class="col-md-3 mb-3">
                    @forelse ($baby as $item)
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">{{ $item->name }}</h3>
                                <div id="carousel-{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                      @for($i = 0; $i < count($item->mates); $i++)
                                        <button type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? "active" : "" }}" aria-current="true"></button>
                                      @endfor
                                    </div>
                                    <div class="carousel-inner">
                                        <?php $i = 0 ?>
                                        @foreach ($item->mates() as $mate)
                                            <div class="carousel-item {{ $i == 0 ? "active" : "" }}">
                                                <img src="{{ $mate->avatar() ?? "https://via.placeholder.com/500" }}" class="d-block w-100">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <span class="badge rounded bg-dark"><h4>{{ $mate->pseudo }}</h4></span>
                                                </div>
                                            </div>
                                            <?php $i++ ?>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $item->id }}" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="d-grid">
                                    <a href="{{ route("teams.show", $item) }}" class="btn btn-primary">Voir l'équipe</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">Aucune équipe pour le moment</div>
                        </div>
                    @endforelse
                    
                </div>
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