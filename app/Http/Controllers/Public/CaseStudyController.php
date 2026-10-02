<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\CaseStudy;

class CaseStudyController extends Controller {
    public function index() {
        $caseStudies = CaseStudy::where('status', 'published')->latest('published_at')->paginate(12);
        return view('pages.case-studies.index', compact('caseStudies'));
    }
    public function show(CaseStudy $caseStudy) {
        abort_if($caseStudy->status !== 'published', 404);
        return view('pages.case-studies.show', compact('caseStudy'));
    }
}