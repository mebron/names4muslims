<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Gallery;
use App\Name;
use Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Gallery::all();
        return view('gallery.photos',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $name = Name::find($id);
        return view('gallery.form',compact('name'));
    }

    public function face($id)
    {
        //if (Auth::check()) {
            $name = Name::find($id);
            return view('gallery.form',compact('name'));
       // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $this->validate($request, [
            'name' => 'required|max:255',      
            'photo'=> 'required|max:2000'
            ]);
       // request()->file('image')->store('photos');
        $name = $request->photo->hashName();


        $gallery = new Gallery;
        $gallery->name_id = $request->name_id;
        $gallery->name = $request->name;
        $gallery->description = $request->description;
        $gallery->country = $request->country;
        $gallery->dob = $request->dob;
        $gallery->album = $request->album;
        $gallery->image = $name;
        $gallery->user_id = $request->user_id;
        $gallery->save();

        $image = $request->photo;
        //$filename  = time() . '.' . $image->getClientOriginalExtension();
        $full = public_path('storage/photos/full/' . $name);
        Image::make($image->getRealPath())->resize(960, null,function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize(); //keep the original image size <960
        })->save($full);
        $thumb = public_path('storage/photos/thumbnails/' . $name);
        Image::make($image->getRealPath())->resize(150, 150,function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumb);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $photo = $gallery->image;
        $full = public_path('storage/photos/full/' . $photo);
        $thumb = public_path('storage/photos/thumbnails/' . $photo);
        if(file_exists($full)){
            @unlink($full);
        }
        if(file_exists($thumb)){
            @unlink($thumb);
        }
        $gallery->delete();
    }
}
