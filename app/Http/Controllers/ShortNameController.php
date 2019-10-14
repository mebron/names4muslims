<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Name;
use Artesaos\SEOTools\Facades\SEOTools;
class ShortNameController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Short Muslim Baby Names');
        SEOTools::setDescription("Short and Cute Muslim Baby Names. Easy to Remember and Call");
        $names = Name::whereRaw('LENGTH(name) <6')->orderBy('name', 'asc')->paginate(25);
        return view('names.short_names', compact('names'));
    }
    public function threeLetterBoys()
    {
        SEOTools::setTitle('Three Letter Boy Names');
        SEOTools::setDescription("Three letter name list for Muslim boys");
        $names = Name::whereRaw('LENGTH(name) = 3')->where('gender','Boy')->orderBy('name', 'asc')->paginate(25);
        return view('names.three_letter_boys', compact('names'));
    }
    public function threeLetterGirls()
    {
        SEOTools::setTitle('Three Letter Girl Names');
        SEOTools::setDescription("Three Letter Girl Names");
        $names = Name::whereRaw('LENGTH(name) = 3')->where('gender','Girl')->orderBy('name', 'asc')->paginate(25);
        return view('names.three_letter_girls', compact('names'));
    }
    public function fourLetterBoys()
    {
        SEOTools::setTitle('Four Letter Boy Names');
        SEOTools::setDescription("Four Letter Boy Names");
        $names = Name::whereRaw('LENGTH(name) = 4')->where('gender','Boy')->orderBy('name', 'asc')->paginate(25);
        return view('names.four_letter_boys', compact('names'));
    }
    public function fourLetterGirls()
    {
        SEOTools::setTitle('Four Letter Girl Names');
        SEOTools::setDescription("Four Letter Girl Names");
        $names = Name::whereRaw('LENGTH(name) = 4')->where('gender','Girl')->orderBy('name', 'asc')->paginate(25);
        return view('names.four_letter_girls', compact('names'));
    }
    public function fiveLetterBoys()
    {
        SEOTools::setTitle('Five letter Boy Names');
        SEOTools::setDescription("Five Letter name list for Muslim boys");
        $names = Name::whereRaw('LENGTH(name) = 5')->where('gender','Boy')->orderBy('name', 'asc')->paginate(25);
        return view('names.five_letter_boys', compact('names'));
    }
    public function fiveLetterGirls()
    {
        SEOTools::setTitle('Five Letter Girl Names');
        SEOTools::setDescription("Five Letter Girl Names");
        $names = Name::whereRaw('LENGTH(name) = 5')->where('gender','Girl')->orderBy('name', 'asc')->paginate(25);
        return view('names.five_letter_girls', compact('names'));
    }
}
