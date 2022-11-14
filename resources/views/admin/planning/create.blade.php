@extends('layouts.app')

@section('title', "Ajouter un évenement")


@section('content')
<h3>Créer un event</h3>
<div class="card">
    <div class="card-body">
        <form action="{{ route("admin.events.store") }}" method="POST">
            @csrf
            @include('admin.planning._form')
        
            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    
@endpush
@push('footer-scripts')
    
@endpush
@push('styles')
    
@endpush