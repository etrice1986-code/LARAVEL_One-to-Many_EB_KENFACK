<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Questa proprietà definisce i campi del modello che possono essere scritti
    protected $fillable = ['title', 'subtitle', 'body', 'img', 'user_id']; //  Aggiunto user_id

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
