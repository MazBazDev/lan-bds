@extends('layouts.app')

@section('title', "Paramètres")


@section('content')
<h4>Paramètres</h4>
<form action="{{ route('admin.settings.update') }}" method="POST" id="homeInfo" class="mb-3">
    @csrf
    <div class="row mb-3">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="custom-control custom-switch">
                        <input @checked(old("maintenance", setting("maintenance", false))) type="checkbox" name="maintenance" class="custom-control-input" id="maintenance">
                        <label class="custom-control-label" for="maintenance">Activer la maintenance</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="custom-control custom-switch">
                        <input @checked(old("teams", setting("display.teams", false))) type="checkbox" name="teams" class="custom-control-input" id="teams">
                        <label class="custom-control-label" for="teams">Afficher les équipes</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="eventBegin" class="form-label">Début de la LAN</label>
                        <input type="datetime-local" class="form-control" name="eventBegin" id="eventBegin" value="{{ old("eventBegin", setting("countdown.end")) }}">
                    </div>
                    <div class="custom-control custom-switch">
                        <input @checked(old('eventBeginSwitch', setting("countdown.display", false))) type="checkbox" name="eventBeginSwitch" class="custom-control-input" id="eventBeginSwitch">
                        <label class="custom-control-label" for="eventBeginSwitch">Activer le compteur</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="liveChannel" class="form-label">Chaine du live</label>
                        <input type="text" class="form-control" name="liveChannel" id="liveChannel" value="{{ old("liveChannel", setting("stream.channel")) }}">
                    </div>
                    <div class="mb-3">
                        <label for="liveLink" class="form-label">Lien du live</label>
                        <input type="url" class="form-control" name="liveLink" id="liveLink" value="{{ old("liveLink", setting("stream.link")) }}">
                    </div>
                    <div class="custom-control custom-switch ">
                        <input @checked(old('liveDisplay', setting("stream.status", false))) type="checkbox" name="liveDisplay" class="custom-control-input" id="liveDisplay">
                        <label class="custom-control-label" for="liveDisplay">Activer le live</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="mailContact" class="form-label">Mail de contact</label>
                        <input type="mailContact" name="mailContact" class="form-control" id="mailContact" value="{{ old('mailContact', setting("contact.mail")) }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <label for="">Info page d'accueil</label>
                    @include('components.text-editor', ['description' => old('homeInfo', setting("home.info")), 'name' => 'homeInfo'])

                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
@endsection