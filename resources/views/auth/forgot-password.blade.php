@extends('layouts.guest')

@section('title', "Réinitialisation du mot de passe")


@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="card-body p-5 text-center">
                    
                    <h3 class="mb-2">Réinitialisation du mot de passe</h3>
                    <span>Après avoir complété ce formulaire, vous recevrez un lien par e-mail vous permettant de choisir votre nouveau mot de passe.</span>
                    
                    <div class="form-floating my-3">
                        <input name="email" value="{{ old('email') }}" required autofocus type="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="email">Email</label>
                        
                        @error('email')
                            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>

                    <div class="my-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Valider</button>
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
