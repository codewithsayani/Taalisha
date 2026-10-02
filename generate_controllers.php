<?php

$dir = __DIR__ . '/app/Http/Controllers/Public';
if (!is_dir($dir)) mkdir($dir, 0755, true);

$controllers = [
    'HomeController' => <<<EOT
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
        \$services = Service::where('status', 'published')->orderBy('display_order')->take(6)->get();
        \$industries = Industry::where('status', 'published')->take(6)->get();
        \$technologies = Technology::take(8)->get();
        \$articles = Article::where('status', 'published')->latest('published_at')->take(3)->get();
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
    public function newsletter(Request \$request) {
        \$request->validate(['email' => 'required|email']);
        NewsletterSubscriber::firstOrCreate(['email' => \$request->email]);
        return back()->with('success', 'Subscribed successfully.');
    }
}
EOT,
    'ServiceController' => <<<EOT
<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller {
    public function index() {
        \$services = Service::where('status', 'published')->orderBy('display_order')->get();
        return view('pages.services.index', compact('services'));
    }
    public function show(Service \$service) {
        abort_if(\$service->status !== 'published', 404);
        return view('pages.services.show', compact('service'));
    }
}
EOT,
    'IndustryController' => <<<EOT
<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Industry;

class IndustryController extends Controller {
    public function index() {
        \$industries = Industry::where('status', 'published')->get();
        return view('pages.industries.index', compact('industries'));
    }
    public function show(Industry \$industry) {
        abort_if(\$industry->status !== 'published', 404);
        return view('pages.industries.show', compact('industry'));
    }
}
EOT,
    'TechnologyController' => <<<EOT
<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Technology;

class TechnologyController extends Controller {
    public function index() {
        \$technologies = Technology::orderBy('category')->get();
        return view('pages.technologies.index', compact('technologies'));
    }
    public function show(Technology \$technology) {
        return view('pages.technologies.show', compact('technology'));
    }
}
EOT,
    'CaseStudyController' => <<<EOT
<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\CaseStudy;

class CaseStudyController extends Controller {
    public function index() {
        \$caseStudies = CaseStudy::where('status', 'published')->latest('published_at')->paginate(12);
        return view('pages.case-studies.index', compact('caseStudies'));
    }
    public function show(CaseStudy \$caseStudy) {
        abort_if(\$caseStudy->status !== 'published', 404);
        return view('pages.case-studies.show', compact('caseStudy'));
    }
}
EOT,
    'ArticleController' => <<<EOT
<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller {
    public function index() {
        \$articles = Article::where('status', 'published')->latest('published_at')->paginate(12);
        return view('pages.articles.index', compact('articles'));
    }
    public function show(Article \$article) {
        abort_if(\$article->status !== 'published', 404);
        return view('pages.articles.show', compact('article'));
    }
}
EOT,
    'JobController' => <<<EOT
<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use App\Services\MediaStorageService;
use Illuminate\Http\Request;

class JobController extends Controller {
    public function index() {
        \$jobs = Job::where('status', 'open')->latest()->get();
        return view('pages.careers.index', compact('jobs'));
    }
    public function show(Job \$job) {
        abort_if(\$job->status !== 'open', 404);
        return view('pages.careers.show', compact('job'));
    }
    public function apply(Request \$request, Job \$job, MediaStorageService \$storage) {
        \$validated = \$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'portfolio_url' => 'nullable|url',
            'privacy_consent' => 'required|accepted'
        ]);
        
        \$resumePath = \$storage->storePrivate(\$request->file('resume'), 'resumes');
        
        JobApplication::create([
            'job_id' => \$job->id,
            'name' => \$validated['name'],
            'email' => \$validated['email'],
            'phone' => \$validated['phone'],
            'resume_path' => \$resumePath,
            'cover_letter' => \$validated['cover_letter'] ?? null,
            'linkedin_url' => \$validated['linkedin_url'] ?? null,
            'github_url' => \$validated['github_url'] ?? null,
            'portfolio_url' => \$validated['portfolio_url'] ?? null,
            'privacy_consent' => true,
            'privacy_consented_at' => now(),
            'status' => 'new'
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }
}
EOT,
    'ContactController' => <<<EOT
<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {
        return view('pages.contact');
    }
    public function submit(Request \$request) {
        \$validated = \$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
            'privacy_consent' => 'required|accepted'
        ]);

        ContactInquiry::create([
            'name' => \$validated['name'],
            'email' => \$validated['email'],
            'phone' => \$validated['phone'] ?? null,
            'company' => \$validated['company'] ?? null,
            'message' => \$validated['message'],
            'privacy_consent' => true,
            'privacy_consented_at' => now(),
            'status' => 'new'
        ]);

        return back()->with('success', 'Thank you for your message. We will be in touch shortly.');
    }
}
EOT,
    'SearchController' => <<<EOT
<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Service;

class SearchController extends Controller {
    public function index(Request \$request) {
        \$query = \$request->input('q');
        if (strlen(\$query) < 3) {
            return view('pages.search', ['results' => [], 'q' => \$query]);
        }
        
        \$articles = Article::where('status', 'published')->where('title', 'like', "%\$query%")->get();
        \$services = Service::where('status', 'published')->where('name', 'like', "%\$query%")->get();
        
        return view('pages.search', [
            'articles' => \$articles,
            'services' => \$services,
            'q' => \$query
        ]);
    }
}
EOT
];

foreach ($controllers as $name => $content) {
    file_put_contents($dir . '/' . $name . '.php', $content);
}
echo "Controllers generated.\n";
