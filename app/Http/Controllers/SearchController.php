<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Name;
use Artesaos\SEOTools\Facades\SEOTools;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $key = $request->get('q');
        SEOTools::setTitle('Muslim Names Search Results for '.$key.'');
        SEOTools::setDescription("muslim baby names, unique muslim baby names, new unique muslim names");
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($request->has('q')) {

            // Using the Laravel Scout syntax to search the names table.
           // $names = Name::search($request->get('q'))->orderBy('name', 'asc')->paginate(15);
            $names = Name::where('name','LIKE',$key . '%')->orderBy('name', 'asc')->paginate(25);
            if(!$names->count())
            {
                $names = Name::where('meaning','LIKE','%' . $key . '%')->orderBy('name', 'asc')->paginate(25);
            }
           // $product = Product::where('naam', 'LIKE', '%' . $q . '%')
       // ->orWhere('beschrijving', 'LIKE', '%' . $q . '%')
       // ->paginate(6);

            // If there are results return them, if none, return the error message.
            if($names->count())
            {
                return view('names.search',compact('names'));
            }
            else
            {
                return view('names.error_search',compact('error'));
            }
           // $names = $name->count() ? $name : $error;

        }

        // Return the error message if no keywords existed
        return view('names.error_search',compact('error'));
    }
}
