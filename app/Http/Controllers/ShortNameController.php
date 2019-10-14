<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Name;
use Helori\LaravelSeo\Facades\Seo;
class ShortNameController extends Controller
{
    public function index()
    {
        Seo::set('title', 'Short Muslim Baby Names');
        Seo::set('description', "Short and Cute Muslim Baby Names. Easy to Remember and Call");
        $names = Name::whereRaw('LENGTH(name) <6')->orderBy('name', 'asc')->paginate(25);
        return view('names.short_names', compact('names'));
    }
    public function threeLetterBoys()
    {
        Seo::set('title', 'Three Letter Boy Names');
        Seo::set('description', "Three letter name list for Muslim boys");
        $names = Name::whereRaw('LENGTH(name) = 3')->where('gender','Boy')->orderBy('name', 'asc')->paginate(25);
        return view('names.three_letter_boys', compact('names'));
    }
    public function threeLetterGirls()
    {
        Seo::set('title', 'Three Letter Girl Names');
        Seo::set('description', "Three letter name list for Muslim girls");
        $names = Name::whereRaw('LENGTH(name) = 3')->where('gender','Girl')->orderBy('name', 'asc')->paginate(25);
        return view('names.three_letter_girls', compact('names'));
    }
    public function fourLetterBoys()
    {
        Seo::set('title', 'Four Letter Boy Names');
        Seo::set('description', "Four letter name list for Muslim boys");
        $names = Name::whereRaw('LENGTH(name) = 4')->where('gender','Boy')->orderBy('name', 'asc')->paginate(25);
        return view('names.four_letter_boys', compact('names'));
    }
    public function fourLetterGirls()
    {
        Seo::set('title', 'Four Letter Girl Names');
        Seo::set('description', "Four letter name list for Muslim girls");
        $names = Name::whereRaw('LENGTH(name) = 4')->where('gender','Girl')->orderBy('name', 'asc')->paginate(25);
        return view('names.four_letter_girls', compact('names'));
    }
    public function fiveLetterBoys()
    {
        Seo::set('title', 'Five letter Boy Names');
        Seo::set('description', "Five Letter name list for Muslim boys");
        $names = Name::whereRaw('LENGTH(name) = 5')->where('gender','Boy')->orderBy('name', 'asc')->paginate(25);
        return view('names.five_letter_boys', compact('names'));
    }
    public function fiveLetterGirls()
    {
        Seo::set('title', 'Five Letter Girl Names');
        Seo::set('description', "Five letter name list for Muslim girls");
        $names = Name::whereRaw('LENGTH(name) = 5')->where('gender','Girl')->orderBy('name', 'asc')->paginate(25);
        return view('names.five_letter_girls', compact('names'));
    }
}
