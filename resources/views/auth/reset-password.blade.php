@extends('layouts.guest')

@section('title', "Connexion")


@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="card-body p-5 text-center">
                    
                    <h3 class="mb-2">Réinitialisation du mot de passe</h3>

                    <div class="form-floating mb-3">
                        <input name="email" value="{{ old('email', $request->email) }}" required autofocus type="email" class="form-control" id="email" placeholder="name@example.com">
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
                        <button class="btn btn-primary btn btn-block" type="submit">Réinitialiser le mot de passe</button>
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
    
@endpush
@push('styles')
    
@endpush
