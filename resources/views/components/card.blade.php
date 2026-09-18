<div class="card shadow-sm border-0 custom-card h-100">

    @if(isset($image))
        <img src="{{ $image }}" class="card-img-top" alt="Immagine articolo">
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>

</div>
