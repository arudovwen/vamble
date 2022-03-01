<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class ServiceController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Our Services');
        SEOTools::setDescription('Services we offer at Vamble apartments and suites');
        SEOTools::opengraph()->setUrl('https://vambleapartments.com/services');
        SEOTools::setCanonical('https://vambleapartments.com/services');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@vambleapartments');
        SEOTools::jsonLd()->addImage('https://vambleapartments.com/images/rooms/sitting11.jpg');
        return view('services');
    }
}
