<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use App\Name;
use App\NameRating;
use Datatables;

class ApiController extends Controller {

    public function __construct() {

    }

    public function getRatings(Request $request) {

    }
    public function setRating(Request $request) {

        $id = $request->get('id');
        $ip = $request->ip();
        $rate = $request->get('rating');
        $rated = NameRating::where('name_id', $id)->first();

        if (isset($rated->name_id)) {
            $voted_ip = unserialize($rated->used_ips);
            $count = $rated->total_votes; //how many votes total
            $current_rating = $rated->total_value; //total number of rating added together and stored
            $sum = $rate + $current_rating; // add together the current vote value and the total vote value
            $voted = $this->isVoted($id, $ip);


            if ($voted == 0) {
                // checking to see if the first vote has been tallied
                // or increment the current number of votes
                $total_vote = ($sum == 0 ? 0 : $count + 1);
                //($sum==0 ? $total_vote=0 : $total_vote=$count+1);
                // if it is an array i.e. already has entries the push in another value
                ((is_array($voted_ip)) ? array_push($voted_ip, $ip) : $voted_ip = array($ip));
                $insertip = serialize($voted_ip);
                $average = $sum / $total_vote;

                $rated->name_id = $id;
                $rated->total_votes = $total_vote; //\Auth::id();
                $rated->total_value = $sum;
                $rated->used_ips = $insertip;
                $rated->average = $average;

                $rated->save();
            } else {
                return response()->json(null, 403);

            }
        } else {
            $rating = new NameRating;
            $rating->name_id = $id;
            $rating->total_votes = 1; //\Auth::id();
            $rating->total_value = $rate;
            $rating->used_ips = serialize($ip);
            $rating->average = $rate;

            $rating->save();
        }
    }

    public function isVoted($id, $ip) {
        $count = NameRating::where('name_id', $id)->where('used_ips','like', '%'.$ip.'%')->count();
        return $count;
    }
    public function anyData()
    {
        //$query = Name::query();
        //return Datatables::of(Name::query())->make(true);
        /*return datatables()->of($query)->addColumn('action', function ($query) {
            return '<table class="table-sm"><tr><td><a href="/mypanel/names/show/" class="btn btn-xs btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> View</a></td></tr></table>';
        });*/
        return datatables(Name::all())->addColumn('action', 'admin.names.names-action')->toJson();
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $names = Name::where('name', 'like', $query . '%')->take(10)->get();
        return response()->json($names);
    }

}
