@extends('layouts.guest')

@section('title', "Connexion")


@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="card-body p-5 text-center">

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                        <label for="password">Mot de passe</label>

                        @error('password')
                            <small class="text-danger" role="alert"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>

                    <div class="my-3">
                        <button class="btn btn-primary btn btn-block" type="submit">Confirmer</button>
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
