<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Industry;

class IndustryController extends Controller {
    public function index() {
        $industries = Industry::where('status', 'published')->get();
        return view('pages.industries.index', compact('industries'));
    }
    public function show(Industry $industry) {
        abort_if($industry->status !== 'published', 404);
        return view('pages.industries.show', compact('industry'));
    }
}