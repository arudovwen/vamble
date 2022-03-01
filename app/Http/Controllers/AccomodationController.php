<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class AccomodationController extends Controller
{
    public function index()
    {

        SEOTools::setDescription('Our apartments and suites');
        SEOTools::opengraph()->setUrl('https://vambleapartments.com/accomodations');
        SEOTools::setCanonical('https://vambleapartments.com/accomodations');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@vambleapartments');
        SEOTools::jsonLd()->addImage('https://vambleapartments.com/images/rooms/sitting11.jpg');
        return view('accomodation');
    }
}
