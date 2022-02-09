<header class="container bgd-tertiary fixed-top">
    <nav class="navbar navbar-expand-lg  navbar-dark">
        <a class="navbar-brand logo" href="#">ODC-Diagnostic</a>
        <button class="navbar-toggler bgd-secondary" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('acceuil') }}">accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('diagnostic') }}">faire un diagnostic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ensavoir') }}">en savoir plus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apropos') }}">a propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('connexion') }}">connexion / inscription</a>
                </li>
            </ul>
        </div>
    </nav>
</header>