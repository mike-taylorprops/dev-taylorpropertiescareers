<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function whyTaylor()
    {
        return view('pages.why-taylor');
    }

    public function commissionPlans(Request $request)
    {
        return view('pages.commission-plans');
    }

    public function compare()
    {
        return view('pages.compare');
    }

    public function referralCompany()
    {
        return view('pages.referral-company');
    }

    public function mentoring()
    {
        return view('pages.mentoring');
    }

    public function technology()
    {
        return view('pages.technology');
    }

    public function aboutUs()
    {
        return view('pages.about-us');
    }

    public function ourStaff()
    {
        $employees = Employee::forWebsite()->get();

        return view('pages.our-staff', compact('employees'));
    }

    public function teams()
    {
        return view('pages.teams');
    }

    public function contactUs()
    {
        return view('pages.contact-us');
    }

    public function join(Request $request)
    {
        $program = $request->query('program');

        return view('pages.join', compact('program'));
    }

    public function joinFormSubmitted(Request $request)
    {
        $firstName = $request->query('first_name');

        if ($firstName) {
            $decoded = base64_decode($firstName, true);
            $firstName = $decoded !== false ? $decoded : $firstName;
        }

        return view('pages.join-form-submitted', compact('firstName'));
    }
}
