<?php

namespace App\Http\Controllers;

use App\AsmaulHusna;
use App\Dua;
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
    public function dua()
    {
        $duas = Dua::get();

        SEO::setTitle('Islamic duas');
        SEO::setDescription("Islamic Duas for our Childrens and Parents");
        return view('names.dua', compact('duas'));
    }

    public function asmaulHusna()
    {
        $names = AsmaulHusna::get();
        SEO::setTitle('99 Beautiful names of Allah');
        SEO::setDescription("Asma means names, and husna means beautiful. Thus asma al husna means the beautiful names of Allah Subhanah");
        return view('names.asma_ul_husna', compact('names'));
    }
    public function comments()
    {
        return view('pages.comments');
    }
}
