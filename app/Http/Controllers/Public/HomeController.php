<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Industry;
use App\Models\Technology;
use App\Models\Article;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {
        $services = Service::where('status', 'published')->orderBy('display_order')->take(6)->get();
        $industries = Industry::where('status', 'published')->take(6)->get();
        $technologies = Technology::take(8)->get();
        $articles = Article::where('status', 'published')->latest('published_at')->take(3)->get();
        return view('pages.home', compact('services', 'industries', 'technologies', 'articles'));
    }
    public function about() {
        return view('pages.about');
    }
    public function privacy() {
        return view('pages.privacy');
    }
    public function terms() {
        return view('pages.terms');
    }
    public function newsletter(Request $request) {
        $request->validate(['email' => 'required|email']);
        NewsletterSubscriber::firstOrCreate(['email' => $request->email]);
        return back()->with('success', 'Subscribed successfully.');
    }
}