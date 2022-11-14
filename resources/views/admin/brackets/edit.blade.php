@extends('layouts.app')

@section('title', "Bracket Lol")


@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.brackets.update', $bracket) }}" method="post">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" required id="name" name="name" value="{{ old("name", $bracket->name) }}">

                    @error('name')
                        <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="game">Jeu *</label>
                        <select class="form-control" id="game" name="game" required>
                            <option @selected(old("game") == 1 || (($bracket->game ?? "") == 1)) value="1">League Of Legends</option>
                            <option @selected(old("game") == 2 || (($bracket->game ?? "") == 2)) value="2">Valorant</option>
                            <option @selected(old("game") == 3 || (($bracket->game ?? "") == 3)) value="3">Rocket League</option>
                            <option @selected(old("game") == 4 || (($bracket->game ?? "") == 4)) value="4">Super Smash Bross</option>
                            <option @selected(old("game") == 5 || (($bracket->game ?? "") == 5)) value="5">Baby foot</option>
                        </select>
                    </div>
                    @error('game')
                        <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                    @enderror
                </div>
                <div class="col-md-12 mb-3 d-block">
                    <label for="teams_id">Equipes *</label>
                    <small>Nom | ID</small>
                    <select class="form-control selectpicker" required data-live-search="true" multiple id="teams_id"  name="teams_id[]">
                        @foreach ($teams as $item)
                            <option @selected(in_array($item->id, ((isset($bracket->teams_id) && $bracket->teams_id !== null) ? $bracket->teams_id : []) )) value="{{ $item->id }}">{{ "[ " . $item->name . " " . $item->id . " ]"}}</option>
                        @endforeach
                    </select>
                    @error('teams_id')
                        <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                    @enderror
                </div>

                <input type="text" hidden name="data" id="data">
                @error('data')
                    <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
        <hr>
        <div class="overflow-auto">
            <div id="playoff"></div>
        </div>
        
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    var saveData = {!! $bracket->data !!}

    function saveFn(data, userData) {
        $('#data').val(JSON.stringify(data))
    }
  
    $(function() {
        var container = $('#playoff')
        container.bracket({
          init: saveData,
          save: saveFn,
        })
      })
    </script>
@endpush
@push('footer-scripts')
    <script src="https://rawgit.com/Lykegenes/jquery-bracket/master/dist/jquery.bracket.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
@endpush
@push('styles')
    <link rel="stylesheet" href="https://raw.githubusercontent.com/teijo/jquery-bracket/master/dist/jquery.bracket.min.css">
    <link rel="stylesheet" href="{{ asset("assets/css/admin/brackets.css") }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
@endpush