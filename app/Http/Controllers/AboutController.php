<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class AboutController extends Controller
{

    public function index()
    {

        SEOTools::setTitle('About us');
        SEOTools::setDescription('About Vamble apartments and suites');
        SEOTools::opengraph()->setUrl('https://vambleapartments.com/about');
        SEOTools::setCanonical('https://vambleapartments.com/about');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@vambleapartments');
        SEOTools::jsonLd()->addImage('https://vambleapartments.com/images/rooms/sitting11.jpg');
        return view('about');
    }
}
