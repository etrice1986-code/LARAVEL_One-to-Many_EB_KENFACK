<x-layout :title="'Modifica: ' . $article->title">

    <div class="text-center mb-4 mt-4">
        <h1 class="display-6 fw-bold text-dark mb-1">Modifica Articolo</h1>
        <p class="text-secondary">Stai modificando: <span class="text-warning fw-semibold">{{ $article->title }}</span></p>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 bg-white">
                <div class="card-body p-4 p-sm-5">
                    
                    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- TITOLO --}}
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Titolo Articolo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-secondary"><i class="bi bi-type-h1"></i></span>
                                <input type="text" name="title" class="form-control bg-light border-start-0 ps-0 @error('title') is-invalid @enderror" id="title" value="{{ old('title', $article->title) }}" required>
                            </div>
                            @error('title') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- SOTTOTITOLO --}}
                        <div class="mb-3">
                            <label for="subtitle" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Sottotitolo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-secondary"><i class="bi bi-blockquote-left"></i></span>
                                <input type="text" name="subtitle" class="form-control bg-light border-start-0 ps-0 @error('subtitle') is-invalid @enderror" id="subtitle" value="{{ old('subtitle', $article->subtitle) }}" required>
                            </div>
                            @error('subtitle') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- CORPO DEL TESTO --}}
                        <div class="mb-3">
                            <label for="body" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Contenuto dell'Articolo</label>
                            <div class="input-group align-items-start">
                                <span class="input-group-text bg-light border-end-0 text-secondary pt-2"><i class="bi bi-text-paragraph"></i></span>
                                <textarea name="body" class="form-control bg-light border-start-0 ps-0 rounded-end @error('body') is-invalid @enderror" id="body" rows="6" required style="resize: none;">{{ old('body', $article->body) }}</textarea>
                            </div>
                            @error('body') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- IMMAGINE --}}
                        <div class="mb-4">
                            <label for="img" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Immagine di Copertina</label>
                            
                            <!-- immagine  -->
                            <div class="d-flex align-items-center gap-3 mb-3 p-2 bg-light rounded-3 border">
                                <img src="{{ Storage::url($article->img) }}" class="rounded shadow-sm" style="width: 80px; height: 60px; object-fit: cover;">
                                <div>
                                    <small class="text-muted d-block">Copertina attuale</small>
                                    <span class="text-secondary small">Carica un nuovo file per sostituirla</span>
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-secondary"><i class="bi bi-image"></i></span>
                                <input type="file" name="img" class="form-control bg-light border-start-0 ps-0 @error('img') is-invalid @enderror" id="img">
                            </div>
                            @error('img') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- PULSANTI DI AZIONE -->
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-warning btn-lg rounded-3 shadow-sm fw-semibold text-dark">
                                <i class="bi bi-arrow-clockwise me-2"></i>Aggiorna
                            </button>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary rounded-3 fw-semibold">
                                Annulla
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout>
