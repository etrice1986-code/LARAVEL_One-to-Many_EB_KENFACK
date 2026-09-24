<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
    
                <div class="text-center mb-4">
                    <h1 class="display-6 fw-bold text-dark mb-1">Modifica Prodotto</h1>
                    <p class="text-secondary">Stai modificando: <span class="text-warning fw-semibold">{{ $product->name }}</span></p>
                </div>
                <div class="card border-0 shadow-sm rounded-4 bg-white">
                    <div class="card-body p-4 p-sm-5">
                        
                        <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- NOME PRODOTTO --}}
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Nome Prodotto</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-secondary"><i class="bi bi-tag-fill"></i></span>
                                    <input type="text" name="name" class="form-control bg-light border-start-0 ps-0 @error('name') is-invalid @enderror" id="name" value="{{ old('name', $product->name) }}" required>
                                </div>
                                @error('name') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- PREZZO --}}
                            <div class="mb-3">
                                <label for="price" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Prezzo (€)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-secondary"><i class="bi bi-currency-euro"></i></span>
                                    <input type="number" step="0.01" name="price" class="form-control bg-light border-start-0 ps-0 @error('price') is-invalid @enderror" id="price" value="{{ old('price', $product->price) }}" required>
                                </div>
                                @error('price') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- DESCRIZIONE --}}
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Descrizione Prodotto</label>
                                <div class="input-group align-items-start">
                                    <span class="input-group-text bg-light border-end-0 text-secondary pt-2"><i class="bi bi-file-text"></i></span>
                                    <textarea name="description" class="form-control bg-light border-start-0 ps-0 rounded-end @error('description') is-invalid @enderror" id="description" rows="4" required style="resize: none;">{{ old('description', $product->description) }}</textarea>
                                </div>
                                @error('description') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- IMMAGINE --}}
                            <div class="mb-4">
                                <label for="img" class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Immagine Prodotto</label>
                                
                                <!-- immagine  -->
                                <div class="d-flex align-items-center gap-3 mb-3 p-2 bg-light rounded-3 border">
                                    <img src="{{ Storage::url($product->img) }}" class="rounded shadow-sm" style="width: 70px; height: 70px; object-fit: cover;">
                                    <div>
                                        <small class="text-muted d-block">Immagine attuale</small>
                                        <span class="text-secondary small">Carica una nuova foto per sostituirla</span>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-secondary"><i class="bi bi-image"></i></span>
                                    <input type="file" name="img" class="form-control bg-light border-start-0 ps-0 @error('img') is-invalid @enderror" id="img">
                                </div>
                                @error('img') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                            </div>

                            <!-- PULSANTI D'AZIONE -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-warning btn-lg rounded-3 shadow-sm fw-semibold text-dark">
                                    <i class="bi bi-arrow-clockwise me-2"></i>Aggiorna Prodotto
                                </button>
                                <a href="{{ route('product.index') }}" class="btn btn-link btn-sm text-secondary text-decoration-none">
                                    Annulla e torna allo Shop
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
