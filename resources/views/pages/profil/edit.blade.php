@extends('layouts.guest')

@section('title', "Mon profil")


@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <form method="POST" action="{{ route('profil_update', Auth::user()) }}" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        
                        <div class="card-body p-5">
                            @if (Auth::user()->is_admin() || Auth::user()->is_admin())
                                <div class="d-grid">
                                    <a href="{{ route("admin.home") }}" class="btn btn-primary mb-3">Panel admin</a>
                                </div>
                                <hr>
                            @endif

                            <h3 class="mb-4">Profil</h3>
                            <div class="form-group mb-3">
                                <label class="form-label" for="picture">Image de profil</label>
                                <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)" id="picture" name="picture">
                                @error('picture')
                                    <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>

                            <div class="col border mb-3 p-2 rounded" id="preview" @if(!Auth::user()->avatar()) hidden @endif>
                                <img id="output" src="{{ Auth::user()->avatar() }}" class="img-fluid" />
                            </div>

        
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Id utilisateur</label>
                                <input placeholder="{{ Auth::user()->id }}" disabled type="text" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Nom & Prénom</label>
                                <input name="name" placeholder="{{ Auth::user()->name }}" value="{{ old('name') }}" autofocus type="text" class="form-control" id="name">
                                
                                @error('name')
                                    <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>
        
                            <div class="form-group mb-3">
                                <label class="form-label" for="pseudo">Pseudo</label>
                                <input name="pseudo" value="{{ old('pseudo') }}" placeholder="{{ Auth::user()->pseudo }}" type="text" class="form-control" id="pseudo">
                                
                                @error('pseudo')
                                    <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>
        
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="email" placeholder="{{ Auth::user()->email }}">
                                
                                @error('email')
                                    <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" @checked(old('consent', Auth::user()->consent)) type="checkbox" id="consent">
                                <label class="form-check-label" for="consent">Supprimer mes informations après l'événement (Photo, nom, ect..)</label>
                            </div>
                            <div class="text-center">
                                    <div class="my-3">
                                        <button class="btn btn-success btn-lg btn-block" type="submit"><i class="bi bi-check2-square"></i> Modifier</button>
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                        Deconnexion
                                    </button>
                
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-secondary mb-2"  href="{{ route('password.request') }}">
                                            Changer le mot de passe 
                                        </a>
                                    @endif
                            </div>
                        </div>
                    </form>
                </div>
          </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

@push('footer-scripts')
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('preview').hidden = false;
    };
</script>
@endpush

@push('styles')
@endpush

