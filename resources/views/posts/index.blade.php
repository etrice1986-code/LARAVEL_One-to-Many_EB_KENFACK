<x-layout title="Lista Articoli">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Articoli</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Nuovo Articolo</a>
    </div>

    @if ($posts->count())
        <div class="row g-4">

            @foreach ($posts as $post)
                <div class="col-md-4">

                    <x-card image="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/600/400?random=' . $post->id }}">

                        <h5 class="fw-bold">{{ $post->title }}</h5>

                        <p class="text-muted" style="font-size: 0.9rem;">
                            Creato il {{ $post->created_at->format('d/m/Y') }}
                        </p>

                        <p>{{ Str::limit($post->content, 120) }}</p>

                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">
                            Leggi
                        </a>
                    </x-card>

                </div>
            @endforeach

        </div>
    @else
        <p class="text-muted">Non ci sono articoli.</p>
    @endif

</x-layout>
