<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Name;
use App\Hit;
use Artesaos\SEOTools\Facades\SEOTools;
use App\NameRating;
use Carbon\Carbon;
class NameController extends Controller
{
    public function __construct()
    {
        SEOTools::setTitle('Muslim Names with Meaning');
        SEOTools::setDescription('Muslim names and their meanings. Choose modern, traditional, unique and beautiful Islamic name for your baby.');

        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addImage('/img/foots_sm.png', ['height' => 259, 'width' => 300]);
        SEOTools::twitter()->setSite('@names4muslims');
        SEOTools::jsonLd()->addImage('/img/foots_sm.png');


    }
    public function index()
    {
        SEOTools::setTitle('Muslim Baby Names | Islamic Baby Names | Arabic Baby Names');
        SEOTools::setDescription("Islamic baby names. Muslim baby names and their meanings in alphabetical order");
        //SEOTools::addKeyword(['muslim baby names', 'unique muslim baby names', 'new unique muslim names']);
        $names = Name::orderBy('name', 'asc')->Paginate(45);
        if($names->currentPage() > 1)
        {
            SEOTools::setTitle('Muslim Baby Names Page - '.$names->currentPage());
            SEOTools::setDescription("Islamic baby names. Muslim baby names and their meanings in alphabetical order Showing Page - ".$names->currentPage());
        }
        return view('names.muslim-names', compact('names'));
    }
    public function girls()
    {
        SEOTools::setTitle('Muslim Girl Names With Meanings');
        SEOTools::setDescription("Muslim girl baby names with their meanings, choose a unique and beautiful name for your cute baby girl.");
        //SEOTools::addKeyword(['Muslim Names','muslim girl names', 'muslim girls names', 'baby girls names', 'islamic girl names', 'islamic baby names', 'popular girl names', 'uk muslim girl name']);
        $data['page_title'] = 'Muslim Baby Girl Names';
        $names = Name::where('gender','Girl')->orderBy('name', 'asc')->paginate(25);
        if($names->currentPage() > 1)
        {
            SEOTools::setTitle('Muslim Baby Girl Names Page - '.$names->currentPage());
            SEOTools::setDescription("Muslim Girl Baby Names with Meanings, Choose a Unique and Beautiful Name for Your Cute Baby Girl Showing Page - ".$names->currentPage());
        }
        return view('names.baby-girls', compact('names', 'data'));
    }
    public function boys()
    {
        SEOTools::setTitle('Muslim Baby Boy Names | Islamaic Boy Names | Arabic Boy Names | Baby Boy Names with Meaning');
        SEOTools::setDescription("Muslim boy names and their meanings, a comprehensive list of unique and beautiful Muslim Baby Boy Names.");
        //SEOTools::addKeyword(['Muslim Names','Baby Names','names for boys', 'muslim boy names', 'baby boy names', 'baby boys name', 'beautiful boy name', 'beautiful boy names', 'uk muslim boy name']);
        $data['page_title'] = 'Muslim Baby Boy Names';
        //$data['isAdmin'] = auth()->user()->hasPermission('browse_admin');
        $names = Name::where('gender','Boy')->orderBy('name', 'asc')->paginate(25);
        if($names->currentPage() > 1)
        {
            SEOTools::setTitle('Muslim Baby Boy Names Page - '.$names->currentPage());
            SEOTools::setDescription("Muslim Boy Names and Their Meanings, a Comprehensive List of Unique and Beautiful Muslim Baby Boy Names Showing Page - ".$names->currentPage());
        }
        return view('names.baby-boys', compact('names','data'));
    }
    public function info($slug)
    {
        $names = Name::where('slug', '=', $slug)->firstOrFail();
        $id = $names->id;
        $description = $names->meta_description;
        $mng = str_limit($names->meaning, 50);
        $slug = strtolower($slug);
        $canonical = 'https://www.names4muslims.com/name/'. str_slug($slug) .'.html';
        $default = $names->name.' is a  Muslim '.$names->gender .' Name. '.$names->name.' Meaning is '. strip_tags($mng);
        $txt = is_null($description) ? $default : $description;
        $hit = new hit;
        $hit->name_id = $id;
        $hit->save();
        //$names->visits()->increment();

        SEOTools::setTitle('Meaning of Name '.$names->name);
        SEOTools::setDescription($txt);
        //SEOTools::addKeyword(['muslim baby names', 'unique muslim baby names', 'new unique muslim names']);
        return view('names.info', compact('names','canonical'));

    }
    public function boysLetters()
    {
        SEOTools::setTitle('Boy Names Starting With Letters');
        SEOTools::setDescription("Islamic/Muslim Baby Boy Names are listed in alphabetical order, so you can find baby boy names starting with letters of the alphabet");

        return view('names.boys_letters');
    }
    public function girlsLetters()
    {
        SEOTools::setTitle('Girl Names Starting With Letters');
        SEOTools::setDescription("Muslim Baby Girl Names are listed in alphabetical order, it is easy to find baby girl names begining with letters of the alphabet");
        return view('names.girls_letters');
    }
    public function boysAlphabet($c)
    {
        $C = ucfirst($c);
        SEOTools::setTitle('Muslim Boy Names Starting With '. $C );
        SEOTools::setDescription("Looking for Muslim Baby Boy Names starting with letter " .$C.". Please look at our alphabetical list of baby boy names beginning with the letter " .$C);

        $names = Name::where([['gender','=','Boy'],['name','LIKE',$c.'%']])->paginate(25);
        $key = $c;
        if($names->currentPage() > 1)
        {
            SEOTools::setTitle("Muslim Baby Boy Names Starting With '$C' - Page ".$names->currentPage());
            SEOTools::setDescription("Comprehensive List of Unique and Beautiful Muslim Baby Boy Names Starting With '$C' Showing Page - ".$names->currentPage());
        }
        return view('names.boys_alphabet',compact('names','key'));
    }
    public function girlsAlphabet($c)
    {
        $C = ucfirst($c);
        SEOTools::setTitle('Muslim Girl Names Starting With '.$C);
        SEOTools::setDescription("Looking for Muslim Baby Girl Names Starting With Letter " .$C. ". Look no furhter, here is the list of baby girl names beginning with the letter ". $C );

        $names = Name::where([['gender','=','Girl'],['name','LIKE',$c.'%']])->paginate(25);
        $key = $c;
        if($names->currentPage() > 1)
        {
            SEOTools::setTitle("Muslim Baby Girl Names Starting With '$C' - Page ".$names->currentPage());
            SEOTools::setDescription("Complete name list of Muslim baby girl names beginning with the alphabet '$C' - page ".$names->currentPage());
        }
        return view('names.girls_alphabet',compact('names','key'));
    }
    public function namesAlphabet($c)
    {
        $C = ucfirst($c);
        SEOTools::setTitle('Muslim Baby Names Starting With '.$C);
        SEOTools::setDescription("Looking for Muslim baby names starting with letter " .$C .". Take a look at our boys and girls names beginning with alphabet ". $C );

        $names = Name::where('name','like', $c.'%')->paginate(25);
        $key = $c;
        if($names->currentPage() > 1)
        {
            SEOTools::setTitle("Muslim Baby Names Starting With '$C' - Page ".$names->currentPage());
            SEOTools::setDescription("Boys and Girls Names Beginning With Alphabet '$C' - page ".$names->currentPage());
        }
        return view('names.names_alphabet',compact('names','key'));
    }
    //RANDOM NAMES
    public function randomNames()
    {
        SEOTools::setTitle('Generate a list of Random Baby Names');
        SEOTools::setDescription("The random name generator can suggest names for your babies");

        $collection = Name::all();
        $names = $collection->random(10);
        return view('names.random', compact('names'));
    }
    public function randomGirls()
    {
        SEOTools::setTitle('List of random Muslim girl names');
        SEOTools::setDescription("The Girls random name generator can suggest names for baby girls");

        $collection = Name::where('gender','Girl')->get();
        $names = $collection->random(10);
        return view('names.random_girls', compact('names'));
    }
    public function randomBoys()
    {
        SEOTools::setTitle('List of random Muslim boy names');
        SEOTools::setDescription("The Boys random name generator can suggest names for baby boys");

        $collection = Name::where('gender','Boy')->get();
        $names = $collection->random(10);
        return view('names.random_boys', compact('names'));
    }
    public function popularNames()
    {
        SEOTools::setTitle('Most Popular Names');
        SEOTools::setDescription("Popular Islamic baby names and their meanings, Muslim baby names are sorted by it's popularity.");

        $names = NameRating::where('total_value', '>', '500')->orderBy('total_value', 'desc')->paginate(25);
        if($names->currentPage() > 1)
        {
            SEOTools::setTitle('Muslim Popular Names - Page '.$names->currentPage());
            SEOTools::setDescription("Popular Muslim baby names and their meanings - page ".$names->currentPage());
        }
       //dd($names);
        return view('names.most_popular', compact('names'));
    }

}
