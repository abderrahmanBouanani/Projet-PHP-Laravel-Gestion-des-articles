<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profil;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function logout()
    {
        session()->flush();
        return redirect()->route('profil')->with('success', 'Déconnexion réussie.');
    }

    public function registerForm()
    {
        return view('inscription');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:profils,email',
                'password' => 'required|confirmed|min:6',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->with('error', $e->validator->errors()->first())->withInput();
        }

        $profil = Profil::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Connexion automatique après inscription
        session(['profil_id' => $profil->id, 'profil_email' => $profil->email]);
        return redirect()->route('articles.index');
    }

    public function show()
    {
        return view('profil');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $profil = Profil::where('email', $request->email)->first();
        if ($profil && Hash::check($request->password, $profil->password)) {
            // Connexion réussie (ici, on peut stocker l'ID dans la session)
            session(['profil_id' => $profil->id, 'profil_email' => $profil->email]);
            return redirect()->route('articles.index'); // Redirige vers la liste des articles
        } else {
            return back()->with('error', 'Identifiants invalides')->withInput();
        }
    }
}

