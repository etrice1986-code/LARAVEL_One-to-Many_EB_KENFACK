<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <-- IMPORTANTE: Importa il modello dei prodotti

class ProductController extends Controller
{


    /**
     * Mostra il dettaglio di un singolo prodotto.
     */
    public function show(Product $product)
    {
        
        return view('product.show', compact('product'));
    }

    /**
     * Mostra la lista di tutti i prodotti.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Mostra il form per creare un nuovo prodotto.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Salva il nuovo prodotto agganciandolo all'utente loggato.
     */
    public function store(Request $request)
    {
        // Validazione base dei dati inseriti nel form
        $request->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
            'price'       => 'required|numeric',
        ]);

        $img = 'img/default.png'; 

        
        if ($request->hasFile('img')) {
            $img = $request->file('img')->store('img', 'public');
        }

        
        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'img'         => $img,
            'user_id'     => auth()->id() 
        ]);

        return redirect()->route('product.index')->with('message', 'Prodotto inserito con successo!');
    }




        /**
     * Mostra il form di modifica per un prodotto.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Aggiorna il prodotto nel database.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'img' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store('img', 'public');
        } else {
            $img = $product->img;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'img' => $img,
        ]);

        return redirect()->route('product.index')->with('message', 'Prodotto modificato con successo!');
    }

    /**
     * Elimina il prodotto.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Prodotto eliminato con successo!');
    }

}
