@extends('layouts.app')

@section('title', "Modifier un évenement")


@section('content')
<h3>Modifier l'event</h3>
<div class="card">
    <div class="card-body">
        <form action="{{ route("admin.events.update", $event) }}" method="POST">
            @csrf
            @method("PATCH")
            @include('admin.planning._form')
        
            <button type="submit" class="btn btn-success">Modifier</button>
        </form>

        <form method="POST" action="{{ route('admin.events.destroy', $event) }}" onSubmit="if(!confirm('Supprimer ?')){return false;}">
            <!-- CSRF token -->
            @csrf
            <!-- <input type="hidden" name="_method" value="DELETE"> -->
            @method("DELETE")
            <input type="submit" class="btn btn-danger mt-2" value="Supprimer">
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