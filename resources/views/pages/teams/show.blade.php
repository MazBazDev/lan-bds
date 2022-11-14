@extends('layouts.guest')

@section('title', "Equipe " . $team->name)

@section('content')
<h3 class="text-white mb-3"> {{ "Joueurs de l'équipe " . $team->name }}</h3>
<div class="row">
    <div class="col-md-3 mb-3">
        @foreach ($team->players as $item)
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="text-center">{{ $item->name . " | " . $item->pseudo }}</h4>
                    <img src="{{ $item->avatar() }}"  class="img-fluid rounded"  alt="">
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@push('scripts')
@endpush

@push('footer-scripts')

@endpush

@push('styles')

@endpush

