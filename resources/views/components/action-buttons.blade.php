
<div class="action-buttons d-flex flex-column gap-2 align-items-stretch mt-3">
    @if(isset($item->price))
        <a href="{{ route('product.edit', $item) }}" class="btn btn-edit btn-sm bg-warning w-100">Modifica</a>
        
        <form action="{{ route('product.destroy', $item) }}" method="POST"
              onsubmit="return confirm('Sei sicuro di voler eliminare questo prodotto?');" class="w-100">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete btn-sm bg-danger w-100">Elimina</button>
        </form>
    @else
        <a href="{{ route('articles.edit', $item) }}" class="btn btn-edit btn-sm bg-warning text-dark fw-semibold w-100">Modifica</a>
        <form action="{{ route('articles.destroy', $item) }}" method="POST"
              onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?');" class="w-100">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete btn-sm bg-danger text-white w-100">Elimina</button>
        </form>
    @endif
</div>
