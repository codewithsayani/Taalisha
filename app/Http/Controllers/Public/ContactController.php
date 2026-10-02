<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {
        return view('pages.contact');
    }
    public function submit(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
            'privacy_consent' => 'required|accepted'
        ]);

        ContactInquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'message' => $validated['message'],
            'privacy_consent' => true,
            'privacy_consented_at' => now(),
            'status' => 'new'
        ]);

        return back()->with('success', 'Thank you for your message. We will be in touch shortly.');
    }
}