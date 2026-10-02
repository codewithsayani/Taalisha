<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CaseStudy;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\Technology;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch data for the homepage
        $services = Service::where('status', 'published')->orderBy('display_order')->take(6)->get();
        $caseStudies = CaseStudy::where('status', 'published')->latest()->take(3)->get();
        $testimonials = Testimonial::where('status', 'approved')->orderBy('display_order')->take(4)->get();
        $insights = Article::where('status', 'published')->latest()->take(3)->get();
        $technologies = Technology::orderBy('display_order')->get()->groupBy('category');

        return view('public.home', compact('services', 'caseStudies', 'testimonials', 'insights', 'technologies'));
    }

    public function about()
    {
        return view('public.about');
    }
}
