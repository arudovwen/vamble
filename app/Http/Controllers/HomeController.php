<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('A Home Away From Home');
        SEOTools::setDescription('Vamble Apartments and Suites is a sweet spot to relax and enjoy the splendor and exquisite feeling of a home away from home.');
        SEOTools::opengraph()->setUrl('https://vambleapartments.com');
        SEOTools::setCanonical('https://vambleapartments.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@vambleapartments');
        SEOTools::jsonLd()->addImage('https://vambleapartments.com/logo.png');

        return view('welcome');
    }
}
