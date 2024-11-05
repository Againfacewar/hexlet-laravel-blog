<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
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

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $article = Article::create($data);

        $request->session()->flash('status', 'Статья успешно создана!');

        return redirect()->route('article.index');
    }

    public function edit(Request $request, Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        $article->update($data);
        $request->session()->flash('status', 'Статья успешно отредактирована!');

        return redirect()->route('article.index');
    }

    public function destroy(Request $request, int $id)
    {
        $article = Article::find($id);

        if (isset($article)) {
            $article->delete();
            $request->session()->flash('status', 'Статья успешно удалена!');
        }

        return redirect()->route('article.index');
    }
}
