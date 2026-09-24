<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <nav aria-label="breadcrumb" class="mb-5">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-secondary">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}" class="text-decoration-none text-secondary">Shop</a></li>
                        <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">{{ Str::limit($product->name, 20) }}</li>
                    </ol>
                </nav>

                <div class="row justify-content-between align-items-start g-4">
                    {{-- COLONNA IMMAGINE PRODOTTO --}}
                    <div class="col-12 col-md-6 text-center">
                        <div class="p-3 bg-white shadow-sm rounded-4 border overflow-hidden" style="max-height: 450px; width: 100%;">
                         <img 
                            src="{{ $product->img ? Storage::url($product->img) : asset('storage/default.png') }}" 
                            class="card-img-top" 
                            alt="{{ $product->name }}"
                            >

                        </div>
                    </div>

                    {{-- COLONNA DATI E DETTAGLI --}}
                    <div class="col-12 col-md-6 col-lg-5">
                        <h1 class="display-5 fw-bold text-dark mb-1 lh-sm">{{ $product->name }}</h1>
                        <p class="display-6 fw-bold text-success mb-4">{{ $product->price }} €</p>
                        
                        <!--  Relazione One-to-Many -->
                        <div class="d-flex align-items-center p-3 bg-light rounded-4 border border-light mb-4 shadow-sm">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                {{ strtoupper(substr($product->user?->name ?? 'U', 0, 1)) }}
                            </div>
                            <div>
                                <span class="text-muted d-block small text-uppercase tracking-wider fw-semibold" style="font-size: 0.7rem;">Venditore</span>
                                <span class="text-dark fw-bold">{{ $product->user?->name ?? 'Utente sconosciuto' }}</span>
                            </div>
                        </div>

                        <hr class="text-black-50 my-4">

                        <h4 class="h6 text-uppercase tracking-wider fw-bold text-secondary mb-2">Descrizione Prodotto</h4>
                        <p class="fs-5 text-secondary mb-4 lh-base" style="white-space: pre-line; text-align: justify;">
                            {{ $product->description }}
                        </p>

                        <!-- AZIONI  -->
                        <div class="d-flex flex-column gap-3 mt-4">
                            <div class="d-flex gap-2">
                                <a href="{{ route('product.index') }}" class="btn btn-outline-dark rounded-pill px-4 fw-semibold w-50">
                                    <i class="bi bi-arrow-left me-2"></i>Torna allo Shop
                                </a>
                            </div>

                            <!-- COMPONENTE -->
                            <div class="border-top pt-2">
                                <x-action-buttons :item="$product" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
