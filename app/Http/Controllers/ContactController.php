<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Alert;
use Seo;
use Anam\Captcha\Captcha;

class ContactController extends Controller
{
    public function index()
    {
        Seo::set('title', 'Contact Us | Names4Muslims');
        Seo::set('description', "Contact Names4muslims.com");
    	return view('pages.contact');
    }
    public function sendContact(Request $request, Captcha $captcha)
    {
        $response = $captcha->check($request);

        if (! $response->isVerified()) {
            // dd($response->errors());
            return redirect('/contacts.html'); 
            // ->withErrors($validator);
        }

    	$data['msg'] = $request->message;
    	$data['from'] = $request->email;
    	Mail::to('muslimnames@gmail.com')->send(New ContactMail($data));
    	Alert::info('Email was sent!');        
        return redirect('/');   
    }

}
