<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/why-taylor', [PageController::class, 'whyTaylor'])->name('why-taylor');
Route::get('/commission-plans', [PageController::class, 'commissionPlans'])->name('commission-plans');
Route::get('/compare', [PageController::class, 'compare'])->name('compare');
Route::get('/referral-company', [PageController::class, 'referralCompany'])->name('referral-company');
Route::get('/mentoring', [PageController::class, 'mentoring'])->name('mentoring');
Route::get('/technology', [PageController::class, 'technology'])->name('technology');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
Route::get('/our-staff', [PageController::class, 'ourStaff'])->name('our-staff');
Route::get('/teams', [PageController::class, 'teams'])->name('teams');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact-us');
Route::get('/join', [PageController::class, 'join'])->name('join');
Route::get('/join-form-submitted', [PageController::class, 'joinFormSubmitted'])->name('join-form-submitted');

Route::post('/email-employee', [EmployeeController::class, 'emailEmployee'])->name('email-employee');

Route::get('/sitemap.xml', function () {
    $routes = ['home', 'why-taylor', 'commission-plans', 'compare', 'referral-company', 'mentoring', 'technology', 'about-us', 'our-staff', 'teams', 'contact-us', 'join'];
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($routes as $name) {
        $xml .= '  <url><loc>' . route($name) . '</loc><changefreq>weekly</changefreq></url>' . "\n";
    }
    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
