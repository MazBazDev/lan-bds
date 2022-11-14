@extends('layouts.app')

@section('title', "Modifier une équipe")


@section('content')
<h4>Modifier {{ $team->name }}</h4>
<div class="card mb-3">
    <div class="card-body">
        <form action="{{ route('admin.teams.update', $team) }}" method="post">
            @method("PUT")
            @csrf
            @include('admin.teams._form')
            
            <button type="submit" class="btn btn-success">Modifier</button>
            <small> * = requis</small>
        </form>
    </div>
</div>

@if(count($team->players) > 0)
    <div class="row mb-3">
        @foreach ($team->players as $item)
            <div class="col-md-4 ">
                <div class="card">
                    <div class="text-center card-body">
                        <h4 >{{ $item->name  . " | " . $item->pseudo}} </h4>
                        <img src="{{ $item->avatar() }}" class="img-fluid" alt="">
                        <a href="{{ route('admin.users.edit', $item) }}" class="btn btn-primary">Voir l'utilisateur</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection

@push('scripts')
    
@endpush
@push('footer-scripts')
    
@endpush
@push('styles')
    
@endpush