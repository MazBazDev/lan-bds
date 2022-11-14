@extends('layouts.app')

@section('title', "Equipes")

@section('content')
<h4>Equipes</h4>
<div class="card">
    <div class="card-body overflow-auto">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <form action="{{ route('admin.teams.index') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Equipe" name="search" value="{{ $search ?? "" }}">
                        <div class="input-group-append">
                          <button class="btn btn-primary" style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <a href="{{ route("admin.teams.create") }}" class="btn btn-success">Ajouter une equipe</a>
            </div>
            
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Jeu</th>
                <th scope="col">Mates</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($teams as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td class="text-white">
                        <span class="badge bg-info">
                            @switch($item->game)
                                @case(1)
                                    LOL
                                    @break
                                @case(2)
                                    Valo
                                    @break
                                @case(3)
                                    RL
                                    @break
                                @case(4)
                                    Smash
                                    @break
                                @case(5)
                                    LG
                                    @break
                                @default
                                    
                            @endswitch
                        </span>
                    </td>
                    <td>{{ count($item->players) }}</td>
                    <td class="text-white">
                        @if($item->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Désactivé</span>
                        @endif
                    </td>
                    <td class="d-flex">
                        <a class="btn btn-primary m-1" href="{{ route('admin.teams.edit', $item) }}"><i class="bi bi-pencil-square"></i></a>
                        <form method="POST" onSubmit="if(!confirm('Êtes vous sûr de vouloir supprimer l\'équipe ?')){return false;}" action="{{ route('admin.teams.destroy', $item) }}">
                            @csrf
                            @method("DELETE")

                            <button class="btn btn-danger m-1" type="submit"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td> 
                </tr>
              @empty
                  <td colspan="6" class="text-center">Aucune équipe</td>
              @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $teams->links() }}
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