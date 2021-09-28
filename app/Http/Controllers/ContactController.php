<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function sendmessage(Request $request)
    {

        Mail::to('succy2010@gmail.com')->send(new ContactMail($request->all()));
        return redirect()->back()->with('success', 'Mail sent');
    }
}
