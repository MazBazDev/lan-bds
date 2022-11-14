@extends('layouts.app')

@section('title', "Créer une équipe")


@section('content')
<h4>Créer une équipe</h4>
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.teams.store') }}" method="post">
            @csrf
            @include('admin.teams._form')
            
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