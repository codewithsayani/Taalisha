<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Technology;

class TechnologyController extends Controller {
    public function index() {
        $technologies = Technology::orderBy('category')->get();
        return view('pages.technologies.index', compact('technologies'));
    }
    public function show(Technology $technology) {
        return view('pages.technologies.show', compact('technology'));
    }
}