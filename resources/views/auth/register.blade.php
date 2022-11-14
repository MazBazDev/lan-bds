@extends('layouts.guest')

@section('title', "Inscription")


@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="card-body p-5 text-center">
                    
                    <h3 class="mb-5">Inscription</h3>

                    <div class="form-floating mb-3">
                        <input name="name" value="{{ old('name') }}" required autofocus type="text" class="form-control" id="name" placeholder="John Doe">
                        <label for="name">Nom & Prénom</label>
                        
                        @error('name')
                            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input name="pseudo" value="{{ old('pseudo') }}" required type="text" class="form-control" id="pseudo" placeholder="GamerDu69">
                        <label for="pseudo">Pseudo</label>
                        
                        @error('pseudo')
                            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input name="email" value="{{ old('email') }}" required type="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="email">Email</label>
                        
                        @error('email')
                            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                        <label for="password">Mot de passe</label>

                        @error('password')
                            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Mot de passe">
                        <label for="password_confirmation">Confirmer votre mot de passe</label>

                        @error('password_confirmation')
                            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>

                    <div class="my-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">S'inscrire</button>
                    </div>

                    <a class="mt-2" href="{{ route('login') }}">
                        Déja un compte ?
                    </a>
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
    
@endpush
@push('styles')
    
@endpush
