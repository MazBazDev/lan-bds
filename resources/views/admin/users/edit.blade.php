@extends('layouts.app')

@section('title', "Utilisateurs")


@section('content')
<h4>Modifier : {{ $user->name }}</h4>
<div class="card overflow-auto">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
            @method("PUT")
            @csrf

            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="picture" name="picture">
                <label class="custom-file-label" for="picture">Image de profil</label>
            
                @error('picture')
                    <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                @enderror
            </div>

            <div class="col border mb-3 p-2 rounded d-flex justify-content-center"  id="preview" @if(!$user->avatar()) hidden @endif>
                <img id="output" src="{{ $user->avatar() }}" style="max-height: 250px;" class="img-fluid" />
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="name">Id utilisateur</label>
                <input placeholder="{{ $user->id }}" disabled type="text" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="name">Nom & Prénom</label>
                <input name="name" placeholder="{{ $user->name }}" value="{{ old('name') }}" autofocus type="text" class="form-control" id="name">
                
                @error('name')
                    <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="pseudo">Pseudo</label>
                <input name="pseudo" value="{{ old('pseudo') }}" placeholder="{{ $user->pseudo }}" type="text" class="form-control" id="pseudo">
                
                @error('pseudo')
                    <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="email">Email</label>
                <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="email" placeholder="{{ $user->email }}">
                
                @error('email')
                    <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                @enderror
            </div>
            @if(Auth::user()->admin && Auth::user()->id != $user->id)
                <div class="form-group mb-3">
                    <label class="form-label" for="role">Rôle</label>
                    <select class="custom-select" id="role" name="role">
                        <option default value="1">Joueur</option>
                        <option @selected(old("role") == 2 || $user->modo) value="2">Moderateur</option>
                        <option @selected(old("role") == 3 || $user->admin) value="3">Admin</option>
                    </select>
                </div>
            @endif
            <button type="submit" class="btn btn-success">Mettre à jour </button>
        </form>
    </div>
</div>
@endsection

@push("footer-scripts")
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('preview').hidden = false;
    };
</script>
@endpush