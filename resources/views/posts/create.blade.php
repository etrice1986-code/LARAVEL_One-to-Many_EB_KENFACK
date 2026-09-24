<x-layout title="Crea un nuovo articolo">
    <div class="text-center mb-4 mt-4">
        <h1 class="display-6 fw-bold text-dark mb-1">Nuovo Articolo</h1>
        <p class="text-secondary">Condividi le tue idee con la community in pochi istanti</p>
    </div>

    <!-- CARD / FORM -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 bg-white">
                <div class="card-body p-4 p-sm-5">
                    
                    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- TITOLO --}}
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Titolo Articolo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-secondary"><i class="bi bi-type-h1"></i></span>
                                <input type="text" name="title" class="form-control bg-light border-start-0 ps-0 @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" placeholder="Inserisci un titolo accattivante..." required>
                            </div>
                            @error('title') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- SOTTOTITOLO --}}
                        <div class="mb-3">
                            <label for="subtitle" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Sottotitolo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-secondary"><i class="bi bi-blockquote-left"></i></span>
                                <input type="text" name="subtitle" class="form-control bg-light border-start-0 ps-0 @error('subtitle') is-invalid @enderror" id="subtitle" value="{{ old('subtitle') }}" placeholder="Un breve riassunto dell'articolo..." required>
                            </div>
                            @error('subtitle') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- CORPO DEL TESTO --}}
                        <div class="mb-3">
                            <label for="body" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Contenuto dell'Articolo</label>
                            <div class="input-group align-items-start">
                                <span class="input-group-text bg-light border-end-0 text-secondary pt-2"><i class="bi bi-text-paragraph"></i></span>
                                <textarea name="body" class="form-control bg-light border-start-0 ps-0 rounded-end @error('body') is-invalid @enderror" id="body" rows="6" placeholder="Comincia a scrivere qui il tuo racconto..." required style="resize: none;">{{ old('body') }}</textarea>
                            </div>
                            @error('body') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- IMMAGINE --}}
                        <div class="mb-4">
                            <label for="img" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Immagine di Copertina (Opzionale)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-secondary"><i class="bi bi-image"></i></span>
                                <input type="file" name="img" class="form-control bg-light border-start-0 ps-0 @error('img') is-invalid @enderror" id="img">
                            </div>
                            @error('img') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- PULSANTI DI AZIONE -->
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-success btn-lg rounded-3 shadow-sm fw-semibold">
                                <i class="bi bi-send-check-fill me-2"></i>Salva Articolo
                            </button>
                            <a href="{{ route('article.index') }}" class="btn btn-outline-secondary rounded-3 fw-semibold">
                                Annulla
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout>
