<div class="card border-0 shadow-sm rounded-4 overflow-hidden w-100 d-flex flex-column h-100 product-hover-card" style="transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;">
  
  <!-- wrapper immagine  -->
  <div style="height: 220px; width: 100%; overflow: hidden;">
     <img 
    src="{{ $product->img ? Storage::url($product->img) : asset('storage/default.pngg') }}" 
    class="card-img-top" 
    alt="{{ $product->name }}"
    >

  </div>

  <div class="card-body p-4 d-flex flex-column flex-grow-1">
    <h5 class="card-title fw-bold text-dark text-truncate mb-1">{{ $product->name }}</h5>
    <p class="card-text text-secondary small flex-grow-1">{{ Str::limit($product->description, 70) }}</p>
    <p class="fs-4 fw-bold text-success mb-3 mt-auto">{{ $product->price }} €</p>
    
    <div class="d-grid gap-2">
        <a href="{{ route('product.show', $product) }}" class="btn btn-primary rounded-pill fw-semibold btn-sm">Dettaglio Prodotto</a>
        
    </div>
  </div>
</div>

