<x-layout>
    <div class="container my-5">
        
        <div class="row mb-5 text-center">
            <div class="col-12">
                <h1 class="display-5 fw-bold text-dark mb-2">Tutti i nostri Prodotti</h1>
                <p class="text-secondary lead">Scopri gli articoli in vendita messi a disposizione dai nostri utenti</p>
                <hr class="w-25 mx-auto border-success border-2 opacity-75 mt-3">
            </div>
        </div>

        <!-- ALERT DI SUCCESSO -->
        @if(session('message'))
            <div class="row justify-content-center mb-4">
                <div class="col-12 col-md-8">
                    <div class="alert alert-success border-0 shadow-sm rounded-3 text-center py-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i> {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        <!--  PRODOTTI -->
        <div class="row g-4 justify-content-start">
            @forelse($products as $product)
                <div class="col-12 col-md-6 col-lg-4 d-flex">

                    <div class="w-100 d-flex flex-column">
                        <x-product-card :product="$product" />
                    </div>
                </div>
            @empty
                <!--QUANDO E' VUOTO -->
                <div class="col-12 text-center my-5 py-5 rounded-4 bg-light border border-dashed">
                    <div class="fs-1 text-muted mb-3"><i class="bi bi-bag-x"></i></div>
                    <h3 class="text-secondary fw-semibold">Non ci sono ancora prodotti disponibili.</h3>
                    @auth
                        <a href="{{ route('product.create') }}" class="btn btn-success rounded-pill px-4 mt-3 shadow-sm">
                            <i class="bi bi-plus-circle me-2"></i> Inserisci il primo prodotto
                        </a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
