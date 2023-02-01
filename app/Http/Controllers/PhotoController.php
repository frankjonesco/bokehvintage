<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    // View photos index
    public function index(Site $site){
        $site = Site::where('id', 1)->first();
        $site->views = $site->views() + 1;
        $site->save();
        return view('photos.index', [
            'photos' => $site->getPhotos(),
            'views' => $site->views,
            'active_nav' => 'photos',
            'meta' => [
                'title' => 'Photos'
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->photo->extension());
        // Validate form
        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=800,min_height=400'
        ]);
        
        // Create a new photo in DB
        $photo = Photo::create([
            'hex' => Str::random(11),
            'user_id' => auth()->user()->id,
            'filename' => '',
            'status' => 'public',
        ]);

        
        // Upload the image and run savePhoto method
        if($request->hasFile('photo')){
            $photo->filename = $photo->savePhoto($request, 'photos', $photo->hex);
        }

        $photo->save();
        
        return redirect('photos')->with('message', 'Your photo was added.');
    }
}
