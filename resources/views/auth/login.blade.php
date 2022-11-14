@extends('layouts.guest')

@section('title', "Connexion")


@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="card-body p-5 text-center">
                    
                    <h3 class="mb-5">Connexion</h3>

                    <div class="form-floating mb-3">
                        <input name="email" value="{{ old('email') }}" required autofocus type="email" class="form-control" id="email" placeholder="name@example.com">
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

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-start gap-2">
                        <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Se rappeler de moi
                        </label>
                      </div>

                    <div class="my-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Connexion</button>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="mt-2" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif
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
