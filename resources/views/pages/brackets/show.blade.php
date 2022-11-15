@extends('layouts.guest')

@section('title', "Brackets")


@section('content')
<div class="d-flex mb-3">
    <div style="width: 30px; margin-right: 10px">
        @switch($bracket->game)
            @case(1)
                <img style="height: 35px" src="{{ asset("assets/img/LoL_icon.svg") }}" alt="">
                @break
            @case(2)
                <img style="height: 35px" src="{{ asset("assets/img/Valorant_icon.svg") }}" alt="">   
                @break
            @case(3)
                <img style="height: 35px" src="{{ asset("assets/img/RL_icon.png") }}" alt="">   
                @break
            @case(4)
                <img style="height: 35px" src="{{ asset("assets/img/Smash_icon.svg") }}" alt="">   
                @break
            @case(5)
                <h4 class="text-white"><i class="bi bi-controller"></i></h4>
                @break
        @endswitch
    </div>
    <h4 class="text-white">{{ $bracket->name }}</h4> 

</div>

<div class="card overflow-auto mb-3">
    <div class="card-body">
        <div id="playoff" class="mb-3"></div>

    </div>
    <div class="card-footer">
        <small>Données mises à jour le : {{ $bracket->updated_at->format("d/m/y à H:i:s") }} | Page mise à jour à : {{ now()->format("H:i:s") }}</small>
    </div>
</div>

@if(count($bracket->teams) > 0)
<div class="row">
    <h4 class="text-white">Equipes</h4>
    @foreach ($bracket->teams as $item)
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h3>{{ $item->name }}</h3>
                    <div class="d-grid">
                        <a href="{{ route('teams.show', $item) }}" class="btn btn-primary">Voir l'équipe</a>
                    </div>
                </div>
            </div> 
        </div>
    @endforeach
</div>
@endif

@endsection

@push("scripts")
<script>

</script>
<script type="text/javascript">

    setInterval(function() {
        window.location.reload();
    }, 180000); 

    $(function() {
        var container = $('#playoff')
        container.bracket({
          init: {!! $bracket->data !!},
        })
      })
</script>
@endpush
@push('footer-scripts')
    <script src="https://rawgit.com/Lykegenes/jquery-bracket/master/dist/jquery.bracket.min.js"></script>
@endpush
@push('styles')
    <link rel="stylesheet" href="https://raw.githubusercontent.com/teijo/jquery-bracket/master/dist/jquery.bracket.min.css">
    <link rel="stylesheet" href="{{ asset("assets/css/admin/brackets.css") }}">
@endpush

