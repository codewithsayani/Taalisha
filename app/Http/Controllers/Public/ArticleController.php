<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller {
    public function index() {
        $articles = Article::where('status', 'published')->latest('published_at')->paginate(12);
        return view('pages.articles.index', compact('articles'));
    }
    public function show(Article $article) {
        abort_if($article->status !== 'published', 404);
        return view('pages.articles.show', compact('article'));
    }
}