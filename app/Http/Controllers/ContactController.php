<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function sendmessage(Request $request)
    {

        Mail::to('info@vambleapartments.com')->send(new ContactMail($request->all()));
        return redirect()->back()->with('success', 'Mail sent');
    }
}
