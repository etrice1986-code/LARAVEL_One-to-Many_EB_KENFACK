
<div class="action-buttons d-flex gap-2 align-items-center mt-3">
    @if(isset($item->price))
        <a href="{{ route('product.edit', $item) }}" class="btn btn-edit btn-sm bg-warning">Modifica</a>
        <form action="{{ route('product.destroy', $item) }}" method="POST"
              onsubmit="return confirm('Sei sicuro di voler eliminare questo prodotto?');" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete btn-sm bg-danger">Elimina</button>
        </form>
    @else
        <a href="{{ route('articles.edit', $item) }}" class="btn btn-edit btn-sm bg-warning text-dark fw-semibold">Modifica</a>

        <form action="{{ route('articles.destroy', $item) }}" method="POST"
              onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?');" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete btn-sm bg-danger text-white">Elimina</button>
        </form>
    @endif
</div>
