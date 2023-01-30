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
            'active_nav' => 'photos'
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

        if($request->hasFile('photo')){
            dd('hasFile');
        }
        // Validate form
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        $photo = Photo::create([
            'hex' => Str::random(11),
            'user_id' => auth()->user()->id,
            'filename' => '',
            'status' => 'public'
        ]);

    
        

        // Upload the image, make thumbnail, update database
        if($request->hasFile('image')){
            $photo->saveImage($request);
        }
        
        return redirect('dashboard/articles/image/crop')->with('success', 'Your image was uploaded. Now let\'s crop it.');
    }
}
