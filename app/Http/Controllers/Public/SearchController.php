<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Service;

class SearchController extends Controller {
    public function index(Request $request) {
        $query = $request->input('q');
        if (strlen($query) < 3) {
            return view('pages.search', ['results' => [], 'q' => $query]);
        }
        
        $articles = Article::where('status', 'published')->where('title', 'like', "%$query%")->get();
        $services = Service::where('status', 'published')->where('name', 'like', "%$query%")->get();
        
        return view('pages.search', [
            'articles' => $articles,
            'services' => $services,
            'q' => $query
        ]);
    }
}