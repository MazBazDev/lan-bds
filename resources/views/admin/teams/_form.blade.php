<div class="row">
    <div class="col-md-6 mb-3">
        <div class="mb-3">
            <label for="name">Nom *</label>
            <input name="name" value="{{ old('name', $team->name ?? "") }}" required autofocus type="text" class="form-control" id="name">
            
            @error('name')
                <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
            @enderror
        </div>
        <div class="mb-3">
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
    <div class="col-md-6 mb-3">
        <div class="mb-3">
            <label for="prefix">Préfix</label>
            <input name="prefix" value="{{ old('prefix', $team->prefix ?? "" ) }}"  type="text" class="form-control" id="prefix">
            
            @error('prefix')
                <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
            @enderror
        </div>
        <div>
            <label for="badge">Badge</label>
            <input name="badge" value="{{ old('badge', $team->badge ?? "") }}" type="text" class="form-control" id="badge">
            
            @error('badge')
                <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="custom-control custom-switch">
            <input @checked(old('active', $team->active ?? true)) type="checkbox" name="active" class="custom-control-input" id="active">
            <label class="custom-control-label" for="active" >Activer l'équipe</label>
            @error('active')
                <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
            @enderror
        </div>
    </div>
    <div class="col-md-12 mb-3 d-block">
        <label for="mates">Joueurs *</label>
        <small>Nom | Pseudo | ID</small>
        <select class="form-control selectpicker" required data-live-search="true" multiple id="mates"  name="mates[]">
            @foreach ($users as $item)
                <option @selected(in_array($item->id, ((isset($team->mates) && $team->mates !== null) ? $team->mates : []) )) value="{{ $item->id }}">{{ "[ " . $item->pseudo . " " . $item->name . " " . $item->id . " ]"}}</option>
            @endforeach
        </select>
        @error('mates')
            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
        @enderror
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
@endpush

@push("footer-scripts") 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
@endpush