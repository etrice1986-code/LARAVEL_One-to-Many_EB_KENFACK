<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; 

class ArticleController extends Controller
{
    /**
     * Mostra la lista di tutti gli articoli.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles')); 
    }

    /**
     * Mostra il form per creare un nuovo articolo.
     */
    public function create()
    {
        return view('articles.create'); 
    }

    
       /**
     * Salva un nuovo articolo nel database.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'body' => 'required|string',
        'img' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('img')) {
        $img = $request->file('img')->store('img', 'public');
    } else {
        $img = 'img/default.png'; 
    }

    Article::create([
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'body' => $request->body,
        'img' => $img, 
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('article.index')->with('message', 'Articolo creato con successo!');
}

    /**
     * Mostra il dettaglio di un singolo articolo.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article')); 
    }

        /**
     * Mostra il form di modifica per un articolo.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Aggiorna l'articolo nel database.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'body' => 'required|string',
            'img' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store('img', 'public');
        } else {
            $img = $article->img; 
        }

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'img' => $img,
        ]);

        return redirect()->route('article.index')->with('message', 'Articolo modificato con successo!');
    }

    /**
     * Elimina l'articolo.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('message', 'Articolo eliminato con successo!');
    }

}
