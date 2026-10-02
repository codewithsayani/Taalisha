<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ServiceController;
use App\Http\Controllers\Public\IndustryController;
use App\Http\Controllers\Public\TechnologyController;
use App\Http\Controllers\Public\CaseStudyController;
use App\Http\Controllers\Public\ArticleController;
use App\Http\Controllers\Public\JobController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\SearchController;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/solutions', [ServiceController::class, 'index'])->name('services.index');
Route::get('/solutions/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/industries', [IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{industry:slug}', [IndustryController::class, 'show'])->name('industries.show');

Route::get('/technologies', [TechnologyController::class, 'index'])->name('technologies.index');
Route::get('/technologies/{technology:slug}', [TechnologyController::class, 'show'])->name('technologies.show');

Route::get('/case-studies', [CaseStudyController::class, 'index'])->name('case-studies.index');
Route::get('/case-studies/{case_study:slug}', [CaseStudyController::class, 'show'])->name('case-studies.show');

Route::get('/insights', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/insights/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/careers', [JobController::class, 'index'])->name('careers.index');
Route::get('/careers/{job:slug}', [JobController::class, 'show'])->name('careers.show');
Route::post('/careers/{job:slug}/apply', [JobController::class, 'apply'])->name('careers.apply');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/search', [SearchController::class, 'index'])->name('search.index');

Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');

Route::post('/newsletter', [HomeController::class, 'newsletter'])->name('newsletter.subscribe');
