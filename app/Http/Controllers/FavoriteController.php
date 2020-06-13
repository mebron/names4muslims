<?php

namespace App\Http\Controllers;

use Alert;
use App\DailyFavoriteHit;
use App\Events\FavoriteEvent;
use App\Favorite;
use App\FavoriteHit;
use App\Mail\SendNames;
use App\Mail\SendSaved;
use App\Name;
use App\User;
use Carbon\Carbon;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;

class FavoriteController extends Controller
{

    public function __construct()
    {
        SEOTools::setTitle('Muslim Names With Meaning');
        SEOTools::setDescription('Muslim names and their meanings. Choose modern, traditional, unique and beautiful Islamic name for your baby.');

    }

    public function index(Request $request)
    {
        SEOTools::setTitle('My Favorite Names');
        SEOTools::setDescription('My saved favorite names');
        $names = null;
        if (Auth::check()) {
            $names = Auth::user()->favorites;
        } else {
            $favs = $request->session()->get('favorites');
            if (isset($favs)) {
                $names = Name::whereIn('id', $favs)->get();
            }
        }

        return view('names.favorites', compact('names'));
    }
    public function getFavorites(Request $request)
    {

        $names = array();
        if (Auth::check()) {
            $names = Auth::user()->favorites;
        } else {
            $favs = $request->session()->get('favorites');
            if (isset($favs)) {
                $names = Name::whereIn('id', $favs)->get();
            }
        }

        return view('ajax.favorites', compact('names'));
    }
    //for registered member
    public function favorite(Request $request)
    {
        $id    = $request->name;
        $count = $this->totalSavedNames();
        if ($count >= 100) {
            //Alert::error('Sorry maximum 100 names you can save', 'Oops!');
            return false;
        }
        Auth::user()->entries()->attach($id);
        $this->hit($id);
        return $count;
    }
    public function unFavorite(Request $request)
    {
        Auth::user()->entries()->detach($request->name);
        // return back();
    }
    //for guest
    public function favoriteTemp(Request $request)
    {
        $favorites = array();
        $id        = $request->name;
        $favorites = $request->session()->get('favorites');
        $count     = 0;
        if (isset($favorites)) {
            $count = count($favorites) + 1;
            if ($count >= 50) {
                //Alert::error('Sorry maximum 100 names you can save', 'Oops!');
                $msg = "Maximum";
                return $msg;
            }
        }
        if (@!in_array($id, $favorites)) {
            $favorites[] += $id;
        }
        $request->session()->put('favorites', $favorites);
        $this->hit($id);
        $this->dailyHits($id);
        //$this->sendToPusher($id);
        return $count;
    }
    public function unFavoriteTemp(Request $request)
    {
        $id = $request->name;
        //$request->session()->forget('favorites.124');
        $favorites = $request->session()->get('favorites');
        if (($key = array_search($id, $favorites)) !== false) {
            unset($favorites[$key]);
        }
        $request->session()->put('favorites', $favorites);
        return back();
    }
    // for guest
    public function isFavorited(Request $request)
    {
        $id  = $request->name;
        $key = array_search($id, $request->session()->get('favorites')) ? 'true' : 'false';
        return $key;
    }
    public function hit($id)
    {
        $hits = FavoriteHit::where('name_id', $id)->first();
        if (isset($hits)) {
            $hits->increment('hits', 1);
        } else {
            FavoriteHit::firstOrCreate(['name_id' => $id, 'hits' => '1']);
        }
    }
    public function dailyHits($id)
    {
        $hit = DB::table('daily_favorite_hits')
            ->where('name_id', $id)
            ->whereDate('created_at', Carbon::today()->toDateString())
            ->get();
        if (count($hit) >= 1) {
            //$hit->increment('count', 1);
            DailyFavoriteHit::where('name_id', $id)->increment('count', 1);
        } else {
            DailyFavoriteHit::firstOrCreate(['name_id' => $id, 'count' => '1']);
        }
    }

    /* To show most favoritesd names */
    public function favorited()
    {
        SEOTools::setTitle('Most Favorited Muslim Names');
        SEOTools::setDescription("You may like these names because most of our users liked these names");
        $names = FavoriteHit::where('hits', '>', '500')->orderBy('hits', 'desc')->paginate(25);
        //$names = $names->names;
        //dd($names);
        return view('names.most_favorited', compact('names'));
    }
    // 'my-favorite-names.html'
    public function myFavorites()
    {
        $id = Auth::id();
        SEOTools::setTitle('My Favorite Names');
        SEOTools::setDescription("My saved favorite names");
        //Seo::set('keywords', "my,favorites,names,favorite names");
        $names = Auth::user()->favorites;
        return view('names.my_favorites', compact('names'));
    }
    public function totalSavedNames()
    {
        $id = Auth::id();
        return User::find($id)->entries->count();
    }
    public function sendIt(Request $request)
    {

        $names = null;
        $favs  = $request->session()->get('favorites');
        if (isset($favs)) {
            $names = Name::whereIn('id', $favs)->get();
        } else {
            Alert::error('Something went wrong', 'Oops!');
            return redirect()->back();
        }
        //pdf generation
        view()->share('names', $names);
        $data['pdf']   = PDF::loadView('pdf.favoritespdf', $names);
        $data['names'] = $names;
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('from');
        $data['subject'] = $request->input('subject');


        $to   = $request->get('to');
        $from = $request->get('from');

        Mail::to($to)->send(new SendNames($data));

        //return response()->json(['status' => 'Success']);
        Alert::info('Email was sent!');
        //return redirect()->back();
        return redirect('/');
    }

    public function sendSaved(Request $request)
    {
        $id    = Auth::id();
        $names = User::find($id)->entries;
        //$names = trim(strip_tags($names));
        if (!$names) {
            Alert::error('Something went wrong', 'Oops!');
            return redirect()->back();
        }
        $data['names'] = $names;
        $to            = $request->get('to');
        $data['name']  = $request->input('name');
        $data['email'] = $request->input('from');
        $subject       = 'My saved names';
        $data['pdf']   = $this->pdf();
        //return $data['pdf'];
        Mail::to($to)
            //->subject('Foo - Bar')
            //->attachData($this->download)
            ->send(new SendSaved($data));

        //return response()->json(['status' => 'Success']);
        Alert::info('Email was sent!');
        //return redirect()->back();
        return redirect('/');
    }
    public function download()
    {
        if(Auth::check())
        {
            $user  = Auth::user();
            $name  = $user->name;
            $names = User::find($user->id)->entries;
            view()->share('names', $names);
            $pdf = PDF::loadView('pdf.favoritespdf', $names);
            return $pdf->download('Names4Muslims-' . $name . '.pdf');
        }
        else{
            Alert::warning('You must logged in to download this names');
            return redirect('/login');
            dd('hi');
        }

    }
    public function pdf()
    {
        $user  = Auth::user();
        $name  = $user->name;
        $names = User::find($user->id)->entries;
        view()->share('names', $names);
        $pdf = PDF::loadView('pdf.favoritespdf', $names);
        return $pdf;
    }
    public function getFavCount(Request $request)
    {
        $value = $request->session()->get('favorites');
        if (isset($value)) {
            $favCount = count($value);
        } else {
            $favCount = 0;
        }
        return $favCount;
    }
    public function sendToPusher($id)
    {
        $names = Name::findOrFail($id);
        $name  = $names->name;
        $slug  = $names->slug;
        $fav   = ["name" => $name, "slug" => $slug];
        event(new FavoriteEvent($fav));
    }
}
