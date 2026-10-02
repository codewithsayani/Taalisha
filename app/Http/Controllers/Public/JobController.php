<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use App\Services\MediaStorageService;
use Illuminate\Http\Request;

class JobController extends Controller {
    public function index() {
        $jobs = Job::where('status', 'open')->latest()->get();
        return view('pages.careers.index', compact('jobs'));
    }
    public function show(Job $job) {
        abort_if($job->status !== 'open', 404);
        return view('pages.careers.show', compact('job'));
    }
    public function apply(Request $request, Job $job, MediaStorageService $storage) {
        $validated = $request->validate([
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
        
        $resumePath = $storage->storePrivate($request->file('resume'), 'resumes');
        
        JobApplication::create([
            'job_id' => $job->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'resume_path' => $resumePath,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'github_url' => $validated['github_url'] ?? null,
            'portfolio_url' => $validated['portfolio_url'] ?? null,
            'privacy_consent' => true,
            'privacy_consented_at' => now(),
            'status' => 'new'
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }
}