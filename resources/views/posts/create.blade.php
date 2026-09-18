<x-layout title="Crea un nuovo articolo">

    <h1 class="fw-bold mb-4">Nuovo Articolo</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contenuto</label>
            <textarea name="content" rows="6" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Immagine</label>
            <input type="file" name="image" class="form-control">
        </div>


        <button class="btn btn-success">Salva</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Annulla</a>
    </form>

</x-layout>
