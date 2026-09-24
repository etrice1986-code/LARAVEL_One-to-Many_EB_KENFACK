<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

/**
 * Gestisce la registrazione di un nuovo utente.
 */
public function register(Request $request)
{
    
    $request->validate([
        'name'     => ['required', 'string', 'max:255'],
        'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'], 
    ]);

    
    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password), 
    ]);


    Auth::login($user);

    return redirect()->route('article.index')->with('message', 'Registrazione completata con successo!');
}

    /**
     * Gestisce il tentativo di login dell'utente.
     */
    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('article.index')->with('message', 'Accesso effettuato con successo!');
        }

        
        return back()->withErrors([
            'email' => 'Le credenziali inserite non sono corrette.',
        ])->onlyInput('email');
    }

    /**
     * Gestisce il logout dell'utente.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Disconnessione effettuata.');
    }
}
