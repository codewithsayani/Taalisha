<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller {
    public function index() {
        $services = Service::where('status', 'published')->orderBy('display_order')->get();
        return view('pages.services.index', compact('services'));
    }
    public function show(Service $service) {
        abort_if($service->status !== 'published', 404);
        return view('pages.services.show', compact('service'));
    }
}