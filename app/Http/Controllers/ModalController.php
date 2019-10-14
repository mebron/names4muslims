<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;

class ModalController extends Controller
{
    public function info($id)
    {
    	$names = Name::where('id', '=', $id)->firstOrFail();
    	return view('modal.info', compact('names'));
    }
}
