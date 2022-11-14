@extends('layouts.app')

@section('title', "Réglements")


@section('content')
<h4>Réglements</h4>
<div class="row my-3">
    <div class="col-md-12 mb-3">
        <div class="card translate">
            <div class="card-body">
                <i class="bi bi-house-door"></i> Général 
                <hr>
                <form action="{{ route("admin.rulesGeneral") }}" method="POST" id="general">
                    @csrf
                    @method('PUT')
                    
                    @include('components.text-editor', ['description' => old('general', setting("rules.general")), 'name' => 'general'])
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card translate">
            <div class="card-body">
                <i class="bi bi-controller"></i> Tournoi de babyfoot
                <hr>
                <form action="{{ route("admin.rulesBaby") }}" method="POST" id="baby">
                    @csrf
                    @method('PUT')

                    @include('components.text-editor', ['description' => old('baby', setting("rules.baby")), 'name' => 'baby'])
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card translate">
            <div class="card-body">
                <i class="bi bi-moon-stars"></i> Loup Garou
                <hr>
                <form action="{{ route("admin.rulesLg") }}" method="POST" id="lg">
                    @csrf
                    @method('PUT')
                    @include('components.text-editor', ['description' => old('lg', setting("rules.lg")), 'name' => 'lg'])
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card translate">
            <div class="card-body">
                <div class="d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 24px" src="{{ asset("assets/img/LoL_icon.svg") }}" alt="">
                    </div>
                    <span>League of Legends</span>  
                </div>
                <hr>
                <form action="{{ route("admin.rulesLol") }}" method="POST" id="lol">
                    @csrf
                    @method('PUT')
                    @include('components.text-editor', ['description' => old('lol', setting("rules.lol")), 'name' => 'lol'])
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card translate">
            <div class="card-body">
                <div class="d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 24px" src="{{ asset("assets/img/Valorant_icon.svg") }}" alt="">
                    </div>
                    <span>Valorant</span>  
                </div> 
                <hr>
                <form action="{{ route("admin.rulesValo") }}" method="POST" id="valo">
                    @csrf
                    @method('PUT')
                    @include('components.text-editor', ['description' => old('valo', setting("rules.valo")), 'name' => 'valo'])
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card translate">
            <div class="card-body">
                <div class="d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 26px" src="{{ asset("assets/img/RL_icon.png") }}" alt="">
                    </div>
                    <span>Rocket League</span>  
                </div>
                <hr>
                <form action="{{ route("admin.rulesRl") }}" method="POST" id="rl">
                    @csrf
                    @method('PUT')
                    @include('components.text-editor', ['description' => old('rl', setting("rules.rl")), 'name' => 'rl'])
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card translate">
            <div class="card-body">
                <div class="d-flex">
                    <div style="width: 30px; margin-right: 10px">
                        <img style="height: 24px" src="{{ asset("assets/img/Smash_icon.svg") }}" alt="">
                    </div>
                    <span>Super Smash Bros</span>
                </div>
                <hr>
                <form action="{{ route("admin.rulesSmash") }}" method="POST" id="smash">
                    @csrf
                    @method('PUT')
                    @include('components.text-editor', ['description' => old('smash', setting("rules.smash")), 'name' => 'smash'])
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    
@endpush
@push('footer-scripts')
    
@endpush
@push('styles')
    
@endpush