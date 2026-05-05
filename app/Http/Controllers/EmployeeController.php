<?php

namespace App\Http\Controllers;

use App\Mail\EmailEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function emailEmployee(Request $request)
    {
        $details = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:160',
            'phone' => 'nullable|string|max:40',
            'message' => 'required|string|max:5000',
            'to_name' => 'required|string|max:120',
            'to_email' => 'required|email|max:160',
        ]);

        Mail::to($details['to_email'])
            ->send(new EmailEmployee($details));

        return response()->json([
            'status' => 'success',
            'message' => 'Your message was sent.',
        ]);
    }
}
