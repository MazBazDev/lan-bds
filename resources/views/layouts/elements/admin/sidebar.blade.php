<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-2" href="{{ route('home') }}">
        <img style="height: 70px"  class="sidebar-brand-icon" src="{{ asset("assets/img/logobds.svg") }}" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fa fa-home"></i>
            <span> Accueil</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    
    @if (Auth::user()->is_modo() || Auth::user()->admin)
        <div class="sidebar-heading">
            Modération
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.brackets.index') }}">
                <i class="fa fa-trophy"></i>
                <span>Résultats</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.teams.index') }}">
                <i class="fas fa-users"></i>
                <span>Equipes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="fas fa-user"></i>
                <span>Joueurs</span>
            </a>
        </li>
    @endif
    @if (Auth::user()->admin)

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Administration
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.events.index') }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Evenements</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.rules') }}">
                <i class="fas fa-shield-alt"></i>
                <span>Réglements</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.settings') }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </li>
    
    @endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>