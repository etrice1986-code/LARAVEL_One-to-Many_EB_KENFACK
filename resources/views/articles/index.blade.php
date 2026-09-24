<x-layout>
    <div class="container my-5">
        
        <!-- INTESTAZIONE PAGINA -->
        <div class="row mb-5 text-center">
            <div class="col-12">
                <h1 class="display-5 fw-bold text-dark mb-2">Esplora il nostro Blog</h1>
                <p class="text-secondary lead">Rimani aggiornato con le ultime notizie, guide e racconti della community</p>
                <hr class="w-25 mx-auto border-primary border-2 opacity-75 mt-3">
            </div>
        </div>

        <!-- MESSAGGI DI NOTIFICA -->
        @if(session('message'))
            <div class="row justify-content-center mb-4">
                <div class="col-12 col-md-8">
                    <div class="alert alert-success border-0 shadow-sm rounded-3 text-center py-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i> {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        <!-- GRIGLIA DEGLI ARTICOLI -->
        <div class="row g-4 justify-content-start">
            @forelse($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    
                    <!-- CARD STILIZZATA (Con effetto transizione e h-100) -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden w-100 d-flex flex-column h-100 article-hover-card" style="transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;">
                        
                        <!-- Contenitore immagine con altezza fissa proporzionata -->
                        <div style="height: 200px; width: 100%; overflow: hidden;">
                            <img src="{{ Storage::url($article->img) }}" class="w-100 h-100" alt="{{ $article->title }}" style="object-fit: cover;">
                        </div>
                        
                        <!-- CORPO DELLA CARD -->
                        <div class="card-body p-4 d-flex flex-column flex-grow-1">
                            <!-- Titolo dell'Articolo -->
                            <h5 class="card-title fw-bold text-dark mb-1 text-truncate">{{ $article->title }}</h5>
                            
                            <!-- Sottotitolo / Estratto breve -->
                            <h6 class="card-subtitle small text-muted mb-3 text-truncate fw-medium">{{ $article->subtitle }}</h6>
                            
                            <!-- Testo troncato in modo sicuro -->
                            <p class="card-text text-secondary small mb-4 flex-grow-1">
                                {{ Str::limit($article->body, 90) }}
                            </p>
                            
                            <hr class="text-black-50 my-3 mt-auto">

                            <!-- INFO AUTORE & PULSANTE -->
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="small text-muted">
                                    <i class="bi bi-person me-1"></i>
                                    <span class="fw-semibold">{{ $article->user?->name ?? 'Anonimo' }}</span>
                                </div>
                                <a href="{{ route('article.show', $article) }}" class="btn btn-outline-primary btn-sm px-3 rounded-pill fw-semibold">
                                    Leggi <i class="bi bi-arrow-right-short ms-1"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <!-- SCHERMATA DI LISTA VUOTA -->
                <div class="col-12 text-center my-5 py-5 rounded-4 bg-light border border-dashed">
                    <div class="fs-1 text-muted mb-3"><i class="bi bi-journal-x"></i></div>
                    <h3 class="text-secondary fw-semibold">Non ci sono ancora articoli pubblicati.</h3>
                    @auth
                        <a href="{{ route('article.create') }}" class="btn btn-primary rounded-pill px-4 mt-3 shadow-sm">
                            <i class="bi bi-pencil-square me-2"></i> Scrivi il tuo primo articolo
                        </a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>

</x-layout>
