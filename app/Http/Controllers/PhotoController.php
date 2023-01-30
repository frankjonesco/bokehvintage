<?php

namespace App\Http\Controllers;

use App\Models\Site;
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
}
