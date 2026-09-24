<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-secondary">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('article.index') }}" class="text-decoration-none text-secondary">Blog</a></li>
                        <li class="breadcrumb-item active text-dark fw-semibold" aria-content="page">{{ Str::limit($article->title, 20) }}</li>
                    </ol>
                </nav>

                <h1 class="display-4 fw-extrabold text-dark mb-3 lh-sm">{{ $article->title }}</h1>
                
                <p class="lead text-secondary mb-4 fs-4 border-start border-4 border-primary ps-3 py-1">
                    {{ $article->subtitle }}
                </p>
                <div class="d-flex align-items-center justify-content-between mb-4 p-3 bg-light rounded-4 shadow-sm border border-light">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm me-3" style="width: 45px; height: 45px; font-size: 1.2rem;">
                            {{ strtoupper(substr($article->user?->name ?? 'A', 0, 1)) }}
                        </div>
                        <div>
                            <span class="text-muted d-block small text-uppercase tracking-wider fw-semibold">Autore</span>
                            <span class="text-dark fw-bold">{{ $article->user?->name ?? 'Autore Anonimo' }}</span>
                        </div>
                    </div>
                    <div class="text-end text-muted small">
                        <span class="d-block text-uppercase tracking-wider fw-semibold" style="font-size: 0.75rem;">Pubblicato il</span>
                        <span class="fw-medium"><i class="bi bi-calendar3 me-1"></i> {{ $article->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>

                <!-- IMMAGINE DI COPERTINA  -->
                <div class="mb-5 shadow-sm rounded-4 overflow-hidden border" style="max-height: 450px; width: 100%;">
                    <img src="{{ Storage::url($article->img) }}" class="w-100 h-100" alt="{{ $article->title }}" style="object-fit: cover; max-height: 450px;">
                </div>

                <div class="article-body text-dark fs-5 lh-lg px-2 mb-5" style="white-space: pre-line; text-align: justify; font-family: 'Georgia', serif;">
                    {{ $article->body }}
                </div>
                
                <hr class="text-black-50 my-4">

                <!-- PULSANTI COMPONENTE -->
                <div class="my-4">
                    <x-action-buttons :item="$article" />
                </div>

                <!-- PULSANTE TORNA INDIETRO -->
                <div class="mt-5 text-center">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-dark rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-arrow-left me-2"></i> Torna alla lista degli articoli
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layout>
