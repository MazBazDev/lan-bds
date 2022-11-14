@extends('layouts.app')

@section('title', "Bracket Lol")


@section('content')
<div class="card mb-3">
    <div class="card-body">
        <h4>Créer un bracket</h4>
        <form action="{{ route('admin.brackets.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" required id="name" name="name" value="{{ old("name") }}">

                    @error('name')
                        <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="game">Jeu *</label>
                        <select class="form-control" id="game" name="game" required>
                            <option @selected(old("game") == 1 || (($team->game ?? "") == 1)) value="1">League Of Legends</option>
                            <option @selected(old("game") == 2 || (($team->game ?? "") == 2)) value="2">Valorant</option>
                            <option @selected(old("game") == 3 || (($team->game ?? "") == 3)) value="3">Rocket League</option>
                            <option @selected(old("game") == 4 || (($team->game ?? "") == 4)) value="4">Super Smash Bross</option>
                            <option @selected(old("game") == 5 || (($team->game ?? "") == 5)) value="5">Baby foot</option>
                        </select>
                    </div>
                    @error('game')
                        <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body overflow-auto">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Jeu</th>
                <th scope="col">Nom</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($brackets as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
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
                        <td>{{ $item->name }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary m-1" href="{{ route('admin.brackets.edit', $item) }}"><i class="bi bi-pencil-square"></i></a>
                            <form method="POST" onSubmit="if(!confirm('Êtes vous sûr de vouloir supprimer le bracket ?')){return false;}" action="{{ route('admin.brackets.destroy', $item) }}">
                                @csrf
                                @method("DELETE")
    
                                <button class="btn btn-danger m-1" type="submit"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td> 
                    </tr>
                @empty
                    <td colspan="4" class="text-center">Aucun bracket</td>
                @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection

