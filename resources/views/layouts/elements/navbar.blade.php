<nav class="navbar navbar-expand-lg navbar-dark mx-3 mb-3">
    <a class="navbar-brand d-lg-none" href="{{ route("home") }}"><img style="height: 50px" class="pl-3" draggable="false" src="{{ asset("assets/img/logobds.svg") }}"></a>
    <button class="navbar-toggler" style="color:aqua" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav mx-auto gap-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route("home") }}"><i class="bi bi-house-door"></i> ACCUEIL</a>
            </li>
            <li class="nav-item">
                @guest
                    <a class="nav-link" href="{{ route("register") }}"><i class="bi bi-person-plus"></i> CONNEXION</a>
                @else
                    <a class="nav-link" href="{{ route("profil") }}"><i class="bi bi-person"></i> PROFIL</a>
                @endguest
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('planning') }}"><i class="bi bi-calendar-event"></i> PLANNING</a>
            </li>
            <a class="d-none d-lg-block" href="{{ route("home") }}"><img style="height: 90px" draggable="false" src="{{ asset("assets/img/logobds.svg") }}"></a>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('teams') }}"><i class="bi bi-people"></i> EQUIPES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('brackets') }}"><i class="bi bi-trophy"></i> BRACKET</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('rules') }}"><i class="bi bi-shield-shaded"></i> REGLEMENTS</a>
            </li>
        </ul>
    </div>
</nav>

@push('styles')
<style>
    .navbar-logo-centered .navbar-nav .nav-link{
        padding: .5em 1em;
    }
</style>
@endpush