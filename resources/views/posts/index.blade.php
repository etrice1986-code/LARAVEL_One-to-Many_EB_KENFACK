<x-layout title="Lista Articoli">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Articoli</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Nuovo Articolo</a>
    </div>

    @if ($posts->count())
        <div class="row g-4">
                  @foreach($posts as $post)
    <div class="col-12 col-md-4 d-flex justify-content-center">
        {{-- Struttura HTML diretta per il Post, senza usare <x-card> --}}
        <div class="card my-3 py-0" style="width: 18rem;">
            {{-- Se i post hanno un'immagine, mostrala, altrimenti usa quella di default --}}
            <img src="{{ Storage::url($post->img ?? 'img/default.png') }}" class="card-img-top" alt="...">
            
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                <a href="#" class="btn btn-secondary btn-sm">Leggi Post</a>
            </div>
        </div>
    </div>
@endforeach


        </div>
    @else
        <p class="text-muted">Non ci sono articoli.</p>
    @endif

</x-layout>
