<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Image;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show index page
    public function index(){
        $site = Site::where('id', 1)->first();
        $site->views = $site->views() + 1;
        $site->save();
        return view('profile.index', [
            'photos' => $site->getPhotos(),
            'views' => $site->views(),
            'active_nav' => 'profile'
        ]);
    }

}
