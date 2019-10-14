<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class PageController extends Controller
{
    public function aqeeqa()
    {
    	SEOTools::setTitle('Aqiqah is a Sunnah Muakkadah');
        SEOTools::setDescription("What is Aqeeqah, is it compulsory with the birth of a child? How soon should it be arranged?");
        return view('pages.aqeeqa');
    }
    public function tasmiyah()
    {
    	SEOTools::setTitle('Why Muslims Use Good and Meaningful Name');
        SEOTools::setDescription("Why Muslim Choose good meaningful names for their children");
        return view('pages.tasmiyah');
    }
    public function circumcision()
    {
    	SEOTools::setTitle('Circumcision in Islam');
        SEOTools::setDescription("Circumcision is a Sunnat for males between the ages of 7 to 12 years");
        return view('pages.circumcision');
    }
    public function privacy()
    {
    	SEOTools::setTitle('Privacy & Policy');
        SEOTools::setDescription("Terms and conditions for using our website names4muslims.com");
        return view('pages.privacy');
    }

}
