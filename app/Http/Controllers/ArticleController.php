<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        if (!session()->has('profil_id') || !session()->has('profil_email')) {
            return redirect()->route('profil')->with('error', 'Vous devez être connecté.');
        }
        $articles = Article::paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        if (!session()->has('profil_id') || !session()->has('profil_email')) {
            return redirect()->route('profil')->with('error', 'Vous devez être connecté.');
        }
        return view('articles.create');
    }

    public function store(Request $request)
    {
        if (!session()->has('profil_id') || !session()->has('profil_email')) {
            return redirect()->route('profil')->with('error', 'Vous devez être connecté.');
        }
        Article::create($request->validate([
            'titre' => 'required',
            'contenu' => 'required'
        ]));
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        if (!session()->has('profil_id') || !session()->has('profil_email')) {
            return redirect()->route('profil')->with('error', 'Vous devez être connecté.');
        }
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        if (!session()->has('profil_id') || !session()->has('profil_email')) {
            return redirect()->route('profil')->with('error', 'Vous devez être connecté.');
        }
        $article->update($request->validate([
            'titre' => 'required',
            'contenu' => 'required'
        ]));
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        if (!session()->has('profil_id') || !session()->has('profil_email')) {
            return redirect()->route('profil')->with('error', 'Vous devez être connecté.');
        }
        $article->delete();
        return redirect()->route('articles.index');
    }
}

