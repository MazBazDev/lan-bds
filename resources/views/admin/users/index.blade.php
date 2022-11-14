@extends('layouts.app')

@section('title', "Utilisateurs")


@section('content')
<h4>Utilisateurs</h4>
<div class="card overflow-auto">
    <div class="card-body">
        <div class="d-flex">
            <form action="{{ route('admin.users.index') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Joueur" name="search" value="{{ $search ?? "" }}">
                    <div class="input-group-append">
                      <button class="btn btn-primary" style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Grade</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($users as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->pseudo }}</td>
                        <td>
                            @switch($item->admin)
                                @case(1)
                                    <span class="badge text-bg-danger">Admin</span>
                                    @break
                                @default
                                    <span class="badge text-bg-primary">Joueur</span>
                            @endswitch
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('admin.users.edit', $item) }}"><i class="bi bi-pencil-square"></i></a>
                            <form method="POST" onSubmit="if(!confirm('Êtes vous sûr de vouloir supprimer l\'utilisateur ?')){return false;}" action="{{ route('admin.users.destroy', $item) }}">
                                @csrf
                                @method("DELETE")
    
                                <button class="btn btn-danger m-1" type="submit"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td> 
                    </tr>      
                @empty
                    <td colspan="5" class="text-center"> Aucun joueur</td>
                @endforelse
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection