<x-layout :title="'Modifica: ' . $post->title">

    <h1 class="fw-bold mb-4">Modifica Articolo</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control" 
                   value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contenuto</label>
            <textarea name="content" rows="6" class="form-control" required>
                {{ $post->content }}
            </textarea>
        </div>


        <div class="mb-3">
            <label class="form-label">Immagine</label>
            <input type="file" name="image" class="form-control">

            @if($post->image)
             <img src="{{ asset('storage/' . $post->image) }}" class="mt-3" width="200">
            @endif
        </div>


        <button class="btn btn-warning">Aggiorna</button>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">
            Annulla
        </a>
    </form>

</x-layout>
