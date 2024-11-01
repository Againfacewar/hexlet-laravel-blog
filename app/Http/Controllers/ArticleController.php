<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::paginate();
        $flash = $request->session()->get('status');
        return view('article.index', compact('articles', 'flash'));
    }

    public function show(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        return view('article.show', compact('article'));
    }

    public function create(Request $request)
    {
        $article = new Article();

        return view('article.create', compact('article'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'name' => 'required|unique:articles',
           'body' => 'required|min:10'
        ]);

        $article = Article::create($data);

        $request->session()->flash('status', 'Статья успешно создана!');

        return redirect()->route('article.index');
    }
}
