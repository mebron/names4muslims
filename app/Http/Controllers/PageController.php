<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Seo;

class PageController extends Controller
{
    public function aqeeqa()
    {
    	Seo::set('title','Aqiqah is a Sunnah Muakkadah');
    	Seo::set('description','What is Aqeeqah, is it compulsory with the birth of a child? How soon should it be arranged?');
        return view('pages.aqeeqa');
    }
    public function tasmiyah()
    {
    	Seo::set('title', 'Meaning of Muslim Name');
        Seo::set('description', "Why Muslim Choose good meaningful names for their children");
        return view('pages.tasmiyah');
    }
    public function circumcision()
    {
    	Seo::set('title', 'Circumcision in Islam');
        Seo::set('description', "Circumcision is a Sunnat for males between the ages of 7 to 12 years");
        return view('pages.circumcision');
    }
    public function privacy()
    {
    	Seo::set('title', 'Privacy & Policy');
    	Seo::set('description','Terms and conditions for using our website names4muslims.com');
        return view('pages.privacy');
    }

}
