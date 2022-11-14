@extends('layouts.guest')

@section('title', "Verification de l'email")


@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <h3 class="mb-2">Renvoyer l'e-mail de vérification</h3>
                    @if (session('status') == 'verification-link-sent')
                        <span>Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.</span>
                    @endif
                    <form method="POST" action="{{ route('verification.send') }}}" class="mt-3">
                        @csrf
                        <div class="my-3">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Envoyer</button>
                        </div>
                    </form>
                    <hr>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="my-3">
                            <button class="btn btn-danger btn btn-block" type="submit">Se déconnecter</button>
                        </div>
                    </form>
                </div>
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
