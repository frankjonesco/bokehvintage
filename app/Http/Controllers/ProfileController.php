<?php

namespace App\Http\Controllers;

use App\Models\Lens;
use App\Models\Site;
use App\Models\Image;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show index page
    public function index(Site $site){
        return view('profile.index', [
            'photos' => $site->getPhotos(),
            'active_nav' => 'profile',
            'meta' => [
                'title' => 'Profile'
            ]
        ]);
    }

    // Upload image
    public function uploadImage(Request $request, Site $site){

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=550,min_height=400'
        ]);

        $lens = Lens::where('hex', $request->hex)->first();

        if($request->hasFile('image')){
            $lens->image = $site->savePhoto($request, 'lenses', $request->hex);
        }

        $lens->save();
        
        
        return redirect('lenses')->with('message', 'Your photo was added.');

    }

}
