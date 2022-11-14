@extends('layouts.app')

@section('title', "Evenements")

@section('content')
<h3>Evenements</h3>
<div class="card">
    <div class="card-body overflow-auto">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route("admin.events.create") }}" class="btn btn-success">Ajouter un event</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Jour</th>
                <th scope="col">Début</th>
                <th scope="col">Fin</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($events as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>
                        @switch($item->day)
                            @case(1)
                                <span>Vendredi</span>
                                @break
                            @case(2)
                                <span>Samedi</span>
                                @break
                            @case(3)
                                <span>Dimanche</span>
                                @break
                        @endswitch
                    </td>
                    <td>
                        {{ $item->start->format("H:i")}}
                    </td>
                    <td>
                        {{ $item->end->format("H:i")}}
                    </td>
                    <td class="text-white">
                        @if($item->active)
                            <span class="badge bg-success">Actif</span>
                        @else 
                            <span class="badge bg-danger">Désactivé</span>                            
                        @endif
                    </td>
                    <td>
                        <a href="{{ route("admin.events.edit", $item) }}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
              @empty
                  <td colspan="6" class="text-center">Aucun event</td>
              @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection

@push('scripts')
    
@endpush
@push('footer-scripts')
    
@endpush
@push('styles')
    
@endpush