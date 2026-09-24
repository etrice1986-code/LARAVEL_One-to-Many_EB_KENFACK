<x-layout>
    
    <div class="py-5 my-4 bg-secondary bg-opacity-10 rounded-4 shadow-sm border border-secondary border-opacity-10">
        <div class="container py-4 text-center">

         
            @if(session('message'))
                <div class="alert alert-success border-0 shadow-sm text-center mb-4 py-3">
                    <i class="bi bi-check-circle-fill text-success me-2"></i> {{ session('message') }}
                </div>
            @endif

    
            <h1 class="display-4 fw-bold text-dark mb-3">
                Benvenuto nel tuo <span class="text-primary">Blog & Shop</span> CRUD
            </h1>
          
            <p class="col-lg-8 mx-auto fs-5 text-secondary mb-4">
                Una piattaforma integrata e moderna sviluppata in Laravel. Gestisci i tuoi articoli di blog in completa libertà e metti in vendita i tuoi prodotti in pochi clic con un sistema sicuro basato sulle relazioni One-to-Many.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                <a href="{{ route('article.index') }}" class="btn btn-primary btn-lg px-4 rounded-pill shadow-sm">
                    <i class="bi bi-newspaper me-2"></i>Esplora il Blog
                </a>
                <a href="{{ route('product.index') }}" class="btn btn-outline-dark btn-lg px-4 rounded-pill shadow-sm">
                    <i class="bi bi-cart4 me-2"></i>Vai allo Shop
                </a>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-md-5 text-center p-3 border border-light shadow-sm rounded-4 bg-white mx-2">
                <div class="fs-1 text-primary mb-2"><i class="bi bi-journal-text"></i></div>
                <h3 class="h5 fw-bold">Articoli Completi</h3>
                <p class="text-muted small mb-0">Scrivi idee, formatta il testo e condividi contenuti associati al tuo profilo autore.</p>
            </div>
            <div class="col-12 col-md-5 text-center p-3 border border-light shadow-sm rounded-4 bg-white mx-2">
                <div class="fs-1 text-success mb-2"><i class="bi bi-tags"></i></div>
                <h3 class="h5 fw-bold">Vendi Prodotti</h3>
                <p class="text-muted small mb-0">Imposta prezzi, carica immagini di copertina e gestisci le schede del tuo store digitale.</p>
            </div>
        </div>
    </div>
</x-layout>
