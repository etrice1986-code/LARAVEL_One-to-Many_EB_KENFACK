<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // Campi del modello abilitati al Mass Assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'img',
        'user_id' // L'ID dell'utente che ha creato il prodotto
    ];

    /**
     * Ottiene l'utente a cui appartiene il prodotto.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
