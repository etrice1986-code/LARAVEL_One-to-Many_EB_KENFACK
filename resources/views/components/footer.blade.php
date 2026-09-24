<footer class="bg-dark text-light py-4 mt-5 border-top border-secondary">
    <div class="container text-center">

        <h6 class="fw-bold mb-2" style="color:#0ff; text-shadow:0 0 8px #0ff;">
            MyBlog
        </h6>

        <p class="mb-1 text-secondary">
            Mio‑blog Laravel — Selfwork One-to-Many
        </p>

        <small class="text-secondary">
            © 2026 — Creato da Etrice
        </small>

        <div class="mt-3">
            <a href="{{ route('home') }}" class="text-light mx-2">Home</a>
            <a href="{{ route('posts.index') }}" class="text-light mx-2">Articoli</a>
            <a href="{{ route('posts.create') }}" class="text-light mx-2">Nuovo Articolo</a>
        </div>

    </div>
</footer>
