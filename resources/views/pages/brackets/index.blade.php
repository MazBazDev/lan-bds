@extends('layouts.guest')

@section('title', "Brackets")


@section('content')
<style>
    .overflow-auto{
        overflow: scroll!important;
    } 
</style>
<div class="card mb-3">
    <div class="card-body">
        <div class="text-center">
            <h4 class="">
                <div class="spinner-grow text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div> 
                Brackets
            </h4>
            <p>Suivez l'avancement des tournois en direct !</p>
        </div>
        <hr>
        <div class="row">
            @if(false)
            @if(count($lol) > 0)
                <div class="col-md-6 mb-3">
                    <h4>League of Legends</h4>
                    <div class="d-grid gap-1 overflow-auto border p-3 rounded" style="max-height: 180px">
                        @foreach ($lol as $item)
                            <a href="{{ route('brackets.show', $item->id) }}" class="mb-3">
                                <div class="card shadow">
                                    <div class="card-body d-flex">
                                        <div style="width: 30px; margin-right: 10px">
                                            <img style="height: 24px" src="{{ asset("assets/img/LoL_icon.svg") }}" alt="">
                                        </div>
                                        <div class="w-100 d-flex justify-content-between">
                                            <span>League of Legends | {{ $item->name }}</span> 
                                            <h3 class="m-0"><i class="bi bi-arrow-right-circle-fill"></i> </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        
            @if(count($valo) > 0)
                <div class="col-md-6 mb-3">
                    <h4>Valorant</h4>
                    <div class="d-grid gap-1 overflow-auto border p-3 rounded" style="max-height: 180px">
                        @foreach ($valo as $item)
                            <a href="{{ route('brackets.show', $item->id) }}" class="mb-3">
                                <div class="card">
                                    <div class="card-body d-flex">
                                        <div style="width: 30px; margin-right: 10px">
                                            <img style="height: 24px" src="{{ asset("assets/img/Valorant_icon.svg") }}" alt="">
                                        </div>
                                        <div class="w-100 d-flex justify-content-between">
                                            <span>Valorant | {{ $item->name }}</span> 
                                            <h3 class="m-0"><i class="bi bi-arrow-right-circle-fill"></i> </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
            
            @if(count($rl) > 0) 
                <div class="col-md-6 mb-3">
                    <h4>Rocket League</h4>
                    <div class="d-grid gap-1 overflow-auto border p-3 rounded" style="max-height: 180px">
                        @foreach ($rl as $item)
                            <a href="{{ route('brackets.show', $item->id) }}" class="mb-3">
                                <div class="card">
                                    <div class="card-body d-flex">
                                        <div style="width: 30px; margin-right: 10px">
                                            <img style="height: 26px" src="{{ asset("assets/img/RL_icon.png") }}" alt="">
                                        </div>
                                        <div class="w-100 d-flex justify-content-between">
                                            <span>Rocket League | {{ $item->name }}</span> 
                                            <h3 class="m-0"><i class="bi bi-arrow-right-circle-fill"></i> </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
           
            @if(count($smash) > 0)
                <div class="col-md-6 mb-3">
                    <h4>Super Smash Bross</h4>
                    <div class="d-grid gap-1 overflow-auto border p-3 rounded" style="max-height: 180px">
                        @foreach ($smash as $item)
                            <a href="{{ route('brackets.show', $item->id) }}" class="mb-3">
                                <div class="card">
                                    <div class="card-body d-flex">
                                        <div style="width: 30px; margin-right: 10px">
                                            <img style="height: 24px" src="{{ asset("assets/img/Smash_icon.svg") }}" alt="">
                                        </div>
                                        
                                        <div class="w-100 d-flex justify-content-between">
                                            <span>Super Smash Bros | {{ $item->name }}</span>
                                            <h3 class="m-0"><i class="bi bi-arrow-right-circle-fill"></i> </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
            @endif
        
            @if(count($baby) > 0)
                <div class="col-md-12 mb-3">
                    <h4>Babyfoot</h4>
                    <div class="d-grid gap-1 overflow-auto border p-3 rounded" style="max-height: 180px">
                        @foreach ($baby as $item)
                            <a href="{{ route('brackets.show', $item->id) }}" class="mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="w-100 d-flex justify-content-between">
                                            <span><i class="bi bi-controller"></i> Babyfoot | {{ $item->name }}</span>
                                            <h3 class="m-0"><i class="bi bi-arrow-right-circle-fill"></i> </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush

@push('footer-scripts')

@endpush

@push('styles')
    <style>
         .spinner-grow {
            display: inline-block;
            width: 1.3rem;
            height: 1.3rem;
            background-color: currentColor;
            border-radius: 50%;
            opacity: 0;
            -webkit-animation: .75s linear infinite spinner-grow;
            animation: .75s linear infinite spinner-grow;
        }

        a {
            text-decoration: none!important;
            color: currentColor;
        }
    </style>
@endpush

