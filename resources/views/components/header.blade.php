<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold text-uppercase tracking-wider text-primary" href="{{ route('home') }}">
            <i class="bi bi-rocket-takeoff-fill me-0"></i>MyPlatform
        </a>

        <button class="navbar-collapse-toggler navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active fw-semibold' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'article.index' ? 'active fw-semibold' : '' }}" href="{{ route('article.index') }}">Articoli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'product.index' ? 'active fw-semibold' : '' }}" href="{{ route('product.index') }}">Shop Prodotti</a>
                </li>
            </ul>

            <!-- Link a destra (Auth) -->
            <ul class="navbar-nav ms-auto align-items-center">
                @guest
                    {{-- Visibile solo se l'utente OSPITE --}}
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light btn-sm px-3 me-2 border-0 text-white" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm px-3 rounded-pill text-white shadow-sm" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endguest

                @auth
                    {{-- Visibile solo se l'utente AUTENTICATO --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle bg-secondary bg-opacity-25 rounded-pill px-3 text-white border border-secondary border-opacity-50" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 mt-2" aria-labelledby="userDropdown">
                            <li>
                                <h6 class="dropdown-header text-uppercase text-xs text-muted">Azioni Scrittura</h6>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="{{ route('article.create') }}">
                                    <i class="bi bi-pencil-square me-2 text-success"></i>Scrivi Articolo
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="{{ route('product.create') }}">
                                    <i class="bi bi-plus-circle me-2 text-primary"></i>Inserisci Prodotto
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                {{-- Logout gestito tramite form POST obbligatorio --}}
                                <form action="{{ route('logout') }}" method="POST" class="px-2">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm w-100 rounded-2 text-start">
                                        <i class="bi bi-box-arrow-right me-2"></i>Esci
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
